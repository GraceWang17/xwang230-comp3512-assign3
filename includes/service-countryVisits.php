<?php
require_once 'function.inc.php';
require_once 'DatabaseHelper.class.php';
require_once 'CountryGateway.class.php';
/*
* This page return a JSON object that contains the country name and the total number of visits
*/
//Tell the brower to expect JSON rather than HTML
    header("Content-Type: application/json; charset=UTF-8");
    $db = connectDB();
    outputVisitedCountry($db);
    function outputVisitedCountry($db) {
        //get the data from the database
        $country = new CountryGateway($db);
        $sql = $country->getSelectCountries();
        $sql .= ' where Countries.CountryCode="' . $_GET['ccode'] . '"';
        $sql .=' group by Countries.CountryCode ';
        $result = $country->getStatement($sql);
        //output the JSON for the retrieved countries data
        
        if(! is_null($result)) {
            echo json_encode($result, JSON_FORCE_OBJECT);
        } else {
            echo "{'msg':'Error with database'}";
        }
    }
    
?>