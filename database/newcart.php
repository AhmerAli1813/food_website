<?php
session_start();


if($_POST["Action"] == "add"){
    $outputTabel = "";
    $grandTotal = 0;
    if(!isset($_SESSION["cart"])){
        $isalreadyExited = 0;
        foreach($_SESSION["cart"] as $key => $item ){
            if($_SESSION["cart"][$key]["id"]){
                $isalreadyExited++;

                $_SESSION["cart"][$key]["qty"] = $_SESSION["cart"][$key]["qty"] + $_POST["qty"]; 

            }
        }
        if($isalreadyExited < 1){
                $itemArray = array(
                    "id" => $_POST["id"],
                    "image" => $_POST["image"],
                    "title" => $_POST["title"],
                    "prize" => $_POST["prize"],
                    "qty"   => $_POST["qty"]

                );
                $_SESSION["cart"][] = $itemArray;
        }

    }else{
        $itemArray = array(
            "id" => $_POST["id"],
            "image" => $_POST["image"],
            "title" => $_POST["title"],
            "prize" => $_POST["prize"],
            "qty"   => $_POST["qty"]

        );

        $_SESSION["cart"][] = $itemArray;
  
    }
    if(!empty($_SESSION["cart"])){
     $outputTabel = '<div class="table-responsive " id="cart_tabel">
     <table  class="table table-striped-columns
     ">
         <thead class="tabel-info bg-success ">
             <caption>Your cart Tabel</caption>
             
             <tr class="bg-success text-white">
                 <th>Sno:</th>
                 <th>image</th>
                 <th>title</th>
                 <th>qty</th>
                 <th>prize</th>
                 <th>Total prize</th>
                 <th>Action</th>
             </tr>
             </thead>';

             $sno = 1;
             foreach($_SESSION["cart"] as $key => $item){
                  $outputTabel.='<tbody>
                  <tr class="table-primary" >
                 
                 <td scope="row">'.$sno++.'</td>
                 <td scope="row"><img src="images/'.$item["image"].'" width="70px" height="70px" alt=""></td>
                 <td scope="row">'.$item["title"].'</td>
                 <td > '.$item["qty"].'  </td>
                 <td scope="row" id="prize'.$item["id"].'" data-prize="'.$item["prize"].'" >'.$item["prize"].'</td>
                 <td id="total_prize'.$item["id"].'">  '.$item["prize"] * $item["qty"] .'</td>
                 <td><button class="btn btn-danger">Delete</button></td>
                     </tr> ';
                     $grandTotal = $grandTotal + ($item["prize"] * $item["qty"]);
             }
           
     $outputTabel.='<t/tbody></table>';   
     $outputTabel.='<div class = "text-center" > <strong> GrandTotal :  '.$grandTotal.'</strong></div> ';

    }
    echo json_encode($outputTabel);
}
echo "<pre>";
echo print_r($itemArray);
echo"</pre>";
?>