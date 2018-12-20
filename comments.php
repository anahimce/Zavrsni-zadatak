<?php
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
    ?>
<!DOCTYPE HTML>
<html>
    <head>
        <script src = main.js></script>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>

    

<h3>Your comment:</h3>

<form name="myForm" action="create-comment.php" onsubmit="return validateForm()"  method="POST"  >
<p><span class="error">* required field</span></p>

    <label>Author:<span class="error"> * </span><br></label><br>
    <input type = "text" name = "author" required><br>
    
    
    <label> Comment:<span class="error"> * </span><br></label><br>
    <textarea cols = "55" rows = "5" name = "tekst" required ></textarea><br>
    
    
    <input type="hidden" name="post_id" value="<?php echo $singlePost['id'] ?>" />
    <input type = "submit" name = "submit" value = "Submit">
</form><br><br>

<button type="button" class = "btn btn-default"> Hide comments</button><br><br>

<div id = "comments">
    <h3> Comments </h3>               
    <?php
    
        $sqlComments = 
        "SELECT *,posts.id as postId, comments.id as commId ,
        COALESCE (comments.author, posts.author) as author
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
                
                    <form class ="delete-form" method="post" action= "delete-comment.php">
                    <input type="hidden" class="confirm" name="postId" value="<?php echo $_GET['post_id']?>">
                    <input type="hidden" class="confirm" name="commId" value="<?php echo $_GET['post_id']?>">
                    <button class="btn btn-default" type ="submit" name="commentDelete">Delete</button>
                    </form><br>
        <hr>
            </ul>
        
        </div>
        <?php 
            }
        
            
        ?>
</div>
</body>
</html>