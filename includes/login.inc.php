<?php
session_start();

if(isset($_POST['login'])){
    include("../functions/functions.php");
    include("../includes/dbconn.inc.php");
    
    $email = $_POST['username'];
    $password  = $_POST['password'];
    $query = "SELECT * from tbl_customer where email='$email' and pass='$password'";
    $run = mysqli_query($conn,$query);
   $check_user = mysqli_num_rows($run);
    $ip = getUserIp();

    $cart_query = "SELECT * FROM cart WHERE ip_add ='$ip'";
    $run_cart = mysqli_query($conn,$cart_query);
    $checkcart = mysqli_num_rows($run_cart);
    if($check_user ==0){
        echo "<script>alert('email or password is wrong')</script>";
        echo "<script>window.open('login.php','_self')</script>";
        exit();
    }
   if($check_user ==1 AND $checkcart ==0 ){
        $_SESSION['user'] = $email;
        echo "<script>alert('login in successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    else{
        $_SESSION['user'] = $email;
       
        echo "<script>window.open('checkout.php','_self')</script>";
        

    }


    }


?>
