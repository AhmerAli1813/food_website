
$(document).ready(function () {
    function checkUserLogin() {
        
        var data = "<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";  
        $.ajax({
          type: "GET",
          url: "../database/user_check_login.php",
          data : {action : "check" },
          dataType : "json",
          success: function (response) {
            if(response.action == false){
              data =`<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>`;
              
              // window.location.href = "../login.php";
              console.log("please login kro");
            }else{
              if(response.role_id == 1){
                        console.log("welcome admin")
                        $(".userImg").attr("src" , `../database/upload/${response.image}` )
                        
                        $(".userName").html(response.Name)
                      }else{
                          console.log("u are not admin")
    
                  }
                  // // console.log(response)
                  //       data = `<div class="dropdown mt-2">
                  //       <button class="btn dropdown-toggle show" style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  //       <img id="user_img" class="card-img" src="../database/upload/${response.image}"  alt="${response.Name}">
                  //               </button>
                  //               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in show" aria-labelledby="userDropdown" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 126px);">
                  //               <a class="dropdown-item" href="#">
                  //               <i class="fas fa-circle text-success fa-sm fa-fw mr-2 text-gray-400" style="color:var(--bs-success);"></i>
                  //               ${response.Name}
                  //             </a>
                  //               <a class="dropdown-item" href="#">
                  //                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  //                   Profile
                  //               </a>
                  //               <a class="dropdown-item" href="#">
                  //                   <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  //                   Settings
                  //               </a>
                                
                  //               <div class="dropdown-divider"></div>
                  //               <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#logoutModal">
                  //                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  //                   Logout
                  //               </a>
                  //           </div>
                  //   </div>`;
            }
            // $("#user_login_header").html(data);
            
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
  
      
      // $("#userTable").DataTable({
      //   'serverSide' : true,
      //   'processing' :true,
      //   'pagingType' : 'full_numbers',
      //   'order' : [],
      //   'ajax' : {
      //       'url' : "js/database/userFetching.php" ,
      //       'type' : 'post',
      //   },
      //   'fnCreatedRow' : function (nRow , aData ,iDataIndex){
      //       $(nRow).attr('id' , aData[0]);
      //   },
      //   'columnDefs':[{
      //     'target' : [0,5],
      //     'orderable' :false,
      //   }]
      // });
$(document).on("submit" , "#UserForm" , function(e){
  e.preventDefault();
  
    var name =$("#UserName").val() ,
      id = $("#UserID").val(),
      trId = $("#trID").val(),
      
      email = $("#UserEmail").val(),
      pwd = $("#UserPwd").val(),
      role_id = $("#UserRole").val(),
      img = $("#UserImg").val();
      var data = {"U_id" :id , "Name":name , "Email":email , "Pwd" : pwd , "Role_id" : role_id , "Img" : img };

      $.ajax({
        type: "POST",
        url: "js/database/userUpdate.php",
        data: data,
        dataType: "json",
        success: function (response) {
          if(response.status == "success"){
            var table = $("#userTable").DataTable();
              message("success" , "your data successfully added")
          console.log(response.status)
          var table = ("#userTable").DataTable()
          table.draw();
        }else{
          message("error" , response.status)
        }
        $("#UserForm")[0].reset();
          $("#userModel").modal("hide");

          
        },
        error : function(response){
          console.error(response)
        }
      });
});

$(document).on("click", "#UserEditBtn" , function (e){
  e.preventDefault();
  
  var userId = $(this).attr("data-id");
  var TrId = $(this).data("id");
  $.ajax({
    type: "POST",
    url: "js/database/getRecord.php",
    data: {"action" : "user_data" , "u_id" :userId },
    
    success: function (response) {
      console.log(response)
    },
    error: function (response) {
      console.log(response)
    }
  });
  
});
cardsLoad()
function cardsLoad(){
  data = {"action" : "cards"}
  myAjax("POST" , "js/database/cards.php" , data , "json" , "#card_row");
}

      function myAjax(type ,url ,data,dataType,res_id){
        $.ajax({
          type: type,
          url: url,
          data: data,
          dataType: dataType,
          success: function (response) {
           $(res_id).html(response.data);
              console.log(response.data)
          }
        });
      }
function message( types, txt){
  
    $("#Model_txt").text(txt);
    $(".modal-title").text(types);
    $("#MsgModel").modal("show")
    $("#MsgModel").delay(2000).modal("show")

  
}
  } );