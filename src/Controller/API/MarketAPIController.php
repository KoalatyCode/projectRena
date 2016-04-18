<?php
namespace ProjectRena\Controller\API;

use ProjectRena\RenaApp;

/**
 * Functions for the API
 */
class MarketAPIController
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

    public function getItemValue($itemID)
    {
        if(!is_numeric($itemID))
            throw new \Exception("Error itemID is not an integer");

        $data = $this->db->query("SELECT id, typeID, AVG(avgSell) AS avgSell, AVG(avgBuy) as avgBuy, AVG(lowSell) as lowSell, AVG(lowBuy) as lowBuy, AVG(highSell) as highSell, AVG(highBuy) as highBuy, DATE_FORMAT(created, '%Y-%m-%d') AS created FROM invPrices WHERE typeID = :typeID ORDER BY created DESC LIMIT 1", array(":typeID" => $itemID));
        render("", $data, null, $this->contentType);
    }

    public function getItemValues($itemID)
    {
        if(!is_numeric($itemID))
            throw new \Exception("Error itemID is not an integer");

        $data = $this->db->query("SELECT id, typeID, AVG(avgSell) AS avgSell, AVG(avgBuy) as avgBuy, AVG(lowSell) as lowSell, AVG(lowBuy) as lowBuy, AVG(highSell) as highSell, AVG(highBuy) as highBuy, DATE_FORMAT(created, '%Y-%m-%d') AS created FROM invPrices WHERE typeID = :typeID GROUP BY YEAR(created), MONTH(created), DAY(created) ORDER BY created DESC", array(":typeID" => $itemID));
        render("", $data, null, $this->contentType);
    }
}