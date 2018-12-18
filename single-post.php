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

    <?php include ('header.php')?>

    <main role="main" class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">

                <?php
                    if (isset($_GET['post_id'])) {
                        $sql2 = "SELECT * FROM posts
                        WHERE posts.id = {$_GET['post_id']}";
                        $statement = $connection->prepare($sql2);  
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        $singlePost = $statement->fetch();
                ?>

                <div class="blog-post">
                    <h2 class="blog-post-title"><a><?php echo($singlePost['title']) ?></a></h2>
                    <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?> by <a href="#"><?php echo($singlePost['author']) ?></a></p>

                    <p><?php echo($singlePost['body']) ?></p>
                </div><!-- /.blog-post -->

                <?php include ('comments.php');?>
                
                <div id = "comments">
                    <h3> Comments </h3>               
                    <?php
                        $sqlComments =
                            "SELECT *, COALESCE (comments.author, posts.author) as author
                            FROM comments JOIN posts ON comments.post_id = posts.id 
                            WHERE comments.post_id = {$_GET['post_id']}";

                        $statement = $connection->prepare($sqlComments);
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        $comments = $statement->fetchAll();
                    
                        foreach ($comments as $comment) {
                    ?>
                        <div class="single-comment">
                            <ul>   
                                <li><div>posted by: <strong><?php echo $comment['author'] ?> </strong> </div>
                                    <div> <?php echo $comment['tekst'] ?> </div>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    <?php } ?>
                    </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            <?php include ('sidebar.php')?>
            
        </div><!-- /.row -->
                <?php
                    } else {
                        echo('post_id nije prosledjen kroz $_GET');
                    }
                ?>

        </main><!-- /.container -->

        <?php include ('footer.php')?>

        <script src = main.js>     
        </script>
</body> 
</html>

