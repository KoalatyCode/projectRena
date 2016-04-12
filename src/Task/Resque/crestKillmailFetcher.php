<?php
namespace ProjectRena\Task\Resque;
use ProjectRena\RenaApp;


/**
 * Fetches the killmail data from CREST
 */
class crestKillmailFetcher
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
        $warID = $this->args["warID"];

        $data = json_decode($this->app->cURL->getData($url, 0), true);

        $source = isset($warID) ? "warID:{$warID}" : "CREST:{$data["killID"]}";

        $killmailData = $this->app->CrestFunctions->generateFromCREST(array("killID" => $data["killID"], "killmail" => $data));
        $hash = $this->app->CrestFunctions->generateCRESTHash($killmailData);
        $json = json_encode($killmailData, JSON_NUMERIC_CHECK);
        $insert = $this->app->killmails->insertIntoKillmails($data["killID"], 0, $hash, $source, $json);

        // Upgrade it
        if($insert > 0)
            \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\upgradeKillmail", array("killID" => $data["killID"]));
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
