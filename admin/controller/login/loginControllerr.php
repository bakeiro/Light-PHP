<?php

class loginController{

    public function login(){

        require(DIR_SYSTEM.'library/login.php');
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $login_class = new Login($user,$pass);
        $login_state = $login_class->connect();


        if($login_state === false){

            //Return to admin
            echo 'back';

        }else{

            //Access the website
            echo 'success';
        }
    }
}