<?php
include '../../../database/conf.php';
include "AdminLoginCheck.php";
$b_id = (isset($_POST["bID"]) != "") ?  mysqli_real_escape_string($conn, $_POST["bID"]) : "";
 $title = mysqli_real_escape_string($conn, $_POST["bTitle"]);
 $subtile = mysqli_real_escape_string($conn, $_POST["bSubtitle"]);
 $cat_id= mysqli_real_escape_string($conn, $_POST["Cat_id"]);
 $scat_id=(isset($_POST["Scat_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["Scat_id"]) : "";;
$desc= mysqli_real_escape_string($conn, $_POST["bDesc"]);

 if ($cat_id != ""   && $title != "" && $subtile != "") {
    if(isset($_FILES["bImg"])){
        $img_name = $_FILES["bImg"]["name"];//this is getting image name 
        $img_type = $_FILES["bImg"]["type"]; // this is getting image type 
        $tmp_name = $_FILES["bImg"]["tmp_name"]; // this is temporally name is used to save/move file in our folder
        // let's explode image and get last extension of a user uploaded img file
        $img_explode = explode('.', $img_name); // this function used to help cut image name where dot (.) are used
        $img_ext = end($img_explode); // this function given last value of image
        $extension = ['png', 'jpeg', 'jpg' ,"svg"]; // there are some valid img extension which we allow user
    
        if(in_array($img_ext , $extension) === true){ // if usr uploaded img ext is matched with array extension
            // $time = time(); // this function  given curren time when user upload img
            $img = $img_name;
            if(move_uploaded_file($tmp_name , "../../../images/".$img)){ // if user uploaded img successfully
               
                  



                                        if($_POST["action"] == "insert"){
                                            // making invoice
    $q2=$conn->query("SELECT MAX(b_id) as last_inv FROM `banner`");
    if(mysqli_num_rows($q2) >0){

                   $last = mysqli_fetch_assoc($q2);
                 
                            function increment($matches)
                             {
                                   if(isset($matches[1]))
                                   {
                                      $length = strlen($matches[1]);
                                      return sprintf("%0".$length."d", ++$matches[1]);
                                   }    
                          }

                             $new_id = $last['last_inv'];

                       $new_id =  preg_replace_callback( "|(\d+)|", "increment", $new_id);
         
        }
                                            $q = $conn->query(" INSERT INTO `banner`(`b_id`, `u_id`, `cat_id`, `scat_id`,  `b_title`, `b_subtitle`, `b_desc`, `b_image`) VALUES('$new_id','$u_id','$cat_id' , '$scat_id' ,'$title','$subtile' , '$desc' , '$img');");
                                                    if ($q) {
                                                        $data = array(
                                                            "type" => "success",
                                                            "msg" => "your banner successfully insert"
                                                        );
                                                    } else {
                                                        $data = array(
                                                            "type" => "error",
                                                            "msg" => "Something Went wrong"
                                                        );
                                                    }
                                        }
                                        if($_POST["action"]=="update"){
                                           $sql = "UPDATE  `banner` SET `b_id` = '$b_id' ,`cat_id` = '$cat_id',`scat_id` = '$scat_id',`u_id` = '$u_id', `b_title` = '$title' , `b_subtitle` = '$subtile' , `b_desc` = '$desc' ,  `b_image` = '$img'  where b_id = '{$b_id}';";
                                            $q2=$conn->query($sql);
                                            if ($q2) {
                                                $data = array(
                                                    "type" => "success",
                                                    "msg" => "your products is updated"
                                                );
                                            } else {
                                                $data = array(
                                                    "type" => "error",
                                                    "msg" => "sorry update query failed"
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
        "type" => "success",
        "msg" => "All Filed Required"
    );
}
echo json_encode($data , true);
