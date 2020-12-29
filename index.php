<?php
 $active='home';
include("pages/header.php");
include("includes/dbconn.inc.php");


?>

<!-- Home slider  -->
<div class="container" id="slider">
    <div class="col-md-12">
        <div class="carousel slide" id="myCarousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="logo/slide_img1.png" alt="slider">
                    <div class="carousel-caption">

                        <h3>Shop for Consoles </h3>
                        <a href="shop.php" class="btn btn-primary">shop now </a>
                    </div>
                </div>
                <div class="item">
                    <img src="logo/slide_img2.png" alt="slideer">
                    <div class="carousel-caption">

                        <h3>New shopping experience</h3>
                        <a href="shop.php" class="btn btn-primary">shop now </a>
                    </div>
                </div>
                <div class="item">
                    <img src="logo/slide_img3.png" alt="slideer">
                    <div class="carousel-caption">

                        <h3>New shopping experience</h3>
                        <a href="shop.php" class="btn btn-primary">shop now </a>
                    </div>
                </div>
                <div class="item">
                    <img src="logo/slide_img4.png" alt="slideer">
                    <div class="carousel-caption">

                        <h3>New shopping experience</h3>
                        <a href="shop.php" class="btn btn-primary">shop now </a>
                    </div>
                    </div>
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
<!-- Introduction Box -->
<div id="advantages">
    <div class="container">
        <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3> <a href="">Best deals in town</a></h3>
                    <p>Take less provides the best deals </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                    </div>
                    <h3> <a href="">Awesome prices</a></h3>
                    <p>A new Online Shopping experience </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <h3> <a href="">Fast Delivery time</a></h3>
                    <p>We delivery in less 5 working days </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Store front -->
<div id="hot">

    <div class="box">
        <div class="container">
        <div class="col-md-9">

        <h2>Hot new Proucts</h2>
        </div>

        </div>

    </div>

</div>
<!-- store content -->
<div id="content" class="container">
    <div class="row">
        <?php
                getProducts();
        ?>
      
   
   
    </div>
</div>
<?php
include("pages/footer.php")
?>