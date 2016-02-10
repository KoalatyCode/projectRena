<?php

namespace ProjectRena\Lib;
use ProjectRena\RenaApp;

/**
 * Async DB Queries using MySQLi.
 */
class DbAsync
{
    public $timeout = 10;
    private $app;
    protected $credentials = array();
    protected $connections = array();

    function __construct(RenaApp $app)
    {
        $this->app = $app;
    }

    function __destruct()
    {
        foreach($this->connections as $connection)
            $connection->close();
    }

    function __call($name, array $arguments)
    {
        if($arguments) {
            $host = $this->app->baseConfig->getConfig("host", "database", "127.0.0.1");
            $username = $this->app->baseConfig->getConfig('username', 'database');
            $password = $this->app->baseConfig->getConfig('password', 'database');
            $dbName = $this->app->baseConfig->getConfig('name', 'database');
            $port = $this->app->baseConfig->getConfig('port', 'database', 3306);
            $socket = $this->app->baseConfig->getConfig("unixSocket", "database", "/var/run/mysqld/mysqld.sock");

            $query = $arguments[0];
            $connection = mysqli_connect($host, $username, $password, $dbName, $port, $socket);
            $this->connections[$name] = $connection;
            return $connection->query($query, MYSQLI_ASYNC);
        }

        if(!isset($this->connections[$name]))
            return false;

        $connection = $this->connections[$name];

        do {
            $links = $errors = $reject = $this->connections;
            mysqli_poll($links, $errors, $reject, $this->timeout);
        } while(!in_array($connection, $links, true) && !in_array($connection, $errors, true) && !in_array($connection, $reject, true));

        return $connection->reap_async_query();
    }
}
