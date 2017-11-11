<? php
//include_once "function.inc.php";

class UserGateway extends TableDataGateway{
    private $db;
    public function __contruct($db){
        parent::__contruct($db);
    }
    
    public function getSelectStatement(){
        return 'select UserID, UserName, Password, Salt, State from UsersLogin';
    }
    public function getOrderFields(){
        return "LastName";
    }
    public function getPrimaryKeyName(){
        return ;
    }
    public function getId($id){
      return 'UserID';
    }
    
    public function getByName($UserID){
        return 'UserID';
    }
    
    public function getEmail($UserName){
        return 'UserName'
    }
    
    public function getByPass($pass){
    return 'Password';
    
    
    
    }
    
 
    
    
    
}
?>