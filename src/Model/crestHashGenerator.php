<?php
namespace ProjectRena\Model;

use ProjectRena\RenaApp;


/**
 * Generates a CREST hash based on the killmail in question
 */
class crestHashGenerator
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
     * @param $killData
     * @return string
     */
    public function generateCRESTHash($killData)
    {
        $victim = $killData["victim"];
        $victimID = $victim["characterID"] == 0 ? "None" : $victim["characterID"];
        $shipTypeID = $victim["shipTypeID"];

        $attackers = $killData["attackers"];
        $attacker = null;
        if($attackers != null)
            foreach($attackers as $attackerData)
                if($attackerData["finalBlow"] != 0)
                    $attacker = $attackerData;

        if($attacker == null)
            $attacker = $attackers[0];

        $attackerID = $attacker["characterID"] == 0 ? "None" : $attacker["characterID"];
        $killDate = (strtotime($killData["killTime"]) * 10000000) + 116444736000000000;
        return sha1("$victimID$attackerID$shipTypeID$killDate");
    }
}
