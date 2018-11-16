 <?php ob_start() ?>
 <?php session_start(); ?>
<?php include "db.php";?>
<?php
   
      
 $query = "SELECT * FROM posts   WHERE post_status = 'published' ORDER BY id  DESC   ";
    $result = mysqli_query($conn, $query);

    $username = $_SESSION['username'];
    
  
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        $num_like = $row['num_of_likes'];
        $post_title = $row['post_title'];
        $post_author = $row['post_autor'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,300);
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $like_status = $row['like_status'];
        
        $post_hour = $row['post_hour'];
        
        
        echo "<h2>";
        echo " <a href='post.php?get_id=$post_id'>{$post_title}</a></h2>";
        echo " <p class = 'lead'>";
        echo "  by <a href = 'admin/profile.php' >{$post_author} </a>";
        echo "</p>";
        echo "<p> <span class='glyphicon glyphicon-time'> </span> Posted on {$post_date} at  {$post_hour} </p>";
        echo "  <hr>";
        echo "<p style='font-size: 20px;font-family: Arial, Helvetica, sans-serif; padding:15px; '>{$post_content}</p>";
        echo "<hr>";

        echo "<img style='height:400px; width:600px' class='img-responsive' src='{$post_image}' alt=''>";
        echo "<hr>";
        $qqq = "SELECT * FROM likes WHERE post_id = {$post_id} AND author = '{$username}' ";
        $ress = mysqli_query($conn, $qqq);
        $rows = mysqli_fetch_assoc($ress);
             if ($rows['status'] == 'liked') {
                 # code...
             
             echo "<a class='post_id2'  onclick='check()' rel=' $post_id'  style='text-decoration: none; ' id='like_it' href='javascript:void'>
        
             <span class='glyphicon glyphicon-thumbs-down btn btn-danger btn-lg'>    </span></a> number of like : $num_like<br><br>";
             }else{

               echo " <a  onclick='check()' class='post_id ' rel='$post_id'  style='text-decoration: none; ' id='like_it' href='javascript:void'>
       
               <span class=' btn btn-success btn-lg glyphicon glyphicon-thumbs-up'></span></a> number of likes : $num_like <br><br>";
         
             
               }
         // echo "<a class='post_id2' rel='$post_id'  style='text-decoration: none; ' id='dislike_it' href='javascript:void'>Dis Like   </a>   <h4></h4><br><br>";
              if (isset($_SESSION['username']) && $_SESSION['username']  == $post_author) {
                  echo "<a  class='btn btn-danger' href='http://localhost:8888/cms/admin/posts.php?source=edit&p_id=$post_id'>Edit</a>";
                  echo "<a  class='btn btn-danger post-title' rel='$post_id' href='javascript:void()'>Delete</a>";
              }
              echo "<a class='btn btn-primary' href='post.php?get_id=$post_id'> Read More <span class='glyphicon glyphicon-chevron-right'> </span> </a>";

        echo "<hr>";
    
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".post-title").on('click', function(){
            if(confirm('Are you sure you want to delete this Post')) {
               var id = $(this).attr("rel");
               $.post("admin/includes/process.php",{id : id} , function(data){
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
<script> function check(){ 
<?php
if (!isset($_SESSION['username'])) {
   

   ?>
   window.location.replace('../cms/registration.php');
   <?php

}
   ?>
}
</script>
<script type="text/javascript">


    $(document).ready(function(){
       
        update_like();
      function update_like(){ 
     
        $(".post_id").on('click', function(){
         var id = $(this).attr("rel");
         
        $.ajax({
            url: 'includes/process2.php',
            type: 'POST',
            data: {post_id: id},
        })
        .done(function() {
            
            alert(data);
        })
        .fail(function() {
            console.log("error");
            
            alert('You must log in first');
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
     }
         
    
    })
    
    
</script>