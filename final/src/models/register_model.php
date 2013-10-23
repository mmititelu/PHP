<?php
use Login\Classes\User as User;

class Register_Model extends Model {

    function __construct() {
        echo'Register';
        $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ  
        $dbname = "users"; // the name of the database that you are going to use for this project  
        $dbuser = "root"; // the username that you created, or were given, to access your database  
        $dbpass = ""; // the password that you created, or were given, to access your database  
        User::connect($dbhost, $dbuser, $dbpass, $dbname); 
    }
    
    public function run()
    {
       if(!empty($_POST['email']) && !empty($_POST['password'])) {  
            $email = mysql_real_escape_string($_POST['email']);  
            $conf_email = mysql_real_escape_string($_POST['conf_email']);
            $name = mysql_real_escape_string($_POST['name']);
            $password = md5(mysql_real_escape_string($_POST['password']));  
            if($email != $conf_email){
                echo "<script>alert('Your Confirmation Email must be identical as your Email Address. Please Try Again')</script>";
            } else{ 
                $checkuser = User::check($email);
                if(mysql_num_rows($checkuser) >= 1)  {  
                    echo "<h1>Error</h1>";  
                    echo "<p>Sorry, that username is taken. Please go back and try again.</p>";  
                } else {  
                    $register = User::register($email, $name, $password);

                    if($register) { 
                        echo "<h1>Success</h1>";  
                        echo "<p>Your account was successfully created.</p>"; 
                        //   echo "<meta http-equiv='refresh' content='=2;index.php' />";  
                    } else {  
                        echo "<h1>Error</h1>";  
                        echo "<p>Sorry, your registration failed. Please go back and try again.</p>";      
                    }      
                }
            }
        }
    }
}