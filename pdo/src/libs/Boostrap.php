<?php
//namespace libs;

class Boostrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        require 'controllers/User.php';
        $controller = new User();
        if(empty($url[0])) {
            $controller->index();
            return FALSE;
        }
        
//        $file = 'controllers/' . $url[0] . '.php';
//        if(file_exists($file)){
//            require $file;
//        } else {
//            throw new Exception("The file: $file does not exists.");
//        } 
          
        $controller = new \User;
        $controller->loadModel();
       if(empty($url[1])) {
           $controller->{$url[0]}();
        } else {
                $controller->{$url[1]}();
            }
        
//        if (isset($url[1])) {
//            $controller->{$url[1]}();
//         } else {
//             $controller->index();
    }
}
