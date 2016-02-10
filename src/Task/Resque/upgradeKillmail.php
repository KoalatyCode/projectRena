<?php
namespace ProjectRena\Task\Resque;

use ProjectRena\RenaApp;
use ZMQ;
use ZMQContext;


/**
 * Upgrades the killjson in killmails to contain a load of extra information, meaning less querying happening on the frontend
 */
class upgradeKillmail
{

    /**
     * The Slim Application
     */

    /** @var RenaApp $app */
    private $app;

    /**
     * Performs the task, can access all $this->crap setup in setUp)
     */

    public function perform()
    {
        $killID = $this->args["killID"];

        if (!$killID)
            exit;

        // Make sure it hasn't already been upgraded, if it has, exit.. this could happen if it's behind and the cron has already thrown more into the queue..
        $upgraded = $this->app->Db->queryField("SELECT upgraded FROM killmails WHERE killID = :killID", "upgraded", array(":killID" => $killID), 0);
        if ($upgraded == 1)
            exit;

        // Fetch the killmail data and lets get going with upgrading it!
        $killData = $this->app->Db->queryRow("SELECT * FROM killmails WHERE killID = :killID", array(":killID" => $killID), 0);
        $killHash = $killData["hash"];
        $killData = json_decode($killData["kill_json"], true);

        // refetch it from CREST unless CREST bugs out
        $killMail = json_decode($this->app->cURL->getData("https://public-crest.eveonline.com/killmails/{$killID}/{$killHash}/"), true);
        $killData = $this->app->CrestFunctions->generateFromCREST(array("killID" => $killID, "killmail" => $killMail));

        // Image server url
        $imageServer = $this->app->baseConfig->getConfig("imageServer", "ccp", "https://image.eveonline.com/");

        // The new killdata array that we will be building
        $nk = array();

        $nk["killID"] = (int)$killData["killID"];
        $nk["killTime"] = $killData["killTime"];

        // Lets make sure that the data in question actually works, if it doesn't we'll just continue and leave it be for later.. (Could be CREST fucking up, who knows..
        if($nk["killTime"] == "")
            exit;

        $nk["solarSystemID"] = (int)$killData["solarSystemID"];
        $nk["solarSystemName"] = $this->app->mapSolarSystems->getNameByID($killData["solarSystemID"]);
        $nk["regionID"] = (int)$this->app->mapSolarSystems->getRegionIDByID($killData["solarSystemID"]);
        $nk["regionName"] = $this->app->mapRegions->getRegionNameByRegionID($nk["regionID"]);
        $nk["near"] = $this->getNear($killData["victim"]["x"], $killData["victim"]["y"], $killData["victim"]["z"], $killData["solarSystemID"]);
        $nk["x"] = (float)$killData["victim"]["x"];
        $nk["y"] = (float)$killData["victim"]["y"];
        $nk["z"] = (float)$killData["victim"]["z"];
        $nk["moonID"] = (int)$killData["moonID"];
        $killValues = $this->app->Prices->calculateKillValue($killData);
        $nk["shipValue"] = (float)$killValues["shipValue"];
        $nk["fittingValue"] = (float)$killValues["itemValue"];
        $nk["totalValue"] = (float)$killValues["totalValue"];
        $nk["dna"] = $this->getDNA($killData["items"], $killData["victim"]["shipTypeID"]);

        // Victim Data
        $nk["victim"]["x"] = (float)$killData["victim"]["x"];
        $nk["victim"]["y"] = (float)$killData["victim"]["y"];
        $nk["victim"]["z"] = (float)$killData["victim"]["z"];
        $nk["victim"]["shipTypeID"] = (int)$killData["victim"]["shipTypeID"];
        $nk["victim"]["shipTypeName"] = $this->app->invTypes->getNameByID($killData["victim"]["shipTypeID"]);
        $nk["victim"]["shipImageURL"] = $imageServer . "Type/" . $killData["victim"]["shipTypeID"] . "_32.png";
        $nk["victim"]["damageTaken"] = (int)$killData["victim"]["damageTaken"];
        $nk["victim"]["characterID"] = (int)$killData["victim"]["characterID"];
        $nk["victim"]["characterName"] = $killData["victim"]["characterName"];
        $nk["victim"]["characterImageURL"] = $imageServer . "Character/" . $killData["victim"]["characterID"] . "_128.jpg";
        $nk["victim"]["corporationID"] = (int)$killData["victim"]["corporationID"];
        $nk["victim"]["corporationName"] = $killData["victim"]["corporationName"];
        $nk["victim"]["corporationImageURL"] = $imageServer . "Corporation/" . $killData["victim"]["corporationID"] . "_128.png";
        $nk["victim"]["allianceID"] = (int)$killData["victim"]["allianceID"];
        $nk["victim"]["allianceName"] = $killData["victim"]["allianceName"];
        $nk["victim"]["allianceImageURL"] = $imageServer . "Alliance/" . $killData["victim"]["allianceID"] . "_128.png";
        $nk["victim"]["factionID"] = (int)$killData["victim"]["factionID"];
        $nk["victim"]["factionName"] = $killData["victim"]["factionName"];
        $nk["victim"]["factionImageURL"] = $imageServer . "Alliance/" . $killData["victim"]["factionID"] . "_128.png";

        // Attacker data upgrade
        foreach ($killData["attackers"] as $attacker) {
            $inner = array();
            $inner["characterID"] = (int)$attacker["characterID"];
            $inner["characterName"] = $attacker["characterName"];
            $inner["characterImageURL"] = $imageServer . "Character/" . $attacker["characterID"] . "_128.jpg";
            $inner["corporationID"] = (int)$attacker["corporationID"];
            $inner["corporationName"] = $attacker["corporationName"];
            $inner["corporationImageURL"] = $imageServer . "Corporation/" . $attacker["corporationID"] . "_128.png";
            $inner["allianceID"] = (int)$attacker["allianceID"];
            $inner["allianceName"] = $attacker["allianceName"];
            $inner["allianceImageURL"] = $imageServer . "Alliance/" . $attacker["allianceID"] . "_128.png";
            $inner["factionID"] = (int)$attacker["factionID"];
            $inner["factionName"] = $attacker["factionName"];
            $inner["factionImageURL"] = $imageServer . "Alliance/" . $attacker["factionID"] . "_128.png";
            $inner["securityStatus"] = (float)$attacker["securityStatus"];
            $inner["damageDone"] = (int)$attacker["damageDone"];
            $inner["finalBlow"] = (int)$attacker["finalBlow"];
            $inner["weaponTypeID"] = (int)$attacker["weaponTypeID"];
            $inner["weaponTypeName"] = $this->app->invTypes->getNameByID($attacker["weaponTypeID"]);
            $inner["weaponImageURL"] = $imageServer . "Type/" . $attacker["weaponTypeID"] . "_32.png";
            $inner["shipTypeID"] = (int)$attacker["shipTypeID"];
            $inner["shipTypeName"] = $this->app->invTypes->getNameByID($attacker["shipTypeID"]);
            $inner["shipImageURL"] = $imageServer . "Type/" . $attacker["shipTypeID"] . "_32.png";

            $nk["attackers"][] = $inner;
        }

        // Item data upgrade
        foreach ($killData["items"] as $item) {
            $inner = array();
            $inner["typeID"] = (int)$item["typeID"];
            $inner["typeName"] = $this->app->invTypes->getNameByID($item["typeID"]);
            $inner["typeImageURL"] = $imageServer . "Type/" . $item["typeID"] . "_32.png";
            $inner["groupID"] = $this->app->invTypes->getGroupIDByID($item["typeID"]);
            $inner["categoryID"] = $this->app->Db->queryField("SELECT categoryID FROM invGroups WHERE groupID = :groupID", "categoryID", array(":groupID" => $inner["groupID"]));
            $inner["flag"] = (int)$item["flag"];
            $inner["qtyDropped"] = (int)$item["qtyDropped"];
            $inner["qtyDestroyed"] = (int)$item["qtyDestroyed"];
            $inner["singleton"] = (int)$item["singleton"];
            $inner["value"] = (float)$this->app->Prices->getPriceForTypeID($item["typeID"]);

            $nk["items"][] = $inner;
        }

        // Osmium fitting information
        // URL: https://o.smium.org/api/json/loadout/dna/attributes/loc:ship,a:hiSlots,a:medSlots,a:lowSlots,a:upgradeSlotsLeft,a:tank,a:ehpAndResonances,a:capacitors,a:damage?input=17703:12563;2:31490;2:2605;2:5973;1:3041;2:1999;2:31442;1:3244;1:2048;1::
        // Need to get max DPS with stock ammo, just gotta load some ammo into it - must be a way to determine what to load
        $osmiumData = array();

        if (!empty($nk["items"])) // @todo fix so that osmium can actually go down without this going apeshit.. try/catch or something..
            $osmiumData = json_decode($this->app->cURL->getData("https://o.smium.org/api/json/loadout/dna/attributes/loc:ship,a:tank,a:ehpAndResonances,a:capacitors,a:damage?input=" . $nk["dna"]), true);

        $nk["osmium"] = $osmiumData;

        // generate new JSON
        $jsonData = json_encode($nk, JSON_NUMERIC_CHECK);

        // Update the data in the database
        $this->app->Db->execute("UPDATE killmails SET kill_json = :json, upgraded = 1 WHERE killID = :killID", array(":json" => $jsonData, ":killID" => $killID));

        // Push it over zmq to the websocket
        $context = new ZMQContext();
        $socket = $context->getSocket(ZMQ::SOCKET_PUSH, "rena");
        $socket->connect("tcp://localhost:5555");
        $socket->send($jsonData);

        // Call the killmail parser
        \Resque::enqueue("turbo", "\\ProjectRena\\Task\\Resque\\killmailParser", array("killID" => $killID));
    }

    private function getNear($x, $y, $z, $solarSystemID)
    {
        $data = $this->app->Db->queryRow("SELECT TRUNCATE(SQRT(POW(:x - x, 2) + POW(:y - y, 2) + POW(:z - z, 2)), 2) AS distance, typeID, itemName, itemID, typeName, solarSystemName, regionID, regionName FROM mapAllCelestials WHERE solarSystemID = :solarSystemID ORDER BY distance ASC", array(":x" => $x, ":y" => $y, ":z" => $z, ":solarSystemID" => $solarSystemID));

        // Types
        $types = array("Stargate", "Moon", "Planet", "Asteroid Belt", "Sun");
        foreach ($types as $type) {
            if (isset($data["typeName"])) {
                if (strpos($data["typeName"], $type) !== false) {
                    $string = $type;
                    $string .= " (";
                    $string .= isset($data["itemName"]) ? $data["itemName"] : $data["solarSystemName"];
                    $string .= ")";

                    return $string;
                }
            }
        }
    }

    private function getDNA($itemData = array(), $shipTypeID)
    {
        $slots = array("LoSlot0", "LoSlot1", "LoSlot2", "LoSlot3", "LoSlot4", "LoSlot5", "LoSlot6", "LoSlot7", "MedSlot0", "MedSlot1", "MedSlot2", "MedSlot3", "MedSlot4", "MedSlot5", "MedSlot6", "MedSlot7", "HiSlot0", "HiSlot1", "HiSlot2", "HiSlot3", "HiSlot4", "HiSlot5", "HiSlot6", "HiSlot7", "DroneBay", "RigSlot0", "RigSlot1", "RigSlot2", "RigSlot3", "RigSlot4", "RigSlot5", "RigSlot6", "RigSlot7", "SubSystem0", "SubSystem1", "SubSystem2", "SubSystem3", "SubSystem4", "SubSystem5", "SubSystem6", "SubSystem7", "SpecializedFuelBay");
        $fittingArray = array();
        $fittingString = $shipTypeID . ":";

        foreach ($itemData as $item) {
            $flagName = $this->app->invFlags->getFlagNameByID($item["flag"]);

            if (in_array($flagName, $slots) || @$item["categoryID"] == 8) {
                if (isset($fittingArray[$item["typeID"]]))
                    $fittingArray[$item["typeID"]]["count"] = $fittingArray[$item["typeID"]]["count"] + (@$item["qtyDropped"] + @$item["qtyDestroyed"]);
                else
                    $fittingArray[$item["typeID"]] = array("count" => (@$item["qtyDropped"] + @$item["qtyDestroyed"]));
            }
        }

        foreach ($fittingArray as $key => $item)
            $fittingString .= "$key;" . $item["count"] . ":";

        $fittingString .= ":";

        return $fittingString;
    }

    /**
     * Sets up the task (Setup $this->crap and such here)
     */

    public function setUp()
    {
        $this->app = RenaApp::getInstance();
    }

    /**
     * Tears the task down, unset $this->crap and such
     */

    public function tearDown()
    {
        $this->app = null;
    }
}
