<?php
    include_once "TableDataGateway.class.php";
    class BooksGateway extends TableDataGateway {
        private $db;
        public function __construct($db) {
            parent::__construct($db);
        }
        
        public function getSelectStatement() {
            return "select BookID, ISBN10, ISBN13, Title, CopyrightYear, Books.SubcategoryID, Books.ImprintID, 
            ProductionStatusID, Books.BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, 
            Description, CoverImage, SubcategoryName, Imprint, BindingType, Status from Books 
            INNER JOIN Subcategories ON Books.SubcategoryID=Subcategories.SubcategoryID 
            INNER JOIN Imprints ON Books.ImprintID=Imprints.ImprintID 
            INNER JOIN Statuses ON Statuses.StatusID=Books.ProductionStatusID 
            INNER JOIN BindingTypes ON BindingTypes.BindingTypeID=Books.BindingTypeID ";
        }
        
        public function getOrderFields() {
            return "Title";
        }
        
        public function getPrimaryKeyName() {
            return "ISBN10";
        }
        
        public function getSubcategoryName() {
            return "SubcategoryName";
        }
        
        public function getImprintName() {
            return "Imprint";
        }
        
        public function getSubcategories() {
            return "select SubcategoryName from Subcategories order by SubcategoryName ASC";
        }
        
        public function getImprint() {
            return "select Imprint from Imprints order by Imprint ASC";
        }
        
        public function getAuthors() {
            return "select FirstName, LastName, BookAuthors.Order, Books.ISBN10 from Authors 
            INNER JOIN BookAuthors ON BookAuthors.AuthorId=Authors.AuthorID 
            INNER JOIN Books ON Books.BookID=BookAuthors.BookId ";
        }
        
        //For Adopted Books in assignment3
        public function getAdoptedBooks() {
            return "select count(AdoptionDetailID) as total, AdoptionBooks.BookID, sum(Quantity) as sumQ, Title, ISBN10 from AdoptionBooks 
            INNER JOIN Books ON Books.BookID=AdoptionBooks.BookID 
            group by BookID order by total DESC limit 10";
        }
        
        protected function getInsert(){
             return;
        }
   
        protected function getInsertParams(){
             return;
        }
    }
?>