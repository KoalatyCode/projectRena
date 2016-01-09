<?php
namespace ProjectRena\Model\Database\CCPTables;

use ProjectRena\RenaApp;


/**
 * All Celestials in all of EVE
 */
class mapAllCelestials
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
     * @param int $constellationID
     * @return array|bool
     */

    public function getAllByConstellationID($constellationID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE constellationID = :constellationID", array(":constellationID" => $constellationID));
    }

    /**
     * @param int $itemID
     * @return array|bool
     */

    public function getAllByItemID($itemID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE itemID = :itemID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getAllByItemName($itemName)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE itemName = :itemName", array(":itemName" => $itemName));
    }

    /**
     * @param int $orbitID
     */

    public function getAllByOrbitID($orbitID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE orbitID = :orbitID", array(":orbitID" => $orbitID));
    }

    /**
     * @param int $regionID
     */

    public function getAllByRegionID($regionID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE regionID = :regionID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getAllByRegionName($regionName)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE regionName = :regionName", array(":regionName" => $regionName));
    }

    /**
     * @param int $solarSystemID
     */

    public function getAllBySolarSystemID($solarSystemID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getAllBySolarSystemName($solarSystemName)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param int $typeID
     */

    public function getAllByTypeID($typeID)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE typeID = :typeID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getAllByTypeName($typeName)
    {
        return $this->db->query("SELECT * FROM mapAllCelestials WHERE typeName = :typeName", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $itemID
     */

    public function getConstellationIDByItemID($itemID)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE itemID = :itemID", "constellationID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getConstellationIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE itemName = :itemName", "constellationID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getConstellationIDByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE orbitID = :orbitID", "constellationID", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getConstellationIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE regionID = :regionID", "constellationID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getConstellationIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE regionName = :regionName", "constellationID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getConstellationIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "constellationID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getConstellationIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "constellationID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getConstellationIDByTypeID($typeID)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE typeID = :typeID", "constellationID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getConstellationIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT constellationID FROM mapAllCelestials WHERE typeName = :typeName", "constellationID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getItemIDByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE constellationID = :constellationID", "itemID", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemName
     */

    public function getItemIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE itemName = :itemName", "itemID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getItemIDByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE orbitID = :orbitID", "itemID", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getItemIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE regionID = :regionID", "itemID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getItemIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE regionName = :regionName", "itemID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getItemIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "itemID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getItemIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "itemID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getItemIDByTypeID($typeID)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE typeID = :typeID", "itemID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getItemIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT itemID FROM mapAllCelestials WHERE typeName = :typeName", "itemID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getItemNameByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE constellationID = :constellationID", "itemName", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getItemNameByItemID($itemID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE itemID = :itemID", "itemName", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $orbitID
     */

    public function getItemNameByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE orbitID = :orbitID", "itemName", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getItemNameByRegionID($regionID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE regionID = :regionID", "itemName", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getItemNameByRegionName($regionName)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE regionName = :regionName", "itemName", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getItemNameBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "itemName", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getItemNameBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "itemName", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getItemNameByTypeID($typeID)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE typeID = :typeID", "itemName", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getItemNameByTypeName($typeName)
    {
        return $this->db->queryField("SELECT itemName FROM mapAllCelestials WHERE typeName = :typeName", "itemName", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getOrbitIDByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE constellationID = :constellationID", "orbitID", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getOrbitIDByItemID($itemID)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE itemID = :itemID", "orbitID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getOrbitIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE itemName = :itemName", "orbitID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $regionID
     */

    public function getOrbitIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE regionID = :regionID", "orbitID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getOrbitIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE regionName = :regionName", "orbitID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getOrbitIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "orbitID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getOrbitIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "orbitID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getOrbitIDByTypeID($typeID)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE typeID = :typeID", "orbitID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getOrbitIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT orbitID FROM mapAllCelestials WHERE typeName = :typeName", "orbitID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getRegionIDByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE constellationID = :constellationID", "regionID", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getRegionIDByItemID($itemID)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE itemID = :itemID", "regionID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getRegionIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE itemName = :itemName", "regionID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getRegionIDByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE orbitID = :orbitID", "regionID", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionName
     */

    public function getRegionIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE regionName = :regionName", "regionID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getRegionIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "regionID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getRegionIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "regionID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getRegionIDByTypeID($typeID)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE typeID = :typeID", "regionID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getRegionIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT regionID FROM mapAllCelestials WHERE typeName = :typeName", "regionID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getRegionNameByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE constellationID = :constellationID", "regionName", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getRegionNameByItemID($itemID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE itemID = :itemID", "regionName", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getRegionNameByItemName($itemName)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE itemName = :itemName", "regionName", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getRegionNameByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE orbitID = :orbitID", "regionName", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getRegionNameByRegionID($regionID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE regionID = :regionID", "regionName", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getRegionNameBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "regionName", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getRegionNameBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "regionName", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getRegionNameByTypeID($typeID)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE typeID = :typeID", "regionName", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getRegionNameByTypeName($typeName)
    {
        return $this->db->queryField("SELECT regionName FROM mapAllCelestials WHERE typeName = :typeName", "regionName", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getSolarSystemIDByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE constellationID = :constellationID", "solarSystemID", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getSolarSystemIDByItemID($itemID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE itemID = :itemID", "solarSystemID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getSolarSystemIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE itemName = :itemName", "solarSystemID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getSolarSystemIDByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE orbitID = :orbitID", "solarSystemID", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getSolarSystemIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE regionID = :regionID", "solarSystemID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getSolarSystemIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE regionName = :regionName", "solarSystemID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getSolarSystemIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "solarSystemID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getSolarSystemIDByTypeID($typeID)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE typeID = :typeID", "solarSystemID", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getSolarSystemIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT solarSystemID FROM mapAllCelestials WHERE typeName = :typeName", "solarSystemID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getSolarSystemNameByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE constellationID = :constellationID", "solarSystemName", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getSolarSystemNameByItemID($itemID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE itemID = :itemID", "solarSystemName", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getSolarSystemNameByItemName($itemName)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE itemName = :itemName", "solarSystemName", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getSolarSystemNameByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE orbitID = :orbitID", "solarSystemName", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getSolarSystemNameByRegionID($regionID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE regionID = :regionID", "solarSystemName", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getSolarSystemNameByRegionName($regionName)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE regionName = :regionName", "solarSystemName", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getSolarSystemNameBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "solarSystemName", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $typeID
     */

    public function getSolarSystemNameByTypeID($typeID)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE typeID = :typeID", "solarSystemName", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getSolarSystemNameByTypeName($typeName)
    {
        return $this->db->queryField("SELECT solarSystemName FROM mapAllCelestials WHERE typeName = :typeName", "solarSystemName", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getTypeIDByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE constellationID = :constellationID", "typeID", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getTypeIDByItemID($itemID)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE itemID = :itemID", "typeID", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getTypeIDByItemName($itemName)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE itemName = :itemName", "typeID", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getTypeIDByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE orbitID = :orbitID", "typeID", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getTypeIDByRegionID($regionID)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE regionID = :regionID", "typeID", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getTypeIDByRegionName($regionName)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE regionName = :regionName", "typeID", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getTypeIDBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "typeID", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getTypeIDBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "typeID", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeName
     */

    public function getTypeIDByTypeName($typeName)
    {
        return $this->db->queryField("SELECT typeID FROM mapAllCelestials WHERE typeName = :typeName", "typeID", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getTypeNameByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE constellationID = :constellationID", "typeName", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getTypeNameByItemID($itemID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE itemID = :itemID", "typeName", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getTypeNameByItemName($itemName)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE itemName = :itemName", "typeName", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getTypeNameByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE orbitID = :orbitID", "typeName", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getTypeNameByRegionID($regionID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE regionID = :regionID", "typeName", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getTypeNameByRegionName($regionName)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE regionName = :regionName", "typeName", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getTypeNameBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "typeName", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getTypeNameBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "typeName", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getTypeNameByTypeID($typeID)
    {
        return $this->db->queryField("SELECT typeName FROM mapAllCelestials WHERE typeID = :typeID", "typeName", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $constellationID
     */

    public function getXByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE constellationID = :constellationID", "x", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getXByItemID($itemID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE itemID = :itemID", "x", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getXByItemName($itemName)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE itemName = :itemName", "x", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getXByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE orbitID = :orbitID", "x", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getXByRegionID($regionID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE regionID = :regionID", "x", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getXByRegionName($regionName)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE regionName = :regionName", "x", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getXBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "x", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getXBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "x", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getXByTypeID($typeID)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE typeID = :typeID", "x", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getXByTypeName($typeName)
    {
        return $this->db->queryField("SELECT x FROM mapAllCelestials WHERE typeName = :typeName", "x", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getYByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE constellationID = :constellationID", "y", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getYByItemID($itemID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE itemID = :itemID", "y", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getYByItemName($itemName)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE itemName = :itemName", "y", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getYByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE orbitID = :orbitID", "y", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getYByRegionID($regionID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE regionID = :regionID", "y", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getYByRegionName($regionName)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE regionName = :regionName", "y", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getYBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "y", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getYBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "y", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getYByTypeID($typeID)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE typeID = :typeID", "y", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getYByTypeName($typeName)
    {
        return $this->db->queryField("SELECT y FROM mapAllCelestials WHERE typeName = :typeName", "y", array(":typeName" => $typeName));
    }

    /**
     * @param mixed $constellationID
     */

    public function getZByConstellationID($constellationID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE constellationID = :constellationID", "z", array(":constellationID" => $constellationID));
    }

    /**
     * @param mixed $itemID
     */

    public function getZByItemID($itemID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE itemID = :itemID", "z", array(":itemID" => $itemID));
    }

    /**
     * @param mixed $itemName
     */

    public function getZByItemName($itemName)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE itemName = :itemName", "z", array(":itemName" => $itemName));
    }

    /**
     * @param mixed $orbitID
     */

    public function getZByOrbitID($orbitID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE orbitID = :orbitID", "z", array(":orbitID" => $orbitID));
    }

    /**
     * @param mixed $regionID
     */

    public function getZByRegionID($regionID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE regionID = :regionID", "z", array(":regionID" => $regionID));
    }

    /**
     * @param mixed $regionName
     */

    public function getZByRegionName($regionName)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE regionName = :regionName", "z", array(":regionName" => $regionName));
    }

    /**
     * @param mixed $solarSystemID
     */

    public function getZBySolarSystemID($solarSystemID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE solarSystemID = :solarSystemID", "z", array(":solarSystemID" => $solarSystemID));
    }

    /**
     * @param mixed $solarSystemName
     */

    public function getZBySolarSystemName($solarSystemName)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE solarSystemName = :solarSystemName", "z", array(":solarSystemName" => $solarSystemName));
    }

    /**
     * @param mixed $typeID
     */

    public function getZByTypeID($typeID)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE typeID = :typeID", "z", array(":typeID" => $typeID));
    }

    /**
     * @param mixed $typeName
     */

    public function getZByTypeName($typeName)
    {
        return $this->db->queryField("SELECT z FROM mapAllCelestials WHERE typeName = :typeName", "z", array(":typeName" => $typeName));
    }
}
