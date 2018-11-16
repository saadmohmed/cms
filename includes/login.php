<?php include "db.php";?>
<?php session_start();?>

<?php
if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
// if (!empty($username) && !empty($password) ) {
//         echo "Log in failed";
// }
   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);
$query = "SELECT * FROM users WHERE username = '{$username}' ";
$result = mysqli_query($conn , $query);
if (!$result) {
    echo "oh my";
}


while ($row = mysqli_fetch_assoc($result)) {
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['passwordu'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    $db_user_email = $row['user_email'];

}

#$password = crypt($password, $db_user_password);
if(password_verify($password, $db_user_password )){

       $_SESSION['username'] = $db_username;
       $_SESSION['passwordu'] = $db_user_password;
       $_SESSION['firstname'] = $db_user_firstname;
       $_SESSION['lastname'] = $db_user_lastname;
       $_SESSION['user_role'] = $db_user_role;
       $_SESSION['user_email'] = $db_user_email;
       

        //redirect("/cms/admin");
       echo "Log in successed you will redirected now after 1 seconed";
        header("refresh:1;../admin");
}else{

        //redirect("../loginfailed.php");
        header("Location:../loginfailed.php");
         echo "Log in failed";
       
}
}

?>