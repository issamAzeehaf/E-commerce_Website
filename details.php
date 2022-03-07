<?php

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php

    @$produit_id =$_GET['pro_id'];
    $_SESSION["id-prod"]=$produit_id;

    $get_product = "select * from produit where id_produit='$produit_id'";

    $run_product = mysqli_query($con,$get_product);

    $check_product = mysqli_num_rows($run_product);

    if($check_product == 0){
 
      echo "<script>window.open('index.php','_self')</script>";

    }else{

    $row_products = mysqli_fetch_array($run_product);

    $souscat_id = $row_products['souscat_id'];

    $produit_titre = $row_products['produit_titre'];

    $produit_prix = $row_products['produit_prix'];

    $produit_vente = $row_products['produit_vente'];

    $produit_description = $row_products['produit_description'];

    $produit_img1 = $row_products['produit_img1'];

    $produit_img2 = $row_products['produit_img2'];

    $produit_img3 = $row_products['produit_img3'];

    $produit_etiquette = $row_products['produit_etiquette'];

    if($produit_etiquette == ""){

    }else{

        $produit_etiquette = "

            <a href='#' class='label $produit_etiquette'>

                <div class='theLabel'> $produit_etiquette </div>
                <div class='labelBackground'>  </div>

            </a>

        ";

    }

    $get_p_cat = "select * from sous_categories where souscat_id='$souscat_id'";

    $run_p_cat = mysqli_query($con,$get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $souscat_titre = $row_p_cat['souscat_titre'];

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
               echo @$totalitm; ?> Items In Your Cart | Total Price: <?php $total =0;

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
                  echo "$".@$total; ?> </a>

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

                   <img src="images/originallogo.jpg" alt="Logo" class="hidden-xs">
                   <img src="images/originallogo2.jpd" alt=" Logo Mobile" class="visible-xs">

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

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>

                   <li>
                       <a href="shop.php?p_cat=<?php echo $souscat_id; ?>"><?php echo $souscat_titre; ?></a>
                   </li>
                   <li> <?php echo $produit_titre; ?> </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-12"><!-- col-md-12 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->

                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $produit_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $produit_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $produit_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>

                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->

                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a><!-- right carousel-control Finish -->

                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->

                           <?php echo $produit_etiquette; ?>

                   </div><!-- col-sm-6 Finish -->

                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $produit_titre; ?> </h1>

                           <form action="addtocart.php" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>

                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->

                                    </div><!-- col-md-7 Finish -->

                               </div><!-- form-group Finish -->

                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>

                                   <div class="col-md-7"><!-- col-md-7 Begin -->

                                       <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->

                                           <option disabled selected>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>

                                       </select><!-- form-control Finish -->

                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->

                               <?php

                                    if($produit_etiquette == "sale"){

                                        echo "

                                            <p class='price'>

                                            PRICE: <del> $produit_prix</del><br/>

                                            SALE:     $produit_vente

                                            </p>

                                        ";
                                        $_SESSION["montant"]=$produit_vente;

                                    }else{

                                        echo "

                                            <p class='price'>

                                            PRICE:  $produit_prix

                                            </p>

                                        ";
                    $_SESSION["montant"]=$produit_prix;
                                    }

                               ?>

                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>

                           </form><!-- form-horizontal Finish -->

                       </div><!-- box Finish -->

                       <div class="row" id="thumbs"><!-- row Begin -->

                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $produit_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->

                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $produit_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->

                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $produit_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->

                       </div><!-- row Finish -->

                   </div><!-- col-sm-6 Finish -->


               </div><!-- row Finish -->

               <div class="box" id="details"><!-- box Begin -->

                       <h4>Product Details</h4>

                   <p>

                       <?php echo $produit_description; ?>

                   </p>

                       <h4>Size</h4>

                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>

                       <hr>

               </div><!-- box Finish -->

               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->

                   <?php

                    $get_products = "select * from produit order by rand() LIMIT 0,3";

                    $run_products = mysqli_query($con,$get_products);

                   while($row_products=mysqli_fetch_array($run_products)){

                    $produit_id = $row_products['id_produit'];

                    $produit_titre = $row_products['produit_titre'];

                    $produit_prix = $row_products['produit_prix'];

                    $produit_vente = $row_products['produit_vente'];

                    $produit_url = $row_products['produit__url'];

                    $produit_img1 = $row_products['produit_img1'];

                    $pro_etiquette = $row_products['produit_etiquette'];

                    $fabricant_id = $row_products['fabricant_id'];

                    $get_manufacturer = "select * from fabricant where fabricant_id='$fabricant_id'";

                    $run_manufacturer = mysqli_query($db,$get_manufacturer);

                    $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                    $fabricant_titre = $row_manufacturer['fabricant_titre'];

                    if($pro_etiquette == "sale"){

                        $produit_price = " <del> $ $produit_prix </del> ";

                        $produit_vente = "/ $ $produit_vente ";

                    }else{

                        $produit_prix = "  $ $produit_prix  ";

                        $produit_vente = "";

                    }

                    if($produit_etiquette == ""){

                    }else{

                        $produit_etiquette = "

                            <a href='#' class='label $produit_etiquette'>

                                <div class='theLabel'> $produit_etiquette </div>
                                <div class='labelBackground'>  </div>

                            </a>

                        ";

                    }

                    echo "

                    <div class='col-md-3 col-sm-6 center-responsive'>

                        <div class='product'>

                            <a href='$produit_url'>

                                <img class='img-responsive' src='admin_area/product_images/$produit_img1'>

                            </a>

                            <div class='text'>

                            <center>

                                <p class='btn btn-primary'> $fabricant_titre </p>

                            </center>

                                <h3>

                                    <a href='$produit_url'>

                                        $produit_titre

                                    </a>

                                </h3>

                                <p class='price'>

                                $produit_prix &nbsp;$produit_vente

                                </p>

                                <p class='button'>

                                    <a class='btn btn-default' href='$produit_url'>

                                        View Details

                                    </a>

                                    <a class='btn btn-primary' href='$produit_url'>

                                        <i class='fa fa-shopping-cart'></i> Add to Cart

                                    </a>

                                </p>

                            </div>

                            $produit_etiquette

                        </div>

                    </div>

                    ";

                   }

                   ?>

               </div><!-- #row same-heigh-row Finish -->

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
<?php } ?>
