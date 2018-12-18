<p>Your Comment:</p>

<form name="myForm" action="create-comment.php" method="POST" >
    <label>Author:</label><br>
    <input type = "text" name = "author"><br>
    
    <label> Comment:</label><br>
    <textarea cols = "55" rows = "5" name = "tekst"></textarea><br>
    
    <input type="hidden" name="post_id" value="<?php echo $singlePost['id'] ?>" />
    <input type = "submit" name = "submit" value = "Submit">
</form><br><br>

<button type="button" class = "btn btn-default"> Hide comments</button><br><br>

    