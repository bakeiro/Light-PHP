<?php

class Util{
    
    public static function arraySortByColumn(&$arr, $col, $dir = SORT_ASC) {
		
		$sort_col = array();
		
		foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
	}
	
	public static function convert($size){
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}

	public static function isAjaxRequest(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
			return TRUE;
		}
		return FALSE;
	}

	function sanitizeText($text){
		return trim(htmlentities(preg_replace("/([^a-z0-9!@#$%^&*()_\-+\]\[{}\s\n<>:\\/\.,\?;'\"]+)/i", '', $text), ENT_QUOTES, 'UTF-8'));
	}

	public function ip_address() {

		//Get IP address - if proxy lets get the REAL IP address
		if (!empty($_SERVER['REMOTE_ADDR']) AND !empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
			$ip = $_SERVER['REMOTE_ADDR'];
		} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = '0.0.0.0';
		}
		
		return $ip;
	}	

	public static function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
	
	static function cleanInput(){

		function array_clean(&$value) {
			$value = trim($value); //Duplicated values
			$value = strip_tags($value); //Avoid XSS attacks
			$value = Util::escape($value); //SQL injections
		}
		
		array_walk_recursive($_GET, 'array_clean');
		array_walk_recursive($_POST, 'array_clean');
		//array_walk_recursive($_COOKIE, 'array_clean');
	}

	static function generateSimpleToken($length){
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet);
   
	   for ($i=0; $i < $length; $i++) {
		   $token .= $codeAlphabet[random_int(0, $max-1)];
	   }
   
	   return $token;
	}
	
	static function generateCSRFToken(){
		return bin2hex(random_bytes(32));
	}

	static function checkPostCSRFToken(){

		if($_SERVER["REQUEST_METHOD"] === "POST"){
			if(isset($_POST["csrf_token"])){
				if(!hash_equals(Session::get("csrf_token"), $_POST["csrf_token"])){
					throw new Exception('The CSRF token doesn\'t match!');
				}
			}else{
				throw new Exception('The CSRF token was not defined');
			}
		}

	}
}