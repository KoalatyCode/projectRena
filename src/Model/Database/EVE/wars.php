<?php
namespace ProjectRena\Model\Database\EVE;

use ProjectRena\RenaApp;


/**
 * Model for the wars database table
 */
class wars
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
     * @return array|bool
     * @throws \Exception
     */
    public function getAllWars()
    {
        return $this->app->Db->query("SELECT * FROM wars ORDER BY warID", array(), 120);
    }

    /**
     * @param $warID
     * @return array|bool
     * @throws \Exception
     */
    public function getWarByID($warID)
    {
        return $this->app->Db->queryRow("SELECT * FROM wars WHERE warID = :warID LIMIT 1", array(":warID" => $warID));
    }

    /**
     * @param $aggressorID
     * @return array|bool
     * @throws \Exception
     */
    public function getWarsByAggressorID($aggressorID)
    {
        return $this->app->Db->query("SELECT * FROM wars WHERE aggressor = :aggressor", array(":aggressor" => $aggressorID));
    }

    /**
     * @param $defenderID
     * @return array|bool
     * @throws \Exception
     */
    public function getWarsByDefenderID($defenderID)
    {
        return $this->app->Db->query("SELECT * FROM wars WHERE defender = :defender", array(":defender" => $defenderID));
    }

    /**
     * @param $timeDeclared
     * @param $warID
     */
    public function updateTimeDeclared($timeDeclared, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET timeDeclared = :timeDeclared WHERE warID = :warID", array(":timeDeclared" => $timeDeclared, ":warID" => $warID));
    }

    /**
     * @param $timeStarted
     * @param $warID
     */
    public function updateTimeStarted($timeStarted, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET timeStarted = :timeStarted WHERE warID = :warID", array(":timeStarted" => $timeStarted, ":warID" => $warID));
    }

    /**
     * @param $timeFinished
     * @param $warID
     */
    public function updateTimeFinished($timeFinished, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET timeFinished = :timeFinished WHERE warID = :warID", array("$:timeFinished" => $timeFinished, ":warID" => $warID));
    }

    /**
     * @param $openForAllies
     * @param $warID
     */
    public function updateOpenForAllies($openForAllies, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET openForAllies = :openForAllies WHERE warID = :warID", array("$:openForAllies" => $openForAllies, ":warID" => $warID));
    }

    /**
     * @param $mutual
     * @param $warID
     */
    public function updateMutual($mutual, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET mutual = :mutual WHERE warID = :warID", array("$:mutual" => $mutual, ":warID" => $warID));
    }

    /**
     * @param $aggressorID
     * @param $warID
     */
    public function updateAggressorID($aggressorID, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET aggressorID = :aggressorID WHERE warID = :warID", array("$:aggressorID" => $aggressorID, ":warID" => $warID));
    }

    /**
     * @param $aggressorShipsKilled
     * @param $warID
     */
    public function updateAggressorShipsKilled($aggressorShipsKilled, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET aggressorShipsKilled = :aggressorShipsKilled WHERE warID = :warID", array("$:aggressorShipsKilled" => $aggressorShipsKilled, ":warID" => $warID));
    }

    /**
     * @param $aggressorISKKilled
     * @param $warID
     */
    public function updateAggressorISKKilled($aggressorISKKilled, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET aggressorISKKilled = :aggressorISKKilled WHERE warID = :warID", array("$:aggressorISKKilled" => $aggressorISKKilled, ":warID" => $warID));
    }

    /**
     * @param $defenderID
     * @param $warID
     */
    public function updateDefenderID($defenderID, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET defenderID = :defenderID WHERE warID = :warID", array("$:defenderID" => $defenderID, ":warID" => $warID));
    }

    /**
     * @param $defenderShipsKilled
     * @param $warID
     */
    public function updateDefenderShipsKills($defenderShipsKilled, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET defenderShipsKilled = :defenderShipsKilled WHERE warID = :warID", array("$:defenderShipsKilled" => $defenderShipsKilled, ":warID" => $warID));
    }

    /**
     * @param $defenderISKKilled
     * @param $warID
     */
    public function updateDefenderISKKilled($defenderISKKilled, $warID)
    {
        $this->app->Db->execute("UPDATE wars SET defenderISKKilled = :defenderISKKilled WHERE warID = :warID", array("$:defenderISKKilled" => $defenderISKKilled, ":warID" => $warID));
    }

    /**
     * @param $warID
     * @param $timeDeclared
     * @param $timeStarted
     * @param $timeFinished
     * @param $openForAllies
     * @param $mutual
     * @param $aggressorID
     * @param $aggressorShipsKilled
     * @param $aggressorISKKilled
     * @param $defenderID
     * @param $defenderShipsKilled
     * @param $defenderISKKilled
     */
    public function insertWar($warID, $timeDeclared, $timeStarted, $timeFinished, $openForAllies, $mutual, $aggressorID, $aggressorShipsKilled, $aggressorISKKilled, $defenderID, $defenderShipsKilled, $defenderISKKilled)
    {
        $this->app->Db->execute("INSERT INTO wars (warID, timeDeclared, timeStarted, timeFinished, openForAllies, mutual, aggressor, aggressorShipsKilled, aggressorISKKilled, defender, defenderShipsKilled, defenderISKKilled) VALUES (:warID, :timeDeclared, :timeStarted, :timeFinished, :openForAllies, :mutual, :aggressor, :aggressorShipsKilled, :aggressorISKKilled, :defender, :defenderShipsKilled, :defenderISKKilled) ON DUPLICATE KEY UPDATE timeDeclared = :timeDeclared, timeStarted = :timeStarted, timeFinished = :timeFinished, openForAllies = :openForAllies, mutual = :mutual, aggressor = :aggressor, aggressorShipsKilled = :aggressorShipsKilled, aggressorISKKilled = :aggressorISKKilled, defender = :defender, defenderShipsKilled = :defenderShipsKilled, defenderISKKilled = :defenderISKKilled", array(":warID" => $warID, ":timeDeclared" => $timeDeclared, ":timeStarted" => $timeStarted, ":timeFinished" => $timeFinished, ":openForAllies" => $openForAllies, ":mutual" => $mutual, ":aggressor" => $aggressorID, ":aggressorShipsKilled" => $aggressorShipsKilled, ":aggressorISKKilled" => $aggressorISKKilled, ":defender" => $defenderID, ":defenderShipsKilled" => $defenderShipsKilled, ":defenderISKKilled" => $defenderISKKilled));
    }
}
