
// this ajax used to register new user
const register_form = document.getElementById("register-form"),
 login_form = document.getElementById("login-form");


function indexPage () {
    register_form.reset();
    window.location.href = "index.php";
}

        let alert_Message = document.getElementById("message");
        
        
       function  register_function() {
            
            register_form.addEventListener("submit" , (e)=> {
                e.preventDefault(); // preventing form from submitting  , form without refresh form submit ho ga
            });
                
            // let start ajax 
            let xhr =  new XMLHttpRequest();
            xhr.open("POST" , "database/sign_up.php", true);
            xhr.onload = () =>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            if(data == true){
                                indexPage();
                                
                            
                            }else{
                                alert_Message.style.display = "block";
                                alert_Message.innerHTML = data;
                            }
                        }
                    }
            };
            var form_data = new FormData(register_form);
                 xhr.send(form_data);   
        };

        


        
        
                let sign_in_alert_msg = document.getElementById("message");
                
                login_form.onsubmit = (e) =>{
                    e.preventDefault(); // preventing form from submitting  , matalb form ab submit kr sagta hy
                }
                $("#message").hide()
                function login(){
                    // let start ajax 
                    let xhr =  new XMLHttpRequest();
                    xhr.open("POST" , "database/sign_in.php", true);
                    xhr.onload = () =>{
                            if(xhr.readyState === XMLHttpRequest.DONE){
                                if(xhr.status === 200){
                                    let data2 = xhr.response;
                                    if(data2 === "success"){
                                        window.location.href = "index.php";
                                    }else{
                                        $("#message").fadeIn("fast").html(data2).delay(2000).fadeOut(1000);  
                                    }
                                }
                            }
                    };
                    let form_data2 = new FormData(login_form);
                         xhr.send(form_data2);   
                };
        
                
        
        

        // logout ajax here
       const logout_btn = document.getElementById("logout");
    //    logout_btn.addEventListener("click" , logout())
      function logout(){
            
         $(document).ready(function(){
                $.ajax({
                    url : "database/logout.php",
                    type : "POST",
                    success : function (data){
                        if(data === "success"){
                                alert("get of" + data)
                            // indexPage();
                        }else{
                            window.location.href = "index.php"

                        }
                    }


                })
         }) ;  
        }
        
//  add to whitelist ajax
function add_to_whitelist_btn(){
            // let start ajax 
            $(document).ready(function () {
                $.ajax({
                    url : "database/add_to_whitelist.php",
                    type : "POST",
                    success : function (data){
                        console.log(data);
                    }


                })

            });
};





// function add_to_card_btn(card){
//     alert()
//     const Cart_Form = document.getElementById("cart_form");
//     Cart_Form.addEventListener("submit" , (e)=> {
//         e.preventDefault(); // preventing form from submitting  , form without refresh form submit ho ga
//     });
//             // let start ajax 
//             let xhr =  new XMLHttpRequest();
//             xhr.open("POST" , "database/cart.php", true);
//             xhr.onload = () =>{
//                     if(xhr.readyState === XMLHttpRequest.DONE){
//                         if(xhr.status === 200){
//                             let data = xhr.response;
//                             document.getElementById("p_message").innerHTML = data;
//                         }
//                     }
//             };
//             var form_data = new FormData(Cart_Form);
//                  xhr.send(form_data);   
//         };   

