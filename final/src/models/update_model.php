<?php

use Login\Classes\User as User;

class Update_Model extends Model {

    function __construct() {
        echo'Update';
        $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ  
        $dbname = "users"; // the name of the database that you are going to use for this project  
        $dbuser = "root"; // the username that you created, or were given, to access your database  
        $dbpass = ""; // the password that you created, or were given, to access your database  
        User::connect($dbhost, $dbuser, $dbpass, $dbname); 
           echo $id = $_SESSION['id'];
           var_dump(session_id());
    }
    
    public function run()
    {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {  
            $email = mysql_real_escape_string($_POST['email']); 
            $name = mysql_real_escape_string($_POST['name']);
            $password = md5(mysql_real_escape_string($_POST['password']));  
            $new_pass = md5(mysql_real_escape_string($_POST['new_pass']));
        
           exit();
            $checkpass = User::checkp($password);  
                if(!(mysql_num_rows($checkpass) >= 1))  {  
                    echo "<h1>Error</h1>";  
                    echo "<p>Sorry, your old password is wrong . Please go back and try again.</p>";  
                } else {  
                    $register = User::update($name, $email, $new_pass, $id);  
                    if($register) { 
                        echo "<h1>Success</h1>";  
                        echo "<p>Your account was successfully updated.</p>"; 
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $new_pass;
                     //   echo "<meta http-equiv='refresh' content='=2;index.php' />";  
                    } else {  
                        echo "<h1>Error</h1>";  
                        echo "<p>Sorry, your update failed. Please go back and try again.</p>";      
                    }      
                }
            }
    }
}
