<?php 
    include "function.inc.php";
/*
Display the details for a single book specified by the INSB10 value.
For each book, it includes following:
    ISBN10, ISBN13, Title, CopyrightYear, SubCategory, Imprint, Production Status, Binding Type, Trim Size, Page Count, and Description.
*/
    function outputBookInformation() {
        $db = connectDB();
        $book = new BooksGateway($db);
        $result = $book -> findById($_GET['ISBN10']);
        //var_dump($result);
        outputDetails($result);
    }
    function outputDetails($row) {
        echo '<div class="item">';
        echo $img= '<img src="book-images/medium/'.$row['ISBN10']. '.jpg" alt="book">';
        echo '<h4>' . $row['Title']. '</h4><br/>';
        echo '<p>';
        echo "<span>ISBN10: </span>". $row['ISBN10']. "<br/>";
        echo "<span>ISBN13: </span>". $row['ISBN13']. "<br/>";
        echo "<span>Year: </span>". $row['CopyrightYear'] . "<br/>";
        //echo "<span>Subcategory Name: </span>". $row['SubcategoryName'] . "<br/>";
        echo "<span>Subcategory Name: </span>";
        echo '<a href="browse-books.php?subcategory=' . $row['SubcategoryName']. '" class="';
            if (isset($_GET['subcategory']) && $_GET['subcategory'] == $row['SubcategoryName']) echo 'active';
            echo 'item">' . $row['SubcategoryName'] . '</a><br/>';
        //echo "<span>Imprint Name: </span>". $row['Imprint']. "<br/>";
        echo "<span>Imprint Name: </span>";
        echo '<a href="browse-books.php?imprint=' . $row['Imprint'] . '" class="';
            if (isset($_GET['imprint']) && $_GET['imprint'] == $row['Imprint']) echo 'active';
        echo 'item">' . $row['Imprint'] . '</a><br/>';
        echo "<span>Production Status: </span>". $row['Status']. "<br/>";
        echo "<span>Binding Type: </span>". $row['BindingType'] . "<br/>";
        echo "<span>Trim Size: </span>". $row['TrimSize'] . "<br/>";
        echo "<span>Page Count: </span>". $row['PageCountsEditorialEst'] . "<br/>";
        echo "<span>Description: </span>". $row['Description'] . "<br/>";
        echo '</P></div>';
    }
/*
* Display a list of authors for the book, sorted by the Order
*/
    function listAuthors() {
        $db = connectDB();
        $author = new BooksGateway($db);
        $sql = $author->getAuthors();
        $sql .= ' where Books.ISBN10 = "'. $_GET['ISBN10'] .'"';
        $sql .= ' group by LastName order by BookAuthors.Order ';
        $result = $author->getStatement($sql);
        //var_dump($result);
        foreach($result as $key => $value) {
            //outputAuthors($result[$key]);
            echo "<div><h4><span>";
            echo $result[$key]['FirstName'] . " ". $result[$key]['LastName'];
            echo "</h4></span></div>";
        }
        
    }
/*
* Display a list of universities that have adopted the book
* Each university name in the Adoptions card into a link+querystring to the browse university page
*/
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
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
        <!-- mdl-cell + mdl-card -->
           <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--pink">
                    <h2 class="mdl-card__title-text">Book Information</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">
                        <?php  
                            /* display the details for a single book. */
                            echo outputBookInformation();
                        ?> 
                    </ul>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp" id="author">
                    <div class="mdl-card__title mdl-color--pink">
                        <h2 class="mdl-card__title-text">All Authors</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <?php  
                                /* This will contain a list of authors for the book, sorted by the Order field */
                                listAuthors();
                            ?> 
                        </ul>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp" id="university">
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
            </div>
        </div>
    </section>
</main>