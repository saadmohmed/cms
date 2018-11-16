<?php include"../../includes/db.php";?>
 <?php session_start();?>
<?php


 
#$id = $_POST['id']
$get_cate_id = $_POST['id'];
    if (isset($_SESSION['user_role'])) {
    $var = $_SESSION['user_role'];
    if (in_array($var, array("superuser","admin"))) {
    if (isset($_POST['id'])) {
        $get_comment_id = $_POST['id'];
        $query = "DELETE FROM comments WHERE comment_id= {$get_comment_id} ";
        $result = mysqli_query($conn, $query);
        $res = mysqli_query($conn,$query);
        $rows = mysqli_fetch_assoc($res);
        //$q = "SELECT * FROM comments WHERE comment_post_id =  ";
        
        $post_id= $rows['comment_post_id'];
         $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE id = {$post_id} ";
           $result_update_comment_count = mysqli_query($conn, $query);
        //header('Location: comments.php');
    }

}
}

   if (isset($_POST['idun'])) {
        $unapprove = $_POST['idun'];
        $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $unapprove  ";
        $result = mysqli_query($conn, $query);


}

 if (isset($_POST['idapp'])) {

        $approve = $_POST['idapp'];
        $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $approve  ";
        $result = mysqli_query($conn, $query);


}





    
   if (isset($_POST['id'])) {
      
         
        $get_cate_id = $_POST['id'];
        $query = "DELETE FROM posts WHERE id= {$get_cate_id} ";
        $result = mysqli_query($conn, $query);
         $anQu = "DELETE FROM comments WHERE comment_post_id = {$get_cate_id} ";
         $res = mysqli_query($conn, $anQu);

     //   header('Location: posts.php');
    }
        
    
 



?>

