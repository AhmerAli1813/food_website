<?php 

session_start();
  

include 'conf.php';
    $output = '';
    $result = $conn -> query("SELECT * FROM `product`");
    if(mysqli_num_rows($result)>0){
        
        while($row = mysqli_fetch_assoc($result)){
            $output .= '
            <div class="box">
            
                <button role="button" class="'.$row['action'].' fa-heart" id="whitelist" name"heat"   ></button>
                <a href="category.php?cat_id='.$row['cat_id'].'" class="fas fa-eye" ></a>
                
                <input type="hidden" name="P_id" value='.$row["p_id"].'>
                <input type="hidden" name="Cat_id" value='.$row["cat_id"].'>
                <img src="images/'.$row['p_image'].'" alt="">
                <h3>'.$row['p_title'].'</h3>
                <h4 class="text-muted">'.$row['p_subtitle'].'</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>'.$row['p_prize'].'</span>
                <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="add_card" class="btn  btn-outline-success"><i class="fas fa-cart-arrow-down"></i></button>
                        <a href="category.php?pro_id='.$row['p_id'].'"  class="btn btn-outline-success">add to cart</a>
                        
                    </div>
                
            </div>';
        }
        echo $output;
    }else{
        echo $output = 'no record found ';
    };
    
    





    
    <?php 

session_start();
  

include 'conf.php';
    $output = '';
    $result = $conn -> query("SELECT * FROM `product`");
    if(mysqli_num_rows($result)>0){
        
        while($row = mysqli_fetch_assoc($result)){
            $output .= '
            <div class="box">
            
                <button role="button" class="'.$row['action'].' fa-heart" id="whitelist" name"heat"   ></button>
                <a href="category.php?cat_id='.$row['cat_id'].'" class="fas fa-eye" ></a>
                
                <input type="hidden" name="P_id" value='.$row["p_id"].'>
                <input type="hidden" name="Cat_id" value='.$row["cat_id"].'>
                <img src="images/'.$row['p_image'].'" alt="">
                <h3>'.$row['p_title'].'</h3>
                <h4 class="text-muted">'.$row['p_subtitle'].'</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>'.$row['p_prize'].'</span>
                <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="add_card" class="btn  btn-outline-success"><i class="fas fa-cart-arrow-down"></i></button>
                        <a href="category.php?pro_id='.$row['p_id'].'"  class="btn btn-outline-success">add to cart</a>
                        
                    </div>
                
            </div>';
        }
        echo $output;
    }else{
        echo $output = 'no record found ';
    };
    
    





    
    