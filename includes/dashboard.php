<?php
//Display the Dashboard with 4 cards when user log in the account
    if(isset($_SESSION[0])|| (!empty($_SESSION))){
         echo dashboard();
    } else {
        echo "<h3><b>Please Login at Login page</b></h>" ;
    }
    function dashboard() {
        $output = '<div class="mdl-grid">
    <!-- mdl-cell + mdl-card -->
    <!--Browse Universites-->
    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
        <div class="mdl-card__title mdl-color--orange">
            <h2 class="mdl-card__title-text">
                <a href="browse-universities.php"><img src="dashboard-images/college-icon.png" /></a>
            </h2>
        </div>
        <div class="mdl-card__supporting-text mdl-text-color--balck"> 
            <a href = "browse-universities.php"><h5>Browse Universites</h5></a>
        </div>
    </div>
    <!--Browse Books-->            
    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" action = "">
        <div class="mdl-card__title mdl-color--blue">
            <h2 class="mdl-card__title-text">
                <a href="browse-books.php"><img src="dashboard-images/Book.png" /></a>
            </h2>
        </div>
        <div class="mdl-card__supporting-text"> 
            <a href = "browse-books.php"><h5>Browse Books</h5></a>
            <ul class="demo-list-item mdl-list">
        </div>
    </div>
    <!--Browse employees-->             
    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" href="">
        <div class="mdl-card__title mdl-color--green">
            <h2 class="mdl-card__title-text">
                <a href="browse-employees.php"><img src="dashboard-images/people.png" /></a>
            </h2>
        </div>
        <div class="mdl-card__supporting-text"> 
            <a href="browse-employees.php"><h5>Browse Employees</h5></a>
                <ul class="demo-list-item mdl-list">
        </div>
    </div>
    <!--About--> 
    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
         <div class="mdl-card__title mdl-color--yellow">
            <h2 class="mdl-card__title-text">
                <a href="aboutus.php"><img src="dashboard-images/about.png" /></a>
            </h2>
        </div>
        <div class="mdl-card__supporting-text"> 
            <a href="aboutus.php"><h5>About</h5></a>
                <ul class="demo-list-item mdl-list">
        </div>
    </div>
        <!--Analysis--> 
    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
         <div class="mdl-card__title mdl-color--purple">
            <h2 class="mdl-card__title-text">
                <a href="analytics.php"><img src="dashboard-images/analysis.png" /></a>
            </h2>
        </div>
        <div class="mdl-card__supporting-text"> 
            <a href="aboutus.php"><h5>Analysis</h5></a>
                <ul class="demo-list-item mdl-list">
        </div>
    </div>
</div>';
return $output;
}
    
?>