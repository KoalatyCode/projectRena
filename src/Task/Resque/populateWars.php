<?php
namespace ProjectRena\Task\Resque;
use ProjectRena\RenaApp;


/**
 * populates the Wars table
 */
class populateWars
{

    /**
     * The Slim Application
     */

    /** @var RenaApp $app */
    private $app;

    /**
     * Performs the task, can access all $this->crap setup in setUp)
     */

    public function perform()
    {
        $url = $this->args["url"];
        $data = json_decode($this->app->cURL->getData($url, 0), true);

        $warID = $data["id"];
        $timeDeclared = $data["timeDeclared"];
        $timeStarted = $data["timeStarted"];
        $timeFinished = $data["timeFinished"];
        $openForAllies = $data["openForAllies"];
        $mutual = $data["mutual"];
        $aggressor = $data["aggressor"]["id"];
        $aggressorShipsKilled = $data["aggressor"]["shipsKilled"];
        $aggressorISKKilled = $data["aggressor"]["iskKilled"];
        $defender = $data["defender"]["id"];
        $defenderShipsKilled = $data["defender"]["shipsKilled"];
        $defenderISKKilled = $data["defender"]["iskKilled"];
        $lastUpdated = date("Y-m-d H:i:s");

        $this->app->wars->insertWar($warID, $timeDeclared, $timeStarted, $timeFinished, $openForAllies, $mutual, $aggressor, $aggressorShipsKilled, $aggressorISKKilled, $defender, $defenderShipsKilled, $defenderISKKilled);
        $this->app->Db->execute("UPDATE wars SET lastUpdated = :lastUpdated WHERE warID = :warID", array(":lastUpdated" => $lastUpdated, ":warID" => $warID));

        // Throw the killmail url after the killmail populate task
        $killmailURL = $data["killmails"];
        \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\populateWarKillmails", array("url" => $killmailURL, "warID" => $warID));

    }

    /**
     * Sets up the task (Setup $this->crap and such here)
     */

    public function setUp()
    {
        $this->app = RenaApp::getInstance();
    }

    /**
     * Tears the task down, unset $this->crap and such
     */

    public function tearDown()
    {
        $this->app = null;
    }
}
