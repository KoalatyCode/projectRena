<?php

$app->apiDoc = array(
    "websocket" => array(
        "kills" => array(
            "method" => "wss",
            "description" => "Provides a steady stream of the latest killmails inserted into Rena",
            "href" => "wss://ws.eve-kill.net/kills"
        ),
        "echo" => array(
            "method" => "wss",
            "description" => "Echos back whatever is sent to it",
            "href" => "wss://ws.eve-kill.net/echo"
        ),
    ),
    "character" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information for a character",
            "href" => $app->request->getUrl() . "/api/character/information/:characterID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for a character with a certain name",
            "href" => $app->request->getUrl() . "/api/character/find/:searchTerm/"
        )
    ),
    "corporation" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information for a corporation",
            "href" => $app->request->getUrl() . "/api/corporation/information/:corporationID/"
        ),
        "members" => array(
            "method" => "GET",
            "description" => "Get a list of members of a corporation",
            "href" => $app->request->getUrl() . "/api/corporation/members/:corporationID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for a corporation with a certain name",
            "href" => $app->request->getUrl() . "/api/corporation/find/:searchTerm/"
        )
    ),
    "alliance" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information on an alliance",
            "href" => $app->request->getUrl() . "/api/alliance/information/:allianceID/"
        ),
        "members" => array(
            "method" => "GET",
            "description" => "Get a list of all members of an alliance and it's corporations",
            "href" => $app->request->getUrl() . "/api/alliance/members/:allianceID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for an alliance with a certain name",
            "href" => $app->request->getUrl() . "/api/alliance/find/:searchTerm/"
        )
    ),
    "item" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single typeID",
            "href" => $app->request->getUrl() . "/api/item/information/:itemID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the typeID of an item with a certain name",
            "href" => $app->request->getUrl() . "/api/item/find/:searchTerm/"
        )
    ),
    "system" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single solarSystemID",
            "href" => $app->request->getUrl() . "/api/system/information/:solarSystemID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the solarSystemID of a solarSystem with a certain name",
            "href" => $app->request->getUrl() . "/api/system/find/:searchTerm/"
        )
    ),
    "region" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single regionID",
            "href" => $app->request->getUrl() . "/api/region/information/:regionID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the regionID of a region with a certain name",
            "href" => $app->request->getUrl() . "/api/region/find/:searchTerm/"
        )
    ),
    "celestial" => array(
        "information" => array(
            "method" => "GET",
            "description" => "List all celestials in a system with a certain solarSystemID",
            "href" => $app->request->getUrl() . "/api/celestial/information/:solarSystemID/"
        )
    ),
    "killmail" => array(
        "method" => "GET",
        "description" => "Get a single killmails data for a certain killID",
        "href" => $app->request->getUrl() . "/api/killmail/:killID/"
    ),
    "kill" => array(
        "mail" => array(
            "method" => "GET",
            "description" => "Get a single killmails data for a certain killID",
            "href" => $app->request->getUrl() . "/api/kill/mail/:killID/"
        ),
        "latest" => array(
            "method" => "GET",
            "description" => "Returns the last 100 kills done",
            "href" => $app->request->getUrl() . "/api/kill/latest/"
        ),
        "solarSystem" => array(
            "method" => "GET",
            "description" => "Get kills for a solarSystem",
            "validParameters" => array("killID", "killTime", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/solarSystem/30000142/characterID/95516434/",
            "href" => $app->request->getUrl() . "/api/kill/solarSystem/:solarSystemID/(:extraParameters+)/"
        ),
        "region" => array(
            "method" => "GET",
            "description" => "Get kills for a region",
            "validParameters" => array("killID", "killTime", "solarSystemID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/region/10000043/",
            "href" => $app->request->getUrl() . "/api/kill/region/:regionID/(:extraParameters+)/"
        ),
        "character" => array(
            "method" => "GET",
            "description" => "Get kills for a character",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/character/95516434/",
            "href" => $app->request->getUrl() . "/api/kill/character/:characterID/(:extraParameters+)/"
        ),
        "corporation" => array(
            "method" => "GET",
            "description" => "Get kills for a corporation",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/corporation/98442635/",
            "href" => $app->request->getUrl() . "/api/kill/corporation/:corporationID/(:extraParameters+)/"
        ),
        "alliance" => array(
            "method" => "GET",
            "description" => "Get kills for a alliance",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/alliance/99000554/",
            "href" => $app->request->getUrl() . "/api/kill/alliance/:allianceID/(:extraParameters+)/"
        ),
        "faction" => array(
            "method" => "GET",
            "description" => "Get kills for a faction",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/faction/500019/",
            "href" => $app->request->getUrl() . "/api/kill/faction/:factionID/(:extraParameters+)/"
        ),
        "shipType" => array(
            "method" => "GET",
            "description" => "Get kills for a shipType",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/shipType/29990/",
            "href" => $app->request->getUrl() . "/api/kill/shipType/:shipTypeID/(:extraParameters+)/"
        ),
        "group" => array(
            "method" => "GET",
            "description" => "Get kills for a group",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/group/29/",
            "href" => $app->request->getUrl() . "/api/kill/group/:groupID/(:extraParameters+)/"
        ),
        "vGroup" => array(
            "method" => "GET",
            "description" => "Get kills for a vGroup",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/vGroup/29/",
            "href" => $app->request->getUrl() . "/api/kill/vGroup/:vGroupID/(:extraParameters+)/"
        ),
        "weaponType" => array(
            "method" => "GET",
            "description" => "Get kills for a weaponType",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/weaponType/2905/",
            "href" => $app->request->getUrl() . "/api/kill/weaponType/:weaponTypeID/(:extraParameters+)/"
        )
    ),
    "stats" => array(
        "top10Characters" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Characters for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10Characters/"
        ),
        "top10Corporations" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Corporations for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10Corporations/"
        ),
        "top10Alliances" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Alliances for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10Alliances/"
        ),
        "top10ShipTypes" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Ship Types for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10ShipTypes/"
        ),
        "top10SolarSystems" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Solar Systems for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10SolarSystems/"
        ),
        "top10Regions" => array(
            "method" => "GET",
            "description" => "Shows the Top 10 Regions for the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/top10Regions/"
        ),
        "mostValuableKillsLast7Days" => array(
            "method" => "GET",
            "description" => "5 Most valuable kills over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/mostValuableKillsLast7Days/"
        ),
        "sevenDayKillCount" => array(
            "method" => "GET",
            "description" => "Kills done over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/sevenDayKillCount/"
        ),
        "currentlyActiveCharacters" => array(
            "method" => "GET",
            "description" => "Amount of active characters over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/currentlyActiveCharacters/"
        ),
        "currentlyActiveCorporations" => array(
            "method" => "GET",
            "description" => "Amount of active corporations over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/currentlyActiveCorporations/"
        ),
        "currentlyActiveAlliances" => array(
            "method" => "GET",
            "description" => "Amount of active alliances over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/currentlyActiveAlliances/"
        ),
        "currentlyActiveShipTypes" => array(
            "method" => "GET",
            "description" => "Amount of active ship types over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/currentlyActiveShipTypes/"
        ),
        "currentlyActiveSolarSystems" => array(
            "method" => "GET",
            "description" => "Amount of active solar systems over the last 7 days",
            "href" => $app->request->getUrl() . "/api/stats/currentlyActiveSolarSystems/"
        ),
    ),
    "search" => array(
        "faction" => array(
            "method" => "GET",
            "description" => "Search for a faction with a certain name",
            "href" => $app->request->getUrl() . "/api/search/faction/:searchTerm/"
        ),
        "alliance" => array(
            "method" => "GET",
            "description" => "Search for an alliance with a certain name",
            "href" => $app->request->getUrl() . "/api/search/alliance/:searchTerm/"
        ),
        "corporation" => array(
            "method" => "GET",
            "description" => "Search for a corporation with a certain name",
            "href" => $app->request->getUrl() . "/api/search/corporation/:searchTerm/"
        ),
        "character" => array(
            "method" => "GET",
            "description" => "Search for a character with a certain name",
            "href" => $app->request->getUrl() . "/api/search/character/:searchTerm/"
        ),
        "item" => array(
            "method" => "GET",
            "description" => "Search for an item with a certain name",
            "href" => $app->request->getUrl() . "/api/search/item/:searchTerm/"
        ),
        "system" => array(
            "method" => "GET",
            "description" => "Search for a system with a certain name",
            "href" => $app->request->getUrl() . "/api/search/system/:searchTerm/"
        ),
        "region" => array(
            "method" => "GET",
            "description" => "Search for a region with a certain name",
            "href" => $app->request->getUrl() . "/api/search/region/:searchTerm/"
        ),
        "celestial" => array(
            "method" => "GET",
            "description" => "Search for a celestial with a certain name",
            "href" => $app->request->getUrl() . "/api/search/celestial/:searchTerm/"
        ),
    ),
    "tools" => array(
        "calculateCrestHash" => array(
            "method" => "POST",
            "description" => "Post killmail data from a CREST style killmail, and receive the CREST Hash for said Killmail",
            "href" => $app->request->getUrl() . "/api/tools/calculateCrestHash/"
        )
    ),
    "wars" => array(
        "wars" => array(),
        "kills" => array(),
    ),
    "market" => array(
        "price" => array(
            "method" => "GET",
            "description" => "Get latest low/high/avg buy/sell prices for an itemID",
            "href" => $app->request->getUrl() . "/api/market/price/:itemID/"
        ),
        "prices" => array(
            "method" => "GET",
            "description" => "Get daily low/high/avg buy/sell prices for an itemID, going back to the beginning",
            "href" => $app->request->getUrl() . "/api/market/prices/:itemID/"
        )
    ),
);

$app->group("/api", function () use ($app) {
    /**
     * @api {get} / Lists all API endpoints available, including method to use, url and examples
     * @apiVersion 0.1.2
     * @apiName Index
     * @apiGroup Index
     * @apiPermission public
     * @apiSampleRequest /api/
     */
    $app->get("/", function () use ($app) {
        render("", $app->apiDoc, null, "application/json");
    });

    $app->group("/character", function () use ($app) {
        /**
         * @api {get} /character/ List the endpoints available for the character api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup character
         * @apiPermission public
         * @apiSampleRequest /api/character/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["character"], null, "application/json");
        });

        /**
         * @api {get} /character/information/:characterID/ Show information for a single character
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup character
         * @apiPermission public
         * @apiParam {Integer} characterID the characterID
         * @apiSampleRequest /api/character/information/:characterID/
         */
        $app->get("/information/:characterID/", function ($characterID) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->characterInformation($characterID);
        });

        /**
         * @api {get} /character/find/:characterName/ Find a character
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup character
         * @apiPermission public
         * @apiParam {String} characterName the characterName
         * @apiSampleRequest /api/character/find/:characterName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->findCharacter($searchTerm);
        });
    });

    $app->group("/corporation", function () use ($app) {
        /**
         * @api {get} /corporation/ List the endpoints available for the corporation api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup corporation
         * @apiPermission public
         * @apiSampleRequest /api/corporation/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["corporation"], null, "application/json");
        });

        /**
         * @api {get} /corporation/information/:corporationID/ Show information for a single corporation
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {Integer} corporationID the corporationID
         * @apiSampleRequest /api/corporation/information/:corporationID/
         */
        $app->get("/information/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationInformation($corporationID);
        });

        /**
         * @api {get} /corporation/members/:corporationID/ Show all members in a corporation
         * @apiVersion 0.1.2
         * @apiName Members
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {Integer} corporationID the corporationID
         * @apiSampleRequest /api/corporation/members/:corporationID/
         */
        $app->get("/members/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationMembers($corporationID);
        });

        /**
         * @api {get} /corporation/find/:corporationName/ Find a corporation
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {String} corporationName the corporationName
         * @apiSampleRequest /api/corporation/find/:corporationName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->findCorporation($searchTerm);
        });
    });

    $app->group("/alliance", function () use ($app) {
        /**
         * @api {get} /alliance/ List the endpoints available for the alliance api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup alliance
         * @apiPermission public
         * @apiSampleRequest /api/alliance/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["alliance"], null, "application/json");
        });

        /**
         * @api {get} /alliance/information/:allianceID/ Show information for a single alliance
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {Integer} allianceID the allianceID
         * @apiSampleRequest /api/alliance/information/:allianceID/
         */
        $app->get("/information/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceInformation($allianceID);
        });

        /**
         * @api {get} /alliance/members/:allianceID/ Show all members in a alliance
         * @apiVersion 0.1.2
         * @apiName Members
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {Integer} allianceID the allianceID
         * @apiSampleRequest /api/alliance/members/:allianceID/
         */
        $app->get("/members/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceMembers($allianceID);
        });

        /**
         * @api {get} /alliance/find/:allianceName/ Find a alliance
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {String} allianceName the allianceName
         * @apiSampleRequest /api/alliance/find/:allianceName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->findAlliance($searchTerm);
        });
    });

    $app->group("/item", function () use ($app) {
        /**
         * @api {get} /item/ List the endpoints available for the item api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup item
         * @apiPermission public
         * @apiSampleRequest /api/item/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["item"], null, "application/json");
        });

        /**
         * @api {get} /item/information/:itemID/ Show information for a single item
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup item
         * @apiPermission public
         * @apiParam {Integer} itemID the itemID
         * @apiSampleRequest /api/item/information/:itemID/
         */
        $app->get("/information/:itemID/", function ($itemID) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->itemInformation($itemID);
        });

        /**
         * @api {get} /item/find/:itemName/ Find a item
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup item
         * @apiPermission public
         * @apiParam {String} itemName the itemName
         * @apiSampleRequest /api/item/find/:itemName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->findItem($searchTerm);
        });
    });

    $app->group("/system", function () use ($app) {
        /**
         * @api {get} /system/ List the endpoints available for the system api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup system
         * @apiPermission public
         * @apiSampleRequest /api/system/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["system"], null, "application/json");
        });

        /**
         * @api {get} /system/information/:systemID/ Show information for a single system
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup system
         * @apiPermission public
         * @apiParam {Integer} systemID the systemID
         * @apiSampleRequest /api/system/information/:systemID/
         */
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->systemInformation($systemID);
        });

        /**
         * @api {get} /system/find/:systemName/ Find a system
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup system
         * @apiPermission public
         * @apiParam {String} systemName the systemName
         * @apiSampleRequest /api/system/find/:systemName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->findSystem($searchTerm);
        });
    });

    $app->group("/region", function () use ($app) {
        /**
         * @api {get} /region/ List the endpoints available for the region api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup region
         * @apiPermission public
         * @apiSampleRequest /api/region/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["region"], null, "application/json");
        });

        /**
         * @api {get} /region/information/:regionID/ Show information for a single region
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup region
         * @apiPermission public
         * @apiParam {Integer} regionID the regionID
         * @apiSampleRequest /api/region/information/:regionID/
         */
        $app->get("/information/:regionID/", function ($regionID) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->regionInformation($regionID);
        });

        /**
         * @api {get} /region/find/:regionName/ Find a region
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup region
         * @apiPermission public
         * @apiParam {String} regionName the regionName
         * @apiSampleRequest /api/region/find/:regionName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->findRegion($searchTerm);
        });
    });

    $app->group("/celestial", function () use ($app) {
        /**
         * @api {get} /celestial/ List the endpoints available for the celestial api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup celestial
         * @apiPermission public
         * @apiSampleRequest /api/celestial/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["celestial"], null, "application/json");
        });

        /**
         * @api {get} /celestial/information/:celestialID/ Show information for a single celestial
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup celestial
         * @apiPermission public
         * @apiParam {Integer} celestialID the celestialID
         * @apiSampleRequest /api/celestial/information/:celestialID/
         */
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\CelestialsAPIController($app))->celestialInformation($systemID);
        });

        /**
         * @api {get} /celestial/find/:celestialName/ Find a celestial
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup celestial
         * @apiPermission public
         * @apiParam {String} celestialName the celestialName
         * @apiSampleRequest /api/celestial/find/:celestialName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CelestialsAPIController($app))->findCelestial($searchTerm, 50);
        });
    });

    /**
     * @api {get} /killmail/:killID/ List a single killmails data
     * @apiVersion 0.1.2
     * @apiName killmail
     * @apiGroup kill
     * @apiPermission public
     * @apiParam {Integer} killID the killID
     * @apiSampleRequest /api/killmail/:killID/
     */
    $app->get("/killmail/:killID/", function ($killID) use ($app) {
        (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
    });

    $app->group("/kill", function () use ($app) {
        /**
         * @api {get} /kill/ List the endpoints available for the kill api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup kill
         * @apiPermission public
         * @apiSampleRequest /api/kill/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["kill"], null, "application/json");
        });

        /**
         * @api {get} /kill/mail/:killID/ List a single killmails data
         * @apiVersion 0.1.2
         * @apiName killmail
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} killID the killID
         * @apiSampleRequest /api/kill/mail/:killID/
         */
        $app->get("/mail/:killID/", function ($killID) use ($app) {
            (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
        });

        /**
         * @api {get} /kill/latest/ Shows the 100 latest killmails
         * @apiVersion 0.1.2
         * @apiName kill
         * @apiGroup kill
         * @apiPermission public
         * @apiSampleRequest /api/kill/latest/
         */
        $app->get("/latest/", function () use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->last100Kills();
        });

        /**
         * @api {get} /kill/solarSystem/:solarSystemID/ List kills that has happened in a certain solar system
         * @apiVersion 0.1.2
         * @apiName solarSystem
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} solarSystemID Limit to a specific solarSystemID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/solarSystem/:solarSystemID/
         */
        $app->get("/solarSystem/:solarSystemID/(:extraParameters+)", function ($solarSystemID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->solarSystemKills($solarSystemID, $parameters);
        });

        /**
         * @api {get} /kill/region/:regionID/ List kills that has happened in a certain region
         * @apiVersion 0.1.2
         * @apiName region
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} regionID Limit to a specific regionID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/region/:regionID/
         */
        $app->get("/region/:regionID/(:extraParameters+)", function ($regionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->regionKills($regionID, $parameters);
        });

        /**
         * @api {get} /kill/character/:characterID/ List kills for a certain character
         * @apiVersion 0.1.2
         * @apiName character
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} characterID Limit to a specific characterID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/character/:characterID/
         */
        $app->get("/character/:characterID/(:extraParameters+)", function ($characterID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->characterKills($characterID, $parameters);
        });

        /**
         * @api {get} /kill/corporation/:corporationID/ List kills for a certain corporation
         * @apiVersion 0.1.2
         * @apiName corporation
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} corporationID Limit to a specific corporationID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/corporation/:corporationID/
         */
        $app->get("/corporation/:corporationID/(:extraParameters+)", function ($corporationID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->corporationKills($corporationID, $parameters);
        });

        /**
         * @api {get} /kill/alliance/:allianceID/ List kills for a certain alliance
         * @apiVersion 0.1.2
         * @apiName alliance
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} allianceID Limit to a specific allianceID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/alliance/:allianceID/
         */
        $app->get("/alliance/:allianceID/(:extraParameters+)", function ($allianceID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->allianceKills($allianceID, $parameters);
        });

        /**
         * @api {get} /kill/faction/:factionID/ List kills for a certain faction
         * @apiVersion 0.1.2
         * @apiName faction
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} factionID Limit to a specific factionID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/faction/:factionID/
         */
        $app->get("/faction/:factionID/(:extraParameters+)", function ($factionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->factionKills($factionID, $parameters);
        });

        /**
         * @api {get} /kill/shipType/:shipTypeID/ List kills for a certain shipType
         * @apiVersion 0.1.2
         * @apiName shipType
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} shipTypeID Limit to a specific shipTypeID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/shipType/:shipTypeID/
         */
        $app->get("/shipType/:shipTypeID/(:extraParameters+)", function ($shipTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->shipTypeKills($shipTypeID, $parameters);
        });

        /**
         * @api {get} /kill/group/:groupID/ List kills for a certain group
         * @apiVersion 0.1.2
         * @apiName group
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} groupID Limit to a specific groupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/group/:groupID/
         */
        $app->get("/group/:groupID/(:extraParameters+)", function ($groupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->groupKills($groupID, $parameters);
        });

        /**
         * @api {get} /kill/vGroup/:vGroupID/ List kills for a certain vGroup
         * @apiVersion 0.1.2
         * @apiName vGroup
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} vGroupID Limit to a specific vGroupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/vGroup/:vGroupID/
         */
        $app->get("/vGroup/:vGroupID/(:extraParameters+)", function ($vGroupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->vGroupKills($vGroupID, $parameters);
        });

        /**
         * @api {get} /kill/weaponType/:weaponTypeID/ List kills for a certain weaponType
         * @apiVersion 0.1.2
         * @apiName weaponType
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {Integer} weaponTypeID Limit to a specific weaponTypeID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/weaponType/:weaponTypeID/
         */
        $app->get("/weaponType/:weaponTypeID/(:extraParameters+)", function ($weaponTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->weaponTypeKills($weaponTypeID, $parameters);
        });

        /**
         * @api {get} /kill/afterDate/:afterDate/ List kills happening after a certain date
         * @apiVersion 0.1.2
         * @apiName afterDate
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {DateTime} afterDate Return kills after a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/afterDate/:afterDate/
         */
        $app->get("/afterDate/:afterDate/(:extraParameters+)", function ($afterDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->beforeDateKills($afterDate, $parameters);
        });

        /**
         * @api {get} /kill/beforeDate/:beforeDate/ List kills happening before a certain date
         * @apiVersion 0.1.2
         * @apiName beforeDate
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {DateTime} beforeDate Return kills before a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/beforeDate/:beforeDate/
         */
        $app->get("/beforeDate/:beforeDate/(:extraParameters+)", function ($beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->afterDateKills($beforeDate, $parameters);
        });

        /**
         * @api {get} /kill/betweenDates/:afterDate/:beforeDate/ List kills between two dates
         * @apiVersion 0.1.2
         * @apiName betweenDates
         * @apiGroup kill
         * @apiPermission public
         * @apiParam {DateTime} afterDate Get kills after this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {DateTime} beforeDate But before this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationId] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kill/betweenDates/:afterDate/:beforeDate/
         */
        $app->get("/betweenDates/:afterDate/:beforeDate/(:extraParameters+)", function ($afterDate, $beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->betweenDateKills($afterDate, $beforeDate, $parameters);
        });
    });

    $app->group("/stats", function () use ($app) {
        /**
         * @api {get} /stats/ List the endpoints available for the stats api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["stats"], null, "application/json");
        });

        /**
         * @api {get} /top10Characters/ List the top10 Characters
         * @apiVersion 0.1.2
         * @apiName top10Characters
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Characters/
         */
        $app->get("/top10Characters/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Characters();
        });

        /**
         * @api {get} /top10Corporations/ List the top10 Corporations
         * @apiVersion 0.1.2
         * @apiName top10Corporations
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Corporations/
         */
        $app->get("/top10Corporations/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Corporations();
        });

        /**
         * @api {get} /top10Alliances/ List the top10 Alliances
         * @apiVersion 0.1.2
         * @apiName top10Alliances
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Alliances/
         */
        $app->get("/top10Alliances/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Alliances();
        });

        /**
         * @api {get} /top10ShipTypes/ List the top10 Ship Types
         * @apiVersion 0.1.2
         * @apiName top10ShipTypes
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10ShipTypes/
         */
        $app->get("/top10ShipTypes/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10ShipTypes();
        });

        /**
         * @api {get} /top10SolarSystems/ List the top10 Solar Systems
         * @apiVersion 0.1.2
         * @apiName top10SolarSystems
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10SolarSystems/
         */
        $app->get("/top10SolarSystems/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10SolarSystems();
        });

        /**
         * @api {get} /top10Regions/ List the top10 Regions
         * @apiVersion 0.1.2
         * @apiName top10Regions
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Regions/
         */
        $app->get("/top10Regions/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Regions();
        });

        /**
         * @api {get} /mostValuableKillsLast7Days/ List the most valuable kills done over the last 7 days
         * @apiVersion 0.1.2
         * @apiName mostValuableKillsLast7Days
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/mostValuableKillsLast7Days/
         */
        $app->get("/mostValuableKillsLast7Days/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->mostValuableKillsLast7Days();
        });

        /**
         * @api {get} /sevenDayKillCount/ List the amount of kills done over the last 7 days
         * @apiVersion 0.1.2
         * @apiName sevenDayKillCount
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/sevenDayKillCount/
         */
        $app->get("/sevenDayKillCount/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->sevenDayKillCount();
        });

        /**
         * @api {get} /currentlyActiveCharacters/ List the amount of currently active characters
         * @apiVersion 0.1.2
         * @apiName currentlyActiveCharacters
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveCharacters/
         */
        $app->get("/currentlyActiveCharacters/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveCharacters();
        });

        /**
         * @api {get} /currentlyActiveCorporations/ List the amount of currently active corporations
         * @apiVersion 0.1.2
         * @apiName currentlyActiveCorporations
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveCorporations/
         */
        $app->get("/currentlyActiveCorporations/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveCorporations();
        });

        /**
         * @api {get} /currentlyActiveAlliances/ List the amount of currently active alliances
         * @apiVersion 0.1.2
         * @apiName currentlyActiveAlliances
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveAlliances/
         */
        $app->get("/currentlyActiveAlliances/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveAlliances();
        });

        /**
         * @api {get} /currentlyActiveShipTypes/ List the amount of currently active ship types
         * @apiVersion 0.1.2
         * @apiName currentlyActiveShipTypes
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveShipTypes/
         */
        $app->get("/currentlyActiveShipTypes/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveShipTypes();
        });

        /**
         * @api {get} /currentlyActiveSolarSystems/ List the amount of currently active solar systems
         * @apiVersion 0.1.2
         * @apiName currentlyActiveSolarSystems
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveSolarSystems/
         */
        $app->get("/currentlyActiveSolarSystems/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveSolarSystems();
        });
    });

    $app->group("/search", function () use ($app) {
        /**
         * @api {get} /search/ List the endpoints available for the search api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup search
         * @apiPermission public
         * @apiSampleRequest /api/search/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["search"], null, "application/json");
        });

        /**
         * @api {get} /search/faction/:factionName/ Search for a Faction
         * @apiVersion 0.1.2
         * @apiName findFaction
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} factionName Partial Strings are accepted
         * @apiSampleRequest /api/search/faction/:factionName/
         */
        /**
         * @api {get} /search/alliance/:allianceName/ Search for an Alliance
         * @apiVersion 0.1.2
         * @apiName findAlliance
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} allianceName Partial Strings are accepted
         * @apiSampleRequest /api/search/alliance/:allianceName/
         */
        /**
         * @api {get} /search/corporation/:corporationName/ Search for a Corporation
         * @apiVersion 0.1.2
         * @apiName findCorporation
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} corporationName Partial Strings are accepted
         * @apiSampleRequest /api/search/corporation/:corporationName/
         */
        /**
         * @api {get} /search/character/:characterName/ Search for a Character
         * @apiVersion 0.1.2
         * @apiName findCharacter
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} characterName Partial Strings are accepted
         * @apiSampleRequest /api/search/character/:characterName/
         */
        /**
         * @api {get} /search/item/:itemName/ Search for an Item
         * @apiVersion 0.1.2
         * @apiName findItem
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} itemName Partial Strings are accepted
         * @apiSampleRequest /api/search/item/:itemName/
         */
        /**
         * @api {get} /search/system/:systemName/ Search for a System
         * @apiVersion 0.1.2
         * @apiName findSystem
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} systemName Partial Strings are accepted
         * @apiSampleRequest /api/search/system/:systemName/
         */
        /**
         * @api {get} /search/region/:regionName/ Search for a Region
         * @apiVersion 0.1.2
         * @apiName findRegion
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} regionName  Partial Strings are accepted
         * @apiSampleRequest /api/search/region/:regionName/
         */
        /**
         * @api {get} /search/celestial/:SolarSystemName/ Search for celestials in a Solar System
         * @apiVersion 0.1.2
         * @apiName findCelestial
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} SolarSystemName Partial Strings are accepted
         * @apiSampleRequest /api/search/celestial/:SolarSystemName/
         */
        $app->get("(/:type)/:query/", function ($searchType = null, $searchTerm = null) use ($app) {
            if (!$searchType)
                $searchType = array("faction", "alliance", "corporation", "character", "item", "system", "region", "celestial");

            (new \ProjectRena\Controller\API\SearchAPIController($app))->search($searchTerm, $searchType);
        });
    });

    $app->group("/tools", function () use ($app) {
        /**
         * @api {get} /tools/ List the endpoints available for the tools api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup tools
         * @apiPermission public
         * @apiSampleRequest /api/tools/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["tools"], null, "application/json");
        });
        
        /**
         * @api {post} /tools/calculateCrestHash/ Calculates the CREST hash for a non-crest verified killmail, remember to post to it using a CREST formatted killmail
         * @apiVersion 0.1.2
         * @apiName calculateCrestHash
         * @apiGroup tools
         * @apiPermission public
         * @apiParam {json} killmailData The killmail data as a json string
         * @apiParamExample {json} Post-Example:
         * {"killID":1,"killmail":[]}
         * @apiSampleRequest /api/tools/calculateCrestHash
         */
        $app->post("/calculateCrestHash/", function () use ($app) {
            $data = json_decode($app->request->post("data"), true);
            $crestHash = $app->CrestFunctions->generateCRESTHash($data);

            echo $crestHash;
        });
    });

    $app->group("/wars", function () use ($app) {
        /**
         * @api {get} /wars/ List the endpoints available for the wars api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup wars
         * @apiPermission public
         * @apiSampleRequest /api/wars/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["wars"], null, "application/json");
        });

        /**
         * @api {get} /wars/wars/ List all the wars
         * @apiVersion 0.1.2
         * @apiName wars
         * @apiGroup wars
         * @apiPermission public
         * @apiSampleRequest /api/wars/wars/
         */
        $app->get("/wars/", function () use ($app) {
            (new \ProjectRena\Controller\API\WarsAPIController($app))->listWars();
        });

        /**
         * @api {get} /wars/kills/:warID/ List all the kills done in a war
         * @apiVersion 0.1.2
         * @apiName kills
         * @apiGroup wars
         * @apiPermission public
         * @apiParam {Integer} warID the ID of the war to lookup kills for
         * @apiSampleRequest /api/wars/kills/:warID/
         */
        $app->get("/kills/:warID/", function ($warID) use ($app) {
            (new \ProjectRena\Controller\API\WarsAPIController($app))->listKillsFromWar($warID);
        });
    });

    $app->group("/market", function () use ($app) {
        /**
         * @api {get} /market/ List the endpoints available for the market api
         * @apiVersion 0.1.2
         * @apiName index
         * @apiGroup market
         * @apiPermission public
         * @apiSampleRequest /api/market/
         */
        $app->get("/", function () use ($app) {
            render("", $app->apiDoc["market"], null, "application/json");
        });

        /**
         * @api {get} /market/price/:typeID/ Return the latest pricing value for an item
         * @apiVersion 0.1.2
         * @apiName marketPrice
         * @apiGroup market
         * @apiPermission public
         * @apiParam {Integer} typeID the typeID of the item to lookup a price for
         * @apiSampleRequest /api/market/price/:typeID/
         */
        $app->get("/price/:typeID/", function ($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValue($typeID);
        });

        /**
         * @api {get} /market/prices/:typeID/ Return the cached pricing values for an item (Averaged by day)
         * @apiVersion 0.1.2
         * @apiName marketPrices
         * @apiGroup market
         * @apiPermission public
         * @apiParam {Integer} typeID the typeID of the item to lookup prices for
         * @apiSampleRequest /api/market/prices/:typeID/
         */
        $app->get("/prices/:typeID/", function ($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValues($typeID);
        });
    });
});