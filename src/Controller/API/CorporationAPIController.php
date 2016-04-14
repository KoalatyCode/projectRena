<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class CorporationAPIController
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

    public function corporationInformation($corporationID)
    {
        $data = $this->app->corporations->getAllByID($corporationID);
        $data["information"] = json_decode($data["information"], true);

        // Fire off all the queries asyncronously
        $this->app->DbAsync->executeQuery("corporationActiveSystemID", "SELECT solarSystemID, count(killID) AS hits FROM participants WHERE corporationID = :corporationID AND killTime >= date_sub(now(), interval 7 day) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 10000", array(":corporationID" => $corporationID));
        $this->app->DbAsync->executeQuery("allianceActiveSystemID", "SELECT solarSystemID, count(killID) AS hits FROM participants WHERE corporationID = :corporationID AND killTime >= date_sub(now(), interval 7 day) GROUP BY solarSystemID ORDER BY hits DESC LIMIT 10000", array(":corporationID" => $corporationID));
        $this->app->DbAsync->executeQuery("lifeTimeKills", "SELECT COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID AND isVictim = 0", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("lifeTimeLosses", "SELECT COUNT(killID) AS losses FROM participants WHERE corporationID = :corporationID AND isVictim = 1", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("top25FlownShips", "SELECT shipTypeID, count(killID) AS count FROM participants WHERE corporationID = :corporationID GROUP BY shipTypeID ORDER BY count DESC LIMIT 25", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("top25ActiveSystems", "SELECT solarSystemID, count(killID) AS count FROM participants WHERE corporationID = :corporationID GROUP BY solarSystemID ORDER BY count DESC LIMIT 25", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("soloKills", "SELECT COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID AND isVictim = 0 AND numberInvolved = 1", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("blobKills", "SELECT COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID AND isVictim = 0 AND numberInvolved >= 50", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("superCarriers", "SELECT characterID, shipTypeID, MAX(killTime) AS lastSeenDate FROM participants WHERE groupID = 30 AND corporationID = :corporationID GROUP BY shipTypeID ORDER BY characterID", array(":corporationID" => (int) $corporationID));
        $this->app->DbAsync->executeQuery("titans", "SELECT characterID, shipTypeID, MAX(killTime) AS lastSeenDate FROM participants WHERE groupID = 659 AND corporationID = :corporationID GROUP BY shipTypeID ORDER BY characterID", array(":corporationID" => (int) $corporationID));

        $data["corporationActiveArea"] = $this->app->DbAsync->getData("corporationActiveSystemID")[0]["solarSystemID"];
        $data["allianceActiveArea"] = $this->app->DbAsync->getData("allianceActiveSystemID")[0]["solarSystemID"];
        $data["lifeTimeKills"] = $this->app->DbAsync->getData("lifeTimeKills")[0]["kills"];
        $data["lifeTimeLosses"] = $this->app->DbAsync->getData("lifeTimeLosses")[0]["losses"];
        $data["top25FlownShips"] = $this->app->DbAsync->getData("top25FlownShips");
        $data["top25ActiveSystems"] = $this->app->DbAsync->getData("top25ActiveSystems");
        $data["soloKills"] = $this->app->DbAsync->getData("soloKills")[0]["kills"];
        $data["blobKills"] = $this->app->DbAsync->getData("blobKills")[0]["kills"];

        $members = $this->app->corporations->getMembersByID($corporationID);
        $data["memberArrayCount"] = count($members);
        $data["members"] = $members;
        $data["superCarriers"] = $this->app->DbAsync->getData("superCarriers");
        $data["titans"] = $this->app->DbAsync->getData("titans");

        render("", $data, null, $this->contentType);
    }

    public function corporationMembers($corporationID)
    {
        $data = $this->app->corporations->getMembersByID($corporationID);
        render("", $data, null, $this->contentType);
    }

    public function findCorporation($searchTerm)
    {
        $results = $this->app->Search->search($searchTerm, "corporation");
        render("", $results, null, $this->contentType);
    }

    public function topCharacters($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT characterID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY characterID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getNameByID($value["characterID"]);

        render("", $data, null, $this->contentType);
    }

    public function topCorporations($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT corporationID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY corporationID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getNameByID($value["corporationID"]);

        render("", $data, null, $this->contentType);
    }

    public function topAlliances($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT allianceID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY allianceID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["allianceName"] = $this->app->alliances->getNameByID($value["allianceID"]);

        render("", $data, null, $this->contentType);
    }


    public function topShips($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT shipTypeID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY shipTypeID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["shipName"] = $this->app->invTypes->getNameByID($value["shipTypeID"]);

        render("", $data, null, $this->contentType);
    }


    public function topSystems($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }

    public function topRegions($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT regionID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY regionID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($value["regionID"]);

        render("", $data, null, $this->contentType);
    }

    // @TODO gotta add a field to participants where the nearest location is stored (as an ID referencing mapAllCelestials)
    /*public function topLocations($corporationID, $limit)
    {
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE corporationID = :corporationID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":corporationID" => $corporationID));
        foreach($data as $key => $value)
            $data[$key]["locationName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }*/
}