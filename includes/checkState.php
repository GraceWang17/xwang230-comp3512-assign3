<?php
include 'checkLogin.php';

function checkSession(){
session_start();

$host = "";
$user = "";
$pass = "";
$state ="";
$salt = "";

if(isset($_SESSION['user'])){
    if(isset($_SESSION['pass'])){
        //go to previous page
       //header('Location: xwang230-comp3512-assign2');
       exit();
    }
}else{
    //header('Location:login.php');
    getLoginForm();
    exit();
}
}
?>