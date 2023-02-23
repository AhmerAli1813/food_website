
$(document).ready(function () {
  cardsLoad();
  chartLoad()
  checkUserLogin();
showTable();
jsonFilesUpdate();
function response (res){
  
  if(res != undefined){
  var a = res;
  // console.log(a) 
    return a;
  }

}
function jsonFilesUpdate() {
  $.ajax({
    type: "POST",
    url: "../database/jsonFile.php",
    data: {
      json_file: [
        "catJson",
        "sctJson",
        "userJson",
        "bannerJson",
        "productJson",
        "cartJson",
        "stock"
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
  $(document).on("click" , ".cards_box" , function(){
    let table = $(this).data("tbl");
    let title = $(this).data("title");
    let modalID = $(this).data("form-modal");
    let url = "js/database/" + table;
    let data = {"action" : "loadTable"}
    window.localStorage.setItem("url" , url );
    window.localStorage.setItem("TableName" , title );
    window.localStorage.setItem("modalId" , modalID );
    MyTable("POST" , url ,data,"json" ,"  ")
    $("#DpanelTable .table_heading").html(title+ " Data" )
    $("#DpanelTable .Add_btn").html("Add "+ title )
    $("#DpanelTable .Add_btn").data("modal" , modalID )
    $('#DpanelTable')[0].scrollIntoView({
      behavior: 'smooth',block:'end'
 });
})

  function checkUserLogin() {
        
        var data = "<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>";  
        $.ajax({
          type: "GET",
          url: "../database/user_check_login.php",
          data : {action : "check" },
          dataType : "json",
          success: function (response) {
            if(response.login == false){
              data =`<a href='login.php'  >Sign in</a> <a href='register.php'  >sign up</a>`;
              
              
              console.log("please login kro");
              alert("please login kro");
            }else{
              if(response.data.role_id == 1){
                        console.log("welcome admin")
                        $(".userImg").attr("src" , `../database/upload/${response.data.image}` )
                        
                        $(".userName").html(response.data.Name)
                      }else{
                          console.log("u are not admin")
                          alert("u are not admin")
    
                  }
                }
              },  
          error: function (response) {
            console.log(response);
          },
        });
      }
      
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
      function cardsLoad(){
        data = {"action" : "cards"}
        myAjax("POST" , "js/database/cards.php" , data , "json" , "#card_row");

      }  

function chartLoad(){
let  data = {"action" : "charts"}
        myAjax("POST" , "js/database/cards.php" , data , "json" , "#charts_row");

}
      function myAjax(type ,url ,data,dataType,res_id){
        $.ajax({
          type: type,
          url: url,
          data: data,
          dataType: dataType,
          success: function (response) {
            console.log(response)
            if(res_id !=""){
           $(res_id).html(response.data); 
           $(".sidebar-item #table").html(response.link);
            
           
            }
            
            
          }
        });
      };
      
// showing tables      
function showTable(data){
 let url = window.localStorage.getItem("url"),
  modalID = window.localStorage.getItem("modalId"),
        title = window.localStorage.getItem("TableName");
  $("#DpanelTable .table_heading").html(title+ " Data" );
  $("#DpanelTable .Add_btn").html("Add "+ title );
  $("#DpanelTable .Add_btn").data("modal" , modalID );
  MyTable("POST" , url , data , "json" , "#DpanelTable");
}
// pagination start heare
      $(document).on("click" , "#pageNo" , function(e){
                  e.preventDefault();
                 let page_no = $(this).data("page-no")
                  pagination(page_no)
      })
      function pagination(pageNo){
            let url = window.localStorage.getItem("url");
            let PageNo = pageNo;
            let pageLength = window.localStorage.getItem("pageLength");
            let Data = {"start" :PageNo , "length" : pageLength};
            showTable(Data);          

      };
      //  how many  entry show in one table 
      $("#entity_slc").change(function (e) { 
        e.preventDefault();
      
       let limit = $(this).val();
       console.log("enity " + limit)
       entity_per_page(limit)
})
    function entity_per_page(limit){
        var Limit_per_page = limit;
        var data= {"Limit_per_page" : Limit_per_page};
        showTable(data);
    };
    // table searching start here
    $("#TableSearchInput").keyup(function () { 
      let Val = $(this).val();
        let data =  {"search" :Val}
              
              showTable(data);
    });

    // table sorting start here
$(document).on("click" , "#DpanelTable table thead  th" , function(){
      let column = $(this).data("table-th");
      let by = $(this).data("by");
      
       if(by != "DESC"){ 
        $(this).data("by" , "DESC");
         by = "DESC";
        console.log(by)
      }else{ 
      $(this).data("by" , "ASC")
          by = "ASC";
        };

        let Data = {"order" : {"columns":column, "dirs" : by}}
        console.log(Data);   
        sortingTables(Data)
            
} )
    function sortingTables (e){
      let Url = window.localStorage.getItem("url")
      $.ajax({
        type: "POST",
        url: Url,
        data: e,
        dataType: "json",
        beforeSend: function () {
          $(".loading_div").addClass("active")
        },             
        success: function (response) {
          console.log(response)
          createTable(response , "#DpanelTable")
        }
      });
    }
// table ajax here
function MyTable(type ,url ,data,dataType,res_id){
  // var tableRow = ``;
  $.ajax({
    type: type,
    url: url,
    data: data,
    dataType: dataType,
    complete: function () {
      $('#spinner-div').hide();//Request is complete so hide spinner
  },
    success: function (response) {
          createTable(response , res_id)
      
    }
  });
};
// table creating here
 function createTable(response , res_id){
  
  var tableRow = ``;
  if(response.type == "success"){
   
    var Cols = response.data.col;
    var Rows = response.data.row;
    var tableCol =`<tr>`;
    for (let i of Cols){
          tableCol += `${i}`;   
    }
        tableCol +=`</tr>`;
          var trId =0;
    for(let i of Rows){
      trId++
      tableRow+=`<tr data-trId="${trId}">`;
      for(let j of i){
          tableRow+=`<td>${j}</td>`;
      }
      tableRow+=`</tr>`;
    };
    
    // pagination show
    
    let pageLink = "";
    let limit_per_page = response.data.length ,
          limit__per_pageLink = 5;
     
    let total_records = response.data.recordsTotal;
    let filterRecords = response.data.recordsFiltered;
    let page_no = parseInt(response.data.start);
    let total_page = Math.ceil((total_records/limit_per_page));
     window.localStorage.setItem("pageLength" , limit_per_page);
    // console.log(`totalRecords : ${total_records} TotalPage : ${total_page} limit per page : ${limit_per_page}  page no : ${(page_no)}  prev : ${(page_no -1)} next : ${(page_no  + 1)} `)
    if(filterRecords !=false){
                          if(page_no >1){
                          pageLink += '<li class="page-item"><a class="page-link" id="pageNo" data-page-no="'+(page_no - 1)+'" >prev</a></li>'
                          }
                          var start = page_no-2,
                          end = page_no+2;

                          if(end>total_page){
                          start-=(end-total_page);   //{--------if total page value is greater then 5 then end subtract total page
                          end=total_page;                   // Example hy jani     
                                                      //  var page_no = 5;
                                                      //  var total_page = 10;
                                                      //  var start = page_no-2, //start = 3
                                                      //     end = page_no+2;    // end = 7 
                                                      // if(end>total_page){ //here total page is greater then end value condition true
                                                      //     start-=(end-total_page);   // now start value become  1 how? start -=  (7-10) = -3  -- become + start = 3  
                                                      //     end=total_page;            // now end value become is end = 10;
                                                      // }
                                                      // now we start  loop for( i = start (i = 3) or i > end ( 3 >10)  ) {......} 
                                                      // console.log(start , end)
                                                      // ---------}
                          }
                          if(start<=0){
                          end+=((start-1)*(-1));
                          start=1;
                          }

                          end = end>total_page?total_page:end;
                          console.log(`end wali link ${end} start wali ${start}` )
                          for (let i = start; i <= end ; i++) {
                          if(i ==page_no){
                          var active = "active"; 
                          }else{
                          active = "";
                          }

                          pageLink += '<li class="page-item '+active+'"><a class="page-link" id="pageNo" data-page-no="'+i+'" >'+i+'</a></li>';
                          }
                          if(total_page > page_no){
                          pageLink += '<li class="page-item"><a class="page-link" id="pageNo" data-page-no="'+(page_no + 1)+'" >next</a></li>'
                          }
                }else{
                 console.log("no pagination") 
                }
        $(`${res_id} table thead`).html(tableCol);
 $(`${res_id} table tbody`).html(tableRow);
 if(filterRecords !=false){
  $(`${res_id} span.record`).html(`Showing ${filterRecords} records of ${total_records}`)    
 }
 if(response.data.button == true){
  var button = "";
  var btn = response.data.buttonName;
  for(var i =0; i<btn.length; i++){
 console.log()
 button += btn[i];
 
  
  }
 }
;  
 $(`${res_id} .pagination`).html(pageLink);
 $(`${res_id} span.record`).html(button);
  }else{
    console.log("error")
    
  }
 };

 //     inserting or editing data in database with ajax

 let formModalName = window.localStorage.getItem("TableName"),
 form = `${formModalName}Form`,
 formBtn = `#${formModalName}Submit`,
  editBtn = `#EditBtn`,
  deleteBtn = `#${formModalName}DelBtn`,
  ModalName = `#${formModalName}Modal`;
   console.log(`modalname = ${formModalName} , form = ${form} , formButton = ${formBtn} `)
           
// insert update or deleted crud start here  
//   getting records of item on dehave Id  click edit button
$(document).on("click" , editBtn  , function(){
  
  let id = $(this).data("id"),
   formModalName = window.localStorage.getItem("TableName"),
  url = `js/database/action/${formModalName}Action.php`,
  ModalNames = `#EditModal`;
  
  console.log(id)
  let data = {"action" : "get" , "id" :id}
        $.ajax({
          type: "POST",
          url: url,
          data: data,
          dataType: "json",
          success: function (response) {
            console.log(response)
            if(response.type == "success"){
                  modalFire(ModalNames);
                  $(`#FormEdit`).html(response.data)
                 
                  showTable();                    
            }
            
          },
          error : function(err){
           console.log(err)
            console.log(err.responseText)
          }
        });
})
//this function  is used insert and update crud in php, dynamic form single time we making  they getting all  attribute from form  our work is very simple  
$(document).on("submit", `form`, function (e) { 
  e.preventDefault();

 
 
 let formModalNames = window.localStorage.getItem("TableName"),
  modalId = window.localStorage.getItem("modalId");  

          console.log(formModalNames);
              var formId = $(this).attr("id");
            
          var Data = new FormData(document.getElementById(formId));
          console.log(Data)        ;
          $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data : Data,
            dataType: "JSON",
          processData: false,
          contentType: false,
          success: function (data)
                  {
                    console.log(data);
                      if(data.type =="success"){
                        // $(`${ModalName}`).modal("hide");   
                          modalHide(modalId);            
                      }
                      message(data.type, data.msg);
                      cardsLoad();
                          showTable();
                          
                  },
                  error: function (err)
                  {
                      console.log(err)
                      console.log(err.responseText);
          
                  }
          });

});

//dynamic deleted button
$(document).on("click" ,"#delBtn" , function(e){
  e.preventDefault();
  // alert();
      let id = $(this).data("id"),
      url = `js/database/action/${formModalName}Action.php`,
      Data = {"action" : "del" , "id" :id};
console.log(Data);      
    
      $(this).parent().parent().hide();
  $.ajax({
    type: "POST",
    url: url,
    data: Data,
    dataType: "json",
    success: function (response) {
      console.log(response)
      if(response.type == "success"){
            message(response.type ,response.msg)
            cardsLoad()
            
      }
    },
    error : function(err){
      console.log(err.responseText)
    }
  });
 
})


 // alert msg
function message( types, txt){
  console.log(`type = ${types} , Text = ${txt}`)
    $("#Model_txt").text(txt);
    $("#MsgModel .modal-title").text(types);
    $("#MsgModel").modal("show")
    window.setTimeout(function(){
      $('#MsgModel').modal('hide');
   }, 2000)

  
}

$(document).on("click" , ".Add_btn" , function (){
  let ModalId = $(this).data("modal")
modalFire(ModalId);
});

//checkbox button Preform show/hide & block products banner and user
$(document).on("change" , "input[name=check]" , function (){
    let stsVal =  $(this).val();
    // if(stsVal=="hide"){
    //   $(this).val("show"); 
    // }else if(stsVal=="show"){
    //   $(this).val("hide"); 
    // }
//  if(stsVal=="on"){
//   $(this).prop('checked',true);
//   $(this).val("show");
//  }else
//   if (!$(this).is(':checked')) {
//     $(this).val("show");
   
//   }else
//   {
//     $(this).val("hide");
   
//   }
 

console.log(stsVal);
});

$(document).on("click" , "#find_id" , function(e){
e.preventDefault();
let url = $(this).data("url")
, id = $(this).data("id");
var data = {"find":id};
MyTable("post" , `${url}` , data , "json" , "#DpanelTable")



  
});

$(document).on("dblclick" , "#find_id" , function(e){
e.preventDefault();

var data = "";
MyTable("post" , "js/database/proInv.php" , data , "json" , "#DpanelTable")


  
});
$(document).on("click" , "#undo_btn" , ()=>{
  showTable();

  MoneyEntryLoad();
})
function modalFire(id){
  $(id).modal("show"); 
}

function modalHide(id){
  $(id).modal("hide"); 
}

fetch("../database/js/json/Cat_Json_file.json").then((response) => {
  if (response.ok) {
    return response.json();
  }
  throw new Error('Something went wrong');
})
.then((responseJson) => {
  let option = `<option selected> select </option>`;
      console.log(responseJson[2]["cat_name"])
      for(let i=0; i<responseJson.length; i++){
          option +=`<option value="${responseJson[i]["cat_id"]}"> ${responseJson[i]["cat_name"]}</option>`;
      };
    $("#cat_select_input").html(option);  
    $("#EditCat_select_input").html(option);  
    $("#bCat_select_input").html(option);  
    $("#sCat_select_input").html(option);  
    $("#stockCat_select_input").html(option);  
})

$(document).on("change" , "select[name='Cat_id']" , function()
{
  let cat_id = $(this).val(), id = $(this).attr("id");
  console.log(cat_id)
fetch("../database/js/json/subCat_Json_file.json").then((response) => {
  if (response.ok) {
    return response.json();
  }
  throw new Error('Something went wrong');
})
.then((responseJson) => {
  let option = `<option selected> select </option>`;
      
      for(let i=0; i<responseJson.length; i++){
          if(responseJson[i]["cat_id"] == cat_id){
            option +=`<option data-cat-id="${responseJson[i]["cat_id"]}" value="${responseJson[i]["scat_id"]}"> ${responseJson[i]["scat_name"]}</option>`;
          }
        
      };
      
    // $(`#${id}`).removeAttr("disabled");  
    // $(`#${id}`).html(option);  
      
    $("#EditScat_select_input").removeAttr("disabled");  
    $("#EditScat_select_input").html(option);  
    $("#bScat_select_input").removeAttr("disabled");  
    $("#bScat_select_input").html(option);  
    $("#StockScat_select_input").removeAttr("disabled");  
    $("#StockScat_select_input").html(option);  
})

  

})
$(document).on("change" , "select[name='Scat_id']" , function()
{
  let scat_id = $(this).val() , id = $(this).attr("id");
  console.log(scat_id);
fetch("../database/js/json/product_json_file.json").then((response) => {
  if (response.ok) {
    return response.json();
  }
  throw new Error('Something went wrong');
})
.then((responseJson) => {
  let options = `<option > select </option>`;
      
      for(let i=0; i<responseJson.length; i++){
          if(responseJson[i]["scat_id"] == scat_id){
            var  prize = responseJson[i]["p_prize"]
            console.log(prize)
            options +=`<option value="${responseJson[i]["p_id"]}" selected> ${responseJson[i]["p_title"]}</option>`;
          }
        
      };
      console.log(options)
      
$("#pro_select_input").removeAttr("disabled");  
$("#pro_select_input").html(options);  
$("#EditPro_select_input").removeAttr("disabled");  
$("#EditPro_select_input").html(options);  
$("input[name='pPrize']").val(prize)
})

  

})


// money handel fetch and ajax start here

$(document).on("click" , "#find" , (e)=>{
  e.preventDefault();

  var id = $("#inv_id_f").val() , cash_type = $("#cash_type_f").val() , file_type = $("#file_type_f").val()  ;
  console.log(`id  ${id}  cash_type ${cash_type} ,  file_type  ${file_type} `); 
  
  $("input[name = id]").val(id)
  $("input[name = cash_type]").val(cash_type)
  if(file_type == "sell"){
    var fileName =   "cart_json_file.json"; 
  }else if (file_type == "stock"){
    fileName = "pro_stock_json_file.json";
  }else{
    message("alert" , "please select file type");
  }
  
  $("input[name = cash_in]").attr("disabled" , false);
  $("input[name = cash_out]").attr("disabled" , false);
  $("input[name = refund]").attr("disabled" , false);
  $("input[name = id]").attr("disabled" , false);

  // $("#inv_id").val(id);
fetch(`../database/js/json/${fileName}`).then((response) => {
  if (response.ok) {
    return response.json();
  }
  throw new Error('Something went wrong');
})
.then((responseJson) => {
  
      
      for(let i=0; i<responseJson.length; i++){
        if(responseJson[i]["pro_id"] == id){
          
          var prize = responseJson[i]["qty"] * responseJson[i]["prize"],
          tPrize = ((responseJson[i]["tax"]/100 * prize) + prize);
              if(cash_type == "cash-in"){
                $("input[name = cash_in]").val(tPrize);
                $("input[name = cash_out]").val("0");
                $("input[name = refund]").val("0");
        
              }else  if(cash_type == "cash-out"){
                  
                $("input[name = cash_out]").val(tPrize);
                $("input[name = cash_in]").val("0");
                    $("input[name = refund]").val("0");
              }else  if(cash_type == "refund"){
                
                $("input[name = refund]").val(tPrize);
                $("input[name = cash_in]").val("0");
                $("input[name = cash_out]").val("0");
              }
                
          break;
        }
      };  
})
});

$(document).on("click", ".MoneyQueryBtn", function (e) {
  var t =  $(this).attr("data-crudType");
  var data = {"action" : t};
  $.post("js/database/moneyHandel.php", data,
    function (data, textStatus, jqXHR) {
      message(data.type , data.msg);
      
      showTable();
     
    },
    "json"
  );

}); 


function MoneyEntryLoad(data){
  if(data == undefined){
    showTable({"action" : "show"})
  }else
  {
    showTable(data)
  }
  

}
MoneyEntryLoad();


  } );//main jquery
  
  