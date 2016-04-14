<?php

$app->group("/api", function () use ($app) {
    $app->group("/character", function () use ($app) {
        /**
         * @api {get} /character/count/ Total amount of characters in the system
         * @apiVersion 0.1.2
         * @apiName count
         * @apiGroup character
         * @apiPermission public
         * @apiSampleRequest /api/character/count/
         */
        $app->get("/count/", function () use ($app) {
            $results = $app->Db->queryRow("SELECT COUNT(*) AS count FROM characters");
            render("", $results, null, "application/json");
        });

        /**
         * @api {get} /character/information/:characterID/ Show a lot of aggregated information for a single character
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup character
         * @apiPermission public
         * @apiParam {Integer} characterID the characterID
         * @apiSampleRequest /api/character/information/:characterID/
         */
        $app->get("/information/:characterID/", function ($characterID) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->characterInformation($characterID);
        });

        /**
         * @api {get} /character/find/:characterName/ Find a character
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup character
         * @apiPermission public
         * @apiParam {String} characterName the characterName
         * @apiSampleRequest /api/character/find/:characterName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CharacterAPIController($app))->findCharacter($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /character/top/characters/:characterID/:limit/ Show the top characters in the character
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/characters/:characterID/:limit/
             */
            $app->get("/characters/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topCharacters($characterID, $limit);
            });

            /**
             * @api {get} /character/top/corporations/:characterID/:limit/ Show the top corporations in the character
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/corporations/:characterID/:limit/
             */
            $app->get("/corporations/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topCorporations($characterID, $limit);
            });

            /**
             * @api {get} /character/top/characters/:characterID/:limit/ Show the top characters in the character
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/characters/:characterID/:limit/
             */
            $app->get("/characters/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topAlliances($characterID, $limit);
            });

            /**
             * @api {get} /character/top/ships/:characterID/:limit/ Show the top ships in the character
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/ships/:characterID/:limit/
             */
            $app->get("/ships/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topShips($characterID, $limit);
            });

            /**
             * @api {get} /character/top/systems/:characterID/:limit/ Show the top systems in the character
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/systems/:characterID/:limit/
             */
            $app->get("/systems/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topSystems($characterID, $limit);
            });

            /**
             * @api {get} /character/top/regions/:characterID/:limit/ Show the top regions in the character
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup character
             * @apiPermission public
             * @apiParam {Integer} characterID The characterID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/character/top/regions/:characterID/:limit/
             */
            $app->get("/regions/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CharacterAPIController($app))->topRegions($characterID, $limit);
            });

            //$app->get("/locations/:characterID(/:limit)/", function($characterID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\CharacterAPIController($app))->topCharacters($characterID, $limit);
            //});
        });
    });

    $app->group("/corporation", function () use ($app) {
        /**
         * @api {get} /corporation/count/ Total amount of corporations in the system
         * @apiVersion 0.1.2
         * @apiName count
         * @apiGroup corporation
         * @apiPermission public
         * @apiSampleRequest /api/corporation/count/
         */
        $app->get("/count/", function () use ($app) {
            $results = $app->Db->queryRow("SELECT COUNT(*) AS count FROM corporations");
            render("", $results, null, "application/json");
        });

        /**
         * @api {get} /corporation/information/:corporationID/ Show a lot of aggregated information for a single corporation
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {Integer} corporationID the corporationID
         * @apiSampleRequest /api/corporation/information/:corporationID/
         */
        $app->get("/information/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationInformation($corporationID);
        });

        /**
         * @api {get} /corporation/members/:corporationID/ Show all members in a corporation
         * @apiVersion 0.1.2
         * @apiName Members
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {Integer} corporationID the corporationID
         * @apiSampleRequest /api/corporation/members/:corporationID/
         */
        $app->get("/members/:corporationID/", function ($corporationID) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->corporationMembers($corporationID);
        });

        /**
         * @api {get} /corporation/find/:corporationName/ Find a corporation
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup corporation
         * @apiPermission public
         * @apiParam {String} corporationName the corporationName
         * @apiSampleRequest /api/corporation/find/:corporationName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\CorporationAPIController($app))->findCorporation($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /corporation/top/characters/:corporationID/:limit/ Show the top characters in the corporation
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/characters/:corporationID/:limit/
             */
            $app->get("/characters/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topCharacters($corporationID, $limit);
            });

            /**
             * @api {get} /corporation/top/corporations/:corporationID/:limit/ Show the top corporations in the corporation
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/corporations/:corporationID/:limit/
             */
            $app->get("/corporations/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topCorporations($corporationID, $limit);
            });

            /**
             * @api {get} /corporation/top/alliances/:corporationID/:limit/ Show the top alliances in the corporation
             * @apiVersion 0.1.2
             * @apiName top10alliances
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/alliances/:corporationID/:limit/
             */
            $app->get("/alliances/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topAlliances($corporationID, $limit);
            });

            /**
             * @api {get} /corporation/top/ships/:corporationID/:limit/ Show the top ships in the corporation
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/ships/:corporationID/:limit/
             */
            $app->get("/ships/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topShips($corporationID, $limit);
            });

            /**
             * @api {get} /corporation/top/systems/:corporationID/:limit/ Show the top systems in the corporation
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/systems/:corporationID/:limit/
             */
            $app->get("/systems/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topSystems($corporationID, $limit);
            });

            /**
             * @api {get} /corporation/top/regions/:corporationID/:limit/ Show the top regions in the corporation
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup corporation
             * @apiPermission public
             * @apiParam {Integer} corporationID The corporationID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/corporation/top/regions/:corporationID/:limit/
             */
            $app->get("/regions/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\CorporationAPIController($app))->topRegions($corporationID, $limit);
            });

            //$app->get("/locations/:corporationID(/:limit)/", function($corporationID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\CorporationAPIController($app))->topCharacters($corporationID, $limit);
            //});
        });
    });

    $app->group("/alliance", function () use ($app) {
        /**
         * @api {get} /alliance/count/ Total amount of alliances in the system
         * @apiVersion 0.1.2
         * @apiName count
         * @apiGroup alliance
         * @apiPermission public
         * @apiSampleRequest /api/alliance/count/
         */
        $app->get("/count/", function () use ($app) {
            $results = $app->Db->queryRow("SELECT COUNT(*) AS count FROM alliances");
            render("", $results, null, "application/json");
        });

        /**
         * @api {get} /alliance/information/:allianceID/ Show a lot of aggregated information for a single alliance
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {Integer} allianceID the allianceID
         * @apiSampleRequest /api/alliance/information/:allianceID/
         */
        $app->get("/information/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceInformation($allianceID);
        });

        /**
         * @api {get} /alliance/members/:allianceID/ Show all members in a alliance
         * @apiVersion 0.1.2
         * @apiName Members
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {Integer} allianceID the allianceID
         * @apiSampleRequest /api/alliance/members/:allianceID/
         */
        $app->get("/members/:allianceID/", function ($allianceID) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->allianceMembers($allianceID);
        });

        /**
         * @api {get} /alliance/find/:allianceName/ Find a alliance
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup alliance
         * @apiPermission public
         * @apiParam {String} allianceName the allianceName
         * @apiSampleRequest /api/alliance/find/:allianceName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\AllianceAPIController($app))->findAlliance($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /alliance/top/characters/:allianceID/:limit/ Show the top characters in the alliance
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/characters/:allianceID/:limit/
             */
            $app->get("/characters/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topCharacters($allianceID, $limit);
            });

            /**
             * @api {get} /alliance/top/corporations/:allianceID/:limit/ Show the top corporations in the alliance
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/corporations/:allianceID/:limit/
             */
            $app->get("/corporations/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topCorporations($allianceID, $limit);
            });

            /**
             * @api {get} /alliance/top/alliances/:allianceID/:limit/ Show the top alliances in the alliance
             * @apiVersion 0.1.2
             * @apiName top10alliances
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/alliances/:allianceID/:limit/
             */
            $app->get("/alliances/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topAlliances($allianceID, $limit);
            });

            /**
             * @api {get} /alliance/top/ships/:allianceID/:limit/ Show the top ships in the alliance
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/ships/:allianceID/:limit/
             */
            $app->get("/ships/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topShips($allianceID, $limit);
            });

            /**
             * @api {get} /alliance/top/systems/:allianceID/:limit/ Show the top systems in the alliance
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/systems/:allianceID/:limit/
             */
            $app->get("/systems/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topSystems($allianceID, $limit);
            });

            /**
             * @api {get} /alliance/top/regions/:allianceID/:limit/ Show the top regions in the alliance
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup alliance
             * @apiPermission public
             * @apiParam {Integer} allianceID The allianceID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/alliance/top/regions/:allianceID/:limit/
             */
            $app->get("/regions/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\AllianceAPIController($app))->topRegions($allianceID, $limit);
            });

            //$app->get("/locations/:allianceID(/:limit)/", function($allianceID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\AllianceAPIController($app))->topCharacters($allianceID, $limit);
            //});
        });
    });

    $app->group("/faction", function () use ($app) {
        /**
         * @api {get} /faction/find/:factionName/ Find a faction
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup faction
         * @apiPermission public
         * @apiParam {String} factionName the factionName
         * @apiSampleRequest /api/faction/find/:factionName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\FactionAPIController($app))->findFaction($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /faction/top/characters/:factionID/:limit/ Show the top characters in the faction
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/characters/:factionID/:limit/
             */
            $app->get("/characters/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topCharacters($factionID, $limit);
            });

            /**
             * @api {get} /faction/top/corporations/:factionID/:limit/ Show the top corporations in the faction
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/corporations/:factionID/:limit/
             */
            $app->get("/corporations/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topCorporations($factionID, $limit);
            });

            /**
             * @api {get} /faction/top/factions/:factionID/:limit/ Show the top factions in the faction
             * @apiVersion 0.1.2
             * @apiName top10factions
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/factions/:factionID/:limit/
             */
            $app->get("/factions/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topAlliances($factionID, $limit);
            });

            /**
             * @api {get} /faction/top/ships/:factionID/:limit/ Show the top ships in the faction
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/ships/:factionID/:limit/
             */
            $app->get("/ships/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topShips($factionID, $limit);
            });

            /**
             * @api {get} /faction/top/systems/:factionID/:limit/ Show the top systems in the faction
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/systems/:factionID/:limit/
             */
            $app->get("/systems/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topSystems($factionID, $limit);
            });

            /**
             * @api {get} /faction/top/regions/:factionID/:limit/ Show the top regions in the faction
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup faction
             * @apiPermission public
             * @apiParam {Integer} factionID The factionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/faction/top/regions/:factionID/:limit/
             */
            $app->get("/regions/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\FactionAPIController($app))->topRegions($factionID, $limit);
            });

            //$app->get("/locations/:factionID(/:limit)/", function($factionID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\AllianceAPIController($app))->topCharacters($factionID, $limit);
            //});
        });
    });

    $app->group("/item", function () use ($app) {
        /**
         * @api {get} /item/information/:itemID/ Show information for a single item
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup item
         * @apiPermission public
         * @apiParam {Integer} itemID the itemID
         * @apiSampleRequest /api/item/information/:itemID/
         */
        $app->get("/information/:itemID/", function ($itemID) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->itemInformation($itemID);
        });

        /**
         * @api {get} /item/find/:itemName/ Find a item
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup item
         * @apiPermission public
         * @apiParam {String} itemName the itemName
         * @apiSampleRequest /api/item/find/:itemName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\ItemAPIController($app))->findItem($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /item/top/characters/:itemID/:limit/ Show the top characters in the item
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/characters/:itemID/:limit/
             */
            $app->get("/characters/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topCharacters($itemID, $limit);
            });

            /**
             * @api {get} /item/top/corporations/:itemID/:limit/ Show the top corporations in the item
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/corporations/:itemID/:limit/
             */
            $app->get("/corporations/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topCorporations($itemID, $limit);
            });

            /**
             * @api {get} /item/top/items/:itemID/:limit/ Show the top items in the item
             * @apiVersion 0.1.2
             * @apiName top10items
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/items/:itemID/:limit/
             */
            $app->get("/items/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topAlliances($itemID, $limit);
            });

            /**
             * @api {get} /item/top/ships/:itemID/:limit/ Show the top ships in the item
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/ships/:itemID/:limit/
             */
            $app->get("/ships/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topShips($itemID, $limit);
            });

            /**
             * @api {get} /item/top/systems/:itemID/:limit/ Show the top systems in the item
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/systems/:itemID/:limit/
             */
            $app->get("/systems/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topSystems($itemID, $limit);
            });

            /**
             * @api {get} /item/top/regions/:itemID/:limit/ Show the top regions in the item
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup item
             * @apiPermission public
             * @apiParam {Integer} itemID The itemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/item/top/regions/:itemID/:limit/
             */
            $app->get("/regions/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\ItemAPIController($app))->topRegions($itemID, $limit);
            });

            //$app->get("/locations/:itemID(/:limit)/", function($itemID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\ItemAPIController($app))->topCharacters($itemID, $limit);
            //});
        });
    });

    $app->group("/system", function () use ($app) {
        /**
         * @api {get} /system/information/:systemID/ Show information for a single system
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup system
         * @apiPermission public
         * @apiParam {Integer} systemID the systemID
         * @apiSampleRequest /api/system/information/:systemID/
         */
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->systemInformation($systemID);
        });

        /**
         * @api {get} /system/find/:systemName/ Find a system
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup system
         * @apiPermission public
         * @apiParam {String} systemName the systemName
         * @apiSampleRequest /api/system/find/:systemName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\SystemAPIController($app))->findSystem($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /system/top/characters/:systemID/:limit/ Show the top characters in the system
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/characters/:systemID/:limit/
             */
            $app->get("/characters/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topCharacters($systemID, $limit);
            });

            /**
             * @api {get} /system/top/corporations/:systemID/:limit/ Show the top corporations in the system
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/corporations/:systemID/:limit/
             */
            $app->get("/corporations/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topCorporations($systemID, $limit);
            });

            /**
             * @api {get} /system/top/systems/:systemID/:limit/ Show the top systems in the system
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/systems/:systemID/:limit/
             */
            $app->get("/systems/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topAlliances($systemID, $limit);
            });

            /**
             * @api {get} /system/top/ships/:systemID/:limit/ Show the top ships in the system
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/ships/:systemID/:limit/
             */
            $app->get("/ships/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topShips($systemID, $limit);
            });

            /**
             * @api {get} /system/top/systems/:systemID/:limit/ Show the top systems in the system
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/systems/:systemID/:limit/
             */
            $app->get("/systems/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topSystems($systemID, $limit);
            });

            /**
             * @api {get} /system/top/regions/:systemID/:limit/ Show the top regions in the system
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup system
             * @apiPermission public
             * @apiParam {Integer} systemID The systemID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/system/top/regions/:systemID/:limit/
             */
            $app->get("/regions/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\SystemAPIController($app))->topRegions($systemID, $limit);
            });

            //$app->get("/locations/:systemID(/:limit)/", function($systemID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\SystemAPIController($app))->topCharacters($systemID, $limit);
            //});
        });
    });

    $app->group("/region", function () use ($app) {
        /**
         * @api {get} /region/information/:regionID/ Show information for a single region
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup region
         * @apiPermission public
         * @apiParam {Integer} regionID the regionID
         * @apiSampleRequest /api/region/information/:regionID/
         */
        $app->get("/information/:regionID/", function ($regionID) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->regionInformation($regionID);
        });

        /**
         * @api {get} /region/find/:regionName/ Find a region
         * @apiVersion 0.1.2
         * @apiName Find
         * @apiGroup region
         * @apiPermission public
         * @apiParam {String} regionName the regionName
         * @apiSampleRequest /api/region/find/:regionName/
         */
        $app->get("/find/:searchTerm/", function ($searchTerm) use ($app) {
            (new \ProjectRena\Controller\API\RegionAPIController($app))->findRegion($searchTerm);
        });

        $app->group("/top", function() use ($app) {
            /**
             * @api {get} /region/top/characters/:regionID/:limit/ Show the top characters in the region
             * @apiVersion 0.1.2
             * @apiName top10characters
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/characters/:regionID/:limit/
             */
            $app->get("/characters/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topCharacters($regionID, $limit);
            });

            /**
             * @api {get} /region/top/corporations/:regionID/:limit/ Show the top corporations in the region
             * @apiVersion 0.1.2
             * @apiName top10corporations
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/corporations/:regionID/:limit/
             */
            $app->get("/corporations/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topCorporations($regionID, $limit);
            });

            /**
             * @api {get} /region/top/regions/:regionID/:limit/ Show the top regions in the region
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/regions/:regionID/:limit/
             */
            $app->get("/regions/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topAlliances($regionID, $limit);
            });

            /**
             * @api {get} /region/top/ships/:regionID/:limit/ Show the top ships in the region
             * @apiVersion 0.1.2
             * @apiName top10ships
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/ships/:regionID/:limit/
             */
            $app->get("/ships/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topShips($regionID, $limit);
            });

            /**
             * @api {get} /region/top/systems/:regionID/:limit/ Show the top systems in the region
             * @apiVersion 0.1.2
             * @apiName top10systems
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/systems/:regionID/:limit/
             */
            $app->get("/systems/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topSystems($regionID, $limit);
            });

            /**
             * @api {get} /region/top/regions/:regionID/:limit/ Show the top regions in the region
             * @apiVersion 0.1.2
             * @apiName top10regions
             * @apiGroup region
             * @apiPermission public
             * @apiParam {Integer} regionID The regionID
             * @apiParam {Integer} [limit] Limiting the amount of returns
             * @apiSampleRequest /api/region/top/regions/:regionID/:limit/
             */
            $app->get("/regions/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
                (new \ProjectRena\Controller\API\RegionAPIController($app))->topRegions($regionID, $limit);
            });

            //$app->get("/locations/:regionID(/:limit)/", function($regionID, $limit = 10) use ($app) {
            //    (new \ProjectRena\Controller\API\RegionAPIController($app))->topCharacters($regionID, $limit);
            //});
        });
    });

    $app->group("/celestial", function () use ($app) {
        /**
         * @api {get} /celestial/information/:solarSystemID/ Show all celestials in a system
         * @apiVersion 0.1.2
         * @apiName Information
         * @apiGroup celestial
         * @apiPermission public
         * @apiParam {Integer} solarSystemID the solarSystemID
         * @apiSampleRequest /api/celestial/information/:solarSystemID/
         */
        $app->get("/information/:systemID/", function ($systemID) use ($app) {
            (new \ProjectRena\Controller\API\CelestialsAPIController($app))->celestialInformation($systemID);
        });
    });

    $app->group("/killmail", function () use ($app) {
        /**
         * @api {post} /killmail/add/ Post a CREST killmail URL to the site for processing
         * @apiVersion 0.1.2
         * @apiName add
         * @apiGroup killmail
         * @apiPermission public
         * @apiSampleRequest /api/killmail/add/
         * @apiParam {String} url The URL for the killmail
         * @apiParamExample {String} Post-Example:
         * https://public-crest.eveonline.com/killmails/53124530/7c74ad07861c7e0f6dd65ed78138963f9b1fd365/
         * @apiSuccessExample {json} Example Return
         * { "success": true }
         */
        $app->post("/add/", function () use ($app) {
            $data = $app->request->post("url");
            $validated = $app->CrestFunctions->validateCRESTLink($data);

            // Post it and return an array with success => true
            if(!filter_var($validated, FILTER_VALIDATE_URL) === false) {
                $app->CrestFunctions->postCRESTMail($validated);
                return render("", array("success" => true), null, "application/json");
            }
            return render("", array("success" => false), null, "application/json");
        });

        /**
         * @api {get} /killmail/count/ Total amount of kills in the system
         * @apiVersion 0.1.2
         * @apiName count
         * @apiGroup killmail
         * @apiPermission public
         * @apiSampleRequest /api/killmail/count/
         */
        $app->get("/count/", function () use ($app) {
            $results = $app->Db->queryRow("SELECT COUNT(*) AS count FROM killmails");
            render("", $results, null, "application/json");
        });

        /**
         * @api {get} /killmail/kill/:killID/ List a single killmails data
         * @apiVersion 0.1.2
         * @apiName killmail
         * @apiGroup killmail
         * @apiPermission public
         * @apiParam {Integer} killID the killID
         * @apiSampleRequest /api/killmail/kill/:killID/
         */
        $app->get("/kill/:killID/", function ($killID) use ($app) {
            (new \ProjectRena\Controller\API\KillmailsAPIController($app))->killData($killID);
        });
    });

    $app->group("/killlist", function () use ($app) {
        /**
         * @api {get} /killlist/latest/ Shows the 100 latest killmails
         * @apiVersion 0.1.2
         * @apiName kill
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/latest/
         */
        $app->get("/latest/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->last100Kills();
        });

        /**
         * @api {get} /killlist/bigkills/ Show the last 100 big kills (>5b in value)
         * @apiVersion 0.1.2
         * @apiName bigkills
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/bigkills/
         */
        $app->get("/bigkills/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->bigKills();
        });

        /**
         * @api {get} /killlist/wspace/ Show the last 100 kills done in Wormhole space
         * @apiVersion 0.1.2
         * @apiName wspace
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/wspace/
         */
        $app->get("/wspace/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->wSpace();
        });

        /**
         * @api {get} /killlist/highsec/ Show the last 100 kills done in high security space
         * @apiVersion 0.1.2
         * @apiName highsec
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/highsec/
         */
        $app->get("/highsec/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->highSec();
        });

        /**
         * @api {get} /killlist/lowsec/ Show the last 100 kills done in low security space
         * @apiVersion 0.1.2
         * @apiName lowsec
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/lowsec/
         */
        $app->get("/lowsec/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->lowSec();
        });

        /**
         * @api {get} /killlist/nullsec/ Show the last 100 kills done in null security space
         * @apiVersion 0.1.2
         * @apiName nullsec
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/nullsec/
         */
        $app->get("/nullsec/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->nullSec();
        });

        /**
         * @api {get} /killlist/solo/ Show the last 100 solo kills
         * @apiVersion 0.1.2
         * @apiName solo
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/solo/
         */
        $app->get("/solo/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->solo();
        });

        /**
         * @api {get} /killlist/5b/ Show the last 100 kills with a value of minimum 5b isk
         * @apiVersion 0.1.2
         * @apiName 5b
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/5b/
         */
        $app->get("/5b/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->fiveB();
        });

        /**
         * @api {get} /killlist/10b/ Show the last 100 kills with a value of minimum 10b isk
         * @apiVersion 0.1.2
         * @apiName 10b
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/10b/
         */
        $app->get("/10b/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->tenB();
        });

        /**
         * @api {get} /killlist/capitals/ Show the latest carrier kills
         * @apiDescription FAX machines fall into this one aswell
         * @apiVersion 0.1.2
         * @apiName capitals
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/capitals/
         */
        $app->get("/capitals/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->capitals();
        });

        /**
         * @api {get} /killlist/freighters/ Show the latest freighter kills
         * @apiDescription Rorq and Orca fall into this one aswell
         * @apiVersion 0.1.2
         * @apiName freighters
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/freighters/
         */
        $app->get("/freighters/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->freighters();
        });

        /**
         * @api {get} /killlist/supercarriers/ Show the latest super carrier kills
         * @apiVersion 0.1.2
         * @apiName supercarriers
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/supercarriers/
         */
        $app->get("/supercarriers/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->superCarriers();
        });

        /**
         * @api {get} /killlist/titans/ Show the latest titan kills
         * @apiVersion 0.1.2
         * @apiName titans
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/titans/
         */
        $app->get("/titans/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->titans();
        });

        /**
         * @api {get} /killlist/t1/ Show the latest t1 kills
         * @apiVersion 0.1.2
         * @apiName t1
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/t1/
         */
        $app->get("/t1/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->t1();
        });

        /**
         * @api {get} /killlist/t2/ Show the latest t2 kills
         * @apiVersion 0.1.2
         * @apiName t2
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/t2/
         */
        $app->get("/t2/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->t2();
        });

        /**
         * @api {get} /killlist/t3/ Show the latest t3 kills
         * @apiVersion 0.1.2
         * @apiName t3
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/t3/
         */
        $app->get("/t3/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->t3();
        });

        /**
         * @api {get} /killlist/frigates/ Show the latest frigates kills
         * @apiVersion 0.1.2
         * @apiName frigates
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/frigates/
         */
        $app->get("/frigates/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->frigates();
        });

        /**
         * @api {get} /killlist/destroyers/ Show the latest destroyers kills
         * @apiVersion 0.1.2
         * @apiName destroyers
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/destroyers/
         */
        $app->get("/destroyers/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->destroyers();
        });

        /**
         * @api {get} /killlist/cruisers/ Show the latest cruisers kills
         * @apiVersion 0.1.2
         * @apiName cruisers
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/cruisers/
         */
        $app->get("/cruisers/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->cruisers();
        });

        /**
         * @api {get} /killlist/battlecruisers/ Show the latest battlecruisers kills
         * @apiVersion 0.1.2
         * @apiName battlecruisers
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/battlecruisers/
         */
        $app->get("/battlecruisers/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->battlecruisers();
        });

        /**
         * @api {get} /killlist/battleships/ Show the latest battleships kills
         * @apiVersion 0.1.2
         * @apiName battleships
         * @apiGroup killlist
         * @apiPermission public
         * @apiSampleRequest /api/killlist/battleships/
         */
        $app->get("/battleships/", function () use ($app) {
            (new \ProjectRena\Controller\API\KilllistAPIController($app))->battleships();
        });
    });

    $app->group("/kills", function () use ($app) {
        /**
         * @api {get} /kills/solarSystem/:solarSystemID/ List kills that has happened in a certain solar system
         * @apiVersion 0.1.2
         * @apiName solarSystem
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} solarSystemID Limit to a specific solarSystemID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/solarSystem/:solarSystemID/
         */
        $app->get("/solarSystem/:solarSystemID/(:extraParameters+)", function ($solarSystemID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->solarSystemKills($solarSystemID, $parameters);
        });

        /**
         * @api {get} /kills/region/:regionID/ List kills that has happened in a certain region
         * @apiVersion 0.1.2
         * @apiName region
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} regionID Limit to a specific regionID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/region/:regionID/
         */
        $app->get("/region/:regionID/(:extraParameters+)", function ($regionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->regionKills($regionID, $parameters);
        });

        /**
         * @api {get} /kills/character/:characterID/ List kills for a certain character
         * @apiVersion 0.1.2
         * @apiName character
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} characterID Limit to a specific characterID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/character/:characterID/
         */
        $app->get("/character/:characterID/(:extraParameters+)", function ($characterID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->characterKills($characterID, $parameters);
        });

        /**
         * @api {get} /kills/corporation/:corporationID/ List kills for a certain corporation
         * @apiVersion 0.1.2
         * @apiName corporation
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} corporationID Limit to a specific corporationID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/corporation/:corporationID/
         */
        $app->get("/corporation/:corporationID/(:extraParameters+)", function ($corporationID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->corporationKills($corporationID, $parameters);
        });

        /**
         * @api {get} /kills/alliance/:allianceID/ List kills for a certain alliance
         * @apiVersion 0.1.2
         * @apiName alliance
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} allianceID Limit to a specific allianceID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/alliance/:allianceID/
         */
        $app->get("/alliance/:allianceID/(:extraParameters+)", function ($allianceID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->allianceKills($allianceID, $parameters);
        });

        /**
         * @api {get} /kills/faction/:factionID/ List kills for a certain faction
         * @apiVersion 0.1.2
         * @apiName faction
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} factionID Limit to a specific factionID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/faction/:factionID/
         */
        $app->get("/faction/:factionID/(:extraParameters+)", function ($factionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->factionKills($factionID, $parameters);
        });

        /**
         * @api {get} /kills/shipType/:shipTypeID/ List kills for a certain shipType
         * @apiVersion 0.1.2
         * @apiName shipType
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} shipTypeID Limit to a specific shipTypeID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/shipType/:shipTypeID/
         */
        $app->get("/shipType/:shipTypeID/(:extraParameters+)", function ($shipTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->shipTypeKills($shipTypeID, $parameters);
        });

        /**
         * @api {get} /kills/group/:groupID/ List kills for a certain group
         * @apiVersion 0.1.2
         * @apiName group
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} groupID Limit to a specific groupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/group/:groupID/
         */
        $app->get("/group/:groupID/(:extraParameters+)", function ($groupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->groupKills($groupID, $parameters);
        });

        /**
         * @api {get} /kills/vGroup/:vGroupID/ List kills for a certain vGroup
         * @apiVersion 0.1.2
         * @apiName vGroup
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} vGroupID Limit to a specific vGroupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/vGroup/:vGroupID/
         */
        $app->get("/vGroup/:vGroupID/(:extraParameters+)", function ($vGroupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->vGroupKills($vGroupID, $parameters);
        });

        /**
         * @api {get} /kills/weaponType/:weaponTypeID/ List kills for a certain weaponType
         * @apiVersion 0.1.2
         * @apiName weaponType
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {Integer} weaponTypeID Limit to a specific weaponTypeID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/weaponType/:weaponTypeID/
         */
        $app->get("/weaponType/:weaponTypeID/(:extraParameters+)", function ($weaponTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->weaponTypeKills($weaponTypeID, $parameters);
        });

        /**
         * @api {get} /kills/afterDate/:afterDate/ List kills happening after a certain date
         * @apiVersion 0.1.2
         * @apiName afterDate
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {DateTime} afterDate Return kills after a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/afterDate/:afterDate/
         */
        $app->get("/afterDate/:afterDate/(:extraParameters+)", function ($afterDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->beforeDateKills($afterDate, $parameters);
        });

        /**
         * @api {get} /kills/beforeDate/:beforeDate/ List kills happening before a certain date
         * @apiVersion 0.1.2
         * @apiName beforeDate
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {DateTime} beforeDate Return kills before a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/beforeDate/:beforeDate/
         */
        $app->get("/beforeDate/:beforeDate/(:extraParameters+)", function ($beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->afterDateKills($beforeDate, $parameters);
        });

        /**
         * @api {get} /kills/betweenDates/:afterDate/:beforeDate/ List kills between two dates
         * @apiVersion 0.1.2
         * @apiName betweenDates
         * @apiGroup kills
         * @apiPermission public
         * @apiParam {DateTime} afterDate Get kills after this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {DateTime} beforeDate But before this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/kills/betweenDates/:afterDate/:beforeDate/
         */
        $app->get("/betweenDates/:afterDate/:beforeDate/(:extraParameters+)", function ($afterDate, $beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\KillsAPIController($app))->betweenDateKills($afterDate, $beforeDate, $parameters);
        });
    });

    $app->group("/losses", function () use ($app) {
        /**
         * @api {get} /losses/character/:characterID/ List losses for a certain character
         * @apiVersion 0.1.2
         * @apiName character
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} characterID Limit to a specific characterID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/character/:characterID/
         */
        $app->get("/character/:characterID/(:extraParameters+)", function ($characterID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->characterLosses($characterID, $parameters);
        });

        /**
         * @api {get} /losses/corporation/:corporationID/ List losses for a certain corporation
         * @apiVersion 0.1.2
         * @apiName corporation
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} corporationID Limit to a specific corporationID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/corporation/:corporationID/
         */
        $app->get("/corporation/:corporationID/(:extraParameters+)", function ($corporationID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->corporationLosses($corporationID, $parameters);
        });

        /**
         * @api {get} /losses/alliance/:allianceID/ List losses for a certain alliance
         * @apiVersion 0.1.2
         * @apiName alliance
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} allianceID Limit to a specific allianceID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/alliance/:allianceID/
         */
        $app->get("/alliance/:allianceID/(:extraParameters+)", function ($allianceID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->allianceLosses($allianceID, $parameters);
        });

        /**
         * @api {get} /losses/faction/:factionID/ List losses for a certain faction
         * @apiVersion 0.1.2
         * @apiName faction
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} factionID Limit to a specific factionID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/faction/:factionID/
         */
        $app->get("/faction/:factionID/(:extraParameters+)", function ($factionID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->factionLosses($factionID, $parameters);
        });

        /**
         * @api {get} /losses/shipType/:shipTypeID/ List losses for a certain shipType
         * @apiVersion 0.1.2
         * @apiName shipType
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} shipTypeID Limit to a specific shipTypeID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/shipType/:shipTypeID/
         */
        $app->get("/shipType/:shipTypeID/(:extraParameters+)", function ($shipTypeID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->shipTypeLosses($shipTypeID, $parameters);
        });

        /**
         * @api {get} /losses/group/:groupID/ List losses for a certain group
         * @apiVersion 0.1.2
         * @apiName group
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} groupID Limit to a specific groupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/group/:groupID/
         */
        $app->get("/group/:groupID/(:extraParameters+)", function ($groupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->groupLosses($groupID, $parameters);
        });

        /**
         * @api {get} /losses/vGroup/:vGroupID/ List losses for a certain vGroup
         * @apiVersion 0.1.2
         * @apiName vGroup
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {Integer} vGroupID Limit to a specific vGroupID
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/vGroup/:vGroupID/
         */
        $app->get("/vGroup/:vGroupID/(:extraParameters+)", function ($vGroupID, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->vGroupLosses($vGroupID, $parameters);
        });

        /**
         * @api {get} /losses/afterDate/:afterDate/ List losses happening after a certain date
         * @apiVersion 0.1.2
         * @apiName afterDate
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {DateTime} afterDate Return kills after a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/afterDate/:afterDate/
         */
        $app->get("/afterDate/:afterDate/(:extraParameters+)", function ($afterDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->beforeDateLosses($afterDate, $parameters);
        });

        /**
         * @api {get} /losses/beforeDate/:beforeDate/ List losses happening before a certain date
         * @apiVersion 0.1.2
         * @apiName beforeDate
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {DateTime} beforeDate Return kills before a certain date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/beforeDate/:beforeDate/
         */
        $app->get("/beforeDate/:beforeDate/(:extraParameters+)", function ($beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->afterDateLosses($beforeDate, $parameters);
        });

        /**
         * @api {get} /losses/betweenDates/:afterDate/:beforeDate/ List losses between two dates
         * @apiVersion 0.1.2
         * @apiName betweenDates
         * @apiGroup losses
         * @apiPermission public
         * @apiParam {DateTime} afterDate Get kills after this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {DateTime} beforeDate But before this date (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [killID] the killID
         * @apiParam {DateTime} [killTime] Limit to a specific time (YYYY-mm-dd HH:ii:ss)
         * @apiParam {Integer} [solarSystemID] Limit to a specific solarSystemID
         * @apiParam {Integer} [regionID] Limit to a specific regionID
         * @apiParam {Integer} [characterID] Limit to a specific characterID
         * @apiParam {Integer} [corporationID] Limit to a specific corporationID
         * @apiParam {Integer} [allianceID] Limit to a specific allianceID
         * @apiParam {Integer} [factionID] Limit to a specific factionID
         * @apiParam {Integer} [shipTypeID] Limit to a specific shipTypeID
         * @apiParam {Integer} [groupID] Limit to a specific groupID
         * @apiParam {Integer} [vGroupID] Limit to a specific vGroupID
         * @apiParam {Integer} [weaponTypeID] Limit to a specific weaponTypeID
         * @apiParam {Float} [shipValue]
         * @apiParam {Integer} [damageDone]
         * @apiParam {Float} [totalValue]
         * @apiParam {Integer} [pointValue]
         * @apiParam {Integer} [numberInvolved]
         * @apiParam {Integer} [isVictim] (1 or 0)
         * @apiParam {Integer} [finalBlow] (1 or 0)
         * @apiParam {Integer} [isNPC] (1 or 0)
         * @apiParam {Integer} [limit] 1 to 100
         * @apiParam {String} [order] asc or desc (case sensitive)
         * @apiParam {Integer} [offset] Return records after a certain offset
         * @apiSampleRequest /api/losses/betweenDates/:afterDate/:beforeDate/
         */
        $app->get("/betweenDates/:afterDate/:beforeDate/(:extraParameters+)", function ($afterDate, $beforeDate, $parameters = array()) use ($app) {
            (new \ProjectRena\Controller\API\LossesAPIController($app))->betweenDateLosses($afterDate, $beforeDate, $parameters);
        });
    });

    $app->group("/stats", function () use ($app) {
        /**
         * @api {get} /top10Characters/ List the top10 Characters
         * @apiVersion 0.1.2
         * @apiName top10Characters
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Characters/
         */
        $app->get("/top10Characters/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Characters();
        });

        /**
         * @api {get} /top10Corporations/ List the top10 Corporations
         * @apiVersion 0.1.2
         * @apiName top10Corporations
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Corporations/
         */
        $app->get("/top10Corporations/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Corporations();
        });

        /**
         * @api {get} /top10Alliances/ List the top10 Alliances
         * @apiVersion 0.1.2
         * @apiName top10Alliances
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Alliances/
         */
        $app->get("/top10Alliances/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Alliances();
        });

        /**
         * @api {get} /top10ShipTypes/ List the top10 Ship Types
         * @apiVersion 0.1.2
         * @apiName top10ShipTypes
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10ShipTypes/
         */
        $app->get("/top10ShipTypes/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10ShipTypes();
        });

        /**
         * @api {get} /top10SolarSystems/ List the top10 Solar Systems
         * @apiVersion 0.1.2
         * @apiName top10SolarSystems
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10SolarSystems/
         */
        $app->get("/top10SolarSystems/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10SolarSystems();
        });

        /**
         * @api {get} /top10Regions/ List the top10 Regions
         * @apiVersion 0.1.2
         * @apiName top10Regions
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/top10Regions/
         */
        $app->get("/top10Regions/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->top10Regions();
        });

        /**
         * @api {get} /mostValuableKillsLast7Days/ List the most valuable kills done over the last 7 days
         * @apiVersion 0.1.2
         * @apiName mostValuableKillsLast7Days
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/mostValuableKillsLast7Days/
         */
        $app->get("/mostValuableKillsLast7Days/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->mostValuableKillsLast7Days();
        });

        /**
         * @api {get} /sevenDayKillCount/ List the amount of kills done over the last 7 days
         * @apiVersion 0.1.2
         * @apiName sevenDayKillCount
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/sevenDayKillCount/
         */
        $app->get("/sevenDayKillCount/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->sevenDayKillCount();
        });

        /**
         * @api {get} /currentlyActiveCharacters/ List the amount of currently active characters
         * @apiVersion 0.1.2
         * @apiName currentlyActiveCharacters
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveCharacters/
         */
        $app->get("/currentlyActiveCharacters/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveCharacters();
        });

        /**
         * @api {get} /currentlyActiveCorporations/ List the amount of currently active corporations
         * @apiVersion 0.1.2
         * @apiName currentlyActiveCorporations
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveCorporations/
         */
        $app->get("/currentlyActiveCorporations/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveCorporations();
        });

        /**
         * @api {get} /currentlyActiveAlliances/ List the amount of currently active alliances
         * @apiVersion 0.1.2
         * @apiName currentlyActiveAlliances
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveAlliances/
         */
        $app->get("/currentlyActiveAlliances/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveAlliances();
        });

        /**
         * @api {get} /currentlyActiveShipTypes/ List the amount of currently active ship types
         * @apiVersion 0.1.2
         * @apiName currentlyActiveShipTypes
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveShipTypes/
         */
        $app->get("/currentlyActiveShipTypes/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveShipTypes();
        });

        /**
         * @api {get} /currentlyActiveSolarSystems/ List the amount of currently active solar systems
         * @apiVersion 0.1.2
         * @apiName currentlyActiveSolarSystems
         * @apiGroup stats
         * @apiPermission public
         * @apiSampleRequest /api/stats/currentlyActiveSolarSystems/
         */
        $app->get("/currentlyActiveSolarSystems/", function () use ($app) {
            (new \ProjectRena\Controller\API\StatsAPIController($app))->currentlyActiveSolarSystems();
        });
    });

    $app->group("/search", function () use ($app) {
        /**
         * @api {get} /search/:searchTerm/ Do a multi-search, looking into every category
         * @apiVersion 0.1.2
         * @apiName findAny
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} searchTerm A String to try and match to..
         * @apiSampleRequest /api/search/any/:searchTerm/
         */
        /**
         * @api {get} /search/faction/:factionName/ Search for a Faction
         * @apiVersion 0.1.2
         * @apiName findFaction
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} factionName Partial Strings are accepted
         * @apiSampleRequest /api/search/faction/:factionName/
         */
        /**
         * @api {get} /search/alliance/:allianceName/ Search for an Alliance
         * @apiVersion 0.1.2
         * @apiName findAlliance
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} allianceName Partial Strings are accepted
         * @apiSampleRequest /api/search/alliance/:allianceName/
         */
        /**
         * @api {get} /search/corporation/:corporationName/ Search for a Corporation
         * @apiVersion 0.1.2
         * @apiName findCorporation
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} corporationName Partial Strings are accepted
         * @apiSampleRequest /api/search/corporation/:corporationName/
         */
        /**
         * @api {get} /search/character/:characterName/ Search for a Character
         * @apiVersion 0.1.2
         * @apiName findCharacter
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} characterName Partial Strings are accepted
         * @apiSampleRequest /api/search/character/:characterName/
         */
        /**
         * @api {get} /search/item/:itemName/ Search for an Item
         * @apiVersion 0.1.2
         * @apiName findItem
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} itemName Partial Strings are accepted
         * @apiSampleRequest /api/search/item/:itemName/
         */
        /**
         * @api {get} /search/system/:systemName/ Search for a System
         * @apiVersion 0.1.2
         * @apiName findSystem
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} systemName Partial Strings are accepted
         * @apiSampleRequest /api/search/system/:systemName/
         */
        /**
         * @api {get} /search/region/:regionName/ Search for a Region
         * @apiVersion 0.1.2
         * @apiName findRegion
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} regionName  Partial Strings are accepted
         * @apiSampleRequest /api/search/region/:regionName/
         */
        /**
         * @api {get} /search/celestial/:SolarSystemName/ Search for celestials in a Solar System
         * @apiVersion 0.1.2
         * @apiName findCelestial
         * @apiGroup search
         * @apiPermission public
         * @apiParam {String} SolarSystemName Partial Strings are accepted
         * @apiSampleRequest /api/search/celestial/:SolarSystemName/
         */
        $app->get("(/:type)/:searchTerm/", function ($searchType = null, $searchTerm = null) use ($app) {
            if (!$searchType)
                $searchType = array("faction", "alliance", "corporation", "character", "item", "system", "region");

            (new \ProjectRena\Controller\API\SearchAPIController($app))->search($searchTerm, $searchType);
        });
    });

    $app->group("/tools", function () use ($app) {
        /**
         * @api {post} /tools/calculateCrestHash/ Calculates the CREST hash for a non-crest verified killmail
         * @apiVersion 0.1.2
         * @apiName calculateCRESTHash
         * @apiDescription Remember to post to it using a CREST formatted killmail
         * @apiGroup tools
         * @apiPermission public
         * @apiParam {json} data The killmail data as a json string
         * @apiParamExample {json} Post-Example:
         * {"killID":1,"killmail":[]}
         * @apiSampleRequest /api/tools/calculateCrestHash
         * @apiSuccessExample {json} Example Return
         * 66e1b9f27b9ce0947051240f2f594b74957fc30b
         */
        $app->post("/calculateCrestHash/", function () use ($app) {
            $data = json_decode($app->request->post("data"), true);
            $crestHash = $app->CrestFunctions->generateCRESTHash($data);

            render("", $crestHash, null, "application/json");
        });

        /**
         * @api {post} /tools/validateCrestUrl/ Validates a CREST URL, and returns it if it's valid
         * @apiVersion 0.1.2
         * @apiName validateCRESTUrl
         * @apiGroup tools
         * @apiPermission public
         * @apiParam {String} url The URL for the killmail
         * @apiParamExample {String} Post-Example:
         * https://public-crest.eveonline.com/killmails/53124530/7c74ad07861c7e0f6dd65ed78138963f9b1fd365/
         * @apiSampleRequest /api/tools/validateCrestUrl
         * @apiSuccessExample {json} Example Return
         * https://public-crest.eveonline.com/killmails/53124530/7c74ad07861c7e0f6dd65ed78138963f9b1fd365/
         */
        $app->post("/validateCrestUrl/", function () use ($app) {
            $url = $app->request->post("url");
            render("", $app->CrestFunctions->validateCRESTLink($url), null, "application/json");
        });
    });

    $app->group("/wars", function () use ($app) {
        /**
         * @api {get} /wars/count/ Total amount of wars in the system
         * @apiVersion 0.1.2
         * @apiName count
         * @apiGroup wars
         * @apiPermission public
         * @apiSampleRequest /api/wars/count/
         */
        $app->get("/count/", function () use ($app) {
            $results = $app->Db->queryRow("SELECT COUNT(*) AS count FROM wars");
            render("", $results, null, "application/json");
        });

        /**
         * @api {get} /wars/wars/ List all the wars
         * @apiVersion 0.1.2
         * @apiName wars
         * @apiGroup wars
         * @apiPermission public
         * @apiSampleRequest /api/wars/wars/
         */
        $app->get("/wars/", function () use ($app) {
            (new \ProjectRena\Controller\API\WarsAPIController($app))->listWars();
        });

        /**
         * @api {get} /wars/kills/:warID/ List all the kills done in a war
         * @apiVersion 0.1.2
         * @apiName kills
         * @apiGroup wars
         * @apiPermission public
         * @apiParam {Integer} warID the ID of the war to lookup kills for
         * @apiSampleRequest /api/wars/kills/:warID/
         */
        $app->get("/kills/:warID/", function ($warID) use ($app) {
            (new \ProjectRena\Controller\API\WarsAPIController($app))->listKillsFromWar($warID);
        });
    });

    $app->group("/market", function () use ($app) {
        /**
         * @api {get} /market/price/:typeID/ Return the latest pricing value for an item
         * @apiVersion 0.1.2
         * @apiName marketPrice
         * @apiGroup market
         * @apiPermission public
         * @apiParam {Integer} typeID the typeID of the item to lookup a price for
         * @apiSampleRequest /api/market/price/:typeID/
         */
        $app->get("/price/:typeID/", function ($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValue($typeID);
        });

        /**
         * @api {get} /market/prices/:typeID/ Return the cached pricing values for an item (Averaged by day)
         * @apiVersion 0.1.2
         * @apiName marketPrices
         * @apiGroup market
         * @apiPermission public
         * @apiParam {Integer} typeID the typeID of the item to lookup prices for
         * @apiSampleRequest /api/market/prices/:typeID/
         */
        $app->get("/prices/:typeID/", function ($typeID) use ($app) {
            (new \ProjectRena\Controller\API\MarketAPIController($app))->getItemValues($typeID);
        });
    });

    $app->group("/authed", function() use ($app) {
        $headers = $app->request->headers;

        /**
         * @api {get} /authed/userinfo/ Get all information for user
         * @apiDescription This one contains everything CREST gives upon login, plus a few extras
         * @apiVersion 0.1.2
         * @apiName userInformation
         * @apiGroup authed
         * @apiHeader {String} Authorization The Authorization token that is generated upon login on the main site
         * @apiPermission private
         * @apiSampleRequest /api/authed/userinfo/
         */
        $app->get("/userinfo/", function() use ($app, $headers) {
            $renaApiToken = $headers["Authorization"];
            (new \ProjectRena\Controller\API\AuthedAPIController($app))->userInfo($renaApiToken);
        });

        /**
         * @api {get} /authed/apikeys/ Get all the API Keys belonging to user
         * @apiDescription All the APIKeys currently added for this user
         * @apiVersion 0.1.2
         * @apiName apiKeys
         * @apiGroup authed
         * @apiHeader {String} Authorization The Authorization token that is generated upon login on the main site
         * @apiPermission private
         * @apiSampleRequest /api/authed/apikeys/
         */
        $app->get("/apikeys/", function() use ($app, $headers) {
            $renaApiToken = $headers["Authorization"];
            (new \ProjectRena\Controller\API\AuthedAPIController($app))->apiKeys($renaApiToken);
        });

        // Directly call CCP using the built in Pheal stuff, and the APIKeys that the user has added.
        // This might be completely useless, but whatever
        $app->group("/api/:renaKeyID/", function($renaKeyID = null) use ($app) {
            $app->group("/account", function() use ($app, $renaKeyID) {
                $app->get("/accountstatus/", function() use ($app, $renaKeyID) {

                });

                $app->get("/apikeyinfo/", function() use ($app, $renaKeyID) {

                });

                $app->get("/characters/", function() use ($app, $renaKeyID) {

                });

            });

            $app->group("/character", function() use ($app, $renaKeyID) {
                $app->get("/accountbalance/", function() use ($app, $renaKeyID) {

                });
                $app->get("/assetlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/blueprints/", function() use ($app, $renaKeyID) {

                });
                $app->get("/calendareventattendees/", function() use ($app, $renaKeyID) {

                });
                $app->get("/charactersheet/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contactlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contactnotifications/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contracts/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contractitems/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contractbids/", function() use ($app, $renaKeyID) {

                });
                $app->get("/facwarstats/", function() use ($app, $renaKeyID) {

                });
                $app->get("/industryjobs/", function() use ($app, $renaKeyID) {

                });
                $app->get("/industryjobshistory/", function() use ($app, $renaKeyID) {

                });
                $app->get("/killmails/", function() use ($app, $renaKeyID) {

                });
                $app->get("/locations/", function() use ($app, $renaKeyID) {

                });
                $app->get("/mailbodies/", function() use ($app, $renaKeyID) {

                });
                $app->get("/mailinglists/", function() use ($app, $renaKeyID) {

                });
                $app->get("/mailmessages/", function() use ($app, $renaKeyID) {

                });
                $app->get("/marketorders/", function() use ($app, $renaKeyID) {

                });
                $app->get("/medals/", function() use ($app, $renaKeyID) {

                });
                $app->get("/notifications/", function() use ($app, $renaKeyID) {

                });
                $app->get("/notificationtexts/", function() use ($app, $renaKeyID) {

                });
                $app->get("/planetarycolonies/", function() use ($app, $renaKeyID) {

                });
                $app->get("/planetarypins/", function() use ($app, $renaKeyID) {

                });
                $app->get("/planetaryroutes/", function() use ($app, $renaKeyID) {

                });
                $app->get("/planetarylinks/", function() use ($app, $renaKeyID) {

                });
                $app->get("/research/", function() use ($app, $renaKeyID) {

                });
                $app->get("/skillintraining/", function() use ($app, $renaKeyID) {

                });
                $app->get("/skillqueue/", function() use ($app, $renaKeyID) {

                });
                $app->get("/standings/", function() use ($app, $renaKeyID) {

                });
                $app->get("/upcomingcalendarevents/", function() use ($app, $renaKeyID) {

                });
                $app->get("/walletjournal/", function() use ($app, $renaKeyID) {

                });
                $app->get("/wallettransactions/", function() use ($app, $renaKeyID) {

                });
            });

            $app->group("/corporation", function() use ($app, $renaKeyID) {
                $app->get("/accountbalance/", function() use ($app, $renaKeyID) {

                });
                $app->get("/assetlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/blueprints/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contactlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/containerlog/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contracts/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contractitems/", function() use ($app, $renaKeyID) {

                });
                $app->get("/contractbids/", function() use ($app, $renaKeyID) {

                });
                $app->get("/corporationsheet/", function() use ($app, $renaKeyID) {

                });
                $app->get("/customsoffices/", function() use ($app, $renaKeyID) {

                });
                $app->get("/facilities/", function() use ($app, $renaKeyID) {

                });
                $app->get("/facwarstats/", function() use ($app, $renaKeyID) {

                });
                $app->get("/industryjobs/", function() use ($app, $renaKeyID) {

                });
                $app->get("/industryjobshistory/", function() use ($app, $renaKeyID) {

                });
                $app->get("/killmails/", function() use ($app, $renaKeyID) {

                });
                $app->get("/locations/", function() use ($app, $renaKeyID) {

                });
                $app->get("/marketorders/", function() use ($app, $renaKeyID) {

                });
                $app->get("/medals/", function() use ($app, $renaKeyID) {

                });
                $app->get("/membermedals/", function() use ($app, $renaKeyID) {

                });
                $app->get("/membersecurity/", function() use ($app, $renaKeyID) {

                });
                $app->get("/membertracking/", function() use ($app, $renaKeyID) {

                });
                $app->get("/outpostlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/outpostservicedetail/", function() use ($app, $renaKeyID) {

                });
                $app->get("/shareholders/", function() use ($app, $renaKeyID) {

                });
                $app->get("/standings/", function() use ($app, $renaKeyID) {

                });
                $app->get("/starbasedetail/", function() use ($app, $renaKeyID) {

                });
                $app->get("/starbaselist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/titles/", function() use ($app, $renaKeyID) {

                });
                $app->get("/walletjournal/", function() use ($app, $renaKeyID) {

                });
                $app->get("/walletransactions/", function() use ($app, $renaKeyID) {

                });

            });
            $app->group("/eve", function() use ($app, $renaKeyID) {
                $app->get("/alliancelist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/certificatetree/", function() use ($app, $renaKeyID) {

                });
                $app->get("/characteraffiliation/", function() use ($app, $renaKeyID) {

                });
                $app->get("/characterid/", function() use ($app, $renaKeyID) {

                });
                $app->get("/characterinfo/", function() use ($app, $renaKeyID) {

                });
                $app->get("/charactername/", function() use ($app, $renaKeyID) {

                });
                $app->get("/conquerablestationlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/errorlist/", function() use ($app, $renaKeyID) {

                });
                $app->get("/facwarstats/", function() use ($app, $renaKeyID) {

                });
                $app->get("/facwartopstats/", function() use ($app, $renaKeyID) {

                });
                $app->get("/reftypes/", function() use ($app, $renaKeyID) {

                });
                $app->get("/skilltree/", function() use ($app, $renaKeyID) {

                });
                $app->get("/typename/", function() use ($app, $renaKeyID) {

                });

            });
            $app->group("/map", function() use ($app, $renaKeyID) {
                $app->get("/facwarsystems/", function() use ($app, $renaKeyID) {

                });
                $app->get("/jumps/", function() use ($app, $renaKeyID) {

                });
                $app->get("/kills/", function() use ($app, $renaKeyID) {

                });
                $app->get("/sovereignty/", function() use ($app, $renaKeyID) {

                });

            });
            $app->group("/server", function() use ($app, $renaKeyID) {
                $app->get("/serverstatus/", function() use ($app, $renaKeyID) {

                });

            });
            $app->group("/api", function() use ($app, $renaKeyID) {
                $app->get("/calllist/", function() use ($app, $renaKeyID) {

                });

            });

        });
    });

});