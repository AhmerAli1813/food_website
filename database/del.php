<?php
session_start();

if ($_POST["action"] == "delete") {
   if (isset($_SESSION["cart"])) {
      $cart_id =$_POST["p_id"];
      foreach ($_SESSION["cart"] as $key  => $item) {
            if($_SESSION["cart"][$key]["id"] = $cart_id){
 
               $tes = $_SESSION["cart"][$key]["id"] = $cart_id;
 echo print_r($tes);
              unset($_SESSION["cart"][$key]["1"]);
               
                  echo "delete some sesion";
            }else{
               echo " not match";
            }
      }
   }
}
?>