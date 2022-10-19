<?php

use function PHPSTORM_META\type;

session_start();
include "conf.php";
if ($_POST["action"] == "add") {
   $pro_id = $_POST["p_id"];
   $image = $_POST["image"];
   $title = $_POST["title"];
   $prize = $_POST["prize"];
   $qty = $_POST["qty"];

   if (!isset($_SESSION["cart"][$pro_id])) {
      $card_array = array("id" => "{$pro_id}", "title" => "{$title}", "image" => "{$image}", "prize" => "{$prize}", "qty" => "{$qty}");

      $_SESSION["cart"][$pro_id] = $card_array;

      echo '<div class="alert alert-success" id="p_message" role="alert"> ' . $title . ' your add successfully </div>';
   } else {
      echo '<div class="alert alert-danger" id="p_message" role="alert"> your ' . $title . '  is already  added! </div>';
   }
}
//  cart count funtion
if ($_POST["action"] == "count") {
   if (isset($_SESSION["cart"])) {
      echo  '<span class="badge bg-success">' . count($_SESSION["cart"]) . '</span>';
   } else {
      echo "";
   }
}
// show data of cart in table
if ($_POST["action"] == "show") {
   $output = '';
   $biil = 0;
   if (isset($_SESSION["cart"])) {
      $sno = 1;
      foreach ($_SESSION["cart"] as $key  => $item) {
         $biil .= $biil + ($item["prize"] * $item["qty"]);
         $output .= '<tr class="table-primary" >
           
           <td scope="row">' . $sno++ . '</td>
           <td scope="row"><img src="images/' . $item["image"] . '" width="70px" height="70px" alt=""></td>
           <td scope="row">' . $item["title"] . '</td>
           <td scope="row">' . $item["qty"] . '</td>
           
           <td scope="row" id="prize' . $item["id"] . '" data-prize="' . $item["prize"] . '" >' . $item["prize"] . '</td>
           <td id="total_prize' . $item["id"] . '" data-bill="'.$biil.'">  ' . $item["prize"] * $item["qty"] . '</td>
           <td><a role="button" class="btn btn-outline-danger" id="Delete" data-delete="' . $item["id"] . '">Delete</a></td>
               </tr>
       ';
      }
   }
   echo $output;
}
if ($_POST["action"] == "delete") {
   
   
   foreach($_SESSION["cart"] as $key => $item){
      $id = $_POST["p_id"];
         if($item["id"] == $id  ){
            unset($_SESSION["cart"][$key]);
            echo " All record have been deleted!";
            
            $biil =0;
            $output = '';
            if (isset($_SESSION["cart"])) {
               $sno = 1;
               
               foreach ($_SESSION["cart"] as $key  => $item) {
                  $biil = ($item["prize"] * $item["qty"]);
                  $output .= '<tr class="table-primary" >
                    
                    <td scope="row">' . $sno++ . '</td>
                    <td scope="row"><img src="images/' . $item["image"] . '" width="70px" height="70px" alt=""></td>
                    <td scope="row">' . $item["title"] . '</td>
                    <td scope="row">' . $item["qty"] . '</td>
                    
                    <td scope="row" id="prize' . $item["id"] . '" data-prize="' . $item["prize"] . '" >' . $item["prize"] . '</td>
                    <td id="total_prize' . $item["id"] . '" data-bill="'.$biil.'">  ' . $item["prize"] * $item["qty"] . '</td>
                    <td><a role="button" class="btn btn-outline-danger" id="Delete" data-delete="' . $item["id"] . '">Delete</a></td>
                    
                        </tr>
                        
                ';
               }
               $output .='  ';
            }
            echo $output;
         }
   }
 
}
if ($_POST["action"] == "del_all") {
   
      echo " No record found";
      unset($_SESSION["cart"]);

   
}
if($_POST["action"] == "buy"){
   
   if(isset($_SESSION["unique_id"])){
     $user_id = $_SESSION["u_id"];
      if(isset($_SESSION["cart"])){
         foreach($_SESSION["cart"] as $key => $item){
              $product_id = $item["id"];
              $qty = $item["qty"];
              
              $q = $conn->query("SELECT * FROM `product` WHERE `p_id` = $product_id");
               if($q){
                  $result = mysqli_fetch_assoc($q);
                 $cat_id =  $result["cat_id"];
                 $scat_id =  $result["scat_id"];
                 $p_prize =  $item["prize"];
                 $sts = "purchasing";
               
                  $q2 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `qty`, `prize`, `status`) VALUES($cat_id ,$scat_id ,$product_id , $user_id ,$qty , $p_prize , '$sts' ) ");
                  
                  if($q2){
                        unset($_SESSION["cart"]);
                           echo '<div class="alert alert-success" id="p_message" role="alert">Thanks for punching ' . $item["title"] . '  </div>';
                  }
               }
         }
      }
   }else{
      echo "login";
   }
}