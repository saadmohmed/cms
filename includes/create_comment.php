<?php include "db.php";?>


<?php 
if (isset($_GET['get_id'])) {
	$the_post_id = $_GET['get_id'];
}

if (isset($_POST['comment_author'])) {
    $the_post_id = $_GET['get_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = strip_tags($_POST['comment_content']);
    $comment_author = mysqli_real_escape_string($conn, $comment_author);
    $comment_content = mysqli_real_escape_string($conn, $comment_content);

    $postQu = "SELECT admin_name FROM posts WHERE id = $the_post_id ";
    $sqli = mysqli_query($conn, $postQu);
    $row = mysqli_fetch_assoc($sqli);
    $admin_name = $row['admin_name'];
    date_default_timezone_set("Africa/Cairo");
    $hour = date("h:i:sa");
    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content,comment_status, comment_date,comment_hour, post_creator)";
    $query .= " VALUES ('{$the_post_id}' ,'{$comment_author}','{$comment_email}','{$comment_content}','Approved',now() ,'{$hour}', '{$admin_name}')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("sasas");
    }

    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE id = $the_post_id ";
    $result_update_comment_count = mysqli_query($conn, $query);

    #header("Location: ../post.php?get_id=$the_post_id&&#newcomment");
    #header( "refresh:1;home.php" );
}


?>