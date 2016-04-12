<?php
namespace ProjectRena\Model\Database\Site;

use ProjectRena\RenaApp;

/**
 * Class Users
 * @package ProjectRena\Model\Database\Site
 */
class Users
{
    /**
     * @var RenaApp
     */
    private $app;

    /**
     * @var \ProjectRena\Lib\Db
     */
    private $db;

    /**
     * @var \ProjectRena\Lib\baseConfig
     */
    private $config;

    /**
     * Users constructor.
     * @param RenaApp $app
     */
    public function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->db = $app->Db;
        $this->config = $app->baseConfig;
    }

    /**
     * @param $userID
     *
     * @return array
     */
    public function getUserByID($userID)
    {
        return $this->db->queryRow("SELECT * FROM users WHERE id = :userID", array(":userID" => $userID));
    }

    /**
     * @param $characterName
     *
     * @return array
     */
    public function getUserByName($characterName)
    {
        return $this->db->queryRow("SELECT * FROM users WHERE characterName = :characterName", array(":characterName" => $characterName));
    }

    /**
     * @param $characterName
     * @param $characterID
     * @param $characterOwnerHash
     *
     * @return int
     */
    public function createUserWithCrest($characterName, $characterID, $characterOwnerHash)
    {
        $id = $this->db->queryField("SELECT id FROM users WHERE characterName = :characterName", "id", array(":characterName" => $characterName));
        if (!$id) {
            return $this->db->execute("INSERT INTO users (characterName, characterID, characterOwnerHash) VALUE (:characterName, :characterID, :characterOwnerHash)", array(
                ":characterName" => $characterName,
                ":characterID" => $characterID,
                ":characterOwnerHash" => $characterOwnerHash,
            ), true);
        }

        return $id;
    }

    /**
     * @param $userID
     * @param $hash
     *
     * @return bool|int|string
     */
    public function setUserAutoLoginHash($userID, $hash)
    {
        return $this->db->execute("UPDATE users SET loginHash = :hash WHERE id = :userID", array(":hash" => $hash,
            ":userID" => $userID,
        ));
    }

    /**
     * Tries to autologin the person
     */
    public function tryAutoLogin()
    {
        $cookieName = $this->config->getConfig("name", "cookies");
        $cookieData = $this->app->getEncryptedCookie($cookieName, false);

        if (!empty($cookieData) && !isset($_SESSION["loggedIn"])) {
            $userData = $this->getUserDataByLoginHash($cookieData);
            if ($userData) {
                $_SESSION["characterName"] = $userData["characterName"];
                $_SESSION["characterID"] = $userData["characterID"];
                $_SESSION["loggedIn"] = true;

                // Using $app to redirect causes a weird bug in slim, so use a header Location: instead
                header("Location: " . $this->app->request->getPath());
            }
        }
    }

    /**
     * @param $hash
     *
     * @return array
     */
    public function getUserDataByLoginHash($hash)
    {
        return $this->db->queryRow("SELECT * FROM users WHERE loginHash = :hash", array(":hash" => $hash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getAccessTokenByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT accessToken FROM users WHERE characterID = :characterID", "accessToken", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getAccessTokenByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT accessToken FROM users WHERE characterName = :characterName", "accessToken", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getAccessTokenByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT accessToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "accessToken", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getAccessTokenByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT accessToken FROM users WHERE loginHash = :loginHash", "accessToken", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByCharacterID($characterID)
    {
        return $this->db->query("SELECT * FROM users WHERE characterID = :characterID", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByCharacterName($characterName)
    {
        return $this->db->query("SELECT * FROM users WHERE characterName = :characterName", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->query("SELECT * FROM users WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByLoginHash($loginHash)
    {
        return $this->db->query("SELECT * FROM users WHERE loginHash = :loginHash", array(":loginHash" => $loginHash));
    }

    /**
     * @param $renaApiToken
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByRenaApiToken($renaApiToken)
    {
        return $this->db->query("SELECT * FROM users WHERE renaApiToken = :renaApiToken", array(":renaApiToken" => $renaApiToken));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getCharacterIDByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT characterID FROM users WHERE characterName = :characterName", "characterID", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getCharacterIDByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT characterID FROM users WHERE characterOwnerHash = :characterOwnerHash", "characterID", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getCharacterIDByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT characterID FROM users WHERE loginHash = :loginHash", "characterID", array(":loginHash" => $loginHash));
    }

    /**
     * @param $renaApiToken
     * @return string
     */
    public function getCharacterIDByRenaApiToken($renaApiToken)
    {
        return $this->db->queryField("SELECT characterID FROM users WHERE renaApiToken = :renaApiToken", "characterID", array(":renaApiToken" => $renaApiToken));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getCharacterNameByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT characterName FROM users WHERE characterID = :characterID", "characterName", array(":characterID" => $characterID));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getCharacterNameByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT characterName FROM users WHERE characterOwnerHash = :characterOwnerHash", "characterName", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getCharacterNameByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT characterName FROM users WHERE loginHash = :loginHash", "characterName", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getCharacterOwnerHashByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT characterOwnerHash FROM users WHERE characterID = :characterID", "characterOwnerHash", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getCharacterOwnerHashByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT characterOwnerHash FROM users WHERE characterName = :characterName", "characterOwnerHash", array(":characterName" => $characterName));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getCharacterOwnerHashByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT characterOwnerHash FROM users WHERE loginHash = :loginHash", "characterOwnerHash", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getCreatedByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT created FROM users WHERE characterID = :characterID", "created", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getCreatedByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT created FROM users WHERE characterName = :characterName", "created", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getCreatedByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT created FROM users WHERE characterOwnerHash = :characterOwnerHash", "created", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getCreatedByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT created FROM users WHERE loginHash = :loginHash", "created", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getLoginHashByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT loginHash FROM users WHERE characterID = :characterID", "loginHash", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getLoginHashByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT loginHash FROM users WHERE characterName = :characterName", "loginHash", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getLoginHashByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT loginHash FROM users WHERE characterOwnerHash = :characterOwnerHash", "loginHash", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getRefreshTokenByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT refreshToken FROM users WHERE characterID = :characterID", "refreshToken", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getRefreshTokenByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT refreshToken FROM users WHERE characterName = :characterName", "refreshToken", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getRefreshTokenByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT refreshToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "refreshToken", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getRefreshTokenByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT refreshToken FROM users WHERE loginHash = :loginHash", "refreshToken", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getRenaApiTokenByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT renaApiToken FROM users WHERE characterID = :characterID", "renaApiToken", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getRenaApiTokenByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT renaApiToken FROM users WHERE characterName = :characterName", "renaApiToken", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getRenaApiTokenByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT renaApiToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "renaApiToken", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getRenaApiTokenByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT renaApiToken FROM users WHERE loginHash = :loginHash", "renaApiToken", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getScopesByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT scopes FROM users WHERE characterID = :characterID", "scopes", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getScopesByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT scopes FROM users WHERE characterName = :characterName", "scopes", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getScopesByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT scopes FROM users WHERE characterOwnerHash = :characterOwnerHash", "scopes", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getScopesByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT scopes FROM users WHERE loginHash = :loginHash", "scopes", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getTokenTypeByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT tokenType FROM users WHERE characterID = :characterID", "tokenType", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getTokenTypeByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT tokenType FROM users WHERE characterName = :characterName", "tokenType", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getTokenTypeByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT tokenType FROM users WHERE characterOwnerHash = :characterOwnerHash", "tokenType", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getTokenTypeByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT tokenType FROM users WHERE loginHash = :loginHash", "tokenType", array(":loginHash" => $loginHash));
    }

    /**
     * @param $characterID
     * @return string
     */
    public function getUpdatedByCharacterID($characterID)
    {
        return $this->db->queryField("SELECT updated FROM users WHERE characterID = :characterID", "updated", array(":characterID" => $characterID));
    }

    /**
     * @param $characterName
     * @return string
     */
    public function getUpdatedByCharacterName($characterName)
    {
        return $this->db->queryField("SELECT updated FROM users WHERE characterName = :characterName", "updated", array(":characterName" => $characterName));
    }

    /**
     * @param $characterOwnerHash
     * @return string
     */
    public function getUpdatedByCharacterOwnerHash($characterOwnerHash)
    {
        return $this->db->queryField("SELECT updated FROM users WHERE characterOwnerHash = :characterOwnerHash", "updated", array(":characterOwnerHash" => $characterOwnerHash));
    }

    /**
     * @param $loginHash
     * @return string
     */
    public function getUpdatedByLoginHash($loginHash)
    {
        return $this->db->queryField("SELECT updated FROM users WHERE loginHash = :loginHash", "updated", array(":loginHash" => $loginHash));
    }


    /**
     * @param $accessToken
     * @param $characterID
     */
    public function updateAccessTokenByCharacterID($accessToken, $characterID)
    {
        $exists = $this->db->queryField("SELECT accessToken FROM users WHERE characterID = :characterID", "accessToken", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET accessToken = :accessToken WHERE characterID = :characterID", array(":characterID" => $characterID, ":accessToken" => $accessToken));
        }
    }


    /**
     * @param $accessToken
     * @param $characterName
     */
    public function updateAccessTokenByCharacterName($accessToken, $characterName)
    {
        $exists = $this->db->queryField("SELECT accessToken FROM users WHERE characterName = :characterName", "accessToken", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET accessToken = :accessToken WHERE characterName = :characterName", array(":characterName" => $characterName, ":accessToken" => $accessToken));
        }
    }


    /**
     * @param $accessToken
     * @param $characterOwnerHash
     */
    public function updateAccessTokenByCharacterOwnerHash($accessToken, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT accessToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "accessToken", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET accessToken = :accessToken WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":accessToken" => $accessToken));
        }
    }


    /**
     * @param $accessToken
     * @param $loginHash
     */
    public function updateAccessTokenByLoginHash($accessToken, $loginHash)
    {
        $exists = $this->db->queryField("SELECT accessToken FROM users WHERE loginHash = :loginHash", "accessToken", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET accessToken = :accessToken WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":accessToken" => $accessToken));
        }
    }


    /**
     * @param $characterID
     * @param $characterName
     */
    public function updateCharacterIDByCharacterName($characterID, $characterName)
    {
        $exists = $this->db->queryField("SELECT characterID FROM users WHERE characterName = :characterName", "characterID", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterID = :characterID WHERE characterName = :characterName", array(":characterName" => $characterName, ":characterID" => $characterID));
        }
    }


    /**
     * @param $characterID
     * @param $characterOwnerHash
     */
    public function updateCharacterIDByCharacterOwnerHash($characterID, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT characterID FROM users WHERE characterOwnerHash = :characterOwnerHash", "characterID", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterID = :characterID WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":characterID" => $characterID));
        }
    }


    /**
     * @param $characterID
     * @param $loginHash
     */
    public function updateCharacterIDByLoginHash($characterID, $loginHash)
    {
        $exists = $this->db->queryField("SELECT characterID FROM users WHERE loginHash = :loginHash", "characterID", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterID = :characterID WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":characterID" => $characterID));
        }
    }


    /**
     * @param $characterName
     * @param $characterID
     */
    public function updateCharacterNameByCharacterID($characterName, $characterID)
    {
        $exists = $this->db->queryField("SELECT characterName FROM users WHERE characterID = :characterID", "characterName", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterName = :characterName WHERE characterID = :characterID", array(":characterID" => $characterID, ":characterName" => $characterName));
        }
    }


    /**
     * @param $characterName
     * @param $characterOwnerHash
     */
    public function updateCharacterNameByCharacterOwnerHash($characterName, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT characterName FROM users WHERE characterOwnerHash = :characterOwnerHash", "characterName", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterName = :characterName WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":characterName" => $characterName));
        }
    }


    /**
     * @param $characterName
     * @param $loginHash
     */
    public function updateCharacterNameByLoginHash($characterName, $loginHash)
    {
        $exists = $this->db->queryField("SELECT characterName FROM users WHERE loginHash = :loginHash", "characterName", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterName = :characterName WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":characterName" => $characterName));
        }
    }


    /**
     * @param $characterOwnerHash
     * @param $characterID
     */
    public function updateCharacterOwnerHashByCharacterID($characterOwnerHash, $characterID)
    {
        $exists = $this->db->queryField("SELECT characterOwnerHash FROM users WHERE characterID = :characterID", "characterOwnerHash", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterOwnerHash = :characterOwnerHash WHERE characterID = :characterID", array(":characterID" => $characterID, ":characterOwnerHash" => $characterOwnerHash));
        }
    }


    /**
     * @param $characterOwnerHash
     * @param $characterName
     */
    public function updateCharacterOwnerHashByCharacterName($characterOwnerHash, $characterName)
    {
        $exists = $this->db->queryField("SELECT characterOwnerHash FROM users WHERE characterName = :characterName", "characterOwnerHash", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterOwnerHash = :characterOwnerHash WHERE characterName = :characterName", array(":characterName" => $characterName, ":characterOwnerHash" => $characterOwnerHash));
        }
    }


    /**
     * @param $characterOwnerHash
     * @param $loginHash
     */
    public function updateCharacterOwnerHashByLoginHash($characterOwnerHash, $loginHash)
    {
        $exists = $this->db->queryField("SELECT characterOwnerHash FROM users WHERE loginHash = :loginHash", "characterOwnerHash", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET characterOwnerHash = :characterOwnerHash WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":characterOwnerHash" => $characterOwnerHash));
        }
    }


    /**
     * @param $created
     * @param $characterID
     */
    public function updateCreatedByCharacterID($created, $characterID)
    {
        $exists = $this->db->queryField("SELECT created FROM users WHERE characterID = :characterID", "created", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET created = :created WHERE characterID = :characterID", array(":characterID" => $characterID, ":created" => $created));
        }
    }


    /**
     * @param $created
     * @param $characterName
     */
    public function updateCreatedByCharacterName($created, $characterName)
    {
        $exists = $this->db->queryField("SELECT created FROM users WHERE characterName = :characterName", "created", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET created = :created WHERE characterName = :characterName", array(":characterName" => $characterName, ":created" => $created));
        }
    }


    /**
     * @param $created
     * @param $characterOwnerHash
     */
    public function updateCreatedByCharacterOwnerHash($created, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT created FROM users WHERE characterOwnerHash = :characterOwnerHash", "created", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET created = :created WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":created" => $created));
        }
    }


    /**
     * @param $created
     * @param $loginHash
     */
    public function updateCreatedByLoginHash($created, $loginHash)
    {
        $exists = $this->db->queryField("SELECT created FROM users WHERE loginHash = :loginHash", "created", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET created = :created WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":created" => $created));
        }
    }


    /**
     * @param $loginHash
     * @param $characterID
     */
    public function updateLoginHashByCharacterID($loginHash, $characterID)
    {
        $exists = $this->db->queryField("SELECT loginHash FROM users WHERE characterID = :characterID", "loginHash", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET loginHash = :loginHash WHERE characterID = :characterID", array(":characterID" => $characterID, ":loginHash" => $loginHash));
        }
    }


    /**
     * @param $loginHash
     * @param $characterName
     */
    public function updateLoginHashByCharacterName($loginHash, $characterName)
    {
        $exists = $this->db->queryField("SELECT loginHash FROM users WHERE characterName = :characterName", "loginHash", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET loginHash = :loginHash WHERE characterName = :characterName", array(":characterName" => $characterName, ":loginHash" => $loginHash));
        }
    }


    /**
     * @param $loginHash
     * @param $characterOwnerHash
     */
    public function updateLoginHashByCharacterOwnerHash($loginHash, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT loginHash FROM users WHERE characterOwnerHash = :characterOwnerHash", "loginHash", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET loginHash = :loginHash WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":loginHash" => $loginHash));
        }
    }


    /**
     * @param $refreshToken
     * @param $characterID
     */
    public function updateRefreshTokenByCharacterID($refreshToken, $characterID)
    {
        $exists = $this->db->queryField("SELECT refreshToken FROM users WHERE characterID = :characterID", "refreshToken", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET refreshToken = :refreshToken WHERE characterID = :characterID", array(":characterID" => $characterID, ":refreshToken" => $refreshToken));
        }
    }


    /**
     * @param $refreshToken
     * @param $characterName
     */
    public function updateRefreshTokenByCharacterName($refreshToken, $characterName)
    {
        $exists = $this->db->queryField("SELECT refreshToken FROM users WHERE characterName = :characterName", "refreshToken", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET refreshToken = :refreshToken WHERE characterName = :characterName", array(":characterName" => $characterName, ":refreshToken" => $refreshToken));
        }
    }


    /**
     * @param $refreshToken
     * @param $characterOwnerHash
     */
    public function updateRefreshTokenByCharacterOwnerHash($refreshToken, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT refreshToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "refreshToken", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET refreshToken = :refreshToken WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":refreshToken" => $refreshToken));
        }
    }


    /**
     * @param $refreshToken
     * @param $loginHash
     */
    public function updateRefreshTokenByLoginHash($refreshToken, $loginHash)
    {
        $exists = $this->db->queryField("SELECT refreshToken FROM users WHERE loginHash = :loginHash", "refreshToken", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET refreshToken = :refreshToken WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":refreshToken" => $refreshToken));
        }
    }


    /**
     * @param $renaApiToken
     * @param $characterID
     */
    public function updateRenaApiTokenByCharacterID($renaApiToken, $characterID)
    {
        $exists = $this->db->queryField("SELECT renaApiToken FROM users WHERE characterID = :characterID", "renaApiToken", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET renaApiToken = :renaApiToken WHERE characterID = :characterID", array(":characterID" => $characterID, ":renaApiToken" => $renaApiToken));
        }
    }


    /**
     * @param $renaApiToken
     * @param $characterName
     */
    public function updateRenaApiTokenByCharacterName($renaApiToken, $characterName)
    {
        $exists = $this->db->queryField("SELECT renaApiToken FROM users WHERE characterName = :characterName", "renaApiToken", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET renaApiToken = :renaApiToken WHERE characterName = :characterName", array(":characterName" => $characterName, ":renaApiToken" => $renaApiToken));
        }
    }


    /**
     * @param $renaApiToken
     * @param $characterOwnerHash
     */
    public function updateRenaApiTokenByCharacterOwnerHash($renaApiToken, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT renaApiToken FROM users WHERE characterOwnerHash = :characterOwnerHash", "renaApiToken", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET renaApiToken = :renaApiToken WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":renaApiToken" => $renaApiToken));
        }
    }


    /**
     * @param $renaApiToken
     * @param $loginHash
     */
    public function updateRenaApiTokenByLoginHash($renaApiToken, $loginHash)
    {
        $exists = $this->db->queryField("SELECT renaApiToken FROM users WHERE loginHash = :loginHash", "renaApiToken", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET renaApiToken = :renaApiToken WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":renaApiToken" => $renaApiToken));
        }
    }


    /**
     * @param $scopes
     * @param $characterID
     */
    public function updateScopesByCharacterID($scopes, $characterID)
    {
        $exists = $this->db->queryField("SELECT scopes FROM users WHERE characterID = :characterID", "scopes", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET scopes = :scopes WHERE characterID = :characterID", array(":characterID" => $characterID, ":scopes" => $scopes));
        }
    }


    /**
     * @param $scopes
     * @param $characterName
     */
    public function updateScopesByCharacterName($scopes, $characterName)
    {
        $exists = $this->db->queryField("SELECT scopes FROM users WHERE characterName = :characterName", "scopes", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET scopes = :scopes WHERE characterName = :characterName", array(":characterName" => $characterName, ":scopes" => $scopes));
        }
    }


    /**
     * @param $scopes
     * @param $characterOwnerHash
     */
    public function updateScopesByCharacterOwnerHash($scopes, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT scopes FROM users WHERE characterOwnerHash = :characterOwnerHash", "scopes", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET scopes = :scopes WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":scopes" => $scopes));
        }
    }


    /**
     * @param $scopes
     * @param $loginHash
     */
    public function updateScopesByLoginHash($scopes, $loginHash)
    {
        $exists = $this->db->queryField("SELECT scopes FROM users WHERE loginHash = :loginHash", "scopes", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET scopes = :scopes WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":scopes" => $scopes));
        }
    }


    /**
     * @param $tokenType
     * @param $characterID
     */
    public function updateTokenTypeByCharacterID($tokenType, $characterID)
    {
        $exists = $this->db->queryField("SELECT tokenType FROM users WHERE characterID = :characterID", "tokenType", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET tokenType = :tokenType WHERE characterID = :characterID", array(":characterID" => $characterID, ":tokenType" => $tokenType));
        }
    }


    /**
     * @param $tokenType
     * @param $characterName
     */
    public function updateTokenTypeByCharacterName($tokenType, $characterName)
    {
        $exists = $this->db->queryField("SELECT tokenType FROM users WHERE characterName = :characterName", "tokenType", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET tokenType = :tokenType WHERE characterName = :characterName", array(":characterName" => $characterName, ":tokenType" => $tokenType));
        }
    }


    /**
     * @param $tokenType
     * @param $characterOwnerHash
     */
    public function updateTokenTypeByCharacterOwnerHash($tokenType, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT tokenType FROM users WHERE characterOwnerHash = :characterOwnerHash", "tokenType", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET tokenType = :tokenType WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":tokenType" => $tokenType));
        }
    }


    /**
     * @param $tokenType
     * @param $loginHash
     */
    public function updateTokenTypeByLoginHash($tokenType, $loginHash)
    {
        $exists = $this->db->queryField("SELECT tokenType FROM users WHERE loginHash = :loginHash", "tokenType", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET tokenType = :tokenType WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":tokenType" => $tokenType));
        }
    }


    /**
     * @param $updated
     * @param $characterID
     */
    public function updateUpdatedByCharacterID($updated, $characterID)
    {
        $exists = $this->db->queryField("SELECT updated FROM users WHERE characterID = :characterID", "updated", array(":characterID" => $characterID));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET updated = :updated WHERE characterID = :characterID", array(":characterID" => $characterID, ":updated" => $updated));
        }
    }


    /**
     * @param $updated
     * @param $characterName
     */
    public function updateUpdatedByCharacterName($updated, $characterName)
    {
        $exists = $this->db->queryField("SELECT updated FROM users WHERE characterName = :characterName", "updated", array(":characterName" => $characterName));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET updated = :updated WHERE characterName = :characterName", array(":characterName" => $characterName, ":updated" => $updated));
        }
    }


    /**
     * @param $updated
     * @param $characterOwnerHash
     */
    public function updateUpdatedByCharacterOwnerHash($updated, $characterOwnerHash)
    {
        $exists = $this->db->queryField("SELECT updated FROM users WHERE characterOwnerHash = :characterOwnerHash", "updated", array(":characterOwnerHash" => $characterOwnerHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET updated = :updated WHERE characterOwnerHash = :characterOwnerHash", array(":characterOwnerHash" => $characterOwnerHash, ":updated" => $updated));
        }
    }


    /**
     * @param $updated
     * @param $loginHash
     */
    public function updateUpdatedByLoginHash($updated, $loginHash)
    {
        $exists = $this->db->queryField("SELECT updated FROM users WHERE loginHash = :loginHash", "updated", array(":loginHash" => $loginHash));
        if (!empty($exists)) {
            $this->db->execute("UPDATE users SET updated = :updated WHERE loginHash = :loginHash", array(":loginHash" => $loginHash, ":updated" => $updated));
        }
    }

    /**
     * @param $characterName
     * @param $characterID
     * @param $characterOwnerHash
     * @param $loginHash
     * @param $accessToken
     * @param $refreshToken
     * @param $scopes
     * @param $tokenType
     * @param $renaApiToken
     * @param $created
     * @param $updated
     */
    public function insertIntoUsers($characterName, $characterID, $characterOwnerHash, $loginHash, $accessToken, $refreshToken, $scopes, $tokenType, $renaApiToken, $created, $updated)
    {
        $this->db->execute("INSERT INTO users (characterName, characterID, characterOwnerHash, loginHash, accessToken, refreshToken, scopes, tokenType, renaApiToken, created, updated) VALUES (:characterName, :characterID, :characterOwnerHash, :loginHash, :accessToken, :refreshToken, :scopes, :tokenType, :renaApiToken, :created, :updated)", array(":characterName" => $characterName, ":characterID" => $characterID, ":characterOwnerHash" => $characterOwnerHash, ":loginHash" => $loginHash, ":accessToken" => $accessToken, ":refreshToken" => $refreshToken, ":scopes" => $scopes, ":tokenType" => $tokenType, ":renaApiToken" => $renaApiToken, ":created" => $created, ":updated" => $updated));
    }
}