
<?php include"includes/header.php";?>
    <!-- Navigation -->
  
<?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <?php search_all(); ?>
                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->
         
            </div>

            <!-- Blog Sidebar Widgets Column -->
             <?php include "includes/sidebar.php"; ?>
                 
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php"; ?>