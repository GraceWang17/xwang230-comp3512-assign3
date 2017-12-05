<?php
session_start();
if(isset($_SESSION['session_user'])){
    if($_GET['location']==''){
        header("location:index.php");
    }else{
        header("location:" .$_GET['location'].".php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "includes/mainhead.php"; ?>
        <script src="js/login.js" type="text/JavaScript" language="javascript"></script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
          <?php include "includes/mainheader.php"; 
                include "includes/mainnav.php";
                include "includes/checkLogin.php"; 
                include 'includes/footer.php';
            ?>
        </div>
        <div>
        </div>
    </body>
</html>