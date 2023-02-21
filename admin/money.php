<?php
include "function.php";
ad_headers();
charts_circle();
// tables();
?>


        <div class="container">
            <div class="card find_card my-4">
                <div class="card-header">
                    search invoice 
                </div>
                <div class="card-body ">
                    <h4 class="card-title">Title</h4>
                            <form action="" id="find_invoice" method="post">
                                   <div class="row d-flex-between">
                                    <div class="col-6 mb-3 d-flex-center ">
                                        <label for="" class=" me-2">Types</label>
                                        <select class="form-select form-select-sm" id="file_type_f" >
                                            <option ></option>
                                            <option selected>sell</option>
                                            <option >stock</option>
                                            
                                        </select>
                                     <input type="text" id="inv_id_f" value="p-10011" class="form-control form-control-sm ms-2" style="width:30%">
                                </div>
                                    <div class="col-6 mb-3 d-flex-center ">
                                        
                                        <select class="form-select form-select-sm" id="cash_type_f" >
                                            <option ></option>
                                            <option selected value="cash-in" >debit (cash in)</option>
                                            <option value="cash-out" >credit (cash out)</option>
                                            <option value="refund">return (refund)</option>
                                            
                                        </select>
                                     <button role="submit" name="find"  id="find" class="btn btn-sm  dpanel-btn ms-2" >find</button>
                                </div>
                                    
                                   </div> 


                            </form>
                </div>
                <div class="card-footer text-muted">
                    food website
                </div>
            </div>

                    <div class="card my-4 ">
                      <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> -->
                      <div class="card-body">
                        <form action="js/database/moneyHandel.php" id="moneyInsertForm" method="POST" id="Dpanel2Table">
                        <input type="hidden" name="cash_type">
                        <input type="hidden" name="action" value="add">
                        <div class="row mb-3 d-flex-center ">
                            <div class=" offset-8 mb-3 col-sm-4 col-12    float-start d-flex-center">
                              <span for="" class=" text-center ">#</span>
                              <input type="text" name="id" id="inv_id" disabled class="form-control form-control-sm ms-2" style="width:50%">                   
                              
                            </div>
                            
                       <div class="col-12 d-flex-center">
                        
                            <div class="mb-3  d-flex-center">
                                    <span for="" class=" text-center ">cash -in</span>
                                    <input type="text" name="cash_in" value="" disabled  class="form-control form-control-sm ms-2" style="width:50%">                   
                                    
                            </div>
                       
                            <div class="mb-3 d-flex-center">
                              <span for="" class=" text-center ">cash out</span>
                              <input type="text" name="cash_out" value="" disabled class="form-control form-control-sm ms-2" style="width:50%">                   
                              
                            </div>
                       
                            <div class="mb-3 d-flex-center">
                              <span for="" class=" text-center ">refund</span>
                              <input type="text" name="refund" value="" disabled class="form-control form-control-sm ms-2" style="width:50%">                   
                              
                            </div>
                       
                       </div>
                        <div class="mb-3">
                          <label for="" class="form-label"></label>
                          <textarea class="form-control" name="desc" id="" rows="3"></textarea>
                        </div>
                        </div>
                        <button type="submit" class="btn dpanel-btn w-100">submit</button>
                        </form>
                      </div>
                    </div>
                    <div class="card result_table my-4" id="DpanelTable">
                      <div class="card-body">
                        <blockquote class="blockquote mb-0">
                                    <?php tables()?>
                                    </div>
                                    
                          <footer class="blockquote-footer">Footer <cite title="Source title">Source title</cite></footer>
                        </blockquote>
                      </div>
                    </div>

        </div>
<?php
msgModals();
ad_footers();