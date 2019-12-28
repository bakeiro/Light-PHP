<?php

namespace Library;

class Database
{
    public static $CONN;

    public static function getDatabase()
    {
        return Database::$CONN;
    }

    public static function query($sql_query, $params = array())
    {

        //Console
        Console::addQuery($sql_query);

        //Exec
        $smtp = Database::$CONN->prepare($sql_query);
        $smtp->setFetchMode(PDO::FETCH_ASSOC);
        $query = $smtp->execute($params);

        $data = array();

        //Select
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

            //Insert (return last id generated)
            if (strpos($sql_query, "INSERT INTO") !== false) {
                $data = Database::$CONN->lastInsertId();
            }
        }

        return $data;
    }

    public static function getLastId()
    {
        return Database::$CONN->lastInsertId();
    }

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

    public static function destruct()
    {
        //More info about this here: https://php.net/pdo.connections
        //KILL CONNECTION_ID()
        Database::$CONN->query('SELECT pg_terminate_backend(pg_backend_pid());');
        Database::$CONN = null;
    }
}
