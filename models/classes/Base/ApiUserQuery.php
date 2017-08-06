<?php

namespace Base;

use \ApiUser as ChildApiUser;
use \ApiUserQuery as ChildApiUserQuery;
use \Exception;
use \PDO;
use Map\ApiUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'api_user' table.
 *
 *
 *
 * @method     ChildApiUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildApiUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildApiUserQuery orderByApiKey($order = Criteria::ASC) Order by the api_key column
 * @method     ChildApiUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildApiUserQuery orderByRestrictIp($order = Criteria::ASC) Order by the restrict_ip column
 * @method     ChildApiUserQuery orderByRestrictRoute($order = Criteria::ASC) Order by the restrict_route column
 *
 * @method     ChildApiUserQuery groupById() Group by the id column
 * @method     ChildApiUserQuery groupByUsername() Group by the username column
 * @method     ChildApiUserQuery groupByApiKey() Group by the api_key column
 * @method     ChildApiUserQuery groupByPassword() Group by the password column
 * @method     ChildApiUserQuery groupByRestrictIp() Group by the restrict_ip column
 * @method     ChildApiUserQuery groupByRestrictRoute() Group by the restrict_route column
 *
 * @method     ChildApiUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildApiUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildApiUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildApiUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildApiUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildApiUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildApiUser findOne(ConnectionInterface $con = null) Return the first ChildApiUser matching the query
 * @method     ChildApiUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildApiUser matching the query, or a new ChildApiUser object populated from the query conditions when no match is found
 *
 * @method     ChildApiUser findOneById(int $id) Return the first ChildApiUser filtered by the id column
 * @method     ChildApiUser findOneByUsername(string $username) Return the first ChildApiUser filtered by the username column
 * @method     ChildApiUser findOneByApiKey(string $api_key) Return the first ChildApiUser filtered by the api_key column
 * @method     ChildApiUser findOneByPassword(string $password) Return the first ChildApiUser filtered by the password column
 * @method     ChildApiUser findOneByRestrictIp(boolean $restrict_ip) Return the first ChildApiUser filtered by the restrict_ip column
 * @method     ChildApiUser findOneByRestrictRoute(boolean $restrict_route) Return the first ChildApiUser filtered by the restrict_route column *

 * @method     ChildApiUser requirePk($key, ConnectionInterface $con = null) Return the ChildApiUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOne(ConnectionInterface $con = null) Return the first ChildApiUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildApiUser requireOneById(int $id) Return the first ChildApiUser filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOneByUsername(string $username) Return the first ChildApiUser filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOneByApiKey(string $api_key) Return the first ChildApiUser filtered by the api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOneByPassword(string $password) Return the first ChildApiUser filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOneByRestrictIp(boolean $restrict_ip) Return the first ChildApiUser filtered by the restrict_ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApiUser requireOneByRestrictRoute(boolean $restrict_route) Return the first ChildApiUser filtered by the restrict_route column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildApiUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildApiUser objects based on current ModelCriteria
 * @method     ChildApiUser[]|ObjectCollection findById(int $id) Return ChildApiUser objects filtered by the id column
 * @method     ChildApiUser[]|ObjectCollection findByUsername(string $username) Return ChildApiUser objects filtered by the username column
 * @method     ChildApiUser[]|ObjectCollection findByApiKey(string $api_key) Return ChildApiUser objects filtered by the api_key column
 * @method     ChildApiUser[]|ObjectCollection findByPassword(string $password) Return ChildApiUser objects filtered by the password column
 * @method     ChildApiUser[]|ObjectCollection findByRestrictIp(boolean $restrict_ip) Return ChildApiUser objects filtered by the restrict_ip column
 * @method     ChildApiUser[]|ObjectCollection findByRestrictRoute(boolean $restrict_route) Return ChildApiUser objects filtered by the restrict_route column
 * @method     ChildApiUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ApiUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ApiUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'fftracker_auth', $modelName = '\\ApiUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildApiUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildApiUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildApiUserQuery) {
            return $criteria;
        }
        $query = new ChildApiUserQuery();
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
     * @return ChildApiUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ApiUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ApiUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildApiUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, username, api_key, password, restrict_ip, restrict_route FROM api_user WHERE id = :p0';
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
            /** @var ChildApiUser $obj */
            $obj = new ChildApiUser();
            $obj->hydrate($row);
            ApiUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildApiUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ApiUserTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ApiUserTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ApiUserTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ApiUserTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the api_key column
     *
     * Example usage:
     * <code>
     * $query->filterByApiKey('fooValue');   // WHERE api_key = 'fooValue'
     * $query->filterByApiKey('%fooValue%', Criteria::LIKE); // WHERE api_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apiKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByApiKey($apiKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apiKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_API_KEY, $apiKey, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the restrict_ip column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictIp(true); // WHERE restrict_ip = true
     * $query->filterByRestrictIp('yes'); // WHERE restrict_ip = true
     * </code>
     *
     * @param     boolean|string $restrictIp The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByRestrictIp($restrictIp = null, $comparison = null)
    {
        if (is_string($restrictIp)) {
            $restrictIp = in_array(strtolower($restrictIp), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_RESTRICT_IP, $restrictIp, $comparison);
    }

    /**
     * Filter the query on the restrict_route column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictRoute(true); // WHERE restrict_route = true
     * $query->filterByRestrictRoute('yes'); // WHERE restrict_route = true
     * </code>
     *
     * @param     boolean|string $restrictRoute The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function filterByRestrictRoute($restrictRoute = null, $comparison = null)
    {
        if (is_string($restrictRoute)) {
            $restrictRoute = in_array(strtolower($restrictRoute), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ApiUserTableMap::COL_RESTRICT_ROUTE, $restrictRoute, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildApiUser $apiUser Object to remove from the list of results
     *
     * @return $this|ChildApiUserQuery The current query, for fluid interface
     */
    public function prune($apiUser = null)
    {
        if ($apiUser) {
            $this->addUsingAlias(ApiUserTableMap::COL_ID, $apiUser->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the api_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApiUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ApiUserTableMap::clearInstancePool();
            ApiUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ApiUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ApiUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ApiUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ApiUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ApiUserQuery
