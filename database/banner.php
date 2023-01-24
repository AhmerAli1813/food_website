<?php
    include 'conf.php';
    
    if($_POST["action"] == "ShwBanner"){
    $banner_output = '';
    $result = $conn -> query("SELECT * FROM `banner`");
    if(mysqli_num_rows($result)>0){
        
        while($banner_row = mysqli_fetch_assoc($result)){
            $banner_output .= '
             <div class="swiper-slide slide">
            <div class="content">
                <span>'.$banner_row['b_subtitle'].'</span>
                <h3>'.$banner_row['b_title'].'</h3>
                <p>'.$banner_row['b_desc'].'</p>
                <a href="category.php?banner_id='.$banner_row['b_id'].'" class="btn dpanel-btn" style="color:white;" >order now</a>
            </div>
            <div class="image">
                <img src="images/'.$banner_row['b_image'].'" alt="">
            </div>
        </div>
        ';
                };
            }else{
                $banner_output = "NO Record Found";
            }
            echo $banner_output;
        }      