
 <?php
 function view_all_users(){
      global $conn;
    $query = "SELECT * FROM users ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {


        $user_id = $row['user_id'];
        $user_username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $randSalt = substr($row['randSalt'],0,5);


        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_image</td>";
        echo "<td>$user_role</td>";
        echo "<td>$randSalt</td>";
        echo "<td><a href='users.php?change_user_to_admin=$user_id'>Admin</a></td>";
        echo "<td><a href='users.php?change_user_to_subscriber=$user_id'>Subscriber</a></td>";
        echo "<td><a href='users.php?delete-user_id=$user_id'>Delete</a></td>";
        echo "</tr>";

    }



    if (isset($_SESSION['user_role'])) {

        $var = $_SESSION['user_role'];
        if (in_array($var, array("superuser"))) {
           if (isset($_GET['change_user_to_subscriber'])) {
         $user_id = $_GET['change_user_to_subscriber'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id ";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('Location: users.php');
        }
           
        
       
    }

}
}

if (isset($_SESSION['user_role'])) {

$var = $_SESSION['user_role'];
if (in_array($var, array("superuser"))) {
    if (isset($_GET['change_user_to_admin'])) {
         $user_id = $_GET['change_user_to_admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("sorry");
        }
        header('Location: users.php');
    
    }
 

}
}
  
}
function delete_from_users(){
    global $conn;
    if (isset($_SESSION['user_role'])) {

        $var = $_SESSION['user_role'];
        if (in_array($var, array("superuser"))) {
            if (isset($_GET['delete-user_id'])) {
                $get_post_id = $_GET['delete-user_id'];
                $query = "DELETE FROM users WHERE user_id = {$get_post_id} ";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("sorry");
                }
                header('Location: users.php');
            }
        }

    } 
}



  ?>