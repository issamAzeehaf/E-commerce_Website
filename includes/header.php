<?php

session_start();

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
               $sql = "select * from client where client_email='$client_email'";

               $result = mysqli_query($con,$sql);

               $run = mysqli_fetch_array($result);

               $client_id = $run['client_id'];

               $sql2 = "select * from commande where client_id ='$client_id' and statut='pending'";

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
                       <a href="./customer/my_account.php">My Account</a>
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

               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->

                   <img src="images/originallogo.jpg" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/originallogo2.jpg" alt="M-dev-Store Logo Mobile" class="visible-xs">

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

                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">

                           <?php

                           if(!isset($_SESSION['client_email'])){

                               echo"<a href='checkout.php'>My Account</a>";

                           }else{

                              echo"<a href='customer/my_account.php?my_orders'>My Account</a>";

                           }

                           ?>

                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact.php">Contact Us</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->

               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                   <i class="fa fa-shopping-cart"></i>

                   <span><?php @$client_email = $_SESSION['client_email'];
                   $total =0;
                   $sql = "select * from client where client_email='$client_email'";

                   $result = mysqli_query($con,$sql);

                   $run = mysqli_fetch_array($result);

                   $client_id = $run['client_id'];

                   $sql2 = "select * from commande where client_id ='$client_id'";

                   $result2 = mysqli_query($con,$sql2);

                   while($count_items=mysqli_fetch_array($result2)){
                     $produit = $count_items['Quantite'];
                     $total +=$produit;
                   }


                   echo @$totalitm; ?> Items In Your Cart</span>

               </a><!-- btn navbar-btn btn-primary Finish -->

               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->

                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->

                       <span class="sr-only">Toggle Search</span>

                       <i class="fa fa-search"></i>

                   </button><!-- btn btn-primary navbar-btn Finish -->

               </div><!-- navbar-collapse collapse right Finish -->

               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->

                   <form method="post" action="results.php" class="navbar-form"><!-- navbar-form Begin -->

                       <div class="input-group"><!-- input-group Begin -->

                           <input type="text" class="form-control" placeholder="Search" name="nom_produit" required>

                           <span class="input-group-btn"><!-- input-group-btn Begin -->

                           <button type="submit" name="recherche" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->

                               <i class="fa fa-search"></i>

                           </button><!-- btn btn-primary Finish -->

                           </span><!-- input-group-btn Finish -->

                       </div><!-- input-group Finish -->

                   </form><!-- navbar-form Finish -->

               </div><!-- collapse clearfix Finish -->

           </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->
