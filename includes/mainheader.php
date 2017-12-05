<!--/**-->
<!-- * Generate the header for help pages-->
<!-- * @return string generated HTML-->
<!-- **/-->
<?php
include "function.inc.php";
?>

<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <h1 class="mdl-layout-title"><span>Welcome</span> Bookstore</h1>
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                          mdl-textfield--floating-label mdl-textfield--align-right">
            <label id="item1" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">account_box</label>
            <div class="mdl-tooltip" for="item1">Messages</div>
                    
            <label id="item2" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">notifications</label>
            <div class="mdl-tooltip" for="item2">Notifications</div>
           
            <a id="item3" class="material-icons mdl-badge mdl-badge--overlap"  href="../logout.php"><i class="material-icons" role="presentation">exit_to_app</i></a>
            <div class="mdl-tooltip" for="item3">logout</div>
            
               <form action="/browse-employees.php" method="post" style="display: inline-block" id="searchForm">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="typeSearch" id="search_btn" id="search_bar">
                         <i class="material-icons" id="searchLogo">search</i>
                    </label>
                    <?php 
                     if(!isset($_SESSION))session_start();
                   if(isset($_SESSION[0])|| (!empty($_SESSION))) {
                        echo '<div class="mdl-textfield__expandable-holder" id = "searchDiv">';
                        echo '<input class="mdl-textfield__input" type="text" id="typeSearch" name="seachLastName">';
                        echo '<label class="mdl-textfield__label" for="typeSearch">EmployeeLastName Input</label>';
                        echo '<button class="mdl-textfield__input" for="typeSearch" id="search_btn" onclik="browse-employees.php">Search</button>';
                        echo '</div>';
                    }else{
                        echo '<div class="mdl-textfield__expandable-holder" id = "searchDiv"></div>';
                    }
                    ?>
                  </div>
            </form>
        </div>
    </div>
</header>