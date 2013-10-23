<?php

class Login extends Controller {

    function __construct() {
         parent::__construct();
    }
    function index()
    {
//        require 'models/login.php';
//        $model = new Login();
        $this->view->render('index/login');
    }
    
    function run()
    {
        $this->model->run();
        
    }

}
