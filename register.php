<?php
$active = 'account';
include("pages/header.php")
?>
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>register</li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
            include("pages/sidebar.php")
            ?>
        </div>
        <div class="col-md-9">

            <div class="box">

                <div class="box-header">
                    <center>
                        <h2>Customer Registration</h2>

                    </center>
                   

                    <form action="signup.inc.php"  method="POST">

                        <div class="form-group">
                            <span>Name</span>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <span>Email</span>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <span> phone number</span>
                            <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <span>Password</span>
                            <input type="Password" class="form-control" name="pass" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <span>Country</span>
                            <input type="text" class="form-control" name="country" placeholder="Enter your country" required>
                        </div>
                        <div class="form-group">
                            <span>City</span>
                            <input type="text" class="form-control" name="city" placeholder="Enter your city" required>
                        </div>
                        <div class="form-group">
                            <span>Address</span>
                            <textarea type="text" class="form-control" name="address" placeholder="Enter your address" required></textarea>
                        </div>
                      
                        <div class="text-center">

                            <button type="submit" name="register" class="btn btn-primary">
                                <i class="fa fa-user-plus"></i> sign up

                            </button>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>

<?php
include("pages/footer.php")
?>

<!--  -->