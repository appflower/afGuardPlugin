<?php


/**
 * Base static class for performing query and update operations on the 'af_guard_user_permission' table.
 *
 *
 *
 * @package propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUserPermissionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'af_guard_user_permission';

    /** the related Propel class for this table */
    const OM_CLASS = 'afGuardUserPermission';

    /** the related TableMap class for this table */
    const TM_CLASS = 'afGuardUserPermissionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 2;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 2;

    /** the column name for the user_id field */
    const USER_ID = 'af_guard_user_permission.user_id';

    /** the column name for the permission_id field */
    const PERMISSION_ID = 'af_guard_user_permission.permission_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of afGuardUserPermission objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array afGuardUserPermission[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. afGuardUserPermissionPeer::$fieldNames[afGuardUserPermissionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('UserId', 'PermissionId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('userId', 'permissionId', ),
        BasePeer::TYPE_COLNAME => array (afGuardUserPermissionPeer::USER_ID, afGuardUserPermissionPeer::PERMISSION_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('USER_ID', 'PERMISSION_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('user_id', 'permission_id', ),
        BasePeer::TYPE_NUM => array (0, 1, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. afGuardUserPermissionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('UserId' => 0, 'PermissionId' => 1, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('userId' => 0, 'permissionId' => 1, ),
        BasePeer::TYPE_COLNAME => array (afGuardUserPermissionPeer::USER_ID => 0, afGuardUserPermissionPeer::PERMISSION_ID => 1, ),
        BasePeer::TYPE_RAW_COLNAME => array ('USER_ID' => 0, 'PERMISSION_ID' => 1, ),
        BasePeer::TYPE_FIELDNAME => array ('user_id' => 0, 'permission_id' => 1, ),
        BasePeer::TYPE_NUM => array (0, 1, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = afGuardUserPermissionPeer::getFieldNames($toType);
        $key = isset(afGuardUserPermissionPeer::$fieldKeys[$fromType][$name]) ? afGuardUserPermissionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(afGuardUserPermissionPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, afGuardUserPermissionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return afGuardUserPermissionPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. afGuardUserPermissionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(afGuardUserPermissionPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(afGuardUserPermissionPeer::USER_ID);
            $criteria->addSelectColumn(afGuardUserPermissionPeer::PERMISSION_ID);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.permission_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 afGuardUserPermission
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = afGuardUserPermissionPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return afGuardUserPermissionPeer::populateObjects(afGuardUserPermissionPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }


        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      afGuardUserPermission $obj A afGuardUserPermission object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getUserId(), (string) $obj->getPermissionId()));
            } // if key === null
            afGuardUserPermissionPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A afGuardUserPermission object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof afGuardUserPermission) {
                $key = serialize(array((string) $value->getUserId(), (string) $value->getPermissionId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or afGuardUserPermission object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(afGuardUserPermissionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   afGuardUserPermission Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(afGuardUserPermissionPeer::$instances[$key])) {
                return afGuardUserPermissionPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (afGuardUserPermissionPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        afGuardUserPermissionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to af_guard_user_permission
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return array((int) $row[$startcol], (int) $row[$startcol + 1]);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = afGuardUserPermissionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = afGuardUserPermissionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                afGuardUserPermissionPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (afGuardUserPermission object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = afGuardUserPermissionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = afGuardUserPermissionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            afGuardUserPermissionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related afGuardUser table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinafGuardUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related afGuardPermission table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinafGuardPermission(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of afGuardUserPermission objects pre-filled with their afGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of afGuardUserPermission objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinafGuardUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        }

        afGuardUserPermissionPeer::addSelectColumns($criteria);
        $startcol = afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;
        afGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = afGuardUserPermissionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = afGuardUserPermissionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                afGuardUserPermissionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = afGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = afGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = afGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    afGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (afGuardUserPermission) to $obj2 (afGuardUser)
                $obj2->addafGuardUserPermission($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of afGuardUserPermission objects pre-filled with their afGuardPermission objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of afGuardUserPermission objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinafGuardPermission(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        }

        afGuardUserPermissionPeer::addSelectColumns($criteria);
        $startcol = afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;
        afGuardPermissionPeer::addSelectColumns($criteria);

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = afGuardUserPermissionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = afGuardUserPermissionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                afGuardUserPermissionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = afGuardPermissionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = afGuardPermissionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = afGuardPermissionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    afGuardPermissionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (afGuardUserPermission) to $obj2 (afGuardPermission)
                $obj2->addafGuardUserPermission($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of afGuardUserPermission objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of afGuardUserPermission objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        }

        afGuardUserPermissionPeer::addSelectColumns($criteria);
        $startcol2 = afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;

        afGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + afGuardUserPeer::NUM_HYDRATE_COLUMNS;

        afGuardPermissionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + afGuardPermissionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = afGuardUserPermissionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = afGuardUserPermissionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                afGuardUserPermissionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined afGuardUser rows

            $key2 = afGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = afGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = afGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    afGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (afGuardUserPermission) to the collection in $obj2 (afGuardUser)
                $obj2->addafGuardUserPermission($obj1);
            } // if joined row not null

            // Add objects for joined afGuardPermission rows

            $key3 = afGuardPermissionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = afGuardPermissionPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = afGuardPermissionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    afGuardPermissionPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (afGuardUserPermission) to the collection in $obj3 (afGuardPermission)
                $obj3->addafGuardUserPermission($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related afGuardUser table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptafGuardUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related afGuardPermission table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptafGuardPermission(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            afGuardUserPermissionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of afGuardUserPermission objects pre-filled with all related objects except afGuardUser.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of afGuardUserPermission objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptafGuardUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        }

        afGuardUserPermissionPeer::addSelectColumns($criteria);
        $startcol2 = afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;

        afGuardPermissionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + afGuardPermissionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = afGuardUserPermissionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = afGuardUserPermissionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                afGuardUserPermissionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined afGuardPermission rows

                $key2 = afGuardPermissionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = afGuardPermissionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = afGuardPermissionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    afGuardPermissionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (afGuardUserPermission) to the collection in $obj2 (afGuardPermission)
                $obj2->addafGuardUserPermission($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of afGuardUserPermission objects pre-filled with all related objects except afGuardPermission.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of afGuardUserPermission objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptafGuardPermission(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);
        }

        afGuardUserPermissionPeer::addSelectColumns($criteria);
        $startcol2 = afGuardUserPermissionPeer::NUM_HYDRATE_COLUMNS;

        afGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + afGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID, $join_behavior);

        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseafGuardUserPermissionPeer', $criteria, $con);
        }


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = afGuardUserPermissionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = afGuardUserPermissionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = afGuardUserPermissionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                afGuardUserPermissionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined afGuardUser rows

                $key2 = afGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = afGuardUserPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = afGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    afGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (afGuardUserPermission) to the collection in $obj2 (afGuardUser)
                $obj2->addafGuardUserPermission($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(afGuardUserPermissionPeer::DATABASE_NAME)->getTable(afGuardUserPermissionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseafGuardUserPermissionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseafGuardUserPermissionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new afGuardUserPermissionTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return afGuardUserPermissionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a afGuardUserPermission or Criteria object.
     *
     * @param      mixed $values Criteria or afGuardUserPermission object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from afGuardUserPermission object
        }


        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a afGuardUserPermission or Criteria object.
     *
     * @param      mixed $values Criteria or afGuardUserPermission object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(afGuardUserPermissionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(afGuardUserPermissionPeer::USER_ID);
            $value = $criteria->remove(afGuardUserPermissionPeer::USER_ID);
            if ($value) {
                $selectCriteria->add(afGuardUserPermissionPeer::USER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(afGuardUserPermissionPeer::PERMISSION_ID);
            $value = $criteria->remove(afGuardUserPermissionPeer::PERMISSION_ID);
            if ($value) {
                $selectCriteria->add(afGuardUserPermissionPeer::PERMISSION_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(afGuardUserPermissionPeer::TABLE_NAME);
            }

        } else { // $values is afGuardUserPermission object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the af_guard_user_permission table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(afGuardUserPermissionPeer::TABLE_NAME, $con, afGuardUserPermissionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            afGuardUserPermissionPeer::clearInstancePool();
            afGuardUserPermissionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a afGuardUserPermission or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or afGuardUserPermission object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            afGuardUserPermissionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof afGuardUserPermission) { // it's a model object
            // invalidate the cache for this single object
            afGuardUserPermissionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(afGuardUserPermissionPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(afGuardUserPermissionPeer::USER_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(afGuardUserPermissionPeer::PERMISSION_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                afGuardUserPermissionPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(afGuardUserPermissionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            afGuardUserPermissionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given afGuardUserPermission object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      afGuardUserPermission $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(afGuardUserPermissionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(afGuardUserPermissionPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(afGuardUserPermissionPeer::DATABASE_NAME, afGuardUserPermissionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   int $user_id
     * @param   int $permission_id
     * @param      PropelPDO $con
     * @return   afGuardUserPermission
     */
    public static function retrieveByPK($user_id, $permission_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $user_id, (string) $permission_id));
         if (null !== ($obj = afGuardUserPermissionPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(afGuardUserPermissionPeer::DATABASE_NAME);
        $criteria->add(afGuardUserPermissionPeer::USER_ID, $user_id);
        $criteria->add(afGuardUserPermissionPeer::PERMISSION_ID, $permission_id);
        $v = afGuardUserPermissionPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
    // symfony behavior

    /**
     * Returns an array of arrays that contain columns in each unique index.
     *
     * @return array
     */
    static public function getUniqueColumnNames()
    {
      return array();
    }

    // symfony_behaviors behavior

    /**
     * Returns the name of the hook to call from inside the supplied method.
     *
     * @param string $method The calling method
     *
     * @return string A hook name for {@link sfMixer}
     *
     * @throws LogicException If the method name is not recognized
     */
    static private function getMixerPreSelectHook($method)
    {
      if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
      {
        return sprintf('BaseafGuardUserPermissionPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseafGuardUserPermissionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseafGuardUserPermissionPeer::buildTableMap();

