<?php
session_start();
include 'conf.php';



if ($_GET["action"] == "check") {

    if (isset($_SESSION["unique_id"])) {
        $unique_id =    $_SESSION["unique_id"];

        $result = mysqli_query($conn, "SELECT * FROM `register` WHERE unique_id =  $unique_id ");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = json_encode($row, true);
            $_SESSION["user"] = $data;
           
        }
    }else{
        $data = json_encode(["action"=>false] , true);
    }
    echo $data;
}
