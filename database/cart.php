<?php

use function PHPSTORM_META\type;

session_start();
include "conf.php";
if ($_POST["action"] == "add") { 
   $pro_id = $_POST["p_id"];
   $qty = $_POST["qty"];
   $title = $_POST["title"];
   if (!isset($_SESSION["cart"][$pro_id])) {
      $result = $conn->query("SELECT p_image ,p_title,p_prize FROM `product` WHERE p_id = '$pro_id'");
      if(mysqli_num_rows($result) >0){
         $row = mysqli_fetch_assoc($result);
         $image = $row["p_image"];
         $p_title = $row["p_title"];
         $prize = $row["p_prize"];
         $card_array = array("id" => "{$pro_id}", "title" => "{$p_title}", "image" => "{$image}", "prize" => "{$prize}", "qty" => "{$qty}");

         $_SESSION["cart"][$pro_id] = $card_array;
                        
      }// making invoice
                     $q2=$conn->query("SELECT MAX(inv_id) as last_inv FROM `card`");
                     if(mysqli_num_rows($q2) >0){
             
                                    $last = mysqli_fetch_assoc($q2);
                                  
                                             function increment($matches)
                                              {
                                                    if(isset($matches[1]))
                                                    {
                                                       $length = strlen($matches[1]);
                                                       return sprintf("%0".$length."d", ++$matches[1]);
                                                    }    
                                           }
             
                                              $invoice = $last['last_inv'];
             
                                        $invoice =  preg_replace_callback( "|(\d+)|", "increment", $invoice);
                                        $_SESSION["inv_id"] = $invoice;
                         }
                         
             
                         echo json_encode(["type"=>"success" , "msg" =>"your product add successfully"] , true);
      // echo '<div class="alert alert-success" id="p_message" role="alert"> ' . $title . ' your add successfully </div>';
   } else {
      echo json_encode(["type"=>"error" , "msg" =>$title ."is already  added!"] , true);
      // echo '<div class="alert alert-danger" id="p_message" role="alert"> your ' . $title . '  is already  added! </div>';
   }
}
//  cart count funtion
if ($_POST["action"] == "count") {
   if (isset($_SESSION["cart"])) {
      echo  '<span class="badge bg">' . count($_SESSION["cart"]) . '</span>';
   } else {
      echo "";
   }
}
// show data of cart in table
if ($_POST["action"] == "show") {
   $biil = 0;
   $output = '';
   if (isset($_SESSION["cart"])) {
      $sno = 1;

      foreach ($_SESSION["cart"] as $key  => $item) {
         $biil += $biil + intval($item["prize"] * $item["qty"]);
         $output .= '<tr class="table-primary" >
           
         <td scope="row">' . $sno++ . '</td>
         <td scope="row"><img src="images/' . $item["image"] . '" width="70px" height="70px" alt=""></td>
         <td scope="row">' . $item["title"] . '</td>
         <td scope="row">' . $item["qty"] . '</td>
         
         <td scope="row" id="prize' . $item["id"] . '" data-prize="' . $item["prize"] . '" >' . $item["prize"] . '</td>
         <td id="total_prize' . $item["id"] . '" data-bill="' . $biil . '">  ' . $item["prize"] * $item["qty"] . '</td>
           <td><a role="button" class="btn btn-outline-danger" id="Delete" data-delete="' . $item["id"] . '">X</a></td>
               </tr>
       ';
      }
   }
   echo $output;
}
// calculate amount of product save in session
if ($_POST["action"] == "gTotal") {
   $bill = 0;
   if (isset($_SESSION["cart"])) {
      foreach ($_SESSION["cart"] as $key  => $item) {
         $bill = $bill + intval($item["prize"] * $item["qty"]);
      }
      $tax = $bill * 2.5/100 ;
      $total = $bill +$tax;
      $amount = array("bill" => $bill , "tax" =>$tax , "total" => $total );
     echo json_encode($amount , true);
   }else{
      echo "0";
   }
}
if ($_POST["action"] == "delete") {


   foreach ($_SESSION["cart"] as $key => $item) {
      $id = $_POST["p_id"];
      if ($item["id"] == $id) {
         unset($_SESSION["cart"][$key]);
         // echo " All record have been deleted!";
         echo json_encode(["type"=>"success" , "msg" =>"your product  successfully deleted" , "deleted"=>true] , true);
         $biil = 0;
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
                    <td id="total_prize' . $item["id"] . '" data-bill="' . $biil . '">  ' . $item["prize"] * $item["qty"] . '</td>
                    <td><a role="button" class="btn btn-outline-danger" id="Delete" data-delete="' . $item["id"] . '">Delete</a></td>
                    
                        </tr>
                        
                ';
            }
            $output .= '  ';
         }
         echo $output;
      }
   }
}
if ($_POST["action"] == "del_all") {

   echo " No record found";
   unset($_SESSION["cart"]);
}

if ($_POST["action"] == "buy") {

   if (isset($_SESSION["unique_id"])) {
     
      if (isset($_SESSION["cart"])) {
         foreach ($_SESSION["cart"] as $key => $item) {
            $product_id = $item["id"];
             $qty = $item["qty"];
             $inv_id = $_SESSION["inv_id"];
            $q = $conn->query("SELECT * FROM `product` WHERE `p_id` = '{$product_id}'") or die("product query failed");
            if ($q) {
               $result = mysqli_fetch_assoc($q);
               
                $cat_id =  $result["cat_id"];
                $scat_id =  $result["scat_id"];
                $user_id = $_SESSION["unique_id"];
                $p_prize =  $result["p_prize"];
                $title =  $result["p_title"];
                $sts = "pending";
                date_default_timezone_set('Asia/Karachi');
                $now = new DateTime();
             $time = $now->format('Y-m-d h:i:s');
               $sql2 = "INSERT INTO `card`(`inv_id`, `cat_id`,  `scat_id` , `pro_id`, `u_id`, `qty`, `prize`, `date`, `status`) 
                  VALUES('$inv_id','$cat_id', '$scat_id', '$product_id', '$user_id','$qty' , '$p_prize' , '$time', '$sts' ) ";
                    $q2 = $conn->query($sql2);
                  
               if ($q2) {
                  $sql1 = "SELECT `ps_id`, `qty` FROM `pro_stock` WHERE pro_id = '$product_id'";
                              $q3 =$conn->query($sql1);
                              if($q3){
                                 $row2 = mysqli_fetch_assoc($q3);
                                $psQty = $row2["qty"] - $qty;
                                 $ps_id = $row2["ps_id"];
                                $sql3 = "UPDATE `pro_stock` SET `qty`='$psQty',`date`='$time' WHERE `ps_id` = '$ps_id'";
                                 $q4 = $conn->query($sql3) or die(json_encode(["type"=>"error" , "msg" =>"stock is not updated " ],true )); 
                              }
                  unset($_SESSION["cart"]);
                  echo json_encode(["type"=>"success" , "msg" =>"thanks for shopping " ],true );
               }else{
                  echo json_encode(["type"=>"error" , "msg" =>"serve is down " ],true );
               }
            }
         }
      }else{
         echo json_encode(["type"=>"error" , "msg" =>"your selected some cart "  ,"cart"=>false],true );
      }
   } else {
      echo json_encode(["msg"=>"error" , "msg" =>"please login first "  , "login" =>false] ,true );
   }
}
//give feedback of product purchase
if ($_POST["action"] == "feedback") {
    $inv_id= $_SESSION["inv_id"];
    $u_id = $_SESSION["unique_id"];
    if($_POST["fb_msg"]!=""){

    
      $msg = $_POST["fb_msg"];
      $q=$conn->query("INSERT INTO `feedback`( `inv_id`, `user_id`, `msg`, `date`) VALUES ('$inv_id','$u_id' , '$msg',NOW())");
      if($q >0){
         echo true;
         // header("location:index.php");
      }else{
         echo "system busy";
      }

   }else{
      echo "sorry";
   }
}