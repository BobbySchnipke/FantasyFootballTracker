<?php

namespace Base;

use \Test table as ChildTest table;
use \Test tableQuery as ChildTest tableQuery;
use \Exception;
use Map\Test tableTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'test table' table.
 *
 *
 *
 * @method     ChildTest tableQuery orderByAsd($order = Criteria::ASC) Order by the asd column
 * @method     ChildTest tableQuery orderByGdsg($order = Criteria::ASC) Order by the gdsg column
 * @method     ChildTest tableQuery orderByGhdf($order = Criteria::ASC) Order by the ghdf column
 * @method     ChildTest tableQuery orderByEr($order = Criteria::ASC) Order by the er column
 *
 * @method     ChildTest tableQuery groupByAsd() Group by the asd column
 * @method     ChildTest tableQuery groupByGdsg() Group by the gdsg column
 * @method     ChildTest tableQuery groupByGhdf() Group by the ghdf column
 * @method     ChildTest tableQuery groupByEr() Group by the er column
 *
 * @method     ChildTest tableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTest tableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTest tableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTest tableQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTest tableQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTest tableQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTest table findOne(ConnectionInterface $con = null) Return the first ChildTest table matching the query
 * @method     ChildTest table findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTest table matching the query, or a new ChildTest table object populated from the query conditions when no match is found
 *
 * @method     ChildTest table findOneByAsd(int $asd) Return the first ChildTest table filtered by the asd column
 * @method     ChildTest table findOneByGdsg(int $gdsg) Return the first ChildTest table filtered by the gdsg column
 * @method     ChildTest table findOneByGhdf(int $ghdf) Return the first ChildTest table filtered by the ghdf column
 * @method     ChildTest table findOneByEr(int $er) Return the first ChildTest table filtered by the er column *

 * @method     ChildTest table requirePk($key, ConnectionInterface $con = null) Return the ChildTest table by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTest table requireOne(ConnectionInterface $con = null) Return the first ChildTest table matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTest table requireOneByAsd(int $asd) Return the first ChildTest table filtered by the asd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTest table requireOneByGdsg(int $gdsg) Return the first ChildTest table filtered by the gdsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTest table requireOneByGhdf(int $ghdf) Return the first ChildTest table filtered by the ghdf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTest table requireOneByEr(int $er) Return the first ChildTest table filtered by the er column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTest table[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTest table objects based on current ModelCriteria
 * @method     ChildTest table[]|ObjectCollection findByAsd(int $asd) Return ChildTest table objects filtered by the asd column
 * @method     ChildTest table[]|ObjectCollection findByGdsg(int $gdsg) Return ChildTest table objects filtered by the gdsg column
 * @method     ChildTest table[]|ObjectCollection findByGhdf(int $ghdf) Return ChildTest table objects filtered by the ghdf column
 * @method     ChildTest table[]|ObjectCollection findByEr(int $er) Return ChildTest table objects filtered by the er column
 * @method     ChildTest table[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class Test tableQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\Test tableQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'fftracker_db', $modelName = '\\Test table', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTest tableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTest tableQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTest tableQuery) {
            return $criteria;
        }
        $query = new ChildTest tableQuery();
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
     * @return ChildTest table|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Test table object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Test table object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Test table object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Test table object has no primary key');
    }

    /**
     * Filter the query on the asd column
     *
     * Example usage:
     * <code>
     * $query->filterByAsd(1234); // WHERE asd = 1234
     * $query->filterByAsd(array(12, 34)); // WHERE asd IN (12, 34)
     * $query->filterByAsd(array('min' => 12)); // WHERE asd > 12
     * </code>
     *
     * @param     mixed $asd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByAsd($asd = null, $comparison = null)
    {
        if (is_array($asd)) {
            $useMinMax = false;
            if (isset($asd['min'])) {
                $this->addUsingAlias(Test tableTableMap::COL_ASD, $asd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asd['max'])) {
                $this->addUsingAlias(Test tableTableMap::COL_ASD, $asd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Test tableTableMap::COL_ASD, $asd, $comparison);
    }

    /**
     * Filter the query on the gdsg column
     *
     * Example usage:
     * <code>
     * $query->filterByGdsg(1234); // WHERE gdsg = 1234
     * $query->filterByGdsg(array(12, 34)); // WHERE gdsg IN (12, 34)
     * $query->filterByGdsg(array('min' => 12)); // WHERE gdsg > 12
     * </code>
     *
     * @param     mixed $gdsg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByGdsg($gdsg = null, $comparison = null)
    {
        if (is_array($gdsg)) {
            $useMinMax = false;
            if (isset($gdsg['min'])) {
                $this->addUsingAlias(Test tableTableMap::COL_GDSG, $gdsg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gdsg['max'])) {
                $this->addUsingAlias(Test tableTableMap::COL_GDSG, $gdsg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Test tableTableMap::COL_GDSG, $gdsg, $comparison);
    }

    /**
     * Filter the query on the ghdf column
     *
     * Example usage:
     * <code>
     * $query->filterByGhdf(1234); // WHERE ghdf = 1234
     * $query->filterByGhdf(array(12, 34)); // WHERE ghdf IN (12, 34)
     * $query->filterByGhdf(array('min' => 12)); // WHERE ghdf > 12
     * </code>
     *
     * @param     mixed $ghdf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByGhdf($ghdf = null, $comparison = null)
    {
        if (is_array($ghdf)) {
            $useMinMax = false;
            if (isset($ghdf['min'])) {
                $this->addUsingAlias(Test tableTableMap::COL_GHDF, $ghdf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ghdf['max'])) {
                $this->addUsingAlias(Test tableTableMap::COL_GHDF, $ghdf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Test tableTableMap::COL_GHDF, $ghdf, $comparison);
    }

    /**
     * Filter the query on the er column
     *
     * Example usage:
     * <code>
     * $query->filterByEr(1234); // WHERE er = 1234
     * $query->filterByEr(array(12, 34)); // WHERE er IN (12, 34)
     * $query->filterByEr(array('min' => 12)); // WHERE er > 12
     * </code>
     *
     * @param     mixed $er The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function filterByEr($er = null, $comparison = null)
    {
        if (is_array($er)) {
            $useMinMax = false;
            if (isset($er['min'])) {
                $this->addUsingAlias(Test tableTableMap::COL_ER, $er['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($er['max'])) {
                $this->addUsingAlias(Test tableTableMap::COL_ER, $er['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Test tableTableMap::COL_ER, $er, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTest table $test table Object to remove from the list of results
     *
     * @return $this|ChildTest tableQuery The current query, for fluid interface
     */
    public function prune($test table = null)
    {
        if ($test table) {
            throw new LogicException('Test table object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the test table table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Test tableTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Test tableTableMap::clearInstancePool();
            Test tableTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(Test tableTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(Test tableTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            Test tableTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            Test tableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // Test tableQuery
