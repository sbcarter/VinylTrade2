<?php 

//update_record.php

//checks which field the user wants to update
//and updates only those columns

require_once '../model/global.php';

$db = new DB();

if (!isset($_SESSION['logged_in'])) {
    header('location:../view/index.html');
}

$user_id = $_SESSION['user_id'];

$album_id = $_POST['album_id'];
$album = $_POST['album'];
$artist = $_POST['artist'];
$condition = $_POST['condition'];

//validate information, make sure only the fields changed are updated.

if($album != "") {
    $data['album'] = "'$album'";
}
if($artist != "") {
    $data['artist'] = "'$artist'";
}
if($condition != "") {
    $data['albumCondition'] = "'$condition'";
}

if($album == "" && $artist == "" && $condition == "") {
    header('location:../view/homepage.php');
}
$db->update($data,'ALBUMS','owner = '.$user_id.' and album_id = '.$album_id);

header('location:../view/homepage.php');
?>