<?php
namespace ProjectRena\Controller;

use Discord\Api\Channel\Permissions;
use Discord\Helpers\RoleColors;
use ProjectRena\RenaApp;


/**
 * Discord authentication for corps/alliances
 */
class DiscordController
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
     * @var \Discord\Discord
     */
    private $discord;
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
        $this->discord = new \Discord\Discord($this->app->baseConfig->getConfig("username", "discord"), $this->app->baseConfig->getConfig("password", "discord"));
    }

    /**
     * @return string
     * @throws \Exception
     * Example data: serverName = "awesomeTestServerWhee", region = "london", allowedEntities = "{"allianceID":99005805,"corporationID":98047305}"
     */
    public function create()
    {
        try {
            $serverName = isset($_POST["serverName"]) ? $_POST["serverName"] : null;
            $region = isset($_POST["region"]) ? strtolower($_POST["region"]) : "london";
            $allowedEntities = isset($_POST["allowedEntities"]) ? json_decode($_POST["allowedEntities"], true) : array();
            $ownerID = isset($_POST["ownerID"]) ? $_POST["ownerID"] : 0;

            if($ownerID == 0)
                throw new \Exception("Error, no userID provided");

            if (isset($serverName) && (isset($allowedEntities) && is_array($allowedEntities))) {
                $guildData = $this->discord->api("guild")->create($serverName, $region);
                $guildID = $guildData["id"];

                // Create admin
                $adminPermissions = new \Discord\Helpers\Permissions(66321471);
                $adminColor = new RoleColors();
                $this->discord->api("guild")->roles()->create($guildID, "Admin", $adminPermissions->finalPermissions(), $adminColor->purple, true);
                // Bot is superglobalwtfomgadmin so it needs no roles

                foreach ($allowedEntities as $entityType => $entityID) {

                    $name = null;
                    if ($entityType == "corporationID") {
                        foreach($entityID as $corporationID)
                        {
                            $name = $this->app->corporations->getAllByID($corporationID) ? $this->app->corporations->getAllByID($corporationID)["corporationName"] : $data = $this->app->EVECorporationCorporationSheet->getData(null, null, $corporationID)["result"]["corporationName"];
                            // Update the corp ID in resque
                            \Resque::enqueue("default", "\\ProjectRena\\Task\\Resque\\updateCorporation", array("corporationID" => $corporationID));

                            // Create roles for entities (Regular users)
                            $userPermissions = new \Discord\Helpers\Permissions(3398656);
                            $userColor = new RoleColors();
                            $this->discord->api("guild")->roles()->create($guildID, ucfirst($name), $userPermissions->finalPermissions(), $userColor->darkerGrey, true);
                        }
                    }
                    if ($entityType == "allianceID") {
                        $name = $this->app->alliances->getAllByID($entityID)["allianceName"];

                        if($name == null || !isset($name) || empty($name))
                            continue;

                        // Create roles for entities (Regular users)
                        $userPermissions = new \Discord\Helpers\Permissions(3398656);
                        $userColor = new RoleColors();
                        $this->discord->api("guild")->roles()->create($guildID, ucfirst($name), $userPermissions->finalPermissions(), $userColor->darkerGrey, true);
                    }
                }

                // Add server to discordServers Table
                $this->app->discordServers->insertIntoDiscordServers($guildID, md5($guildID), $serverName, $this->app->Users->getUserByName($characterInformation["characterName"])["id"], json_encode($allowedEntities), date("Y-m-d H:i:s"));

                // Return guild data
                $guildData = $this->discord->api("guild")->show($guildID);
                render("", $guildData, null, "application/json");
            }
            return json_encode(array());
        } catch(\Exception $e) {
            return json_encode(array("error" => $e->getMessage()));
        }
    }

    /**
     * @param $serverHash
     */
    public function auth($serverHash)
    {
        if(!empty($this->app->discordServers->getAllByServerHash($serverHash))) {
            $ssoURL = $this->app->EVEOAuth->LoginURL("/discord/{$serverHash}/verify/");
            $serverName = $this->app->discordServers->getServerNameByServerHash($serverHash);
            render("discord/index.twig", array("serverName" => $serverName, "ssoURL" => $ssoURL));
        }
        else
            $this->app->redirect("/");
    }

    /**
     * @param $serverHash
     * @throws \Discord\Exception\InvalidArgumentException
     */
    public function verify($serverHash)
    {
        // Get logged in user information
        $characterInformation = $this->app->characters->getAllByID($_SESSION["characterID"]);
        $characterInformation["corporation"] = $this->app->corporations->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["corporationID"]);
        $characterInformation["alliance"] = $this->app->alliances->getAllByID($this->app->characters->getAllByID($_SESSION["characterID"])["allianceID"]);
        $characterInformation["groups"] = $this->app->UsersGroups->getGroup($this->app->Users->getUserByName($characterInformation["characterName"])["id"]);

        // Get the discord server information
        $discordServerInfo = $this->app->discordServers->getAllByServerHash($serverHash);

        // Allowed Entities
        $allowedEntities = json_decode($discordServerInfo[0]["allowedEntities"], true);

        // Is the user allowed on this Discord server?
        $allowed = false;
        foreach($characterInformation["groups"] as $group)
        {
            foreach($allowedEntities as $type => $ent)
            {
                if($type == "corporationID")
                    if(in_array($group["groupID"], $ent))
                        $allowed = true;

                if($type == "allianceID")
                    if($group["groupID"] == $ent)
                        $allowed = true;
            }
        }

        // User is allowed
        if($allowed)
        {
            $authString = md5($serverHash . md5($characterInformation["characterName"]));
            $this->app->discordUsers->insertIntoDiscordUsers(
                $this->app->discordServers->getServerIDByServerHash($serverHash),
                $this->app->Users->getUserByName($characterInformation["characterName"])["id"],
                $characterInformation["characterID"],
                $characterInformation["corporationID"],
                $characterInformation["allianceID"], $authString, date("Y-m-d H:i:s"));

            $serverName = $this->app->discordServers->getServerNameByServerHash($serverHash);
            $channelID = $this->discord->api("guild")->channels()->show($this->app->discordServers->getServerIDByServerHash($serverHash))[0]["id"];
            $inviteData = $this->discord->api("channel")->invites()->create($channelID, 60 * (mt_rand(1, 500) + 30), 1); // gotta randomize the time, as to create multiple invite links at the same time..
            $inviteLink = "https://discord.gg/" . $inviteData["code"];
            $authString = "!auth " . $this->db->queryField("SELECT authString FROM discordUsers WHERE serverID = :serverID AND userID = :userID", "authString", array(":serverID" => $this->app->discordServers->getServerIDByServerHash($serverHash), ":userID" => $this->app->Users->getUserByName($characterInformation["characterName"])["id"]));
            render("discord/authenticated.twig", array("serverName" => $serverName, "inviteLink" => $inviteLink, "authString" => $authString));
        }
        else
            $this->app->redirect("/");
    }
}
