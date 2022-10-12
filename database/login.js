const form = document.getElementById("login-form"),
registerBtn = document.getElementById("signin");

function mylocation () {
    form.reset();
    window.location.href = "index.php";
}

        let alert_Message = document.getElementById("message");
        
        form.onsubmit = (e) =>{
            e.preventDefault(); // preventing form from submitting  , matalb form ab submit kr sagta hy
        }
        registerBtn.onclick = ()=>{
            // let start ajax 
            let xhr =  new XMLHttpRequest();
            xhr.open("POST" , "database/sign_up.php", true);
            xhr.onload = () =>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            if(data == true){
                                  
                                mylocation();
                                
                            
                            }else{
                                alert_Message.style.display = "block";
                                alert_Message.innerHTML = data;
                            }
                        }
                    }
            };
            let form_data = new FormData(form);
                 xhr.send(form_data);   
        };

        

