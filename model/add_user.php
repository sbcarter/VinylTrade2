<?php

require_once 'global.php';

$userName = $_POST['userName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$address = $_POST['address'];
$zipCode = $_POST['zipCode'];
$state = $_POST['state'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$error = "";

//initialize variables for form validation
$success = true;
$user_tools = new UserTools();

//validate that the form was filled out correctly
//check to see if user name already exists
if($user_tools->checkUsernameExists($userName)) {
    $error .= "That username is already taken. <br />";
    $success = false;
}

//check to see if passwords match
if($password != $confirm_password) {
    $error .= "Passwords do not match. <br />";
    $success = false;
}

if($success) {
    //prep the data for saving in a new user object
    //$hashedpassword = md5($password);
    $data['username'] = $userName;
    $data['password'] = md5($password);
    $data['email'] = $email;
    $data['firstName'] = $firstName;
    $data['lastName'] = $lastName;
    $data['streetAddress'] = $address;
    $data['phone'] = $phone;
    $data['city'] = $city;
    $data['zip'] = $zipCode;
    
    //create new user object
    $newUser = new User($data);
    
    //save the new user to the database
    $newUser->save(true);
    
    //log in the user
    $user_tools->login($userName, $password);
    
    //send them to the home page
    header ('location:../view/homepage.php');
    
}
?>