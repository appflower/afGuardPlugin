<?php


/**
 * Base class that represents a query for the 'af_guard_user_permission' table.
 *
 * 
 *
 * @method     afGuardUserPermissionQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     afGuardUserPermissionQuery orderByPermissionId($order = Criteria::ASC) Order by the permission_id column
 *
 * @method     afGuardUserPermissionQuery groupByUserId() Group by the user_id column
 * @method     afGuardUserPermissionQuery groupByPermissionId() Group by the permission_id column
 *
 * @method     afGuardUserPermissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardUserPermissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardUserPermissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardUserPermissionQuery leftJoinafGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserPermissionQuery rightJoinafGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserPermissionQuery innerJoinafGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUser relation
 *
 * @method     afGuardUserPermissionQuery leftJoinafGuardPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardPermission relation
 * @method     afGuardUserPermissionQuery rightJoinafGuardPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardPermission relation
 * @method     afGuardUserPermissionQuery innerJoinafGuardPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardPermission relation
 *
 * @method     afGuardUserPermission findOne(PropelPDO $con = null) Return the first afGuardUserPermission matching the query
 * @method     afGuardUserPermission findOneOrCreate(PropelPDO $con = null) Return the first afGuardUserPermission matching the query, or a new afGuardUserPermission object populated from the query conditions when no match is found
 *
 * @method     afGuardUserPermission findOneByUserId(int $user_id) Return the first afGuardUserPermission filtered by the user_id column
 * @method     afGuardUserPermission findOneByPermissionId(int $permission_id) Return the first afGuardUserPermission filtered by the permission_id column
 *
 * @method     array findByUserId(int $user_id) Return afGuardUserPermission objects filtered by the user_id column
 * @method     array findByPermissionId(int $permission_id) Return afGuardUserPermission objects filtered by the permission_id column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUserPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardUserPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardUserPermission', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardUserPermissionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardUserPermissionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardUserPermissionQuery) {
			return $criteria;
		}
		$query = new afGuardUserPermissionQuery();
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
	 * @param     array[$user_id, $permission_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardUserPermission|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardUserPermissionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(afGuardUserPermissionPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(afGuardUserPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(afGuardUserPermissionPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(afGuardUserPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
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
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserPermissionPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the permission_id column
	 * 
	 * @param     int|array $permissionId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPermissionId($permissionId = null, $comparison = null)
	{
		if (is_array($permissionId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserPermissionPeer::PERMISSION_ID, $permissionId, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUser object
	 *
	 * @param     afGuardUser $afGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardUser($afGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPermissionPeer::USER_ID, $afGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
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
	 * Filter the query by a related afGuardPermission object
	 *
	 * @param     afGuardPermission $afGuardPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardPermission($afGuardPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserPermissionPeer::PERMISSION_ID, $afGuardPermission->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function joinafGuardPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardPermission');
		
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
			$this->addJoinObject($join, 'afGuardPermission');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardPermission relation afGuardPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardPermissionQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardPermission($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardPermission', 'afGuardPermissionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     afGuardUserPermission $afGuardUserPermission Object to remove from the list of results
	 *
	 * @return    afGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function prune($afGuardUserPermission = null)
	{
		if ($afGuardUserPermission) {
			$this->addCond('pruneCond0', $this->getAliasedColName(afGuardUserPermissionPeer::USER_ID), $afGuardUserPermission->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(afGuardUserPermissionPeer::PERMISSION_ID), $afGuardUserPermission->getPermissionId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseafGuardUserPermissionQuery
