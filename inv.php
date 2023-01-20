<?php include "function.php"; headers();
 
 echo "<pre>";


 echo "</pre>";

 $data =  json_decode( $_SESSION["user"], true);
 
?><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<section class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: <?=$_SESSION["inv_id"]?>
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="me-2 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="me-2 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                        <a href="#" class="logo text-dark"><i class="fas fa-utensils text-success"></i>resto.</a>
                    </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?=$data["Name"]?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                               Address : <?=$data["address"]?>
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?=$data["number"]?></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs me-2"></i> <span class="text-600 text-90">ID:</span><?=$_SESSION["inv_id"]?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs me-2"></i> <span class="text-600 text-90">Issue Date:</span> <?=date("d-M-y")?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs me-2"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    
            <div class="table-responsive" id="Inv_table">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                            <th>action</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3" id="inv_tbl_shw">
                    </tbody>
                </table>
            </div>
            

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Extra note such as company or payment information...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span id="crt_amt" class="text-120 text-secondary-d1">$2,250</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tax (2.5%)
                                </div>                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1" id="crt_tax"></span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2" id="crt_total">$2,475</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        <button role="button" href="#" id="buy_cart"  class="btn btn-info btn-bold px-4 float-end mt-3 mt-lg-0">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="feedback ">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-12">
                        
                        <div class=" card">
                            <span class="close_fb" > <i class="fas  fa-close"></i></span>
                            <div class="card-head my-5">
                            <h2 class="text-success text-center "> Thanks for shopping</h2>
                            </div>
                            <div class=" card-body">
                                        <div class="img bg-danger">
                                            <img src="images/loader.gif" alt="">
                                        </div>
                                        <div class="feedback-form">
                                            <div class="form-group">

                                            
                                                        <label for="feedbacks">feedback</label>
                                                <textarea name="" id="fd_txtArea" cols="10" class="form-control" rows="10"></textarea>
                                            </div>
                                            <button class="btn btn-success fb-btn">submit</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    
                </script>
</div>
<?php footers();