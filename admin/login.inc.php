<?php

if(isset($_POST['login'])){
    include("../includes/dbconn.inc.php");
    $email = $_POST['username'];
    $password  = $_POST['password'];
    $query = "SELECT * from tbl_admin where email='$email' ";
    $run = mysqli_query($conn,$query);
   $check_user = mysqli_num_rows($run);
   $auth_user = mysqli_fetch_assoc($run);
   $auth_pass = password_verify($password,$auth_user['password']) ;
   $name = $auth_user['name'];
 


    if($auth_pass==false){
        echo "<script>alert('email or password is wrong')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }
   if($auth_pass==true){
       session_start();
        $_SESSION['user'] = $email;
        echo "<script>alert('login in successful')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        
    }
   


    }


?>