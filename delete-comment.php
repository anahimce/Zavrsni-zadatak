<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
        
        if (isset($_POST ['commentDelete'])){

        $deleteid = $_POST['commId'];
        $post_id = $_POST ['postId'];

    
        $sql = "DELETE FROM comments WHERE id = $deleteid";
        $connection->exec($sql);
        header("Location: http://localhost:8000/single-post.php?post_id=" .$post_id);   
    } 
        $connection = null;
    
?>

