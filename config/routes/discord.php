<?php
// Discord
$app->group("/discord", function() use ($app) {
    $app->map("/create/", function() use ($app) {
        (new \ProjectRena\Controller\DiscordController($app))->create();
    })->via("GET", "POST");
    $app->get("/:serverHash/auth/", function($serverHash) use ($app) {
        (new \ProjectRena\Controller\DiscordController($app))->auth($serverHash);
    });
    $app->get("/:serverHash/verify/", function($serverHash) use ($app) {
        (new \ProjectRena\Controller\DiscordController($app))->verify($serverHash);
    });
});