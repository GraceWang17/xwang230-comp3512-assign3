<?php
/*
* This page return a JSON object that contains following:
*   a count of the total number of visits in June 2017
*   the total number of unique countries the site had visitors from
*   the total number of employee to-dos in June 2017
*   the total number of employee messages in June 2017
*/
require_once 'function.inc.php';
require_once 'DatabaseHelper.class.php';
require_once 'CountryGateway.class.php';
    header("Content-Type: application/json; charset=UTF-8");
    $db = connectDB();
    $res1 = outputTotalVisits($db);
    $res2 = outputUniqueCountryNum($db);
    $res3 = outputEmpToDoNum($db);
    $res4 = outputMessageNum($db);
    $ary = array($res1, $res2, $res3, $res4);
    if(! is_null($ary)) {
            echo json_encode($ary, JSON_FORCE_OBJECT);
        } else {
            echo "{'msg':'Error with database'}";
        }
    //echo json_encode($ary, JSON_FORCE_OBJECT);
    
    function outputTotalVisits($db) {
        $visits = new CountryGateway($db);
        $sql = $visits->getSelectTotalVists();
        return $result1 = $visits->getStatement($sql);
    }
    
    function outputUniqueCountryNum($db) {
        $countriesNum = new CountryGateway($db);
        $sql = $countriesNum->getSelectUniqueCountries();
        return $result2 = $countriesNum->getStatement($sql);
    }
    
    function outputEmpToDoNum($db) {
        $employeeNum = new CountryGateway($db);
        $sql = $employeeNum->getTotalToDo();
        return $result3 = $employeeNum->getStatement($sql);
    }
    
    function outputMessageNum($db) {
        $messageNum = new CountryGateway($db);
        $sql = $messageNum->getTotalMessages();
        return $result4 = $messageNum->getStatement($sql);
    }
?>