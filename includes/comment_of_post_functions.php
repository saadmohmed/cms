<?php

function create_comment(){
    global $conn;
$the_post_id = $_GET['get_id'];
if (isset($_POST['create_comment'])) {
    $the_post_id = $_GET['get_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    $comment_author = mysqli_real_escape_string($conn, $comment_author);
    $comment_content = mysqli_real_escape_string($conn, $comment_content);

    $postQu = "SELECT admin_name FROM posts WHERE id = $the_post_id ";
    $sqli = mysqli_query($conn, $postQu);
    $row = mysqli_fetch_assoc($sqli);
    $admin_name = $row['admin_name'];
    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content,comment_status, comment_date, post_creator)";
    $query .= " VALUES ('{$the_post_id}' ,'{$comment_author}','{$comment_email}','{$comment_content}','approved',now() , '{$admin_name}')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("sasas");
    }

    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE id = $the_post_id ";
    $result_update_comment_count = mysqli_query($conn, $query);

    header("Location: post.php?get_id=$the_post_id&&#newcomment");
    #header( "refresh:1;home.php" );
}

}

// function sea_comment(){


//     global $conn;
//     $the_post_id = $_GET['get_id'];
//     $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id AND comment_status = 'Approved'  ORDER BY comment_id DESC ";
//     $result = mysqli_query($conn, $query);
//     while ($row = mysqli_fetch_assoc($result)) {

//         $id = $row['comment_id'];
//         $post_comment_id = $row['comment_post_id'];
//         $author = $row['comment_author'];
//         $comment_email = $row['comment_email'];
//         $comment_content = $row['comment_content'];
//         $comment_status = $row['comment_status'];
//         $comment_date = $row['comment_date'];
//         echo "<div class ='media' >";
//         echo "  <a class ='pull-left' href = '#'>";
//         echo "  <img class ='media-object' src='http://placehold.it/64x64' alt = ''>";
//         echo "  </a>";
//         echo "  <div class ='media-body'>";
//         echo "<h4 class ='media-heading' > $author ";
//         echo " <small> $comment_date 9 :30 PM </small>";
//         echo "</h4>";
//         echo "$comment_content";
//         echo "</div>";
//         echo "</div>";
//     }
// }
?>