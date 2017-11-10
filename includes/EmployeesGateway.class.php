<?php

include_once "TableDataGateway.class.php";

    class EmployeesGateway extends TableDataGateway{
        private $db;
        public function __construct($db) {
            //$this->db = new BaseDataGateway();
            parent::__construct($db);
        }
        
        public function getSelectStatement() {
            return "select DISTINCT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email from Employees";
        }
        
        public function getOrderFields() {
            return "LastName";
        }
        
        public function getPrimaryKeyName() {
            return "EmployeeID";
        }
        
        public function findEmployeeByCity() {
            return "select DISTINCT EmployeeID, FirstName, LastName, City From Employees";
       
        }
        
        public function getCities ()
        {
            return "select distinct City from Employees";
        }
        
        public function getCityKeyName() {
            return "City";
        }
        
         public function getLastName() {
            return "LastName";
        }
        // public function getName() {
        //     return "FirstName, LastName";
        // }
        
        //For EmployeeToDo table
        public function getEmployeeToDo() {
            return "select ToDoID, EmployeeID, Status, Priority, DateBy, Description from EmployeeToDo";
        }
        
        //For EmployeeMessages table
        public function getEmployeeMessages() {
            return "select MessageID, EmployeeID, EmployeeMessages.ContactID, MessageDate, Category, Content, FirstName, LastName 
            from EmployeeMessages INNER JOIN Contacts ON EmployeeMessages.ContactID=Contacts.ContactID";
        }
        
    }
?>