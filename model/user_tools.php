<?php
//UserTools.class.php
 
require_once 'user_class.php';
require_once 'DB.php';
 
class UserTools {
 
    //Log the user in. First checks to see if the 
    //username and password match a row in the database.
    //If it is successful, set the session variables
    //and store the user object within.
    public function login($username, $password) {
 
        $hashedPassword = md5($password);
        //$hashedPassword = $password;
        $result = mysql_query("SELECT * FROM USER WHERE userName = '$username' AND password = '$hashedPassword'");
 
        if(mysql_num_rows($result) == 1)
        {
            $logged_user = serialize(new User(mysql_fetch_assoc($result)));
            $_SESSION["user"] = $logged_user->username;
            $_SESSION["login_time"] = time();
            $_SESSION["logged_in"] = 1;
            $_SESSION["username"] = $logged_user->username;
            return true;
        }else{
            return false;
        }
    }
    
    //Log the user out. Destroy the session variables.
    public function logout() {
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
        session_destroy();
    }
 
    //Check to see if a username exists.
    //This is called during registration to make sure all user names are unique.
    public function checkUsernameExists($username) {
        $result = mysql_query("select user_id from USER where username='$username'");
        if(mysql_num_rows($result) == 0)
        {
            return false;
           }else{
               return true;
        }
    }
    
    //get a user
    //returns a User object. Takes the users id as an input
    public function get($user_id)
    {
        $db = new DB();
        $result = $db->select('users', "user_id = $user_id");
        
        return new User($result);
    }
    
}
 
?>