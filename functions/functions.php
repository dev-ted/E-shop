<?php
include("includes/dbconn.inc.php");



/// create function to get products
function getProducts()
{

    global  $conn;
    $query = "SELECT * FROM products order by 1 desc limit 0,6 ";
    $run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($run)) {
        $prod_id = $row['prod_id'];
        $item_name = $row['prod_title'];
        $price = $row['prod_price'];
        $item_images = $row['prod_img1'];
        $description = $row['prod_description'];

        echo "
        <div class='col-md-4 col-sm-6 single'>
        <div class='product'>
        <a href='details.php?pro_id=$prod_id'> 
                <img class='img-responsive' src='images/$item_images' alt=''>
        </a>
        
        <div class='text'> 

            <h3> 
            <a href='details.php?pro_id=$prod_id'> 
           $item_name
    </a>   

            </h3>
            <p class ='price'> R $price   </p>
            <p class='button'>
            <a  class='btn btn-default' href='details.php?pro_id=$prod_id'> 
           View Details
    </a>
            <a  class='btn btn-primary' href='cart.php?pro_id=$prod_id'> 

            <i class='fa fa-shopping-cart'>Add to cart</i>
    </a>
            
            </p>

        </div>
        </div>

        </div>
        
        
        ";
    }
}

// get catergories

function getProd_category(){
    global $conn;
    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        $query = "SELECT * from product_catergory where prod_catergory_id='$p_cat_id'";
        $run = mysqli_query($conn,$query);
        $row =mysqli_fetch_array($run);
        $title = $row['prod_catergory_title'];
        $desc = $row['prod_catergory_desc'];
        $get_prod = "SELECT * from products where prod_catergory_id='$p_cat_id'";

        $run_prod = mysqli_query($conn,$get_prod);
        $count = mysqli_num_rows($run_prod);
       if($count == 0){
           echo "
           <div class 'box'> 
            <h1> No products </h1>
           
           </div>
           ";
       }
       else{
           echo "
           <div class='box'> 
            <h1> $title</h1>
            <p> $desc </p>
           
           </div>
           ";
       }

       while($row = mysqli_fetch_array($run_prod)){

        $prod_id = $row['prod_id'];
        $item_name = $row['prod_title'];
        $price = $row['prod_price'];
        $item_images = $row['prod_img1'];

        echo "
        <div class='col-md-4 col-sm-6 single'>
        <div class='product'>
        <a href='details.php?pro_id=$prod_id'> 
                <img class='img-responsive' src='images/$item_images' alt=''>
        </a>
        
        <div class='text'> 

            <h3> 
            <a href='details.php?pro_id=$prod_id'> 
           $item_name
    </a>   

            </h3>
            <p class ='price'> R $price   </p>
            <p class='button'>
            <a  class='btn btn-default' href='details.php?pro_id=$prod_id'> 
           View Details
    </a>
            <a  class='btn btn-primary' href='details.php?pro_id=$prod_id'> 

            <i class='fa fa-shopping-cart'>Add to cart</i>
    </a>
            
            </p>

        </div>
        </div>

        </div>
        
        
        ";

       }

      
    }
}
function get_category(){
    global $conn;
    if(isset($_GET['cat'])){
        $category_id = $_GET['cat'];
        $query = "SELECT * from catergories where catergory_id='$category_id'";
        $run = mysqli_query($conn,$query);
        $row =mysqli_fetch_array($run);
        $title = $row['catergory_name'];
       
        $get_prod = "SELECT * from products where catergory_id='$category_id'";

        $run_prod = mysqli_query($conn,$get_prod);
        $count = mysqli_num_rows($run_prod);
       if($count == 0){
           echo "
           <div class 'box'> 
            <h1> No products </h1>
           
           </div>
           ";
       }
       else{
           echo "
           <div class='box'> 
            <h1> $title</h1>
           
           
           </div>
           ";
       }

       while($row = mysqli_fetch_array($run_prod)){

        $prod_id = $row['prod_id'];
        $item_name = $row['prod_title'];
        $price = $row['prod_price'];
        $item_images = $row['prod_img1'];

        echo "
        <div class='col-md-4 col-sm-6 single'>
        <div class='product'>
        <a href='details.php?pro_id=$prod_id'> 
                <img class='img-responsive' src='images/$item_images' alt=''>
        </a>
        
        <div class='text'> 

            <h3> 
            <a href='details.php?pro_id=$prod_id'> 
           $item_name
    </a>   

            </h3>
            <p class ='price'> R $price   </p>
            <p class='button'>
            <a  class='btn btn-default' href='details.php?pro_id=$prod_id'> 
           View Details
    </a>
            <a  class='btn btn-primary' href='details.php?pro_id=$prod_id'> 

            <i class='fa fa-shopping-cart'>Add to cart</i>
    </a>
            
            </p>

        </div>
        </div>

        </div>
        
        
        ";

       }

      
    }
}



//shopping cart functions

function getUserIp(){
    switch(true){
        //get client and server ip
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function add_cart(){
    global $conn;

    if(isset($_GET['add_cart'])){

            $ip_add =getUserIp();
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['prod_quantity'];

            $query = "SELECT * FROM cart WHERE ip_add ='$ip_add' AND p_id= '$p_id'";
            $run_check = mysqli_query($conn,$query);
            $counter =mysqli_num_rows($run_check);
           
            if($counter >0){
                $query = "UPDATE cart SET quantity ='$product_qty' where ip_add ='$ip_add' AND p_id= '$p_id'";
                $run = mysqli_query($conn,$query);
                echo "<script>alert('product already in cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
    
            }
            else{

                $insert = "INSERT INTO cart(p_id,ip_add,quantity) VALUES ('$p_id','$ip_add','$product_qty')";
                $run_query = mysqli_query($conn,$insert);
                if($run_query){
                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                  

                }
              
                

            }
            


    }
}

//SUGGESTIONS 
function getSuggestions(){
    global $conn;

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

}

// get total items
 function items(){

global $conn;
$ip_add = getUserIp();
$items_query = "SELECT * FROM cart where ip_add ='$ip_add'";
$check_query = mysqli_query($conn,$items_query);
$count_items = mysqli_num_rows($check_query);
echo $count_items;


 }

 //get  total price of items
 function getPrice(){

    global  $conn;
    $ip_add = getUserIp();
    $total =0;
    $select_cart ="SELECT * FROM cart where ip_add ='$ip_add'";
    $check_cart = mysqli_query($conn,$select_cart);
    while($row = mysqli_fetch_array($check_cart)){
        $pro_id = $row['p_id'];
        $pro_qty = $row['quantity'];
        
        $get_price = "SELECT * FROM products where prod_id='$pro_id'";
        $check_price = mysqli_query($conn,$get_price);
        while($price_row =mysqli_fetch_array($check_price)){
            $sub_total = $price_row['prod_price']*$pro_qty;
            $total += $sub_total;

             
        }

    }
    echo "$total";


 }

 

