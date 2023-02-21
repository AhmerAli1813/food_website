<?php
include "conf.php";
$jsonFile[] = $_POST["json_file"];

foreach ($_POST["json_file"] as $key => $item) {
  if ($item == "catJson") {
    $q1 = $conn->query("SELECT * FROM `catagory`");

    while ($result1 = mysqli_fetch_assoc($q1)) {
      $catJson[] = $result1;
    }

    $encode_data = json_encode($catJson, JSON_PRETTY_PRINT);
    $filename = "Cat_Json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo " category file updated ";
    } else {
      echo "category file is not created";
    };
  } elseif ($item == "sctJson") {
    $q2 = $conn->query("SELECT * FROM `sub_category`");

    while ($result2 = mysqli_fetch_assoc($q2)) {
      $sctJson[] = $result2;
    }

    $encode_data = json_encode($sctJson, JSON_PRETTY_PRINT);
    $filename = "subCat_Json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo "sub_category file updated";
    } else {
      echo "sub_category file is not created";
    };
  } elseif ($item == "userJson") {
    $q3 = $conn->query("SELECT * FROM `register`");

    while ($result3 = mysqli_fetch_assoc($q3)) {
      $userJson[] = $result3;
    }

    $encode_data = json_encode($userJson, JSON_PRETTY_PRINT);
    $filename = "user_json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo "user file updated";;
    } else {
      echo "user file is not created";
    };
  } elseif ($item == "bannerJson") {
    $q4 = $conn->query("SELECT * FROM `banner`");

    while ($result4 = mysqli_fetch_assoc($q4)) {
      $bannerJson[] = $result4;
    }

    $encode_data = json_encode($bannerJson, JSON_PRETTY_PRINT);
    $filename = "ban_json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo "banner file updated";
    } else {
      echo "banner file is not created";
    };
  } elseif ($item == "productJson") {
    $q5 = $conn->query("SELECT * FROM `product`");

    while ($result5 = mysqli_fetch_assoc($q5)) {
      $productJson[] = $result5;
    }

    $encode_data = json_encode($productJson, JSON_PRETTY_PRINT);
    $filename = "product_json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo "product file updated";
    } else {
      echo "product file is not created";
    };
  }
   elseif ($item == "cartJson") {
    $q6 = $conn->query("SELECT * FROM `card`");

    while ($result6 = mysqli_fetch_assoc($q6)) {
      $cartJson2[] = $result6;
    }

    $encode_data = json_encode($cartJson2, JSON_PRETTY_PRINT);
    $filename = "cart_json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo " card  file updated ";
    } else {
      echo "card file is not created";
    };
  } 
   elseif ($item == "stock") {
    $q7 = $conn->query("SELECT * FROM `pro_stock` ");

    while ($result7 = mysqli_fetch_assoc($q7)) {
      $cartJson7[] = $result7;
    }

    $encode_data = json_encode($cartJson7, JSON_PRETTY_PRINT);
    $filename = "pro_stock_json_file.json";
    if (file_put_contents("js/json/{$filename}", $encode_data)) {
      echo " stock file updated ";
    } else {
      echo "stock file is not created";
    };
  } 
  else {
    break;
    die();
  };
} // foreach bracket 
