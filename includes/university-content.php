<?php
    include 'university-US.php';
    include 'university-names.php';
    include "function.inc.php";
?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
                <?php  
                /* Display the US States on the drow down list */
                    echo outputStates();    
                ?> 
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp listUniversity">
                <div class="mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Universities</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php  
                               /* Display all universities, but it displays those universities by each US State if it is not NULL */
                                if (isset($_GET['state']) && $_GET['state'] == "0") {
                                    echo "Please select a state";
                                } else if(isset($_GET['state']) && $_GET['state'] != null) {
                                    echo outputUniversityByState();
                                }else if(isset($_GET['state']) && $_GET['state'] == null){
                                    echo outputAllUniversities();
                                } else {
                                    echo outputAllUniversities();
                                }
                        ?> 
                    </ul>
                </div>
            </div>
            <?php
                include 'university-details.php';
            ?>
        </div>
    </section>
</main>
