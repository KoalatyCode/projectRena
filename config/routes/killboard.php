<?php
$app->group("/kb", function () use ($app) {
    $app->get("/", function() use ($app) {
        (new \ProjectRena\Controller\Killboard\IndexController($app))->index();
    });
});