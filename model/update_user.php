<?php

require_once 'global.php';

$user_id = $_SESSION['user_id'];

$db = new DB();

$email = $_POST['email'];
$address = $_POST['address'];
$zipCode = $_POST['zipCode'];
$state = $_POST['state'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$error = "";


//validate and check which fields to update

if($email != "") {
    $data['email'] = "'$email'";
}
if($zipCode != "") {
    $data['zip'] = "'$zipCode'";
}
if($address != "") {
    $data['streetAddress'] = "'$address'";
}
if($state != "") {
    $data['state'] = "'$state'";
}
if($firstName != "") {
    $data['firstName'] = "'$firstName'";
}
if($lastName != "") {
    $data['lastName'] = "'$lastName'";
}
if($phone != "") {
    $data['phone'] = "'$phone'";
}
if($city != "") {
    $data['city'] = "'$city'";
}
/*

$data = [
    'firstName' => "'$firstName'",
    'lastName' => "'$lastName'",
    'email' => "'$email'",
    'phone' => "'$phone'",
    'streetAddress' => "'$streetAddress'",
    'city' => "'$city'",
    'zip' => "'$zipCode'"
];

*/



$where = 'user_id = '.$user_id;
$table = 'USER';
$db->update($data,$table,$where);

header('location:../view/homepage.php');
?>