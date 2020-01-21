<?php

namespace Library;

/**
 * Database abstraction class, used to interact in a simple way with the database, making the things less complicated than needed
 */
class Database
{
    public static $CONN;

    /**
     * Executes the SQL query in the 1st param, and replaces the values in it using the array in the second param
     *
     * @param string $sql_query SQL query statement to execute
     * @param array  $params    array containing all the values to replace in the $sql_query variable to do safe prepare statements
     *
     * @return array|boolean
     */
    public static function query($sql_query, $params = array())
    {
        if (Database::CONN === null) {
            Database::initialize();
        }

        Console::addQuery($sql_query);

        $smtp = Database::$CONN->prepare($sql_query);
        $smtp->setFetchMode(PDO::FETCH_ASSOC);
        $query = $smtp->execute($params);

        $data = array();

        if ($query) {
            while ($row = $smtp->fetch()) {
                $data[] = $row;
            }
            $smtp = null;

            if (count($data) === 1) {
                $data = $data[0];
            }
            if (count($data) === 0) {
                $data = false;
            }

            if (strpos($sql_query, "INSERT INTO") !== false) {
                $data = Database::$CONN->lastInsertId();
            }
        }

        return $data;
    }

    /**
     * Get the last id of the inserted value in the database
     *
     * @return int
     */
    public static function getLastId()
    {
        Database::getConnection();
        return Database::$CONN->lastInsertId();
    }

    /**
     * Initializes the database connections
     *
     * @return void
     */
    public static function initialize()
    {
        try {
            $temp_con = new PDO("mysql:host=" .Config::get("CONN_HOST"). ";port=3306;dbname=" . Config::get("CONN_DDBB"), Config::get("CONN_USER"), Config::get("CONN_PASS"));
            $temp_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // true prepare statements

            $temp_con->exec("SET NAMES 'utf8'");
            $temp_con->exec("SET CHARACTER SET utf8");
            $temp_con->exec("SET CHARACTER_SET_CONNECTION=utf8");

            Database::$CONN = $temp_con;
        } catch (\Throwable $th) {
            Console::addDebugInfo("Error loading database");
        }
    }

    /**
     * Kills the database connection, more info: https://php.net/pdo.connections
     *
     * @return void
     */
    public static function destruct()
    {
        //More info about this here: https://php.net/pdo.connections
        //KILL CONNECTION_ID()
        Database::$CONN->query('SELECT pg_terminate_backend(pg_backend_pid());');
        Database::$CONN = null;
    }
}
