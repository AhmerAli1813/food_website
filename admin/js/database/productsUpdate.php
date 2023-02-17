<?php
include '../../../database/conf.php';
include "AdminLoginCheck.php";
 $p_id = (isset($_POST["pID"]) != "") ?  mysqli_real_escape_string($conn, $_POST["pID"]) : "";
 $title = mysqli_real_escape_string($conn, $_POST["pTitle"]);
 $subtile = mysqli_real_escape_string($conn, $_POST["pSubtitle"]);
 $prize= mysqli_real_escape_string($conn, $_POST["pPrize"]);
 $cat_id= mysqli_real_escape_string($conn, $_POST["Cat_id"]);
 $scat_id=(isset($_POST["Scat_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["Scat_id"]) : "";;
$desc= mysqli_real_escape_string($conn, $_POST["pDesc"]);

 if ($cat_id != ""  && $prize != "" && $title != "" && $subtile != "") {
    // making invoice
    $q2=$conn->query("SELECT MAX(p_id) as last_inv FROM `product`");
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

                             $newP_id = $last['last_inv'];

                       $newP_id =  preg_replace_callback( "|(\d+)|", "increment", $newP_id);
         
        }
    if(isset($_FILES["pImg"])){
        $img_name = $_FILES["pImg"]["name"];//this is getting image name 
        $img_type = $_FILES["pImg"]["type"]; // this is getting image type 
        $tmp_name = $_FILES["pImg"]["tmp_name"]; // this is temporally name is used to save/move file in our folder
        // let's explode image and get last extension of a user uploaded img file
        $img_explode = explode('.', $img_name); // this function used to help cut image name where dot (.) are used
        $img_ext = end($img_explode); // this function given last value of image
        $extension = ['png', 'jpeg', 'jpg' ,"svg"]; // there are some valid img extension which we allow user
    
        if(in_array($img_ext , $extension) === true){ // if usr uploaded img ext is matched with array extension
            // $time = time(); // this function  given curren time when user upload img
            $img = $img_name;
            if(move_uploaded_file($tmp_name , "../../../images/".$img)){ // if user uploaded img successfully
               
                  



                                        if($_POST["action"] == "insert"){
                                            $q = $conn->query("INSERT INTO `product`( `p_id` , `cat_id`, `scat_id`, `u_id`, `p_title`, `p_subtitle`, `p_desc`, `p_prize`, `p_image`) VALUES ('$newP_id','$cat_id ', '$scat_id' ,'$u_id','$title','$subtile' , '$desc','$prize' , '$img');");
                                                    if ($q) {
                                                        $data = array(
                                                            "type" => "success",
                                                            "msg" => "your product successfully insert"
                                                        );
                                                    } else {
                                                        $data = array(
                                                            "type" => "error",
                                                            "msg" => "Something Went wrong"
                                                        );
                                                    }
                                        }
                                        if($_POST["action"]=="update"){
                                            $p_id;
                                             $sql = "UPDATE  `product` SET  `cat_id` = '$cat_id',`scat_id` = '$scat_id',`u_id` = '$u_id', `p_title` = '$title' , `p_subtitle` = '$subtile' , `p_desc` = '$desc' , `p_prize` = '$prize' , `p_image` = '$img'  where p_id = '$p_id' ";
                                          
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
