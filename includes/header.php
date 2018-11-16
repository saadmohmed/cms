 <?php ob_start() ?>
<?php session_start(); ?>
 <?php include "includes/db.php"; ?>
<?php include "functions.php" ?>
<?php include "search_functions.php" ?>
<?php #include "post_functions.php" ?>
<?php include "comment_of_post_functions.php";  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="jquery/jquery.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <!-- <script src="jquery/jquery.js"></script>
    <script src="jquery/jquery.min.js"></script> -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

    $(document).ready(function(){

     



    $('#search_aj').keyup(function(){
        var search =  $('#search_aj').val();
       // $('#result').text(search);
        $("#bar").show();

        $.ajax({
            url:'search2.php',
            data:{search2:search},
            type:'post',
            success:function (data){
                if (!data.error) {
                    $('#result').html(data)
                }
            }
        });
    });
///  end of the search results

    });
    


// end of createing the comment 


    

</script>
</head>

<style type="text/css">
body{
    background-color: #f1f1f1!important;
}

.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}


</style>
<body>

                    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">TECHCODE</h4>
        </div>
        <div class="modal-body">
            <div class="well">
                    <h4>Log in</h4>
                             
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                         <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="input-group">
                    
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">
                                Log in
                        </button>
                        </span>
                        </div>
                    </form>
                    
                    
                    <!-- /.input-group -->
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>