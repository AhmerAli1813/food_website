<?php
include "conf.php";

        $q2=$conn->query("SELECT MAX(inv_id) as last_inv FROM `card`");
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

                    $app_id = $_POST["app_id"];
                    $prize = $_POST["inv_prize"];
                    $date = $_POST["date"];
                    $desc = $_POST["desc"];
                    $q= $conn->query("INSERT INTO `card`( `inv_id`, `app_id`, `date_discharge`, `amount_paid`, `description`) VALUES ('$invoice','$app_id','$date','$prize','$desc')");

                    if($q==true){
                    header("location:../appoint_acc.php?msg=success");
                    }else{
                        echo "serve is slow";
                    }
        }
else{
    header("location:../appoint_acc.php?msg=error:you already make this invoice");   
}