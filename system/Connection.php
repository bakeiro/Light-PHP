<?php

class Connection{

    static function getConnection(){
        $CONN = new PDO('mysql:host='.CONN_HOST.';dbname='.CONN_DDBB,CONN_USER,CONN_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $CONN->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $CONN;
    }

    static function makeQuery($sql_query){
        $query_data = $GLOBALS['CONN']->query($sql_query)->fetchAll(2);
        return $query_data;
    }

    static function execQuery($query){
        $rows = $GLOBALS['CONN']->exec($query);
        if($rows === 0){
            $_SESSION['errors'][] = 'The query '.$query.' didn\'t affect the database';
        }
        return $rows;
    }

    static function getLastId(){
        return $GLOBALS['CONN']->lastInsertId();
    }

    static function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
}


