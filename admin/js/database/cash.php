<?php

function cash_in($id ,$amt , $desc){
    include "../../../database/conf.php"; 
    date_default_timezone_set('Asia/Karachi');
    $now = new DateTime();
 $time = $now->format('Y-m-d h:i:s');

$q=$conn->query("INSERT INTO `cash`( `cash-in`,  `inv_id`, `desc`, `date`) VALUES($amt , '$id' , '$desc','$time')") or die(" cash_in failed");
  
}
function cash_out($id ,$amt , $desc){
    include '../../../database/conf.php';
    date_default_timezone_set('Asia/Karachi');
    $now = new DateTime();
 $time = $now->format('Y-m-d h:i:s');

$q=$conn->query("INSERT INTO `cash`( `cash-out`,  `inv_id`, `desc`, `date`) VALUES($amt , '$id' , '$desc','$time')") or die(" cash_out failed");
    
}
function adjustment($id ,$amt , $desc ){
    include '../../../database/conf.php';
    date_default_timezone_set('Asia/Karachi');
    $now = new DateTime();
 $time = $now->format('Y-m-d h:i:s');

    $q = $conn->query("UPDATE `cash` SET `adjustments`='$amt'`desc`='$desc',`date`='$time' WHERE inv_id = '$id'") or  die(" adjustment entry failed");
};