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
