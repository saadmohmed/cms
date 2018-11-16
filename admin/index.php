<?php include"includes/admin_header.php";?>

    <div id="wrapper">


        <!-- Navigation -->
        
<?php include "includes/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                           
                            <small> <?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
                  <?php

                  
                     $var =  $_SESSION['username'];

    
                       $var2 = $_SESSION['user_role'];
                    if (in_array($var2, array("superuser"))) {
                        $query = "SELECT * FROM posts  ";
                    }else{
                         $query = "SELECT * FROM posts WHERE admin_name = '{$var}' ";
                     }
                     $result = mysqli_query($conn, $query);
                    $num_of_post = mysqli_num_rows($result);
                     
                        echo $num_of_post;
                     
                  ?>    
                  </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php

                      $var =  $_SESSION['username'];
    
                       $var2 = $_SESSION['user_role'];
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM comments ";
                        }else{
                $query = "SELECT * FROM comments WHERE post_creator = '{$var}' ";
                     }
                    
                    $result = mysqli_query($conn, $query);
                    
                    $num_of_comment = mysqli_num_rows($result);

                    echo $num_of_comment;
                                        ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
                            <?php
                            $query = "SELECT * FROM users ";
                            $result = mysqli_query($conn, $query);

                            $num_of_users = mysqli_num_rows($result);

                            echo $num_of_users;
                            ?>
                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>

                     <?php
                    if (isset($_SESSION['user_role'])) {

                        if ($_SESSION['user_role'] == 'superuser') {
                            
                            ?>
                     
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
    <?php
   }

                     } 
                   
    ?>

        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                        <?php
                        $query = "SELECT * FROM categories ";
                        $result = mysqli_query($conn, $query);

                        $num_of_categories = mysqli_num_rows($result);

                        echo $num_of_categories;
                        ?>
                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
                     <?php
                    if (isset($_SESSION['user_role'])) {

                        if ($_SESSION['user_role'] == 'superuser') {
                            
                            ?>

            <a href="categories.php"  target="_blank">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>

              <?php
   }

                     } 
                   
    ?>
        </div>
    </div>
</div>



                <!-- /.row -->

            </div>

            <?php
             $var =  $_SESSION['username'];
              $var2 = $_SESSION['user_role'];
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                        }else{
     $query = "SELECT * FROM posts WHERE post_status = 'published' AND admin_name = '$var'  ";}

           $resultCoutPub = mysqli_query($conn, $query);
           $publishedPost = mysqli_num_rows($resultCoutPub);
             
             
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                        }else{
            $query = "SELECT * FROM posts WHERE post_status = 'draft' AND admin_name = '$var' ";
            }
            $resultCoutDar = mysqli_query($conn, $query);
            $draftPost = mysqli_num_rows($resultCoutDar);
                
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM comments comments WHERE comment_status = 'Approved' ";
                        }else{
            $query = "SELECT * FROM comments WHERE comment_status = 'Approved' AND post_creator = '$var' ";
               }
            $resultCoutDar = mysqli_query($conn, $query);
            $Approved_comm = mysqli_num_rows($resultCoutDar);
                 
                    if (in_array($var2, array("superuser"))) {
                            $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved' ";
                        }else{
            $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved' AND post_creator = '$var' ";}
            $resultCoutDar = mysqli_query($conn, $query);
            $UNApproved_comm = mysqli_num_rows($resultCoutDar);
            ?>

     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php
             $elements =array('Active Posts', 'Comments','Approved Comments','UnApproved Comments', 'Users', 'Categories','Published Posts','Draft Posts');
             $count = array($num_of_post, $num_of_comment,$Approved_comm,$UNApproved_comm, $num_of_users, $num_of_categories, $publishedPost, $draftPost);
             for ($i=0; $i <6 ; $i++) { 
                echo "['{$elements[$i]}'" . "," . "{$count[$i]}],";
             }
          ?>
        //   ['Posts', 1000],
        //   ['Comments', 1000]
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
              colors: ['red','green'],
             }
        };
        

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>