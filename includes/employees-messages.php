<?php
/*
 Displays the messages of employee by the employee id specified in the id query string
*/
    function outputMessages() {
        $db = connectDB();
        $employee = new EmployeesGateway($db);
        $result = $employee->findByIdFromMessages($_GET['employee']);
        //var_dump($result);
        foreach($result as $key => $value) {
            output($result[$key]);
        }
    }
/*
 Displays the MessageDate, Categrory, Contacts'name, and Content
*/
    function output($row) {
        echo '<tr>';
        echo '<td class="user_content" style="text-align: left !important;">' . (new DateTime($row['MessageDate']))->format('Y-M-d') . '</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . $row['Category']. '</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . $row['FirstName']. " ". $row['LastName'].'</td>';
        echo '<td class="user_content" style="text-align: left !important;">' . substr($row['Content'], 0, 40) . '</td>';
        echo '</tr>';
    }
?>
<table class="mdl-data-table  mdl-shadow--2dp">
    <thead>
        <th class="mdl-data-table__cell--non-numeric">Date</th>
        <th class="mdl-data-table__cell--non-numeric">Category</th>
        <th class="mdl-data-table__cell--non-numeric">From</th>
        <th class="mdl-data-table__cell--non-numeric">Message</th>
    </thead>
    <tbody>
    <?php
    /*  display Messages  */ 
    outputMessages();
    ?>
    </tbody>
</table>