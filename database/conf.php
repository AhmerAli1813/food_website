<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "epiz_32582462_food_website";

$conn = mysqli_connect($server , $username ,$password ,$database) or die("database connection failed");

    // echo "<pre> "; echo print_r($_SESSION["cart"]);  echo"</pre>";
    // foreach($_SESSION["cart"] as $key => $item){
    //         $keys = $_SESSION["cart"][$key]["title"];
    //     echo "<pre> "; echo print_r($keys);  echo"</pre> <br>" ;
    //     if($_SESSION["cart"][$key]["id"] == "3"){
    //         echo $keys;
    //     }
    // }
?>