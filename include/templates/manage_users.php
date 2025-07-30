<?php
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 

if(isset($_POST['submitusers']))
{
    if(isset($_POST['manage_user_id']) && $_POST['manage_user_id'] >0 && is_numeric($_POST['manage_user_id'])){		
        $manage_user_id = $_POST['manage_user_id']; 	
        $updatecustomer = $userObj->updateuser($mysqli, $manage_user_id, $userid);  
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>edit_manage_users&msc=2';</script> 

<?php } else{
        $addcustomer = $userObj->adduser($mysqli, $userid);   
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>edit_manage_users&msc=1';</script> 
        <?php
    }
}

if(isset($_GET['upd']))
{
    $idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getmanageuserdetails = $userObj->getuser($mysqli,$idupd); 
	if (sizeof($getmanageuserdetails)>0) {
        $user_id                  = $getmanageuserdetails['user_id']; 
        $fullname       	       = $getmanageuserdetails['fullname'];
        $user_name       	       = $getmanageuserdetails['user_name'];
        $user_password            = $getmanageuserdetails['user_password'];		  	
        $status                   = $getmanageuserdetails['status'];		
        $firstname                  = $getmanageuserdetails['firstname']; 
        $lastname                  = $getmanageuserdetails['lastname']; 
        $title                  = $getmanageuserdetails['title']; 
        $school_id                  = $getmanageuserdetails['school_id']; 
        $emailid                  = $getmanageuserdetails['emailid']; 
        $role                  = $getmanageuserdetails['role']; 
        $dashboard                  = $getmanageuserdetails['dashboard']; 
        $administration_module                  = $getmanageuserdetails['administration_module']; 
        $trust_creation                  = $getmanageuserdetails['trust_creation']; 
        $school_update                  = $getmanageuserdetails['school_update']; 
        $fees_master                  = $getmanageuserdetails['fees_master']; 
        $holiday_creation                  = $getmanageuserdetails['holiday_creation']; 
        $manage_users                  = $getmanageuserdetails['manage_users']; 
        $master_module                  = $getmanageuserdetails['master_module']; 
        $area_master                  = $getmanageuserdetails['area_master']; 
        $syllabus_sub_module                  = $getmanageuserdetails['syllabus_sub_module']; 
        $allocation                  = $getmanageuserdetails['allocation']; 
        $allocation_view                  = $getmanageuserdetails['allocation_view']; 
        $staff_module                  = $getmanageuserdetails['staff_module']; 
        $staff_creation                  = $getmanageuserdetails['staff_creation']; 
        $student_module                  = $getmanageuserdetails['student_module']; 
        $temp_admission_form                  = $getmanageuserdetails['temp_admission_form']; 
        $student_creation                  = $getmanageuserdetails['student_creation']; 
        $student_rollback                  = $getmanageuserdetails['student_rollback']; 
        $delete_student                  = $getmanageuserdetails['delete_student']; 
        $certificate_sub_module                  = $getmanageuserdetails['certificate_sub_module']; 
        $transfer                  = $getmanageuserdetails['transfer']; 
        $collection_module                  = $getmanageuserdetails['collection_module']; 
        $fees_concession                  = $getmanageuserdetails['fees_concession']; 
        $fees_collection                  = $getmanageuserdetails['fees_collection']; 
        $sms_module                  = $getmanageuserdetails['sms_module']; 
        $birthday_wishes                  = $getmanageuserdetails['birthday_wishes']; 
        $tamil_birthday_wishes                  = $getmanageuserdetails['tamil_birthday_wishes']; 
        $student_general_message                  = $getmanageuserdetails['student_general_message']; 
        $staff_general_message                  = $getmanageuserdetails['staff_general_message']; 
        $home_work                  = $getmanageuserdetails['home_work']; 
        $report_module                  = $getmanageuserdetails['report_module']; 
        $student_report_sub_module                  = $getmanageuserdetails['student_report_sub_module']; 
        $student_caste_report                  = $getmanageuserdetails['student_caste_report']; 
        $class_wise_list                  = $getmanageuserdetails['class_wise_list']; 
        $register_of_admission                  = $getmanageuserdetails['register_of_admission']; 
        $student_transport_list                  = $getmanageuserdetails['student_transport_list']; 
        $fee_details_sub_module                  = $getmanageuserdetails['fee_details_sub_module']; 
        $daily_fees_collection                  = $getmanageuserdetails['daily_fees_collection']; 
        $day_end_report                  = $getmanageuserdetails['day_end_report']; 
        $overall_scholarship_fee_details                  = $getmanageuserdetails['overall_scholarship_fee_details']; 
        $pending_fee_details                  = $getmanageuserdetails['pending_fee_details']; 
        $all_type_pending_fee_details                  = $getmanageuserdetails['all_type_pending_fee_details']; 
        $classwise_overall_pending                  = $getmanageuserdetails['classwise_overall_pending']; 
        $fees_summary                  = $getmanageuserdetails['fees_summary']; 
        $monthwise_fees_summary                  = $getmanageuserdetails['monthwise_fees_summary'];	
	}
} 

$del=0;
if(isset($_GET['del']))
{
    $del=$_GET['del'];
}
if($del>0)
{
    $deleteuser = $userObj->deleteuser($mysqli,$del,$userid); 
    ?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_manage_users&msc=3';</script>
    <?php   
}

?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Manage Users</li>
    </ol>

    <a href="edit_manage_users">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
	<!-- Form start -->
	<form action="" method="post" name="manage_users_form" id="manage_users_form" >
        <input type="hidden" name="manage_user_id" id="manage_user_id" value="<?php if(isset($user_id)) echo $user_id; ?>">
        <input type="hidden" name="school_id" id="school_id" value="<?php if(isset($school_id)) echo $school_id; ?>">
        <div class="card">
            <div class="card-header">General Info</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="school_name"> School Name  </label>
                            <select type="text" class="form-control" name="school_name" id="school_name" tabindex="1" >
                                <option value="0">Select School Name</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="user_role">Role</label>
                            <select type="text" class="form-control" name="user_role" id="user_role" tabindex="2" >
                                <option value="0">Select Role</option>
                                <option value="1" <?php if(isset($role) && $role =='1')echo 'selected'; ?> >System Administrator</option>
                                <option value="2" <?php if(isset($role) && $role =='2')echo 'selected'; ?> >Teaching Staff</option>
                                <option value="3" <?php if(isset($role) && $role =='3')echo 'selected'; ?> >Office Staff</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" tabindex="3" value="<?php if(isset($title)) echo $title; ?>" >
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="first_name"> First Name </label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" tabindex="4" value="<?php if(isset($firstname)) echo $firstname; ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="last_name"> Last Name </label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" tabindex="5" value="<?php if(isset($lastname)) echo $lastname; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="full_name"> Full Name </label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" tabindex="6" readonly value="<?php if(isset($fullname)) echo $fullname; ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="email_id"> E-Mail Id </label>
                            <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Enter Email Id" tabindex="7" value="<?php if(isset($emailid)) echo $emailid; ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="user_name"> User Name </label>
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" tabindex="8" readonly value="<?php if(isset($user_name)) echo $user_name; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" tabindex="9" value="<?php if(isset($user_password)) echo $user_password; ?>">
                            <span class="required password_validation"></span> 
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Enter Confirm Password" tabindex="10" value="<?php if(isset($user_password)) echo $user_password; ?>">
                            <span class="required confirmpassword_validation"></span> 
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- admin module start -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Screen Access</li>
        </ol>

        <div class="card">
            <br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="11" value="Yes" <?php if(isset($dashboard) && $dashboard==0){ echo'checked'; } ?>  class="custom-control-input" id="dashboard_module" name="dashboard_module" checked>
                <label class="custom-control-label" for="dashboard_module">
                    <h5>Dashboard</h5>
                </label>
            </div>
            <hr>
            <br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="12" value="Yes" <?php if(isset($administration_module) && $administration_module==0){ echo'checked'; } ?> class="custom-control-input" id="administration_module" name="administration_module" >
                <label class="custom-control-label" for="administration_module">
                    <h5>Administration</h5>
                </label>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($trust_creation) && $trust_creation==0){ echo'checked'; } ?> tabindex="13" class="custom-control-input admin-checkbox" id="trust_creation" name="trust_creation" >
                        <label class="custom-control-label" for="trust_creation">Trust Creation</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($school_update) && $school_update==0){ echo'checked'; } ?> tabindex="14" class="custom-control-input admin-checkbox" id="school_update" name="school_update" >
                        <label class="custom-control-label" for="school_update">School Update</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($fees_master) && $fees_master==0){ echo'checked'; } ?> tabindex="15" class="custom-control-input admin-checkbox" id="fees_master" name="fees_master" >
                        <label class="custom-control-label" for="fees_master">Fees Master</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($holiday_creation) && $holiday_creation==0){ echo'checked'; } ?> tabindex="16" class="custom-control-input admin-checkbox" id="holiday_creation" name="holiday_creation" >
                        <label class="custom-control-label" for="holiday_creation">Holiday Info</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($manage_users) && $manage_users==0){ echo'checked'; } ?> tabindex="17" class="custom-control-input admin-checkbox" id="manage_users" name="manage_users"  >
                        <label class="custom-control-label" for="manage_users">Manage Users</label>
                    </div>
                </div>
            </div>
            <!-- admin module end -->
            <hr>

            <!-- master module start -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="18" value="Yes" <?php if(isset($master_module) && $master_module==0){ echo'checked'; } ?>  class="custom-control-input" id="master_module" name="master_module">
                <label class="custom-control-label" for="master_module">
                    <h5>Master</h5>
                </label>
            </div>
            <br>
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($area_master) && $area_master==0){ echo'checked'; } ?>  tabindex="19" class="custom-control-input master-checkbox" id="area_master" name="area_master" >
                        <label class="custom-control-label" for="area_master">Area Master</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($syllabus_sub_module) && $syllabus_sub_module==0){ echo'checked'; } ?> tabindex="20" class="custom-control-input master-syllabus-checkbox" id="syllabus_sub_module" name="syllabus_sub_module" >
                        <label class="custom-control-label" for="syllabus_sub_module"><h6>Syllabus<h6></label>
                    </div> <br>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($allocation) && $allocation==0){ echo'checked'; } ?> tabindex="21" class="custom-control-input syllabus-sub-checkbox" id="allocation" name="allocation" >
                        <label class="custom-control-label" for="allocation">Allocation</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($allocation_view) && $allocation_view==0){ echo'checked'; } ?> tabindex="22" class="custom-control-input syllabus-sub-checkbox" id="allocation_view" name="allocation_view" >
                        <label class="custom-control-label" for="allocation_view">Allocation View</label>
                    </div>
                </div>

            </div>
        <!-- master module end -->
            <hr>

            <!-- Staff module start -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="23" value="Yes" <?php if(isset($staff_module) && $staff_module==0){ echo'checked'; } ?>  class="custom-control-input" id="staff_module" name="staff_module">
                <label class="custom-control-label" for="staff_module">
                    <h5>Staff</h5>
                </label>
            </div>
            <br>
            
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($staff_creation) && $staff_creation==0){ echo'checked'; } ?> tabindex="24" class="custom-control-input staff-checkbox" id="staff_creation" name="staff_creation" >
                        <label class="custom-control-label" for="staff_creation">Staff Creation</label>
                    </div>
                </div>
            </div>
            <!-- Staff module end -->
            <hr>

            <!-- Student module start -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="25" value="Yes" <?php if(isset($student_module) && $student_module==0){ echo'checked'; } ?>   class="custom-control-input" id="student_module" name="student_module">
                <label class="custom-control-label" for="student_module">
                    <h5>Student</h5>
                </label>
            </div>
            <br>

            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($temp_admission_form) && $temp_admission_form==0){ echo'checked'; } ?> tabindex="26" class="custom-control-input student-sub-checkbox" id="temp_admission_form" name="temp_admission_form" >
                        <label class="custom-control-label" for="temp_admission_form">Temp.Admission Form</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_creation) && $student_creation==0){ echo'checked'; } ?> tabindex="27" class="custom-control-input student-sub-checkbox" id="student_creation" name="student_creation" >
                        <label class="custom-control-label" for="student_creation">Student Creation</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_rollback) && $student_rollback==0){ echo'checked'; } ?> tabindex="28" class="custom-control-input student-sub-checkbox" id="student_rollback" name="student_rollback" >
                        <label class="custom-control-label" for="student_rollback">Student Roll Back</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($delete_student) && $delete_student==0){ echo'checked'; } ?> tabindex="29" class="custom-control-input student-sub-checkbox" id="delete_student" name="delete_student" >
                        <label class="custom-control-label" for="delete_student">Delete Student</label>
                    </div>
                </div> 
            </div> </br>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($certificate_sub_module) && $certificate_sub_module==0){ echo'checked'; } ?> tabindex="30" class="custom-control-input student-certificate-checkbox" id="certificate_sub_module" name="certificate_sub_module" >
                        <label class="custom-control-label" for="certificate_sub_module"><h6>Certificates<h6></label>
                    </div> <br>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($transfer) && $transfer==0){ echo'checked'; } ?> tabindex="31" class="custom-control-input certificate-sub-checkbox" id="transfer" name="transfer" >
                        <label class="custom-control-label" for="transfer">Transfer</label>
                    </div>
                </div>
            </div>
            <!-- Student module end -->
            <hr>

            <!-- Collection module end -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="32" value="Yes" <?php if(isset($collection_module) && $collection_module==0){ echo'checked'; } ?>  class="custom-control-input" id="collection_module" name="collection_module">
                <label class="custom-control-label" for="collection_module">
                    <h5>Collection</h5>
                </label>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($fees_concession) && $fees_concession==0){ echo'checked'; } ?> tabindex="34" class="custom-control-input collection-checkbox" id="fees_concession" name="fees_concession" >
                        <label class="custom-control-label" for="fees_concession">Fees Concession</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($fees_collection) && $fees_collection==0){ echo'checked'; } ?> tabindex="35" class="custom-control-input collection-checkbox" id="fees_collection" name="fees_collection" >
                        <label class="custom-control-label" for="fees_collection">Fees Collection</label>
                    </div>
                </div>
            </div>
            <!-- Collection module end -->
            <hr>

            <!-- SMS module end -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="32" value="Yes" <?php if(isset($sms_module) && $sms_module==0){ echo'checked'; } ?>  class="custom-control-input" id="sms_module" name="sms_module">
                <label class="custom-control-label" for="sms_module">
                    <h5>SMS</h5>
                </label>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($birthday_wishes) && $birthday_wishes==0){ echo'checked'; } ?> tabindex="34" class="custom-control-input sms-checkbox" id="birthday_wishes" name="birthday_wishes" >
                        <label class="custom-control-label" for="birthday_wishes">Birthday Wishes</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($tamil_birthday_wishes) && $tamil_birthday_wishes==0){ echo'checked'; } ?> tabindex="35" class="custom-control-input sms-checkbox" id="tamil_birthday_wishes" name="tamil_birthday_wishes" >
                        <label class="custom-control-label" for="tamil_birthday_wishes">Tamil Birthday Wishes</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_general_message) && $student_general_message==0){ echo'checked'; } ?> tabindex="35" class="custom-control-input sms-checkbox" id="student_general_message" name="student_general_message" >
                        <label class="custom-control-label" for="student_general_message">Student General Message</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($staff_general_message) && $staff_general_message==0){ echo'checked'; } ?> tabindex="35" class="custom-control-input sms-checkbox" id="staff_general_message" name="staff_general_message" >
                        <label class="custom-control-label" for="staff_general_message">Staff General Message</label>
                    </div>
                </div>

                <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($home_work) && $home_work==0){ echo'checked'; } ?> tabindex="35" class="custom-control-input sms-checkbox" id="home_work" name="home_work" >
                        <label class="custom-control-label" for="home_work">Home Work</label>
                    </div>
                </div> -->
            </div>
            <!-- SMS module end -->
            <hr>
            
            <!-- Report Module Start -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" tabindex="36" value="Yes" <?php if(isset($report_module) && $report_module==0){ echo'checked'; } ?>  class="custom-control-input" id="report_module" name="report_module" >
                <label class="custom-control-label" for="report_module">
                    <h5>Reports</h5>
                </label>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_report_sub_module) && $student_report_sub_module==0){ echo'checked'; } ?> tabindex="37" class="custom-control-input report-sub-checkbox" id="student_report_sub_module" name="student_report_sub_module" >
                        <label class="custom-control-label" for="student_report_sub_module"><h6>Student Report<h6></label>
                    </div> <br>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_caste_report) && $student_caste_report==0){ echo'checked'; } ?> tabindex="38" class="custom-control-input studentreport-sub-checkbox" id="student_caste_report" name="student_caste_report" >
                        <label class="custom-control-label" for="student_caste_report">Student Caste List</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($class_wise_list) && $class_wise_list==0){ echo'checked'; } ?> tabindex="39" class="custom-control-input studentreport-sub-checkbox" id="class_wise_list" name="class_wise_list" >
                        <label class="custom-control-label" for="class_wise_list">Class wise List</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($register_of_admission) && $register_of_admission==0){ echo'checked'; } ?> tabindex="40" class="custom-control-input studentreport-sub-checkbox" id="register_of_admission" name="register_of_admission" >
                        <label class="custom-control-label" for="register_of_admission">Register of Admission</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($student_transport_list) && $student_transport_list==0){ echo'checked'; } ?> tabindex="41" class="custom-control-input studentreport-sub-checkbox" id="student_transport_list" name="student_transport_list" >
                        <label class="custom-control-label" for="student_transport_list">Student Transport List</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($fee_details_sub_module) && $fee_details_sub_module==0){ echo'checked'; } ?> tabindex="42" class="custom-control-input report-sub-checkbox" id="fee_details_sub_module" name="fee_details_sub_module" >
                        <label class="custom-control-label" for="fee_details_sub_module"><h6>Fees Details<h6></label>
                    </div> <br>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($daily_fees_collection) && $daily_fees_collection==0){ echo'checked'; } ?> tabindex="43" class="custom-control-input feedetailsreport-sub-checkbox" id="daily_fees_collection" name="daily_fees_collection" >
                        <label class="custom-control-label" for="daily_fees_collection">Daily Fees Collection</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($day_end_report) && $day_end_report==0){ echo'checked'; } ?> tabindex="44" class="custom-control-input feedetailsreport-sub-checkbox" id="day_end_report" name="day_end_report" >
                        <label class="custom-control-label" for="day_end_report">Day End Report</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($overall_scholarship_fee_details) && $overall_scholarship_fee_details==0){ echo'checked'; } ?> tabindex="45" class="custom-control-input feedetailsreport-sub-checkbox" id="overall_scholarship_fee_details" name="overall_scholarship_fee_details" >
                        <label class="custom-control-label" for="overall_scholarship_fee_details">Overall Scholarship Fee Details</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($pending_fee_details) && $pending_fee_details==0){ echo'checked'; } ?> tabindex="46" class="custom-control-input feedetailsreport-sub-checkbox" id="pending_fee_details" name="pending_fee_details" >
                        <label class="custom-control-label" for="pending_fee_details">Pending Fee Details</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($all_type_pending_fee_details) && $all_type_pending_fee_details==0){ echo'checked'; } ?> tabindex="47" class="custom-control-input feedetailsreport-sub-checkbox" id="all_type_pending_fee_details" name="all_type_pending_fee_details" >
                        <label class="custom-control-label" for="all_type_pending_fee_details">All Type Pending Fee Details</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($classwise_overall_pending) && $classwise_overall_pending==0){ echo'checked'; } ?> tabindex="48" class="custom-control-input feedetailsreport-sub-checkbox" id="classwise_overall_pending" name="classwise_overall_pending" >
                        <label class="custom-control-label" for="classwise_overall_pending">ClassWise Overall Pending</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($fees_summary) && $fees_summary==0){ echo'checked'; } ?> tabindex="49" class="custom-control-input feedetailsreport-sub-checkbox" id="fees_summary" name="fees_summary" >
                        <label class="custom-control-label" for="fees_summary">Fees Summary</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Yes" <?php if(isset($monthwise_fees_summary) && $monthwise_fees_summary==0){ echo'checked'; } ?> tabindex="50" class="custom-control-input feedetailsreport-sub-checkbox" id="monthwise_fees_summary" name="monthwise_fees_summary" >
                        <label class="custom-control-label" for="monthwise_fees_summary">Month-wise Fees Summary</label>
                    </div>

                </div>
                
            </div>
            <!-- Report module end -->
            <hr>
        </div> <!-- card End-->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
            <div class="text-right">
                <div>
                    <button type="submit"  tabindex="51" name="submitusers" id="submitusers"  class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
                    <button type="reset"  tabindex="52" class="btn btn-outline-secondary">Cancel</button> 
                </div>
            </div>
        </div>

	</form>
</div>