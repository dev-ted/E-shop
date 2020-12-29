<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>

<body>

</body>

</html>

<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img  class ="img-responsive"src="../logo/logo-desktop.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form  action="register.inc.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="login" class="fadeIn second" name="name" placeholder="name" required>
            <input type="text" id="surname" class="fadeIn third" name="surname" placeholder="surname" required>
            <input type="email" id="username" class="fadeIn third" name="username" placeholder="username" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            
            <input type="submit" class="fadeIn fourth" name="signUp" value="Sign Up">
        </form>

        
        

    </div>
</div>