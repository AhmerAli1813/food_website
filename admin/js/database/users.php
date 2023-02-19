<?php
include "../../../database/conf.php"; 

$sql = "SELECT * FROM `register` ";
$q = $conn->query($sql);
$count_all_rows = mysqli_num_rows($q);        

if(isset($_POST['search'])){
    $search_value = $_POST['search'];
    $sql .="WHERE u_id LIKE '%{$search_value}%'";
    $sql .="OR unique_id LIKE '%{$search_value}%'";
    $sql .="OR Name LIKE '%{$search_value}%'";
    $sql .="OR email LIKE '%{$search_value}%'";
    $sql .="OR image LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    
}else{
    $search_value = "no Search";
};
if(isset ($_POST["find"] )){
    $id =  $_POST["find"];
 $sql .=" where unique_id = '$id'  ";
 }
if(isset($_POST['order'])){
    $column = $_POST['order']['columns'];
     $order = $_POST['order']['dirs'];
   $sql .= "ORDER BY `{$column}` {$order} ";
}
else{
  $sql .= "ORDER BY role_id ASC  ";
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
        
            $status = '<i class="material-symbols-outlined">
                            '.$row["status"].'
                            </i>';
        
    $sno++;
    $q2=$conn->query("SELECT * FROM `role` WHERE role_id = '{$row["role_id"]}' ");
    $row2=$q2->fetch_assoc();
    $subarray = array();
    $subarray[] = $sno;
    $subarray[] =   "<img src='../database/upload/{$row["image"]}' width='30px' style='border-radius:50%; ' alt='{$row["image"]}'>";
    $subarray[] = $row["Name"];
    $subarray[] = $row["email"];
    $subarray[] = $row2["role_name"];
    $subarray[] = $status;
    $subarray[] = "<a  class='btn btn-sm mr-1 btn-info material-symbols-outlined' id='EditBtn' data-form='userEditForm' data-id='{$row['u_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger material-symbols-outlined' id='delBtn' data-id='{$row['u_id']}'>Delete</a>";
    $data[] = $subarray;
}


$col = [];
$col[] = '<th  data-by="'.$order.'" data-table-th="id"> <b>#</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="unique_id"> <b>id</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="Image"><b>Images</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="Name"><b>Name</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="email"><b>Email</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="role_id"><b>Role</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th  data-by="'.$order.'" data-table-th="status"><b>Status</b> <i class="fas  fa-sort float-end text-muted"></i></th>';
$col[] = '<th >Action</th>';


$output = array(
    'row'=>$data,
     'col'=>$col,
     'start'=>$start,
     'length'=>$limit_per_page, 
    'recordsTotal'=> $count_all_rows,
    'recordsFiltered' =>$filtered_rows,
    
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);

?>
