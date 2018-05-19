<?php

class Connection{

	public static $CONN;

    static function getConnection(){
       return Connection::$CONN;
    }

   	static function query($sql_query){
		
		$data = array();
		$query = Connection::$CONN->query($sql_query);

		//Select
		if(gettype($query) === "object"){
			
			while ($row = $query->fetch_assoc()) {
				$data[] = $row;
			}

			if(count($data) === 0){
				$data = false;
			}
			if(count($data) === 1){
				$data = $data[0];
			}
			
			$query->close();
		}else{

			//Insert
			if(strpos($sql_query, "INSERT INTO")){
				$data = Connection::$CONN->insert_id();
			}

		}

		return $data;
    }

    static function getLastId(){
        return Connection::$CONN->insert_id();
    }
}