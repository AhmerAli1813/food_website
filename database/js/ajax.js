$(document).ready(function () {
  banner();
  AllProduct();
  productOneWeekOld();
  OrderFormHtml();
  // jsonFilesUpdate();
  function message( types, txt){
   
      $("#Model_txt").text(txt);
      $("#MsgModel .modal-title").text(types);
      $("#MsgModel").modal("show")
      window.setTimeout(function(){
        $('#MsgModel').modal('hide');
     }, 2000)
  
    
  }
$(document).on("click" , ".cards_box" , function(){
      console.log($(this).data("tbl"));
})

  function productOneWeekOld() {
    $.ajax({
      type: "POST",
      url: "database/weeklyProduct.php",
      data: { action: "OneWeekData" },
      success: function (response) {
        // console.log(response);
        $("#WeeklyProGall").html(response);
      },
      error: function (response) {
        console.log(response);
      },
    });
  }
  function AllProduct(page) {
    $.ajax({
      type: "POST",
      url: "database/Product.php",
      data: { action: "shwAllPro", page_no: page },
      success: function (response) {
        $("#product_gallery").html(response);
      },
      error: function (response) {
        console.log(response);
      },
    });
  }
  function banner() {
    $.ajax({
      type: "POST",
      url: "database/banner.php",
      data: { action: "ShwBanner" },

      success: function (response) {
        $("#banner_Container").html(response);
      },

      error: function (response) {
        console.log(response);
        $("#banner_Container").html("serve is slow");
      },
    });
  }
  $(document).on("click", "#pageNo", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    AllProduct(id);
    
  });
  function OrderFormHtml() {
    $.ajax({
      type: "POST",
      url: "database/orderFormHtml.php",
      data: { action: "orderFormHtml" },

      success: function (response) {
        $("#ShowOrderFormHtml").html(response);
      },

      error: function (response) {
        console.log(response);
      },
    });
  }

  

  
  function checkUserLogin(res) {
    $("#adminLink").hide()
    var data = "<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";  
    $.ajax({
      type: "GET",
      url: "database/user_check_login.php",
      data : {action : "check" },
      dataType : "json",
      success: function (response) {
        console.log(response)
        if(response.login == false){
          data =`<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>`;
          $("#adminLink").hide()
          console.log("false")
        }else{
          if(response.data.role_id == 1){
                    $("#adminLink").show()
                  }else{
                $("#adminLink").hide()

              }
                  let img = response.data.image , name = response.data.Name;
                    data = `<div class="dropdown">
                    <button class="btn dropdown-toggle " style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img id="user_img" class="card-img" src="database/upload/${img}"  alt="${name}">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 126px);">
                            <a class="dropdown-item" href="#">
                            ${name}
                              <i class="fas fa-circle text-success fa-sm fa-fw mr-2 text-gray-400"></i>
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
                            <a class="dropdown-item"  id="logout" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                </div>`;
        }
          if(res == "login"){
            window.location.href = "login.php"
          }
        
        $("#user_login_header").html(data);
        
      },
      
      error: function (response) {
        console.log(response);
      },
    });
  }
  checkUserLogin();
  // cart ajax start
  $(document).on("click", "#CartBtn", function () {
    var id = $(this).attr("data-id");
    var title = $("#title" + id).val();
    var image = $("#image" + id).val();
    var prize = $("#prize" + id).val();

    var qty = $("#qty_input" + id).val();
    var data = {
      p_id: id,
      title: title,
      image: image,
      prize: prize,
      qty: qty,
      action: "add",
    };

    if(qty <0){
      alert(" you can't select negative value");
    }else
    if (qty <= 5) {
      $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: data,
        dataType: "json",
        success: function (response) {
          message(response.type , response.msg);
          cartCount();
          loadcartTabel();
          grandTotal();
        },
      });
    }else{
      alert("your quantity is greater then 5");
    }
  });

  cartCount();
  //add cart number show
  function cartCount() {
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { action: "count" },
      success: function (response) {
        $("#CartCount").html(response);
      },
    });
  }

$(document).on("click", "#crt_inv_shw_btn", function () {
        
  $.ajax({
    type: "GET",
    data: {action:"check" },
    dataType : "json",
    url: "database/user_check_login.php",
    success: function (response) {
      if(response.login == true){
        if(response.cart == true){
          window.location.href = "inv.php"
        }else{
            alert("please select some cart")
        }
      }else{
        alert("please login first");
        window.location.href = "login.php"
      } 
        console.log(response)
    }
  });


})

  //  showing  which  type of data user add to cart shopping
  $("#cart_tabel").hide();

  loadcartTabel();
  function loadcartTabel() {
    $.ajax({
      type: "POST",
      data: { action: "show" },
      url: "database/cart.php",
      success: function (response) {
        $("#cart_data_show").html(response);
        $("#inv_tbl_shw").html(response);
        grandTotal();
      },
    });
  }
  $(document).on("click", ".cart_show", function (e) {
    $("#cart_tabel").show();
    e.preventDefault();
    $('#cart_tabel')[0].scrollIntoView({
      behavior: 'smooth',block:'start'
 });
    loadcartTabel();
  });

  var qty = 1;

  // increase the value of qty filed
  $(document).on("click", "#up_val", function () {
    var id = $(this).attr("data-id");
    var qty_val = $("#qty_input" + id);

    qty = qty_val.val();
    qty++;

    if (qty < 6 && qty > 0) {
      qty_val.val(qty);
    }
  });

  // decrease the value of qty filed

  $(document).on("click", "#down_val", function () {
    var id = $(this).attr("data-id");
    var qty_val = $("#qty_input" + id);
    qty = qty_val.val();
    qty--;
    if (qty > 0 || qty > 1) {
      qty_val.val(qty);
    }
    if($("#qty_input").val() <0){
      console.log("negative value")
    }
    
  });
  $(document).on("click", "#WkProUpVAl", function () {
    var id = $(this).attr("data-id");
    console.log(id);
    var qty_val = $("#WkProQtyInput" + id);

    qty = qty_val.val();
    qty++;

    if (qty < 6 && qty > 0) {
      qty_val.val(qty);
    }
  });

  // decrease the value of qty filed

  $(document).on("click", "#WkProDownVAl", function () {
    var id = $(this).attr("data-id");
    console.log(id);
    var qty_val = $("#WkProQtyInput" + id);
    qty = qty_val.val();
    qty--;
    if (qty > 0 || qty > 1) {
      qty_val.val(qty);
    }
  });

  function grandTotal() {
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { action: "gTotal" },
      dataType:"json",
      success: function (response) {
        
        $("#crt_amt").html(response.bill);
        $("#crt_tax").html(response.tax);
        $("#crt_total").html(response.total);
        
      },
      error: function (response) {
        console.log(response);
        // $("#g_total").html(response);
      },
    });
  }

  //  add to cart delete button ajax
  $(document).on("click", "#Delete", function () {
    id = $(this).attr("data-delete");
    var data = "";
    $("#cart_data_show").html(data);
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { p_id: id, action: "delete" },
         dataType : "json", 
      success: function (response) {
        cartCount();
        grandTotal();
        message(response.type , response.msg);
        $("#cart_data_show").html(response);
        $(".cart_tabel").show();
        // if ((response.deleted == true)) {
        //   $(".cart_tabel").hide();
        // }
      },
      error: function (response) {},
    });
  });

  $(document).on("click", "#delete_all", function () {
    //   alert("delelte all sessaion")
    deleteAll();
  });
  // deleteAll();
  function deleteAll() {
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { action: "del_all" },

      success: function (response) {
        cartCount();
        grandTotal();
        $(".cart_tabel").show();
        // window.location.href = "index.php"
        $("#cart_data_show").html(response);
      },
      error: function (response2) {
        console.log(response2);
      },
    });
  }
  $(".feedback").hide()
  //  confirm to buying
  $(document).on("click", "#buy_cart", function () {
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { action: "buy" },
      dataType : "json",
      success: function (response) {
        message(response.type , response.msg);
        if (response.login == false) {
          window.location.href = "login.php";
          console.log(response);
        }else if(response.cart == false){
                  mainLocation();
        } else {
          cartCount();
         if(response.action == "success"){
          alert("thanks for shopping");
            mainLocation();

         }
          

          console.log(response);  
        }
      },
      error: function (response) {
        console.log(response);
        console.log(response.responseText);
      },
    });

  });
// feedback  of punching
$(document).on("click", ".fb-btn", function () {
  let fbVal = $("#fd_txtArea").val();
  $.ajax({
    type: "POST",
    url: "database/cart.php",
    
    data: {action : "feedback" , fb_msg : fbVal},
    success: function (response) {
      if(response == true){

        alert("thanks for shopping");
        fbVal.val("");
        window.location.href = "index.php";
      }
    }
  });    
}); 
$(".close_fb").click( ()=>{
  mainLocation()
})
function mainLocation(){
  window.location.href = "index.php";
}
  $(document).on("click", "#orderBtn", function (e) {
    e.preventDefault();
    var data = $("#orderForm").serialize();
    console.log(data);
    $.ajax({
      type: "POST",
      url: "database/directOrder2.php",
      data: data,

      beforesend: function () {
        $("#order_response")
          .fadeIn("fast")
          .html(
            "<div class='alert alert-primary' role='alert'>please wait....</div>"
          )
          .delay(3000)
          .fadeOut();
      },
      success: function (response) {
        if (response == false) {
          $("#order_response")
            .fadeIn("fast")
            .html(
              "<div class='alert alert-warning' role='alert'><b>please !</b> It is security purpose</div>"
            )
            .delay(3000)
            .fadeOut();
          $("#user_password").removeClass("d-none");
          console.log(response);
        }
        if (response == true) {
          checkUserLogin();
          $("#order_response")
            .fadeIn("fast")
            .html(
              '<div class="alert alert-success" role="alert"><strong>Thanks For Shopping</strong></div>'
            )
            .delay(3000)
            .fadeOut();
          $("#user_password").removeClass("d-block").addClass("d-none");
          $("#orderForm").reset();
          $("#orderForm").trigger("reset");
        } else {
          $("#order_response")
            .fadeIn("fast")
            .html(response)
            .delay(3000)
            .fadeOut();
          console.log(response);
          checkUserLogin();
        }
      },
      error: function (response) {
        console.log(response);
      },
    });
  });
function ajax(url , data,result){
  
}

  // here we start function of search
  $("#SearchInput").keyup(function () {
    let searchInputVal = $(this).val();

    if (searchInputVal != "") {
      $.post(
        "database/search.php",
        { action: "search_term", data: searchInputVal },
        function (data) {
          
          $('#search_containers')[0].scrollIntoView({
            behavior: 'smooth',block:'start'
       });
       $(".search-term").removeClass("d-none").html(data);
        
        }
      );
    }
  });
  $(document).on("click", ".search-term ul li", function () {
    $("#SearchInput").val($(this).text());
    $(".search-term").addClass("d-none");
  });
  
  $(".search-btn").click(function (e) {
    e.preventDefault();
     search_item() ;
     $('#search_containers')[0].scrollIntoView({
      behavior: 'smooth',block:'start'
 });

    })
   function search_item (page) {
    
    $("#search-form").removeClass("active");
    $("#search_main_container").removeClass("d-none");
    let searchVal = $("#SearchInput").val();

    if (searchVal != "") {
      $.post(
        "database/search.php",
        { action: "search", data: searchVal , "page_no" : page },
        function (data) {
               $("#search_gallery").html(data)
        }
      );
    }
  };
  // search pagination ajax start here
  $(document).on("click", "#SearchPagination", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    
    search_item(id);
  });
}); // main bracket of jquery
// this ajax used to register new user
function indexPage() {
  register_form.reset();
  window.location.href = "index.php";
}
function register_function() {
  let alert_Message = document.getElementById("message");
  const register_form = document.getElementById("register-form");
  register_form.addEventListener("submit", (e) => {
    e.preventDefault(); // preventing form from submitting  , form without refresh form submit ho ga
  });

  // let start ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "database/sign_up.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == true) {

          window.location.href = "index.php";
        } else {
          alert_Message.style.display = "block";
          alert_Message.innerHTML = data;
        }
      }
    }
  };
  var form_data = new FormData(register_form);
  xhr.send(form_data);
}
$("#message").hide();
function login() {
  const login_form = document.getElementById("login-form");
  login_form.onsubmit = (e) => {
    e.preventDefault(); // preventing form from submitting  , matalb form ab submit kr sagta hy
  };

  // let start ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "database/sign_in.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data2 = xhr.response;
        if (data2 === "success") {
          window.location.href = "index.php";
          console.log(data2);
        } else {
          console.log(data2);
          $("#message").fadeIn("fast").html(data2).delay(2000).fadeOut(1000);
        }
      }
    }
  };
  let form_data2 = new FormData(login_form);
  xhr.send(form_data2);
}

// logout ajax here
$(document).ready(function () {
  $(document).on( "click" , "#logout" ,  function (e) { 
    e.preventDefault();
    
    $.ajax({
      url: "database/logout.php",
      type: "POST",
      success: function (data) {
        
        if (data == true) {
        console.log("logout")  
          window.location.href = "index.php";
        }
      },
    });
  
});
});
