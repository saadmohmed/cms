<?php
if (isset($_GET['p_id'])) {
  $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE id =$the_post_id  ";
$sqli = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($sqli);
echo $usernmae = $rows['post_autor'];
$session =  $_SESSION['username'];
if ($session === $usernmae) {
  $query = "SELECT * FROM posts WHERE id = $the_post_id ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $author = $row['post_autor'];
    $title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $status = $row['post_status'];
    $content = $row['post_content'];
    $post_image = $row['post_image'];
    $tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $date = $row['post_date'];
  }


  if (isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
   # $post_category_id = $_POST['post_category_id'];
    // $post_author = $_POST['post_author'];
    $post_author = $_SESSION['username'];
    $post_status = $_POST['post_status'];
    $post_image = $_POST['image'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    if ($_POST['cate_option'] == "JAVA") {
      $post_category_id = 1;
    } elseif ($_POST['cate_option'] == "PHP") {
      $post_category_id = 4;
    } elseif ($_POST['cate_option'] == "JAVASCRIPT") {
      $post_category_id = 6;
    } elseif ($_POST['cate_option'] == "RUBY") {
      $post_category_id = 2;
    } elseif ($_POST['cate_option'] == "R") {
      $post_category_id = 3;
    } elseif ($_POST['cate_option'] == "PERL") {
      $post_category_id = 7;
    } elseif ($_POST['cate_option'] == "CSS") {
      $post_category_id = 8;
    } elseif ($_POST['cate_option'] == "HTML") {
      $post_category_id = 9;
    } elseif ($_POST['cate_option'] == "ANDROID") {
      $post_category_id = 5;
    }

    $target_dir = "images/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $saad = basename($_FILES["image"]["name"]);
    $post_tmp_img = $_FILES["image"]["tmp_name"];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $post_imag = $_FILES["image"]["name"];
    move_uploaded_file($post_tmp_img, "../images/$post_imag");



    if (empty(strlen(trim($saad)))) {
      $query = "UPDATE posts SET post_image ='{$post_image}' WHERE id = $the_post_id ";
      $result = mysqli_query($conn, $query);
      if (!$result) {
        die("fucktooo");
      }
    } else {

      $query = "UPDATE posts SET post_image ='{$target_file}' WHERE id = $the_post_id ";
      $result = mysqli_query($conn, $query);
      if (!$result) {
        die("fuck");
      }

    }

    $query = "UPDATE posts SET post_category_id = '{$post_category_id}' , post_title = '{$post_title}' , post_autor = '{$post_author}' ,
       post_status = '{$post_status}' , post_content = '{$post_content}' , post_tags = '{$post_tags}' ,post_date = now() WHERE  id = {$the_post_id}  ";
    $resultUp = mysqli_query($conn, $query);
    if (!$resultUp) {
      die("njooooooooooooooooooo");
    }



    header("Location: posts.php");
  }
  # code...
 
}else{
  header("Location: ../index.php");

}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label for="title" >Post Title</label>
     <input type="text" value="<?php echo $title;?>" class="form-control" name="title">
    </div>
    

     <div class="form-group">
          <select name="cate_option" id="">
          <?php
            $queryOf_cate = "SELECT cate_title FROM categories   ";
        $resultOfCate = mysqli_query($conn, $queryOf_cate);
        while ($row = mysqli_fetch_assoc($resultOfCate)) {
            $cate_title = $row['cate_title'];
            echo "<option value='$cate_title'>$cate_title</option>";
            
        }
          ?>
          </select>

      </div>

    <!-- <div class="form-group">
     <label for="title" >Post Author</label>
     <input type="text" value="<?php //echo $author; ?>" class="form-control" name="post_author">
    </div> -->

   <div class="form-group">
     <label for="post_status" >Post Status</label>
        <select class="form-control col-md-3" name="post_status" id="">
            <option>Draft</option>
            <option>Published</option>
        </select>
    </div>

    <div class="form-group">
     <label for="post_image" >Post image</label>
     <br>
     <img width="100" src="../<?php echo $post_image; ?>" required>
     <br>
     <br>
     <input class="form-control" type="file"  name="image" >
    </div>

    <div class="form-group">
     <label for="post_tags" >Post Tags</label>
     <input type="text" value="<?php echo $tags; ?>" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
     <label for="post_content" >Post Content</label>
     <textarea class="form-control"  name="post_content" id="" cols="30" rows="10" ><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">
   
     <input type="submit" class="form-control btn-primary" name="update_post" value="Post">
    </div>
</form>