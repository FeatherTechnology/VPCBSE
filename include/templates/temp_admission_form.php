<!--1 = New Student, 2 = Old Student
1= Tamil, 2= English -->
<?php
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id =$_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
}

$id=0;
if(isset($_POST['submittemp_admission_creation']) && $_POST['submittemp_admission_creation'] != '')
{
if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
    $id = $_POST['id']; 	
$updateTempStudentCreationmaster = $userObj->updateTempStudentCreation($mysqli,$id,$userid,$school_id,$year_id);  
?>
<script>location.href='<?php echo $HOSTPATH; ?>edit_temp_admission_form&msc=2';</script> 
<?php	}
else{   
    $addTempStudentCreation = $userObj->addTempStudentCreation($mysqli,$userid,$school_id,$year_id);   
    ?>
    <!-- <script>location.href='<?php echo $HOSTPATH; ?>edit_temp_admission_form&msc=1';</script> -->
    <script>location.href='<?php echo $HOSTPATH; ?>temp_admission_pay_fees&upd=<?php echo $addTempStudentCreation;?>';</script>
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
	$deleteTempStudentCreation = $userObj->deleteTempStudentCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_temp_admission_form&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $school_id =$_SESSION["school_id"];
        $year_id = $_SESSION["academic_year"];
    }
	$getTempStudentCreationDetails = $userObj->getTempStudentCreation($mysqli,$idupd); 
	
	if (sizeof($getTempStudentCreationDetails)>0) {
        // for($ibranch=0;$ibranch<sizeof($getTempStudentCreationDetails);$ibranch++)  {	
            $temp_admission_id                       = $getTempStudentCreationDetails['temp_admission_id'];
			$temp_student_name                	 = $getTempStudentCreationDetails['temp_student_name'];
			$temp_dob          		     = $getTempStudentCreationDetails['temp_dob'];
			$temp_fathercontact_number      			     = $getTempStudentCreationDetails['temp_fathercontact_number'];
			$temp_mothercontact_number      			     = $getTempStudentCreationDetails['temp_mothercontact_number'];
			$temp_gender		         = $getTempStudentCreationDetails['temp_gender'];
			$temp_category    			         = $getTempStudentCreationDetails['temp_category'];
			$temp_standard                	 = $getTempStudentCreationDetails['temp_standard'];
			$temp_no                	 = $getTempStudentCreationDetails['temp_no'];
            $temp_student_type                   = $getTempStudentCreationDetails['temp_student_type'];
			$temp_medium       		     = $getTempStudentCreationDetails['temp_medium'];
			$temp_entrance_exam_date     			     = $getTempStudentCreationDetails['temp_entrance_exam_date'];
			$temp_entrance_exam_mark     		             = $getTempStudentCreationDetails['temp_entrance_exam_mark'];
			$temp_src     			     = $getTempStudentCreationDetails['temp_src'];
			$temp_father_name                      = $getTempStudentCreationDetails['temp_father_name'];
            $temp_mother_name                      = $getTempStudentCreationDetails['temp_mother_name']; 
            $temp_area                      = $getTempStudentCreationDetails['temp_area']; 
            $temp_flat_no                      = $getTempStudentCreationDetails['temp_flat_no']; 
            $temp_street                      = $getTempStudentCreationDetails['temp_street']; 
            $temp_district                      = $getTempStudentCreationDetails['temp_district']; 
            
		// }
	}
}
?>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Temporary Admission Form</li>
    </ol>
    <a href="edit_temp_admission_form">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!--------form start-->
    <form id="temp_student_form" name="temp_student_form" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" value="<?php if(isset($temp_admission_id)) echo $temp_admission_id; ?>"  id="id" name="id">
    <input type="hidden" value="<?php if(isset($temp_standard)) echo $temp_standard; ?>"  id="upd_temp_std" name="upd_temp_std">
    <input type="hidden" id="temp_no" name="temp_no" class="form-control" value="<?php if(isset($temp_no)) echo $temp_no; ?>" >
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">General Info</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_student_name">Student Name</label> <span class="required">*</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="1" id="temp_student_name" name="temp_student_name" class="form-control"  value="<?php if(isset($temp_student_name)) echo $temp_student_name; ?>" placeholder="Enter Student Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <span id="student_namecheck" class="text-danger" style="display: none;">Enter Student Name</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="temp_dob">Date of Birth</label> <span class="required">*</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="date" tabindex="2" id="temp_dob" name="temp_dob" class="form-control"  value="<?php if(isset($temp_dob)) echo $temp_dob; ?>" required>
                                            <span id="student_dob" class="text-danger" style="display: none;">Enter Student DOB</span>
                                            <div class="text-success"  id="age-result"></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label>Gender</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="3" name="temp_gender" id="male" value="Male" <?php echo (isset($temp_gender) && $temp_gender == 'Male') ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="4" name="temp_gender" id="female" value="Female" <?php echo (isset($temp_gender) && $temp_gender == 'Female') ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label>Category</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="5" name="temp_category" id="obc" value="OBC" <?php if (isset($temp_category) && $temp_category == "OBC") echo 'checked'; ?>>
                                                <label class="form-check-label" for="obc">OBC</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="6" name="temp_category" id="bc" value="BC" <?php if (isset($temp_category) && $temp_category == "BC") echo 'checked'; ?>>
                                                <label class="form-check-label" for="bc">BC</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="7" name="temp_category" id="mbc" value="MBC" <?php if (isset($temp_category) && $temp_category == "MBC") echo 'checked'; ?>>
                                                <label class="form-check-label" for="mbc">MBC</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="8" name="temp_category" id="sc" value="SC" <?php if (isset($temp_category) && $temp_category == "SC") echo 'checked'; ?>>
                                                <label class="form-check-label" for="sc">SC</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="9" name="temp_category" id="st" value="ST" <?php if (isset($temp_category) && $temp_category == "ST") echo 'checked'; ?>>
                                                <label class="form-check-label" for="st">ST</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="10" name="temp_category" id="dnc" value="DNC" <?php if (isset($temp_category) && $temp_category == "DNC") echo 'checked'; ?>>
                                                <label class="form-check-label" for="dnc">DNC</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" tabindex="11" name="temp_category" id="bcm" value="BCM" <?php if (isset($temp_category) && $temp_category == "BCM") echo 'checked'; ?>>
                                                <label class="form-check-label" for="bcm">BCM</label>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card-title">Joining Details</div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12"> 
                                        <div class="form-group">
                                        <label for="temp_standard">Standard</label> <span class="required">*</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12"> 
                                        <div class="form-group">
                                        <select class="form-control" tabindex="12" id="temp_standard" name="temp_standard" required>
                                        <option value="">Select a Standard...</option>
                                        </select>
                                        <span id="stdCheck" class="text-danger" style="display: none;">Please Select the Standard from the List </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_student_type">Student Type</label> <span class="required">*</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <select class="form-control" tabindex="13" id="temp_student_type" name="temp_student_type" required>
                                        <option value=''>Select Type</option> 
                                        <option value="1"  <?php  if(isset($temp_student_type) && $temp_student_type == "1"){ echo 'selected'; }?>>New Student</option> 
                                        <option value="2"  <?php  if(isset($temp_student_type) && $temp_student_type == "2"){ echo 'selected'; }?>>Old Student</option>
                                        <option value="3"  <?php  if(isset($temp_student_type) && $temp_student_type == "3"){ echo 'selected'; }?>>Vijayadashami</option>
                                        <option value="4"  <?php  if(isset($temp_student_type) && $temp_student_type == "4"){ echo 'selected'; }?>>All [NEW & OLD]</option>
                                        </select>
                                        <span id="stdTypeCheck" class="text-danger" style="display: none;">Please Select the Student Type from the List </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_medium">Medium</label> <span class="required">*</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <select class="form-control" tabindex="14" id="temp_medium" name="temp_medium" required>
                                            <option value=''>Select Medium</option> 
                                            <option value="1"  <?php  if(isset($temp_medium) && $temp_medium == "1") echo 'selected'; ?>>Tamil</option> 
                                            <option value="2"  <?php  if(isset($temp_medium) && $temp_medium == "2") echo 'selected'; ?>>English</option>
                                        </select>
                                        <span id="mediumCheck" class="text-danger" style="display: none;">Please Select the Medium from the List </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_entrance_exam_date">Entrance Exam Date</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input class="form-control" tabindex="15" id="temp_entrance_exam_date" name="temp_entrance_exam_date" type="date" value="<?php if(isset($temp_entrance_exam_date)) echo $temp_entrance_exam_date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_entrance_exam_mark">Entrance Mark</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="number" tabindex="16" id="temp_entrance_exam_mark" name="temp_entrance_exam_mark" class="form-control"  value="<?php if(isset($temp_entrance_exam_mark)) echo $temp_entrance_exam_mark; ?>" placeholder="Enter Entrance Mark">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="radio" tabindex="17" name="temp_src" id="scholarship" value="Scholarship" <?php if (isset($temp_src) && $temp_src == "Scholarship") echo 'checked'; ?>> &nbsp;&nbsp; <label for="male">Scholarship </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" tabindex="18" name="temp_src" id="rte"  value="RTE" <?php  if(isset($temp_src) && $temp_src == "RTE") echo 'checked'; ?>> &nbsp;&nbsp; <label for="rte">RTE </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" tabindex="19" name="temp_src" id="concession"  value="Concession" <?php  if(isset($temp_src) && $temp_src == "Concession") echo 'checked'; ?>> &nbsp;&nbsp; <label for="concession">Concession </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card-title">Parents Info</div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_father_name">Father Name</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="20" id="temp_father_name" name="temp_father_name" class="form-control"  value="<?php if(isset($temp_father_name)) echo $temp_father_name; ?>" placeholder="Enter Father Name">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_mother_name">Mother Name</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="21" id="temp_mother_name" name="temp_mother_name" class="form-control"  value="<?php if(isset($temp_mother_name)) echo $temp_mother_name; ?>" placeholder="Enter Mother Name">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_fathercontact_number">Father Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="number" tabindex="22" onkeydown="javascript: return event.keyCode == 69 ? false : true"  onkeypress="if(this.value.length==10) return false;" id="temp_fathercontact_number" name="temp_fathercontact_number" class="form-control"  value="<?php if(isset($temp_fathercontact_number)) echo $temp_fathercontact_number; ?>" placeholder="Enter Father Contact Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_mothercontact_number">Mother Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="number" tabindex="22" onkeydown="javascript: return event.keyCode == 69 ? false : true"  onkeypress="if(this.value.length==10) return false;" id="temp_mothercontact_number" name="temp_mothercontact_number" class="form-control"  value="<?php if(isset($temp_mothercontact_number)) echo $temp_mothercontact_number; ?>" placeholder="Enter Mother Contact Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card-title">Address for Communication</div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_flat_no">Flat No</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="23" id="temp_flat_no" name="temp_flat_no" class="form-control"  value="<?php if(isset($temp_flat_no)) echo $temp_flat_no; ?>" placeholder="Enter Flat No">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_street">Street</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="24" id="temp_street" name="temp_street" class="form-control"  value="<?php if(isset($temp_street)) echo $temp_street; ?>" placeholder="Enter Street Name">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_area">Area / Locality</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="25" id="temp_area" name="temp_area" class="form-control"  value="<?php if(isset($temp_area)) echo $temp_area; ?>" placeholder="Enter Area/Locality">
                                        </div>
                                    </div>
                                
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label for="temp_district">District</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                        <input type="text" tabindex="26" id="temp_district" name="temp_district" class="form-control"  value="<?php if(isset($temp_district))  echo $temp_district;?>" placeholder="Enter District">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <br><br>
                                <div class="text-center">
                                    <button type="submit" name="submittemp_admission_creation" id="submittemp_admission_creation" class="btn btn-primary" value="Submit" tabindex="27">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
    </form>
</div>