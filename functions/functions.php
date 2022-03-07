<?php
$db = mysqli_connect("localhost","root","","boutique");



/// begin add_cart functions ///

/*function add_cart(){

    global $db;*/



/// finish add_cart functions ///

/// begin getPro functions ///

function getPro(){

    global $db;

    $get_products = "select * from produit ";

    $run_products = mysqli_query($db,$get_products);

    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['id_produit'];

        $pro_title = $row_products['produit_titre'];

        $pro_url = $row_products['produit__url'];

        $pro_price = $row_products['produit_prix'];

        $pro_sale_price = $row_products['produit_vente'];

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

/// finish getPro functions ///

/// begin getPCats functions ///

function getPCats(){

    global $db;

    $get_p_cats = "select * from sous_categories";

    $run_p_cats = mysqli_query($db,$get_p_cats);

    while($row_p_cats=mysqli_fetch_array($run_p_cats)){

        $p_cat_id = $row_p_cats['souscat_id'];

        $p_cat_title = $row_p_cats['souscat_titre'];

        echo "

            <li>

                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>

            </li>

        ";

    }

}

/// finish getPCats functions ///

/// begin getCats functions ///

function getCats(){

    global $db;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($db,$get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['categorie_id'];

        $cat_title = $row_cats['categorie_titre'];

        echo "

            <li>

                <a href='shop.php?cat=$cat_id'> $cat_title </a>

            </li>

        ";

    }

}

/// finish getCats functions ///

/// finish getRealIpUser functions ///


/// Begin getProducts(); functions ///

function getProducts(){

    global $db;
    $aWhere = array();

    /// Begin for Manufacturer ///

    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'fabricant_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///

    /// Begin for Product Categories ///

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'souscat_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Product Categories ///

    /// Begin for Categories ///

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'categorie_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Categories ///

    $per_page=6;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from produit ".$sWhere;
    $run_products = mysqli_query($db,$get_products);

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

        <div class='col-md-4 col-sm-6 center-responsive'>

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

}

/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator(){

    global $db;

    $per_page=6;
    $aWhere = array();
    $aPath = '';

    /// Begin for Manufacturer ///

    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'fabricant_id='.(int)$sVal;
                $aPath .= 'man[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Manufacturer ///

    /// Begin for Product Categories ///

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'souscat_id='.(int)$sVal;
                $aPath .= 'p_cat[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Product Categories ///

    /// Begin for Categories ///

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'categorie_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Categories ///

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from produit".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'First Page'."</a></li>";

    for($i=1; $i<=$total_pages; $i++){

        echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo "<li> <a href='shop.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Last Page'."</a></li>";

}

/// finish getPaginator(); functions ///

?>
