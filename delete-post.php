 <?php
     header('Location: index.php');  
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


    $id =$_POST['id'];
   
   
  
    if( isset($_POST['postDelete'])){ 

        $sql = "DELETE FROM comments WHERE post_id=$id";
        $connection->exec($sql);   
       // header('Location: index.php');
          
        $sql1 = "DELETE FROM posts WHERE id=$id";
        $connection->exec($sql1);   
       // header('Location: index.php');

       } else {
           $connection = null;
           }  
    
    

       
?>
