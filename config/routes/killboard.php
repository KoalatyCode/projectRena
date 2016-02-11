<?php
$app->group("/kb", function () use ($app) {
    // Frontpage
    $app->get("/", function() use ($app) {
        (new \ProjectRena\Controller\Killboard\IndexController($app))->index();
    });

    // Killmail page
    $app->get("/killmail/:killID/", function() use ($app) {

    });

    // Character page
    $app->get("/character/:character(/:extraArguments+)/", function($character, $extraArguments = array()) use ($app) {

    });

    // Corporation page
    $app->get("/corporation/:corporation(/:extraArguments+)/", function($corporation, $extraArguments = array()) use ($app) {

    });

    // Alliance page
    $app->get("/alliance/:alliance(/:extraArguments+)/", function($alliance, $extraArguments = array()) use ($app) {

    });

    // Faction page
    $app->get("/faction/:faction(/:extraArguments+)/", function($faction, $extraArguments = array()) use ($app) {

    });

    // System page
    $app->get("/system/:system(/:extraArguments+)/", function($system, $extraArguments = array()) use ($app) {

    });

    // Region page
    $app->get("/region/:region(/:extraArguments+)/", function($region, $extraArguments = array()) use ($app) {

    });

    // Ship page
    $app->get("/ship/:ship(/:extraArguments+)/", function($ship, $extraArguments = array()) use ($app) {

    });

    // Group page
    $app->get("/group/:group(/:extraArguments+)/", function($group, $extraArguments = array()) use ($app) {

    });

    // Weapon page
    $app->get("/weapon/:weapon(/:extraArguments+)/", function($weapon, $extraArguments = array()) use ($app) {

    });
});