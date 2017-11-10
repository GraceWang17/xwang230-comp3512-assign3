<? php
//include_once "function.inc.php";

class UserGateway extends TableDataGateway{
    private $db;
    public function __contruct($db){
        parent::__contruct($db);
    }
    
    public function getSelectStatement(){
        return 'select UserID, FirstName, LastName,Email from Users';
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
    
    public function getEmail($UserID){
        return 'UserID'
    }
    
    
    
    
}
?>