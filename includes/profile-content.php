<?php
session_start();
    function printProfile(){
            //if(isset($_SESSION['session_user'])){
                $id = ($_SESSION['user_id']);
                $email = ($_SESSION['email']);
                $first = ($_SESSION['first']);
                $last = ($_SESSION['last']);
                $address = ($_SESSION['add']);
                $city = ($_SESSION['city']); 
                $country=( $_SESSION['country']);
                $postal=($_SESSION['post']); 
                $phone=($_SESSION['phone'] );
                echo "<h4>Name: ". $first. " ". $last. "</h4><br>";
                echo "<p><b>Email: <b>".$email . "</p><br>";
                echo "<p><b>Address: <b> " .$address. ' '. $city. ' '. $country. ' '. $postal . "</p><br>";
                echo "<p><b>Phone: <b>" . $phone . "</p><br>";
            }
    // }
?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
           
            <div class="mdl-cell mdl-cell--12-col" >
                <div class = "mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">User Profile</h2>
                </div>
                <div>
                    <?php 
                    printProfile();
                    ?>
                </div>
                <?php ?>
            </div>
            
            </div>
    </section>
</main>