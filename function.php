<?php 
session_start();

function headers(){

    include 'database/conf.php';
    
    error_reporting(0);
    $user_html = "";
    if(isset($_SESSION["unique_id"])){
    $unique_id =    $_SESSION["unique_id"];
       $result = mysqli_query($conn , "SELECT * FROM `register` WHERE unique_id =  $unique_id ");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
                    $user_html = '
                    <div class="dropdown">
                    <button class="btn  dropdown-toggle" style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                    <img id="user_img" class="card-img" src="database/upload/'.$row["image"].'" onclick="user_data_active()" alt="fas fa-user-alt">
                            </button>
                    <div class="dropdown-menu" style="transform: translate(-27%, 35%) !important;" aria-labelledby="triggerId">
                        <div class="card m-auto" style="width: 200px; ">
                            <div class="card-header d-flex justify-content-center align-items-center">
                                <img id="user_img" class="card-img" src="database/upload/'.$row["image"].'" onclick="user_data_active()" alt="fas fa-user-alt">
                            </div>
                            <div class="card-body">
                                <div class="card-text ">'.$row["Name"].'</div>
                                <p class="card-text text-muted">'.$row["status"].'  </p>
                            </div>
                            <div class="card-footer text-muted">
                                <button   onclick="logout()" role="button" style="cursor: pointer;" class=" btn  btn-sm w-100 text-capitalize  " onclick="logout()">sign Out </button>
                            </div>
                        </div>
                    </div>
                </div>

                        ';
        }
    }else{
            $user_html = "   <a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";        
    }
    echo ' 
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Complete Responsive Food Website Design Tutorial</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        
        <!-- custom css file link  -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/partials/_global.css">
    <link rel="stylesheet" href="css/partials/_variables.css">
    <link rel="stylesheet" href="css/login.css">
    

        
    <!-- header section starts      -->
        </head>
        <body>
    <header class="d-flex">
    
        <a href="#" class="logo"><i class="fas fa-utensils"></i>resto.</a>
    
        <nav class="navbar">
            <a class="active" href="#home">home</a>
            <a href="#dishes">dishes</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#order">order</a>
                 </nav>
    
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-heart"> </a>
            <a  id="CartCount" class="fas fa-shopping-cart cart_show"></a>
            
        </div>
    <div class="user">'.$user_html.'</div>
        
    </div>
    </header>
    
    <!-- header section ends-->
    
    <!-- search form  -->
    
    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    ';
 };
function banners(){
    
    
    include 'database/conf.php';
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
                <a href="category.php?banner_id='.$banner_row['b_id'].'" class="btn btn-outline-success">order now</a>
            </div>
            <div class="image">
                <img src="images/'.$banner_row['b_image'].'" alt="">
            </div>
        </div>
        ';
                };
            }else{
                $banner_output = "no recod";
            }
            echo ' <!-- home section starts  -->

            <section class="home" id="home">
            
                <div class="swiper-container home-slider " style="overflow-x:hidden ;">
            
                    <div class="swiper-wrapper wrapper" >
            
            '.$banner_output.'
                    </div>
            
                    <div class="swiper-pagination"></div>
            
                </div>
            
            </section>
            
            <!-- home section ends -->
            ';
};
function loadtabel(){
    echo '<div class="container mt-5">
    <div class="table-responsive " id="cart_tabel">
        <table  class="table table-striped-columns
        ">
            <thead class="tabel-info bg-success ">
                <caption>Your cart Tabel</caption>
                
                <tr class="bg-success text-white">
                    <th>Sno:</th>
                    <th>image</th>
                    <th>title</th>
                    <th>qty</th>
                    <th>prize</th>
                    <th>Total prize</th>
                    <th><button class="btn btn-danger" id="delete_all"> Delete All</button> </th>
                </tr>
                </thead>
                <tbody class="" id="cart_data_show">
                    
                </tbody>
         </table>
    </div>
    
    </div>';
}
function dishes(){
    
    include 'database/conf.php';
    
    $output = '';
    $result = $conn -> query("SELECT * FROM `product`");
    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
            $output .= '
            
            <div  class=" col-12 col-sm-6 col-md-4 box">
                <button  role="button" class="'.$row['action'].' fa-heart" onclick="add_to_whitelist_btn()" name"heat"  ></button>
                <a href="category.php?cat_id='.$row['cat_id'].'" class="fas fa-eye" ></a>
                
               
                <input type="hidden" id="image'.$row["p_id"].'" value='.$row["p_image"].'>
                <input type="hidden" id="title'.$row["p_id"].'" value="'.$row["p_title"].'">
                <input type="hidden" id="prize'.$row["p_id"].'" value='.$row["p_prize"].'>
               
                
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
                <div class="d-flex"> <button class="btn  "  data-id="'.$row["p_id"].'" id="up_val"><i class="fas fa-angle-up"></i></button><input  type="text" id="qty_input'.$row["p_id"].'" min="0" max="5" name=""  class="text-center " disabled  value="1"> <button data-id="'.$row["p_id"].'" id="down_val" class="btn "><i class="fas fa-angle-down"></i></button> </div> 
                <span>PKR '.$row['p_prize'].'</span> <br>
                <div class="btn-group" role="group" aria-label="Basic example">
                        <button role="button"  type="button"  class=" btn  btn-outline-success cart_show"><i class="fas fa-cart-arrow-down"></i></button>
                        <button role="button" id="CartBtn" data-id="'.$row["p_id"].'"  class="btn btn-outline-success">add to cart</button>
                        
                    </div>
                
            </div>';
        }
    }else{
        echo $output = 'no record found ';
    }
    echo '

    <!-- dishes section starts  -->
    
    <section class="dishes" id="dishes">
    
        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> popular dishes </h1>
        
    
        <div  id="p_message"></div>
        <div class="box-container" id="dishes_containers">
                <div class="row">
                '.$output.'

                </div>
        </div>
    
    </section>
    
    <!-- dishes section ends ----->';
};
function review(){
    echo '
    <!-- review section starts  -->
    
    <section class="review" id="review">
    
        <h3 class="sub-heading"> customer review </h3>
        <h1 class="heading"> what they say </h1>
    
        <div class="swiper-container review-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-1.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
    
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-2.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
    
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-3.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
    
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-4.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
    
            </div>
    
        </div>
        
    </section>
    
    <!-- review section ends -->
    ';
};
function introduction(){
            echo '<!-- about section starts  -->

            <section class="about" id="about">

                <h3 class="sub-heading"> about us </h3>
                <h1 class="heading"> why choose us? </h1>

                <div class="row">

                    <div class="image">
                        <img src="images/about-img.png" alt="">
                    </div>

                    <div class="content">
                        <h3>best food in the country</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
                        <div class="icons-container">
                            <div class="icons">
                                <i class="fas fa-shipping-fast"></i>
                                <span>free delivery</span>
                            </div>
                            <div class="icons">
                                <i class="fas fa-dollar-sign"></i>
                                <span>easy payments</span>
                            </div>
                            <div class="icons">
                                <i class="fas fa-headset"></i>
                                <span>24/7 service</span>
                            </div>
                        </div>
                        <a href="#" class="btn">learn more</a>
                    </div>

                </div>

            </section>

            <!-- about section ends -->
            ';
};
function special_menu(){
            echo '
            <!-- menu section starts  -->

            <section class="menu" id="menu">

                <h3 class="sub-heading"> our menu </h3>
                <h1 class="heading"> today`s speciality </h1>

                <div class="box-container">

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-1.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn" style="font-size:1.5rem !important;">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-2.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-3.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-4.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-5.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-6.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-7.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-8.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/menu-9.jpg" alt="">
                            <a href="#" class="fas fa-heart"></a>
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3>delicious food</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                            <a href="#" class="btn">add to cart</a>
                            <span class="price">$12.99</span>
                        </div>
                    </div>

                </div>

            </section>

            <!-- menu section ends -->
            ';
};
function order_contact(){
    echo '<!-- order section starts  -->

    <section class="order" id="order">
    
        <h3 class="sub-heading"> order now </h3>
        <h1 class="heading"> free and fast </h1>
    
        <form action="">
    
            <div class="inputBox">
                <div class="input">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name">
                </div>
                <div class="input">
                    <span>your number</span>
                    <input type="number" placeholder="enter your number">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>your order</span>
                    <input type="text" placeholder="enter food name">
                </div>
                <div class="input">
                    <span>additional food</span>
                    <input type="test" placeholder="extra with food">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>how musch</span>
                    <input type="number" placeholder="how many orders">
                </div>
                <div class="input">
                    <span>date and time</span>
                    <input type="datetime-local">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>your address</span>
                    <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="input">
                    <span>your message</span>
                    <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
    
            <input type="submit" value="order now" class="btn">
    
        </form>
    
    </section>
    
    <!-- order section ends -->
    ';
};

function sign_up(){
    echo ' 
    <div class="main">
    
             <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content d-md-flex ">
                        <div class="signup-form">
                            <h2 class="form-title">Sign up</h2>
                            <form method="POST"  class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="alert alert-danger " id="message" style="display: none ;" role="alert"></div> 
                            <div class="form-group">
                                    <label for="name"><i class="fas fa-user"></i></label>
                                    <input type="text" name="name" id="name"  required placeholder="Your Name"/>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope"></i></label>
                                    <input type="email" name="email" id="email" required placeholder="Your Email"/>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="fas fa-lock "></i></label>
                                    <input type="password" name="pass" id="pass" required placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <label for="re-pass"><i class="fas fa-lock"></i></label>
                                    <input type="password" name="re_pass" id="re_pass" required placeholder="Repeat your password"/>
                                </div>
                                <div class="form-group">
                                    <label for="formFileMultiple"><i class="fas fa-image"></i></label>
                                    <input class="form-control w-75" name="user_image" required style=" float:right;" type="file" id="formFileMultiple" multiple>
    
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                </div>
                                <div class="form-group form-button">
                                    <input type="button" name="signup"   id="signup" onclick="register_function()" class="form-submit" value="Register"/>
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                
                            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                            <a href="login.php" class="signup-image-link">I am already member <u class="text-info" style="text-decoration: underline;">sign in</u>  </a>
                        </div>
                    </div>
                </div>
            </section>
    
    </div>
     <!-- main div end here -->';
}

function sign_in(){

    echo '
    <div class="main">  
          <section class="sign-in">
            <div class="container">
                <div class="signin-content d-md-flex">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link position-absolute ">Create an account <u class=" text-info ">Sign in</u> </a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                        <div class="alert alert-danger mb-2 " id="message" style="" role="alert"></div> 
                            <div class="form-group">
                                <label for="your_name"><i class="fas fa-user "></i></label>
                                <input type="text" name="email" id="your_name" required placeholder="Enter your email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fas fa-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" required placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="button" role="button" name="signin" id="signin" onclick="login()" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login d-flex justify-content-between align-self-center">
                            <span class="social-label">Or login with</span>
                            <ul class="socials d-flex">
                                <li class=" w-50 "><a class="d-flex" href="#"><i class="display-flex-center text-center zmdi zmdi-facebook"></i></a></li>
                                <li class=" w-50 "><a class="d-flex" href="#"><i class="display-flex-center text-center zmdi zmdi-twitter"></i></a></li>
                                <li class=" w-50 "><a class="d-flex" href="#"><i class="display-flex-center text-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
        ';
};
 function footers(){
    echo ' 
    <!-- footer section starts  -->
    
    <section class="footer">
    
        <div class="box-container">
    
            <div class="box">
                <h3>locations</h3>
                <a href="#">india</a>
                <a href="#">japan</a>
                <a href="#">russia</a>
                <a href="#">USA</a>
                <a href="#">france</a>
            </div>
    
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">dishes</a>
                <a href="#">about</a>
                <a href="#">menu</a>
                <a href="#">reivew</a>
                <a href="#">order</a>
            </div>
    
            <div class="box">
                <h3>contact info</h3>
                <a href="#">+123-456-7890</a>
                <a href="#">+111-222-3333</a>
                <a href="#">shaikhanas@gmail.com</a>
                <a href="#">anasbhai@gmail.com</a>
                <a href="#">mumbai, india - 400104</a>
            </div>
    
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedin</a>
            </div>
    
        </div>
    
        <div class="credit"> copyright @ 2021 by <span>mr. web designer</span> </div>
    
    </section>
    
    <!-- footer section ends -->
    <!-- Plugin js for this page -->
    

     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
     <!-- End plugin js for this page -->
    
   
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    
       
    <script src="database/js/database.js"></script>  
    <script src="database/js/ajax.js"></script>  
    <script>
    // $(document).on("click" , "#Delete" , function(e){
    //     e.preventDefault();
    //     id = $(this).attr("data-delete");
        
    //     $.ajax({
    //         type: "POST",
    //         url: "database/del.php",
    //         data: {"p_id": id , "action" : "delete"},
            
    //         success: function (response) {
    //             console.log(response)
    //         },
    //         error: function (response) {
    //             console.log(response)
    //         }
    //     });
    // });
    </script>
    
    
    </body>
    </html>';
};
            
?>
