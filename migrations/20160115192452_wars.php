<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class Wars extends AbstractMigration
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
        $wars = $this->table("wars", array("engine" => "TokuDB", "id" => "warID"));
        $wars
            ->addColumn("timeDeclared", "datetime", array("default" => "0000-00-00 00:00:00"))
            ->addColumn("timeStarted", "datetime", array("default" => "0000-00-00 00:00:00"))
            ->addColumn("timeFinished", "datetime", array("default" => "0000-00-00 00:00:00"))
            ->addColumn("openForAllies", "integer", array("limit" => MysqlAdapter::INT_TINY))
            ->addColumn("mutual", "integer", array("limit" => MysqlAdapter::INT_TINY))
            ->addColumn("aggressor", "integer", array("limit" => 11))
            ->addColumn("aggressorShipsKilled", "integer", array("limit" => 11))
            ->addColumn("aggressorISKKilled", "float", array("default" => 0))
            ->addColumn("defender", "integer", array("limit" => 11))
            ->addColumn("defenderShipsKilled", "integer", array("limit" => 11))
            ->addColumn("defenderISKKilled", "float", array("default" => 0))
            ->addColumn("dateAdded", "datetime", array("default" => "CURRENT_TIMESTAMP"))
            ->addColumn("lastUpdated", "datetime", array("default" => "0000-00-00 00:00:00"))
            ->addIndex("openForAllies")
            ->addIndex("aggressor")
            ->addIndex("defender")
            ->addIndex("dateAdded")
            ->save();
    }
}
