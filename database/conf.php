<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "epiz_32582462_food_website";
// $server = "sql12.freesqldatabase.com";
// $username = "sql12598992";
// $password = "KJWkydjNBE";
// $database = "sql12598992";

$conn = mysqli_connect($server , $username ,$password ,$database) or die("<script>alert('connection failed ')</script>");

    
?>