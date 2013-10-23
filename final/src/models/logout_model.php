<?php
use Login\Classes\User as User;

class Logout_Model extends Model {

    function __construct() {
        echo'out';
               if(isset($_SESSION['email'])) {
           $email = $_SESSION['email'];
//           var_dump(session_id());
//               User::logout($email, $password); }
               }
    }
    
    public function run()
    {
       if(isset($_SESSION['email'])) {
           $email = $_SESSION['email'];
           var_dump(session_id());

             User::logout();
       }
    }

}