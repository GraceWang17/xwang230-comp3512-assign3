<?php
 /**
 * Generate the left layout for help pages
 * @return string generated HTML
 */
    function generatedLeftMenu(){
        $output = '
            <div class="mdl-layout__drawer mdl-color--yellow-800 mdl-color-text--black-50">
            <div class="profile">
            <i id = "profileIamge" class="material-icons">account_circle</i>
            
            <h4></h4>        
            <span></span>
            </div>

            <nav class="mdl-navigation mdl-color-text--black-300">
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../login.php"><i class="material-icons" role="presentation">account_box</i> Log in</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="includes/logout.php"><i class="material-icons" role="presentation">exit_to_app</i> Log out</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../index.php"><i class="material-icons" role="presentation">dashboard</i> Dashboard</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../browse-universities.php"><i class="material-icons" role="presentation">school</i> University</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../browse-books.php"><i class="material-icons" role="presentation">book</i> Books</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../browse-employees.php"><i class="material-icons" role="presentation">contacts</i> Employees</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../analytics.php"><i class="material-icons" role="presentation">insert_chart</i> Analytics</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../aboutus.php"><i class="material-icons" role="presentation">call</i> About us</a>
            </nav>
            </div>';
        return $output;
    }
    echo generatedLeftMenu();
?>