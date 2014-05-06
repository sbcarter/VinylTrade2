<?php 

require_once 'global.php';
$user = $_SESSION['user'];
$user_id = $_SESSION['user_id'];


//Instantiate new UserTools object
$user_tools = new UserTools();

//Instantiate new RecordTools object
//$record_tools = new RecordTools();
$db = new DB();

$album = $_POST['album'];
$artist = $_POST['artist'];
$condition = $_POST['condition'];
$shipping = $_POST['shipping'];
$error = "";
//validate info
if($album == "") {
    $error = "Please enter all the information.";
}
if($artist == "") {
    if($error != "") {
        $error = "Please enter all the information.";
    }
}
if(!isset($_POST['condition'])) {
    if($error != "") {
        $error = "Please enter all the information.";
    }
}
if(!isset($_POST['shipping'])) {
    if($error != "") {
        $error = "Please enter all the information.";
    }
}

if($error != "") {
    require ('../view/new_record.php');
    exit();
}

$data = [
    "owner" => "'$user_id'",
    "album" => "'$album'",
    "artist" => "'$artist'",
    "albumCondition" => "'$condition'"
];


// insert the album into the table
$db->insert($data,'ALBUMS'); 


header('location:../view/homepage.php');

?>