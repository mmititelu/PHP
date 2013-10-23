<?php

class Update extends Controller {

    function __construct() {
         parent::__construct();
    }
    function index()
    {
        $this->view->render('index/update');
    }
    
    function run()
    {
        $this->model->run();
        
    }

}
