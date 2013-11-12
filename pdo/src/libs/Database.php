<?php

class Database extends \PDO
{
    private $sql;
    private $bind;

    function __construct() 
    {
        try 
        {
            parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            exit('Database connection error');
        }
    }

//    public function query($sql)
//    {
//        $stm = parent::prepare($sql);
//        return $stm;
//    }
   
     public function run($sql, $bind="") {
            $this->sql = trim($sql);
            $this->bind = $this->cleanup($bind);
            $pdostmt = $this->prepare($this->sql);
            if($pdostmt->execute($this->bind) !== false) {
                    if(preg_match("/^(" . implode("|", array("select", "describe", "pragma")) . ") /i", $this->sql)){
                        return $pdostmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
                        
                    }
                    elseif(preg_match("/^(" . implode("|", array("delete", "insert", "update")) . ") /i", $this->sql))
                            return $pdostmt->rowCount();
            }

    }
    public function cleanup($bind)
    {
            if(!is_array($bind)) {
                    if(!empty($bind))
                            $bind = array($bind);
                    else
                            $bind = array();
            }
            return $bind;
    }
   


}
?>
