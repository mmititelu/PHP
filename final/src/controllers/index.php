<?php
//namespace controllers;

//use libs\Controller;

class Index extends Controller {

    function __construct() {
        parent::__construct();
        
    }
    function index() 
    {
        echo 'index';
        $this->view->render('index/index');
        
    }
    function details() {
        echo 'lalala';
        $this->view->render('index/index');
    }

}
?>
