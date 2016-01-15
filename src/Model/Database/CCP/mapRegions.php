<?php
namespace ProjectRena\Model\Database\CCP;

use ProjectRena\RenaApp;


/**
 * Model for all the Regions in EVE
 */
class mapRegions {

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

	public function __construct(RenaApp$app) {
		$this->app = $app;
		$this->db = $app->Db;
	}

	/**
	 * @param int $factionID
	 */

	public function getAllByFactionID($factionID) {
		return$this->db->query("SELECT * FROM mapRegions WHERE factionID = :factionID", array(":factionID"=>$factionID));
	}

	/**
	 * @param int $regionID
	 */

	public function getAllByRegionID($regionID) {
		return$this->db->query("SELECT * FROM mapRegions WHERE regionID = :regionID", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getAllByRegionName($regionName) {
		return$this->db->query("SELECT * FROM mapRegions WHERE regionName = :regionName", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getFactionIDByRegionID($regionID) {
		return$this->db->queryField("SELECT factionID FROM mapRegions WHERE regionID = :regionID", "factionID", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getFactionIDByRegionName($regionName) {
		return$this->db->queryField("SELECT factionID FROM mapRegions WHERE regionName = :regionName", "factionID", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getRadiusByFactionID($factionID) {
		return$this->db->queryField("SELECT radius FROM mapRegions WHERE factionID = :factionID", "radius", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getRadiusByRegionID($regionID) {
		return$this->db->queryField("SELECT radius FROM mapRegions WHERE regionID = :regionID", "radius", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getRadiusByRegionName($regionName) {
		return$this->db->queryField("SELECT radius FROM mapRegions WHERE regionName = :regionName", "radius", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getRegionIDByFactionID($factionID) {
		return$this->db->queryField("SELECT regionID FROM mapRegions WHERE factionID = :factionID", "regionID", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getRegionIDByRegionName($regionName) {
		return$this->db->queryField("SELECT regionID FROM mapRegions WHERE regionName = :regionName", "regionID", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getRegionNameByFactionID($factionID) {
		return$this->db->queryField("SELECT regionName FROM mapRegions WHERE factionID = :factionID", "regionName", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getRegionNameByRegionID($regionID) {
		return$this->db->queryField("SELECT regionName FROM mapRegions WHERE regionID = :regionID", "regionName", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getXByFactionID($factionID) {
		return$this->db->queryField("SELECT x FROM mapRegions WHERE factionID = :factionID", "x", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getXByRegionID($regionID) {
		return$this->db->queryField("SELECT x FROM mapRegions WHERE regionID = :regionID", "x", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getXByRegionName($regionName) {
		return$this->db->queryField("SELECT x FROM mapRegions WHERE regionName = :regionName", "x", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getXMaxByFactionID($factionID) {
		return$this->db->queryField("SELECT xMax FROM mapRegions WHERE factionID = :factionID", "xMax", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getXMaxByRegionID($regionID) {
		return$this->db->queryField("SELECT xMax FROM mapRegions WHERE regionID = :regionID", "xMax", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getXMaxByRegionName($regionName) {
		return$this->db->queryField("SELECT xMax FROM mapRegions WHERE regionName = :regionName", "xMax", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getXMinByFactionID($factionID) {
		return$this->db->queryField("SELECT xMin FROM mapRegions WHERE factionID = :factionID", "xMin", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getXMinByRegionID($regionID) {
		return$this->db->queryField("SELECT xMin FROM mapRegions WHERE regionID = :regionID", "xMin", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getXMinByRegionName($regionName) {
		return$this->db->queryField("SELECT xMin FROM mapRegions WHERE regionName = :regionName", "xMin", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getYByFactionID($factionID) {
		return$this->db->queryField("SELECT y FROM mapRegions WHERE factionID = :factionID", "y", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getYByRegionID($regionID) {
		return$this->db->queryField("SELECT y FROM mapRegions WHERE regionID = :regionID", "y", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getYByRegionName($regionName) {
		return$this->db->queryField("SELECT y FROM mapRegions WHERE regionName = :regionName", "y", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getYMaxByFactionID($factionID) {
		return$this->db->queryField("SELECT yMax FROM mapRegions WHERE factionID = :factionID", "yMax", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getYMaxByRegionID($regionID) {
		return$this->db->queryField("SELECT yMax FROM mapRegions WHERE regionID = :regionID", "yMax", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getYMaxByRegionName($regionName) {
		return$this->db->queryField("SELECT yMax FROM mapRegions WHERE regionName = :regionName", "yMax", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getYMinByFactionID($factionID) {
		return$this->db->queryField("SELECT yMin FROM mapRegions WHERE factionID = :factionID", "yMin", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getYMinByRegionID($regionID) {
		return$this->db->queryField("SELECT yMin FROM mapRegions WHERE regionID = :regionID", "yMin", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getYMinByRegionName($regionName) {
		return$this->db->queryField("SELECT yMin FROM mapRegions WHERE regionName = :regionName", "yMin", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getZByFactionID($factionID) {
		return$this->db->queryField("SELECT z FROM mapRegions WHERE factionID = :factionID", "z", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getZByRegionID($regionID) {
		return$this->db->queryField("SELECT z FROM mapRegions WHERE regionID = :regionID", "z", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getZByRegionName($regionName) {
		return$this->db->queryField("SELECT z FROM mapRegions WHERE regionName = :regionName", "z", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getZMaxByFactionID($factionID) {
		return$this->db->queryField("SELECT zMax FROM mapRegions WHERE factionID = :factionID", "zMax", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getZMaxByRegionID($regionID) {
		return$this->db->queryField("SELECT zMax FROM mapRegions WHERE regionID = :regionID", "zMax", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getZMaxByRegionName($regionName) {
		return$this->db->queryField("SELECT zMax FROM mapRegions WHERE regionName = :regionName", "zMax", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 */

	public function getZMinByFactionID($factionID) {
		return$this->db->queryField("SELECT zMin FROM mapRegions WHERE factionID = :factionID", "zMin", array(":factionID"=>$factionID));
	}

	/**
	 * @param mixed $regionID
	 */

	public function getZMinByRegionID($regionID) {
		return$this->db->queryField("SELECT zMin FROM mapRegions WHERE regionID = :regionID", "zMin", array(":regionID"=>$regionID));
	}

	/**
	 * @param mixed $regionName
	 */

	public function getZMinByRegionName($regionName) {
		return$this->db->queryField("SELECT zMin FROM mapRegions WHERE regionName = :regionName", "zMin", array(":regionName"=>$regionName));
	}

	/**
	 * @param mixed $factionID
	 * @param mixed $regionID
	 */

	public function updateFactionIDByRegionID($factionID, $regionID) {
		$exists = $this->db->queryField("SELECT factionID FROM mapRegions WHERE regionID = :regionID", "factionID", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET factionID = :factionID WHERE regionID = :regionID", array(":regionID"=>$regionID, ":factionID"=>$factionID));
		}
	}

	/**
	 * @param mixed $factionID
	 * @param mixed $regionName
	 */

	public function updateFactionIDByRegionName($factionID, $regionName) {
		$exists = $this->db->queryField("SELECT factionID FROM mapRegions WHERE regionName = :regionName", "factionID", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET factionID = :factionID WHERE regionName = :regionName", array(":regionName"=>$regionName, ":factionID"=>$factionID));
		}
	}

	/**
	 * @param mixed $radius
	 * @param mixed $factionID
	 */

	public function updateRadiusByFactionID($radius, $factionID) {
		$exists = $this->db->queryField("SELECT radius FROM mapRegions WHERE factionID = :factionID", "radius", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET radius = :radius WHERE factionID = :factionID", array(":factionID"=>$factionID, ":radius"=>$radius));
		}
	}

	/**
	 * @param mixed $radius
	 * @param mixed $regionID
	 */

	public function updateRadiusByRegionID($radius, $regionID) {
		$exists = $this->db->queryField("SELECT radius FROM mapRegions WHERE regionID = :regionID", "radius", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET radius = :radius WHERE regionID = :regionID", array(":regionID"=>$regionID, ":radius"=>$radius));
		}
	}

	/**
	 * @param mixed $radius
	 * @param mixed $regionName
	 */

	public function updateRadiusByRegionName($radius, $regionName) {
		$exists = $this->db->queryField("SELECT radius FROM mapRegions WHERE regionName = :regionName", "radius", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET radius = :radius WHERE regionName = :regionName", array(":regionName"=>$regionName, ":radius"=>$radius));
		}
	}

	/**
	 * @param mixed $regionID
	 * @param mixed $factionID
	 */

	public function updateRegionIDByFactionID($regionID, $factionID) {
		$exists = $this->db->queryField("SELECT regionID FROM mapRegions WHERE factionID = :factionID", "regionID", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET regionID = :regionID WHERE factionID = :factionID", array(":factionID"=>$factionID, ":regionID"=>$regionID));
		}
	}

	/**
	 * @param mixed $regionID
	 * @param mixed $regionName
	 */

	public function updateRegionIDByRegionName($regionID, $regionName) {
		$exists = $this->db->queryField("SELECT regionID FROM mapRegions WHERE regionName = :regionName", "regionID", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET regionID = :regionID WHERE regionName = :regionName", array(":regionName"=>$regionName, ":regionID"=>$regionID));
		}
	}

	/**
	 * @param mixed $regionName
	 * @param mixed $factionID
	 */

	public function updateRegionNameByFactionID($regionName, $factionID) {
		$exists = $this->db->queryField("SELECT regionName FROM mapRegions WHERE factionID = :factionID", "regionName", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET regionName = :regionName WHERE factionID = :factionID", array(":factionID"=>$factionID, ":regionName"=>$regionName));
		}
	}

	/**
	 * @param mixed $regionName
	 * @param mixed $regionID
	 */

	public function updateRegionNameByRegionID($regionName, $regionID) {
		$exists = $this->db->queryField("SELECT regionName FROM mapRegions WHERE regionID = :regionID", "regionName", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET regionName = :regionName WHERE regionID = :regionID", array(":regionID"=>$regionID, ":regionName"=>$regionName));
		}
	}

	/**
	 * @param mixed $x
	 * @param mixed $factionID
	 */

	public function updateXByFactionID($x, $factionID) {
		$exists = $this->db->queryField("SELECT x FROM mapRegions WHERE factionID = :factionID", "x", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET x = :x WHERE factionID = :factionID", array(":factionID"=>$factionID, ":x"=>$x));
		}
	}

	/**
	 * @param mixed $x
	 * @param mixed $regionID
	 */

	public function updateXByRegionID($x, $regionID) {
		$exists = $this->db->queryField("SELECT x FROM mapRegions WHERE regionID = :regionID", "x", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET x = :x WHERE regionID = :regionID", array(":regionID"=>$regionID, ":x"=>$x));
		}
	}

	/**
	 * @param mixed $x
	 * @param mixed $regionName
	 */

	public function updateXByRegionName($x, $regionName) {
		$exists = $this->db->queryField("SELECT x FROM mapRegions WHERE regionName = :regionName", "x", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET x = :x WHERE regionName = :regionName", array(":regionName"=>$regionName, ":x"=>$x));
		}
	}

	/**
	 * @param mixed $xMax
	 * @param mixed $factionID
	 */

	public function updateXMaxByFactionID($xMax, $factionID) {
		$exists = $this->db->queryField("SELECT xMax FROM mapRegions WHERE factionID = :factionID", "xMax", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMax = :xMax WHERE factionID = :factionID", array(":factionID"=>$factionID, ":xMax"=>$xMax));
		}
	}

	/**
	 * @param mixed $xMax
	 * @param mixed $regionID
	 */

	public function updateXMaxByRegionID($xMax, $regionID) {
		$exists = $this->db->queryField("SELECT xMax FROM mapRegions WHERE regionID = :regionID", "xMax", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMax = :xMax WHERE regionID = :regionID", array(":regionID"=>$regionID, ":xMax"=>$xMax));
		}
	}

	/**
	 * @param mixed $xMax
	 * @param mixed $regionName
	 */

	public function updateXMaxByRegionName($xMax, $regionName) {
		$exists = $this->db->queryField("SELECT xMax FROM mapRegions WHERE regionName = :regionName", "xMax", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMax = :xMax WHERE regionName = :regionName", array(":regionName"=>$regionName, ":xMax"=>$xMax));
		}
	}

	/**
	 * @param mixed $xMin
	 * @param mixed $factionID
	 */

	public function updateXMinByFactionID($xMin, $factionID) {
		$exists = $this->db->queryField("SELECT xMin FROM mapRegions WHERE factionID = :factionID", "xMin", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMin = :xMin WHERE factionID = :factionID", array(":factionID"=>$factionID, ":xMin"=>$xMin));
		}
	}

	/**
	 * @param mixed $xMin
	 * @param mixed $regionID
	 */

	public function updateXMinByRegionID($xMin, $regionID) {
		$exists = $this->db->queryField("SELECT xMin FROM mapRegions WHERE regionID = :regionID", "xMin", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMin = :xMin WHERE regionID = :regionID", array(":regionID"=>$regionID, ":xMin"=>$xMin));
		}
	}

	/**
	 * @param mixed $xMin
	 * @param mixed $regionName
	 */

	public function updateXMinByRegionName($xMin, $regionName) {
		$exists = $this->db->queryField("SELECT xMin FROM mapRegions WHERE regionName = :regionName", "xMin", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET xMin = :xMin WHERE regionName = :regionName", array(":regionName"=>$regionName, ":xMin"=>$xMin));
		}
	}

	/**
	 * @param mixed $y
	 * @param mixed $factionID
	 */

	public function updateYByFactionID($y, $factionID) {
		$exists = $this->db->queryField("SELECT y FROM mapRegions WHERE factionID = :factionID", "y", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET y = :y WHERE factionID = :factionID", array(":factionID"=>$factionID, ":y"=>$y));
		}
	}

	/**
	 * @param mixed $y
	 * @param mixed $regionID
	 */

	public function updateYByRegionID($y, $regionID) {
		$exists = $this->db->queryField("SELECT y FROM mapRegions WHERE regionID = :regionID", "y", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET y = :y WHERE regionID = :regionID", array(":regionID"=>$regionID, ":y"=>$y));
		}
	}

	/**
	 * @param mixed $y
	 * @param mixed $regionName
	 */

	public function updateYByRegionName($y, $regionName) {
		$exists = $this->db->queryField("SELECT y FROM mapRegions WHERE regionName = :regionName", "y", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET y = :y WHERE regionName = :regionName", array(":regionName"=>$regionName, ":y"=>$y));
		}
	}

	/**
	 * @param mixed $yMax
	 * @param mixed $factionID
	 */

	public function updateYMaxByFactionID($yMax, $factionID) {
		$exists = $this->db->queryField("SELECT yMax FROM mapRegions WHERE factionID = :factionID", "yMax", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMax = :yMax WHERE factionID = :factionID", array(":factionID"=>$factionID, ":yMax"=>$yMax));
		}
	}

	/**
	 * @param mixed $yMax
	 * @param mixed $regionID
	 */

	public function updateYMaxByRegionID($yMax, $regionID) {
		$exists = $this->db->queryField("SELECT yMax FROM mapRegions WHERE regionID = :regionID", "yMax", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMax = :yMax WHERE regionID = :regionID", array(":regionID"=>$regionID, ":yMax"=>$yMax));
		}
	}

	/**
	 * @param mixed $yMax
	 * @param mixed $regionName
	 */

	public function updateYMaxByRegionName($yMax, $regionName) {
		$exists = $this->db->queryField("SELECT yMax FROM mapRegions WHERE regionName = :regionName", "yMax", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMax = :yMax WHERE regionName = :regionName", array(":regionName"=>$regionName, ":yMax"=>$yMax));
		}
	}

	/**
	 * @param mixed $yMin
	 * @param mixed $factionID
	 */

	public function updateYMinByFactionID($yMin, $factionID) {
		$exists = $this->db->queryField("SELECT yMin FROM mapRegions WHERE factionID = :factionID", "yMin", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMin = :yMin WHERE factionID = :factionID", array(":factionID"=>$factionID, ":yMin"=>$yMin));
		}
	}

	/**
	 * @param mixed $yMin
	 * @param mixed $regionID
	 */

	public function updateYMinByRegionID($yMin, $regionID) {
		$exists = $this->db->queryField("SELECT yMin FROM mapRegions WHERE regionID = :regionID", "yMin", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMin = :yMin WHERE regionID = :regionID", array(":regionID"=>$regionID, ":yMin"=>$yMin));
		}
	}

	/**
	 * @param mixed $yMin
	 * @param mixed $regionName
	 */

	public function updateYMinByRegionName($yMin, $regionName) {
		$exists = $this->db->queryField("SELECT yMin FROM mapRegions WHERE regionName = :regionName", "yMin", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET yMin = :yMin WHERE regionName = :regionName", array(":regionName"=>$regionName, ":yMin"=>$yMin));
		}
	}

	/**
	 * @param mixed $z
	 * @param mixed $factionID
	 */

	public function updateZByFactionID($z, $factionID) {
		$exists = $this->db->queryField("SELECT z FROM mapRegions WHERE factionID = :factionID", "z", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET z = :z WHERE factionID = :factionID", array(":factionID"=>$factionID, ":z"=>$z));
		}
	}

	/**
	 * @param mixed $z
	 * @param mixed $regionID
	 */

	public function updateZByRegionID($z, $regionID) {
		$exists = $this->db->queryField("SELECT z FROM mapRegions WHERE regionID = :regionID", "z", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET z = :z WHERE regionID = :regionID", array(":regionID"=>$regionID, ":z"=>$z));
		}
	}

	/**
	 * @param mixed $z
	 * @param mixed $regionName
	 */

	public function updateZByRegionName($z, $regionName) {
		$exists = $this->db->queryField("SELECT z FROM mapRegions WHERE regionName = :regionName", "z", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET z = :z WHERE regionName = :regionName", array(":regionName"=>$regionName, ":z"=>$z));
		}
	}

	/**
	 * @param mixed $zMax
	 * @param mixed $factionID
	 */

	public function updateZMaxByFactionID($zMax, $factionID) {
		$exists = $this->db->queryField("SELECT zMax FROM mapRegions WHERE factionID = :factionID", "zMax", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMax = :zMax WHERE factionID = :factionID", array(":factionID"=>$factionID, ":zMax"=>$zMax));
		}
	}

	/**
	 * @param mixed $zMax
	 * @param mixed $regionID
	 */

	public function updateZMaxByRegionID($zMax, $regionID) {
		$exists = $this->db->queryField("SELECT zMax FROM mapRegions WHERE regionID = :regionID", "zMax", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMax = :zMax WHERE regionID = :regionID", array(":regionID"=>$regionID, ":zMax"=>$zMax));
		}
	}

	/**
	 * @param mixed $zMax
	 * @param mixed $regionName
	 */

	public function updateZMaxByRegionName($zMax, $regionName) {
		$exists = $this->db->queryField("SELECT zMax FROM mapRegions WHERE regionName = :regionName", "zMax", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMax = :zMax WHERE regionName = :regionName", array(":regionName"=>$regionName, ":zMax"=>$zMax));
		}
	}

	/**
	 * @param mixed $zMin
	 * @param mixed $factionID
	 */

	public function updateZMinByFactionID($zMin, $factionID) {
		$exists = $this->db->queryField("SELECT zMin FROM mapRegions WHERE factionID = :factionID", "zMin", array(":factionID"=>$factionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMin = :zMin WHERE factionID = :factionID", array(":factionID"=>$factionID, ":zMin"=>$zMin));
		}
	}

	/**
	 * @param mixed $zMin
	 * @param mixed $regionID
	 */

	public function updateZMinByRegionID($zMin, $regionID) {
		$exists = $this->db->queryField("SELECT zMin FROM mapRegions WHERE regionID = :regionID", "zMin", array(":regionID"=>$regionID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMin = :zMin WHERE regionID = :regionID", array(":regionID"=>$regionID, ":zMin"=>$zMin));
		}
	}

	/**
	 * @param mixed $zMin
	 * @param mixed $regionName
	 */

	public function updateZMinByRegionName($zMin, $regionName) {
		$exists = $this->db->queryField("SELECT zMin FROM mapRegions WHERE regionName = :regionName", "zMin", array(":regionName"=>$regionName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE mapRegions SET zMin = :zMin WHERE regionName = :regionName", array(":regionName"=>$regionName, ":zMin"=>$zMin));
		}
	}

	public function insertIntoMapRegions($regionID, $regionName, $x, $y, $z, $xMin, $xMax, $yMin, $yMax, $zMin, $zMax, $factionID, $radius) {
		$this->db->execute("INSERT INTO mapRegions (regionID, regionName, x, y, z, xMin, xMax, yMin, yMax, zMin, zMax, factionID, radius) VALUES (:regionID, :regionName, :x, :y, :z, :xMin, :xMax, :yMin, :yMax, :zMin, :zMax, :factionID, :radius)", array(":regionID"=>$regionID, ":regionName"=>$regionName, ":x"=>$x, ":y"=>$y, ":z"=>$z, ":xMin"=>$xMin, ":xMax"=>$xMax, ":yMin"=>$yMin, ":yMax"=>$yMax, ":zMin"=>$zMin, ":zMax"=>$zMax, ":factionID"=>$factionID, ":radius"=>$radius));
	}
}
