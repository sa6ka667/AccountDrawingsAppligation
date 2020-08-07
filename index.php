<?php

    // FRONT CONTROLLER

    // COMMON SETTINGS
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    session_start();
    date_default_timezone_set("Europe/Moscow");
    // FILES OF SYSTEM CONNECTION
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Router.php');
    require_once(ROOT.'/components/Db.php');

    //DATABASE CONNECTION

    // CALL OF ROUTER
    $router = new Router();
    $router->run();

?>