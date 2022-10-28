<?php
session_start();

function headers()
{

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
    <div class="user" id="user_login_header"></div>
        
    </div>
    </header>
    
    <!-- header section ends-->
    
    <!-- search form  -->
    ';
    search();
};
function banners()
{


    echo ' <!-- home section starts  -->

            <section class="home" id="home">
            
                <div class="swiper-container home-slider " style="overflow-x:hidden ;">
            
                    <div id="banner_Container" class="swiper-wrapper wrapper" >
            
            
                    </div>
            
                    <div class="swiper-pagination"></div>
            
                </div>
            
            </section>
            
            <!-- home section ends -->
            ';
};
function search()
{
    echo ' <form id="search-form">
    <div class="inner-form">
      <div class="close_btn">X</div>
      <div class="basic-search">
        <div class="input-field">
          <div class="">
            <input
              id="SearchInput"
              type="text"
              class=""
              placeholder="Search..."
             
            />
            <button class="search-btn">search</button>
          </div>
        </div>
        <div class="search-term d-none">
          <ul class="">
            <li>search</li>
            <li>search</li>
            <li>search</li>
            <li>search</li>
            <li>search</li>
            <li>search</li>
            <li>search</li>
          </ul>
        </div>
      </div>
    </div>
  </form>
    ';
}
function search_result()
{
    echo '
<section class="dishes d-none" id="search_main_container">
        
    <h3 class="sub-heading"> your search data </h3>
    <h1 class="heading"> favorite dishes </h1>


        <div id="p_message"></div>
        <div class="box-container" id="search_containers">
                <div class="row" id="search_gallery">
                </div>
        </div>
</section>
';
}
function loadtabel()
{
    echo '<div class="container mt-5">
    <div class="table-responsive " id="cart_tabel">
        <table  class="table table-striped-columns
        ">
        <thead class="tabel-info bg-success ">
        
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
                    
                    <caption class="w-100">
                    <span id="g_total" class= "ml-5">   Grand total: 2000 </span>
                     <button role="button" id="buy_cart" class=" mr-5 float-right btn btn-success">buying</button>
                     </caption>
                </tbody>
         </table>
    </div>
    
    </div>';
}
function dishes()
{

    echo '

    <!-- dishes section starts  -->
    
    <section class="dishes" id="dishes">
    
        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> popular dishes </h1>
        
    
        <div  id="p_message"></div>
        <div class="box-container" id="dishes_containers">
                <div class="row" id="product_gallery">
                

                </div>
        </div>
    
    </section>
    
    <!-- dishes section ends ----->';
};
function review()
{
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
function introduction()
{
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
function special_menu()
{
    echo '
            <!-- menu section starts  -->

            <section class="menu" id="menu">

                <h3 class="sub-heading"> our menu </h3>
                <h1 class="heading"> today`s speciality </h1>

                <div class="box-container" id="menu_container">
                <div class="row" id="WeeklyProGall">
                

                </div>

                </div>

            </section>

            <!-- menu section ends -->
            ';
};
function order_contact()
{
    echo '<!-- order section starts  -->

    <section class="order" id="order">
    
        <h3 class="sub-heading"> order now </h3>
        <h1 class="heading"> free and fast </h1>
    
        <div id="ShowOrderFormHtml"></div>
    
    </section>
    
    <!-- order section ends -->
    ';
};

function sign_up()
{
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

function sign_in()
{

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
function footers()
{
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
    <script src="js/fetch.js"></script>
    
       
      
    <script src="database/js/ajax.js"></script>  
    
    <script>
    
    </script>
    
    
    </body>
    </html>';
};
