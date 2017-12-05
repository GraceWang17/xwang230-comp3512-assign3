<?php
include_once "TableDataGateway.class.php";

class UserGateway extends TableDataGateway implements Serializable{
    private $db;
    protected $insertSql;
    protected $insertParams;
    public function __construct($db){
        parent::__construct($db);
    }
    
    public function getSelectStatement(){
        return 'SELECT UsersLogin.UserID, UsersLogin.UserName, UsersLogin.Password, UsersLogin.Salt, UsersLogin.State,
                Users.FirstName, Users.LastName, Users.Address, Users.City,Users.Region,Users.Country,Users.Postal,Users.Phone 
                FROM UsersLogin 
                INNER JOIN Users ON Users.Email = UsersLogin.UserName';
    }
  /*****************************/
 /*generic function for insert*/
/*****************************/
    public function setInsert($tableName, $fields = array()){
        $sql_1 = "insert into $tableName (";
        $sql_2 =  "values (";
        $params = array();
        foreach($fields as $k => $v){
            $params[':' . $k] = $v; 
            $sql_1 .= ($k . ', ');
            $sql_2 .= (':' . $k . ', '); 
        }
        $this->insertSql = substr($sql_1, 0, -2) . ') ' . substr($sql_2, 0, -2). ');';
        if(isset($this->insertSql)) $this->insertParams = $params;
    }

    protected function getInsert(){
        if(!isset($this->insertSql)) throw new PDOException;
        return $this->insertSql;
    }
    protected function getInsertParams(){
        return $this->insertParams;
    }
    
  /*****************************/
 /*************end*************/
/*****************************/
    
    public function getOrderFields(){
        return "";
    }
    public function getPrimaryKeyName(){
        return "";
    }
    public function getId($id){
      return 'UserID';
    }
    
    public function getEmail(){
        return 'UserName';
    }

    function serialize(){
        return serialize(array("ID"=>$this->UserID,
                               "username"=>$this->UserName,
                               "pass"=> $this->password,
                               "salt"=>$this-> Salt,
                               "state"=>$this->State,
                               "first"=>$this->FirstName,
                               "last"=>$this->LastName));
        
    }
    
    function unserialize($data){
           $data = unserialize($data);
           $this->UserID = $data['ID'];
           $this->UserName = $data['username'];
           $this->password = $data['pass'];
           $this->Salt = $data['salt'];
           $this->State = $data['state'];
           $this->FirstName = $data['first'];
           $this->LastName = $data['last'];
    }
}
   
?>