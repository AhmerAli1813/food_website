<?php function ad_headers(){
include "../database/conf.php";
echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DPanel</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
            <link rel="stylesheet" href="css/-variables.css">
            <link rel="stylesheet" href="css/-global.css">
                <link rel="stylesheet" href="css/dpanel.css">
        </head>
        <body>
              
              <header class="dpanel-header position-fixed  d-flex-center" > 
                  <nav class="dpanel-navbars position-relative w-100  text-white" style="padding:0.5rem;">
                    
                  
                      
                      <!-- right navbar  -->
                     
                      <div class=" d-flex-center  dpanel-nav-left navbar navbar-expand-md ">
                              <button class="btn txt-clr me-1" id="menu-toggle"> <i class="fas fa-arrow-left"></i></button>
                              <button class="btn txt-clr me-1" id="nav-menu-toggle"> <i class="fas fa-bars d-block d-md-none"></i></button>
                             <ul class="collapse navbar-collapse" >
                              <li class="nav-item">
                                  <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item dropdown" data-dropdown="#link">
                                  <a class="nav-link dropdown-toggle" href="#"   >Dropdown</a>
                                  <div class="dropdown-menu" id="link">
                                      <a class="dropdown-item" href="#">Action 1</a>
                                      <a class="dropdown-item" href="#">Action 2</a>
                                  </div>
                              </li>
                             </ul>
                          </div>
                          <!-- left navbar -->
                          <ul class=" d-flex-center dpanel-nav-right">
                              <li class="nav-item search-btn">  <a  ><i class="fas fa-search"></i></a></li>
                             <li class="dropdown" data-dropdown="#color-gallery">
                                         <a type="button" class="position-relative">
                                                <i class="fas fa-tint"></i>
                                        <span class="position-absolute top-1  start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                                            </a>
                                            <div class="dropdown-menu" id="color-gallery">';
                                            $q=$conn->query("SELECT * FROM `colors`  ORDER  by clr_sts ASC") or die("<a>No color found</a>");
                                            if($q){
                                                  while($row = mysqli_fetch_assoc($q)){
                                                  echo  '<a class="dropdown-item color-item '.$row["clr_sts"].' "  data-color-sts = "'.$row["clr_sts"].'" data-color="'.$row["clr"].'"; data-hsl="'.$row["hsl"].'" data-color-alt="'.$row["color_alt"]
                                                  .'" data-color-lighter="'.$row["color_lighter"].'" data-hsl="340" style="--clr:'.$row["clr"].';" href="#">
                                                        </a>';
                                            }
                                            } 
                                             
                                           echo' </div>
                           </li>
                              <li class="nav-item"><button type="button" class="btn btn-sm txt-clr position-relative">
                                  <i class="fas fa-envelope"></i>
                                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    99+
                                    
                                  </span>
                                </button>
                              </li>
                             
                              <li class="nav-item">
                                  <a href="" class="nav-link active d-flex">
                                  
                                      <img src="img/user1-128x128.jpg" class="userImg" width="30px" height="30px" style="border-radius: 50%;" alt="">
                                  </a>
                                  </li>
                              <li class="nav-item"><a href="" class="nav-link  active"><i class="fas fa-sign-out-alt"></i></a></li>
                                      
                          </ul>
              </nav> 
            </header>
              <aside class="dpanel-sidebar">
                  <div class="navbar-brand ">LOGO</div>    
                  
                  <ul class="mt-4 ">
                      <ul class=" " id="" >
                          <li class="nav-item">
                              <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                          </li>
                          <li class="nav-item dropdown" data-dropdown="#link1">
                              <a class="nav-link dropdown-toggle" href="#"   >Dropdown</a>
                              <div class="dropdown-menu" id="link1">
                                  <a class="dropdown-item" href="#">Action 1</a>
                                  <a class="dropdown-item" href="#">Action 2</a>
                              </div>
                          </li>
                         </ul>
                      <li class="sidebar-item active">
                          <a href="" class=""><img src="img/user1-128x128.jpg" class="userImg" width="30px" height="30px" style="border-radius: 50%;" alt=""></a>
                          
                          <span class="userName">ahmer</span>     
                          <span class="btn ms-auto  "> <b class ="fas fa-sign-out-alt"></b></span>
                      </li>
                      <li class="sidebar-item ">
                          
                          <a href="" class=""><i class="fas fa-map-marked"></i></a>
                          <span class="">dashboard</span>     
                      </li>
                      <li class="sidebar-item dropdown position-relative" data-dropdown="#table">
                          <a href="" class=""><i class="fas fa-table"></i></a>
                          <span class=" dropdown-toggle">Tables</span> 
                          <div class=" dropdown-menu  "  id="table">
                              <div class="d-flex-center">
  
                                  <i class="fas fa-dot-circle "></i>
                                  <a class="dropdown-item" href="#">Action</a>
                              </div>
                              
                              <div class="d-flex-center">
  
                                  <i class="fas fa-dot-circle "></i>
                                  <a class="dropdown-item disabled" href="#">disable</a>
                              </div>
                              
                          </div>    
                      </li>
                      
                  </ul>
              </aside>
          <main class="dpanel-content mt-5">';
}
function search_modal(){
          echo '
          <div class="modal fade" id="search-modal" >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="">Search....  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                            <div class="input-group d-flex-center">
                            <div class="form-outline">
                              <input id="search-input" type="search" id="form1" placeholder="type..." class="form-control" />
                              
                            </div>
                            <button id="search-button" type="button" class="btn  dpanel-btn">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                            <ul class="list-group 
                            ">
                            <li class="list-group-item active">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                          </ul>
                          
              </div>
            </div>
          </div>
          </div>';
}
 function ad_head_content () {
          echo ' <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2 mt-3">
              <div class="col-sm-6 d-flex-center ">
                  <div class="dpanel-headings me-auto ms-3">

                      <h1 class=" dpanel-title">Dashboard</h1>
                      <h6 class="dpanel-subtitle">ALl found</h6>
                  </div>
              </div><!-- /.col -->
              <div class="col-sm-4 me-auto  offset-2 d-flex-center">
                <ol class="breadcrumb ">
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
  </div>
                  <section class="dpanel-body"> 
                  ';
 }        
 function carts_circle (){
  echo '
  <!-- cart container -->
  <div class="chart-container container">
      <div class="row">
          <div class="col-10 offset-1">
              <div class="grid">
                  <section>
                    
                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="40,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <g class="circle-chart__info">
                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">40%</text>
                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">Yay 30% progress!</text>
                      </g>
                    </svg>
                  </section>
                
                  <section>
                    
                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
                     
                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <circle class="circle-chart__circle circle-chart__circle" stroke="var(--bs-warning)"    
                      stroke-width="2" stroke-dasharray="30,180" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <g class="circle-chart__info">
                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">30%</text>
                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">offline user</text>
                      </g>
                    </svg>
                  </section>
                
                  <section>
                  
                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
                     
                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <circle class="circle-chart__circle circle-chart__circle" stroke="var(--first-color)"    
                      stroke-width="2" stroke-dasharray="50" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <g class="circle-chart__info">
                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">70%</text>
                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">Active user</text>
                      </g>
                    </svg>
                  </section>
                
                  <section>
                  
                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
                     
                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <circle class="circle-chart__circle circle-chart__circle--negative" stroke="red"    
                      stroke-width="2" stroke-dasharray="10,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                      <g class="circle-chart__info">
                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">-10%</text>
                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">Oh no :(</text>
                      </g>
                    </svg>
                  </section>
                </div>
          </div>
      </div>
  </div>';
}
function   cards (){
              echo '
              <!-- card container -->
              <div class=" card-container container">
                  <div class="row" id="card_row">
                   </div>
              </div>
';
}             

function tables(){
          echo '
          <!-- card container -->
          <div class=" card-container container">
              <div class="row">                       
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Earnings (Annual)</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-dollar-sign fa-2x "></i>
                                  </div>
                              </div>
                          </div>
                      </div>
              </div>

              </div>
          </div>
';
}

              

       function ad_footers(){
              echo '        </section> <!-- d_body div-->
                   </main>
                   <script src="js/jquery.min.js"></script>
                   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

                   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" ></script>
                 
                
                <script src="js/dpanel.js"></script>
                <script src="js/database.js"></script>
            
            </body>
            </html>';
       }