<?php

use Phinx\Migration\AbstractMigration;

class DiscordUsers extends AbstractMigration
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
        $discordUsers = $this->table("discordUsers", array("engine" => "TokuDB"));
        $discordUsers
            ->addColumn("serverID", "biginteger", array("limit" => 20))
            ->addColumn("userID", "biginteger", array("limit" => 20))
            ->addColumn("discordID", "biginteger", array("limit" => 20))
            ->addColumn("characterID", "integer", array("limit" => 16))
            ->addColumn("corporationID", "string", array("limit" => 255))
            ->addColumn("allianceID", "string", array("limit" => 255))
            ->addColumn("authString", "string", array("limit" => 255))
            ->addColumn("created", "datetime", array("default" => "CURRENT_TIMESTAMP"))
            ->addIndex(array("serverID"), array())
            ->addIndex(array("userID"), array("unique" => true))
            ->addIndex(array("corporationID"), array())
            ->addIndex(array("allianceID"), array())
            ->save();
    }
}
