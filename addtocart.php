<?php

    $active='Home';


?>
<?php

session_start();

include("includes/db.php");
include("functions/functions.php");



$id_produit=$_SESSION["id-prod"];

if(!isset($_SESSION['client_email'])){
                    echo "<script>alert('Vous devez vous connecter ou vous inscrire sur le site pour ajouter vos produits à la panie')</script>";
                 echo "<script>window.open('details.php?pro_id=$id_produit','_self')</script>";
    
}else{
    
    @$quantite=$_POST['product_qty'];
    @$taille=$_POST['product_size'];
    $client_email = $_SESSION['client_email'];
    $id_produit=$_SESSION["id-prod"];
    $montant=$_SESSION["montant"];
    $date = date("Y/m/d");
    $statut = "pending";  
    
    
               $sql = "select * from client where client_email='$client_email'";

               $result = mysqli_query($con,$sql);

               $run = mysqli_fetch_array($result);

               $client_id = $run['client_id'];

               $sql2 = "select * from commande where client_id ='$client_id' and statut='$statut' and id_produit='$id_produit'";
               $result2 = mysqli_query($con,$sql2);

               $run2 = mysqli_fetch_array($result2);

               $ancqty = $run2['Quantite'];
   
               $nvqty=$ancqty+$quantite;
    
    if(isset($ancqty)){
      $sqli2 = "UPDATE `commande` SET `Quantite`='$nvqty' WHERE  client_id ='$client_id' and statut='$statut' and id_produit='$id_produit'";
          $result4 = mysqli_query($con,$sqli2);
                 if($result4){
                 echo "<script>alert('Le produit est dans le panier! Nous avons changé la quantité')</script>";
                 }
    
    }else{
        
        
          $sql5 = "insert into `commande`(`Quantite`, `Taille`, `statut`, `client_id`, `id_produit`, `montant`, `date`) VALUES ('$quantite','$taille','$statut',$client_id,$id_produit,'$montant','$date')";
                 $result5 = mysqli_query($con,$sql5);
                 if($result5){
                 echo "<script>alert('Le produit a été ajouté au panier')</script>";
                 }
        
    }
    
    
}
   
   
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
                    @$total+=$sub_total;
                  };
                  echo "$".@$total;?> </a>

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


   <div class="container" id="slider"><!-- container Begin -->

       <div class="col-md-12"><!-- col-md-12 Begin -->

           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->

               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->

                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>

               </ol><!-- carousel-indicators Finish -->

               <div class="carousel-inner"><!-- carousel-inner Begin -->

                  <?php

                   $get_slides = "select * from slide LIMIT 0,1";

                   $run_slides = mysqli_query($con,$get_slides);

                   while($row_slides=mysqli_fetch_array($run_slides)){

                       $slide_name = $row_slides['slide_nom'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];

                       echo "

                       <div class='item active'>

                           <a href='$slide_url'>

                                <img src='admin_area/slides_images/$slide_image'>

                           </a>

                       </div>

                       ";

                   }

                   $get_slides = "select * from slide LIMIT 1,3";

                   $run_slides = mysqli_query($con,$get_slides);

                   while($row_slides=mysqli_fetch_array($run_slides)){

                       $slide_name = $row_slides['slide_nom'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];

                       echo "

                       <div class='item'>

                           <a href='$slide_url'>

                                <img src='admin_area/slides_images/$slide_image'>

                           </a>

                       </div>

                       ";

                   }

                   ?>

               </div><!-- carousel-inner Finish -->

               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>

               </a><!-- left carousel-control Finish -->

               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>

               </a><!-- left carousel-control Finish -->

           </div><!-- carousel slide Finish -->

       </div><!-- col-md-12 Finish -->

   </div><!-- container Finish -->

   <div id="advantages"><!-- #advantages Begin -->

       <div class="container"><!-- container Begin -->

           <div class="same-height-row"><!-- same-height-row Begin -->

           <?php

           $get_boxes = "select * from boite_section";
           $run_boxes = mysqli_query($con,$get_boxes);

           while($run_boxes_section=mysqli_fetch_array($run_boxes)){

            $box_id = $run_boxes_section['section_id'];
            $box_title = $run_boxes_section['section_titre'];
            $box_desc = $run_boxes_section['section_description'];

           ?>

               <div class="col-sm-4"><!-- col-sm-4 Begin -->

                   <div class="box same-height"><!-- box same-height Begin -->

                       <div class="icon"><!-- icon Begin -->

                           <i class="fa fa-heart"></i>

                       </div><!-- icon Finish -->

                       <h3><a href="#"><?php echo $box_title; ?></a></h3>

                       <p> <?php echo $box_desc; ?> </p>

                   </div><!-- box same-height Finish -->

               </div><!-- col-sm-4 Finish -->

            <?php    } ?>

           </div><!-- same-height-row Finish -->

       </div><!-- container Finish -->

   </div><!-- #advantages Finish -->

   <div id="hot"><!-- #hot Begin -->

       <div class="box"><!-- box Begin -->

           <div class="container"><!-- container Begin -->

               <div class="col-md-12"><!-- col-md-12 Begin -->

                   <h2>
                       Our Latest Products
                   </h2>

               </div><!-- col-md-12 Finish -->

           </div><!-- container Finish -->

       </div><!-- box Finish -->

   </div><!-- #hot Finish -->

   <div id="content" class="container"><!-- container Begin -->

       <div class="row"><!-- row Begin -->

          <?php

           getPro();

           ?>

       </div><!-- row Finish -->

   </div><!-- container Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
