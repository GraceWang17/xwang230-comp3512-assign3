<?php
//include 'checkLogin.php';
session_start();
if(isset($_SESSION['username'])){
    if(isset($_SESSION['password'])){
        //go to previous page
       //header('Location: xwang230-comp3512-assign2');
       outputUserInfor();
       exit();
    }
}else{
    header('Location:login.php');
    getLoginForm();
    exit();
}

?>