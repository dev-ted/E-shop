<?php
session_start();
include("../includes/dbconn.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TakeLess</title>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
    crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
     crossorigin="anonymous"/>

    <!-- styling -->
   <style>


       body{
           background-color: #f0f0f0;
           padding: 0;
           margin: 0;
       }
       

 #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

    
   </style>

    
</head>
<body>



<div class="d-flex" id="wrapper">

    <!-- start Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><a class="navbar-brand" href="dashboard.php">
    <img src="../logo/logo-desktop.png" class="d-inline-block align-top" alt="" loading="lazy" class="img-fluid " >
   
  </a></div>
      <div class="list-group list-group-flush">
        <a href="insert.php" class="list-group-item list-group-item-action bg-light">Insert Items</a>
        <a href="edit.php" class="list-group-item list-group-item-action bg-light">Edit Items</a>
        <a href="orders.php" class="list-group-item list-group-item-action bg-light">Orders</a>
       
      </div>
    </div>
    <!-- /#end-sidebar-wrapper -->

    <!-- start Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-user"></i> <?php echo $_SESSION['user']; ?></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          
            <li class="nav-item  btn-primary">
              <a class="nav-link " href="logout.inc.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>
                Logout
              </a>
              
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          <h1 class="mt-6">Insert new Product</h1>

      <form  method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <span >Product title</span>
      <input type="text" name="product_title" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
      <span >Product Category</span>
      <select name="product_catergory" class="form-control" required>
                                    <option ></option>
                                    <?php
                                    $get_prod_cat = "SELECT * FROM  product_catergory";
                                    $run = mysqli_query($conn, $get_prod_cat);
                                    while ($row = mysqli_fetch_array($run)) {
                                        $cat_id = $row['prod_catergory_id'];
                                        $cat_title = $row['prod_catergory_title'];
                                        echo "
                                        <option value='$cat_id'>$cat_title</option>
                                        ";
                                    }
                                    ?>
                                </select>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Catergory</label>
    <select name="catergory" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                    $get_cat = "SELECT * FROM  catergories";
                                    $run = mysqli_query($conn, $get_cat);
                                    while ($row = mysqli_fetch_array($run)) {
                                        $cat_id = $row['catergory_id'];
                                        $cat_title = $row['catergory_name'];
                                        echo "
                                        <option value='$cat_id'>$cat_title</option>
                                        ";
                                    }
                                    ?>
                                </select>
  </div>
  <div class="form-group">
    <span >Image 1</span>
    <input type="file" name="product_img1" class="form-control-file" required>
  </div>
  <div class="form-group">
    <span >Image 2</span>
    <input type="file" name="product_img2" class="form-control-file" required>
  </div>
  <div class="form-group">
    <span>Image 3</span>
    <input type="file" name="product_img3" class="form-control-file" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span>Product Price</span>
      <input type="number" name="product_price" class="form-control" required>
    </div>
    
    <div class="form-group col-md-6">
      <span>Product Keyword</span>
      <input type="text" name="product_keywords" class="form-control" required>
    </div>
    <div class="form-group col-md-8">
      <span>Product Description</span>
      <textarea class="form-control" name="product_desc"  rows="3" required></textarea>
    </div>
  </div>
 
  <button type="submit" name="insert" class="btn btn-primary">Upload</button>
</form>
      
      </div>
    </div>
    <!-- /end-content-wrapper -->

  </div>
  <!-- end wrapper-->


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>

<?php
if(isset($_POST['insert'])){

    $prod_title =$_POST['product_title'];
    $prod_p_cat =$_POST['product_catergory'];
    $prod_category =$_POST['catergory'];
   
    $prod_price =$_POST['product_price'];
    $prod_keywords =$_POST['product_keywords'];
    $prod_desc =$_POST['product_desc'];
    $prod_img1 =$_FILES["product_img1"]['name'];
    $prod_img2 =$_FILES["product_img2"]['name'];
    $prod_img3 =$_FILES["product_img3"]['name'];

    $temp_name1 = $_FILES['product_img1']['temp_name'];
    $temp_name2 = $_FILES['product_img2']['temp_name'];
    $temp_name3 = $_FILES['product_img3']['temp_name'];

    move_uploaded_file($temp_name1,"../images/../$prod_img1");
    move_uploaded_file($temp_name2,"../images/../$prod_img2");
    move_uploaded_file($temp_name3,"../images/../$prod_img3");

   
$query = "INSERT INTO products(prod_catergory_id,catergory_id,date,prod_title,prod_img1,prod_img2,prod_img3,prod_price,prod_description,keywords) values('$prod_p_cat','$prod_category',NOW(),'$prod_title','$prod_img1','$prod_img2','$prod_img3','$prod_price','$prod_desc','$prod_keywords')";

$run = mysqli_query($conn,$query);
if($run){
    echo "<script>alert('Successfully inserted')</script>";
    echo "<script>window.open('insert.php','_self')</script>";

}
}
?>