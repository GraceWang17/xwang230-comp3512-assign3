<?php
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
        echo "<span>Subcategory Name: </span>". $row['SubcategoryName'] . "<br/>";
        echo "<span>Imprint Name: </span>". $row['Imprint']. "<br/>";
        echo "<span>Production Status: </span>". $row['Status']. "<br/>";
        echo "<span>Binding Type: </span>". $row['BindingType'] . "<br/>";
        echo "<span>Trim Size: </span>". $row['TrimSize'] . "<br/>";
        echo "<span>Page Count: </span>". $row['PageCountsEditorialEst'] . "<br/>";
        echo "<span>Description: </span>". $row['Description'] . "<br/>";
        echo '</P></div>';
    }
?>
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