<?php
//include 'fuction.inc.php';

$db = connectDB();
session_start();
$checkedUser = $_SESSION['username'];
$sql = mysql_query("SELECT username from UsersLogin where username = '$checkedUser'");
$row = mysql_fetch_assoc($sql);
$logSession = $row['username'];
if(!isset($logSession)){
    mysql_close($db);
    header('Location: index.php');
}
?>