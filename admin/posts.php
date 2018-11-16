
<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">
<?php
$username = $_SESSION['username'];
$user_role = $_SESSION['user_role'];
?>
        <!-- Navigation -->
       
<?php include "includes/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Welcome To Posts 
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                         <?php 
                        get_source();
                        ?>
                       
                       
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