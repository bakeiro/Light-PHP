<?php
class customerModel extends SecModel
{

    public function getCustomer($email)
    {
        $customer = Database::query("SELECT * FROM user WHERE `email` = :email", array(":email" => $email));
        return $customer;
    }

    public function getCustomerById($id)
    {
        $customer = Database::query("SELECT * FROM user WHERE `id` = :id", array(":id" => $id));
        return $customer;
    }

    public function encryptPass($entry_pass)
    {
        $encrypted_pass = password_hash($entry_pass, PASSWORD_BCRYPT);
        return $encrypted_pass;
    }

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
