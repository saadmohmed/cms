<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

<?php
if (isset($_POST['sign_up'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
function user_exsits($username2){
    global $conn;
         $qur = "SELECT username FROM users WHERE username = '$username2'";
         $res_q = mysqli_query($conn, $qur);
        
         if (mysqli_num_rows($res_q) > 0) {
             return true;
         }else{
           return false;
         }
     }

if (user_exsits($username)) {
    echo "<div class='bg-danger text-center'><h1> Sorry User name exsists Try Another One</h2></div>";
}else{
if (!empty($username) && !empty($password) && !empty($email)) {
        $username = mysqli_real_escape_string($conn, $username);
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname= mysqli_real_escape_string($conn, $lastname);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // $query = "SELECT randSalt FROM users";
        // $result = mysqli_query($conn, $query);
        // if (!$result) {
        //     die("sorry");
        // }


        // $row = mysqli_fetch_array($result);
        // $randSalt = $row['randSalt'];
        // $password = crypt($password ,$randSalt);
 
        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

        $queryResult = "INSERT INTO users(username, passwordu, user_email, user_role, user_firstname, user_lastname) VALUES ('{$username}' , '{$password}' , '{$email}' , 'subscriber','{$firstname}' ,  '{$lastname}') ";
        $result_user = mysqli_query($conn, $queryResult);
        if(!$result_user){
         die('can not sign up ');
        }
        header("location: index.php?get_req=success");
           die();
          # Redirect('index.php', false);
}else {
    echo "<h2 class='col-xs-6 col-xs-offset-3 btn-danger' style='border-radius:10px; padding:10px;'>Something is Wrong :( Try again </h2>";
}
}

}

?>
<script>
    $(document).ready(function(){
    $('#username2').keyup(function () {
            var search2 = $('#username2').val();
            $.ajax({

                url: 'search_user.php',
                data: { username: search2 },
                type: 'POST',
                success: function (data) {

                    if (!data.error) {
                        $('#saad').html(data);
                    }


                }

            });

        });
    });
</script>
 
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-6 col-xs-offset-3 text-center">
            <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h2>Before you sign up</h2>


  <strong>Note!</strong> After signing up you will be Asubscriber you will be able to sea all posts but you can't create a post if you need to be an admin to add post email us to <br><br>
  <a href="mailto:mohmedsaad67@outlook.com?Subject=Need to be and admin" target="_top" style="text-decoration: none; color: white;background-color: #09CE3C; padding: 7px;">Send Mail</a>
</div>
    </div>
<section id="login" class="" >
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Sign Up</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
                        
                        <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your first name" autocomplete="on" required value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your last name" autocomplete="on"  required value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>">
                            <?php echo isset($error["lastname"]) ? $error["lastname"] : '';  ?>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username2" class="form-control" placeholder="Enter your Username" autocomplete="off"  required value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
      
        <h2 id="saad">
        </h2>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email@example.com" autocomplete="on" required value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password"  required>
                        </div>
                
                        <input type="submit" name="sign_up" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register"><br>
                                              <p class="col-xs-6 col-xs-offset-5 ">  OR</p>
                            <span class="col-xs-6 col-xs-offset-5 ">
                           <a href="" data-toggle="modal" data-target="#myModal">Log in</a>
                           </span>
                    </form>
                    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <div class="well">
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
                    
                    
                    <!-- /.input-group -->
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
