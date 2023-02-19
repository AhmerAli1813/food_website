<?php
include '../../../../database/conf.php';

if(isset($_POST["action"])){
          
      if($_POST["action"]  == "get"){
          $p_id = $_POST["id"];
          $q=$conn->query("SELECT * FROM `pro_stock` WHERE ps_id = '$p_id'");
          if(mysqli_num_rows($q)){
          $form ='';
          $data=mysqli_fetch_assoc($q);
$form .= ' <form  id="stockEditForm" action="js/database/proStockUpdate.php" method="post" accept-charset="multipart/form-data" >
                                                          
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="psID" value="'.$data["ps_id"].'">
                            <div class="row">





                              <div class="col-6">

                            <div class="mb-2">
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
                            </div>



                            <div class="col-6">


                            <div class="mb-2">
                            <label for="" class="form-label">Sub Category</label>
                            <select class="form-select form-select-lg " name="Scat_id" disabled id="EditScat_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >';
                            $q2=$conn->query("SELECT cat_id, scat_id ,scat_name FROM sub_category ");
                            while($row = mysqli_fetch_assoc($q2)){
                              if($row["scat_id"] == $data["scat_id"]){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              $form.='<option value="'.$row["scat_id"].'" '.$selected.'> '.$row["scat_name"].' </option>';
                            }
                    $form.='</select>
                            </div>
                            </div>
                              
                            <div class="mb-2 col-6">
                            <label for="" class="form-label">product</label>
                            <select class="form-select form-select-lg " name="p_id" disabled id="EditPro_select_input" style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;" >';
                            $q2=$conn->query("SELECT p_id, p_title FROM product ");
                            while($row = mysqli_fetch_assoc($q2)){
                              if($row["p_id"] == $data["pro_id"]){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              $form.='<option value="'.$row["p_id"].'" '.$selected.'> '.$row["p_title"].' </option>';
                            }
                    $form.='</select>
                            </div>
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">Prize</label>
                            <input type="tel" class="form-control" name="pPrize" value="'.$data["prize"].'" >

                            </div>
                            </div>
                            
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">tax</label>
                            <input type="tel" class="form-control" name="pTax" value="'.$data["tax"].'" >

                            </div>
                            </div>
                            
                            <div class="col-3">

                            <div class="mb-2">
                            <label for="" class="form-label">Quantity</label>
                            <input type="tel" class="form-control" name="pQty"value="'.$data["qty"].'" >

                            </div>
                            </div>
                            <div class="col-6">
                                          <div class="input">
                                  <label>date and time</label>
                                  <input type="datetime-local" class="form-control" name="pDate" value="">
                              </div>

                            </div>

                            <div class="mb-3 col-3">
                            <label for="" class="form-label">status</label>
                            <select class="form-select form-select-lg " name="pSts"  style="padding-top: 0.2rem !important;padding-bottom: 0.2rem !important;"> <option>show</option><option>hide</option> </select>
                            </div>


                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="productsSubmit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                          </form>';
              }
        echo json_encode( ["type"=>"success" , "data"=>$form] , true);
      }
      if($_POST["action"] == "del"){
              $id = $_POST["id"];
              $q=$conn->query("DELETE FROM `pro_stock` WHERE `ps_id` = '$id'");
              if($q){
                echo json_encode( ["type"=>"success" , "msg"=>"delete Successfully"] , true);
              }else{
                echo json_encode( ["type"=>"error" , "msg"=>"Something wrong"] , true);
              }
          }
}

