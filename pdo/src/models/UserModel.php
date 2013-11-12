<?php

//use Login\Classes\User as User;

class UserModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email = mysql_real_escape_string($_POST['email']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            $bind = array(":email" => $email, ":password" => $password);
            $sth = $this->select('users', "email =:email AND password =:password", $bind, "*");
            $checklogin = count($sth);
            if ($checklogin == 4) {
                $email = $sth[3];
                $name = $sth[1];
                $id = $sth[0];
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                echo "<h1>Success</h1>";
                echo "<p>We are now redirecting you to the member area.</p>";
                echo "<meta http-equiv='refresh' content='2;url=../index' />";
            } else {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your account could not be found. Please <a href=\"login\">click here to try again</a>.</p>";
                 echo "<meta http-equiv='refresh' content='2;url=../login' />";
            }
        }
    }

    function logout() {
        if (isset($_SESSION['email'])) {
            session_destroy();
        }
    }

    function register() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = mysql_real_escape_string($_POST['email']);
            $conf_email = mysql_real_escape_string($_POST['conf_email']);
            $name = mysql_real_escape_string($_POST['name']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            if ($email != $conf_email) {
                echo "<script>alert('Your Confirmation Email must be identical as your Email Address. Please Try Again')</script>";
                echo "<meta http-equiv='refresh' content='0;url=../register' />";
            } else {
                $bind = array(":email" => $email);
                $sth = $this->select('users', "email =:email", $bind, "*");
                $checklogin = count($sth);
                if ($checklogin >= 4) {
                    echo "<h1 style='padding:100;'>Error</h1>";
                    echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
                    echo "<meta http-equiv='refresh' content='2;url=../register' />";
                } else {
                    $bind = array('email' => $email, 'password' => $password, 'name' => $name);
                    $sth = $this->insert('users', $bind);
                    if ($sth == 1) {
                        echo'<br/><br/><br/><br/><br/><br/>';
                        echo "<h1>Success</h1>";
                        echo "<p>We are now redirecting you to login area.</p>";
                        echo "<meta http-equiv='refresh' content='2;url=../login' />";
                    } else {
                        echo "<h1>Error</h1>";
                        echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
                        echo "<meta http-equiv='refresh' content='2;url=../register' />";
                    }
                }
            }
        }
    }

    function modify() 
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = mysql_real_escape_string($_POST['email']);
            $name = mysql_real_escape_string($_POST['name']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            $new_pass = md5(mysql_real_escape_string($_POST['new_pass']));
            $id = $_SESSION['id'];

            $bind1 = array(":email" => $email);
            $sth = $this->select('users', "email =:email", $bind1, "*");
            $checklogin = count($sth);
            if ($checklogin == 4) {
                $update = array(
        	':name'=>$name, 
                ':password'=>$new_pass, 
                ':email'=>$email
                );
                $sth = $this->update("users", $update, "id=$id");

                if ($sth) {
                    echo "<h1>Success</h1>";
                    echo "<p>Your account was successfully updated.</p>";
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $new_pass;
                    echo "<meta http-equiv='refresh' content='10;../modify' />";  
                } else {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, your update failed. Please go back and try again.</p>";
                    echo "<meta http-equiv='refresh' content='10;../modify' />";  
                }
                
            } else {
                
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your old password is wrong . Please go back and try again.</p>";
                echo "<meta http-equiv='refresh' content='10;../modify' />"; 
            }
        }
    }

    function forgot() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email = mysql_real_escape_string($_POST['email']);
            $password = md5(mysql_real_escape_string($_POST['password']));

            $checklogin = User::login($email, $password);
            if (mysql_num_rows($checklogin) == 1) {
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
                echo "<meta http-equiv='refresh' content='=2;index.php' />";
            } else {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
            }
        }
    }

}