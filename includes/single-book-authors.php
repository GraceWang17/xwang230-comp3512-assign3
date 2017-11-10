<?php
    function listAuthors() {
        // try {
        //     if (isset($_GET['ISBN10']) && !empty($_GET['ISBN10'])) {
        //         $pdo =getDB();
        //         $sql = "select FirstName, LastName, BookAuthors.Order from Authors 
        //                 INNER JOIN BookAuthors ON BookAuthors.AuthorId=Authors.AuthorID 
        //                 INNER JOIN Books ON Books.BookID=BookAuthors.BookId 
        //                 where Books.ISBN10=:ISBN10 
        //                 group by LastName order by BookAuthors.Order";
        //         $id = $_GET['ISBN10'];
        //         $statement = $pdo->prepare($sql);
        //         $statement->bindValue(':ISBN10', $id);
        //         $statement->execute();
        //         while($row = $statement->fetch()){
        //             outputAuthors($row);
        //         }
        //       $pdo = null; 
        //     } else {
        //         echo "No author is found.";
        //     }
        // } catch(PDOException $e) {
        //     die($e->getMessage());
        // } 
    }
function outputAuthors($row) {
        echo "<div><h4><span>";
        echo $row['FirstName'] . " ". $row['LastName'];
        echo "</h4></span></div>";
    }
    
?>
<div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
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