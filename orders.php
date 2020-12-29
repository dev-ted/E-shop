<?php
        if(isset($_GET['cus_id'])){
            include("functions/functions.php");
            
            $cus_id = $_GET['cus_id'];


        }
        $ip = getUserIp();
        $status = "Pending";
        $invoice_no = mt_rand();
        $cart_query = "SELECT * FROM cart WHERE ip_add ='$ip'";
        $run = mysqli_query($conn,$cart_query);
       
        while($row = mysqli_fetch_array($run)){
            $pro_id = $row['p_id']; 
            $qty = $row['quantity']; 
             $products_query = "SELECT * FROM products where prod_id ='$pro_id'";
             $run_prod = mysqli_query($conn,$products_query);
             
             while($row_prod = mysqli_fetch_array($run_prod)){
                 $sub_total = $row_prod['prod_price']*$qty;
                 $insert = "INSERT INTO orders(cus_id,amount_due,invoice_no,prod_id,quantity,order_date,order_status) values('$cus_id','$sub_total','$invoice_no','$pro_id','$qty',NOW(),'$status')";
                 $run_insert = mysqli_query($conn,$insert);

                 $pending_order = "INSERT INTO pending_orders(cus_id,invoice_no,prod_id,quantity,order_status) values('$cus_id','$invoice_no','$pro_id','$qty','$status')";
                 $pending_run = mysqli_query($conn,$pending_order);

                 $delete_cart = "DELETE from cart where ip_add ='$ip'";
                 $run_delete = mysqli_query($conn,$delete_cart);

                 echo "<script>alert('Your order has been submitted')</script>";
                 echo "<script>window.open('account.php?orders','_self')</script>";

             }
        



        }
