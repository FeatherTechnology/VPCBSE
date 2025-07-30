<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$GroupList = $userObj->getGrpClassification($mysqli);
$id=0;
 if(isset($_POST['submititem_creation']) && $_POST['submititem_creation'] != '')
 { 
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){     
        $id = $_POST['id'];     
    $updateItemCreationmaster = $userObj->updateItemCreation($mysqli,$id,$userid);  
    ?>
   <script>location.href='<?php echo $HOSTPATH; ?>edit_item_creation&msc=2';</script> 
    <?php   }
    else{   
        $addItemCreation = $userObj->addItemCreation($mysqli,$userid);   
        ?>
     <script>location.href='<?php echo $HOSTPATH; ?>edit_item_creation&msc=1';</script>
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
    $deleteItemCreation = $userObj->deleteItemCreation($mysqli,$del,$userid); 
    ?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_item_creation&msc=3';</script>
<?php   
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
    $getItemCreation = $userObj->getItemCreation($mysqli,$idupd); 
    
    if (sizeof($getItemCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getItemCreation);$ibranch++)  {    
            $item_id                      = $getItemCreation['item_id'];
            $grp_classification                  = $getItemCreation['grp_classification']; 
            $item_code                      = $getItemCreation['item_code'];
            $description                      = $getItemCreation['description'];
            $uom                = $getItemCreation['uom'];
            $quantity                        = $getItemCreation['quantity'];
            $rate                    = $getItemCreation['rate'];
            $result                   = $getItemCreation['result'];
            $invoice_ref                 = $getItemCreation['invoice_ref'];
        }
    } 
}
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">GSM - item Creation</li>
    </ol>

    <a href="edit_item_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<form action="" method="post" name="item_creation" id="item_creation" enctype="multipart/form-data">
		<div class="row gutters">
		<!-- General Info -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
                    <div class="card-header">
                        <!-- <div class="card-header">General Info</div> -->
					</div>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php if(isset($item_id)) echo $item_id; ?>">
					<div class="card-body row">
						
						 <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-12">
                            <div class="form-group">
                                <label for="disabledInput">Group Classification<span class="required">*</span></label>
                                <select tabindex="2" type="text" class="form-control" id="grp_classification" name="grp_classification" tabindex="1" >
                                     <option value="">Select Group Classification</option>   
                                    <?php if (sizeof($GroupList)>0) { 
                                    for($j=0;$j<count($GroupList);$j++) { ?>
                                    <option <?php if(isset($grp_classification)) { if($GroupList[$j]['grp_classification_id'] == $grp_classification)  echo 'selected'; }  ?> value="<?php echo $GroupList[$j]['grp_classification_id']; ?>">
                                    <?php echo $GroupList[$j]['grp_classification_name'];?></option>
                                    <?php }} ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-12" style="margin-top: 19px;">
                            <div class="form-group float-right">
                                <button type="button"  tabindex="3" class="btn btn-primary" id="add_departmentDetails" name="add_departmentDetails" data-toggle="modal" data-target=".addDepartmentModal" style="padding: 5px 35px;"><span class="icon-add"></span></button>
                            </div>
                        </div>
                        <?php if($idupd<=0){ ?>
                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="label">Code</label>
                                    <input type="text" readonly name="item_code" id="item_code" class="form-control" placeholder="Enter Code">
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="label">Code</label>
                                    <input type="text" readonly name="item_code_edit" id="item_code_edit" class="form-control" value="<?php if(isset($item_code)){ echo $item_code; } ?>" >
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="disabledInput">Description</label>
                                <input type="text" tabindex="4" id="description" name="description" class="form-control"  value="<?php if(isset($description)) echo $description; ?>" placeholder="Enter Description">
                               
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="disabledInput">Unit of Measure</label>
                                <input type="text" tabindex="5" id="uom" name="uom" class="form-control"  value="<?php if(isset($uom)) echo $uom; ?>" placeholder="Enter Unit of Measure">
                                <!-- <span id="employeenamecheck" class="text-danger" >Enter Employee Name</span> -->
                            </div>
                        </div>
                    </div>

                    <div class="card-header" style="text-align:center">Opening Stock Details</div>
                    <hr>

                    <div class="card-body row">
						<div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label class="label">Quantity</label>
                                <input type="number" tabindex="15" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity" value="<?php if(isset($quantity)) echo $quantity; ?>" >
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="disabledInput">Rate</label>
                                <input type="text" tabindex="16" id="rate" name="rate" class="form-control"  value="<?php if(isset($rate)) echo $rate; ?>" placeholder="Enter rate">
                            </div>
                        </div>

						<div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="form-group">
                                <label class="label">Value</label>
                                <input readonly type="text" tabindex="17" name="result" id="result" value="<?php if(isset($result)) echo $result; ?>" class="form-control" placeholder="0">
                            </div>
						</div>

                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="disabledInput">InvoiceRef</label>
                                <input type="text" tabindex="18" id="invoice_ref" name="invoice_ref" class="form-control"  value="<?php if(isset($invoice_ref)) echo $invoice_ref; ?>" placeholder="Enter InvoiceRef">
                            </div>
                        </div>
				    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <div class="text-right">
                            <div>
                                <button type="submit"  tabindex="19" name="submititem_creation" id="submititem_creation"  class="btn btn-primary"  value="Submit">Submit</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset"  tabindex="20" class="btn btn-outline-secondary">Cancel</button> 
                            </div> <br><br>
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
<!-- Add Course Category Modal -->
 <div class="modal fade addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: white">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Group Classification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="DropDownStock()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- alert messages -->
                <div id="departmentInsertNotOk" class="unsuccessalert">Grp / Classification Already Exists, Please Enter a Different Name!
                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                </div>

                <div id="departmentInsertOk" class="successalert">Grp / Classification Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                </div>

                <div id="departmentUpdateOk" class="successalert">Grp / Classification Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                </div>

                <div id="departmentDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Grp / Classification!
                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                </div>

                <div id="departmentDeleteOk" class="successalert">Grp / Classification Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                </div>

                <br />
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12"></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label class="label">Enter Grp / Classification</label>
                            <input type="hidden" name="grp_classification_id" id="grp_classification_id">
                            <input type="text" name="grp_classification_name" id="grp_classification_name" class="form-control" placeholder="Enter Classification">
                            <span class="text-danger" tabindex="1" id="departmentnameCheck">Enter Grp / Classificationt</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-4 col-12">
                            <label class="label" style="visibility: hidden;">Grp / Classification</label>
                        <button type="button" tabindex="2" name="submitDepartmentBtn" id="submitDepartmentBtn" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div id="updateddepartmentTable"> 
                    <table class="table custom-table" id="departmentTable"> 
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Grp / Classification</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (sizeof($GroupList)>0) { 
                                for($j=0;$j<count($GroupList);$j++) { ?>
                                <tr>
                                    <td class="col-md-2 col-xl-2"><?php echo $j+1; ?></td>
                                    <td><?php  echo $GroupList[$j]['grp_classification_name']; ?></td>
                                    <td>
                                        <a id="edit_department" value="<?php echo $GroupList[$j]['grp_classification_id'] ?>"><span class="icon-border_color"></span></a> &nbsp;
                                        <a id="delete_department" value="<?php echo $GroupList[$j]['grp_classification_id'] ?>"><span class='icon-trash-2'></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="DropDownDesig()">Close</button>
            </div>

        </div>
    </div>
</div>