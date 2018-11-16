<?php include "db.php";?>
<?php

  
  $the_post_id = $_POST['get_id'];

    $query = "SELECT * FROM posts WHERE id = $the_post_id ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_autor'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        echo "<h2>";
        echo " <a href='../post.php'>{$post_title}</a></h2>";
        echo " <p class = 'lead'>";
        echo "  by <a href = 'index.php' >{$post_author} </a>";
        echo "</p>";
        echo "<p> <span class='glyphicon glyphicon-time'> </span> Posted on {$post_date} at  10 :00 PM </p>";
        echo "  <hr>";
       echo "<p style='font-size: 20px;font-family: Arial, Helvetica, sans-serif; padding:15px; '>{$post_content}</p>";
        echo "<hr>";

        echo "<img style='height:400px; width:600px' class='img-responsive' src='{$post_image}' alt=''>";
        echo "<hr>";

        

    }

?>