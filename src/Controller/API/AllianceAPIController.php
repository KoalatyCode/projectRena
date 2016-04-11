<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class AllianceAPIController
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

    public function allianceInformation($allianceID)
    {
        $data = $this->app->alliances->getAllByID($allianceID);
        $data["information"] = json_decode($data["information"], true);
        render("", $data, null, $this->contentType);
    }

    public function allianceMembers($allianceID)
    {
        $data = $this->app->alliances->getMembersByID($allianceID);
        render("", $data, null, $this->contentType);
    }

    public function findAlliance($searchTerm)
    {
        $results = $this->app->Search->search($searchTerm, "alliance");
        render("", $results, null, $this->contentType);
    }
}