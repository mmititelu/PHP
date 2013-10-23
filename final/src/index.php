<?php 
session_start();
require_once '../vendor/autoload.php';
    

require 'libs/Boostrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Database.php';
require 'libs/Model.php';
require 'config/paths.php';
require 'config/database.php';
$app = new Boostrap();


//include 'Route.php';

//$route = new Route();
//$route -> add('/','Login');
//$route -> add('/register', 'Register');
//$route -> add('/login', 'Login');
//$route -> add('/logout', 'Logout');
//$route -> add('/forgot', 'Forgot');
//$route -> add('/change', 'Update');
//
//echo '<pre>';
//print_r($route);
//
//$route->submit();