
<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$id=0;
 if(isset($_POST['submitCustomer']) && $_POST['submitCustomer'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){     
        $id = $_POST['id'];     
        $updateCustomerCreation = $userObj->updateCustomerCreation($mysqli,$id,$userid);  
        ?>
         <script>location.href='<?php echo $HOSTPATH; ?>edit_customer_master&msc=2';</script> 
        <?php   
    }
    else{   
        $addCustomerCreation = $userObj->addCustomerCreation($mysqli,$userid);   
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>edit_customer_master&msc=1';</script>
        <?php
    }
 }  
 
$del=0;
if(isset($_GET['del']))
{
$del=$_GET['del'];
}
if($del>0)
{
    $deleteCustomerCreation = $userObj->deleteCustomerCreation($mysqli,$del,$userid); 
    ?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_customer_master&msc=3';</script>
    <?php   
}

if(isset($_GET['upd']))
{
    $idupd=$_GET['upd'];
}

if($idupd>0)
{
    $getCustomerCreation = $userObj->getCustomerCreation($mysqli,$idupd); 
    
    if (sizeof($getCustomerCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getCustomerCreation);$ibranch++)  {  
            
            $customer_id                      = $getCustomerCreation['customer_id'];
            $customer_code                    = $getCustomerCreation['customer_code'];
            $customer_name                    = $getCustomerCreation['customer_name'];
            $email_id                         = $getCustomerCreation['email_id'];
            $pincode                          = $getCustomerCreation['pincode'];
            $state                            = $getCustomerCreation['state'];
            $area                             = $getCustomerCreation['area'];

            $customer_info_id                 = $getCustomerCreation['customer_info_id'];
            $type                             = $getCustomerCreation['type'];
			$contact_number	                  = $getCustomerCreation['contact_number'];
			$contact_person                   = $getCustomerCreation['contact_person'];	
				
            $product_info_id                  = $getCustomerCreation['product_info_id']; 
            $product_id                       = $getCustomerCreation['product_id'];
            $product_name                     = $getCustomerCreation['product_name'];  
            $hosting      	                  = $getCustomerCreation['hosting'];
            $purchase_date                    = $getCustomerCreation['purchase_date'];
            $total_amount                     = $getCustomerCreation['total_amount'];
            $auto_backup                      = $getCustomerCreation['auto_backup'];
            $hosting_amount                   = $getCustomerCreation['hosting_amount'];
            $domain_amount                    = $getCustomerCreation['domain_amount'];
            $renewal_amount                   = $getCustomerCreation['renewal_amount'];         

        }
    }
}

?>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Pay Last Year Fees</li>
    </ol>

    <a href="edit_school_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				
    <div class="main-container">
            <!--------form start-->
        <form id = "customer_master" name="customer_master" action="" method="post" enctype="multipart/form-data"> 
                <input type="hidden" class="form-control" value="<?php if(isset($customer_id)) echo $customer_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="">
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              
                        <div class="card">
                                <div class="card-header">School Fee Receipt</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Receipt Number</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <input type="text"  tabindex="20"  name="purchase_date" id="purchase_date" value="<?php if(isset($purchase_date)) echo $purchase_date ; ?>"  class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Receipt Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <input type="date"  tabindex="20"  name="purchase_date" id="purchase_date" value="<?php if(isset($purchase_date)) echo $purchase_date ; ?>"  class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Reg Number</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text"  tabindex="20"  name="purchase_date" id="purchase_date" value="<?php if(isset($purchase_date)) echo $purchase_date ; ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Academic Year</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select tabindex="1" type="text" class="form-control" id="auto_backup" name="auto_backup" tabindex="1" >
                                                            <option value="">Select Year</option>   
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "Yes" ) echo 'selected'; }?> value="Yes">2022 - 2023</option> 
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "No" ) echo 'selected'; }?> value="No">2023 - 2024</option> 
                                                    </select>             
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Student Name</label>
                                                </div>
                                            </div>
                                             <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text"  tabindex="23"  name="hosting_amount" id="hosting_amount" value=""  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Standard</label>
                                                </div>
                                            </div>
                                             <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text"  tabindex="23"  name="domain_amount" id="domain_amount" value=""  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="">
                                                </div>
                                            </div>
                                        </div>                    
                                  
                                    <div id="student_detailswithoutDiv">
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div id="stockinfotable">
                                                    <div id="updatedstockinfotable"> 
                                                        <table id="general_concessionTable" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Last Year Fees</th>
                                                                    <th>Amount (In Rs)</th>
                                                                    <th>Fees Received</th>
                                                                    <th>Scholarship/Concession</th>
                                                                    <th>Balance to be Paidt</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>School Fee I Term</td>
                                                                    <td><input type="number" readonly class="form-control" name="amount" id="amount" value = "9000"></td>
                                                                    <td><input type="number" class="form-control" name="amount_recieved" id="amount_recieved" value = ""></td>
                                                                    <td><input type="number"  class="form-control" name="amount_scholarship" id="amount_scholarship" value=""></td>
                                                                    <td><input type="number" readonly class="form-control" name="amount_balance" id="amount_balance" value="0"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>School Fee II Term</td>
                                                                    <td><input type="number" readonly class="form-control" value = "9000"></td>
                                                                    <td><input type="number" class="form-control" value = ""></td>
                                                                    <td><input type="number"  class="form-control" name="amount_scholarship" id="amount_scholarship" value=""></td>
                                                                    <td><input type="number" readonly class="form-control" value="0"></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>School Fee III Term</td>
                                                                    <td><input type="number" readonly class="form-control" value = "9000"></td>
                                                                    <td><input type="number" class="form-control" value = ""></td>
                                                                    <td><input type="number"  class="form-control" name="amount_scholarship" id="amount_scholarship" value=""></td>
                                                                    <td><input type="number" readonly class="form-control" value="0"></td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-12"> -->
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label class="label">Other Charges</label>
                                                        <input type="text"  tabindex="20"  name="other_charges" id="other_charges" value="<?php if(isset($other_charges)) echo $other_charges ; ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" style="visibility:hidden">
                                                <div class="form-group">
                                                    <input type="number"  tabindex="20"  name="other_charges" id="other_charges" value="0"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <label class="label">Fees Received</label>
                                                    <input type="number"  tabindex="20"  name="purchase_date" id="purchase_date" value="0"  class="form-control">
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                    <div class="column">
                                            <table style="width:50%;">
                                            <tr>
                                                <td style="color:#66c2ff">Summary Details</td>
                                                <td style="color:#66c2ff">Amount (In Rs)</td>
                                            </tr>
                                            <tr>
                                                <td>Total fees to be collected</td>
                                                <td><input type="text" readonly class="form-control"  id="admission_number" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Final amount to be collect</td>
                                                <td><input type="text" readonly class="form-control" id="section1"value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Fees collected</td>
                                                <td><input type="text" readonly class="form-control" id="student_name" value="0"> </td>
                                            </tr>
                                            <tr>
                                                <td>Balance to be paid</td>
                                                <td><input type="text" readonly class="form-control" id="student_name" value="0"></td>
                                            </tr>
                                            </table>
                                    </div><br><br>
                                    <!-- <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                        <div class="card-title">Payment Denomination</div></div><br><br>
                                            <div class="card-body row">
                                                <div id="comments" tabindex="11">
                                            <label>Payment Mode:</label></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input checked readonly type="radio" tabindex="10" name="collection_info" id="cash" value="Cash Payment" <?php if(isset($collection_info))
                                         echo ($collection_info=='Cash Payment ')?'checked':'' ?>> &nbsp;&nbsp; <label for="cash">Cash Payment </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" tabindex="10" name="collection_info" id="cheque" value="Cheque" <?php if(isset($collection_info))
                                         echo ($collection_info=='Cheque')?'checked':'' ?>> &nbsp;&nbsp; <label for="cheque">Cheque </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" tabindex="10" name="collection_info" id="neft" value="NEFT" <?php if(isset($collection_info))
                                         echo ($collection_info=='NEFT')?'checked':'' ?>> &nbsp;&nbsp; <label for="neft">Transfer (NEFT) </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div><br><br>

                                       <div id="cash_payment" style="display:none;" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Cash</th>
                                                <th>Receive</th>
                                                <th>Amount</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <tr>
                                        <td><input type="text" readonly id="qty" name="qty1" class="form-control qty" placeholder="Enter Event Fee" value="2000"></td>
                                        <td><input type="text" tabindex="13" class="form-control unit" id="unit" name="unit1" value="<?php if(isset($unit1)) echo $unit1; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount1" value="<?php if(isset($amount1)) echo $amount1; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly  id="qty" name="qty2" class="form-control qty" placeholder="Enter Event Fee" value="500"></td>
                                        <td><input type="text" tabindex="14" class="form-control unit" id="unit" name="unit2" value="<?php if(isset($unit2)) echo $unit2; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount2" value="<?php if(isset($amount2)) echo $amount2 ; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly id="qty" name="qty3" class="form-control qty" placeholder="Enter Event Fee" value="100"></td>
                                        <td><input type="text" tabindex="15" class="form-control unit" id="unit" name="unit3" value="<?php if(isset($unit3)) echo $unit3; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount3" value="<?php if(isset($amount3)) echo $amount3; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly id="qty" name="qty4" class="form-control qty" placeholder="Enter Event Fee" value="50"></td>
                                        <td><input type="text" tabindex="16" class="form-control unit" id="unit" name="unit4" value="<?php if(isset($unit4)) echo $unit4; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount4" value="<?php if(isset($amount4)) echo $amount4; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly id="qty" name="qty5" class="form-control qty" placeholder="Enter Event Fee" value="20"></td>
                                        <td><input type="text" tabindex="17" class="form-control unit" id="unit" name="unit5" value="<?php if(isset($unit5)) echo $unit5; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount5" value="<?php if(isset($amount5)) echo $amount5; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly  id="qty" name="qty6" class="form-control qty" placeholder="Enter Event Fee" value="10"></td>
                                        <td><input type="text" tabindex="18" class="form-control unit" id="unit" name="unit6" value="<?php if(isset($unit6)) echo $unit6; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount6" value="<?php if(isset($amount6)) echo $amount6; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" readonly  id="qty" name="qty7" class="form-control qty" placeholder="Enter Event Fee" value="5"></td>
                                        <td><input type="text" tabindex="18" class="form-control unit" id="unit" name="unit7" value="<?php if(isset($unit7)) echo $unit7; ?>"></td>
                                        <td><input type="text" readonly class="form-control amount" id="amount" name="amount7" value="<?php if(isset($amount7)) echo $amount7; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total:</td>
                                        <td><input type="text" readonly name="result" class="form-control result" value="<?php if(isset($result)) echo $result; ?>"></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                                    </div>
                                    <div id="cheque_payment" style="display:none" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <tbody>
                                    <tr>
                                        <td>Cheque Number</td>
                                        <td><input type="text" tabindex="13" class="form-control unit" id="unit" name="unit1" value="<?php if(isset($unit1)) echo $unit1; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" tabindex="14" class="form-control unit" id="unit" name="unit2" value="<?php if(isset($unit2)) echo $unit2; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Cheque Date</td>
                                        <td><input type="date" tabindex="15" class="form-control unit" id="unit" name="unit3" value="<?php if(isset($unit3)) echo $unit3; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" tabindex="16" class="form-control unit" id="unit" name="unit4" value="<?php if(isset($unit4)) echo $unit4; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Ledger</td>
                                        <td><div class="form-group">
                                                    <select tabindex="1" type="text" class="form-control" id="auto_backup" name="auto_backup" tabindex="1" >
                                                            <option value="">Select ledger</option>   
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "Yes" ) echo 'selected'; }?> value="Yes">2022 - 2023</option> 
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "No" ) echo 'selected'; }?> value="No">2023 - 2024</option> 
                                                    </select>             
                                                </div></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="neft_payment" style="display:none;" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <tbody>
                                    <tr>
                                        <td>NEFT Ref Number</td>
                                        <td><input type="text" tabindex="13" class="form-control unit" id="unit" name="unit1" value="<?php if(isset($unit1)) echo $unit1; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" tabindex="14" class="form-control unit" id="unit" name="unit2" value="<?php if(isset($unit2)) echo $unit2; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Transaction Date</td>
                                        <td><input type="date" tabindex="15" class="form-control unit" id="unit" name="unit3" value="<?php if(isset($unit3)) echo $unit3; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" tabindex="16" class="form-control unit" id="unit" name="unit4" value="<?php if(isset($unit4)) echo $unit4; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Ledger</td>
                                        <td><div class="form-group">
                                                    <select tabindex="1" type="text" class="form-control" id="auto_backup" name="auto_backup" tabindex="1" >
                                                            <option value="">Select Ledger</option>   
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "Yes" ) echo 'selected'; }?> value="Yes">2022 - 2023</option> 
                                                            <option <?php  if(isset($auto_backup)) { if($auto_backup == "No" ) echo 'selected'; }?> value="No">2023 - 2024</option> 
                                                    </select>             
                                                </div></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>             -->
                    

			    </div><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <div class="text-right">
                            <div>
                                <button type="submit" tabindex="19" name="submitevent_details_creation" id="submitevent_details_creation" class="btn btn-primary" value="submit" tabindex="10">Submit</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset"  tabindex="20" class="btn btn-outline-secondary">Cancel</button> 
                            </div> <br><br>
                        </div>
                    </div>
                                    </div>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </form>
                    </div>

<script>
    var loadFile = function(event) {
        var image = document.getElementById("viewimage");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
