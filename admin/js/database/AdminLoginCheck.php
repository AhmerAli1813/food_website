<?php
session_start();
if(isset($_SESSION["role_id"])){
   $u_id = $_SESSION["unique_id"];
   if($_SESSION["role_id"]==1){ 
           $u_id = $_SESSION["unique_id"];
   }else{
      echo json_encode(["type"=>"error" , "data"=>false] , true);

   }
}else{
   
   die("<script>alert(' please admin login first ')</script>");
}