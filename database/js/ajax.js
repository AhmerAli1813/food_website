$(document).ready(function () {
  banner();
  AllProduct();
  productOneWeekOld();
  OrderFormHtml();
  jsonFilesUpdate();
function message( id , msg){
    $(id).fadeIn("fast").html(msg).delay(4000).fadeOut("slow")
}
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

  function jsonFilesUpdate() {
    $.ajax({
      type: "POST",
      url: "database/jsonFile.php",
      data: {
        json_file: [
          "catJson",
          "sctJson",
          "userJson",
          "bannerJson",
          "productJson",
          "cartJson",
        ],
      },
      success: function (response) {
        console.log(response);
      },

      error: function (response) {
        console.log(response);
      },
    });
  }

  
  function checkUserLogin() {
    $("#adminLink").hide()
    var data = "<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";  
    $.ajax({
      type: "GET",
      url: "database/user_check_login.php",
      data : {action : "check" },
      dataType : "json",
      success: function (response) {
        if(response.action == false){
          data =`<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>`;
          $("#adminLink").hide()
          console.log("false")
        }else{
          if(response.role_id == 1){
                    $("#adminLink").show()
                  }else{
                $("#adminLink").hide()

              }
              console.log(response)
                    data = `<div class="dropdown">
                    <button class="btn dropdown-toggle show" style="outline: none; border:none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img id="user_img" class="card-img" src="database/upload/${response.image}"  alt="${response.Name}">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in show" aria-labelledby="userDropdown" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 126px);">
                            <a class="dropdown-item" href="#">
                            ${response.Name}
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
        $("#user_login_header").html(data);
        
      },
      
      error: function (response) {
        console.log(response);
      },
    });
  }
  checkUserLogin();
  $(document).on("click", "#CartBtn", function () {
        var msgID = $(this).attr("data-msgId")
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

    // cart ajax start
    if (qty <= 5) {
      $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: data,
        datatype: "application/json",
        success: function (response) {
          console.log(response)
          message(msgID , response);
          
          cartCount();
          loadcartTabel();
          grandTotal();
        },
      });
    }
  });

  cartCount();
  // add cart number show
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
        $(".cart_tabel").show();
        grandTotal();
      },
    });
  }
  $(document).on("click", ".cart_show ", function (e) {
    $("#cart_tabel").show();
    e.preventDefault();

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
      success: function (response) {
        $("#g_total").html(response);
      },
      error: function (response) {
        $("#g_total").html(response);
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

      success: function (response) {
        cartCount();
        grandTotal();

        $("#cart_data_show").html(response);
        $(".cart_tabel").show();
        if ((response = "delete")) {
          $(".cart_tabel").hide();
        }
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
  //  confirm to buying
  $(document).on("click", "#buy_cart", function () {
    $.ajax({
      type: "POST",
      url: "database/cart.php",
      data: { action: "buy" },
      success: function (response) {
        if (response == "login") {
          window.location.href = "login.php";
        } else {
          cartCount();
          $("#cart_tabel").html(response).delay(3000).fadeOut("slow");
        }
      },
      error: function (response) {
        console.log(response);
      },
    });
  });

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

  // here we start function of search
  $("#SearchInput").keyup(function () {
    let searchInputVal = $(this).val();

    if (searchInputVal != "") {
      $.post(
        "database/search.php",
        { action: "search_term", data: searchInputVal },
        function (data) {
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
     search_item() 
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
