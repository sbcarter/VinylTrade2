<?php
//User.class.php 
require_once 'DB.php';
 
 
class User {
 
    public $user_id;
    public $username;
    public $hashedPassword;
    public $email;
    public $firstName;
    public $lastName;
    public $phone;
    public $streetAddress;
    public $city;
    public $state;
    public $zip;
 
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : "";
        $this->username = (isset($data['username'])) ? $data['username'] : "";
        $this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
        $this->email = (isset($data['email'])) ? $data['email'] : "";
        $this->firstName = (isset($data['firstName'])) ? $data['firstName'] : "";
        $this->lastName = (isset($data['lastName'])) ? $data['lastName'] : "";
        $this->phone = (isset($data['phone'])) ? $data['phone'] : "";
        $this->streetAddress = (isset($data['streetAddress'])) ? $data['streetAddress'] : "";
        $this->city = (isset($data['city'])) ? $data['city'] : "";
        $this->state = (isset($data['state'])) ? $data['state'] : "";
        $this->zip = (isset($data['zip'])) ? $data['zip'] : "";
        
    }
 
    public function save($isNewUser = false) {
        //create a new database object.
        $db = new DB();
        
        //if the user is already registered and we're
        //just updating their info.
        if(!$isNewUser) {
            //set the data array
            $data = array(
                "username" => "'$this->username'",
                "password" => "'$this->hashedPassword'",
                "firstName" => "'$this->firstName'",
                "lastName" => "'$this->lastName'",
                "email" => "'$this->email'",
                "phone" => "'$this->phone'",
                "streetAddress" => "'$this->streetAddress'",
                "city" => "'$this->city'",
                "state" => "'$this->state'",
                "zip" => "'$this->zip'"
            );
            
            //update the row in the database
            $db->update($data, 'users', 'id = '.$this->id);
        }else {
        //if the user is being registered for the first time.
            $data = array(
                "username" => "'$this->username'",
                "pwd" => "'$this->hashedPassword'",
                "firstName" => "'$this->firstName'",
                "lastName" => "'$this->lastName'",
                "email" => "'$this->email'",
                "phone" => "'$this->phone'",
                "streetAddress" => "'$this->streetAddress'",
                "city" => "'$this->city'",
                "state" => "'$this->state'",
                "zip" => "'$this->zip'"
            );
            
            $this->id = $db->insert($data, 'USER');
        }
        return true;
    }
    
}
 
?>