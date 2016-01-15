<?php
namespace ProjectRena\Model\Database\EVE;

use ProjectRena\RenaApp;


/**
 * Model for the wars database table
 */
class warKillmails
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
     * @param $warID
     * @return array|bool
     * @throws \Exception
     */
    public function getKillIDsByWarID($warID)
    {
        return $this->app->Db->query("SELECT killID FROM warKillmails WHERE warID = :warID", array(":warID" => $warID));
    }
}
