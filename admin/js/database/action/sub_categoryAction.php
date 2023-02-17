<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
  
      if($_POST["action"]  == "get"){
        $form ='';
          $cat_id = $_POST["id"];
          $q=$conn->query("SELECT * FROM `sub_category` WHERE scat_id = '$cat_id'");
          if(mysqli_num_rows($q)){
          
          $data=mysqli_fetch_assoc($q);
          $form .= ' <form  id="categoryEditForm" action="js/database/SubcatUpdate.php" method="post"  accept-charset="multipart/form-data" >
          <input type="hidden" name="scatID" value="'.$data["scat_id"].'">
          <input type="hidden" name="action" value="update">
          <div  class="row">
          <div class="mb-2 col-12">
            <label for="" class="form-label">category Name</label>
            <input type="text" class="form-control" name="scatName"  placeholder="category Name" value="'.$data["scat_name"].'"> 
            
          </div><div class="mb-2 col-12">
                              <label for="" class="form-label">Category</label>
                              <select class="form-select form-select-lg" name="Cat_id" id="sCat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >
                              ';
                                      $q2=$conn->query('SELECT * FROM `catagory`');
                                      while($option = mysqli_fetch_assoc($q2)){
                                          if($data["cat_id"] == $option["cat_id"]){
                                            $selected = "selected";
                                          }else{$selected = "";}
                                                  $form.='<option '.$selected.'  value="'.$option["cat_id"].'" >'.$option["cat_name"].'</option>';
                                      }
                              $form.='
                              </select>
                              </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save</button>
          </div>
          </div>
        </div>
      </form>';
              }
        echo json_encode( ["type"=>"success" , "data"=>$form] , true);
      }
      if($_POST["action"] == "del"){
              $id = $_POST["id"];
              $q=$conn->query("DELETE FROM `sub_category` WHERE `scat_id` = '$id' ");
              if($q){
                echo json_encode( ["type"=>"success" , "msg"=>"delete Successfully"] , true);
              }else{
                echo json_encode( ["type"=>"success" , "msg"=>"Something wrong"] , true);
              }
          }
}

  