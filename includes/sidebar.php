<div class="col-md-4">
    <div data-spy="affix" data-offset-top="197">
                <!-- Blog Search Well -->
               <!-- <div class="well"   >
                    <h4>Blog Search</h4> -->

                    <?php
                   // if (isset($_POST['search_post'])) {
                      //  echo $search = $_POST['search'];
                    //}
                    ?>
                    
                   <!--  <form action="includes/search.php" method="POST"  >
                    <div class="input-group">
                    
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="search_post" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        </div>
                        </form>
                    </div> -->
                    
                    <!-- /.input-group -->
                     <?php
                    //session_start();
                    //if (!isset($_SESSION['username'])) { ?>  
                <!-- <div class="well"  >
                    <h4>Log in</h4>
                             
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                         <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="input-group">
                    
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">
                                Log in
                        </button>
                        </span>
                        </div>
                    </form>
                    
                    
                   
                </div> -->
                    <?php //}?>
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">

                            <ul class="list-unstyled">     
                            <?php view_all_cats(); ?> 
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <!-- <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p> -->
                </div>

            </div>