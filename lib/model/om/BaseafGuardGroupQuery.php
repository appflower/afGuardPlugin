<?php


/**
 * Base class that represents a query for the 'af_guard_group' table.
 *
 *
 *
 * @method afGuardGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method afGuardGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method afGuardGroupQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method afGuardGroupQuery groupById() Group by the id column
 * @method afGuardGroupQuery groupByName() Group by the name column
 * @method afGuardGroupQuery groupByDescription() Group by the description column
 *
 * @method afGuardGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method afGuardGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method afGuardGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method afGuardGroupQuery leftJoinafGuardGroupPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardGroupPermission relation
 * @method afGuardGroupQuery rightJoinafGuardGroupPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardGroupPermission relation
 * @method afGuardGroupQuery innerJoinafGuardGroupPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardGroupPermission relation
 *
 * @method afGuardGroupQuery leftJoinafGuardUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserGroup relation
 * @method afGuardGroupQuery rightJoinafGuardUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserGroup relation
 * @method afGuardGroupQuery innerJoinafGuardUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserGroup relation
 *
 * @method afGuardGroup findOne(PropelPDO $con = null) Return the first afGuardGroup matching the query
 * @method afGuardGroup findOneOrCreate(PropelPDO $con = null) Return the first afGuardGroup matching the query, or a new afGuardGroup object populated from the query conditions when no match is found
 *
 * @method afGuardGroup findOneByName(string $name) Return the first afGuardGroup filtered by the name column
 * @method afGuardGroup findOneByDescription(string $description) Return the first afGuardGroup filtered by the description column
 *
 * @method array findById(int $id) Return afGuardGroup objects filtered by the id column
 * @method array findByName(string $name) Return afGuardGroup objects filtered by the name column
 * @method array findByDescription(string $description) Return afGuardGroup objects filtered by the description column
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
     * @param   afGuardGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return afGuardGroupQuery
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
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   afGuardGroup|afGuardGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = afGuardGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(afGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 afGuardGroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 afGuardGroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `description` FROM `af_guard_group` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new afGuardGroup();
            $obj->hydrate($row);
            afGuardGroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return afGuardGroup|afGuardGroup[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|afGuardGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return afGuardGroupQuery The current query, for fluid interface
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
     * @return afGuardGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(afGuardGroupPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return afGuardGroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(afGuardGroupPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(afGuardGroupPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(afGuardGroupPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return afGuardGroupQuery The current query, for fluid interface
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
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return afGuardGroupQuery The current query, for fluid interface
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
     * @param   afGuardGroupPermission|PropelObjectCollection $afGuardGroupPermission  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 afGuardGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByafGuardGroupPermission($afGuardGroupPermission, $comparison = null)
    {
        if ($afGuardGroupPermission instanceof afGuardGroupPermission) {
            return $this
                ->addUsingAlias(afGuardGroupPeer::ID, $afGuardGroupPermission->getGroupId(), $comparison);
        } elseif ($afGuardGroupPermission instanceof PropelObjectCollection) {
            return $this
                ->useafGuardGroupPermissionQuery()
                ->filterByPrimaryKeys($afGuardGroupPermission->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByafGuardGroupPermission() only accepts arguments of type afGuardGroupPermission or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the afGuardGroupPermission relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return afGuardGroupQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   afGuardGroupPermissionQuery A secondary query class using the current class as primary query
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
     * @param   afGuardUserGroup|PropelObjectCollection $afGuardUserGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 afGuardGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByafGuardUserGroup($afGuardUserGroup, $comparison = null)
    {
        if ($afGuardUserGroup instanceof afGuardUserGroup) {
            return $this
                ->addUsingAlias(afGuardGroupPeer::ID, $afGuardUserGroup->getGroupId(), $comparison);
        } elseif ($afGuardUserGroup instanceof PropelObjectCollection) {
            return $this
                ->useafGuardUserGroupQuery()
                ->filterByPrimaryKeys($afGuardUserGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByafGuardUserGroup() only accepts arguments of type afGuardUserGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the afGuardUserGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return afGuardGroupQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   afGuardUserGroupQuery A secondary query class using the current class as primary query
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
     * @param   afGuardGroup $afGuardGroup Object to remove from the list of results
     *
     * @return afGuardGroupQuery The current query, for fluid interface
     */
    public function prune($afGuardGroup = null)
    {
        if ($afGuardGroup) {
            $this->addUsingAlias(afGuardGroupPeer::ID, $afGuardGroup->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
