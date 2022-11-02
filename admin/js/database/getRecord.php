<?php 
include '../../../database/conf.php';

if(isset($_POST["action"] ) == "user_data"){
    $u_id = $_POST["u_id"];
    $q=$conn->query("SELECT * FROM `register` WHERE u_id = $u_id");
    if(mysqli_num_rows($q)){
        $data=$q->fetch_assoc();
        
    }
}

?>