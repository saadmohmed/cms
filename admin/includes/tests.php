<?php include"../../includes/db.php";?>
 <?php session_start();?>
<?php

$query = "DELETE FROM comments WHERE comment_id= 10";
        $result = mysqli_query($conn, $query);
        $res = mysqli_query($conn,$query);
        $rows = mysqli_fetch_assoc($res);
        //$q = "SELECT * FROM comments WHERE comment_post_id =  ";
        
        echo $post_id= $rows['comment_post_id'];
         $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE id = {$post_id} ";
           $result_update_comment_count = mysqli_query($conn, $query);
?>