
<?php


function view_all_post_for_cate(){

    global $conn;

    if (isset($_GET['category'])) {
        $cate_get_id = $_GET['category'] ;
    }
    $query = "SELECT * FROM posts WHERE post_category_id =  $cate_get_id ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $cat = $_SESSION['cate_name'];
       echo "<h2 style='color:red;'>there is no posts for this topic $cat  </h2>";
       
    }
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row == 0) {
            echo "there is no posts yet";
        }
        $post_id = $row['id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_autor'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'], 0, 100);
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        echo "<h2>";
        echo " <a href='post.php?get_id=$post_id'>{$post_title}</a></h2>";
        echo " <p class = 'lead'>";
        echo "  by <a href = 'index.php' >{$post_author} </a>";
        echo "</p>";
        echo "<p> <span class='glyphicon glyphicon-time'> </span> Posted on {$post_date} at  10 :00 PM </p>";
        echo "  <hr>";
        echo "<p style='font-size: 20px;font-family: Arial, Helvetica, sans-serif; padding:15px; '>{$post_content}</p>";
        echo "<hr>";

        echo "<img style='height:400px; width:600px' class='img-responsive' src='{$post_image}' alt=''>";
        echo "<hr>";
        

        echo "<a class='btn btn-primary' href='post.php?get_id=$post_id'> Read More <span class='glyphicon glyphicon-chevron-right'> </span> </a>";

        echo "<hr>";
    }
}


function view_all_cats(){
    global $conn;
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['cate_title'];
        $cate_id = $row['cate_id'];


        echo "<li><a href='category.php?category=$cate_id'> {$title} </a></li>";

    }
}
function view_all_nav(){
    global $conn;
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['cate_title'];
        $cate_id = $row['cate_id'];
        echo "<li><a href='category.php?category=$cate_id''> {$title} </a></li>";

    }
    // if(isset($_SESSION['user_role'])) {
    //     $var = $_SESSION['user_role'];
    //     if(in_array($var, array("admin", "superuser"))) {
    //         echo " ";
    //     }

    // }else {
    //     echo "<li> <a href = 'admin/index.php' > Admin </a> </li>";

    // }
     
      
                if (isset($_SESSION['user_role'])) {
                  $var = $_SESSION['user_role'];
                    if (in_array($var, array("admin", "superuser"))) {
            echo "<li> <a href = 'admin/index.php' > Admin </a> </li>";
                          }
                    
                }
}



?>