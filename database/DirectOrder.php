<?php
session_start();
include "conf.php";
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$number = mysqli_real_escape_string($conn, $_POST["number"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$cat_id = mysqli_real_escape_string($conn, $_POST["category"]);
$unique_id = rand(time(), 10000);
if (isset($_POST["p_id"])) {
    $pro_id = mysqli_real_escape_string($conn, $_POST["p_id"]);
} else {
    
    echo '<div class="alert alert-danger" role="alert">
    <strong>Please!</strong> select your product 
    </div>';
    die();
}
 $qty = mysqli_real_escape_string($conn, $_POST["qty"]);
if (isset($_POST["date"])) {
    $date =  $_POST["date"];
} else {
    $date = date("d-m-y");
}

if (!empty($name) && !empty($number) && !empty($email) && !empty($address)  && !empty($qty)) {
    if (!isset($_SESSION["u_id"])) {
        $sts = "Active Now";
        $q = $conn->query("SELECT * FROM `register` where email = '$email' ");
        
        if ($q == false) {
            $q1 = $conn->query("INSERT INTO `register`( `unique_id`, `Name`, `email`, `password`,`status`) VALUES ('$unique_id' , '$name' , '$email' , '$number' , '$sts')") or die("connection failed");
            if ($q1) {

                $q2  = $conn->query("SELECT  u_id ,unique_id ,role_id FROM `register` where email = '$email' ");
                if (mysqli_num_rows($q2) > 0) {
                    $row = mysqli_fetch_assoc($q2);
                    $_SESSION["unique_id"] = $row["unique_id"];
                    $_SESSION["u_id"] = $row["u_id"];
                    $_SESSION["role_id"] = $row["role_id"];
                    $u_id = $row["u_id"];
                    $q3 = $conn->query("SELECT * FROM `product` WHERE P_id = $pro_id");
                    if ($q3) {
                        $product_item = mysqli_fetch_assoc($q3);
                        $scat_id = $product_item["scat_id"];
                        $p_prize = $product_item["p_prize"];
                        $title = $product_item["p_title"];
                        $cart_sts = "punching";
                        $q4 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `date`, `status`) 
                                                    VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' , '$date', '$cart_sts' ) ");
                        if ($q4) {
                            echo '<div class="alert alert-success" role="alert">
                                                        <strong>Thanks For Shopping</strong> 
                                                        </div>';
                            echo "reset";
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                                                    <strong>sorry!</strong> can not find your product
                                                                </div>';
                        }
                    }
                } else {
                    echo "your product not found";
                }
            }
        } else {
            $q5 = $conn->query("SELECT u_id , unique_id , role_id FROM `register` WHERE email = '$email'");
            if ($q5) {
                $user_data = mysqli_fetch_assoc($q5);
                $u_id = $user_data["u_id"];
                $_SESSION["u_id"] = $user_data["u_id"];
                $_SESSION["role_id"] = $user_data["role_id"];
                $_SESSION["unique_id"] = $user_data["unique_id"];

                $q6 = $conn->query("SELECT * FROM `product` WHERE P_id = $pro_id");
                if ($q6) {
                    $product_item = mysqli_fetch_assoc($q6);
                    $scat_id = $product_item["scat_id"];
                    $p_prize = $product_item["p_prize"];
                    $title = $product_item["p_title"];
                    $cart_sts = "punching";
                    $q7 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `date`, `status`) 
                                                        VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' , '$date', '$cart_sts' ) ");
                    if ($q7) {
                        echo '<div class="alert alert-success" role="alert">
                                                                                    <strong>Thanks For Shopping</strong> 
                                                                                    </div>';
                        echo 'reset';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                                                                <strong>sorry!</strong> can not find your product
                                                                            </div>';
                    }
                }
            }
        }
    } else {
        $u_id = $_SESSION["u_id"];
        $q5 = $conn->query("SELECT * FROM `product` WHERE P_id = $pro_id");
        if ($q5) {
            $product_item = mysqli_fetch_assoc($q5);
            $scat_id = $product_item["scat_id"];
            $p_prize = $product_item["p_prize"];
            $title = $product_item["p_title"];
            $cart_sts = "punching";
            $q6 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `date`, `status`) 
                                    VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' , '$date', '$cart_sts' ) ");
            if ($q6) {
                echo '<div class="alert alert-success" role="alert">
                                <strong>Thanks For Shopping</strong> 
                                </div>';
                echo "reset";
            }
        } else {
            
            echo '<div class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> your product not found 
            </div>';
        }
    } //user id not set bracket

} else {
    echo '<div class="alert alert-danger" role="alert">
            <strong>please!</strong> insert required filed 
            </div>';
}
