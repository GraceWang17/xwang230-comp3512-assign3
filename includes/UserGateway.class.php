<?php
//include_once "function.inc.php";
include_once "TableDataGateway.class.php";

class UserGateway extends TableDataGateway implements Serializable{
    private $db;
    public function __construct($db){
        parent::__construct($db);
    }
    
    public function getSelectStatement(){
        return 'SELECT UsersLogin.UserID, UsersLogin.UserName, UsersLogin.Password, UsersLogin.Salt, UsersLogin.State,Users.FirstName, Users.LastName from UsersLogin 
                INNER JOIN Users ON Users.Email = UsersLogin.UserName';
    }
    
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
    
    /*public function getProfile(){
        return serialize();
    }*/
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