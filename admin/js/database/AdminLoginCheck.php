<?php
session_start();
if(isset($_SESSION["role_id"])){
   if($_SESSION["role_id"]==1){ 
           $u_id = $_SESSION["u_id"];
   }else{
      echo json_encode(["type"=>"error" , "data"=>false] , true);

   }
}else{
   
    die("Connection False");
}