<?php
include '../../../database/conf.php';
include "AdminLoginCheck.php";
// include "cash.php";
 $ps_id = (isset($_POST["psID"]) != "") ?  mysqli_real_escape_string($conn, $_POST["psID"]) : "";
 $scat_id=(isset($_POST["Scat_id"]) != "") ?  mysqli_real_escape_string($conn, $_POST["Scat_id"]) : "";
 $cat_id= mysqli_real_escape_string($conn, $_POST["Cat_id"]);
 $p_id= mysqli_real_escape_string($conn, $_POST["p_id"]);
 $prize= mysqli_real_escape_string($conn, $_POST["pPrize"]);
 $tax= mysqli_real_escape_string($conn, $_POST["pTax"]);
 $qty = mysqli_real_escape_string($conn, $_POST["pQty"]);
 $date = mysqli_real_escape_string($conn, $_POST["pDate"]);
 $s = mysqli_real_escape_string($conn, $_POST["pSts"]);

 if ($cat_id != ""  && $prize != "" && $qty != "" && $prize != "") {
    
    if($_POST["action"] == "insert"){
        // making invoice
    $q2=$conn->query("SELECT MAX(ps_id) as last_inv FROM `pro_stock`");
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
                $sql = "INSERT INTO `pro_stock`( `ps_id`, `cat_id`, `scat_id`, `pro_id`, `u_id`, `qty`, `prize`, `tax`, `date`, `status`) VALUES ('$new_id','$cat_id' , '$scat_id', '$p_id', '$u_id','$qty','$prize' , '$tax','$date' , '$s')";
        
       $q = $conn->query($sql);
                if ($q) {
                        //     $tPrize = $prize * $qty;
                        //     $desc = "first time insert function is used";

                        // cash_in($new_id , $tPrize , $desc);
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
        $sql = "UPDATE `pro_stock` SET `ps_id`='$ps_id',`cat_id`='$cat_id',`scat_id`='$scat_id',`pro_id`='$p_id',`u_id`='$u_id',`qty`='$qty',`prize`='$prize',`tax`='$tax',`date`='$date',`status`='$s' where ps_id = '$ps_id';";
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
    
   
} else {
    $data = array(
        "type" => "success",
        "msg" => "All Filed Required"
    );
}
echo json_encode($data , true);
