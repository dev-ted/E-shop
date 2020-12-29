<?php
$active = "cart";
include("includes/dbconn.inc.php");
include("pages/header.php");


?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Shop</li>
                <li> <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo  $p_cat_title; ?></a></li>
                <li><?php echo  $pro_title; ?></li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
            include("pages/sidebar.php")
            ?>
        </div>
        <div class="col-md-9">
            <div id="productsMain" class="row">

                <div class="col-sm-6">
                    <div id="mainImage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center><img class="img-responsive" src="images/<?php echo  $pro_img1; ?>" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img class="img-responsive" src="images/<?php echo  $pro_img2; ?>" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img class="img-responsive" src="images/<?php echo  $pro_img3; ?>" alt=""></center>
                                </div>
                            </div>
                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>

                            </a>
                            <a href="#myCarousel" class="right carousel-control" data-slide="next">

                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>

                            </a>

                        </div>
                    </div>
                </div>
                <!-- product images -->
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?php echo  $pro_title; ?></h1>

                        <?php
                            add_cart();            

                        ?>


                        <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Quantity</label>
                                <div class="col-md-7">
                                    <select name="prod_quantity" id="" class="form-control" required>
                                        <option >1</option>
                                        <option >2</option>
                                        <option >4</option>
                                        <option >5</option>

                                    </select>
                                </div>
                            </div>
                            <p class="price">R <?php echo  $pro_price; ?></p>
                            <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>


                        </form>
                    </div>
                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                            <a href="#" class="thumb" data-target="#myCarousel" data-slide-to="0">
                                <img src="images/<?php echo $pro_img1; ?>" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb" data-target="#myCarousel" data-slide-to="1">
                                <img src="images/<?php echo  $pro_img2; ?>" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb" data-target="#myCarousel" data-slide-to="2">
                                <img src="images/<?php echo  $pro_img3; ?>" alt="" class="img-responsive">
                            </a>
                        </div>

                    </div>
                </div>


            </div>
            <!--  product details -->
            <div id="details" class="box">
                <h4>Item Details</h4>
                <p>
                    <?php echo  $pro_desc; ?>
                </p>

                <hr>
            </div>
            <!-- suggestions -->
            <div id="row" class="same-heigh-row">
                <div class="col-md-3 col-sm-6">
                    <div class=" box same-height headline">
                        <h3 class="text-center">Products Suggestions</h3>
                    </div>
                </div>
            </div>
            <?php
            $query = "SELECT * FROM products order by RAND() limit 0,3 ";
            $run = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($run)) {
                $prod_id = $row['prod_id'];
                $item_name = $row['prod_title'];
                $price = $row['prod_price'];
                $item_images = $row['prod_img1'];
                $description = $row['prod_description'];
                # suggestion images 
                echo "
                          <div class='col-md-3 col-sm-6 center-responsive'>
                          <div class='product same-height'>
                              <a href='details.php?pro_id=$prod_id'>
                                  <img  class='img-responsive' src='images/$item_images' alt=''>
                              </a>
                              <div class='text'>
                                  
                                      <h3><a href='details.php?pro_id=$prod_id'>$item_name</a></h3>
                                      <p class='price'>R $price</p>
                                  
                              </div>
                          </div>
                      </div>
                          
                          ";
            }
            ?>





        </div>

    </div>
</div>

<?php
include("pages/footer.php")
?>