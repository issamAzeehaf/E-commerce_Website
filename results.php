
<?php

    $active='Home';
    include("includes/header.php");

?>

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

@$nom_produit = $_POST['nom_produit'];
@$recherche = $_POST['recherche'];
if(isset($recherche)){
  $sql = "select * from produit where produit_titre like '%$nom_produit%'";
  $result = mysqli_query($con,$sql);
  if($result){
    while($enr = mysqli_fetch_array($result)){

      $pro_id = $enr['id_produit'];

      $pro_title = $enr['produit_titre'];

      $pro_url = $enr['produit__url'];

      $pro_price = $enr['produit_prix'];

      $pro_sale_price = $enr['produit_vente'];

      $pro_img1 = $enr['produit_img1'];

      $pro_label = $enr['produit_etiquette'];

      $manufacturer_id = $enr['fabricant_id'];

      $get_manufacturer = "select * from fabricant where fabricant_id='$manufacturer_id'";

      $run_manufacturer = mysqli_query($con,$get_manufacturer);

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

      $productis="$pro_id";

     echo "

      <div class='col-md-4 col-sm-6 single'>

          <div class='product'>

              <a href='$productis'   >

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

                      <a class='btn btn-default' href='$productis'>

                          View Details

                      </a>

                      <a class='btn btn-primary' href='$productis'>

                          <i class='fa fa-shopping-cart'></i> Add to Cart

                      </a>

                  </p>

              </div>

              $product_label

          </div>

      </div>

      ";
    }
}
}
?>
</div><!-- row Finish -->

</div><!-- container Finish -->
