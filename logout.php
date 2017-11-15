<?php
    session_start();
//Destoring All Sessions
    if(session_destroy()) {
        //Redirecting to Home Page
        header("Location: login.php");
        //Redirecting to Login Page
        //header("Location: login.php");
    }
unset($_SESSION['Username']);

//Version 2
//     session_start();
//   unset($_SESSION["username"]);
//   unset($_SESSION["password"]);
   
//   echo 'You have cleaned session';
//   header('Refresh: 2; URL = login.php');
?>