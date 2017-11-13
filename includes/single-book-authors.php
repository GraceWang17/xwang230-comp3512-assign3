<?php
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