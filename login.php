<div class="box">

    <div class="box-header">

        <center>

            <h1>Login</h1>
           

        </center>
        <?php

if(isset($_POST['login'])){
    $name ;
    include("includes/dbconn.inc.php");
    $email = $_POST['username'];
    $password  = $_POST['password'];
    $query = "SELECT * from tbl_customer where email='$email' ";
    $run = mysqli_query($conn,$query);
   $check_user = mysqli_num_rows($run);
   
   if($check_user ==0){
    echo "<script>alert('username name does not exist')</script>";
    echo "<script>window.open('login.php','_self')</script";
    exit();
   }
   else{
   
    $auth_user = mysqli_fetch_assoc($run);
    $name = $auth_user['name'];
   $auth_pass = password_verify($password,$auth_user['pass']) ;
   }
   
    $ip = getUserIp();

    $cart_query = "SELECT * FROM cart WHERE ip_add ='$ip'";
    $run_cart = mysqli_query($conn,$cart_query);
    $checkcart = mysqli_num_rows($run_cart);

    if($auth_pass==false){
        echo "<script>alert('email or password is wrong')</script>";
        echo "<script>window.open('login.php','_self')</script";
        
       
        exit();
    }
   if($auth_pass==true AND $checkcart ==0 ){
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



    </div>
    <form action="checkout.php" method="POST">
        <div class="form-group">

            <span>Email</span>
            <input name="username" type="text" class="form-control" required>


        </div>
        <div class="form-group">



            <span>password</span>
            <input name="password" type="password" class="form-control" required>

        </div>
        <div class="text-center">

            <button type="submit"name="login" value="Login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Login
            </button>

        </div>

    </form>
    <center>

        <a href="register.php">
            <h3>Sign up</h3>


        </a>

    </center>




</div>
