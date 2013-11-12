<?php
//namespace libs;

class View {

    function __construct() {
      //  echo 'This is the view';
    }
    public function render($name)
    {
        require 'views/header.php';
        require 'views/'.$name.'.php';
        require 'views/footer.php';
    }
   
   

}
