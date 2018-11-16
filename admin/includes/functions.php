<?php

function is_admin($username = ''){
 global $conn;
$qury = "SELECT user_role FROM users WHERE username = '$username' ";
$result = mysqli_query($conn, $qury);
$row = mysqli_fetch_array($result);

if ($row['user_role'] == 'admin' || $row['user_role'] == 'superuser'){
    return true;
}else{
    return false;
}
}

// function load_user(){
             
//                global $conn;



//                     $session = session_id();
//                 $time = time();
//                 $time_out_in_seconed = 05;
                

//                 $query = "SELECT * FROM users_online WHERE session = '$session' ";
//                 $send_query = mysqli_query($conn, $query);
//                 $cout = mysqli_num_rows($send_query);

//                 if ($count == NULL) {
//                     mysqli_query($conn, "INSERT INTO  users_online(session, time) VALUES('$session','$time') ");

//                 } else {
//                     mysqli_query($conn, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
//                 }

//                 $users_online_query = mysqli_query($conn,"SELECT * FROM users_online ");
//                echo $count_user = mysqli_num_rows($users_online_query);

//               mysql_query("DELETE FROM users_online WHERE time < $time - 10 ");

//                 mysql_close();
                
//             }


                ?>