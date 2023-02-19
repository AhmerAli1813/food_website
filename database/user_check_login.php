<?php
session_start();
include 'conf.php';





if ($_GET["action"] == "check") {

    if (isset($_SESSION["unique_id"])) {
        $unique_id =    $_SESSION["unique_id"];

        $result = mysqli_query($conn, "SELECT role_id , Name , image FROM `register` WHERE unique_id = ' $unique_id' ");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = json_encode($row, true);
            $_SESSION["user"] = $data;
           $action = true;
                if(isset($_SESSION["cart"])){
                            $count = count($_SESSION["cart"]);
                            if($count <= 0 ){
                                $data = json_encode(["login"=>true, "cart"=>false ,"data"=> $row] , true);
                            }else{
                                $data = json_encode( ["login"=>true ,"cart"=>true ,"data"=> $row] , true);
                            }
                    
                }else{
                    $data = json_encode(["login"=>true, "cart"=>false ,"data"=> $row] , true);
                }
        }
    }else{
        $action = false;
        $data = json_encode(["login"=>false] , true);
    }
echo $data;  
}

