<?php
use Login\Classes\User as User;

class Logout extends Controller {

    function __construct() {
         parent::__construct();
    }
    function index()
    {
         $this->model->run();
         header('location:login');
    }
    
    
    function run()
    {
        $this->model->run();
        
    }

}