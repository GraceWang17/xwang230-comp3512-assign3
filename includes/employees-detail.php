<?php
/*
 Displays the address by the employee id specified in the id query string
*/
function outputAddress() {
    $db = connectDB();
    $employee = new EmployeesGateway($db);
    //$result = $employee->findByLastName($_GET['employeeName']);
    $result = $employee->findById($_GET['employee']);
    //var_dump($result);
        echo '<div class="item">';
        echo '<h3>';
        echo $result['FirstName']. " " . $result['LastName'] . "<br/>";
        echo '</h3>';
        echo '<p>';
        echo $result['Address'] . "<br/>";
        echo $result['City'] . ", " . $result['Region'] . "<br/>";
        echo $result['Country'] . ", " . $result['Postal'] . "<br/>";
        echo $result['Email'];
        echo '</p>';
        echo '</div>';
    
}

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
    <!--Body-->
    <div class="mdl-card__supporting-text">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#address-panel" class="mdl-tabs__tab is-active">Address</a>
                <a href="#todo-panel" class="mdl-tabs__tab">To Do</a>
                <a href="#message-panel" class="mdl-tabs__tab">Messages</a>
            </div>
            <!--Address-->
            <div class="mdl-tabs__panel is-active" id="address-panel">
                <?php   
                    /* display requested employee's Address */
                    outputAddress();
                ?>
            </div>
            <!--Empolyees to do-->
            <div class="mdl-tabs__panel" id="todo-panel">
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
            </div>
            <!--Employees messages-->
            <div class="mdl-tabs__panel" id="message-panel">
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
            </div>
        </div>
    </div>