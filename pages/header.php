<?php
session_start();

// if(!isset($_SESSION['user'])){
//     echo"<Sscript";

// }
//include("includes/dbconn.inc.php");
include("functions/functions.php");
?>

<?php

    if(isset($_GET['pro_id'])){
    
        $product_id = $_GET['pro_id'];
        
        $get_product = "select * from products where prod_id='$product_id'";
        
        $run_product = mysqli_query($conn,$get_product);
        
        $row_product = mysqli_fetch_array($run_product);
        
        $p_cat_id = $row_product['prod_catergory_id'];
        
        $pro_title = $row_product['prod_title'];
        
        $pro_price = $row_product['prod_price'];
        
        $pro_desc = $row_product['prod_description'];
        
        $pro_img1 = $row_product['prod_img1'];
        
        $pro_img2 = $row_product['prod_img2'];
        
        $pro_img3 = $row_product['prod_img3'];
        
        $get_p_cat = "select * from product_catergory where prod_catergory_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($conn,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['prod_catergory_title'];
    } 
    if(isset($_GET['add_cart'])){
        $product_id = $_GET['add_cart'];
        
        $get_product = "select * from products where prod_id='$product_id'";
        
        $run_product = mysqli_query($conn,$get_product);
        
        $row_product = mysqli_fetch_array($run_product);
        
        $p_cat_id = $row_product['prod_catergory_id'];
        
        $pro_title = $row_product['prod_title'];
        
        $pro_price = $row_product['prod_price'];
        
        $pro_desc = $row_product['prod_description'];
        
        $pro_img1 = $row_product['prod_img1'];
        
        $pro_img2 = $row_product['prod_img2'];
        
        $pro_img3 = $row_product['prod_img3'];
        
        $get_p_cat = "select * from product_catergory where prod_catergory_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($conn,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['prod_catergory_title'];
    } 
    
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
                <a href="#" class=" btn btn-primary btn-sm">
                    <?php
                    if(!isset($_SESSION['user'])){
                        echo "Welcome : Guest";

                    }
                    else{
                        echo "Welcome: ".$_SESSION['user']."";

                    }


                    ?>



            
            </a>
               
               
            </div>

            <div class="col-md-6">
                <ul class="menu ">
                 
                <li>
                        <i class="fa fa-user"></i> <a href="account.php">Account</a>
                    </li>
                    

                <?php
                    if(!isset($_SESSION['user'])){
                        
                        echo '
                        <li>
                        
                     <a href="register.php" class="btn brn-primary" >Register</a>
                    </li>
                       
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
    

    <!-- Navigation bar -->
    <div id="navbar" class="navbar navbar-default ">
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
                <a href="cart.php" class="btn navbar-btn btn-secondary btn-sm right">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge"> <?php items(); ?> </span>
                </a>
                
                <!-- <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div> -->
                <!-- create search form -->
                <!-- <div class="collapse clearfix" id="search">
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

                </div> -->
            </div>

        </div>


    </div>



    <script src="js\jquery-3.2.1.min.js"></script>
    <!-- <script src="js/jquery-3.5.min.js"></script> -->
    <script src="fonts\fontawesome\js\fontawesome.min.js"></script>
    <!-- <script src="js\bootstrap.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $ip = getUserIp();
   
    //check if user exists
    $query = "SELECT email FROM tbl_customer WHERE email='$email'";
    $run_query = mysqli_query($conn, $query);
    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
        echo "<script>alert('User already exists')</script>";
        echo "<script>window.open('register.php','_self')</script>";
    } else {
        //register new users
        $hash_pass = password_hash($password, PASSWORD_DEFAULT); //hash password
        $insert_query = "INSERT INTO tbl_customer(name,email,phone,password,country,city,address,user_ip) Values('$name','$email',$phone,'$hash_pass','$country','$city','$address','$ip')";
        $run = mysqli_query($conn, $insert_query);


        //check if there is items in cart and proceed to checkout
        // $cart_query = "SELECT * FROM cart WHERE ip_add ='$ip'";
        // $run_cart = mysqli_query($conn,$cart_query);
        // $checkcart = mysqli_num_rows($run_cart);
        if($run){
            // $_SESSION['user'] = $email;
            // echo "<script>alert('Registration successful')</script>";
            // echo "<script>window.open('checkout.php','_self')</script>";
           
            echo "<script>alert('Registration successful')</script>";
            $_SESSION['user'] = $email;
            echo "<script>window.open('index.php','_self')</script>";


        }
        else{
            // $_SESSION['user'] = $email;
            echo "<script>alert('Registration unsuccessful')</script>";
          
            echo "<script>window.open('index.php','_self')</script>";

        }
    }
}
?>