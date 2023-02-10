<?php
session_start();
include "conf.php";
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$number = mysqli_real_escape_string($conn, $_POST["number"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$cat_id = mysqli_real_escape_string($conn, $_POST["category"]);
$unique_id = rand(time(), 10000);

$qty = (mysqli_real_escape_string($conn, $_POST["qty"]) );

($_POST["date"] == "0000-00-00")? $date =  $_POST["date"] : $date = date("d-m-y") ;
    

if (!empty($email)  && !empty($number)  &&!empty($address)  && !empty($qty)  ) {
    if (isset($_POST["p_id"])) {
        $pro_id = mysqli_real_escape_string($conn, $_POST["p_id"]);
    } else {

        echo '<div class="alert alert-danger" role="alert">
        <strong>Please!</strong> select your product 
        </div>';
        die();
    }
    if (!isset($_SESSION["u_id"])) {
        $sts = "signal_cellular_null";
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
                        $q4 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `number`, `address`, `date`, `status`) 
                                                    VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' , '$number', '$date', '$cart_sts' ) ");
                        if ($q4) {
                            echo true;
                            
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
            $q5 = $conn->query("SELECT u_id , unique_id ,role_id ,email , `password` FROM `register` WHERE email = '$email'");

            if ($q5) {
                $user_data = mysqli_fetch_assoc($q5);
                if (isset($_POST["password"])) {
                    if ($_POST["password"] == "") {
                        echo false;
                    } else {
                         $password = $_POST["password"];
                        
                        
                        if ($user_data["password"] == $password) {
                            
                            $q7 = $conn->query("UPDATE `register` SET `status`='signal_cellular_null' WHERE email = '$email'");
                            $u_id = $user_data["u_id"];
                            $_SESSION["u_id"] = $user_data["u_id"];
                            $_SESSION["role_id"] = $user_data["role_id"];
                            $_SESSION["unique_id"] = $user_data["unique_id"];
                            $q8 = $conn->query("SELECT * FROM `product` WHERE P_id = $pro_id");
                            if ($q8) {
                                
                                $product_item = mysqli_fetch_assoc($q8);
                                $scat_id = $product_item["scat_id"];
                                $p_prize = $product_item["p_prize"];
                                $title = $product_item["p_title"];
                                $cart_sts = "punching";
                                $q8 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `number` , `date`, `status`) 
                                                                    VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' , '$number' , '$date', '$cart_sts' ) ");
                                if ($q8) {
                                    echo true;
                                   
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                                                            <strong>sorry!</strong> can not find your product
                                                                                        </div>';
                                }
                            }
                        }else {
                            echo "<div  class='alert alert-danger' role='alert'>password not match!</div>";
                        }
                    }
                }
            }
        }
    } else {
        $u_id = $_SESSION["u_id"];
        $q9 = $conn->query("SELECT * FROM `product` WHERE P_id = $pro_id");
        if ($q9) {
            $product_item = mysqli_fetch_assoc($q9);
            $scat_id = $product_item["scat_id"];
            $p_prize = $product_item["p_prize"];
            $title = $product_item["p_title"];
            $cart_sts = "punching";
            $q10 = $conn->query("INSERT INTO `card`( `cat_id`, `scat_id`, `pro_id`, `u_id`, `title`, `qty`, `prize`, `number` , `date`, `status`) 
                                    VALUES($cat_id ,$scat_id ,$pro_id , $u_id,'$title','$qty' , '$p_prize' ,'$number', '$date', '$cart_sts' ) ");
            if ($q10) {
                
                echo true;
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
