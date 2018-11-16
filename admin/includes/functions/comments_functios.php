
 <?php

function delete_from_comments(){
    global $conn;
    if (isset($_SESSION['user_role'])) {
    $var = $_SESSION['user_role'];
    if (in_array($var, array("superuser","admin"))) {
    if (isset($_GET['delete-id'])) {
        $get_comment_id = $_GET['delete-id'];
        $query = "DELETE FROM comments WHERE comment_id= {$get_comment_id} ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("sorry");
        }
        header('Location: comments.php');
    }
}
}
}

  ?>