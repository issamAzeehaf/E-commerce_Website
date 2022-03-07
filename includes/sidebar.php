<?php

$aMan = array();
$aCat = array();
$aPcat = array();

// This is for manufacturers Begin //

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

    foreach($_REQUEST['man'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aMan[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for manufacturers Finisih //

// This is for categories Begin //

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aCat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for categories Finisih //

// This is for products_categories Begin //

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aPcat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for products_categories Finisih //

?>

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">
            Manufacturers

            <div class="pull-right"><!-- pull-right Begin -->

                <a href="JavaScript:Void(0);" style="color:black;">

                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show Begin -->

                        Hide

                    </span><!-- nav-toggle hide-show Finish -->

                </a>

            </div><!-- pull-right finish -->

        </h3>
    </div><!-- panel-heading Finish -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->

        <div class="panel-body"><!-- panel-body 1 Begin -->
            <div class="input-group"><!-- input-group Begin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-manufacturer" data-action="filter" placeholder="Filter Manufacturer">

                    <a class="input-group-addon"><!-- input-group-addon Begin -->

                        <i class="fa fa-search"></i>

                    </a><!-- input-group-addon Finish -->

            </div><!-- input-group Finish -->
            </div><!-- panel-body 1 Finish -->
        <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu Begin -->

                <?php

                $get_manufacturer = "select * from fabricant where fabricant_top='yes'";
                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['fabricant_id'];
                    $manufacturer_title = $row_manufacturer['fabricant_titre'];
                    $manufacturer_image = $row_manufacturer['fabricant_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                                if(isset($aMan[$manufacturer_id])){
                                    echo "checked='checked'";
                                }

                                echo " value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer'>

                                <span>
                                $manufacturer_image
                                $manufacturer_title
                                </span>

                            </label>

                        </a>

                    </li>
                    ";

                }

                $get_manufacturer = "select * from fabricant where fabricant_top='no'";
                $run_manufacturer = mysqli_query($con,$get_manufacturer);


                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['fabricant_id'];
                    $manufacturer_title = $row_manufacturer['fabricant_titre'];
                    $manufacturer_image = $row_manufacturer['fabricant_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                        <label>

                            <input ";

                            if(isset($aMan[$manufacturer_id])){
                                echo "checked='checked'";
                            }

                            echo " value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer'>

                            <span>
                            $manufacturer_image
                            $manufacturer_title
                            </span>

                        </label>

                        </a>

                    </li>
                    ";

                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
        </div><!-- panel-body 2 Finish -->

    </div><!-- panel-collapse collapse-data Finish -->

</div><!-- panel panel-default sidebar-menu Finish -->

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">
            Categories

            <div class="pull-right"><!-- pull-right Begin -->

                <a href="JavaScript:Void(0);" style="color:black;">

                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show Begin -->

                        Hide

                    </span><!-- nav-toggle hide-show Finish -->

                </a>

            </div><!-- pull-right finish -->

        </h3>
    </div><!-- panel-heading Finish -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->

        <div class="panel-body"><!-- panel-body 1 Begin -->
            <div class="input-group"><!-- input-group Begin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-cat" data-action="filter" placeholder="Filter Categories">

                    <a class="input-group-addon"><!-- input-group-addon Begin -->

                        <i class="fa fa-search"></i>

                    </a><!-- input-group-addon Finish -->

            </div><!-- input-group Finish -->
            </div><!-- panel-body 1 Finish -->
        <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->

                <?php

                $get_cat = "select * from categories where categorie_top='yes'";
                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['categorie_id'];
                    $cat_title = $row_cat['categorie_titre'];
                    $cat_image = $row_cat['categorie_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                        <label>

                            <input ";

                            if(isset($aCat[$cat_id])){
                                echo "checked='checked'";
                            }

                            echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                            <span>
                            $cat_image
                            $cat_title
                            </span>

                        </label>

                        </a>

                    </li>
                    ";

                }

                $get_cat = "select * from categories where categorie_top='no'";
                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['categorie_id'];
                    $cat_title = $row_cat['categorie_titre'];
                    $cat_image = $row_cat['categorie_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                                if(isset($aCat[$cat_id])){
                                    echo "checked='checked'";
                                }

                                echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                                <span>
                                $cat_image
                                $cat_title
                                </span>

                            </label>

                        </a>

                    </li>
                    ";

                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
        </div><!-- panel-body 2 Finish -->

    </div><!-- panel-collapse collapse-data Finish -->

</div><!-- panel panel-default sidebar-menu Finish -->

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">
            Product Categories

            <div class="pull-right"><!-- pull-right Begin -->

                <a href="JavaScript:Void(0);" style="color:black;">

                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show Begin -->

                        Hide

                    </span><!-- nav-toggle hide-show Finish -->

                </a>

            </div><!-- pull-right finish -->

        </h3>
    </div><!-- panel-heading Finish -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->

        <div class="panel-body"><!-- panel-body 1 Begin -->
            <div class="input-group"><!-- input-group Begin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-p-cat" data-action="filter" placeholder="Filter Product Categories">

                    <a class="input-group-addon"><!-- input-group-addon Begin -->

                        <i class="fa fa-search"></i>

                    </a><!-- input-group-addon Finish -->

            </div><!-- input-group Finish -->
            </div><!-- panel-body 1 Finish -->
        <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->

                <?php

                $get_p_cat = "select * from sous_categories where souscat_top='yes'";
                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['souscat_id'];
                    $p_cat_title = $row_p_cat['souscat_titre'];
                    $p_cat_image = $row_p_cat['souscat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                                if(isset($aPcat[$p_cat_id])){
                                    echo "checked='checked'";
                                }

                                echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>

                    </li>
                    ";

                }

                $get_p_cat = "select * from sous_categories where souscat_top='no'";
                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['souscat_id'];
                    $p_cat_title = $row_p_cat['souscat_titre'];
                    $p_cat_image = $row_p_cat['souscat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                                if(isset($aPcat[$p_cat_id])){
                                    echo "checked='checked'";
                                }

                                echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>

                    </li>
                    ";

                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
        </div><!-- panel-body 2 Finish -->

    </div><!-- panel-collapse collapse-data Finish -->

</div><!-- panel panel-default sidebar-menu Finish -->
