<?php
use Login\Classes\User as User;

class Login_Model extends Model {

    function __construct() {
        echo'ddddd';
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
            $password = md5(mysql_real_escape_string($_POST['password']));  
      
            $checklogin = User::login($email, $password);
            if(mysql_num_rows($checklogin) == 1) {  
                $row = mysql_fetch_array($checklogin);  
                $email = $row['email'];  
                $name = $row['name'];  
                $id = $row['id'];  
                $_SESSION['name'] = $name;  
                $_SESSION['email'] = $email;  
                $_SESSION['id'] = $id;
        
                echo "<h1>Success</h1>";  
                echo "<p>We are now redirecting you to the member area.</p>"; 
exit();
                echo "<meta http-equiv='refresh' content='=2;update' />";  
            } else {  
                echo "<h1>Error</h1>";  
                echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";  
            }   
        } 
      
    }

}

