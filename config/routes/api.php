<?php

$app->apiDoc =  array(
    "character" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information for a character",
            "url" => $app->request->getUrl() . "/api/character/information/:characterID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for a character with a certain name",
            "url" => $app->request->getUrl() . "/api/character/find/:searchTerm/"
        )
    ),
    "corporation" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information for a corporation",
            "url" => $app->request->getUrl() . "/api/corporation/information/:corporationID/"
        ),
        "members" => array(
            "method" => "GET",
            "description" => "Get a list of members of a corporation",
            "url" => $app->request->getUrl() . "/api/corporation/members/:corporationID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for a corporation with a certain name",
            "url" => $app->request->getUrl() . "/api/corporation/find/:searchTerm/"
        )
    ),
    "alliance" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Get information on an alliance",
            "url" => $app->request->getUrl() . "/api/alliance/information/:allianceID/"
        ),
        "members" => array(
            "method" => "GET",
            "description" => "Get a list of all members of an alliance and it's corporations",
            "url" => $app->request->getUrl() . "/api/alliance/members/:allianceID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for an alliance with a certain name",
            "url" => $app->request->getUrl() . "/api/alliance/find/:searchTerm/"
        )
    ),
    "item" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single typeID",
            "url" => $app->request->getUrl() . "/api/item/information/:itemID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the typeID of an item with a certain name",
            "url" => $app->request->getUrl() . "/api/item/find/:searchTerm/"
        )
    ),
    "system" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single solarSystemID",
            "url" => $app->request->getUrl() . "/api/system/information/:solarSystemID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the solarSystemID of a solarSystem with a certain name",
            "url" => $app->request->getUrl() . "/api/system/find/:searchTerm/"
        )
    ),
    "region" => array(
        "information" => array(
            "method" => "GET",
            "description" => "Show information for a single regionID",
            "url" => $app->request->getUrl() . "/api/region/information/:regionID/"
        ),
        "find" => array(
            "method" => "GET",
            "description" => "Look for the regionID of a region with a certain name",
            "url" => $app->request->getUrl() . "/api/region/find/:searchTerm/"
        )
    ),
    "celestial" => array(
        "information" => array(
            "method" => "GET",
            "description" => "List all celestials in a system with a certain solarSystemID",
            "url" => $app->request->getUrl() . "/api/celestial/information/:solarSystemID/"
        )
    ),
    "killmail" => array(
        "method" => "GET",
        "description" => "Get a single killmails data for a certain killID",
        "url" => $app->request->getUrl() . "/api/killmail/:killID/"
    ),
    "kill" => array(
        "mail" => array(
            "method" => "GET",
            "description" => "Get a single killmails data for a certain killID",
            "url" => $app->request->getUrl() . "/api/kill/mail/:killID/"
        ),
        "solarSystem" => array(
            "method" => "GET",
            "description" => "Get kills for a solarSystem",
            "validParameters" => array("killID", "killTime", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/solarSystem/30000142/characterID/95516434/",
            "url" => $app->request->getUrl() . "/api/kill/solarSystem/:solarSystemID/(:extraParameters+)/"
        ),
        "region" => array(
            "method" => "GET",
            "description" => "Get kills for a region",
            "validParameters" => array("killID", "killTime", "solarSystemID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/region/10000043/",
            "url" => $app->request->getUrl() . "/api/kill/region/:regionID/(:extraParameters+)/"
        ),
        "character" => array(
            "method" => "GET",
            "description" => "Get kills for a character",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/character/95516434/",
            "url" => $app->request->getUrl() . "/api/kill/character/:characterID/(:extraParameters+)/"
        ),
        "corporation" => array(
            "method" => "GET",
            "description" => "Get kills for a corporation",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/corporation/98442635/",
            "url" => $app->request->getUrl() . "/api/kill/corporation/:corporationID/(:extraParameters+)/"
        ),
        "alliance" => array(
            "method" => "GET",
            "description" => "Get kills for a alliance",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "factionID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/alliance/99000554/",
            "url" => $app->request->getUrl() . "/api/kill/alliance/:allianceID/(:extraParameters+)/"
        ),
        "faction" => array(
            "method" => "GET",
            "description" => "Get kills for a faction",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "shipTypeID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/faction/500019/",
            "url" => $app->request->getUrl() . "/api/kill/faction/:factionID/(:extraParameters+)/"
        ),
        "shipType" => array(
            "method" => "GET",
            "description" => "Get kills for a shipType",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "groupID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/shipType/29990/",
            "url" => $app->request->getUrl() . "/api/kill/shipType/:shipTypeID/(:extraParameters+)/"
        ),
        "group" => array(
            "method" => "GET",
            "description" => "Get kills for a group",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "vGroupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/group/29/",
            "url" => $app->request->getUrl() . "/api/kill/group/:groupID/(:extraParameters+)/"
        ),
        "vGroup" => array(
            "method" => "GET",
            "description" => "Get kills for a vGroup",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "weaponTypeID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/vGroup/29/",
            "url" => $app->request->getUrl() . "/api/kill/vGroup/:vGroupID/(:extraParameters+)/"
        ),
        "weaponType" => array(
            "method" => "GET",
            "description" => "Get kills for a weaponType",
            "validParameters" => array("killID", "killTime", "solarSystemID", "regionID", "characterID", "corporationID", "allianceID", "factionID", "shipTypeID", "groupID", "vGroupID", "shipValue", "damageDone", "totalValue", "pointValue", "numberInvolved", "isVictim", "finalBlow", "isNPC"),
            "example" => $app->request->getUrl() . "/api/kill/weaponType/2905/",
            "url" => $app->request->getUrl() . "/api/kill/weaponType/:weaponTypeID/(:extraParameters+)/"
        )
    ),
    "search" => array(
        "faction" => array(
            "method" => "GET",
            "description" => "Search for a faction with a certain name",
            "url" => $app->request->getUrl() . "/api/search/faction/:searchTerm/"
        ),
        "alliance" => array(
            "method" => "GET",
            "description" => "Search for an alliance with a certain name",
            "url" => $app->request->getUrl() . "/api/search/alliance/:searchTerm/"
        ),
        "corporation" => array(
            "method" => "GET",
            "description" => "Search for a corporation with a certain name",
            "url" => $app->request->getUrl() . "/api/search/corporation/:searchTerm/"
        ),
        "character" => array(
            "method" => "GET",
            "description" => "Search for a character with a certain name",
            "url" => $app->request->getUrl() . "/api/search/character/:searchTerm/"
        ),
        "item" => array(
            "method" => "GET",
            "description" => "Search for an item with a certain name",
            "url" => $app->request->getUrl() . "/api/search/item/:searchTerm/"
        ),
        "system" => array(
            "method" => "GET",
            "description" => "Search for a system with a certain name",
            "url" => $app->request->getUrl() . "/api/search/system/:searchTerm/"
        ),
        "region" => array(
            "method" => "GET",
            "description" => "Search for a region with a certain name",
            "url" => $app->request->getUrl() . "/api/search/region/:searchTerm/"
        ),
        "celestial" => array(
            "method" => "GET",
            "description" => "Search for a celestial with a certain name",
            "url" => $app->request->getUrl() . "/api/search/celestial/:searchTerm/"
        ),
    ),
    "tools" => array(
        "calculateCrestHash" => array(
            "method" => "POST",
            "description" => "Post killmail data from a CREST style killmail, and receive the CREST Hash for said Killmail",
            "url" => $app->request->getUrl() . "/api/tools/calculateCrestHash/"
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
            "url" => $app->request->getUrl() . "/api/market/price/:itemID/"
        ),
        "prices" => array(
            "method" => "GET",
            "description" => "Get daily low/high/avg buy/sell prices for an itemID, going back to the beginning",
            "url" => $app->request->getUrl() . "/api/market/prices/:itemID/"
        )
    ),
);

$app->group("/api", function () use ($app) {
    $app->get("/", function () use ($app) {
        render("", $app->apiDoc, null, "application/json");
    });

    $app->group("/character", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["character"], null, "application/json");
        });

        $app->get("/information/:characterID/", function ($characterID) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->characterInformation($characterID);
        });

        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->findCharacter($searchTerm);
        });
    });

    $app->group("/corporation", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["corporation"], null, "application/json");
        });
        $app->get("/information/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationInformation($corporationID);
        });
        $app->get("/members/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationMembers($corporationID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->findCorporation($searchTerm);
        });
    });

    $app->group("/alliance", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["alliance"], null, "application/json");
        });
        $app->get("/information/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceInformation($allianceID);
        });
        $app->get("/members/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceMembers($allianceID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->findAlliance($searchTerm);
        });
    });

    $app->group("/item", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["item"], null, "application/json");
        });
        $app->get("/information/:itemID/", function ($itemID) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->itemInformation($itemID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->findItem($searchTerm);
        });
    });

    $app->group("/system", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["system"], null, "application/json");
        });
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->systemInformation($systemID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->findSystem($searchTerm);
        });
    });

    $app->group("/region", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["region"], null, "application/json");
        });
        $app->get("/information/:regionID/", function ($regionID) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->regionInformation($regionID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->findRegion($searchTerm);
        });
    });

    $app->group("/celestial", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["celestial"], null, "application/json");
        });
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\CelestialsAPIController($app))->celestialInformation($systemID);
        });
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CelestialsAPIController($app))->findCelestial($searchTerm, 50);
        });
    });

    $app->get("/killmail/:killID/", function ($killID) use ($app) {
        (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
    });

    $app->group("/kill", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["kill"], null, "application/json");
        });
        $app->get("/mail/:killID/", function ($killID) use ($app) {
            (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
        });

        $app->get("/solarSystem/:solarSystemID/(:extraParameters+)", function ($solarSystemID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->solarSystemKills($solarSystemID, $parameters);
        });

        $app->get("/region/:regionID/(:extraParameters+)", function ($regionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->regionKills($regionID, $parameters);
        });

        $app->get("/character/:characterID/(:extraParameters+)", function ($characterID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->characterKills($characterID, $parameters);
        });

        $app->get("/corporation/:corporationID/(:extraParameters+)", function ($corporationID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->corporationKills($corporationID, $parameters);
        });

        $app->get("/alliance/:allianceID/(:extraParameters+)", function ($allianceID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->allianceKills($allianceID, $parameters);
        });

        $app->get("/faction/:factionID/(:extraParameters+)", function ($factionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->factionKills($factionID, $parameters);
        });

        $app->get("/shipType/:shipTypeID/(:extraParameters+)", function ($shipTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->shipTypeKills($shipTypeID, $parameters);
        });

        $app->get("/group/:groupID/(:extraParameters+)", function ($groupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->groupKills($groupID, $parameters);
        });

        $app->get("/vGroup/:vGroupID/(:extraParameters+)", function ($vGroupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->vGroupKills($vGroupID, $parameters);
        });

        $app->get("/weaponType/:weaponTypeID/(:extraParameters+)", function ($weaponTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->weaponTypeKills($weaponTypeID, $parameters);
        });

    });

    $app->group("/search", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["search"], null, "application/json");
        });
        $app->get("(/:type)/:query/", function ($searchType = null, $searchTerm = null) use ($app) {
            if (!$searchType)
                $searchType = array("faction", "alliance", "corporation", "character", "item", "system", "region");

            (new \ProjectRena\Controller\API\SearchAPIController($app))->search($searchTerm, $searchType);
        });
    });

    $app->group("/tools", function () use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["tools"], null, "application/json");
        });
        $app->post("/calculateCrestHash/", function () use ($app) {
            $data = json_decode($app->request->post("data"), true);
            $crestHash = $app->CrestFunctions->generateCRESTHash($data);

            echo $crestHash;
        });
    });

    $app->group("/wars", function() use ($app){
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["wars"], null, "application/json");
        });
        $app->get("/wars/", function() use ($app) {

        });
        $app->get("/kills/:warID/", function($warID) use ($app) {

        });
    });

    $app->group("/market", function() use ($app) {
        $app->get("/", function() use ($app) {
            render("", $app->apiDoc["market"], null, "application/json");
        });
        $app->get("/price/:typeID/", function($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValue($typeID);
        });

        $app->get("/prices/:typeID/", function($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValues($typeID);
        });
    });
});