<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class ItemAPIController
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

    public function itemInformation($itemID)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $data = $this->app->invTypes->getAllByID($itemID);
        render("", $data, null, $this->contentType);
    }

    public function findItem($searchTerm)
    {
        $results = $this->app->Search->search($searchTerm, "item");
        render("", $results, null, $this->contentType);
    }

    public function topCharacters($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT characterID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY characterID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["characterName"] = $this->app->characters->getNameByID($value["characterID"]);

        render("", $data, null, $this->contentType);
    }

    public function topCorporations($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT corporationID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY corporationID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["corporationName"] = $this->app->corporations->getNameByID($value["corporationID"]);

        render("", $data, null, $this->contentType);
    }

    public function topAlliances($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT allianceID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY allianceID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["allianceName"] = $this->app->alliances->getNameByID($value["allianceID"]);

        render("", $data, null, $this->contentType);
    }


    public function topShips($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT shipTypeID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY shipTypeID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["shipName"] = $this->app->invTypes->getNameByID($value["shipTypeID"]);

        render("", $data, null, $this->contentType);
    }


    public function topSystems($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }

    public function topRegions($itemID, $limit)
    {
        if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");

        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT regionID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID) GROUP BY regionID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach ($data as $key => $value)
            $data[$key]["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($value["regionID"]);

        render("", $data, null, $this->contentType);
    }

    // @TODO gotta add a field to participants where the nearest location is stored (as an ID referencing mapAllCelestials)
    /*public function topLocations($itemID, $limit)
    {
            if (!is_numeric($itemID))
            throw new \Exception("Error, the input itemID is not a valid integer");
    
        $limit = is_numeric($limit) ? $limit : 10;
        $data = $this->db->query("SELECT solarSystemID, COUNT(killID) AS kills FROM participants WHERE (shipTypeID = :itemID OR weaponTypeID = :itemID GROUP BY solarSystemID ORDER BY kills DESC LIMIT {$limit}", array(":itemID" => $itemID));
        foreach($data as $key => $value)
            $data[$key]["locationName"] = $this->app->mapSolarSystems->getNameByID($value["solarSystemID"]);

        render("", $data, null, $this->contentType);
    }*/
}