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
    
    public function bigKills()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (547,485,513,902,941,30, 659) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
    
    public function wSpace()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE (regionID >= 11000001 and regionID <= 11000033) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
    
    public function highSec()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE solarSystemID IN (SELECT solarSystemID FROM mapSolarSystems WHERE security > 0.45 GROUP BY solarSystemID) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function lowSec()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE solarSystemID IN (SELECT solarSystemID FROM mapSolarSystems WHERE security <= 0.45 GROUP BY solarSystemID) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
    
    public function nullSec()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE solarSystemID IN (SELECT solarSystemID FROM mapSolarSystems WHERE security <= 0 AND (regionID < 11000001 or regionID > 11000030) GROUP BY solarSystemID) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function solo()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE numberInvolved = 1 AND vGroupID NOT IN (670, 237, 29, 31) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function fiveB()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE totalValue >= 5000000000 GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
    
    public function tenB()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE totalValue >= 10000000000 GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function capitals()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (547, 485) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function superCarriers()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID = 659 GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function titans()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID = 30 GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function freighters()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (513, 902, 941) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function t1()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (419,27,29,547,26,420,25,28,941,463,237,31) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function t2()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (324,898,906,540,830,893,543,541,833,358,894,831,902,832,900,834,380) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function t3()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (963) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function frigates()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (324,893,25,831,237) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function destroyers()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (420,541) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function cruisers()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (906,26,833,358,894,832,963) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function battlecruisers()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (419,540) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }

    public function battleships()
    {
        $kills = $this->db->query("SELECT killID FROM participants WHERE groupID IN (27,898,900) GROUP BY killID ORDER BY killTime DESC LIMIT 100", array(), 60);
        $killIDs = array();
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        $data = $this->app->killmails->getKill_jsonByKillIDs($killIDs);
        render("", $data, null, $this->contentType);
    }
}