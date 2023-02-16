    <?php
include "../../../database/conf.php";
 $f = [];
 $output = "";
$q = $conn->query("SELECT COUNT(*) as user FROM `register` ");
if($q){
        $row = mysqli_fetch_assoc($q);
        $res = [
            "name" => "user",
            "result" => $row["user"],
            "color" => "var(--bs-danger)",
            "icons" => "fas fa-user",
            "table" => "users.php",
            "formModalId" => "#userInsertModal"
        ];
        // array_push
      $f[] = $res;
}
$q5=$conn->query("SELECT COUNT(*) as pro FROM `banner`");
if($q5){
    $row = mysqli_fetch_assoc($q5);
    $res = [
        "name" => "Banners",
        "result" => $row["pro"],
        "color" => "var(--bs-warning)",
        "icons" => "fas fa-images",
        "table" => "banners.php",
        "formModalId" => "#bannersInsertModal"
    ];
    $f[] = $res;


}
$q3=$conn->query("SELECT COUNT(*) as cat FROM `catagory` ");
if($q3){
    $row = mysqli_fetch_assoc($q3);
    $res = [
        "name" => "category",
        "result" => $row["cat"],
        "color" => "var(--first-color)",
        "icons" => "fas  fa-cookie",
        "table" => "cat.php",
        "formModalId" => "#categoryInsertModal"
    ];
    $f[] = $res;


}

$q4=$conn->query("SELECT COUNT(*) as scat FROM `sub_category` ");
if($q4){
    $row = mysqli_fetch_assoc($q4);
    $res = [
        "name" => "sub_Category",
        "result" => $row["scat"],
        "color" => "var(--bs-gray)",
        "icons" => "fas  fa-cookie-bite",
        "table" => "SubCat.php",
        "formModalId" => "#SubCategoryInsertModal"
    ];
    $f[] = $res;


}


$q2=$conn->query("SELECT COUNT(*) as pro FROM `product`");
if($q2){
    $row = mysqli_fetch_assoc($q2);
    $res = [
        "name" => "products",
        "result" => $row["pro"],
        "color" => "var(--bs-danger)",
        "icons" => "fas fa-shopping-basket",
        "table" => "products.php",
        "formModalId" => "#productsInsertModal"
    ];
    $f[] = $res;


}

$q7=$conn->query("SELECT COUNT(*) as pro FROM `product_purchase`");
if($q7){
    $row = mysqli_fetch_assoc($q7);
    $res = [
        "name" => "product Stock",
        "result" => $row["pro"],
        "color" => "var(--bs-orange)",
        "icons" => "fas fa-store",
        "table" => "prostock.php",
        "formModalId" => "#proPurInsertModal"
    ];
    $f[] = $res;


}
$q6=$conn->query("SELECT COUNT(*) as pro FROM `card`");
if($q6){
    $row = mysqli_fetch_assoc($q6);
    $res = [
        "name" => "product Selling ",
        "result" => $row["pro"],
        "color" => "var(--bs-success)",
        "icons" => "fas fa-cart-arrow-down",
        "table" => "proSell.php",
        "formModalId" => "#proSellInsertModal"
    ];
    $f[] = $res;


}

$q8=$conn->query("SELECT COUNT(*) FROM `card` GROUP BY inv_id");
if($q8){
    
    $row = mysqli_num_rows($q8);
    $res = [
        "name" => "Invoices",
        "result" => $row,
        "color" => "var(--bs-teal)",
        "icons" => "fas fa-file-invoice",
        "table" => "proinv.php",
        "formModalId" => "#InsertModal"
    ];
    $f[] = $res;


}


foreach ($f as $row){

$output.='<div  data-title="'.$row["name"].'" data-tbl="'.$row["table"].'" data-form-modal="'.$row["formModalId"].'" class="col-xl-3 col-md-6 mb-4 cards_box " style="cursor: pointer">
    <div class="card border-left shadow h-100 py-2" style="--i:'.$row["color"].'   ">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            '.$row["name"].'    
                            
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["result"].'</div>
                </div>
                <div class="col-auto">
                    <i class="'.$row["icons"].' fa-2x "></i>
                </div>
            </div>
        </div>
    </div>
  </div>';


}
echo json_encode(["type"=>"success" , "data" =>$output , ] , true);

