<?php
session_start();

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
   if (isset($_SESSION["cart"])) {
      $sno = 1;
      foreach ($_SESSION["cart"] as $key  => $item) {
         $output .= '<tr class="table-primary" >
           
           <td scope="row">' . $sno++ . '</td>
           <td scope="row"><img src="images/' . $item["image"] . '" width="70px" height="70px" alt=""></td>
           <td scope="row">' . $item["title"] . '</td>
           <td scope="row">' . $item["qty"] . '</td>
           
           <td scope="row" id="prize' . $item["id"] . '" data-prize="' . $item["prize"] . '" >' . $item["prize"] . '</td>
           <td id="total_prize' . $item["id"] . '">  ' . $item["prize"] * $item["qty"] . '</td>
           <td><a role="button" class="btn btn-outline-danger" id="Delete" data-delete="' . $item["id"] . '">Delete</a></td>
               </tr>
       ';
      }
   }
   echo $output;
}
if ($_POST["action"] == "delete") {
   if (isset($_SESSION["cart"])) {
     $cart_id =$_POST["p_id"];
      foreach ($_SESSION["cart"] as $key  => $item) {
            if($_SESSION["cart"][$key]["id"] = $cart_id){
               unset($_SESSION["cart"][$key][$cart_id] );
               echo "session delete";
               header("location:index.php");
            }
      }
   }
}

if ($_POST["action"] == "del_all") {
   
      echo " all data delelet";
      unset($_SESSION["cart"]);

   
}