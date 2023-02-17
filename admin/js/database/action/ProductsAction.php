<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
          
      if($_POST["action"]  == "get"){
          $p_id = $_POST["id"];
          $q=$conn->query("SELECT `p_id`, `cat_id`, `scat_id`, `p_title`, `p_subtitle`, `p_desc`, `p_prize`, `p_image` FROM `product` WHERE p_id = '$p_id'");
          if(mysqli_num_rows($q)){
          $form ='';
          $data=mysqli_fetch_assoc($q);
          $form .= ' <form  id="productsEditForm" action="js/database/ProductsUpdate.php" method="post"  accept-charset="multipart/form-data" >
          <input type="hidden" name="pID" value="'.$data["p_id"].'">
          <input type="hidden" name="action" value="update">
          <div  class="row">
          <div class="mb-2 col-6">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="pTitle"  placeholder="Title" value="'.$data["p_title"].'"> 
            
          </div>
          <div class="mb-2 col-6">
            <label for="" class="form-label">Subtitle</label>
            <input type="text" class="form-control" name="pSubtitle"  placeholder="Subtile" value="'.$data["p_subtitle"].'">
            
          </div>
          <div class="mb-2 col-6">
            <label for="" class="form-label">Prize</label>
            <input type="tel" class="form-control" name="pPrize" value="'.$data["p_prize"].'"  >
            
          </div>
          <div class="mb-2 col-6">
          <label for="" class="form-label">Category</label>
          <select class="form-select form-select-lg" name="Cat_id" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >';
              $q2=$conn->query("SELECT * FROM catagory ");
                  while($row = mysqli_fetch_assoc($q2)){
                    if($row["cat_id"] == $data["cat_id"]){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                    $form.='<option value="'.$row["cat_id"].'" '.$selected.'> '.$row["cat_name"].' </option>';
                  }
          $form.='</select>
      </div>
          <div class="mb-2 col-6">
          <label for="" class="form-label">Sub Category</label>
          <select class="form-select form-select-lg" name="Scat_id" id="EditScat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >
          </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">description</label>
        <textarea class="form-control" name="pDesc" id="" rows="3"  > '.$data["p_desc"].'</textarea>
      </div>
          <div class="mb-2 col-6">
            <label for="" class="form-label">Choose Image</label>
            <input type="file" class="form-control" name="pImg" >
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
      if($_POST["action"] == "del"){
              $id = $_POST["id"];
              $q=$conn->query("DELETE FROM `product` WHERE `p_id` = '$id'");
              if($q){
                echo json_encode( ["type"=>"success" , "msg"=>"delete Successfully"] , true);
              }else{
                echo json_encode( ["type"=>"error" , "msg"=>"Something wrong"] , true);
              }
          }
}

