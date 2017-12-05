<!--This page should display US States in drop down list, and it displays all universities in each state.-->
<!DOCTYPE html>
<html lang="en">
    <head>
         <?php include "includes/mainhead.php"; ?>
         <style>
           #map {
            height: 400px;
            width: 100%;
           }
        </style>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
          <?php 
          
                   include "includes/mainheader.php"; 
                   include "includes/mainnav.php";
                   include "includes/university-content.php";
                   include 'includes/footer.php';
              ?>
        </div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key= AIzaSyALZipn-KhyuzWeSrCI0sQjoeqLWGDGZ3M&callback=initMap" type="text/javascript"></script>

    </body>
</html>