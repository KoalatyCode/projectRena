<?php
// Paste Page
$app->get("/paste/", function () use ($app) {
    (new \ProjectRena\Controller\PasteController($app))->pastePage();
});
$app->post("/paste/", function () use ($app) {
    (new \ProjectRena\Controller\PasteController($app))->postPaste();
});
$app->get("/paste/:hash/", function ($hash) use ($app) {
    (new \ProjectRena\Controller\PasteController($app))->showPaste($hash);
});