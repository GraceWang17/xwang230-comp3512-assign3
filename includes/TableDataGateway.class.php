<?php
abstract class TableDataGateway 
{
//Contains connection
    protected $connection;
//Constructor is passed a database adapter
    public function __construct($connect) {
        $this->connection = $connect;
    }
// ABSTRACT METHODS
   
   /*
     The name of the table in the database
   */    
   abstract protected function getSelectStatement();

   /*
     A list of fields that define the sort order
   */   
   abstract protected function getOrderFields();
   
   /*
     The name of the primary keys in the database ... this can be overridden by subclasses
   */    
   abstract protected function getPrimaryKeyName();
   
//Public functions --- return either a single or array of the appropriate Domain Object subclasses
    /*
      Returns all the records in the table
   */
   public function findAll($sortFields = null) {
       $sql = $this->getSelectStatement();
       //add sort order by something if required
       if(!is_null($sortFields)) {
           $sql .= ' order by ' . $sortFields;
       }
       $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
       return $statement->fetchAll(PDO::FETCH_ASSOC);
       //return getStatement($sql);
   }
 
    public function getStatement($sql)
    {
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
      Returns all the records in the table sorted by the specified sort order (such as: DESC or ASC)
   */
   public function findAllSorted($ascending) {
       $sql = $this->getSelectStatement() . ' order by ' . $this->getOrderFields();
       if (! $ascending) {
           $sql .= " DESC ";
       }
       $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
   
    /*
      Returns a record for the specificed ID
   */
   public function findById($id) {
       $sql = $this->getSelectStatement() . ' where ' . $this->getPrimaryKeyName() . '=:id';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
       return $statement->fetch();
   }
   
   public function findByLastName($employeeName) {
       //print_r($employeeName);
       $sql = $this->getSelectStatement() . ' where ' . $this->getLastName() . '=:LastName';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':LastName' => $employeeName));
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
   public function findByCity($city) {
       $sql = $this->getSelectStatement() . ' where ' . $this->getCityKeyName() .'=:city' . ' order by ' . $this->getOrderFields();
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':city' => $city));
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
   
   public function findByBothCityLastName($employeeName,$city) {
       $sql = $this->getSelectStatement() . ' where ' . $this->getLastName() . '=:LastName'. ' AND '.$this->getCityKeyName() .'=:city';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':LastName'=> $employeeName, ':city' => $city));
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }

   //userName=email
   public function findUserByEmail($userName){
       
       $sql = $this->getSelectStatement() . ' where ' . $this->getEmail() . '=:UserName';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':UserName' => $userName));
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
   
   //public function findUserPass($pass){
       
     //   $sql = $this->getSelectStatement() . ' where ' . $this->getEmail() . '=:Email';
    //   $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':Email' => $userName));
    //   return $statement->fetch(PDO::FETCH_ASSOC);
       
   //}
   
   
   public function findByIdFromToDo($id) {
       $sql = $this->getEmployeeToDo() . ' where ' . $this->getPrimaryKeyName() . '=:id' .' order by DateBy ';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
       return $statement->fetchAll();
   }
   
   public function findByIdFromMessages($id) {
       $sql = $this->getEmployeeMessages() . ' where ' . $this->getPrimaryKeyName() . '=:id' .' order by MessageDate ';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
       return $statement->fetchAll();
   }
    
    public function findByUState($ascending) {
        $sql = $this -> getUStates() . ' order by ' . $this->getKeyStateName();
        if (! $ascending) {
           $sql .= " DESC ";
       }
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Find all names from table or by condition & group all elements  + sorting by order field + limit items.
     */
    public function findAllByLimit($name, $limit = null) {
        if(!is_null($name)) {
           $sql = $this->getSelectStatement(). ' where '. $this->getWhereClause() . '=:name' .' Group by '. $this->getPrimaryKeyName() .' order by ' . $this->getOrderFields();
           if(!is_null($limit)) {
               $sql .= ' limit ' . $limit;
           }
            $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':name' => $name));
       } else {
           $sql = $this->getSelectStatement(). ' Group by '. $this->getPrimaryKeyName() .' order by ' . $this->getOrderFields();
           if(!is_null($limit)) {
               $sql .= ' limit ' . $limit;
           }
           $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
       }
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
   
   /**
     * Find all names from table or by condition & group all elements + sorting by order field + No limit Items.
     */
   public function findByBookCondition($key) {
       $sql = $this->getSelectStatement(). ' where '. $this->getBookISBN() . '=:id' .' Group by name';
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $key));
       return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
    
   /**
     * Closes the connection to the database.
     */
    public function closeConnection()
    {
        $this->connection=null;
    }
}
?>