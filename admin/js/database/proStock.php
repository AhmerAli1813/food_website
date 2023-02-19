<?php
include "../../../database/conf.php"; 

$sql = "SELECT ps_id,cat_id,scat_id, pro_id , u_id, SUM(qty) as qty ,prize ,tax , (tax/100 * SUM(qty * prize)) + SUM(qty * prize)  as TPrize ,date ,status  FROM `pro_stock`  ";
$q = $conn->query($sql);
$count_all_rows = mysqli_num_rows($q);        

if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .="WHERE ps_id LIKE '%{$search_value}%'";
    $sql .="OR pro_id LIKE '%{$search_value}%'";
    $sql .="OR cat_id LIKE '%{$search_value}%'";
    $sql .="OR scat_id LIKE '%{$search_value}%'";
    $sql .="OR u_id LIKE '%{$search_value}%'";
    $sql .="OR qty LIKE '%{$search_value}%'";
    $sql .="OR prize LIKE '%{$search_value}%'";
    $sql .="OR date LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    
}else{
    $search_value = "no Search";
};
if(isset ($_POST["find"] )){
    $id =  $_POST["find"];
 $sql .=" where ps_id = '$id'  ";
 }
 $sql.=" GROUP BY pro_id ";
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
    $sql .=" LIMIT {$offset} , {$limit_per_page}";
}

$data = array();
$run_query = $conn->query($sql);

$filtered_rows = mysqli_num_rows($run_query);
$sno = 0;
while($row = mysqli_fetch_assoc($run_query)){
    if($row["status"]=="show"){
            $checked = "checked";
    }else{
        $checked = "";
    };
    $sno++;
    $subarray = array();
    $subarray[] = $sno;
    // $subarray[] =   "<img src='../images/{$row["p_image"]}' width='30px' style='border-radius:50%; ' alt='{$row["p_image"]}'>";
    $subarray[] = "<a id='find_id' data-url='js/database/proStock.php'  data-id='{$row["ps_id"]}'>{$row["ps_id"]}</a>";
    $subarray[] = "<a id='find_id' data-url='js/database/products.php'  data-id='{$row["pro_id"]}'>{$row["pro_id"]}</a>";
    $subarray[] = "<a id='find_id' data-url='js/database/cat.php'  data-id='{$row["cat_id"]}'>{$row["cat_id"]}</a>";
    $subarray[] = "<a id='find_id' data-url='js/database/Subcat.php'  data-id='{$row["scat_id"]}'>{$row["scat_id"]}</a>";
    $subarray[] = "<a id='find_id' data-url='js/database/users.php'  data-id='{$row["u_id"]}'>{$row["u_id"]}</a>";
    $subarray[] = $row["qty"];
    $subarray[] = $row["prize"];
    $subarray[] = $row["tax"];
    $subarray[] = $row["TPrize"];
    $subarray[] = $row["date"];
    $subarray[] = '<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" name="check" '.$checked.' >
    
                </div>
  ';
  $subarray[] = "<a  class='btn btn-sm mr-1 btn-info material-symbols-outlined' id='EditBtn' data-id='{$row['ps_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger material-symbols-outlined' id='delBtn' data-id='{$row['ps_id']}'>Delete</a>";
     $data[] = $subarray;
};
$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="pp_id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="ps_id"> <b>Invoice</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="pro_id"> <b>product </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="cat_id"><b>category </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="scat_id"><b>sub Category </b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="u_id"><b>user</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="qty"><b>Total qty</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="prize"><b>Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="tax"><b>tax</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="prize"><b>Total Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="date"><b>date</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
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
