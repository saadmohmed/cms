<?php
function add_post(){
      global $conn;
    if (isset($_POST['add_post'])) {
        $post_title = $_POST['title'];
        #$post_category_id = $_POST['cate_option'];

        if($_POST['cate_option'] =="JAVA"){
            $post_category_id = 1;
        }elseif ($_POST['cate_option'] == "PHP") {
            $post_category_id = 4;
        }elseif ($_POST['cate_option'] == "JAVASCRIPT") {
            $post_category_id = 6;
        }elseif ($_POST['cate_option'] == "RUBY") {
            $post_category_id = 2;
        }elseif ($_POST['cate_option'] == "R") {
            $post_category_id = 3;
        }elseif ($_POST['cate_option'] == "PERL") {
            $post_category_id = 7;
        }elseif ($_POST['cate_option'] == "CSS") {
            $post_category_id = 8;
        }elseif ($_POST['cate_option'] == "HTML") {
            $post_category_id = 9;
        } elseif ($_POST['cate_option'] == "ANDROID") {
            $post_category_id = 5;
        }

   
        # $post_comment_count = 5;
        $post_status = $_POST['post_status'];

        $post_tags = $_POST['post_tags'];
        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];
        $post_content = mysqli_real_escape_string($conn, $post_content);

        $target_dir = "images/";
        echo $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $post_tmp_img = $_FILES["image"]["tmp_name"];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $post_imag = $_FILES["image"]["name"];
        move_uploaded_file($post_tmp_img, "../images/$post_imag");
        date_default_timezone_set("Africa/Cairo");
        $hour = date("h:i:sa");
        $username  = $_SESSION['username'];



        $query = "INSERT INTO posts(post_category_id, post_title, post_autor, post_date, post_image, post_content, post_tags, post_status,admin_name,post_hour)
          VALUES ('{$post_category_id}','{$post_title}','{$username}',now(),'{$target_file}','{$post_content}','{$post_tags}','{$post_status}','{$username}' , '{$hour}')";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Unable to connect to ");
        } else {
            header("location: posts.php");
        }
    }
  }


function sea_Cate(){
    global $conn;
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cate_id = $row['cate_id'];
        $cate_title = $row['cate_title'];
        echo "<option>$cate_title</option>";
    }
}
  ?>