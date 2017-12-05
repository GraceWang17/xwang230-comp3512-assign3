<?php
/*
* This page return a JSON object that contains the country a list of the top 10 adopted books,
*including: title, ISBN10, a sum of the Quantity in AdoptionBooks
*/
 require_once 'function.inc.php';
 require_once 'DatabaseHelper.class.php';
 require_once 'BooksGateway.class.php';

header("Content-Type: application/json; charset=UTF-8");
    $db = connectDB();
    outputAdoptedBooks($db);
    function outputAdoptedBooks($db) {
        $books = new BooksGateway($db);
        $sql = $books->getAdoptedBooks();
        $result = $books->getStatement($sql);
        if(! is_null($result)) {
            echo json_encode($result, JSON_FORCE_OBJECT);
        } else {
            echo "{'msg':'Error with database'}";
        }
        // echo json_encode($result, JSON_FORCE_OBJECT);
    }
?>