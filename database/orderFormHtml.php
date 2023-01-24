<?php
session_start();
include 'conf.php';
// error_reporting(0);
$output = '';
if ($_POST["action"] == "orderFormHtml") {
        if (isset($_SESSION["unique_id"])) {
            $unique_id = $_SESSION["unique_id"];
            $q = $conn->query("SELECT * FROM `register` WHERE `unique_id` = $unique_id");
                $disabled = "disabled";
                $user = mysqli_fetch_assoc($q);
            } else {
            $disabled = "";
            $user["Name"] = '';
            $user["email"] = '';
        }
        $output = '<div id="order_response"></div><form action="" id="orderForm">
                        <div class="inputBox d-none" id="user_password">
                        <div class="input w-100">
                        <span>your password</span>
                        <span><i class="fas fa-eye"></i></span>
                                <input type="text" name="password" placeholder="enter your password" value="">
                                </div>
                            
                        </div>
                    <div class="inputBox">
                    <div class="input">
                    <span>your name</span>
                            <input type="text" name="name" '.$disabled.' placeholder="enter your name" value="' . $user["Name"] . '">
                            </div>
                        <div class="input">
                            <span>your number</span>
                            <input type="text" name="number" placeholder="enter your number">
                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="input">
                            <span>Enter your email</span>
                            <input type="email" name="email" '.$disabled.' placeholder="enter your email" value="' . $user["email"] . '">
                        </div>
                        <div class="input">
                            <span>your address</span>
                            <input type="text" name="address" placeholder="address" value="">
                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="input">
                        <div class="mb-3">
                            <span>Select your category</span>
            <i class="fas fa-angle-down"></i>
            <select  class="form-select form-select-lg"  name="category" id="catVal" onchange="cat_value()"><option value="no"> category</option>';
        $q2 = $conn->query("SELECT * FROM `catagory`");

        while ($row2 = mysqli_fetch_assoc($q2)) {
            
            $output .= '<option value="' . $row2["cat_id"] . '">' . $row2["cat_name"] . '</option>';
        }
        $output .= '
            
            </select>
            </div>
            </div>
        
            <div class="input">
            <div class="mb-3">
                <span>Select Your Food</span>
                <i class="fas fa-angle-down"></i>
                
                <select class="form-select form-select-lg" disabled name="p_id"  id="product_val"> <option>select</option>';


        $output .= '
            </select>
            </div>
            </div>
    
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>how much</span>
                    <input type="number" name="qty" placeholder="how many orders">
                </div>
                <div class="input">
                    <span>date and time</span>
                    <input type="datetime-local" name="date" value="' . date("d-m-y") . '">
                </div>
            </div>
            

            <button role="submit" name="order_btn" id="orderBtn" class="mt-5 btn dpanel-btn w-100" style="color:white;""> order now</button>

            </form>';
        echo $output;

    }
?>