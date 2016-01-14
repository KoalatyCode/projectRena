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
     */
    public function toJson($dataArray = array(), $status = 200)
    {
        $this->app->contentType("application/javascript; charset=utf-8");
        http_response_code($status);
        echo json_encode($dataArray, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Outputs the dataArray to XML
     *
     * @param array $dataArray
     */
    public function toXML($dataArray = array(), $status = 200)
    {
        $this->app->contentType("application/xml");
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
            $characterInformation["corporation"] = $this->app->corporations->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["corporationID"]);
            $characterInformation["alliance"] = $this->app->alliances->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["allianceID"]);
            $characterInformation["groups"] = $this->app->UsersGroups->getGroup($this->app->Users->getUserByName($characterInformation["characterName"])["id"]);
        }

        $extraData = array(
            "loggedIn" => isset($_SESSION["loggedIn"]) ? true : false,
            "imageServer" => $this->app->baseConfig->getConfig("imageServer", "ccp"),
            "characterName" => isset($_SESSION["characterName"]) ? $_SESSION["characterName"] : null,
            "characterID" => isset($_SESSION["characterID"]) ? $_SESSION["characterID"] : null,
            "charInfo" => $characterInformation,
            "EVESSOURL" => $this->app->EVEOAuth->LoginURL()
        );

        $dataArray = array_merge($extraData, $dataArray);
        $this->app->render($templateFile, $dataArray, $status);
    }

    /**
     *
     */
    public function RunAsNew()
    {
    }
}
