<?php
// Main route
$app->get('/', function () use ($app) {
    (new \ProjectRena\Controller\IndexController($app))->index();
});