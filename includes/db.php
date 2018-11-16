<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 $conn = mysqli_connect("localhost","saad","123","cms2");

 if (!$conn) {
  echo "We are not connected :( ";
 }
?>