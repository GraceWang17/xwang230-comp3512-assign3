<!--Display all Subcategories of all books in the books table.-->
<?php
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