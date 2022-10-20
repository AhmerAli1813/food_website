<?php

session_start();


include 'conf.php';
// echo "hello";
if ($_POST["action"] == "shwAllPro") {
    $output = '';
    
    $result = $conn->query("SELECT * FROM `product`");
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
        
        <div  class="col-12 col-sm-6 col-md-4 box">
            <button  role="button" class="' . $row['action'] . ' fa-heart" onclick="add_to_whitelist_btn()" name"heat"  ></button>
            <a href="category.php?cat_id=' . $row['cat_id'] . '" class="fas fa-eye" ></a>
            
           
            <input type="hidden" id="image' . $row["p_id"] . '" value=' . $row["p_image"] . '>
            <input type="hidden" id="title' . $row["p_id"] . '" value="' . $row["p_title"] . '">
            <input type="hidden" id="prize' . $row["p_id"] . '" value=' . $row["p_prize"] . '>
           
            
            <img src="images/' . $row['p_image'] . '" alt="">
            <h3>' . $row['p_title'] . '</h3>
            <h4 class="text-muted">' . $row['p_subtitle'] . '</h4>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="d-flex"> <button class="btn  "  data-id="' . $row["p_id"] . '" id="up_val"><i class="fas fa-angle-up"></i></button><input  type="text" id="qty_input' . $row["p_id"] . '" min="0" max="5" name=""  class="text-center " disabled  value="1"> <button data-id="' . $row["p_id"] . '" id="down_val" class="btn "><i class="fas fa-angle-down"></i></button> </div> 
            <span>PKR ' . $row['p_prize'] . '</span> <br>
            <div class="btn-group" role="group" aria-label="Basic example">
                    <button role="button"  type="button"  class=" btn  btn-outline-success cart_show"><i class="fas fa-cart-arrow-down"></i></button>
                    <button role="button" id="CartBtn" data-id="' . $row["p_id"] . '"  class="btn btn-outline-success">add to cart</button>
                    
                </div>
            
        </div>';
        }
        echo $output;
    } else {
        echo $output = 'no record found ';
    }
}
