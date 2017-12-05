<?php 
 /**
 * Generate the left layout for help pages
 * @return string generated HTML
 * 
 */ 
    //session_start();
    function profile(){
        echo '<div class="mdl-layout__drawer mdl-color--yellow-800 mdl-color-text--black-50">
            <div class="profile">
            <i id = "profileIamge" class="material-icons">account_circle</i>';
            if(isset($_SESSION['session_user'])){
                $id = ($_SESSION['user_id']);
                $email = ($_SESSION['email']);
                $first = ($_SESSION['first']);
                $last = ($_SESSION['last']);
                echo "<h4>". $first. " ". $last. "</h4><br>";
                echo "<span>".$email . "</span>";
            }
        echo '</div>';
     }
    
    function generatedLeftMenu(){
        profile();
        $profile_link=$aboutus_link=$logout_link= $analytics_link = $emps_link = $book_link = $university_link = $index_link = "../login.php";
        if(isset($_SESSION['session_user'])){
             $index_link = "../index.php";
             $university_link = "../browse-universities.php";
             $emps_link = "../browse-employees.php";
             $book_link = "../browse-books.php";
             $analytics_link = "../analytics.php";
             $aboutus_link="../aboutus.php";
             $profile_link = "../profile.php";
        }else{
             $index_link .= "?location=index";
             $university_link .= "?location=browse-universities";
             $emps_link .= "?location=browse-employees";
             $book_link .= "?location=browse-books";
             $analytics_link .= "?location=analytics";
             $aboutus_link.="?location=aboutus";
             $profile_link .= "?location=profile";
        }
        
             
        $output = '
            <nav class="mdl-navigation mdl-color-text--black-300">
            <a class="mdl-navigation__link mdl-color-text--black-300" href="../login.php"><i class="material-icons" role="presentation">account_box</i> Log in</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $profile_link . '"><i class="material-icons" role="presentation">perm_identity</i>View Profile</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $index_link . '"><i class="material-icons" role="presentation">dashboard</i> Dashboard</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $university_link . '"><i class="material-icons" role="presentation">school</i> University</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $book_link . '"><i class="material-icons" role="presentation">book</i> Books</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $emps_link . '"><i class="material-icons" role="presentation">contacts</i> Employees</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $analytics_link . '"><i class="material-icons" role="presentation">insert_chart</i> Analytics</a>
            <a class="mdl-navigation__link mdl-color-text--black-300" href="' . $aboutus_link . '"><i class="material-icons" role="presentation">call</i> About us</a>
            </nav>
            </div>';
        return $output;
    }
   echo generatedLeftMenu();
?>