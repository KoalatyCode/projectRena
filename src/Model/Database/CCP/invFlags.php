<?php
namespace ProjectRena\Model\Database\CCP;

use ProjectRena\RenaApp;

/**
 * Class invTypes
 *
 * @package ProjectRena\Model\EVE
 */
class invFlags
{
    /**
     * @var RenaApp
     */
    private $app;
    /**
     * @var \ProjectRena\Lib\Db
     */
    private $db;

    /**
     * @param RenaApp $app
     */
    function __construct(RenaApp $app)
    {
        $this->app = $app;
        $this->db = $this->app->Db;
    }

    /**
     * @param $flagID
     *
     * @return array
     */
    public function getAllByID($flagID)
    {
        return $this->db->queryRow("SELECT * FROM invFlags WHERE flagID = :id", array(":id" => $flagID), 3600);
    }

    /**
     * @param $flagName
     *
     * @return array
     */
    public function getAllByName($flagName)
    {
        return $this->db->queryRow("SELECT * FROM invFlags WHERE flagName = :name", array(":name" => $flagName), 3600);
    }

    /**
     * @param $flagID
     *
     * @return string
     */
    public function getFlagNameByID($flagID)
    {
        return $this->db->queryField("SELECT flagName FROM invFlags WHERE flagID = :id", "flagName", array(":id" => $flagID), 3600);
    }

    /**
     * @param $flagName
     *
     * @return string
     */
    public function getFlagIDByName($flagName)
    {
        return $this->db->queryField("SELECT flagID FROM invFlags WHERE flagName = :name", "flagID", array(":name" => $flagName), 3600);
    }

    /**
     * @param $flagID
     *
     * @return string
     */
    public function getFlagTextByID($flagID)
    {
        return $this->db->queryField("SELECT flagText FROM invFlags WHERE flagID = :id", "flagText", array(":id" => $flagID), 3600);
    }

    /**
     * @param $flagName
     *
     * @return string
     */
    public function getFlagTextByName($flagName)
    {
        return $this->db->queryField("SELECT flagText FROM invFlags WHERE flagName = :name", "flagText", array(":name" => $flagName), 3600);
    }

    /**
     * @param $flagID
     *
     * @return string
     */
    public function getOrderIDByID($flagID)
    {
        return $this->db->queryField("SELECT orderID FROM invFlags WHERE flagID = :id", "orderID", array(":id" => $flagID), 3600);
    }

    /**
     * @param $flagName
     *
     * @return string
     */
    public function getOrderIDByName($flagName)
    {
        return $this->db->queryField("SELECT orderID FROM invFlags WHERE flagName = :name", "orderID", array(":name" => $flagName), 3600);
    }
}