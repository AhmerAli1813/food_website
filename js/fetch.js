
function cat_value(){
    let id  = document.getElementById("catVal").value;
    document.getElementById("product_val").innerHTML = "";
  var product_ipt =  document.getElementById("product_val");
  product_ipt.disabled = false;
  if(id == "no"){
            product_ipt.disabled = true;

        }
    fetch("./database/js/json/product_json_file.json")
.then(response=>response.json() )
.then(json =>  json.forEach(element => {
      

    if(element["cat_id"] == id){
        var data =  [`<option data-scatId ='${element["scat_id"]}' value='${element["p_id"]}'>${ element["p_title"] }</option>`];
                
                document.getElementById("product_val").innerHTML += data;     
            
        }
    
}))
  
}

