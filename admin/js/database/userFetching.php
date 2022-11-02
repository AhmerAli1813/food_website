<?php
include '../../../database/conf.php';

$sql = "SELECT * FROM `register` ";
$q = $conn->query($sql);
$count_all_rows = mysqli_num_rows($q);        

if(isset($_POST['search']['value'])){
    $search_value = $_POST['search']['value'];
    $sql .="WHERE u_id LIKE '%{$search_value}%'";
    $sql .="OR unique_id LIKE '%{$search_value}%'";
    $sql .="OR Name LIKE '%{$search_value}%'";
    $sql .="OR email LIKE '%{$search_value}%'";
    $sql .="OR image LIKE '%{$search_value}%'";
    $sql .="OR status LIKE '%{$search_value}%'";
    $sql .="OR role_id LIKE '%{$search_value}%'";
};

if(isset($_POST['order'])){
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= "ORDER BY '{$column}''{$order} '";
}else{
    $sql .= "ORDER BY status ASC ";
};

if($_POST['length'] !=-1){
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .=" LIMIT {$start} , {$length}";
};
 
$data = array();
$run_query = $conn->query($sql);

$filtered_rows = mysqli_num_rows($run_query);
while($row = mysqli_fetch_assoc($run_query)){
    $q2=$conn->query("SELECT * FROM `role` WHERE role_id = '{$row["role_id"]}' ");
    $row2=$q2->fetch_assoc();
    $subarray = array();
    $subarray[] = $row["u_id"];
    $subarray[] =   "<img src='../database/upload/{$row["image"]}' width='30px' style='border-radius:50%; ' alt='{$row["image"]}'>";
    $subarray[] = $row["unique_id"];
    $subarray[] = $row["Name"];
    $subarray[] = $row["email"];
    $subarray[] = $row2["role_name"];
    $subarray[] = $row["status"];
    $subarray[] = "<a href='javascript:void(0)' class='btn btn-sm mr-1 btn-info' id='UserEditBtn' data-id='{$row['u_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger' data-id='{$row['u_id']}'>Delete</a>";
    $data[] = $subarray;
}
$output = array(
    'data'=>$data,
    'draw'=>intval($_POST['draw']),
    'recordsTotal'=> $count_all_rows,
    'recordsFiltered' =>$filtered_rows
);

echo json_encode($output);
