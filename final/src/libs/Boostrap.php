<?php
//namespace libs;

class Boostrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
       // print_r($url);
        
        if(empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return FALSE;
        }
        
        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)){
            require $file;
        } else {
            throw new Exception("The file: $file does not exists.");
        } 
          
        $controller = new $url[0];
        $controller->loadModel($url[0]);
       
        if (isset($url[1])) {
            $controller->{$url[1]}();
         } else {
             $controller->index();
        }
    }

}
