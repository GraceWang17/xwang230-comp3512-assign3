<?php
include "function.inc.php";
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
        // try {
        //     $pdo = getDB();
        //     $sql = 'select BookID, ISBN10, Title, CoverImage, CopyrightYear, SubcategoryName, Imprint from Books 
        //             INNER JOIN Subcategories ON Books.SubcategoryID=Subcategories.SubcategoryID 
        //             INNER JOIN Imprints ON Books.ImprintID=Imprints.ImprintID ';
                        
        //     //Subcategroy filter
        //     if (!empty($_GET['subcategory']) && empty($_GET['imprint'])) {
        //         $sql .= 'where SubcategoryName = "'. $_GET['subcategory'] .'"';
        //     }
        //     // Imprint filter
        //     elseif(empty($_GET['subcategory']) && !empty($_GET['imprint'])) {
        //         $sql .= 'where Imprint ="' . $_GET['imprint']. '"';
        //     }
        //     // Both filter
        //     elseif(!empty($_GET['subcategory']) && !empty($_GET['imprint'])) {
        //         //Not work in this case.
        //     }
        //     // No filter
        //     else {
        //         // Print all books.
        //     }
        //     $sql .= ' group by Title order by Title ASC limit 0,20';
        //     $result = $pdo->query($sql);
        //     while ($row = $result->fetch()) {
        //         $img= '<img src="book-images/thumb/'.$row['ISBN10']. '.jpg" alt="book">';
        //         echo constructBookLink($row['ISBN10'], $img) .'<br/>';
        //         echo '<a href="single-book.php?ISBN10=' . $row['ISBN10'] . '" class="';
        //         if (isset($_GET['ISBN10']) && $_GET['ISBN10'] == $row['ISBN10']) echo 'active';
        //         echo 'item">';
        //         echo $row['Title'] . '</a><br/>';  
        //         echo '<p>';
        //         echo "<span>Year: </span>". $row['CopyrightYear'] . "<br/>";
        //         echo "<span>Subcategory Name: </span>". $row['SubcategoryName'] . "<br/>";
        //         echo "<span>Imprint Name: </span>". $row['Imprint']. "<br/>";
        //         echo '</P><br/>';
        //     }
        //     $pdo = null;
        //     // return;
        // } catch(PDOException $e) {
        //     die($e->getMessage());
        // }
            
        
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