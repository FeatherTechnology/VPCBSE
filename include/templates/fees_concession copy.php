<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 
$StudentList = $userObj->getStudentList($mysqli);

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
<style>
    .dataTables_filter input {
    border: 1px solid #e4e4e4;
    padding: 7px;
}
.select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
.select2{
    width:377%
}
</style>
<link rel="stylesheet" href="css/select2.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Overall Concession Screen </li>
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
                                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <input type="radio" tabindex="40" name="concession_type" id="general_concession" value="General Concession" <?php if(isset($concession_type))
                                                                echo ($concession_type=='General Concession')?'checked':'' ?>> &nbsp;&nbsp; <label for="general_concession">General Concession </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" tabindex="41" name="concession_type" id="referal_concession"  value="Referal Concession" <?php if(isset($concession_type))
                                                                echo ($concession_type=='Referal Concession')?'checked':'' ?>> &nbsp;&nbsp; <label for="referal_concession">Referal Concession  </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" tabindex="42" name="concession_type" id="manual_concession"  value="Manual Concession" <?php if(isset($concession_type))
                                                                echo ($concession_type=='Manual Concession')?'checked':'' ?>> &nbsp;&nbsp; <label for="manual_concession">Manual Concession </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="manual_concessionDiv" style="display:none;">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">General Concession Form</div>
                                                </div>
                                            <div class="card-body">
                                                <div class="row ">
                                                <!--Fields -->
                                                     <div class="col-md-12 "> 
                                                        <div class="row">
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control " id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option value="Tamil" <?php  if(isset($medium)) { if($medium == "Tamil") echo 'selected'; }?>>Tamil</option> 
                                        <option value="English" <?php  if(isset($medium)) { if($medium == "English") echo 'selected'; }?>>English</option>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                            <select class="form-control " id="standard" name="standard">
                                                <option value="">Select a Standard...</option>
                                                <option value="PRE.K.G" <?php  if(isset($temp_standard)) { if($temp_standard == "PRE.K.G") echo 'selected'; }?>>PRE.K.G</option>
                                                <option value="L.K.G"<?php  if(isset($temp_standard)) { if($temp_standard == "L.K.G") echo 'selected'; }?>>L.K.G</option>
                                                <option value="U.K.G" <?php  if(isset($temp_standard)) { if($temp_standard == "U.K.G") echo 'selected'; }?>>U.K.G</option>
                                                <option value="I" <?php  if(isset($temp_standard)) { if($temp_standard == "I") echo 'selected'; }?>>I</option>
                                                <option value="II" <?php  if(isset($temp_standard)) { if($temp_standard == "II") echo 'selected'; }?>>II</option>
                                                <option value="III" <?php  if(isset($temp_standard)) { if($temp_standard == "III") echo 'selected'; }?>>III</option>
                                                <option value="IV" <?php  if(isset($temp_standard)) { if($temp_standard == "IV") echo 'selected'; }?>>IV</option>
                                                <option value="V" <?php  if(isset($temp_standard)) { if($temp_standard == "V") echo 'selected'; }?>>V</option>
                                                <option value="VI" <?php  if(isset($temp_standard)) { if($temp_standard == "VI") echo 'selected'; }?>>VI</option>
                                                <option value="VI" <?php  if(isset($temp_standard)) { if($temp_standard == "VI") echo 'selected'; }?>>VII</option>
                                                <option value="VIII" <?php  if(isset($temp_standard)) { if($temp_standard == "VIII") echo 'selected'; }?>>VIII</option>
                                                <option value="IX" <?php  if(isset($temp_standard)) { if($temp_standard == "IX") echo 'selected'; }?>>IX</option>
                                                <option value="X" <?php  if(isset($temp_standard)) { if($temp_standard == "X") echo 'selected'; }?>>X</option>
                                                <option value="XI_Maths_Biology" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Maths_Biology") echo 'selected'; }?>>XI_Maths_Biology</option>
                                                <option value="XI_Maths_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Maths_ComputerScience") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                                <option value="XI_Biology_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Biology_ComputerScience") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                                <option value="XII_Maths_Biology" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Maths_Biology") echo 'selected'; }?>>XII_Maths_Biology</option>
                                                <option value="XII_Maths_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Maths_ComputerScience") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                                <option value="XII_Biology_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Biology_ComputerScience") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                                <option value="XI_All" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_All") echo 'selected'; }?>>XI_All</option>
                                                <option value="XII_All" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_All") echo 'selected'; }?>>XII_All</option>
                                                <option value="XI_Commerce_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Commerce_ComputerScience") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                                <option value="XII_Commerce_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Commerce_ComputerScience") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                               
                                        </select>
                                    </div>
                                </div>
                              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Section</label>
                                        <select class="form-control " id="section" name="section">
                                          <option>Select Section</option> 
                                         </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Select Students</label>
                                        <select class="form-control" id="student_id" name="student_id">
                                            <option value="">Select a Student...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    <select class="form-control" id="student_name1" name="student_name1"><option value="">Select a Student...</option>
                                            <?php if (sizeof($StudentList)>0) { 
                                                for($j=0;$j<count($StudentList);$j++) { ?>
                                                <option <?php if(isset($student_id)) { if($StudentList[$j]['student_id'] == $student_id)  echo 'selected'; }  ?> value="<?php echo $StudentList[$j]['student_id']; ?>">
                                                <?php echo $StudentList[$j]['student_name'] .'-'. $StudentList[$j]['admission_number'] ;?></option>
                                                <?php }} ?>
                                            </select>
                                        <!-- <span id="studentstypeCheck" class="text-danger">Please Select Student Type</span> -->
                                    </div>
                                </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12"></div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="disabledInput"><b>OR</b></label>
                                        </div>
                                    </div>     
              
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="general_concessionDiv" style="display:none">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div id="stockinfotable">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Student Concession List Pending for Approval</div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="general_concessionTable" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    <th width="50">S.No</th>
                                                                    <th>Admission No</th>
                                                                    <th>Name Of The Student</th>
                                                                    <th>Address</th>
                                                                    <th>Standard</th>
                                                                    <th>Concession On</th>
                                                                    <th>Remark</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $ctselect="SELECT * FROM student_creation WHERE 1 AND status=0"; 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                ?>
                                                                <tr>
                                                                <td><?php echo $i; ?></td>
                                                                 <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                 <td><?php if(isset($ct["student_name"])){ echo $ct["student_name"]; }?></td>
                                                                 <td><?php if(isset($ct["flat_no"])){ echo $ct["flat_no"] , $ct["street"],$ct["area_locatlity"],$ct["district"], $ct["pincode"]; }?></td>
                                                                 <td><?php if(isset($ct["standard"])){ echo $ct["standard"]; }?></td>
                                                                <td><?php if(isset($ct["section"])){ echo $ct["section"]; }?></td>
                                                                <td><?php if(isset($ct["gender"])){ echo $ct["gender"]; }?></td>
                                                                <td><a href='holiday_creation&upd=$id' title='Edit details'>Restore</a></td>
                                                                </tr>
                                                                <?php $i = $i+1; } } ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div id="stockinfotable">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">List of Concession Approved Student</div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="general_concessionTable1" class="table custom-table" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                <th width="50">S.No</th>
                                                                    <th>Admission No</th>
                                                                    <th>Name Of The Student</th>
                                                                    <th>Address</th>
                                                                    <th>Standard</th>
                                                                    <th>Concession On</th>
                                                                    <th>Status</th>
                                                                    <th>Amount</th>
                                                                    <th>Remark</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $ctselect="SELECT * FROM student_creation WHERE 1 AND status=0"; 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                ?>
                                                                <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                <td><?php if(isset($ct["student_name"])){ echo $ct["student_name"]; }?></td>
                                                                <td><?php if(isset($ct["flat_no"])){ echo $ct["flat_no"] , $ct["street"],$ct["area_locatlity"],$ct["district"], $ct["pincode"]; }?></td>
                                                                <td><?php if(isset($ct["standard"])){ echo $ct["standard"]; }?></td>
                                                                <td><?php if(isset($ct["section"])){ echo $ct["section"]; }?></td>
                                                                <td><?php if(isset($ct["gender"])){ echo $ct["gender"]; }?></td>
                                                                <td><?php if(isset($ct["gender"])){ echo $ct["gender"]; }?></td>
                                                                <td><?php if(isset($ct["reason"])){ echo $ct["reason"]; }?></td>
                                                                </tr>
                                                                <?php $i = $i+1; } } ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div id="referal_concessionDiv" style="display:none">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div id="stockinfotable">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Student Referral List Pending for Approval</div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="referal_concessionTable" class="table custom-table" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="50">S.No</th>
                                                                    <th>Reference Code</th>
                                                                    <th>Admission Number</th>
                                                                    <th>Name Of The Student</th>
                                                                    <th>Standard</th>
                                                                    <th>Type</th>
                                                                    <th>Remarks</th>
                                                                    <th>Referred By</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $ctselect="SELECT * FROM student_creation WHERE 1 AND status=0"; 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                ?>
                                                                <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                <td><?php if(isset($ct["student_name"])){ echo $ct["student_name"]; }?></td>
                                                                <td><?php if(isset($ct["standard"])){ echo $ct["standard"]; }?></td>
                                                                <td><?php if(isset($ct["studentstype"])){ echo $ct["studentstype"]; }?></td>
                                                                <td><?php if(isset($ct["gender"])){ echo $ct["gender"]; }?></td>
                                                                <td><?php if(isset($ct["flat_no"])){ echo $ct["flat_no"] , $ct["street"],$ct["area_locatlity"],$ct["district"], $ct["pincode"]; }?></td>
                                                                <td><a href='holiday_creation&upd=$id' title='Edit details'>Restore</a></td>
                                                                </tr>
                                                                <?php $i = $i+1; } } ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div id="stockinfotable">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">List of Referral Approved Student</div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="referal_concessionTable1" class="table custom-table" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                <th width="50">S.No</th>
                                                                    <th>Reference Code</th>
                                                                    <th>Admission Number</th>
                                                                    <th>Name Of The Student</th>
                                                                    <th>Standard</th>
                                                                    <th>Type</th>
                                                                    <th>Remarks</th>
                                                                    <th>Referred By</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $ctselect="SELECT * FROM student_creation WHERE 1 AND status=0"; 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                ?>
                                                                <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                <td><?php if(isset($ct["admission_number"])){ echo $ct["admission_number"]; }?></td>
                                                                <td><?php if(isset($ct["student_name"])){ echo $ct["student_name"]; }?></td>
                                                                <td><?php if(isset($ct["standard"])){ echo $ct["standard"]; }?></td>
                                                                <td><?php if(isset($ct["studentstype"])){ echo $ct["studentstype"]; }?></td>
                                                                <td><?php if(isset($ct["gender"])){ echo $ct["gender"]; }?></td>
                                                                <td><?php if(isset($ct["flat_no"])){ echo $ct["flat_no"] , $ct["street"],$ct["area_locatlity"],$ct["district"], $ct["pincode"]; }?></td>
                                                                <td><a href='holiday_creation&upd=$id' title='Edit details'>Restore</a></td>
                                                                </tr>
                                                                <?php $i = $i+1; } } ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div id="student_detailsDiv" style="display:none">
                                <div class="row gutters">
                                    <div class="col-xl-12">
                                        <div class="card">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card-body row">
                                                            <table id="familyTable" class="table custom-table">
                                                                <tr>
                                                                    <label style="background-color:#307ecc;color:#fff;width:100%;padding:10px;text-align:center">Karthick Amudheash S Fee Detail for </label>
                                                                    
                                                                    <th>Fee Particular</th>
                                                                    <th>Paid Fees</th>
                                                                    <th>Fee Amount</th>
                                                                    <th>Concession Amount</th>
                                                                    <th>Balance to be Paid</th>
                                                                    <th>Remark</th>
                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                        <th>Fee Particular</th>
                                                                        <th>Paid Fees</th>
                                                                        <th>Fee Amount</th>
                                                                        <th>Concession Amount</th>
                                                                        <th>Balance to be Paid</th>
                                                                        <th>Remark</th>
                                                                </tfoot>
                                                                <tbody>
                                                                <?php if($idupd >= 0){
                                                                
                                                                if(isset($student_id )){

                                                                    for($tab=0; $tab<=sizeof($student_id )-1; $tab++){
                                                                        
                                                                        if($student_id [$tab] != ''){ ?>
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input type="text" readonly name="relationship[]" id="relationship" class="form-control" value="<?php echo $relationship[$tab]; ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" readonly name="family_name[]" id="family_name" class="form-control" value="<?php echo $family_name[$tab]; ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" readonly name="date_of_birth[]" id="date_of_birth" class="form-control" value="<?php echo $date_of_birth[$tab]; ?>" >
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" readonly name="fage[]" id="fage" class="form-control" value="<?php echo $fage[$tab]; ?>" >
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" readonly name="rasi1[]" id="rasi1" class="form-control" value="<?php echo $rasi1[$tab]; ?>" >
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" readonly name="natchathiram1[]" id="natchathiram1" class="form-control" value="<?php echo $natchathiram1[$tab]; ?>" >
                                                                                </td>
                                                                                <td>
                                                                                    <span onclick='onDelete(this);' class='icon-trash-2'></span>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                    <?php } } } } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            <div id="student_detailswithoutDiv" style="display:none">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div id="stockinfotable">
                                            <div class="card">
                                                <!-- <div class="card-header">
                                                    <div class="card-title">Student Concession List Pending for Approval</div>
                                                </div> -->
                                                <div class="card-body">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="general_concessionTable" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    <label style="background-color:#307ecc;color:#fff;width:100%;padding:10px;text-align:center">Karthick Amudheash S Fee Detail for 
                    
                                                                    <label>
                                                                    
                                                                    <th>Fee Particular</th>
                                                                    <th>Paid Fees</th>
                                                                    <th>Fee Amount</th>
                                                                    <th>Concession Amount</th>
                                                                    <th>Balance to be Paid</th>
                                                                    <th>Remark</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                    <th>Fee Particular</th>
                                                                    <th>Paid Fees</th>
                                                                    <th>Fee Amount</th>
                                                                    <th>Concession Amount</th>
                                                                    <th>Balance to be Paid</th>
                                                                    <th>Remark</th>
                                                            </tfoot>
                                                            <tbody>
                                                                <tr>
                                                                    <td>School Fee I Term - PRE.K.G</td>
                                                                    <td>9200</td>
                                                                    <td><input type="number" readonly class="form-control" value = "0"></td>
                                                                    <td><input type="text" class="form-control" value=""></td>
                                                                    <td><input type="text" readonly class="form-control" value=""></td>
                                                                    <td><input type="text"  class="form-control" value =></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>School Fee II Term - PRE.K.G</td>
                                                                    <td>6200</td>
                                                                    <td><input type="number" readonly class="form-control" value = "0"></td>
                                                                    <td><input type="text" class="form-control" value=""></td>
                                                                    <td><input type="text" readonly class="form-control" value=""></td>
                                                                    <td><input type="text"  class="form-control" value =></td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button class="btn btn-primary">Approve This Concession</button>
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

    $('.select2').select2();
</script>

