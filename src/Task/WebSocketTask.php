<?php
namespace ProjectRena\Task;

use Cilex\Command\Command;
use ProjectRena\Lib;
use ProjectRena\RenaApp;
use ProjectRena\Task\WebSockets\echoWebsocket;
use ProjectRena\Task\WebSockets\killsWebsocket;
use Ratchet\App;
use Ratchet\Client\WebSocket;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\Socket\Server;
use React\ZMQ\Context;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Router;
use ZMQ;
use Stomp;

/**
 * Starts up the websocket server, including all the routes
 */
class WebSocketTask extends Command
{

    /**
     */

    protected function configure()
    {
        $this->setName('WebSocket')->setDescription('Starts up the websocket server, including all the routes');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //Init rena
        $app = RenaApp::getInstance();

        // Init react event loop
        $loop = Factory::create();

        // Init the ZMQ push points (?)
        $killsWebsocket = new killsWebsocket();
        $stompOut = new sendToStomp();

        // Setup ZMQ
        $context = new Context($loop);
        $pull = $context->getSocket(ZMQ::SOCKET_PULL);
        $pull->bind("tcp://" . $app->baseConfig->getConfig("host", "zmq", "127.0.0.1") . ":" . $app->baseConfig->getConfig("port", "zmq", 5555));
        $pull->on("message", array($killsWebsocket, "onMessage"));
        $pull->on("message", array($stompOut, "onMessage"));

        // Setup ratchets websocket endpoint
        $ratchet = new App($app->baseConfig->getConfig("host", "websocket", "localhost"), $app->baseConfig->getConfig("port", "websocket", 8800), $app->baseConfig->getConfig("ip", "websocket", "0.0.0.0"), $loop);

        // Add routes here, / is entry and is just spamming kills, everything else is seperate
        $ratchet->route("/", $killsWebsocket, array("*"));
        $ratchet->route("/echo", new echoWebsocket, array("*"));

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