<?php
class Login{

    private $user_id;
    private $my_user;
    private $my_pass;
    private $user_group_id;
    private $permission;

    function __construct($username,$password){
        $this->my_user = $username;
        $this->my_pass = $password;
    }

    public function connect(){

        $loged = false;
        $username = $this->my_user;
        $password = $this->my_pass;
        require("../require/req_direct.php");
        include("../require/req_conex.php");

        $user_query = "SELECT * FROM `user` WHERE username = '" . $this->escape($username) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->escape($password) . "'))))) OR password = '" . $this->escape(md5($password)) . "') AND status = '1'";

        foreach ($CONN->query($user_query) as $row){

            $this->user_id = $row['user_id'];
            $this->username = $row['username'];
            $this->user_group_id = $row['user_group_id'];

            $sql_user_group = "SELECT permission FROM user_group WHERE user_group_id = '" . (int)$row['user_group_id'] . "'";

            foreach ($CONN->query($sql_user_group) as $row){

                $permissions = unserialize($row['permission']);

                if (is_array($permissions)) {
                    foreach ($permissions as $key => $value) {
                        $this->permission[$key] = $value;
                    }
                }
            }

            $loged = true;
        }

        if ($loged){
            return true;
        }else{
            if(session_id() == ''){
                session_start();
                session_destroy();
            }else{
                session_destroy();
            }
            return false;
        }
    }

    public function escape($value) {
        return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
    }

    public function setUser($user_name){
        $this->my_user = $user_name;
    }
}

