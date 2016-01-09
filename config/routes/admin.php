<?php
// Admin
$app->map("/controlpanel(/:subPage)/", function ($subPage = null) use ($app) {
    (new \ProjectRena\Controller\ControlPanelController($app))->index($subPage);
})->via("POST", "GET");