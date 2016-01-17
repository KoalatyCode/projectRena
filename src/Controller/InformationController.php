<?php

namespace ProjectRena\Controller;

use ProjectRena\RenaApp;

/**
 * Class IndexController
 *
 * @package ProjectRena\Controller
 */
class InformationController
{

    /**
     * @var RenaApp
     */
    protected $app;

    /**
     * @param RenaApp $app
     */
    function __construct(RenaApp $app)
    {
        $this->app = $app;
    }

    /**
     *
     */
    public function index()
    {
        render("information/index.twig");
    }

    public function status()
    {
        // Load all the resque queue stats
        $stats["resqueStatus"] = array(
            "defaultSize" => \Resque::size("default"),
            "importantSize" => \Resque::size("important"),
            "nowSize" => \Resque::size("now"),
            "turboSize" => \Resque::size("turbo"),
        );

        render("information/status.twig", array("stats" => $stats));
    }
}
