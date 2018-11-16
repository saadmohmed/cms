<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

<?php
if (isset($_POST['send_email'])) {
$to = "mohmedsaad67@outlook.com";
$subject = $_POST['subject'];
$body = $_POST['body'];
}
?>
 
    <!-- Page Content -->
    <div class="container">
        
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact Us</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        
                   
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Your Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="send_email" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send Email"><br>
                                              
                    </form>
       
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
