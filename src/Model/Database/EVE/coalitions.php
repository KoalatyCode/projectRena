<?php
namespace ProjectRena\Model\Database\EVE;

use ProjectRena\RenaApp;


/**
 * Model for the coalitions table
 */
class coalitions
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
     * @param $coalitionID
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByID($coalitionID)
    {
        return $this->app->Db->query("SELECT * FROM coalitions WHERE coalitionID = :coalitionID", array("$:coalitionID" => $coalitionID));
    }

    /**
     * @param $coalitionName
     * @return array|bool
     * @throws \Exception
     */
    public function getAllByName($coalitionName)
    {
        return $this->app->Db->query("SELECT * FROM coalitions WHERE coalitionName = :coalitionName", array(":coalitionName" => $coalitionName));
    }

    /**
     * @param $coalitionID
     * @return string
     */
    public function getNameByID($coalitionID)
    {
        return $this->app->Db->queryField("SELECT coalitionName FROM coalitions WHERE coalitionID = :coalitionID", "coalitionName", array(":coalitionID" => $coalitionID));
    }

    /**
     * @param $coalitionID
     * @return string
     */
    public function getMembersByID($coalitionID)
    {
        return $this->app->Db->queryField("SELECT coalitionMembers FROM coalitions WHERE coalitionID = :coalitionID", "coalitionMembers", array(":coalitionID" => $coalitionID));
    }

    /**
     * @param $coalitionName
     * @return string
     */
    public function getMembersByName($coalitionName)
    {
        return $this->app->Db->queryField("SELECT coalitionMembers FROM coalitions WHERE coalitionName = :coalitionName", "coalitionMembers", array(":coalitionName" => $coalitionName));
    }
}
