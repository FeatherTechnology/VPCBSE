<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 

$id=0;
 if(isset($_POST['submitTrusteeCreation']) && $_POST['submitTrusteeCreation'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
        $updateTrusteeCreation = $userObj->updateTrusteeCreation($mysqli,$id,$userid);  
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>edit_trustee_creation&msc=2';</script> 
        <?php	
    }
    else{   
		$addTrusteeCreation = $userObj->addTrusteeCreation($mysqli, $userid);   
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>edit_trustee_creation&msc=1';</script>
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
	$deleteTrusteeCreation = $userObj->deleteTrusteeCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_trustee_creation&msc=3';</script>
    <?php	
}

if(isset($_GET['upd']))
{
    $idupd=$_GET['upd'];
}

if($idupd>0)
{
	$getTrusteeCreation = $userObj->getTrusteeCreation($mysqli,$idupd); 
	if (sizeof($getTrusteeCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getTrusteeCreation);$ibranch++)  {	
            $trustee_id                      = $getTrusteeCreation['trustee_id'];
			$trustee_name          		     = $getTrusteeCreation['trustee_name'];
			$contact_no      			     = $getTrusteeCreation['contact_number'];
			$email_id      			         = $getTrusteeCreation['email_id'];
			$address1       			         = $getTrusteeCreation['address1'];
			$address2                	 = $getTrusteeCreation['address2'];
            $address3                   = $getTrusteeCreation['address3'];
			$place       		     = $getTrusteeCreation['place'];
			$pincode     			     = $getTrusteeCreation['pincode'];
			$pan_no     		       = $getTrusteeCreation['pan_number'];
			$trustee_image     			     = $getTrusteeCreation['trustee_image'];
		}
	}
}
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">GSM - Trustee Creation</li>
    </ol>

    <a href="edit_trustee_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				<!-- Page header end -->

				<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "employee" name="employee" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($trustee_id)) echo $trustee_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<!-- <div class="card-title">General Info</div> -->
					</div>
                    <div class="card-body">

                    	 <div class="row">
                            <!--Fields -->
                           <div class="col-md-8 "> 
                              <div class="row">

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Trustee Name<span class="required">*</span></label>
                                            <input type="text" tabindex="1" id="trustee_name" name="trustee_name" class="form-control"  value="<?php if(isset($trustee_name)) echo $trustee_name; ?>" placeholder="Enter Trustee Name">
                                            <span id="trusteenameCheck" class="text-danger" >Enter Trustee Name</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Contact Number<span class="required">*</span></label>
                                            <input type="number"  id="contact_no" tabindex="2" name="contact_no" class="form-control"  value="<?php if(isset($contact_no)) echo $contact_no; ?>" placeholder="Enter Contact Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                            <span id="mobilenumbercheck" class="text-danger" >Enter Mobile Number</span>
							                <span id="mobilenumbercheck1" class="text-danger" >Mobile Number Already Exist</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">E-Mail Id<span class="required">*</span></label>
                                            <input class="form-control" tabindex="3" id="email_id" name="email_id" type="text" value="<?php if(isset($email_id)) echo $email_id; ?>" placeholder="Enter Email Id">
                                            <span class="text-danger" id="emailidCheck">Enter Valid E-mail Id</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 1<span class="required">*</span></label>
                                            <input type="text" tabindex="4" id="address1" name="address1" class="form-control"  value="<?php if(isset($address1)) echo $address1; ?>" placeholder="Enter Address 1">
                                            <span id="address1Check" class="text-danger" >Enter Address 1</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 2</label>
                                            <input type="text" tabindex="5" id="address2" name="address2" class="form-control"  value="<?php if(isset($address2)) echo $address2; ?>" placeholder="Enter Address 2">
                                     
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 3</label>
                                            <input type="text" tabindex="6" id="address3" name="address3" class="form-control"  value="<?php if(isset($address3)) echo $address3; ?>" placeholder="Enter Address 3">
                                       
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Place<span class="required">*</span></label>
                                            <input class="form-control" tabindex="7" id="place" name="place" type="text" value="<?php if(isset($place)) echo $place; ?>" placeholder="Enter Place">
                                            <span class="text-danger" id="placeCheck">Enter Place</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Pincode<span class="required">*</span></label>
                                            <input tabindex="8" type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode" value="<?php if(isset($pincode )) echo $pincode ; ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                            <span id="pincodeCheck" class="text-danger">Enter Pincode</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">PAN No<span class="required">*</span></label>
											<input type="text" tabindex="9"  name="pan_no" id="pan_no" value="<?php if(isset($pan_no)) echo $pan_no; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "10" class="form-control" placeholder="Enter PAN No">
											<span class="text-danger" id="panCheck">Enter Pan Number (ABCDE1234F)</span>
                                        </div>
                                    </div>

                                </div>
                            </div>  

                            <!-- Field Finished -->
                            <div class="col-md-4"><br />
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                <label for="disabledInput">Photo</label>
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file" tabindex="10"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trustee_image" name="trustee_image" style="width:43%">
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($trustee_image)){ if($trustee_image != ''){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="<?php echo "uploads/trustee_photo/".$trustee_image ?>" width="43%" id="viewimage">
                                            <input type="file" tabindex="10"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trustee_image" name="trustee_image" style="width:43%">
                                            <input type="hidden" name="updateimage" id="updateimage" value="<?php echo $trustee_image; ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file" tabindex="10"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trustee_image" name="trustee_image" style="width:43%">
                                        </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br><br>
                            <div class="text-right">
                                <button type="submit" name="submitTrusteeCreation" id="submitTrusteeCreation" class="btn btn-primary" value="Submit" tabindex="11">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" tabindex="12">Cancel</button>
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
