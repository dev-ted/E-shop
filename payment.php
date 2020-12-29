<div class="box">

    <?php
    $session =$_SESSION['user'];
    $query = "SELECT * FROM tbl_customer where email='$session'";
    $run = mysqli_query($conn,$query);
    $row_cus = mysqli_fetch_array($run);
    $cus_id = $row_cus['id'];
    $name = $row_cus['name'];
   





    ?>
    <h1 class="text-center">Payment</h1>
    <h5><?php echo $cus_id  . " - ". $name; ?></h5>
    <p class="lead text-center">
       

        <a href="orders.php?cus_id=<?php echo $cus_id; ?>">Place Order</a>
    </p>
    <center>
       
    </center>

</div>