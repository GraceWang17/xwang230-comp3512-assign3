<?php

class PDOAdapter{
     private $pdo;
   
    function __construct($value){
          $this->setConnectionInfo($value);
    }
    
    public function setConnectionInfo($value = array()){
        if(!is_array($value)){
            $value = array($value);
        }
        $connstring = $value[0];
        $user = $value[1];
        $password = $value[2];
        try{
            $pdo = new PDO($connstring,$user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function fetchAsArray($sql){
        try{
            $result = $this->pdo->query($sql);
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function fetchWithCondition($sql, $value = array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($value);
        }catch(Exception $e){
        
    }
    }
}
?>

 