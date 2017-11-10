<?php

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

?>