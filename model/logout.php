<?php
require_once 'global.php';

$user_tools = new UserTools();
$user_tools->logout();

header('location:../view/index.php');
exit();
?>