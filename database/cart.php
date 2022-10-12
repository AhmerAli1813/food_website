<?php 
session_start();
 $pro_id = $_POST["Product_id"];
 $image = $_POST["image"];
 $title = $_POST["title"];
 $prize = $_POST["prize"];
 $qty = $_POST["qty"];

     $card_array = array($pro_id,$image,$title,$prize,$qty);
    

     $_SESSION[$pro_id] = $card_array;

echo "success";    


?>