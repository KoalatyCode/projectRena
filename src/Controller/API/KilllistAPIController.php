<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class KilllistAPIController
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
     * @var string
     */
    private $contentType;

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
        $this->contentType = "application/json";
    }

    public function last100Kills()
    {
        $kills = $this->db->query("SELECT killID FROM participants GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
}