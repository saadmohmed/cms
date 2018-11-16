<?php ob_start() ?>
<?php session_start(); ?>
<?php
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
?>
<?php include "functions/comments_functios.php"; ?>
<?php include "functions/users_functions.php"; ?>
<?php include "functions/posts_functions.php"; ?>
<?php include "functions/cate_functions.php"; ?>
<?php include "functions.php"; ?>

<?php include "functions/add_post_functions.php"; ?>
<?php include"../includes/db.php";?>



<?php

if (isset($_SESSION['user_role'])) {
    $var = $_SESSION['user_role'];
    if (!in_array($var, array("admin", "superuser"))) {
       header("Location: ../index.php");
    }

}else {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
     
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
     <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>