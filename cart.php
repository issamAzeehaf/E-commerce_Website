<?php

    $active='Cart';
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
                       Cart
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                       <h1>Shopping Cart</h1>

                       <?php

                       @$client_email = $_SESSION['client_email'];
                       $total =0;
                       $sql = "select * from client where client_email='$client_email'";

                       $result = mysqli_query($con,$sql);

                       $run = mysqli_fetch_array($result);

                       $client_id = $run['client_id'];

                       $sql2 = "select * from commande where client_id ='$client_id' and statut ='pending'";

                       $result2 = mysqli_query($con,$sql2);

                       while($count_items=mysqli_fetch_array($result2)){
                         $produit = $count_items['Quantite'];
                         $total +=$produit;
                       }


                       ?>

                       <p class="text-muted">You currently have <?php echo $total; ?> item(s) in your cart</p>

                       <div class="table-responsive"><!-- table-responsive Begin -->

                           <table class="table"><!-- table Begin -->

                               <thead><!-- thead Begin -->

                                   <tr><!-- tr Begin -->

                                       <th colspan="2">Produit</th>
                                       <th>Quantite</th>
                                       <th>prix unique</th>
                                       <th>taille</th>
                                       <th colspan="1">supprimer</th>
                                       <th colspan="2">montant total</th>

                                   </tr><!-- tr Finish -->

                               </thead><!-- thead Finish -->

                               <tbody><!-- tbody Begin -->

                                  <?php

                                  @$client_email = $_SESSION['client_email'];
                                  $total =0;
                                  $sql = "select * from client where client_email='$client_email'";

                                  $result = mysqli_query($con,$sql);

                                  $run = mysqli_fetch_array($result);

                                  $client_id = $run['client_id'];

                                  $sql2 = "select * from commande where client_id ='$client_id' and statut='pending'";

                                  $result2 = mysqli_query($con,$sql2);

                                   $montant_total = 0;

                                   while($show_item = mysqli_fetch_array($result2)){

                                     $pro_id = $show_item['id_produit'];

                                     $pro_size = $show_item['Taille'];

                                     $pro_qty = $show_item['Quantite'];

                                    $sqql = "select * from produit where id_produit='$pro_id'";

                                    $ressult = mysqli_query($con,$sqql);

                                       while($row_products = mysqli_fetch_array($ressult)){

                                           $pro_prix = $row_products['produit_prix'];

                                           $product_title = $row_products['produit_titre'];

                                           $product_img1 = $row_products['produit_img1'];

                                           $only_price = $row_products['produit_prix'];

                                           $pro_url = $row_products['produit__url'];

                                           $sub_total = $pro_prix*$pro_qty;

                                           $_SESSION['pro_qty'] = $pro_qty;

                                           $montant_total += $sub_total;

                                   ?>

                                   <tr><!-- tr Begin -->

                                       <td>

                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a">

                                       </td>

                                       <td>

                                           <a href="<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>

                                       </td>

                                       <td>

                                           <?php echo $_SESSION['pro_qty']; ?>

                                       </td>

                                       <td>

                                           <?php echo $only_price; ?>

                                       </td>

                                       <td>

                                           <?php echo $pro_size; ?>

                                       </td>

                                       <td>

                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                       </td>

                                       <td>

                                           $<?php echo $sub_total; ?>

                                       </td>

                                   </tr><!-- tr Finish -->

                                   <?php } } ?>

                               </tbody><!-- tbody Finish -->

                               <tfoot><!-- tfoot Begin -->

                                   <tr><!-- tr Begin -->
<?php if($montant_total!==0) { ?>
                                       <th colspan="5">Total</th>
                                       <th colspan="2"><?php echo "$".$montant_total; ?></th>  <?php }  ?>

                                   </tr><!-- tr Finish -->

                               </tfoot><!-- tfoot Finish -->

                           </table><!-- table Finish -->
<?php   if(isset($_SESSION['client_email'])){ ?>
                           
                           <?php }else{ ?>  <h3>Vous devez vous connecter ou vous inscrire sur le site pour pouvoir ajouter vos produits au panier</h3>        <?php } ?>

                       </div><!-- table-responsive Finish -->

                       <div class="box-footer"><!-- box-footer Begin -->

                           <div class="pull-left"><!-- pull-left Begin -->

                               <a href="index.php" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-chevron-left"></i> Continue Shopping

                               </a><!-- btn btn-default Finish -->

                           </div><!-- pull-left Finish -->

                           <div class="pull-right"><!-- pull-right Begin -->

                            
            <?php   if(isset($_SESSION['client_email'])){ ?>
                           <button type="submit" name="suprimer_produit" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-trash-o fa-fw"></i> Supprimer des produits

                               </button><!-- btn btn-default Finish --> <?php
    
               }else{ ?>
     <a href="customer_register.php" class="btn btn-primary">

                                   Register <i class="fa fa-chevron-right"></i>

                               </a>
    
 <?php  }      ?>                      
                               
                               
                               
                               
                               
                               
                               
                  <?php   if(isset($_SESSION['client_email'])){ ?>
                        <a href="customer/confirm.php" class="btn btn-primary">

                                   Payer <i class="fa fa-credit-card"></i>

                               </a> <?php
    
}else{ ?>
     <a href="checkout.php" class="btn btn-primary">

                                   login <i class="fa fa-sign-in"></i>

                               </a>
    
 <?php  }      ?>
                            
                              

                           </div><!-- pull-right Finish -->

                       </div><!-- box-footer Finish -->

                   </form><!-- form Finish -->

               </div><!-- box Finish -->

               <?php
               if(isset($_POST['suprimer_produit'])){
                   
                   if(isset($_POST['remove'])){
                       $i=0;
                       foreach ($_POST["remove"] as $value){
  
                           $sqlsup="DELETE FROM commande WHERE id_produit='$value' and statut='pending' and client_id='$client_id'";
                           
                           $rslt=mysqli_query($con,$sqlsup);
                           
                           if($rslt){
                              $i++; 
                               
                           }
                           if($i>0){
                               
                               echo "<script>alert('Vous avez supprimé $i produits')</script>";
                               
                           }
                           
                           
}
                       
                       
                       
                       
                   }
                   
                   
                   
                   
                   
                   
                   
                   
               }
               

                    if(isset($_POST['apply_coupon'])){

                        $code = $_POST['code'];

                        if($code == ""){

                        }else{

                            $get_coupons = "select * from coupons where coupon_code='$code'";
                            $run_coupons = mysqli_query($con,$get_coupons);
                            $check_coupons = mysqli_num_rows($run_coupons);

                            if($check_coupons == "1"){

                                $row_coupons = mysqli_fetch_array($run_coupons);

                                $coupon_pro_id = $row_coupons['id_produit'];
                                $coupon_price = $row_coupons['coupon_prix'];
                                $coupon_limit = $row_coupons['coupon_limite'];
                                $coupon_used = $row_coupons['coupon_utilise'];

                                if($coupon_limit == $coupon_used){

                                    echo "<script>alert('Your Coupon Already Expired')</script>";

                                }else{

                                    $get_cart = "select * from commande where id_produit='$coupon_pro_id' AND client_id='$client_id' and statut='pending'";
                                    $run_cart = mysqli_query($con,$get_cart);
                                    $check_cart = mysqli_num_rows($run_cart);

                                    if($check_cart == "1"){

                                        $add_used = "update coupons set coupon_utilise=coupon_utilise+1 where coupon_code='$code'";
                                        $run_used = mysqli_query($con,$add_used);
                                        $update_cart = "update commande set montant='$coupon_price' where id_produit='$coupon_pro_id' AND client_id='$client_id'";
                                        $run_update_cart = mysqli_query($con,$update_cart);

                                        echo "<script>alert('Your Coupon Has Been Applied')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";

                                    }else{

                                        echo "<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>";

                                    }

                                }

                            }else{

                                echo "<script>alert('You Coupon Is Not Valid')</script>";

                            }

                        }

                    }

               ?>

               <?php

                function update_cart(){

                    global $con;

                    if(isset($_POST['update'])){

                        foreach($_POST['remove'] as $remove_id){

                            $delete_product = "delete from cart where p_id='$remove_id'";

                            $run_delete = mysqli_query($con,$delete_product);

                            if($run_delete){

                                echo "<script>window.open('cart.php','_self')</script>";

                            }

                        }

                    }

                }

               echo @$up_cart = update_cart();

               ?>

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

                    $pro_id = $row_products['id_produit'];

                    $pro_title = $row_products['produit_titre'];

                    $pro_price = $row_products['produit_prix'];

                    $pro_sale_price = $row_products['produit_vente'];

                    $pro_url = $row_products['produit__url'];

                    $pro_img1 = $row_products['produit_img1'];

                    $pro_label = $row_products['produit_etiquette'];

                    $manufacturer_id = $row_products['fabricant_id'];

                    $get_manufacturer = "select * from fabricant where fabricant_id='$manufacturer_id'";

                    $run_manufacturer = mysqli_query($db,$get_manufacturer);

                    $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                    $manufacturer_title = $row_manufacturer['fabricant_titre'];

                    if($pro_label == "sale"){

                        $product_price = " <del> $ $pro_price </del> ";

                        $product_sale_price = "/ $ $pro_sale_price ";

                    }else{

                        $product_price = "  $ $pro_price  ";

                        $product_sale_price = "";

                    }

                    if($pro_label == ""){

                    }else{

                        $product_label = "

                            <a href='#' class='label $pro_label'>

                                <div class='theLabel'> $pro_label </div>
                                <div class='labelBackground'>  </div>

                            </a>

                        ";

                    }

                    echo "

                    <div class='col-md-3 col-sm-6 center-responsive'>

                        <div class='product'>

                            <a href='$pro_url'>

                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                            </a>

                            <div class='text'>

                            <center>

                                <p class='btn btn-primary'> $manufacturer_title </p>

                            </center>

                                <h3>

                                    <a href='$pro_url'>

                                        $pro_title

                                    </a>

                                </h3>

                                <p class='price'>

                                $product_price &nbsp;$product_sale_price

                                </p>

                                <p class='button'>

                                    <a class='btn btn-default' href='$pro_url'>

                                        View Details

                                    </a>

                                    <a class='btn btn-primary' href='$pro_url'>

                                        <i class='fa fa-shopping-cart'></i> Add to Cart

                                    </a>

                                </p>

                            </div>

                            $product_label

                        </div>

                    </div>

                    ";

                   }

                   ?>

               </div><!-- #row same-heigh-row Finish -->

           </div><!-- col-md-9 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->

               <div id="order-summary" class="box"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->

                       <h3>Order Summary</h3>

                   </div><!-- box-header Finish -->

                   <p class="text-muted"><!-- text-muted Begin -->

                       Shipping and additional costs are calculated based on value you have entered

                   </p><!-- text-muted Finish -->

                   <div class="table-responsive"><!-- table-responsive Begin -->

                       <table class="table"><!-- table Begin -->

                           <tbody><!-- tbody Begin -->

                               <tr><!-- tr Begin -->

                                   <td> Order All Sub-Total </td>
                                   <th> $<?php echo $montant_total; ?> </th>

                               </tr><!-- tr Finish -->

                               <tr><!-- tr Begin -->

                                   <td> Shipping and Handling </td>
                                   <td> $0 </td>

                               </tr><!-- tr Finish -->

                               <tr><!-- tr Begin -->

                                   <td> Tax </td>
                                   <th> $0 </th>

                               </tr><!-- tr Finish -->

                               <tr class="total"><!-- tr Begin -->

                                   <td> Total </td>
                                   <th> $<?php echo $montant_total; ?> </th>

                               </tr><!-- tr Finish -->

                           </tbody><!-- tbody Finish -->

                       </table><!-- table Finish -->

                   </div><!-- table-responsive Finish -->

               </div><!-- box Finish -->

           </div><!-- col-md-3 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    <script>

       $(document).ready(function(data){

           $(document).on('keyup','.quantity',function(){

                var id = $ (this).data("product_id");
                var quantity = $(this).val();

                if(quantity !=''){

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function(){
                            $("body").load("cart_body.php");
                        }

                    });

                }

           });

       });

    </script>


</body>
</html>
