 <?php
    header("Location: posts.php?post_id={$_POST['post_id']}");
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password  );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $post_id = $_POST['post_id'];

    $sql = "DELETE FROM posts WHERE id=$post_id"; 
    $statement = $connection->prepare($sql);  
    $statement->execute();

    

   

       
?>
