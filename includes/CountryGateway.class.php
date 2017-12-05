<?php
   include_once "TableDataGateway.class.php";
    class CountryGateway extends TableDataGateway {
        private $db;
        public function __construct($db) {
            parent::__construct($db);
        }
        
        public function getSelectStatement() {
            return "select Countries.CountryCode, CountryName, count(VisitID) as TotalVisits from Countries 
                INNER JOIN BookVisits ON BookVisits.CountryCode=Countries.CountryCode 
                group by Countries.CountryCode ";
        }
        
        public function getSelectCountries() {
             return "select Countries.CountryCode, CountryName, count(VisitID) as TotalVisits from Countries 
             INNER JOIN BookVisits ON BookVisits.CountryCode=Countries.CountryCode ";
        }
        
        public function getOrderFields() {
            return "count(VisitID)";
        }
        
        public function getPrimaryKeyName() {
            return "CountryCode";
        }
        
        public function getSelectTotalVists() {
            return "select count(VisitID) as TotalNum from BookVisits where DateViewed like '06%'";
        }
        
        public function getSelectUniqueCountries() {
            return "select BookVisits.CountryCode, CountryName from BookVisits 
                INNER JOIN Countries ON Countries.CountryCode=BookVisits.CountryCode 
                group by BookVisits.CountryCode ";
        }
        
        public function getTotalToDo() {
            return "select count(ToDoID) as NumToDo from EmployeeToDo where DateBy like '2017-06%'";
        }
        
        public function getTotalMessages() {
            return "select count(MessageID) as NumMessages from EmployeeMessages where MessageDate like '2017-06%'";
        }
        
         protected function getInsert(){
             return;
         }
   
         protected function getInsertParams(){
              return;
         }
        
    }
?>