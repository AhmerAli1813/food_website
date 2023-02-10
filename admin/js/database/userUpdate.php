<?php
include '../../../database/conf.php';

 $u_id = (isset($_POST["U_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["U_id"]) : "";
 $name = mysqli_real_escape_string($conn, $_POST["UserName"]);
 $email = mysqli_real_escape_string($conn, $_POST["UserEmail"]);
$role_id = mysqli_real_escape_string($conn, $_POST["UserRole"]);
$pwd = (isset($_POST["UserPwd"]) != "") ?  mysqli_real_escape_string($conn, $_POST["UserPwd"]) : "";;
$unique_id = (isset($_POST["UserUniqueId"]) != "") ?  mysqli_real_escape_string($conn, $_POST["UserUniqueId"]) : rand(time(), 10000);
 $sts = (isset($_POST["UserSts"]) != "") ?  mysqli_real_escape_string($conn, $_POST["UserSts"]) : "signal_cellular_null";
if ($name != "" && $email != "" ) {
    if(isset($_FILES["UserImg"])){
        $img_name = $_FILES["UserImg"]["name"];//this is getting image name 
        $img_type = $_FILES["UserImg"]["type"]; // this is getting image type 
        $tmp_name = $_FILES["UserImg"]["tmp_name"]; // this is temporally name is used to save/move file in our folder
        // let's explode image and get last extension of a user uploaded img file
        $img_explode = explode('.', $img_name); // this function used to help cut image name where dot (.) are used
        $img_ext = end($img_explode); // this function given last value of image
        $extension = ['png', 'jpeg', 'jpg' ,"svg"]; // there are some valid img extension which we allow user
    
        if(in_array($img_ext , $extension) === true){ // if usr uploaded img ext is matched with array extension
            $time = time(); // this function  given curren time when user upload img
            $new_img_name = $time.$img_name;
            if(move_uploaded_file($tmp_name , "../../../database/upload/".$new_img_name)){ // if user uploaded img successfully
                $img =  $new_img_name;
                  if($_POST["action"] == "insert"){
                    $q = $conn->query("INSERT INTO `register`( `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`) 
                    VALUES ('{$unique_id}','{$name}' ,'{$email}' , '{$pwd}' ,'{$img}' ,'{$sts}' , $role_id );");
                            if ($q) {
                                $data = array(
                                    "type" => "success",
                                    "msg" => "your data successfully insert"
                                );
                            } else {
                                $data = array(
                                    "type" => "error",
                                    "msg" => "Something Went wrong"
                                );
                            }
                  }
                if($_POST["action"]=="update"){
                    $q2=$conn->query("UPDATE `register` SET `Name`='$name',`email`='$email',`image`='$img',`role_id`='$role_id' WHERE u_id = $u_id");
                    if ($q2) {
                        $data = array(
                            "type" => "success",
                            "msg" => "your Data is updated"
                        );
                    } else {
                        $data = array(
                            "type" => "error",
                            "msg" => "Something Went wrong"
                        );
                    }
                }

            }else{
                $data = array(
                    "type" => "error",
                    "msg" => "can't upload your image"
                );                    
            }
    
    
        }else{
            $data = array(
                "type" => "error",
                "msg" => " select only image files"
            );
        }
    
    
    }else{
        $data = array(
            "type" => "error",
            "msg" => "please select image"
        );  
    }
   
} else {
    $data = array(
        "type" => "error",
        "msg" => "All Filed Required"
    );
}
echo json_encode($data , true);
