<?php
session_start();
 $active='account';
 if(!isset($_SESSION['user'])){
     echo"<script>window.open('checkout.php','_self')</script>";
 }
 else{

 
 include("functions/functions.php")

?>
<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/47ecf318ef.js" crossorigin="anonymous"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="fonts\font-awesome-4.7.0\css\font-awesome.min.css">
    <link rel="stylesheet" href="fonts\iconic\css\material-design-iconic-font.min.css">

    <title>Take Less</title>
</head>

<body>
    <!--top menu-->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class=" btn btn-success btn-sm">
                    <?php
                    if(!isset($_SESSION['user'])){
                        echo "Welcome : Guest";

                    }
                    else{
                        echo "Welcome: ".$_SESSION['user']."";

                    }


                    ?>



            
            </a>
                <a href="checkout.php"> <?php items(); ?> items in your cart | Total R <?php getPrice(); ?></a>
               
            </div>

            <div class="col-md-6">
                <ul class="menu ">
                 
                <li>
                        <i class="fa fa-user"></i> <a href="account.php">Account</a>
                    </li>
                    <li>
                       <!-- <a href="#RegisterModal" class="btn brn-primary" data-toggle="modal" data-target="#RegisterModal">Register</a> -->
                     <a href="register.php" class="btn brn-primary" >Register</a> 
                    </li>

                <?php
                    if(!isset($_SESSION['user'])){
                        
                        echo '
                       
                    <li>
                        <i class="fa fa-unlock"></i> <a href="checkout.php">Login</a>
                    </li>
                  
                    ';

                    }
                    else{
                      
                        echo '
                        
                   
                    <li>
                    
                    <i class="fa fa-unlock"></i> <a href="includes/logout.inc.php">Logout</a>
                    </li>
                        
                        ';

                    }


                    ?>


                   



                </ul>
            </div>

        </div>

    </div>
    <div id="navbar" class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="logo/logo-desktop.png" alt="Store logo" class="hidden-xs">
                    <img src="logo/logo-mobile.png" alt="Store logo" class="visible-xs">

                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">toggle search</span>
                    <i class="fa fa-search"></i>

                </button>

            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                    <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                        <li class="<?php if($active=='shop') echo"active"; ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($active=='account') echo"active"; ?>">
                           <?php
                                if(!isset($_SESSION['user'])){
                                    echo " <a href='checkout.php'>account</a>";
                                }
                                else{
                                    echo " <a href='account.php?orders'>account</a>";
                                }


                            ?>
                        </li>
                        <li class="<?php if($active=='cart') echo"active"; ?>">
                            <a href="cart.php">cart</a>
                        </li>
                        <li class="<?php if($active=='contact') echo"active"; ?>">
                            <a href="contact.php">contact us</a>
                        </li>

                    </ul>
                </div>
                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span> <?php items(); ?> </span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- create search form -->
                <div class="collapse clearfix" id="search">
                    <form action="results.php" class="navbar-form" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_query" placeholder="Search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" value="search" name="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>

                        </div>
                    </form>

                </div>
            </div>

        </div>


    </div>
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
                <h1 align="center">Please Confirm your Payment</h1>
                <form action="confirm.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>Invoice No:</span>
                        <input type="text" name="invoice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Amount Sent:</span>
                        <input type="text" name="Amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Select Payment method:</span>
                        <select type="text" name="payment_method" class="form-control" required>

                            <option>Select method</option>
                            <option>Visa</option>
                            <option>Master card</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Transaction / Reference ID:</span>
                        <input type="text" name="ref_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Payment Date:</span>
                        <input type="text" name="date" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg">
                            <i class="fa fa-cc-mastercard"></i> Confirm Payment
                        </button>
                    </div>



                </form>
            </div>

        </div>




    </div>


</div>



<?php
include("pages/footer.php")
?>
<?php }?>