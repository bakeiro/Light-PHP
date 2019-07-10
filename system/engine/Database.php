<?php

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

    public static function destruct()
    {
        //More info about this here: https://php.net/pdo.connections
        //KILL CONNECTION_ID()
        Database::$CONN->query('SELECT pg_terminate_backend(pg_backend_pid());');
        Database::$CONN = null;
    }
}
