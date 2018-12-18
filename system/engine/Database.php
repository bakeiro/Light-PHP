<?php

class Database{

	public static $CONN;

    static function getDatabase(){
       return Database::$CONN;
    }

   	static function query($sql_query){
		
		$data = array();
		$query = Database::$CONN->query($sql_query);

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

			//Insert (return last id generated)
			if(strpos($sql_query, "INSERT INTO")){
				$data = Database::$CONN->insert_id();
			}

		}

		return $data;
    }

    static function getLastId(){
        return Database::$CONN->insert_id();
    }
}