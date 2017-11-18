<?php
/*
 Displays the list of books which are sorted by Subcategory or Imprint from books table.
*/
    function outputBooks() {
        $db = connectDB();
        $books = new BooksGateway($db);
        $sql = $books->getSelectStatement();
            // Subcategory filter
            if (!empty($_GET['subcategory']) && empty($_GET['imprint'])) {
                $sql .= 'where SubcategoryName = "'. $_GET['subcategory'] .'"';
            }
            // Imprint filter
            elseif(empty($_GET['subcategory']) && !empty($_GET['imprint'])) {
                $sql .= 'where Imprint ="' . $_GET['imprint']. '"';
            }
            // Both filter
            elseif(!empty($_GET['subcategory']) && !empty($_GET['imprint'])) {
                $sql .= 'where SubcategoryName = "'. $_GET['subcategory'] .'"' . 'AND'.'Imprint ="' . $_GET['imprint']. '"';
            }
            // No filter
            else {
                // Print all books.
            }
            $sql .= ' group by Title order by Title ASC limit 0,20';
            $result = $books->getStatement($sql);
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

// Display all Imprints of books in the books table.
function generatedImprint() {
        $db = connectDB();
        $imprint = new BooksGateway($db);
        echo '<a href="../browse-books.php" class="'. 'item">'."All Imprints".'</a><br/>';
        $sql = $imprint->getImprint();
        $result = $imprint->getStatement($sql);
        //var_dump($result);
        foreach ($result as $key =>$value) {
            echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?imprint=' . $result[$key]['Imprint'] . '" class="';
            if (isset($_GET['imprint']) && $_GET['imprint'] == $result[$key]['Imprint']) echo 'active';
            echo 'item">';
            echo $result[$key]['Imprint'] . '</a><br/>';
        }
}
//<!--Display all Subcategories of all books in the books table.-->
function generatedSub() {
        $db = connectDB();
        $subcategory = new BooksGateway($db);
        echo '<a href="../browse-books.php" class="'. 'item">'."All Subcategories".'</a><br/>';
        $sql = $subcategory->getSubcategories();
        $result = $subcategory->getStatement($sql);
        //var_dump($result);
        foreach ($result as $key => $value) {
            echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?subcategory=' . $result[$key]['SubcategoryName']. '" class="';
            if (isset($_GET['subcategory']) && $_GET['subcategory'] == $result[$key]['SubcategoryName']) echo 'active';
            echo 'item">';
            echo $result[$key]['SubcategoryName'] . '</a><br/>';
        }
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
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card" id="imandsub">
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
        </div>
    </section>
</main>