<!--Display all Imprints of books in the books table.-->
<?php
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
        // try{
        //     $pdo = getDB();
        //     $sql = "select Imprint from Imprints order by Imprint ASC";
        //     echo '<a href="../browse-books.php" class="'. 'item">'."All Imprints".'</a><br/>';
        //     $result = $pdo->query($sql);
        //     while ($row = $result->fetch()) {
        //         echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?imprint=' . $row['Imprint'] . '" class="';
        //         if (isset($_GET['imprint']) && $_GET['imprint'] == $row['Imprint']) echo 'active';
        //         echo 'item">';
        //         echo $row['Imprint'] . '</a><br/>';
        //     }
        //     $pdo = null;
        // } catch(PDOException $e) {
        //     die($e->getMessage());
        // }
    }
?>