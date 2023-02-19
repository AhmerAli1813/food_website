<?php
include "../../../database/conf.php"; 

$sql = "SELECT * FROM `product`  ";
$q = $conn->query($sql);
$count_all_rows = mysqli_num_rows($q);        

if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .="WHERE p_id LIKE '%{$search_value}%'";
    $sql .="OR cat_id LIKE '%{$search_value}%'";
    $sql .="OR scat_id LIKE '%{$search_value}%'";
    $sql .="OR p_title LIKE '%{$search_value}%'";
    $sql .="OR p_subtitle LIKE '%{$search_value}%'";
    $sql .="OR p_prize LIKE '%{$search_value}%'";
    $sql .="OR p_image LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    
}else{
    $search_value = "no Search";
};
if(isset ($_POST["find"] )){
    $id =  $_POST["find"];
 $sql .=" where p_id = '$id'  ";
 }
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
    $subarray[] = $row["p_id"];
    $subarray[] =   "<img src='../images/{$row["p_image"]}' width='30px' style='border-radius:50%; ' alt='{$row["p_image"]}'>";
    $subarray[] = $row["p_title"];
    $subarray[] = $row["p_subtitle"];
    $subarray[] = $row["p_prize"];
    $subarray[] = '<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" name="check" '.$checked.' >
    
                </div>
  ';
  $subarray[] = "<a  class='btn btn-sm mr-1 btn-info material-symbols-outlined' id='EditBtn' data-id='{$row['p_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger material-symbols-outlined' id='delBtn' data-id='{$row['p_id']}'>Delete</a>";
     $data[] = $subarray;
};
$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_id"> <b>id</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_image"><b>Images</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_title"><b>Title</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_subtitle"><b>Subtitle</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="p_prize"><b>Prize</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
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
