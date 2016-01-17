<?php
// API
$app->group("/api", function () use ($app) {
    // Data for a character
    $app->group("/character", function () use ($app) {
        $app->get("/information/:characterID/", function ($characterID) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->characterInformation($characterID);
        });
    });

    // Data for a corporation
    $app->group("/corporation", function () use ($app) {
        $app->get("/information/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationInformation($corporationID);
        });
        $app->get("/members/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationMembers($corporationID);
        });
    });

    // Data for an alliance
    $app->group("/alliance", function () use ($app) {
        $app->get("/information/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceInformation($allianceID);
        });
        $app->get("/members/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceMembers($allianceID);
        });
    });

    // Killmail
    $app->get("/killmail/:killID/", function($killID) use ($app) {
        (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
    });

    $app->group("/kill", function() use ($app) {
        $app->get("/mail/:killID/", function($killID) use ($app) {
            (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
        });

        $app->get("/solarSystem/:solarSystemID/(:extraParameters+)", function($solarSystemID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->solarSystemKills($solarSystemID, $parameters);
        });

        $app->get("/region/:regionID/(:extraParameters+)", function($regionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->regionKills($regionID, $parameters);
        });

        $app->get("/character/:characterID/(:extraParameters+)", function($characterID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->characterKills($characterID, $parameters);
        });

        $app->get("/corporation/:corporationID/(:extraParameters+)", function($corporationID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->corporationKills($corporationID, $parameters);
        });

        $app->get("/alliance/:allianceID/(:extraParameters+)", function($allianceID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->allianceKills($allianceID, $parameters);
        });

        $app->get("/faction/:factionID/(:extraParameters+)", function($factionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->factionKills($factionID, $parameters);
        });

        $app->get("/shipType/:shipTypeID/(:extraParameters+)", function($shipTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->shipTypeKills($shipTypeID, $parameters);
        });

        $app->get("/group/:groupID/(:extraParameters+)", function($groupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->groupKills($groupID, $parameters);
        });

        $app->get("/vGroup/:vGroupID/(:extraParameters+)", function($vGroupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->vGroupKills($vGroupID, $parameters);
        });

        $app->get("/weaponType/:weaponTypeID/(:extraParameters+)", function($weaponTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillAPIController($app))->weaponTypeKills($weaponTypeID, $parameters);
        });

    });
    $app->group("/search", function() use ($app) {
        $app->get("/:query", function($query) use ($app) {
           (new \ProjectRena\Controller\API\SearchAPIController($app))->search($query);
        });
    });

});