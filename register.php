<!DOCTYPE html>
<html lang="en">
    <head>
         <?php include "includes/mainhead.php"; ?>
         <!--<script src="js/register.js" type="text/JavaScript" language="javascript"></script>-->
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
        <?php //if(!isset($_SESSION))session_start();
              include "includes/mainheader.php"; 
              include "includes/mainnav.php";
              include "includes/register-content.php";
              include "includes/footer.php";
              ?>
        </div>
    </body>
</html>