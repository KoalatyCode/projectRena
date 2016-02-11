<?php
$app->group("/kb", function () use ($app) {
    // Frontpage
    $app->get("/", function () use ($app) {
        (new \ProjectRena\Controller\Killboard\IndexController($app))->index();
    });

    // Killmail page
    $app->group("/killmail", function () use ($app) {
        $app->get("/:killID/", function () use ($app) {
            (new \ProjectRena\Controller\Killboard\KillmailController($app))->index();
        });
    });

    // Character page
    $app->group("/character", function () use ($app) {
        $app->get("/:character/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "character")["character"][0]["characterID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\CharacterController($app))->index($id);
        });
    });

    // Corporation page
    $app->group("/corporation", function () use ($app) {
        $app->get("/:corporation/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "corporation")["corporation"][0]["corporationID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\CorporationController($app))->index($id);
        });
    });

    // Alliance page
    $app->group("/alliance", function () use ($app) {
        $app->get("/:alliance/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "alliance")["alliance"][0]["allianceID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\AllianceController($app))->index($id);
        });
    });

    // Faction page
    $app->group("/faction", function () use ($app) {
        $app->get("/:faction/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "faction")["faction"][0]["factionID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\FactionController($app))->index($id);
        });
    });

    // System page
    $app->group("/system", function () use ($app) {
        $app->get("/:system/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "system")["system"][0]["solarSystemID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\SystemController($app))->index($id);
        });
    });

    // Region page
    $app->group("/region", function () use ($app) {
        $app->get("/:region/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "region")["region"][0]["regionID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\RegionController($app))->index($id);
        });
    });

    // Ship page
    $app->group("/ship", function () use ($app) {
        $app->get("/:ship/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "item")["item"][0]["typeID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\ShipController($app))->index($id);
        });
    });

    // Group page
    $app->group("/group", function () use ($app) {
        $app->get("/:group/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "item")["item"][0]["typeID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\GroupController($app))->index($id);
        });
    });

    // Weapon page
    $app->group("/weapon", function () use ($app) {
        $app->get("/:weapon/", function ($entity) use ($app) {
            if (!is_numeric($entity))
                $id = $app->Search->search($entity, "item")["item"][0]["typeID"];
            else
                $id = $entity;

            if ($id == 0 || $id == null)
                $app->redirect("/kb/", 302);

            (new \ProjectRena\Controller\Killboard\WeaponController($app))->index($id);
        });
    });
});