<?php include"includes/header.php";?>
    <!-- Navigation -->
  
<?php include "includes/nav.php"; ?>
<div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <h1 class="bg-danger" style="padding: 10px;">Your Password or Email is Wrong</h1>
                    <h4 class="text-center" style="font-size: 24px">Log in</h4>
                             
                    <form action="includes/login.php" method="post">

                    <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username" required>
                        </div>
                   <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>

                        
                            <input class=" btn btn-custom btn-lg btn-block"  type="submit" name="login" value="Log in"> 
                           
                       
                       <a href="">Forgot your password !!??</a>
                    </form>
                    
                    
                   
                </div>
            </div>
</div>
</div>
</section>
<div class="container">
<?php include "includes/footer.php"; ?>