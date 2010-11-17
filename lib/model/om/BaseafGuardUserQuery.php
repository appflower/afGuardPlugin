<?php


/**
 * Base class that represents a query for the 'af_guard_user' table.
 *
 * 
 *
 * @method     afGuardUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     afGuardUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     afGuardUserQuery orderByAlgorithm($order = Criteria::ASC) Order by the algorithm column
 * @method     afGuardUserQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method     afGuardUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     afGuardUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     afGuardUserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     afGuardUserQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     afGuardUserQuery orderByIsSuperAdmin($order = Criteria::ASC) Order by the is_super_admin column
 *
 * @method     afGuardUserQuery groupById() Group by the id column
 * @method     afGuardUserQuery groupByUsername() Group by the username column
 * @method     afGuardUserQuery groupByAlgorithm() Group by the algorithm column
 * @method     afGuardUserQuery groupBySalt() Group by the salt column
 * @method     afGuardUserQuery groupByPassword() Group by the password column
 * @method     afGuardUserQuery groupByCreatedAt() Group by the created_at column
 * @method     afGuardUserQuery groupByLastLogin() Group by the last_login column
 * @method     afGuardUserQuery groupByIsActive() Group by the is_active column
 * @method     afGuardUserQuery groupByIsSuperAdmin() Group by the is_super_admin column
 *
 * @method     afGuardUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardUserQuery leftJoinafGuardUserPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserPermission relation
 * @method     afGuardUserQuery rightJoinafGuardUserPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserPermission relation
 * @method     afGuardUserQuery innerJoinafGuardUserPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserPermission relation
 *
 * @method     afGuardUserQuery leftJoinafGuardUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserGroup relation
 * @method     afGuardUserQuery rightJoinafGuardUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserGroup relation
 * @method     afGuardUserQuery innerJoinafGuardUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserGroup relation
 *
 * @method     afGuardUserQuery leftJoinafGuardRememberKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardRememberKey relation
 * @method     afGuardUserQuery rightJoinafGuardRememberKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardRememberKey relation
 * @method     afGuardUserQuery innerJoinafGuardRememberKey($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardRememberKey relation
 *
 * @method     afGuardUserQuery leftJoinUserProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserProfile relation
 * @method     afGuardUserQuery rightJoinUserProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserProfile relation
 * @method     afGuardUserQuery innerJoinUserProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the UserProfile relation
 *
 * @method     afGuardUserQuery leftJoinCompanyFavorite($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompanyFavorite relation
 * @method     afGuardUserQuery rightJoinCompanyFavorite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompanyFavorite relation
 * @method     afGuardUserQuery innerJoinCompanyFavorite($relationAlias = null) Adds a INNER JOIN clause to the query using the CompanyFavorite relation
 *
 * @method     afGuardUserQuery leftJoinCompanyHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompanyHistory relation
 * @method     afGuardUserQuery rightJoinCompanyHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompanyHistory relation
 * @method     afGuardUserQuery innerJoinCompanyHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the CompanyHistory relation
 *
 * @method     afGuardUser findOne(PropelPDO $con = null) Return the first afGuardUser matching the query
 * @method     afGuardUser findOneOrCreate(PropelPDO $con = null) Return the first afGuardUser matching the query, or a new afGuardUser object populated from the query conditions when no match is found
 *
 * @method     afGuardUser findOneById(int $id) Return the first afGuardUser filtered by the id column
 * @method     afGuardUser findOneByUsername(string $username) Return the first afGuardUser filtered by the username column
 * @method     afGuardUser findOneByAlgorithm(string $algorithm) Return the first afGuardUser filtered by the algorithm column
 * @method     afGuardUser findOneBySalt(string $salt) Return the first afGuardUser filtered by the salt column
 * @method     afGuardUser findOneByPassword(string $password) Return the first afGuardUser filtered by the password column
 * @method     afGuardUser findOneByCreatedAt(string $created_at) Return the first afGuardUser filtered by the created_at column
 * @method     afGuardUser findOneByLastLogin(string $last_login) Return the first afGuardUser filtered by the last_login column
 * @method     afGuardUser findOneByIsActive(boolean $is_active) Return the first afGuardUser filtered by the is_active column
 * @method     afGuardUser findOneByIsSuperAdmin(boolean $is_super_admin) Return the first afGuardUser filtered by the is_super_admin column
 *
 * @method     array findById(int $id) Return afGuardUser objects filtered by the id column
 * @method     array findByUsername(string $username) Return afGuardUser objects filtered by the username column
 * @method     array findByAlgorithm(string $algorithm) Return afGuardUser objects filtered by the algorithm column
 * @method     array findBySalt(string $salt) Return afGuardUser objects filtered by the salt column
 * @method     array findByPassword(string $password) Return afGuardUser objects filtered by the password column
 * @method     array findByCreatedAt(string $created_at) Return afGuardUser objects filtered by the created_at column
 * @method     array findByLastLogin(string $last_login) Return afGuardUser objects filtered by the last_login column
 * @method     array findByIsActive(boolean $is_active) Return afGuardUser objects filtered by the is_active column
 * @method     array findByIsSuperAdmin(boolean $is_super_admin) Return afGuardUser objects filtered by the is_super_admin column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardUserQuery) {
			return $criteria;
		}
		$query = new afGuardUserQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardUserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(afGuardUserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(afGuardUserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the algorithm column
	 * 
	 * @param     string $algorithm The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByAlgorithm($algorithm = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($algorithm)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $algorithm)) {
				$algorithm = str_replace('*', '%', $algorithm);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::ALGORITHM, $algorithm, $comparison);
	}

	/**
	 * Filter the query on the salt column
	 * 
	 * @param     string $salt The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterBySalt($salt = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($salt)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $salt)) {
				$salt = str_replace('*', '%', $salt);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::SALT, $salt, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(afGuardUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(afGuardUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the last_login column
	 * 
	 * @param     string|array $lastLogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByLastLogin($lastLogin = null, $comparison = null)
	{
		if (is_array($lastLogin)) {
			$useMinMax = false;
			if (isset($lastLogin['min'])) {
				$this->addUsingAlias(afGuardUserPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastLogin['max'])) {
				$this->addUsingAlias(afGuardUserPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardUserPeer::LAST_LOGIN, $lastLogin, $comparison);
	}

	/**
	 * Filter the query on the is_active column
	 * 
	 * @param     boolean|string $isActive The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByIsActive($isActive = null, $comparison = null)
	{
		if (is_string($isActive)) {
			$is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(afGuardUserPeer::IS_ACTIVE, $isActive, $comparison);
	}

	/**
	 * Filter the query on the is_super_admin column
	 * 
	 * @param     boolean|string $isSuperAdmin The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByIsSuperAdmin($isSuperAdmin = null, $comparison = null)
	{
		if (is_string($isSuperAdmin)) {
			$is_super_admin = in_array(strtolower($isSuperAdmin), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(afGuardUserPeer::IS_SUPER_ADMIN, $isSuperAdmin, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUserPermission object
	 *
	 * @param     afGuardUserPermission $afGuardUserPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByafGuardUserPermission($afGuardUserPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $afGuardUserPermission->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUserPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinafGuardUserPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUserPermission');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'afGuardUserPermission');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardUserPermission relation afGuardUserPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserPermissionQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardUserPermission($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUserPermission', 'afGuardUserPermissionQuery');
	}

	/**
	 * Filter the query by a related afGuardUserGroup object
	 *
	 * @param     afGuardUserGroup $afGuardUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByafGuardUserGroup($afGuardUserGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $afGuardUserGroup->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinafGuardUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUserGroup');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'afGuardUserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardUserGroup relation afGuardUserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUserGroup', 'afGuardUserGroupQuery');
	}

	/**
	 * Filter the query by a related afGuardRememberKey object
	 *
	 * @param     afGuardRememberKey $afGuardRememberKey  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByafGuardRememberKey($afGuardRememberKey, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $afGuardRememberKey->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardRememberKey relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinafGuardRememberKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardRememberKey');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'afGuardRememberKey');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardRememberKey relation afGuardRememberKey object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardRememberKeyQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardRememberKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardRememberKey($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardRememberKey', 'afGuardRememberKeyQuery');
	}

	/**
	 * Filter the query by a related UserProfile object
	 *
	 * @param     UserProfile $userProfile  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByUserProfile($userProfile, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $userProfile->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserProfile relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinUserProfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserProfile');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserProfile');
		}
		
		return $this;
	}

	/**
	 * Use the UserProfile relation UserProfile object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserProfileQuery A secondary query class using the current class as primary query
	 */
	public function useUserProfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserProfile($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserProfile', 'UserProfileQuery');
	}

	/**
	 * Filter the query by a related CompanyFavorite object
	 *
	 * @param     CompanyFavorite $companyFavorite  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByCompanyFavorite($companyFavorite, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $companyFavorite->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CompanyFavorite relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinCompanyFavorite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CompanyFavorite');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'CompanyFavorite');
		}
		
		return $this;
	}

	/**
	 * Use the CompanyFavorite relation CompanyFavorite object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyFavoriteQuery A secondary query class using the current class as primary query
	 */
	public function useCompanyFavoriteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCompanyFavorite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CompanyFavorite', 'CompanyFavoriteQuery');
	}

	/**
	 * Filter the query by a related CompanyHistory object
	 *
	 * @param     CompanyHistory $companyHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function filterByCompanyHistory($companyHistory, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPeer::ID, $companyHistory->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CompanyHistory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function joinCompanyHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CompanyHistory');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'CompanyHistory');
		}
		
		return $this;
	}

	/**
	 * Use the CompanyHistory relation CompanyHistory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useCompanyHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCompanyHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CompanyHistory', 'CompanyHistoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     afGuardUser $afGuardUser Object to remove from the list of results
	 *
	 * @return    afGuardUserQuery The current query, for fluid interface
	 */
	public function prune($afGuardUser = null)
	{
		if ($afGuardUser) {
			$this->addUsingAlias(afGuardUserPeer::ID, $afGuardUser->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseafGuardUserQuery
