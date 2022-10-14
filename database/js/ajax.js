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
            }
        });

    });

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
});
cartCount();