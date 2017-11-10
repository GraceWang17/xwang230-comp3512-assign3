<?php include 'book-information.php'; ?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
        <!-- mdl-cell + mdl-card -->
        <?php
            include 'single-book-information.php';
            include 'single-book-authors.php';
            include 'single-book-location.php';
        ?>
        </div>
    </section>
</main>