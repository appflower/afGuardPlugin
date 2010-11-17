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
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$user_id, $ip_address] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardRememberKey|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardRememberKeyPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @param     int|array $userId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
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
	 * @param     string $rememberKey The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
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
	 * @param     string $ipAddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
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
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
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
	 * @param     afGuardUser $afGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByafGuardUser($afGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardRememberKeyPeer::USER_ID, $afGuardUser->getId(), $comparison);
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
