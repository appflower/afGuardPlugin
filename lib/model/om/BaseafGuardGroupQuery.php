<?php


/**
 * Base class that represents a query for the 'af_guard_group' table.
 *
 * 
 *
 * @method     afGuardGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     afGuardGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     afGuardGroupQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     afGuardGroupQuery groupById() Group by the id column
 * @method     afGuardGroupQuery groupByName() Group by the name column
 * @method     afGuardGroupQuery groupByDescription() Group by the description column
 *
 * @method     afGuardGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardGroupQuery leftJoinafGuardGroupPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardGroupPermission relation
 * @method     afGuardGroupQuery rightJoinafGuardGroupPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardGroupPermission relation
 * @method     afGuardGroupQuery innerJoinafGuardGroupPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardGroupPermission relation
 *
 * @method     afGuardGroupQuery leftJoinafGuardUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserGroup relation
 * @method     afGuardGroupQuery rightJoinafGuardUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserGroup relation
 * @method     afGuardGroupQuery innerJoinafGuardUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserGroup relation
 *
 * @method     afGuardGroup findOne(PropelPDO $con = null) Return the first afGuardGroup matching the query
 * @method     afGuardGroup findOneOrCreate(PropelPDO $con = null) Return the first afGuardGroup matching the query, or a new afGuardGroup object populated from the query conditions when no match is found
 *
 * @method     afGuardGroup findOneById(int $id) Return the first afGuardGroup filtered by the id column
 * @method     afGuardGroup findOneByName(string $name) Return the first afGuardGroup filtered by the name column
 * @method     afGuardGroup findOneByDescription(string $description) Return the first afGuardGroup filtered by the description column
 *
 * @method     array findById(int $id) Return afGuardGroup objects filtered by the id column
 * @method     array findByName(string $name) Return afGuardGroup objects filtered by the name column
 * @method     array findByDescription(string $description) Return afGuardGroup objects filtered by the description column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardGroupQuery) {
			return $criteria;
		}
		$query = new afGuardGroupQuery();
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
	 * @return    afGuardGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(afGuardGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(afGuardGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardGroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardGroupPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query by a related afGuardGroupPermission object
	 *
	 * @param     afGuardGroupPermission $afGuardGroupPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByafGuardGroupPermission($afGuardGroupPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardGroupPeer::ID, $afGuardGroupPermission->getGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardGroupPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function joinafGuardGroupPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardGroupPermission');
		
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
			$this->addJoinObject($join, 'afGuardGroupPermission');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardGroupPermission relation afGuardGroupPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupPermissionQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardGroupPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardGroupPermission($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardGroupPermission', 'afGuardGroupPermissionQuery');
	}

	/**
	 * Filter the query by a related afGuardUserGroup object
	 *
	 * @param     afGuardUserGroup $afGuardUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function filterByafGuardUserGroup($afGuardUserGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardGroupPeer::ID, $afGuardUserGroup->getGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     afGuardGroup $afGuardGroup Object to remove from the list of results
	 *
	 * @return    afGuardGroupQuery The current query, for fluid interface
	 */
	public function prune($afGuardGroup = null)
	{
		if ($afGuardGroup) {
			$this->addUsingAlias(afGuardGroupPeer::ID, $afGuardGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseafGuardGroupQuery
