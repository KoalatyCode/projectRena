<?php

use Phinx\Migration\AbstractMigration;

class Discord extends AbstractMigration
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
        $discordServers = $this->table("discordServers", array("engine" => "TokuDB"));
        $discordServers
            ->addColumn("serverID", "biginteger", array("limit" => 20))
            ->addColumn("serverHash", "string", array("limit" => 255))
            ->addColumn("serverName", "string", array("limit" => 255))
            ->addColumn("ownerID", "integer", array("limit" => 11))
            ->addColumn("allowedEntities", "text", array())
            ->addColumn("created", "datetime", array("default" => "CURRENT_TIMESTAMP"))
            ->addIndex(array("serverID"), array("unique" => true))
            ->save();
    }
}
