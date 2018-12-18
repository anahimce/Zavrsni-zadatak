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
