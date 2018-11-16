<?php include"db.php";?>
<?php session_start(); ?>
<?php
$post_id = $_POST['post_id'];
$post_id_dis = $_POST['post_id_dis'];
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];

	
   if (isset($_POST['post_id'])) {
	$q = "INSERT INTO likes(post_id, author, like_date ,status) VALUES ({$post_id} , '{$username}', now() , 'liked')";
	$res = mysqli_query($conn,$q);
	$qw = "UPDATE posts SET num_of_likes= num_of_likes + 1 WHERE id = {$post_id}";
	$resQw = mysqli_query($conn, $qw);
	
	
}
if (isset($_POST['post_id_dis'])) {
	
$quert2 = "DELETE FROM likes WHERE author = '{$username}' AND post_id = {$post_id_dis} ";
	$res2 = mysqli_query($conn,$quert2);
	$qw = "UPDATE posts SET num_of_likes= num_of_likes - 1  WHERE id = {$post_id_dis}";
	$resQw = mysqli_query($conn, $qw);
}
}

?>