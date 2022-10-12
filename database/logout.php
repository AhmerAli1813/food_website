<?php  
include 'conf.php';
error_reporting(0);

session_start();
if(isset($_SESSION["unique_id"])){

    echo $unique_id = $_SESSION["unique_id"];
     $res = mysqli_query($conn, "UPDATE `register` SET status = 'offline' where unique_id = '$unique_id' ") or die(" session  logout update query failed");

     echo "success";
        session_destroy();
}

?>