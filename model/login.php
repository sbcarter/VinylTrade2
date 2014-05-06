<?php
//login.php
require_once 'global.php';

error_reporting(E_ALL ^ E_NOTICE);
$username = $_POST['username'];
$password = $_POST['password'];

$user_tools = new UserTools();

if($user_tools->login($username,$password)) {
    //successfull login, redirect to quepage
    echo "successfull login";
    header('location:../view/homepage.php');
    exit();
}
else {
    
    $error = "Incorrect username or password";
    require('../view/index.php');
    exit();
}

?>             