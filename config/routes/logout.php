<?php
// Logout
$app->get('/logout/', function () use ($app) {
    $sessionData = $_SESSION;
    foreach ($sessionData as $key => $val) unset($_SESSION[$key]);

    $cookieName = $app->baseConfig->getConfig("name", "cookies");
    $cookieSSL = $app->baseConfig->getConfig("ssl", "cookies");
    $app->deleteCookie($cookieName, "/", $app->request->getHost(), $cookieSSL, true);
    $app->redirect("/");
});