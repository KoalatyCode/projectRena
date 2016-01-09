<?php
// Cheatsheet: https://andreiabohner.files.wordpress.com/2014/06/slim.pdf

// Include all routes from the routes directory
$routes = glob(__DIR__ . "/routes/*.php");
foreach($routes as $route)
    require_once($route);