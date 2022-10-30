
$(document).ready(function () {
    function checkUserLogin() {
        $("#adminLink").hide()
        var data = "<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";  
        $.ajax({
          type: "GET",
          url: "../database/user_check_login.php",
          data : {action : "check" },
          dataType : "json",
          success: function (response) {
            if(response.action == false){
              data =`<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>`;
              $("#adminLink").hide()
              window.location.href = "../login.php";
              console.log("false")
            }else{
              if(response.role_id == 1){
                        $("#adminLink").show()
                      }else{
                    $("#adminLink").hide()
    
                  }
                  console.log(response)
                        data = `<div class="dropdown mt-2">
                        <button class="btn dropdown-toggle show" style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img id="user_img" class="card-img" src="../database/upload/${response.image}"  alt="${response.Name}">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in show" aria-labelledby="userDropdown" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 126px);">
                                <a class="dropdown-item" href="#">
                                <i class="fas fa-circle text-success fa-sm fa-fw mr-2 text-gray-400" style="color:var(--bs-success);"></i>
                                ${response.Name}
                              </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                    </div>`;
            }
            $("#user_login_header").html(data);
            
          },
          
          error: function (response) {
            console.log(response);
          },
        });
      }
      checkUserLogin();
      $(document).on( "click" , "#logout" ,  function (e) { 
        e.preventDefault();
        
        $.ajax({
          url: "../database/logout.php",
          type: "POST",
          success: function (data) {
            
            if (data == true) {
              
            console.log("logout")  
            window.location.href = "index.php";
          }
          },
        });
      
      });
  
    }); // main jquery curly bases 