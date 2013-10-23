<?php

class Forgot extends Controller {

    function __construct() {
         parent::__construct();
    }
    function index()
    {
        $this->view->render('index/forgot');
    }
    
    function run()
    {
        $this->model->run();
        
    }

}
