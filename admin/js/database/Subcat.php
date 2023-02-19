<?php
include "../../../database/conf.php"; 

$sql = "SELECT sc.scat_id ,sc.cat_id,sc.scat_name,sc.status,c.cat_name FROM `sub_category` as sc LEFT JOIN catagory as c ON sc.cat_id = c.cat_id ";
$q = $conn->query($sql);
 $count_all_rows = mysqli_num_rows($q);        
if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .="WHERE scat_id LIKE '%{$search_value}%'";
    $sql .="OR cat_id LIKE '%{$search_value}%'";
    $sql .="OR scat_name LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    
}else{
    $search_value = "no Search";
};
if(isset ($_POST["find"] )){
    $id =  $_POST["find"];
 $sql .=" where scat_id = '$id'  ";
 }
if(isset($_POST['order'])){
    $column = $_POST['order']['columns'];
     $order = $_POST['order']['dirs'];
   $sql .= "ORDER BY `{$column}` {$order} ";
}
else{
  $sql .= "ORDER BY cat_id  ASC  ";
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
// echo $sql; die();
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
    $subarray[] = $row["scat_id"];
    $subarray[] = $row["cat_name"];
    $subarray[] = $row["scat_name"];
    $subarray[] = '<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" name="check" '.$checked.' value="'.$row["status"].'">
    
                </div>
  ';
  $subarray[] = "<a  class='btn btn-sm mr-1 btn-info material-symbols-outlined' id='EditBtn' data-id='{$row['scat_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger material-symbols-outlined' id='delBtn' data-id='{$row['scat_id']}'>Delete</a>";
     $data[] = $subarray;
};
$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="scat_id"> <b>id</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="cat_id"><b>Category Name</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="scat_name"><b>Sub Category Name</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
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
