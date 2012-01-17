<?php



/**
 * This class defines the structure of the 'af_guard_user' table.
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
class afGuardUserTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.afGuardPlugin.lib.model.map.afGuardUserTableMap';

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
		$this->setName('af_guard_user');
		$this->setPhpName('afGuardUser');
		$this->setClassname('afGuardUser');
		$this->setPackage('plugins.afGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 128, null);
		$this->addColumn('ALGORITHM', 'Algorithm', 'VARCHAR', true, 128, 'sha1');
		$this->addColumn('SALT', 'Salt', 'VARCHAR', true, 128, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 128, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true);
		$this->addColumn('IS_SUPER_ADMIN', 'IsSuperAdmin', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('afGuardUserPermission', 'afGuardUserPermission', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'afGuardUserPermissions');
		$this->addRelation('afGuardUserGroup', 'afGuardUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'afGuardUserGroups');
		$this->addRelation('afGuardRememberKey', 'afGuardRememberKey', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'afGuardRememberKeys');
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // afGuardUserTableMap
