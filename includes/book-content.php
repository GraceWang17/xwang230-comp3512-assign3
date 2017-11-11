<?php
    include "function.inc.php";
    include 'book-subcategory.php';
    include 'book-imprint.php';
    //include 'book-information.php';
    
/*
 Displays the list of books which are sorted by Subcategory or Imprint from books table.
*/
    function outputBooks() {
        $db = connectDB();
        $books = new BooksGateway($db);
        
        $result = $books->findAllByLimit(null, 20);
        //var_dump($result);
        
        foreach($result as $key => $value) {
            $img= '<img src="book-images/thumb/'.$result[$key]['ISBN10']. '.jpg" alt="book">';
            echo constructBookLink($result[$key]['ISBN10'], $img) .'<br/>';
            echo '<a href="single-book.php?ISBN10=' . $result[$key]['ISBN10'] . '" class="';
            if (isset($_GET['ISBN10']) && $_GET['ISBN10'] == $result[$key]['ISBN10']) echo 'active';
            echo 'item">';
            echo $result[$key]['Title'] . '</a><br/>';  
            echo '<p>';
            echo "<span>Year: </span>". $result[$key]['CopyrightYear'] . "<br/>";
            echo "<span>Subcategory Name: </span>". $result[$key]['SubcategoryName'] . "<br/>";
            echo "<span>Imprint Name: </span>". $result[$key]['Imprint']. "<br/>";
            echo '</P><br/>';
        }
    }
/* 
  Constructs a link given the ISBN10 id 
*/
    function constructBookLink($id, $label) {
        $link = '<a href="single-book.php?ISBN10=' . $id . '">';
        $link .=$label;
        $link .='</a>';
        return $link;
    }
?>
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!--mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card" id="book">
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
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card" id="imprint">
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
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card" id="subcategory">
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