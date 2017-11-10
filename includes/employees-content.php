<?php
    include "function.inc.php";
/*
 Displays the list of employee names from Employees table
*/

    function checkForFilter()
    {
        if (!isset($_GET['employeeName']) && !isset($_GET['city'])) {
            //Output all Employees
            //outputEmployees();
            outputEmployeesByFilter(null, null);
        }
        
        else if (isset($_GET['employeeName']) && empty($_GET['employeeName']) && isset($_GET['city']) && !empty($_GET['city']))
        {
            //outputEmployeesByCity($_GET['city']);
            //Output employees by city name
            outputEmployeesByFilter(null, $_GET['city']);
        }
        
        else if (isset($_GET['employeeName']) && !empty($_GET['employeeName']) && isset($_GET['city']) && empty($_GET['city'])) {
            //Output employees by lastname
            //outputEmployeesByName($_GET['employeeName']);
            outputEmployeesByFilter($_GET['employeeName'], null);
        }
        else if (isset($_GET['employeeName']) && !empty($_GET['employeeName']) && isset($_GET['city']) && !empty($_GET['city'])) {
            //Output the employee by both filters
            outputEmployeesByFilter($_GET['employeeName'], $_GET['city']);
        }
        else {
            echo "Please enter the employee name or select by city";
        }
        
    }

    function outputEmployeesByFilter($employeeName, $city) {
        $result = null;
        $both=null;
        $db = connectDB();
        $employee = new EmployeesGateway($db);
        if (isset($employeeName) && $city == null) {
            $result = $employee->findByLastName($employeeName);
        } elseif ($employeeName == null && isset($city)) {
            $result = $employee->findByCity($city);
        } elseif (!empty($employeeName) && !empty($city)) {
//??select by both
            //$result = $employee->findByCity($city);
            //var_dump($city);
            $both = $employee->findByLastName($employeeName);
            var_dump($both);
            foreach($both as $key => $value){
                
                 
                 //echo $both[$key][$value];
                // echo $both[$key]["EmployeeID"];
                if( $both[$key]['City'] == $city){
                   
                  $result=$both;
                  var_dump($result);
                    
                }else{echo "error";}
                
                
            }
            
            //$result =$employee->findByLastName($employeeName);
        } else {
            //$result = null;
            $result = $employee->findAllSorted("LastName");
        }
    //var_dump($result);
    
        foreach($result as $key =>$value) {
            // echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?employeeName=' . $result[$key]['FirstName'].$result[$key]['LastName']. '&city=' . $result[$key]['City'] . '" class="';
            echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?employee=' . $result[$key]['EmployeeID']. '" class="';
                if (isset($_GET['employee']) && $_GET['employee'] == $result[$key]['EmployeeID']) echo 'active';
                echo 'item">';
                echo $result[$key]['FirstName'] . " " . $result[$key]["LastName"] . '</a><br/>';
        }
    }
    //Display all cities in the Employees table
    function outputCityDropdown() {
        $db = connectDB();
        $employee = new EmployeesGateway($db);
        $sql = $employee->getCities();
        $result = $employee->getStatement($sql);
        //var_dump($result);
        foreach ($result as $key => $value) {
            echo "<option value = '" . $value['City'] ."'";
            if ($_GET['city'] == $value['City']) echo ('selected="selected"');
            echo ">";
            echo $result[$key]['City'];
            echo "</option>";
        }
        
    }
?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <div class = "mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Browse Employees</h2>
                </div>
            </div>
            
            <!-- mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--12-col">
                <form id="employeesForm" action="browse-employees.php" method="get" class="content">
                    <h3 class = "mdl-left-nav">Filter</h3><hr>
                    <div class = "field">
                        <label>Employee name:</label><br>
                        <input name = "employeeName" type="text" placeholder = "Enter last name"><br>
                    </div>
                    <div class = "field">
                        <label>City:</label><br>
                        <select name = "city">
                        <option value = "0">Select city</option>
                        <?php  outputCityDropdown();?>
                        </select><br>
                    </div>
                        <input class="ui button" type="submit" value="Filter">
                    
                </form>
            </div>
            <!-- mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Employees</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php  
                               /* programmatically loop though employees and display each
                                  name as <a> element. */
                                  checkForFilter();
                                 
                                 
                        ?> 
                    </ul>
                </div>
            </div>
        <!-- mdl-cell + mdl-card -->
         <?php include 'employees-details.php';
         ?>
        </div>
    </section>
</main>