<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $year_id = $_SESSION["academic_year"];
    $academic_year = $_SESSION["academic_year"];
    $school_id = $_SESSION["school_id"];
} 
$StudentList = $userObj->getTempStudentList($mysqli,$school_id,$year_id);
$NewStudentList = $userObj->getNewTempStudentList($mysqli,$school_id,$year_id);
$OldStudentList = $userObj->getOldTempStudentList($mysqli,$school_id,$year_id);
$StaffList = $userObj->getStaffList($mysqli,$school_id);
$AreaList = $userObj->getAreaList($mysqli,$school_id,$year_id);
$CastList = $userObj->getcastList($mysqli);
// $extraCurricularList = $userObj->getExtrtaCurricularList($mysqli,$school_id,$year_id);

$id=0;
if(isset($_POST['SubmitStudentCreation']) && $_POST['SubmitStudentCreation'] != '')
{
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $updateStudentCreationmaster = $userObj->updateStudentCreation($mysqli,$id,$userid,$school_id,$year_id);  
    ?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_student_creation&msc=2';</script> 
    <?php }
    else{   
		$addStudentCreation = $userObj->addStudentCreation($mysqli,$userid,$school_id,$year_id);   
        ?>
    <script>location.href='<?php echo $HOSTPATH; ?>pay_fees&pagename=stdcreation&upd=<?php echo $addStudentCreation;?>';</script>
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
	$deleteStudentCreation = $userObj->deleteStudentCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_student_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd']; 
} 
$status =0;
if($idupd>0)
{

	$getStudentCreation = $userObj->getStudentCreation($mysqli,$idupd); 
	
	if (sizeof($getStudentCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getStudentCreation);$ibranch++) {	
            $student_id                      = $getStudentCreation['student_id'];
			$temp_no                	 = $getStudentCreation['temp_no'];
			$admission_number          		     = $getStudentCreation['admission_number'];
			$student_name      			     = $getStudentCreation['student_name'];
			$sur_name		         = $getStudentCreation['sur_name'];
			$date_of_birth    			         = $getStudentCreation['date_of_birth'];
			$gender                	 = $getStudentCreation['gender'];
            $mother_tongue                   = $getStudentCreation['mother_tongue'];
			$aadhar_number       		     = $getStudentCreation['aadhar_number'];
			$blood_group     			     = $getStudentCreation['blood_group'];
			$category     		             = $getStudentCreation['category'];
			$castename     			     = $getStudentCreation['castename'];
			$sub_caste                      = $getStudentCreation['sub_caste'];
            $nationality	                      = $getStudentCreation['nationality']; 
            $religion                      = $getStudentCreation['religion']; 
            $student_image                      = $getStudentCreation['student_image']; 
            $filltoo                      = $getStudentCreation['filltoo']; 
            $flat_no                      = $getStudentCreation['flat_no']; 
            $flat_no1	                      = $getStudentCreation['flat_no1']; 
            $street	                      = $getStudentCreation['street']; 
            $street1	                      = $getStudentCreation['street1']; 
            $area_locatlity	                      = $getStudentCreation['area_locatlity']; 
            $area_locatlity1	                      = $getStudentCreation['area_locatlity1']; 
            $district                      = $getStudentCreation['district']; 
            $district1                      = $getStudentCreation['district1']; 
            $pincode                      = $getStudentCreation['pincode']; 
            $pincode1                      = $getStudentCreation['pincode1']; 
            $standard	                      = $getStudentCreation['standard']; 
            $previouschoolname	                      = $getStudentCreation['previouschoolname']; 
            $previousplace                      = $getStudentCreation['previousplace']; 
            $strpreviousdoj	                      = $getStudentCreation['strpreviousdoj']; 
            $strpreviousdol	                      = $getStudentCreation['strpreviousdol']; 
            $timeoftchandedover	                      = $getStudentCreation['timeoftchandedover']; 
            $previousclassattended	                      = $getStudentCreation['previousclassattended']; 
            $section                      = $getStudentCreation['section']; 
            $medium                      = $getStudentCreation['medium']; 
            $studentrollno                      = $getStudentCreation['studentrollno']; 
            $emisno                      = $getStudentCreation['emisno']; 
            $studentstype                      = $getStudentCreation['studentstype']; 
            $referencecat	                      = $getStudentCreation['referencecat']; 
            $refstaffid	                      = $getStudentCreation['refstaffid']; 
            $refstudentid	                      = $getStudentCreation['refstudentid']; 
            $refoldstudentid                      = $getStudentCreation['refoldstudentid']; 
            $referencecatname	                      = $getStudentCreation['referencecatname']; 
            $concession_type	                      = $getStudentCreation['concession_type']; 
            $concessiontypedetails                      = $getStudentCreation['concessiontypedetails']; 
            $facility                      = $getStudentCreation['facility']; 
            $roomcatogoryfeeid                      = $getStudentCreation['roomcatogoryfeeid']; 
            $advancefee                      = $getStudentCreation['advancefee']; 
            $roomrent                      = $getStudentCreation['roomrent']; 
            $transportarearefid	                      = $getStudentCreation['transportarearefid']; 
            $transportstopping                      = $getStudentCreation['transportstopping']; 
            $busno	                      = $getStudentCreation['busno']; 
            $father_name                      = $getStudentCreation['father_name']; 
            $mother_name                      = $getStudentCreation['mother_name']; 
            $father_aadhar_number                      = $getStudentCreation['father_aadhar_number']; 
            $mother_aadhar_number                      = $getStudentCreation['mother_aadhar_number']; 
            $occupation                      = $getStudentCreation['occupation']; 
            $monthly_income                      = $getStudentCreation['monthly_income']; 
            $nature_business                      = $getStudentCreation['nature_business']; 
            $position_held                      = $getStudentCreation['position_held']; 
            $telephone_number                      = $getStudentCreation['telephone_number']; 
            $lives_gaurdian	                      = $getStudentCreation['lives_gaurdian']; 
            $gaurdian_name                      = $getStudentCreation['gaurdian_name']; 
            $gaurdian_mobile                      = $getStudentCreation['gaurdian_mobile']; 
            $gaurdian_aadhar_number                      = $getStudentCreation['gaurdian_aadhar_number']; 
            $gaurdian_email_id                      = $getStudentCreation['gaurdian_email_id']; 
            $father_mobile_no                      = $getStudentCreation['father_mobile_no']; 
            $mother_mobile_no                      = $getStudentCreation['mother_mobile_no']; 
            $father_email_id                      = $getStudentCreation['father_email_id']; 
            $sms_sent_no                      = $getStudentCreation['sms_sent_no']; 
            $sibling_name                      = $getStudentCreation['sibling_name']; 
            $sibling_school_name                      = $getStudentCreation['sibling_school_name']; 
            $sibling_standard                      = $getStudentCreation['sibling_standard']; 
            $sibling_name2                      = $getStudentCreation['sibling_name2']; 
            $sibling_school_name2                      = $getStudentCreation['sibling_school_name2']; 
            $sibling_standard2                      = $getStudentCreation['sibling_standard2']; 
            $sibling_name3                      = $getStudentCreation['sibling_name3']; 
            $sibling_school_name3                      = $getStudentCreation['sibling_school_name3']; 
            $sibling_standard3                      = $getStudentCreation['sibling_standard3']; 
            $anyextracurricular                      = $getStudentCreation['anyextracurricular']; 
            $title                      = $getStudentCreation['title']; 
            $title1                      = $getStudentCreation['title1']; 
            $title2                      = $getStudentCreation['title2']; 
            $title3                      = $getStudentCreation['title3']; 
            $title4                      = $getStudentCreation['title4']; 
            $certificate                      = $getStudentCreation['certificate']; 
            $certificate1                      = $getStudentCreation['certificate1']; 
            $certificate2                      = $getStudentCreation['certificate2']; 
            $certificate3                      = $getStudentCreation['certificate3']; 
            $certificate4                      = $getStudentCreation['certificate4']; 
            $father_image                      = $getStudentCreation['father_image']; 
            $mother_image                      = $getStudentCreation['mother_image']; 
            $extra_curricular_id               =  $getStudentCreation['extra_curricular'];
            $temp_admission_id               =  $getStudentCreation['temp_admission_id'];
            
		}
	}
    ?>
    <?php 
    if(isset($extra_curricular_id)) 
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $year_id = $_SESSION["academic_year"];
        $school_id = $_SESSION["school_id"];
    } 
    $tempStudentSelect = "SELECT fm.fees_id, fm.extra_particulars, fm.extra_amount, fm.extra_date FROM student_creation sc LEFT JOIN fees_master fm ON fm.academic_year = sc.year_id WHERE sc.student_id = '$idupd' AND sc.year_id = '$year_id' AND sc.school_id = '$school_id' AND fm.extra_particulars IS NOT NULL AND fm.extra_amount IS NOT NULL AND fm.fees_id IN ('$extra_curricular_id') AND fm.status = '0'";
    $res = $mysqli->query($tempStudentSelect);
    //   or die("Error in Get All Records" . $mysqli->error)
    $detailrecords = array();
    
    if ($mysqli->affected_rows > 0) {
        while ($row = $res->fetch_object()) {
            $record = array();
            $fees_id[] = $row->fees_id;
            
        }
    }
    ?>


    <input type="hidden" id="standardEdit" name="standardEdit" value="<?php print_r($standard); ?>" >
    <input type="hidden" id="referencecatEdit" name="referencecatEdit" value="<?php print_r($referencecat); ?>" >
    <input type="hidden" id="concession_typeEdit" name="concession_typeEdit" value="<?php print_r($concession_type); ?>" >
    <input type="hidden" id="facilityEdit" name="facilityEdit" value="<?php print_r($facility); ?>" >
    <input type="hidden" id="lives_gaurdianEdit" name="lives_gaurdianEdit" value="<?php print_r($lives_gaurdian); ?>" >
    <input type="hidden" id="father_imageEdit" name="father_imageEdit" value="<?php print_r($father_image); ?>" >
    <input type="hidden" id="mother_imageEdit" name="mother_imageEdit" value="<?php print_r($mother_image); ?>" >
    <script>
        window.onload=editFunctions;
        function editFunctions(){ 
            var standard = $('#standardEdit').val();
            var referencecat = $('#referencecatEdit').val();
            var concession_type = $('#concession_typeEdit').val();
            var facility = $('#facilityEdit').val(); 
            var lives_gaurdian = $('#lives_gaurdianEdit').val(); 
            var father_image = $('#father_imageEdit').val(); 
            var mother_image = $('#mother_imageEdit').val(); 

             // Edit standard
            DropDownStock(father_image)
            DropDownStock(mother_image)
        
            // Edit standard
            hide_show_standard(standard)

            // Edit references
            hide_show_referenceCat(referencecat)

            // Edit concesstion type
            if(concession_type == 'Scholar'){
                $("#concession_types_det").hide();
            } else if(concession_type == 'RTE'){
                $("#concession_types_det").hide();
            } else if(concession_type == 'General'){
                $("#concession_types_det").show();
            } else if(concession_type == 'Covid'){
                $("#concession_types_det").hide();
            }

            // Edit facility
            if(facility == 'Hostel'){ 
                $('#room_details').show();
            } else if(facility == 'Transport'){
                $('#transport_details').show();
            } 

            // Edit lives gaurdian
            if(lives_gaurdian == 'lives_gaurdian'){ 
                $('#gaurdian_details').show();
            } 
             // Enable the text box for editing
            // $('#emisno').prop('readonly', false);
        }

        setTimeout(() => {
            setReferredByValue();
        }, 2000);

    </script>

<?php    
} 
?> 
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #5897fb !important;
        color: white !important;
        border: 1px solid #5897fb !important;
        border-radius: 4px !important;
        cursor: default !important;
        float: left !important;
        margin-right: 5px !important;
        margin-top: 5px !important;
        padding: 0 5px !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white !important;
        cursor: pointer !important;
        display: inline-block !important;
        font-weight: bold !important;
        margin-right: 2px !important;
    }
    
</style>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Student Creation </li>
    </ol>
    <input type="hidden" id="concessiontypedetails" name="" value="<?php if(isset($concessiontypedetails)) { echo $concessiontypedetails; } ?>" >

    <a href="edit_student_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->
<!-- Main container start -->
<input type="hidden" id="extra_cur" name="extra_cur" value="<?php if(isset($extra_curricular_id)) echo $extra_curricular_id; ?>" >

<div class="main-container">
    <!--------form start-->
    <form id = "employee" name="employee" action="" method="post" enctype="multipart/form-data"> 
        <input type="hidden" class="form-control" value="<?php if(isset($student_id)) echo $student_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
        <input type="hidden" class="form-control" value=""  id="tranid" name="tranid">
        <input type="hidden" class="form-control" id="stdidOnEdit" name="stdidOnEdit" value="<?php if(isset($idupd)) echo $idupd; ?>">
    <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<div class="card-title">General Info <i class="icon-stars"></i></div>
					</div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-8 "> 
                                <div class="row">
                                    <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="temp_no">Temporary No</label>
                                            <input type="text" tabindex="1" id="temp_no" name="temp_no" class="form-control"  value="<?php if(isset($temp_no)) echo $temp_no;?>" placeholder="Enter Temporary Number">
                                            <input type="hidden"  id="temp_admission_id" name="temp_admission_id" class="form-control"  value="<?php if(isset($temp_admission_id))  echo $temp_admission_id; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-4 col-md-2 col-sm-2 col-12">
                                        <div class="form-group">
                                            <label for="add_departmentDetails" style="visibility: hidden;">search</label>
                                            <button type="button" class="btn btn-primary"  tabindex="2" id="add_departmentDetails" name="add_departmentDetails" data-toggle="modal" data-target=".addDepartmentModal"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="admission_number">Admission No<span class="required">*</span></label>
                                            <input type="text" tabindex="3" id="admission_number" name="admission_number" class="form-control"  value="<?php if(isset($admission_number)) echo $admission_number; ?>" placeholder="Enter Admission Number">
                                            <span id="admission_numberCheck" class="text-danger" >Enter Admission Number</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Student Name<span class="required">*</span></label>
                                            <input type="text"  id="student_name" tabindex="4" name="student_name" class="form-control"  value="<?php if(isset($student_name)) echo $student_name; ?>" placeholder="Enter Student Name">
                                            <span id="student_nameCheck" class="text-danger" >Enter Student Name</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sur Name</label>
                                            <input type="text"  id="sur_name" tabindex="5" name="sur_name" class="form-control"  value="<?php if(isset($sur_name)) echo $sur_name; ?>" placeholder="Enter Sur Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Date Of Birth</label>
                                            <input class="form-control" tabindex="6" id="date_of_birth" name="date_of_birth" type="date" value="<?php if(isset($date_of_birth)) echo $date_of_birth; ?>">
                                            <div class="text-success"  id="age-result"></div>
                                            <div  class="text-danger" id="age-result1"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Gender<span class="required">*</span></label><br>
                                            <input type="radio" tabindex="7" name="gender" id="male" value="Male" <?php if(isset($gender))
                                            echo ($gender=='Male')?'checked':'' ?>>  &nbsp;&nbsp; <label for="male">Male </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="8" name="gender" id="female"  value="Female" <?php if(isset($gender))
                                            echo ($gender=='Female')?'checked':'' ?>>  &nbsp;&nbsp; <label for="female">Female </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span id="genderCheck" class="text-danger" >| Please Select Gender</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Mother Tongue<span class="required">*</span></label>
                                            <select tabindex="9" class="form-control select2" id="mother_tongue" name="mother_tongue">
                                                <option value="" >Select Your Mother Tongue...</option>
                                                <option value="Hindi" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Hindi" ) echo 'selected'; }?>>Hindi</option>
                                                <option value="Kannada" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Kannada" ) echo 'selected'; }?>>Kannada</option>
                                                <option value="Malayalam" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Malayalam" ) echo 'selected'; }?>>Malayalam</option>
                                                <option value="Sanskrit" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Sanskrit" ) echo 'selected'; }?>>Sanskrit</option>
                                                <option value="Tamil" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Tamil" ) echo 'selected'; }?>>Tamil</option>
                                                <option value="Telugu" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Telugu" ) echo 'selected'; }?>>Telugu</option>
                                                <option value="Others" <?php  if(isset($mother_tongue)) { if($mother_tongue == "Others" ) echo 'selected'; }?>>Others</option>
                                            </select>
                                            <span id="mother_tongueCheck" class="text-danger" >Please Select Mother Tongue</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Aadhar Number</label>
                                            <input  name="aadhar_number" tabindex="10" placeholder ="Aadhar Number" id="aadhar_number" class="form-control" value="<?php if(isset($aadhar_number)) echo $aadhar_number; ?>" data-type="adhaar-number"   type="text">
                                            <span class ='text-danger' id='aadhar_chk'></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Blood Group</label>
                                            <select class="form-control select2" id="blood_group" name="blood_group" tabindex="11">
                                                <option value=" " >Select Your Blood Group...</option>
                                                <option value="A1+" <?php  if(isset($blood_group)) { if($blood_group == "A1+") echo 'selected'; }?>>A1+</option>
                                                <option value="A1-" <?php  if(isset($blood_group)) { if($blood_group == "A1-") echo 'selected'; }?>>A1-</option>
                                                <option value="A2+" <?php  if(isset($blood_group)) { if($blood_group == "A2+") echo 'selected'; }?>>A2+</option>
                                                <option value="A2-" <?php  if(isset($blood_group)) { if($blood_group == "A2-") echo 'selected'; }?>>A2-</option>
                                                <option value="B+" <?php  if(isset($blood_group)) { if($blood_group == "B+") echo 'selected'; }?>>B+</option>
                                                <option value="B-" <?php  if(isset($blood_group)) { if($blood_group == "B-") echo 'selected'; }?>>B-</option>
                                                <option value="A1B+" <?php  if(isset($blood_group)) { if($blood_group == "A1B+") echo 'selected'; }?>>A1B+</option>
                                                <option value="A1B-" <?php  if(isset($blood_group)) { if($blood_group == "A1B-") echo 'selected'; }?>>A1B-</option>
                                                <option value="A2B+" <?php  if(isset($blood_group)) { if($blood_group == "A2B+") echo 'selected'; }?>>A2B+</option>
                                                <option value="A2B-" <?php  if(isset($blood_group)) { if($blood_group == "A2B-") echo 'selected'; }?>>A2B-</option>
                                                <option value="AB+" <?php  if(isset($blood_group)) { if($blood_group == "AB+") echo 'selected'; }?>>AB+</option>
                                                <option value="AB-" <?php  if(isset($blood_group)) { if($blood_group == "AB-") echo 'selected'; }?>>AB-</option>
                                                <option value="O+" <?php  if(isset($blood_group)) { if($blood_group == "O+") echo 'selected'; }?>>O+</option>
                                                <option value="O-" <?php  if(isset($blood_group)) { if($blood_group == "O-") echo 'selected'; }?>>O-</option>
                                                <option value="A+" <?php  if(isset($blood_group)) { if($blood_group == "A+") echo 'selected'; }?>>A+</option>
                                                <option value="A-" <?php  if(isset($blood_group)) { if($blood_group == "A-") echo 'selected'; }?>>A-</option>
                                                <option value="RH+" <?php  if(isset($blood_group)) { if($blood_group == "RH+") echo 'selected'; }?>>RH+</option>
                                                <option value="RH-" <?php  if(isset($blood_group)) { if($blood_group == "RH-") echo 'selected'; }?>>RH-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Category</label><br>
                                                <input type="radio" tabindex="12" name="category" id="obc" value="OBC" <?php if(isset($category))
                                         echo ($category=='OBC')?'checked':'' ?>> &nbsp;&nbsp; <label for="obc">OBC </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" tabindex="13" name="category" id="bc"  value="BC" <?php if(isset($category))
                                         echo ($category=='BC')?'checked':'' ?>> &nbsp;&nbsp; <label for="bc">BC </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" tabindex="14" name="category" id="mbc"  value="MBC" <?php if(isset($category))
                                         echo ($category=='MBC')?'checked':'' ?>> &nbsp;&nbsp; <label for="mbc">MBC </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" tabindex="15" name="category" id="sc"  value="SC" <?php if(isset($category))
                                         echo ($category=='SC')?'checked':'' ?>> &nbsp;&nbsp; <label for="sc">SC </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" tabindex="16" name="category" id="st"  value="ST" <?php if(isset($category))
                                         echo ($category=='ST')?'checked':'' ?>> &nbsp;&nbsp; <label for="st">ST </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" tabindex="17" name="category" id="dnc"  value="DNC"  <?php if(isset($category))
                                         echo ($category=='DNC')?'checked':'' ?>> &nbsp;&nbsp; <label for="dnc">DNC </label> <br>
                                                <input type="radio" tabindex="18" name="category" id="bcm"  value="BCM" <?php if(isset($category))
                                         echo ($category=='BCM')?'checked':'' ?>> &nbsp;&nbsp; <label for="bcm">BCM </label> 
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Caste</label>
                                            <select class="form-control select2" id="castename" name="castename" tabindex="56"><option value="">Select a Caste...</option>
                                                        <?Php for($j=0;$j<count($CastList);$j++) {  ?>
                                                        <option <?php if(isset($castename)) { if($CastList[$j]['cast_id'] == $castename)  echo 'selected'; }  ?> value="<?php echo $CastList[$j]['cast_id']; ?>"><?php echo $CastList[$j]['cast_name'];?></option>
                                                            
                                                        <?php } ?>                                           
                                            </select>
                                         </div>
                                             <!-- <option value="1"<?php  if(isset($castename)) { if($castename == "1") echo 'selected'; }?>>Adi Andhra.</option>
                                                <option value="2"<?php  if(isset($castename)) { if($castename == "2") echo 'selected'; }?>>Adi Dravida.</option>
                                                <option value="3"<?php  if(isset($castename)) { if($castename == "3") echo 'selected'; }?>>Adi Karnataka.</option>
                                                <option value="4"<?php  if(isset($castename)) { if($castename == "4") echo 'selected'; }?>>Ajila.</option>
                                                <option value="5"><?php  if(isset($castename)) { if($castename == "5") echo 'selected'; }?>Arunthathiyar.</option>
                                                <option value="6"<?php  if(isset($castename)) { if($castename == "6") echo 'selected'; }?>>Ayyanavar&#160;</option>
                                                <option value="7"<?php  if(isset($castename)) { if($castename == "7") echo 'selected'; }?>>Baira.</option>
                                                <option value="8"<?php  if(isset($castename)) { if($castename == "8") echo 'selected'; }?>>Bakuda.</option>
                                                <option value="9"<?php  if(isset($castename)) { if($castename == "9") echo 'selected'; }?>>Bandi.</option>
                                                <option value="10"<?php  if(isset($castename)) { if($castename == "10") echo 'selected'; }?>>Bellara.</option>
                                                <option value="11"<?php  if(isset($castename)) { if($castename == "11") echo 'selected'; }?>>Bharatar&#160;</option>
                                                <option value="12"<?php  if(isset($castename)) { if($castename == "12") echo 'selected'; }?>>Chakkiliyan.</option>
                                            </select> --> 
                                    </div>                                   
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Sub Caste</label>
											<input type="text" tabindex="20"  name="sub_caste" id="sub_caste" value="<?php if(isset($sub_caste)) echo $sub_caste; ?>" class="form-control" placeholder="Enter Sub Caste">
										 </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Nationality</label>
											<select class="form-control select2" id="nationality" name="nationality" tabindex="21"><option value="">Select a Country...</option>
                                                <option value="Indian" <?php  if(isset($nationality)) { if($nationality == "Indian") echo 'selected'; }?> >Indian</option>
                                                <option value="Others" <?php  if(isset($nationality)) { if($nationality == "Others") echo 'selected'; }?> >Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Religion</label>
											<select class="form-control select2" id="religion" name="religion" tabindex="22"><option value="">Select an Religion...</option>
                                                <option value="Hindu"<?php  if(isset($religion)) { if($religion == "Hindu") echo 'selected'; }?>>Hindu</option>
                                                <option value="Muslim-All"<?php  if(isset($religion)) { if($religion == "Muslim-All") echo 'selected'; }?>>Muslim-All</option>
                                                <option value="Muslim-Shia"<?php  if(isset($religion)) { if($religion == "Muslim-Shia") echo 'selected'; }?>>Muslim-Shia</option>
                                                <option value="Muslim-Sunni"<?php  if(isset($religion)) { if($religion == "Muslim-Sunni") echo 'selected'; }?>>Muslim-Sunni</option>
                                                <option value="Muslim-Others"<?php  if(isset($religion)) { if($religion == "Muslim-Others") echo 'selected'; }?>>Muslim-Others</option>
                                                <option value="Christian-All"<?php  if(isset($religion)) { if($religion == "Christian-All") echo 'selected'; }?>>Christian-All</option>
                                                <option value="Christian-Orthodox"<?php  if(isset($religion)) { if($religion == "Christian-Orthodox") echo 'selected'; }?>>Christian-Orthodox</option>
                                                <option value="Christian-Protestant"<?php  if(isset($religion)) { if($religion == "Christian-Protestant") echo 'selected'; }?>>Christian-Protestant</option>
                                                <option value="Christian-Others"<?php  if(isset($religion)) { if($religion == "Christian-Others") echo 'selected'; }?>>Christian-Others</option>
                                                <option value="Sikh"<?php  if(isset($religion)) { if($religion == "Sikh") echo 'selected'; }?>>Sikh</option>
                                                <option value="Jain-All"<?php  if(isset($religion)) { if($religion == "Jain-All") echo 'selected'; }?>>Jain-All</option>
                                                <option value="Jain-Digambar"<?php  if(isset($religion)) { if($religion == "Jain-Digamba") echo 'selected'; }?>>Jain-Digambar</option>
                                                <option value="Jain-Shwetambar"<?php  if(isset($religion)) { if($religion == "Jain-Shwetambar") echo 'selected'; }?>>Jain-Shwetambar</option>
                                                <option value="Jain-Others"<?php  if(isset($religion)) { if($religion == "Jain-Others") echo 'selected'; }?>>Jain-Others</option>
                                                <option value="Parsi"<?php  if(isset($religion)) { if($religion == "Parsi") echo 'selected'; }?>>Parsi</option>
                                                <option value="Buddhist"<?php  if(isset($religion)) { if($religion == "Buddhist") echo 'selected'; }?>>Buddhist</option>
                                                <option value="Jewish"<?php  if(isset($religion)) { if($religion == "Jewish") echo 'selected'; }?>>Jewish</option>
                                                <option value="Inter-Religion"<?php  if(isset($religion)) { if($religion == "Inter-Religion") echo 'selected'; }?>>Inter-Religion</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!-- Field Finished -->
                            <div class="col-md-4"><br />
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="disabledInput">Student Photo</label>
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage1">
                                            <input type="file" tabindex="23"  class="form-control" 
                                            accept="image/*" onchange="loadFile1(event)"  
                                            id="student_image" name="student_image" style="width:43%">
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($student_image)){ if($student_image != ''){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="<?php echo "uploads/student_creation/$admission_number/".$student_image ?>" width="43%" id="viewimage1">
                                            <input type="file" tabindex="23"  class="form-control" 
                                            accept="image/*" onchange="loadFile1(event)"  
                                            id="student_image" name="student_image" style="width:43%">
                                            <input type="hidden" name="updateimage" id="updateimage" value="<?php echo $student_image; ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage1">
                                            <input type="file" tabindex="23"  class="form-control" 
                                            accept="image/*" onchange="loadFile1(event)"  
                                            id="student_image" name="student_image" style="width:43%">
                                        </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row start -->
        <!-- Page header end -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Address Info <i class="icon-stars"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!--Fields -->
                            <div class="col-md-8 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Address for Communication</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">
                                            <input type="checkbox"  tabindex="24" value="Address_Permanant"<?php if(isset($filltoo))
                                         echo ($filltoo =='Address_Permanant')?'checked':'' ?>  name="filltoo" id="filltoo" onclick="filladd()">                                  
                                            Permanent Address</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Flat No & Name</label>
                                            <input type="text"  id="flat_no" tabindex="25" name="flat_no" class="form-control"  value="<?php if(isset($flat_no)) echo $flat_no; ?>" placeholder="Enter Flat No & Name ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Flat No & Name</label>
                                            <input type="text"  id="flat_no1" tabindex="26" name="flat_no1" class="form-control"  value="<?php if(isset($flat_no1)) echo $flat_no1; ?>" placeholder="Enter Flat No & Name ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Street</label>
                                            <input class="form-control" tabindex="27" id="street" name="street" type="text" value="<?php if(isset($street)) echo $street; ?>" placeholder="Enter Street">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Street</label>
                                            <input class="form-control" tabindex="28" id="street1" name="street1" type="text" value="<?php if(isset($street1)) echo $street1; ?>" placeholder="Enter Street">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Area / Locality</label>
                                            <input type="text" tabindex="29" id="area_locatlity" name="area_locatlity" class="form-control"  value="<?php if(isset($area_locatlity)) echo $area_locatlity; ?>" placeholder="Enter Area/Locality">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Area / Locality</label>
                                            <input type="text" tabindex="30" id="area_locatlity1" name="area_locatlity1" class="form-control"  value="<?php if(isset($area_locatlity1)) echo $area_locatlity1; ?>" placeholder="Enter Area/Locality">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">District</label>
                                            <input class="form-control" tabindex="31" id="district" name="district" type="text" value="<?php if(isset($district)) echo $district; ?>" placeholder="Enter Place">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">District</label>
                                            <input class="form-control" tabindex="32" id="district1" name="district1" type="text" value="<?php if(isset($district1)) echo $district1; ?>" placeholder="Enter Place">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Pincode</label>
                                            <input tabindex="33" type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode" value="<?php if(isset($pincode)) echo $pincode; ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Pincode</label>
                                            <input tabindex="34" type="number" name="pincode1" id="pincode1" class="form-control" placeholder="Enter Pincode" value="<?php if(isset($pincode1)) echo $pincode1; ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Class Info <i class="icon-stars"></i></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-8 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Joining Details</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="standard">Standard<span class="required">*</span></label>
                                            <input type="hidden" id="standardEditvalue" name="standardEditvalue" value="<?php if(isset($standard)) echo($standard); ?>" >
                                            <select class="form-control select2" id="standard" name="standard" tabindex="35">
                                                <option value="">Select a Standard...</option>
                                            </select>
                                            <span id="standardCheck" class="text-danger">Please Select Standard</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Section<span class="required">*</span></label>
                                            <select class="select2 form-control" id="section" name="section" tabindex="42"><option value="">Select a Section...</option>
                                                <option value="A"<?php  if(isset($section)) { if($section == "A") echo 'selected'; }?>>A</option>
                                                <option value="B"<?php  if(isset($section)) { if($section == "B") echo 'selected'; }?>>B</option>
                                                <option value="C"<?php  if(isset($section)) { if($section == "C") echo 'selected'; }?>>C</option>
                                                <option value="D"<?php  if(isset($section)) { if($section == "D") echo 'selected'; }?>>D</option>
                                            </select>
                                            <span id="sectionCheck" class="text-danger" >Please Select Section</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Medium<span class="required">*</span></label>
                                            <select class="form-control " id="medium" name="medium" tabindex="35"><option value="">Select a Medium...</option>
                                                <option value="1" <?php  if(isset($medium)) { if($medium == "1") echo 'selected'; }?>>Tamil</option>
                                                <option value="2"<?php  if(isset($medium)) { if($medium == "2") echo 'selected'; }?>>English</option>
                                            </select>
                                            <span id="mediumCheck" class="text-danger" >Please Select Medium</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Roll Number<span class="required">*</span></label>
                                            <input class="form-control AlphaNumOnly" placeholder="Enter Roll Number" id="studentrollno" name="studentrollno" tabindex="43" type="text" value="<?php if(isset($studentrollno)) echo $studentrollno; ?>" />
                                            <span id="studentrollnoCheck" class="text-danger" >Please Enter Roll Number</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">EMIS No</label>
                                            <input class="form-control" tabindex="44" id="emisno" placeholder="Enter EMIS No" maxlength="20" name="emisno" type="text" value="<?php if(isset($emisno)) echo $emisno; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Student Type<span class="required">*</span></label>
                                            <select class="form-control" tabindex="45" id="studentstype" name="studentstype">
                                                <option value="">Select a Type of Students...</option>
                                                <option value="1"<?php  if(isset($studentstype)) { if($studentstype == "1") echo 'selected'; }?> >New Student</option>
                                                <option value="2"<?php if(isset($studentstype)) { if($studentstype == "2") echo 'selected'; }?> >Old Student</option>
                                                <option value="3"<?php if(isset($studentstype)) { if($studentstype == "3") echo 'selected'; }?> >Vijayadashami</option>
                                                <option value="4"<?php if(isset($studentstype)) { if($studentstype == "4") echo 'selected'; }?> >All [NEW & OLD]</option>
                                            </select>
                                            <span id="studentstypeCheck" class="text-danger">Please Select Student Type</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Reference(if any)</label>
                                            <input type="hidden" name="referred_by" id="referred_by" >
                                            <select class="select2 form-control" id="referencecat" tabindex="46" name="referencecat"><option value="">Select any...</option>
                                                <option value="New Student"<?php  if(isset($referencecat)) { if($referencecat == "New Student") echo 'selected'; }?>>New Student</option>
                                                <option value="Old Student"<?php  if(isset($referencecat)) { if($referencecat == "Old Student") echo 'selected'; }?>>Old Student</option>
                                                <option value="Staff"<?php  if(isset($referencecat)) { if($referencecat == "Staff") echo 'selected'; }?>>Staff</option>
                                                <option value="Agent"<?php  if(isset($referencecat)) { if($referencecat == "Agent") echo 'selected'; }?>>Agent</option>
                                                <option value="Other"<?php  if(isset($referencecat)) { if($referencecat == "Other") echo 'selected'; }?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="display:none" id="reference_staff">
                                        <div class="form-group">
                                            <label for="inputReadOnly">Staff</label> 
                                            <select class="select2  form-control" id="refstaffid"  name="refstaffid"><option value="">Select a Staff...</option>
                                            <?php if (sizeof($StaffList)>0) { 
                                                for($j=0;$j<count($StaffList);$j++) { ?>
                                                <option <?php if(isset($refstaffid)) { if($StaffList[$j]['staff_id'] == $refstaffid)  echo 'selected'; }  ?> value="<?php echo $StaffList[$j]['staff_id']; ?>">
                                                <?php echo $StaffList[$j]['first_name'];?></option>
                                                <?php }} ?>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="display:none" id="reference_newstudent">
                                        <div class="form-group">
                                            <label class="label">New Student</label>
                                            <select class="select2  form-control RefStudentId refchoosen"  id="refstudentid" name="refstudentid"><option value="">Select a Student...</option>
                                            <?php if (sizeof($NewStudentList)>0) { 
                                                for($j=0;$j<count($NewStudentList);$j++) { ?>
                                                <option <?php if(isset($refstudentid)) { if($NewStudentList[$j]['student_id'] == $refstudentid)  echo 'selected'; }  ?> value="<?php echo $NewStudentList[$j]['student_id']; ?>">
                                                <?php echo $NewStudentList[$j]['student_name'];?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="display:none" id="reference_oldstudent">
                                        <div class="form-group">
                                            <label class="label">Old Student</label>
                                            <select class="select2  form-control" id="refoldstudentid" name="refoldstudentid"><option value="">Select a Student...</option>
                                            <?php if (sizeof($OldStudentList)>0) { 
                                                for($j=0;$j<count($OldStudentList);$j++) { ?>
                                                <option <?php if(isset($refoldstudentid)) { if($OldStudentList[$j]['student_id'] == $refoldstudentid)  echo 'selected'; }  ?> value="<?php echo $OldStudentList[$j]['student_id']; ?>">
                                                <?php echo $OldStudentList[$j]['student_name'];?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="display:none" id="reference_agent">
                                        <div class="form-group">    
                                            <label class="label">Referrer Name</label>
                                            <input class="form-control  reftext" id="referencecatname" maxlength="30" name="referencecatname" type="text" value="<?php if(isset($referencecatname)) echo $referencecatname; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Concession Type</label><br>
                                            <input type="radio" tabindex="47"  name="concession_type" id="scholar" value="Scholar" <?php if(isset($concession_type))
                                         echo ($concession_type=='Scholar')?'checked':'' ?>> &nbsp;&nbsp; <label for="scholar">Scholar </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="48" name="concession_type" id="rte"  value="RTE" <?php if(isset($concession_type))
                                         echo ($concession_type=='RTE')?'checked':'' ?>> &nbsp;&nbsp; <label for="rte">RTE </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="49" name="concession_type" id="general"  value="General" <?php if(isset($concession_type))
                                         echo ($concession_type=='General')?'checked':'' ?>> &nbsp;&nbsp; <label for="general">General </label>
                                         <!-- <input type="radio" tabindex="42" name="concession_type" id="covid"  value="Covid" <?php if(isset($concession_type))
                                         echo ($concession_type=='Covid')?'checked':'' ?>> &nbsp;&nbsp; <label for="covid">Covid </label> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="display:none ;" id="concession_types_det">
                                        <label class="label">Concession Type Details</label>
                                        <div class="form-group">
                                           <select class="form-control form-control-lg select2 concessiontypedetails" tabindex="50" id="concessiontypedetails" name="concessiontypedetails"><option value="">Select an option...</option>
                                                <option value="VIP" <?php  if(isset($concessiontypedetails)) { if($concessiontypedetails == "VIP") echo 'selected'; }?> >VIP</option>
                                                <option value="Govt Quota"<?php  if(isset($concessiontypedetails)) { if($concessiontypedetails == "Govt Quota") echo 'selected'; }?> >Govt Quota</option>
                                                <option value="Student Quota"<?php  if(isset($concessiontypedetails)) { if($concessiontypedetails == "Student Quota") echo 'selected'; }?> >Student Quota</option>
                                                <option value="Teacher Quota"<?php  if(isset($concessiontypedetails)) { if($concessiontypedetails == "Teacher Quota") echo 'selected'; }?> >Teacher Quota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" id="concession_types_det">
                                    <div class="form-group">
                                            <label class="label">Extra Curricular Activities</label>
                                            <select id="extra_curricular" class="select2 form-control " multiple="" data-select2-id="select2-data-extra_curricular" tabindex="51"  name="extra_curricular[]" aria-hidden="true">
                                            </select>
                                    </div>
                                         
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Facility</label><br>
                                            <label>
                                                <!-- <input type="checkbox" tabindex="44" class="radio" value="Hostel" <?php if(isset($facility))
                                         echo ($facility=='Hostel')?'checked':'' ?> id="hostel" name="facility" />&nbsp;&nbsp; Hostel</label>&nbsp;&nbsp; &nbsp;&nbsp; 
                                            <label> -->
                                                <input type="checkbox" tabindex="52" class="radio" value="Transport" <?php if(isset($facility))
                                         echo ($facility=='Transport')?'checked':'' ?> id ="transport" name="facility" />&nbsp;&nbsp; Transport</label>
                                        </div>
                                    </div>
                                    <div style="display:none;" id="room_details">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="label">RoomCatogory</label>
                                                        <select class="form-control select2" tabindex="53" id="roomcatogoryfeeid" name="roomcatogoryfeeid">
                                                            <option value="">Select an option...</option>
                                                            <option value="Single"<?php  if(isset($roomcatogoryfeeid)) { if($roomcatogoryfeeid == "Single") echo 'selected'; }?> >Single</option>
                                                            <option value="Double"<?php  if(isset($roomcatogoryfeeid)) { if($roomcatogoryfeeid == "Double") echo 'selected'; }?> >Double</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="label">Room AdvanceFee</label>
                                                        <input class="form-control NumOnly" tabindex="54" id="advancefee" maxlength="5" name="advancefee" type="text" value="<?php if(isset($advancefee)) echo $advancefee; ?>" placeholder="Enter Room Advance">
                                                    </div>
                                                </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="label">Room Rent</label>
                                                        <input class="form-control NumOnly" tabindex="55" id="roomrent" maxlength="5" name="roomrent" type="text" value="<?php if(isset($roomrent)) echo $roomrent; ?>" placeholder="Enter Room Rent">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" id="transport_details">
                                            <div class="card-body">
                                            <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label class="label">Area of Student</label>
                                                    <div class="form-group">
                                                        <select class="form-control select2 transportarearefid" tabindex="56" id="transportarearefid" name="transportarearefid"><option value="">Select an Area...</option>
                                                        <?Php for($j=0;$j<count($AreaList);$j++) {  ?>
                                                        <option <?php if(isset($transportarearefid)) { if($AreaList[$j]['area_id'] == $transportarearefid)  echo 'selected'; }  ?> value="<?php echo $AreaList[$j]['area_id']; ?>"><?php echo $AreaList[$j]['area_name'];?></option>
                                                            
                                                        <?php } ?>
                                                       
                                                       </select>
                                                       
                                                 </div>
                                            </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="label">Bus Stopping</label>
                                                        <input class="form-control TransportStopping" tabindex="57" id="transportstopping" maxlength="30" name="transportstopping" type="text" value="<?php if(isset($transportstopping)) echo $transportstopping; ?>" placeholder="Enter Bus Stoping" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="label">Bus.No</label>
                                                        <input class="form-control" tabindex="58" id="busno" name="busno" type="text" value="<?php if(isset($busno)) echo $busno; ?>"  placeholder="Enter Bus Number"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> </br>
                                
                                <!-- Previous school details START -->
                                <div class="row" style="display:none" id="previous_school">
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Previous School Details</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">School Name</label>
                                            <input class="form-control CharOnly" id="previouschoolname" tabindex="36" maxlength="50" name="previouschoolname" type="text" value="<?php if(isset($previouschoolname)) echo $previouschoolname; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Place</label>
                                            <input class="form-control CharOnly" id="previousplace" tabindex="37" maxlength="25" name="previousplace" type="text" value="<?php if(isset($previousplace)) echo $previousplace; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">DOJ</label>
                                            <input class="form-control date-picker DOJ" tabindex="38" data-date-format="dd/mm/yyyy" id="strpreviousdoj" name="strpreviousdoj" type="date" value="<?php if(isset($strpreviousdoj)) echo $strpreviousdoj; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">DOL</label>
                                            <input class="form-control date-picker DOL" tabindex="39" data-date-format="dd/mm/yyyy" id="strpreviousdol" name="strpreviousdol" type="date" value="<?php if(isset($strpreviousdol)) echo $strpreviousdol; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Time of TC handed over</label>
                                            <input class="form-control AlphaNum" id="timeoftchandedover" tabindex="40" maxlength="20" name="timeoftchandedover" type="text" value="<?php if(isset($timeoftchandedover)) echo $timeoftchandedover; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="label">Class attended</label>
                                            <input class="form-control AlphaNum" id="previousclassattended" tabindex="41" maxlength="10" name="previousclassattended" type="text" value="<?php if(isset($previousclassattended)) echo $previousclassattended; ?>" />
                                        </div>
                                    </div>
        
                                    <div class="form-group hidegroup">
                                        <div class="col-sm-12">
                                            <span class="text-danger"><i class="medium glyphicon glyphicon-file"></i> *Please attach a copy of the Previous School report and Marksheet in <b>Certificate Info</b>.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Previous school details END -->
                            </div>
                        </div>

                    </div> <!--class info  tab content end-->
                </div>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Family Info <i class="icon-stars"></i></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                           
                                <div class="col-md-4 image_div" style="display:none" ><br />
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Parents Details</div>
                                        </div>
                                    </div>
                                    <br><br>
                                        <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <label for="disabledInput">Father Photo</label>
                                            <?php if(isset($_GET['upd'])<=0){ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="img/profile-pic.jpg" width="43%" id="viewimage2">
                                                    <input type="file" tabindex="59"  class="form-control" 
                                                    accept="image/*" onchange="loadFile2(event)"  
                                                    id="father_image" name="father_image" style="width:43%">
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($father_image)){ if($father_image != ''){ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="<?php echo "uploads/student_creation/$admission_number/".$father_image ?>" width="43%" id="viewimage2">
                                                    <input type="file" tabindex="60"  class="form-control" 
                                                    accept="image/*" onchange="loadFile2(event)" 
                                                    id="father_image" name="father_image" style="width:43%">
                                                    <input type="hidden" name="updatefatherimage" id="updatefatherimage" value="<?php echo $father_image; ?>">
                                                </div>
                                            <?php }else{ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="img/profile-pic.jpg" width="43%" id="viewimage2">
                                                    <input type="file" tabindex="61"  class="form-control" 
                                                    accept="image/*" onchange="loadFile2(event)"  
                                                    id="father_image" name="father_image" style="width:43%">
                                                </div>
                                            <?php }} ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 image_div" style="display:none"><br />
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="visibility:hidden">
                                                <div class="form-group">
                                                    <div class="card-title">Parents Details</div>
                                                </div>
                                            </div><br><br>
                                        <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <label for="disabledInput">Mother Photo</label>
                                            <?php if(isset($_GET['upd'])<=0){ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="img/profile-pic.jpg" width="43%" id="viewimage3">
                                                    <input type="file" tabindex="62"  class="form-control" 
                                                    accept="image/*" onchange="loadFile3(event)"  
                                                    id="mother_image" name="mother_image" style="width:43%">
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($mother_image)){ if($mother_image != ''){ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="<?php echo "uploads/student_creation/$admission_number/".$mother_image ?>" width="43%" id="viewimage3">
                                                    <input type="file" tabindex="63"  class="form-control" 
                                                    accept="image/*" onchange="loadFile3(event)"  
                                                    id="mother_image" name="mother_image" style="width:43%">
                                                    <input type="hidden" name="updatemotherimage" id="updatemotherimage" value="<?php echo $mother_image; ?>">
                                                </div>
                                            <?php }else{ ?>
                                                <div class="form-group" style="margin: auto;"> 
                                                    <img src="img/profile-pic.jpg" width="43%" id="viewimage2">
                                                    <input type="file" tabindex="64"  class="form-control" 
                                                    accept="image/*" onchange="loadFile3(event)"  
                                                    id="mother_image" name="mother_image" style="width:43%">
                                                </div>
                                            <?php }} ?>
                                        </div>
                                    </div>
                           
                            <div class="col-md-8 "> 
                                <div class="row">
                                    
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12" style="visibility:hidden">
                                        <div class="form-group">
                                            <div class="card-title">Parents Details</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Father Name</label>
                                            <input type="text"  id="father_name" tabindex="65" name="father_name" class="form-control"  value="<?php if(isset($father_name)) echo $father_name; ?>" placeholder="Enter Father Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Mother Name</label>
                                            <input type="text"  id="mother_name" tabindex="66" name="mother_name" class="form-control"  value="<?php if(isset($mother_name)) echo $mother_name; ?>" placeholder="Enter Mother Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Father Aadhar Number</label>
                                            <input  name="father_aadhar_number" tabindex="67" placeholder ="Father Aadhar Number" id="father_aadhar_number" value="<?php if(isset($father_aadhar_number)) echo $father_aadhar_number; ?>" class="form-control"  data-type="adhaar-number" maxLength="14"  type="text">
                                            <span class ='text-danger' id='dadaadhar_chk'></span>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Mother Aadhar Number</label>
                                            <input  name="mother_aadhar_number" tabindex="68" placeholder ="Mother Aadhar Number" id="mother_aadhar_number" value="<?php if(isset($mother_aadhar_number)) echo $mother_aadhar_number; ?>" class="form-control"  data-type="adhaar-number" maxLength="14"  type="text">
                                            <span class ='text-danger' id='momaadhar_chk'></span>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Occupation</label><br>
                                            <input type="radio" tabindex="69" name="occupation" id="job" value="Job" <?php if(isset($occupation))
                                         echo ($occupation=='Job')?'checked':'' ?>> &nbsp;&nbsp; <label for="job">Job </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="70" name="occupation" id="business"  value="Business" <?php if(isset($occupation))
                                         echo ($occupation=='Business')?'checked':'' ?>> &nbsp;&nbsp; <label for="business">Business </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>   
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Monthly Income</label>
                                            <input  name="monthly_income" tabindex="71" placeholder ="Monthly Income" id="monthly_income" value="<?php if(isset($monthly_income)) echo $monthly_income; ?>" class="form-control" type="number">
                                        </div>
                                    </div> 
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Nature Of Business</label>
                                            <input type="text" id="nature_business" tabindex="72"  name="nature_business" class="form-control"  value="<?php if(isset($nature_business)) echo $nature_business; ?>" placeholder="Enter Nature Of Business">
                                        </div>
                                    </div>  
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Position Held</label>
                                            <input type="text" id="position_held" tabindex="73" name="position_held" class="form-control"  value="<?php if(isset($position_held)) echo $position_held; ?>" placeholder="Enter Position Held">
                                        </div>
                                    </div> 
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Telephone</label>
                                            <input type="number" id="telephone_number" tabindex="74" name="telephone_number" class="form-control"  value="<?php if(isset($telephone_number)) echo $telephone_number; ?>" placeholder="Enter Telephone Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                            <span id="mobile" class="text-danger"></span>
                                        </div>
                                    </div>    
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Lives with Guardian</label>&nbsp;&nbsp;
                                            <input type="checkbox" id="lives_gaurdian" tabindex="75" name="lives_gaurdian" value="lives_gaurdian" <?php if(isset($lives_gaurdian))
                                        echo ($lives_gaurdian=='lives_gaurdian')?'checked':'' ?>>
                                        </div>
                                    </div> 

                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12 gaurdian_details" style="display:none;">
                                            <div class="form-group">
                                                <label for="disabledInput">Gaurdian Name</label>&nbsp;&nbsp;
                                                <input type="text" class="form-control" id="gaurdian_name" tabindex="76" name="gaurdian_name" value="<?php if(isset($gaurdian_name)) echo $gaurdian_name; ?>" placeholder="Enter Gaurdian Name">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12 gaurdian_details" style="display:none;">
                                            <div class="form-group">
                                                <label for="disabledInput">Gaurdian Mobile</label>
                                                <input type="number" id="gaurdian_mobile" tabindex="77" name="gaurdian_mobile" class="form-control"  value="<?php if(isset($gaurdian_mobile)) echo $gaurdian_mobile; ?>" placeholder="Enter Gaurdian Mobile Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                                <span id="gaurdmobile" class="text-danger"></span>
                                            </div>
                                        </div> 

                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12 gaurdian_details" style="display:none;">
                                            <div class="form-group">
                                                <label for="disabledInput">Gaurdian Aadhar Number</label>
                                                <input  name="gaurdian_aadhar_number" tabindex="78" placeholder ="Gaurdian Aadhar Number" id="gaurdian_aadhar_number" value="<?php if(isset($gaurdian_aadhar_number)) echo $gaurdian_aadhar_number; ?>" class="form-control"  data-type="adhaar-number" maxLength="14"  type="text">
                                                <span id="gaurdaadhar_chk" class="text-danger"></span>
                                            </div>
                                        </div> 

                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12 gaurdian_details" style="display:none;">
                                            <div class="form-group">
                                                <label for="disabledInput">Gaurdian Email Id</label>
                                                <input  name="gaurdian_email_id" tabindex="79" placeholder ="Gaurdian Email Id" id="gaurdian_email_id" value="<?php if(isset($gaurdian_email_id)) echo $gaurdian_email_id; ?>" class="form-control" type="email">
                                                <span id="gaurdemail" class="text-danger"></span>
                                            </div>
                                        </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Father Mobile No</label><span class="required">*</span>
                                            <input type="number" id="father_mobile_no" tabindex="80" name="father_mobile_no" class="form-control"  value="<?php if(isset($father_mobile_no)) echo $father_mobile_no; ?>" placeholder="Enter Father Mobile Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                            <span id="dadmobile" class="text-danger"></span>
                                        </div>
                                    </div> 
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Mother Mobile No</label><span class="required">*</span>
                                            <input type="number" id="mother_mobile_no" tabindex="81" name="mother_mobile_no" class="form-control"  value="<?php if(isset($mother_mobile_no)) echo $mother_mobile_no; ?>" placeholder="Enter Mother Mobile Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                            <span id="mommobile" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Father Email Id</label>
                                            <input type="email" id="father_email_id" tabindex="82" name="father_email_id" class="form-control"  value="<?php if(isset($father_email_id)) echo $father_email_id; ?>" placeholder="Enter Father Email Id">
                                            <span id="dademail" class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">SMS Sent No</label><span class="required">*</span>
                                            <input type="number" id="sms_sent_no" tabindex="83" name="sms_sent_no" class="form-control"  value="<?php if(isset($sms_sent_no)) echo $sms_sent_no; ?>" placeholder="Enter SMS Sent Mobile Number" onkeydown="javascript: return event.keyCode == 69 ? false : true" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                            <span id="smsmobile" class="text-danger" style="display: none;">Enter 10 Digit Mobile Number</span>

                                        </div>
                                    </div> <br><br><br><br><br>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Sibling Details 1</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_name" class="form-control" tabindex="84" name="sibling_name" value="<?php if(isset($sibling_name)) echo $sibling_name; ?>" placeholder="Enter Sibling Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling School Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_standard" class="form-control" tabindex="85" name="sibling_school_name" value="<?php if(isset($sibling_school_name)) echo $sibling_school_name; ?>" placeholder="Enter Sibling School Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling STD</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_standard"class="form-control"  tabindex="86" name="sibling_standard" value="<?php if(isset($sibling_standard)) echo $sibling_standard; ?>" placeholder="Enter Sibling Standard">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Sibling Details 2</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_name2" class="form-control" tabindex="87" name="sibling_name2" value="<?php if(isset($sibling_name2)) echo $sibling_name2; ?>" placeholder="Enter Sibling Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling School Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_school_name2" class="form-control" tabindex="88" name="sibling_school_name2" value="<?php if(isset($sibling_school_name2)) echo $sibling_school_name2; ?>" placeholder="Enter Sibling School Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling STD</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_standard2"class="form-control"  tabindex="89" name="sibling_standard2" value="<?php if(isset($sibling_standard2)) echo $sibling_standard2; ?>" placeholder="Enter Sibling Standard">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="card-title">Sibling Details 3</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_name3" class="form-control" tabindex="90" name="sibling_name3" value="<?php if(isset($sibling_name3)) echo $sibling_name3; ?>" placeholder="Enter Sibling Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling School Name</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_school_name3" class="form-control" tabindex="91" name="sibling_school_name3" value="<?php if(isset($sibling_school_name3)) echo $sibling_school_name3; ?>" placeholder="Enter Sibling School Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Sibling STD</label>&nbsp;&nbsp;
                                            <input type="text" id="sibling_standard3"class="form-control"  tabindex="92" name="sibling_standard3" value="<?php if(isset($sibling_standard3)) echo $sibling_standard3; ?>" placeholder="Enter Sibling Standard">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Page header end -->
         <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Others <i class="icon-stars"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!--Fields -->
                            <div class="col-md-8 "> 
                                <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <textarea class="form-control" cols="10" id="anyextracurricular" maxlength="1000" name="anyextracurricular" rows="6" tabindex="93" >
                                        <?php if(isset($anyextracurricular)) echo $anyextracurricular;?>
                                        </textarea>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Certificate Info <i class="icon-stars"></i></div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <!--Fields -->
                            <div class="col-md-8"> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title" class="form-control" tabindex="94" name="title" value="<?php if(isset($title)) echo $title; ?>" placeholder="Enter Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group">
                                        <label class="label" style="visibility:hidden">Certificate</label> <br>
                                            <input type="file" class="form-control" tabindex="95" name="certificate" id="certificate">
                                        </div>
                                        <?php } ?> 
                                        <?php if(isset($certificate)){ if($certificate != ''){ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate</div> 
                                            <input type="file" class="form-control" tabindex="96" name="certificate" id="certificate"><br>
                                        
                                            <a href="<?php echo "uploads/certificates/$admission_number/".$certificate; ?>" target="_blank" download>Click Here To Download Your  <?php if(isset($title)) echo $title; ?> Certificate</a>
                                            <input type="hidden"  name="updatecertificate" id="updatecertificate" value="<?php echo $certificate; ?>">									
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate</div> 
                                            <input type="file" class="form-control" tabindex="97" class="form-control" name="certificate" id="certificate">
                                        </div>
                                        <?php }} ?>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title1" class="form-control" tabindex="98" name="title1" value="<?php if(isset($title1)) echo $title1; ?>" placeholder="Enter Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group">
                                        <label class="label" style="visibility:hidden">Certificate</label> <br>
                                        
                                            <input type="file" class="form-control" tabindex="99" name="certificate1" id="certificate1">
                                        </div>
                                        <?php } ?> 
                                        <?php if(isset($certificate1)){ if($certificate1 != ''){ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate</div> 
                                            <input type="file" class="form-control" tabindex="100" name="certificate1" id="certificate1"><br>
                                        
                                            <a href="<?php echo "uploads/certificates/$admission_number/".$certificate1; ?>" target="_blank" download>Click Here To Download Your <?php if(isset($title1)) echo $title1; ?> Certificate</a>
                                            <input type="hidden"  name="updatecertificate1" id="updatecertificate1" value="<?php echo $certificate1; ?>">									
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate1</div> 
                                            <input type="file" tabindex="101" class="form-control" name="certificate1" id="certificate1">
                                        </div>
                                        <?php }} ?>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title2" class="form-control" tabindex="102" name="title2" value="<?php if(isset($title2)) echo $title2; ?>" placeholder="Enter Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group">
                                        <label class="label" style="visibility:hidden">Certificate</label> <br>
                                        
                                            <input type="file" class="form-control" tabindex="103" name="certificate2" id="certificate2">
                                        </div>
                                        <?php } ?> 
                                        <?php if(isset($certificate2)){ if($certificate2 != ''){ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate2</div> 
                                            <input type="file" class="form-control" tabindex="104" name="certificate2" id="certificate2"><br>
                                        
                                            <a href="<?php echo "uploads/certificates/$admission_number/".$certificate2; ?>" target="_blank" download>Click Here To Download Your  <?php if(isset($title2)) echo $title2; ?> Certificate</a>
                                            <input type="hidden"  name="updatecertificate2" id="updatecertificate2" value="<?php echo $certificate2; ?>">									
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate2</div> 
                                            <input type="file" tabindex="105" class="form-control" name="certificate2" id="certificate2">
                                        </div>
                                        <?php }} ?>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title3" class="form-control" tabindex="106" name="title3" value="<?php if(isset($title3)) echo $title3; ?>" placeholder="Enter Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group">
                                        <label class="label" style="visibility:hidden">Certificate</label> <br>
                                        
                                            <input type="file" class="form-control" tabindex="107" name="certificate3" id="certificate3">
                                        </div>
                                        <?php } ?> 
                                        <?php if(isset($certificate3)){ if($certificate3 != ''){ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate3</div> 
                                            <input type="file" class="form-control" tabindex="108" name="certificate3" id="certificate3"><br>
                                        
                                            <a href="<?php echo "uploads/certificates/$admission_number/".$certificate3; ?>" target="_blank" download>Click Here To Download Your  <?php if(isset($title3)) echo $title3; ?> Certificate</a>
                                            <input type="hidden"  name="updatecertificate3" id="updatecertificate3" value="<?php echo $certificate3; ?>">									
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate3</div> 
                                            <input type="file" tabindex="109" class="form-control" name="certificate3" id="certificate3">
                                        </div>
                                        <?php }} ?>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title4" class="form-control" tabindex="110" name="title4" value="<?php if(isset($title4)) echo $title4; ?>" placeholder="Enter Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group">
                                        <label class="label" style="visibility:hidden">Certificate</label> <br>
                                        
                                            <input type="file" class="form-control" tabindex="111" name="certificate4" id="certificate4">
                                        </div>
                                        <?php } ?> 
                                        <?php if(isset($certificate4)){ if($certificate4 != ''){ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate4</div> 
                                            <input type="file" class="form-control" tabindex="112" name="certificate4" id="certificate4"><br>
                                        
                                            <a href="<?php echo "uploads/certificates/$admission_number/".$certificate4; ?>" target="_blank" download>Click Here To Download Your  <?php if(isset($title4)) echo $title4; ?> Certificate</a>
                                            <input type="hidden"  name="updatecertificate4" id="updatecertificate4" value="<?php echo $certificate4; ?>">									
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <div class="card-title" style="visibility:hidden">Certificate4</div> 
                                            <input type="file" tabindex="113" class="form-control" name="certificate4" id="certificate4">
                                        </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <br><br>
                                        <div class="text-right">
                                            <button type="submit" name="SubmitStudentCreation" id="SubmitStudentCreation" class="btn btn-primary" value="Submit" tabindex="116">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" tabindex="117">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: white">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Admission Number Search</h5>
                <button type="button" class="close" id="temp_no_empty" data-dismiss="modal" aria-label="Close" onclick="DropDownStock()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <div class="row">    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">     
                            <input type="hidden" name="temp_admission_id" id="temp_admission_id">
                        </div>
                    </div>           
                </div>
            <div id="updateddepartmentTable"> 
                    <table class="table custom-table" id="departmentTable"> 
                <thead>
                    <tr>
                        <th width="50">S. No</th>
                        <th>Temporary Register Number</th>
                        <th>Student Name</th>
                        <th>Standard</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php if (sizeof($StudentList)>0) { 
                            for($j=0;$j<count($StudentList);$j++) { ?>
                            <tr>
                                <td class="col-md-2 col-xl-2"><?php echo $j+1; ?></td>
                                <td><?php  echo $StudentList[$j]['temp_no']; ?></td>
                                <td><?php  echo $StudentList[$j]['temp_student_name']; ?></td>
                                <td><?php  echo $StudentList[$j]['temp_standard']; ?></td>
                                <td>
                                    <a id="temp_admission_id" name="temp_admission_id" value="<?php echo $StudentList[$j]['temp_admission_id'] ?>"><span class='icon-eye'></span></a> 
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </div>
            

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="DropDownDesig()">Close</button>
            </div>

        </div>
    </div>
</div>
