<?php

    $active='Account';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-12"><!-- col-md-12 Begin -->

               <div class="box"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->

                       <center><!-- center Begin -->

                           <h2> Register a new account </h2>

                       </center><!-- center Finish -->

                       <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Name</label>

                               <input type="text" class="form-control" name="name" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Email</label>

                               <input type="text" class="form-control" name="email" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Password</label>

                               <input type="password" class="form-control" name="pass" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Country</label>

                               <input type="text" class="form-control" name="country" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your City</label>

                               <input type="text" class="form-control" name="city" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Contact</label>

                               <input type="text" class="form-control" name="contact" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Address</label>

                               <input type="text" class="form-control" name="address" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Your Profile Picture</label>

                               <input type="file" class="form-control form-height-custom" name="image" required>

                           </div><!-- form-group Finish -->

                           <div class="text-center"><!-- text-center Begin -->

                               <button type="submit" name="register" class="btn btn-primary">

                               <i class="fa fa-user-md"></i> Register

                               </button>

                           </div><!-- text-center Finish -->

                       </form><!-- form Finish -->

                   </div><!-- box-header Finish -->

               </div><!-- box Finish -->

           </div><!-- col-md-12 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>


<?php

if(isset($_POST['register'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $pass = $_POST['pass'];

    $country = $_POST['country'];

    $city = $_POST['city'];

    $contact = $_POST['contact'];

    $address = $_POST['address'];

    $image = $_FILES['image']['name'];

    $image_tmp = $_FILES['image']['tmp_name'];

    $ip = getRealIpUser();

    move_uploaded_file($image_tmp,"customer/customer_images/$image");

    $sql = "insert into client (client_nom,client_email,client_pass,client_pays,client_ville,client_contacte,client_adresse,client_image,client_ip) values ('$name','$email','$pass','$country','$city','$contact','$address','$image','$ip')";

    $result = mysqli_query($con,$sql);

    if($result){

      $_SESSION['email'] = $email;

      echo "<script>alert('You have been Registered Sucessfully')</script>";

      echo "<script>window.open('index.php','_self')</script>";

    }



}

?>
