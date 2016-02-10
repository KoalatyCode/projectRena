<?php
namespace ProjectRena\Controller\Killboard;

use ProjectRena\Lib\DbAsync;
use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class IndexController
{

    /**
     * The Slim Application
     */
    private $app;

    /**
     * The Cache
     */
    private $cache;

    /**
     * The baseConfig (config/config.php)
     */
    private $config;

    /**
     * cURL interface (getData / setData)
     */
    private $curl;

    /**
     * The Database
     */
    private $db;

    /**
     * The logger, outputs to logs/app.log
     */
    private $log;

    /**
     * StatsD for tracking stats
     */
    private $statsd;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @param RenaApp $app
     */
    public function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->db = $app->Db;
        $this->config = $app->baseConfig;
        $this->cache = $app->Cache;
        $this->curl = $app->cURL;
        $this->statsd = $app->StatsD;
        $this->log = $app->Logging;
        $this->contentType = "application/json";
    }

    public function index()
    {
        $data = array();
        $killIDs = array();
        // Get the killlist with the latest 50/100 kills ordered by killTime
        $kills = $this->app->participants->getAllKills(array(), 100, 60, "DESC", 0, "killID");
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        // Get the json data for the killlist
        $data["killListData"] = $this->app->killmails->getKill_jsonByKillIDs($killIDs);

        // Get the current count of active chars/corps/alliance/ships/systems
        $this->app->DbAsync->executeQuery("currentlyActiveCharacters", "SELECT COUNT(DISTINCT(characterID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)", 3600);
        $this->app->DbAsync->executeQuery("currentlyActiveCorporations", "SELECT COUNT(DISTINCT(corporationID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)", 3600);
        $this->app->DbAsync->executeQuery("currentlyActiveAlliances", "SELECT COUNT(DISTINCT(allianceID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)", 3600);
        $this->app->DbAsync->executeQuery("currentlyActiveShipTypes", "SELECT COUNT(DISTINCT(shipTypeID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)", 3600);
        $this->app->DbAsync->executeQuery("currentlyActiveSolarSystems", "SELECT COUNT(DISTINCT(solarSystemID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)", 3600);

        // Get the current amount of kills done over the last 7 days
        $this->app->DbAsync->executeQuery("killCountOverLast7Days", "SELECT COUNT(*) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND isVictim = 1", 3600);

        // Get the top 10 characters/corporations/alliances/ships/systems/regions for the last 7 days
        $this->app->DbAsync->executeQuery("top10Characters", "SELECT characterID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID != 0 GROUP BY characterID ORDER BY count DESC LIMIT 10", 3600);
        $this->app->DbAsync->executeQuery("top10Corporations", "SELECT corporationID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND corporationID != 0 GROUP BY corporationID ORDER BY count DESC LIMIT 10", 3600);
        $this->app->DbAsync->executeQuery("top10Alliances", "SELECT allianceID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND allianceID != 0 GROUP BY allianceID ORDER BY count DESC LIMIT 10", 3600);
        $this->app->DbAsync->executeQuery("top10ShipTypes", "SELECT shipTypeID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND shipTypeID != 0 GROUP BY shipTypeID ORDER BY count DESC LIMIT 10", 3600);
        $this->app->DbAsync->executeQuery("top10SolarSystems", "SELECT solarSystemID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND solarSystemID != 0 GROUP BY solarSystemID ORDER BY count DESC LIMIT 10", 3600);
        $this->app->DbAsync->executeQuery("top10Regions", "SELECT regionID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND regionID != 0 GROUP BY regionID ORDER BY count DESC LIMIT 10", 3600);

        // Get the most valuable kills for the last 7 days
        $this->app->DbAsync->executeQuery("mostValuableKillsLast7Days", "SELECT killID, characterID, shipValue FROM participants WHERE killTime >= DATE_SUB(NOW(), interval 7 day) AND isVictim = 1 ORDER BY shipValue DESC LIMIT 5", 3600);

        $data["currentlyActive"]["characters"] = $this->app->DbAsync->getData("currentlyActiveCharacters", 3600)[0]["count"];
        $data["currentlyActive"]["corporations"] = $this->app->DbAsync->getData("currentlyActiveCorporations", 3600)[0]["count"];
        $data["currentlyActive"]["alliances"] = $this->app->DbAsync->getData("currentlyActiveAlliances", 3600)[0]["count"];
        $data["currentlyActive"]["shipTypes"] = $this->app->DbAsync->getData("currentlyActiveShipTypes", 3600)[0]["count"];
        $data["currentlyActive"]["solarSystems"] = $this->app->DbAsync->getData("currentlyActiveSolarSystems", 3600)[0]["count"];
        $data["top5MostValuableKillsOverLast7Days"] = $this->app->DbAsync->getData("mostValuableKillsLast7Days", 3600);
        $data["killCountOverLast7Days"] = $this->app->DbAsync->getData("killCountOverLast7Days", 3600)[0]["count"];
        $data["top10"]["characters"] = $this->app->DbAsync->getData("top10Characters", 3600);
        $data["top10"]["corporations"] = $this->app->DbAsync->getData("top10Corporations", 3600);
        $data["top10"]["alliances"] = $this->app->DbAsync->getData("top10Alliances", 3600);
        $data["top10"]["shipTypes"] = $this->app->DbAsync->getData("top10ShipTypes", 3600);
        $data["top10"]["solarSystems"] = $this->app->DbAsync->getData("top10SolarSystems", 3600);
        $data["top10"]["regions"] = $this->app->DbAsync->getData("top10Regions", 3600);

        render("", $data, null, "application/json");
    }
}