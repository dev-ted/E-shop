<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
        <form action="login.inc.php" method="POST" enctype="multipart/form-data">
            <input type="email" id="login" class="fadeIn second" name="username" placeholder="login" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="submit" class="fadeIn fourth" name="login" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="register.php">New User?</a>
        </div>

    </div>
</div>