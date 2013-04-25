<?php


/**
 * Base class that represents a row from the 'af_guard_user' table.
 *
 *
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'afGuardUserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        afGuardUserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the algorithm field.
     * Note: this column has a database default value of: 'sha1'
     * @var        string
     */
    protected $algorithm;

    /**
     * The value for the salt field.
     * @var        string
     */
    protected $salt;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the last_login field.
     * @var        string
     */
    protected $last_login;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the is_super_admin field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_super_admin;

    /**
     * @var        PropelObjectCollection|afGuardUserPermission[] Collection to store aggregation of afGuardUserPermission objects.
     */
    protected $collafGuardUserPermissions;
    protected $collafGuardUserPermissionsPartial;

    /**
     * @var        PropelObjectCollection|afGuardUserGroup[] Collection to store aggregation of afGuardUserGroup objects.
     */
    protected $collafGuardUserGroups;
    protected $collafGuardUserGroupsPartial;

    /**
     * @var        PropelObjectCollection|afGuardRememberKey[] Collection to store aggregation of afGuardRememberKey objects.
     */
    protected $collafGuardRememberKeys;
    protected $collafGuardRememberKeysPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $afGuardUserPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $afGuardUserGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $afGuardRememberKeysScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->algorithm = 'sha1';
        $this->is_active = true;
        $this->is_super_admin = false;
    }

    /**
     * Initializes internal state of BaseafGuardUser object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [algorithm] column value.
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Get the [salt] column value.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [last_login] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = 'Y-m-d H:i:s')
    {
        if ($this->last_login === null) {
            return null;
        }

        if ($this->last_login === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_login);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Get the [is_super_admin] column value.
     *
     * @return boolean
     */
    public function getIsSuperAdmin()
    {
        return $this->is_super_admin;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = afGuardUserPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = afGuardUserPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [algorithm] column.
     *
     * @param string $v new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setAlgorithm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->algorithm !== $v) {
            $this->algorithm = $v;
            $this->modifiedColumns[] = afGuardUserPeer::ALGORITHM;
        }


        return $this;
    } // setAlgorithm()

    /**
     * Set the value of [salt] column.
     *
     * @param string $v new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setSalt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->salt !== $v) {
            $this->salt = $v;
            $this->modifiedColumns[] = afGuardUserPeer::SALT;
        }


        return $this;
    } // setSalt()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = afGuardUserPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = afGuardUserPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            $currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_login = $newDateAsString;
                $this->modifiedColumns[] = afGuardUserPeer::LAST_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setLastLogin()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = afGuardUserPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of the [is_super_admin] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setIsSuperAdmin($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_super_admin !== $v) {
            $this->is_super_admin = $v;
            $this->modifiedColumns[] = afGuardUserPeer::IS_SUPER_ADMIN;
        }


        return $this;
    } // setIsSuperAdmin()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->algorithm !== 'sha1') {
                return false;
            }

            if ($this->is_active !== true) {
                return false;
            }

            if ($this->is_super_admin !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->algorithm = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->salt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_login = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->is_active = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->is_super_admin = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = afGuardUserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating afGuardUser object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = afGuardUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collafGuardUserPermissions = null;

            $this->collafGuardUserGroups = null;

            $this->collafGuardRememberKeys = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = afGuardUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseafGuardUser:delete:pre') as $callable)
            {
              if (call_user_func($callable, $this, $con))
              {
                $con->commit();
                return;
              }
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BaseafGuardUser:delete:post') as $callable)
                {
                  call_user_func($callable, $this, $con);
                }

                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseafGuardUser:save:pre') as $callable)
            {
              if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
              {
                  $con->commit();
                return $affectedRows;
              }
            }

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // symfony_timestampable behavior
                if (!$this->isColumnModified(afGuardUserPeer::CREATED_AT))
                {
                  $this->setCreatedAt(time());
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BaseafGuardUser:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                afGuardUserPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->afGuardUserPermissionsScheduledForDeletion !== null) {
                if (!$this->afGuardUserPermissionsScheduledForDeletion->isEmpty()) {
                    afGuardUserPermissionQuery::create()
                        ->filterByPrimaryKeys($this->afGuardUserPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->afGuardUserPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collafGuardUserPermissions !== null) {
                foreach ($this->collafGuardUserPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->afGuardUserGroupsScheduledForDeletion !== null) {
                if (!$this->afGuardUserGroupsScheduledForDeletion->isEmpty()) {
                    afGuardUserGroupQuery::create()
                        ->filterByPrimaryKeys($this->afGuardUserGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->afGuardUserGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collafGuardUserGroups !== null) {
                foreach ($this->collafGuardUserGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->afGuardRememberKeysScheduledForDeletion !== null) {
                if (!$this->afGuardRememberKeysScheduledForDeletion->isEmpty()) {
                    afGuardRememberKeyQuery::create()
                        ->filterByPrimaryKeys($this->afGuardRememberKeysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->afGuardRememberKeysScheduledForDeletion = null;
                }
            }

            if ($this->collafGuardRememberKeys !== null) {
                foreach ($this->collafGuardRememberKeys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = afGuardUserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . afGuardUserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(afGuardUserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(afGuardUserPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(afGuardUserPeer::ALGORITHM)) {
            $modifiedColumns[':p' . $index++]  = '`algorithm`';
        }
        if ($this->isColumnModified(afGuardUserPeer::SALT)) {
            $modifiedColumns[':p' . $index++]  = '`salt`';
        }
        if ($this->isColumnModified(afGuardUserPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(afGuardUserPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(afGuardUserPeer::LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`last_login`';
        }
        if ($this->isColumnModified(afGuardUserPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(afGuardUserPeer::IS_SUPER_ADMIN)) {
            $modifiedColumns[':p' . $index++]  = '`is_super_admin`';
        }

        $sql = sprintf(
            'INSERT INTO `af_guard_user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`username`':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`algorithm`':
                        $stmt->bindValue($identifier, $this->algorithm, PDO::PARAM_STR);
                        break;
                    case '`salt`':
                        $stmt->bindValue($identifier, $this->salt, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`last_login`':
                        $stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`is_super_admin`':
                        $stmt->bindValue($identifier, (int) $this->is_super_admin, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = afGuardUserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collafGuardUserPermissions !== null) {
                    foreach ($this->collafGuardUserPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collafGuardUserGroups !== null) {
                    foreach ($this->collafGuardUserGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collafGuardRememberKeys !== null) {
                    foreach ($this->collafGuardRememberKeys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = afGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getUsername();
                break;
            case 2:
                return $this->getAlgorithm();
                break;
            case 3:
                return $this->getSalt();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getCreatedAt();
                break;
            case 6:
                return $this->getLastLogin();
                break;
            case 7:
                return $this->getIsActive();
                break;
            case 8:
                return $this->getIsSuperAdmin();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['afGuardUser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['afGuardUser'][$this->getPrimaryKey()] = true;
        $keys = afGuardUserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getAlgorithm(),
            $keys[3] => $this->getSalt(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getLastLogin(),
            $keys[7] => $this->getIsActive(),
            $keys[8] => $this->getIsSuperAdmin(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collafGuardUserPermissions) {
                $result['afGuardUserPermissions'] = $this->collafGuardUserPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collafGuardUserGroups) {
                $result['afGuardUserGroups'] = $this->collafGuardUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collafGuardRememberKeys) {
                $result['afGuardRememberKeys'] = $this->collafGuardRememberKeys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = afGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setUsername($value);
                break;
            case 2:
                $this->setAlgorithm($value);
                break;
            case 3:
                $this->setSalt($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setCreatedAt($value);
                break;
            case 6:
                $this->setLastLogin($value);
                break;
            case 7:
                $this->setIsActive($value);
                break;
            case 8:
                $this->setIsSuperAdmin($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = afGuardUserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(afGuardUserPeer::DATABASE_NAME);

        if ($this->isColumnModified(afGuardUserPeer::ID)) $criteria->add(afGuardUserPeer::ID, $this->id);
        if ($this->isColumnModified(afGuardUserPeer::USERNAME)) $criteria->add(afGuardUserPeer::USERNAME, $this->username);
        if ($this->isColumnModified(afGuardUserPeer::ALGORITHM)) $criteria->add(afGuardUserPeer::ALGORITHM, $this->algorithm);
        if ($this->isColumnModified(afGuardUserPeer::SALT)) $criteria->add(afGuardUserPeer::SALT, $this->salt);
        if ($this->isColumnModified(afGuardUserPeer::PASSWORD)) $criteria->add(afGuardUserPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(afGuardUserPeer::CREATED_AT)) $criteria->add(afGuardUserPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(afGuardUserPeer::LAST_LOGIN)) $criteria->add(afGuardUserPeer::LAST_LOGIN, $this->last_login);
        if ($this->isColumnModified(afGuardUserPeer::IS_ACTIVE)) $criteria->add(afGuardUserPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(afGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(afGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(afGuardUserPeer::DATABASE_NAME);
        $criteria->add(afGuardUserPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of afGuardUser (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setAlgorithm($this->getAlgorithm());
        $copyObj->setSalt($this->getSalt());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setLastLogin($this->getLastLogin());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setIsSuperAdmin($this->getIsSuperAdmin());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getafGuardUserPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addafGuardUserPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getafGuardUserGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addafGuardUserGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getafGuardRememberKeys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addafGuardRememberKey($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return afGuardUser Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return afGuardUserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new afGuardUserPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('afGuardUserPermission' == $relationName) {
            $this->initafGuardUserPermissions();
        }
        if ('afGuardUserGroup' == $relationName) {
            $this->initafGuardUserGroups();
        }
        if ('afGuardRememberKey' == $relationName) {
            $this->initafGuardRememberKeys();
        }
    }

    /**
     * Clears out the collafGuardUserPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return afGuardUser The current object (for fluent API support)
     * @see        addafGuardUserPermissions()
     */
    public function clearafGuardUserPermissions()
    {
        $this->collafGuardUserPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collafGuardUserPermissionsPartial = null;

        return $this;
    }

    /**
     * reset is the collafGuardUserPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialafGuardUserPermissions($v = true)
    {
        $this->collafGuardUserPermissionsPartial = $v;
    }

    /**
     * Initializes the collafGuardUserPermissions collection.
     *
     * By default this just sets the collafGuardUserPermissions collection to an empty array (like clearcollafGuardUserPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initafGuardUserPermissions($overrideExisting = true)
    {
        if (null !== $this->collafGuardUserPermissions && !$overrideExisting) {
            return;
        }
        $this->collafGuardUserPermissions = new PropelObjectCollection();
        $this->collafGuardUserPermissions->setModel('afGuardUserPermission');
    }

    /**
     * Gets an array of afGuardUserPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this afGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|afGuardUserPermission[] List of afGuardUserPermission objects
     * @throws PropelException
     */
    public function getafGuardUserPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collafGuardUserPermissionsPartial && !$this->isNew();
        if (null === $this->collafGuardUserPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collafGuardUserPermissions) {
                // return empty collection
                $this->initafGuardUserPermissions();
            } else {
                $collafGuardUserPermissions = afGuardUserPermissionQuery::create(null, $criteria)
                    ->filterByafGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collafGuardUserPermissionsPartial && count($collafGuardUserPermissions)) {
                      $this->initafGuardUserPermissions(false);

                      foreach($collafGuardUserPermissions as $obj) {
                        if (false == $this->collafGuardUserPermissions->contains($obj)) {
                          $this->collafGuardUserPermissions->append($obj);
                        }
                      }

                      $this->collafGuardUserPermissionsPartial = true;
                    }

                    $collafGuardUserPermissions->getInternalIterator()->rewind();
                    return $collafGuardUserPermissions;
                }

                if($partial && $this->collafGuardUserPermissions) {
                    foreach($this->collafGuardUserPermissions as $obj) {
                        if($obj->isNew()) {
                            $collafGuardUserPermissions[] = $obj;
                        }
                    }
                }

                $this->collafGuardUserPermissions = $collafGuardUserPermissions;
                $this->collafGuardUserPermissionsPartial = false;
            }
        }

        return $this->collafGuardUserPermissions;
    }

    /**
     * Sets a collection of afGuardUserPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $afGuardUserPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setafGuardUserPermissions(PropelCollection $afGuardUserPermissions, PropelPDO $con = null)
    {
        $afGuardUserPermissionsToDelete = $this->getafGuardUserPermissions(new Criteria(), $con)->diff($afGuardUserPermissions);

        $this->afGuardUserPermissionsScheduledForDeletion = unserialize(serialize($afGuardUserPermissionsToDelete));

        foreach ($afGuardUserPermissionsToDelete as $afGuardUserPermissionRemoved) {
            $afGuardUserPermissionRemoved->setafGuardUser(null);
        }

        $this->collafGuardUserPermissions = null;
        foreach ($afGuardUserPermissions as $afGuardUserPermission) {
            $this->addafGuardUserPermission($afGuardUserPermission);
        }

        $this->collafGuardUserPermissions = $afGuardUserPermissions;
        $this->collafGuardUserPermissionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related afGuardUserPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related afGuardUserPermission objects.
     * @throws PropelException
     */
    public function countafGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collafGuardUserPermissionsPartial && !$this->isNew();
        if (null === $this->collafGuardUserPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collafGuardUserPermissions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getafGuardUserPermissions());
            }
            $query = afGuardUserPermissionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByafGuardUser($this)
                ->count($con);
        }

        return count($this->collafGuardUserPermissions);
    }

    /**
     * Method called to associate a afGuardUserPermission object to this object
     * through the afGuardUserPermission foreign key attribute.
     *
     * @param    afGuardUserPermission $l afGuardUserPermission
     * @return afGuardUser The current object (for fluent API support)
     */
    public function addafGuardUserPermission(afGuardUserPermission $l)
    {
        if ($this->collafGuardUserPermissions === null) {
            $this->initafGuardUserPermissions();
            $this->collafGuardUserPermissionsPartial = true;
        }
        if (!in_array($l, $this->collafGuardUserPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddafGuardUserPermission($l);
        }

        return $this;
    }

    /**
     * @param	afGuardUserPermission $afGuardUserPermission The afGuardUserPermission object to add.
     */
    protected function doAddafGuardUserPermission($afGuardUserPermission)
    {
        $this->collafGuardUserPermissions[]= $afGuardUserPermission;
        $afGuardUserPermission->setafGuardUser($this);
    }

    /**
     * @param	afGuardUserPermission $afGuardUserPermission The afGuardUserPermission object to remove.
     * @return afGuardUser The current object (for fluent API support)
     */
    public function removeafGuardUserPermission($afGuardUserPermission)
    {
        if ($this->getafGuardUserPermissions()->contains($afGuardUserPermission)) {
            $this->collafGuardUserPermissions->remove($this->collafGuardUserPermissions->search($afGuardUserPermission));
            if (null === $this->afGuardUserPermissionsScheduledForDeletion) {
                $this->afGuardUserPermissionsScheduledForDeletion = clone $this->collafGuardUserPermissions;
                $this->afGuardUserPermissionsScheduledForDeletion->clear();
            }
            $this->afGuardUserPermissionsScheduledForDeletion[]= clone $afGuardUserPermission;
            $afGuardUserPermission->setafGuardUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this afGuardUser is new, it will return
     * an empty collection; or if this afGuardUser has previously
     * been saved, it will retrieve related afGuardUserPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in afGuardUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|afGuardUserPermission[] List of afGuardUserPermission objects
     */
    public function getafGuardUserPermissionsJoinafGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = afGuardUserPermissionQuery::create(null, $criteria);
        $query->joinWith('afGuardPermission', $join_behavior);

        return $this->getafGuardUserPermissions($query, $con);
    }

    /**
     * Clears out the collafGuardUserGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return afGuardUser The current object (for fluent API support)
     * @see        addafGuardUserGroups()
     */
    public function clearafGuardUserGroups()
    {
        $this->collafGuardUserGroups = null; // important to set this to null since that means it is uninitialized
        $this->collafGuardUserGroupsPartial = null;

        return $this;
    }

    /**
     * reset is the collafGuardUserGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialafGuardUserGroups($v = true)
    {
        $this->collafGuardUserGroupsPartial = $v;
    }

    /**
     * Initializes the collafGuardUserGroups collection.
     *
     * By default this just sets the collafGuardUserGroups collection to an empty array (like clearcollafGuardUserGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initafGuardUserGroups($overrideExisting = true)
    {
        if (null !== $this->collafGuardUserGroups && !$overrideExisting) {
            return;
        }
        $this->collafGuardUserGroups = new PropelObjectCollection();
        $this->collafGuardUserGroups->setModel('afGuardUserGroup');
    }

    /**
     * Gets an array of afGuardUserGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this afGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|afGuardUserGroup[] List of afGuardUserGroup objects
     * @throws PropelException
     */
    public function getafGuardUserGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collafGuardUserGroupsPartial && !$this->isNew();
        if (null === $this->collafGuardUserGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collafGuardUserGroups) {
                // return empty collection
                $this->initafGuardUserGroups();
            } else {
                $collafGuardUserGroups = afGuardUserGroupQuery::create(null, $criteria)
                    ->filterByafGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collafGuardUserGroupsPartial && count($collafGuardUserGroups)) {
                      $this->initafGuardUserGroups(false);

                      foreach($collafGuardUserGroups as $obj) {
                        if (false == $this->collafGuardUserGroups->contains($obj)) {
                          $this->collafGuardUserGroups->append($obj);
                        }
                      }

                      $this->collafGuardUserGroupsPartial = true;
                    }

                    $collafGuardUserGroups->getInternalIterator()->rewind();
                    return $collafGuardUserGroups;
                }

                if($partial && $this->collafGuardUserGroups) {
                    foreach($this->collafGuardUserGroups as $obj) {
                        if($obj->isNew()) {
                            $collafGuardUserGroups[] = $obj;
                        }
                    }
                }

                $this->collafGuardUserGroups = $collafGuardUserGroups;
                $this->collafGuardUserGroupsPartial = false;
            }
        }

        return $this->collafGuardUserGroups;
    }

    /**
     * Sets a collection of afGuardUserGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $afGuardUserGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setafGuardUserGroups(PropelCollection $afGuardUserGroups, PropelPDO $con = null)
    {
        $afGuardUserGroupsToDelete = $this->getafGuardUserGroups(new Criteria(), $con)->diff($afGuardUserGroups);

        $this->afGuardUserGroupsScheduledForDeletion = unserialize(serialize($afGuardUserGroupsToDelete));

        foreach ($afGuardUserGroupsToDelete as $afGuardUserGroupRemoved) {
            $afGuardUserGroupRemoved->setafGuardUser(null);
        }

        $this->collafGuardUserGroups = null;
        foreach ($afGuardUserGroups as $afGuardUserGroup) {
            $this->addafGuardUserGroup($afGuardUserGroup);
        }

        $this->collafGuardUserGroups = $afGuardUserGroups;
        $this->collafGuardUserGroupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related afGuardUserGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related afGuardUserGroup objects.
     * @throws PropelException
     */
    public function countafGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collafGuardUserGroupsPartial && !$this->isNew();
        if (null === $this->collafGuardUserGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collafGuardUserGroups) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getafGuardUserGroups());
            }
            $query = afGuardUserGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByafGuardUser($this)
                ->count($con);
        }

        return count($this->collafGuardUserGroups);
    }

    /**
     * Method called to associate a afGuardUserGroup object to this object
     * through the afGuardUserGroup foreign key attribute.
     *
     * @param    afGuardUserGroup $l afGuardUserGroup
     * @return afGuardUser The current object (for fluent API support)
     */
    public function addafGuardUserGroup(afGuardUserGroup $l)
    {
        if ($this->collafGuardUserGroups === null) {
            $this->initafGuardUserGroups();
            $this->collafGuardUserGroupsPartial = true;
        }
        if (!in_array($l, $this->collafGuardUserGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddafGuardUserGroup($l);
        }

        return $this;
    }

    /**
     * @param	afGuardUserGroup $afGuardUserGroup The afGuardUserGroup object to add.
     */
    protected function doAddafGuardUserGroup($afGuardUserGroup)
    {
        $this->collafGuardUserGroups[]= $afGuardUserGroup;
        $afGuardUserGroup->setafGuardUser($this);
    }

    /**
     * @param	afGuardUserGroup $afGuardUserGroup The afGuardUserGroup object to remove.
     * @return afGuardUser The current object (for fluent API support)
     */
    public function removeafGuardUserGroup($afGuardUserGroup)
    {
        if ($this->getafGuardUserGroups()->contains($afGuardUserGroup)) {
            $this->collafGuardUserGroups->remove($this->collafGuardUserGroups->search($afGuardUserGroup));
            if (null === $this->afGuardUserGroupsScheduledForDeletion) {
                $this->afGuardUserGroupsScheduledForDeletion = clone $this->collafGuardUserGroups;
                $this->afGuardUserGroupsScheduledForDeletion->clear();
            }
            $this->afGuardUserGroupsScheduledForDeletion[]= clone $afGuardUserGroup;
            $afGuardUserGroup->setafGuardUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this afGuardUser is new, it will return
     * an empty collection; or if this afGuardUser has previously
     * been saved, it will retrieve related afGuardUserGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in afGuardUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|afGuardUserGroup[] List of afGuardUserGroup objects
     */
    public function getafGuardUserGroupsJoinafGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = afGuardUserGroupQuery::create(null, $criteria);
        $query->joinWith('afGuardGroup', $join_behavior);

        return $this->getafGuardUserGroups($query, $con);
    }

    /**
     * Clears out the collafGuardRememberKeys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return afGuardUser The current object (for fluent API support)
     * @see        addafGuardRememberKeys()
     */
    public function clearafGuardRememberKeys()
    {
        $this->collafGuardRememberKeys = null; // important to set this to null since that means it is uninitialized
        $this->collafGuardRememberKeysPartial = null;

        return $this;
    }

    /**
     * reset is the collafGuardRememberKeys collection loaded partially
     *
     * @return void
     */
    public function resetPartialafGuardRememberKeys($v = true)
    {
        $this->collafGuardRememberKeysPartial = $v;
    }

    /**
     * Initializes the collafGuardRememberKeys collection.
     *
     * By default this just sets the collafGuardRememberKeys collection to an empty array (like clearcollafGuardRememberKeys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initafGuardRememberKeys($overrideExisting = true)
    {
        if (null !== $this->collafGuardRememberKeys && !$overrideExisting) {
            return;
        }
        $this->collafGuardRememberKeys = new PropelObjectCollection();
        $this->collafGuardRememberKeys->setModel('afGuardRememberKey');
    }

    /**
     * Gets an array of afGuardRememberKey objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this afGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|afGuardRememberKey[] List of afGuardRememberKey objects
     * @throws PropelException
     */
    public function getafGuardRememberKeys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collafGuardRememberKeysPartial && !$this->isNew();
        if (null === $this->collafGuardRememberKeys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collafGuardRememberKeys) {
                // return empty collection
                $this->initafGuardRememberKeys();
            } else {
                $collafGuardRememberKeys = afGuardRememberKeyQuery::create(null, $criteria)
                    ->filterByafGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collafGuardRememberKeysPartial && count($collafGuardRememberKeys)) {
                      $this->initafGuardRememberKeys(false);

                      foreach($collafGuardRememberKeys as $obj) {
                        if (false == $this->collafGuardRememberKeys->contains($obj)) {
                          $this->collafGuardRememberKeys->append($obj);
                        }
                      }

                      $this->collafGuardRememberKeysPartial = true;
                    }

                    $collafGuardRememberKeys->getInternalIterator()->rewind();
                    return $collafGuardRememberKeys;
                }

                if($partial && $this->collafGuardRememberKeys) {
                    foreach($this->collafGuardRememberKeys as $obj) {
                        if($obj->isNew()) {
                            $collafGuardRememberKeys[] = $obj;
                        }
                    }
                }

                $this->collafGuardRememberKeys = $collafGuardRememberKeys;
                $this->collafGuardRememberKeysPartial = false;
            }
        }

        return $this->collafGuardRememberKeys;
    }

    /**
     * Sets a collection of afGuardRememberKey objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $afGuardRememberKeys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return afGuardUser The current object (for fluent API support)
     */
    public function setafGuardRememberKeys(PropelCollection $afGuardRememberKeys, PropelPDO $con = null)
    {
        $afGuardRememberKeysToDelete = $this->getafGuardRememberKeys(new Criteria(), $con)->diff($afGuardRememberKeys);

        $this->afGuardRememberKeysScheduledForDeletion = unserialize(serialize($afGuardRememberKeysToDelete));

        foreach ($afGuardRememberKeysToDelete as $afGuardRememberKeyRemoved) {
            $afGuardRememberKeyRemoved->setafGuardUser(null);
        }

        $this->collafGuardRememberKeys = null;
        foreach ($afGuardRememberKeys as $afGuardRememberKey) {
            $this->addafGuardRememberKey($afGuardRememberKey);
        }

        $this->collafGuardRememberKeys = $afGuardRememberKeys;
        $this->collafGuardRememberKeysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related afGuardRememberKey objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related afGuardRememberKey objects.
     * @throws PropelException
     */
    public function countafGuardRememberKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collafGuardRememberKeysPartial && !$this->isNew();
        if (null === $this->collafGuardRememberKeys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collafGuardRememberKeys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getafGuardRememberKeys());
            }
            $query = afGuardRememberKeyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByafGuardUser($this)
                ->count($con);
        }

        return count($this->collafGuardRememberKeys);
    }

    /**
     * Method called to associate a afGuardRememberKey object to this object
     * through the afGuardRememberKey foreign key attribute.
     *
     * @param    afGuardRememberKey $l afGuardRememberKey
     * @return afGuardUser The current object (for fluent API support)
     */
    public function addafGuardRememberKey(afGuardRememberKey $l)
    {
        if ($this->collafGuardRememberKeys === null) {
            $this->initafGuardRememberKeys();
            $this->collafGuardRememberKeysPartial = true;
        }
        if (!in_array($l, $this->collafGuardRememberKeys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddafGuardRememberKey($l);
        }

        return $this;
    }

    /**
     * @param	afGuardRememberKey $afGuardRememberKey The afGuardRememberKey object to add.
     */
    protected function doAddafGuardRememberKey($afGuardRememberKey)
    {
        $this->collafGuardRememberKeys[]= $afGuardRememberKey;
        $afGuardRememberKey->setafGuardUser($this);
    }

    /**
     * @param	afGuardRememberKey $afGuardRememberKey The afGuardRememberKey object to remove.
     * @return afGuardUser The current object (for fluent API support)
     */
    public function removeafGuardRememberKey($afGuardRememberKey)
    {
        if ($this->getafGuardRememberKeys()->contains($afGuardRememberKey)) {
            $this->collafGuardRememberKeys->remove($this->collafGuardRememberKeys->search($afGuardRememberKey));
            if (null === $this->afGuardRememberKeysScheduledForDeletion) {
                $this->afGuardRememberKeysScheduledForDeletion = clone $this->collafGuardRememberKeys;
                $this->afGuardRememberKeysScheduledForDeletion->clear();
            }
            $this->afGuardRememberKeysScheduledForDeletion[]= clone $afGuardRememberKey;
            $afGuardRememberKey->setafGuardUser(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->username = null;
        $this->algorithm = null;
        $this->salt = null;
        $this->password = null;
        $this->created_at = null;
        $this->last_login = null;
        $this->is_active = null;
        $this->is_super_admin = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collafGuardUserPermissions) {
                foreach ($this->collafGuardUserPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collafGuardUserGroups) {
                foreach ($this->collafGuardUserGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collafGuardRememberKeys) {
                foreach ($this->collafGuardRememberKeys as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collafGuardUserPermissions instanceof PropelCollection) {
            $this->collafGuardUserPermissions->clearIterator();
        }
        $this->collafGuardUserPermissions = null;
        if ($this->collafGuardUserGroups instanceof PropelCollection) {
            $this->collafGuardUserGroups->clearIterator();
        }
        $this->collafGuardUserGroups = null;
        if ($this->collafGuardRememberKeys instanceof PropelCollection) {
            $this->collafGuardRememberKeys->clearIterator();
        }
        $this->collafGuardRememberKeys = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(afGuardUserPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {

        // symfony_behaviors behavior
        if ($callable = sfMixer::getCallable('BaseafGuardUser:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
