<?php 
function ad_headers(){
      include "../database/conf.php";
    echo '<html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>DPanel</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                                                      .'" data-color-lighter="'.$row["color_lighter"].'" data-hsl="'.$row["hsl"].'" style="--clr:'.$row["clr"].';" href="#">
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
                          <li class="sidebar-item  cards_box " data-title="Account" data-tbl="moneyHandel.php" data-form-modal="moneyModal">
                              
                              <a href="money.php" class=""><i class="fas fa-money-bill "></i>
                              
                              </a>
                              <span class="">Account</span>     
                          </li>
                          <li class="sidebar-item dropdown position-relative" data-dropdown="#table">
                              <a href="" class=""><i class="fas fa-table"></i></a>
                              <span class=" dropdown-toggle">Tables</span> 
                              <div class=" dropdown-menu  "  id="table">
                                  
                                  
                                  
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
 function charts_circle (){
  echo '
  <!-- cart container -->
  <div class="chart-container container mb-5">
      <div class="row">
          <div class="col-10 offset-1">
              <div class="grid" id="charts_row">
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
    echo ' <div class="container-fluid">

    <div class="card shadow mb-4" id="DpanelTable">
                  <div id="spinner-div">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                  </div>
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold dpanel-text table_heading">User Data </h6>
            <div class="input-group d-flex-between  w-50 " >
            
            <div class="d-flex">
                                    <label>Entity</label>
            <select class="form-select form-select-sm" name="" id="entity_slc">
              
              <option value="2">2</option>
              <option value="5" selected>5</option>
              <option value="10">10</option>
            </select>
          </div>
                            <div class="form-outline">
                              <input id="TableSearchInput" type="search"   placeholder="search..." class="form-control" />
                              
                            </div> 
                          </div>
            <button type="button" class="btn   dpanel-btn btn-sm Add_btn"  data-modal="" >ADD USER</button>
        </div>
        <div class="card-body">
            <div class=" table-responsive "  >
            <div class=" dpanel-text   mb-2  " id ="undo_btn" ><i class="fas fa-undo-alt"></i></div>
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                
                </thead>
                <tbody ></tbody>
                </table>
                <caption class=" "> <div class=" d-flex-between w-100">
                <span class= "record"></span>  <nav aria-label="Page navigation">
                <ul class="pagination    ">
                  
                </ul>
              </nav>  </div></caption>
            </div>
        </div>
    </div>
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    
        </div>';
}
function formModals(){
  echo '

  <div class="modal fade" id="userInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                  <h5 class="modal-title" id=""> ADD User data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form  id="userInsertForm" action="js/database/userUpdate.php" method="post"  accept-charset="multipart/form-data" >
                          
                          <input type="hidden" name="action" value="insert">
                          <div class="mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="UserName" id="UserName" aria-describedby="emailHelpId" placeholder="Name">
                            
                          </div>
                          <div class="mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="UserEmail" id="UserEmail" aria-describedby="emailHelpId" placeholder="email">
                            
                          </div>
                          <div class="mb-2">
                            <label for="" class="form-label">password</label>
                            <input type="password" class="form-control" name="UserPwd" id="UserPwd" aria-describedby="emailHelpId" placeholder="password">
                            
                          </div>
                          <div class="mb-2">
                              <label for="" class="form-label">Role</label>
                              <select class="form-select form-select-lg" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" name="UserRole" id="UserRole">
                                  
                                  <option selected value="2">user</option>
                                  <option value="1">Admin</option>
                              </select>
                          </div>
                          <div class="mb-2">
                            <label for="" class="form-label">Choose Image</label>
                            <input type="file" class="form-control" name="UserImg" id="UserImg" placeholder="" aria-describedby="fileHelpId">
                          </div>
  
                      
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" id="userSubmit" class="btn btn-primary">Save</button>
                          </div>
                          </div>
                      </form>
          </div>
      </div>
    </div>
      <div class="modal fade" id="EditModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                      <h5 class="modal-title" > Edit User </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div  id="FormEdit"  >
                      
                          </div>
              </div>
          </div>
          </div>
      </div>
    <div class="modal fade" id="productsInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                      <h5 class="modal-title" id=""> ADD new Products</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                          <form  id="productsInsertForm" action="js/database/productsUpdate.php" method="post"  accept-charset="multipart/form-data" >
                                      
                                          <input type="hidden" name="action" value="insert">
                                  <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                  <label for="" class="form-label">Title</label>
                                                  <input type="text" class="form-control" name="pTitle"  placeholder="Title">
                                            </div>    
                                        </div>



                                  <div class="col-6">

                                  <div class="mb-2">
                                  <label for="" class="form-label">Subtitle</label>
                                  <input type="text" class="form-control" name="pSubtitle"  placeholder="Subtile">

                                  </div>
                                  </div>





                                    <div class="col-6">

                                  <div class="mb-2">
                                  <label for="" class="form-label">Category</label>
                                  <select class="form-select form-select-lg" name="Cat_id" id="cat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" name="UserRole" id="UserRole">

                                  </select>
                                  </div>
                                  </div>



                                  <div class="col-6">


                                  <div class="mb-2">
                                  <label for="" class="form-label">Sub Category</label>
                                  <select class="form-select form-select-lg " name="Scat_id" disabled id="Scat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" name="UserRole" id="UserRole">

                                  </select>
                                  </div>
                                  </div>

                                  <div class="col-6">

                                  <div class="mb-2">
                                  <label for="" class="form-label">Prize</label>
                                  <input type="tel" class="form-control" name="pPrize" >

                                  </div>
                                  </div>
                                  <div class="col-6">
                                  <div class="mb-2">
                                  <label for="" class="form-label">Choose Image</label>
                                  <input type="file" class="form-control" name="pImg" >
                                  </div>

                                  </div>

                                  <div class="mb-3">
                                  <label for="" class="form-label">description</label>
                                  <textarea class="form-control" name="pDesc" id="" rows="3"></textarea>
                                  </div>


                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
                                  </div>
                                  </div>
                      </form>
              </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="bannersInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                      <h5 class="modal-title" id=""> Add New banner </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                          <form  id="bannersInsertForm" action="js/database/bannersUpdate.php" method="post"  accept-charset="multipart/form-data" >
                                      
                                          <input type="hidden" name="action" value="insert">
                                  <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                  <label for="" class="form-label">Title</label>
                                                  <input type="text" class="form-control" name="bTitle"  placeholder="Title">
                                            </div>    
                                        </div>



                                  <div class="col-6">

                                  <div class="mb-2">
                                  <label for="" class="form-label">Subtitle</label>
                                  <input type="text" class="form-control" name="bSubtitle"  placeholder="Subtile">

                                  </div>
                                  </div>





                                    <div class="col-6">

                                  <div class="mb-2">
                                  <label for="" class="form-label">Category</label>
                                  <select class="form-select form-select-lg" name="Cat_id" id="bCat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >

                                  </select>
                                  </div>
                                  </div>



                                  <div class="col-6">


                                  <div class="mb-2">
                                  <label for="" class="form-label">Sub Category</label>
                                  <select class="form-select form-select-lg " name="Scat_id" disabled id="bScat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >

                                  </select>
                                  </div>
                                  </div>

                                  <div class="col-12">
                                  <div class="mb-2">
                                  <label for="" class="form-label">Choose Image</label>
                                  <input type="file" class="form-control" name="bImg" >
                                  </div>

                                  </div>

                                  <div class="mb-3">
                                  <label for="" class="form-label">description</label>
                                  <textarea class="form-control" name="bDesc" id="" rows="3"></textarea>
                                  </div>


                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit"  class="btn btn-primary">Save</button>
                                  </div>
                                  </div>
                      </form>
              </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="categoryInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                      <h5 class="modal-title" id=""> add new category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                          <form  id="categoryInsertForm" action="js/database/catUpdate.php" method="post"  accept-charset="multipart/form-data" >
                                      
                                          <input type="hidden" name="action" value="insert">
                                  <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2">
                                                  <label for="" class="form-label">category Name</label>
                                                  <input type="text" class="form-control" name="catName"  placeholder="name">
                                            </div>    
                                        </div>




                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
                                  </div>
                                  </div>
                      </form>
              </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="SubCategoryInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                      <h5 class="modal-title" id=""> add new category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                          <form  id="subcategoryInsertForm" action="js/database/SubcatUpdate.php" method="post"  accept-charset="multipart/form-data" >
                                      
                                          <input type="hidden" name="action" value="insert">
                                  <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2">
                                                  <label for="" class="form-label">category Name</label>
                                                  <input type="text" class="form-control" name="scatName"  placeholder="name">
                                            </div>    
                                        </div>
                                        
                                  <div class="mb-2 col-12">
                                  <label for="" class="form-label">Category</label>
                                  <select class="form-select form-select-lg" name="Cat_id" id="sCat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >

                                  </select>
                                  </div>




                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
                                  </div>
                                  </div>
                      </form>
              </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="stockInsertModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.3rem 1rem !important;">
                <h5 class="modal-title" id=""> ADD new Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <form  id="stockInsertForm" action="js/database/proStockUpdate.php" method="post"  accept-charset="multipart/form-data" >
                                
                                    <input type="hidden" name="action" value="insert">
                            <div class="row">





                              <div class="col-6">

                            <div class="mb-2">
                            <label for="" class="form-label">Category</label>
                            <select class="form-select form-select-lg" name="Cat_id" id="stockCat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >

                            </select>
                            </div>
                            </div>



                            <div class="col-6">


                            <div class="mb-2">
                            <label for="" class="form-label">Sub Category</label>
                            <select class="form-select form-select-lg " name="Scat_id" disabled id="StockScat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >

                            </select>
                            </div>
                            </div>
                              
                            <div class="mb-2 col-6">
                            <label for="" class="form-label">product</label>
                            <select class="form-select form-select-lg " name="p_id" disabled id="pro_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;">

                            </select>
                            </div>
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">Prize</label>
                            <input type="tel" class="form-control" name="pPrize" >

                            </div>
                            </div>
                            
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">tax</label>
                            <input type="tel" class="form-control" name="pTax" >

                            </div>
                            </div>
                            
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">Quantity</label>
                            <input type="tel" class="form-control" name="pQty" >

                            </div>
                            </div>
                            <div class="col-6">
                                          <div class="input">
                                  <label>date and time</label>
                                  <input type="datetime-local" class="form-control" name="pDate" value="' . date("d-m-y") . '">
                              </div>

                            </div>

                            <div class="mb-3 col-3">
                            <label for="" class="form-label">status</label>
                            <select class="form-select form-select-lg " name="pSts"  style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;"> <option>show</option><option>hide</option> </select>
                            </div>


                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                </form>
        </div>
    </div>
</div>
</div>

  ';
}
function msgModals(){
          echo '

          <div class="modal fade " id="MsgModel" tabindex="1062" role="dialog">
              <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <a type="button" class="  close " data-dismiss="modal" aria-label="Close">
                            <span class="dpanel-text">X</span>
                        </a>
                        </div>
                        <div class="modal-body">
                        <p id="Model_txt"></p>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
              </div>
          </div>';
}
function ad_footers(){
    echo '        </section> <!-- d_body div-->
          </main>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" ></script>
        
          
      <script src="js/dpanel.js"></script>
      <script src="js/database.js"></script>
  
  </body>
  </html>';
}