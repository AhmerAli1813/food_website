<?php 
session_start();
// session_unset();
if(isset($_POST["action"])){
    date_default_timezone_set('Asia/Karachi');
    $now = new DateTime();
 $time = $now->format('Y-m-d h:i:s');
    if($_POST["action"] == "add"){
        $id = $_POST["id"]."".$_POST["cash_type"];
        $data = [
            "cash_type" => $_POST["cash_type"],
            "id"=> $_POST["id"],
            "desc"=> $_POST["desc"],
            "cash in" => $_POST["cash_in"],
            "cash out" => $_POST["cash_out"],
            "refund" => $_POST["refund"],
            "date" => $time
        ];
            $_SESSION["money"][$id] = $data;
            echo json_encode(["type"=>"success" ,"msg"=> "add successfully"] ,true);
    }
    if ($_POST["action"] == "show") {
        $cash_in = 0;
        $cash_out = 0;
        $refund = 0;
        $output = '';
        if (isset($_SESSION["money"])) {
           $sno = 1;
           $data = array();
           foreach ($_SESSION["money"] as $key  => $item) {
              $cash_in += $cash_in + intval($item["cash in"]);
              $cash_in += $cash_out + intval($item["cash out"]);
              $refund += $refund + intval($item["cash in"]);
              
                    $sno++;
                    $subarray = array();
                    $subarray[] = $sno;
                    $subarray[] = $item["id"];
                    $subarray[] = $item["desc"];
                    $subarray[] = $item["cash in"];
                    $subarray[] = $item["cash out"];
                    $subarray[] = $item["refund"];
                    $subarray[] = $item["date"];
                    $data[] = $subarray;
                            
           }
           

$col = [];
$col[] = '<th  data-by="" data-table-th="id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="" data-table-th="inv_id"><b>invoices </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="" data-table-th=""><b>Desc</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="" data-table-th=""><b>cash in</b> <i class="fas  fa-sort float-end text-muted"></i></th>';

$col[] = '<th  data-by="" data-table-th=""><b>cash out</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="" data-table-th=""><b>refund</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
// $col[] = '<th  data-by="" data-table-th=""><b>Total Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="" data-table-th="date"><b>date</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
// $col[] = '<th  data-by="" data-table-th="status"><b>Status</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
// $col[] = '<th >Action</th>';

$output = array(
    'row'=>$data,
     'col'=>$col,
     'start'=>false,
     'length'=>false, 
    'recordsTotal'=> false,
    'recordsFiltered' =>false,
    "button" => true,
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);
        }       

}
}
