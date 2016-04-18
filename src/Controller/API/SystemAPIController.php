<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class SystemAPIController
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

    public function systemInformation($solarSystemID)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $data = $this->app->mapSolarSystems->getAllByID($solarSystemID);
        render("", $data, null, $this->contentType);
    }

    public function findSystem($searchTerm)
    {
        $results = $this->app->Search->search($searchTerm, "system");
        render("", $results, null, $this->contentType);
    }

    public function topCharacters($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT characterID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY characterID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getNameByID($value["characterID"]);

        render("", $data, null, $this->contentType);
    }

    public function topCorporations($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT corporationID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY corporationID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getNameByID($value["corporationID"]);

        render("", $data, null, $this->contentType);
    }

    public function topAlliances($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT allianceID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY allianceID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["allianceName"] = $this->app->alliances->getNameByID($value["allianceID"]);

        render("", $data, null, $this->contentType);
    }


    public function topShips($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT shipTypeID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY shipTypeID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["shipName"] = $this->app->invTypes->getNameByID($value["shipTypeID"]);

        render("", $data, null, $this->contentType);
    }


    public function topSystems($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }

    public function topRegions($solarSystemID, $limit)
    {
        if (!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT regionID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY regionID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach ($data as $key => $value)
            $data[$key]["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($value["regionID"]);

        render("", $data, null, $this->contentType);
    }

    // @TODO gotta add a field to participants where the nearest location is stored (as an ID referencing mapAllCelestials)
    /*public function topLocations($solarSystemID, $limit)
    {
            if(!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");
    
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE solarSystemID = :solarSystemID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":solarSystemID" => $solarSystemID));
        foreach($data as $key => $value)
            $data[$key]["locationName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }*/
}