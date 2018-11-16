<?php

   
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
     if (isset($_GET['delete-id'])) {
      
         
        $get_cate_id = $_GET['delete-id'];
        $query = "DELETE FROM posts WHERE id= {$get_cate_id} ";
        $result = mysqli_query($conn, $query);
        $query2 = "DELETE FROM comments WHERE comment_post_id  = {$get_cate_id} ";
        $res = mysqli_query($conn , $query2);
        header('Location: posts.php');
    
        }
    
 

?>