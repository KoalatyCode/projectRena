<?php

namespace ProjectRena\Model\EVEApi\EVE;



/**
 * Class SkillTree.
 */
class SkillTree
{
    /**
     * @var int
     */
    public $accessMask = null;

    /**
     * @var
     */
    private $app;

    /**
     * @param $app
     */
    function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        $pheal = $this->app->pheal;
        $pheal->scope = 'EVE';
        $result = $pheal->SkillTree()->toArray();

        return $result;
    }
}
