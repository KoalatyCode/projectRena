<?php
namespace ProjectRena\Task\Resque;
use ProjectRena\RenaApp;


/**
 * takes the killmails url from populateWars and fetches the killmail urls
 */
class populateWarKillmails
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

        $pageCount = $data["pageCount"];
        $currPage = 1;

        while($currPage <= $pageCount) {
            $data = json_decode($this->app->cURL->getData($url . "?page=" . $currPage, 0), true);
            $killmails = $data["items"];

            foreach($killmails as $killmail) {
                $killmailURL = $killmail["href"];
                $killID = $killmail["id"];
                $this->app->Db->execute("INSERT INTO warKillmails (killID, warID) VALUES (:killID, :warID)", array(":killID" => $killID, ":warID" => $warID));
                \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\crestKillmailFetcher", array("url" => $killmailURL, "warID" => $warID));
            }

            $currPage++;
        }
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
