<?php

use Phinx\Migration\AbstractMigration;

class Coalitions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $coalitions = $this->table("coalitions", array("engine" => "TokuDB", "id" => "coalitionID"));
        $coalitions
            ->addColumn("coalitionName", "string", array("limit" => 128))
            ->addColumn("coalitionMembers", "text", array("limit" => \Phinx\Db\Adapter\MysqlAdapter::TEXT_MEDIUM, "null" => true))
            ->addColumn("dateAdded", "datetime", array("default" => "CURRENT_TIMESTAMP"))
            ->addColumn("lastUpdated", "datetime", array("default" => "0000-00-00 00:00:00"))
            ->addIndex(array("coalitionName"))
            ->addIndex(array("lastUpdated"))
        ->save();
    }
}