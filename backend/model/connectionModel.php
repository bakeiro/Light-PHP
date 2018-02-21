<?php

class connectionModel{

    static function getConnection($host,$user,$pass,$ddbb){
        $CONN = new PDO('mysql:host='.$host.';dbname='.$ddbb,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $CONN->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $CONN;
    }
}