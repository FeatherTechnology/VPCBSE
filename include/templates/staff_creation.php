<?php
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
}

$id = 0;
if (isset($_POST['SubmitStaffCreation']) && $_POST['SubmitStaffCreation'] != '') {
    if (isset($_POST['id']) && $_POST['id'] > 0 && is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        $school_id = $_SESSION["school_id"];
        $year_id = $_SESSION["academic_year"];
    
        $updateStaffCreationmaster = $userObj->updateStaffCreation($mysqli, $id, $userid,$school_id,$year_id);
?>
        <script>
            location.href = '<?php echo $HOSTPATH; ?>edit_staff_creation&msc=2';
        </script>
    <?php } else {
        $school_id = $_SESSION["school_id"];
        $year_id = $_SESSION["academic_year"];
    
        $addStaffCreation = $userObj->addStaffCreation($mysqli, $userid,$school_id,$year_id );
    ?>
        <script>
            location.href = '<?php echo $HOSTPATH; ?>edit_staff_creation&msc=1';
        </script>
    <?php
    }
}

$del = 0;
if (isset($_GET['del'])) {
    $del = $_GET['del'];
}
if ($del > 0) {
    $deleteStaffCreation = $userObj->deleteStaffCreation($mysqli, $del, $userid);
    ?>
    <script>
        location.href = '<?php echo $HOSTPATH; ?>edit_staff_creation&msc=3';
    </script>
<?php
}

if (isset($_GET['upd'])) {
    $idupd = $_GET['upd'];
}
$status = 0;
if ($idupd > 0) {
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
    $getStaffCreation = $userObj->getStaffCreation($mysqli, $idupd,$school_id,$year_id);

    if (sizeof($getStaffCreation) > 0) {
        for ($ibranch = 0; $ibranch < sizeof($getStaffCreation); $ibranch++) {
            $staff_id =    $getStaffCreation['staff_id'] ;   
            $first_name =    $getStaffCreation['first_name']  ;
            $last_name =   $getStaffCreation['last_name']   ;
            $employee_no =   $getStaffCreation['employee_no'] ;
            $designation =   $getStaffCreation['designation']   ;  	
            $gender =   $getStaffCreation['gender'];
            $blood_group =    $getStaffCreation['blood_group']  ;
            $qualification =   $getStaffCreation['qualification'] ;
            $pan =   $getStaffCreation['pan']  ;
            $aadhar_no =    $getStaffCreation['aadhar_no']  ;
            $pf_no =  $getStaffCreation['pf_no']  ;
            $contact_no =  $getStaffCreation['contact_no']  ;
            $doj =   $getStaffCreation['doj']  ;
            $appointment_lt =    $getStaffCreation['appointment_lt'] ;
            $emg_contact_person =    $getStaffCreation['emg_contact_person'] ;
            $emg_contact_no =  $getStaffCreation['emg_contact_no']   ;
            $transport_details =     $getStaffCreation['transport_details']  ;
            $flat_no =   $getStaffCreation['flat_no'] ;
            $street =  $getStaffCreation['street']  ;
            $area =  $getStaffCreation['area']  ;
            $district = $getStaffCreation['district'] ;
            $bank_name =   $getStaffCreation['bank_name']  ;
            $bank_acc_no =   $getStaffCreation['bank_acc_no']   ;
            $branch =    $getStaffCreation['branch']   ;
            $ifsc_code =    $getStaffCreation['ifsc_code']   ;
            $staff_pic =   $getStaffCreation['staff_pic']  ;
            $title =   $getStaffCreation['title']   ;
            $certificate =   $getStaffCreation['certificate']  ;
            $title1 =   $getStaffCreation['title1']    ;
            $certificate1 =   $getStaffCreation['certificate1']  ;
            $title2  =  $getStaffCreation['title2'] ;
            $certificate2 =   $getStaffCreation['certificate2']   ;
            $title3 =    $getStaffCreation['title3']  ;
            $certificate3 =  $getStaffCreation['certificate3']     ;
            $title4 =  $getStaffCreation['title4'] ;
            $certificate4 =  $getStaffCreation['certificate4']  ;
            $area_id =  $getStaffCreation['area_id']  ;
        }
    }
}
?>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Staff Creation </li>
    </ol>
    <a href="edit_staff_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!--------form start-->
    <form id="employee" name="employee" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control"  id="id" name="id" aria-describedby="id" value="<?php if(isset($staff_id)) echo $staff_id; ?>">
        <input type="hidden" class="form-control"  id="school_id" name="school_id" value="<?php  print_r($_SESSION["school_id"]); ?>">
        <input type="hidden" class="form-control"  id="year_id" name="year_id"  value="<?php print_r($_SESSION["year_id"]); ?>">
        <input type="hidden" class="form-control"  id="idupd" name="idupd"  value="<?php if(isset($idupd)) echo $idupd; ?>">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Employee Info <i class="icon-stars"></i></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-12 ">
                                <div class="row">

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="staff_first_name"> First Name </label> <span class="required">*</span>
                                            <input type="text" id="staff_first_name" tabindex="1" name="staff_first_name" class="form-control"  placeholder="Enter First Name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(isset($first_name)) echo $first_name; ?>">
                                            <span id="firstnameCheck" class="text-danger">Enter First Name </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="staff_last_name">Last Name</label> <span class="required">*</span>
                                            <input type="text" id="staff_last_name" tabindex="2" name="staff_last_name" class="form-control" placeholder="Enter Last Name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(isset($last_name)) echo $last_name; ?>">
                                            <span id="lastnameCheck" class="text-danger">Enter Last Name </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="employee_no"> Employee No </label>
                                            <input type="text" class="form-control" tabindex="3" id="employee_no" name="employee_no" value="<?php if(isset($employee_no)) echo $employee_no?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12"> 
                                        <div class="form-group">
                                            <label for="staff_designation"> Designation </label> <span class="required">*</span>
                                            <select  class="form-control" name="staff_designation" id="staff_designation" tabindex="4">
                                                <option value=''>Select Designation</option>
                                                <option value='Teaching' <?php if(isset($designation) && $designation == 'Teaching') echo 'selected'; ?>>Teaching</option>
                                                <option value='Non-Teaching' <?php if(isset($designation) && $designation == 'Non-Teaching') echo 'selected'; ?>>Non Teaching</option>
                                                <option value='Driver' <?php if(isset($designation) && $designation == 'Driver') echo 'selected'; ?>>Driver</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" tabindex="4" id="staff_designation" name="staff_designation"  placeholder="Enter Designation" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(isset($designation)) echo $designation; ?>"> -->
                                            <span id="dsgnCheck" class="text-danger">Select Designation </span>
                                        </div>
                                    </div>


                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label>Gender</label><br>
                                            <input type="radio" tabindex="5" name="gender" id="male" value="Male" <?php if (isset($gender)) echo ($gender == 'Male') ? 'checked' : '' ?>> &nbsp;&nbsp; <label>Male </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="6" name="gender" id="female" value="Female" <?php if (isset($gender))echo ($gender == 'Female') ? 'checked' : '' ?>> &nbsp;&nbsp; <label>Female </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span id="genderCheck" class="text-danger">| Please Select Gender</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="blood_group">Blood Group</label>
                                            <select class="form-control" id="blood_group" name="blood_group" tabindex="7">
                                                <option value=" ">Select Your Blood Group...</option>
                                                <option value="A1+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A1+") echo 'selected';
                                                                    } ?>>A1+</option>
                                                <option value="A1-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A1-") echo 'selected';
                                                                    } ?>>A1-</option>
                                                <option value="A2+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A2+") echo 'selected';
                                                                    } ?>>A2+</option>
                                                <option value="A2-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A2-") echo 'selected';
                                                                    } ?>>A2-</option>
                                                <option value="B+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "B+") echo 'selected';
                                                                    } ?>>B+</option>
                                                <option value="B-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "B-") echo 'selected';
                                                                    } ?>>B-</option>
                                                <option value="A1B+" <?php if (isset($blood_group)) {
                                                                            if ($blood_group == "A1B+") echo 'selected';
                                                                        } ?>>A1B+</option>
                                                <option value="A1B-" <?php if (isset($blood_group)) {
                                                                            if ($blood_group == "A1B-") echo 'selected';
                                                                        } ?>>A1B-</option>
                                                <option value="A2B+" <?php if (isset($blood_group)) {
                                                                            if ($blood_group == "A2B+") echo 'selected';
                                                                        } ?>>A2B+</option>
                                                <option value="A2B-" <?php if (isset($blood_group)) {
                                                                            if ($blood_group == "A2B-") echo 'selected';
                                                                        } ?>>A2B-</option>
                                                <option value="AB+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "AB+") echo 'selected';
                                                                    } ?>>AB+</option>
                                                <option value="AB-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "AB-") echo 'selected';
                                                                    } ?>>AB-</option>
                                                <option value="O+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "O+") echo 'selected';
                                                                    } ?>>O+</option>
                                                <option value="O-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "O-") echo 'selected';
                                                                    } ?>>O-</option>
                                                <option value="A+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A+") echo 'selected';
                                                                    } ?>>A+</option>
                                                <option value="A-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "A-") echo 'selected';
                                                                    } ?>>A-</option>
                                                <option value="RH+" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "RH+") echo 'selected';
                                                                    } ?>>RH+</option>
                                                <option value="RH-" <?php if (isset($blood_group)) {
                                                                        if ($blood_group == "RH-") echo 'selected';
                                                                    } ?>>RH-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="qualification"> Qualification </label> <span class="required">*</span>
                                            <input name="qualification" tabindex="8" placeholder="Enter Qualification" id="qualification" class="form-control"  type="text" onkeydown="if(event.keyCode === 110 || event.keyCode === 190 || /[a-z ]/i.test(event.key)) {return true;} else {return false;}" value="<?php if(isset($qualification)) echo $qualification; ?>">
                                            <span id="qualificationCheck" class="text-danger">Enter Qualification </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="staff_pan"> PAN </label> <span class="required">*</span>
                                            <input name="staff_pan" tabindex="9"  placeholder="Enter PAN" id="staff_pan" class="form-control" maxLength="10" type="text"  value="<?php if(isset($pan)) echo $pan; ?>">
                                            <span id="panCheck" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="aadhar_number">Aadhar Number</label> <span class="required">*</span>
                                            <input name="aadhar_number" tabindex="10" placeholder="Aadhar Number" id="aadhar_number" class="form-control" data-type="adhaar-number" maxLength="14" type="text" value="<?php if(isset($aadhar_no)) echo $aadhar_no; ?>">
                                            <span id="adharnoCheck" class="text-danger">Enter Aadhar Number </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="pf_acc_no">PF Account No</label>
                                            <input name="pf_acc_no" tabindex="11" placeholder="Enter PF Account No" id="pf_acc_no" class="form-control"  type="number" value="<?php if(isset($pf_no)) echo $pf_no; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label> <span class="required">*</span>
                                            <input name="contact_number" tabindex="12" placeholder="Enter Contact Number" id="contact_number" class="form-control"  type="number" onkeypress="if(this.value.length==10) return false;" value="<?php if(isset($contact_no)) echo $contact_no; ?>">
                                            <span id="contactCheck" class="text-danger">Enter Contact Number </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="staff_doj"> Date Of Joining </label> <span class="required">*</span>
                                            <input name="staff_doj" tabindex="13" id="staff_doj" class="form-control"  type="date" value="<?php if(isset($doj)) echo $doj; ?>">
                                            <span id="dojCheck" class="text-danger">Enter Date Of Joining </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="appointment_lt">Appointment Lt </label>
                                            <input name="appointment_lt" tabindex="14" id="appointment_lt" class="form-control"  type="date" value="<?php if(isset($appointment_lt)) echo $appointment_lt; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="emg_contact_person"> Emergency Contact Person </label> 
                                            <input name="emg_contact_person" tabindex="15" placeholder="Enter Emergency Contact Person" id="emg_contact_person" class="form-control"  type="text" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(isset($emg_contact_person)) echo $emg_contact_person; ?>">
                                            <span id="emgcontactpersonCheck" class="text-danger">Enter Emergency Contact Person </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="emg_contact_no"> Emergency Contact No </label> 
                                            <input name="emg_contact_no" tabindex="16" placeholder="Enter Emergency Contact No" id="emg_contact_no" class="form-control"  type="number" onkeypress="if(this.value.length==10) return false;" value="<?php if(isset($emg_contact_no)) echo $emg_contact_no; ?>">
                                            <span id="emgcontactnoCheck" class="text-danger">Enter Emergency Contact No </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="transport_details"> Transport Details </label>
                                            <input name="transport_details" tabindex="17" placeholder="Enter Transport Details" id="transport_details" type="checkbox" value="YES"  <?php if (isset($transport_details)) echo ($transport_details == 'YES') ? 'checked' : '' ?> >
                                        </div>
                                    </div>
                                  
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12" id="areaname">
                                        <div class="form-group">
                                            <label for="area_name">Area Name</label>
                                            <select class="form-control" tabindex="18" id="area_name" name="area_name" tabindex="7">
                                            <option></option>
                                            </select>
                                            <input type="hidden" id='checkoptionval' class="checkoptionval" name="checkoptionval" value="<?php if(isset($area_id)) echo $area_id; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                           
                            <div class="col-md-8 ">
                                <div class="row">

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Address for Communication </label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Bank Details </label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="flat_no"> Flat No </label>
                                            <input type="text" class="form-control" name="flat_no" id="flat_no" tabindex="19" value="<?php if(isset($flat_no)) echo $flat_no; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="bank_name"> Bank Name </label>
                                            <input type="text" class="form-control" tabindex="20" name="bank_name" id="bank_name" onkeydown="return /[a-z ]/i.test(event.key)"  value="<?php if(isset($bank_name)) echo $bank_name; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="street"> Street </label>
                                            <input type="text" class="form-control" name="street" tabindex="21" id="street" value="<?php if(isset($street)) echo $street; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="bank_acc_no"> Bank Account No </label>
                                            <input type="text" class="form-control" name="bank_acc_no"  id="bank_acc_no"   value="<?php if(isset($bank_acc_no)) echo $bank_acc_no; ?>" tabindex="22">
                                            <!-- onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}" -->
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="area"> Area </label>
                                            <input type="text" class="form-control" name="area" id="area" tabindex="23" value="<?php if(isset($area)) echo $area; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="branch"> Branch </label>
                                            <input type="text" class="form-control" name="branch" id="branch" onkeydown="return /[a-z ]/i.test(event.key)" tabindex="24" value="<?php if(isset($branch)) echo $branch; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="district"> District </label>
                                            <input type="text" class="form-control" name="district" id="district" onkeydown="return /[a-z ]/i.test(event.key)" tabindex="25" value="<?php if(isset($district)) echo $district; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="ifsc_code"> IFSC Code </label>
                                            <input type="text" class="form-control" name="ifsc_code" id="ifsc_code"  onkeydown="if(/^[a-zA-Z0-9]$/.test(event.key)) {this.value += event.key.toUpperCase(); return false;} else {return true;}" value="<?php if(isset($ifsc_code)) echo $ifsc_code; ?>" tabindex="26">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Field Finished -->
                            <div class="col-md-4"><br />
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                    <label for="staff_image">Staff Photo</label>

                                    <?php if(isset($_GET['upd'])<=0){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file"   class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="staff_image" name="staff_image" style="width:43%" tabindex="27">
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($staff_pic)){ if($staff_pic != ''){ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="<?php echo "uploads/staff_creation/staffImages/$employee_no/".$staff_pic ?>" width="43%" id="viewimage">
                                            <input type="file"  class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="staff_image" name="staff_image" style="width:43%" tabindex="27" >
                                            <input type="hidden" name="updateimage" id="updateimage" value="<?php echo $staff_pic; ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="form-group" style="margin: auto;"> 
                                            <img src="img/profile-pic.jpg" width="43%" id="viewimage">
                                            <input type="file"   class="form-control" 
                                            accept="image/*" onchange="loadFile(event)"  
                                            id="staff_image" name="staff_image" style="width:43%" tabindex="27">
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
        <!-- <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pay Structure <i class="icon-stars"></i></div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 ">
                                <div class="row">
 
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Basic Pay </label>
                                            <input type="text" id="basic_pay" tabindex="25" name="basic_pay" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Deduction (If any) </label>
                                            <input type="text" id="deduction" tabindex="26" name="deduction" class="form-control"  >
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Deduction Amount </label>
                                            <input type="text" id="deduction_amnt" tabindex="27" name="deduction_amnt" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> HRA </label>
                                            <input type="text" id="hra" tabindex="28" name="hra" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}" >
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="hra1" tabindex="29" name="hra1" class="form-control" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="hra2" tabindex="30" name="hra2" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Transport Allowance </label>
                                            <input type="text" id="transport_allowance" tabindex="31" name="transport_allowance" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}" >
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="transport_allowance1" tabindex="32" name="transport_allowance1" class="form-control" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="transport_allowance2" tabindex="33" name="transport_allowance2" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}" >
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Medical Allowance </label>
                                            <input type="text" id="medical_allowance" tabindex="34" name="medical_allowance" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="medical_allowance1" tabindex="35" name="medical_allowance1" class="form-control" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label></label>
                                            <input type="text" id="medical_allowance2" tabindex="36" name="medical_allowance2" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label> Special Pay </label>
                                            <input type="text" id="spl_pay" tabindex="37" name="spl_pay" class="form-control"  placeholder="0.00" onkeydown="if(event.keyCode === 8 || /[0-9 ]/i.test(event.key)) {return true;} else {return false;}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label> Gross Pay </label>
                                            <input type="text" id="gross_pay" tabindex="38" name="gross_pay" class="form-control" placeholder="0.00"  readonly>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                        <label> Net Pay </label>
                                            <input type="text" id="net_pay" tabindex="39" name="net_pay" class="form-control"  placeholder="0.00"  readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



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
                                            <label for="title">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title" class="form-control" tabindex="28" name="title"  placeholder="Enter Certificate Name" value="<?php if(isset($title)) echo $title; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <?php if (isset($_GET['upd']) <= 0) { ?>
                                            <div class="form-group">
                                                <label class="label" style="visibility:hidden">Certificate</label> <br>
                                                <input type="file" class="form-control" tabindex="29" name="certificate" id="certificate">
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($certificate)) {
                                            if ($certificate != '') { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate</div>
                                                    <input type="file" class="form-control" tabindex="29" name="certificate" id="certificate"><br>

                                                    <a href="<?php echo "uploads/staff_creation/certificates/$employee_no/" . $certificate; ?>" target="_blank" download>Click Here To Download Your <?php if (isset($title)) echo $title; ?> Certificate</a>
                                                    <input type="hidden" name="updatecertificate" id="updatecertificate" value="<?php echo $certificate; ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate</div>
                                                    <input type="file" class="form-control" tabindex="29" class="form-control" name="certificate" id="certificate">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="title1">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title1" class="form-control" tabindex="30" name="title1"  placeholder="Enter Certificate Name" value="<?php if(isset($title1)) echo $title1; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <?php if (isset($_GET['upd']) <= 0) { ?>
                                            <div class="form-group">
                                                <label class="label" style="visibility:hidden">Certificate</label> <br>

                                                <input type="file" class="form-control" tabindex="31" name="certificate1" id="certificate1">
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($certificate1)) {
                                            if ($certificate1 != '') { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate</div>
                                                    <input type="file" class="form-control" tabindex="31" name="certificate1" id="certificate1"><br>

                                                    <a href="<?php echo "uploads/staff_creation/certificates/$employee_no/" . $certificate1; ?>" target="_blank" download>Click Here To Download Your <?php if (isset($title1)) echo $title1; ?> Certificate</a>
                                                    <input type="hidden" name="updatecertificate1" id="updatecertificate1" value="<?php echo $certificate1; ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate1</div>
                                                    <input type="file" tabindex="31" class="form-control" name="certificate1" id="certificate1">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="title2">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title2" class="form-control" tabindex="32" name="title2"  placeholder="Enter Certificate Name" value="<?php if(isset($title2)) echo $title2; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <?php if (isset($_GET['upd']) <= 0) { ?>
                                            <div class="form-group">
                                                <label class="label" style="visibility:hidden">Certificate</label> <br>

                                                <input type="file" class="form-control" tabindex="33" name="certificate2" id="certificate2">
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($certificate2)) {
                                            if ($certificate2 != '') { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate2</div>
                                                    <input type="file" class="form-control" tabindex="33" name="certificate2" id="certificate2"><br>

                                                    <a href="<?php echo "uploads/staff_creation/certificates/$employee_no/" . $certificate2; ?>" target="_blank" download>Click Here To Download Your <?php if (isset($title2)) echo $title2; ?> Certificate</a>
                                                    <input type="hidden" name="updatecertificate2" id="updatecertificate2" value="<?php echo $certificate2; ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate2</div>
                                                    <input type="file" tabindex="33" class="form-control" name="certificate2" id="certificate2">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="title3">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title3" class="form-control" tabindex="34" name="title3"  placeholder="Enter Certificate Name" value="<?php if(isset($title3)) echo $title3; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <?php if (isset($_GET['upd']) <= 0) { ?>
                                            <div class="form-group">
                                                <label class="label" style="visibility:hidden">Certificate</label> <br>

                                                <input type="file" class="form-control" tabindex="35" name="certificate3" id="certificate3">
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($certificate3)) {
                                            if ($certificate3 != '') { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate3</div>
                                                    <input type="file" class="form-control" tabindex="35" name="certificate3" id="certificate3"><br>

                                                    <a href="<?php echo "uploads/staff_creation/certificates/$employee_no/" . $certificate3; ?>" target="_blank" download>Click Here To Download Your <?php if (isset($title3)) echo $title3; ?> Certificate</a>
                                                    <input type="hidden" name="updatecertificate3" id="updatecertificate3" value="<?php echo $certificate3; ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate3</div>
                                                    <input type="file" tabindex="35" class="form-control" name="certificate3" id="certificate3">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="title4">Title</label>&nbsp;&nbsp;
                                            <input type="text" id="title4" class="form-control" tabindex="36" name="title4"  placeholder="Enter Certificate Name" value="<?php if(isset($title4)) echo $title4; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <?php if (isset($_GET['upd']) <= 0) { ?>
                                            <div class="form-group">
                                                <label class="label" style="visibility:hidden">Certificate</label> <br>

                                                <input type="file" class="form-control" tabindex="37" name="certificate4" id="certificate4">
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($certificate4)) {
                                            if ($certificate4 != '') { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate4</div>
                                                    <input type="file" class="form-control" tabindex="37" name="certificate4" id="certificate4"><br>

                                                    <a href="<?php echo "uploads/staff_creation/certificates/$employee_no/" . $certificate4; ?>" target="_blank" download>Click Here To Download Your <?php if (isset($title4)) echo $title4; ?> Certificate</a>
                                                    <input type="hidden" name="updatecertificate4" id="updatecertificate4" value="<?php echo $certificate4; ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <div class="card-title" style="visibility:hidden">Certificate4</div>
                                                    <input type="file" tabindex="37" class="form-control" name="certificate4" id="certificate4">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br><br>
                                        <div class="text-right">
                                            <button type="submit" name="SubmitStaffCreation" id="SubmitStaffCreation" class="btn btn-primary" value="Submit" tabindex="38">Submit</button>
                                            <!-- <button type="reset" class="btn btn-outline-secondary" tabindex="12">Cancel</button> -->
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