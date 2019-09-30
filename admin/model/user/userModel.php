<?php

class userModel
{

    public function checkLogin($user_email, $input_pass)
    {
        //Already escaped! see Util::cleanInput();
        $user_email = strtolower($user_email);

        $params = array(":email" => $user_email);
        $customer_query = Database::query("SELECT * FROM `user` WHERE LOWER(`email`) = :email", $params);

        if(password_verify($input_pass, $customer_query["password"])) {
            return $customer_query;
        } else {
            return NULL;
        }
    }
}
