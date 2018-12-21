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

    $sql3 = "SELECT * FROM posts order by created_at Desc limit 5";
                    $statement = $connection->prepare($sql3);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $posts = $statement->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

    <aside class="col-sm-3 ml-sm-auto blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>Latest posts</h4>
            
            <?php  foreach ($posts as $post) {  ?>
                <p><a href = "single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></p>
            <?php     }   ?>
        </div>
    </aside><!-- /.blog-sidebar -->

</body>
</html>