<center>
<h1>Orders</h1>
<p class="lead">the orders you have placed</p>
<p class="text-muted"> <a href="contact.php">Contact</a>  us for any queries</p>

</center>
<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <!-- headings -->
        <thead>
            <tr>
                <th>Order ID:</th>
                <th>Amount :</th>
                <th>Invoice No:</th>
                <th>Qty</th>
                <th>Order Date</th>
                
            </tr>
        </thead>
        <!-- table body /content -->
        <tbody>
        <?php
                $session = $_SESSION['user'];
                $query = "select * from tbl_customer where email='$session'";
                $run = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($run);
                $id = $row['id'];
                $get_orders = "select * from orders where cus_id ='$id'";
                $run_order = mysqli_query($conn,$get_orders);
               

                $i =0;
                while($row_order =  mysqli_fetch_array($run_order)){
                    $order_id = $row_order['id'];
                    $invoice_no = $row_order['invoice_no'];
                    $amount =$row_order['amount_due'];
                    $quantity =$row_order['quantity'];
                    $order_date = substr($row_order['order_date'],0,11);
                    $status =$row_order['order_status'];
                    $i++;

                    if($status =='Pending'){
                        $status ='Unpaid';
                    }
                    else{
                        $status ='Paid';
                    }



        ?>
            <tr>
                <th> # <?php echo $i; ?></th>
                <td>R <?php echo $amount; ?></td>
                <td> # <?php echo $invoice_no; ?> </td>
                <td> <?php echo $quantity; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                
             
            </tr>
            <?php }?>

        </tbody>
    </table>
</div>