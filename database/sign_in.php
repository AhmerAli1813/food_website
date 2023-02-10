<?php
 session_start();
include "conf.php";
 error_reporting(0);
 $email = mysqli_real_escape_string($conn , $_POST["email"]);
$pass = mysqli_real_escape_string($conn , $_POST["pass"]);
$remember_me = mysqli_real_escape_string($conn , $_POST["remember-me"]);
$output = '';

                if(!empty($email) && !empty($pass)){
                        if(filter_var($email , FILTER_VALIDATE_EMAIL)){
                                $q = $conn->query("SELECT * FROM `register` WHERE `email` = '$email' ") or die("first query faild ");
                              
                                if(mysqli_num_rows($q)>0){
                                        
                                        $result = mysqli_fetch_assoc($q);
                                                if($result["password"] == $pass ){
                                                        echo "success";
                                                       
                                                                $q3 = $conn->query("UPDATE `register` SET `status`='signal_cellular_4_bar' WHERE `email` = '$email'") or die("update query failed");
                                                                $_SESSION["unique_id"] = $result["unique_id"];
                                                                $_SESSION["u_id"] = $result["u_id"];
                                                                $_SESSION["role_id"] = $result["role_id"];
                                                }else{
                                                        echo $output = "Password is not match !";
                                                }

                                }else{
                                echo $output =  " we  could not find your email ";
                        }
                        }else{
                                echo $output = $email."This email is not Valid ! ";
                        }
                        
                }else{
                        echo $output = "All filed are required ! ";
                }
?>