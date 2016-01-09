<?php
// Search
$app->map("/search(/:term).json", function ($searchTerm = null) use ($app) {
    var_dump($app->Search->search($searchTerm));
})->via("POST", "GET");