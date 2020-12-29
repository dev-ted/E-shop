<?php
include("includes/dbconn.inc.php");
?>



<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Product Catergories
        </h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked catergory-menu">
            <?php

            $query = "SELECT * FROM product_catergory ";
            $run = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($run)) {
                $cat_id = $row['prod_catergory_id'];
                $title = $row['prod_catergory_title'];

                echo "
           <li><a href='shop.php?p_cat=$cat_id'>$title</a></li>
         

          ";
            }
            ?>

        </ul>
    </div>
</div>
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Catergories
        </h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked catergory-menu">
            <?php

            $query = "SELECT * FROM catergories ";
            $run = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($run)) {
                $cat_id = $row['catergory_id'];
                $title = $row['catergory_name'];

                echo "
   <li><a href='shop.php?cat=$cat_id'>$title</a></li>
 

  ";
            }
            ?>


        </ul>
    </div>
</div>