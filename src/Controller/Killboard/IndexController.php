<?php
namespace ProjectRena\Controller\Killboard;

use ProjectRena\Lib\DbAsync;
use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class IndexController
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

    public function index()
    {
        $db = new DbAsync($this->app);

        $data = array();
        $killIDs = array();
        // Get the killlist with the latest 50/100 kills ordered by killTime
        $kills = $this->app->participants->getAllKills(array(), 100, 60, "DESC", 0, "killID");
        foreach($kills as $kid)
            $killIDs[] = $kid["killID"];

        // Get the json data for the killlist
        $data["killListData"] = $this->app->killmails->getKill_jsonByKillIDs($killIDs);

        // Get the current count of active chars/corps/alliance/ships/systems
        $db->currAcChar("SELECT COUNT(DISTINCT(characterID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        $db->currAcCorp("SELECT COUNT(DISTINCT(corporationID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        $db->currAcAlli("SELECT COUNT(DISTINCT(allianceID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        $db->currAcStyp("SELECT COUNT(DISTINCT(shipTypeID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");
        $db->currAcSols("SELECT COUNT(DISTINCT(solarSystemID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day)");

        // Get the current amount of kills done over the last 7 days
        $db->killCountOverLast7Days("SELECT COUNT(*) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND isVictim = 1");

        // Get the top 10 characters/corporations/alliances/ships/systems/regions for the last 7 days
        $db->top10Characters("SELECT characterID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND characterID != 0 GROUP BY characterID ORDER BY count DESC LIMIT 10");
        $db->top10Corporations("SELECT corporationID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND corporationID != 0 GROUP BY corporationID ORDER BY count DESC LIMIT 10");
        $db->top10Alliances("SELECT allianceID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND allianceID != 0 GROUP BY allianceID ORDER BY count DESC LIMIT 10");
        $db->top10shipTypes("SELECT shipTypeID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND shipTypeID != 0 GROUP BY shipTypeID ORDER BY count DESC LIMIT 10");
        $db->top10SolarSystems("SELECT solarSystemID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND solarSystemID != 0 GROUP BY solarSystemID ORDER BY count DESC LIMIT 10");
        $db->top10Regions("SELECT regionID, COUNT(DISTINCT(killID)) AS count FROM participants WHERE killTime >= DATE_SUB(now(), interval 7 day) AND regionID != 0 GROUP BY regionID ORDER BY count DESC LIMIT 10");

        // Get the most valuable kills for the last 7 days


        $data["currentActive"]["characters"] = $db->currAcChar()->fetch_assoc();
        $data["currentActive"]["corporations"] = $db->currAcCorp()->fetch_assoc();
        $data["currentActive"]["alliances"] = $db->currAcAlli()->fetch_assoc();
        $data["currentActive"]["shipTypes"] = $db->currAcStyp()->fetch_assoc();
        $data["currentActive"]["solarSystems"] = $db->currAcSols()->fetch_assoc();
        $data["killCountOverLast7Days"] = $db->killCountOverLast7Days()->fetch_assoc();
        $data["top10"]["characters"] = $db->top10Characters()->fetch_assoc();
        $data["top10"]["corporations"] = $db->top10Corporations()->fetch_assoc();
        $data["top10"]["alliances"] = $db->top10Alliances()->fetch_assoc();
        $data["top10"]["shipTypes"] = $db->top10shipTypes()->fetch_assoc();
        $data["top10"]["solarSystems"] = $db->top10SolarSystems()->fetch_assoc();
        $data["top10"]["regions"] = $db->top10Regions()->fetch_assoc();

        render("", $data, null, "application/json");
    }
}