<?php
include_once "TableDataGateway.class.php";
    class UniversityGateway extends TableDataGateway {
        private $db;
        public function __construct($db) {
            parent::__construct($db);
        }
        
        public function getSelectStatement() {
            return "select DISTINCT Universities.UniversityID, Name, Address, City, State, Zip, Website, Longitude, Latitude,  
            Title, ISBN10 from Universities 
            INNER JOIN Adoptions ON Universities.UniversityID=Adoptions.UniversityID 
            INNER JOIN AdoptionBooks ON Adoptions.AdoptionID=AdoptionBooks.AdoptionID 
            INNER JOIN Books ON AdoptionBooks.BookID=Books.BookID ";
        }
        
        public function getOrderFields() {
            return "Title";
        }
        
        public function getPrimaryKeyName() {
            return "Universities.UniversityID";
        }
        
        public function getWhereClause() {
            return "State";
        }
        
        public function getUStates() {
            return "select StateId, StateName, StateAbbr from States";
        }
        
        public function getKeyStateName() {
            return "StateName";
        }
        
        public function getBookISBN() {
            return "ISBN10";
        }
        
         protected function getInsert(){
            return;
         }
   
         protected function getInsertParams(){
             return;
         }
    }
?>