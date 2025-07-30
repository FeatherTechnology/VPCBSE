<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id= $_SESSION["school_id"];
    $academic_year= $_SESSION["academic_year"];
} 

$id=0;
 if(isset($_POST['submittrust_creation']) && $_POST['submittrust_creation'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $updateTrustCreationmaster = $userObj->updateTrustCreation($mysqli,$id,$userid,$academic_year);  
    ?>
   <script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=2';</script> 
    <?php	}
    else{   
		$addTrustCreation = $userObj->addTrustCreation($mysqli,$userid,$school_id,$academic_year);   
        ?>
     <script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=1';</script>
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
	$deleteTrustCreation = $userObj->deleteTrustCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getTrustCreation = $userObj->getTrustCreation($mysqli,$idupd); 
	
	if (sizeof($getTrustCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getTrustCreation);$ibranch++)  {	
            $trust_id                      = $getTrustCreation['trust_id'];
			$trust_name                	 = $getTrustCreation['trust_name'];
			$contact_person          		     = $getTrustCreation['contact_person'];
			$contact_number      			     = $getTrustCreation['contact_number'];
			$address1		         = $getTrustCreation['address1'];
			$address2    			         = $getTrustCreation['address2'];
			$address3                	 = $getTrustCreation['address3'];
            $place                   = $getTrustCreation['place'];
			$pincode       		     = $getTrustCreation['pincode'];
			$email_id     			     = $getTrustCreation['email_id'];
			$website     		             = $getTrustCreation['website'];
			$pan_number     			     = $getTrustCreation['pan_number'];
			$tan_number                      = $getTrustCreation['tan_number'];
            $trust_logo                      = $getTrustCreation['trust_logo']; 
            
		}
	}
}
?>
   
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Trust Creation </li>
    </ol>

    <a href="edit_trust_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				<!-- Page header end -->

				<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "trust_creation" name="trust_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($trust_id)) echo $trust_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<!-- <div class="card-title">General Info</div> -->
					</div>
                    <div class="card-body">

                    	 <div class="row ">
                            <!--Fields -->
                           <div class="col-md-8 "> 
                              <div class="row">
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Trust Name<span class="required">*</span></label>
                                            <input type="text" tabindex="1" id="trust_name" name="trust_name" class="form-control"  value="<?php if(isset($trust_name)) echo $trust_name; ?>" placeholder="Enter Trust Name">
                                             <span id="trust_namecheck" class="text-danger" >Enter Trust Name</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Contact Person<span class="required">*</span></label>
                                            <input type="text" tabindex="2" id="contact_person" name="contact_person" class="form-control"  value="<?php if(isset($contact_person)) echo $contact_person; ?>" placeholder="Enter Contact Person">
                                              <span id="contact_personcheck" class="text-danger" >Enter Contact Person Name</span> 
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Contact Number<span class="required">*</span></label>
                                            <input type="number" tabindex="3" id="contact_number" tabindex="4" name="contact_number" class="form-control"  value="<?php if(isset($contact_number)) echo $contact_number; ?>" placeholder="Enter Contact Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                              <span id="contact_numbercheck" class="text-danger" >Enter Contact Number</span>
                                           <!--  <span id="mobilenumbercheck1" class="text-danger" >Mobile Number Already Exist</span>  -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 1<span class="required">*</span></label>
                                            <input type="text" tabindex="4" id="address1" name="address1" class="form-control"  value="<?php if(isset($address1)) echo $address1; ?>" placeholder="Enter Address 1">
                                             <span id="address1check" class="text-danger" >Enter Address1 </span> 
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 2</label>
                                            <input type="text" tabindex="5" id="address2" name="address2" class="form-control"  value="<?php if(isset($address2)) echo $address2; ?>" placeholder="Enter Address 2">
                                              <!-- <span id="address2check" class="text-danger" >Enter Address2</span>  -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Address 3</label>
                                            <input type="text" tabindex="6" id="address3" name="address3" class="form-control"  value="<?php if(isset($address3)) echo $address3; ?>" placeholder="Enter Address 3">
                                             <!-- <span id="address3check" class="text-danger" >Enter Address3</span> -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Place<span class="required">*</span></label>
                                            <input class="form-control" tabindex="7" id="place" name="place" type="text" value="<?php if(isset($place)) echo $place; ?>" placeholder="Enter Place">
                                              <span class="text-danger" id="placecheck">Enter Valid place</span> 
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Pincode<span class="required">*</span></label>
                                            <input tabindex="8" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode" value="<?php if(isset($pincode )) echo $pincode ; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                              <span id="pincodecheck" class="text-danger">Enter Pincode</span> 
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">E-Mail Id</label>
                                            <input class="form-control" tabindex="9" id="email_id" name="email_id" type="email" value="<?php if(isset($email_id)) echo $email_id; ?>" placeholder="Enter Email Id">
                                             <!-- <span class="text-danger" id="email_idcheck">Enter Valid E-mail Id</span> -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Website</label>
                                            <input class="form-control" tabindex="10" id="website" name="website" type="text" value="<?php if(isset($website)) echo $website; ?>" placeholder="Enter Website">
                                              <span class="text-danger" id="websitecheck"></span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">PAN No</label>
											<input type="text" tabindex="11"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "10" name="pan_number" id="pan_number" value="<?php if(isset($pan_number)) echo $pan_number; ?>"  class="form-control" placeholder="Enter PAN No">
                                              <span class="text-danger" id="pan_numbercheck"></span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">TAN No</label>
											<input type="text" tabindex="12"  name="tan_number" id="tanno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "10" value="<?php if(isset($tan_number)) echo $tan_number; ?>"  class="form-control" placeholder="Enter TAN No">
									 <span id="tan_numbercheck" class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>  

                            <!-- Field Finished -->
                            <div class="col-md-4"><br />
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                <label for="disabledInput">Logo</label>
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file" tabindex="13"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trust_logo" name="trust_logo" style="width:43%">
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($trust_logo)){ if($trust_logo != ''){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="<?php echo "uploads/trust_creation/".$trust_logo ?>" width="43%" id="viewimage">
                                            <input type="file" tabindex="13"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trust_logo" name="trust_logo" style="width:43%">
                                            <input type="hidden" name="updateimage" id="updateimage" value="<?php echo $trust_logo; ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file" tabindex="13"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="trust_logo" name="trust_logo" style="width:43%">
                                        </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                            <br><br>
                            <div class="text-right">
                                <button type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" tabindex="15">Cancel</button>
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



