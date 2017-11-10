<?php
include_once "PDOAdapter.class.php";
include_once "constring.php";

abstract class AbsDataGateway{
    
    protected $dbAdapter;
    
    function __construct(){
        $this->dbAdapter = new PDOAdapter(array(DBCONNSTRING, DBUSER, DBPASS));
    }
    
    abstract protected function getSelectStatement();
    
    abstract protected function getBindingValues();
    
    public function getAll(){
    
        $sql = $this-> getSelectStatement();
        return $this->dbAdapter->fetchAsArray($sql);
    }
    
    public function getByCondition(){
        $sql = $this -> getSelectStatement();
        try{
        return $this->dbAdapter->fetchByCondition($sql, $this->getBindingValue());
        }catch (Exception $e){
        echo "Error!";
        }
    }
}

?>