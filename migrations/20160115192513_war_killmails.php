<?php

use Phinx\Migration\AbstractMigration;

class WarKillmails extends AbstractMigration
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
        $warKillmails = $this->table("warKillmails", array("engine" => "TokuDB"));
        $warKillmails
            ->addColumn("killID", "integer", array("limit" => 11))
            ->addColumn("warID", "integer", array("limit" => 11))
            ->addIndex(array("killID"))
            ->addIndex(array("warID"))
            ->addForeignKey("warID", "wars", "warID")
            ->save();
    }
}
