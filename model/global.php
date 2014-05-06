<?php

require_once 'user_class.php';
require_once 'user_tools.php';
//require_once 'record_tools.php';
//require_once 'record_class.php';
require_once 'DB.php';
 
//connect to the database
$db = new DB();
$db->connect(); 
 
//initialize UserTools object
$user_tools = new UserTools();
 
//start the session
session_start();

//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
    $user = unserialize($_SESSION['user']);
    $_SESSION['user'] = serialize($user_tools->get($user->user_id));
}

?>