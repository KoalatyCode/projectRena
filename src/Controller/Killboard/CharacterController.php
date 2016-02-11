<?php
namespace ProjectRena\Controller\Killboard;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class CharacterController
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

    public function index($characterID)
    {
        // get the number of ships destroyed/lost

        $data = array();
        $killIDs = array();

        // Fetch the killlist data
        $this->app->DbAsync->executeQuery("100latestKills", "SELECT killID FROM participants WHERE characterID = $characterID GROUP BY killID ORDER BY killTime DESC LIMIT 100");

        // Get the current count of active chars/corps/alliance/ships/systems
        $this->app->DbAsync->executeQuery("currentlyActiveShipTypes", "SELECT COUNT(DISTINCT(shipTypeID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID = $characterID");
        $this->app->DbAsync->executeQuery("currentlyActiveSolarSystems", "SELECT COUNT(DISTINCT(solarSystemID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID = $characterID");

        // Get the current amount of kills done over the last 7 days
        $this->app->DbAsync->executeQuery("killCountOverLast7Days", "SELECT DISTINCT(COUNT(*)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID = $characterID");

        // Get the top 10 characters/corporations/alliances/ships/systems/regions for the last 7 days
        $this->app->DbAsync->executeQuery("top10ShipTypes", "SELECT shipTypeID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND shipTypeID != 0 AND characterID = $characterID GROUP BY shipTypeID ORDER BY count DESC LIMIT 10");
        $this->app->DbAsync->executeQuery("top10SolarSystems", "SELECT solarSystemID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND solarSystemID != 0 AND characterID = $characterID GROUP BY solarSystemID ORDER BY count DESC LIMIT 10");
        $this->app->DbAsync->executeQuery("top10Regions", "SELECT regionID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND regionID != 0 AND characterID = $characterID GROUP BY regionID ORDER BY count DESC LIMIT 10");

        // Get the most valuable kills for the last 7 days
        $this->app->DbAsync->executeQuery("mostValuableKillsLast7Days", "SELECT killID, characterID, shipValue FROM participants WHERE killTime >= DATE_SUB(NOW(), interval 7 day) AND characterID = $characterID ORDER BY shipValue DESC LIMIT 5");

        // Populate the killIDs list, with the data from the killlist query
        $kills = $this->app->DbAsync->getData("100latestKills", 100);

        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        // Populate the $data array with data from the async query executions..
        $data["characterInfo"] = $this->app->characters->getAllByID($characterID);
        $data["characterInfo"]["history"] = json_decode($data["characterInfo"]["history"], true);
        $data["killListData"] = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        $data["currentlyActive"]["shipTypes"] = $this->app->DbAsync->getData("currentlyActiveShipTypes", 3600)[0]["count"];
        $data["currentlyActive"]["solarSystems"] = $this->app->DbAsync->getData("currentlyActiveSolarSystems", 3600)[0]["count"];
        $data["top5MostValuableKillsOverLast7Days"] = $this->app->DbAsync->getData("mostValuableKillsLast7Days", 3600);
        $data["killCountOverLast7Days"] = $this->app->DbAsync->getData("killCountOverLast7Days", 3600)[0]["count"];
        $data["top10"]["shipTypes"] = $this->app->DbAsync->getData("top10ShipTypes", 3600);
        $data["top10"]["solarSystems"] = $this->app->DbAsync->getData("top10SolarSystems", 3600);
        $data["top10"]["regions"] = $this->app->DbAsync->getData("top10Regions", 3600);

        // Extra stats (Should be moved to async queries)
        $corporationID = $data["characterInfo"]["corporationID"];
        $allianceID = $data["characterInfo"]["allianceID"];
        $lastSeenSystemID = $this->app->Db->queryField("SELECT solarSystemID FROM participants WHERE characterID = :charID ORDER BY killTime DESC LIMIT 1", "solarSystemID", array(":charID" => $characterID));
        $corpActiveSystemID = $this->app->Db->queryField("SELECT solarSystemID, count(killID) AS hits FROM participants WHERE characterID = :charID AND corporationID = :corpID AND killTime >= date_sub(now(), interval 30 day) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 1000", "solarSystemID", array(":charID" => $characterID, ":corpID" => $corporationID), 3600);
        $allianceActiveSystemID = $this->app->Db->queryField("SELECT solarSystemID, count(killID) AS hits FROM participants WHERE characterID = :charID AND allianceID = :alliID AND killTime >= date_sub(now(), interval 30 day) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 1000", "solarSystemID", array(":charID" => $characterID, ":alliID" => $allianceID), 3600);
        $data["allianceTicker"] = $this->app->alliances->getAllianceTickerByID($allianceID);
        $data["corporationTicker"] = $this->app->corporations->getCorpTickerByID($corporationID);
        $data["lastSeenSystem"] = $this->app->mapSolarSystems->getNameByID($lastSeenSystemID);
        $data["lastSeenRegion"] = $this->app->mapRegions->getRegionNameByRegionID($this->app->mapSolarSystems->getRegionIDByID($lastSeenSystemID));
        $data["lastSeenDate"] = $this->app->Db->queryField("SELECT killTime FROM participants WHERE characterID = :charID ORDER BY killTime DESC LIMIT 1", "killTime", array(":charID" => $characterID), 3600);
        $data["lastSeenShip"] = $this->app->invTypes->getNameByID($this->app->Db->queryField("SELECT shipTypeID FROM participants WHERE characterID = :charID AND shipTypeID != 0 ORDER BY killTime DESC LIMIT 1", "shipTypeID", array(":charID" => $characterID)), 3600);
        $data["corporationActiveArea"] = $this->app->mapRegions->getRegionNameByRegionID($this->app->mapSolarSystems->getRegionIDByID($corpActiveSystemID));
        $data["allianceActiveArea"] = isset($allianceID) ? $this->app->mapRegions->getRegionNameByRegionID($this->app->mapSolarSystems->getRegionIDByID($allianceActiveSystemID)) : "";
        $data["lastUpdatedOnBackend"] = $this->app->Db->queryField("SELECT lastUpdated FROM characters WHERE characterID = :charID", "lastUpdated", array(":charID" => $characterID), 3600);
        $data["soloKills"] = $this->app->Db->queryField("SELECT count(*) as kills FROM participants WHERE characterID = :charID AND isVictim = 0 AND numberInvolved = 1", "kills", array(":charID" => $characterID), 3600);
        $data["blobKills"] = $this->app->Db->queryField("SELECT count(*) as kills FROM participants WHERE characterID = :charID AND isVictim = 0 AND numberInvolved >= 50", "kills", array(":charID" => $characterID), 3600);
        $data["lifeTimeKills"] = $this->app->Db->queryField("SELECT DISTINCT(COUNT(killID)) as kills FROM participants WHERE characterID = :charID", "kills", array(":charID" => $characterID), 3600);
        if($data["soloKills"] > 0 && $data["blobKills"] > 0)
            $data["percentageSoloPVPer"] = $data["soloKills"] / $data["blobKills"] * 100;

        $penis = "(..)==";
        $cnt = log($data["lifeTimeKills"]) * 3;
        $i = 0;
        while($i < $cnt)
        {
            $penis .= "=";
            $i++;
        }
        $data["ePeenSize"] = $penis . "D";

        $facepalmLosses = $this->app->Db->queryField("SELECT count(*) AS losses FROM participants WHERE characterID = :charID AND shipValue >= 200000000 AND isVictim = 1", "losses", array(":charID" => $characterID));
        $facepalms = "(>ლ)";
        $cnt = log($facepalmLosses);
        $i = 0;
        while($i < $cnt)
        {
            $facepalms .= "(>ლ)";
            $i++;
        }

        $data["facepalms"] = $facepalms;

        render("", $data, null, "application/json");
    }
}