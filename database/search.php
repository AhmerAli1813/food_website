<?php
include 'conf.php';
if ($_POST["action"] == "search_term") {
    $searchTerm = $_POST["data"];
    $q = $conn->query("SELECT p_title ,p_subtitle   FROM `product` WHERE  p_title LIKE '%{$searchTerm}%' or p_subtitle LIKE '%{$searchTerm}%'  ");
    $output = "<ul>";
    if (mysqli_num_rows($q) > 0) {
        
        while ($result =mysqli_fetch_assoc($q)) {
            
                $output .= "<li>{$result["p_title"]}</li><li>{$result["p_subtitle"]}</li>";
            

        }
    } else {
        $output .= "<li>No Record found</li>";
    }
    $output .= "</ul>";
    echo $output;
}
if ($_POST["action"] == "search") {
    $searchTerm = $_POST["data"];
    $output = '';
    $limit_per_page  = 1;
    $page = "";
    if (isset($_POST["page_no"])) {
        $page = $_POST["page_no"];
    } else {
        $page = 1;
    };
    $offset = ($page - 1) * $limit_per_page;
    $result = $conn->query("SELECT * FROM `product`  WHERE    p_title LIKE '%{$searchTerm}%' or p_subtitle LIKE '%{$searchTerm}%' or p_desc LIKE '%{$searchTerm}%' LIMIT {$offset} , {$limit_per_page}");
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
        
        <div  class="col-12 col-sm-6 col-md-4 box">
            <button  role="button" class="' . $row['action'] . ' fa-heart"  name"heat"  ></button>
            <a href="category.php?cat_id=' . $row['cat_id'] . '" class="fas fa-eye" ></a>
            
           
            <input type="hidden" id="image' . $row["p_id"] . '" value=' . $row["p_image"] . '>
            <input type="hidden" id="title' . $row["p_id"] . '" value="' . $row["p_title"] . '">
            <input type="hidden" id="prize' . $row["p_id"] . '" value=' . $row["p_prize"] . '>
           
            
            <img src="images/' . $row['p_image'] . '" alt="">
            <h3>' . $row['p_title'] . '</h3>
            <h4 class="text-muted">' . $row['p_subtitle'] . '</h4>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="d-flex"> <button class="btn  "  data-id="' . $row["p_id"] . '" id="up_val"><i class="fas fa-angle-up"></i></button><input  type="text" id="qty_input' . $row["p_id"] . '" min="0" max="5" name=""  class="text-center " disabled  value="1"> <button data-id="' . $row["p_id"] . '" id="down_val" class="btn "><i class="fas fa-angle-down"></i></button> </div> 
            <span>PKR ' . $row['p_prize'] . '</span> <br>
            <div class="btn-group" role="group" aria-label="Basic example">
                    <button role="button"  type="button"  class=" btn  btn-outline-success cart_show"><i class="fas fa-cart-arrow-down"></i></button>
                    <button role="button" id="CartBtn" data-id="' . $row["p_id"] . '" data-msgId="#search_msg"  class="btn btn-outline-success">add to cart</button>
                    
                </div>
            
        </div>';
        };
        $q2 = $conn->query("SELECT * FROM `product`  WHERE   p_title LIKE '%{$searchTerm}%' or p_subtitle LIKE '%{$searchTerm}%'");;
        $total_record = mysqli_num_rows($q2);
        $total_page = ceil($total_record / $limit_per_page);
        $output .= '<nav aria-label="Page navigation example my-5" class="d-flex justify-content-center mt-5" style="cursor: pointer; font-size:1.5rem;" >
        <ul class="pagination">';
        if ($page > 1) {
            $output .= '<li class="page-item"><a class="page-link" id="SearchPagination" data-id="' . ($page - 1) . '">Previous</a></li>';
        };
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $page) {
                $className = "active";
            } else {
                $className = "";
            }
            $output .= '<li class="page-item  ' . $className . '"><a class="page-link " id="SearchPagination" data-id="' . $i . '">' . $i . '</a></li>';
        };
        if ($total_page > $page) {

            $output .= '<li class="page-item"><a class="page-link" id="SearchPagination" data-id="' . ($page + 1) . '">Next</a></li>';
        }
        $output .= '</ul>
                </nav>';
        echo $output;
    } else {
        echo $output = 'no record found ';
    }
}
