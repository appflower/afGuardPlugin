<?php


/**
 * Base class that represents a query for the 'af_guard_group_permission' table.
 *
 * 
 *
 * @method     afGuardGroupPermissionQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     afGuardGroupPermissionQuery orderByPermissionId($order = Criteria::ASC) Order by the permission_id column
 *
 * @method     afGuardGroupPermissionQuery groupByGroupId() Group by the group_id column
 * @method     afGuardGroupPermissionQuery groupByPermissionId() Group by the permission_id column
 *
 * @method     afGuardGroupPermissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardGroupPermissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardGroupPermissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardGroupPermissionQuery leftJoinafGuardGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardGroup relation
 * @method     afGuardGroupPermissionQuery rightJoinafGuardGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardGroup relation
 * @method     afGuardGroupPermissionQuery innerJoinafGuardGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardGroup relation
 *
 * @method     afGuardGroupPermissionQuery leftJoinafGuardPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardPermission relation
 * @method     afGuardGroupPermissionQuery rightJoinafGuardPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardPermission relation
 * @method     afGuardGroupPermissionQuery innerJoinafGuardPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardPermission relation
 *
 * @method     afGuardGroupPermission findOne(PropelPDO $con = null) Return the first afGuardGroupPermission matching the query
 * @method     afGuardGroupPermission findOneOrCreate(PropelPDO $con = null) Return the first afGuardGroupPermission matching the query, or a new afGuardGroupPermission object populated from the query conditions when no match is found
 *
 * @method     afGuardGroupPermission findOneByGroupId(int $group_id) Return the first afGuardGroupPermission filtered by the group_id column
 * @method     afGuardGroupPermission findOneByPermissionId(int $permission_id) Return the first afGuardGroupPermission filtered by the permission_id column
 *
 * @method     array findByGroupId(int $group_id) Return afGuardGroupPermission objects filtered by the group_id column
 * @method     array findByPermissionId(int $permission_id) Return afGuardGroupPermission objects filtered by the permission_id column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardGroupPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardGroupPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardGroupPermission', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardGroupPermissionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardGroupPermissionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardGroupPermissionQuery) {
			return $criteria;
		}
		$query = new afGuardGroupPermissionQuery();
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
	 * @param     array[$group_id, $permission_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardGroupPermission|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardGroupPermissionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(afGuardGroupPermissionPeer::GROUP_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(afGuardGroupPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(afGuardGroupPermissionPeer::GROUP_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(afGuardGroupPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the group_id column
	 * 
	 * @param     int|array $groupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByGroupId($groupId = null, $comparison = null)
	{
		if (is_array($groupId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardGroupPermissionPeer::GROUP_ID, $groupId, $comparison);
	}

	/**
	 * Filter the query on the permission_id column
	 * 
	 * @param     int|array $permissionId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPermissionId($permissionId = null, $comparison = null)
	{
		if (is_array($permissionId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardGroupPermissionPeer::PERMISSION_ID, $permissionId, $comparison);
	}

	/**
	 * Filter the query by a related afGuardGroup object
	 *
	 * @param     afGuardGroup $afGuardGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardGroup($afGuardGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardGroupPermissionPeer::GROUP_ID, $afGuardGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function joinafGuardGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardGroup');
		
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
			$this->addJoinObject($join, 'afGuardGroup');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardGroup relation afGuardGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardGroup', 'afGuardGroupQuery');
	}

	/**
	 * Filter the query by a related afGuardPermission object
	 *
	 * @param     afGuardPermission $afGuardPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardPermission($afGuardPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardGroupPermissionPeer::PERMISSION_ID, $afGuardPermission->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
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
	 * @param     afGuardGroupPermission $afGuardGroupPermission Object to remove from the list of results
	 *
	 * @return    afGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function prune($afGuardGroupPermission = null)
	{
		if ($afGuardGroupPermission) {
			$this->addCond('pruneCond0', $this->getAliasedColName(afGuardGroupPermissionPeer::GROUP_ID), $afGuardGroupPermission->getGroupId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(afGuardGroupPermissionPeer::PERMISSION_ID), $afGuardGroupPermission->getPermissionId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseafGuardGroupPermissionQuery
