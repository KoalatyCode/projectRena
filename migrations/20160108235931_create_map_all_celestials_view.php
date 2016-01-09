<?php

use Phinx\Migration\AbstractMigration;

class CreateMapAllCelestialsView extends AbstractMigration
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

    }

    public function up()
    {
        // Has to be run manually apparently, since Phinx doesn't actually run this.. :\
        $this->execute("CREATE VIEW mapAllCelestials AS
(SELECT itemID, itemName, typeName, mapDenormalize.typeID, solarSystemName, mapDenormalize.solarSystemID, mapDenormalize.constellationID, mapDenormalize.regionID, mapRegions.regionName, orbitID, mapDenormalize.x, mapDenormalize.y, mapDenormalize.z
FROM mapDenormalize
JOIN invTypes ON (mapDenormalize.typeID = invTypes.typeID)
JOIN mapSolarSystems ON (mapSolarSystems.solarSystemID = mapDenormalize.solarSystemID)
JOIN mapRegions ON (mapDenormalize.regionID = mapRegions.regionID)
JOIN mapConstellations ON (mapDenormalize.constellationID = mapConstellations.constellationID))
	    ");
    }

    public function down()
    {
        $this->execute("DROP VIEW mapAllCelestials");
    }
}
