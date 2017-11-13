<?php
    function listUniversities() {
        $db = connectDB();
        $university = new UniversityGateway($db);
        $result = $university->findByBookCondition($_GET['ISBN10']);
        //var_dump($result);
        foreach ($result as $key => $value) {
            echo '<a href="browse-universities.php' . '?university=' . $result[$key]['UniversityID'] . '" class="';
            if (isset($_GET['university']) && $_GET['university'] == $result[$key]['UniversityID']) echo 'active';
            echo 'item">';
            echo $result[$key]['Name']. '</a><br/>';
            //echo '<p><span>'.$result[$key]['Name'].'</span></p>';
        }
    }
?>
<div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
    <div class="mdl-card__title mdl-color--pink">
        <h2 class="mdl-card__title-text">Universities</h2>
    </div>
    <div class="mdl-card__supporting-text">
        <ul class="demo-list-item mdl-list">
            <?php  
                /* This will display a list of universities that have adopted the book. */
                listUniversities();
            ?> 
        </ul>
    </div>
</div>