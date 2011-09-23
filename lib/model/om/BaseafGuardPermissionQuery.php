<?php


/**
 * Base class that represents a query for the 'af_guard_permission' table.
 *
 * 
 *
 * @method     afGuardPermissionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     afGuardPermissionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     afGuardPermissionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     afGuardPermissionQuery groupById() Group by the id column
 * @method     afGuardPermissionQuery groupByName() Group by the name column
 * @method     afGuardPermissionQuery groupByDescription() Group by the description column
 *
 * @method     afGuardPermissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardPermissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardPermissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardPermissionQuery leftJoinafGuardGroupPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardGroupPermission relation
 * @method     afGuardPermissionQuery rightJoinafGuardGroupPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardGroupPermission relation
 * @method     afGuardPermissionQuery innerJoinafGuardGroupPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardGroupPermission relation
 *
 * @method     afGuardPermissionQuery leftJoinafGuardUserPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserPermission relation
 * @method     afGuardPermissionQuery rightJoinafGuardUserPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserPermission relation
 * @method     afGuardPermissionQuery innerJoinafGuardUserPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserPermission relation
 *
 * @method     afGuardPermission findOne(PropelPDO $con = null) Return the first afGuardPermission matching the query
 * @method     afGuardPermission findOneOrCreate(PropelPDO $con = null) Return the first afGuardPermission matching the query, or a new afGuardPermission object populated from the query conditions when no match is found
 *
 * @method     afGuardPermission findOneById(int $id) Return the first afGuardPermission filtered by the id column
 * @method     afGuardPermission findOneByName(string $name) Return the first afGuardPermission filtered by the name column
 * @method     afGuardPermission findOneByDescription(string $description) Return the first afGuardPermission filtered by the description column
 *
 * @method     array findById(int $id) Return afGuardPermission objects filtered by the id column
 * @method     array findByName(string $name) Return afGuardPermission objects filtered by the name column
 * @method     array findByDescription(string $description) Return afGuardPermission objects filtered by the description column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardPermission', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardPermissionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardPermissionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardPermissionQuery) {
			return $criteria;
		}
		$query = new afGuardPermissionQuery();
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
	 * @return    afGuardPermission|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardPermissionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(afGuardPermissionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(afGuardPermissionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardPermissionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(afGuardPermissionPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(afGuardPermissionPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query by a related afGuardGroupPermission object
	 *
	 * @param     afGuardGroupPermission $afGuardGroupPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardGroupPermission($afGuardGroupPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardPermissionPeer::ID, $afGuardGroupPermission->getPermissionId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardGroupPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
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
	 * Filter the query by a related afGuardUserPermission object
	 *
	 * @param     afGuardUserPermission $afGuardUserPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByafGuardUserPermission($afGuardUserPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardPermissionPeer::ID, $afGuardUserPermission->getPermissionId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUserPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     afGuardPermission $afGuardPermission Object to remove from the list of results
	 *
	 * @return    afGuardPermissionQuery The current query, for fluid interface
	 */
	public function prune($afGuardPermission = null)
	{
		if ($afGuardPermission) {
			$this->addUsingAlias(afGuardPermissionPeer::ID, $afGuardPermission->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseafGuardPermissionQuery
