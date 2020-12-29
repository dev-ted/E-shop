<?php
if (isset($_POST['register'])) {
    include("functions/functions.php");

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
        $insert_query = "INSERT INTO tbl_customer(name,email,phone,pass,country,city,address,user_ip) Values('$name','$email',$phone,'$hash_pass','$country','$city','$address','$ip')";
        $run = mysqli_query($conn, $insert_query);


        //check if there is items in cart and proceed to checkout
        $cart_query = "SELECT * FROM cart WHERE ip_add ='$ip'";
        $run_cart = mysqli_query($conn,$cart_query);
        $checkcart = mysqli_num_rows($run_cart);
        if($run){
           session_start();
            echo "<script>alert('Registration successful')</script>";
            $_SESSION['user'] = $email;
            echo "<script>window.open('index.php','_self')</script>";
           


        }
        else if($checkcart>0){
           
            session_start();
            echo "<script>alert('Registration successful')</script>";
            $_SESSION['user'] = $email;
            echo "<script>window.open('checkout.php','_self')</script>";

        }
        else{
            // $_SESSION['user'] = $email;
            echo "<script>alert('Registration unsuccessful')</script>";
            echo("Error description: " . mysqli_error($conn));
            echo "<script>window.open('register.php','_self')</script>";

        }
    }
}
?>