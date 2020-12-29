<?php
if (isset($_POST['signUp'])) {
    include("../includes/dbconn.inc.php");

    $name = $_POST['name'];
    $email = $_POST['username'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    
   


    //check if user exists
    $query = "SELECT email FROM tbl_admin WHERE email='$email'";
    $run_query = mysqli_query($conn, $query);
    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
        echo "<script>alert('User already exists')</script>";
        echo "<script>window.open('register.php','_self')</script>";
    } else {
        //register new users
        $hash_pass = password_hash($password, PASSWORD_DEFAULT); //hash password
        $insert_query = "INSERT INTO tbl_admin(name,surname,email,password) Values('$name','$surname','$email','$hash_pass')";
        $run = mysqli_query($conn, $insert_query);

        if($run ){
           session_start();
            echo "<script>alert('Registration successful')</script>";
            $_SESSION['user'] = $email;
            echo "<script>window.open('dashboard.php','_self')</script>";
           


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