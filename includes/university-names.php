<?php
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
?>