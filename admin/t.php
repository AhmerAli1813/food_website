<?php 
session_start();
// session_unset();
// echo "<pre> " ; print_r($_SESSION["money"]); echo "</pre>";
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
    'recordsFiltered' =>false
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);
        }       

        ?>
        <div class="d" data-=""></div>