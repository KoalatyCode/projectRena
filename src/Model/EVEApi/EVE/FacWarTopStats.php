<?php


namespace ProjectRena\Model\EVEApi\EVE;

use ProjectRena\Lib\PhealLoader;

/**
 * Class FacWarTopStats
 *
 * @package ProjectRena\Model\EVEApi\EVE
 */
class FacWarTopStats {
	/**
	 * @var int
	 */
	public $accessMask = null;

	/**
	 * @return mixed
	 */
	public function getData()
	{
		$pheal = PhealLoader::loadPheal();
		$pheal->scope = "EVE";
		$result = $pheal->FacWarTopStats()->toArray();

		return $result;
	}
}