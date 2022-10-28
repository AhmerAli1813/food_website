<?php
session_start();
include "conf.php";
if ($_POST["action"] = "OneWeekData") {
   $output = '';
   $q = $conn->query('SELECT * FROM `product` WHERE date BETWEEN date_sub(now(),INTERVAL 1 WEEK) and now()') or die("no data found");
   if (mysqli_num_rows($q)) {

      while ($row = mysqli_fetch_assoc($q)) {
         $output .= '<div  class="col-12 col-sm-6 col-md-4 box">
               <div class="image">
                  <img src="images/' . $row["p_image"] . '" alt="">
                  <a href="#" class="' . $row["action"] . ' fa-heart"></a>
               </div>
               <div class="content ">
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  
                  <input type="hidden" id="image' . $row["p_id"] . '" value="' . $row["p_image"] . '">
                  <input type="hidden" id="title' . $row["p_id"] . '" value="' . $row["p_title"] . '">
                  <input type="hidden" id="prize' . $row["p_id"] . '" value="' . $row["p_prize"] . '">
                  <input type="hidden" id="time' . $row["p_id"] . '" value="' . $row["date"] . '">
                  <h3>' . $row["p_title"] . '</h3>
                  <h4>' . $row["p_subtitle"] . '</h4>
                  <p>' . $row["p_desc"] . '</p>
                  <div class="d-flex"> <button class="btn  "  data-id="' . $row["p_id"] . '" id="WkProUpVAl"><i class="fas fa-angle-up"></i></button><input  type="text" id="WkProQtyInput' . $row["p_id"] . '" min="0" max="5" name=""  class="text-center " disabled  value="1"> <button data-id="' . $row["p_id"] . '" id="WkProDownVAl" class="btn "><i class="fas fa-angle-down"></i></button> </div> 
                  <span class="price" >PKR' . $row["p_prize"] . '</span><br>
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button role="button"  type="button"  class=" btn  btn-outline-success cart_show"><i class="fas fa-cart-arrow-down"></i></button>
                  <button role="button" id="CartBtn" data-id="' . $row["p_id"] . '" data-msgId="#weekly_msg"  class="btn btn-outline-success">add to cart</button>
                  
               </div>
      
               </div>
         </div>

               ';
      }
   } else {
      $output = "NO Record Found!";
   }
   echo $output;
};
