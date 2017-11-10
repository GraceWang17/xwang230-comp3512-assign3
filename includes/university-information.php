<?php
/*
 Displays the address for the university id specified in the id query string
*/

function outputAddress() {
    $db = connectDB();
    $university = new UniversityGateway($db);
    $result = $university->findById($_GET['university']);
    outputTheAddress($result);
    }
/*
 Displays a single address
*/
function outputTheAddress($row) {
        echo '<div class="item">';
        echo '<h3>';
        echo $row['Name'] . "<br>";
        echo '</h3>';
        echo '<p>';
        echo "<span>Address: </span>". $row['Address'] . "<br>";
        echo "<span>City: </span>". $row['City'] . "<br>";
        echo "<span>State: </span>". $row['State'] . "<br>";
        echo "<span>Zip: </span>". $row['Zip']. "<br>";
        echo "<span>Website: </span>". $row['website']. "<br>";
        echo "<span>Longitude: </span>". $row['Longitude']. "<br>";
        echo "<span>Latitude: </span>". $row['Latitude']. "<br>";
        echo '</p>';
        echo '</div>';
    }

?>
<!--/**-->
<!-- * Generate the details of each university for browse-universities page-->
<!-- * @return string generated HTML-->
<!-- */-->
<main class="mdl-layout__content">
    <div class="page-content">
        <?php outputAddress(); ?>
    </div>
</main>