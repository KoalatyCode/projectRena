<?php
namespace ProjectRena\Task\Cronjobs;

use DateTime;
use ProjectRena\RenaApp;


/**
 * Finds wars, and throws them at the resque task to populate the wars table
 */
class populateWarsCronjob
{

    /**
     * Executes the cronjob task
     *
     * @param mixed $pid
     * @param mixed $md5
     * @param RenaApp $app
     */

    public static function execute($pid, $md5)
    {
        /** @var RenaApp $app */
        $app = RenaApp::getInstance();

        // Foreach page, throw the war url in question at the Resque task
        $data = json_decode($app->cURL->getData("https://public-crest.eveonline.com/wars/", 0), true);

        $pageCount = $data["pageCount"];
        $currPage = 1;
        while($currPage <= $pageCount) {
            // Get the data for the current page
            $data = json_decode($app->cURL->getData("https://public-crest.eveonline.com/wars/?page=" . $currPage, 0), true);

            foreach($data["items"] as $war) {
                // Figure out if it's already inserted, and if it has ended (or has zero kills)
                $inserted = $app->wars->getWarByID($war["id"]);

                // If nothing is inserted we'll update
                if (empty($inserted))
                    \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\populateWars", array("url" => $war["href"]));

                $date = new DateTime("+6 hour");
                $dateIn6Hours = $date->format("Y-m-d H:i:s");
                if (!empty($inserted) && $inserted["timeFinished"] == "0000-00-00 00:00:00" && $inserted["lastUpdated"] > $dateIn6Hours)
                    \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\populateWars", array("url" => $war["href"]));

            }
            // Increment the currentPage variable, so we can fetch the next set of wars
            $currPage++;
        }

        exit ();
        // Keep this at the bottom, to make sure the fork exits
    }

    /**
     * Defines how often the cronjob runs, every 1 second, every 60 seconds, every 86400 seconds, etc.
     */

    public static function getRunTimes()
    {
        return 60;
        // Never runs
    }
}
