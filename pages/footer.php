<?php
include("includes/dbconn.inc.php");
?>
<div id=footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">

        <h4>Pages</h4>
        <ul>
          <li><a href="cart.php">Shopping cart</a></li>
          <li><a href="contact.php">Contact us</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="account.php">Account</a></li>
          

        </ul>
        <hr>
       <!--  <h4>user section</h4>
        <ul class="in-line">
          <li><a href="">Login</a></li>
          <li><a href="">Register</a></li>
        </ul>
 -->
        <hr class="hidden-md hidden-lg hidden-sm">


      </div>

      <div class="com-sm-6 col-md-3">
        <h4> Catergories</h4>
        <ul>
       
        <?php

        $query ="SELECT * FROM product_catergory ";
        $run = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($run)){
          $cat_id = $row['prod_catergory_id'];
          $title = $row['prod_catergory_title'];

          echo "
           <li><a href='shop.php?p_cat=$cat_id'>$title</a></li>
         

          ";
      
        }
        ?>

        </ul>
        <hr class="hidden-md hidden-lg hidden-sm">

      </div>
      <div class="col-sm-6 col-md-3">
        <h4>Find Us</h4>
        <p>
          <strong>Take Less Pty Ltd</strong>
          <br />142 Edens Street ,Forest Park
          <br />Johannesburg
          <br /> 011 456 7890
          <br />Take-Less@gmail.com
          <br /><strong> Take Less</strong>
        </p>
        <a href="contact.php"> Check our contact page</a>
        <hr class="hidden-md hidden-lg hidden-sm">
      </div>
      <div class="col-sm-6 col-md-3">
        <h4>News Letters</h4>
        <p class="text-muted">
          get the news
        </p>
        <form action="" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" name="email" required>
            <span class="input-group-btn">
              <input type="submit" value="Subscribe" class="btn btn-default">
            </span>
          </div>
        </form>

        <hr>
        <h4>Keep in touch</h4>
        <p class="social">
          <a href="" class="fa fa-facebook"></a>
          <a href="" class="fa fa-twitter"></a>
          <a href="" class="fa fa-google-plus"></a>
          <a href="" class="fa fa-instagram"></a>
        </p>

      </div>

    </div>
  </div>
</div>
<div id="copyright">
  <div class="container">
    <div class="col-md-6">
      <p class="pull-left">
        Copyright &copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        All rights reserved Teddy kisala
      </p>
     <!--  -->
      
    </div>
  </div>
</div>