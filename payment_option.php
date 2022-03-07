<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['client_email'];
    
    $select_client = "select * from client where client_email='$session_email'";
    
    $run_client = mysqli_query($con,$select_client);
    
    $row_customer = mysqli_fetch_array($run_client);
    
    $customer_id = $row_customer['client_id'];
    
    ?>
    
    <h1 class="text-center">Payment Options For You</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>
         
     </p><!-- lead text-center Finish -->
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Paypall Payment
                
                <img class="img-responsive" src="images/paypall_img.png" alt="img-paypall">
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->
    
</div><!-- box Finish -->