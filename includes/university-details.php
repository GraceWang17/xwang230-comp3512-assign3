<div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
    <!--Title-->
    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
        <h2 class="mdl-card__title-text">University Details</h2>
    </div>
    <!--Handle a missing and/or incorrect query string-->
    <?php
     
        if (isset($_GET['university']) && $_GET['university'] >0) {
            include 'university-information.php';
        }
        else {
            echo "No university found by request. Try clicking on a university from list.";
        }
    ?>
</div>