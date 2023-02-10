
<?php
 session_start();
include "conf.php";
 error_reporting(0);
$u_name = mysqli_real_escape_string($conn , $_POST["name"]);
$u_email = mysqli_real_escape_string($conn , $_POST["email"]);
$u_pass = mysqli_real_escape_string($conn , $_POST["pass"]);
$u_re_pass = mysqli_real_escape_string($conn , $_POST["re_pass"]);



if(!empty($u_name) && !empty($u_email) && !empty($u_pass) ){
// let's we are check email is valid
        if(filter_var($u_email , FILTER_VALIDATE_EMAIL)){ // This is function filer_var() used to filter the variable and we pass key which check  email syntax , like (some@gmail.com)
        // let's check is email is already defined database
                $q = mysqli_query($conn , "SELECT * FROM `register` WHERE email = '{$u_email}'");
                    if(mysqli_num_rows($q)> 0){ // if email is already existed 
                        echo " $u_email - This email already exist";

                    }else{ // let's check password is match
                        if($u_pass != $u_re_pass){
                            echo " your password is not match ";

                        }else{ //let check user upload file or not
                            if(isset($_FILES["user_image"])){
                                    $img_name = $_FILES["user_image"]["name"];//this is getting image name 
                                    $img_type = $_FILES["user_image"]["type"]; // this is getting image type 
                                    $tmp_name = $_FILES["user_image"]["tmp_name"]; // this is temporally name is used to save/move file in our folder

                                    // let's explode image and get last extension of a user uploaded img file
                                    $img_explode = explode('.', $img_name); // this function used to help cut image name where dot (.) are used
                                    $img_ext = end($img_explode); // this function given last value of image
                                    $extension = ['png', 'jpeg', 'jpg']; // there are some valid img extension which we allow user

                                    if(in_array($img_ext , $extension) === true){ // if usr uploaded img ext is matched with array extension
                                        $time = time(); // this function  given curren time when user upload img
                                        $new_img_name = $time.$img_name;
                                        if(move_uploaded_file($tmp_name , "upload/".$new_img_name)){ // if user uploaded img successfully 
                                            $status = "signal_cellular_4_bar";
                                        $unique_id = rand(time(),10000);
                                                
                                        // $q2 = "";
                                               $final = $conn -> query("INSERT INTO `register`( `unique_id`, `Name`, `email`, `password`, `image`, `status`) VALUES   ( '$unique_id', '$u_name','$u_email','$u_pass','$new_img_name','$status')");
                                            // echo $sql = mysqli_query($conn , $q2);
                                                                 
                                            if($final === true){
                                                
                                                  
                                                    $q3  = $conn -> query("SELECT * FROM `register` where email = '$u_email' ");
                                                    if(mysqli_num_rows($q3) > 0){
                                                        $row = mysqli_fetch_assoc($q3);
                                                        $_SESSION["unique_id"] = $row["unique_id"];
                                                        $_SESSION["u_id"] = $row["u_id"];
                                                        $_SESSION["role_id"] = $row["role_id"];
                                                      
                                                        echo true;
                                                                    
                                                                    
                                                            }
                                                                       }else{
                                                                        echo 'query failed ';
                                                                   }
                                        }


                                    }else{
                                        echo " please select an image file!";
                                    }


                            }
                        }

                    }

        }else{
            echo " $u_email - This email is not a valid";
        } 
}else{
    echo "All Input Field are Required";
}

?>