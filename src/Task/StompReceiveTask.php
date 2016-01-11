<?php
namespace ProjectRena\Task;

use Cilex\Command\Command;
use ProjectRena\RenaApp;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ZMQ;
use ZMQContext;

/**
 * Receives killmail data from stomp
 */
class StompReceiveTask extends Command
{

    /**
     */
    protected function configure()
    {
        $this->setName('run:stomp')->setDescription('Receives killmail data from stomp');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //Init rena
        /** @var RenaApp $app */
        $app = RenaApp::getInstance();

        $startTime = time() + 3600; // Current time + 60 minutes
        $run = true;
        $stomp = new \Stomp($app->baseConfig->getConfig("server", "stomp"), $app->baseConfig->getConfig("username", "stomp"), $app->baseConfig->getConfig("password", "stomp"));
        $stomp->subscribe("/topic/kills", array("id" => "projectRena", "persistent" => "true", "ack" => "client", "prefetch-count" => 1));

        do {
            $frame = $stomp->readFrame();

            if (!empty($frame)) {
                $killdata = json_decode($frame->body, true);
                if (!empty($killdata)) {
                    $app->StatsD->increment("stompReceived");

                    if (isset($killdata["_stringValue"]))
                        unset($killdata["_stringValue"]);

                    // Fix the killID
                    $killdata["killID"] = (int)$killdata["killID"];

                    $json = json_encode($killdata, JSON_NUMERIC_CHECK);
                    $hash = $app->CrestFunctions->generateCRESTHash($killdata);

                    $inserted = $app->Db->execute("INSERT IGNORE INTO killmails (killID, hash, source, kill_json) VALUES (:killID, :hash, :source, :kill_json)", array(":killID" => $killdata["killID"], ":hash" => $hash, ":source" => "stomp", ":kill_json" => $json));
                    if ($inserted > 0)
                        \Resque::enqueue("now", "\\ProjectRena\\Task\\Resque\\upgradeKillmail", array("killID" => $killdata["killID"]));
                }
                $stomp->ack($frame->headers["message-id"]);
            }

            // Kill it after an hour
            if ($startTime <= time())
                $run = false;

        } while ($run == true);
    }
}
