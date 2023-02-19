<?php
include "../../../database/conf.php"; 

$sql = "SELECT  inv_id, COUNT(*) as item ,sum(qty) as TQty , tax, sum(qty * prize) as Prize , tax/100 * (sum(qty * prize)) + sum(qty * prize) as TPrize , date, status  FROM card   ";
$q = $conn->query($sql);
$count_all_rows = mysqli_num_rows($q);        

if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .=" where inv_id LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    $sql .="OR status date '%{$search_value}%'";
    
    
}else{
    $search_value = "no Search";
};
if(isset ($_POST["find"] )){
    $id =  $_POST["find"];
 $sql .=" where inv_id = '$id'  ";
 }
$sql.=" GROUP BY inv_id ";
// echo $sql;
if(isset($_POST['order'])){
    $column = $_POST['order']['columns'];
     $order = $_POST['order']['dirs'];
   $sql .= "ORDER BY `{$column}` {$order} ";
}
else{
  $sql .= "ORDER BY status ASC  ";
        $order = "ASC";
};

if(isset($_POST["Limit_per_page"])){
    $limit_per_page = $_POST["Limit_per_page"];
}else{  
    $limit_per_page = 10;
}


if(isset($_POST["start"])){
    if($_POST['start'] !=-1){
        $start = $_POST['start'];
        $limit_per_page = $_POST['length'];
        $sql .=" LIMIT {$start} , {$limit_per_page}";
    }
}else{
    $start = 1;
    $offset = ($start - 1) * $limit_per_page;
    $sql .=" LIMIT {$offset} , {$limit_per_page}  ";
}
// echo $sql;
$data = array();
$run_query = $conn->query($sql);

$filtered_rows = mysqli_num_rows($run_query);
$sno = 0;
while($row = mysqli_fetch_assoc($run_query)){
    if($row["status"]=="pending"){
            $class = "btn-danger";
    }else{
        $class = "btn-success";
    };
    $sno++;
    $subarray = array();
    $subarray[] = $sno;
    $subarray[] = "<a id='find_id' data-url='js/database/proSell.php' data-id ='{$row["inv_id"]}' data-inv-id ='{$row["inv_id"]}'>{$row["inv_id"]}</a>";
    $subarray[] = $row["item"];
    $subarray[] = $row["TQty"];
    $subarray[] = $row["tax"] ."%";
    $subarray[] = $row["Prize"];
    $subarray[] = $row["TPrize"];
    $subarray[] = $row["date"];
    $subarray[] = "<a  class='btn btn-sm mr-1 {$class}' '>{$row["status"]}</a>";
  $subarray[] = "<a  class='btn btn-sm mr-1 btn-info material-symbols-outlined' id='EditBtn' data-id='{$row['inv_id']}'>edit</a>";
     $data[] = $subarray;
};
$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="inv_id"><b>invoices </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th=""><b>Item</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th=""><b>Total Qnty</b> <i class="fas  fa-sort float-end text-muted"></i></th>';

$col[] = '<th  data-by="'.$order.'" data-table-th=""><b>tax</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th=""><b>Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th=""><b>Total Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="date"><b>date</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="status"><b>Status</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th >Action</th>';

$output = array(
    'row'=>$data,
     'col'=>$col,
     'start'=>$start,
     'length'=>$limit_per_page, 
    'recordsTotal'=> $count_all_rows,
    'recordsFiltered' =>$filtered_rows
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);

?>
