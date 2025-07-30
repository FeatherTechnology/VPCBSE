<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
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
		$addSchoolCreation = $userObj->addSchoolCreation($mysqli,$userid);   
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
			$email_id     			     = $getSchoolCreation['email_id'];
		}
	}
}
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Covid Bulk Concession </li>
    </ol>

    <a href="edit_school_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
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
                           <div class="col-md-12 "> 
                              <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                            <label for="disabledInput">Standard<span class="required">*</span></label>
                                            <select class="form-control" id="standard" name="standard" tabindex="33">
                                                <option value="">Select a Standard...</option>
                                                <option value="2" <?php  if(isset($standard)) { if($standard == "2") echo 'selected'; }?>>PRE.K.G</option>
                                                <option value="3"<?php  if(isset($standard)) { if($standard == "3") echo 'selected'; }?>>L.K.G</option>
                                                <option value="4" <?php  if(isset($standard)) { if($standard == "4") echo 'selected'; }?>>U.K.G</option>
                                                <option value="5" <?php  if(isset($standard)) { if($standard == "5") echo 'selected'; }?>>I</option>
                                                <option value="6" <?php  if(isset($standard)) { if($standard == "6") echo 'selected'; }?>>II</option>
                                                <option value="7" <?php  if(isset($standard)) { if($standard == "7") echo 'selected'; }?>>III</option>
                                                <option value="8" <?php  if(isset($standard)) { if($standard == "8") echo 'selected'; }?>>IV</option>
                                                <option value="9" <?php  if(isset($standard)) { if($standard == "9") echo 'selected'; }?>>V</option>
                                                <option value="10" <?php  if(isset($standard)) { if($standard == "10") echo 'selected'; }?>>VI</option>
                                                <option value="11" <?php  if(isset($standard)) { if($standard == "11") echo 'selected'; }?>>VII</option>
                                                <option value="12" <?php  if(isset($standard)) { if($standard == "12") echo 'selected'; }?>>VIII</option>
                                                <option value="13" <?php  if(isset($standard)) { if($standard == "13") echo 'selected'; }?>>IX</option>
                                                <option value="14" <?php  if(isset($standard)) { if($standard == "14") echo 'selected'; }?>>X</option>
                                                <option value="15" <?php  if(isset($standard)) { if($standard == "15") echo 'selected'; }?>>XI_Maths_Biology</option>
                                                <option value="16" <?php  if(isset($standard)) { if($standard == "16") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                                <option value="17" <?php  if(isset($standard)) { if($standard == "17") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                                <option value="18" <?php  if(isset($standard)) { if($standard == "18") echo 'selected'; }?>>XII_Maths_Biology</option>
                                                <option value="19" <?php  if(isset($standard)) { if($standard == "19") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                                <option value="20" <?php  if(isset($standard)) { if($standard == "20") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                                <option value="21" <?php  if(isset($standard)) { if($standard == "21") echo 'selected'; }?>>XI_All</option>
                                                <option value="22" <?php  if(isset($standard)) { if($standard == "22") echo 'selected'; }?>>XII_All</option>
                                                <option value="23" <?php  if(isset($standard)) { if($standard == "23") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                                <option value="24" <?php  if(isset($standard)) { if($standard == "24") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                            </select>
                                            <!-- <span id="standardCheck" class="text-danger">Please Select Standard</span> -->
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                            <label for="disabledInput">Student Type<span class="required">*</span></label>
                                            <select class="form-control" tabindex="38" id="studentstype" name="studentstype"><option value="">Select a Type of Students...</option>
                                                <option value="NewStudent"<?php  if(isset($studentstype)) { if($studentstype == "NewStudent") echo 'selected'; }?> >NewStudent</option>
                                                <option value="OldStudent"<?php if(isset($studentstype)) { if($studentstype == "OldStudent") echo 'selected'; }?> >OldStudent</option>
                                            </select>
                                            <!-- <span id="studentstypeCheck" class="text-danger">Please Select Student Type</span> -->
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                            <label for="disabledInput">Fees Master<span class="required">*</span></label>
                                            <select class="form-control" tabindex="38" id="studentstype" name="studentstype"><option value="">Select a Fees Master...</option>
                                                <option value="NewStudent"<?php  if(isset($studentstype)) { if($studentstype == "NewStudent") echo 'selected'; }?> >NewStudent</option>
                                                <option value="OldStudent"<?php if(isset($studentstype)) { if($studentstype == "OldStudent") echo 'selected'; }?> >OldStudent</option>
                                            </select>
                                            <!-- <span id="studentstypeCheck" class="text-danger">Please Select Student Type</span> -->
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Amount</label>
                                            <input type="number" tabindex="4" id="amount" name="amount" class="form-control"  value="<?php if(isset($amount)) echo $amount; ?>" placeholder="0">
                                              <!-- <span id="address2check" class="text-danger" >Enter Address2</span>  -->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <button style="margin-top:17px;" type="submit" name="submitschool_creation" id="submitschool_creation" class="btn btn-primary" value="Submit" tabindex="9">Generate Concession</button>
                                    </div>
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

<script>
    $('.select2').select2();
</script>

