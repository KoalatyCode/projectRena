<?php
namespace ProjectRena\Model\Database\Site;

use ProjectRena\RenaApp;

/**
 * Searches for items, characters, corps etc. in the entire database and returns an array with what it has found
 */
class Search
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
    }

    /**
     * @param $searchTerm
     * @param array $searchIn array("faction", "alliance", "corporation", "character", "item", "system", "region", "celestial")
     * @param integer $limit
     *
     * @return array
     */
    public function search($searchTerm, $searchIn = array("faction", "alliance", "corporation", "character", "item", "system", "region", "celestial"), $limit = 5)
    {
        $valid = array("faction", "alliance", "corporation", "character", "item", "system", "region", "celestial");
        $searchArray = array();

        // If it's not an array, we only need to make it into an array - silly i know, but whatever
        if(!is_array($searchIn))
            $searchIn = array($searchIn);

        foreach ($searchIn as $lookIn)
            if(in_array($lookIn, $valid)) {
                // Only do a single lookup, not two as before..
                $singleSearch = $this->$lookIn($searchTerm, 1);
                $multiSearch = $this->$lookIn("%" . $searchTerm . "%", $limit);

                // Look for multiple results before going with one
                if(count($multiSearch) >= 1)
                    $searchArray[$lookIn] = $multiSearch;
                else
                    $searchArray[$lookIn] = $singleSearch;
            }

        return $searchArray;
    }

    private function faction($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT factionID, factionName FROM factions WHERE (factionName LIKE :searchTerm OR factionTicker LIKE :searchTerm) LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function alliance($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT allianceID, allianceName, allianceTicker FROM alliances WHERE (allianceName LIKE :searchTerm OR allianceTicker LIKE :searchTerm) LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function corporation($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT corporationID, corporationName, corpTicker FROM corporations WHERE (corporationName LIKE :searchTerm OR corpTicker LIKE :searchTerm) LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function character($searchTerm, $limit = 5)
    {
        if($limit == 1)
            return $this->db->query("SELECT characterID, characterName FROM characters WHERE characterName LIKE :searchTerm LIMIT 1", array(":searchTerm" => $searchTerm));
        else
            return $this->db->query("SELECT characterID, characterName FROM characters WHERE MATCH(characterName) AGAINST(:searchTerm) LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function item($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT typeID, typeName FROM invTypes WHERE typeName LIKE :searchTerm LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function system($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT solarSystemID, solarSystemName FROM mapSolarSystems WHERE solarSystemName LIKE :searchTerm LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function region($searchTerm, $limit = 5)
    {
        return $this->db->query("SELECT regionID, regionName FROM mapRegions WHERE regionName LIKE :searchTerm LIMIT {$limit}", array(":searchTerm" => $searchTerm));
    }

    private function celestial($searchTerm)
    {
        return $this->db->query("SELECT itemID, itemName, solarSystemName, solarSystemID FROM mapAllCelestials WHERE (itemName LIKE :searchTerm OR solarSystemName LIKE :searchTerm)", array(":searchTerm" => $searchTerm));
    }
}
