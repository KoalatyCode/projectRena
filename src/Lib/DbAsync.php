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
     * @var RenaApp
     */
    private $app;
    /**
     * @var array
     */
    protected $credentials = array();
    /**
     * @var array
     */
    protected $connections = array();

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
        foreach($this->connections as $connection)
            $connection->close();
    }

    /**
     * @param $name
     * @param $query
     * @param int $cacheTime
     * @return bool|\mysqli_result|void
     */
    public function executeQuery($name, $query, $cacheTime = 3600)
    {
        $key = sha1($name);

        if($cacheTime > 0) {
            if(!empty($this->app->Cache->get($key)))
                return;
        }

        $host = $this->app->baseConfig->getConfig("host", "database", "127.0.0.1");
        $username = $this->app->baseConfig->getConfig('username', 'database');
        $password = $this->app->baseConfig->getConfig('password', 'database');
        $dbName = $this->app->baseConfig->getConfig('name', 'database');
        $port = $this->app->baseConfig->getConfig('port', 'database', 3306);
        $socket = $this->app->baseConfig->getConfig("unixSocket", "database", "/var/run/mysqld/mysqld.sock");

        $connection = mysqli_connect($host, $username, $password, $dbName, $port, $socket);
        $this->connections[$name] = $connection;

        return $connection->query($query, MYSQLI_ASYNC);
    }

    /**
     * @param $name
     * @param int $cacheTime
     * @return array|bool|mixed|null
     */
    public function getData($name, $cacheTime = 3600)
    {
        $key = sha1($name);

        if($cacheTime > 0) {
            $result = !empty($this->app->Cache->get($key)) ? unserialize($this->app->Cache->get($key)) : null;
            if(!empty($result))
                return $result;
        }

        if(!isset($this->connections[$name]))
            return false;

        $connection = $this->connections[$name];

        do {
            $links = $errors = $reject = $this->connections;
            mysqli_poll($links, $errors, $reject, $this->timeout);
        } while(!in_array($connection, $links, true) && !in_array($connection, $errors, true) && !in_array($connection, $reject, true));

        $data = array();
        $con = $connection->reap_async_query();
        while($row = $con->fetch_assoc())
            $data[] = $row;

        if($cacheTime > 0)
            $this->app->Cache->set($key, serialize($data), min(3600, $cacheTime));

        return $data;

    }
}
