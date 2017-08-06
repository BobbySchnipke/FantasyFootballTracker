<?php

namespace Base;

use \Teams as ChildTeams;
use \TeamsQuery as ChildTeamsQuery;
use \Exception;
use \PDO;
use Map\TeamsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'teams' table.
 *
 *
 *
 * @method     ChildTeamsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTeamsQuery orderByLeagueId($order = Criteria::ASC) Order by the league_id column
 * @method     ChildTeamsQuery orderByTeamName($order = Criteria::ASC) Order by the team_name column
 * @method     ChildTeamsQuery orderByTeamOwner($order = Criteria::ASC) Order by the team_owner column
 *
 * @method     ChildTeamsQuery groupById() Group by the id column
 * @method     ChildTeamsQuery groupByLeagueId() Group by the league_id column
 * @method     ChildTeamsQuery groupByTeamName() Group by the team_name column
 * @method     ChildTeamsQuery groupByTeamOwner() Group by the team_owner column
 *
 * @method     ChildTeamsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTeamsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTeamsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTeamsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTeamsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTeamsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTeamsQuery leftJoinLeagues($relationAlias = null) Adds a LEFT JOIN clause to the query using the Leagues relation
 * @method     ChildTeamsQuery rightJoinLeagues($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Leagues relation
 * @method     ChildTeamsQuery innerJoinLeagues($relationAlias = null) Adds a INNER JOIN clause to the query using the Leagues relation
 *
 * @method     ChildTeamsQuery joinWithLeagues($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Leagues relation
 *
 * @method     ChildTeamsQuery leftJoinWithLeagues() Adds a LEFT JOIN clause and with to the query using the Leagues relation
 * @method     ChildTeamsQuery rightJoinWithLeagues() Adds a RIGHT JOIN clause and with to the query using the Leagues relation
 * @method     ChildTeamsQuery innerJoinWithLeagues() Adds a INNER JOIN clause and with to the query using the Leagues relation
 *
 * @method     \LeaguesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTeams findOne(ConnectionInterface $con = null) Return the first ChildTeams matching the query
 * @method     ChildTeams findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTeams matching the query, or a new ChildTeams object populated from the query conditions when no match is found
 *
 * @method     ChildTeams findOneById(int $id) Return the first ChildTeams filtered by the id column
 * @method     ChildTeams findOneByLeagueId(int $league_id) Return the first ChildTeams filtered by the league_id column
 * @method     ChildTeams findOneByTeamName(string $team_name) Return the first ChildTeams filtered by the team_name column
 * @method     ChildTeams findOneByTeamOwner(string $team_owner) Return the first ChildTeams filtered by the team_owner column *

 * @method     ChildTeams requirePk($key, ConnectionInterface $con = null) Return the ChildTeams by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOne(ConnectionInterface $con = null) Return the first ChildTeams matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeams requireOneById(int $id) Return the first ChildTeams filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByLeagueId(int $league_id) Return the first ChildTeams filtered by the league_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByTeamName(string $team_name) Return the first ChildTeams filtered by the team_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByTeamOwner(string $team_owner) Return the first ChildTeams filtered by the team_owner column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeams[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTeams objects based on current ModelCriteria
 * @method     ChildTeams[]|ObjectCollection findById(int $id) Return ChildTeams objects filtered by the id column
 * @method     ChildTeams[]|ObjectCollection findByLeagueId(int $league_id) Return ChildTeams objects filtered by the league_id column
 * @method     ChildTeams[]|ObjectCollection findByTeamName(string $team_name) Return ChildTeams objects filtered by the team_name column
 * @method     ChildTeams[]|ObjectCollection findByTeamOwner(string $team_owner) Return ChildTeams objects filtered by the team_owner column
 * @method     ChildTeams[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TeamsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TeamsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'fftracker_db', $modelName = '\\Teams', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTeamsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTeamsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTeamsQuery) {
            return $criteria;
        }
        $query = new ChildTeamsQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTeams|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TeamsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TeamsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTeams A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, league_id, team_name, team_owner FROM teams WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTeams $obj */
            $obj = new ChildTeams();
            $obj->hydrate($row);
            TeamsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTeams|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TeamsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TeamsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the league_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLeagueId(1234); // WHERE league_id = 1234
     * $query->filterByLeagueId(array(12, 34)); // WHERE league_id IN (12, 34)
     * $query->filterByLeagueId(array('min' => 12)); // WHERE league_id > 12
     * </code>
     *
     * @see       filterByLeagues()
     *
     * @param     mixed $leagueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByLeagueId($leagueId = null, $comparison = null)
    {
        if (is_array($leagueId)) {
            $useMinMax = false;
            if (isset($leagueId['min'])) {
                $this->addUsingAlias(TeamsTableMap::COL_LEAGUE_ID, $leagueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($leagueId['max'])) {
                $this->addUsingAlias(TeamsTableMap::COL_LEAGUE_ID, $leagueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_LEAGUE_ID, $leagueId, $comparison);
    }

    /**
     * Filter the query on the team_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamName('fooValue');   // WHERE team_name = 'fooValue'
     * $query->filterByTeamName('%fooValue%', Criteria::LIKE); // WHERE team_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teamName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByTeamName($teamName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teamName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_TEAM_NAME, $teamName, $comparison);
    }

    /**
     * Filter the query on the team_owner column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamOwner('fooValue');   // WHERE team_owner = 'fooValue'
     * $query->filterByTeamOwner('%fooValue%', Criteria::LIKE); // WHERE team_owner LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teamOwner The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByTeamOwner($teamOwner = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teamOwner)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_TEAM_OWNER, $teamOwner, $comparison);
    }

    /**
     * Filter the query by a related \Leagues object
     *
     * @param \Leagues|ObjectCollection $leagues The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByLeagues($leagues, $comparison = null)
    {
        if ($leagues instanceof \Leagues) {
            return $this
                ->addUsingAlias(TeamsTableMap::COL_LEAGUE_ID, $leagues->getId(), $comparison);
        } elseif ($leagues instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamsTableMap::COL_LEAGUE_ID, $leagues->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLeagues() only accepts arguments of type \Leagues or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Leagues relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function joinLeagues($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Leagues');

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
            $this->addJoinObject($join, 'Leagues');
        }

        return $this;
    }

    /**
     * Use the Leagues relation Leagues object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LeaguesQuery A secondary query class using the current class as primary query
     */
    public function useLeaguesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLeagues($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Leagues', '\LeaguesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTeams $teams Object to remove from the list of results
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function prune($teams = null)
    {
        if ($teams) {
            $this->addUsingAlias(TeamsTableMap::COL_ID, $teams->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the teams table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TeamsTableMap::clearInstancePool();
            TeamsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TeamsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TeamsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TeamsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TeamsQuery
