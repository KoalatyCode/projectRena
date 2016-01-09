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
});