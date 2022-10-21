<?php
session_start();
include 'conf.php';
// error_reporting(0);
$output = '';
if ($_POST["action"] == "orderFormHtml") {
    if (isset($_SESSION["unique_id"])) {
        $unique_id = $_SESSION["unique_id"];
        $q = $conn->query("SELECT * FROM `register` WHERE `unique_id` = $unique_id");

        $user = mysqli_fetch_assoc($q);
    } else {
        $user["Name"] = '';
        $user["email"] = '';
    }
    $output = '<form action="">
                <div class="inputBox">
                <div class="input">
                <span>your name</span>
                        <input type="text" placeholder="enter your name" value="' . $user["Name"] . '">
                        </div>
                    <div class="input">
                        <span>your number</span>
                        <input type="number" placeholder="enter your number">
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>Enter your email</span>
                        <input type="email" placeholder="enter your email" value="' . $user["email"] . '">
                    </div>
                    <div class="input">
                        <span>your address</span>
                        <input type="text" placeholder="address" value="">
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                    <div class="mb-3">
                        <span>Select your category</span>
          <i class="fas fa-angle-down"></i>
          <select class="form-select form-select-lg" name="" id="">';
    $q2 = $conn->query("SELECT cat_name FROM `catagory`");

    while ($row2 = mysqli_fetch_assoc($q2)) {
        $output .= '<option value="' . $row2["cat_name"] . '">' . $row2["cat_name"] . '</option>';
    }
    $output .= '
           
          </select>
        </div>
    </div>
  
    <div class="input">
      <div class="mb-3">
          <span>Select Your Food</span>
          <i class="fas fa-angle-down"></i>
          <select class="form-select form-select-lg" name="" id="">';
    $q3 = $conn->query("SELECT `scat_name` FROM `sub_category`");
    while ($row3 = mysqli_fetch_assoc($q3)) {
        $output .= '<option value="' . $row3["scat_name"] . '">' . $row3["scat_name"] . '</option>';
    }

    $output .= '
          </select>
        </div>
    </div>
  
        </div>
        <div class="inputBox">
            <div class="input">
                <span>how musch</span>
                <input type="number" placeholder="how many orders">
            </div>
            <div class="input">
                <span>date and time</span>
                <input type="datetime-local" value="12-10-2022 9:10:55">
            </div>
        </div>
        

        <button role="button" class="mt-5 btn btn-success w-100"> order now</button>

        </form>';
        echo $output;
}
