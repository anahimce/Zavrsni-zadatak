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
    <link href="styles/style.css" rel="stylesheet">

</head>

<body>

    <?php include ('header.php') ?>
    
    <main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <form name="createPostForm" action="new-post.php" form method="post" onsubmit="return validate()"> 
                <label> Title: </label><br>
                <input type="text" name="title" required><br>

                <label> Text: </label><br>
                <textarea name="body" rows="10" cols="70" required></textarea> <br> 

                <label> Author: </label><br>
                <input type="text" name="author" required><br> 

                <label> Date&Time: </label><br>
                <input type="datetime-local" name="created_at" value="2018-12-18 12:12:00" required><br>    

                <input type="submit" class="button" value="Save">
                <input type="hidden" name="action" value="submit">
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include ('sidebar.php') ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include ('footer.php') ?>

</body>
</html>