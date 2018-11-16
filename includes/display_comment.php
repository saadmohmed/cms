<?php include "db.php";?>
<?php


// echo  $the_post_id = $_GET['get_id'];
// if (isset) {
//     # code...
// }
   $the_post_id = $_POST['get_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id AND comment_status = 'Approved'  ORDER BY comment_id DESC ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['comment_id'];
        $post_comment_id = $row['comment_post_id'];
        $author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        $comment_hour = $row['comment_hour'];
        echo "<div class ='media' >";
        echo "  <a class ='pull-left' href = '#'>";
        echo "  <img class ='media-object' src='http://placehold.it/64x64' alt = ''>";
        echo "  </a>";
        echo "  <div class ='media-body'>";
        echo "<h4 class ='media-heading' > $author ";
        echo " <small> $comment_date  at $comment_hour </small>";
        echo "</h4>";
        echo "$comment_content";
        echo "</div>";
        echo "</div>";
    }
?>