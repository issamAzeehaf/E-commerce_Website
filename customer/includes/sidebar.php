<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->

    <div class="panel-heading"><!--  panel-heading  Begin  -->

        <?php

        $client_session = $_SESSION['client_email'];

        $sql = "select * from client where client_email='$client_session'";

        $run_customer = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));;

        $row_customer = mysqli_fetch_array($run_customer);

        $client_image = $row_customer['client_image'];

        $client_nom = $row_customer['client_nom'];

        if(!isset($_SESSION['client_email'])){

        }else{

            echo "

                <center>

                    <img src='customer_images/$client_image' class='img-responsive' >

                </center>

                <br/>

                <h3 class='panel-title' align='center'>

                    Name: $client_nom

                </h3>

            ";

        }

        ?>

    </div><!--  panel-heading Finish  -->

    <div class="panel-body"><!--  panel-body Begin  -->

        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->

            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">

                <a href="my_account.php?my_orders">

                    <i class="fa fa-list"></i> My Orders

                </a>

            </li>

            <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">

                <a href="my_account.php?pay_offline">

                    <i class="fa fa-bolt"></i> Pay Offline

                </a>

            </li>

            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

                <a href="my_account.php?edit_account">

                    <i class="fa fa-pencil"></i> Edit Account

                </a>

            </li>

            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

                <a href="my_account.php?change_pass">

                    <i class="fa fa-user"></i> Change Password

                </a>

            </li>

            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">

                <a href="my_account.php?delete_account">

                    <i class="fa fa-trash-o"></i> Delete Account

                </a>

            </li>

            <li>

                <a href="logout.php">

                    <i class="fa fa-sign-out"></i> Log Out

                </a>

            </li>

        </ul><!--  nav-pills nav-stacked nav Begin  -->

    </div><!--  panel-body Finish  -->

</div><!--  panel panel-default sidebar-menu Finish  -->
