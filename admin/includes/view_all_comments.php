
<script type="text/javascript">
    

    $(document).ready(function(){
        see_all_comments_inadmin();
          setInterval(function () {
            see_all_comments_inadmin();
        },2000);

        function see_all_comments_inadmin(){
            var app = '';

            var unapp = '';
           


       $.ajax({ 
                 type: 'POST',
                 url: 'includes/see_comments_ajaxadmin.php',
                 data :{ approve : app,
                         unapprove :unapp},
       
               
                
                success: function (show_all_comments) {
                    if (!show_all_comments.error) {
                        $("#see_comments").html(show_all_comments);
                    }
                }


            });
   }


});



        </script>

<h2 id="success" class="bg-success" style="display: none; position: absolute;left
:60%; top:5%;">  </h2>
<table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>AUTHOR</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>RESPONSE TO</th>
                                    <th>APPROVE</th>
                                    <th>UNAPPROVE</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody id="see_comments">
                           
                                
                            </tbody>

                        </table>