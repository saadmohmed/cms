<?php include "db.php";?>
<?php
   if (isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }; 
    $start_from = ($page - 1) * 3;
      
    $query = "SELECT * FROM posts   WHERE post_status = 'published' ORDER BY id  DESC  LIMIT  $start_from,3  ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        $like = $row['like_to'];
        $post_title = $row['post_title'];
        $post_author = $row['post_autor'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,300);
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
       echo  $like_status = $row['like_status'];

        if (isset($_POST['like_it'])) {
            echo "asa<scrip>alert(':)')</script>";
        }
        echo "<h2>";
        echo " <a href='post.php?get_id=$post_id'>{$post_title}</a></h2>";
        echo " <p class = 'lead'>";
        echo "  by <a href = 'admin/profile.php' >{$post_author} </a>";
        echo "</p>";
        echo "<p> <span class='glyphicon glyphicon-time'> </span> Posted on {$post_date} at  10 :00 PM </p>";
        echo "  <hr>";
        echo "<p style='font-size: 20px;font-family: Arial, Helvetica, sans-serif; padding:15px; '>{$post_content}</p>";
        echo "<hr>";
        
        echo "<img style='height:400px; width:600px' class='img-responsive' src='{$post_image}' alt=''>";
        echo "<hr>";
        ?>

          <a class='post_id' rel='$post_id'  style='text-decoration: none; ' id='like_it' href='javascript:void'>
            <?php if ($like_status == 'liked') {
                echo "Unlike";
            }else{
                echo "sLike";
            } ?>
             </a> -><?php echo $like?><br><br>";
                <?php 
        // echo "<a class='post_id2' rel='$post_id'  style='text-decoration: none; ' id='dislike_it' href='javascript:void'>Dis Like   </a>   <h4></h4><br><br>";
        echo "<a  class='btn btn-primary' href='post.php'> Read More <span class='glyphicon glyphicon-chevron-right'> </span> </a>";

        echo "<hr>";
    
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".post_id").on('click', function(){
         var id = $(this).attr("rel");
        $.ajax({
            url: 'includes/process2.php',
            type: 'POST',
            data: {post_id: id},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        

    });
         $(".post_id2").on('click', function(){
            var id_dis = $(this).attr("rel");
            $.ajax({
                url: 'includes/process2.php',
                type: 'POST',
                data: {post_id_dis: id_dis},
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
         })
    })
    
    
</script>

