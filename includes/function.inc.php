<?php
require_once('constring.php'); 
    spl_autoload_register(function ($class) {
        $file = 'includes/' .$class . '.class.php';
        if (file_exists($file)) {
            include $file;
        }
    });
    
    function connectDB() {
        $connection = DatabaseHelper::createConnectionInfo(DBCONNSTRING, DBUSER, DBPASS);
        return $connection;
    }
    
    
    
?>