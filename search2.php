<?php include "includes/db.php";?>
<?php

$search = $_POST['search2'];
if (!empty($search)) {
  # code...

$quer = "SELECT * FROM posts WHERE post_title LIKE '%$search%' OR post_tags LIKE  '%$search%' ";
$res = mysqli_query($conn, $quer);

$count = mysqli_num_rows($res);
if ($count <= 0) {
	echo "There is no results for $search";
}else{
	while ($row = mysqli_fetch_assoc($res)) {
  $title = $row['post_title'];
  $id = $row['id'];
  $img = $row['post_image'];
    ?>

    <ul style="list-style: none;">
    
    <li><?php echo "<a style='font-size:15px;' href='post.php?get_id=$id''>$title || <img style='width:45px; height:45px;' src='$img' </a>"; ?></li>
</ul>
      <?php
}
}




}


?>