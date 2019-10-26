<?php

//Routes
define("DIR_ROOT", dirname(__DIR__));
define("SYSTEM", DIR_ROOT . "/system/");
define("MODEL", DIR_ROOT . "/admin/model/");
define("CONTROLLER", DIR_ROOT . "/admin/controller/");
define("VIEW", DIR_ROOT . "/admin/view/");

//Config
require SYSTEM . "engine/Config.php";
require DIR_ROOT . "/config.php";

//Engine
require SYSTEM . "engine/Router.php";
require SYSTEM . "engine/Controller.php";
require SYSTEM . "engine/Session.php";
require SYSTEM . "engine/Console.php";
require SYSTEM . "engine/SessionSecureHandler.php";
require SYSTEM . "engine/Output.php";
require SYSTEM . "engine/Database.php";
require SYSTEM . "engine/Util.php";
require SYSTEM . "engine/Errors.php";
require SYSTEM . "engine/SecModel.php";
require SYSTEM . "engine/SecController.php";

//Startup
require SYSTEM . "startup.php";

$Controller = new Controller();

//Admin
if (!Session::get("admin_logged")) {
    if ($Controller->method !== "checkLogin") {
        $Controller->method = "loginPage";
        $Controller->file = CONTROLLER . "login/loginController.php";
        $Controller->class = "loginController";
    }
}

//Execute controller
$Controller->execController();

//End script
$Controller->endExecution();
