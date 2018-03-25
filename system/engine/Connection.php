<?php

class Connection{

	public static $CONN;

    static function getConnection(){
       return Connection::$CONN;
    }

   	static function makeQuery($sql_query){
		
		$data = array();
		$query = Connection::$CONN->query($sql_query);

		while ($row = $query->fetch_assoc()) {
			$data[] = $row;
		}
		$query->close();

		if(count($data) === 0){
			$data = false;
		}
		if(count($data) === 1){
			$data = $data[0];
		}
		return $data;
    }

    static function execQuery($query){
        Connection::$CONN->query($query);
    }

    static function getLastId(){
        return Connection::$CONN->insert_id();
    }

    static function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
}