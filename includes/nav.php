  <?php ob_start();?>
  <?php include"includes/db.php";?>


  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                </button>
                 <a class="navbar-brand" href="index.php">TECHMIND</a>
            </div>
            <ul class="nav navbar-nav">
         <li><a href="">Articles</a></li>
         <li><a href="">Security</a></li>
         <li><a href="">Web Development</a></li>
         <li><a href="">How to </a></li>
         <li><a href=""><?php
        # echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
          //      $browser = get_browser(null, true);
             //print_r($browser['browser']);
              // if ($browser['browser']== 'Chrome') {
              //   print("Chrome");
              // }
         ?> </a></li>


                           
          <?php 
        if (isset($_SESSION['username'])) {
            $usernameSS = $_SESSION['username'];
            echo "<li><a href='admin/profile.php'>$usernameSS</a></li>";} ?> 


            <?php
             if (isset($_SESSION['user_role'])) {
             $var = $_SESSION['user_role'];
             if (in_array($var, array("admin", "superuser"))) {
                 echo "<li><a href='admin/index.php'>Admin</a></li>"; 
                }

         }
         
          ?>

            

      <!-- <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" action="search.php" method="POST" autocomplete="off"> 
      <div class="form-group">
        <input style="border-top-right-radius: 0;border-bottom-right-radius: 0;" type="text" name="search" class="form-control " id="search_aj" placeholder="Search">
      </div>
      <button style="margin-left:-5px;border-radius: 0;" type="submit" class="btn btn-default"><span  class="glyphicon glyphicon-search"></button>
    </form>

<script type="text/javascript">
  $("#search_aj").focusout(function() {
    $("#bar").fadeOut();
     })
</script>

    <div class="bg-success col-md-3" id="bar" style="position: absolute; top:50px; 
    background-color:white;
    color:black; display: none;">
      
      <h3 id="result"></h3>
    </div>



        <?php 
       
        if (!isset($_SESSION['username'])) {
             echo "<li><a href='registration.php'><span class='glyphicon glyphicon-user'></span> Sign Up </a></li>";}?>
       <?php       
     if (!isset($_SESSION['username'])) {?>
      <li><a href="myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
     <?php }?>
     <?php 
          
            if (isset($_SESSION['username'])) {

                echo "<li class='nav navbar-nav navbar-right'><a href='includes/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
            }

            ?> 

    </ul>
     
                      


                
          
           
        </div>
        <!-- /.container -->
    </nav>




         