<?php
//namespace libs;

class Controller {

    function __construct() {
  //      echo 'Main controller';
        $this->view = new View();
        }
    
    public function loadModel() {
        require 'models/UserModel.php';
        $modelName = 'UserModel';
            $this->model = new $modelName();
        }
    
}
?>
