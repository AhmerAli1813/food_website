<?php 

session_start();
include "conf.php";
echo "direct  order 2 files connected";
$name = mysqli_escape_string($conn , $_POST["name"]);
$email = mysqli_escape_string($conn , $_POST["email"]);
$password = mysqli_escape_string($conn , $_POST["password"]);
$number = mysqli_escape_string($conn , $_POST["number"]);
$address = mysqli_escape_string($conn , $_POST["address"]);
$category = mysqli_escape_string($conn , $_POST["category"]);
$p_id = mysqli_escape_string($conn , $_POST["p_id"]);
$qty = mysqli_escape_string($conn , $_POST["qty"]);
$date = mysqli_escape_string($conn , $_POST["date"]);

if(isset($_SESSION["u_id"])){
    echo "bhai login nhi hy";
}else{
    echo "bhai login hy";
}
?>