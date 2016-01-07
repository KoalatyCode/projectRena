<?php
namespace ProjectRena\Model\Database;

use ProjectRena\RenaApp;


/**
 * User model for discord
 */
class discordUsers
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
     * @param int $allianceID
     */

    public function getAllByAllianceID($allianceID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE allianceID = :allianceID", array(":allianceID" => $allianceID));
    }

    /**
     * @param int $characterID
     */

    public function getAllByCharacterID($characterID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE characterID = :characterID", array(":characterID" => $characterID));
    }

    /**
     * @param int $corporationID
     */

    public function getAllByCorporationID($corporationID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE corporationID = :corporationID", array(":corporationID" => $corporationID));
    }

    /**
     * @param int $discordID
     */

    public function getAllByDiscordID($discordID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE discordID = :discordID", array(":discordID" => $discordID));
    }

    /**
     * @param int $serverID
     */

    public function getAllByServerID($serverID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE serverID = :serverID", array(":serverID" => $serverID));
    }

    /**
     * @param int $userID
     */

    public function getAllByUserID($userID)
    {
        return $this->db->query("SELECT * FROM discordUsers WHERE userID = :userID", array(":userID" => $userID));
    }

    /**
     * @param mixed $characterID
     */

    public function getAllianceIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT allianceID FROM discordUsers WHERE characterID = :characterID", "allianceID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getAllianceIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT allianceID FROM discordUsers WHERE corporationID = :corporationID", "allianceID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getAllianceIDByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT allianceID FROM discordUsers WHERE discordID = :discordID", "allianceID", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getAllianceIDByServerID($serverID)
    {
        return $this->db->queryField("SELECT allianceID FROM discordUsers WHERE serverID = :serverID", "allianceID", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getAllianceIDByUserID($userID)
    {
        return $this->db->queryField("SELECT allianceID FROM discordUsers WHERE userID = :userID", "allianceID", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getAuthStringByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE allianceID = :allianceID", "authString", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getAuthStringByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE characterID = :characterID", "authString", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getAuthStringByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE corporationID = :corporationID", "authString", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getAuthStringByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE discordID = :discordID", "authString", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getAuthStringByServerID($serverID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE serverID = :serverID", "authString", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getAuthStringByUserID($userID)
    {
        return $this->db->queryField("SELECT authString FROM discordUsers WHERE userID = :userID", "authString", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getCharacterIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT characterID FROM discordUsers WHERE allianceID = :allianceID", "characterID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getCharacterIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT characterID FROM discordUsers WHERE corporationID = :corporationID", "characterID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getCharacterIDByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT characterID FROM discordUsers WHERE discordID = :discordID", "characterID", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getCharacterIDByServerID($serverID)
    {
        return $this->db->queryField("SELECT characterID FROM discordUsers WHERE serverID = :serverID", "characterID", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getCharacterIDByUserID($userID)
    {
        return $this->db->queryField("SELECT characterID FROM discordUsers WHERE userID = :userID", "characterID", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getCorporationIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT corporationID FROM discordUsers WHERE allianceID = :allianceID", "corporationID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getCorporationIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT corporationID FROM discordUsers WHERE characterID = :characterID", "corporationID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $discordID
     */

    public function getCorporationIDByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT corporationID FROM discordUsers WHERE discordID = :discordID", "corporationID", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getCorporationIDByServerID($serverID)
    {
        return $this->db->queryField("SELECT corporationID FROM discordUsers WHERE serverID = :serverID", "corporationID", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getCorporationIDByUserID($userID)
    {
        return $this->db->queryField("SELECT corporationID FROM discordUsers WHERE userID = :userID", "corporationID", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getCreatedByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE allianceID = :allianceID", "created", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getCreatedByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE characterID = :characterID", "created", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getCreatedByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE corporationID = :corporationID", "created", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getCreatedByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE discordID = :discordID", "created", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getCreatedByServerID($serverID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE serverID = :serverID", "created", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getCreatedByUserID($userID)
    {
        return $this->db->queryField("SELECT created FROM discordUsers WHERE userID = :userID", "created", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getDiscordIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT discordID FROM discordUsers WHERE allianceID = :allianceID", "discordID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getDiscordIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT discordID FROM discordUsers WHERE characterID = :characterID", "discordID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getDiscordIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT discordID FROM discordUsers WHERE corporationID = :corporationID", "discordID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $serverID
     */

    public function getDiscordIDByServerID($serverID)
    {
        return $this->db->queryField("SELECT discordID FROM discordUsers WHERE serverID = :serverID", "discordID", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $userID
     */

    public function getDiscordIDByUserID($userID)
    {
        return $this->db->queryField("SELECT discordID FROM discordUsers WHERE userID = :userID", "discordID", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getServerIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT serverID FROM discordUsers WHERE allianceID = :allianceID", "serverID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getServerIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT serverID FROM discordUsers WHERE characterID = :characterID", "serverID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getServerIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT serverID FROM discordUsers WHERE corporationID = :corporationID", "serverID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getServerIDByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT serverID FROM discordUsers WHERE discordID = :discordID", "serverID", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $userID
     */

    public function getServerIDByUserID($userID)
    {
        return $this->db->queryField("SELECT serverID FROM discordUsers WHERE userID = :userID", "serverID", array(":userID" => $userID));
    }

    /**
     * @param mixed $allianceID
     */

    public function getUserIDByAllianceID($allianceID)
    {
        return $this->db->queryField("SELECT userID FROM discordUsers WHERE allianceID = :allianceID", "userID", array(":allianceID" => $allianceID));
    }

    /**
     * @param mixed $characterID
     */

    public function getUserIDByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT userID FROM discordUsers WHERE characterID = :characterID", "userID", array(":characterID" => $characterID));
    }

    /**
     * @param mixed $corporationID
     */

    public function getUserIDByCorporationID($corporationID)
    {
        return $this->db->queryField("SELECT userID FROM discordUsers WHERE corporationID = :corporationID", "userID", array(":corporationID" => $corporationID));
    }

    /**
     * @param mixed $discordID
     */

    public function getUserIDByDiscordID($discordID)
    {
        return $this->db->queryField("SELECT userID FROM discordUsers WHERE discordID = :discordID", "userID", array(":discordID" => $discordID));
    }

    /**
     * @param mixed $serverID
     */

    public function getUserIDByServerID($serverID)
    {
        return $this->db->queryField("SELECT userID FROM discordUsers WHERE serverID = :serverID", "userID", array(":serverID" => $serverID));
    }

    /**
     * @param mixed $allianceID
     * @param mixed $characterID
     */

    public function updateAllianceIDByCharacterID($allianceID, $characterID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM discordUsers WHERE characterID = :characterID", "allianceID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET allianceID = :allianceID WHERE characterID = :characterID", array(":characterID" => $characterID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $corporationID
     */

    public function updateAllianceIDByCorporationID($allianceID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM discordUsers WHERE corporationID = :corporationID", "allianceID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET allianceID = :allianceID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $discordID
     */

    public function updateAllianceIDByDiscordID($allianceID, $discordID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM discordUsers WHERE discordID = :discordID", "allianceID", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET allianceID = :allianceID WHERE discordID = :discordID", array(":discordID" => $discordID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $serverID
     */

    public function updateAllianceIDByServerID($allianceID, $serverID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM discordUsers WHERE serverID = :serverID", "allianceID", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET allianceID = :allianceID WHERE serverID = :serverID", array(":serverID" => $serverID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $allianceID
     * @param mixed $userID
     */

    public function updateAllianceIDByUserID($allianceID, $userID)
    {
        $exists = $this->db->queryField("SELECT allianceID FROM discordUsers WHERE userID = :userID", "allianceID", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET allianceID = :allianceID WHERE userID = :userID", array(":userID" => $userID, ":allianceID" => $allianceID));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $allianceID
     */

    public function updateAuthStringByAllianceID($authString, $allianceID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE allianceID = :allianceID", "authString", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $characterID
     */

    public function updateAuthStringByCharacterID($authString, $characterID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE characterID = :characterID", "authString", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE characterID = :characterID", array(":characterID" => $characterID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $corporationID
     */

    public function updateAuthStringByCorporationID($authString, $corporationID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE corporationID = :corporationID", "authString", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $discordID
     */

    public function updateAuthStringByDiscordID($authString, $discordID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE discordID = :discordID", "authString", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE discordID = :discordID", array(":discordID" => $discordID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $serverID
     */

    public function updateAuthStringByServerID($authString, $serverID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE serverID = :serverID", "authString", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE serverID = :serverID", array(":serverID" => $serverID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $authString
     * @param mixed $userID
     */

    public function updateAuthStringByUserID($authString, $userID)
    {
        $exists = $this->db->queryField("SELECT authString FROM discordUsers WHERE userID = :userID", "authString", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET authString = :authString WHERE userID = :userID", array(":userID" => $userID, ":authString" => $authString));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $allianceID
     */

    public function updateCharacterIDByAllianceID($characterID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM discordUsers WHERE allianceID = :allianceID", "characterID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET characterID = :characterID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $corporationID
     */

    public function updateCharacterIDByCorporationID($characterID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM discordUsers WHERE corporationID = :corporationID", "characterID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET characterID = :characterID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $discordID
     */

    public function updateCharacterIDByDiscordID($characterID, $discordID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM discordUsers WHERE discordID = :discordID", "characterID", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET characterID = :characterID WHERE discordID = :discordID", array(":discordID" => $discordID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $serverID
     */

    public function updateCharacterIDByServerID($characterID, $serverID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM discordUsers WHERE serverID = :serverID", "characterID", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET characterID = :characterID WHERE serverID = :serverID", array(":serverID" => $serverID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $characterID
     * @param mixed $userID
     */

    public function updateCharacterIDByUserID($characterID, $userID)
    {
        $exists = $this->db->queryField("SELECT characterID FROM discordUsers WHERE userID = :userID", "characterID", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET characterID = :characterID WHERE userID = :userID", array(":userID" => $userID, ":characterID" => $characterID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $allianceID
     */

    public function updateCorporationIDByAllianceID($corporationID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM discordUsers WHERE allianceID = :allianceID", "corporationID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET corporationID = :corporationID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $characterID
     */

    public function updateCorporationIDByCharacterID($corporationID, $characterID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM discordUsers WHERE characterID = :characterID", "corporationID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET corporationID = :corporationID WHERE characterID = :characterID", array(":characterID" => $characterID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $discordID
     */

    public function updateCorporationIDByDiscordID($corporationID, $discordID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM discordUsers WHERE discordID = :discordID", "corporationID", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET corporationID = :corporationID WHERE discordID = :discordID", array(":discordID" => $discordID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $serverID
     */

    public function updateCorporationIDByServerID($corporationID, $serverID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM discordUsers WHERE serverID = :serverID", "corporationID", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET corporationID = :corporationID WHERE serverID = :serverID", array(":serverID" => $serverID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $corporationID
     * @param mixed $userID
     */

    public function updateCorporationIDByUserID($corporationID, $userID)
    {
        $exists = $this->db->queryField("SELECT corporationID FROM discordUsers WHERE userID = :userID", "corporationID", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET corporationID = :corporationID WHERE userID = :userID", array(":userID" => $userID, ":corporationID" => $corporationID));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $allianceID
     */

    public function updateCreatedByAllianceID($created, $allianceID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE allianceID = :allianceID", "created", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":created" => $created));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $characterID
     */

    public function updateCreatedByCharacterID($created, $characterID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE characterID = :characterID", "created", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE characterID = :characterID", array(":characterID" => $characterID, ":created" => $created));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $corporationID
     */

    public function updateCreatedByCorporationID($created, $corporationID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE corporationID = :corporationID", "created", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":created" => $created));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $discordID
     */

    public function updateCreatedByDiscordID($created, $discordID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE discordID = :discordID", "created", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE discordID = :discordID", array(":discordID" => $discordID, ":created" => $created));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $serverID
     */

    public function updateCreatedByServerID($created, $serverID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE serverID = :serverID", "created", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE serverID = :serverID", array(":serverID" => $serverID, ":created" => $created));
        }
    }

    /**
     * @param mixed $created
     * @param mixed $userID
     */

    public function updateCreatedByUserID($created, $userID)
    {
        $exists = $this->db->queryField("SELECT created FROM discordUsers WHERE userID = :userID", "created", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET created = :created WHERE userID = :userID", array(":userID" => $userID, ":created" => $created));
        }
    }

    /**
     * @param mixed $discordID
     * @param mixed $allianceID
     */

    public function updateDiscordIDByAllianceID($discordID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT discordID FROM discordUsers WHERE allianceID = :allianceID", "discordID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET discordID = :discordID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":discordID" => $discordID));
        }
    }

    /**
     * @param mixed $discordID
     * @param mixed $characterID
     */

    public function updateDiscordIDByCharacterID($discordID, $characterID)
    {
        $exists = $this->db->queryField("SELECT discordID FROM discordUsers WHERE characterID = :characterID", "discordID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET discordID = :discordID WHERE characterID = :characterID", array(":characterID" => $characterID, ":discordID" => $discordID));
        }
    }

    /**
     * @param mixed $discordID
     * @param mixed $corporationID
     */

    public function updateDiscordIDByCorporationID($discordID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT discordID FROM discordUsers WHERE corporationID = :corporationID", "discordID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET discordID = :discordID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":discordID" => $discordID));
        }
    }

    /**
     * @param mixed $discordID
     * @param mixed $serverID
     */

    public function updateDiscordIDByServerID($discordID, $serverID)
    {
        $exists = $this->db->queryField("SELECT discordID FROM discordUsers WHERE serverID = :serverID", "discordID", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET discordID = :discordID WHERE serverID = :serverID", array(":serverID" => $serverID, ":discordID" => $discordID));
        }
    }

    /**
     * @param mixed $discordID
     * @param mixed $userID
     */

    public function updateDiscordIDByUserID($discordID, $userID)
    {
        $exists = $this->db->queryField("SELECT discordID FROM discordUsers WHERE userID = :userID", "discordID", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET discordID = :discordID WHERE userID = :userID", array(":userID" => $userID, ":discordID" => $discordID));
        }
    }

    /**
     * @param mixed $serverID
     * @param mixed $allianceID
     */

    public function updateServerIDByAllianceID($serverID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT serverID FROM discordUsers WHERE allianceID = :allianceID", "serverID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET serverID = :serverID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":serverID" => $serverID));
        }
    }

    /**
     * @param mixed $serverID
     * @param mixed $characterID
     */

    public function updateServerIDByCharacterID($serverID, $characterID)
    {
        $exists = $this->db->queryField("SELECT serverID FROM discordUsers WHERE characterID = :characterID", "serverID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET serverID = :serverID WHERE characterID = :characterID", array(":characterID" => $characterID, ":serverID" => $serverID));
        }
    }

    /**
     * @param mixed $serverID
     * @param mixed $corporationID
     */

    public function updateServerIDByCorporationID($serverID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT serverID FROM discordUsers WHERE corporationID = :corporationID", "serverID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET serverID = :serverID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":serverID" => $serverID));
        }
    }

    /**
     * @param mixed $serverID
     * @param mixed $discordID
     */

    public function updateServerIDByDiscordID($serverID, $discordID)
    {
        $exists = $this->db->queryField("SELECT serverID FROM discordUsers WHERE discordID = :discordID", "serverID", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET serverID = :serverID WHERE discordID = :discordID", array(":discordID" => $discordID, ":serverID" => $serverID));
        }
    }

    /**
     * @param mixed $serverID
     * @param mixed $userID
     */

    public function updateServerIDByUserID($serverID, $userID)
    {
        $exists = $this->db->queryField("SELECT serverID FROM discordUsers WHERE userID = :userID", "serverID", array(":userID" => $userID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET serverID = :serverID WHERE userID = :userID", array(":userID" => $userID, ":serverID" => $serverID));
        }
    }

    /**
     * @param mixed $userID
     * @param mixed $allianceID
     */

    public function updateUserIDByAllianceID($userID, $allianceID)
    {
        $exists = $this->db->queryField("SELECT userID FROM discordUsers WHERE allianceID = :allianceID", "userID", array(":allianceID" => $allianceID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET userID = :userID WHERE allianceID = :allianceID", array(":allianceID" => $allianceID, ":userID" => $userID));
        }
    }

    /**
     * @param mixed $userID
     * @param mixed $characterID
     */

    public function updateUserIDByCharacterID($userID, $characterID)
    {
        $exists = $this->db->queryField("SELECT userID FROM discordUsers WHERE characterID = :characterID", "userID", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET userID = :userID WHERE characterID = :characterID", array(":characterID" => $characterID, ":userID" => $userID));
        }
    }

    /**
     * @param mixed $userID
     * @param mixed $corporationID
     */

    public function updateUserIDByCorporationID($userID, $corporationID)
    {
        $exists = $this->db->queryField("SELECT userID FROM discordUsers WHERE corporationID = :corporationID", "userID", array(":corporationID" => $corporationID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET userID = :userID WHERE corporationID = :corporationID", array(":corporationID" => $corporationID, ":userID" => $userID));
        }
    }

    /**
     * @param mixed $userID
     * @param mixed $discordID
     */

    public function updateUserIDByDiscordID($userID, $discordID)
    {
        $exists = $this->db->queryField("SELECT userID FROM discordUsers WHERE discordID = :discordID", "userID", array(":discordID" => $discordID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET userID = :userID WHERE discordID = :discordID", array(":discordID" => $discordID, ":userID" => $userID));
        }
    }

    /**
     * @param mixed $userID
     * @param mixed $serverID
     */

    public function updateUserIDByServerID($userID, $serverID)
    {
        $exists = $this->db->queryField("SELECT userID FROM discordUsers WHERE serverID = :serverID", "userID", array(":serverID" => $serverID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE discordUsers SET userID = :userID WHERE serverID = :serverID", array(":serverID" => $serverID, ":userID" => $userID));
        }
    }

    public function insertIntoDiscordUsers($serverID, $userID, $characterID, $corporationID, $allianceID, $authString, $created)
    {
        $this->db->execute("INSERT IGNORE INTO discordUsers (serverID, userID, characterID, corporationID, allianceID, authString, created) VALUES (:serverID, :userID, :characterID, :corporationID, :allianceID, :authString, :created)", array(":serverID" => $serverID, ":userID" => $userID, ":characterID" => $characterID, ":corporationID" => $corporationID, ":allianceID" => $allianceID, ":authString" => $authString, ":created" => $created));
    }
}
