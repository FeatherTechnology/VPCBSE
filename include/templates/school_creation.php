<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $academic_year = $_SESSION["academic_year"];
} 

$id=0;
if(isset($_POST['submitschool_creation']) && $_POST['submitschool_creation'] != '')
{
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $updateSchoolCreationmaster = $userObj->updateSchoolCreation($mysqli,$id,$userid);  
    ?>
<script>location.href='<?php echo $HOSTPATH; ?>edit_school_creation&msc=2';</script> 
    <?php	}
    else{   
		$addSchoolCreation = $userObj->addSchoolCreation($mysqli,$userid,$academic_year);   
        ?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_school_creation&msc=1';</script>
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
	$deleteSchoolCreation = $userObj->deleteSchoolCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_school_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getSchoolCreation = $userObj->getSchoolCreation($mysqli,$idupd); 
	
	if (sizeof($getSchoolCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getSchoolCreation);$ibranch++)  {	
            $school_id                      = $getSchoolCreation['school_id'];
			$school_name                	 = $getSchoolCreation['school_name'];
			$school_login_name          		     = $getSchoolCreation['school_login_name'];
			$contact_number      			     = $getSchoolCreation['contact_number'];
			$address1		         = $getSchoolCreation['address1'];
			$address2    			         = $getSchoolCreation['address2'];
            $district                   = $getSchoolCreation['district'];
			$state       		     = $getSchoolCreation['state'];
            $state_name       		     = $getSchoolCreation['state_name'];
			$email_id     			     = $getSchoolCreation['email_id'];
            $web_url                    =$getSchoolCreation['web_url'];
			$school_logo     			     = $getSchoolCreation['school_logo'];
			$pincode     			     = $getSchoolCreation['pincode'];
		}
	}
}
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - School Creation </li>
    </ol>

    <a href="edit_school_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($school_id)) echo $school_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
<!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">	
                    <div class="card-body">
                    <div class="row ">
                            <!--Fields -->
                        <div class="col-md-8 "> 
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="school_name">School Name<span class="required">*</span></label>
                                            <input type="text" tabindex="1" id="school_name" name="school_name" class="form-control"  value="<?php if(isset($school_name)) echo $school_name; ?>" placeholder="Enter school Name">
                                            <span id="school_namecheck" class="text-danger" >Enter school Name</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="school_login_name">School Login Name</span></label>
                                            <input type="text" tabindex="2" id="school_login_name" name="school_login_name" class="form-control"  value="<?php if(isset($school_login_name)) echo $school_login_name; ?>" placeholder="Enter School Login Name">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="address1">Address 1</label>
                                            <input type="text" tabindex="3" id="address1" name="address1" class="form-control"  value="<?php if(isset($address1)) echo $address1; ?>" placeholder="Enter Address 1">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="address2">Address 2</label>
                                            <input type="text" tabindex="4" id="address2" name="address2" class="form-control"  value="<?php if(isset($address2)) echo $address2; ?>" placeholder="Enter Address 2">
                                            <!-- <span id="address2check" class="text-danger" >Enter Address2</span>  -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <input class="form-control" tabindex="5" id="district" name="district" type="text" value="<?php if(isset($district)) echo $district; ?>" placeholder="Enter District">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <!-- <input readonly class="form-control" id="state" name="state" type="text" value="Tamil Nadu" placeholder="Enter State"> -->
                                            <select tabindex="6" class="form-control" id="state" name="state" placeholder="Enter State" >
                                            <?php
                                                if (isset($state_name)) {
                                                    echo '<option value="' . $state . '" selected>' . $state_name . '</option>';
                                                } 
                                            ?>
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>
                                            <input type="number" tabindex="7" id="pincode" name="pincode" class="form-control"  value="<?php if(isset($pincode)) echo $pincode; ?>" placeholder="Enter Pincode">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="contact_number">Phone Number</label><span class="required">*</span>
                                            <input type="number" tabindex="8" id="contact_number" name="contact_number" class="form-control"  value="<?php if(isset($contact_number)) echo $contact_number; ?>" placeholder="Enter Contact Number" >
                                            <span id="phone_numcheck" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="email_id">E-Mail Id</label><span class="required">*</span>
                                            <input class="form-control" tabindex="9" id="email_id" name="email_id" type="email" value="<?php if(isset($email_id)) echo $email_id; ?>" placeholder="Enter Email Id" required>
                                            <!-- <span class="text-danger" id="email_idcheck">Enter Valid E-mail Id</span> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input tabindex="10" type="text" class="form-control" id="website" name="website" placeholder="Enter website URL" value="<?php if(isset($web_url)) echo $web_url; ?>">
                                            <span class="text-danger" id="site_check"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-md-4"> </br>
                            <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                <label for="school_logo">School Logo</label>
                                <div class="form-group">
                                    <?php if(!isset($school_logo) && $idupd<=0){ ?>
                                        <img src="img/avatar.png" width="43%" id="viewimage">
                                        <input type="file" class="form-control" tabindex="11" name="school_logo" id="school_logo" style="width:43%" onchange="loadFile(event)"><br>
                                        <?php } else { ?>
                                        <img src="<?php echo "uploads/school_creation/".$school_logo; ?>" width="43%" id="viewimage">
                                        <input type="hidden"  name="edit_school_logo" id="edit_school_logo" value="<?php if(isset($school_logo)){echo $school_logo;} ?>">
                                        <input type="file" tabindex="11" class="form-control" id="school_logo" name="school_logo" onchange="loadFile(event)" style="width:43%">  
                                    <?php } ?>      
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <br><br>
                            <div class="text-right">
                                <button type="submit" name="submitschool_creation" id="submitschool_creation" class="btn btn-primary" value="Submit" tabindex="12">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" tabindex="13">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>