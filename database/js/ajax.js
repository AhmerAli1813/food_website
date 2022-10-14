$(document).ready(function () {
 
    $(document).on("click" , "#CartBtn" , function(){
        $("#p_message").hide();
        var id = $(this).attr("data-id");
        var title = $("#title" + id).val();
        var image = $("#image"+ id).val();
        var prize = $("#prize"+ id).val();
        var qty = $("#qty"+ id).val();
        var data = {"p_id":id, "title":title, "image":image , "prize" : prize , "qty" : qty}
        
        // cart ajax start
        $.ajax({
            type: "POST",
            url: "database/cart.php",
            data: data,
            datatype : "application/json",
            success: function (response) {
               $("#p_message").show().fadeIn("fast").html(response).delay(3000).fadeOut("slow");
               cartCount();
               loadcartTabel();
            }
        });

    });

    cartCount();
    // add cart number show 
    function cartCount(){
        $.ajax({
            type: "GET",
            url: "database/cartCount.php",
            success: function (response) {
                $("#CartCount").html(response)
            }
        });
    }

    //  showing  which  type of data user add to cart shopping
    $("#cart_tabel").hide();
    
    
    loadcartTabel();
function loadcartTabel(){
  $("#cart_tabel").show();
    $.ajax({
        type: "GET",
        data: "cart_shop",
        url: "database/cartload.php",
        success: function (response) {
            $("#cart_data_show").html(response)
            $(".cart_tabel").show();
            
        console.log(response)
    }
})
   
}
$(document).on("click" , "#card_shop_btn " , function(e){
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
     
      //calculate total prize
      var Total_Prize = $("#total_prize" + id);
      var item_prize = $("#prize" + id).attr("data-prize");
      var total = qty * item_prize;
      Total_Prize.html(total);  
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
  
      //calculate total prize
      var Total_Prize = $("#total_prize" + id);
      var item_prize = $("#prize" + id).attr("data-prize");
      var total = qty * item_prize;
      Total_Prize.html(total);  
 });
});
