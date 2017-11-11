<?php
    include "function.inc.php";
    
    /*
This card contains a drop down list of US State names.
*/
    function outputStates() {
        $db = connectDB();
        $state = new UniversityGateway($db);
        echo "<div class='mdl-cell mdl-cell--12-col'><form id='universityForm' action='browse-universities.php' method='get' class='content'>";
        echo "<select name=state>";
        echo "<option value=0>Select a State</option>";
        $result = $state->findByUState("StateName");
        foreach($result as $key=>$value) {
            echo '<option value="' . $result[$key]['StateName'] . '"';
            if ($_GET['state'] == $result[$key]['StateName']) {
                echo ('selected="selected"'); 
            }
            echo '>';
            echo $result[$key]['StateName'];
            echo "</option>";
        }
        echo "</select>";
        echo '<input class="ui button" type="submit" value="Filter">';
        echo "</form></div>";
    }
    
/*
 Displays the list of university names by US States.
*/
    function outputAllUniversities() {
        $db = connectDB();
        $university = new UniversityGateway($db);
        $result = $university->findAllByLimit($_GET['state'], 20);
        //var_dump($result);
        
        foreach ($result as $key => $value) {
            //echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?state='. $_GET['state'] . '&university=' . $result[$key]['UniversityID'] . '" class="';
            echo '<a href="browse-universities.php' . '?university=' . $result[$key]['UniversityID'] . '" class="';
            if (isset($_GET['university']) && $_GET['university'] == $result[$key]['UniversityID']) echo 'active';
            echo 'item">';
            echo $result[$key]['Name']. '</a><br/>';
        }
    }
    
    function outputUniversityByState() {
        $db = connectDB();
        $university = new UniversityGateway($db);
        $result = $university->findAllByLimit($_GET['state'], 20);
        //var_dump($result);
        
        foreach ($result as $key => $value) {
            echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?state='. $_GET['state'] . '&university=' . $result[$key]['UniversityID'] . '" class="';
            //echo '<a href="browse-universities.php' . '?state='. $_GET['state'] . '&university=' . $result[$key]['UniversityID'] . '" class="';
            if (isset($_GET['university']) && $_GET['university'] == $result[$key]['UniversityID']) echo 'active';
            echo 'item">';
            echo $result[$key]['Name']. '</a><br/>';
        }
    }
    
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
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
                <?php  
                /* Display the US States on the drow down list */
                    echo outputStates();    
                ?> 
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp listUniversity">
                <div class="mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Universities</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php  
                               /* Display all universities, but it displays those universities by each US State if it is not NULL */
                                if (isset($_GET['state']) && $_GET['state'] == "0") {
                                    echo "Please select a state";
                                } else if(isset($_GET['state']) && $_GET['state'] != null) {
                                    echo outputUniversityByState();
                                }else if(isset($_GET['state']) && $_GET['state'] == null){
                                    echo outputAllUniversities();
                                } else {
                                    echo outputAllUniversities();
                                }
                        ?> 
                    </ul>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <!--Title-->
                <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                    <h2 class="mdl-card__title-text">University Details</h2>
                </div>
                <div class="page-content">
                    <!--Handle a missing and/or incorrect query string-->
                    <?php
                     
                        if (isset($_GET['university']) && $_GET['university'] >0) {
                            //include 'university-information.php';
                            outputAddress(); 
                        }
                        else {
                            echo "No university found by request. Try clicking on a university from list.";
                        }
                    ?>
                </div>
            </div>
        </div>
        
    </section>
</main>
