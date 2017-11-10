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
                <?php include 'employees-todo.php';?>
            </div>
            <!--Employees messages-->
            <div class="mdl-tabs__panel" id="message-panel">
                <?php include 'employees-messages.php';?>
            </div>
        </div>
    </div>