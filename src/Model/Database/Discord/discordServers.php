<?php
namespace ProjectRena\Model\Database\Discord;

use ProjectRena\RenaApp;


/**
 * Discord server model
 */
class discordServers {

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
	 * @param int $ownerID
	 */

	public function getAllByOwnerID($ownerID) {
		return$this->db->query("SELECT * FROM discordServers WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param int $serverHash
	 */

	public function getAllByServerHash($serverHash) {
		return$this->db->query("SELECT * FROM discordServers WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param int $serverID
	 */

	public function getAllByServerID($serverID) {
		return$this->db->query("SELECT * FROM discordServers WHERE serverID = :serverID", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getAllByServerName($serverName) {
		return$this->db->query("SELECT * FROM discordServers WHERE serverName = :serverName", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $ownerID
	 */

	public function getAllowedEntitiesByOwnerID($ownerID) {
		return$this->db->queryField("SELECT allowedEntities FROM discordServers WHERE ownerID = :ownerID", "allowedEntities", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param mixed $serverHash
	 */

	public function getAllowedEntitiesByServerHash($serverHash) {
		return$this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverHash = :serverHash", "allowedEntities", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param mixed $serverID
	 */

	public function getAllowedEntitiesByServerID($serverID) {
		return$this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverID = :serverID", "allowedEntities", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getAllowedEntitiesByServerName($serverName) {
		return$this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverName = :serverName", "allowedEntities", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $ownerID
	 */

	public function getCreatedByOwnerID($ownerID) {
		return$this->db->queryField("SELECT created FROM discordServers WHERE ownerID = :ownerID", "created", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param mixed $serverHash
	 */

	public function getCreatedByServerHash($serverHash) {
		return$this->db->queryField("SELECT created FROM discordServers WHERE serverHash = :serverHash", "created", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param mixed $serverID
	 */

	public function getCreatedByServerID($serverID) {
		return$this->db->queryField("SELECT created FROM discordServers WHERE serverID = :serverID", "created", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getCreatedByServerName($serverName) {
		return$this->db->queryField("SELECT created FROM discordServers WHERE serverName = :serverName", "created", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $serverHash
	 */

	public function getOwnerIDByServerHash($serverHash) {
		return$this->db->queryField("SELECT ownerID FROM discordServers WHERE serverHash = :serverHash", "ownerID", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param mixed $serverID
	 */

	public function getOwnerIDByServerID($serverID) {
		return$this->db->queryField("SELECT ownerID FROM discordServers WHERE serverID = :serverID", "ownerID", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getOwnerIDByServerName($serverName) {
		return$this->db->queryField("SELECT ownerID FROM discordServers WHERE serverName = :serverName", "ownerID", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $ownerID
	 */

	public function getServerHashByOwnerID($ownerID) {
		return$this->db->queryField("SELECT serverHash FROM discordServers WHERE ownerID = :ownerID", "serverHash", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param mixed $serverID
	 */

	public function getServerHashByServerID($serverID) {
		return$this->db->queryField("SELECT serverHash FROM discordServers WHERE serverID = :serverID", "serverHash", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getServerHashByServerName($serverName) {
		return$this->db->queryField("SELECT serverHash FROM discordServers WHERE serverName = :serverName", "serverHash", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $ownerID
	 */

	public function getServerIDByOwnerID($ownerID) {
		return$this->db->queryField("SELECT serverID FROM discordServers WHERE ownerID = :ownerID", "serverID", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param mixed $serverHash
	 */

	public function getServerIDByServerHash($serverHash) {
		return$this->db->queryField("SELECT serverID FROM discordServers WHERE serverHash = :serverHash", "serverID", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param mixed $serverName
	 */

	public function getServerIDByServerName($serverName) {
		return$this->db->queryField("SELECT serverID FROM discordServers WHERE serverName = :serverName", "serverID", array(":serverName"=>$serverName));
	}

	/**
	 * @param mixed $ownerID
	 */

	public function getServerNameByOwnerID($ownerID) {
		return$this->db->queryField("SELECT serverName FROM discordServers WHERE ownerID = :ownerID", "serverName", array(":ownerID"=>$ownerID));
	}

	/**
	 * @param mixed $serverHash
	 */

	public function getServerNameByServerHash($serverHash) {
		return$this->db->queryField("SELECT serverName FROM discordServers WHERE serverHash = :serverHash", "serverName", array(":serverHash"=>$serverHash));
	}

	/**
	 * @param mixed $serverID
	 */

	public function getServerNameByServerID($serverID) {
		return$this->db->queryField("SELECT serverName FROM discordServers WHERE serverID = :serverID", "serverName", array(":serverID"=>$serverID));
	}

	/**
	 * @param mixed $allowedEntities
	 * @param mixed $ownerID
	 */

	public function updateAllowedEntitiesByOwnerID($allowedEntities, $ownerID) {
		$exists = $this->db->queryField("SELECT allowedEntities FROM discordServers WHERE ownerID = :ownerID", "allowedEntities", array(":ownerID"=>$ownerID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET allowedEntities = :allowedEntities WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID, ":allowedEntities"=>$allowedEntities));
		}
	}

	/**
	 * @param mixed $allowedEntities
	 * @param mixed $serverHash
	 */

	public function updateAllowedEntitiesByServerHash($allowedEntities, $serverHash) {
		$exists = $this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverHash = :serverHash", "allowedEntities", array(":serverHash"=>$serverHash));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET allowedEntities = :allowedEntities WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash, ":allowedEntities"=>$allowedEntities));
		}
	}

	/**
	 * @param mixed $allowedEntities
	 * @param mixed $serverID
	 */

	public function updateAllowedEntitiesByServerID($allowedEntities, $serverID) {
		$exists = $this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverID = :serverID", "allowedEntities", array(":serverID"=>$serverID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET allowedEntities = :allowedEntities WHERE serverID = :serverID", array(":serverID"=>$serverID, ":allowedEntities"=>$allowedEntities));
		}
	}

	/**
	 * @param mixed $allowedEntities
	 * @param mixed $serverName
	 */

	public function updateAllowedEntitiesByServerName($allowedEntities, $serverName) {
		$exists = $this->db->queryField("SELECT allowedEntities FROM discordServers WHERE serverName = :serverName", "allowedEntities", array(":serverName"=>$serverName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET allowedEntities = :allowedEntities WHERE serverName = :serverName", array(":serverName"=>$serverName, ":allowedEntities"=>$allowedEntities));
		}
	}

	/**
	 * @param mixed $created
	 * @param mixed $ownerID
	 */

	public function updateCreatedByOwnerID($created, $ownerID) {
		$exists = $this->db->queryField("SELECT created FROM discordServers WHERE ownerID = :ownerID", "created", array(":ownerID"=>$ownerID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET created = :created WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID, ":created"=>$created));
		}
	}

	/**
	 * @param mixed $created
	 * @param mixed $serverHash
	 */

	public function updateCreatedByServerHash($created, $serverHash) {
		$exists = $this->db->queryField("SELECT created FROM discordServers WHERE serverHash = :serverHash", "created", array(":serverHash"=>$serverHash));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET created = :created WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash, ":created"=>$created));
		}
	}

	/**
	 * @param mixed $created
	 * @param mixed $serverID
	 */

	public function updateCreatedByServerID($created, $serverID) {
		$exists = $this->db->queryField("SELECT created FROM discordServers WHERE serverID = :serverID", "created", array(":serverID"=>$serverID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET created = :created WHERE serverID = :serverID", array(":serverID"=>$serverID, ":created"=>$created));
		}
	}

	/**
	 * @param mixed $created
	 * @param mixed $serverName
	 */

	public function updateCreatedByServerName($created, $serverName) {
		$exists = $this->db->queryField("SELECT created FROM discordServers WHERE serverName = :serverName", "created", array(":serverName"=>$serverName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET created = :created WHERE serverName = :serverName", array(":serverName"=>$serverName, ":created"=>$created));
		}
	}

	/**
	 * @param mixed $ownerID
	 * @param mixed $serverHash
	 */

	public function updateOwnerIDByServerHash($ownerID, $serverHash) {
		$exists = $this->db->queryField("SELECT ownerID FROM discordServers WHERE serverHash = :serverHash", "ownerID", array(":serverHash"=>$serverHash));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET ownerID = :ownerID WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash, ":ownerID"=>$ownerID));
		}
	}

	/**
	 * @param mixed $ownerID
	 * @param mixed $serverID
	 */

	public function updateOwnerIDByServerID($ownerID, $serverID) {
		$exists = $this->db->queryField("SELECT ownerID FROM discordServers WHERE serverID = :serverID", "ownerID", array(":serverID"=>$serverID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET ownerID = :ownerID WHERE serverID = :serverID", array(":serverID"=>$serverID, ":ownerID"=>$ownerID));
		}
	}

	/**
	 * @param mixed $ownerID
	 * @param mixed $serverName
	 */

	public function updateOwnerIDByServerName($ownerID, $serverName) {
		$exists = $this->db->queryField("SELECT ownerID FROM discordServers WHERE serverName = :serverName", "ownerID", array(":serverName"=>$serverName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET ownerID = :ownerID WHERE serverName = :serverName", array(":serverName"=>$serverName, ":ownerID"=>$ownerID));
		}
	}

	/**
	 * @param mixed $serverHash
	 * @param mixed $ownerID
	 */

	public function updateServerHashByOwnerID($serverHash, $ownerID) {
		$exists = $this->db->queryField("SELECT serverHash FROM discordServers WHERE ownerID = :ownerID", "serverHash", array(":ownerID"=>$ownerID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverHash = :serverHash WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID, ":serverHash"=>$serverHash));
		}
	}

	/**
	 * @param mixed $serverHash
	 * @param mixed $serverID
	 */

	public function updateServerHashByServerID($serverHash, $serverID) {
		$exists = $this->db->queryField("SELECT serverHash FROM discordServers WHERE serverID = :serverID", "serverHash", array(":serverID"=>$serverID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverHash = :serverHash WHERE serverID = :serverID", array(":serverID"=>$serverID, ":serverHash"=>$serverHash));
		}
	}

	/**
	 * @param mixed $serverHash
	 * @param mixed $serverName
	 */

	public function updateServerHashByServerName($serverHash, $serverName) {
		$exists = $this->db->queryField("SELECT serverHash FROM discordServers WHERE serverName = :serverName", "serverHash", array(":serverName"=>$serverName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverHash = :serverHash WHERE serverName = :serverName", array(":serverName"=>$serverName, ":serverHash"=>$serverHash));
		}
	}

	/**
	 * @param mixed $serverID
	 * @param mixed $ownerID
	 */

	public function updateServerIDByOwnerID($serverID, $ownerID) {
		$exists = $this->db->queryField("SELECT serverID FROM discordServers WHERE ownerID = :ownerID", "serverID", array(":ownerID"=>$ownerID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverID = :serverID WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID, ":serverID"=>$serverID));
		}
	}

	/**
	 * @param mixed $serverID
	 * @param mixed $serverHash
	 */

	public function updateServerIDByServerHash($serverID, $serverHash) {
		$exists = $this->db->queryField("SELECT serverID FROM discordServers WHERE serverHash = :serverHash", "serverID", array(":serverHash"=>$serverHash));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverID = :serverID WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash, ":serverID"=>$serverID));
		}
	}

	/**
	 * @param mixed $serverID
	 * @param mixed $serverName
	 */

	public function updateServerIDByServerName($serverID, $serverName) {
		$exists = $this->db->queryField("SELECT serverID FROM discordServers WHERE serverName = :serverName", "serverID", array(":serverName"=>$serverName));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverID = :serverID WHERE serverName = :serverName", array(":serverName"=>$serverName, ":serverID"=>$serverID));
		}
	}

	/**
	 * @param mixed $serverName
	 * @param mixed $ownerID
	 */

	public function updateServerNameByOwnerID($serverName, $ownerID) {
		$exists = $this->db->queryField("SELECT serverName FROM discordServers WHERE ownerID = :ownerID", "serverName", array(":ownerID"=>$ownerID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverName = :serverName WHERE ownerID = :ownerID", array(":ownerID"=>$ownerID, ":serverName"=>$serverName));
		}
	}

	/**
	 * @param mixed $serverName
	 * @param mixed $serverHash
	 */

	public function updateServerNameByServerHash($serverName, $serverHash) {
		$exists = $this->db->queryField("SELECT serverName FROM discordServers WHERE serverHash = :serverHash", "serverName", array(":serverHash"=>$serverHash));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverName = :serverName WHERE serverHash = :serverHash", array(":serverHash"=>$serverHash, ":serverName"=>$serverName));
		}
	}

	/**
	 * @param mixed $serverName
	 * @param mixed $serverID
	 */

	public function updateServerNameByServerID($serverName, $serverID) {
		$exists = $this->db->queryField("SELECT serverName FROM discordServers WHERE serverID = :serverID", "serverName", array(":serverID"=>$serverID));
		if (!empty($exists)) {
			$this->db->execute("UPDATE discordServers SET serverName = :serverName WHERE serverID = :serverID", array(":serverID"=>$serverID, ":serverName"=>$serverName));
		}
	}

	public function insertIntoDiscordServers($serverID, $serverHash, $serverName, $ownerID, $allowedEntities, $created) {
		$this->db->execute("INSERT IGNORE INTO discordServers (serverID, serverHash, serverName, ownerID, allowedEntities, created) VALUES (:serverID, :serverHash, :serverName, :ownerID, :allowedEntities, :created)", array(":serverID"=>$serverID, ":serverHash"=>$serverHash, ":serverName"=>$serverName, ":ownerID"=>$ownerID, ":allowedEntities"=>$allowedEntities, ":created"=>$created));
	}
}
