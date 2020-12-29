<?php
$active = 'account';
include("pages/header.php");
?>
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Checkout</li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
            include("pages/sidebar.php")
            ?>
        </div>
        <div class="col-md-9">

      <!--       <div class="box">

                <div class="box-header">
                    <center>
                        <h2>Checkout</h2>

                    </center>
                  
                

                  

                </div>
            </div>
            
 -->
 <?php
 if(!isset($_SESSION['user'])){
     include("login.php");


 }
 else{
     include("payment.php");
 }



?>

        </div>
    </div>
</div>

<?php
include("pages/footer.php")
?>