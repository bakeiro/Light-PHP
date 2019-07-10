<?php

class loginController
{
    public function checkLogin()
    {
        $user_email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = "admin_master";

        require_once MODEL . "user/userModel.php";
        $user_model = new userModel();
        $user = $user_model->checkLogin($user_email, $pass, $role);

        if ($user) {
            session_regenerate_id(true); //If the privileges are upgraded, I should create a new session_id to make even harder get the session_id

            Session::set("admin_name", $user["first_name"]);
            Session::set("admin_email", $user["email"]);
            Session::set("admin_logged", true);
            header("location: index.php?route=info/info/dashboard");
        } else {
            Session::set("admin_logged", false);
            Session::set("login_msg", "Incorrect password");
            Output::rawLoad("login/loginView");
        }
    }

    public function logout()
    {
        Session::forget();
        header("location: index.php");
    }

    public function loginPage()
    {

        $data = array();
        $data["csrf_input"] = Session::get("CSRF_input");
        Output::rawLoad("login/loginView", $data);
    }
}
