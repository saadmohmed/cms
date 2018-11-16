<?php add_post(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label for="title" >Post Title</label>
     <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="cate_option" id="">
        <?php
         sea_Cate();
        ?>
           
        </select>
    </div>

    <!-- <div class="form-group">
     <label for="title" >Post Author</label>
     <input type="text" class="form-control" name="post_author">
    </div> -->

    <div class="form-group">
     <label for="post_status" >Post Status</label>
        <select class="form-control col-md-3" name="post_status" id="">
            <option>Draft</option>
            <option>Published</option>
        </select>
    </div>

    <div class="form-group">
     <label for="post_image" >Post image</label>
     <input type="file"  name="image">
    </div>

    <div class="form-group">
     <label for="post_tags" >Post Tags</label>
     <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
     <label for="post_content" >Post Content</label>
     <textarea class="form-control" name="post_content" id="" cols="30" rows="10" ></textarea>
    </div>

    <div class="form-group">
   
     <input type="submit" class="form-control btn-primary" name="add_post" value="Post">
    </div>
</form>