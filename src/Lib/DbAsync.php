<?php

namespace ProjectRena\Lib;

use ProjectRena\RenaApp;

/**
 * Async DB Queries using MySQLi.
 */
class DbAsync
{
    /**
     * @var int
     */
    public $timeout = 10;
    /**
     * @var array
     */
    protected $credentials = array();
    /**
     * @var array
     */
    protected $connections = array();
    /**
     * @var array
     */
    protected $timers = array();
    /**
     * @var array
     */
    protected $queryTime = array();
    /**
     * @var int
     */
    protected $queryCount = 0;
    /**
     * @var RenaApp
     */
    private $app;

    /**
     * DbAsync constructor.
     * @param RenaApp $app
     */
    function __construct(RenaApp $app)
    {
        $this->app = $app;
    }

    /**
     *
     */
    function __destruct()
    {
        foreach ($this->connections as $connection)
            $connection->close();
    }

    /**
     * @param $name
     * @param $query
     * @return bool|\mysqli_result|void
     */
    public function executeQuery($name, $query)
    {
        $key = sha1($name . $this->app->request()->getPath());

        if (!empty($this->app->Cache->get($key)))
            return;

        $host = $this->app->baseConfig->getConfig("host", "database", "127.0.0.1");
        $username = $this->app->baseConfig->getConfig('username', 'database');
        $password = $this->app->baseConfig->getConfig('password', 'database');
        $dbName = $this->app->baseConfig->getConfig('name', 'database');
        $port = $this->app->baseConfig->getConfig('port', 'database', 3306);
        $socket = $this->app->baseConfig->getConfig("unixSocket", "database", "/var/run/mysqld/mysqld.sock");

        // Start up the timer
        $this->timers[$name] = new Timer();

        // Start up the mysqli connection
        $connection = mysqli_connect($host, $username, $password, $dbName, $port, $socket);
        $this->connections[$name] = $connection;

        // Increment the query count
        $this->queryCount++;

        return $connection->query($query, MYSQLI_ASYNC);
    }

    /**
     * @param $name
     * @param int $cacheTime
     * @return array|bool|mixed|null
     */
    public function getData($name, $cacheTime = 3600)
    {
        $key = sha1($name . $this->app->request()->getPath());

        if ($cacheTime > 0) {
            $result = !empty($this->app->Cache->get($key)) ? unserialize($this->app->Cache->get($key)) : null;
            if (!empty($result))
                return $result;
        }

        if (!isset($this->connections[$name]))
            return false;

        /** @var \mysqli $connection */
        $connection = $this->connections[$name];

        do {
            $links = $errors = $reject = $this->connections;
            mysqli_poll($links, $errors, $reject, $this->timeout);
        } while (!in_array($connection, $links, true) && !in_array($connection, $errors, true) && !in_array($connection, $reject, true));

        // Stop the timer
        $this->queryTime[] = $this->timers[$name]->stop();

        $data = array();
        $con = $connection->reap_async_query();
        while ($row = $con->fetch_assoc())
            $data[] = $row;

        if ($cacheTime > 0)
            $this->app->Cache->set($key, serialize($data), min(3600, $cacheTime));

        return $data;
    }

    /**
     * @return int
     */
    public function getQueryCount()
    {
        return $this->queryCount;
    }

    /**
     * @return float
     */
    public function getQueryTime()
    {
        if(count($this->queryTime) > 0)
            return (float) array_sum($this->queryTime) / count($this->queryTime);
        return 0;
    }
}
