<?php
class DatabaseHelper {
    //Create the connection to the database
    public static function createConnectionInfo($connString, $user, $password) {
        $pdo = new PDO($connString, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print_r($pdo);
        return $pdo;
    }
    
    //Run an SQL query and return the cursor to the database
    public static function runQuery($connection, $sql, $parameters=array()) {
        //Ensure parameters are in an array
        if (!is_array($parameters)) {
            $parameters = array($parameters);
        }
        
        $statement = null;
        if (count($parameters) > 0) {
            //Use a prepared statement if parameters
            $statement = $connection ->prepare($sql);
            $executedOk = $statement ->execute($parameters);
            if (! $executedOk) {
                throw new PDOException;
            }
        } else {
            //Execute a normal query
            $statement = $connection->query($sql);
            if (!$statement) {
                throw new PDOException;
            }
        }
        
        return $statement;
    }
}
?>