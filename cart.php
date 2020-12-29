<?php
$active = 'cart';
include("pages/header.php");

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Shopping cart</li>
            </ul>

        </div>
        <div id="cart" class="col-md-9">
            <div class="box">
                <form action="cart.php" method="POST" enctype="multipart/form-data">

                    <h1>Shopping cart</h1>

                    <?php

                    $ip_add = getUserIp();
                    $get_cart = "SELECT * FROM cart where ip_add = '$ip_add'";
                    $run = mysqli_query($conn, $get_cart);
                    $count = mysqli_num_rows($run);

                    ?>
                    <p class="text-muted">you have <?php echo $count; ?> item(s) in your cart</p>
                    <div class="table-responsive">

                        <table class="table">
                            <thread>
                                <!-- table row -->
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Prize</th>
                                    <th>Delete </th>
                                    <th colspan="1">Sub-total</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thread>
                            <!-- create tbody -->
                            <tbody>

                                <?php
                                $total = 0;
                                $shipping =0 ;
                                $tax =0;
                                while ($Row_cart = mysqli_fetch_array($run)) {
                                        
                                    $pro_id = $Row_cart['p_id'];
                                    $qty = $Row_cart['quantity'];

                                    $get_product = "SELECT * FROM products where prod_id ='$pro_id'";
                                    $run_prod = mysqli_query($conn, $get_product);
                                    while ($row = mysqli_fetch_array($run_prod)) {

                                        $pro_title = $row['prod_title'];
                                        $pro_img = $row['prod_img1'];
                                        $price = $row['prod_price'];
                                       
                                        $sub_total = $row['prod_price'] * $qty;
                                        $tax = $sub_total * 0.02;
                                        if($sub_total >= 400){
                                            $shipping = 60;
                                        }
                                        else{
                                            $shipping = 0;
                                        }
                                        $extras = $tax +$shipping;
                                        $total += $sub_total +$extras;





                                ?>
                                        <tr>

                                            <td>
                                                <img src="images/<?php echo $pro_img; ?>" alt="" class="img-responsive">

                                            </td>
                                            <td>
                                                <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $pro_title; ?></a>
                                            </td>
                                            <td>
                                                <?php echo $qty; ?>
                                            </td>
                                            <td>
                                                R <?php echo $price; ?>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="delete[]" value="<?php echo $pro_id; ?>">
                                            </td>
                                            <td>
                                                R <?php echo $sub_total; ?>
                                            </td>
                                        </tr>

                                <?php }
                                } ?>

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th colspan="5">Total</th>
                                    <th colspan="2">R <?php echo $total; ?></th>



                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="shop.php" class="btn btn-default">

                                <i class="fa fa-chevron-left"></i> Continue shopping
                            </a>

                        </div>
                        <div class="pull-right">
                            <button href="cart.php" class="btn btn-default" type="submit" name="update" value="Update Cart">

                                <i class="fa fa-refresh"></i> Update Cart
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Proceed Checkout <i class="fa fa-chevron-right"></i>
                            </a>

                        </div>
                    </div>

                </form>
            </div>

            <?php
            ///update cart 

            function update_cart()
            {

                global $conn;

                if (isset($_POST['update'])) {
                    foreach ($_POST['delete'] as $remove_id) {
                        $delete_product = "DELETE FROM cart where p_id ='$remove_id'";
                        $run_delete =  mysqli_query($conn, $delete_product);

                        if ($run_delete) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo @$up_cart = update_cart();



            ?>
            <div id="row" class="same-heigh-row">
                <div class="col-md-3 col-sm-6">
                    <div class=" box same-height headline">
                        <h3 class="text-center">Products Suggestions</h3>
                    </div>
                </div>
            </div>
            <!-- suggestion images -->

            <?php getSuggestions(); ?>

        </div>
        <!-- order summary -->
        <div class="col-md-3">
            <div id="order-summary" class="box">
                <div class="box-header">
                    <h3>Order Summary</h3>
                </div>
                <p class="text-muted">
                    shipping costs
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    Sub-total
                                </td>
                                <th>R <?php
                                        //eroor handling
                                        $select = "SELECT * FROM cart";
                                        $run_select = mysqli_query($conn, $select);
                                        $checkselect = mysqli_num_rows($run_select);
                                        if ($checkselect == 0) {
                                            echo "0";
                                        } else {
                                            echo $sub_total;
                                        }
                                        ?></th>
                            </tr>
                            <tr>
                                <td>shipping</td>
                                <th>R <?php echo $shipping; ?></th>
                            </tr>
                            <tr class="total">
                                <td>tax</td>
                                <th>R <?php echo $tax; ?></th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>R <?php echo $total; ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>



</div>
</div>







<?php
include("pages/footer.php")
?>