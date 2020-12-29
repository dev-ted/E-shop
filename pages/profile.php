<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">

        <center>
            <img src="logo/pro_pic" alt="" class="img-responsive">

        </center>
        <br />
        <?php 
        //GET CUSTOMER PROFILE
        $session = $_SESSION['user'];
        $query = "SELECT * FROM tbl_customer where email='$session'";
        $run = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($run);
        $name = $row['name'];
        
        
        ?>
        <h3 align="center" class="panel-title">
            <?php echo $name; ?>

        </h3>

    </div>
    <!-- create panel -->
    <div class="panel-body">

        <ul class="nav-pills nav-stacked nav">
            <li class="<?php if (isset($_GET['orders'])) {
                            echo "active";
                        } ?>">
                <a href="account.php?orders">
                    <i class="fas fa-list"> Orders</i>
                </a>
            </li>
            <!-- <li class="<?php if (isset($_GET['Offline_payment'])) {
                            echo "active";
                        } ?>">
                <a href="account.php?Offline_payment">
                    <i class="fas fa-bolt"> Offline Payment</i>
                </a>
            </li> -->
            <!-- <li class="<?php if (isset($_GET['edit_profile'])) {
                            echo "active";
                        } ?>">
                <a href="account.php?edit_profile">
                    <i class="fas fa-edit"> Edit Profile</i>
                </a>
            </li> -->
            <!-- <li class="<?php if (isset($_GET['reset_password'])) {
                            echo "active";
                        } ?>">
                <a href="account.php?reset_password">
                    <i class="fas fa-key"> Update password</i>
                </a>
            </li> -->
            <!-- <li class="<?php if (isset($_GET['Delete_account'])) {
                            echo "active";
                        } ?>">
                <a href="account.php?Delete_account">
                    <i class="fas fa-trash-alt"> Delete  Profile</i>
                </a>
            </li> -->
            <li class="<?php if (isset($_GET['logout'])) {
                            echo "active";
                        } ?>">
                <a href="includes\logout.inc.php">
                    <i class="fas fa-sign-out-alt"> Log out</i>
                </a>
            </li>
        </ul>
    </div>

</div>