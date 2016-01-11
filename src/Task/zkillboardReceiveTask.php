<?php
namespace ProjectRena\Task;

use Cilex\Command\Command;
use ProjectRena\RenaApp;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ZMQ;
use ZMQContext;

/**
 * Receives data from Squizz stupid queue implementation from hell
 */
class zkillboardReceiveTask extends Command
{

    /**
     */
    protected function configure()
    {
        $this->setName('run:zkb')->setDescription('Receives data from Squizz stupid queue implementation from hell');
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
        $run = true;
        $oldKillID = 0;
        do {
            $p = \RedisQ\Action::listen("redisq.zkillboard.com");
            if ($p["killID"] > $oldKillID) {
                // Get the killmail data.
                $k = $app->CrestFunctions->generateFromCREST($p);

                // Poke statsd
                $app->StatsD->increment("zKillboardReceived");

                // Now lets make the json and hash
                $json = json_encode($k, JSON_NUMERIC_CHECK);
                $hash = $app->CrestFunctions->generateCRESTHash($k);
                //$hash = hash("sha256", ":" . $k["killTime"] . ":" . $k["solarSystemID"] . ":" . $k["moonID"] . "::" . $k["victim"]["characterID"] . ":" . $k["victim"]["shipTypeID"] . ":" . $k["victim"]["damageTaken"] . ":");

                // Lets insert the killmail!
                $app->killmails->insertIntoKillmails($p["killID"], 0, $hash, "zkillboardRedisQ", $json);

                // Upgrade it
                \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\upgradeKillmail", array("killID" => $p["killID"]));
            }
            $oldKillID = $p["killID"];
        } while ($run == true);
    }
}
