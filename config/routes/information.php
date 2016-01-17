<?php
$app->group("/information", function () use ($app) {
    $app->get("/", function() use ($app) {
        (new \ProjectRena\Controller\InformationController($app))->index();
    });
    $app->get("/status/", function() use ($app) {
        (new \ProjectRena\Controller\InformationController($app))->status();
    });
});