<?php

use Phinx\Migration\AbstractMigration;

class FactionsData extends AbstractMigration
{
    public function up()
    {
        // Insert data into the table (factionID, factionName, factionTicker)
        $data = array(
            array("500001", "Caldari State", "caldari"),
            array("500002", "Minmatar Republic", "minmatar"),
            array("500003", "Amarr Empire", "amarr"),
            array("500004", "Gallente Federation", "gallente"),
            array("500007", "Ammatar Mandate", ""),
            array("500010", "Guristas Pirates", ""),
            array("500011", "Angel Cartel", ""),
            array("500012", "Blood Raider Covenant", ""),
            array("500018", "Mordu's Legion Command", ""),
            array("500019", "Sansha's Nation", ""),
            array("500020", "Serpentis", ""),
            array("500021", "Unknown", ""),
            array("500024", "Drifters", ""),
        );
        $table = $this->table("factions");
        $table->insert(array("factionID", "factionName", "factionTicker"), $data);
        $table->saveData();
    }

    public function down()
    {
        $this->execute("DELETE FROM factions");
    }
}
