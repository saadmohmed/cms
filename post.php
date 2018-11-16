<?php ob_start();?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

<?php
 if (isset($_GET['get_id'])) {
      $the_post_id = $_GET['get_id'];
 }
?>
<script type="text/javascript">
    
    $(document).ready(function(){
        update_comments();
          setInterval(function () {
            update_comments();
        },2000);

        function update_comments(){
       $.ajax({
                data:{get_id : '<?php echo $the_post_id; ?>'},
                url: 'includes/display_comment.php',
                type: 'POST',
                success: function (show_cars) {
                    if (!show_cars.error) {
                        $("#show_comments_aj").html(show_cars);
                    }
                }
            });
   };



     setInterval(function () {
            update_single_post();
        },20);
   function update_single_post(){
    $.ajax({
        data:{get_id : '<?php echo $the_post_id; ?>'},
        url : 'includes/display_post.php',
        type: 'POST',
        success : function(data_of_post){
            if (!data_of_post.error) {
                $("#see_single_post").html(data_of_post)
            }
        }
    });
   };


    $("#add-comment-form").submit(function (evt) {
       evt.preventDefault();

        var postData = $(this).serialize();

 //alert(postData)

        var url = $(this).attr('action');

       
      $.post(url, postData, function (php_table_data) {
        if (!php_table_data.error) {
            $("#comment_success").show();
            $("#comment_success").text("Comment is created");
            $("#comment_success").fadeOut(3000);

        }
              
        //  $("#car-result").html(php_table_data);

           $("#add-comment-form")[0].reset();


    });

     });


    $(".see-comment-form").on("click",function(){
         $("#create-see-comment").toggle(50);
    });

    
     
      
   });
</script>

    <!-- Navigation -->
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
              <div id="see_single_post">
           
                </div>
                <a href="javascript:void(0)" class="see-comment-form btn btn-success"> Leave a comment </a> 

             
                
                <div class="well" id="create-see-comment" style="display: none;">
                     <h3 style="display: none; background-color: green; padding: 7px;" id="comment_success"></h3>
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" id="add-comment-form" action="includes/create_comment.php?get_id=<?php echo $the_post_id;?>">
              
                    
                    <div class="form-group">
                    <label for="comment_author">Author</label>
                    <input type="text" class="form-control" name="comment_author" required>
                    </div>
                
                    <div class="form-group">
                    <label for="comment_author">Author Email</label>
                    <input type="text" class="form-control" name="comment_email" required>
                    </div>
                
                        <div class="form-group">
                        <label for="comment_content">Author Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" pattern="[0-9]{10}" required></textarea>
                        </div>
                        <button type="submit" name="create_comment" id='newcomment'  class="btn btn-primary">Comment</button>
                    </form>
                </div>

                <hr>
           
            <div  id="show_comments_aj" >

            </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
             <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
<?php include "includes/footer.php"; ?>