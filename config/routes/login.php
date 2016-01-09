<?php
// Login
$app->get('/login/eve/', function () use ($app) {
    (new \ProjectRena\Controller\LoginController($app))->loginEVE();
});