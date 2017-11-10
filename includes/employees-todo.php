<?php
/*
 Displays the information of employee form the employee id specified in the id query string
*/
    function outputInformation() {
        $db = connectDB();
        $employee = new EmployeesGateway($db);
        $result = $employee->findByIdFromToDo($_GET['employee']);
        //var_dump($result);
        foreach($result as $key => $value) {
            outputToDo($result[$key]);
        }
    }
/*
 Displays the Date, Status, Priority, and Content of the employee, question for date and content
*/
    function outputToDo($row) {
        echo '<tr>';
        echo '<td class="user_content" style="text-align: left !important;">' . (new DateTime($row['DateBy']))->format('Y-M-d') . '</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . $row['Status']. '</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . $row['Priority'].'</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . substr($row['Description'], 0, 60) . '</td>';
        echo '</tr>';
    }
?>
<table class="mdl-data-table  mdl-shadow--2dp">
    <thead>
        <th class="mdl-data-table__cell--non-numeric">Date</th>
        <th class="mdl-data-table__cell--non-numeric">Status</th>
        <th class="mdl-data-table__cell--non-numeric">Priority</th>
        <th class="mdl-data-table__cell--non-numeric">Content</th>
    </thead>
    <tbody>
    <?php
    /*  display TODOs  */ 
    outputInformation();
    ?>
    </tbody>
</table>