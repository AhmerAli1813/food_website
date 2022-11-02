<?php
include '../../../database/conf.php';

$u_id = (isset($_POST["U_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["U_id"]) : "";
$name = mysqli_real_escape_string($conn, $_POST["Name"]);
$email = mysqli_real_escape_string($conn, $_POST["Email"]);
$pwd = mysqli_real_escape_string($conn, $_POST["Pwd"]);
$role_id = mysqli_real_escape_string($conn, $_POST["Role_id"]);
$img = (isset($_POST["img"]) != "") ?  mysqli_real_escape_string($conn, $_POST["Img"]) :  "pic.png";
$unique_id = rand(time(), 10000);
$sts = "Offline";
if ($name != "" && $email != "" && $pwd != "") {
    
  $q = $conn->query("INSERT INTO `register`( `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`) 
        VALUES ('{$unique_id}','{$name}' ,'{$email}' , '{$pwd}' ,'{$img}' ,'{$sts}' , $role_id )  
                ON DUPLICATE KEY UPDATE u_id = '{$u_id}'; ");
    if ($q) {
        $data = array(
            "status" => "success"
        );
    } else {
        $data = array(
            "status" => "data Request"
        );
    }
} else {
    $data = array(
        "status" => "All Field are required"
    );
}
echo json_encode($data);
