<?php include"../../includes/db.php";?>
<?php session_start();?>

<?php


    $var =  $_SESSION['username'];
    
       $var2 = $_SESSION['user_role'];
    if (in_array($var2, array("superuser"))) {
        $query = "SELECT * FROM posts  ";
    }else{
         $query = "SELECT * FROM posts WHERE admin_name = '{$var}' ";
     }
    


   
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $author = $row['post_autor'];
        $title = $row['post_title'];
        #$post_category_id = $row['cate_title'];
        $status = $row['post_status'];
        $content = substr($row['post_content'],0,20);
        $post_image = $row['post_image'];
        $tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $date = $row['post_date'];
        $admin_name= $row['admin_name'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$author</td>";
        echo "<td><a href='../post.php?get_id=$id'>$title</td>";
        $queryOf_cate = "SELECT cate_title FROM categories JOIN posts ON categories.cate_id = posts.post_category_id WHERE id = $id   ";
        $resultOfCate = mysqli_query($conn, $queryOf_cate);
        while ($row = mysqli_fetch_assoc($resultOfCate)) {
            $cate_title = $row['cate_title'];
            echo "<td>$cate_title</td>";
        }


        echo "<td>$status</td>";
        echo "<td><img width='100px'  class='img-responsive' src='../{$post_image}' alt=''></td>";
        echo "<td>$content</td>";
        echo "<td>$tags</td>";
        echo "<td>$post_comment_count</td>";
        echo "<td>$date</td>";
     //   echo "<td><a href='posts.php?delete-id=$id'>Delete</a></td>";
        echo "<td><a rel='$id' class='post-title' href='javascript:void(0)'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit&p_id=$id'>update</a></td>";
    }

    
?>


<script type="text/javascript">
    $(document).ready(function(){
        $(".post-title").on('click', function(){
            if(confirm('Are you sure you want to delete this Post')) {
               var id = $(this).attr("rel");
               $.post("includes/process.php",{id : id} , function(data){
                   //if (!data.error) {
                // $("#success").show();
                // $("#success").text("Comemnt is deleted");
                // $("#success").fadeOut(2000);
              //  }
               })
           }
        });


 })

</script>