<?php
session_start();
include 'conf.php';


$user_html = "";
if (isset($_SESSION["unique_id"])) {
    $unique_id =    $_SESSION["unique_id"];
    $result = mysqli_query($conn, "SELECT * FROM `register` WHERE unique_id =  $unique_id ");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_html = '
                <div class="dropdown">
                <button class="btn  dropdown-toggle" style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                <img id="user_img" class="card-img" src="database/upload/' . $row["image"] . '" onclick="" alt="fas fa-user-alt">
                        </button>
                <div class="dropdown-menu" style="transform: translate(-27%, 35%) !important;" aria-labelledby="triggerId">
                    <div class="card m-auto" style="width: 200px; ">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <img id="user_img" class="card-img" src="database/upload/' . $row["image"] . '" onclick="user_data_active()" alt="fas fa-user-alt">
                        </div>
                        <div class="card-body">
                            <div class="card-text ">' . $row["Name"] . '</div>
                            <p class="card-text text-muted">' . $row["status"] . '  </p>
                        </div>
                        <div class="card-footer text-muted">
                            <button   onclick="logout()" role="button" style="cursor: pointer;" class=" btn  btn-sm w-100 text-capitalize  " onclick="logout()">sign Out </button>
                        </div>
                    </div>
                </div>
            </div>

                    ';
    }
} else {
    $user_html = "   <a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";
}
echo $user_html;