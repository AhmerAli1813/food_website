<?php 
include "../../../database/conf.php"; 
$sql = "SELECT * FROM `register` ";
if(isset($_POST['order'])){
      $column = $_POST['order']['columns'];
       $order = $_POST['order']['dirs'];
    echo $sql .= "ORDER BY `{$column}` {$order} ";
 }
else{
    $sql .= "ORDER BY role_id ASC  ";
};
$run_query=$conn->query($sql);
             
$run_query = $conn->query($sql);

$filtered_rows = mysqli_num_rows($run_query);
$sno = 0;
while($row = mysqli_fetch_assoc($run_query)){
    $sno++;
    $q2=$conn->query("SELECT * FROM `role` WHERE role_id = '{$row["role_id"]}' ");
    $row2=$q2->fetch_assoc();
    $subarray = array();
    $subarray[] = $sno;
    $subarray[] =   "<img src='../database/upload/{$row["image"]}' width='30px' style='border-radius:50%; ' alt='{$row["image"]}'>";
    $subarray[] = $row["Name"];
    $subarray[] = $row["email"];
    $subarray[] = $row2["role_name"];
    $subarray[] = $row["status"];
    $subarray[] = "<a href='javascript:void(0)' class='btn btn-sm mr-1 btn-info' id='UserEditBtn' data-id='{$row['u_id']}'>Edit</a><a href='' class='btn btn-sm btn-danger' data-id='{$row['u_id']}'>Delete</a>";
    $data[] = $subarray;
}
$col = [];
$col[] = '<th data-by="DESC" data-table-th="u_id">S no: <i class="fas fa-sort"></i></th>';
$col[] = '<th data-by="DESC" data-table-th="Image">Image <i class="fas fa-sort"></i></th>';
$col[] = '<th data-by="DESC" data-table-th="Name">Name <i class="fas fa-sort"></i></th>';
$col[] = '<th data-by="DESC" data-table-th="email">Email <i class="fas fa-sort"></i></th>';
$col[] = '<th data-by="DESC" data-table-th="role_id">Role <i class="fas fa-sort"></i></th>';
$col[] = '<th data-by="DESC" data-table-th="status">Status <i class="fas fa-sort"></i></th>';
$col[] = '<th >Action</th>';


$output = array(
    'row'=>$data,
     'col'=>$col,
    'recordsFiltered' =>$filtered_rows,
    
);            echo json_encode(["type"=>"success" , "data" =>$output] , true);

?>
