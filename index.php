<?php

session_start();

require_once('./Model/Connection.php');
$pdoBuilder = new Connection();
$db = $pdoBuilder->getDb();

if ((isset($_GET['ctrl']) && !empty($_GET['ctrl'])) && (isset($_GET['action']) && !empty($_GET['action']))) {
    $ctrl = $_GET['ctrl'];
    $action = $_GET['action'];
} else {
    $ctrl = 'category';
    $action = 'display';
}

require_once('./Controller/' . $ctrl . 'Controller.php');
$ctrl = $ctrl . 'Controller';


//* new UserController( new PDO(...))
$controller = new $ctrl($db);

//* $action == $_GET['action'] or 'display'
$controller->$action();
