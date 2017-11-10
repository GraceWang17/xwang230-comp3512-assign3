<!--This displays multiple books and generates by Subcategory or Imprint lists-->
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
              include "includes/book-content.php"; 
              include 'includes/footer.php';
            ?>
        </div>
    </body>
    
</html>