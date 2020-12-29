<?php

 $active='account';
 include("pages/header.php");
 if(!isset($_SESSION['user'])){
     echo"<script>window.open('checkout.php','_self')</script>";
 }
 else{

 


?>

<body>
    
    
<div id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>My account</li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
           
            include("pages/profile.php")
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <?php

                if(isset($_GET['orders'])){
                        include("pages/orders.php");
                }
                
                else  if(isset($_GET['edit_profile'])){
                    include("pages/editProfile.php");
                }
                else  if(isset($_GET['reset_password'])){
                    include("pages/resetPassword.php");
                }
                else  if(isset($_GET['Delete_account'])){
                    include("pages/Delete_Profile.php");
                }
                
                ?>
              
            </div>

        </div>



    </div>


</div>



<?php
include("pages/footer.php")
?>

            </body>
           
            <?php } ?>