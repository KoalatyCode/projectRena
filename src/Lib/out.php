<?php
namespace ProjectRena\Lib;

use ProjectRena\RenaApp;
use XMLParser\XMLParser;

/**
 * Shapes the output and calls up twig, outputs json or outputs xml
 */
class out
{
    /**
     * @var null|string
     */
    protected $contentType;

    /**
     * The Slim Application
     */
    private $app;

    /**
     * @param RenaApp $app
     */
    public function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->contentType = $app->request->getContentType();
    }

    /**
     * Figures out what the user has requested, and returns the data as the user wants it..
     *
     * @param $templateFile
     * @param array $dataArray
     * @param null $status
     * @param null $contentType
     */
    public function render($templateFile, $dataArray = array(), $status = null, $contentType = null)
    {
        if ($contentType)
            $this->contentType = $contentType;

        // Run the scrape checker
        $this->scrapeChecker();

        if ($this->contentType == "application/json")
            return $this->toJson($dataArray, $status);
        if ($this->contentType == "application/xml")
            return $this->toXML($dataArray, $status);

        return $this->toTwig($templateFile, $dataArray, $status);
    }

    /**
     * Outputs the dataArray to JSON
     *
     * @param array $dataArray
     * @param int $status
     */
    public function toJson($dataArray = array(), $status = 200)
    {
        $this->app->contentType("application/json; charset=utf-8");
        $this->app->response->headers->set("Access-Control-Allow-Origin", "*");
        $this->app->response->headers->set("Access-Control-Allow-Methods", "GET, POST");
        http_response_code($status);
        echo json_encode($dataArray, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Outputs the dataArray to XML
     *
     * @param array $dataArray
     * @param int $status
     */
    public function toXML($dataArray = array(), $status = 200)
    {
        $this->app->contentType("application/xml");
        $this->app->response->headers->set("Access-Control-Allow-Origin", "*");
        $this->app->response->headers->set("Access-Control-Allow-Methods", "GET, POST");
        http_response_code($status);
        $xml = XMLParser::encode($dataArray, "rena");
        echo $xml->asXML();
    }

    /**
     * Outputs the template file together with the default twig data
     *
     * @param $templateFile
     * @param array $dataArray
     * @param null $status
     */
    public function toTwig($templateFile, $dataArray = array(), $status = null)
    {
        // Generate character Information array data
        $characterInformation = array();
        if (isset($_SESSION["characterID"])) {
            $characterInformation = $this->app->characters->getAllByID($_SESSION["characterID"]);
            $characterInformation["history"] = json_decode($characterInformation["history"], true);
            $characterInformation["corporation"] = $this->app->corporations->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["corporationID"]);
            $characterInformation["corporation"]["information"] = json_decode($characterInformation["corporation"]["information"], true);
            $characterInformation["alliance"] = $this->app->alliances->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["allianceID"]);
            $characterInformation["groups"] = $this->app->UsersGroups->getGroup($this->app->Users->getUserByName($characterInformation["characterName"])["id"]);
        }

        $extraData = array(
            "siteData" => array(
                "EVESSOURL" => $this->app->EVEOAuth->LoginURL(),
                "imageServer" => $this->app->baseConfig->getConfig("imageServer", "ccp"),
                "apiServer" => $this->app->baseConfig->getConfig("apiServer", "ccp"),
                "asyncQueryCount" => $this->app->DbAsync->getQueryCount(),
                "asyncQueryTime" => $this->app->DbAsync->getQueryTime(),
                "syncQueryCount" => $this->app->Db->getQueryCount(),
                "syncQueryTime" => $this->app->Db->getQueryTime(),
                "totalQueryCount" => $this->app->DbAsync->getQueryCount() + $this->app->Db->getQueryCount(),
                "totalQueryTime" => $this->app->DbAsync->getQueryTime() + $this->app->Db->getQueryTime(),
                "siteLoadTime" => $this->app->timer->stop(),
                "phpTime" => $this->app->timer->stop() - ($this->app->DbAsync->getQueryTime() + $this->app->Db->getQueryTime())
            ),
            "userData" => array(
                "loggedIn" => isset($_SESSION["loggedIn"]) ? true : false,
                "characterName" => isset($_SESSION["characterName"]) ? $_SESSION["characterName"] : null,
                "characterID" => isset($_SESSION["characterID"]) ? $_SESSION["characterID"] : null,
                "charInfo" => $characterInformation,
            )
        );

        $dataArray = array_merge($extraData, array("pageData" => $dataArray));

        $this->app->render($templateFile, $dataArray, $status);
    }

    private function scrapeChecker()
    {
        // Add the request to the request bucket
        $reqMD5 = md5("pageRequests" . $this->app->request->getIp());
        $this->app->Cache->increment($reqMD5, 1, 60);
        $pageRequests = $this->app->Cache->get($reqMD5);
        $maxApiRequestsAllowedPrMinute = $this->app->baseConfig->getConfig("apiRequestsPrMinute", "site", 1800);
        $this->app->response->headers->set("X-Bin-Request-Count", $pageRequests);
        $this->app->response->headers->set("X-Bin-Max-Requests-Min", $maxApiRequestsAllowedPrMinute);
        $this->app->response->headers->set("X-Bin-Max-Requests-Sec",  round(($maxApiRequestsAllowedPrMinute - $pageRequests) / 60));

        // Someone hit the rate limit for the api, lets tell em to chillax
        if ($pageRequests >= $maxApiRequestsAllowedPrMinute) {
            $this->app->contentType($this->contentType);
            $error = array("error" => "max requests hit, please consult the headers for how many requests you can do a minute, and how many you've done.");
            http_response_code(429);
            if($this->contentType == "application/xml") {
                $xml = XMLParser::encode($error, "rena");
                echo $xml->asXML();
            }
            elseif($this->contentType == "application/json") {
                echo json_encode($error, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
            }
            exit();
        }
    }
    /**
     *
     */
    public function RunAsNew()
    {
    }
}
