<?php
function search_all()
{
    global $conn;
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        if (strlen($search) > 0 && strlen(trim($search)) == 0 || empty($search)) {
             echo "<h2 style='color:red' class='text-center'>We found 0 result for you</h2>";
        }else{
        $query = "SELECT * FROM categories JOIN posts ON categories.cate_id = posts.post_category_id WHERE (post_tags LIKE '%$search%' OR cate_title LIKE '%$search%') AND (post_status = 'published') ";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("no conn " . mysqli_error($conn));
        }
        $count = mysqli_num_rows($result);
        if ($count == 0) {
            echo "<h1 class='text-center' style='color:red;'>No result :(</h1>";
        }


         echo "<h2 class='text-center' style='color:green'>We found $count result for you</h2>";
       
        while ($row = mysqli_fetch_assoc($result)) {

            $post_title = $row['post_title'];
            $post_id = $row['id'];
            $post_author = $row['post_autor'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            
            echo "<h2>";
            echo " <a href='#'>{$post_title}</a></h2>";
            echo " <p class = 'lead'>";
            echo "  by <a href = 'index.php' >{$post_author} </a>";
            echo "</p>";
            echo "<p> <span class='glyphicon glyphicon-time'> </span> Posted on {$post_date} at  10 :00 PM </p>";
            echo "  <hr>";
           echo "<p style='font-size: 20px;font-family: Arial, Helvetica, sans-serif; padding:15px; '>{$post_content}</p>";
        echo "<hr>";

        echo "<img style='height:400px; width:400px' class='img-responsive' src='{$post_image}' alt=''>";
        echo "<hr>";

            echo "<a class='btn btn-primary' href='post.php?get_id=$post_id'> Read More <span class='glyphicon glyphicon-chevron-right'> </span> </a>";

            echo "<hr>";
        
        }
    }
    }
}

?>