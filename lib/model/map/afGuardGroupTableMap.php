<?php



/**
 * This class defines the structure of the 'af_guard_group' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.map
 */
class afGuardGroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.afGuardPlugin.lib.model.map.afGuardGroupTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('af_guard_group');
		$this->setPhpName('afGuardGroup');
		$this->setClassname('afGuardGroup');
		$this->setPackage('plugins.afGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('afGuardGroupPermission', 'afGuardGroupPermission', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'CASCADE', null);
    $this->addRelation('afGuardUserGroup', 'afGuardUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'CASCADE', null);
    $this->addRelation('ProjectUser', 'ProjectUser', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'SET NULL', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // afGuardGroupTableMap
