<?php


/**
 * Base class that represents a row from the 'af_guard_user' table.
 *
 * 
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUser extends BaseObject  implements Persistent
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
	 * @var        array afGuardUserPermission[] Collection to store aggregation of afGuardUserPermission objects.
	 */
	protected $collafGuardUserPermissions;

	/**
	 * @var        array afGuardUserGroup[] Collection to store aggregation of afGuardUserGroup objects.
	 */
	protected $collafGuardUserGroups;

	/**
	 * @var        array afGuardRememberKey[] Collection to store aggregation of afGuardRememberKey objects.
	 */
	protected $collafGuardRememberKeys;

	/**
	 * @var        array Component[] Collection to store aggregation of Component objects.
	 */
	protected $collComponents;

	/**
	 * @var        UserProfile one-to-one related UserProfile object
	 */
	protected $singleUserProfile;

	/**
	 * @var        array Ticket[] Collection to store aggregation of Ticket objects.
	 */
	protected $collTicketsRelatedByUserId;

	/**
	 * @var        array Ticket[] Collection to store aggregation of Ticket objects.
	 */
	protected $collTicketsRelatedByOwnerId;

	/**
	 * @var        array TicketComment[] Collection to store aggregation of TicketComment objects.
	 */
	protected $collTicketComments;

	/**
	 * @var        array Changelog[] Collection to store aggregation of Changelog objects.
	 */
	protected $collChangelogs;

	/**
	 * @var        array ProjectUser[] Collection to store aggregation of ProjectUser objects.
	 */
	protected $collProjectUsers;

	/**
	 * @var        array Timetrack[] Collection to store aggregation of Timetrack objects.
	 */
	protected $collTimetracks;

	/**
	 * @var        array FilterHistory[] Collection to store aggregation of FilterHistory objects.
	 */
	protected $collFilterHistorys;

	/**
	 * @var        array ProjectPermission[] Collection to store aggregation of ProjectPermission objects.
	 */
	protected $collProjectPermissions;

	/**
	 * @var        array FavoriteTicket[] Collection to store aggregation of FavoriteTicket objects.
	 */
	protected $collFavoriteTickets;

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
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [algorithm] column value.
	 * 
	 * @return     string
	 */
	public function getAlgorithm()
	{
		return $this->algorithm;
	}

	/**
	 * Get the [salt] column value.
	 * 
	 * @return     string
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [last_login] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{
		if ($this->last_login === null) {
			return null;
		}


		if ($this->last_login === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_login);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [is_active] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsActive()
	{
		return $this->is_active;
	}

	/**
	 * Get the [is_super_admin] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsSuperAdmin()
	{
		return $this->is_super_admin;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
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
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
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
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setAlgorithm($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->algorithm !== $v || $this->isNew()) {
			$this->algorithm = $v;
			$this->modifiedColumns[] = afGuardUserPeer::ALGORITHM;
		}

		return $this;
	} // setAlgorithm()

	/**
	 * Set the value of [salt] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setSalt($v)
	{
		if ($v !== null) {
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
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
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
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = afGuardUserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [last_login] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setLastLogin($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->last_login !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->last_login = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = afGuardUserPeer::LAST_LOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastLogin()

	/**
	 * Set the value of [is_active] column.
	 * 
	 * @param      boolean $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setIsActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_active !== $v || $this->isNew()) {
			$this->is_active = $v;
			$this->modifiedColumns[] = afGuardUserPeer::IS_ACTIVE;
		}

		return $this;
	} // setIsActive()

	/**
	 * Set the value of [is_super_admin] column.
	 * 
	 * @param      boolean $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setIsSuperAdmin($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_super_admin !== $v || $this->isNew()) {
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
	 * @return     boolean Whether the columns in this object are only been set with default values.
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

		// otherwise, everything was equal, so return TRUE
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
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
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

			return $startcol + 9; // 9 = afGuardUserPeer::NUM_COLUMNS - afGuardUserPeer::NUM_LAZY_LOAD_COLUMNS).

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
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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

			$this->collComponents = null;

			$this->singleUserProfile = null;

			$this->collTicketsRelatedByUserId = null;

			$this->collTicketsRelatedByOwnerId = null;

			$this->collTicketComments = null;

			$this->collChangelogs = null;

			$this->collProjectUsers = null;

			$this->collTimetracks = null;

			$this->collFilterHistorys = null;

			$this->collProjectPermissions = null;

			$this->collFavoriteTickets = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
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
				afGuardUserQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
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
		} catch (PropelException $e) {
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
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
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

			// symfony_timestampable behavior
			
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
		} catch (PropelException $e) {
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
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = afGuardUserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(afGuardUserPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.afGuardUserPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = afGuardUserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collafGuardUserPermissions !== null) {
				foreach ($this->collafGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collafGuardUserGroups !== null) {
				foreach ($this->collafGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collafGuardRememberKeys !== null) {
				foreach ($this->collafGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collComponents !== null) {
				foreach ($this->collComponents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->singleUserProfile !== null) {
				if (!$this->singleUserProfile->isDeleted()) {
						$affectedRows += $this->singleUserProfile->save($con);
				}
			}

			if ($this->collTicketsRelatedByUserId !== null) {
				foreach ($this->collTicketsRelatedByUserId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTicketsRelatedByOwnerId !== null) {
				foreach ($this->collTicketsRelatedByOwnerId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTicketComments !== null) {
				foreach ($this->collTicketComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collChangelogs !== null) {
				foreach ($this->collChangelogs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectUsers !== null) {
				foreach ($this->collProjectUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTimetracks !== null) {
				foreach ($this->collTimetracks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFilterHistorys !== null) {
				foreach ($this->collFilterHistorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectPermissions !== null) {
				foreach ($this->collProjectPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFavoriteTickets !== null) {
				foreach ($this->collFavoriteTickets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
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
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
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

				if ($this->collComponents !== null) {
					foreach ($this->collComponents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->singleUserProfile !== null) {
					if (!$this->singleUserProfile->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleUserProfile->getValidationFailures());
					}
				}

				if ($this->collTicketsRelatedByUserId !== null) {
					foreach ($this->collTicketsRelatedByUserId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTicketsRelatedByOwnerId !== null) {
					foreach ($this->collTicketsRelatedByOwnerId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTicketComments !== null) {
					foreach ($this->collTicketComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collChangelogs !== null) {
					foreach ($this->collChangelogs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectUsers !== null) {
					foreach ($this->collProjectUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTimetracks !== null) {
					foreach ($this->collTimetracks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFilterHistorys !== null) {
					foreach ($this->collFilterHistorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectPermissions !== null) {
					foreach ($this->collProjectPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFavoriteTickets !== null) {
					foreach ($this->collFavoriteTickets as $referrerFK) {
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
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
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
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
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
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
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
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = afGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
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
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
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
	 * @return     Criteria The Criteria object containing all modified values.
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
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(afGuardUserPeer::DATABASE_NAME);
		$criteria->add(afGuardUserPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
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
	 * @param      object $copyObj An object of afGuardUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setUsername($this->username);
		$copyObj->setAlgorithm($this->algorithm);
		$copyObj->setSalt($this->salt);
		$copyObj->setPassword($this->password);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setLastLogin($this->last_login);
		$copyObj->setIsActive($this->is_active);
		$copyObj->setIsSuperAdmin($this->is_super_admin);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

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

			foreach ($this->getComponents() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComponent($relObj->copy($deepCopy));
				}
			}

			$relObj = $this->getUserProfile();
			if ($relObj) {
				$copyObj->setUserProfile($relObj->copy($deepCopy));
			}

			foreach ($this->getTicketsRelatedByUserId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTicketRelatedByUserId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTicketsRelatedByOwnerId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTicketRelatedByOwnerId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTicketComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTicketComment($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getChangelogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addChangelog($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProjectUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProjectUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTimetracks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTimetrack($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getFilterHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFilterHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProjectPermissions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProjectPermission($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getFavoriteTickets() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFavoriteTicket($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     afGuardUser Clone of current object.
	 * @throws     PropelException
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
	 * @return     afGuardUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new afGuardUserPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collafGuardUserPermissions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addafGuardUserPermissions()
	 */
	public function clearafGuardUserPermissions()
	{
		$this->collafGuardUserPermissions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardUserPermissions collection.
	 *
	 * By default this just sets the collafGuardUserPermissions collection to an empty array (like clearcollafGuardUserPermissions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initafGuardUserPermissions()
	{
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
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardUserPermission[] List of afGuardUserPermission objects
	 * @throws     PropelException
	 */
	public function getafGuardUserPermissions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserPermissions) {
				// return empty collection
				$this->initafGuardUserPermissions();
			} else {
				$collafGuardUserPermissions = afGuardUserPermissionQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardUserPermissions;
				}
				$this->collafGuardUserPermissions = $collafGuardUserPermissions;
			}
		}
		return $this->collafGuardUserPermissions;
	}

	/**
	 * Returns the number of related afGuardUserPermission objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardUserPermission objects.
	 * @throws     PropelException
	 */
	public function countafGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserPermissions) {
				return 0;
			} else {
				$query = afGuardUserPermissionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardUserPermissions);
		}
	}

	/**
	 * Method called to associate a afGuardUserPermission object to this object
	 * through the afGuardUserPermission foreign key attribute.
	 *
	 * @param      afGuardUserPermission $l afGuardUserPermission
	 * @return     void
	 * @throws     PropelException
	 */
	public function addafGuardUserPermission(afGuardUserPermission $l)
	{
		if ($this->collafGuardUserPermissions === null) {
			$this->initafGuardUserPermissions();
		}
		if (!$this->collafGuardUserPermissions->contains($l)) { // only add it if the **same** object is not already associated
			$this->collafGuardUserPermissions[]= $l;
			$l->setafGuardUser($this);
		}
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
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array afGuardUserPermission[] List of afGuardUserPermission objects
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
	 * @return     void
	 * @see        addafGuardUserGroups()
	 */
	public function clearafGuardUserGroups()
	{
		$this->collafGuardUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardUserGroups collection.
	 *
	 * By default this just sets the collafGuardUserGroups collection to an empty array (like clearcollafGuardUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initafGuardUserGroups()
	{
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
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardUserGroup[] List of afGuardUserGroup objects
	 * @throws     PropelException
	 */
	public function getafGuardUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserGroups) {
				// return empty collection
				$this->initafGuardUserGroups();
			} else {
				$collafGuardUserGroups = afGuardUserGroupQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardUserGroups;
				}
				$this->collafGuardUserGroups = $collafGuardUserGroups;
			}
		}
		return $this->collafGuardUserGroups;
	}

	/**
	 * Returns the number of related afGuardUserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardUserGroup objects.
	 * @throws     PropelException
	 */
	public function countafGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserGroups) {
				return 0;
			} else {
				$query = afGuardUserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardUserGroups);
		}
	}

	/**
	 * Method called to associate a afGuardUserGroup object to this object
	 * through the afGuardUserGroup foreign key attribute.
	 *
	 * @param      afGuardUserGroup $l afGuardUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addafGuardUserGroup(afGuardUserGroup $l)
	{
		if ($this->collafGuardUserGroups === null) {
			$this->initafGuardUserGroups();
		}
		if (!$this->collafGuardUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collafGuardUserGroups[]= $l;
			$l->setafGuardUser($this);
		}
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
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array afGuardUserGroup[] List of afGuardUserGroup objects
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
	 * @return     void
	 * @see        addafGuardRememberKeys()
	 */
	public function clearafGuardRememberKeys()
	{
		$this->collafGuardRememberKeys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardRememberKeys collection.
	 *
	 * By default this just sets the collafGuardRememberKeys collection to an empty array (like clearcollafGuardRememberKeys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initafGuardRememberKeys()
	{
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
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardRememberKey[] List of afGuardRememberKey objects
	 * @throws     PropelException
	 */
	public function getafGuardRememberKeys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardRememberKeys) {
				// return empty collection
				$this->initafGuardRememberKeys();
			} else {
				$collafGuardRememberKeys = afGuardRememberKeyQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardRememberKeys;
				}
				$this->collafGuardRememberKeys = $collafGuardRememberKeys;
			}
		}
		return $this->collafGuardRememberKeys;
	}

	/**
	 * Returns the number of related afGuardRememberKey objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardRememberKey objects.
	 * @throws     PropelException
	 */
	public function countafGuardRememberKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardRememberKeys) {
				return 0;
			} else {
				$query = afGuardRememberKeyQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardRememberKeys);
		}
	}

	/**
	 * Method called to associate a afGuardRememberKey object to this object
	 * through the afGuardRememberKey foreign key attribute.
	 *
	 * @param      afGuardRememberKey $l afGuardRememberKey
	 * @return     void
	 * @throws     PropelException
	 */
	public function addafGuardRememberKey(afGuardRememberKey $l)
	{
		if ($this->collafGuardRememberKeys === null) {
			$this->initafGuardRememberKeys();
		}
		if (!$this->collafGuardRememberKeys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collafGuardRememberKeys[]= $l;
			$l->setafGuardUser($this);
		}
	}

	/**
	 * Clears out the collComponents collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComponents()
	 */
	public function clearComponents()
	{
		$this->collComponents = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComponents collection.
	 *
	 * By default this just sets the collComponents collection to an empty array (like clearcollComponents());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initComponents()
	{
		$this->collComponents = new PropelObjectCollection();
		$this->collComponents->setModel('Component');
	}

	/**
	 * Gets an array of Component objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Component[] List of Component objects
	 * @throws     PropelException
	 */
	public function getComponents($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComponents || null !== $criteria) {
			if ($this->isNew() && null === $this->collComponents) {
				// return empty collection
				$this->initComponents();
			} else {
				$collComponents = ComponentQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collComponents;
				}
				$this->collComponents = $collComponents;
			}
		}
		return $this->collComponents;
	}

	/**
	 * Returns the number of related Component objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Component objects.
	 * @throws     PropelException
	 */
	public function countComponents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComponents || null !== $criteria) {
			if ($this->isNew() && null === $this->collComponents) {
				return 0;
			} else {
				$query = ComponentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collComponents);
		}
	}

	/**
	 * Method called to associate a Component object to this object
	 * through the Component foreign key attribute.
	 *
	 * @param      Component $l Component
	 * @return     void
	 * @throws     PropelException
	 */
	public function addComponent(Component $l)
	{
		if ($this->collComponents === null) {
			$this->initComponents();
		}
		if (!$this->collComponents->contains($l)) { // only add it if the **same** object is not already associated
			$this->collComponents[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Components from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Component[] List of Component objects
	 */
	public function getComponentsJoinProject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComponentQuery::create(null, $criteria);
		$query->joinWith('Project', $join_behavior);

		return $this->getComponents($query, $con);
	}

	/**
	 * Gets a single UserProfile object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con optional connection object
	 * @return     UserProfile
	 * @throws     PropelException
	 */
	public function getUserProfile(PropelPDO $con = null)
	{

		if ($this->singleUserProfile === null && !$this->isNew()) {
			$this->singleUserProfile = UserProfileQuery::create()->findPk($this->getPrimaryKey(), $con);
		}

		return $this->singleUserProfile;
	}

	/**
	 * Sets a single UserProfile object as related to this object by a one-to-one relationship.
	 *
	 * @param      UserProfile $v UserProfile
	 * @return     afGuardUser The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserProfile(UserProfile $v = null)
	{
		$this->singleUserProfile = $v;

		// Make sure that that the passed-in UserProfile isn't already associated with this object
		if ($v !== null && $v->getafGuardUser() === null) {
			$v->setafGuardUser($this);
		}

		return $this;
	}

	/**
	 * Clears out the collTicketsRelatedByUserId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTicketsRelatedByUserId()
	 */
	public function clearTicketsRelatedByUserId()
	{
		$this->collTicketsRelatedByUserId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTicketsRelatedByUserId collection.
	 *
	 * By default this just sets the collTicketsRelatedByUserId collection to an empty array (like clearcollTicketsRelatedByUserId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTicketsRelatedByUserId()
	{
		$this->collTicketsRelatedByUserId = new PropelObjectCollection();
		$this->collTicketsRelatedByUserId->setModel('Ticket');
	}

	/**
	 * Gets an array of Ticket objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 * @throws     PropelException
	 */
	public function getTicketsRelatedByUserId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTicketsRelatedByUserId || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketsRelatedByUserId) {
				// return empty collection
				$this->initTicketsRelatedByUserId();
			} else {
				$collTicketsRelatedByUserId = TicketQuery::create(null, $criteria)
					->filterByafGuardUserRelatedByUserId($this)
					->find($con);
				if (null !== $criteria) {
					return $collTicketsRelatedByUserId;
				}
				$this->collTicketsRelatedByUserId = $collTicketsRelatedByUserId;
			}
		}
		return $this->collTicketsRelatedByUserId;
	}

	/**
	 * Returns the number of related Ticket objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Ticket objects.
	 * @throws     PropelException
	 */
	public function countTicketsRelatedByUserId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTicketsRelatedByUserId || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketsRelatedByUserId) {
				return 0;
			} else {
				$query = TicketQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUserRelatedByUserId($this)
					->count($con);
			}
		} else {
			return count($this->collTicketsRelatedByUserId);
		}
	}

	/**
	 * Method called to associate a Ticket object to this object
	 * through the Ticket foreign key attribute.
	 *
	 * @param      Ticket $l Ticket
	 * @return     void
	 * @throws     PropelException
	 */
	public function addTicketRelatedByUserId(Ticket $l)
	{
		if ($this->collTicketsRelatedByUserId === null) {
			$this->initTicketsRelatedByUserId();
		}
		if (!$this->collTicketsRelatedByUserId->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTicketsRelatedByUserId[]= $l;
			$l->setafGuardUserRelatedByUserId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinComponent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('Component', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinTicketType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketType', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinTicketPriority($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketPriority', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinTicketResolution($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketResolution', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinTicketResolveAs($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketResolveAs', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinTicketMilestone($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketMilestone', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByUserId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByUserIdJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('Customer', $join_behavior);

		return $this->getTicketsRelatedByUserId($query, $con);
	}

	/**
	 * Clears out the collTicketsRelatedByOwnerId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTicketsRelatedByOwnerId()
	 */
	public function clearTicketsRelatedByOwnerId()
	{
		$this->collTicketsRelatedByOwnerId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTicketsRelatedByOwnerId collection.
	 *
	 * By default this just sets the collTicketsRelatedByOwnerId collection to an empty array (like clearcollTicketsRelatedByOwnerId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTicketsRelatedByOwnerId()
	{
		$this->collTicketsRelatedByOwnerId = new PropelObjectCollection();
		$this->collTicketsRelatedByOwnerId->setModel('Ticket');
	}

	/**
	 * Gets an array of Ticket objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 * @throws     PropelException
	 */
	public function getTicketsRelatedByOwnerId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTicketsRelatedByOwnerId || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketsRelatedByOwnerId) {
				// return empty collection
				$this->initTicketsRelatedByOwnerId();
			} else {
				$collTicketsRelatedByOwnerId = TicketQuery::create(null, $criteria)
					->filterByOwner($this)
					->find($con);
				if (null !== $criteria) {
					return $collTicketsRelatedByOwnerId;
				}
				$this->collTicketsRelatedByOwnerId = $collTicketsRelatedByOwnerId;
			}
		}
		return $this->collTicketsRelatedByOwnerId;
	}

	/**
	 * Returns the number of related Ticket objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Ticket objects.
	 * @throws     PropelException
	 */
	public function countTicketsRelatedByOwnerId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTicketsRelatedByOwnerId || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketsRelatedByOwnerId) {
				return 0;
			} else {
				$query = TicketQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByOwner($this)
					->count($con);
			}
		} else {
			return count($this->collTicketsRelatedByOwnerId);
		}
	}

	/**
	 * Method called to associate a Ticket object to this object
	 * through the Ticket foreign key attribute.
	 *
	 * @param      Ticket $l Ticket
	 * @return     void
	 * @throws     PropelException
	 */
	public function addTicketRelatedByOwnerId(Ticket $l)
	{
		if ($this->collTicketsRelatedByOwnerId === null) {
			$this->initTicketsRelatedByOwnerId();
		}
		if (!$this->collTicketsRelatedByOwnerId->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTicketsRelatedByOwnerId[]= $l;
			$l->setOwner($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinComponent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('Component', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinTicketType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketType', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinTicketPriority($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketPriority', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinTicketResolution($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketResolution', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinTicketResolveAs($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketResolveAs', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinTicketMilestone($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('TicketMilestone', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketsRelatedByOwnerId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ticket[] List of Ticket objects
	 */
	public function getTicketsRelatedByOwnerIdJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketQuery::create(null, $criteria);
		$query->joinWith('Customer', $join_behavior);

		return $this->getTicketsRelatedByOwnerId($query, $con);
	}

	/**
	 * Clears out the collTicketComments collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTicketComments()
	 */
	public function clearTicketComments()
	{
		$this->collTicketComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTicketComments collection.
	 *
	 * By default this just sets the collTicketComments collection to an empty array (like clearcollTicketComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTicketComments()
	{
		$this->collTicketComments = new PropelObjectCollection();
		$this->collTicketComments->setModel('TicketComment');
	}

	/**
	 * Gets an array of TicketComment objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array TicketComment[] List of TicketComment objects
	 * @throws     PropelException
	 */
	public function getTicketComments($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTicketComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketComments) {
				// return empty collection
				$this->initTicketComments();
			} else {
				$collTicketComments = TicketCommentQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collTicketComments;
				}
				$this->collTicketComments = $collTicketComments;
			}
		}
		return $this->collTicketComments;
	}

	/**
	 * Returns the number of related TicketComment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related TicketComment objects.
	 * @throws     PropelException
	 */
	public function countTicketComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTicketComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collTicketComments) {
				return 0;
			} else {
				$query = TicketCommentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collTicketComments);
		}
	}

	/**
	 * Method called to associate a TicketComment object to this object
	 * through the TicketComment foreign key attribute.
	 *
	 * @param      TicketComment $l TicketComment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addTicketComment(TicketComment $l)
	{
		if ($this->collTicketComments === null) {
			$this->initTicketComments();
		}
		if (!$this->collTicketComments->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTicketComments[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TicketComment[] List of TicketComment objects
	 */
	public function getTicketCommentsJoinTicket($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketCommentQuery::create(null, $criteria);
		$query->joinWith('Ticket', $join_behavior);

		return $this->getTicketComments($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related TicketComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TicketComment[] List of TicketComment objects
	 */
	public function getTicketCommentsJoinTicketFile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TicketCommentQuery::create(null, $criteria);
		$query->joinWith('TicketFile', $join_behavior);

		return $this->getTicketComments($query, $con);
	}

	/**
	 * Clears out the collChangelogs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addChangelogs()
	 */
	public function clearChangelogs()
	{
		$this->collChangelogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collChangelogs collection.
	 *
	 * By default this just sets the collChangelogs collection to an empty array (like clearcollChangelogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initChangelogs()
	{
		$this->collChangelogs = new PropelObjectCollection();
		$this->collChangelogs->setModel('Changelog');
	}

	/**
	 * Gets an array of Changelog objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Changelog[] List of Changelog objects
	 * @throws     PropelException
	 */
	public function getChangelogs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collChangelogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collChangelogs) {
				// return empty collection
				$this->initChangelogs();
			} else {
				$collChangelogs = ChangelogQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collChangelogs;
				}
				$this->collChangelogs = $collChangelogs;
			}
		}
		return $this->collChangelogs;
	}

	/**
	 * Returns the number of related Changelog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Changelog objects.
	 * @throws     PropelException
	 */
	public function countChangelogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collChangelogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collChangelogs) {
				return 0;
			} else {
				$query = ChangelogQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collChangelogs);
		}
	}

	/**
	 * Method called to associate a Changelog object to this object
	 * through the Changelog foreign key attribute.
	 *
	 * @param      Changelog $l Changelog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addChangelog(Changelog $l)
	{
		if ($this->collChangelogs === null) {
			$this->initChangelogs();
		}
		if (!$this->collChangelogs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collChangelogs[]= $l;
			$l->setafGuardUser($this);
		}
	}

	/**
	 * Clears out the collProjectUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProjectUsers()
	 */
	public function clearProjectUsers()
	{
		$this->collProjectUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProjectUsers collection.
	 *
	 * By default this just sets the collProjectUsers collection to an empty array (like clearcollProjectUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProjectUsers()
	{
		$this->collProjectUsers = new PropelObjectCollection();
		$this->collProjectUsers->setModel('ProjectUser');
	}

	/**
	 * Gets an array of ProjectUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ProjectUser[] List of ProjectUser objects
	 * @throws     PropelException
	 */
	public function getProjectUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProjectUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collProjectUsers) {
				// return empty collection
				$this->initProjectUsers();
			} else {
				$collProjectUsers = ProjectUserQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collProjectUsers;
				}
				$this->collProjectUsers = $collProjectUsers;
			}
		}
		return $this->collProjectUsers;
	}

	/**
	 * Returns the number of related ProjectUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProjectUser objects.
	 * @throws     PropelException
	 */
	public function countProjectUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProjectUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collProjectUsers) {
				return 0;
			} else {
				$query = ProjectUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collProjectUsers);
		}
	}

	/**
	 * Method called to associate a ProjectUser object to this object
	 * through the ProjectUser foreign key attribute.
	 *
	 * @param      ProjectUser $l ProjectUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProjectUser(ProjectUser $l)
	{
		if ($this->collProjectUsers === null) {
			$this->initProjectUsers();
		}
		if (!$this->collProjectUsers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collProjectUsers[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related ProjectUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProjectUser[] List of ProjectUser objects
	 */
	public function getProjectUsersJoinProject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProjectUserQuery::create(null, $criteria);
		$query->joinWith('Project', $join_behavior);

		return $this->getProjectUsers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related ProjectUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProjectUser[] List of ProjectUser objects
	 */
	public function getProjectUsersJoinafGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProjectUserQuery::create(null, $criteria);
		$query->joinWith('afGuardGroup', $join_behavior);

		return $this->getProjectUsers($query, $con);
	}

	/**
	 * Clears out the collTimetracks collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTimetracks()
	 */
	public function clearTimetracks()
	{
		$this->collTimetracks = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTimetracks collection.
	 *
	 * By default this just sets the collTimetracks collection to an empty array (like clearcollTimetracks());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTimetracks()
	{
		$this->collTimetracks = new PropelObjectCollection();
		$this->collTimetracks->setModel('Timetrack');
	}

	/**
	 * Gets an array of Timetrack objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Timetrack[] List of Timetrack objects
	 * @throws     PropelException
	 */
	public function getTimetracks($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTimetracks || null !== $criteria) {
			if ($this->isNew() && null === $this->collTimetracks) {
				// return empty collection
				$this->initTimetracks();
			} else {
				$collTimetracks = TimetrackQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collTimetracks;
				}
				$this->collTimetracks = $collTimetracks;
			}
		}
		return $this->collTimetracks;
	}

	/**
	 * Returns the number of related Timetrack objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Timetrack objects.
	 * @throws     PropelException
	 */
	public function countTimetracks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTimetracks || null !== $criteria) {
			if ($this->isNew() && null === $this->collTimetracks) {
				return 0;
			} else {
				$query = TimetrackQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collTimetracks);
		}
	}

	/**
	 * Method called to associate a Timetrack object to this object
	 * through the Timetrack foreign key attribute.
	 *
	 * @param      Timetrack $l Timetrack
	 * @return     void
	 * @throws     PropelException
	 */
	public function addTimetrack(Timetrack $l)
	{
		if ($this->collTimetracks === null) {
			$this->initTimetracks();
		}
		if (!$this->collTimetracks->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTimetracks[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Timetracks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Timetrack[] List of Timetrack objects
	 */
	public function getTimetracksJoinProject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TimetrackQuery::create(null, $criteria);
		$query->joinWith('Project', $join_behavior);

		return $this->getTimetracks($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Timetracks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Timetrack[] List of Timetrack objects
	 */
	public function getTimetracksJoinTicketMilestone($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TimetrackQuery::create(null, $criteria);
		$query->joinWith('TicketMilestone', $join_behavior);

		return $this->getTimetracks($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Timetracks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Timetrack[] List of Timetrack objects
	 */
	public function getTimetracksJoinTicket($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TimetrackQuery::create(null, $criteria);
		$query->joinWith('Ticket', $join_behavior);

		return $this->getTimetracks($query, $con);
	}

	/**
	 * Clears out the collFilterHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFilterHistorys()
	 */
	public function clearFilterHistorys()
	{
		$this->collFilterHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFilterHistorys collection.
	 *
	 * By default this just sets the collFilterHistorys collection to an empty array (like clearcollFilterHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initFilterHistorys()
	{
		$this->collFilterHistorys = new PropelObjectCollection();
		$this->collFilterHistorys->setModel('FilterHistory');
	}

	/**
	 * Gets an array of FilterHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array FilterHistory[] List of FilterHistory objects
	 * @throws     PropelException
	 */
	public function getFilterHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collFilterHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collFilterHistorys) {
				// return empty collection
				$this->initFilterHistorys();
			} else {
				$collFilterHistorys = FilterHistoryQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collFilterHistorys;
				}
				$this->collFilterHistorys = $collFilterHistorys;
			}
		}
		return $this->collFilterHistorys;
	}

	/**
	 * Returns the number of related FilterHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related FilterHistory objects.
	 * @throws     PropelException
	 */
	public function countFilterHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collFilterHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collFilterHistorys) {
				return 0;
			} else {
				$query = FilterHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collFilterHistorys);
		}
	}

	/**
	 * Method called to associate a FilterHistory object to this object
	 * through the FilterHistory foreign key attribute.
	 *
	 * @param      FilterHistory $l FilterHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addFilterHistory(FilterHistory $l)
	{
		if ($this->collFilterHistorys === null) {
			$this->initFilterHistorys();
		}
		if (!$this->collFilterHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collFilterHistorys[]= $l;
			$l->setafGuardUser($this);
		}
	}

	/**
	 * Clears out the collProjectPermissions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProjectPermissions()
	 */
	public function clearProjectPermissions()
	{
		$this->collProjectPermissions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProjectPermissions collection.
	 *
	 * By default this just sets the collProjectPermissions collection to an empty array (like clearcollProjectPermissions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProjectPermissions()
	{
		$this->collProjectPermissions = new PropelObjectCollection();
		$this->collProjectPermissions->setModel('ProjectPermission');
	}

	/**
	 * Gets an array of ProjectPermission objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ProjectPermission[] List of ProjectPermission objects
	 * @throws     PropelException
	 */
	public function getProjectPermissions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProjectPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collProjectPermissions) {
				// return empty collection
				$this->initProjectPermissions();
			} else {
				$collProjectPermissions = ProjectPermissionQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collProjectPermissions;
				}
				$this->collProjectPermissions = $collProjectPermissions;
			}
		}
		return $this->collProjectPermissions;
	}

	/**
	 * Returns the number of related ProjectPermission objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProjectPermission objects.
	 * @throws     PropelException
	 */
	public function countProjectPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProjectPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collProjectPermissions) {
				return 0;
			} else {
				$query = ProjectPermissionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collProjectPermissions);
		}
	}

	/**
	 * Method called to associate a ProjectPermission object to this object
	 * through the ProjectPermission foreign key attribute.
	 *
	 * @param      ProjectPermission $l ProjectPermission
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProjectPermission(ProjectPermission $l)
	{
		if ($this->collProjectPermissions === null) {
			$this->initProjectPermissions();
		}
		if (!$this->collProjectPermissions->contains($l)) { // only add it if the **same** object is not already associated
			$this->collProjectPermissions[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related ProjectPermissions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProjectPermission[] List of ProjectPermission objects
	 */
	public function getProjectPermissionsJoinProject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProjectPermissionQuery::create(null, $criteria);
		$query->joinWith('Project', $join_behavior);

		return $this->getProjectPermissions($query, $con);
	}

	/**
	 * Clears out the collFavoriteTickets collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFavoriteTickets()
	 */
	public function clearFavoriteTickets()
	{
		$this->collFavoriteTickets = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFavoriteTickets collection.
	 *
	 * By default this just sets the collFavoriteTickets collection to an empty array (like clearcollFavoriteTickets());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initFavoriteTickets()
	{
		$this->collFavoriteTickets = new PropelObjectCollection();
		$this->collFavoriteTickets->setModel('FavoriteTicket');
	}

	/**
	 * Gets an array of FavoriteTicket objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array FavoriteTicket[] List of FavoriteTicket objects
	 * @throws     PropelException
	 */
	public function getFavoriteTickets($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collFavoriteTickets || null !== $criteria) {
			if ($this->isNew() && null === $this->collFavoriteTickets) {
				// return empty collection
				$this->initFavoriteTickets();
			} else {
				$collFavoriteTickets = FavoriteTicketQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collFavoriteTickets;
				}
				$this->collFavoriteTickets = $collFavoriteTickets;
			}
		}
		return $this->collFavoriteTickets;
	}

	/**
	 * Returns the number of related FavoriteTicket objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related FavoriteTicket objects.
	 * @throws     PropelException
	 */
	public function countFavoriteTickets(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collFavoriteTickets || null !== $criteria) {
			if ($this->isNew() && null === $this->collFavoriteTickets) {
				return 0;
			} else {
				$query = FavoriteTicketQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collFavoriteTickets);
		}
	}

	/**
	 * Method called to associate a FavoriteTicket object to this object
	 * through the FavoriteTicket foreign key attribute.
	 *
	 * @param      FavoriteTicket $l FavoriteTicket
	 * @return     void
	 * @throws     PropelException
	 */
	public function addFavoriteTicket(FavoriteTicket $l)
	{
		if ($this->collFavoriteTickets === null) {
			$this->initFavoriteTickets();
		}
		if (!$this->collFavoriteTickets->contains($l)) { // only add it if the **same** object is not already associated
			$this->collFavoriteTickets[]= $l;
			$l->setafGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related FavoriteTickets from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array FavoriteTicket[] List of FavoriteTicket objects
	 */
	public function getFavoriteTicketsJoinTicket($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FavoriteTicketQuery::create(null, $criteria);
		$query->joinWith('Ticket', $join_behavior);

		return $this->getFavoriteTickets($query, $con);
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
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collafGuardUserPermissions) {
				foreach ((array) $this->collafGuardUserPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collafGuardUserGroups) {
				foreach ((array) $this->collafGuardUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collafGuardRememberKeys) {
				foreach ((array) $this->collafGuardRememberKeys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComponents) {
				foreach ((array) $this->collComponents as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->singleUserProfile) {
				$this->singleUserProfile->clearAllReferences($deep);
			}
			if ($this->collTicketsRelatedByUserId) {
				foreach ((array) $this->collTicketsRelatedByUserId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTicketsRelatedByOwnerId) {
				foreach ((array) $this->collTicketsRelatedByOwnerId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTicketComments) {
				foreach ((array) $this->collTicketComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collChangelogs) {
				foreach ((array) $this->collChangelogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProjectUsers) {
				foreach ((array) $this->collProjectUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTimetracks) {
				foreach ((array) $this->collTimetracks as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collFilterHistorys) {
				foreach ((array) $this->collFilterHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProjectPermissions) {
				foreach ((array) $this->collProjectPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collFavoriteTickets) {
				foreach ((array) $this->collFavoriteTickets as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collafGuardUserPermissions = null;
		$this->collafGuardUserGroups = null;
		$this->collafGuardRememberKeys = null;
		$this->collComponents = null;
		$this->singleUserProfile = null;
		$this->collTicketsRelatedByUserId = null;
		$this->collTicketsRelatedByOwnerId = null;
		$this->collTicketComments = null;
		$this->collChangelogs = null;
		$this->collProjectUsers = null;
		$this->collTimetracks = null;
		$this->collFilterHistorys = null;
		$this->collProjectPermissions = null;
		$this->collFavoriteTickets = null;
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

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseafGuardUser
