<?php

header("Location: index.php");

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
   

                 if (isset($_POST['action'])){
                  
                  $post_title = $_POST['title'];
                  $post_body = $_POST['body'];
                  $post_author = $_POST['author'];
                  $post_date = $_POST['created_at'];  
         

                  $sql="INSERT INTO posts (title,body,author,created_at) VALUES ('$post_title', '$post_body', '$post_author', '$post_date')";
                  $statement = $connection->prepare($sql); 
                  $statement->execute();
                  $statement->setFetchMode(PDO::FETCH_ASSOC);
                  $posts = $statement->fetchAll();


                  
                }

?>