<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$id=0;
$typeofaccount;
$getsubgroupnameelist=$userObj->getsubgroupnamee($mysqli);
$purposedropdownlist=$userObj->getpurposedropdown($mysqli);

 if(isset($_POST['submitbankbtn']) && $_POST['submitbankbtn'] != '')
 {
	   
if($_POST['bankname'] != '' && $_POST['accountno'] != '' && $_POST['branchname'] != ''
 && $_POST['shortform'] != '' && $_POST['purpose'] != '' &&
$_POST['accounttype'] != '' && $_POST['subgrouptype'] != '')
  {

	
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $bankupdatedetails = $userObj->updatebank($mysqli,$id, $userid);  
    ?>
   <script>location.href='<?php echo $HOSTPATH;  ?>editbank&msc=2';</script>
    <?php	}
    else{   
	
		$bankadddetails = $userObj->addbank($mysqli, $userid);   
        ?>
    <script>location.href='<?php echo $HOSTPATH;  ?>editbank&msc=1';</script>
        <?php
    }
 }  
 
}
$del=0;
$costcenter=0;
if(isset($_GET['del']))
{
$del=$_GET['del'];
}
if($del>0)
{
	$bankdeletedetails = $userObj->deletebank($mysqli,$del, $userid); 
	//die;
	?>
	<script>location.href='<?php echo $HOSTPATH;  ?>editbank&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$bankdetails = $userObj->getbank($mysqli,$idupd); 
	
	if (sizeof($bankdetails)>0) {
        for($ibank=0;$ibank<sizeof($bankdetails);$ibank++)  {			
			$bankid                 	 = $bankdetails['bankid'];
			$bankcode          		     = $bankdetails['bankcode'];
			$bankname      			     = $bankdetails['bankname'];
			$accountno      			 = $bankdetails['accountno'];
			$branchname       			 = $bankdetails['branchname'];
			$shortform                	 = $bankdetails['shortform'];
			$purpose       		    	 = $bankdetails['purpose'];
			$mailid     			     = $bankdetails['mailid'];
			$ifsccode        		     = $bankdetails['ifsccode'];
			$contactperson     			 = $bankdetails['contactperson'];
			$contactno        		     = $bankdetails['contactno'];
			$micrcode	    		     = $bankdetails['micrcode'];
			$typeofaccount               = $bankdetails['typeofaccount'];
            $undersubgroup               = $bankdetails['undersubgroup']; 
			$fgroup                      = $bankdetails['fgroup']; 
			$bankgrouprefid              = $bankdetails['bankgrouprefid'];
			$ledgername                  = $bankdetails['ledgername']; 
			$costcenter                  = $bankdetails['costcenter'];
			$fromperiod                  = $bankdetails['fromperiod'];  
			$toperiod                    = $bankdetails['toperiod']; 
			$duedate                     = $bankdetails['duedate']; 
			$loanamount                  = $bankdetails['loanamount']; 
			$emi                         = $bankdetails['emi']; 
			$restofinterest              = $bankdetails['restofinterest']; 
		}
	}
}

?>
  

<!-- Page header start -->
<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Bank Creation</li>
					</ol>

					
					<a href="editbank">
					<button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
					</a>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
                <form id="bank" name="bank" action="" method="post">			
				<input type="hidden" class="form-control" value="<?php if(isset($bankid)) echo $bankid; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">General Info</div>
								<div class="card-body">
									<!-- Row start -->
									<div class="row gutters">

										<?php if($idupd <= 0) { ?>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Bank Code</label>
													<input type="text" readonly value=""  name="bankcode" id="bankcode" class="form-control" placeholder="Enter Bank Code">
											</div>
										</div>
										<?php } ?>

										<?php if(isset($bankcode)) { ?>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Bank Code</label>
													<input type="text" readonly value="<?php if(isset($bankcode)) echo $bankcode; ?>"  name="bankcodeupdate" id="bankcodeupdate" class="form-control" placeholder="Enter Bank Code">
											</div>
										</div>
										<?php } ?>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Bank Name</label><span class="text-danger">*</span>
													<input type="text" tabindex="1"  value="<?php if(isset($bankname)) echo $bankname; ?>"  name="bankname" id="bankname" class="form-control" placeholder="Enter Bank Name">
													<span class="text-danger" id="banknamecheck">Enter Bank Name</span>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">A/C No</label><span class="text-danger">*</span>
													<input type="number" tabindex="2"  value="<?php if(isset($accountno)) echo $accountno; ?>"  name="accountno" id="accountno" class="form-control" placeholder="Enter A/C No">
													<span class="text-danger" id="accountnocheck">Enter A/C No</span>
												</div>
											</div>


											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Branch Name</label><span class="text-danger">*</span>
													<input type="text" tabindex="3" value="<?php if(isset($branchname)) echo $branchname; ?>"   name="branchname" id="branchname" class="form-control" placeholder="Enter Branch Name">
													<span class="text-danger" id="branchnamecheck">Enter Branch Name</span>
												</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Short Form</label><span class="text-danger">*</span>
													<input type="text" tabindex="4" value="<?php if(isset($shortform)) echo $shortform; ?>"  name="shortform" id="shortform"  class="form-control" placeholder="Enter Short Form">
													<span class="text-danger" id="shortformcheck">Enter Short Form</span>
											</div>
										</div>
										<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Purpose</label><span class="text-danger">*</span>
												<select type="text" class="form-control" tabindex="5" id="purpose" name="purpose">
												<option value="">Select Purpose</option>                           
												<?php if (sizeof($purposedropdownlist)>0) { 
												for($j=0;$j<count($purposedropdownlist);$j++) { ?>
												<option <?php if(isset($purpose)) { if($purposedropdownlist[$j]['purposeid'] == $purpose )	echo 'selected'; }  ?> value="<?php echo $purposedropdownlist[$j]['purposeid']; ?>">
												<?php echo $purposedropdownlist[$j]['purposename'];?></option>
												<?php }} ?>                       
												</select>
												<span class="text-danger" id="purposecheck">Select Purpose</span>
												</div>
											</div>
											<div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label" style="visibility: hidden;">Add Purpose</label>
												<button type="button" class="form-control inbutton btn btn-primary" id="PurposetoAdd" name="PurposetoAdd"  tabindex="6" data-toggle="modal" data-target=".purposeModal"><span class="icon-add"></span></button>
												</div>
											</div>

	<!-- Purpose Modal Start -->
    <div class="modal fade purposeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: white">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Purpose</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="DropDownpurpose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- alert messages -->
                    <div id="purposeinsertnotok" class="unsuccessalert">Purpose Already Exists, Please Enter a Different Name!
					<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
					</div>

					 <div id="purposeinsertok" class="successalert">Purpose Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
					 </div>

					  <div id="purposeupdateok" class="successalert">Purpose Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
					 </div>

					<div id="purposedeletenotok" class="unsuccessalert">You Don't Have Rights To Delete This Purpose!
					<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
					</div>

					 <div id="purposedeleteok" class="successalert">Purpose Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
					 </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <label class="label">Enter Purpose</label>
						<input type="hidden"  name="purposeid" id="purposeid">
						<input type="text"  name="purposename" id="purposename" class="form-control" tabindex="1" placeholder="Enter Purpose">
						<span class="text-danger" id="purposenamecheck">Enter Purpose</span>
                        </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                            <label class="label" style="visibility: hidden;">Enter Ps</label>
                            <button type="button" tabindex="2" name="submitpurposebtn" id="submitpurposebtn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>  

        <div id="updatedpurposetable">
               <table class="table custom-table" id="starttable"> 
                <thead>
                <tr>
                    <th>S. No</th>
                    <th>PURPOSE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                    <?php if (sizeof($purposedropdownlist)>0) { 
                          for($j=0;$j<count($purposedropdownlist);$j++) { ?>
                          <tr>
                            <td class="col-md-2 col-xl-2"><?php echo $j+1; ?></td>
                            <td><?php  echo $purposedropdownlist[$j]['purposename']; ?></td>
                            <td>
                              <a id="editpurpose" value="<?php echo $purposedropdownlist[$j]['purposeid'] ?>"><span class="icon-border_color"></span></a> &nbsp;
                              <a id="deletepurpose" value="<?php echo $purposedropdownlist[$j]['purposeid'] ?>"><span class='icon-trash-2'></span>
                              </a>
                            </td>
                        </tr>
                    <?php }} ?>                       
                </tbody>
                </table>
        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="DropDownpurpose()">Close</button>
                </div>
            </div>
      </div>
</div>
<!-- Purpose Modal End -->


											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Mail Id</label>
													<input type="text" tabindex="7" value="<?php if(isset($mailid)) echo $mailid; ?>"  name="email" id="email" class="form-control" placeholder="Enter Mail Id">
													<span class="text-danger" id="emailcheck">Enter Mail Id</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">IFSC Code</label>
													<input type="text" tabindex="8" value="<?php if(isset($ifsccode)) echo $ifsccode; ?>"  name="ifsccode" id="ifsccode" class="form-control" placeholder="Enter IFSC Code" maxlength="11">
												
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">MICRCode</label>
													<input type="number" tabindex="9" name="micrcode" id="micrcode" value="<?php if(isset($micrcode)) echo $micrcode; ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" placeholder="Enter MICR Code" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;">
													<span class="text-danger" id="micrcodecheck">Enter MICR Code (110002022)</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Contact Person</label>
													<input type="text" tabindex="10" name="contactperson" id="contactperson" value="<?php if(isset($contactperson)) echo $contactperson; ?>"  class="form-control" placeholder="Enter Contact Person">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Contact No</label>
													<input type="number" tabindex="11" name="contactno" id="contactno" value="<?php if(isset($contactno)) echo $contactno; ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" placeholder="Enter Contact No"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
													<span class="text-danger" id="contactnocheck">Enter Contact No</span>
												</div>
											</div>									
											
									</div>
									<!-- Row end -->

								</div>
							</div>

							<div class="card">
								<div class="card-header">Financial Info </div>
								<div class="row card-body">
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Type of Account</label><span class="text-danger">*</span>
												<select tabindex="12" name="accounttype" id="accounttype" class="form-control comp-field  chosen-select">
												<option value="">Select a Account Type...</option>														
												<option <?php if(isset($typeofaccount)) { if($typeofaccount == "bankod" ) echo 'selected'; }  ?> value="bankod">Bank OD</option>
												<option <?php if(isset($typeofaccount)) { if($typeofaccount == "cc" ) echo 'selected'; }  ?> value="cc">CC</option>
												<option <?php if(isset($typeofaccount)) { if($typeofaccount == "termloan" ) echo 'selected'; }  ?> value="termloan">Term Loan</option>
												<option <?php if(isset($typeofaccount)) { if($typeofaccount == "carloan" ) echo 'selected'; }  ?> value="carloan">Car Loan</option>
												<option <?php if(isset($typeofaccount)) { if($typeofaccount == "normalaccounts" ) echo 'selected'; }  ?> value="normalaccounts">Normal Accounts</option>
												</select> 
												<span class="text-danger" id="accounttypecheck">Select a Account Type</span>
							                       
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Under SubGroup</label><span class="text-danger">*</span>
												<select tabindex="13" name="subgrouptype" id="subgrouptype" class="form-control comp-field  chosen-select">
													<option value="">Select Subgroupname</option>                                  
                                                    <?php if (sizeof($getsubgroupnameelist)>0) { 
                                                    for($j=0;$j<count($getsubgroupnameelist);$j++) { ?>
                                                    <option <?php if(isset($undersubgroup)) { if($getsubgroupnameelist[$j]['Id'] == $undersubgroup ) echo 'selected'; }  ?> 
                                                    value="<?php echo $getsubgroupnameelist[$j]['Id']; ?>">
                                                    <?php echo $getsubgroupnameelist[$j]['AccountsName'];?></option>
                                                    <?php }} ?>  
													</select> 
													<span class="text-danger" id="undersubgroupcheck">Select a Account SubGroup</span>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Group</label>
													<input type="text" readonly tabindex="14"  name="group" id="group" value="<?php if(isset($fgroup)) echo $fgroup; ?>"  class="form-control" placeholder="Enter Group">
													<input type="hidden" name="bankgrouprefid" id="bankgrouprefid" value="<?php if(isset($bankgrouprefid)) echo $bankgrouprefid; ?>">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Ledger Name</label>
													<input type="text" readonly tabindex="15"  name="ledgername" id="ledgername" value="<?php if(isset($ledgername)) echo $ledgername ; ?>"  class="form-control" placeholder="Enter Ledger Name">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<!-- Checkbox example -->
											<div class="form-group">
											<label class="label">&nbsp;</label>
											<div class="custom-control custom-checkbox">
									        <input type="checkbox" value="Yes"  <?php if($costcenter==0){echo'checked';}?> tabindex="16"  class="custom-control-input" id="costcenter" name="costcenter">
										<label class="custom-control-label" for="costcenter">Cost Centre</label>
									  </div>
                                     </div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"></div>

									<?php if($idupd<=0) { ?>
									<div id="bankextrafield" class="card-body row">
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">From Period</label>

													<input type="date"  tabindex="17"  name="fromperiod" id="fromperiod" value="<?php if(isset($fromperiod)) echo $fromperiod ; ?>"  class="form-control datepicker-custom-buttons picker__input" readonly="" aria-haspopup="true" aria-readonly="false" aria-owns="fromperiod_root" placeholder="Enter From Period">
											
												</div>
											</div>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">To Period</label>
												
												<input type="date"  tabindex="18"  name="toperiod" id="toperiod" value="<?php if(isset($toperiod)) echo $toperiod ; ?>"  class="form-control datepicker-custom-buttons picker__input" readonly="" aria-haspopup="true" aria-readonly="false" aria-owns="toperiod_root" placeholder="Enter To Period">
												
											</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Due Date</label>
												
												<input type="date"  tabindex="19"  name="duedate" id="duedate" value="<?php if(isset($duedate)) echo $duedate ; ?>"  class="form-control datepicker-custom-buttons picker__input" readonly="" aria-haspopup="true" aria-readonly="false" aria-owns="duedate_root" placeholder="Enter Due Date">
												
											</div>
											</div>


											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Loan Amount</label>
													<input type="number"  tabindex="20" name="loanamount" id="loanamount" value="<?php if(isset($loanamount)) echo $loanamount ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter Loan Amount">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">EMI</label>
													<input type="number"  tabindex="21"  name="emi" id="emi" value="<?php if(isset($emi)) echo $emi ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter EMI">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Rate of Interest</label>
													<input type="number"  tabindex="22"  name="restofinterest" id="restofinterest" value="<?php if(isset($restofinterest)) echo $restofinterest ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter Rest Of Interest">
												</div>
											</div>
										</div>
									<?php } ?>

								

									<?php if(isset($typeofaccount)){ ?>
									<div id="ubankextrafield" class="card-body row">

										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">From Period</label>
													<input type="date"  tabindex="23"  name="fromperiod" id="fromperiod" value="<?php if(isset($fromperiod)) echo $fromperiod ; ?>"  class="form-control">
												</div>
											</div>
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">To Period</label>
													<input type="date"  tabindex="24"  name="toperiod" id="toperiod" value="<?php if(isset($toperiod)) echo $toperiod ; ?>"  class="form-control">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Due Date</label>
													<input type="date"  tabindex="25"  name="duedate" id="uduedate" value="<?php if(isset($duedate)) echo $duedate ; ?>"  class="form-control">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Loan Amount</label>
													<input type="number"  tabindex="26"  name="loanamount" id="loanamount" value="<?php if(isset($loanamount)) echo $loanamount ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter Loan Amount">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">EMI</label>
													<input type="number"  tabindex="27"  name="emi" id="emi" value="<?php if(isset($emi)) echo $emi ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter EMI">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label class="label">Rate of Interest</label>
													<input type="number"  tabindex="28"  name="restofinterest" id="restofinterest" value="<?php if(isset($restofinterest)) echo $restofinterest ; ?>"  class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Enter Rest Of Interest">
												</div>
											</div>
										</div>
									<?php } ?>


									<br /><br /><br /><br />

				<div class="col-md-3">
					<button type="button"  tabindex="31"  id="downloadbank" name="downloadbank" class="btn btn-primary"><span class="icon-download"></span>Download</button>
					<button type="button" data-toggle="modal" data-target="#bankBulkModal"  tabindex="32"  id="uploadbank" name="uploadbank"  class="btn btn-primary"><span class="icon-upload"></span>Upload</button>
						<!-- Modal -->
                        <div class="modal fade" id="bankBulkModal" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="background-color: white">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="vCenterModalTitle">Bank Bulk Upload</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data" name="customerbulk" id="customerbulk">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12"></div>
                                                <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12">
                                                <div class="form-group">
                                                <div id="insertsuccess" style="color: green; font-weight: bold;">Excel Data Added Successfully</div>
                                                <div id="notinsertsuccess" style="color: red; font-weight: bold;">Problem Importing Excel Data or Duplicate Entry found</div>
                                                <label class="label">Select Excel</label>
                                                <input type="file" name="file" id="file" class="form-control" tabindex="1">
                                                </div>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="submitbankbulkbtn" name="submitbankbulkbtn" tabindex="2">Upload</button>
                                        <button type="button" class="btn btn-secondary" tabindex="3" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>		
					</div>
					<div class="col-md-7"></div>
					<div class="col-md-2">
						<div class="text-right">
							<button type="submit"  tabindex="29"  id="submitbankbtn" name="submitbankbtn" value="Submit" class="btn btn-primary">Submit</button>
							<button type="reset"  tabindex="30"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
						</div>
					</div>

				</div>
			</div>						
		</div>
	</div>
<!-- Row end -->
</form>
</div>

<?php if(isset($typeofaccount)) {
	if($typeofaccount == "normalaccounts"){?>
<script>document.getElementById("ubankextrafield").style.display='none';</script>
<?php }} ?>
