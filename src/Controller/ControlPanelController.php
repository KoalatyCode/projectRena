<?php
namespace ProjectRena\Controller;

use ProjectRena\RenaApp;

/**
 * AdminController for /admin/ pages
 */
class ControlPanelController
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

    public function index($subPage)
    {
        $validPages = array("accountservices", "groups");

        if (in_array($subPage, $validPages))
            $this->{$subPage}();
        else
            $this->mainPage();
    }

    private function mainPage()
    {
        render("controlpanel/index.twig");
    }

    private function groups()
    {
        render("controlpanel/account/groups.twig");
    }

    private function accountservices()
    {
        render("controlpanel/account/servicesaccess.twig");
    }
}
