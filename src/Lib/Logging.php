<?php

namespace ProjectRena\Lib;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ProjectRena\RenaApp;

/**
 * Class Logging
 *
 * @package ProjectRena\Lib\Service
 */
class Logging
{
    /**
     * @var RenaApp
     */
    protected $app;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var
     */
    protected $config;

    /**
     * @param $app
     */
    public function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->logger = new Logger('projectRena');
        $logFile = $this->app->baseConfig->getConfig('logFile', 'Logging', __DIR__ . '/../../logs/app.log');

        // Make sure the logfile exists and is writeable
        if(!is_writable($logFile))
            chmod($logFile, 0777);
        if(!file_exists($logFile))
            file_put_contents($logFile, "");

        // Setup the push handler
        $this->logger->pushHandler(
            new StreamHandler(
                $logFile,
                $this->app->baseConfig->getConfig("logLevel", "Logging", 100),
                true,
                0777
            )
        );
    }

    /**
     * Logs data into the logfile.
     *
     * @static
     *
     * @param string $logType the type of logging, debug, info, warning, error
     * @param string $logMessage the message for the log
     */
    public function log($logType, $logMessage, $logData = array())
    {
        switch(strtolower($logType))
        {
            case "info":
                $this->logger->info($logMessage, $logData);
                break;
            case "debug":
                $this->logger->debug($logMessage, $logData);
                break;
            case "warning":
                $this->logger->warning($logMessage, $logData);
                break;
            case "error":
                $this->logger->error($logMessage, $logData);
                break;
            default:
                $this->logger->log(0, $logMessage, $logData);
                break;
        }
    }

    /**
     * Inserts data into the slim flasher.
     *
     * @static
     *
     * @param string $logType the type of logging, debug, info, warning, error
     * @param string $logMessage the message for the log
     */
    public function flasher($logType, $logMessage)
    {
        $this->app->flash($logType, $logMessage);
    }
}