<!--This page display a list of employees from the Employees table and sorted by last name-->
<!--    When the page receives a request with employee id, then display a MDL card containing a set of tabs.-->
<!DOCTYPE html>
<html lang="en">
    <head>
         <?php include "includes/mainhead.php"; ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
        <?php include "includes/mainheader.php"; 
              include "includes/mainnav.php";
              include "includes/employees-content.php";
              include "includes/footer.php";
              ?>
        </div>
    </body>
</html>