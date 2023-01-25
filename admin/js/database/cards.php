<?php
include "../../../database/conf.php";
 $f = [];
$q = $conn->query("SELECT COUNT(*) as user FROM `register` ");
if($q){
        $row = mysqli_fetch_assoc($q);
        $res = [
            "name" => "all user",
            "result" => $row["user"]
        ];
        // array_push
      $f[] = $res;
}
$q2=$conn->query("SELECT COUNT(*) as pro FROM `product`");
if($q2){
    $row = mysqli_fetch_assoc($q2);
    $res = [
        "name" => "all products",
        "result" => $row["pro"]
    ];
    $f[] = $res;


}

echo "<pre>";
echo print_r($f);
echo "</pre>";
foreach ($f as $row){
    
echo "<pre>";
echo print_r($row["result"]);
echo "</pre>";
}
// echo json_encode(["data"=>$data] , true);


// $output.='<div class="col-xl-3 col-md-6 mb-4">
//     <div class="card border-left shadow h-100 py-2" style="--i:var(--bs-success)">
//         <div class="card-body">
//             <div class="row no-gutters align-items-center">
//                 <div class="col mr-2">
//                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
//                                 All User    
//                     </div>
//                     <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["user"].'</div>
//                 </div>
//                 <div class="col-auto">
//                     <i class="fas fa-dollar-sign fa-2x "></i>
//                 </div>
//             </div>
//         </div>
//     </div>
//   </div>';