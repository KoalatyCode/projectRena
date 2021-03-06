<?php

namespace ProjectRena\Model\EVEApi\Corporation;

use ProjectRena\RenaApp;

/**
 * Class Locations.
 */
class Locations
{
    /**
     * @var int
     */
    public $accessMask = 16777216;

    /**
     * @var
     */
    private $app;

    /**
     * @param \ProjectRena\RenaApp $app
     */
    function __construct(RenaApp $app)
    {
        $this->app = $app;
    }

    /**
     * @param $apiKey
     * @param $vCode
     * @param $characterID
     * @param array $ids
     *
     * @return mixed
     */
    public function getData($apiKey, $vCode, $characterID, $ids = array())
    {
        try {
            $pheal = $this->app->Pheal->Pheal($apiKey, $vCode);
            $pheal->scope = 'Corp';
            $result = $pheal->Locations(array('characterID' => $characterID, 'IDs' => implode(',', $ids)))->toArray();
            return $result;
        } catch (\Exception $exception) {
            $this->app->Pheal->handleApiException($apiKey, $characterID, $exception);
        }
    }
}
