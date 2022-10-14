<?php 
session_start();
 $pro_id = $_POST["p_id"];
 $image = $_POST["image"];
 $title = $_POST["title"];
 $prize = $_POST["prize"];
 $qty = $_POST["qty"];

 
 if(!isset($_SESSION["cart"][$pro_id])){
 $card_array = array("id"=>"{$pro_id}", "title"=>"{$title}", "image"=>"{$image}" , "prize" => "{$prize }", "qty" =>"{$qty}" );
 
 $_SESSION["cart"][$pro_id] = $card_array;
 
 echo '<div class="alert alert-success" id="p_message" role="alert"> '.$title.' your add successfully </div>';
        
 }else{
    echo '<div class="alert alert-danger" id="p_message" role="alert"> your '.$title.'  is already  added! </div>';
 }
    

     

?>