<?php

class Connection{

	private $CONN;

	function Connection(){
		$temp_con = new PDO('mysql:host='.CONN_HOST.';dbname='.CONN_DDBB,CONN_USER,CONN_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $temp_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->CONN = $temp_con;
	}

    function getConnection(){
       return $this->$CONN;
    }

    function makeQuery($sql_query){
        $query_data = $this->CONN->query($sql_query)->fetchAll(2);
        return $query_data;
    }

    function execQuery($query){
        $rows = $this->CONN->exec($query);
        if($rows === 0){
            $_SESSION['errors'][] = 'The query '.$query.' didn\'t affect the database';
        }
        return $rows;
    }

    function getLastId(){
        return $this->CONN->lastInsertId();
    }

    function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
}