<?php



/**
 * This class defines the structure of the 'af_guard_remember_key' table.
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
class afGuardRememberKeyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.afGuardPlugin.lib.model.map.afGuardRememberKeyTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('af_guard_remember_key');
        $this->setPhpName('afGuardRememberKey');
        $this->setClassname('afGuardRememberKey');
        $this->setPackage('plugins.afGuardPlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('user_id', 'UserId', 'INTEGER' , 'af_guard_user', 'id', true, null, null);
        $this->addColumn('remember_key', 'RememberKey', 'VARCHAR', false, 32, null);
        $this->addPrimaryKey('ip_address', 'IpAddress', 'VARCHAR', true, 50, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('afGuardUser', 'afGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
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
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'true',
),
            'symfony_behaviors' =>  array (
),
            'symfony_timestampable' =>  array (
  'create_column' => 'created_at',
),
        );
    } // getBehaviors()

} // afGuardRememberKeyTableMap
