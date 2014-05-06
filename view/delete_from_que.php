<?php

include('../model/global.php');

db = new DB();
$user_id = $_SESSION['user_id'];

$album_id = $_POST['delete'];

$where = 'user_id = $user_id and album_id = $album_id';

db->delete('USER_QUE',$where);

header('location:../view/que.php');

?>