<?php
//namespace libs;

class Model extends Database
{
    private $sql;
    private $bind;

    function __construct() 
    {
  //      echo 'Main controller';
        $this->db = new Database();
    }
    
    public function delete($table, $where, $bind="")
    {
            $sql = "DELETE FROM " . $table . " WHERE " . $where . ";";
            $pdo = new Database();
            $pdo->run($sql, $bind);
    }

    private function filter() 
    {       
           return array('name', 'password', 'email');
    }


    public function insert($table, $info) 
    {
            $pdo = new Database();
            
            $fields = $this->filter();
            $sql = "INSERT INTO " . $table . " (" . implode($fields, ", ") . ") VALUES (:" . implode($fields, ", :") . ");";
            $bind = array();
            foreach($fields as $field)
               $bind[":$field"] = $info[$field];
        return $pdo->run($sql, $bind);

            
    }
    
      public function update($table, $info, $where)
    {
          $bind = array();
           $pdo = new Database();
           $fields = $this->filter();
           $fieldSize = sizeof($fields);
           $sql = "UPDATE " . $table . " SET ";
           for($f = 0; $f < $fieldSize; ++$f) {
                   if($f > 0)
                           $sql .= ", ";
                   $sql .= $fields[$f] . "= :" . $fields[$f]; 

           }


           $sql .= " WHERE ".$where;

            foreach($fields as $field){
               $bind[":$field"] = $info[":$field"];
           }
                 return $pdo->run($sql, $bind);

    }

    public function select($table, $where="", $bind="", $fields="*") 
    {
            $pdo = new Database();
            $sql = "SELECT " . $fields . " FROM " . $table;
            if(!empty($where))
                    $sql .= " WHERE " . $where;
//            $sql .= ";";
            return $pdo->run($sql, $bind);
    }
}
?>
