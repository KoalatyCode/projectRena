<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class CharacterAPIController
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

    public function characterInformation($characterID)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $data = $this->app->characters->getAllByID($characterID);
        $data["history"] = json_decode($data["history"], true);
        $corporationID = $data["corporationID"];
        $allianceID = $data["allianceID"];

        // Fire off all the queries asyncronously
        $this->app->DbAsync->executeQuery("lastSeenSystemID", "SELECT solarSystemID FROM participants WHERE characterID = :characterID ORDER BY killTime DESC LIMIT 1", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("corporationActiveSystemID", "SELECT solarSystemID, count(killID) AS hits FROM participants WHERE characterID = :characterID AND corporationID = :corporationID AND killTime >= date_sub(now(), INTERVAL 7 DAY) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 10000", array(":characterID" => $characterID, ":corporationID" => $corporationID));
        $this->app->DbAsync->executeQuery("allianceActiveSystemID", "SELECT solarSystemID, count(killID) AS hits FROM participants WHERE characterID = :characterID AND allianceID = :allianceID AND killTime >= date_sub(now(), INTERVAL 7 DAY) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 10000", array(":characterID" => $characterID, ":allianceID" => $allianceID));
        $this->app->DbAsync->executeQuery("lastSeenDate", "SELECT killTime FROM participants WHERE characterID = :characterID ORDER BY killTime DESC LIMIT 1", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("lastSeenShip", "SELECT shipTypeID FROM participants WHERE characterID = :characterID ORDER BY killTime DESC LIMIT 1", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("lifeTimeKills", "SELECT COUNT(killID) AS kills FROM participants WHERE characterID = :characterID AND isVictim = 0", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("lifeTimeLosses", "SELECT COUNT(killID) AS losses FROM participants WHERE characterID = :characterID AND isVictim = 1", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("top10FlownShips", "SELECT shipTypeID, count(killID) AS count FROM participants WHERE characterID = :characterID GROUP BY shipTypeID ORDER BY count DESC LIMIT 10", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("top10ActiveSystems", "SELECT solarSystemID, count(killID) AS count FROM participants WHERE characterID = :characterID GROUP BY solarSystemID ORDER BY count DESC LIMIT 10", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("soloKills", "SELECT COUNT(killID) AS kills FROM participants WHERE characterID = :characterID AND isVictim = 0 AND numberInvolved = 1", array(":characterID" => (int)$characterID));
        $this->app->DbAsync->executeQuery("blobKills", "SELECT COUNT(killID) AS kills FROM participants WHERE characterID = :characterID AND isVictim = 0 AND numberInvolved >= 50", array(":characterID" => (int)$characterID));

        $data["allianceTicker"] = $this->app->alliances->getAllianceTickerByID($allianceID);
        $data["corporationTicker"] = $this->app->corporations->getCorpTickerByID($corporationID);
        $lastSeenSystemID = $this->app->DbAsync->getData("lastSeenSystemID")[0]["solarSystemID"];

        $data["lastSeenSystem"] = $this->app->mapSolarSystems->getNameByID($lastSeenSystemID);
        $data["lastSeenRegion"] = $this->app->mapRegions->getRegionNameByRegionID($this->app->mapSolarSystems->getRegionIDByID($lastSeenSystemID));
        $data["lastSeenDate"] = $this->app->DbAsync->getData("lastSeenDate")[0]["killTime"];
        $data["lastSeenShip"] = $this->app->DbAsync->getData("lastSeenShip")[0]["shipTypeID"];
        $data["corporationActiveArea"] = $this->app->DbAsync->getData("corporationActiveSystemID")[0]["solarSystemID"];
        $data["allianceActiveArea"] = $this->app->DbAsync->getData("allianceActiveSystemID")[0]["solarSystemID"];
        $data["lifeTimeKills"] = $this->app->DbAsync->getData("lifeTimeKills")[0]["kills"];
        $data["lifeTimeLosses"] = $this->app->DbAsync->getData("lifeTimeLosses")[0]["losses"];
        $data["top10FlownShips"] = $this->app->DbAsync->getData("top10FlownShips");
        $data["top10ActiveSystems"] = $this->app->DbAsync->getData("top10ActiveSystems");
        $data["soloKills"] = $this->app->DbAsync->getData("soloKills")[0]["kills"];
        $data["blobKills"] = $this->app->DbAsync->getData("blobKills")[0]["kills"];

        render("", $data, null, $this->contentType);
    }

    public function findCharacter($searchTerm)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $results = $this->app->Search->search($searchTerm, "character");
        render("", $results, null, $this->contentType);
    }

    public function topCharacters($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT characterID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY characterID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getNameByID($value["characterID"]);

        render("", $data, null, $this->contentType);
    }

    public function topCorporations($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT corporationID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY corporationID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getNameByID($value["corporationID"]);

        render("", $data, null, $this->contentType);
    }

    public function topAlliances($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT allianceID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY allianceID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["allianceName"] = $this->app->alliances->getNameByID($value["allianceID"]);

        render("", $data, null, $this->contentType);
    }


    public function topShips($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT shipTypeID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY shipTypeID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["shipName"] = $this->app->invTypes->getNameByID($value["shipTypeID"]);

        render("", $data, null, $this->contentType);
    }


    public function topSystems($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }

    public function topRegions($characterID, $limit)
    {
        if (!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT regionID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY regionID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach ($data as $key => $value)
            $data[$key]["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($value["regionID"]);

        render("", $data, null, $this->contentType);
    }

    // @TODO gotta add a field to participants where the nearest location is stored (as an ID referencing mapAllCelestials)
    /*public function topLocations($characterID, $limit)
    {
        if(!is_numeric($characterID))
            throw new \Exception("Error, the input characterID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE characterID = :characterID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":characterID" => $characterID));
        foreach($data as $key => $value)
            $data[$key]["locationName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }*/
}