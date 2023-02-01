<?php
include '../../../database/conf.php';

 $u_id = (isset($_POST["U_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["U_id"]) : "";
 $name = mysqli_real_escape_string($conn, $_POST["UserName"]);
 $email = mysqli_real_escape_string($conn, $_POST["UserEmail"]);
 $pwd = mysqli_real_escape_string($conn, $_POST["UserPwd"]);
 $role_id = mysqli_real_escape_string($conn, $_POST["UserRole"]);
 $unique_id = rand(time(), 10000);
 $sts = "Offline";
if ($name != "" && $email != "" && $pwd != "") {
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
                $q = $conn->query("INSERT INTO `register`( `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`) 
                      VALUES ('{$unique_id}','{$name}' ,'{$email}' , '{$pwd}' ,'{$img}' ,'{$sts}' , $role_id )  
                              ON DUPLICATE KEY UPDATE u_id = '{$u_id}'; ");
                  if ($q) {
                      $data = array(
                          "type" => "success",
                          "msg" => "command successfully"
                      );
                  } else {
                      $data = array(
                          "type" => "error",
                          "msg" => "Something Went wrong"
                      );
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
        "type" => "success",
        "msg" => "All Filed Required"
    );
}
echo json_encode($data , true);
