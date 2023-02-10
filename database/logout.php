<?php  
include 'conf.php';


session_start();
if(isset($_SESSION["unique_id"])){

    $unique_id = $_SESSION["unique_id"];
     $res = mysqli_query($conn, "UPDATE `register` SET status = 'signal_cellular_null' where unique_id = '$unique_id' ") or die(" session  logout update query failed");

     session_destroy();
     echo true;
}

?>