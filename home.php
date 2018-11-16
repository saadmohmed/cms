<?php include "includes/header.php"?>
<style type="text/css">
  
  .main_section{
    background-color: #161D1D;
    margin: 0;
    padding: 20px;
    padding-top: 100px;
   
    height: 600px;
    color:white;
    display: block;
     box-sizing: inherit;
     margin-top: -70px;
  }
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    margin: 15px;
    padding: 20px;
   
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container2 {
    padding: 2px 16px;
}
</style>
<?php include "includes/nav.php"?>
<section class="main_section">
  <div class="col-md-4" style="background: #088569; height:400px;">
     <h2 style=""> We will get all new technology here </h2>
  </div>
  <div class="col-md-4 col-xs-offset-3" style="background: #E43737; height:400px;">
    
  </div>
</section>

<div class="container">
<section class="col-lg-12">
  <?php
      $query = "SELECT * FROM posts  LIMIT 6  ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_autor'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
         $post_content = substr($row['post_content'], 0, 100);
      
  
  echo "<div class='card col-md-4' >";
  echo "<img class='img-responsive' src='$post_image' alt='Avatar' style='width:100%; height:250px;'>";
  echo "<div class='container2'>";
   echo " <h3><b>$post_title</b></h3> ";
   echo " <h4><b>by $post_author</b></h4> ";
    echo "<p>$post_content</p> ";
    echo "<h2>$post_date</h2>";
 echo " </div>";
 echo "<a class='text-center' href='post.php?get_id=$post_id'> Read the details <span class='glyphicon glyphicon-chevron-right'> </span> </a>";
echo "</div>";
  }
  ?>
</section>
<br>
<div>
<a class='btn btn-primary text-center col-xs-offset-5' href='index.php'> See More  Posts<span class='glyphicon glyphicon-chevron-right'> </span> </a>
</div>
</div>
<?php include "includes/footer.php"?>