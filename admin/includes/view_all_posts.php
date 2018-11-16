 <script type="text/javascript">
    

    $(document).ready(function(){
        see_all_posts_inadmin();
          setInterval(function () {
            see_all_posts_inadmin();
        },5000);

        function see_all_posts_inadmin(){
       $.ajax({
                //data:{username : '<?php //echo $username; ?>'},
              //  data2:{user_role : '<?php //echo $user_role; ?>'},
                url: 'includes/view_all_posts_inadmin.php',
                type: 'POST',
                success: function (show_all_posts) {
                    if (!show_all_posts.error) {
                        $("#see_posts_in_admin").html(show_all_posts);
                    }
                }
            });
   };



   


    
     
      
   });

        </script>
<a href="posts.php?source=add_post">Add Post</a>
<table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>AUTHOR</th>
                                    <th>TITLE</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    <th>IMAGE</th>
                                    <th>CONTENT</th>
                                    <th>TAGS</th>
                                    <th>COMMENTS</th>
                                    <th>DATE</th>
                                    <th>DELETE</th>
                                    <th>UPDATE</th>
                                </tr>
                            </thead>
                            <tbody id="see_posts_in_admin">
                           
                            <?php
                           // delete_from_posts();
                            ?>
                                </tr>
                            </tbody>
                        </table>