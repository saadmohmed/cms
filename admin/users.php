
<?php include "includes/admin_header.php"; ?>

<?php

if (!is_admin($_SESSION['username'])) {
   header("Location: index.php");
}
// if (isset($_SESSION['user_role'])) {
//     $var = $_SESSION['user_role'];
//     if (!in_array($var, array("superuser"))) {
//         header("Location: ../index.php");
//     }

// } else {
//     header("Location: ../index.php");
// }
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
                           Welcome To Comments 
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                        <?php 
                        
                         if (isset($_GET['source'])) {
                             $source = $_GET['source'];

                         }else {
                             $source ='';
                         }
                         switch ($source) {
                             case 'add_post':
                                include "includes/add_post.php";
                                 break;
                             case 'edit':
                                include "includes/edit_post.php";
                                 break;
                             
                             default:
                                 include "includes/view_all_users.php";
                                 break;
                         }
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