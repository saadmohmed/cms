<?php include "includes/db.php";?>
<?php

$search = $_POST['username'];
if (isset($_POST['username'])) {
$quer = "SELECT * FROM users WHERE username = '$search' ";
$res = mysqli_query($conn, $quer);
if(mysqli_num_rows($res) > 0) {
         echo "<h2 class='bg-danger'>User is already exists</h2>";
   }else{
       echo "<h2 class='bg-success'>this is good</h2>";
   }


}

?>