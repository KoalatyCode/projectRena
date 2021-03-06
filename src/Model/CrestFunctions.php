<?php
namespace ProjectRena\Model;

use DateTime;
use ProjectRena\RenaApp;


/**
 * Generates a CREST hash based on the killmail in question
 */
class CrestFunctions
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
     * Validates a CREST URL
     *
     * @param $url
     * @return string
     */
    public function validateCRESTLink($url)
    {
        // Check it's actually a URL
        if(!filter_var($url, FILTER_VALIDATE_URL) === false) {
            preg_match("/^https:\/\/public-crest.eveonline.com\/killmails\/[0-9]*\/[a-zA-Z0-9]*\//", $url, $out);
            if(isset($out[0])) {
                return $out[0];
            }
        }
        return "Error, link is not valid";
    }

    /**
     * Throw the CREST URL after the crestKillmailFetcher, so it'll be processed
     * 
     * @param $url
     */
    public function postCRESTMail($url)
    {
        \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\crestKillmailFetcher", array("url" => $url, "warID" => null));
    }
    
    /**
     * Generates a CREST hash based on the killmail data
     * @param $killData
     * @return string
     */
    public function generateCRESTHash($killData)
    {
        $victim = $killData["victim"];
        $victimID = $victim["characterID"] == 0 ? "None" : $victim["characterID"];
        $shipTypeID = $victim["shipTypeID"];

        $attackers = $killData["attackers"];
        $attacker = null;
        if ($attackers != null)
            foreach ($attackers as $attackerData)
                if ($attackerData["finalBlow"] != 0)
                    $attacker = $attackerData;

        if ($attacker == null)
            $attacker = $attackers[0];

        $attackerID = $attacker["characterID"] == 0 ? "None" : $attacker["characterID"];
        $killDate = (strtotime($killData["killTime"]) * 10000000) + 116444736000000000;
        return sha1("$victimID$attackerID$shipTypeID$killDate");
    }

    /**
     * Generates an array of killmail data from CREST's data
     * @param $crestData
     * @return array
     */
    public function generateFromCREST($crestData)
    {
        $killArray = array();
        $killArray["killID"] = (int)$crestData["killID"];

        // Fix the timestamp
        $killTime = $crestData["killmail"]["killTime"];
        if (stristr($crestData["killmail"]["killTime"], ".")) {
            $date = DateTime::createFromFormat("Y.m.d H:i:s", $crestData["killmail"]["killTime"]);
            $killTime = $date->format("Y-m-d H:i:s");
        }

        $killArray["solarSystemID"] = (int)$crestData["killmail"]["solarSystem"]["id"];
        $killArray["killTime"] = (string)$killTime;
        $killArray["moonID"] = (int)@$crestData["killmail"]["moonID"] ? $crestData["killmail"]["moonID"] : 0;

        $killArray["victim"] = $this->getVictim($crestData["killmail"]["victim"]);
        $killArray["attackers"] = $this->getAttackers($crestData["killmail"]["attackers"]);
        $killArray["items"] = $this->getItems($crestData["killmail"]["victim"]["items"]);

        return $killArray;
    }

    /**
     * Generates a victim array, from CREST data
     * @param $victim
     * @return array
     */
    private function getVictim($victim)
    {
        $victimData = array();
        $victimData["shipTypeID"] = (int)$victim["shipType"]["id"];
        $victimData["characterID"] = (int)@$victim["character"]["id"];
        $victimData["characterName"] = (string)@$victim["character"]["name"];
        $victimData["corporationID"] = (int)$victim["corporation"]["id"];
        $victimData["corporationName"] = (string)@$victim["corporation"]["name"];
        $victimData["allianceID"] = (int)@$victim["alliance"]["id"];
        $victimData["allianceName"] = (string)@$victim["alliance"]["name"];
        $victimData["factionID"] = (int)@$victim["faction"]["id"];
        $victimData["factionName"] = (string)@$victim["faction"]["name"];
        $victimData["damageTaken"] = (int)@$victim["damageTaken"];
        $victimData["x"] = (float)@$victim["position"]["x"];
        $victimData["y"] = (float)@$victim["position"]["y"];
        $victimData["z"] = (float)@$victim["position"]["z"];

        return $victimData;
    }

    /**
     * Generates an array of attackers, from CREST data
     * @param $attackers
     * @return array
     */
    private function getAttackers($attackers)
    {
        $aggressors = array();

        if (is_array($attackers)) {
            foreach ($attackers as $attacker) {
                $aggressor = array();
                $aggressor["characterID"] = (int)@$attacker["character"]["id"];
                $aggressor["characterName"] = (string)@$attacker["character"]["name"];
                $aggressor["corporationID"] = (int)@$attacker["corporation"]["id"];
                $aggressor["corporationName"] = (string)@$attacker["corporation"]["name"];
                $aggressor["allianceID"] = (int)@$attacker["alliance"]["id"];
                $aggressor["allianceName"] = (string)@$attacker["alliance"]["name"];
                $aggressor["factionID"] = (int)@$attacker["faction"]["id"];
                $aggressor["factionName"] = (string)@$attacker["faction"]["name"];
                $aggressor["securityStatus"] = (float)@$attacker["securityStatus"];
                $aggressor["damageDone"] = (int)@$attacker["damageDone"];
                $aggressor["finalBlow"] = (int)@$attacker["finalBlow"];
                $aggressor["weaponTypeID"] = (int)@$attacker["weaponType"]["id"];
                $aggressor["shipTypeID"] = (int)@$attacker["shipType"]["id"];
                $aggressors[] = $aggressor;
            }
        }

        return $aggressors;
    }

    /**
     * Generates an item array from crest item list
     * @param $items
     * @return array
     */
    private function getItems($items)
    {
        $itemsArray = array();

        if (is_array($items)) {
            foreach ($items as $item) {
                $i = array();
                $i["typeID"] = (int)@$item["itemType"]["id"];
                $i["flag"] = (int)@$item["flag"];
                $i["qtyDropped"] = (int)@$item["quantityDropped"];
                $i["qtyDestroyed"] = (int)@$item["quantityDestroyed"];
                $i["singleton"] = (int)@$item["singleton"];
                if (isset($i["items"]))
                    $i["items"] = $this->getItems($i["items"]);

                $itemsArray[] = $i;
            }
        }

        return $itemsArray;
    }
}
