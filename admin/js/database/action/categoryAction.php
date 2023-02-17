<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
          
      if($_POST["action"]  == "get"){
          $cat_id = $_POST["id"];
          $q=$conn->query("SELECT * FROM `catagory` WHERE cat_id = '$cat_id' ");
          if(mysqli_num_rows($q)){
          $form ='';
          $data=mysqli_fetch_assoc($q);
          $form .= ' <form  id="categoryEditForm" action="js/database/catUpdate.php" method="post"  accept-charset="multipart/form-data" >
          <input type="hidden" name="catID" value="'.$data["cat_id"].'">
          <input type="hidden" name="action" value="update">
          <div  class="row">
          <div class="mb-2 col-12">
            <label for="" class="form-label">category Name</label>
            <input type="text" class="form-control" name="catName"  placeholder="category Name" value="'.$data["cat_name"].'"> 
            
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
              $q=$conn->query("DELETE FROM `catagory` WHERE `cat_id` = '$id'");
              if($q){
                echo json_encode( ["type"=>"success" , "msg"=>"delete Successfully"] , true);
              }else{
                echo json_encode( ["type"=>"success" , "msg"=>"Something wrong"] , true);
              }
          }
}

