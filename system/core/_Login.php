<?php

class Login{

    private $user_id;
    private $username;
    private $pass;

    function __construct($username, $password){
        $this->username = $username;
        $this->pass = $password;
    }

    public function connect(){

        $loged = false;
        $username = $this->username;
        $password = $this->pass;

        $result = Connection::makeQuery("SELECT * FROM `user` WHERE username = '" . $this->escape($username) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->escape($password) . "'))))) OR password = '" . $this->escape(md5($password)) . "') AND status = '1'");

        if(count($result) === 1){
            $this->user_id = $result[0]['user_id'];
            $loged = true;
        }

        if ($loged) {
            return true;
        } else {
            return false;
        }
    }

    public function escape($value){
        return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
    }

    public function setUser($user_name){
        $this->my_user = $user_name;
    }
}