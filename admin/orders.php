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
              <a class="nav-link " href="logout.inc.php"  ><i class="fa fa-lock"></i>
                Logout
              </a>
              
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-6">Orders</h1>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Product ID</th>
      <th scope="col">Quantity</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
                                

                                $get_product = "SELECT * FROM orders";
                                $run_prod = mysqli_query($conn, $get_product);
                                while ($row = mysqli_fetch_array($run_prod)) {
                                    $pro_id = $row['prod_id'];
                                    $id = $row['id'];
                                    $cus_id = $row['cus_id'];
                                    $amount = $row['amount_due'];
                                    $invoice = $row['invoice_no'];
                                    $qty = $row['quantity'];
                                    $date = $row['order_date'];
                                    
                                   





                            ?>
                                    <tr>
                                    <td>
                                        <?php echo $id; ?>
                                </td>
                                    <td>
                                        <?php echo $cus_id; ?>
                                </td>

                                        <td>
                                        R   <?php echo $amount; ?> 

                                        </td>
                                        <td>
                                        <?php echo $invoice; ?>
                                        </td>
                                        <td>
                                         <?php echo  $pro_id; ?>
                                        </td>
                                        <td>
                                             <?php echo $qty; ?>
                                        </td>
                                        <td>
                                           <?php echo $date; ?>
                                        </td>
                                        
                                    </tr>

                            <?php 
                            } ?>
  
  </tbody>
</table>
 

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

