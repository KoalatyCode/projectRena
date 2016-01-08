<?php
namespace ProjectRena\Task;

use Cilex\Command\Command;
use ProjectRena\RenaApp;
use ProjectRena\Task\WebSockets\echoWebsocket;
use ProjectRena\Task\WebSockets\killsWebsocket;
use Ratchet\App;
use React\EventLoop\Factory;
use React\ZMQ\Context;
use Stomp;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ZMQ;

/**
 * Starts up the websocket server, including all the routes
 */
class WebSocketTask extends Command
{

    /**
     */

    protected function configure()
    {
        $this->setName('run:websocket')->setDescription('Starts up the websocket server, including all the routes');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //Init rena
        /** @var RenaApp $app */
        $app = RenaApp::getInstance();

        // Init react event loop
        $loop = Factory::create();

        // Init the ZMQ push points (?)
        $killsWebsocket = new killsWebsocket();
        $stompOut = new sendToStomp();

        // Setup ZMQ for killmails being sent around
        $context = new Context($loop);
        $pull = $context->getSocket(ZMQ::SOCKET_PULL);
        $pull->bind("tcp://" . $app->baseConfig->getConfig("host", "zmq", "127.0.0.1") . ":" . $app->baseConfig->getConfig("port", "zmq", 5555));
        $pull->on("message", array($killsWebsocket, "onMessage"));
        $pull->on("message", array($stompOut, "onMessage"));

        // Setup ratchets websocket endpoint
        $ratchet = new App($app->baseConfig->getConfig("host", "websocket", "localhost"), $app->baseConfig->getConfig("port", "websocket", 8800), $app->baseConfig->getConfig("ip", "websocket", "0.0.0.0"), $loop);

        // Add routes here, / is entry and is just spamming kills, everything else is seperate
        $ratchet->route("/", $killsWebsocket, array("*")); // Default route is killmails
        $ratchet->route("/kills", $killsWebsocket, array("*")); // Seems someone uses this too for killmails
        $ratchet->route("/echo", new echoWebsocket, array("*")); // Echo route, all it'll do is echo out whatever is sent to it

        $ratchet->run();
    }
}

// This is just for Stomp
class sendToStomp
{
    protected $stomp;
    protected $app;

    public function __construct()
    {
        $this->app = RenaApp::getInstance();
        $this->stomp = new Stomp($this->app->baseConfig->getConfig("server", "stomp"), $this->app->baseConfig->getConfig("username", "stomp"), $this->app->baseConfig->getConfig("password", "stomp"));
    }

    public function onMessage($message)
    {
        $this->app->StatsD->increment("stompSent");
        $this->stomp->send("/topic/kills", $message);
    }
}