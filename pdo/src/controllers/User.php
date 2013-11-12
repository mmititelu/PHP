<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() 
    {
        echo 'index';
        $this->view->render('index/index');
        
    }
    
    function login()
    {
        
        
        $this->view->render('index/login');
        $this->model->login();
    }
    
    function logout()
    {
         
         header('location:login');
         $this->model->logout();
    }
    
    function forgot()
    {
        $this->model->forgot(); 
        $this->view->render('index/forgot');
         
    }
    function register()
    {
        $this->model->register();
        $this->view->render('index/register');
         
    }
    function modify()
    {
        $this->model->modify();
        $this->view->render('index/update');
      
    }
}
?>
