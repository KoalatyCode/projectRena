<?php
namespace ProjectRena\Model\Database\EVE;

use ProjectRena\RenaApp;


/**
 * CRUD model for the Participants table
 */
class participants
{

    /**
     * The Slim Application
     */

    private $app;

    /**
     * The database connection
     */
    private $db;

    /**
     * @param RenaApp $app
     */

    public function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->db = $app->Db;
    }


    /**
     * @param $killID
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param null $offset
     * @return array|bool
     * @throws \Exception
     */
    public function getByKillID($killID, $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null)
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments(array(), $offset, $limit, $order);
        $vQuery = $validated["queryString"];

        // Merge the arrays
        $array = array(":killID" => $killID);
        $query = "SELECT * FROM participants WHERE killID = :killID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param array $extraArguments
     * @param null $offset
     * @param int $limit
     * @param string $order
     * @param string $groupBy
     * @return array
     */
    private function verifyExtraArguments($extraArguments = array(), $offset = null, $limit = 100, $order = "DESC", $groupBy = "killID")
    {
        $queryString = "";
        $argumentArray = array();
        // Valid extra arguments
        $validArguments = array(
            "killID",
            "killTime",
            "solarSystemID",
            "regionID",
            "characterID",
            "corporationID",
            "allianceID",
            "factionID",
            "shipTypeID",
            "groupID",
            "vGroupID",
            "weaponTypeID",
            "shipValue",
            "damageDone",
            "totalValue",
            "pointValue",
            "numberInvolved",
            "isVictim",
            "finalBlow",
            "isNPC",
        );

        if (!empty($extraArguments)) {
            foreach ($validArguments as $argument) {
                if (isset($extraArguments[$argument])) {
                    $queryString .= " AND $argument = :$argument";
                    $argumentArray[":" . $argument] = $extraArguments[$argument];
                }
            }
        }

        if ($offset > 0) $limit = "$offset, $limit ";
        if($groupBy) $queryString .= " GROUP BY $groupBy";
        $queryString .= " ORDER BY killTime $order LIMIT $limit";

        return array("queryString" => $queryString, "argumentArray" => $argumentArray);
    }

    /**
     * @param $killTime
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByKillTime($killTime, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":killTime" => $killTime), $vArray);
        $query = "SELECT * FROM participants WHERE killTime = :killTime" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $solarSystemID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getBySolarSystemID($solarSystemID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":solarSystemID" => $solarSystemID), $vArray);
        $query = "SELECT * FROM participants WHERE solarSystemID = :solarSystemID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $regionID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByRegionID($regionID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":regionID" => $regionID), $vArray);
        $query = "SELECT * FROM participants WHERE regionID = :regionID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $characterID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByCharacterID($characterID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":characterID" => $characterID), $vArray);
        $query = "SELECT * FROM participants WHERE characterID = :characterID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $corporationID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByCorporationID($corporationID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":corporationID" => $corporationID), $vArray);
        $query = "SELECT * FROM participants WHERE corporationID = :corporationID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $allianceID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByAllianceID($allianceID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":allianceID" => $allianceID), $vArray);
        $query = "SELECT * FROM participants WHERE allianceID = :allianceID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $factionID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByFactionID($factionID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":factionID" => $factionID), $vArray);
        $query = "SELECT * FROM participants WHERE factionID = :factionID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $shipTypeID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByShipTypeID($shipTypeID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":shipTypeID" => $shipTypeID), $vArray);
        $query = "SELECT * FROM participants WHERE shipTypeID = :shipTypeID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $groupID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByGroupID($groupID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":groupID" => $groupID), $vArray);
        $query = "SELECT * FROM participants WHERE groupID = :groupID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $vGroupID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByVGroupID($vGroupID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":vGroupID" => $vGroupID), $vArray);
        $query = "SELECT * FROM participants WHERE vGroupID = :vGroupID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param $weaponTypeID
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getByWeaponTypeID($weaponTypeID, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":weaponTypeID" => $weaponTypeID), $vArray);
        $query = "SELECT * FROM participants WHERE weaponTypeID = :weaponTypeID" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param null $afterDate
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getAllKillsAfterDate($afterDate = null, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        if($afterDate == null)
            $afterDate = date("Y-m-d H:i:s");

        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":afterDate" => $afterDate), $vArray);
        $query = "SELECT * FROM participants WHERE killTime >= :afterDate" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param null $beforeDate
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getAllKillsBeforeDate($beforeDate = null, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        if($beforeDate == null)
            $beforeDate = date("Y-m-d H:i:s");

        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":beforeDate" => $beforeDate), $vArray);
        $query = "SELECT * FROM participants WHERE killTime <= :beforeDate" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param null $beforeDate
     * @param null $afterDate
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param integer|null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getAllKillsBetweenDates($afterDate = null, $beforeDate = null, $extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        if($afterDate == null)
            $afterDate = date("Y-m-d H:i:s");

        if($beforeDate == null)
            $beforeDate = date("Y-m-d H:i:s");

        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $vArray = $validated["argumentArray"];

        // Merge the arrays
        $array = array_merge(array(":afterDate" => $afterDate, ":beforeDate" => $beforeDate), $vArray);
        $query = "SELECT * FROM participants WHERE killTime >= :afterDate AND killTime <= :beforeDate" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param array $extraArguments
     * @param int $limit
     * @param int $cacheTime
     * @param string $order
     * @param null $offset
     * @param string $groupBy
     * @return array|bool
     * @throws \Exception
     */
    public function getAllKills($extraArguments = array(), $limit = 100, $cacheTime = 3600, $order = "DESC", $offset = null, $groupBy = "killID")
    {
        // Validate extraArguments
        $validated = $this->verifyExtraArguments($extraArguments, $offset, $limit, $order, $groupBy);
        $vQuery = $validated["queryString"];
        $array = $validated["argumentArray"];

        // Merge the arrays
        $query = "SELECT * FROM participants" . $vQuery;

        // Execute the query
        return $this->db->query($query, $array, $cacheTime);
    }

    /**
     * @param int $allianceID
     * @return array|bool
     */

    public function getAllByAllianceID($allianceID)
    {
        return $this->db->query("SELECT * FROM participants WHERE allianceID = :allianceID", array(":allianceID" => $allianceID));
    }

    /**
     * @param int $characterID
     * @return array|bool
     */

    public function getAllByCharacterID($characterID)
    {
        return $this->db->query("SELECT * FROM participants WHERE characterID = :characterID", array(":characterID" => $characterID));
    }

    /**
     * @param int $corporationID
     * @return array|bool
     */

    public function getAllByCorporationID($corporationID)
    {
        return $this->db->query("SELECT * FROM participants WHERE corporationID = :corporationID", array(":corporationID" => $corporationID));
    }

    /**
     * @param int $factionID
     * @return array|bool
     */

    public function getAllByFactionID($factionID)
    {
        return $this->db->query("SELECT * FROM participants WHERE factionID = :factionID", array(":factionID" => $factionID));
    }

    /**
     * @param int $groupID
     * @return array|bool
     */

    public function getAllByGroupID($groupID)
    {
        return $this->db->query("SELECT * FROM participants WHERE groupID = :groupID", array(":groupID" => $groupID));
    }

    /**
     * @param int $killID
     * @return array|bool
     */

    public function getAllByKillID($killID)
    {
        return $this->db->query("SELECT * FROM participants WHERE killID = :killID", array(":killID" => $killID));
    }

    /**
     * @param int $regionID
     * @return array|bool
     */

    public function getAllByRegionID($regionID)
    {
        return $this->db->query("SELECT * FROM participants WHERE regionID = :regionID", array(":regionID" => $regionID));
    }

    /**
     * @param int $shipTypeID
     * @return array|bool
     */

    public function getAllByShipTypeID($shipTypeID)
    {
        return $this->db->query("SELECT * FROM participants WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param int $solarSystemID
     * @return array|bool
     */

    public function getAllBySolarSystemID($solarSystemID)
    {
        return $this->db->query("SELECT * FROM participants WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param int $vGroupID
     * @return array|bool
     */

    public function getAllByVGroupID($vGroupID)
    {
        return $this->db->query("SELECT * FROM participants WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param int $weaponTypeID
     * @return array|bool
     */

    public function getAllByWeaponTypeID($weaponTypeID)
    {
        return $this->db->query("SELECT * FROM participants WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getAllianceIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE characterID = :characterID", "allianceID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getAllianceIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE corporationID = :corporationID", "allianceID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getAllianceIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE factionID = :factionID", "allianceID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getAllianceIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE groupID = :groupID", "allianceID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getAllianceIDByKillID($killID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE killID = :killID", "allianceID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getAllianceIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE regionID = :regionID", "allianceID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getAllianceIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE shipTypeID = :shipTypeID", "allianceID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getAllianceIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE solarSystemID = :solarSystemID", "allianceID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getAllianceIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE vGroupID = :vGroupID", "allianceID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getAllianceIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT allianceID FROM participants WHERE weaponTypeID = :weaponTypeID", "allianceID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getCharacterIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE allianceID = :allianceID", "characterID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getCharacterIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE corporationID = :corporationID", "characterID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getCharacterIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE factionID = :factionID", "characterID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getCharacterIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE groupID = :groupID", "characterID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getCharacterIDByKillID($killID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE killID = :killID", "characterID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getCharacterIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE regionID = :regionID", "characterID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getCharacterIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE shipTypeID = :shipTypeID", "characterID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getCharacterIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE solarSystemID = :solarSystemID", "characterID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getCharacterIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE vGroupID = :vGroupID", "characterID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getCharacterIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT characterID FROM participants WHERE weaponTypeID = :weaponTypeID", "characterID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getCorporationIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE allianceID = :allianceID", "corporationID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getCorporationIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE characterID = :characterID", "corporationID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getCorporationIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE factionID = :factionID", "corporationID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getCorporationIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE groupID = :groupID", "corporationID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getCorporationIDByKillID($killID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE killID = :killID", "corporationID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getCorporationIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE regionID = :regionID", "corporationID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getCorporationIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE shipTypeID = :shipTypeID", "corporationID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getCorporationIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE solarSystemID = :solarSystemID", "corporationID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getCorporationIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE vGroupID = :vGroupID", "corporationID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getCorporationIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT corporationID FROM participants WHERE weaponTypeID = :weaponTypeID", "corporationID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getDamageDoneByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE allianceID = :allianceID", "damageDone", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getDamageDoneByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE characterID = :characterID", "damageDone", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getDamageDoneByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE corporationID = :corporationID", "damageDone", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getDamageDoneByFactionID($factionID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE factionID = :factionID", "damageDone", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getDamageDoneByGroupID($groupID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE groupID = :groupID", "damageDone", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getDamageDoneByKillID($killID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE killID = :killID", "damageDone", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getDamageDoneByRegionID($regionID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE regionID = :regionID", "damageDone", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getDamageDoneByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE shipTypeID = :shipTypeID", "damageDone", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getDamageDoneBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE solarSystemID = :solarSystemID", "damageDone", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getDamageDoneByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE vGroupID = :vGroupID", "damageDone", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getDamageDoneByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT damageDone FROM participants WHERE weaponTypeID = :weaponTypeID", "damageDone", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getFactionIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE allianceID = :allianceID", "factionID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getFactionIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE characterID = :characterID", "factionID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getFactionIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE corporationID = :corporationID", "factionID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getFactionIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE groupID = :groupID", "factionID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getFactionIDByKillID($killID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE killID = :killID", "factionID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getFactionIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE regionID = :regionID", "factionID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getFactionIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE shipTypeID = :shipTypeID", "factionID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getFactionIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE solarSystemID = :solarSystemID", "factionID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getFactionIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE vGroupID = :vGroupID", "factionID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getFactionIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT factionID FROM participants WHERE weaponTypeID = :weaponTypeID", "factionID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getFinalBlowByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE allianceID = :allianceID", "finalBlow", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getFinalBlowByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE characterID = :characterID", "finalBlow", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getFinalBlowByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE corporationID = :corporationID", "finalBlow", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getFinalBlowByFactionID($factionID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE factionID = :factionID", "finalBlow", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getFinalBlowByGroupID($groupID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE groupID = :groupID", "finalBlow", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getFinalBlowByKillID($killID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE killID = :killID", "finalBlow", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getFinalBlowByRegionID($regionID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE regionID = :regionID", "finalBlow", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getFinalBlowByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE shipTypeID = :shipTypeID", "finalBlow", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getFinalBlowBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE solarSystemID = :solarSystemID", "finalBlow", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getFinalBlowByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE vGroupID = :vGroupID", "finalBlow", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getFinalBlowByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT finalBlow FROM participants WHERE weaponTypeID = :weaponTypeID", "finalBlow", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getGroupIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE allianceID = :allianceID", "groupID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getGroupIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE characterID = :characterID", "groupID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getGroupIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE corporationID = :corporationID", "groupID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getGroupIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE factionID = :factionID", "groupID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getGroupIDByKillID($killID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE killID = :killID", "groupID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getGroupIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE regionID = :regionID", "groupID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getGroupIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE shipTypeID = :shipTypeID", "groupID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getGroupIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE solarSystemID = :solarSystemID", "groupID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getGroupIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE vGroupID = :vGroupID", "groupID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getGroupIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT groupID FROM participants WHERE weaponTypeID = :weaponTypeID", "groupID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getIsNPCByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE allianceID = :allianceID", "isNPC", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getIsNPCByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE characterID = :characterID", "isNPC", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getIsNPCByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE corporationID = :corporationID", "isNPC", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getIsNPCByFactionID($factionID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE factionID = :factionID", "isNPC", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getIsNPCByGroupID($groupID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE groupID = :groupID", "isNPC", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getIsNPCByKillID($killID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE killID = :killID", "isNPC", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getIsNPCByRegionID($regionID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE regionID = :regionID", "isNPC", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getIsNPCByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE shipTypeID = :shipTypeID", "isNPC", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getIsNPCBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE solarSystemID = :solarSystemID", "isNPC", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getIsNPCByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE vGroupID = :vGroupID", "isNPC", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getIsNPCByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT isNPC FROM participants WHERE weaponTypeID = :weaponTypeID", "isNPC", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getIsVictimByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE allianceID = :allianceID", "isVictim", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getIsVictimByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE characterID = :characterID", "isVictim", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getIsVictimByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE corporationID = :corporationID", "isVictim", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getIsVictimByFactionID($factionID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE factionID = :factionID", "isVictim", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getIsVictimByGroupID($groupID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE groupID = :groupID", "isVictim", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getIsVictimByKillID($killID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE killID = :killID", "isVictim", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getIsVictimByRegionID($regionID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE regionID = :regionID", "isVictim", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getIsVictimByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE shipTypeID = :shipTypeID", "isVictim", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getIsVictimBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE solarSystemID = :solarSystemID", "isVictim", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getIsVictimByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE vGroupID = :vGroupID", "isVictim", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getIsVictimByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT isVictim FROM participants WHERE weaponTypeID = :weaponTypeID", "isVictim", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getKillIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE allianceID = :allianceID", "killID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getKillIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE characterID = :characterID", "killID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getKillIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE corporationID = :corporationID", "killID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getKillIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE factionID = :factionID", "killID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getKillIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE groupID = :groupID", "killID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getKillIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE regionID = :regionID", "killID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getKillIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE shipTypeID = :shipTypeID", "killID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getKillIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE solarSystemID = :solarSystemID", "killID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getKillIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE vGroupID = :vGroupID", "killID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getKillIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT killID FROM participants WHERE weaponTypeID = :weaponTypeID", "killID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getKillTimeByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE allianceID = :allianceID", "killTime", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getKillTimeByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE characterID = :characterID", "killTime", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getKillTimeByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE corporationID = :corporationID", "killTime", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getKillTimeByFactionID($factionID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE factionID = :factionID", "killTime", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getKillTimeByGroupID($groupID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE groupID = :groupID", "killTime", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getKillTimeByKillID($killID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE killID = :killID", "killTime", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getKillTimeByRegionID($regionID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE regionID = :regionID", "killTime", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getKillTimeByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE shipTypeID = :shipTypeID", "killTime", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getKillTimeBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE solarSystemID = :solarSystemID", "killTime", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getKillTimeByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE vGroupID = :vGroupID", "killTime", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getKillTimeByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT killTime FROM participants WHERE weaponTypeID = :weaponTypeID", "killTime", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getNumberInvolvedByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE allianceID = :allianceID", "numberInvolved", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getNumberInvolvedByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE characterID = :characterID", "numberInvolved", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getNumberInvolvedByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE corporationID = :corporationID", "numberInvolved", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getNumberInvolvedByFactionID($factionID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE factionID = :factionID", "numberInvolved", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getNumberInvolvedByGroupID($groupID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE groupID = :groupID", "numberInvolved", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getNumberInvolvedByKillID($killID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE killID = :killID", "numberInvolved", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getNumberInvolvedByRegionID($regionID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE regionID = :regionID", "numberInvolved", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getNumberInvolvedByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE shipTypeID = :shipTypeID", "numberInvolved", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getNumberInvolvedBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE solarSystemID = :solarSystemID", "numberInvolved", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getNumberInvolvedByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE vGroupID = :vGroupID", "numberInvolved", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getNumberInvolvedByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT numberInvolved FROM participants WHERE weaponTypeID = :weaponTypeID", "numberInvolved", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getPointValueByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE allianceID = :allianceID", "pointValue", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getPointValueByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE characterID = :characterID", "pointValue", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getPointValueByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE corporationID = :corporationID", "pointValue", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getPointValueByFactionID($factionID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE factionID = :factionID", "pointValue", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getPointValueByGroupID($groupID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE groupID = :groupID", "pointValue", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getPointValueByKillID($killID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE killID = :killID", "pointValue", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getPointValueByRegionID($regionID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE regionID = :regionID", "pointValue", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getPointValueByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE shipTypeID = :shipTypeID", "pointValue", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getPointValueBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE solarSystemID = :solarSystemID", "pointValue", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getPointValueByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE vGroupID = :vGroupID", "pointValue", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getPointValueByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT pointValue FROM participants WHERE weaponTypeID = :weaponTypeID", "pointValue", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getRegionIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE allianceID = :allianceID", "regionID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getRegionIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE characterID = :characterID", "regionID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getRegionIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE corporationID = :corporationID", "regionID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getRegionIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE factionID = :factionID", "regionID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getRegionIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE groupID = :groupID", "regionID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getRegionIDByKillID($killID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE killID = :killID", "regionID", array(":killID" => $killID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getRegionIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE shipTypeID = :shipTypeID", "regionID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getRegionIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE solarSystemID = :solarSystemID", "regionID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getRegionIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE vGroupID = :vGroupID", "regionID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getRegionIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT regionID FROM participants WHERE weaponTypeID = :weaponTypeID", "regionID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getShipTypeIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE allianceID = :allianceID", "shipTypeID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getShipTypeIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE characterID = :characterID", "shipTypeID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getShipTypeIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE corporationID = :corporationID", "shipTypeID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getShipTypeIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE factionID = :factionID", "shipTypeID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getShipTypeIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE groupID = :groupID", "shipTypeID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getShipTypeIDByKillID($killID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE killID = :killID", "shipTypeID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getShipTypeIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE regionID = :regionID", "shipTypeID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getShipTypeIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE solarSystemID = :solarSystemID", "shipTypeID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getShipTypeIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE vGroupID = :vGroupID", "shipTypeID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getShipTypeIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT shipTypeID FROM participants WHERE weaponTypeID = :weaponTypeID", "shipTypeID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getShipValueByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE allianceID = :allianceID", "shipValue", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getShipValueByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE characterID = :characterID", "shipValue", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getShipValueByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE corporationID = :corporationID", "shipValue", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getShipValueByFactionID($factionID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE factionID = :factionID", "shipValue", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getShipValueByGroupID($groupID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE groupID = :groupID", "shipValue", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getShipValueByKillID($killID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE killID = :killID", "shipValue", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getShipValueByRegionID($regionID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE regionID = :regionID", "shipValue", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getShipValueByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE shipTypeID = :shipTypeID", "shipValue", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getShipValueBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE solarSystemID = :solarSystemID", "shipValue", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getShipValueByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE vGroupID = :vGroupID", "shipValue", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getShipValueByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT shipValue FROM participants WHERE weaponTypeID = :weaponTypeID", "shipValue", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getSolarSystemIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE allianceID = :allianceID", "solarSystemID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getSolarSystemIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE characterID = :characterID", "solarSystemID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getSolarSystemIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE corporationID = :corporationID", "solarSystemID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getSolarSystemIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE factionID = :factionID", "solarSystemID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getSolarSystemIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE groupID = :groupID", "solarSystemID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getSolarSystemIDByKillID($killID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE killID = :killID", "solarSystemID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getSolarSystemIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE regionID = :regionID", "solarSystemID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getSolarSystemIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE shipTypeID = :shipTypeID", "solarSystemID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getSolarSystemIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE vGroupID = :vGroupID", "solarSystemID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getSolarSystemIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM participants WHERE weaponTypeID = :weaponTypeID", "solarSystemID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getTotalValueByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE allianceID = :allianceID", "totalValue", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getTotalValueByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE characterID = :characterID", "totalValue", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getTotalValueByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE corporationID = :corporationID", "totalValue", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getTotalValueByFactionID($factionID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE factionID = :factionID", "totalValue", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getTotalValueByGroupID($groupID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE groupID = :groupID", "totalValue", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getTotalValueByKillID($killID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE killID = :killID", "totalValue", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getTotalValueByRegionID($regionID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE regionID = :regionID", "totalValue", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getTotalValueByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE shipTypeID = :shipTypeID", "totalValue", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getTotalValueBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE solarSystemID = :solarSystemID", "totalValue", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getTotalValueByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE vGroupID = :vGroupID", "totalValue", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getTotalValueByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT totalValue FROM participants WHERE weaponTypeID = :weaponTypeID", "totalValue", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getVGroupIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE allianceID = :allianceID", "vGroupID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getVGroupIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE characterID = :characterID", "vGroupID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getVGroupIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE corporationID = :corporationID", "vGroupID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getVGroupIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE factionID = :factionID", "vGroupID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getVGroupIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE groupID = :groupID", "vGroupID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getVGroupIDByKillID($killID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE killID = :killID", "vGroupID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getVGroupIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE regionID = :regionID", "vGroupID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getVGroupIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE shipTypeID = :shipTypeID", "vGroupID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getVGroupIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE solarSystemID = :solarSystemID", "vGroupID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $weaponTypeID
     * @return string
     */

    public function getVGroupIDByWeaponTypeID($weaponTypeID)
    {
        return $this->db->queryField("SELECT vGroupID FROM participants WHERE weaponTypeID = :weaponTypeID", "vGroupID", array(":weaponTypeID" => $weaponTypeID));
    }

    /**
     * @param mixed $allianceID
     * @return string
     */

    public function getWeaponTypeIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE allianceID = :allianceID", "weaponTypeID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     * @return string
     */

    public function getWeaponTypeIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE characterID = :characterID", "weaponTypeID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     * @return string
     */

    public function getWeaponTypeIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE corporationID = :corporationID", "weaponTypeID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $factionID
     * @return string
     */

    public function getWeaponTypeIDByFactionID($factionID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE factionID = :factionID", "weaponTypeID", array(":factionID" => $factionID));
    }

    /**
     * @param mixed $groupID
     * @return string
     */

    public function getWeaponTypeIDByGroupID($groupID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE groupID = :groupID", "weaponTypeID", array(":groupID" => $groupID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getWeaponTypeIDByKillID($killID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE killID = :killID", "weaponTypeID", array(":killID" => $killID));
    }

    /**
     * @param mixed $regionID
     * @return string
     */

    public function getWeaponTypeIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE regionID = :regionID", "weaponTypeID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $shipTypeID
     * @return string
     */

    public function getWeaponTypeIDByShipTypeID($shipTypeID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE shipTypeID = :shipTypeID", "weaponTypeID", array(":shipTypeID" => $shipTypeID));
    }

    /**
     * @param mixed $solarSystemID
     * @return string
     */

    public function getWeaponTypeIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE solarSystemID = :solarSystemID", "weaponTypeID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $vGroupID
     * @return string
     */

    public function getWeaponTypeIDByVGroupID($vGroupID)
    {
        return $this->db->queryField("SELECT weaponTypeID FROM participants WHERE vGroupID = :vGroupID", "weaponTypeID", array(":vGroupID" => $vGroupID));
    }

    /**
     * @param mixed $allianceID
     * @param mixed $characterID
     */

    public function updateAllianceIDByCharacterID($allianceID, $characterID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE characterID = :characterID", "allianceID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE characterID = :characterID", array(":characterID" => $characterID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $corporationID
     */

    public function updateAllianceIDByCorporationID($allianceID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE corporationID = :corporationID", "allianceID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $factionID
     */

    public function updateAllianceIDByFactionID($allianceID, $factionID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE factionID = :factionID", "allianceID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE factionID = :factionID", array(":factionID" => $factionID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $groupID
     */

    public function updateAllianceIDByGroupID($allianceID, $groupID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE groupID = :groupID", "allianceID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE groupID = :groupID", array(":groupID" => $groupID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $killID
     */

    public function updateAllianceIDByKillID($allianceID, $killID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE killID = :killID", "allianceID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE killID = :killID", array(":killID" => $killID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $regionID
     */

    public function updateAllianceIDByRegionID($allianceID, $regionID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE regionID = :regionID", "allianceID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE regionID = :regionID", array(":regionID" => $regionID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $shipTypeID
     */

    public function updateAllianceIDByShipTypeID($allianceID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE shipTypeID = :shipTypeID", "allianceID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $solarSystemID
     */

    public function updateAllianceIDBySolarSystemID($allianceID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE solarSystemID = :solarSystemID", "allianceID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $vGroupID
     */

    public function updateAllianceIDByVGroupID($allianceID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE vGroupID = :vGroupID", "allianceID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $weaponTypeID
     */

    public function updateAllianceIDByWeaponTypeID($allianceID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM participants WHERE weaponTypeID = :weaponTypeID", "allianceID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET allianceID = :allianceID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $allianceID
     */

    public function updateCharacterIDByAllianceID($characterID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE allianceID = :allianceID", "characterID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $corporationID
     */

    public function updateCharacterIDByCorporationID($characterID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE corporationID = :corporationID", "characterID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $factionID
     */

    public function updateCharacterIDByFactionID($characterID, $factionID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE factionID = :factionID", "characterID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE factionID = :factionID", array(":factionID" => $factionID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $groupID
     */

    public function updateCharacterIDByGroupID($characterID, $groupID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE groupID = :groupID", "characterID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE groupID = :groupID", array(":groupID" => $groupID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $killID
     */

    public function updateCharacterIDByKillID($characterID, $killID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE killID = :killID", "characterID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE killID = :killID", array(":killID" => $killID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $regionID
     */

    public function updateCharacterIDByRegionID($characterID, $regionID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE regionID = :regionID", "characterID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE regionID = :regionID", array(":regionID" => $regionID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $shipTypeID
     */

    public function updateCharacterIDByShipTypeID($characterID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE shipTypeID = :shipTypeID", "characterID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $solarSystemID
     */

    public function updateCharacterIDBySolarSystemID($characterID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE solarSystemID = :solarSystemID", "characterID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $vGroupID
     */

    public function updateCharacterIDByVGroupID($characterID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE vGroupID = :vGroupID", "characterID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $weaponTypeID
     */

    public function updateCharacterIDByWeaponTypeID($characterID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM participants WHERE weaponTypeID = :weaponTypeID", "characterID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET characterID = :characterID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $allianceID
     */

    public function updateCorporationIDByAllianceID($corporationID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE allianceID = :allianceID", "corporationID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $characterID
     */

    public function updateCorporationIDByCharacterID($corporationID, $characterID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE characterID = :characterID", "corporationID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE characterID = :characterID", array(":characterID" => $characterID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $factionID
     */

    public function updateCorporationIDByFactionID($corporationID, $factionID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE factionID = :factionID", "corporationID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE factionID = :factionID", array(":factionID" => $factionID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $groupID
     */

    public function updateCorporationIDByGroupID($corporationID, $groupID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE groupID = :groupID", "corporationID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE groupID = :groupID", array(":groupID" => $groupID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $killID
     */

    public function updateCorporationIDByKillID($corporationID, $killID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE killID = :killID", "corporationID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE killID = :killID", array(":killID" => $killID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $regionID
     */

    public function updateCorporationIDByRegionID($corporationID, $regionID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE regionID = :regionID", "corporationID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE regionID = :regionID", array(":regionID" => $regionID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $shipTypeID
     */

    public function updateCorporationIDByShipTypeID($corporationID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE shipTypeID = :shipTypeID", "corporationID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $solarSystemID
     */

    public function updateCorporationIDBySolarSystemID($corporationID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE solarSystemID = :solarSystemID", "corporationID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $vGroupID
     */

    public function updateCorporationIDByVGroupID($corporationID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE vGroupID = :vGroupID", "corporationID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $weaponTypeID
     */

    public function updateCorporationIDByWeaponTypeID($corporationID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM participants WHERE weaponTypeID = :weaponTypeID", "corporationID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET corporationID = :corporationID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $allianceID
     */

    public function updateDamageDoneByAllianceID($damageDone, $allianceID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE allianceID = :allianceID", "damageDone", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $characterID
     */

    public function updateDamageDoneByCharacterID($damageDone, $characterID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE characterID = :characterID", "damageDone", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE characterID = :characterID", array(":characterID" => $characterID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $corporationID
     */

    public function updateDamageDoneByCorporationID($damageDone, $corporationID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE corporationID = :corporationID", "damageDone", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $factionID
     */

    public function updateDamageDoneByFactionID($damageDone, $factionID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE factionID = :factionID", "damageDone", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE factionID = :factionID", array(":factionID" => $factionID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $groupID
     */

    public function updateDamageDoneByGroupID($damageDone, $groupID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE groupID = :groupID", "damageDone", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE groupID = :groupID", array(":groupID" => $groupID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $killID
     */

    public function updateDamageDoneByKillID($damageDone, $killID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE killID = :killID", "damageDone", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE killID = :killID", array(":killID" => $killID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $regionID
     */

    public function updateDamageDoneByRegionID($damageDone, $regionID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE regionID = :regionID", "damageDone", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE regionID = :regionID", array(":regionID" => $regionID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $shipTypeID
     */

    public function updateDamageDoneByShipTypeID($damageDone, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE shipTypeID = :shipTypeID", "damageDone", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $solarSystemID
     */

    public function updateDamageDoneBySolarSystemID($damageDone, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE solarSystemID = :solarSystemID", "damageDone", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $vGroupID
     */

    public function updateDamageDoneByVGroupID($damageDone, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE vGroupID = :vGroupID", "damageDone", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $damageDone
     * @param mixed $weaponTypeID
     */

    public function updateDamageDoneByWeaponTypeID($damageDone, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT damageDone FROM participants WHERE weaponTypeID = :weaponTypeID", "damageDone", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET damageDone = :damageDone WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":damageDone" => $damageDone));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $allianceID
     */

    public function updateFactionIDByAllianceID($factionID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE allianceID = :allianceID", "factionID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $characterID
     */

    public function updateFactionIDByCharacterID($factionID, $characterID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE characterID = :characterID", "factionID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE characterID = :characterID", array(":characterID" => $characterID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $corporationID
     */

    public function updateFactionIDByCorporationID($factionID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE corporationID = :corporationID", "factionID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $groupID
     */

    public function updateFactionIDByGroupID($factionID, $groupID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE groupID = :groupID", "factionID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE groupID = :groupID", array(":groupID" => $groupID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $killID
     */

    public function updateFactionIDByKillID($factionID, $killID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE killID = :killID", "factionID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE killID = :killID", array(":killID" => $killID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $regionID
     */

    public function updateFactionIDByRegionID($factionID, $regionID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE regionID = :regionID", "factionID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE regionID = :regionID", array(":regionID" => $regionID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $shipTypeID
     */

    public function updateFactionIDByShipTypeID($factionID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE shipTypeID = :shipTypeID", "factionID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $solarSystemID
     */

    public function updateFactionIDBySolarSystemID($factionID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE solarSystemID = :solarSystemID", "factionID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $vGroupID
     */

    public function updateFactionIDByVGroupID($factionID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE vGroupID = :vGroupID", "factionID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $factionID
     * @param mixed $weaponTypeID
     */

    public function updateFactionIDByWeaponTypeID($factionID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT factionID FROM participants WHERE weaponTypeID = :weaponTypeID", "factionID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET factionID = :factionID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":factionID" => $factionID));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $allianceID
     */

    public function updateFinalBlowByAllianceID($finalBlow, $allianceID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE allianceID = :allianceID", "finalBlow", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $characterID
     */

    public function updateFinalBlowByCharacterID($finalBlow, $characterID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE characterID = :characterID", "finalBlow", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE characterID = :characterID", array(":characterID" => $characterID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $corporationID
     */

    public function updateFinalBlowByCorporationID($finalBlow, $corporationID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE corporationID = :corporationID", "finalBlow", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $factionID
     */

    public function updateFinalBlowByFactionID($finalBlow, $factionID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE factionID = :factionID", "finalBlow", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE factionID = :factionID", array(":factionID" => $factionID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $groupID
     */

    public function updateFinalBlowByGroupID($finalBlow, $groupID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE groupID = :groupID", "finalBlow", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE groupID = :groupID", array(":groupID" => $groupID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $killID
     */

    public function updateFinalBlowByKillID($finalBlow, $killID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE killID = :killID", "finalBlow", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE killID = :killID", array(":killID" => $killID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $regionID
     */

    public function updateFinalBlowByRegionID($finalBlow, $regionID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE regionID = :regionID", "finalBlow", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE regionID = :regionID", array(":regionID" => $regionID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $shipTypeID
     */

    public function updateFinalBlowByShipTypeID($finalBlow, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE shipTypeID = :shipTypeID", "finalBlow", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $solarSystemID
     */

    public function updateFinalBlowBySolarSystemID($finalBlow, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE solarSystemID = :solarSystemID", "finalBlow", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $vGroupID
     */

    public function updateFinalBlowByVGroupID($finalBlow, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE vGroupID = :vGroupID", "finalBlow", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $finalBlow
     * @param mixed $weaponTypeID
     */

    public function updateFinalBlowByWeaponTypeID($finalBlow, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT finalBlow FROM participants WHERE weaponTypeID = :weaponTypeID", "finalBlow", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET finalBlow = :finalBlow WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":finalBlow" => $finalBlow));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $allianceID
     */

    public function updateGroupIDByAllianceID($groupID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE allianceID = :allianceID", "groupID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $characterID
     */

    public function updateGroupIDByCharacterID($groupID, $characterID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE characterID = :characterID", "groupID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE characterID = :characterID", array(":characterID" => $characterID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $corporationID
     */

    public function updateGroupIDByCorporationID($groupID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE corporationID = :corporationID", "groupID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $factionID
     */

    public function updateGroupIDByFactionID($groupID, $factionID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE factionID = :factionID", "groupID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE factionID = :factionID", array(":factionID" => $factionID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $killID
     */

    public function updateGroupIDByKillID($groupID, $killID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE killID = :killID", "groupID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE killID = :killID", array(":killID" => $killID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $regionID
     */

    public function updateGroupIDByRegionID($groupID, $regionID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE regionID = :regionID", "groupID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE regionID = :regionID", array(":regionID" => $regionID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $shipTypeID
     */

    public function updateGroupIDByShipTypeID($groupID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE shipTypeID = :shipTypeID", "groupID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $solarSystemID
     */

    public function updateGroupIDBySolarSystemID($groupID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE solarSystemID = :solarSystemID", "groupID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $vGroupID
     */

    public function updateGroupIDByVGroupID($groupID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE vGroupID = :vGroupID", "groupID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $groupID
     * @param mixed $weaponTypeID
     */

    public function updateGroupIDByWeaponTypeID($groupID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT groupID FROM participants WHERE weaponTypeID = :weaponTypeID", "groupID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET groupID = :groupID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":groupID" => $groupID));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $allianceID
     */

    public function updateIsNPCByAllianceID($isNPC, $allianceID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE allianceID = :allianceID", "isNPC", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $characterID
     */

    public function updateIsNPCByCharacterID($isNPC, $characterID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE characterID = :characterID", "isNPC", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE characterID = :characterID", array(":characterID" => $characterID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $corporationID
     */

    public function updateIsNPCByCorporationID($isNPC, $corporationID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE corporationID = :corporationID", "isNPC", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $factionID
     */

    public function updateIsNPCByFactionID($isNPC, $factionID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE factionID = :factionID", "isNPC", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE factionID = :factionID", array(":factionID" => $factionID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $groupID
     */

    public function updateIsNPCByGroupID($isNPC, $groupID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE groupID = :groupID", "isNPC", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE groupID = :groupID", array(":groupID" => $groupID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $killID
     */

    public function updateIsNPCByKillID($isNPC, $killID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE killID = :killID", "isNPC", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE killID = :killID", array(":killID" => $killID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $regionID
     */

    public function updateIsNPCByRegionID($isNPC, $regionID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE regionID = :regionID", "isNPC", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE regionID = :regionID", array(":regionID" => $regionID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $shipTypeID
     */

    public function updateIsNPCByShipTypeID($isNPC, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE shipTypeID = :shipTypeID", "isNPC", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $solarSystemID
     */

    public function updateIsNPCBySolarSystemID($isNPC, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE solarSystemID = :solarSystemID", "isNPC", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $vGroupID
     */

    public function updateIsNPCByVGroupID($isNPC, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE vGroupID = :vGroupID", "isNPC", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isNPC
     * @param mixed $weaponTypeID
     */

    public function updateIsNPCByWeaponTypeID($isNPC, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT isNPC FROM participants WHERE weaponTypeID = :weaponTypeID", "isNPC", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isNPC = :isNPC WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":isNPC" => $isNPC));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $allianceID
     */

    public function updateIsVictimByAllianceID($isVictim, $allianceID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE allianceID = :allianceID", "isVictim", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $characterID
     */

    public function updateIsVictimByCharacterID($isVictim, $characterID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE characterID = :characterID", "isVictim", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE characterID = :characterID", array(":characterID" => $characterID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $corporationID
     */

    public function updateIsVictimByCorporationID($isVictim, $corporationID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE corporationID = :corporationID", "isVictim", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $factionID
     */

    public function updateIsVictimByFactionID($isVictim, $factionID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE factionID = :factionID", "isVictim", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE factionID = :factionID", array(":factionID" => $factionID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $groupID
     */

    public function updateIsVictimByGroupID($isVictim, $groupID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE groupID = :groupID", "isVictim", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE groupID = :groupID", array(":groupID" => $groupID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $killID
     */

    public function updateIsVictimByKillID($isVictim, $killID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE killID = :killID", "isVictim", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE killID = :killID", array(":killID" => $killID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $regionID
     */

    public function updateIsVictimByRegionID($isVictim, $regionID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE regionID = :regionID", "isVictim", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE regionID = :regionID", array(":regionID" => $regionID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $shipTypeID
     */

    public function updateIsVictimByShipTypeID($isVictim, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE shipTypeID = :shipTypeID", "isVictim", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $solarSystemID
     */

    public function updateIsVictimBySolarSystemID($isVictim, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE solarSystemID = :solarSystemID", "isVictim", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $vGroupID
     */

    public function updateIsVictimByVGroupID($isVictim, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE vGroupID = :vGroupID", "isVictim", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $isVictim
     * @param mixed $weaponTypeID
     */

    public function updateIsVictimByWeaponTypeID($isVictim, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT isVictim FROM participants WHERE weaponTypeID = :weaponTypeID", "isVictim", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET isVictim = :isVictim WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":isVictim" => $isVictim));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $allianceID
     */

    public function updateKillIDByAllianceID($killID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE allianceID = :allianceID", "killID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $characterID
     */

    public function updateKillIDByCharacterID($killID, $characterID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE characterID = :characterID", "killID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE characterID = :characterID", array(":characterID" => $characterID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $corporationID
     */

    public function updateKillIDByCorporationID($killID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE corporationID = :corporationID", "killID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $factionID
     */

    public function updateKillIDByFactionID($killID, $factionID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE factionID = :factionID", "killID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE factionID = :factionID", array(":factionID" => $factionID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $groupID
     */

    public function updateKillIDByGroupID($killID, $groupID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE groupID = :groupID", "killID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE groupID = :groupID", array(":groupID" => $groupID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $regionID
     */

    public function updateKillIDByRegionID($killID, $regionID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE regionID = :regionID", "killID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE regionID = :regionID", array(":regionID" => $regionID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $shipTypeID
     */

    public function updateKillIDByShipTypeID($killID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE shipTypeID = :shipTypeID", "killID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $solarSystemID
     */

    public function updateKillIDBySolarSystemID($killID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE solarSystemID = :solarSystemID", "killID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $vGroupID
     */

    public function updateKillIDByVGroupID($killID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE vGroupID = :vGroupID", "killID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $weaponTypeID
     */

    public function updateKillIDByWeaponTypeID($killID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT killID FROM participants WHERE weaponTypeID = :weaponTypeID", "killID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killID = :killID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $allianceID
     */

    public function updateKillTimeByAllianceID($killTime, $allianceID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE allianceID = :allianceID", "killTime", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $characterID
     */

    public function updateKillTimeByCharacterID($killTime, $characterID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE characterID = :characterID", "killTime", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE characterID = :characterID", array(":characterID" => $characterID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $corporationID
     */

    public function updateKillTimeByCorporationID($killTime, $corporationID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE corporationID = :corporationID", "killTime", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $factionID
     */

    public function updateKillTimeByFactionID($killTime, $factionID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE factionID = :factionID", "killTime", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE factionID = :factionID", array(":factionID" => $factionID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $groupID
     */

    public function updateKillTimeByGroupID($killTime, $groupID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE groupID = :groupID", "killTime", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE groupID = :groupID", array(":groupID" => $groupID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $killID
     */

    public function updateKillTimeByKillID($killTime, $killID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE killID = :killID", "killTime", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE killID = :killID", array(":killID" => $killID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $regionID
     */

    public function updateKillTimeByRegionID($killTime, $regionID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE regionID = :regionID", "killTime", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE regionID = :regionID", array(":regionID" => $regionID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $shipTypeID
     */

    public function updateKillTimeByShipTypeID($killTime, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE shipTypeID = :shipTypeID", "killTime", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $solarSystemID
     */

    public function updateKillTimeBySolarSystemID($killTime, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE solarSystemID = :solarSystemID", "killTime", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $vGroupID
     */

    public function updateKillTimeByVGroupID($killTime, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE vGroupID = :vGroupID", "killTime", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $killTime
     * @param mixed $weaponTypeID
     */

    public function updateKillTimeByWeaponTypeID($killTime, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT killTime FROM participants WHERE weaponTypeID = :weaponTypeID", "killTime", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET killTime = :killTime WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":killTime" => $killTime));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $allianceID
     */

    public function updateNumberInvolvedByAllianceID($numberInvolved, $allianceID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE allianceID = :allianceID", "numberInvolved", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $characterID
     */

    public function updateNumberInvolvedByCharacterID($numberInvolved, $characterID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE characterID = :characterID", "numberInvolved", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE characterID = :characterID", array(":characterID" => $characterID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $corporationID
     */

    public function updateNumberInvolvedByCorporationID($numberInvolved, $corporationID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE corporationID = :corporationID", "numberInvolved", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $factionID
     */

    public function updateNumberInvolvedByFactionID($numberInvolved, $factionID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE factionID = :factionID", "numberInvolved", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE factionID = :factionID", array(":factionID" => $factionID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $groupID
     */

    public function updateNumberInvolvedByGroupID($numberInvolved, $groupID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE groupID = :groupID", "numberInvolved", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE groupID = :groupID", array(":groupID" => $groupID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $killID
     */

    public function updateNumberInvolvedByKillID($numberInvolved, $killID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE killID = :killID", "numberInvolved", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE killID = :killID", array(":killID" => $killID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $regionID
     */

    public function updateNumberInvolvedByRegionID($numberInvolved, $regionID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE regionID = :regionID", "numberInvolved", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE regionID = :regionID", array(":regionID" => $regionID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $shipTypeID
     */

    public function updateNumberInvolvedByShipTypeID($numberInvolved, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE shipTypeID = :shipTypeID", "numberInvolved", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $solarSystemID
     */

    public function updateNumberInvolvedBySolarSystemID($numberInvolved, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE solarSystemID = :solarSystemID", "numberInvolved", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $vGroupID
     */

    public function updateNumberInvolvedByVGroupID($numberInvolved, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE vGroupID = :vGroupID", "numberInvolved", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $numberInvolved
     * @param mixed $weaponTypeID
     */

    public function updateNumberInvolvedByWeaponTypeID($numberInvolved, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT numberInvolved FROM participants WHERE weaponTypeID = :weaponTypeID", "numberInvolved", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET numberInvolved = :numberInvolved WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":numberInvolved" => $numberInvolved));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $allianceID
     */

    public function updatePointValueByAllianceID($pointValue, $allianceID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE allianceID = :allianceID", "pointValue", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $characterID
     */

    public function updatePointValueByCharacterID($pointValue, $characterID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE characterID = :characterID", "pointValue", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE characterID = :characterID", array(":characterID" => $characterID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $corporationID
     */

    public function updatePointValueByCorporationID($pointValue, $corporationID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE corporationID = :corporationID", "pointValue", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $factionID
     */

    public function updatePointValueByFactionID($pointValue, $factionID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE factionID = :factionID", "pointValue", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE factionID = :factionID", array(":factionID" => $factionID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $groupID
     */

    public function updatePointValueByGroupID($pointValue, $groupID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE groupID = :groupID", "pointValue", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE groupID = :groupID", array(":groupID" => $groupID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $killID
     */

    public function updatePointValueByKillID($pointValue, $killID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE killID = :killID", "pointValue", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE killID = :killID", array(":killID" => $killID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $regionID
     */

    public function updatePointValueByRegionID($pointValue, $regionID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE regionID = :regionID", "pointValue", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE regionID = :regionID", array(":regionID" => $regionID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $shipTypeID
     */

    public function updatePointValueByShipTypeID($pointValue, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE shipTypeID = :shipTypeID", "pointValue", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $solarSystemID
     */

    public function updatePointValueBySolarSystemID($pointValue, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE solarSystemID = :solarSystemID", "pointValue", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $vGroupID
     */

    public function updatePointValueByVGroupID($pointValue, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE vGroupID = :vGroupID", "pointValue", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $pointValue
     * @param mixed $weaponTypeID
     */

    public function updatePointValueByWeaponTypeID($pointValue, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT pointValue FROM participants WHERE weaponTypeID = :weaponTypeID", "pointValue", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET pointValue = :pointValue WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":pointValue" => $pointValue));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $allianceID
     */

    public function updateRegionIDByAllianceID($regionID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE allianceID = :allianceID", "regionID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $characterID
     */

    public function updateRegionIDByCharacterID($regionID, $characterID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE characterID = :characterID", "regionID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE characterID = :characterID", array(":characterID" => $characterID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $corporationID
     */

    public function updateRegionIDByCorporationID($regionID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE corporationID = :corporationID", "regionID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $factionID
     */

    public function updateRegionIDByFactionID($regionID, $factionID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE factionID = :factionID", "regionID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE factionID = :factionID", array(":factionID" => $factionID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $groupID
     */

    public function updateRegionIDByGroupID($regionID, $groupID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE groupID = :groupID", "regionID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE groupID = :groupID", array(":groupID" => $groupID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $killID
     */

    public function updateRegionIDByKillID($regionID, $killID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE killID = :killID", "regionID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE killID = :killID", array(":killID" => $killID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $shipTypeID
     */

    public function updateRegionIDByShipTypeID($regionID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE shipTypeID = :shipTypeID", "regionID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $solarSystemID
     */

    public function updateRegionIDBySolarSystemID($regionID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE solarSystemID = :solarSystemID", "regionID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $vGroupID
     */

    public function updateRegionIDByVGroupID($regionID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE vGroupID = :vGroupID", "regionID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $regionID
     * @param mixed $weaponTypeID
     */

    public function updateRegionIDByWeaponTypeID($regionID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT regionID FROM participants WHERE weaponTypeID = :weaponTypeID", "regionID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET regionID = :regionID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":regionID" => $regionID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $allianceID
     */

    public function updateShipTypeIDByAllianceID($shipTypeID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE allianceID = :allianceID", "shipTypeID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $characterID
     */

    public function updateShipTypeIDByCharacterID($shipTypeID, $characterID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE characterID = :characterID", "shipTypeID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE characterID = :characterID", array(":characterID" => $characterID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $corporationID
     */

    public function updateShipTypeIDByCorporationID($shipTypeID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE corporationID = :corporationID", "shipTypeID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $factionID
     */

    public function updateShipTypeIDByFactionID($shipTypeID, $factionID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE factionID = :factionID", "shipTypeID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE factionID = :factionID", array(":factionID" => $factionID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $groupID
     */

    public function updateShipTypeIDByGroupID($shipTypeID, $groupID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE groupID = :groupID", "shipTypeID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE groupID = :groupID", array(":groupID" => $groupID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $killID
     */

    public function updateShipTypeIDByKillID($shipTypeID, $killID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE killID = :killID", "shipTypeID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE killID = :killID", array(":killID" => $killID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $regionID
     */

    public function updateShipTypeIDByRegionID($shipTypeID, $regionID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE regionID = :regionID", "shipTypeID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE regionID = :regionID", array(":regionID" => $regionID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $solarSystemID
     */

    public function updateShipTypeIDBySolarSystemID($shipTypeID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE solarSystemID = :solarSystemID", "shipTypeID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $vGroupID
     */

    public function updateShipTypeIDByVGroupID($shipTypeID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE vGroupID = :vGroupID", "shipTypeID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipTypeID
     * @param mixed $weaponTypeID
     */

    public function updateShipTypeIDByWeaponTypeID($shipTypeID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT shipTypeID FROM participants WHERE weaponTypeID = :weaponTypeID", "shipTypeID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipTypeID = :shipTypeID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":shipTypeID" => $shipTypeID));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $allianceID
     */

    public function updateShipValueByAllianceID($shipValue, $allianceID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE allianceID = :allianceID", "shipValue", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $characterID
     */

    public function updateShipValueByCharacterID($shipValue, $characterID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE characterID = :characterID", "shipValue", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE characterID = :characterID", array(":characterID" => $characterID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $corporationID
     */

    public function updateShipValueByCorporationID($shipValue, $corporationID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE corporationID = :corporationID", "shipValue", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $factionID
     */

    public function updateShipValueByFactionID($shipValue, $factionID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE factionID = :factionID", "shipValue", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE factionID = :factionID", array(":factionID" => $factionID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $groupID
     */

    public function updateShipValueByGroupID($shipValue, $groupID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE groupID = :groupID", "shipValue", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE groupID = :groupID", array(":groupID" => $groupID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $killID
     */

    public function updateShipValueByKillID($shipValue, $killID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE killID = :killID", "shipValue", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE killID = :killID", array(":killID" => $killID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $regionID
     */

    public function updateShipValueByRegionID($shipValue, $regionID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE regionID = :regionID", "shipValue", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE regionID = :regionID", array(":regionID" => $regionID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $shipTypeID
     */

    public function updateShipValueByShipTypeID($shipValue, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE shipTypeID = :shipTypeID", "shipValue", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $solarSystemID
     */

    public function updateShipValueBySolarSystemID($shipValue, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE solarSystemID = :solarSystemID", "shipValue", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $vGroupID
     */

    public function updateShipValueByVGroupID($shipValue, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE vGroupID = :vGroupID", "shipValue", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $shipValue
     * @param mixed $weaponTypeID
     */

    public function updateShipValueByWeaponTypeID($shipValue, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT shipValue FROM participants WHERE weaponTypeID = :weaponTypeID", "shipValue", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET shipValue = :shipValue WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":shipValue" => $shipValue));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $allianceID
     */

    public function updateSolarSystemIDByAllianceID($solarSystemID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE allianceID = :allianceID", "solarSystemID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $characterID
     */

    public function updateSolarSystemIDByCharacterID($solarSystemID, $characterID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE characterID = :characterID", "solarSystemID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE characterID = :characterID", array(":characterID" => $characterID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $corporationID
     */

    public function updateSolarSystemIDByCorporationID($solarSystemID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE corporationID = :corporationID", "solarSystemID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $factionID
     */

    public function updateSolarSystemIDByFactionID($solarSystemID, $factionID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE factionID = :factionID", "solarSystemID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE factionID = :factionID", array(":factionID" => $factionID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $groupID
     */

    public function updateSolarSystemIDByGroupID($solarSystemID, $groupID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE groupID = :groupID", "solarSystemID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE groupID = :groupID", array(":groupID" => $groupID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $killID
     */

    public function updateSolarSystemIDByKillID($solarSystemID, $killID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE killID = :killID", "solarSystemID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE killID = :killID", array(":killID" => $killID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $regionID
     */

    public function updateSolarSystemIDByRegionID($solarSystemID, $regionID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE regionID = :regionID", "solarSystemID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE regionID = :regionID", array(":regionID" => $regionID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $shipTypeID
     */

    public function updateSolarSystemIDByShipTypeID($solarSystemID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE shipTypeID = :shipTypeID", "solarSystemID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $vGroupID
     */

    public function updateSolarSystemIDByVGroupID($solarSystemID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE vGroupID = :vGroupID", "solarSystemID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $solarSystemID
     * @param mixed $weaponTypeID
     */

    public function updateSolarSystemIDByWeaponTypeID($solarSystemID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT solarSystemID FROM participants WHERE weaponTypeID = :weaponTypeID", "solarSystemID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET solarSystemID = :solarSystemID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":solarSystemID" => $solarSystemID));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $allianceID
     */

    public function updateTotalValueByAllianceID($totalValue, $allianceID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE allianceID = :allianceID", "totalValue", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $characterID
     */

    public function updateTotalValueByCharacterID($totalValue, $characterID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE characterID = :characterID", "totalValue", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE characterID = :characterID", array(":characterID" => $characterID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $corporationID
     */

    public function updateTotalValueByCorporationID($totalValue, $corporationID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE corporationID = :corporationID", "totalValue", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $factionID
     */

    public function updateTotalValueByFactionID($totalValue, $factionID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE factionID = :factionID", "totalValue", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE factionID = :factionID", array(":factionID" => $factionID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $groupID
     */

    public function updateTotalValueByGroupID($totalValue, $groupID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE groupID = :groupID", "totalValue", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE groupID = :groupID", array(":groupID" => $groupID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $killID
     */

    public function updateTotalValueByKillID($totalValue, $killID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE killID = :killID", "totalValue", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE killID = :killID", array(":killID" => $killID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $regionID
     */

    public function updateTotalValueByRegionID($totalValue, $regionID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE regionID = :regionID", "totalValue", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE regionID = :regionID", array(":regionID" => $regionID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $shipTypeID
     */

    public function updateTotalValueByShipTypeID($totalValue, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE shipTypeID = :shipTypeID", "totalValue", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $solarSystemID
     */

    public function updateTotalValueBySolarSystemID($totalValue, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE solarSystemID = :solarSystemID", "totalValue", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $vGroupID
     */

    public function updateTotalValueByVGroupID($totalValue, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE vGroupID = :vGroupID", "totalValue", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $totalValue
     * @param mixed $weaponTypeID
     */

    public function updateTotalValueByWeaponTypeID($totalValue, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT totalValue FROM participants WHERE weaponTypeID = :weaponTypeID", "totalValue", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET totalValue = :totalValue WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":totalValue" => $totalValue));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $allianceID
     */

    public function updateVGroupIDByAllianceID($vGroupID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE allianceID = :allianceID", "vGroupID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $characterID
     */

    public function updateVGroupIDByCharacterID($vGroupID, $characterID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE characterID = :characterID", "vGroupID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE characterID = :characterID", array(":characterID" => $characterID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $corporationID
     */

    public function updateVGroupIDByCorporationID($vGroupID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE corporationID = :corporationID", "vGroupID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $factionID
     */

    public function updateVGroupIDByFactionID($vGroupID, $factionID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE factionID = :factionID", "vGroupID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE factionID = :factionID", array(":factionID" => $factionID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $groupID
     */

    public function updateVGroupIDByGroupID($vGroupID, $groupID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE groupID = :groupID", "vGroupID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE groupID = :groupID", array(":groupID" => $groupID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $killID
     */

    public function updateVGroupIDByKillID($vGroupID, $killID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE killID = :killID", "vGroupID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE killID = :killID", array(":killID" => $killID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $regionID
     */

    public function updateVGroupIDByRegionID($vGroupID, $regionID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE regionID = :regionID", "vGroupID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE regionID = :regionID", array(":regionID" => $regionID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $shipTypeID
     */

    public function updateVGroupIDByShipTypeID($vGroupID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE shipTypeID = :shipTypeID", "vGroupID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $solarSystemID
     */

    public function updateVGroupIDBySolarSystemID($vGroupID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE solarSystemID = :solarSystemID", "vGroupID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $vGroupID
     * @param mixed $weaponTypeID
     */

    public function updateVGroupIDByWeaponTypeID($vGroupID, $weaponTypeID)
    {
        $exists = $this->db->queryField("SELECT vGroupID FROM participants WHERE weaponTypeID = :weaponTypeID", "vGroupID", array(":weaponTypeID" => $weaponTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET vGroupID = :vGroupID WHERE weaponTypeID = :weaponTypeID", array(":weaponTypeID" => $weaponTypeID, ":vGroupID" => $vGroupID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $allianceID
     */

    public function updateWeaponTypeIDByAllianceID($weaponTypeID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE allianceID = :allianceID", "weaponTypeID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $characterID
     */

    public function updateWeaponTypeIDByCharacterID($weaponTypeID, $characterID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE characterID = :characterID", "weaponTypeID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE characterID = :characterID", array(":characterID" => $characterID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $corporationID
     */

    public function updateWeaponTypeIDByCorporationID($weaponTypeID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE corporationID = :corporationID", "weaponTypeID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $factionID
     */

    public function updateWeaponTypeIDByFactionID($weaponTypeID, $factionID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE factionID = :factionID", "weaponTypeID", array(":factionID" => $factionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE factionID = :factionID", array(":factionID" => $factionID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $groupID
     */

    public function updateWeaponTypeIDByGroupID($weaponTypeID, $groupID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE groupID = :groupID", "weaponTypeID", array(":groupID" => $groupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE groupID = :groupID", array(":groupID" => $groupID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $killID
     */

    public function updateWeaponTypeIDByKillID($weaponTypeID, $killID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE killID = :killID", "weaponTypeID", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE killID = :killID", array(":killID" => $killID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $regionID
     */

    public function updateWeaponTypeIDByRegionID($weaponTypeID, $regionID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE regionID = :regionID", "weaponTypeID", array(":regionID" => $regionID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE regionID = :regionID", array(":regionID" => $regionID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $shipTypeID
     */

    public function updateWeaponTypeIDByShipTypeID($weaponTypeID, $shipTypeID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE shipTypeID = :shipTypeID", "weaponTypeID", array(":shipTypeID" => $shipTypeID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE shipTypeID = :shipTypeID", array(":shipTypeID" => $shipTypeID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $solarSystemID
     */

    public function updateWeaponTypeIDBySolarSystemID($weaponTypeID, $solarSystemID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE solarSystemID = :solarSystemID", "weaponTypeID", array(":solarSystemID" => $solarSystemID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param mixed $weaponTypeID
     * @param mixed $vGroupID
     */

    public function updateWeaponTypeIDByVGroupID($weaponTypeID, $vGroupID)
    {
        $exists = $this->db->queryField("SELECT weaponTypeID FROM participants WHERE vGroupID = :vGroupID", "weaponTypeID", array(":vGroupID" => $vGroupID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE participants SET weaponTypeID = :weaponTypeID WHERE vGroupID = :vGroupID", array(":vGroupID" => $vGroupID, ":weaponTypeID" => $weaponTypeID));
        }
    }

    /**
     * @param $killID
     * @param $killTime
     * @param $solarSystemID
     * @param $regionID
     * @param $characterID
     * @param $corporationID
     * @param $allianceID
     * @param $factionID
     * @param $shipTypeID
     * @param $groupID
     * @param $vGroupID
     * @param $weaponTypeID
     * @param $shipValue
     * @param $damageDone
     * @param $totalValue
     * @param $pointValue
     * @param $numberInvolved
     * @param $isVictim
     * @param $finalBlow
     * @param $isNPC
     */
    public function insertIntoParticipants($killID, $killTime, $solarSystemID, $regionID, $characterID, $corporationID, $allianceID, $factionID, $shipTypeID, $groupID, $vGroupID, $weaponTypeID, $shipValue, $damageDone, $totalValue, $pointValue, $numberInvolved, $isVictim, $finalBlow, $isNPC)
    {
        $this->db->execute("INSERT INTO participants (killID, killTime, solarSystemID, regionID, characterID, corporationID, allianceID, factionID, shipTypeID, groupID, vGroupID, weaponTypeID, shipValue, damageDone, totalValue, pointValue, numberInvolved, isVictim, finalBlow, isNPC) VALUES (:killID, :killTime, :solarSystemID, :regionID, :characterID, :corporationID, :allianceID, :factionID, :shipTypeID, :groupID, :vGroupID, :weaponTypeID, :shipValue, :damageDone, :totalValue, :pointValue, :numberInvolved, :isVictim, :finalBlow, :isNPC)", array(":killID" => $killID, ":killTime" => $killTime, ":solarSystemID" => $solarSystemID, ":regionID" => $regionID, ":characterID" => $characterID, ":corporationID" => $corporationID, ":allianceID" => $allianceID, ":factionID" => $factionID, ":shipTypeID" => $shipTypeID, ":groupID" => $groupID, ":vGroupID" => $vGroupID, ":weaponTypeID" => $weaponTypeID, ":shipValue" => $shipValue, ":damageDone" => $damageDone, ":totalValue" => $totalValue, ":pointValue" => $pointValue, ":numberInvolved" => $numberInvolved, ":isVictim" => $isVictim, ":finalBlow" => $finalBlow, ":isNPC" => $isNPC));
    }
}
