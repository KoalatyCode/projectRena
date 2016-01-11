<?php
namespace ProjectRena\Model\Database\EVE;

use ProjectRena\RenaApp;


/**
 * CRUD for Killmails database table
 */
class killmails
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
     * @param int $hash
     * @return array|bool
     */

    public function getAllByHash($hash)
    {
        return $this->db->query("SELECT * FROM killmails WHERE hash = :hash", array(":hash" => $hash));
    }

    /**
     * @param int $killID
     * @return array|bool
     */

    public function getAllByKillID($killID)
    {
        return $this->db->query("SELECT * FROM killmails WHERE killID = :killID", array(":killID" => $killID));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getDateAddedByHash($hash)
    {
        return $this->db->queryField("SELECT dateAdded FROM killmails WHERE hash = :hash", "dateAdded", array(":hash" => $hash));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getDateAddedByKillID($killID)
    {
        return $this->db->queryField("SELECT dateAdded FROM killmails WHERE killID = :killID", "dateAdded", array(":killID" => $killID));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getHashByKillID($killID)
    {
        return $this->db->queryField("SELECT hash FROM killmails WHERE killID = :killID", "hash", array(":killID" => $killID));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getKill_jsonByHash($hash)
    {
        return $this->db->queryField("SELECT kill_json FROM killmails WHERE hash = :hash", "kill_json", array(":hash" => $hash));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getKill_jsonByKillID($killID)
    {
        return $this->db->queryField("SELECT kill_json FROM killmails WHERE killID = :killID", "kill_json", array(":killID" => $killID));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getKillIDByHash($hash)
    {
        return $this->db->queryField("SELECT killID FROM killmails WHERE hash = :hash", "killID", array(":hash" => $hash));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getProcessedByHash($hash)
    {
        return $this->db->queryField("SELECT processed FROM killmails WHERE hash = :hash", "processed", array(":hash" => $hash));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getProcessedByKillID($killID)
    {
        return $this->db->queryField("SELECT processed FROM killmails WHERE killID = :killID", "processed", array(":killID" => $killID));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getSourceByHash($hash)
    {
        return $this->db->queryField("SELECT source FROM killmails WHERE hash = :hash", "source", array(":hash" => $hash));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getSourceByKillID($killID)
    {
        return $this->db->queryField("SELECT source FROM killmails WHERE killID = :killID", "source", array(":killID" => $killID));
    }

    /**
     * @param mixed $hash
     * @return string
     */

    public function getUpgradedByHash($hash)
    {
        return $this->db->queryField("SELECT upgraded FROM killmails WHERE hash = :hash", "upgraded", array(":hash" => $hash));
    }

    /**
     * @param mixed $killID
     * @return string
     */

    public function getUpgradedByKillID($killID)
    {
        return $this->db->queryField("SELECT upgraded FROM killmails WHERE killID = :killID", "upgraded", array(":killID" => $killID));
    }

    /**
     * @param mixed $dateAdded
     * @param mixed $hash
     */

    public function updateDateAddedByHash($dateAdded, $hash)
    {
        $exists = $this->db->queryField("SELECT dateAdded FROM killmails WHERE hash = :hash", "dateAdded", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET dateAdded = :dateAdded WHERE hash = :hash", array(":hash" => $hash, ":dateAdded" => $dateAdded));
        }
    }

    /**
     * @param mixed $dateAdded
     * @param mixed $killID
     */

    public function updateDateAddedByKillID($dateAdded, $killID)
    {
        $exists = $this->db->queryField("SELECT dateAdded FROM killmails WHERE killID = :killID", "dateAdded", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET dateAdded = :dateAdded WHERE killID = :killID", array(":killID" => $killID, ":dateAdded" => $dateAdded));
        }
    }

    /**
     * @param mixed $hash
     * @param mixed $killID
     */

    public function updateHashByKillID($hash, $killID)
    {
        $exists = $this->db->queryField("SELECT hash FROM killmails WHERE killID = :killID", "hash", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET hash = :hash WHERE killID = :killID", array(":killID" => $killID, ":hash" => $hash));
        }
    }

    /**
     * @param mixed $kill_json
     * @param mixed $hash
     */

    public function updateKill_jsonByHash($kill_json, $hash)
    {
        $exists = $this->db->queryField("SELECT kill_json FROM killmails WHERE hash = :hash", "kill_json", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET kill_json = :kill_json WHERE hash = :hash", array(":hash" => $hash, ":kill_json" => $kill_json));
        }
    }

    /**
     * @param mixed $kill_json
     * @param mixed $killID
     */

    public function updateKill_jsonByKillID($kill_json, $killID)
    {
        $exists = $this->db->queryField("SELECT kill_json FROM killmails WHERE killID = :killID", "kill_json", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET kill_json = :kill_json WHERE killID = :killID", array(":killID" => $killID, ":kill_json" => $kill_json));
        }
    }

    /**
     * @param mixed $killID
     * @param mixed $hash
     */

    public function updateKillIDByHash($killID, $hash)
    {
        $exists = $this->db->queryField("SELECT killID FROM killmails WHERE hash = :hash", "killID", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET killID = :killID WHERE hash = :hash", array(":hash" => $hash, ":killID" => $killID));
        }
    }

    /**
     * @param mixed $processed
     * @param mixed $hash
     */

    public function updateProcessedByHash($processed, $hash)
    {
        $exists = $this->db->queryField("SELECT processed FROM killmails WHERE hash = :hash", "processed", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET processed = :processed WHERE hash = :hash", array(":hash" => $hash, ":processed" => $processed));
        }
    }

    /**
     * @param mixed $processed
     * @param mixed $killID
     */

    public function updateProcessedByKillID($processed, $killID)
    {
        $exists = $this->db->queryField("SELECT processed FROM killmails WHERE killID = :killID", "processed", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET processed = :processed WHERE killID = :killID", array(":killID" => $killID, ":processed" => $processed));
        }
    }

    /**
     * @param mixed $source
     * @param mixed $hash
     */

    public function updateSourceByHash($source, $hash)
    {
        $exists = $this->db->queryField("SELECT source FROM killmails WHERE hash = :hash", "source", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET source = :source WHERE hash = :hash", array(":hash" => $hash, ":source" => $source));
        }
    }

    /**
     * @param mixed $source
     * @param mixed $killID
     */

    public function updateSourceByKillID($source, $killID)
    {
        $exists = $this->db->queryField("SELECT source FROM killmails WHERE killID = :killID", "source", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET source = :source WHERE killID = :killID", array(":killID" => $killID, ":source" => $source));
        }
    }

    /**
     * @param mixed $upgraded
     * @param mixed $hash
     */

    public function updateUpgradedByHash($upgraded, $hash)
    {
        $exists = $this->db->queryField("SELECT upgraded FROM killmails WHERE hash = :hash", "upgraded", array(":hash" => $hash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET upgraded = :upgraded WHERE hash = :hash", array(":hash" => $hash, ":upgraded" => $upgraded));
        }
    }

    /**
     * @param mixed $upgraded
     * @param mixed $killID
     */

    public function updateUpgradedByKillID($upgraded, $killID)
    {
        $exists = $this->db->queryField("SELECT upgraded FROM killmails WHERE killID = :killID", "upgraded", array(":killID" => $killID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE killmails SET upgraded = :upgraded WHERE killID = :killID", array(":killID" => $killID, ":upgraded" => $upgraded));
        }
    }

    /**
     * @param $killID
     * @param $processed
     * @param $hash
     * @param $source
     * @param $kill_json
     * @return bool|int|string
     */
    public function insertIntoKillmails($killID, $processed = 0, $hash, $source, $kill_json)
    {
        return $this->db->execute("INSERT IGNORE INTO killmails (killID, processed, hash, source, kill_json) VALUES (:killID, :processed, :hash, :source, :kill_json)", array(":killID" => $killID, ":processed" => $processed, ":hash" => $hash, ":source" => $source, ":kill_json" => $kill_json));
    }
}
