<?php 
session_start();    
    if( isset( $_GET["cart_shop"])){
        $output = '';
        if(isset($_SESSION["cart"])){
            $sno = 1;
            foreach($_SESSION["cart"] as $id => $item){
                 $output.='<tr class="table-primary" >
                
                <td scope="row">'.$sno++.'</td>
                <td scope="row"><img src="images/'.$item["image"].'" width="70px" height="70px" alt=""></td>
                <td scope="row">'.$item["title"].'</td>
                <td class="d-flex"> <button class="btn btn-secondary "  data-id="'.$item["id"].'" id="up_val"><i class="fas fa-caret-up"></i></button><input  type="text" id="qty_input'.$item["id"].'" min="0" max="5" name=""  class="" disabled style="width: 70px;" value="1"> <button data-id="'.$item["id"].'" id="down_val" class="btn btn-secondary"><i class="fas fa-caret-down"></i></button> </td>
                <td scope="row" id="prize'.$item["id"].'" data-prize="'.$item["prize"].'" >'.$item["prize"].'</td>
                <td id="total_prize'.$item["id"].'">  '.$item["prize"].'</td>
                <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
            ';
            }
        }
        echo $output;
     }
?>