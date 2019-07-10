<?php
class customerModel extends SecModel
{

    public function getCustomer($email)
    {
        $customer = Database::query("SELECT * FROM user WHERE `email` = '" . $email . "'");
        return $customer;
    }

    public function getCustomerById($id)
    {
        $customer = Database::query("SELECT * FROM user WHERE `id` = '" . $id . "'");
        return $customer;
    }

    public function encryptPass($entry_pass)
    {
        $salt = Util::generateSimpleToken(9);
        $output_pass = sha1($salt . sha1($salt . sha1($entry_pass)));

        return array("db_pass" => $output_pass, "salt" => $salt);
    }

    public function checkLogin($user_email, $pass, $role)
    {
        //Already escaped! see Util::cleanInput();
        $user_email = strtolower($user_email);

        $params = array(":email" => $user_email, ":pass" => $pass, ":user_role" => $role);
        $customer_query = Database::query("SELECT * FROM `user` WHERE LOWER(`email`) = :email AND `password` = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(:pass))))) AND `role` = :user_role", $params);

        return $customer_query;
    }
}
