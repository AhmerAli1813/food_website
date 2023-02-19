<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
          
      if($_POST["action"]  == "get"){
        $form = '';  
        $u_id = $_POST["id"];
        $sql = "SELECT r.u_id, r.unique_id , r.Name ,r.email , r.password, r.image , r.role_id ,r.status FROM `register` as r  WHERE u_id = '$u_id'";
         $q=$conn->query($sql);
              if(mysqli_num_rows($q)){
          
                  $data=mysqli_fetch_assoc($q);
                          $form .= '  <form  id="userEditForm" action="js/database/userUpdate.php" method="post"  accept-charset="multipart/form-data" >      
                              <input type="hidden" name="U_id" value="'.$data["u_id"].'">
                              <input type="hidden" name="UserUniqueId" value="'.$data["unique_id"].'">
                          <input type="hidden" name="UserSts" value="'.$data["status"].'">
                          <input type="hidden" name="action" value="update">
                          <div class="mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="UserName" id="UserName"  placeholder="Name" value="'.$data["Name"].'">
                            
                          </div>
                          <div class="mb-2">
                            <label for="" class="form-label">Email</label>
                            
                            <input type="email" class="form-control" name="UserEmail" id="UserEmail"  placeholder="email" value="'.$data["email"].'">
                            
                          </div>
                          <div class="mb-2">
                              <label for="" class="form-label">Role</label>
                              <select class="form-select form-select-lg" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" name="UserRole" id="UserRole">';
                                  $q2 = $conn->query("SELECT * FROM `role`");
                                      while($role =   mysqli_fetch_assoc($q2)){
                                                  if($role["role_id"] == $data["role_id"] ){
                                                      $selected = "selected";
                                                  }else{
                                                      $selected ="";
                                                  }
                                          $form .= '<option '.$selected.'  value="'.$role["role_id"].'">'.$role["role_name"].'</option>';               
                                      }
                          
                                  
                              $form .='</select>
                                  </div>
                                  <div class="mb-2">
                                    <label for="" class="form-label">Choose Image</label>
                                    <input type="file" class="form-control" name="UserImg" id="UserImg" placeholder="" value="'.$data["image"].'">
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" id="userSubmit" class="btn btn-primary">Save</button>
                                  </div>
                                  </div>
                              </form>';
                    
              }
              echo json_encode( ["type"=>"success" , "data"=>$form] , true);
      }
      if($_POST["action"] == "del"){
              $id = $_POST["id"];
              $q=$conn->query("DELETE FROM `register` WHERE `u_id` = '$id'");
              if($q){
                echo json_encode( ["type"=>"success" , "msg"=>"delete Successfully"] , true);
              }else{
                echo json_encode( ["type"=>"success" , "msg"=>"Something wrong"] , true);
              }
          }
}

