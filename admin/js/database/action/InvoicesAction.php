<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
          
    if($_POST["action"]  == "get"){
         $p_id = $_POST["id"];
           $q=$conn->query("SELECT  inv_id, `status` as sts FROM `card` WHERE inv_id = '$p_id'");
          if(mysqli_num_rows($q)){
          $form ='';
          $data=mysqli_fetch_assoc($q);
          $form .= ' <form  id="invEditForm" action="js/database/action/InvoicesAction.php" method="post"  accept-charset="multipart/form-data" >
          
          <input type="hidden" name="action" value="update">
          <div  class="row">
          <div class="mb-2 col-12">
          <label for="" class="form-label">Invoice Id</label>
          <input type="text" class="form-control" name="InvId"  placeholder="Title" value="'.$data["inv_id"].'"> 

          </div>
          
          <div class="mb-2 col-12">
          <label for="" class="form-label">Sub Category</label>
          <select class="form-select form-select-lg" name="Sts" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >
              <option>pending</option>
              <option>Approved</option>
              
          </select>
          </div>


          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
          </div>
          </div>
          </div>
          </form>';
          }
          echo json_encode( ["type"=>"success" , "data"=>$form] , true);
    }
    if($_POST["action"] == "update"){
     $id =  $_POST["InvId"];
     $sts =  $_POST["Sts"];
     
      $q2 = $conn->query("UPDATE `card` SET `status`='$sts' WHERE inv_id = '$id' ");
    if($q2){
      echo json_encode( ["type"=>"success" , "msg"=>"successfully updated"] , true);
    }else{
      echo json_encode( ["type"=>"error" , "msg"=>"can't updated your record"] , true);
    }
    }
    


}

