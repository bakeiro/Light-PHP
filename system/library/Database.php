<?php

namespace Library;

/**
 * Database abstraction class, used to interact in a simple way with the database, making the things less complicated than needed
 */
class Database
{
    private $_connection;
    private $_host;
    private $_user;
    private $_db_name;
    private $_pass;
    private $_console; // used for debug

    public function __construct($host, $user, $db_name, $pass, $console)
    {
        $this->_host = $host;
        $this->_user = $user;
        $this->_db_name = $db_name;
        $this->_pass = $pass;
        $this->_console = $console;
    }

    /**
     * Executes the SQL query in the 1st param, and replaces the values in it using the array in the second param
     *
     * @param string $sql_query SQL query statement to execute
     * @param array  $params    array containing all the values to replace in the $sql_query variable to do safe prepare statements
     *
     * @return array|boolean
     */
    public function query(string $sql_query, array $params = array())
    {
        $this->_console->addQuery($sql_query);

        $smtp = $this->_connection->prepare($sql_query);
        $smtp->setFetchMode(\PDO::FETCH_ASSOC);
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
                $data = $this->_connection->lastInsertId();
            }
        }

        return $data;
    }

    /**
     * Get the last id of the inserted value in the database
     */
    public function getLastId(): int
    {
        return $this->_connection->lastInsertId();
    }

    /**
     * Initializes the database connections
     */
    public function initialize(): void
    {
        try {
            $temp_connection = new \PDO("mysql:host=" . $this->_host . ";port=3306;dbname=" . $this->_db_name, $this->_user, $this->_pass);
            $temp_connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false); // true prepare statements

            $temp_connection->exec("SET NAMES 'utf8'");
            $temp_connection->exec("SET CHARACTER SET utf8");
            $temp_connection->exec("SET CHARACTER_SET_CONNECTION=utf8");

            $this->_connection = $temp_connection;
        } catch (\Throwable $th) {
            $this->_console->addDebugInfo("Error loading database");
        }
    }

    /**
     * Kills the database connection, more info: https://php.net/pdo.connections
     */
    public function destruct(): void
    {
        //More info about this here: https://php.net/pdo.connections
        //KILL CONNECTION_ID()
        $this->_connection->query('SELECT pg_terminate_backend(pg_backend_pid());');
        $this->_connection = null;
    }
}
