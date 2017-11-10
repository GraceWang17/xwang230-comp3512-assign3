<?php
    include 'book-subcategory.php';
    include 'book-imprint.php';
    include 'book-information.php';
?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!--mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card">
                <div class="mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Books</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php  
                               /* Display books which are based on  filter. */
                                  echo outputBooks();
                        ?> 
                    </ul>
                </div>
            </div>
             <!--mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card" id="imprint">
                <div class="mdl-card__title mdl-color--orange">
                    <h2 class="mdl-card__title-text">Imprint</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php 
                            generatedImprint(); 
                        ?>
                    </ul>
                </div>
            </div>
                 <!--mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card" id="subcategory">
                <div class="mdl-card__title mdl-color--orange">
                    <h2 class="mdl-card__title-text">Subcategory</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php 
                            generatedSub(); 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>