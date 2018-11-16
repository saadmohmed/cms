
<?php include "includes/header.php";?>
    <!-- Navigation -->
  
<?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php
          if (isset($_GET['category'])) {
        $cate_get_id = $_GET['category'] ;

    }
    $_SESSION['cate_name'] = "sssss";
    $query = "SELECT * FROM categories WHERE cate_id =  $cate_get_id ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
              $cate_title= $row['cate_title'];
              echo "Posts of $cate_title";
            $_SESSION['cate_name'] = $cate_title;
    }
    ?>
                </h1>

                <!-- First Blog Post -->
                <?php view_all_post_for_cate();  ?>

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