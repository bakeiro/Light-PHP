<?php

class Database{

	public static $CONN;

	static function getDatabase(){
		return Database::$CONN;
	}

  	static function query($sql_query, $params = array()){
		
		//Console
		Console::addQuery($sql_query);

		//Exec
		$smtp = Database::$CONN->prepare($sql_query);
		$smtp->setFetchMode(PDO::FETCH_ASSOC);
		$query = $smtp->execute($params);
		
		$data = array();
				
		//Select
		if($query){			
			while ($row = $smtp->fetch()) {
				$data[] = $row;
			}
			$smtp = null;

			if(count($data) === 1){
				$data = $data[0];
			}
			if(count($data) === 0){
				$data = false;
			}
			
			//Insert (return last id generated)
			if(strpos($sql_query, "INSERT INTO") !== false){
				$data = Database::$CONN->lastInsertId();
			}
		}

		return $data;
  	}

    static function getLastId(){
        return Database::$CONN->lastInsertId();
	}
	
	static function destruct(){
		//Database::$CONN->query('SELECT pg_terminate_backend(pg_backend_pid());');
		Database::$CONN = null;
	}
}