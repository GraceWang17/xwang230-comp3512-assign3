<!--Display the bookstore main website page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "includes/mainhead.php"; ?>
    </head>
    <body>
       <!-- The drawer is always open in large screens. The header is always shown,
          even in small screens. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
          <?php include "includes/mainheader.php"; 
              include "includes/mainnav.php"; ?>
          <main class="mdl-layout__content">
            <div class="page-content">
                <?php include 'includes/dashboard.php'; ?>
            </div>
          </main>
              <?php include 'includes/footer.php';?>
        </div>
    </body>
</html>