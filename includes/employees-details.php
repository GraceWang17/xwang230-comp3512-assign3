<?php
 //include "function.inc.php";
?>
<!--Display each employee's detail information-->
<!--Such as Address, Todo something and Messages-->

<div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
    <!--Title-->
    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
        <h2 class="mdl-card__title-text">Employee Details</h2>
    </div>
    <!--Handle a missing and/or incorrect query string-->
    <?php
        if(!isset($_GET['employee'])) {
            echo "No employee found by request. Try clicking on an employee from list.";
        } elseif (isset($_GET['employee']) && $_GET['employee'] < 1) {
            echo "No employee found by request. Try clicking on an employee from list.";
        } elseif ($_GET['employee'] >43 && $_GET['employee'] < 48) {
            echo "No employee found by request. Try clicking on an employee from list.";
        } elseif (isset($_GET['employee']) && $_GET['employee'] > 99) {
            echo "No employee found by request. Try clicking on an employee from list.";
        } else {
            include_once ('employees-address.php');
        }
         //include_once ('employees-address.php');
    ?>

</div>