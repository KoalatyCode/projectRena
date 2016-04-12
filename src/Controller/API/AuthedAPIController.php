<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class AuthedAPIController
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

    public function userInfo($renaApiToken)
    {
        $data = $this->app->Users->getAllByRenaApiToken($renaApiToken);
        render("", $data, null, "application/json");
    }

    public function apiKeys($renaApiToken)
    {
        $userData = $this->app->Users->getAllByRenaApiToken($renaApiToken);
        $data = $this->app->ApiKeys->getAllAPIKeysByUserID($userData["id"]);
        render("", $data, null, "application/json");
    }

    public function getGroups($renaApiToken)
    {

    }

    public function getPastes($renaApiToken)
    {

    }

    public function getDScans($renaApiToken)
    {

    }

    public function getShoppingLists($renaApiToken)
    {

    }

    public function getLoginData($renaApiToken)
    {

    }

    public function getConfigurationData($renaApiToken)
    {

    }

    public function getComments($renaApiToken)
    {

    }


}