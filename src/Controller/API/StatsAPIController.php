<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class StatsAPIController
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
    
    public function top10Characters()
    {
        $data = $this->db->query("SELECT characterID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID != 0 GROUP BY characterID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getAllByID($data[$key]["id"])["characterName"];

        render("", $data, null, $this->contentType);
    }

    public function top10Corporations()
    {
        $data = $this->db->query("SELECT corporationID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND corporationID != 0 GROUP BY corporationID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getAllByID($data[$key]["id"])["corporationName"];

        render("", $data, null, $this->contentType);
    }

    public function top10Alliances()
    {
        $data = $this->db->query("SELECT allianceID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND allianceID != 0 GROUP BY allianceID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->alliances->getAllByID($data[$key]["id"])["allianceName"];

        render("", $data, null, $this->contentType);
    }


    public function top10ShipTypes()
    {
        $data = $this->db->query("SELECT shipTypeID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND shipTypeID != 0 GROUP BY shipTypeID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->invTypes->getNameByID($data[$key]["id"]);

        render("", $data, null, $this->contentType);
    }


    public function top10SolarSystems()
    {
        $data = $this->db->query("SELECT solarSystemID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND solarSystemID != 0 GROUP BY solarSystemID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->mapSolarSystems->getNameByID($data[$key]["id"]);

        render("", $data, null, $this->contentType);
    }


    public function top10Regions()
    {
        $data = $this->db->query("SELECT regionID AS id, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND regionID != 0 GROUP BY regionID ORDER BY count DESC LIMIT 10");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->mapRegions->getRegionNameByRegionID($data[$key]["id"]);

        render("", $data, null, $this->contentType);
    }
    
    public function mostValuableKillsLast7Days()
    {
        $data = $this->db->query("SELECT killID, characterID, shipValue FROM participants WHERE killTime >= DATE_SUB(NOW(), interval 7 day) AND isVictim = 1 ORDER BY shipValue DESC LIMIT 5");
        foreach($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getAllByID($data[$key]["characterID"])["characterName"];

        render("", $data, null, $this->contentType);
    }
    
    public function sevenDayKillCount()
    {
        $data = $this->db->query("SELECT COUNT(*) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND isVictim = 1");
        render("", $data, null, $this->contentType);
    }

    public function currentlyActiveCharacters()
    {
        $data = $this->db->query("SELECT COUNT(DISTINCT(characterID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        render("", $data, null, $this->contentType);
    }

    public function currentlyActiveCorporations()
    {
        $data = $this->db->query("SELECT COUNT(DISTINCT(corporationID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        render("", $data, null, $this->contentType);
    }

    public function currentlyActiveAlliances()
    {
        $data = $this->db->query("SELECT COUNT(DISTINCT(allianceID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        render("", $data, null, $this->contentType);
    }

    public function currentlyActiveShipTypes()
    {
        $data = $this->db->query("SELECT COUNT(DISTINCT(shipTypeID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        render("", $data, null, $this->contentType);
    }

    public function currentlyActiveSolarSystems()
    {
        $data = $this->db->query("SELECT COUNT(DISTINCT(solarSystemID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        render("", $data, null, $this->contentType);
    }
}