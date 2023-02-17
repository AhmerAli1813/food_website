<?php
include '../../../database/conf.php';
include "AdminLoginCheck.php";
 $scat_id = (isset($_POST["scatID"]) != "") ?  mysqli_real_escape_string($conn, $_POST["scatID"]) : "";
 $title = mysqli_real_escape_string($conn, $_POST["scatName"]);
 $cat_id= mysqli_real_escape_string($conn, $_POST["Cat_id"]);
 
 if ($title != "" && $cat_id !="") {
    
    if($_POST["action"] == "insert"){
          // making invoice
    $q2=$conn->query("SELECT MAX(scat_id) as last_inv FROM `sub_category`");
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

                             $scat_id = $last['last_inv'];

                       $scat_id =  preg_replace_callback( "|(\d+)|", "increment", $scat_id);
                       $_SESSION["inv_id"] = $scat_id;
        }
        $q = $conn->query(" INSERT INTO `sub_category`( `scat_id` ,`cat_id`,`u_id`, `scat_name`)  VALUES('$scat_id', '$cat_id','$u_id','$title');");
                if ($q) {
                    $data = array(
                        "type" => "success",
                        "msg" => "your category successfully insert"
                    );
                } else {
                    $data = array(
                        "type" => "error",
                        "msg" => "Something Went wrong"
                    );
                }
    }
    if($_POST["action"]=="update"){
        $q2=$conn->query("UPDATE `sub_category` SET `cat_id`='$cat_id',`u_id`='$u_id',`scat_name`='$title' WHERE scat_id = '$scat_id';");
        if ($q2) {
            $data = array(
                "type" => "success",
                "msg" => "your  sub category is updated"
            );
        } else {
            $data = array(
                "type" => "error",
                "msg" => "sorry update query failed"
            );
        }
    }
   
} else {
    $data = array(
        "type" => "error",
        "msg" => "All Filed Required"
    );
}
echo json_encode($data , true);
