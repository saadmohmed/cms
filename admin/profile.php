<?php ob_start() ?>

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
                            Your profile 
                           
                            <small> <?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->
<?php

 if(isset($_SESSION['username'])){
    $usernameSES = $_SESSION['username'];

    $qu = "SELECT * FROM users WHERE username = '$usernameSES' ";
    $res = mysqli_query($conn , $qu);
    if (!$res) {
        die("a7a77a7a7a77a7a7a7");
    }
     $row = mysqli_fetch_assoc($res);
        $user_id = $row['user_id'];
        $username =  $row['username'];
        $firstname = $row['user_firstname'];
        $lastname =  $row['user_lastname'];
        $password =  $row['passwordu'];
        $user_email=$row['user_email'];
    
    $quert_randSalt ="SELECT randSalt FROM users";
    $res_q = mysqli_query($conn, $quert_randSalt);
    $rowsalt = mysqli_fetch_array($res_q);
    $randSalt = $rowsalt['randSalt'];
    $hashed_password= crypt($password,$randSalt);


    if (isset($_POST['update_user'])) {
        $username2 = $_POST['username3'];
        $firstname2 = $_POST['firstname3'];
        $lastname2 = $_POST['lastname3'];
        $email2 = $_POST['user_email3'];
        $password = $_POST['password3'];
        $password2 = mysqli_real_escape_string($conn, $password);
        $password2 = password_hash($password2, PASSWORD_BCRYPT, array('cost' => 12));

    $query2= "UPDATE users SET username= '{$username2}',user_firstname= '{$firstname2}',user_lastname='{$lastname2}' ,user_email='{$email2}' WHERE user_id = {$user_id} ";
        $resq = mysqli_query($conn , $query2);
        header('Location: profile.php');
        if (!$resq) {
            die("a99a9a9a9a9a9");
        }else{
            $_SESSION['username'] = $username2;
        }
        if (!empty($password)) {
            if (strlen($password) > 4) {
               
            
            $query2= "UPDATE users SET passwordu= '{$password2}' WHERE user_id = {$user_id} ";
            $resq = mysqli_query($conn , $query2);
          header('Location: profile.php');
        }else{
            #die("<h1>Password must be more than 4</h1>");
            echo "<h1>Password must be more than 4</h1>";
        }
        }
        // header("Location : profile.php");

    }
}
?>
             
<form action="profile.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
     <label for="title" >User name</label>
     <input type="text" value="<?php echo $username ?>" class="form-control" name="username3">
    </div>



    <div class="form-group">
     <label for="title" >First name</label>
     <input type="text" value="<?php echo $firstname ?>" class="form-control" name="firstname3">
    </div>
    

     

    <div class="form-group">
     <label for="title" >Last name</label>
     <input type="text" value="<?php echo $lastname ?>" class="form-control" name="lastname3">
    </div>



    <div class="form-group">
     <label for="post_tags" >Email</label>
     <input type="text" value="<?php echo $user_email ?>" class="form-control" name="user_email3">
    </div>

    <div class="form-group">
     <label for="post_content" >Password</label>
     <input type="password"  class="form-control" name="password3"  >
    </div>

    <div class="form-group">
   
     <input type="submit" class="form-control btn-primary" name="update_user" value="Update Info">
    </div>
</form>



             

            </div>

            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>