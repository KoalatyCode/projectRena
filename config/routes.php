<?php
// Cheatsheet: https://andreiabohner.files.wordpress.com/2014/06/slim.pdf
if(in_array($app->request->getContentType(), array("application/json", "application/xml"))) {
    // Add the request to the request bucket
    $reqMD5 = md5("pageRequests" . $app->request->getIp());
    $app->Cache->increment($reqMD5, 1, 60);
    $pageRequests = $app->Cache->get($reqMD5);
    $maxApiRequestsAllowedPrMinute = $app->baseConfig->getConfig("apiRequestsPrMinute", "site", 1800);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("X-Bin-Request-Count: $pageRequests");
    header("X-Bin-Max-Requests-Min: $maxApiRequestsAllowedPrMinute");
    header("X-Bin-Max-Requests-Sec: " . $maxApiRequestsAllowedPrMinute / 60);

    // Someone hit the rate limit for the api, lets tell em to chillax
    if ($pageRequests >= $maxApiRequestsAllowedPrMinute) {
        render("", array("error" => "max requests hit, please consult the headers for how many requests you can do a minute, and how many you've done."), 420, $app->request->getContentType() ? $app->request->getContentType() : "application/json");
        exit();
    }
}

// Include all routes from the routes directory
$routes = glob(__DIR__ . "/routes/*.php");
foreach ($routes as $route)
    require_once($route);