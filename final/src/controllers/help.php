<?php
//namespace controllers;

//use libs\Controller;

class Help extends Controller {

    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('index/help'); 
    }
    public function other() {
        echo 'We are in other method';
    }

}
?>
