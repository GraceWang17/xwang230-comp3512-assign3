<? php
//include_once "function.inc.php";
include_once "TableDataGateway.class.php";

class UserGateway extends TableDataGateway{
    private $db;
    public function __construct($db){
        parent::__construct($db);
    }
    
    public function getSelectStatement(){
        return 'select UserID, UserName, Password, Salt, State from UsersLogin';
    }
    public function getOrderFields(){
        return "LastName";
    }
    public function getPrimaryKeyName(){
        return "Email";
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