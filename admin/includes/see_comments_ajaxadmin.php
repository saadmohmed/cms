<?php include"../../includes/db.php";?>
<?php session_start();?>
<?php

      $user = $_SESSION['username'];
            $var2 = $_SESSION['user_role'];
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM comments ";
                        }else{
    $query = "SELECT * FROM comments WHERE post_creator = '$user' ";}
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $id = substr($row['comment_id'],0,15);
        $post_comment_id = substr($row['comment_post_id'],0,15);
        $author = substr($row['comment_author'],0,15);
        $comment_email = substr($row['comment_email'],0,15);
        $comment_content = substr($row['comment_content'],0,15);
        $comment_status = substr($row['comment_status'],0,15);
        $comment_date = substr($row['comment_date'],0,15);

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_date</td>";
        $queryPOstTosea = "SELECT * FROM posts  WHERE id = {$post_comment_id} ";
        $resultPOst_title = mysqli_query($conn , $queryPOstTosea);
        if (!$resultPOst_title) {
            die("");
        }

        while ($row = mysqli_fetch_assoc($resultPOst_title)) {
            $post_id = $row['id'];
            $post_title = $row['post_title'];
            if (!isset($post_title)) {
                echo "<td>The post has been deleted</td>";
            }else{
            echo "<td><a href='../post.php?get_id=$post_id'>$post_title</td>";
        }

        }
        
        echo "<td><a  rel='$id' class='approve-title' href='javascript:void(0)'>Upprove</a></td>";

        echo "<td><a rel='$id' class='unapprove-title' href='javascript:void(0)'>Unapprove</a></td>";

        echo "<td><a rel='$id' class='title-id' href='javascript:void(0)' >Delete</a></td>";

    }

   
       
    


 
       


    

?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".title-id").on('click', function(){
            if(confirm('Are you sure you want to delete this')) {
               var id = $(this).attr("rel");
               $.post("includes/process.php",{id : id} , function(data){
                   if (!data.error) {
                $("#success").show();
                $("#success").text("Comemnt is deleted");
                $("#success").fadeOut(2000);
                }
               })
           }
        });
unappproved();
appproved()
 function unappproved(){
        $(".unapprove-title").on('click', function(){
               var id2 = $(this).attr("rel");
               $.post("includes/process.php",{idun : id2} , function(data){
          if (!data.error) {
                $("#success").show();
                $("#success").text("Its not show any more");
                $("#success").fadeOut(1000);
                }
               })
        });
}
function appproved(){
          $(".approve-title").on('click', function(){
               var id3 = $(this).attr("rel");
               $.post("includes/process.php",{idapp : id3} , function(data){
                if (!data.error) {
                    $("#success").show();
                $("#success").text("Its showen now");
                $("#success").fadeOut(1000);
                }
               
               })
        })
      }

    })
</script>