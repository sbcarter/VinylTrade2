<?php

include('../model/global.php');

$user_id = $_SESSION['user_id'];
$album_id = $_POST['add'];

if($_POST['add'] == "") {
    header ('location:../view/add_que.php');
}


foreach ($album_id as $album) {
    
}
$data = [
        "user_id" => "'$user_id'",
        "album_id" => "'$album_id'"
    ];
$existing_album = $db->select('USER_QUE','user_id = '.$user_id);

foreach ($existing_album as $album) {
    if($album['album_id'] == $album_id) {
        $error = 'You already have this album in your que';
        require('../view/add_que.php');
        exit();
    }
}
// insert the album into the table
$db->insert($data,'USER_QUE'); 

header ('location:../view/que.php');

?>