<?php

session_start();
include "includes/db.php";
if(!isset($_SESSION['client_email'])){

    echo "<script>window.open('../checkout.php','_self')</script>";

}else{

include("includes/db.php");
include("functions/functions.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

   <div id="top"><!-- Top Begin -->

       <div class="container"><!-- container Begin -->

           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

               <a href="#" class="btn btn-success btn-sm">

                   <?php

                   if(!isset($_SESSION['client_email'])){

                       echo "Welcome: Guest";

                   }else{

                       echo "Welcome: " . $_SESSION['client_email'] . "";

                   }

                   ?>

               </a>
               <a href="checkout.php"><?php @$client_email = $_SESSION['client_email'];
               $total =0;
               $sql = "select * from client where client_email='$client_email'  ";

               $result = mysqli_query($con,$sql);

               $run = mysqli_fetch_array($result);

               $client_id = $run['client_id'];

               $sql2 = "select * from commande where client_id ='$client_id' and statut='pending' ";

               $result2 = mysqli_query($con,$sql2);

               while($count_items=mysqli_fetch_array($result2)){
                 $produit = $count_items['Quantite'];
                 @$totalitm +=$produit;
               }
               echo @$totalitm; ?> Items In Your Cart | Total Price: <?php   $total =0;

                  @$client_email = $_SESSION['client_email'];

                  $sql = "select * from client where client_email='$client_email'";

                  $result = mysqli_query($con,$sql);

                  $run = mysqli_fetch_array($result);

                  $client_id = $run['client_id'];

                  $sql2 = "select * from commande where client_id='$client_id' and statut='pending'";

                  $result2 = mysqli_query($con,$sql2);

                  while($run2 = mysqli_fetch_array($result2)){
                      $pro_qty = $run2['Quantite'];
                       $pro_prix = $run2['montant'];
                      $sub_total = $pro_prix*$pro_qty;
                    $total+=$sub_total;
                  };
                  echo "$".$total;?> </a>

           </div><!-- col-md-6 offer Finish -->

           <div class="col-md-6"><!-- col-md-6 Begin -->

               <ul class="menu"><!-- cmenu Begin -->

                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="checkout.php">My Account</a>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">

                           <?php

                           if(!isset($_SESSION['client_email'])){

                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }

                           ?>

                       </a>
                   </li>

               </ul><!-- menu Finish -->

           </div><!-- col-md-6 Finish -->

       </div><!-- container Finish -->

   </div><!-- Top Finish -->

   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

       <div class="container"><!-- container Begin -->

           <div class="navbar-header"><!-- navbar-header Begin -->

               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->

                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">

               </a><!-- navbar-brand home Finish -->

               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                   <span class="sr-only">Toggle Navigation</span>

                   <i class="fa fa-align-justify"></i>

               </button>

               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                   <span class="sr-only">Toggle Search</span>

                   <i class="fa fa-search"></i>

               </button>

           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->

               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                   <i class="fa fa-shopping-cart"></i>

                   <span><?php echo @$totalitm;; ?> Items In Your Cart</span>

               </a><!-- btn navbar-btn btn-primary Finish -->

               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->

                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->

                       <span class="sr-only">Toggle Search</span>

                       <i class="fa fa-search"></i>

                   </button><!-- btn btn-primary navbar-btn Finish -->

               </div><!-- navbar-collapse collapse right Finish -->

               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->

                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->

                       <div class="input-group"><!-- input-group Begin -->

                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                           <span class="input-group-btn"><!-- input-group-btn Begin -->

                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->

                               <i class="fa fa-search"></i>

                           </button><!-- btn btn-primary Finish -->

                           </span><!-- input-group-btn Finish -->

                       </div><!-- input-group Finish -->

                   </form><!-- navbar-form Finish -->

               </div><!-- collapse clearfix Finish -->

           </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->

   <?php

    include("includes/sidebar.php");

    ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <h1 align="center"> Please confirm your payment</h1>

                   <form action="" method="post" ><!-- form Begin -->

                       

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Amount Sent: </label>

                          <input type="text" class="form-control" name="amount_sent" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Select Payment Mode: </label>

                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->

                              <option> Select Payment Mode </option>
                              <option> Back Code </option>
                              <option> Paypall </option>
                              <option> Payoneer </option>
                              <option> Western Union </option>

                          </select><!-- form-control Finish -->

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Transaction / Reference ID: </label>

                          <input type="text" class="form-control" name="ref_no" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Paypall / Payoneer / Western Union Code: </label>

                          <input type="text" class="form-control" name="code" required>

                       </div><!-- form-group Finish -->

                      

                       <div class="text-center"><!-- text-center Begin -->

                           <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->

                               <i class="fa fa-user-md"></i> Confirm Payment

                           </button><!-- tn btn-primary btn-lg Finish -->

                       </div><!-- text-center Finish -->

                   </form><!-- form Finish -->

                   <?php

                    if(isset($_POST['confirm_payment'])){

                        

                        

                        $amount=$_POST['amount_sent'];

                        $payment_mode=$_POST['payment_mode'];

                        $ref_no=$_POST['ref_no'];

                        $code=$_POST['code'];
                        $complete="Complete";
                        
                       
if($total<$amount){
   
                       
                      $insert_payment= "insert into payement (montant,payement_mode,payement_reference,payement_code,payement_date) values ('$amount','$payment_mode','$ref_no','$code',NOW())";

                      $run_payment=mysqli_query($con,$insert_payment);

                     
if($run_payment){
               /*     $sql20 = "select * from commande where client_id ='$client_id' and statut='pending' ";

               $result20 = mysqli_query($con,$sql20);
$lescmnd="null";
               while($lescmnds=mysqli_fetch_array($result20)){
           if($lescmnd=="null")  {     
                 $lescmnd=$lescmnds['id_commande'];
                 } else{
               $lescmnd=$lescmnd."/".$lescmnds['id_commande'];
               
           }
               }
                     echo "<script>alert('$lescmnd')</script>";
      */
    
                        $update_commande= "update commande set statut='Complete' where client_id='$client_id' and statut='pending'";

                     $run_commande=mysqli_query($con,$update_commande);

                        if($run_commande){
                            
                  /*           $sql10 = "select * from payement where montant='$amount' and id_commande IS NULL and payement_mode='$payment_mode' and payement_reference='$ref_no' and payement_code='$code'";

                  $result10 = mysqli_query($con,$sql10);

                  $run = mysqli_fetch_array($result10);

                  $payementid = $run['payement_id'];
                            */
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            echo "<script>alert(' Thank You for purchasing, your orders will be completed within 24 hours work')</script>";

                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                        }
    
    
    
    
    
    
    
    
    
    
    
}else{
    echo "<script>alert('non peyement')</script>";
    
    
}
    
}else{
                 echo "<script>alert('Montant insuffisant pour acheter des produits')</script>";     
                      
              echo "<script>window.open('confirm.php')</script>";        
                      
                  }
                    }

                   ?>

               </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
<?php } ?>
