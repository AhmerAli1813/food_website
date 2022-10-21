// fecthig data form database 

$(document).ready(function () {
    banner();
    AllProduct();
    productOneWeekOld();
    OrderFormHtml();
    function productOneWeekOld(){

        $.ajax({
            type: "POST",
            url: "database/weeklyProduct.php",
            data : {"action" : "OneWeekData"},
            success: function (response) {
                // console.log(response);
                $("#WeeklyProGall").html(response);
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
    function AllProduct(){

        $.ajax({
            type: "POST",
            url: "database/Product.php",
            data : {"action" : "shwAllPro"},
            success: function (response) {
                
                $("#product_gallery").html(response);
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
    function banner(){
        $.ajax({
            type: "POST",
            url: "database/banner.php",
            data: {"action":"ShwBanner"},
            
            success: function (response) {
                $("#banner_Container").html(response);    
            },
            
            error: function (response) {
                console.log(response);
                $("#banner_Container").html("serve is slow");    
            }
        });
    }
    function OrderFormHtml(){
        $.ajax({
            type: "POST",
            url: "database/orderFormHtml.php",
            data: {"action" : "orderFormHtml"},
            
            success: function (response) {
                console.log(response);    
            $("#ShowOrderFormHtml").html(response);    
            },
             
            error: function (response) {
            console.log(response);    
            }
        });
    }

});
//add to cart ajax start here
$(document).ready(function () {
 
    $(document).on("click" , "#CartBtn" , function(){
        $("#p_message").hide();
        var id = $(this).attr("data-id");
        var title = $("#title" + id).val();
        var image = $("#image"+ id).val();
        var prize = $("#prize"+ id).val();
        
        var qty = $("#qty_input"+ id).val();
        var data = {"p_id":id, "title":title, "image":image , "prize" : prize , "qty" : qty , "action":"add"}
        
        // cart ajax start
if(qty <=5){

    $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: data,
        datatype : "application/json",
            success: function (response) {
               $("#p_message").show().fadeIn("fast").html(response).delay(3000).fadeOut("slow");
               cartCount();
               loadcartTabel();
               grandTotal();
            }
        });
        
    }
    });

    cartCount();
    // add cart number show 
    function cartCount(){
        $.ajax({
            type: "POST",
            url: "database/cart.php",
            data : {"action" : "count"},
            success: function (response) {
                $("#CartCount").html(response)
            }
        });
    }

    //  showing  which  type of data user add to cart shopping
    $("#cart_tabel").hide();
    
    
    loadcartTabel();
function loadcartTabel(){
    $.ajax({
        type: "POST",
        data: {"action":"show"},
        url: "database/cart.php",
        success: function (response) {
            $("#cart_data_show").html(response)
            $(".cart_tabel").show();
            grandTotal();
            
        }

    });
    
};
$(document).on("click" , ".cart_show " , function(e){
    $("#cart_tabel").show();
    e.preventDefault();
  
loadcartTabel();

});
   
var qty = 1;
   
   // increase the value of qty filed
   $(document).on("click" , "#up_val",function () {
       var id = $(this).attr("data-id");
     var qty_val = $("#qty_input" + id);

  qty = qty_val.val();
     qty++
       
     if(qty <6 && qty >0){
       qty_val.val(qty)
      }

  });
  
  // decrease the value of qty filed

  $(document).on("click" , "#down_val",function () {
      var id = $(this).attr("data-id");
     var qty_val = $("#qty_input" + id);
      qty = qty_val.val();
   qty--;
   if(qty >0 || qty>1){
       qty_val.val(qty)
   }
    
 });
   $(document).on("click" , "#WkProUpVAl",function () {
       var id = $(this).attr("data-id");
       console.log(id)
     var qty_val = $("#WkProQtyInput" + id);

  qty = qty_val.val();
     qty++
       
     if(qty <6 && qty >0){
       qty_val.val(qty)
      }

  });
  
  // decrease the value of qty filed

  $(document).on("click" , "#WkProDownVAl",function () {
      var id = $(this).attr("data-id");
      console.log(id)
     var qty_val = $("#WkProQtyInput" + id);
      qty = qty_val.val();
   qty--;
   if(qty >0 || qty>1){
       qty_val.val(qty)
   }
    
 });

 
 function grandTotal(){
    $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: {"action" : "gTotal"},
        success: function (response) {
            
            $("#g_total").html(response)
        },
        error: function (response) {
            
            $("#g_total").html(response)
        }
    });
 
 }
  

//  add to cart delete button ajax
$(document).on("click" , "#Delete" , function(){
    
    id = $(this).attr("data-delete");
    var data = "";
    $("#cart_data_show").html(data);
    $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: {"p_id": id , "action" : "delete"},
        
        success: function (response) {
            cartCount();
            grandTotal();
            
            
            $("#cart_data_show").html(response)
            $(".cart_tabel").show();
            if(response = "delete"){
                $(".cart_tabel").hide();
                
            }
            
        },
        error: function (response) {
            
        }
    });
});


$(document).on("click" , "#delete_all" , function(){
  
//   alert("delelte all sessaion")
 deleteAll();
});
// deleteAll();
function deleteAll(){

    $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: { "action" : "del_all"},
      
        success: function (response) {
            
            cartCount();
            grandTotal();
            $(".cart_tabel").show();
            // window.location.href = "index.php"
            $("#cart_data_show").html(response)
      },
      error: function (response2) {
          console.log(response2)
      }
  });
}
//  confirm to buying
$(document).on("click" , "#buy_cart" , function(){
    $.ajax({
        type: "POST",
        url: "database/cart.php",
        data: {"action":"buy"},
        success: function (response) {
          if(response == "login"){
            window.location.href = "login.php";
            }else{
               
                 cartCount();
              $("#cart_tabel").html(response).delay(3000).fadeOut("slow");

              
        
            }
            },
        error: function (response) {
            console.log(response)
        }
    });
})

}); // main barkect of jquery




