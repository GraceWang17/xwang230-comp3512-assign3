<!--This page displays backgroud information about web designer-->
<!--This is the first assignment for Web2-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/mainhead.php"; ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
          <?php 
                include_once "includes/mainheader.php"; 
                include_once "includes/mainnav.php";
                include_once "includes/aboutus-content.php";
                echo generatedMyInformation();
                include_once 'includes/footer.php';
            ?>
        </div>
    </body>
</html>