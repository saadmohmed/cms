
<?php include "includes/admin_header.php"; ?>

<?php
if (isset($_SESSION['user_role'])) {
    $var = $_SESSION['user_role'];
    if (!in_array($var, array("superuser"))) {
        header("Location: index.php");
    }

} else {
    header("Location: ../index.php");
}
    ?>
                     <div id="wrapper">

        <!-- Navigation -->
        
<?php include "includes/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome To categories 
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <div class="col-xs-6">
                        <?php inserting_into_cats();?>
        
                        <form action="" method="post">
                          <div class="form-group">
                             <input type="text" class="form-control" name="cate_title">
                          </div>
                          <div class="form-group">
                             <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                          </div>
                        </form>
                        
                
                       <?php get_cats_value_to_update_input(); ?>
                        
                        </div>
                        <div class="col-xs-6">

                        
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>Cate id</th>
                                       <th>Cate title</th>
                                       <th>Delete</th>
                                       <th>Update</th>
                                   </tr>
                               </thead>
                              
                           <?php    view_all_cats_in_admin_root(); ?>
                            <?php delete_from_cats();?>
                                 
                               
                           </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>