<?php

namespace ProjectRena\Task\Resque;

/**
	* Class updateCharacter
	*
	* @package ProjectRena\Task\Resque
	*/
class updateCharacter
{
				protected $app;

				/**
				 *
				 */
				public function setUp()
				{
								$this->app = \ProjectRena\RenaApp::getInstance();
				}

				/**
				 *
				 */
				public function perform()
				{
								$characterID = $this->args["characterID"];

								// Skip NPC and DUST characters
								if($characterID >= 2100000000 && $characterID <= 2200000000)
												return;
								if($characterID >= 30000000 && $characterID <= 31004590)
												return;
								if($characterID >= 40000000 && $characterID <= 41004590)
												return;

								// Get the character affiliate data
								$data = $this->app->EVEEVECharacterInfo->getData($characterID);
								// Update/Insert the character
								$this->app->characters->updateCharacterDetails($data["result"]["characterID"], $data["result"]["corporationID"], (isset($data["result"]["allianceID"]) ? $data["result"]["allianceID"] : 0), $data["result"]["characterName"], json_encode($data["result"]["employmentHistory"]));
								// Update the last updated
								$this->app->characters->setLastUpdated($characterID, date("Y-m-d H:i:s"));
				}

				/**
				 *
				 */
				public function tearDown()
				{
								$this->app = NULL;
				}
}