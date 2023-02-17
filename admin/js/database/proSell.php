<?php
include "../../../database/conf.php"; 
$id = "";
$sql = "SELECT cd.cr_id as 'id', cd.inv_id,cd.qty ,cd.prize,cd.tax,cd.date,cd.status,p.p_title as title,p.p_image as img FROM `card` as cd left JOIN product as p on cd.pro_id = p.p_id  ";
$q = $conn->query($sql);

$count_all_rows = mysqli_num_rows($q);        
if(isset ($_POST["find"] )){
   $id =  $_POST["find"];
$sql .=" where inv_id = '$id'";
}
if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .="where cd.pro_id LIKE '%{$search_value}%'";
    $sql .="OR p.p_title LIKE '%{$search_value}%'";
    $sql .="OR cd.inv_id LIKE '%{$search_value}%'";
    $sql .="OR cd.prize LIKE '%{$search_value}%'";
    $sql .="OR p.p_image LIKE '%{$search_value}%'";
    $sql .="OR cd.status LIKE '%{$search_value}%'";
    
}else{
    $search_value = "no Search";
};

if(isset($_POST['order'])){
    $column = $_POST['order']['columns'];
     $order = $_POST['order']['dirs'];
   $sql .= "ORDER BY `{$column}` {$order} ";
}
else{
  $sql .= "ORDER BY cd.inv_id ASC  ";
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
    $sql .=" LIMIT {$offset} , {$limit_per_page}";
}

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
    $subarray[] = "<a id='find_id' data-url='js/database/proSell.php' data-inv-id ='{$row["inv_id"]}' data-id ='{$row["inv_id"]}'>{$row["inv_id"]}</a>";
    $subarray[] =   "<img src='../images/{$row["img"]}' width='30px' style='border-radius:50%; ' alt='{$row["img"]}'>";
    $subarray[] = $row["title"];
    $subarray[] = $row["qty"];
    $subarray[] = $row["prize"];
    $subarray[] = $row["tax"] ."%";
    $subarray[] = $row["date"];
    $subarray[] = "<a  class='btn btn-sm mr-1 {$class}' '>{$row["status"]}</a>";
  
     $data[] = $subarray;
};
$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="cr_id"> <b>S No</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="inv_id"><b>invoices </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_image"><b>Images</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_title"><b>Title</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="qty"><b>qty</b> <i class="fas  fa-sort float-end text-muted"></i></th>';

$col[] = '<th  data-by="'.$order.'" data-table-th="prize"><b>Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="tax"><b>tax</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="date"><b>date</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="status"><b>Status</b> <i class="fas  fa-sort float-end text-muted"></i></th>';


$output = array(
    'row'=>$data,
     'col'=>$col,
     'start'=>$start,
     'q'=>$sql,
     'length'=>$limit_per_page, 
    'recordsTotal'=> $count_all_rows,
    'recordsFiltered' =>$filtered_rows
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);

?>
