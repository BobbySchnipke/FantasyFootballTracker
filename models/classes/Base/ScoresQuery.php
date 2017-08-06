<?php

namespace Base;

use \Scores as ChildScores;
use \ScoresQuery as ChildScoresQuery;
use \Exception;
use \PDO;
use Map\ScoresTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'scores' table.
 *
 *
 *
 * @method     ChildScoresQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildScoresQuery orderByWeek($order = Criteria::ASC) Order by the week column
 * @method     ChildScoresQuery orderByTeam($order = Criteria::ASC) Order by the team column
 * @method     ChildScoresQuery orderByOpponent($order = Criteria::ASC) Order by the opponent column
 * @method     ChildScoresQuery orderByTeamScore($order = Criteria::ASC) Order by the team_score column
 * @method     ChildScoresQuery orderByOpponentScore($order = Criteria::ASC) Order by the opponent_score column
 * @method     ChildScoresQuery orderByOutcome($order = Criteria::ASC) Order by the outcome column
 *
 * @method     ChildScoresQuery groupById() Group by the id column
 * @method     ChildScoresQuery groupByWeek() Group by the week column
 * @method     ChildScoresQuery groupByTeam() Group by the team column
 * @method     ChildScoresQuery groupByOpponent() Group by the opponent column
 * @method     ChildScoresQuery groupByTeamScore() Group by the team_score column
 * @method     ChildScoresQuery groupByOpponentScore() Group by the opponent_score column
 * @method     ChildScoresQuery groupByOutcome() Group by the outcome column
 *
 * @method     ChildScoresQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildScoresQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildScoresQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildScoresQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildScoresQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildScoresQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildScores findOne(ConnectionInterface $con = null) Return the first ChildScores matching the query
 * @method     ChildScores findOneOrCreate(ConnectionInterface $con = null) Return the first ChildScores matching the query, or a new ChildScores object populated from the query conditions when no match is found
 *
 * @method     ChildScores findOneById(int $id) Return the first ChildScores filtered by the id column
 * @method     ChildScores findOneByWeek(int $week) Return the first ChildScores filtered by the week column
 * @method     ChildScores findOneByTeam(string $team) Return the first ChildScores filtered by the team column
 * @method     ChildScores findOneByOpponent(string $opponent) Return the first ChildScores filtered by the opponent column
 * @method     ChildScores findOneByTeamScore(int $team_score) Return the first ChildScores filtered by the team_score column
 * @method     ChildScores findOneByOpponentScore(int $opponent_score) Return the first ChildScores filtered by the opponent_score column
 * @method     ChildScores findOneByOutcome(string $outcome) Return the first ChildScores filtered by the outcome column *

 * @method     ChildScores requirePk($key, ConnectionInterface $con = null) Return the ChildScores by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOne(ConnectionInterface $con = null) Return the first ChildScores matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildScores requireOneById(int $id) Return the first ChildScores filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByWeek(int $week) Return the first ChildScores filtered by the week column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByTeam(string $team) Return the first ChildScores filtered by the team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByOpponent(string $opponent) Return the first ChildScores filtered by the opponent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByTeamScore(int $team_score) Return the first ChildScores filtered by the team_score column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByOpponentScore(int $opponent_score) Return the first ChildScores filtered by the opponent_score column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildScores requireOneByOutcome(string $outcome) Return the first ChildScores filtered by the outcome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildScores[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildScores objects based on current ModelCriteria
 * @method     ChildScores[]|ObjectCollection findById(int $id) Return ChildScores objects filtered by the id column
 * @method     ChildScores[]|ObjectCollection findByWeek(int $week) Return ChildScores objects filtered by the week column
 * @method     ChildScores[]|ObjectCollection findByTeam(string $team) Return ChildScores objects filtered by the team column
 * @method     ChildScores[]|ObjectCollection findByOpponent(string $opponent) Return ChildScores objects filtered by the opponent column
 * @method     ChildScores[]|ObjectCollection findByTeamScore(int $team_score) Return ChildScores objects filtered by the team_score column
 * @method     ChildScores[]|ObjectCollection findByOpponentScore(int $opponent_score) Return ChildScores objects filtered by the opponent_score column
 * @method     ChildScores[]|ObjectCollection findByOutcome(string $outcome) Return ChildScores objects filtered by the outcome column
 * @method     ChildScores[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ScoresQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ScoresQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'fftracker_db', $modelName = '\\Scores', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildScoresQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildScoresQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildScoresQuery) {
            return $criteria;
        }
        $query = new ChildScoresQuery();
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
     * @return ChildScores|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ScoresTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ScoresTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildScores A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, week, team, opponent, team_score, opponent_score, outcome FROM scores WHERE id = :p0';
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
            /** @var ChildScores $obj */
            $obj = new ChildScores();
            $obj->hydrate($row);
            ScoresTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildScores|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ScoresTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ScoresTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ScoresTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ScoresTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the week column
     *
     * Example usage:
     * <code>
     * $query->filterByWeek(1234); // WHERE week = 1234
     * $query->filterByWeek(array(12, 34)); // WHERE week IN (12, 34)
     * $query->filterByWeek(array('min' => 12)); // WHERE week > 12
     * </code>
     *
     * @param     mixed $week The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByWeek($week = null, $comparison = null)
    {
        if (is_array($week)) {
            $useMinMax = false;
            if (isset($week['min'])) {
                $this->addUsingAlias(ScoresTableMap::COL_WEEK, $week['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($week['max'])) {
                $this->addUsingAlias(ScoresTableMap::COL_WEEK, $week['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_WEEK, $week, $comparison);
    }

    /**
     * Filter the query on the team column
     *
     * Example usage:
     * <code>
     * $query->filterByTeam('fooValue');   // WHERE team = 'fooValue'
     * $query->filterByTeam('%fooValue%', Criteria::LIKE); // WHERE team LIKE '%fooValue%'
     * </code>
     *
     * @param     string $team The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByTeam($team = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($team)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_TEAM, $team, $comparison);
    }

    /**
     * Filter the query on the opponent column
     *
     * Example usage:
     * <code>
     * $query->filterByOpponent('fooValue');   // WHERE opponent = 'fooValue'
     * $query->filterByOpponent('%fooValue%', Criteria::LIKE); // WHERE opponent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $opponent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByOpponent($opponent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($opponent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_OPPONENT, $opponent, $comparison);
    }

    /**
     * Filter the query on the team_score column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamScore(1234); // WHERE team_score = 1234
     * $query->filterByTeamScore(array(12, 34)); // WHERE team_score IN (12, 34)
     * $query->filterByTeamScore(array('min' => 12)); // WHERE team_score > 12
     * </code>
     *
     * @param     mixed $teamScore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByTeamScore($teamScore = null, $comparison = null)
    {
        if (is_array($teamScore)) {
            $useMinMax = false;
            if (isset($teamScore['min'])) {
                $this->addUsingAlias(ScoresTableMap::COL_TEAM_SCORE, $teamScore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($teamScore['max'])) {
                $this->addUsingAlias(ScoresTableMap::COL_TEAM_SCORE, $teamScore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_TEAM_SCORE, $teamScore, $comparison);
    }

    /**
     * Filter the query on the opponent_score column
     *
     * Example usage:
     * <code>
     * $query->filterByOpponentScore(1234); // WHERE opponent_score = 1234
     * $query->filterByOpponentScore(array(12, 34)); // WHERE opponent_score IN (12, 34)
     * $query->filterByOpponentScore(array('min' => 12)); // WHERE opponent_score > 12
     * </code>
     *
     * @param     mixed $opponentScore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByOpponentScore($opponentScore = null, $comparison = null)
    {
        if (is_array($opponentScore)) {
            $useMinMax = false;
            if (isset($opponentScore['min'])) {
                $this->addUsingAlias(ScoresTableMap::COL_OPPONENT_SCORE, $opponentScore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opponentScore['max'])) {
                $this->addUsingAlias(ScoresTableMap::COL_OPPONENT_SCORE, $opponentScore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_OPPONENT_SCORE, $opponentScore, $comparison);
    }

    /**
     * Filter the query on the outcome column
     *
     * Example usage:
     * <code>
     * $query->filterByOutcome('fooValue');   // WHERE outcome = 'fooValue'
     * $query->filterByOutcome('%fooValue%', Criteria::LIKE); // WHERE outcome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outcome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function filterByOutcome($outcome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outcome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScoresTableMap::COL_OUTCOME, $outcome, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildScores $scores Object to remove from the list of results
     *
     * @return $this|ChildScoresQuery The current query, for fluid interface
     */
    public function prune($scores = null)
    {
        if ($scores) {
            $this->addUsingAlias(ScoresTableMap::COL_ID, $scores->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the scores table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ScoresTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ScoresTableMap::clearInstancePool();
            ScoresTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ScoresTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ScoresTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ScoresTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ScoresTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ScoresQuery
