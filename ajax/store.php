<?php 
 header('Content-Type : text/xml');
 echo '<?xml version="1.0" encoding="UTF-8" standalone = "yes"?>';

 echo '<response>';
      $food = $_GET['food'];
      $foodArr = array('tuna','bacon','beef','loaf','ham');

      if (in_array($food, $foodArr)) {
      	$myJSON = json_encode($foodArr);
      	echo 'we do have '.$myJSON.'!';

      }elseif($food==''){

      	echo 'Enter a food you idiot';
      }else{
      	echo 'we do have '.$food;
      }
 echo '</response>';
?>
