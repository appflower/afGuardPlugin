<?php


/**
 * Base class that represents a query for the 'af_guard_remember_key' table.
 *
 * 
 *
 * @method     afGuardRememberKeyQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     afGuardRememberKeyQuery orderByRememberKey($order = Criteria::ASC) Order by the remember_key column
 * @method     afGuardRememberKeyQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     afGuardRememberKeyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     afGuardRememberKeyQuery groupByUserId() Group by the user_id column
 * @method     afGuardRememberKeyQuery groupByRememberKey() Group by the remember_key column
 * @method     afGuardRememberKeyQuery groupByIpAddress() Group by the ip_address column
 * @method     afGuardRememberKeyQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     afGuardRememberKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardRememberKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardRememberKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardRememberKeyQuery leftJoinafGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardRememberKeyQuery rightJoinafGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardRememberKeyQuery innerJoinafGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUser relation
 *
 * @method     afGuardRememberKey findOne(PropelPDO $con = null) Return the first afGuardRememberKey matching the query
 * @method     afGuardRememberKey findOneOrCreate(PropelPDO $con = null) Return the first afGuardRememberKey matching the query, or a new afGuardRememberKey object populated from the query conditions when no match is found
 *
 * @method     afGuardRememberKey findOneByUserId(int $user_id) Return the first afGuardRememberKey filtered by the user_id column
 * @method     afGuardRememberKey findOneByRememberKey(string $remember_key) Return the first afGuardRememberKey filtered by the remember_key column
 * @method     afGuardRememberKey findOneByIpAddress(string $ip_address) Return the first afGuardRememberKey filtered by the ip_address column
 * @method     afGuardRememberKey findOneByCreatedAt(string $created_at) Return the first afGuardRememberKey filtered by the created_at column
 *
 * @method     array findByUserId(int $user_id) Return afGuardRememberKey objects filtered by the user_id column
 * @method     array findByRememberKey(string $remember_key) Return afGuardRememberKey objects filtered by the remember_key column
 * @method     array findByIpAddress(string $ip_address) Return afGuardRememberKey objects filtered by the ip_address column
 * @method     array findByCreatedAt(string $created_at) Return afGuardRememberKey objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardRememberKeyQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseafGuardRememberKeyQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardRememberKey', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardRememberKeyQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardRememberKeyQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardRememberKeyQuery) {
			return $criteria;
		}
		$query = new afGuardRememberKeyQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$user_id, $ip_address] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardRememberKey|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = afGuardRememberKeyPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(afGuardRememberKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    afGuardRememberKey A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `REMEMBER_KEY`, `IP_ADDRESS`, `CREATED_AT` FROM `af_guard_remember_key` WHERE `USER_ID` = :p0 AND `IP_ADDRESS` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new afGuardRememberKey();
			$obj->hydrate($row);
			afGuardRememberKeyPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    afGuardRememberKey|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(afGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(afGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(afGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(afGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @see       filterByafGuardUser()
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardRememberKeyPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the remember_key column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRememberKey('fooValue');   // WHERE remember_key = 'fooValue'
	 * $query->filterByRememberKey('%fooValue%'); // WHERE remember_key LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $rememberKey The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByRememberKey($rememberKey = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rememberKey)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rememberKey)) {
				$rememberKey = str_replace('*', '%', $rememberKey);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardRememberKeyPeer::REMEMBER_KEY, $rememberKey, $comparison);
	}

	/**
	 * Filter the query on the ip_address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
	 * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ipAddress The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByIpAddress($ipAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ipAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ipAddress)) {
				$ipAddress = str_replace('*', '%', $ipAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardRememberKeyPeer::IP_ADDRESS, $ipAddress, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(afGuardRememberKeyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(afGuardRememberKeyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardRememberKeyPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUser object
	 *
	 * @param     afGuardUser|PropelCollection $afGuardUser The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByafGuardUser($afGuardUser, $comparison = null)
	{
		if ($afGuardUser instanceof afGuardUser) {
			return $this
				->addUsingAlias(afGuardRememberKeyPeer::USER_ID, $afGuardUser->getId(), $comparison);
		} elseif ($afGuardUser instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(afGuardRememberKeyPeer::USER_ID, $afGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByafGuardUser() only accepts arguments of type afGuardUser or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUser relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function joinafGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUser');

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
			$this->addJoinObject($join, 'afGuardUser');
		}

		return $this;
	}

	/**
	 * Use the afGuardUser relation afGuardUser object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUser', 'afGuardUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     afGuardRememberKey $afGuardRememberKey Object to remove from the list of results
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function prune($afGuardRememberKey = null)
	{
		if ($afGuardRememberKey) {
			$this->addCond('pruneCond0', $this->getAliasedColName(afGuardRememberKeyPeer::USER_ID), $afGuardRememberKey->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(afGuardRememberKeyPeer::IP_ADDRESS), $afGuardRememberKey->getIpAddress(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseafGuardRememberKeyQuery