<?php
include '../../../database/conf.php';
include "AdminLoginCheck.php";
$cat_id = (isset($_POST["catID"]) != "") ?  mysqli_real_escape_string($conn, $_POST["catID"]) : "";
 $title = mysqli_real_escape_string($conn, $_POST["catName"]);
 
 
 if ($title != "" ) {
    
    if($_POST["action"] == "insert"){
        // making invoice
        $q2=$conn->query("SELECT MAX(cat_id) as last_inv FROM `catagory`");
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

                                 $invoice = $last['last_inv'];

                           $invoice =  preg_replace_callback( "|(\d+)|", "increment", $invoice);
                           $_SESSION["inv_id"] = $invoice;
            }
        $q = $conn->query(" INSERT INTO `catagory`( `cat_id` `u_id`, `cat_name`)  VALUES( '$invoice','$u_id','$title');");
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
        $q2=$conn->query("UPDATE  `catagory` SET  `cat_name` = '$title'   where cat_id = '{$cat_id}';");
        if ($q2) {
            $data = array(
                "type" => "success",
                "msg" => "your category is updated"
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
