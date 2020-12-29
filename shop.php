<?php
 $active='shop';
include("pages/header.php");



?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Shop</li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
            include("pages/sidebar.php")
            ?>
        </div>

        <div class="col-md-9">
            <?php
            if (!isset($_GET['p_cat'])) {
                if (!isset($_GET['cat'])) {
                    echo "
            <div class='box'>
                <h1>Shop</h1>
                <p>Show for great deals at low prices</p>
            </div> 
            ";
                }
            }
            ?>
            <div class="row">
                <?php
                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat'])) {

                        $per_pages = 6;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $start_from = ($page - 1) * $per_pages;
                        $get_prod = "SELECT * FROM products order by 1 desc limit $start_from,$per_pages";
                        $run = mysqli_query($conn, $get_prod);
                        while ($row = mysqli_fetch_array($run)) {
                            $prod_id = $row['prod_id'];
                            $item_name = $row['prod_title'];
                            $price = $row['prod_price'];
                            $item_images = $row['prod_img1'];
                            $description = $row['prod_description'];

                            echo "
        <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$prod_id'>
                            <img class='img-responsive' src='images/$item_images' alt=''>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$prod_id'>$item_name</a>
                            </h3>
                            <p class='price'> R $price</p>
                            <p class='button'>
                                <a href='details.php?pro_id=$prod_id' class='btn btn-default'>View Details</a>
                                <a href='details.php?pro_id=$prod_id' class='btn btn-primary'>
                                    <i class='fa fa-shopping-cart'>Add to cart</i>
                                </a>

                            </p>
                        </div>
                    </div>
                </div> 
                                    
                                    
                                    ";
                        }




                ?>


            </div>
            <center>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                <?php
                        $query = "SELECT * from products";
                        $results = mysqli_query($conn, $query);
                        $total_records = mysqli_num_rows($results);
                        $total_pages = ceil($total_records / $per_pages);
                        echo "
                      
                        <li class='page-item'>
                        <a class='page-link' href='shop.php?page=1' aria-label='Previous'>
                            <span aria-hidden='true'>&laquo;</span>
                            <span class='sr-only'>Previous</span>
                        </a>
                    </li>
                      
                        ";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "
                            <li class='page-item'><a class='page-link' href='shop.php?page=" . $i . "'>" . $i . "</a></li>
                            
                            ";
                        };
                        echo "
                        <li class='page-item'>
                            <a class='page-link' href='shop.php?page=$total_pages' aria-label='Next'>
                                <span aria-hidden='true'>&raquo;</span>
                                <span class='r-only'>Next</span>
                            </a>
                        </li>
                        ";
                    }
                }

                ?>

                    </ul>
                </nav>
            </center>

            <div class="row">
                <?php
                getProd_category();

                ?>


            </div>
            <div class="row">
                <?php
                get_category();

                ?>


            </div>
        </div>
    </div>
</div>

<?php
include("pages/footer.php")
?>
 <script src="js\jquery-3.2.1.min.js"></script>
    <!-- <script src="js/jquery-3.5.min.js"></script> -->
    <script src="fonts\fontawesome\js\fontawesome.min.js"></script>
    <!-- <script src="js\bootstrap.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>