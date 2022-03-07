<center><!--  center Begin  -->

    <h1> My Orders </h1>

    <p class="lead"> Your orders on one place</p>

    <p class="text-muted">

        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>

    </p>

</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->

    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->

        <thead><!--  thead Begin  -->

            <tr><!--  tr Begin  -->

                <th> ON: </th>
                <th> Montant: </th>
                <th> Quantite: </th>
                <th> taille: </th>
                <th> date: </th>
                <th> payé|nom Payé:</th>
                <th> Statut </th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody><!--  tbody Begin  -->

           <?php

            $client_session = $_SESSION['client_email'];

            $sql = "select * from client where client_email='$client_session'";

            $run_customer = mysqli_query($con,$sql);

            $row_customer = mysqli_fetch_array($run_customer);

            $client_id = $row_customer['client_id'];

            $get_orders = "select * from commande where client_id='$client_id'";

            $run_orders = mysqli_query($con,$get_orders);

            $i = 0;

            while($row_orders = mysqli_fetch_array($run_orders)){

                $commande_id = $row_orders['id_commande'];

                $montant = $row_orders['montant'];

                $quantite = $row_orders['Quantite'];

                $taille = $row_orders['Taille'];

                $date = substr($row_orders['date'],0,11);

                $statut = $row_orders['statut'];

                $i++;

                if($statut=='pending'){

                    $statut = 'Unpaid';

                }else{

                    $statut = 'Paid';

                }

            ?>

            <tr><!--  tr Begin  -->

                <th> <?php echo $i; ?> </th>
                <td> $<?php echo $montant; ?> </td>
                <td> <?php echo $quantite; ?> </td>
                <td> <?php echo $taille; ?> </td>
                <td> <?php echo $date; ?> </td>
                <td> <?php echo $statut; ?> </td>

                <td>

                    <a href="confirm.php?order_id=<?php echo $commande_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>

                </td>

            </tr><!--  tr Finish  -->

            <?php } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->
