<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class AllianceAPIController
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

    public function allianceInformation($allianceID)
    {
        $data = $this->app->alliances->getAllByID($allianceID);
        $data["information"] = html_entity_decode($data["information"]);

        // Execute all the extra queries asyncronously
        $this->app->DbAsync->executeQuery("allianceActiveSystemID", "SELECT solarSystemID, count(killID) AS count FROM participants WHERE allianceID = :allianceID AND killTime >= date_sub(NOW(), interval 7 day) GROUP BY solarSystemID ORDER BY count DESC LIMIT 10000", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("lifeTimeKills", "SELECT COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID AND isVictim = 0", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("lifeTimeLosses", "SELECT COUNT(killID) AS losses FROM participants WHERE allianceID = :allianceID AND isVictim = 1", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("top50FlownShips", "SELECT shipTypeID, count(killID) AS count FROM participants WHERE allianceID = :allianceID GROUP BY shipTypeID ORDER BY count DESC LIMIT 50", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("top50ActiveSystems", "SELECT solarSystemID, count(killID) AS count FROM participants WHERE allianceID = :allianceID GROUP BY solarSystemID ORDER BY count DESC LIMIT 50", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("superCarriers", "SELECT characterID, shipTypeID, MAX(killTime) AS lastSeenDate FROM participants WHERE groupID = 30 AND allianceID = :allianceID GROUP BY shipTypeID ORDER BY characterID", array(":allianceID" => (int) $allianceID));
        $this->app->DbAsync->executeQuery("titans", "SELECT characterID, shipTypeID, MAX(killTime) AS lastSeenDate FROM participants WHERE groupID = 659 AND allianceID = :allianceID GROUP BY shipTypeID ORDER BY characterID", array(":allianceID" => (int) $allianceID));

        // More information
        $allianceActiveSystemID = $this->app->DbAsync->getData("allianceActiveSystemID")[0]["solarSystemID"];
        $data["allianceActiveArea"] = $this->app->mapRegions->getRegionNameByRegionID($this->app->mapSolarSystems->getRegionIDByID($allianceActiveSystemID));
        $data["lifeTimeKills"] = $this->app->DbAsync->getData("lifeTimeKills")[0]["kills"];
        $data["lifeTimeLosses"] = $this->app->DbAsync->getData("lifeTimeLosses")[0]["losses"];
        $data["top50FlownShips"] = $this->app->DbAsync->getData("top50FlownShips");
        $data["top50ActiveSystems"] = $this->app->DbAsync->getData("top50ActiveSystems");
        $members = $this->app->alliances->getMembersByID($allianceID);
        $data["memberArrayCount"] = count($members);
        $data["members"] = $members;
        $data["superCarriers"] = $this->app->DbAsync->getData("superCarriers");
        $data["titans"] = $this->app->DbAsync->getData("titans");
        $data["lastUpdatedOnBackend"] = $this->db->queryField("SELECT lastUpdated FROM alliances WHERE allianceID = :allianceID", "lastUpdated", array(":allianceID" => $allianceID));

        render("", $data, null, $this->contentType);
    }

    public function allianceMembers($allianceID)
    {
        $data = $this->app->alliances->getMembersByID($allianceID);
        render("", $data, null, $this->contentType);
    }

    public function findAlliance($searchTerm)
    {
        $results = $this->app->Search->search($searchTerm, "alliance");
        render("", $results, null, $this->contentType);
    }

    public function topCharacters($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT characterID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY characterID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getNameByID($value["characterID"]);
        
        render("", $data, null, $this->contentType);
    }

    public function topCorporations($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT corporationID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY corporationID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getNameByID($value["corporationID"]);

        render("", $data, null, $this->contentType);
    }

    public function topAlliances($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT allianceID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY allianceID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["allianceName"] = $this->app->alliances->getNameByID($value["allianceID"]);

        render("", $data, null, $this->contentType);
    }


    public function topShips($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT shipTypeID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY shipTypeID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["shipName"] = $this->app->invTypes->getNameByID($value["shipTypeID"]);

        render("", $data, null, $this->contentType);
    }


    public function topSystems($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }

    public function topRegions($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT regionID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY regionID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($value["regionID"]);

        render("", $data, null, $this->contentType);
    }

    // @TODO gotta add a field to participants where the nearest location is stored (as an ID referencing mapAllCelestials)
    /*public function topLocations($allianceID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE allianceID = :allianceID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":allianceID" => $allianceID));
        foreach($data as $key => $value)
            $data[$key]["locationName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }*/
}