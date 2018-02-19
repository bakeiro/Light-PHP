<?php

class Connection{

	public $CONN;

	function __construct(){
		$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
		mysqli_set_charset($temp_con,"utf8");
		
        $this->CONN = $temp_con;
	}

    function getConnection(){
       return $this->$CONN;
    }

    function makeQuery($sql_query){
		
		$query = $this->CONN->query($sql_query);

		$data = array();

		while ($row = $query->fetch_assoc()) {
			$data[] = $row;
		}

		$query->close();
		return $data;
    }

    function execQuery($query){
        $this->CONN->query($query);
    }

    function getLastId(){
        return $this->CONN->insert_id();
    }

    function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
}