<?php include"includes/header.php";?>
    <!-- Navigation -->
  
<?php include "includes/nav.php"; ?>

<script type="text/javascript">
    
   

    $(document).ready(function(){
        <?php if(isset($_GET['page'])){?>
        show_all_posts();
          setInterval(function () {
            show_all_posts();
        },5000);

        function show_all_posts(){
       $.ajax({
                data:{page : '<?php echo $post_pager; ?>'},
                url: 'includes/see_all_posts_in_index.php',
                type: 'POST',
                success: function (show_all_posts) {
                    if (!show_all_posts.error) {

                        $("#see_all_posts").html(show_all_posts);

                    }
                }
            });
    };

<?php }else{?>
    show_all_posts_without_pager();
     setInterval(function () {
            show_all_posts_without_pager();
        },1000);

   function show_all_posts_without_pager(){
       $.ajax({
               data:{page : '<?php //echo $post_pager; ?>'},
                url: 'includes/see_all_posts_in_index_without_pager.php',
                type: 'POST',
                success: function (show_all_posts_without) {
                    if (!show_all_posts_without.error) {

                        $("#see_all_posts").html(show_all_posts_without);

                    }
                }
            });
    };
<?php }?>



});


</script>
    <!-- Page Content -->
    <div class="container">
      <script type="text/javascript">
        $(document).ready(function(){
          $(".res").fadeOut(10000) 
        })
      </script>
<?php

 if (isset($_GET['get_req'])) {
 	$get_req = $_GET['get_req'];
  echo "<div style=' postion:absloute;padding:25px;background:black; color:white; font-size:18px; text-algin:center' class='res'>User Created!!!!!!!!!!!!!! Try to log in Now <a href='myModal' data-toggle='modal' data-target='#myModal'>Log In</a></div>";
    
 }
 
?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php   if (isset($_SESSION['user_role'])) {
    $var = $_SESSION['user_role'];
    if (in_array($var, array("admin", "superuser"))) {
       
  

    # code...
    ?>
<div style="
    border-radius:12px; padding:15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <form action="" method="post" enctype="multipart/form-data" >

  <div class="form-group">
     <label for="post_content" >Post Content</label>
     <textarea class="form-control" name="post_content" id="" cols="5" rows="5" ></textarea>
    </div>
  <div class="form-group">
     <label for="post_image" >Post image</label>
     <input type="file"  name="image">
    </div>
  <div class="form-group">
      <label>Choose you category</label>
      <select name="cate_option" id=""><?php
       $query = "SELECT * FROM categories ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cate_id = $row['cate_id'];
        $cate_title = $row['cate_title'];
        echo "<option>$cate_title</option>";
    }
    ?>
      </select>
  </div>
  <button type="submit" class="btn btn-success" name="create_post">Post</button>
</form>
</div>
<?php
if (isset($_POST['create_post'])) {
    
        #$post_category_id = $_POST['cate_option'];

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

   
        # $post_comment_count = 5;
   
    echo $post_date = date('d-m-y');
    echo $post_content = $_POST['post_content'];
    echo $post_content = mysqli_real_escape_string($conn, $post_content);
    date_default_timezone_set("Africa/Cairo");
    echo $hour = date("h:i:sa");
    $target_dir = "images/";
   echo  $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $post_tmp_img = $_FILES["image"]["tmp_name"];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $post_imag = $_FILES["image"]["name"];
    move_uploaded_file($post_tmp_img, "images/$post_imag");


    // $target_dir = "images/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // $post_tmp_img = $_FILES["image"]["tmp_name"];
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $post_imag = $_FILES["image"]["name"];
    // move_uploaded_file($post_tmp_img, "images/$post_imag");


    $username = $_SESSION['username'];

    function beliefmedia_hashtag_string($string)
    {
 
 /* Match hashtags */
        preg_match_all('/#(\w+)/', $string, $matches);
 
  /* Add all matches to array */
        foreach ($matches[1] as $match) {
            $keywords .= $match . ', ';
        }

        return rtrim(trim($keywords), ',');
    }
 
 
 
/* Usage */
   
 
         $post_tag = beliefmedia_hashtag_string($post_content);

    $query = "INSERT INTO posts(post_category_id, post_title, post_autor, post_date, post_image, post_content, post_tags, post_status,admin_name,post_hour)
          VALUES ('{$post_category_id}','new','{$username}',now(),'{$target_file}','{$post_content}','{$post_tage}','published','{$username}' , '{$hour}')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Unable to connect to ");
    } else {
        header("location: index.php");
    }
}
?>
    <?php 

}

} else {
}
?>
<!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <div id="see_all_posts">
              

                </div>
            
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
             <?php include "includes/sidebar.php"; ?>
                 
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php"; ?>

     