<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class KillsAPIController
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

    private function validateParameters($parameters, $argumentToRemove = null)
    {
        $validArguments = array(
            "killID" => "int",
            "killTime" => "datetime",
            "solarSystemID" => "int",
            "regionID" => "int",
            "characterID" => "int",
            "corporationID" => "int",
            "allianceID" => "int",
            "factionID" => "int",
            "shipTypeID" => "int",
            "groupID" => "int",
            "vGroupID" => "int",
            "weaponTypeID" => "int",
            "shipValue" => "float",
            "damageDone" => "int",
            "totalValue" => "float",
            "pointValue" => "int",
            "numberInvolved" => "int",
            "isVictim" => "int",
            "finalBlow" => "int",
            "isNPC" => "int",
        );

        // Remove an argument from the valid arguments
        if (!empty($argumentToRemove))
            unset($validArguments[$argumentToRemove]);

        $returnArray = array();
        foreach ($parameters as $key => $value) {
            foreach ($validArguments as $arg => $type) {
                if ($key == $arg) {
                    switch ($type) {
                        case "int":
                            if (!is_numeric($value))
                                throw new \Exception("Error, {$key} is not an integer");
                            break;
                        case "float":
                            if (!is_float($value))
                                throw new \Exception("Error, {$key} is not a float");
                            break;
                        case "datetime":
                            if ($this->app->participants->verifyDate($value) == false)
                                throw new \Exception("Error, {key} is not a valid timestamp (Y-m-d H:i:s)");
                            break;
                    }

                    // Everything passed inspection
                    $returnArray[$key] = $value;
                }
            }
        }
        
        return $returnArray;
    }

    private function urlToArrayConverter($parameters) {
        $count = 0;
        $returnArray = array();
        foreach($parameters as $param)
        {
            // We don't want empty parameters
            if(empty($param))
                continue;

            // If the number is even it'll be false, if it's odd it'll be true
            if($count % 2 == false)
                $returnArray[$param] = $parameters[$count + 1];

            // Increment count..
            $count++;
        }

        return $returnArray;
    }

    public function solarSystemKills($solarSystemID, $parameters) {
        if(!is_numeric($solarSystemID))
            throw new \Exception("Error solarSystemID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "solarSystemID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getBySolarSystemID($solarSystemID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function regionKills($regionID, $parameters) {
        if(!is_numeric($regionID))
            throw new \Exception("Error regionID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "regionID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByRegionID($regionID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function characterKills($characterID, $parameters) {
        if(!is_numeric($characterID))
            throw new \Exception("Error characterID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "characterID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByCharacterID($characterID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function corporationKills($corporationID, $parameters) {
        if(!is_numeric($corporationID))
            throw new \Exception("Error corporationID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "corporationID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByCorporationID($corporationID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function allianceKills($allianceID, $parameters) {
        if(!is_numeric($allianceID))
            throw new \Exception("Error allianceID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "allianceID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByAllianceID($allianceID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function factionKills($factionID, $parameters) {
        if(!is_numeric($factionID))
            throw new \Exception("Error factionID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "factionID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByFactionID($factionID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function shipTypeKills($shipTypeID, $parameters) {
        if(!is_numeric($shipTypeID))
            throw new \Exception("Error shipTypeID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "shipTypeID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByShipTypeID($shipTypeID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function groupKills($groupID, $parameters) {
        if(!is_numeric($groupID))
            throw new \Exception("Error groupID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "groupID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByGroupID($groupID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function vGroupKills($vGroupID, $parameters) {
        if(!is_numeric($vGroupID))
            throw new \Exception("Error vGroupID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "vGroupID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByVGroupID($vGroupID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function weaponTypeKills($weaponTypeID, $parameters) {
        if(!is_numeric($weaponTypeID))
            throw new \Exception("Error weaponTypeID is not an integer");

        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters, "weaponTypeID");

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getByWeaponTypeID($weaponTypeID, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function afterDateKills($afterDate, $parameters) {
        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters);

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getAllKillsAfterDate($afterDate, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function beforeDateKills($beforeDate, $parameters) {
        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters);

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getAllKillsBeforeDate($beforeDate, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }

    public function betweenDateKills($afterDate, $beforeDate, $parameters) {
        // Convert the url to an array of parameters
        $parameters = $this->urlToArrayConverter($parameters);

        // Get the limit, order and offset before we validate the parameters
        $limit = isset($parameters["limit"]) ? (int) $parameters["limit"] > 100 ? 100 : (int) $parameters["limit"] : 100;
        $order = isset($parameters["order"]) ? strtolower($parameters["order"]) == "asc" ? "asc" : "desc" : "desc";
        $offset = isset($parameters["offset"]) ? (int) $parameters["offset"] : null;

        // Validate the parameters
        $parameters = $this->validateParameters($parameters);

        // Fetch all the killIDs (and everything else too apparently, should probably cut it down?)
        $killIDs = $this->app->participants->getAllKillsBetweenDates($afterDate, $beforeDate, $parameters, $limit, 3600, $order, $offset, "killID");

        // Fetch all the JSON data for all the killIDs
        $ids = array();
        foreach($killIDs as $killID)
            $ids[] = $killID["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($ids);

        render("", $data, null, $this->contentType);
    }
}