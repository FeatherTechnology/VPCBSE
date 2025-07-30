<?php
// require 'PHPMailerAutoload.php';
class admin
{

	// Add User
	public function adduser($mysqli, $userid)
	{

		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['user_role'])) {
			$user_role = $_POST['user_role'];
		}
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}
		if (isset($_POST['first_name'])) {
			$first_name = $_POST['first_name'];
		}
		if (isset($_POST['last_name'])) {
			$last_name = $_POST['last_name'];
		}
		if (isset($_POST['full_name'])) {
			$full_name = $_POST['full_name'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['user_name'])) {
			$user_name = $_POST['user_name'];
		}
		if (isset($_POST['password'])) {
			$password = $_POST['password'];
			// $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		}

		if (isset($_POST['dashboard_module']) &&    $_POST['dashboard_module'] == 'Yes') {
			$dashboard_module = 0;
		} else {
			$dashboard_module = 1;
		}
		if (isset($_POST['administration_module']) &&    $_POST['administration_module'] == 'Yes') {
			$administration_module = 0;
		} else {
			$administration_module = 1;
		}
		if (isset($_POST['trust_creation']) &&    $_POST['trust_creation'] == 'Yes') {
			$trust_creation = 0;
		} else {
			$trust_creation = 1;
		}
		if (isset($_POST['school_update']) &&    $_POST['school_update'] == 'Yes') {
			$school_update = 0;
		} else {
			$school_update = 1;
		}
		if (isset($_POST['fees_master']) &&    $_POST['fees_master'] == 'Yes') {
			$fees_master = 0;
		} else {
			$fees_master = 1;
		}
		if (isset($_POST['holiday_creation']) &&    $_POST['holiday_creation'] == 'Yes') {
			$holiday_creation = 0;
		} else {
			$holiday_creation = 1;
		}
		if (isset($_POST['manage_users']) &&    $_POST['manage_users'] == 'Yes') {
			$manage_users = 0;
		} else {
			$manage_users = 1;
		}
		if (isset($_POST['master_module']) &&    $_POST['master_module'] == 'Yes') {
			$master_module = 0;
		} else {
			$master_module = 1;
		}
		if (isset($_POST['area_master']) &&    $_POST['area_master'] == 'Yes') {
			$area_master = 0;
		} else {
			$area_master = 1;
		}
		if (isset($_POST['syllabus_sub_module']) &&    $_POST['syllabus_sub_module'] == 'Yes') {
			$syllabus_sub_module = 0;
		} else {
			$syllabus_sub_module = 1;
		}
		if (isset($_POST['allocation']) &&    $_POST['allocation'] == 'Yes') {
			$allocation = 0;
		} else {
			$allocation = 1;
		}
		if (isset($_POST['allocation_view']) &&    $_POST['allocation_view'] == 'Yes') {
			$allocation_view = 0;
		} else {
			$allocation_view = 1;
		}
		if (isset($_POST['staff_module']) &&    $_POST['staff_module'] == 'Yes') {
			$staff_module = 0;
		} else {
			$staff_module = 1;
		}
		if (isset($_POST['staff_creation']) &&    $_POST['staff_creation'] == 'Yes') {
			$staff_creation = 0;
		} else {
			$staff_creation = 1;
		}
		if (isset($_POST['student_module']) &&    $_POST['student_module'] == 'Yes') {
			$student_module = 0;
		} else {
			$student_module = 1;
		}
		if (isset($_POST['temp_admission_form']) &&    $_POST['temp_admission_form'] == 'Yes') {
			$temp_admission_form = 0;
		} else {
			$temp_admission_form = 1;
		}
		if (isset($_POST['student_creation']) &&    $_POST['student_creation'] == 'Yes') {
			$student_creation = 0;
		} else {
			$student_creation = 1;
		}
		if (isset($_POST['student_rollback']) &&    $_POST['student_rollback'] == 'Yes') {
			$student_rollback = 0;
		} else {
			$student_rollback = 1;
		}
		if (isset($_POST['delete_student']) &&    $_POST['delete_student'] == 'Yes') {
			$delete_student = 0;
		} else {
			$delete_student = 1;
		}
		if (isset($_POST['certificate_sub_module']) &&    $_POST['certificate_sub_module'] == 'Yes') {
			$certificate_sub_module = 0;
		} else {
			$certificate_sub_module = 1;
		}
		if (isset($_POST['transfer']) &&    $_POST['transfer'] == 'Yes') {
			$transfer = 0;
		} else {
			$transfer = 1;
		}
		if (isset($_POST['collection_module']) &&    $_POST['collection_module'] == 'Yes') {
			$collection_module = 0;
		} else {
			$collection_module = 1;
		}
		if (isset($_POST['fees_concession']) &&    $_POST['fees_concession'] == 'Yes') {
			$fees_concession = 0;
		} else {
			$fees_concession = 1;
		}
		if (isset($_POST['fees_collection']) &&    $_POST['fees_collection'] == 'Yes') {
			$fees_collection = 0;
		} else {
			$fees_collection = 1;
		}
		if (isset($_POST['sms_module']) &&    $_POST['sms_module'] == 'Yes') {
			$sms_module = 0;
		} else {
			$sms_module = 1;
		}
		if (isset($_POST['birthday_wishes']) &&    $_POST['birthday_wishes'] == 'Yes') {
			$birthday_wishes = 0;
		} else {
			$birthday_wishes = 1;
		}
		if (isset($_POST['tamil_birthday_wishes']) &&    $_POST['tamil_birthday_wishes'] == 'Yes') {
			$tamil_birthday_wishes = 0;
		} else {
			$tamil_birthday_wishes = 1;
		}
		if (isset($_POST['student_general_message']) &&    $_POST['student_general_message'] == 'Yes') {
			$student_general_message = 0;
		} else {
			$student_general_message = 1;
		}
		if (isset($_POST['staff_general_message']) &&    $_POST['staff_general_message'] == 'Yes') {
			$staff_general_message = 0;
		} else {
			$staff_general_message = 1;
		}
		// if(isset($_POST['home_work']) &&    $_POST['home_work'] == 'Yes')		
		// {
		// 	$home_work=0;
		// }else{
		// 	$home_work=1;
		// }
		if (isset($_POST['report_module']) &&    $_POST['report_module'] == 'Yes') {
			$report_module = 0;
		} else {
			$report_module = 1;
		}
		if (isset($_POST['student_report_sub_module']) &&    $_POST['student_report_sub_module'] == 'Yes') {
			$student_report_sub_module = 0;
		} else {
			$student_report_sub_module = 1;
		}
		if (isset($_POST['student_caste_report']) &&    $_POST['student_caste_report'] == 'Yes') {
			$student_caste_report = 0;
		} else {
			$student_caste_report = 1;
		}
		if (isset($_POST['class_wise_list']) &&    $_POST['class_wise_list'] == 'Yes') {
			$class_wise_list = 0;
		} else {
			$class_wise_list = 1;
		}
		if (isset($_POST['register_of_admission']) &&    $_POST['register_of_admission'] == 'Yes') {
			$register_of_admission = 0;
		} else {
			$register_of_admission = 1;
		}
		if (isset($_POST['student_transport_list']) &&    $_POST['student_transport_list'] == 'Yes') {
			$student_transport_list = 0;
		} else {
			$student_transport_list = 1;
		}
		if (isset($_POST['fee_details_sub_module']) &&    $_POST['fee_details_sub_module'] == 'Yes') {
			$fee_details_sub_module = 0;
		} else {
			$fee_details_sub_module = 1;
		}
		if (isset($_POST['daily_fees_collection']) &&    $_POST['daily_fees_collection'] == 'Yes') {
			$daily_fees_collection = 0;
		} else {
			$daily_fees_collection = 1;
		}
		if (isset($_POST['day_end_report']) &&    $_POST['day_end_report'] == 'Yes') {
			$day_end_report = 0;
		} else {
			$day_end_report = 1;
		}
		if (isset($_POST['overall_scholarship_fee_details']) &&    $_POST['overall_scholarship_fee_details'] == 'Yes') {
			$overall_scholarship_fee_details = 0;
		} else {
			$overall_scholarship_fee_details = 1;
		}
		if (isset($_POST['pending_fee_details']) &&    $_POST['pending_fee_details'] == 'Yes') {
			$pending_fee_details = 0;
		} else {
			$pending_fee_details = 1;
		}
		if (isset($_POST['all_type_pending_fee_details']) &&    $_POST['all_type_pending_fee_details'] == 'Yes') {
			$all_type_pending_fee_details = 0;
		} else {
			$all_type_pending_fee_details = 1;
		}
		if (isset($_POST['classwise_overall_pending']) &&    $_POST['classwise_overall_pending'] == 'Yes') {
			$classwise_overall_pending = 0;
		} else {
			$classwise_overall_pending = 1;
		}
		if (isset($_POST['fees_summary']) &&    $_POST['fees_summary'] == 'Yes') {
			$fees_summary = 0;
		} else {
			$fees_summary = 1;
		}
		if (isset($_POST['monthwise_fees_summary']) &&    $_POST['monthwise_fees_summary'] == 'Yes') {
			$monthwise_fees_summary = 0;
		} else {
			$monthwise_fees_summary = 1;
		}

		$userInsert = "INSERT INTO `user`(`firstname`, `lastname`, `fullname`, `title`, `school_id`, `emailid`, `user_name`, `user_password`, `role`, `status`, `dashboard`, `administration_module`, `trust_creation`, `school_update`, `fees_master`, `holiday_creation`, `manage_users`, `master_module`, `area_master`, `syllabus_sub_module`, `allocation`, `allocation_view`, `staff_module`, `staff_creation`, `student_module`, `temp_admission_form`, `student_creation`, `student_rollback`, `delete_student`, `certificate_sub_module`, `transfer`, `collection_module`, `fees_concession`, `fees_collection`, `sms_module`, `birthday_wishes`, `tamil_birthday_wishes`, `student_general_message`, `staff_general_message`, `report_module`, `student_report_sub_module`, `student_caste_report`, `class_wise_list`, `register_of_admission`, `student_transport_list`, `fee_details_sub_module`, `daily_fees_collection`, `day_end_report`, `overall_scholarship_fee_details`, `pending_fee_details`, `all_type_pending_fee_details`, `classwise_overall_pending`, `fees_summary`, `monthwise_fees_summary`, `insert_login_id`) VALUES ('$first_name','$last_name','$full_name','$title','$school_name','$email_id','$user_name','$password','$user_role','0','$dashboard_module','$administration_module','$trust_creation','$school_update','$fees_master','$holiday_creation','$manage_users','$master_module','$area_master','$syllabus_sub_module','$allocation','$allocation_view','$staff_module','$staff_creation','$student_module','$temp_admission_form','$student_creation','$student_rollback','$delete_student','$certificate_sub_module','$transfer','$collection_module','$fees_concession','$fees_collection', '$sms_module', '$birthday_wishes', '$tamil_birthday_wishes', '$student_general_message', '$staff_general_message', '$report_module','$student_report_sub_module','$student_caste_report','$class_wise_list','$register_of_admission','$student_transport_list','$fee_details_sub_module','$daily_fees_collection','$day_end_report','$overall_scholarship_fee_details','$pending_fee_details','$all_type_pending_fee_details','$classwise_overall_pending','$fees_summary','$monthwise_fees_summary', '$userid')";
		$insresult = $mysqli->query($userInsert) or die("Error " . $mysqli->error);
	}

	//UPdate user
	public function updateuser($mysqli, $manage_user_id, $userid)
	{

		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['user_role'])) {
			$user_role = $_POST['user_role'];
		}
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}
		if (isset($_POST['first_name'])) {
			$first_name = $_POST['first_name'];
		}
		if (isset($_POST['last_name'])) {
			$last_name = $_POST['last_name'];
		}
		if (isset($_POST['full_name'])) {
			$full_name = $_POST['full_name'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['user_name'])) {
			$user_name = $_POST['user_name'];
		}
		if (isset($_POST['password'])) {
			$password = $_POST['password'];
			// $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		}

		if (isset($_POST['dashboard_module']) &&    $_POST['dashboard_module'] == 'Yes') {
			$dashboard_module = 0;
		} else {
			$dashboard_module = 1;
		}
		if (isset($_POST['administration_module']) &&    $_POST['administration_module'] == 'Yes') {
			$administration_module = 0;
		} else {
			$administration_module = 1;
		}
		if (isset($_POST['trust_creation']) &&    $_POST['trust_creation'] == 'Yes') {
			$trust_creation = 0;
		} else {
			$trust_creation = 1;
		}
		if (isset($_POST['school_update']) &&    $_POST['school_update'] == 'Yes') {
			$school_update = 0;
		} else {
			$school_update = 1;
		}
		if (isset($_POST['fees_master']) &&    $_POST['fees_master'] == 'Yes') {
			$fees_master = 0;
		} else {
			$fees_master = 1;
		}
		if (isset($_POST['holiday_creation']) &&    $_POST['holiday_creation'] == 'Yes') {
			$holiday_creation = 0;
		} else {
			$holiday_creation = 1;
		}
		if (isset($_POST['manage_users']) &&    $_POST['manage_users'] == 'Yes') {
			$manage_users = 0;
		} else {
			$manage_users = 1;
		}
		if (isset($_POST['master_module']) &&    $_POST['master_module'] == 'Yes') {
			$master_module = 0;
		} else {
			$master_module = 1;
		}
		if (isset($_POST['area_master']) &&    $_POST['area_master'] == 'Yes') {
			$area_master = 0;
		} else {
			$area_master = 1;
		}
		if (isset($_POST['syllabus_sub_module']) &&    $_POST['syllabus_sub_module'] == 'Yes') {
			$syllabus_sub_module = 0;
		} else {
			$syllabus_sub_module = 1;
		}
		if (isset($_POST['allocation']) &&    $_POST['allocation'] == 'Yes') {
			$allocation = 0;
		} else {
			$allocation = 1;
		}
		if (isset($_POST['allocation_view']) &&    $_POST['allocation_view'] == 'Yes') {
			$allocation_view = 0;
		} else {
			$allocation_view = 1;
		}
		if (isset($_POST['staff_module']) &&    $_POST['staff_module'] == 'Yes') {
			$staff_module = 0;
		} else {
			$staff_module = 1;
		}
		if (isset($_POST['staff_creation']) &&    $_POST['staff_creation'] == 'Yes') {
			$staff_creation = 0;
		} else {
			$staff_creation = 1;
		}
		if (isset($_POST['student_module']) &&    $_POST['student_module'] == 'Yes') {
			$student_module = 0;
		} else {
			$student_module = 1;
		}
		if (isset($_POST['temp_admission_form']) &&    $_POST['temp_admission_form'] == 'Yes') {
			$temp_admission_form = 0;
		} else {
			$temp_admission_form = 1;
		}
		if (isset($_POST['student_creation']) &&    $_POST['student_creation'] == 'Yes') {
			$student_creation = 0;
		} else {
			$student_creation = 1;
		}
		if (isset($_POST['student_rollback']) &&    $_POST['student_rollback'] == 'Yes') {
			$student_rollback = 0;
		} else {
			$student_rollback = 1;
		}
		if (isset($_POST['delete_student']) &&    $_POST['delete_student'] == 'Yes') {
			$delete_student = 0;
		} else {
			$delete_student = 1;
		}
		if (isset($_POST['certificate_sub_module']) &&    $_POST['certificate_sub_module'] == 'Yes') {
			$certificate_sub_module = 0;
		} else {
			$certificate_sub_module = 1;
		}
		if (isset($_POST['transfer']) &&    $_POST['transfer'] == 'Yes') {
			$transfer = 0;
		} else {
			$transfer = 1;
		}
		if (isset($_POST['collection_module']) &&    $_POST['collection_module'] == 'Yes') {
			$collection_module = 0;
		} else {
			$collection_module = 1;
		}
		if (isset($_POST['fees_concession']) &&    $_POST['fees_concession'] == 'Yes') {
			$fees_concession = 0;
		} else {
			$fees_concession = 1;
		}
		if (isset($_POST['fees_collection']) &&    $_POST['fees_collection'] == 'Yes') {
			$fees_collection = 0;
		} else {
			$fees_collection = 1;
		}
		if (isset($_POST['sms_module']) &&    $_POST['sms_module'] == 'Yes') {
			$sms_module = 0;
		} else {
			$sms_module = 1;
		}
		if (isset($_POST['birthday_wishes']) &&    $_POST['birthday_wishes'] == 'Yes') {
			$birthday_wishes = 0;
		} else {
			$birthday_wishes = 1;
		}
		if (isset($_POST['tamil_birthday_wishes']) &&    $_POST['tamil_birthday_wishes'] == 'Yes') {
			$tamil_birthday_wishes = 0;
		} else {
			$tamil_birthday_wishes = 1;
		}
		if (isset($_POST['student_general_message']) &&    $_POST['student_general_message'] == 'Yes') {
			$student_general_message = 0;
		} else {
			$student_general_message = 1;
		}
		if (isset($_POST['staff_general_message']) &&    $_POST['staff_general_message'] == 'Yes') {
			$staff_general_message = 0;
		} else {
			$staff_general_message = 1;
		}
		// if(isset($_POST['home_work']) &&    $_POST['home_work'] == 'Yes')		
		// {
		// 	$home_work=0;
		// }else{
		// 	$home_work=1;
		// }
		if (isset($_POST['report_module']) &&    $_POST['report_module'] == 'Yes') {
			$report_module = 0;
		} else {
			$report_module = 1;
		}
		if (isset($_POST['student_report_sub_module']) &&    $_POST['student_report_sub_module'] == 'Yes') {
			$student_report_sub_module = 0;
		} else {
			$student_report_sub_module = 1;
		}
		if (isset($_POST['student_caste_report']) &&    $_POST['student_caste_report'] == 'Yes') {
			$student_caste_report = 0;
		} else {
			$student_caste_report = 1;
		}
		if (isset($_POST['class_wise_list']) &&    $_POST['class_wise_list'] == 'Yes') {
			$class_wise_list = 0;
		} else {
			$class_wise_list = 1;
		}
		if (isset($_POST['register_of_admission']) &&    $_POST['register_of_admission'] == 'Yes') {
			$register_of_admission = 0;
		} else {
			$register_of_admission = 1;
		}
		if (isset($_POST['student_transport_list']) &&    $_POST['student_transport_list'] == 'Yes') {
			$student_transport_list = 0;
		} else {
			$student_transport_list = 1;
		}
		if (isset($_POST['fee_details_sub_module']) &&    $_POST['fee_details_sub_module'] == 'Yes') {
			$fee_details_sub_module = 0;
		} else {
			$fee_details_sub_module = 1;
		}
		if (isset($_POST['daily_fees_collection']) &&    $_POST['daily_fees_collection'] == 'Yes') {
			$daily_fees_collection = 0;
		} else {
			$daily_fees_collection = 1;
		}
		if (isset($_POST['day_end_report']) &&    $_POST['day_end_report'] == 'Yes') {
			$day_end_report = 0;
		} else {
			$day_end_report = 1;
		}
		if (isset($_POST['overall_scholarship_fee_details']) &&    $_POST['overall_scholarship_fee_details'] == 'Yes') {
			$overall_scholarship_fee_details = 0;
		} else {
			$overall_scholarship_fee_details = 1;
		}
		if (isset($_POST['pending_fee_details']) &&    $_POST['pending_fee_details'] == 'Yes') {
			$pending_fee_details = 0;
		} else {
			$pending_fee_details = 1;
		}
		if (isset($_POST['all_type_pending_fee_details']) &&    $_POST['all_type_pending_fee_details'] == 'Yes') {
			$all_type_pending_fee_details = 0;
		} else {
			$all_type_pending_fee_details = 1;
		}
		if (isset($_POST['classwise_overall_pending']) &&    $_POST['classwise_overall_pending'] == 'Yes') {
			$classwise_overall_pending = 0;
		} else {
			$classwise_overall_pending = 1;
		}
		if (isset($_POST['fees_summary']) &&    $_POST['fees_summary'] == 'Yes') {
			$fees_summary = 0;
		} else {
			$fees_summary = 1;
		}
		if (isset($_POST['monthwise_fees_summary']) &&    $_POST['monthwise_fees_summary'] == 'Yes') {
			$monthwise_fees_summary = 0;
		} else {
			$monthwise_fees_summary = 1;
		}

		$updateUserQry = "UPDATE `user` SET `firstname`='$first_name',`lastname`='$last_name',`fullname`='$full_name',`title`='$title',`school_id`='$school_name',`emailid`='$email_id',`user_name`='$user_name',`user_password`='$password',`role`='$user_role',`status`='0',`dashboard`='$dashboard_module',`administration_module`='$administration_module',`trust_creation`='$trust_creation',`school_update`='$school_update',`fees_master`='$fees_master',`holiday_creation`='$holiday_creation',`manage_users`='$manage_users',`master_module`='$master_module',`area_master`='$area_master',`syllabus_sub_module`='$syllabus_sub_module',`allocation`='$allocation',`allocation_view`='$allocation_view',`staff_module`='$staff_module',`staff_creation`='$staff_creation',`student_module`='$student_module',`temp_admission_form`='$temp_admission_form',`student_creation`='$student_creation',`student_rollback`='$student_rollback',`delete_student`='$delete_student',`certificate_sub_module`='$certificate_sub_module',`transfer`='$transfer',`collection_module`='$collection_module',`fees_concession`='$fees_concession',`fees_collection`='$fees_collection', `sms_module`='$sms_module',`birthday_wishes`='$birthday_wishes',`tamil_birthday_wishes`='$tamil_birthday_wishes',`student_general_message`='$student_general_message',`staff_general_message`='$staff_general_message',`report_module`='$report_module',`student_report_sub_module`='$student_report_sub_module',`student_caste_report`='$student_caste_report',`class_wise_list`='$class_wise_list',`register_of_admission`='$register_of_admission',`student_transport_list`='$student_transport_list',`fee_details_sub_module`='$fee_details_sub_module',`daily_fees_collection`='$daily_fees_collection',`day_end_report`='$day_end_report',`overall_scholarship_fee_details`='$overall_scholarship_fee_details',`pending_fee_details`='$pending_fee_details',`all_type_pending_fee_details`='$all_type_pending_fee_details',`classwise_overall_pending`='$classwise_overall_pending',`fees_summary`='$fees_summary',`monthwise_fees_summary`='$monthwise_fees_summary', `update_login_id`='$userid', `updated_date`=now() WHERE `user_id`='$manage_user_id'";
		$insresult = $mysqli->query($updateUserQry) or die("Error " . $mysqli->error);
	}


	public function getuser($mysqli, $idupd)
	{
		$qry = "SELECT * FROM user WHERE user_id='" . mysqli_real_escape_string($mysqli, $idupd) . "'";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['user_id']                  = $row->user_id;
			$detailrecords['fullname']       	       = strip_tags($row->fullname);
			$detailrecords['user_name']       	       = strip_tags($row->user_name);
			$detailrecords['user_password']            = strip_tags($row->user_password);
			$detailrecords['status']                   = strip_tags($row->status);
			$detailrecords['firstname']                  = $row->firstname;
			$detailrecords['lastname']                  = $row->lastname;
			$detailrecords['title']                  = $row->title;
			$detailrecords['school_id']                  = $row->school_id;
			$detailrecords['emailid']                  = $row->emailid;
			$detailrecords['role']                  = $row->role;
			$detailrecords['dashboard']                  = $row->dashboard;
			$detailrecords['administration_module']                  = $row->administration_module;
			$detailrecords['trust_creation']                  = $row->trust_creation;
			$detailrecords['school_update']                  = $row->school_update;
			$detailrecords['fees_master']                  = $row->fees_master;
			$detailrecords['holiday_creation']                  = $row->holiday_creation;
			$detailrecords['manage_users']                  = $row->manage_users;
			$detailrecords['master_module']                  = $row->master_module;
			$detailrecords['area_master']                  = $row->area_master;
			$detailrecords['syllabus_sub_module']                  = $row->syllabus_sub_module;
			$detailrecords['allocation']                  = $row->allocation;
			$detailrecords['allocation_view']                  = $row->allocation_view;
			$detailrecords['staff_module']                  = $row->staff_module;
			$detailrecords['staff_creation']                  = $row->staff_creation;
			$detailrecords['student_module']                  = $row->student_module;
			$detailrecords['temp_admission_form']                  = $row->temp_admission_form;
			$detailrecords['student_creation']                  = $row->student_creation;
			$detailrecords['student_rollback']                  = $row->student_rollback;
			$detailrecords['delete_student']                  = $row->delete_student;
			$detailrecords['certificate_sub_module']                  = $row->certificate_sub_module;
			$detailrecords['transfer']                  = $row->transfer;
			$detailrecords['collection_module']                  = $row->collection_module;
			$detailrecords['fees_concession']                  = $row->fees_concession;
			$detailrecords['fees_collection']                  = $row->fees_collection;
			$detailrecords['sms_module']                  = $row->sms_module;
			$detailrecords['birthday_wishes']                  = $row->birthday_wishes;
			$detailrecords['tamil_birthday_wishes']                  = $row->tamil_birthday_wishes;
			$detailrecords['student_general_message']                  = $row->student_general_message;
			$detailrecords['staff_general_message']                  = $row->staff_general_message;
			$detailrecords['home_work']                  = $row->home_work;
			$detailrecords['report_module']                  = $row->report_module;
			$detailrecords['student_report_sub_module']                  = $row->student_report_sub_module;
			$detailrecords['student_caste_report']                  = $row->student_caste_report;
			$detailrecords['class_wise_list']                  = $row->class_wise_list;
			$detailrecords['register_of_admission']                  = $row->register_of_admission;
			$detailrecords['student_transport_list']                  = $row->student_transport_list;
			$detailrecords['fee_details_sub_module']                  = $row->fee_details_sub_module;
			$detailrecords['daily_fees_collection']                  = $row->daily_fees_collection;
			$detailrecords['day_end_report']                  = $row->day_end_report;
			$detailrecords['overall_scholarship_fee_details']                  = $row->overall_scholarship_fee_details;
			$detailrecords['pending_fee_details']                  = $row->pending_fee_details;
			$detailrecords['all_type_pending_fee_details']                  = $row->all_type_pending_fee_details;
			$detailrecords['classwise_overall_pending']                  = $row->classwise_overall_pending;
			$detailrecords['fees_summary']                  = $row->fees_summary;
			$detailrecords['monthwise_fees_summary']                  = $row->monthwise_fees_summary;
		}
		return $detailrecords;
	}

	//  Delete User
	public function deleteuser($mysqli, $id, $userid)
	{

		$userDelete = "UPDATE user set status = '1', delete_login_id = '$userid', updated_date = now() WHERE user_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($userDelete) or die("Error in delete query" . $mysqli->error);
	}

	// Add school
	public function addSchoolCreation($mysqli, $userid, $academic_year)
	{

		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['address1'])) {
			$address1 = $_POST['address1'];
		}
		if (isset($_POST['address2'])) {
			$address2 = $_POST['address2'];
		}
		if (isset($_POST['school_login_name'])) {
			$school_login_name = $_POST['school_login_name'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['state'])) {
			$state = $_POST['state'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['website'])) {
			$web_url = $_POST['website'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		$school_logo = '';
		if (!empty($_FILES['school_logo']['name'])) {
			$school_logo = $_FILES['school_logo']['name'];
			$student_image_tmp = $_FILES['school_logo']['tmp_name'];
			$student_imagefolder = "uploads/school_creation/" . $school_logo;
			move_uploaded_file($student_image_tmp, $student_imagefolder);
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		$schoolInsert = "INSERT INTO school_creation(school_name, contact_number, email_id,web_url, address1, address2, school_login_name, district, state, pincode, school_logo, insert_login_id,year_id) 
			VALUES('" . strip_tags($school_name) . "','" . strip_tags($contact_number) . "', '" . strip_tags($email_id) . "', '" . strip_tags($web_url) . "', '" . strip_tags($address1) . "', '" . strip_tags($address2) . "', 
			'" . strip_tags($school_login_name) . "', '" . strip_tags($district) . "', '" . strip_tags($state) . "', '" . strip_tags($pincode) . "', '" . strip_tags($school_logo) . "', '" . strip_tags($userid) . "','" . strip_tags($academic_year) . "')";

		$insresult = $mysqli->query($schoolInsert) or die("Error " . $mysqli->error);
	}

	// Get school
	public function getSchoolCreation($mysqli, $id)
	{

		$schoolSelect = "SELECT sc.school_id,sc.school_name,sc.school_login_name,sc.district,sc.address1,sc.address2,sc.address3,sc.state,st.state AS state_name,sc.contact_number,sc.email_id,sc.web_url,sc.school_logo,sc.year_id, sc.pincode FROM school_creation sc LEFT JOIN state_creation st ON st.id = sc.state  WHERE school_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($schoolSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['school_id']      = $row->school_id;
			$detailrecords['school_name']    = $row->school_name;
			$detailrecords['contact_number']    = $row->contact_number;
			$detailrecords['email_id']        = $row->email_id;
			$detailrecords['web_url']        = $row->web_url;
			$detailrecords['address1']      = $row->address1;
			$detailrecords['address2']      = $row->address2;
			$detailrecords['school_login_name']       = $row->school_login_name;
			$detailrecords['district']         = $row->district;
			$detailrecords['state']       = $row->state;
			$detailrecords['state_name']       = $row->state_name;
			$detailrecords['school_logo']       = $row->school_logo;
			$detailrecords['pincode']       = $row->pincode;
		}

		return $detailrecords;
	}
	// Update school
	public function updateSchoolCreation($mysqli, $id, $userid)
	{

		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['website'])) {
			$web_url = $_POST['website'];
		}
		if (isset($_POST['address1'])) {
			$address1 = $_POST['address1'];
		}
		if (isset($_POST['address2'])) {
			$address2 = $_POST['address2'];
		}
		if (isset($_POST['school_login_name'])) {
			$school_login_name = $_POST['school_login_name'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['state'])) {
			$state = $_POST['state'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		//insert new file
		$school_logo = '';
		if (!empty($_FILES['school_logo']['name'])) {
			//delete old file //media_file_old
			$path = 'uploads/school_creation/' . $school_logo;
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$school_logo = $_FILES['school_logo']['name'];
			$media_file_temp = $_FILES['school_logo']['tmp_name'];
			$mediaimage_folder = "uploads/school_creation/" . $school_logo;
			move_uploaded_file($media_file_temp, $mediaimage_folder);
		}
		//check old file name if new is not set
		if ($school_logo == '' && isset($_POST["edit_school_logo"])) {
			$school_logo = $_POST["edit_school_logo"];
		}

		$schoolUpdaet = "UPDATE school_creation SET school_name = '" . strip_tags($school_name) . "', contact_number='" . strip_tags($contact_number) . "', 
		   email_id='" . strip_tags($email_id) . "',web_url='" . strip_tags($web_url) . "', address1='" . strip_tags($address1) . "', address2='" . strip_tags($address2) . "', school_login_name='" . strip_tags($school_login_name) . "', 
		   district='" . strip_tags($district) . "', state='" . strip_tags($state) . "', pincode = '" . strip_tags($pincode) . "', school_logo='" . strip_tags($school_logo) . "', update_login_id='" . strip_tags($userid) . "', status = '0' WHERE school_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($schoolUpdaet) or die("Error in in update Query!." . $mysqli->error);
	}

	//  Delete school
	public function deleteschoolCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$schoolDelete = "UPDATE school_creation set status='1', delete_login_id='" . strip_tags($userid) . "' WHERE school_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($schoolDelete) or die("Error in delete query" . $mysqli->error);
	}

	// Add holiday
	public function addHolidayCreation($mysqli, $userid, $school_id, $log_year)
	{

		if (isset($_POST['holiday_name'])) {
			$holiday_name = $_POST['holiday_name'];
		}
		if (isset($_POST['holiday_date'])) {
			$holiday_date = $_POST['holiday_date'];
		}
		if (isset($_POST['comments'])) {
			$comments = $_POST['comments'];
		}
		// if(isset($_POST['userid'])){
		// 	$userid = $_POST['userid'];
		// } 

		$holidayInsert = "INSERT INTO holiday_creation(holiday_name, holiday_date, comments, insert_login_id,school_id,academic_year) 
			VALUES('" . strip_tags($holiday_name) . "','" . strip_tags($holiday_date) . "', '" . strip_tags($comments) . "','" . strip_tags($userid) . "','" . strip_tags($school_id) . "','" . strip_tags($log_year) . "' )";

		$insresult = $mysqli->query($holidayInsert) or die("Error " . $mysqli->error);
	}

	// Get holiday
	public function getHolidayCreation($mysqli, $id)
	{

		$holidaySelect = "SELECT * FROM holiday_creation WHERE holiday_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($holidaySelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['holiday_id']      = $row->holiday_id;
			$detailrecords['holiday_name']    = $row->holiday_name;
			$detailrecords['holiday_date']    = $row->holiday_date;
			$detailrecords['comments']        = $row->comments;
		}

		return $detailrecords;
	}

	// Update holiday
	public function updateHolidayCreation($mysqli, $id, $userid, $school_id, $log_year)
	{

		if (isset($_POST['holiday_name'])) {
			$holiday_name = $_POST['holiday_name'];
		}
		if (isset($_POST['holiday_date'])) {
			$holiday_date = $_POST['holiday_date'];
		}
		if (isset($_POST['comments'])) {
			$comments = $_POST['comments'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		$holidayUpdaet = "UPDATE holiday_creation SET holiday_name = '" . strip_tags($holiday_name) . "', holiday_date='" . strip_tags($holiday_date) . "', 
		   comments='" . strip_tags($comments) . "', update_login_id='" . strip_tags($userid) . "',school_id='" . strip_tags($school_id) . "',academic_year='" . strip_tags($log_year) . "', status = '0' WHERE holiday_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($holidayUpdaet) or die("Error in in update Query!." . $mysqli->error);
	}

	//  Delete holiday
	public function deleteHolidayCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$holidayDelete = "UPDATE holiday_creation set status='1', delete_login_id='" . strip_tags($userid) . "' WHERE holiday_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($holidayDelete) or die("Error in delete query" . $mysqli->error);
	}

	// Add Temp Student
	public function addTempStudentCreation($mysqli, $userid, $school_id, $year_id)
	{

		if (isset($_POST['temp_student_name'])) {
			$temp_student_name = $_POST['temp_student_name'];
		}
		if (isset($_POST['temp_no'])) {
			$temp_no = $_POST['temp_no'];
		}
		if (isset($_POST['temp_dob'])) {
			$temp_dob = $_POST['temp_dob'];
		}
		if (isset($_POST['temp_gender'])) {
			$temp_gender = $_POST['temp_gender'];
		}
		if (isset($_POST['temp_category'])) {
			$temp_category = $_POST['temp_category'];
		}
		if (isset($_POST['temp_standard'])) {
			$temp_standard = $_POST['temp_standard'];
		}
		if (isset($_POST['temp_student_type'])) {
			$temp_student_type = $_POST['temp_student_type'];
		}
		if (isset($_POST['temp_medium'])) {
			$temp_medium = $_POST['temp_medium'];
		}
		if (isset($_POST['temp_entrance_exam_date'])) {
			$temp_entrance_exam_date = $_POST['temp_entrance_exam_date'];
		}
		if (isset($_POST['temp_entrance_exam_mark'])) {
			$temp_entrance_exam_mark = $_POST['temp_entrance_exam_mark'];
		}
		if (isset($_POST['temp_src'])) {
			$temp_src = $_POST['temp_src'];
		}
		if (isset($_POST['temp_father_name'])) {
			$temp_father_name = $_POST['temp_father_name'];
		}
		if (isset($_POST['temp_mother_name'])) {
			$temp_mother_name = $_POST['temp_mother_name'];
		}
		if (isset($_POST['temp_fathercontact_number'])) {
			$temp_fathercontact_number = $_POST['temp_fathercontact_number'];
		}
		if (isset($_POST['temp_mothercontact_number'])) {
			$temp_mothercontact_number = $_POST['temp_mothercontact_number'];
		}
		if (isset($_POST['temp_flat_no'])) {
			$temp_flat_no = $_POST['temp_flat_no'];
		}
		if (isset($_POST['temp_street'])) {
			$temp_street = $_POST['temp_street'];
		}
		if (isset($_POST['temp_district'])) {
			$temp_district = $_POST['temp_district'];
		}
		if (isset($_POST['temp_area'])) {
			$temp_area = $_POST['temp_area'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id = $_POST['school_id'];
		// } 
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// } 

		$tempStudentInsert = "INSERT INTO temp_admission_student(temp_no,temp_student_name, temp_dob, temp_gender, temp_category, temp_standard, temp_student_type, temp_medium,temp_entrance_exam_date,temp_entrance_exam_mark, temp_src, temp_father_name, temp_mother_name, temp_fathercontact_number, temp_mothercontact_number, temp_flat_no, temp_street,
			temp_district, temp_area, insert_login_id,school_id,year_id) 
			VALUES('" . strip_tags($temp_no) . "','" . strip_tags($temp_student_name) . "','" . strip_tags($temp_dob) . "', '" . strip_tags($temp_gender) . "', '" . strip_tags($temp_category) . "', 
			'" . strip_tags($temp_standard) . "', '" . strip_tags($temp_student_type) . "', '" . strip_tags($temp_medium) . "','" . strip_tags($temp_entrance_exam_date) . "','" . strip_tags($temp_entrance_exam_mark) . "',
			'" . strip_tags($temp_src) . "','" . strip_tags($temp_father_name) . "','" . strip_tags($temp_mother_name) . "','" . strip_tags($temp_fathercontact_number) . "','" . strip_tags($temp_mothercontact_number) . "', '" . strip_tags($temp_flat_no) . "',
			'" . strip_tags($temp_street) . "',	'" . strip_tags($temp_district) . "','" . strip_tags($temp_area) . "', '" . strip_tags($userid) . "', '" . strip_tags($school_id) . "', '" . strip_tags($year_id) . "' )";

		$insresult = $mysqli->query($tempStudentInsert) or die("Error " . $mysqli->error);
		$lastInsertedTempId = $mysqli->insert_id;

		return $lastInsertedTempId;
	}

	// Get tempStudent
	public function getTempStudentCreation($mysqli, $id)
	{
		$tempStudentSelect = "SELECT * FROM temp_admission_student tas JOIN standard_creation sc ON tas.temp_standard = sc.standard_id WHERE temp_admission_id='$id' ";
		$res = $mysqli->query($tempStudentSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['temp_admission_id']      	= $row->temp_admission_id;
			$detailrecords['temp_no']    				= $row->temp_no;
			$detailrecords['temp_student_name']    		= $row->temp_student_name;
			$detailrecords['temp_dob']    				= $row->temp_dob;
			$detailrecords['temp_gender']        		= $row->temp_gender;
			$detailrecords['temp_category']      		= $row->temp_category;
			$detailrecords['temp_standard']       		= $row->temp_standard;
			$detailrecords['temp_standard_name']       	= $row->standard;
			$detailrecords['temp_student_type']         = $row->temp_student_type;
			$detailrecords['temp_entrance_exam_date']   = $row->temp_entrance_exam_date;
			$detailrecords['temp_entrance_exam_mark']   = $row->temp_entrance_exam_mark;
			$detailrecords['temp_src']       			= $row->temp_src;
			$detailrecords['temp_father_name']       	= $row->temp_father_name;
			$detailrecords['temp_mother_name']       	= $row->temp_mother_name;
			$detailrecords['temp_fathercontact_number']       = $row->temp_fathercontact_number;
			$detailrecords['temp_mothercontact_number']       = $row->temp_mothercontact_number;
			$detailrecords['temp_flat_no']       		= $row->temp_flat_no;
			$detailrecords['temp_street']       		= $row->temp_street;
			$detailrecords['temp_district']       		= $row->temp_district;
			$detailrecords['temp_area']       			= $row->temp_area;
			$detailrecords['temp_medium']       		= $row->temp_medium;
			$detailrecords['year_id']       			= $row->year_id;
		}
		return $detailrecords;
	}

	// Update tempStudent
	public function updateTempStudentCreation($mysqli, $id, $userid, $school_id, $year_id)
	{

		if (isset($_POST['temp_student_name'])) {
			$temp_student_name = $_POST['temp_student_name'];
		}
		if (isset($_POST['temp_no'])) {
			$temp_no = $_POST['temp_no'];
		}
		if (isset($_POST['temp_dob'])) {
			$temp_dob = $_POST['temp_dob'];
		}
		if (isset($_POST['temp_gender'])) {
			$temp_gender = $_POST['temp_gender'];
		}
		if (isset($_POST['temp_category'])) {
			$temp_category = $_POST['temp_category'];
		}
		if (isset($_POST['temp_standard'])) {
			$temp_standard = $_POST['temp_standard'];
		}
		if (isset($_POST['temp_student_type'])) {
			$temp_student_type = $_POST['temp_student_type'];
		}
		if (isset($_POST['temp_medium'])) {
			$temp_medium = $_POST['temp_medium'];
		}
		if (isset($_POST['temp_entrance_exam_date'])) {
			$temp_entrance_exam_date = $_POST['temp_entrance_exam_date'];
		}
		if (isset($_POST['temp_entrance_exam_mark'])) {
			$temp_entrance_exam_mark = $_POST['temp_entrance_exam_mark'];
		}
		if (isset($_POST['temp_src'])) {
			$temp_src = $_POST['temp_src'];
		}
		if (isset($_POST['temp_father_name'])) {
			$temp_father_name = $_POST['temp_father_name'];
		}
		if (isset($_POST['temp_mother_name'])) {
			$temp_mother_name = $_POST['temp_mother_name'];
		}
		if (isset($_POST['temp_contact_number'])) {
			$temp_contact_number = $_POST['temp_contact_number'];
		}
		if (isset($_POST['temp_flat_no'])) {
			$temp_flat_no = $_POST['temp_flat_no'];
		}
		if (isset($_POST['temp_street'])) {
			$temp_street = $_POST['temp_street'];
		}
		if (isset($_POST['temp_district'])) {
			$temp_district = $_POST['temp_district'];
		}
		if (isset($_POST['temp_area'])) {
			$temp_area = $_POST['temp_area'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id = $_POST['school_id'];
		// } 
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// } 

		$tempStudentUpdaet = "UPDATE temp_admission_student SET temp_no = '" . strip_tags($temp_no) . "', temp_student_name = '" . strip_tags($temp_student_name) . "', temp_dob='" . strip_tags($temp_dob) . "', 
			   temp_gender='" . strip_tags($temp_gender) . "', temp_category='" . strip_tags($temp_category) . "', temp_standard='" . strip_tags($temp_standard) . "', 
			   temp_student_type='" . strip_tags($temp_student_type) . "', temp_medium='" . strip_tags($temp_medium) . "', temp_entrance_exam_date='" . strip_tags($temp_entrance_exam_date) . "',temp_entrance_exam_mark='" . strip_tags($temp_entrance_exam_mark) . "',
			   temp_src='" . strip_tags($temp_src) . "',temp_father_name='" . strip_tags($temp_father_name) . "',temp_mother_name='" . strip_tags($temp_mother_name) . "',temp_contact_number='" . strip_tags($temp_contact_number) . "',
			   temp_flat_no='" . strip_tags($temp_flat_no) . "',temp_street='" . strip_tags($temp_street) . "',temp_district='" . strip_tags($temp_district) . "',temp_area='" . strip_tags($temp_area) . "', update_login_id='" . strip_tags($userid) . "', school_id='" . strip_tags($school_id) . "', year_id='" . strip_tags($year_id) . "', status = '0' WHERE temp_admission_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($tempStudentUpdaet) or die("Error in in update Query!." . $mysqli->error);
	}

	//  Delete tempStudent
	public function deleteTempStudentCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$tempStudentDelete = "UPDATE temp_admission_student set status='1', delete_login_id='" . strip_tags($userid) . "' WHERE temp_admission_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($tempStudentDelete) or die("Error in delete query" . $mysqli->error);
	}

	// Add Temp Student
	public function addStudentCreation($mysqli, $userid, $school_id, $year_id)
	{

		if (isset($_POST['temp_no'])) {
			$temp_no = $_POST['temp_no'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id= $_POST['school_id'];
		// }
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// }
		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['sur_name'])) {
			$sur_name = $_POST['sur_name'];
		}
		if (isset($_POST['date_of_birth'])) {
			$date_of_birth = $_POST['date_of_birth'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['mother_tongue'])) {
			$mother_tongue = $_POST['mother_tongue'];
		}
		if (isset($_POST['aadhar_number'])) {
			$aadhar_number = $_POST['aadhar_number'];
		}
		if (isset($_POST['blood_group'])) {
			$blood_group = $_POST['blood_group'];
		}
		$category = '';
		if (isset($_POST['category'])) {
			$category = $_POST['category'];
		}
		if (isset($_POST['castename'])) {
			$castename = $_POST['castename'];
		}
		if (isset($_POST['sub_caste'])) {
			$sub_caste = $_POST['sub_caste'];
		}
		if (isset($_POST['nationality'])) {
			$nationality = $_POST['nationality'];
		}
		if (isset($_POST['religion'])) {
			$religion = $_POST['religion'];
		}
		$filltoo = '';
		if (isset($_POST['filltoo'])) {
			$filltoo = $_POST['filltoo'];
		}
		if (isset($_POST['flat_no'])) {
			$flat_no = $_POST['flat_no'];
		}
		if (isset($_POST['flat_no1'])) {
			$flat_no1 = $_POST['flat_no1'];
		}
		if (isset($_POST['street'])) {
			$street = $_POST['street'];
		}
		if (isset($_POST['street1'])) {
			$street1 = $_POST['street1'];
		}
		if (isset($_POST['area_locatlity'])) {
			$area_locatlity = $_POST['area_locatlity'];
		}
		if (isset($_POST['area_locatlity1'])) {
			$area_locatlity1 = $_POST['area_locatlity1'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['district1'])) {
			$district1 = $_POST['district1'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['pincode1'])) {
			$pincode1 = $_POST['pincode1'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}
		if (isset($_POST['previouschoolname'])) {
			$previouschoolname = $_POST['previouschoolname'];
		}
		if (isset($_POST['previousplace'])) {
			$previousplace = $_POST['previousplace'];
		}
		if (isset($_POST['strpreviousdoj'])) {
			$strpreviousdoj = $_POST['strpreviousdoj'];
		}
		if (isset($_POST['strpreviousdol'])) {
			$strpreviousdol = $_POST['strpreviousdol'];
		}
		if (isset($_POST['timeoftchandedover'])) {
			$timeoftchandedover = $_POST['timeoftchandedover'];
		}
		if (isset($_POST['previousclassattended'])) {
			$previousclassattended = $_POST['previousclassattended'];
		}
		if (isset($_POST['section'])) {
			$section = $_POST['section'];
		}
		if (isset($_POST['medium'])) {
			$medium = $_POST['medium'];
		}
		if (isset($_POST['studentrollno'])) {
			$studentrollno = $_POST['studentrollno'];
		}
		if (isset($_POST['emisno'])) {
			$emisno = $_POST['emisno'];
		}
		if (isset($_POST['studentstype'])) {
			$studentstype = $_POST['studentstype'];
		}
		$referencecat = '';
		if (isset($_POST['referencecat'])) {
			$referencecat = $_POST['referencecat'];
		}
		$refstaffid = '';
		if (isset($_POST['refstaffid'])) {
			$refstaffid = $_POST['refstaffid'];
		}
		$refstudentid = '';
		if (isset($_POST['refstudentid'])) {
			$refstudentid = $_POST['refstudentid'];
		}
		$refoldstudentid = '';
		if (isset($_POST['refoldstudentid'])) {
			$refoldstudentid = $_POST['refoldstudentid'];
		}
		$referencecatname = '';
		if (isset($_POST['referencecatname'])) {
			$referencecatname = $_POST['referencecatname'];
		}
		$referred_by = '';
		if (isset($_POST['referred_by'])) {
			$referred_by = $_POST['referred_by'];
		}
		$concession_type = '';
		if (isset($_POST['concession_type'])) {
			$concession_type = $_POST['concession_type'];
		}
		if (isset($_POST['concessiontypedetails'])) {
			$concessiontypedetails = $_POST['concessiontypedetails'];
		}
		$facility = '';
		if (isset($_POST['facility'])) {
			$facility = $_POST['facility'];
		}
		if (isset($_POST['roomcatogoryfeeid'])) {
			$roomcatogoryfeeid = $_POST['roomcatogoryfeeid'];
		}
		if (isset($_POST['advancefee'])) {
			$advancefee = $_POST['advancefee'];
		}
		if (isset($_POST['roomrent'])) {
			$roomrent = $_POST['roomrent'];
		}
		if (isset($_POST['transportarearefid'])) {
			$transportarearefid = $_POST['transportarearefid'];
		}
		if (isset($_POST['transportstopping'])) {
			$transportstopping = $_POST['transportstopping'];
		}
		if (isset($_POST['busno'])) {
			$busno = $_POST['busno'];
		}
		if (isset($_POST['father_name'])) {
			$father_name = $_POST['father_name'];
		}
		if (isset($_POST['mother_name'])) {
			$mother_name = $_POST['mother_name'];
		}
		if (isset($_POST['father_aadhar_number'])) {
			$father_aadhar_number = $_POST['father_aadhar_number'];
		}
		if (isset($_POST['mother_aadhar_number'])) {
			$mother_aadhar_number = $_POST['mother_aadhar_number'];
		}
		$occupation = '';
		if (isset($_POST['occupation'])) {
			$occupation = $_POST['occupation'];
		}
		if (isset($_POST['monthly_income'])) {
			$monthly_income = $_POST['monthly_income'];
		}
		if (isset($_POST['nature_business'])) {
			$nature_business = $_POST['nature_business'];
		}
		if (isset($_POST['position_held'])) {
			$position_held = $_POST['position_held'];
		}
		if (isset($_POST['telephone_number'])) {
			$telephone_number = $_POST['telephone_number'];
		}
		$lives_gaurdian = '';
		if (isset($_POST['lives_gaurdian'])) {
			$lives_gaurdian = $_POST['lives_gaurdian'];
		}
		if (isset($_POST['gaurdian_name'])) {
			$gaurdian_name = $_POST['gaurdian_name'];
		}
		if (isset($_POST['gaurdian_mobile'])) {
			$gaurdian_mobile = $_POST['gaurdian_mobile'];
		}
		if (isset($_POST['gaurdian_aadhar_number'])) {
			$gaurdian_aadhar_number = $_POST['gaurdian_aadhar_number'];
		}
		if (isset($_POST['gaurdian_email_id'])) {
			$gaurdian_email_id = $_POST['gaurdian_email_id'];
		}
		if (isset($_POST['father_mobile_no'])) {
			$father_mobile_no = $_POST['father_mobile_no'];
		}
		if (isset($_POST['mother_mobile_no'])) {
			$mother_mobile_no = $_POST['mother_mobile_no'];
		}
		if (isset($_POST['father_email_id'])) {
			$father_email_id = $_POST['father_email_id'];
		}
		if (isset($_POST['sms_sent_no'])) {
			$sms_sent_no = $_POST['sms_sent_no'];
		}
		if (isset($_POST['sibling_name'])) {
			$sibling_name = $_POST['sibling_name'];
		}
		if (isset($_POST['sibling_school_name'])) {
			$sibling_school_name = $_POST['sibling_school_name'];
		}
		if (isset($_POST['sibling_standard'])) {
			$sibling_standard = $_POST['sibling_standard'];
		}
		if (isset($_POST['sibling_name2'])) {
			$sibling_name2 = $_POST['sibling_name2'];
		}
		if (isset($_POST['sibling_school_name2'])) {
			$sibling_school_name2 = $_POST['sibling_school_name2'];
		}
		if (isset($_POST['sibling_standard2'])) {
			$sibling_standard2 = $_POST['sibling_standard2'];
		}
		if (isset($_POST['sibling_name3'])) {
			$sibling_name3 = $_POST['sibling_name3'];
		}
		if (isset($_POST['sibling_school_name3'])) {
			$sibling_school_name3 = $_POST['sibling_school_name3'];
		}
		if (isset($_POST['sibling_standard3'])) {
			$sibling_standard3 = $_POST['sibling_standard3'];
		}
		if (isset($_POST['anyextracurricular'])) {
			$anyextracurricular = $_POST['anyextracurricular'];
		}
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}
		if (isset($_POST['title1'])) {
			$title1 = $_POST['title1'];
		}
		if (isset($_POST['title2'])) {
			$title2 = $_POST['title2'];
		}
		if (isset($_POST['title3'])) {
			$title3 = $_POST['title3'];
		}
		if (isset($_POST['title4'])) {
			$title4 = $_POST['title4'];
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['temp_admission_id'])) {
			$temp_admission_id = $_POST['temp_admission_id'];
		}
		$userid = $_SESSION["userid"];
		$certificate = '';
		$subdir = $_POST['admission_number'];
		//set the directory path name
		$dir = ("uploads/certificates/" . $subdir);
		if (!is_dir($dir)) {
			mkdir($dir, 0777, true); // 'true' allows recursive directory creation
		}
		if (!empty($_FILES['certificate']['name'])) {
			$certificate = $_FILES['certificate']['name'];
			$certificate_tmp = $_FILES['certificate']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}
		$certificate1 = '';
		$subdir1 = $_POST['admission_number'];
		//set the directory path name
		$dir1 = ("uploads/certificates/" . $subdir1);
		if (!is_dir($dir1)) {
			mkdir($dir1, 0777, true); // 'true' allows recursive directory creation
		}

		if (!empty($_FILES['certificate1']['name'])) {
			$certificate1 = $_FILES['certificate1']['name'];
			$certificate1_tmp = $_FILES['certificate1']['tmp_name'];
			$certificate1folder = "$dir1/" . $certificate1;
			move_uploaded_file($certificate1_tmp, $certificate1folder);
		}
		$certificate2 = '';
		$subdir2 = $_POST['admission_number'];
		//set the directory path name
		$dir2 = ("uploads/certificates/" . $subdir2);
		if (!is_dir($dir2)) {
			mkdir($dir2, 0777, true); // 'true' allows recursive directory creation
		}
		if (!empty($_FILES['certificate2']['name'])) {
			$certificate2 = $_FILES['certificate2']['name'];
			$certificate2_tmp = $_FILES['certificate2']['tmp_name'];
			$certificate2folder = "$dir2/" . $certificate2;
			move_uploaded_file($certificate2_tmp, $certificate2folder);
		}
		$certificate3 = '';
		$subdir3 = $_POST['admission_number'];
		//set the directory path name
		$dir3 = ("uploads/certificates/" . $subdir3);
		if (!is_dir($dir3)) {
			mkdir($dir3, 0777, true); // 'true' allows recursive directory creation
		}
		//make the directory
		if (!empty($_FILES['certificate3']['name'])) {
			$certificate3 = $_FILES['certificate3']['name'];
			$certificate3_tmp = $_FILES['certificate3']['tmp_name'];
			$certificate3folder = "$dir3/" . $certificate3;
			move_uploaded_file($certificate3_tmp, $certificate3folder);
		}
		$certificate4 = '';
		$subdir4 = $_POST['admission_number'];
		//set the directory path name
		$dir4 = ("uploads/certificates/" . $subdir4);
		if (!is_dir($dir4)) {
			mkdir($dir4, 0777, true); // 'true' allows recursive directory creation
		}
		if (!empty($_FILES['certificate4']['name'])) {
			$certificate4 = $_FILES['certificate4']['name'];
			$certificate4_tmp = $_FILES['certificate4']['tmp_name'];
			$certificate4folder = "$dir4/" . $certificate4;
			move_uploaded_file($certificate4_tmp, $certificate4folder);
		}
		$student_image = '';
		$subdir5 = $_POST['admission_number'];
		//set the directory path name
		$dir5 = ("uploads/student_creation/" . $subdir5);
		//make the directory
		mkdir($dir5, 0777);
		if (!empty($_FILES['student_image']['name'])) {
			$student_image = $_FILES['student_image']['name'];
			$student_image_tmp = $_FILES['student_image']['tmp_name'];
			$student_imagefolder = "$dir5/" . $student_image;
			move_uploaded_file($student_image_tmp, $student_imagefolder);
		}

		$father_image = '';
		$subdir6 = $_POST['admission_number'];
		//set the directory path name
		$dir6 = ("uploads/student_creation/" . $subdir6);
		if (!is_dir($dir6)) {
			mkdir($dir6, 0777, true); // 'true' allows recursive directory creation
		}
		if (!empty($_FILES['father_image']['name'])) {
			$father_image = $_FILES['father_image']['name'];
			$father_image_tmp = $_FILES['father_image']['tmp_name'];
			$father_imagefolder = "$dir6/" . $father_image;
			move_uploaded_file($father_image_tmp, $father_imagefolder);
		}

		$mother_image = '';
		$subdir7 = $_POST['admission_number'];
		//set the directory path name
		$dir7 = ("uploads/student_creation/" . $subdir7);
		//make the directory
		if (!is_dir($dir7)) {
			mkdir($dir7, 0777, true); // 'true' allows recursive directory creation
		}
		if (!empty($_FILES['mother_image']['name'])) {
			$mother_image = $_FILES['mother_image']['name'];
			$mother_image_tmp = $_FILES['mother_image']['tmp_name'];
			$mother_imagefolder = "$dir7/" . $mother_image;
			move_uploaded_file($mother_image_tmp, $mother_imagefolder);
		}
		if (isset($_POST['extra_curricular'])) {
			$extra_curricularstr = $_POST['extra_curricular'];
			$extra_curricular = implode(",", $extra_curricularstr);
		} else {
			$extra_curricular = '';
		}

		$StudentInsert = "INSERT INTO student_creation(temp_admission_id,temp_no, admission_number, student_name, sur_name, date_of_birth, gender, mother_tongue,
			aadhar_number,blood_group, category, castename, sub_caste, nationality, religion, student_image, filltoo, flat_no, flat_no1, street,street1,area_locatlity,
			area_locatlity1,district,district1,pincode, pincode1, standard, previouschoolname, previousplace, strpreviousdoj, strpreviousdol, timeoftchandedover,
			previousclassattended, section, medium, studentrollno, emisno, studentstype, referencecat, refstaffid, refstudentid, 
			refoldstudentid, referencecatname, concession_type, concessiontypedetails, facility, roomcatogoryfeeid, advancefee, roomrent, transportarearefid,
			transportstopping, busno, father_name, mother_name, father_aadhar_number, mother_aadhar_number, occupation, monthly_income, nature_business,
			position_held, telephone_number, lives_gaurdian, gaurdian_name, gaurdian_mobile, gaurdian_aadhar_number, gaurdian_email_id, father_mobile_no, 
			mother_mobile_no, father_email_id, sms_sent_no, sibling_name, sibling_school_name, sibling_standard, sibling_name2, sibling_school_name2, sibling_standard2,
			sibling_name3, sibling_school_name3, sibling_standard3, anyextracurricular, title, certificate, title1, certificate1, title2, certificate2, title3,
			certificate3, title4, certificate4,mother_image, father_image,insert_login_id, extra_curricular,school_id,year_id) 
			VALUES('" . strip_tags($temp_admission_id) . "','" . strip_tags($temp_no) . "','" . strip_tags($admission_number) . "', '" . strip_tags($student_name) . "', '" . strip_tags($sur_name) . "', 
			'" . strip_tags($date_of_birth) . "', '" . strip_tags($gender) . "', '" . strip_tags($mother_tongue) . "','" . strip_tags($aadhar_number) . "','" . strip_tags($blood_group) . "',
			'" . strip_tags($category) . "','" . strip_tags($castename) . "','" . strip_tags($sub_caste) . "','" . strip_tags($nationality) . "','" . strip_tags($religion) . "', '" . strip_tags($student_image) . "',
			'" . strip_tags($filltoo) . "','" . strip_tags($flat_no) . "',	'" . strip_tags($flat_no1) . "','" . strip_tags($street) . "', '" . strip_tags($street1) . "','" . strip_tags($area_locatlity) . "','" . strip_tags($area_locatlity1) . "',
			'" . strip_tags($district) . "','" . strip_tags($district1) . "','" . strip_tags($pincode) . "','" . strip_tags($pincode1) . "','" . strip_tags($standard) . "',
			'" . strip_tags($previouschoolname) . "','" . strip_tags($previousplace) . "','" . strip_tags($strpreviousdoj) . "','" . strip_tags($strpreviousdol) . "','" . strip_tags($timeoftchandedover) . "',
			'" . strip_tags($previousclassattended) . "','" . strip_tags($section) . "','" . strip_tags($medium) . "','" . strip_tags($studentrollno) . "','" . strip_tags($emisno) . "','" . strip_tags($studentstype) . "',
			'" . strip_tags($referencecat) . "',
			'" . strip_tags($refstaffid) . "','" . strip_tags($refstudentid) . "','" . strip_tags($refoldstudentid) . "','" . strip_tags($referencecatname) . "','" . strip_tags($concession_type) . "',
			'" . strip_tags($concessiontypedetails) . "',
			'" . strip_tags($facility) . "','" . strip_tags($roomcatogoryfeeid) . "','" . strip_tags($advancefee) . "', '" . strip_tags($roomrent) . "','" . strip_tags($transportarearefid) . "',
			'" . strip_tags($transportstopping) . "',
			'" . strip_tags($busno) . "','" . strip_tags($father_name) . "','" . strip_tags($mother_name) . "','" . strip_tags($father_aadhar_number) . "','" . strip_tags($mother_aadhar_number) . "',
			'" . strip_tags($occupation) . "',
			'" . strip_tags($monthly_income) . "','" . strip_tags($nature_business) . "','" . strip_tags($position_held) . "','" . strip_tags($telephone_number) . "','" . strip_tags($lives_gaurdian) . "',
			'" . strip_tags($gaurdian_name) . "',
			'" . strip_tags($gaurdian_mobile) . "','" . strip_tags($gaurdian_aadhar_number) . "','" . strip_tags($gaurdian_email_id) . "','" . strip_tags($father_mobile_no) . "','" . strip_tags($mother_mobile_no) . "',
			'" . strip_tags($father_email_id) . "',
			'" . strip_tags($sms_sent_no) . "','" . strip_tags($sibling_name) . "','" . strip_tags($sibling_school_name) . "','" . strip_tags($sibling_standard) . "','" . strip_tags($sibling_name2) . "',
			'" . strip_tags($sibling_school_name2) . "',
			'" . strip_tags($sibling_standard2) . "','" . strip_tags($sibling_name3) . "','" . strip_tags($sibling_school_name3) . "','" . strip_tags($sibling_standard3) . "','" . strip_tags($anyextracurricular) . "',
			'" . strip_tags($title) . "',
			'" . strip_tags($certificate) . "','" . strip_tags($title1) . "','" . strip_tags($certificate1) . "','" . strip_tags($title2) . "','" . strip_tags($certificate2) . "','" . strip_tags($title3) . "',
			'" . strip_tags($certificate3) . "','" . strip_tags($title4) . "','" . strip_tags($certificate4) . "','" . strip_tags($mother_image) . "','" . strip_tags($father_image) . "','" . strip_tags($userid) . "','" . strip_tags($extra_curricular) . "','" . strip_tags($school_id) . "','" . strip_tags($year_id) . "' )";

		$insresult = $mysqli->query($StudentInsert) or die("Error " . $mysqli->error);

		$stdLastInsertId = $mysqli->insert_id;
		$StudentHistoryInsert = "INSERT INTO student_history (`student_id`, `standard`, `section`,`studentstype` ,`extra_curricular`, `transportarearefid`, `academic_year`,`insert_login_id`,`created_on`)VALUES('$stdLastInsertId','" . strip_tags($standard) . "','" . strip_tags($section) . "','" . strip_tags($studentstype) . "','" . strip_tags($extra_curricular) . "','" . strip_tags($transportarearefid) . "','" . strip_tags($year_id) . "','$userid',now())";
		$result = $mysqli->query($StudentHistoryInsert) or die("Error " . $mysqli->error);
		if ($temp_admission_id != '') {
			$selectFeesQry = $mysqli->query("SELECT `id`, `TempAdmissionId` FROM `temp_admission_fees` WHERE `TempAdmissionId` = '$temp_admission_id' ");
			while ($getdetails = $selectFeesQry->fetch_assoc()) {
				$temp_fees_id = $getdetails['id'];

				$mysqli->query("INSERT INTO `admission_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `other_charges`, `other_charges_received`, `scholarship`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `update_login_id`, `created_on`, `updated_on`) SELECT  '$stdLastInsertId', `ReceiptNo`, `ReceiptDate`, `AcademicYear`, `Othercharges`, `OtherChargesReceived`, `Scholarship`, `TotalFeestobeCollected`, `FinalAmounttobeCollect`, `FeesCollected`, `BalancetobePaid`, `school_id`, `insert_login_id`, `update_login_id`, `created_on`, `updated_on` FROM `temp_admission_fees` WHERE `id` = '$temp_fees_id' ") or die("Error ON admission_fees--" . $mysqli->error);
				$admFeesid = $mysqli->insert_id;

				$mysqli->query("INSERT INTO `admission_fees_denomination`( `admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `update_login_id`, `created_on`, `updated_on`) SELECT '$admFeesid', `PaymentMode`, `LedgerRefId`, `No_Fivehundred`, `No_Twohundred`, `No_hundred`, `No_fifty`, `No_twenty`, `No_ten`, `No_five`, `totalamt`, `ChequeNumber`, `ChequeDate`, `ChequeAmt`, `ChequeBankName`, `NeftRefNumber`, `NeftTranDate`, `NeftAmt`, `NeftBankName`, `insert_login_id`, `update_login_id`, `created_on`, `updated_on` FROM `temp_admission_fees_denomination` WHERE `TempAdmFeeRefId` = '$temp_fees_id' ") or die("Error ON admission_fees_denomination--" . $mysqli->error);

				$mysqli->query("INSERT INTO `admission_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) SELECT '$admFeesid', `FeesMasterId`, `FeesTableName`, `FeesId`, `FeeReceived`, `BalancetobePaid`, `Scholarship` FROM `temp_admissionfees_details` WHERE `TempAdmFeeRefId` = '$temp_fees_id' ") or die("Error ON admission_fees_details--" . $mysqli->error);
			}
		}

		//Add referral details
		if ($referencecat != '') {

			$getRefCodeQry = $mysqli->query("SELECT ref_code FROM referral_details WHERE ref_code != '' ORDER BY id DESC LIMIT 1");
			if ($getRefCodeQry->num_rows > 0) {
				$r_no = $getRefCodeQry->fetch_assoc()["ref_code"];
				$refCode = $r_no + 1;
			} else {
				$refCode = "REF1001";
			}

			$ref_student_id = ($refstudentid != '') ? $refstudentid : $refoldstudentid;
			$referred_by_name = ($referred_by != '') ? $referred_by : $referencecatname;
			$mysqli->query("INSERT INTO `referral_details`(`student_id`, `referral_type`, `ref_student_id`, `ref_staff_id`, `referred_by`, `ref_code`, `approved`) VALUES ('$stdLastInsertId','$referencecat','$ref_student_id','$refstaffid','$referred_by_name','$refCode','Pending')");
		}

		return $stdLastInsertId;
	}

	// Get tempStudent
	public function getStudentCreation($mysqli, $id)
	{
		$academic_year = $_SESSION['academic_year'];
		// $tempStudentSelect = "SELECT * FROM student_creation WHERE student_id='$id'"; 
		$tempStudentSelect = "SELECT stdc.*, sc.standard as std_name ,sh.standard as std , sh.academic_year ,sh.extra_curricular as extra_curr,sh.studentstype as sttype FROM student_creation stdc LEFT JOIN student_history sh ON stdc.student_id =sh.student_id JOIN standard_creation sc ON sh.standard = sc.standard_id WHERE stdc.student_id='$id' and sh.academic_year = '$academic_year'";
		$res = $mysqli->query($tempStudentSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['student_id']      = $row->student_id;
			$detailrecords['temp_no']    = $row->temp_no;
			$detailrecords['admission_number']    = $row->admission_number;
			$detailrecords['student_name']        = $row->student_name;
			$detailrecords['sur_name']      = $row->sur_name;
			$detailrecords['date_of_birth']       = $row->date_of_birth;
			$detailrecords['gender']         = $row->gender;
			$detailrecords['mother_tongue']         = $row->mother_tongue;
			$detailrecords['aadhar_number']       = $row->aadhar_number;
			$detailrecords['blood_group']       = $row->blood_group;
			$detailrecords['category']       = $row->category;
			$detailrecords['castename']       = $row->castename;
			$detailrecords['sub_caste']       = $row->sub_caste;
			$detailrecords['nationality']       = $row->nationality;
			$detailrecords['religion']       = $row->religion;
			$detailrecords['student_image']       = $row->student_image;
			$detailrecords['filltoo']       = $row->filltoo;
			$detailrecords['flat_no']       = $row->flat_no;
			$detailrecords['flat_no1']       = $row->flat_no1;
			$detailrecords['street']       = $row->street;
			$detailrecords['street1']       = $row->street1;
			$detailrecords['area_locatlity']       = $row->area_locatlity;
			$detailrecords['area_locatlity1']       = $row->area_locatlity1;
			$detailrecords['district']       = $row->district;
			$detailrecords['district1']       = $row->district1;
			$detailrecords['pincode']       = $row->pincode;
			$detailrecords['pincode1']       = $row->pincode1;
			$detailrecords['standard']       = $row->standard;
			$detailrecords['standard_name']       = $row->std_name;
			$detailrecords['previouschoolname']       = $row->previouschoolname;
			$detailrecords['previousplace']       = $row->previousplace;
			$detailrecords['strpreviousdoj']       = $row->strpreviousdoj;
			$detailrecords['strpreviousdol']       = $row->strpreviousdol;
			$detailrecords['timeoftchandedover']       = $row->timeoftchandedover;
			$detailrecords['previousclassattended']       = $row->previousclassattended;
			$detailrecords['section']       = $row->section;
			$detailrecords['medium']       = $row->medium;
			$detailrecords['studentrollno']       = $row->studentrollno;
			$detailrecords['emisno']       = $row->emisno;
			$detailrecords['studentstype']       = $row->sttype;
			$detailrecords['referencecat']       = $row->referencecat;
			$detailrecords['refstaffid']       = $row->refstaffid;
			$detailrecords['refstudentid']       = $row->refstudentid;
			$detailrecords['refoldstudentid']       = $row->refoldstudentid;
			$detailrecords['referencecatname']       = $row->referencecatname;
			$detailrecords['concession_type']       = $row->concession_type;
			$detailrecords['concessiontypedetails']       = $row->concessiontypedetails;
			$detailrecords['facility']       = $row->facility;
			$detailrecords['roomcatogoryfeeid']       = $row->roomcatogoryfeeid;
			$detailrecords['advancefee']       = $row->advancefee;
			$detailrecords['roomrent']       = $row->roomrent;
			$detailrecords['transportarearefid']       = $row->transportarearefid;
			$detailrecords['transportstopping']       = $row->transportstopping;
			$detailrecords['busno']       = $row->busno;
			$detailrecords['father_name']       = $row->father_name;
			$detailrecords['mother_name']       = $row->mother_name;
			$detailrecords['father_aadhar_number']       = $row->father_aadhar_number;
			$detailrecords['mother_aadhar_number']       = $row->mother_aadhar_number;
			$detailrecords['occupation']       = $row->occupation;
			$detailrecords['monthly_income']       = $row->monthly_income;
			$detailrecords['nature_business']       = $row->nature_business;
			$detailrecords['position_held']       = $row->position_held;
			$detailrecords['telephone_number']       = $row->telephone_number;
			$detailrecords['lives_gaurdian']       = $row->lives_gaurdian;
			$detailrecords['gaurdian_name']       = $row->gaurdian_name;
			$detailrecords['gaurdian_mobile']       = $row->gaurdian_mobile;
			$detailrecords['gaurdian_aadhar_number']       = $row->gaurdian_aadhar_number;
			$detailrecords['gaurdian_email_id']       = $row->gaurdian_email_id;
			$detailrecords['father_mobile_no']       = $row->father_mobile_no;
			$detailrecords['mother_mobile_no']       = $row->mother_mobile_no;
			$detailrecords['father_email_id']       = $row->father_email_id;
			$detailrecords['sms_sent_no']       = $row->sms_sent_no;
			$detailrecords['sibling_name']       = $row->sibling_name;
			$detailrecords['sibling_school_name']       = $row->sibling_school_name;
			$detailrecords['sibling_standard']       = $row->sibling_standard;
			$detailrecords['sibling_name2']       = $row->sibling_name2;
			$detailrecords['sibling_school_name2']       = $row->sibling_school_name2;
			$detailrecords['sibling_standard2']       = $row->sibling_standard2;
			$detailrecords['sibling_name3']       = $row->sibling_name3;
			$detailrecords['sibling_school_name3']       = $row->sibling_school_name3;
			$detailrecords['sibling_standard3']       = $row->sibling_standard3;
			$detailrecords['anyextracurricular']       = $row->anyextracurricular;
			$detailrecords['title']       = $row->title;
			$detailrecords['certificate']       = $row->certificate;
			$detailrecords['title1']       = $row->title1;
			$detailrecords['certificate1']       = $row->certificate1;
			$detailrecords['title2']       = $row->title2;
			$detailrecords['certificate2']       = $row->certificate2;
			$detailrecords['title3']       = $row->title3;
			$detailrecords['certificate3']       = $row->certificate3;
			$detailrecords['title4']       = $row->title4;
			$detailrecords['certificate4']       = $row->certificate4;
			$detailrecords['temp_admission_id']       = $row->temp_admission_id;
			$detailrecords['mother_image']       = $row->mother_image;
			$detailrecords['father_image']       = $row->father_image;
			$detailrecords['extra_curricular']       = $row->extra_curricular;
			$detailrecords['year_id']       = $row->year_id;
			$detailrecords['standards']       = $row->std;
			$detailrecords['academic_year']       = $row->academic_year;
			$detailrecords['extra_curr']       = $row->extra_curr;
		}

		return $detailrecords;
	}

	// Update tempStudent
	public function updateStudentCreation($mysqli, $id, $userid, $school_id, $year_id)
	{
		if (isset($_POST['temp_no'])) {
			$temp_no = $_POST['temp_no'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id= $_POST['school_id'];
		// }
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// }
		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['sur_name'])) {
			$sur_name = $_POST['sur_name'];
		}
		if (isset($_POST['date_of_birth'])) {
			$date_of_birth = $_POST['date_of_birth'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['mother_tongue'])) {
			$mother_tongue = $_POST['mother_tongue'];
		}
		if (isset($_POST['aadhar_number'])) {
			$aadhar_number = $_POST['aadhar_number'];
		}
		if (isset($_POST['blood_group'])) {
			$blood_group = $_POST['blood_group'];
		}
		if (isset($_POST['category'])) {
			$category = $_POST['category'];
		}
		if (isset($_POST['castename'])) {
			$castename = $_POST['castename'];
		}
		if (isset($_POST['sub_caste'])) {
			$sub_caste = $_POST['sub_caste'];
		}
		if (isset($_POST['nationality'])) {
			$nationality = $_POST['nationality'];
		}
		if (isset($_POST['religion'])) {
			$religion = $_POST['religion'];
		}
		$filltoo = '';
		if (isset($_POST['filltoo'])) {
			$filltoo = $_POST['filltoo'];
		}
		if (isset($_POST['flat_no'])) {
			$flat_no = $_POST['flat_no'];
		}
		if (isset($_POST['flat_no1'])) {
			$flat_no1 = $_POST['flat_no1'];
		}
		if (isset($_POST['street'])) {
			$street = $_POST['street'];
		}
		if (isset($_POST['street1'])) {
			$street1 = $_POST['street1'];
		}
		if (isset($_POST['area_locatlity'])) {
			$area_locatlity = $_POST['area_locatlity'];
		}
		if (isset($_POST['area_locatlity1'])) {
			$area_locatlity1 = $_POST['area_locatlity1'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['district1'])) {
			$district1 = $_POST['district1'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['pincode1'])) {
			$pincode1 = $_POST['pincode1'];
		}
		if (isset($_POST['standardEditvalue'])) {
			$standard = $_POST['standardEditvalue'];
		}
		if (isset($_POST['previouschoolname'])) {
			$previouschoolname = $_POST['previouschoolname'];
		}
		if (isset($_POST['previousplace'])) {
			$previousplace = $_POST['previousplace'];
		}
		if (isset($_POST['strpreviousdoj'])) {
			$strpreviousdoj = $_POST['strpreviousdoj'];
		}
		if (isset($_POST['strpreviousdol'])) {
			$strpreviousdol = $_POST['strpreviousdol'];
		}
		if (isset($_POST['timeoftchandedover'])) {
			$timeoftchandedover = $_POST['timeoftchandedover'];
		}
		if (isset($_POST['previousclassattended'])) {
			$previousclassattended = $_POST['previousclassattended'];
		}
		if (isset($_POST['section'])) {
			$section = $_POST['section'];
		}
		if (isset($_POST['medium'])) {
			$medium = $_POST['medium'];
		}
		if (isset($_POST['studentrollno'])) {
			$studentrollno = $_POST['studentrollno'];
		}
		if (isset($_POST['emisno'])) {
			$emisno = $_POST['emisno'];
		}
		if (isset($_POST['studentstype'])) {
			$studentstype = $_POST['studentstype'];
		}
		$referencecat = '';
		if (isset($_POST['referencecat'])) {
			$referencecat = $_POST['referencecat'];
		}
		$refstaffid = '';
		if (isset($_POST['refstaffid'])) {
			$refstaffid = $_POST['refstaffid'];
		}
		$refstudentid = '';
		if (isset($_POST['refstudentid'])) {
			$refstudentid = $_POST['refstudentid'];
		}
		$refoldstudentid = '';
		if (isset($_POST['refoldstudentid'])) {
			$refoldstudentid = $_POST['refoldstudentid'];
		}
		$referencecatname = '';
		if (isset($_POST['referencecatname'])) {
			$referencecatname = $_POST['referencecatname'];
		}
		$referred_by = '';
		if (isset($_POST['referred_by'])) {
			$referred_by = $_POST['referred_by'];
		}
		$concession_type = '';
		if (isset($_POST['concession_type'])) {
			$concession_type = $_POST['concession_type'];
		}
		$concessiontypedetails = '';
		if (isset($_POST['concessiontypedetails'])) {
			$concessiontypedetails = $_POST['concessiontypedetails'];
		}
		$facility = '';
		if (isset($_POST['facility'])) {
			$facility = $_POST['facility'];
		}
		if (isset($_POST['roomcatogoryfeeid'])) {
			$roomcatogoryfeeid = $_POST['roomcatogoryfeeid'];
		}
		if (isset($_POST['advancefee'])) {
			$advancefee = $_POST['advancefee'];
		}
		if (isset($_POST['roomrent'])) {
			$roomrent = $_POST['roomrent'];
		}
		if (isset($_POST['transportarearefid'])) {
			$transportarearefid = $_POST['transportarearefid'];
		}
		if (isset($_POST['transportstopping'])) {
			$transportstopping = $_POST['transportstopping'];
		}
		if (isset($_POST['busno'])) {
			$busno = $_POST['busno'];
		}
		if (isset($_POST['father_name'])) {
			$father_name = $_POST['father_name'];
		}
		if (isset($_POST['mother_name'])) {
			$mother_name = $_POST['mother_name'];
		}
		if (isset($_POST['father_aadhar_number'])) {
			$father_aadhar_number = $_POST['father_aadhar_number'];
		}
		if (isset($_POST['mother_aadhar_number'])) {
			$mother_aadhar_number = $_POST['mother_aadhar_number'];
		}
		$occupation = '';
		if (isset($_POST['occupation'])) {
			$occupation = $_POST['occupation'];
		}
		if (isset($_POST['monthly_income'])) {
			$monthly_income = $_POST['monthly_income'];
		}
		if (isset($_POST['nature_business'])) {
			$nature_business = $_POST['nature_business'];
		}
		if (isset($_POST['position_held'])) {
			$position_held = $_POST['position_held'];
		}
		if (isset($_POST['telephone_number'])) {
			$telephone_number = $_POST['telephone_number'];
		}
		$lives_gaurdian = '';
		if (isset($_POST['lives_gaurdian'])) {
			$lives_gaurdian = $_POST['lives_gaurdian'];
		}
		if (isset($_POST['gaurdian_name'])) {
			$gaurdian_name = $_POST['gaurdian_name'];
		}
		if (isset($_POST['gaurdian_mobile'])) {
			$gaurdian_mobile = $_POST['gaurdian_mobile'];
		}
		if (isset($_POST['gaurdian_aadhar_number'])) {
			$gaurdian_aadhar_number = $_POST['gaurdian_aadhar_number'];
		}
		if (isset($_POST['gaurdian_email_id'])) {
			$gaurdian_email_id = $_POST['gaurdian_email_id'];
		}
		if (isset($_POST['father_mobile_no'])) {
			$father_mobile_no = $_POST['father_mobile_no'];
		}
		if (isset($_POST['mother_mobile_no'])) {
			$mother_mobile_no = $_POST['mother_mobile_no'];
		}
		if (isset($_POST['father_email_id'])) {
			$father_email_id = $_POST['father_email_id'];
		}
		if (isset($_POST['sms_sent_no'])) {
			$sms_sent_no = $_POST['sms_sent_no'];
		}
		if (isset($_POST['sibling_name'])) {
			$sibling_name = $_POST['sibling_name'];
		}
		if (isset($_POST['sibling_school_name'])) {
			$sibling_school_name = $_POST['sibling_school_name'];
		}
		if (isset($_POST['sibling_standard'])) {
			$sibling_standard = $_POST['sibling_standard'];
		}
		if (isset($_POST['sibling_name2'])) {
			$sibling_name2 = $_POST['sibling_name2'];
		}
		if (isset($_POST['sibling_school_name2'])) {
			$sibling_school_name2 = $_POST['sibling_school_name2'];
		}
		if (isset($_POST['sibling_standard2'])) {
			$sibling_standard2 = $_POST['sibling_standard2'];
		}
		if (isset($_POST['sibling_name3'])) {
			$sibling_name3 = $_POST['sibling_name3'];
		}
		if (isset($_POST['sibling_school_name3'])) {
			$sibling_school_name3 = $_POST['sibling_school_name3'];
		}
		if (isset($_POST['sibling_standard3'])) {
			$sibling_standard3 = $_POST['sibling_standard3'];
		}
		if (isset($_POST['anyextracurricular'])) {
			$anyextracurricular = $_POST['anyextracurricular'];
		}
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}
		if (isset($_POST['title1'])) {
			$title1 = $_POST['title1'];
		}
		if (isset($_POST['title2'])) {
			$title2 = $_POST['title2'];
		}
		if (isset($_POST['title3'])) {
			$title3 = $_POST['title3'];
		}
		if (isset($_POST['title4'])) {
			$title4 = $_POST['title4'];
		}
		if (isset($_POST['temp_admission_id'])) {
			$temp_admission_id = $_POST['temp_admission_id'];
		}

		$student_image = '';
		if (!empty($_FILES['student_image']['name'])) {
			//delete old file
			$path = "uploads/student_creation/$admission_number/" . $_POST["updateimage"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$student_image = $_FILES['student_image']['name'];
			$student_image_tmp = $_FILES['student_image']['tmp_name'];
			$student_imagefolder = "uploads/student_creation/$admission_number/" . $student_image;
			move_uploaded_file($student_image_tmp, $student_imagefolder);
		}
		// if($father_image == '' && isset($_POST["updateimage"])){
		//     $father_image = $_POST["updateimage"];
		// }

		$father_image = '';
		if (!empty($_FILES['father_image']['name'])) {
			//delete old file
			$path = "uploads/student_creation/$admission_number/" . $_POST["updatefatherimage"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$father_image = $_FILES['father_image']['name'];
			$father_image_tmp = $_FILES['father_image']['tmp_name'];
			$father_imagefolder = "uploads/student_creation/$admission_number/" . $father_image;
			move_uploaded_file($father_image_tmp, $father_imagefolder);
		}
		if ($father_image == '' && isset($_POST["updatefatherimage"])) {
			$father_image = $_POST["updatefatherimage"];
		}

		$mother_image = '';
		if (!empty($_FILES['mother_image']['name'])) {
			//delete old file
			$path = "uploads/student_creation/$admission_number/" . $_POST["updatemotherimage"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$mother_image = $_FILES['mother_image']['name'];
			$mother_image_tmp = $_FILES['mother_image']['tmp_name'];
			$mother_imagefolder = "uploads/student_creation/$admission_number/" . $mother_image;
			move_uploaded_file($mother_image_tmp, $mother_imagefolder);
		}
		if ($mother_image == '' && isset($_POST["updatemotherimage"])) {
			$mother_image = $_POST["updatemotherimage"];
		}

		$certificate = '';
		if (!empty($_FILES['certificate']['name'])) {
			// delete old file
			$path = "uploads/certificates/$admission_number/" . $_POST["updatecertificate"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate = $_FILES['certificate']['name'];
			$certificate_tmp = $_FILES['certificate']['tmp_name'];
			$certificatefolder = "uploads/certificates/$admission_number/" . $certificate;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}
		if ($certificate == '' && isset($_POST["updatecertificate"])) {
			$certificate = $_POST["updatecertificate"];
		}

		$certificate1 = '';
		if (!empty($_FILES['certificate1']['name'])) {
			//delete old file
			$path = "uploads/certificates/$admission_number/" . $_POST["updatecertificate1"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate1 = $_FILES['certificate1']['name'];
			$certificate1_tmp = $_FILES['certificate1']['tmp_name'];
			$certificate1folder = "uploads/certificates/$admission_number/" . $certificate1;
			move_uploaded_file($certificate1_tmp, $certificate1folder);
		}
		if ($certificate1 == '' && isset($_POST["updatecertificate1"])) {
			$certificate1 = $_POST["updatecertificate1"];
		}

		$certificate2 = '';
		if (!empty($_FILES['certificate2']['name'])) {
			//delete old file
			$path = "uploads/certificates/$admission_number/" . $_POST["updatecertificate2"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate2 = $_FILES['certificate2']['name'];
			$certificate2_tmp = $_FILES['certificate2']['tmp_name'];
			$certificate2folder = "uploads/certificates/$admission_number/" . $certificate2;
			move_uploaded_file($certificate2_tmp, $certificate2folder);
		}
		if ($certificate2 == '' && isset($_POST["updatecertificate2"])) {
			$certificate2 = $_POST["updatecertificate2"];
		}

		$certificate3 = '';
		if (!empty($_FILES['certificate3']['name'])) {
			//delete old file
			$path = "uploads/certificates/$admission_number/" . $_POST["updatecertificate3"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate3 = $_FILES['certificate3']['name'];
			$certificate3_tmp = $_FILES['certificate3']['tmp_name'];
			$certificate3folder = "uploads/certificates/$admission_number/" . $certificate3;
			move_uploaded_file($certificate3_tmp, $certificate3folder);
		}
		if ($certificate3 == '' && isset($_POST["updatecertificate3"])) {
			$certificate3 = $_POST["updatecertificate3"];
		}

		$certificate4 = '';
		if (!empty($_FILES['certificate4']['name'])) {
			//delete old file
			$path = "uploads/certificates/$admission_number/" . $_POST["updatecertificate4"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate4 = $_FILES['certificate4']['name'];
			$certificate4_tmp = $_FILES['certificate4']['tmp_name'];
			$certificate4folder = "uploads/certificates/$admission_number/" . $certificate4;
			move_uploaded_file($certificate4_tmp, $certificate4folder);
		}

		if ($certificate4 == '' && isset($_POST["updatecertificate4"])) {
			$certificate4 = $_POST["updatecertificate4"];
		}
		$extra_curricularstr = '';
		if (isset($_POST['extra_curricular'])) {

			$extra_curricular = $_POST['extra_curricular'];
			$extra_curricularstr = implode(",", $extra_curricular);
		}
		$academic_year = $_SESSION['academic_year'];

		$tempStudentUpdaet = "UPDATE student_creation SET temp_admission_id = '" . strip_tags($temp_admission_id) . "', temp_no = '" . strip_tags($temp_no) . "', admission_number='" . strip_tags($admission_number) . "', 
			student_name='" . strip_tags($student_name) . "', sur_name='" . strip_tags($sur_name) . "', date_of_birth='" . strip_tags($date_of_birth) . "', 
			gender='" . strip_tags($gender) . "', mother_tongue='" . strip_tags($mother_tongue) . "', aadhar_number='" . strip_tags($aadhar_number) . "',blood_group='" . strip_tags($blood_group) . "',
			category='" . strip_tags($category) . "',castename='" . strip_tags($castename) . "',sub_caste='" . strip_tags($sub_caste) . "',nationality='" . strip_tags($nationality) . "',
			religion='" . strip_tags($religion) . "',student_image='" . strip_tags($student_image) . "',filltoo='" . strip_tags($filltoo) . "',flat_no='" . strip_tags($flat_no) . "',flat_no1='" . strip_tags($flat_no1) . "',street = '" . strip_tags($street) . "',street1 ='" . strip_tags($street1) . "',
			area_locatlity ='" . strip_tags($area_locatlity) . "', area_locatlity1 = '" . strip_tags($area_locatlity1) . "' ,district ='" . strip_tags($district) . "',district1 = '" . strip_tags($district1) . "',pincode = '" . strip_tags($pincode) . "',
			pincode1 = '" . strip_tags($pincode1) . "', standard ='" . strip_tags($standard) . "' , previouschoolname='" . strip_tags($previouschoolname) . "',previousplace='" . strip_tags($previousplace) . "',
			strpreviousdoj	='" . strip_tags($strpreviousdoj) . "',strpreviousdol='" . strip_tags($strpreviousdol) . "',timeoftchandedover='" . strip_tags($timeoftchandedover) . "',
			previousclassattended='" . strip_tags($previousclassattended) . "',section='" . strip_tags($section) . "',
			studentrollno='" . strip_tags($studentrollno) . "',emisno='" . strip_tags($emisno) . "',studentstype='" . strip_tags($studentstype) . "',
			referencecat='" . strip_tags($referencecat) . "',refstaffid='" . strip_tags($refstaffid) . "',refstudentid='" . strip_tags($refstudentid) . "',
			refoldstudentid='" . strip_tags($refoldstudentid) . "',referencecatname='" . strip_tags($referencecatname) . "',concession_type='" . strip_tags($concession_type) . "',
			concessiontypedetails='" . strip_tags($concessiontypedetails) . "',facility='" . strip_tags($facility) . "',roomcatogoryfeeid='" . strip_tags($roomcatogoryfeeid) . "',
			advancefee='" . strip_tags($advancefee) . "',roomrent='" . strip_tags($roomrent) . "',transportarearefid='" . strip_tags($transportarearefid) . "',
			transportstopping='" . strip_tags($transportstopping) . "',busno='" . strip_tags($busno) . "',father_name='" . strip_tags($father_name) . "',
			mother_name='" . strip_tags($mother_name) . "',father_aadhar_number='" . strip_tags($father_aadhar_number) . "',mother_aadhar_number='" . strip_tags($mother_aadhar_number) . "',
			occupation='" . strip_tags($occupation) . "',monthly_income='" . strip_tags($monthly_income) . "',nature_business='" . strip_tags($nature_business) . "',
			position_held='" . strip_tags($position_held) . "',telephone_number='" . strip_tags($telephone_number) . "',lives_gaurdian='" . strip_tags($lives_gaurdian) . "',
			gaurdian_name='" . strip_tags($gaurdian_name) . "',gaurdian_mobile='" . strip_tags($gaurdian_mobile) . "',gaurdian_aadhar_number='" . strip_tags($gaurdian_aadhar_number) . "',
			gaurdian_email_id='" . strip_tags($gaurdian_email_id) . "',father_mobile_no='" . strip_tags($father_mobile_no) . "',mother_mobile_no='" . strip_tags($mother_mobile_no) . "',
			mother_mobile_no='" . strip_tags($mother_mobile_no) . "',sms_sent_no='" . strip_tags($sms_sent_no) . "',sibling_name='" . strip_tags($sibling_name) . "',
			sibling_school_name='" . strip_tags($sibling_school_name) . "',sibling_standard='" . strip_tags($sibling_standard) . "',sibling_name2='" . strip_tags($sibling_name2) . "',
			sibling_school_name2='" . strip_tags($sibling_school_name2) . "',sibling_standard2='" . strip_tags($sibling_standard2) . "',sibling_name3='" . strip_tags($sibling_name3) . "',
			sibling_school_name3='" . strip_tags($sibling_school_name3) . "',sibling_standard3='" . strip_tags($sibling_standard3) . "',anyextracurricular='" . strip_tags($anyextracurricular) . "',
			title='" . strip_tags($title) . "',certificate='" . strip_tags($certificate) . "',title1='" . strip_tags($title1) . "',
			certificate1='" . strip_tags($certificate1) . "',title2='" . strip_tags($title2) . "',certificate2='" . strip_tags($certificate2) . "',
			title3='" . strip_tags($title3) . "',certificate3='" . strip_tags($certificate3) . "',title4='" . strip_tags($title4) . "',
			certificate4='" . strip_tags($certificate4) . "', mother_image='" . strip_tags($mother_image) . "', medium='" . strip_tags($medium) . "',father_image='" . strip_tags($father_image) . "', extra_curricular='" . strip_tags($extra_curricularstr) . "', update_login_id='" . strip_tags($userid) . "', status = '0' WHERE student_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($tempStudentUpdaet) or die("Error in in update Query!." . $mysqli->error);

		$history_update = "UPDATE `student_history` SET `standard`='" . strip_tags($standard) . "' ,`section`='" . strip_tags($section) . "',`studentstype`='" . strip_tags($studentstype) . "',`extra_curricular`= '" . strip_tags($extra_curricularstr) . "',`transportarearefid`= '" . strip_tags($transportarearefid) . "' WHERE student_id= '" . strip_tags($id) . "' and academic_year = '$academic_year'";
		$hisupdresult = $mysqli->query($history_update) or die("Error in in update Query!." . $mysqli->error);
		//Add referral details
		if ($referencecat != '') {
			$ref_student_id = ($refstudentid != '') ? $refstudentid : $refoldstudentid;
			$referred_by_name = ($referred_by != '') ? $referred_by : $referencecatname;
			$mysqli->query("UPDATE `referral_details` SET `referral_type`='$referencecat',`ref_student_id`='$ref_student_id',`ref_staff_id`='$refstaffid',`referred_by`='$referred_by_name',`approved`='Pending' WHERE `student_id`='$id'");
		}
	}

	//  Delete tempStudent
	public function deleteStudentCreation($mysqli, $id, $userid)
	{
		$date  = date('Y-m-d');
		$tempStudentDelete = "UPDATE student_creation set status='1', deleted_student = '1', delete_login_id='" . strip_tags($userid) . "' WHERE student_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($tempStudentDelete) or die("Error in delete query" . $mysqli->error);
	}


	// // Get Subject Details
	public function getSubjectDetails($mysqli)
	{

		$holidaySelect = "SELECT * FROM subject_details  "; //WHERE subject_id='".$mysqli."'
		$res = $mysqli->query($holidaySelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['subject_id']      = $row->subject_id;
			$detailrecords['paper_name']    = $row->paper_name;
			$detailrecords['max_mark']    = $row->max_mark;
			$detailrecords['class_id']        = $row->class_id;
		}

		return $detailrecords;
	}


	// Add Trust creation
	public function addTrustCreation($mysqli, $userid, $school_id, $academic_year)
	{

		if (isset($_POST['trust_name'])) {
			$trust_name = $_POST['trust_name'];
		}
		if (isset($_POST['contact_person'])) {
			$contact_person = $_POST['contact_person'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['address1'])) {
			$address1 = $_POST['address1'];
		}
		if (isset($_POST['address2'])) {
			$address2 = $_POST['address2'];
		}
		if (isset($_POST['address3'])) {
			$address3 = $_POST['address3'];
		}
		if (isset($_POST['place'])) {
			$place = $_POST['place'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['website'])) {
			$website = $_POST['website'];
		}
		if (isset($_POST['pan_number'])) {
			$pan_number = $_POST['pan_number'];
		}
		if (isset($_POST['tan_number'])) {
			$tan_number = $_POST['tan_number'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['school_id'])) {
			$school_id = $_POST['school_id'];
		}

		$trust_logo = '';
		if (!empty($_FILES['trust_logo']['name'])) {
			$trust_logo = $_FILES['trust_logo']['name'];
			$trust_logo_tmp = $_FILES['trust_logo']['tmp_name'];
			$trust_logofolder = "uploads/trust_creation/" . $trust_logo;
			move_uploaded_file($trust_logo_tmp, $trust_logofolder);
		}

		$inserttrustQry = "INSERT INTO trust_creation(trust_name, contact_person, contact_number, address1, address2, address3, place, pincode, email_id, pan_number, 
	tan_number, website,trust_logo, insert_login_id,school_id,academic_year) 
	VALUES('" . strip_tags($trust_name) . "', '" . strip_tags($contact_person) . "', '" . strip_tags($contact_number) . "', '" . strip_tags($address1) . "', 
	'" . strip_tags($address2) . "', '" . strip_tags($address3) . "', '" . strip_tags($place) . "', '" . strip_tags($pincode) . "', '" . strip_tags($email_id) . "', 
	'" . strip_tags($pan_number) . "', '" . strip_tags($tan_number) . "', '" . strip_tags($website) . "','" . strip_tags($trust_logo) . "','" . strip_tags($userid) . "','" . strip_tags($school_id) . "','" . strip_tags($academic_year) . "')";



		$inserttrust = $mysqli->query($inserttrustQry);
		$trustId = $mysqli->insert_id;

		return true;
	}

	// get Trust Creation
	public function getTrustCreation($mysqli, $id)
	{

		$selectTrustCreation = "SELECT * FROM trust_creation WHERE trust_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($selectTrustCreation) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['trust_id']      = $row->trust_id;
			$detailrecords['userid'] 		= $row->userid;
			$detailrecords['trust_name']    = $row->trust_name;
			$detailrecords['contact_person']    = $row->contact_person;
			$detailrecords['contact_number']      = $row->contact_number;
			$detailrecords['address1']      = $row->address1;
			$detailrecords['address2']       = $row->address2;
			$detailrecords['address3']         = $row->address3;
			$detailrecords['place']       = $row->place;
			$detailrecords['pincode']       = $row->pincode;
			$detailrecords['email_id'] = $row->email_id;
			$detailrecords['website']        = $row->website;
			$detailrecords['pan_number']     = $row->pan_number;
			$detailrecords['tan_number']     = $row->tan_number;
			$detailrecords['trust_logo']     = $row->trust_logo;
		}

		return $detailrecords;
	}

	// update trust
	public function updateTrustCreation($mysqli, $id, $userid, $academic_year)
	{

		$checkinsertedTrustQry = $mysqli->query("SELECT * FROM trust_creation WHERE status ='0' ");
		// if ($mysqli->affected_rows == '0') { //to check already a trust is active or not because creation access to create one trust. 

		if (isset($_POST['trust_name'])) {
			$trust_name = $_POST['trust_name'];
		}
		if (isset($_POST['contact_person'])) {
			$contact_person = $_POST['contact_person'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['address1'])) {
			$address1 = $_POST['address1'];
		}
		if (isset($_POST['address2'])) {
			$address2 = $_POST['address2'];
		}
		if (isset($_POST['address3'])) {
			$address3 = $_POST['address3'];
		}
		if (isset($_POST['place'])) {
			$place = $_POST['place'];
		}
		if (isset($_POST['pincode'])) {
			$pincode = $_POST['pincode'];
		}
		if (isset($_POST['email_id'])) {
			$email_id = $_POST['email_id'];
		}
		if (isset($_POST['website'])) {
			$website = $_POST['website'];
		}
		if (isset($_POST['pan_number'])) {
			$pan_number = $_POST['pan_number'];
		}
		if (isset($_POST['tan_number'])) {
			$tan_number = $_POST['tan_number'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		$trust_logo = '';
		if (!empty($_FILES['trust_logo']['name'])) {
			$trust_logo = $_FILES['trust_logo']['name'];
			$trust_logo_tmp = $_FILES['trust_logo']['tmp_name'];
			$trust_logofolder = "uploads/trust_creation/" . $trust_logo;
			move_uploaded_file($trust_logo_tmp, $trust_logofolder);
		}
		if ($trust_logo == '' && isset($_POST["updateimage"])) {
			$trust_logo = $_POST["updateimage"];
		}
		$updateTrustCreationQry = "UPDATE trust_creation SET trust_name = '" . strip_tags($trust_name) . "', contact_person='" . strip_tags($contact_person) . "', contact_number='" . strip_tags($contact_number) . "', address1='" . strip_tags($address1) . "', address2='" . strip_tags($address2) . "', address3='" . strip_tags($address3) . "', place='" . strip_tags($place) . "', 
		pincode='" . strip_tags($pincode) . "', email_id='" . strip_tags($email_id) . "', website='" . strip_tags($website) . "', pan_number='" . strip_tags($pan_number) . "', 
		tan_number='" . strip_tags($tan_number) . "', update_login_id='" . strip_tags($userid) . "', trust_logo='" . strip_tags($trust_logo) . "',academic_year='" . strip_tags($academic_year) . "', status = '0' 
		WHERE trust_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($updateTrustCreationQry) or die("Error in in update Query!." . $mysqli->error);
		// }
	}


	//  delete Bidder
	public function deleteTrustCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$deleteTrustCreation = "UPDATE trust_creation set status='1', delete_login_id='" . strip_tags($userid) . "'  WHERE trust_id = '" . strip_tags($id) . "'  ";
		$runQry = $mysqli->query($deleteTrustCreation) or die("Error in delete query" . $mysqli->error);
	}

	// get course category
	public function getReason($mysqli)
	{

		$qry = "SELECT * FROM student_creation WHERE 1 AND status=0 AND deleted_student = 0  ORDER BY student_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['student_id']            = $row->student_id;
				$detailrecords[$i]['reason']       	= strip_tags($row->reason);
				$i++;
			}
		}
		return $detailrecords;
	}

	// Get Fees Master Details
	public function getFeesMasterModel1Details($mysqli)
	{
		if (isset($_SESSION['school_id'])) {
			$school_id = $_SESSION['school_id'];
		}
		$feesSelect = "SELECT * FROM fees_master WHERE school_id ='$school_id'";
		$res = $mysqli->query($feesSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['fees_id']      = $row->fees_id;
			$detailrecords['academic_year']    = $row->academic_year;
			$detailrecords['medium']    = $row->medium;
			$detailrecords['student_type']        = $row->student_type;
			$detailrecords['standard']        = $row->standard;
			$detailrecords['grp_particulars']        = $row->grp_particulars;
			$detailrecords['grp_amount']        = $row->grp_amount;
			$detailrecords['grp_date']        = $row->grp_date;
			$detailrecords['extra_particulars']        = $row->extra_particulars;
			$detailrecords['extra_amount']        = $row->extra_amount;
			$detailrecords['extra_date']        = $row->extra_date;
			$detailrecords['amenity_particulars']        = $row->amenity_particulars;
			$detailrecords['amenity_amount']        = $row->amenity_amount;
			$detailrecords['amenity_date']        = $row->amenity_date;
			$detailrecords['temp_flat_no']        = $row->temp_flat_no;
			$detailrecords['temp_street']        = $row->temp_street;
			$detailrecords['temp_district']        = $row->temp_district;
			$detailrecords['temp_area']        = $row->temp_area;
		}

		return $detailrecords;
	}

	// Add Area creation
	public function addAreaCreation($mysqli, $userid, $school_id, $log_year)
	{

		if (isset($_POST['area_name'])) {
			$area_name = $_POST['area_name'];
		}
		if (isset($_POST['no_of_terms'])) {
			$no_of_terms = $_POST['no_of_terms'];
		}
		if (isset($_POST['transport_amount'])) {
			$transport_amount = $_POST['transport_amount'];
		}

		if (isset($_POST['item_details'])) {
			$item_detailsstr = $_POST['item_details'];
		}
		if (isset($_POST['due_amount'])) {
			$due_amountstr = $_POST['due_amount'];
		}
		if (isset($_POST['due_date'])) {
			$due_datestr = $_POST['due_date'];
		}

		$inserttrustQry = "INSERT INTO area_creation(area_name, no_of_terms, transport_amount, school_id, year_id, insert_login_id ) 
			VALUES('" . strip_tags($area_name) . "', '" . strip_tags($no_of_terms) . "', '" . strip_tags($transport_amount) . "', '" . strip_tags($school_id) . "', '" . strip_tags($log_year) . "', '" . strip_tags($userid) . "')";
		$inserttrust = $mysqli->query($inserttrustQry);

		$last_id = $mysqli->insert_id;

		for ($i = 0; $i < $no_of_terms; $i++) {
			$insertacp = $mysqli->query("INSERT INTO `area_creation_particulars`( `area_creation_id`, `particulars`, `due_amount`, `due_date`) VALUES ('$last_id','$item_detailsstr[$i]','$due_amountstr[$i]','$due_datestr[$i]')");
		}

		return true;
	}

	// get Area Creation
	public function getAreaCreation($mysqli, $id, $school_id, $academic_year)
	{

		$selectAreaCreation = "SELECT ac.area_id, ac.area_name, ac.no_of_terms, ac.transport_amount, acp.particulars, acp.due_amount, acp.due_date, acp.particulars_id  FROM area_creation ac JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id WHERE ac.area_id='$id' AND ac.school_id='$school_id' AND ac.year_id='$academic_year' ";
		$res = $mysqli->query($selectAreaCreation) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$i = 0;
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['area_id']      = $row->area_id;
				$detailrecords[$i]['area_name']    = $row->area_name;
				$detailrecords[$i]['no_of_terms']    = $row->no_of_terms;
				$detailrecords[$i]['transport_amount']      = $row->transport_amount;
				$detailrecords[$i]['particulars']      = $row->particulars;
				$detailrecords[$i]['due_amount']       = $row->due_amount;
				$detailrecords[$i]['due_date']         = $row->due_date;
				$i++;
			}
		}

		return $detailrecords;
	}

	// Update Area Creation
	public function updateAreaCreation($mysqli, $id, $userid, $school_id, $log_year)
	{
		date_default_timezone_set('Asia/Calcutta');
		$current_date = date('Y-m-d');

		if (isset($_POST['area_name'])) {
			$area_name = $_POST['area_name'];
		}
		if (isset($_POST['no_of_terms'])) {
			$no_of_terms = $_POST['no_of_terms'];
		}
		if (isset($_POST['transport_amount'])) {
			$transport_amount = $_POST['transport_amount'];
		}

		if (isset($_POST['item_details'])) {
			$item_detailsstr = $_POST['item_details'];
		}
		if (isset($_POST['due_amount'])) {
			$due_amountstr = $_POST['due_amount'];
		}
		if (isset($_POST['due_date'])) {
			$due_datestr = $_POST['due_date'];
		}

		$updateAreaCreation = "UPDATE area_creation SET area_name = '" . strip_tags($area_name) . "', no_of_terms = '" . strip_tags($no_of_terms) . "', transport_amount = '" . strip_tags($transport_amount) . "', status = '0', school_id='" . strip_tags($school_id) . "', year_id='" . strip_tags($log_year) . "', update_login_id='" . strip_tags($userid) . "', updated_date = '$current_date' WHERE area_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($updateAreaCreation) or die("Error in in update Query!." . $mysqli->error);

		$deleteacp = $mysqli->query("DELETE FROM `area_creation_particulars` WHERE `area_creation_id` = '$id' ");

		for ($i = 0; $i < $no_of_terms; $i++) {
			$insertacp = $mysqli->query("INSERT INTO `area_creation_particulars`( `area_creation_id`, `particulars`, `due_amount`, `due_date`) VALUES ('$id','$item_detailsstr[$i]','$due_amountstr[$i]','$due_datestr[$i]')");
		}
	}

	//  Delete Area Creation
	public function deleteAreaCreation($mysqli, $id, $userid)
	{

		$deleteAreaCreation = "UPDATE area_creation set status='1', delete_login_id='" . strip_tags($userid) . "'  WHERE area_id = '" . strip_tags($id) . "'  ";
		$runQry = $mysqli->query($deleteAreaCreation) or die("Error in delete query" . $mysqli->error);
	}
	// get Group Classification
	public function getGrpClassification($mysqli)
	{

		$qry = "SELECT * FROM grp_classification WHERE 1 AND status=0 ORDER BY grp_classification_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['grp_classification_id']            = $row->grp_classification_id;
				$detailrecords[$i]['grp_classification_name']       	= strip_tags($row->grp_classification_name);
				$i++;
			}
		}
		return $detailrecords;
	}

	// Add Item creation
	public function addItemCreation($mysqli, $userid)
	{

		if (isset($_POST['grp_classification'])) {
			$grp_classification = $_POST['grp_classification'];
		}
		if (isset($_POST['item_code'])) {
			$item_code = $_POST['item_code'];
		}
		if (isset($_POST['description'])) {
			$description = $_POST['description'];
		}
		if (isset($_POST['uom'])) {
			$uom = $_POST['uom'];
		}
		if (isset($_POST['quantity'])) {
			$quantity = $_POST['quantity'];
		}
		if (isset($_POST['rate'])) {
			$rate = $_POST['rate'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}
		if (isset($_POST['invoice_ref'])) {
			$invoice_ref = $_POST['invoice_ref'];
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}


		$inserttrustQry = "INSERT INTO item_creation(grp_classification, uom, quantity, item_code, description, rate, result, invoice_ref, insert_login_id) 
			VALUES('" . strip_tags($grp_classification) . "', '" . strip_tags($uom) . "', '" . strip_tags($quantity) . "', '" . strip_tags($item_code) . "', 
			'" . strip_tags($description) . "', '" . strip_tags($rate) . "','" . strip_tags($result) . "','" . strip_tags($invoice_ref) . "','" . strip_tags($userid) . "')";
		$inserttrust = $mysqli->query($inserttrustQry);

		return true;
	}

	// get Area Creation
	public function getItemCreation($mysqli, $id)
	{

		$selectItemCreation = "SELECT * FROM item_creation WHERE item_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($selectItemCreation) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['item_id']      = $row->item_id;
			$detailrecords['grp_classification']    = $row->grp_classification;
			$detailrecords['uom']    = $row->uom;
			$detailrecords['quantity']      = $row->quantity;
			$detailrecords['item_code']      = $row->item_code;
			$detailrecords['description']       = $row->description;
			$detailrecords['rate']         = $row->rate;
			$detailrecords['result']         = $row->result;
			$detailrecords['invoice_ref']         = $row->invoice_ref;
		}

		return $detailrecords;
	}

	// Update Area Creation
	public function updateItemCreation($mysqli, $id, $userid)
	{

		if (isset($_POST['grp_classification'])) {
			$grp_classification = $_POST['grp_classification'];
		}
		if (isset($_POST['item_code'])) {
			$item_code = $_POST['item_code'];
		}
		if (isset($_POST['description'])) {
			$description = $_POST['description'];
		}
		if (isset($_POST['uom'])) {
			$uom = $_POST['uom'];
		}
		if (isset($_POST['quantity'])) {
			$quantity = $_POST['quantity'];
		}
		if (isset($_POST['rate'])) {
			$rate = $_POST['rate'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}
		if (isset($_POST['invoice_ref'])) {
			$invoice_ref = $_POST['invoice_ref'];
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		$updateItemCreation = "UPDATE item_creation SET grp_classification = '" . strip_tags($grp_classification) . "', uom='" . strip_tags($uom) . "', quantity='" . strip_tags($quantity) . "', item_code='" . strip_tags($item_code) . "', 
			description='" . strip_tags($description) . "', rate='" . strip_tags($rate) . "', result='" . strip_tags($result) . "', invoice_ref='" . strip_tags($invoice_ref) . "', update_login_id='" . strip_tags($userid) . "', 	status = '0' 
			WHERE item_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($updateItemCreation) or die("Error in in update Query!." . $mysqli->error);
	}


	//  Delete Area Creation
	public function deleteItemCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$deleteItemCreation = "UPDATE item_creation set status='1', delete_login_id='" . strip_tags($userid) . "'  WHERE item_id = '" . strip_tags($id) . "'  ";
		$runQry = $mysqli->query($deleteItemCreation) or die("Error in delete query" . $mysqli->error);
	}



	// Add Staff
	public function addStaffCreation($mysqli, $userid, $school_id, $year_id)
	{

		if (isset($_POST['staff_first_name'])) {
			$staff_first_name = $_POST['staff_first_name'];
		}
		if (isset($_POST['staff_last_name'])) {
			$staff_last_name = $_POST['staff_last_name'];
		}
		if (isset($_POST['employee_no'])) {
			$employee_no = $_POST['employee_no'];
		}
		if (isset($_POST['staff_designation'])) {
			$staff_designation = $_POST['staff_designation'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['blood_group'])) {
			$blood_group = $_POST['blood_group'];
		}
		if (isset($_POST['qualification'])) {
			$qualification = $_POST['qualification'];
		}
		if (isset($_POST['staff_pan'])) {
			$staff_pan = $_POST['staff_pan'];
		}
		if (isset($_POST['aadhar_number'])) {
			$aadhar_number = $_POST['aadhar_number'];
		}
		if (isset($_POST['pf_acc_no'])) {
			$pf_acc_no = $_POST['pf_acc_no'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['staff_doj'])) {
			$staff_doj = $_POST['staff_doj'];
		}
		if (isset($_POST['appointment_lt'])) {
			$appointment_lt = $_POST['appointment_lt'];
		}
		if (isset($_POST['emg_contact_person'])) {
			$emg_contact_person = $_POST['emg_contact_person'];
		}
		if (isset($_POST['emg_contact_no'])) {
			$emg_contact_no = $_POST['emg_contact_no'];
		}
		if (isset($_POST['transport_details'])) {
			$transport_details = $_POST['transport_details'];
		}
		if (isset($_POST['flat_no'])) {
			$flat_no = $_POST['flat_no'];
		}
		if (isset($_POST['bank_name'])) {
			$bank_name = $_POST['bank_name'];
		}
		if (isset($_POST['street'])) {
			$street = $_POST['street'];
		}
		if (isset($_POST['bank_acc_no'])) {
			$bank_acc_no = $_POST['bank_acc_no'];
		}
		if (isset($_POST['area'])) {
			$area = $_POST['area'];
		}
		if (isset($_POST['branch'])) {
			$branch = $_POST['branch'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['ifsc_code'])) {
			$ifsc_code = $_POST['ifsc_code'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id = $_POST['school_id'];
		// }
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// }
		if (isset($_POST['area_name'])) {
			$area_name = $_POST['area_name'];
		}

		//set the directory path name
		$staffdir = ("uploads/staff_creation/staffImages/" . $employee_no);
		//make the directory
		mkdir($staffdir, 0777);

		if (!empty($_FILES['staff_image']['name'])) {
			$staff_image = $_FILES['staff_image']['name'];
			$pic_temp = $_FILES['staff_image']['tmp_name'];
			$imgfolder = "$staffdir/" . $staff_image;
			move_uploaded_file($pic_temp, $imgfolder);
		}

		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}

		$certificate = '';
		//set the directory path name
		$dir = ("uploads/staff_creation/certificates/" . $employee_no);
		//make the directory
		mkdir($dir, 0777);
		if (!empty($_FILES['certificate']['name'])) {
			$certificate = $_FILES['certificate']['name'];
			$certificate_tmp = $_FILES['certificate']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}

		if (isset($_POST['title1'])) {
			$title1 = $_POST['title1'];
		}

		$certificate1 = '';
		if (!empty($_FILES['certificate1']['name'])) {
			$certificate1 = $_FILES['certificate1']['name'];
			$certificate_tmp = $_FILES['certificate1']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate1;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}

		if (isset($_POST['title2'])) {
			$title2 = $_POST['title2'];
		}

		$certificate2 = '';
		if (!empty($_FILES['certificate2']['name'])) {
			$certificate2 = $_FILES['certificate2']['name'];
			$certificate_tmp = $_FILES['certificate2']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate2;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}

		if (isset($_POST['title3'])) {
			$title3 = $_POST['title3'];
		}

		$certificate3 = '';
		if (!empty($_FILES['certificate3']['name'])) {
			$certificate3 = $_FILES['certificate3']['name'];
			$certificate_tmp = $_FILES['certificate3']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate3;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}

		if (isset($_POST['title4'])) {
			$title4 = $_POST['title4'];
		}

		$certificate4 = '';
		if (!empty($_FILES['certificate4']['name'])) {
			$certificate4 = $_FILES['certificate4']['name'];
			$certificate_tmp = $_FILES['certificate4']['tmp_name'];
			$certificatefolder = "$dir/" . $certificate4;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		$staffInsert = "INSERT INTO `staff_creation`( `first_name`, `last_name`, `employee_no`, `designation`, `gender`, `blood_group`, `qualification`, `pan`, `aadhar_no`, `pf_no`, `contact_no`, `doj`, `appointment_lt`, `emg_contact_person`, `emg_contact_no`, `transport_details`, `flat_no`, `street`, `area`, `district`, `bank_name`, `bank_acc_no`, `branch`, `ifsc_code`, `staff_pic`, `title`, `certificate`, `title1`, `certificate1`, `title2`, `certificate2`, `title3`, `certificate3`, `title4`, `certificate4`, `status`, `insert_login_id`,`school_id`,`year_id`,`area_id`) 
			VALUES('" . strip_tags($staff_first_name) . "','" . strip_tags($staff_last_name) . "', '" . strip_tags($employee_no) . "', '" . strip_tags($staff_designation) . "', 
			'" . strip_tags($gender) . "', '" . strip_tags($blood_group) . "', '" . strip_tags($qualification) . "','" . strip_tags($staff_pan) . "','" . strip_tags($aadhar_number) . "',
			'" . strip_tags($pf_acc_no) . "','" . strip_tags($contact_number) . "','" . strip_tags($staff_doj) . "','" . strip_tags($appointment_lt) . "','" . strip_tags($emg_contact_person) . "', '" . strip_tags($emg_contact_no) . "',
			'" . strip_tags($transport_details) . "','" . strip_tags($flat_no) . "',	'" . strip_tags($street) . "','" . strip_tags($area) . "', '" . strip_tags($district) . "','" . strip_tags($bank_name) . "','" . strip_tags($bank_acc_no) . "',
			'" . strip_tags($branch) . "','" . strip_tags($ifsc_code) . "','" . strip_tags($staff_image) . "','" . strip_tags($title) . "','" . strip_tags($certificate) . "',
			'" . strip_tags($title1) . "','" . strip_tags($certificate1) . "','" . strip_tags($title2) . "','" . strip_tags($certificate2) . "','" . strip_tags($title3) . "',
			'" . strip_tags($certificate3) . "','" . strip_tags($title4) . "','" . strip_tags($certificate4) . "','0','" . strip_tags($userid) . "','" . strip_tags($school_id) . "','" . strip_tags($year_id) . "','" . strip_tags($area_name) . "')";

		$insresult = $mysqli->query($staffInsert) or die("Error " . $mysqli->error);
	}


	// Get Staff Details
	public function getStaffCreation($mysqli, $id, $school_id, $year_id)
	{

		$tempStudentSelect = "SELECT * FROM staff_creation WHERE id='$id' AND school_id='$school_id' AND year_id='$year_id'";
		$res = $mysqli->query($tempStudentSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['staff_id']      = $row->id;
			$detailrecords['first_name']    = $row->first_name;
			$detailrecords['last_name']    = $row->last_name;
			$detailrecords['employee_no']        = $row->employee_no;
			$detailrecords['designation']      = $row->designation;
			$detailrecords['gender']         = $row->gender;
			$detailrecords['blood_group']       = $row->blood_group;
			$detailrecords['qualification']       = $row->qualification;
			$detailrecords['pan']       = $row->pan;
			$detailrecords['aadhar_no']       = $row->aadhar_no;
			$detailrecords['pf_no']       = $row->pf_no;
			$detailrecords['contact_no']       = $row->contact_no;
			$detailrecords['doj']       = $row->doj;
			$detailrecords['appointment_lt']       = $row->appointment_lt;
			$detailrecords['emg_contact_person']       = $row->emg_contact_person;
			$detailrecords['emg_contact_no']       = $row->emg_contact_no;
			$detailrecords['transport_details']       = $row->transport_details;
			$detailrecords['flat_no']       = $row->flat_no;
			$detailrecords['street']       = $row->street;
			$detailrecords['area']       = $row->area;
			$detailrecords['district']       = $row->district;
			$detailrecords['bank_name']       = $row->bank_name;
			$detailrecords['bank_acc_no']       = $row->bank_acc_no;
			$detailrecords['branch']       = $row->branch;
			$detailrecords['ifsc_code']       = $row->ifsc_code;
			$detailrecords['staff_pic']       = $row->staff_pic;
			$detailrecords['title']       = $row->title;
			$detailrecords['certificate']       = $row->certificate;
			$detailrecords['title1']       = $row->title1;
			$detailrecords['certificate1']       = $row->certificate1;
			$detailrecords['title2']       = $row->title2;
			$detailrecords['certificate2']       = $row->certificate2;
			$detailrecords['title3']       = $row->title3;
			$detailrecords['certificate3']       = $row->certificate3;
			$detailrecords['title4']       = $row->title4;
			$detailrecords['certificate4']       = $row->certificate4;
			$detailrecords['area_id']       = $row->area_id;
		}

		return $detailrecords;
	}



	// Update Staff
	public function updateStaffCreation($mysqli, $id, $userid, $school_id, $year_id)
	{

		if (isset($_POST['staff_first_name'])) {
			$staff_first_name = $_POST['staff_first_name'];
		}
		if (isset($_POST['staff_last_name'])) {
			$staff_last_name = $_POST['staff_last_name'];
		}
		if (isset($_POST['employee_no'])) {
			$employee_no = $_POST['employee_no'];
		}
		if (isset($_POST['staff_designation'])) {
			$staff_designation = $_POST['staff_designation'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['blood_group'])) {
			$blood_group = $_POST['blood_group'];
		}
		if (isset($_POST['qualification'])) {
			$qualification = $_POST['qualification'];
		}
		if (isset($_POST['staff_pan'])) {
			$staff_pan = $_POST['staff_pan'];
		}
		if (isset($_POST['aadhar_number'])) {
			$aadhar_number = $_POST['aadhar_number'];
		}
		if (isset($_POST['pf_acc_no'])) {
			$pf_acc_no = $_POST['pf_acc_no'];
		}
		if (isset($_POST['contact_number'])) {
			$contact_number = $_POST['contact_number'];
		}
		if (isset($_POST['staff_doj'])) {
			$staff_doj = $_POST['staff_doj'];
		}
		if (isset($_POST['appointment_lt'])) {
			$appointment_lt = $_POST['appointment_lt'];
		}
		if (isset($_POST['emg_contact_person'])) {
			$emg_contact_person = $_POST['emg_contact_person'];
		}
		if (isset($_POST['emg_contact_no'])) {
			$emg_contact_no = $_POST['emg_contact_no'];
		}
		if (isset($_POST['transport_details'])) {
			$transport_details = $_POST['transport_details'];
		}
		if (isset($_POST['flat_no'])) {
			$flat_no = $_POST['flat_no'];
		}
		if (isset($_POST['bank_name'])) {
			$bank_name = $_POST['bank_name'];
		}
		if (isset($_POST['street'])) {
			$street = $_POST['street'];
		}
		if (isset($_POST['bank_acc_no'])) {
			$bank_acc_no = $_POST['bank_acc_no'];
		}
		if (isset($_POST['area'])) {
			$area = $_POST['area'];
		}
		if (isset($_POST['branch'])) {
			$branch = $_POST['branch'];
		}
		if (isset($_POST['district'])) {
			$district = $_POST['district'];
		}
		if (isset($_POST['ifsc_code'])) {
			$ifsc_code = $_POST['ifsc_code'];
		}
		// if(isset($_POST['school_id'])){
		// 	$school_id = $_POST['school_id'];
		// }
		// if(isset($_POST['year_id'])){
		// 	$year_id = $_POST['year_id'];
		// }
		if (isset($_POST['area_name'])) {
			$area_name = $_POST['area_name'];
		}
		$staff_image = '';
		if (!empty($_FILES['staff_image']['name'])) {
			//delete old file
			$path = "uploads/staff_creation/staffImages/$employee_no/" . $_POST["updateimage"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$staff_image = $_FILES['staff_image']['name'];
			$staff_image_tmp = $_FILES['staff_image']['tmp_name'];
			$student_imagefolder = "uploads/staff_creation/staffImages/$employee_no/" . $staff_image;
			move_uploaded_file($staff_image_tmp, $student_imagefolder);
		}
		if ($staff_image == '' && isset($_POST["updateimage"])) {
			$staff_image = $_POST["updateimage"];
		}


		if (isset($_POST['title'])) {
			$title = $_POST['title'];
		}


		$certificate = '';
		if (!empty($_FILES['certificate']['name'])) {
			// delete old file
			$path = "uploads/staff_creation/certificates/$employee_no/" . $_POST["updatecertificate"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate = $_FILES['certificate']['name'];
			$certificate_tmp = $_FILES['certificate']['tmp_name'];
			$certificatefolder = "uploads/staff_creation/certificates/$employee_no/" . $certificate;
			move_uploaded_file($certificate_tmp, $certificatefolder);
		}
		if ($certificate == '' && isset($_POST["updatecertificate"])) {
			$certificate = $_POST["updatecertificate"];
		}

		if (isset($_POST['title1'])) {
			$title1 = $_POST['title1'];
		}

		$certificate1 = '';
		if (!empty($_FILES['certificate1']['name'])) {
			//delete old file
			$path = "uploads/staff_creation/certificates/$employee_no/" . $_POST["updatecertificate1"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate1 = $_FILES['certificate1']['name'];
			$certificate1_tmp = $_FILES['certificate1']['tmp_name'];
			$certificate1folder = "uploads/staff_creation/certificates/$employee_no/" . $certificate1;
			move_uploaded_file($certificate1_tmp, $certificate1folder);
		}
		if ($certificate1 == '' && isset($_POST["updatecertificate1"])) {
			$certificate1 = $_POST["updatecertificate1"];
		}


		if (isset($_POST['title2'])) {
			$title2 = $_POST['title2'];
		}

		$certificate2 = '';
		if (!empty($_FILES['certificate2']['name'])) {
			//delete old file
			$path = "uploads/staff_creation/certificates/$employee_no/" . $_POST["updatecertificate2"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate2 = $_FILES['certificate2']['name'];
			$certificate2_tmp = $_FILES['certificate2']['tmp_name'];
			$certificate2folder = "uploads/staff_creation/certificates/$employee_no/" . $certificate2;
			move_uploaded_file($certificate2_tmp, $certificate2folder);
		}
		if ($certificate2 == '' && isset($_POST["updatecertificate2"])) {
			$certificate2 = $_POST["updatecertificate2"];
		}


		if (isset($_POST['title3'])) {
			$title3 = $_POST['title3'];
		}

		$certificate3 = '';
		if (!empty($_FILES['certificate3']['name'])) {
			//delete old file
			$path = "uploads/staff_creation/certificates/$employee_no/" . $_POST["updatecertificate3"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate3 = $_FILES['certificate3']['name'];
			$certificate3_tmp = $_FILES['certificate3']['tmp_name'];
			$certificate3folder = "uploads/staff_creation/certificates/$employee_no/" . $certificate3;
			move_uploaded_file($certificate3_tmp, $certificate3folder);
		}
		if ($certificate3 == '' && isset($_POST["updatecertificate3"])) {
			$certificate3 = $_POST["updatecertificate3"];
		}

		if (isset($_POST['title4'])) {
			$title4 = $_POST['title4'];
		}

		$certificate4 = '';
		if (!empty($_FILES['certificate4']['name'])) {
			//delete old file
			$path = "uploads/staff_creation/certificates/$employee_no/" . $_POST["updatecertificate4"];
			if (file_exists($path)) {
				unlink($path);
			}
			//insert new file
			$certificate4 = $_FILES['certificate4']['name'];
			$certificate4_tmp = $_FILES['certificate4']['tmp_name'];
			$certificate4folder = "uploads/staff_creation/certificates/$employee_no/" . $certificate4;
			move_uploaded_file($certificate4_tmp, $certificate4folder);
		}

		if ($certificate4 == '' && isset($_POST["updatecertificate4"])) {
			$certificate4 = $_POST["updatecertificate4"];
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}


		$staffUpdate = "UPDATE `staff_creation` SET `first_name`='" . strip_tags($staff_first_name) . "',`last_name`='" . strip_tags($staff_last_name) . "',`employee_no`='" . strip_tags($employee_no) . "',`designation`='" . strip_tags($staff_designation) . "',`gender`='" . strip_tags($gender) . "',`blood_group`='" . strip_tags($blood_group) . "',`qualification`='" . strip_tags($qualification) . "',`pan`='" . strip_tags($staff_pan) . "',`aadhar_no`='" . strip_tags($aadhar_number) . "',`pf_no`='" . strip_tags($pf_acc_no) . "',`contact_no`='" . strip_tags($contact_number) . "',`doj`='" . strip_tags($staff_doj) . "',`appointment_lt`='" . strip_tags($appointment_lt) . "',`emg_contact_person`='" . strip_tags($emg_contact_person) . "',`emg_contact_no`='" . strip_tags($emg_contact_no) . "',`transport_details`='" . strip_tags($transport_details) . "',`flat_no`='" . strip_tags($flat_no) . "',`street`='" . strip_tags($street) . "',`area`='" . strip_tags($area) . "',`district`='" . strip_tags($district) . "',`bank_name`='" . strip_tags($bank_name) . "',`bank_acc_no`='" . strip_tags($bank_acc_no) . "',`branch`='" . strip_tags($branch) . "',`ifsc_code`='" . strip_tags($ifsc_code) . "',`staff_pic`='" . strip_tags($staff_image) . "',`title`='" . strip_tags($title) . "',`certificate`='" . strip_tags($certificate) . "',`title1`='" . strip_tags($title1) . "',`certificate1`='" . strip_tags($certificate1) . "',`title2`='" . strip_tags($title2) . "',`certificate2`='" . strip_tags($certificate2) . "',`title3`='" . strip_tags($title3) . "',`certificate3`='" . strip_tags($certificate3) . "',`title4`='" . strip_tags($title4) . "',`certificate4`='" . strip_tags($certificate4) . "',`status` ='0', `update_login_id`='" . strip_tags($userid) . "', `school_id`='" . strip_tags($school_id) . "', `year_id`='" . strip_tags($year_id) . "', `area_id`='" . strip_tags($area_name) . "'   WHERE `id`='" . strip_tags($id) . "' ";


		$updresult = $mysqli->query($staffUpdate) or die("Error in in update Query!." . $mysqli->error);
	}


	//  Delete Staff
	public function deleteStaffCreation($mysqli, $id, $userid)
	{

		$staffDelete = "UPDATE staff_creation set status='1', deleted_staff = '1', delete_login_id='" . strip_tags($userid) . "' WHERE  id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($staffDelete) or die("Error in delete query" . $mysqli->error);
	}

	// //  get TempStudentList
	// public function getTempStudentList($mysqli) {

	// 	$qry = "SELECT * FROM temp_admission_student WHERE 1 AND status=0 ORDER BY temp_admission_id DESC"; 
	// 	$res =$mysqli->query($qry)or die("Error in Get All Records".$mysqli->error);
	// 	$detailrecords = array();
	// 	$i=0;
	// 	if ($mysqli->affected_rows>0)
	// 	{
	// 		while($row = $res->fetch_object())
	// 		{
	// 			$detailrecords[$i]['temp_admission_id']            = $row->temp_admission_id; 
	// 			$detailrecords[$i]['temp_no']       	= strip_tags($row->temp_no);
	// 			$detailrecords[$i]['temp_student_name']       	= strip_tags($row->temp_student_name);
	// 			$detailrecords[$i]['temp_standard']       	= strip_tags($row->temp_standard);
	// 			$i++;
	// 		}
	// 	}
	// 	return $detailrecords;
	// }
	//  get TempStudentList
	public function getTempStudentList($mysqli, $school_id, $year_id)
	{

		$qry = "SELECT * FROM temp_admission_student WHERE school_id='$school_id' AND year_id='$year_id' AND status= '0' ORDER BY temp_admission_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['temp_admission_id']            = $row->temp_admission_id;
				$detailrecords[$i]['temp_no']       	= strip_tags($row->temp_no);
				$detailrecords[$i]['temp_student_name']       	= strip_tags($row->temp_student_name);
				$detailrecords[$i]['temp_standard']       	= strip_tags($row->temp_standard);
				$i++;
			}
		}
		return $detailrecords;
	}

	//  get TempStudentList
	public function getStudentList($mysqli, $school_id, $year_id)
	{
		$qry = "SELECT sc.* FROM student_creation sc LEFT JOIN student_history sh ON sc.student_id =sh.student_id WHERE sc.school_id='$school_id' AND sh.academic_year='$year_id' AND status=0 ORDER BY sc.student_id DESC";
		// SELECT * FROM student_creation WHERE 1 AND status=0 ORDER BY student_id DESC
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['student_id']            = $row->student_id;
				$detailrecords[$i]['student_name']       	= strip_tags($row->student_name);
				$detailrecords[$i]['admission_number']      = strip_tags($row->admission_number);
				$detailrecords[$i]['section']       	= strip_tags($row->section);
				$detailrecords[$i]['standard']       	= strip_tags($row->standard);
				$i++;
			}
		}
		return $detailrecords;
	}

	public function getStudentListAll($mysqli, $student_id)
	{
		$qry = "SELECT * FROM student_creation WHERE student_id = '$student_id' AND status=0 ORDER BY student_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[] = array(
					'student_id' => $row->student_id,
					'student_name' => strip_tags($row->student_name),
					'admission_number' => strip_tags($row->admission_number),
					'section' => strip_tags($row->section),
					'standard' => strip_tags($row->standard),
					'studentrollno' => strip_tags($row->studentrollno),
					'transportarearefid' => strip_tags($row->transportarearefid),
					'medium' => strip_tags($row->medium),
					'studentstype' => strip_tags($row->studentstype),
					'date_of_birth' => strip_tags($row->date_of_birth),
					'category' => strip_tags($row->category),
					'admission_number' => strip_tags($row->admission_number),
					'father_name' => strip_tags($row->father_name)
				);
			}
		}
		return $detailrecords;
	}
	// get StaffList
	public function getStaffList($mysqli, $school_id)
	{

		$qry = "SELECT * FROM staff_creation WHERE school_id='$school_id' AND status=0 ORDER BY id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['staff_id']            = $row->id;
				$detailrecords[$i]['first_name']       	= $row->first_name . ' ' . $row->last_name;

				$i++;
			}
		}
		return $detailrecords;
	}

	// get AreaList
	public function getAreaList($mysqli, $school_id, $year_id)
	{

		$qry = "SELECT * FROM area_creation WHERE school_id='$school_id' AND year_id='$year_id' AND status=0 ORDER BY area_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['area_id']            = $row->area_id;
				$detailrecords[$i]['area_name']       	= strip_tags($row->area_name);

				$i++;
			}
		}
		return $detailrecords;
	}

	// get CastList
	public function getcastList($mysqli)
	{

		$qry = "SELECT * FROM cast_details WHERE  status=0 ORDER BY cast_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['cast_id']            = $row->cast_id;
				$detailrecords[$i]['cast_name']       	= $row->cast_name;

				$i++;
			}
		}
		return $detailrecords;
	}
	// get New StudentList
	public function getNewTempStudentList($mysqli, $school_id, $year_id)
	{
		$qry = "SELECT * FROM student_creation WHERE studentstype = '1' AND school_id='$school_id' AND year_id='$year_id' AND status=0 ORDER BY student_id DESC";
		// SELECT * FROM temp_admission_student WHERE temp_student_type = 'New Student' AND school_id='$school_id' AND year_id='$year_id' AND status=0 ORDER BY temp_admission_id DESC
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['student_id']            = $row->student_id;
				$detailrecords[$i]['student_name']       	= strip_tags($row->student_name);
				$i++;
			}
		}
		return $detailrecords;
	}

	// get Old StudentList
	public function getOldTempStudentList($mysqli, $school_id, $year_id)
	{
		$qry = "SELECT * FROM student_creation WHERE studentstype = '2' AND school_id='$school_id' AND year_id='$year_id' AND status=0 ORDER BY student_id DESC";
		// SELECT * FROM temp_admission_student WHERE temp_student_type = 'Old Student' AND school_id='$school_id' AND year_id='$year_id' AND status=0 ORDER BY temp_admission_id DESC 
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['student_id']            = $row->student_id;
				$detailrecords[$i]['student_name']       	= strip_tags($row->student_name);
				$i++;
			}
		}
		return $detailrecords;
	}

	// Add Conduct Certificate creation
	public function addCondutCertificateCreation($mysqli, $userid)
	{

		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['school_address'])) {
			$school_address = $_POST['school_address'];
		}
		if (isset($_POST['studied_from'])) {
			$studied_from = $_POST['studied_from'];
		}
		if (isset($_POST['studied_to'])) {
			$studied_to = $_POST['studied_to'];
		}
		if (isset($_POST['academic_year_from'])) {
			$academic_year_from = $_POST['academic_year_from'];
		}
		if (isset($_POST['academic_year_to'])) {
			$academic_year_to = $_POST['academic_year_to'];
		}
		if (isset($_POST['place'])) {
			$place = $_POST['place'];
		}
		if (isset($_POST['student_character'])) {
			$student_character = $_POST['student_character'];
		}
		if (isset($_POST['phone_number'])) {
			$phone_number = $_POST['phone_number'];
		}

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}


		$inserttrustQry = "INSERT INTO conduct_certificate(admission_number, school_address, studied_from, student_name, school_name, studied_to, academic_year_from, academic_year_to,
			place,student_character,phone_number, insert_login_id) 
			VALUES('" . strip_tags($admission_number) . "', '" . strip_tags($school_address) . "', '" . strip_tags($studied_from) . "', '" . strip_tags($student_name) . "', 
			'" . strip_tags($school_name) . "', '" . strip_tags($studied_to) . "','" . strip_tags($academic_year_from) . "','" . strip_tags($academic_year_to) . "',
			'" . strip_tags($place) . "','" . strip_tags($student_character) . "','" . strip_tags($phone_number) . "','" . strip_tags($userid) . "')";
		$inserttrust = $mysqli->query($inserttrustQry);

		return true;
	}

	// get Area Creation
	public function getCondutCertificateCreation($mysqli, $id)
	{

		$selectCondutCertificateCreation = "SELECT * FROM conduct_certificate WHERE conduct_id ='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($selectCondutCertificateCreation) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['conduct_id']      = $row->conduct_id;
			$detailrecords['admission_number']    = $row->admission_number;
			$detailrecords['school_address']    = $row->school_address;
			$detailrecords['studied_from']      = $row->studied_from;
			$detailrecords['student_name']      = $row->student_name;
			$detailrecords['school_name']       = $row->school_name;
			$detailrecords['studied_to']         = $row->studied_to;
			$detailrecords['academic_year_from']         = $row->studied_to;
			$detailrecords['academic_year_to']         = $row->academic_year_to;
			$detailrecords['place']         = $row->place;
			$detailrecords['student_character']         = $row->student_character;
			$detailrecords['phone_number']         = $row->phone_number;
		}

		return $detailrecords;
	}

	// Update Area Creation
	public function updateCondutCertificateCreation($mysqli, $id, $userid)
	{

		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['school_address'])) {
			$school_address = $_POST['school_address'];
		}
		if (isset($_POST['studied_from'])) {
			$studied_from = $_POST['studied_from'];
		}
		if (isset($_POST['studied_to'])) {
			$studied_to = $_POST['studied_to'];
		}
		if (isset($_POST['academic_year_from'])) {
			$academic_year_from = $_POST['academic_year_from'];
		}
		if (isset($_POST['academic_year_to'])) {
			$academic_year_to = $_POST['academic_year_to'];
		}
		if (isset($_POST['place'])) {
			$place = $_POST['place'];
		}
		if (isset($_POST['student_character'])) {
			$student_character = $_POST['student_character'];
		}
		if (isset($_POST['phone_number'])) {
			$phone_number = $_POST['phone_number'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		$updateCondutCertificateCreation = "UPDATE conduct_certificate SET admission_number = '" . strip_tags($admission_number) . "', school_address='" . strip_tags($school_address) . "', studied_from='" . strip_tags($studied_from) . "', student_name='" . strip_tags($student_name) . "', 
			school_name='" . strip_tags($school_name) . "', studied_to='" . strip_tags($studied_to) . "',  place='" . strip_tags($place) . "', student_character='" . strip_tags($student_character) . "', phone_number='" . strip_tags($phone_number) . "', academic_year_from='" . strip_tags($academic_year_from) . "', academic_year_to='" . strip_tags($academic_year_to) . "', update_login_id='" . strip_tags($userid) . "', 
			status = '0' 
			WHERE conduct_id = '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($updateCondutCertificateCreation) or die("Error in in update Query!." . $mysqli->error);
	}


	//  Delete Area Creation
	public function deleteCondutCertificateCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$deleteCondutCertificateCreation = "UPDATE conduct_certificate set status='1', delete_login_id='" . strip_tags($userid) . "'  WHERE conduct_id  = '" . strip_tags($id) . "'  ";
		$runQry = $mysqli->query($deleteCondutCertificateCreation) or die("Error in delete query" . $mysqli->error);
	}

	public function getAdmissionNoDetails($mysqli)
	{

		$qry = "SELECT * FROM student_creation WHERE 1 AND status=0 ORDER BY student_id DESC";
		$res = $mysqli->query($qry) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		$i = 0;
		if ($mysqli->affected_rows > 0) {
			while ($row = $res->fetch_object()) {
				$detailrecords[$i]['student_id']            = $row->student_id;
				$detailrecords[$i]['admission_number']       	= strip_tags($row->admission_number);

				$i++;
			}
		}
		return $detailrecords;
	}

	public function addPayfeesCreation($mysqli, $userid, $school_id)
	{
		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date = $_POST['receipt_date'];
		}
		if (isset($_POST['register_number'])) {
			$register_number = $_POST['register_number'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['student_id'])) {
			$student_id = $_POST['student_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}

		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = ltrim(implode(",", $grp_particularsstr), ',');
		}
		if (isset($_POST['grp_amount'])) {
			$grp_amountstr = $_POST['grp_amount'];
			$grp_amount = ltrim(implode(",", $grp_amountstr), ',');
		}


		if (isset($_POST['grp_fees_id'])) {
			$grp_fees_idstr = $_POST['grp_fees_id'];
			$grp_fees_id = ltrim(implode(",", $grp_fees_idstr), ',');
		}
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$amount_balance = ltrim(implode(",", $amount_balancestr), ',');
		}
		if (isset($_POST['extra_fees_id'])) {
			$extra_fees_idstr = $_POST['extra_fees_id'];
			$extra_fees_id = ltrim(implode(",", $extra_fees_idstr), ',');
		}
		if (isset($_POST['extra_particulars'])) {
			$extra_particularsstr = $_POST['extra_particulars'];
			$extra_particulars = ltrim(implode(",", $extra_particularsstr), ',');
		}
		if (isset($_POST['extra_amount'])) {
			$extra_amountstr = $_POST['extra_amount'];
			$extra_amount = ltrim(implode(",", $extra_amountstr), ',');
		}


		if (isset($_POST['extra_amount_balance'])) {
			$extra_amount_balancestr = $_POST['extra_amount_balance'];
			$extra_amount_balance = ltrim(implode(",", $extra_amount_balancestr), ',');
		}
		if (isset($_POST['amenity_fees_id'])) {
			$amenity_fees_idstr = $_POST['amenity_fees_id'];
			$amenity_fees_id = ltrim(implode(",", $amenity_fees_idstr), ',');
		}
		if (isset($_POST['amenity_particulars'])) {
			$amenity_particularsstr = $_POST['amenity_particulars'];
			$amenity_particulars = ltrim(implode(",", $amenity_particularsstr), ',');
		}
		if (isset($_POST['amenity_amount'])) {
			$amenity_amountstr = $_POST['amenity_amount'];
			$amenity_amount = ltrim(implode(",", $amenity_amountstr), ',');
		}

		if (isset($_POST['amenity_amount_balance'])) {
			$amenity_amount_balancestr = $_POST['amenity_amount_balance'];
			$amenity_amount_balance = ltrim(implode(",", $amenity_amount_balancestr), ',');
		}
		if (isset($_POST['grp_concession_amount'])) {
			$grp_concession_amountstr = $_POST['grp_concession_amount'];
			$grp_concession_amount = ltrim(implode(",", $grp_concession_amountstr), ',');
		}

		if (isset($_POST['qty1'])) {
			$qty1 = $_POST["qty1"];
		}
		if (isset($_POST['qty2'])) {
			$qty2 = $_POST["qty2"];
		}
		if (isset($_POST['qty3'])) {
			$qty3 = $_POST["qty3"];
		}
		if (isset($_POST['qty4'])) {
			$qty4 = $_POST["qty4"];
		}
		if (isset($_POST['qty5'])) {
			$qty5 = $_POST["qty5"];
		}
		if (isset($_POST['qty6'])) {
			$qty6 = $_POST["qty6"];
		}
		if (isset($_POST['qty7'])) {
			$qty7 = $_POST["qty7"];
		}
		if (isset($_POST['unit1'])) {
			$unit1 = $_POST['unit1'];
		}
		if (isset($_POST['unit2'])) {
			$unit2 = $_POST['unit2'];
		}
		if (isset($_POST['unit3'])) {
			$unit3 = $_POST['unit3'];
		}
		if (isset($_POST['unit4'])) {
			$unit4 = $_POST['unit4'];
		}
		if (isset($_POST['unit5'])) {
			$unit5 = $_POST['unit5'];
		}
		if (isset($_POST['unit6'])) {
			$unit6 = $_POST['unit6'];
		}
		if (isset($_POST['unit7'])) {
			$unit7 = $_POST['unit7'];
		}
		if (isset($_POST['amount1'])) {
			$amount1 = $_POST['amount1'];
		}
		if (isset($_POST['amount2'])) {
			$amount2 = $_POST['amount2'];
		}
		if (isset($_POST['amount3'])) {
			$amount3 = $_POST['amount3'];
		}
		if (isset($_POST['amount4'])) {
			$amount4 = $_POST['amount4'];
		}
		if (isset($_POST['amount5'])) {
			$amount5 = $_POST['amount5'];
		}
		if (isset($_POST['amount6'])) {
			$amount6 = $_POST['amount6'];
		}
		if (isset($_POST['amount7'])) {
			$amount7 = $_POST['amount7'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}

		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		if (isset($_POST['collection_info'])) {
			$collection_info = $_POST['collection_info'];
		}
		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}
		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		if (isset($_POST['final_fees_balance'])) {
			$final_fees_balance = $_POST['final_fees_balance'];
		}
		if (isset($_POST['final_fees_collected'])) {
			$final_fees_collected = $_POST['final_fees_collected'];
		}
		if (isset($_POST['final_received_fees_total'])) {
			$final_received_fees_total = $_POST['final_received_fees_total'];
		}
		if (isset($_POST['final_concession_fees_total'])) {
			$final_concession_fees_total = $_POST['final_concession_fees_total'];
		}
		if (isset($_POST['final_fees_total'])) {
			$final_fees_total = $_POST['final_fees_total'];
		}
		if (isset($_POST['grp_fees_total'])) {
			$grp_fees_total = $_POST['grp_fees_total'];
		}
		if (isset($_POST['extra_fees_total'])) {
			$extra_fees_total = $_POST['extra_fees_total'];
		}
		if (isset($_POST['amenity_fees_total'])) {
			$amenity_fees_total = $_POST['amenity_fees_total'];
		}
		if (isset($_POST['grp_fees_total_received'])) {
			$grp_fees_total_received = $_POST['grp_fees_total_received'];
		}
		if (isset($_POST['extra_fees_total_received'])) {
			$extra_fees_total_received = $_POST['extra_fees_total_received'];
		}
		if (isset($_POST['amenity_fees_total_received'])) {
			$amenity_fees_total_received = $_POST['amenity_fees_total_received'];
		}
		if (isset($_POST['grp_fees_balance'])) {
			$grp_fees_balance = $_POST['grp_fees_balance'];
		}
		if (isset($_POST['extra_fees_balance'])) {
			$extra_fees_balance = $_POST['extra_fees_balance'];
		}
		if (isset($_POST['amenity_fees_balance'])) {
			$amenity_fees_balance = $_POST['amenity_fees_balance'];
		}

		if (isset($_POST['grp_concession_fees'])) {
			$grp_concession_fees = $_POST['grp_concession_fees'];
		}
		if (isset($_POST['extra_concession_fees'])) {
			$extra_concession_fees = $_POST['extra_concession_fees'];
		}
		if (isset($_POST['amenity_concession_fees'])) {
			$amenity_concession_fees = $_POST['amenity_concession_fees'];
		}
		if (isset($_POST['grp_concession_amount12'])) {
			$grp_concession_amount12str = $_POST['grp_concession_amount12'];
			// $grp_concession_amount12 = ltrim(implode(",",$grp_concession_amount12str),','); 
		}
		if (isset($_POST['grp_concession_amount'])) {
			$grp_concession_amount13str = $_POST['grp_concession_amount'];
			// $grp_concession_amount13 = ltrim(implode(",",$grp_concession_amountstr),','); 
		}

		if (isset($_POST['amount_recieved12'])) {
			if ($_POST['amount_recieved12'] == '0') {
				$amount_recieved12str = ['0'];
			} else {

				$amount_recieved12str = $_POST['amount_recieved12'];
			}
		}
		if (isset($_POST['amount_recieved'])) {
			$amount_recieved13str = $_POST['amount_recieved'];
			$amount_recievedref = ltrim(implode(",", $amount_recieved13str), ',');

			// $amount_recieved13 = ltrim(implode(",",$amount_recieved13str),','); 
			// print_r($amount_recieved13);

		}
		if (isset($_POST['extra_amount_recieved'])) {
			$extra_amount_recieved11str = $_POST['extra_amount_recieved'];
			$extra_amount_recievedref = ltrim(implode(",", $extra_amount_recieved11str), ',');
		}
		if (isset($_POST['extra_amount_recieved12'])) {
			if ($_POST['extra_amount_recieved12'] == '0') {
				$extra_amount_recieved12str = ['0'];
			} else {
				$extra_amount_recieved12str = $_POST['extra_amount_recieved12'];
			}
		}
		if (isset($_POST['extra_concession_amount'])) {
			$extra_concession_amount11str = $_POST['extra_concession_amount'];
			// $extra_concession_amount = ltrim(implode(",",$extra_concession_amountstr),','); 
		}

		if (isset($_POST['extra_concession_amount12'])) {
			if ($_POST['extra_concession_amount12'] == '0') {
				$extra_concession_amount12str = ['0'];
			} else {
				$extra_concession_amount12str = $_POST['extra_concession_amount12'];
			}
		}

		if (isset($_POST['amenity_amount_recieved'])) {
			$amenity_amount_recieved13str = $_POST['amenity_amount_recieved'];
			$amenity_amount_recievedref = ltrim(implode(",", $amenity_amount_recieved13str), ',');
		}
		if (isset($_POST['amenity_amount_recieved12'])) {
			if ($_POST['amenity_amount_recieved12'] == '0') {
				$amenity_amount_recieved12str = ['0'];
			} else {
				$amenity_amount_recieved12str = $_POST['amenity_amount_recieved12'];
			}
		}

		if (isset($_POST['amenity_concession_amount'])) {
			$amenity_concession_amount12str = $_POST['amenity_concession_amount'];
			// $amenity_concession_amount = ltrim(implode(",",$amenity_concession_amount12str),','); 
		}
		if (isset($_POST['amenity_concession_amount12'])) {
			if ($_POST['amenity_amount_recieved12'] == '0') {
				$amenity_concession_amount13str = ['0'];
			} else {
				$amenity_concession_amount13str = $_POST['amenity_concession_amount12'];
			}

			// $amenity_concession_amount = ltrim(implode(",",$amenity_concession_amountstr),','); 
		}
		// Add the values

		$amount_received11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $amount_recieved12str, $amount_recieved13str);
		$amount_recieved = ltrim(implode(",", $amount_received11), ',');

		$grp_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $grp_concession_amount13str, $grp_concession_amount12str);
		$grp_concession_amount = ltrim(implode(",", $grp_concession_amount11), ',');

		$extra_amount_recieved11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $extra_amount_recieved11str, $extra_amount_recieved12str);
		$extra_amount_recieved = ltrim(implode(",", $extra_amount_recieved11), ',');


		$extra_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $extra_concession_amount11str, $extra_concession_amount12str);
		$extra_concession_amount = ltrim(implode(",", $extra_concession_amount11), ',');

		$amenity_amount_recieved11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $amenity_amount_recieved12str, $amenity_amount_recieved13str);
		$amenity_amount_recieved = ltrim(implode(",", $amenity_amount_recieved11), ',');

		$amenity_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $amenity_concession_amount12str, $amenity_concession_amount13str);
		$amenity_concession_amount = ltrim(implode(",", $amenity_concession_amount11), ',');

		// $grp_concession_amount11 =  array_map(function ($a, $b) {
		// 	return $a + $b;
		// }, $grp_concession_amount13str, $grp_concession_amount12str);
		// $grp_concession_amount = ltrim(implode(",",$grp_concession_amount11),',');


		// $amount_recieved = $amount_recieved12 + $amount_recieved13;
		// $grp_concession_amount = intval($grp_concession_amount12) + intval($grp_concession_amount13);


		$selectClass = $mysqli->query("SELECT * FROM pay_fees WHERE 1");

		$student_id1 = array();

		while ($row = $selectClass->fetch_assoc()) {

			$student_id1[]    = $row["student_id"];
		}

		if (isset($_POST['stud_id'])) {
			$stud_id = $_POST['stud_id'];

			if (in_array($stud_id, $student_id1)) {


				$eventUpdaet = "UPDATE pay_fees SET grp_fees_id = '" . strip_tags($grp_fees_id) . "', extra_fees_id = '" . strip_tags($extra_fees_id) . "',
		amenity_fees_id = '" . strip_tags($amenity_fees_id) . "', receipt_number = '" . strip_tags($receipt_number) . "', receipt_date='" . strip_tags($receipt_date) . "', 
		register_number='" . strip_tags($register_number) . "', academic_year='" . strip_tags($academic_year) . "', 
		student_id='" . strip_tags($student_id) . "', standard='" . strip_tags($standard) . "', grp_particulars='" . strip_tags($grp_particulars) . "',
		grp_amount='" . strip_tags($grp_amount) . "',amount_recieved='" . strip_tags($amount_recieved) . "',amount_balance='" . strip_tags($amount_balance) . "',
		extra_particulars='" . strip_tags($extra_particulars) . "',extra_amount='" . strip_tags($extra_amount) . "',extra_amount_recieved='" . strip_tags($extra_amount_recieved) . "',
		extra_amount_balance='" . strip_tags($extra_amount_balance) . "',amenity_particulars='" . strip_tags($amenity_particulars) . "',amenity_amount='" . strip_tags($amenity_amount) . "',
		amenity_amount_recieved='" . strip_tags($amenity_amount_recieved) . "',amenity_concession_amount= '" . strip_tags($amenity_concession_amount) . "',  amenity_amount_balance = '" . strip_tags($amenity_amount_balance) . "', qty1='" . strip_tags($qty1) . "', qty2='" . strip_tags($qty2) . "',qty3='" . strip_tags($qty3) . "',
		qty4='" . strip_tags($qty4) . "',qty5='" . strip_tags($qty5) . "',qty6='" . strip_tags($qty6) . "', qty7='" . strip_tags($qty7) . "', unit1='" . strip_tags($unit1) . "', unit2='" . strip_tags($unit2) . "',
		unit3='" . strip_tags($unit3) . "', unit4='" . strip_tags($unit4) . "', unit5='" . strip_tags($unit5) . "', unit6='" . strip_tags($unit6) . "', unit7='" . strip_tags($unit7) . "',
		result='" . strip_tags($result) . "', amount1='" . strip_tags($amount1) . "', amount2='" . strip_tags($amount2) . "', amount3='" . strip_tags($amount3) . "',
		amount4='" . strip_tags($amount4) . "',amount5='" . strip_tags($amount5) . "',amount6='" . strip_tags($amount6) . "', amount7='" . strip_tags($amount7) . "', final_amount_recieved='" . strip_tags($final_amount_recieved) . "', 
		other_charges='" . strip_tags($other_charges) . "', other_charges_recieved='" . strip_tags($other_charges_recieved) . "', 
		fees_total='" . strip_tags($fees_total) . "', collection_info='" . strip_tags($collection_info) . "', fees_balance='" . strip_tags($fees_balance) . "',
		cheque_number='" . strip_tags($cheque_number) . "', cheque_amount='" . strip_tags($cheque_amount) . "', cheque_date='" . strip_tags($cheque_date) . "',
		cheque_bank_name='" . strip_tags($cheque_bank_name) . "',cheque_ledger_name='" . strip_tags($cheque_ledger_name) . "',neft_number='" . strip_tags($neft_number) . "',neft_amount='" . strip_tags($neft_amount) . "',
		neft_date='" . strip_tags($neft_date) . "',neft_bank_name='" . strip_tags($neft_bank_name) . "',neft_ledger_name='" . strip_tags($neft_ledger_name) . "',
		fees_collected='" . strip_tags($fees_collected) . "', update_login_id='" . strip_tags($userid) . "',school_id='" . strip_tags($school_id) . "', status = '0',grp_concession_amount ='" . strip_tags($grp_concession_amount) . "' , extra_concession_amount ='" . strip_tags($extra_concession_amount) . "' WHERE student_id= '" . strip_tags($stud_id) . "' AND school_id='" . strip_tags($school_id) . "' ";
				// echo "addPayfeesCreation IF".$eventUpdaet;
				$updresult = $mysqli->query($eventUpdaet);
				$UpdateId = $mysqli->affected_rows;

				$eventreffInsert = "INSERT INTO pay_fees_ref(student_id, pay_fees_id,receipt_number, final_fees_total, final_received_fees_total, final_fees_collected,
		 final_fees_balance,insert_login_id, grp_fees_total, extra_fees_total, amenity_fees_total,grp_fees_total_received, extra_fees_total_received,
		  amenity_fees_total_received, grp_fees_balance, extra_fees_balance, amenity_fees_balance, amenity_concession_fees, extra_concession_fees, grp_concession_fees,
		  grp_particulars, grp_amount,amount_recieved,extra_particulars, extra_amount, extra_amount_recieved,amenity_particulars, amenity_amount, amenity_amount_recieved,
		  grp_fees_id, extra_fees_id, amenity_fees_id,grp_concession_amount, extra_concession_amount,amenity_concession_amount) 
		VALUES('" . strip_tags($student_id) . "','" . $UpdateId . "', '" . strip_tags($receipt_number) . "', '" . strip_tags($final_fees_total) . "', 
		'" . strip_tags($final_received_fees_total) . "', '" . strip_tags($final_fees_collected) . "','" . strip_tags($final_fees_balance) . "', '" . strip_tags($userid) . "', '" . strip_tags($grp_fees_total) . "',
		'" . strip_tags($extra_fees_total) . "','" . strip_tags($amenity_fees_total) . "', '" . strip_tags($grp_fees_total_received) . "' , '" . strip_tags($extra_fees_total_received) . "', 
		'" . strip_tags($amenity_fees_total_received) . "', '" . strip_tags($grp_fees_balance) . "', '" . strip_tags($extra_fees_balance) . "', '" . strip_tags($amenity_fees_balance) . "',
		'" . strip_tags($amenity_concession_fees) . "','" . strip_tags($extra_concession_fees) . "','" . strip_tags($grp_concession_fees) . "','" . strip_tags($grp_particulars) . "',
		 '" . strip_tags($grp_amount) . "','" . strip_tags($amount_recievedref) . "','" . strip_tags($extra_particulars) . "', '" . strip_tags($extra_amount) . "', '" . strip_tags($extra_amount_recievedref) . "', 
		 '" . strip_tags($amenity_particulars) . "', '" . strip_tags($amenity_amount) . "', '" . strip_tags($amenity_amount_recievedref) . "','" . strip_tags($grp_fees_id) . "','" . strip_tags($extra_fees_id) . "',
		 '" . strip_tags($amenity_fees_id) . "','" . strip_tags($grp_concession_amount) . "', '" . strip_tags($extra_concession_amount) . "', '" . strip_tags($amenity_concession_amount) . "')";
				// echo "addPayfeesCreation IF2".$eventreffInsert;
				$insresult = $mysqli->query($eventreffInsert) or die("Error in Get All Records" . $mysqli->error);
				// die;

			} else {
				$eventInsert = "INSERT INTO pay_fees(receipt_number, receipt_date, register_number, academic_year, student_id, standard, grp_particulars, grp_amount,amount_recieved, amount_balance,extra_particulars, extra_amount, extra_amount_recieved, extra_amount_balance, amenity_particulars, amenity_amount, amenity_amount_recieved, 
		amenity_amount_balance, qty1, qty2, qty3, qty4, qty5, qty6, qty7, unit1, unit2, unit3, unit4, unit5, unit6, unit7, amount1, amount2, amount3, amount4, amount5, amount6,
		amount7, other_charges,	other_charges_recieved, fees_total, result, final_amount_recieved, fees_collected, fees_balance, collection_info, cheque_number,
		cheque_amount, cheque_date, cheque_bank_name, cheque_ledger_name, neft_number, neft_amount, neft_date,  neft_bank_name, neft_ledger_name, grp_fees_id, extra_fees_id, amenity_fees_id,
		insert_login_id, grp_concession_amount, extra_concession_amount,amenity_concession_amount,school_id) 
		VALUES('" . strip_tags($receipt_number) . "','" . strip_tags($receipt_date) . "', '" . strip_tags($register_number) . "', 
		'" . strip_tags($academic_year) . "', '" . strip_tags($student_id) . "','" . strip_tags($standard) . "', '" . strip_tags($grp_particulars) . "', '" . strip_tags($grp_amount) . "','" . strip_tags($amount_recieved) . "', '" . strip_tags($amount_balance) . "', '" . strip_tags($extra_particulars) . "', '" . strip_tags($extra_amount) . "', '" . strip_tags($extra_amount_recieved) . "','" . strip_tags($extra_amount_balance) . "','" . strip_tags($amenity_particulars) . "', '" . strip_tags($amenity_amount) . "', '" . strip_tags($amenity_amount_recieved) . "', '" . strip_tags($amenity_amount_balance) . "', 
		'" . strip_tags($qty1) . "', '" . strip_tags($qty2) . "','" . strip_tags($qty3) . "',	'" . strip_tags($qty4) . "','" . strip_tags($qty5) . "', '" . strip_tags($qty6) . "', '" . strip_tags($qty7) . "',
		'" . strip_tags($unit1) . "', '" . strip_tags($unit2) . "', '" . strip_tags($unit3) . "',
		'" . strip_tags($unit4) . "', '" . strip_tags($unit5) . "', '" . strip_tags($unit6) . "', '" . strip_tags($unit7) . "', '" . strip_tags($amount1) . "', '" . strip_tags($amount2) . "', 
		'" . strip_tags($amount3) . "', '" . strip_tags($amount4) . "', '" . strip_tags($amount5) . "',
		'" . strip_tags($amount6) . "', '" . strip_tags($amount7) . "', '" . strip_tags($other_charges) . "', '" . strip_tags($other_charges_recieved) . "', '" . strip_tags($fees_total) . "',
		'" . strip_tags($result) . "', '" . strip_tags($final_amount_recieved) . "', '" . strip_tags($fees_collected) . "', 
		'" . strip_tags($fees_balance) . "','" . strip_tags($collection_info) . "', '" . strip_tags($cheque_number) . "', '" . strip_tags($cheque_amount) . "', '" . strip_tags($cheque_date) . "', 
		'" . strip_tags($cheque_bank_name) . "', '" . strip_tags($cheque_ledger_name) . "', '" . strip_tags($neft_number) . "', '" . strip_tags($neft_amount) . "', '" . strip_tags($neft_date) . "',
		'" . strip_tags($neft_bank_name) . "', '" . strip_tags($neft_ledger_name) . "', '" . strip_tags($grp_fees_id) . "','" . strip_tags($extra_fees_id) . "',
		'" . strip_tags($amenity_fees_id) . "','" . strip_tags($userid) . "', '" . strip_tags($grp_concession_amount) . "', '" . strip_tags($extra_concession_amount) . "', '" . strip_tags($amenity_concession_amount) . "','" . strip_tags($school_id) . "')";
				// echo "addPayfeesCreation ELSE".$eventInsert;
				$insresult = $mysqli->query($eventInsert);
				$InsertId = $mysqli->insert_id;

				$eventreffInsert = "INSERT INTO pay_fees_ref(student_id, pay_fees_id,receipt_number, final_fees_total, final_received_fees_total, final_fees_collected, final_fees_balance,insert_login_id,grp_fees_total, extra_fees_total, amenity_fees_total,grp_fees_total_received, extra_fees_total_received, amenity_fees_total_received, grp_fees_balance, extra_fees_balance, amenity_fees_balance,
		amenity_concession_fees, extra_concession_fees, grp_concession_fees,grp_particulars, grp_amount,amount_recieved,extra_particulars, extra_amount, extra_amount_recieved,
		amenity_particulars, amenity_amount, amenity_amount_recieved, grp_fees_id, extra_fees_id, amenity_fees_id,grp_concession_amount, extra_concession_amount,
		amenity_concession_amount) 
		VALUES('" . strip_tags($student_id) . "','" . $InsertId . "', '" . strip_tags($receipt_number) . "', '" . strip_tags($final_fees_total) . "',
		'" . strip_tags($final_received_fees_total) . "', '" . strip_tags($final_fees_collected) . "','" . strip_tags($final_fees_balance) . "', '" . strip_tags($userid) . "',
		'" . strip_tags($grp_fees_total) . "','" . strip_tags($extra_fees_total) . "','" . strip_tags($amenity_fees_total) . "','" . strip_tags($grp_fees_total_received) . "' , '" . strip_tags($extra_fees_total_received) . "', 
		'" . strip_tags($amenity_fees_total_received) . "','" . strip_tags($grp_fees_balance) . "','" . strip_tags($extra_fees_balance) . "', '" . strip_tags($amenity_fees_balance) . "',
		'" . strip_tags($amenity_concession_fees) . "','" . strip_tags($extra_concession_fees) . "','" . strip_tags($grp_concession_fees) . "','" . strip_tags($grp_particulars) . "',
		'" . strip_tags($grp_amount) . "','" . strip_tags($amount_recievedref) . "','" . strip_tags($extra_particulars) . "', '" . strip_tags($extra_amount) . "', '" . strip_tags($extra_amount_recievedref) . "', 
		'" . strip_tags($amenity_particulars) . "', '" . strip_tags($amenity_amount) . "', '" . strip_tags($amenity_amount_recievedref) . "','" . strip_tags($grp_fees_id) . "','" . strip_tags($extra_fees_id) . "',
		'" . strip_tags($amenity_fees_id) . "','" . strip_tags($grp_concession_amount) . "', '" . strip_tags($extra_concession_amount) . "', '" . strip_tags($amenity_concession_amount) . "')";
				// echo "eventreffInsert ELSE".$eventreffInsert;
				$insresult = $mysqli->query($eventreffInsert);
				// die;
			}
		}
	}
	// Get Trustee
	public function getPayfeesCreation($mysqli, $id)
	{

		$eventSelect = "SELECT * FROM pay_fees WHERE pay_fees_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($eventSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['pay_fees_id']      = $row->pay_fees_id;
			$detailrecords['receipt_number']    = $row->receipt_number;
			$detailrecords['receipt_date']    = $row->receipt_date;
			$detailrecords['register_number']      = $row->register_number;
			$detailrecords['academic_year']       = $row->academic_year;
			$detailrecords['student_id']         = $row->student_id;
			$detailrecords['standard']       = $row->standard;
			$detailrecords['grp_particulars']       = $row->grp_particulars;
			$detailrecords['grp_amount']       = $row->grp_amount;
			$detailrecords['amount_recieved']       = $row->amount_recieved;
			$detailrecords['amount_balance']       = $row->amount_balance;
			$detailrecords['extra_particulars']       = $row->extra_particulars;
			$detailrecords['extra_amount']       = $row->extra_amount;
			$detailrecords['extra_amount_recieved']       = $row->extra_amount_recieved;
			$detailrecords['extra_amount_balance']       = $row->extra_amount_balance;
			$detailrecords['amenity_particulars']       = $row->amenity_particulars;
			$detailrecords['amenity_amount']       = $row->amenity_amount;
			$detailrecords['amenity_amount_recieved']       = $row->amenity_amount_recieved;
			$detailrecords['amenity_amount_balance']       = $row->amenity_amount_balance;
			$detailrecords['qty1']       = $row->qty1;
			$detailrecords['qty2']       = $row->qty2;
			$detailrecords['qty3']       = $row->qty3;
			$detailrecords['qty4']       = $row->qty4;
			$detailrecords['qty5']       = $row->qty5;
			$detailrecords['qty6']       = $row->qty6;
			$detailrecords['qty7']       = $row->qty7;
			$detailrecords['unit1']       = $row->unit1;
			$detailrecords['unit2']       = $row->unit2;
			$detailrecords['unit3']       = $row->unit3;
			$detailrecords['unit4']       = $row->unit4;
			$detailrecords['unit5']       = $row->unit5;
			$detailrecords['unit6']       = $row->unit6;
			$detailrecords['unit7']       = $row->unit7;
			$detailrecords['amount1']       = $row->amount1;
			$detailrecords['amount2']       = $row->amount2;
			$detailrecords['amount3']       = $row->amount3;
			$detailrecords['amount4']       = $row->amount4;
			$detailrecords['amount5']       = $row->amount5;
			$detailrecords['amount6']       = $row->amount6;
			$detailrecords['amount7']       = $row->amount7;
			$detailrecords['other_charges']       = $row->other_charges;
			$detailrecords['other_charges_recieved']       = $row->other_charges_recieved;
			$detailrecords['fees_total']       = $row->fees_total;
			$detailrecords['result']       = $row->result;
			$detailrecords['fees_scholarship']       = $row->fees_scholarship;
			$detailrecords['final_amount_recieved']       = $row->final_amount_recieved;
			$detailrecords['fees_collected']       = $row->fees_collected;
			$detailrecords['fees_balance']       = $row->fees_balance;
			$detailrecords['collection_info']       = $row->collection_info;
			$detailrecords['cheque_number']       = $row->cheque_number;
			$detailrecords['cheque_amount']       = $row->cheque_amount;
			$detailrecords['cheque_date']       = $row->cheque_date;
			$detailrecords['cheque_bank_name']       = $row->cheque_bank_name;
			$detailrecords['cheque_ledger_name']       = $row->cheque_ledger_name;
			$detailrecords['neft_number']       = $row->neft_number;
			$detailrecords['neft_amount']       = $row->neft_amount;
			$detailrecords['neft_date']       = $row->neft_date;
			$detailrecords['neft_bank_name']       = $row->neft_bank_name;
			$detailrecords['neft_ledger_name']       = $row->neft_ledger_name;
			$detailrecords['grp_fees_id']       = $row->grp_fees_id;
			$detailrecords['extra_fees_id']       = $row->extra_fees_id;
			$detailrecords['amenity_fees_id']       = $row->amenity_fees_id;
		}

		return $detailrecords;
	}

	// Update Trustee
	public function updatePayfeesCreation($mysqli, $id, $userid, $school_id)
	{

		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date = $_POST['receipt_date'];
		}
		if (isset($_POST['register_number'])) {
			$register_number = $_POST['register_number'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['student_id'])) {
			$student_id = $_POST['student_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}
		if (isset($_POST['grp_fees_id'])) {
			$grp_fees_idstr = $_POST['grp_fees_id'];
			$grp_fees_id = implode(",", $grp_fees_idstr);
		}
		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = implode(",", $grp_particularsstr);
		}
		if (isset($_POST['grp_amount'])) {
			$grp_amountstr = $_POST['grp_amount'];
			$grp_amount = implode(",", $grp_amountstr);
		}
		if (isset($_POST['amount_recieved'])) {
			$amount_recievedstr = $_POST['amount_recieved'];
			$amount_recieved = implode(",", $amount_recievedstr);
		}
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$amount_balance = implode(",", $amount_balancestr);
		}
		if (isset($_POST['extra_fees_id'])) {
			$extra_fees_idstr = $_POST['extra_fees_id'];
			$extra_fees_id = implode(",", $extra_fees_idstr);
		}
		if (isset($_POST['extra_particulars'])) {
			$extra_particularsstr = $_POST['extra_particulars'];
			$extra_particulars = implode(",", $extra_particularsstr);
		}
		if (isset($_POST['extra_amount'])) {
			$extra_amountstr = $_POST['extra_amount'];
			$extra_amount = implode(",", $extra_amountstr);
		}
		if (isset($_POST['extra_amount_recieved'])) {
			$extra_amount_recievedstr = $_POST['extra_amount_recieved'];
			$extra_amount_recieved = implode(",", $extra_amount_recievedstr);
		}
		if (isset($_POST['extra_amount_balance'])) {
			$extra_amount_balancestr = $_POST['extra_amount_balance'];
			$extra_amount_balance = implode(",", $extra_amount_balancestr);
		}
		if (isset($_POST['amenity_fees_id'])) {
			$amenity_fees_idstr = $_POST['amenity_fees_id'];
			$amenity_fees_id = implode(",", $amenity_fees_idstr);
		}
		if (isset($_POST['amenity_particulars'])) {
			$amenity_particularsstr = $_POST['amenity_particulars'];
			$amenity_particulars = implode(",", $amenity_particularsstr);
		}
		if (isset($_POST['amenity_amount'])) {
			$amenity_amountstr = $_POST['amenity_amount'];
			$amenity_amount = implode(",", $amenity_amountstr);
		}
		if (isset($_POST['amenity_amount_recieved'])) {
			$amenity_amount_recievedstr = $_POST['amenity_amount_recieved'];
			$amenity_amount_recieved = implode(",", $amenity_amount_recievedstr);
		}
		if (isset($_POST['amenity_amount_balance'])) {
			$amenity_amount_balancestr = $_POST['amenity_amount_balance'];
			$amenity_amount_balance = implode(",", $amenity_amount_balancestr);
		}
		if (isset($_POST['qty1'])) {
			$qty1 = $_POST["qty1"];
		}
		if (isset($_POST['qty2'])) {
			$qty2 = $_POST["qty2"];
		}
		if (isset($_POST['qty3'])) {
			$qty3 = $_POST["qty3"];
		}
		if (isset($_POST['qty4'])) {
			$qty4 = $_POST["qty4"];
		}
		if (isset($_POST['qty5'])) {
			$qty5 = $_POST["qty5"];
		}
		if (isset($_POST['qty6'])) {
			$qty6 = $_POST["qty6"];
		}
		if (isset($_POST['qty7'])) {
			$qty7 = $_POST["qty7"];
		}
		if (isset($_POST['unit1'])) {
			$unit1 = $_POST['unit1'];
		}
		if (isset($_POST['unit2'])) {
			$unit2 = $_POST['unit2'];
		}
		if (isset($_POST['unit3'])) {
			$unit3 = $_POST['unit3'];
		}
		if (isset($_POST['unit4'])) {
			$unit4 = $_POST['unit4'];
		}
		if (isset($_POST['unit5'])) {
			$unit5 = $_POST['unit5'];
		}
		if (isset($_POST['unit6'])) {
			$unit6 = $_POST['unit6'];
		}
		if (isset($_POST['unit7'])) {
			$unit7 = $_POST['unit7'];
		}
		if (isset($_POST['amount1'])) {
			$amount1 = $_POST['amount1'];
		}
		if (isset($_POST['amount2'])) {
			$amount2 = $_POST['amount2'];
		}
		if (isset($_POST['amount3'])) {
			$amount3 = $_POST['amount3'];
		}
		if (isset($_POST['amount4'])) {
			$amount4 = $_POST['amount4'];
		}
		if (isset($_POST['amount5'])) {
			$amount5 = $_POST['amount5'];
		}
		if (isset($_POST['amount6'])) {
			$amount6 = $_POST['amount6'];
		}
		if (isset($_POST['amount7'])) {
			$amount7 = $_POST['amount7'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}

		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		if (isset($_POST['collection_info'])) {
			$collection_info = $_POST['collection_info'];
		}
		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}
		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}


		$eventUpdaet = "UPDATE pay_fees SET grp_fees_id = '" . strip_tags($grp_fees_id) . "', extra_fees_id = '" . strip_tags($extra_fees_id) . "',
	amenity_fees_id = '" . strip_tags($amenity_fees_id) . "', receipt_number = '" . strip_tags($receipt_number) . "', receipt_date='" . strip_tags($receipt_date) . "', 
	register_number='" . strip_tags($register_number) . "', academic_year='" . strip_tags($academic_year) . "', 
	student_id='" . strip_tags($student_id) . "', standard='" . strip_tags($standard) . "', grp_particulars='" . strip_tags($grp_particulars) . "',
	grp_amount='" . strip_tags($grp_amount) . "',amount_recieved='" . strip_tags($amount_recieved) . "',amount_balance='" . strip_tags($amount_balance) . "',
	extra_particulars='" . strip_tags($extra_particulars) . "',extra_amount='" . strip_tags($extra_amount) . "',extra_amount_recieved='" . strip_tags($extra_amount_recieved) . "',
	extra_amount_balance='" . strip_tags($extra_amount_balance) . "',amenity_particulars='" . strip_tags($amenity_particulars) . "',amenity_amount='" . strip_tags($amenity_amount) . "',
	amenity_amount_recieved='" . strip_tags($amenity_amount_recieved) . "',  amenity_amount_balance = '" . strip_tags($amenity_amount_balance) . "', qty1='" . strip_tags($qty1) . "', qty2='" . strip_tags($qty2) . "',qty3='" . strip_tags($qty3) . "',
	qty4='" . strip_tags($qty4) . "',qty5='" . strip_tags($qty5) . "',qty6='" . strip_tags($qty6) . "', qty7='" . strip_tags($qty7) . "', unit1='" . strip_tags($unit1) . "', unit2='" . strip_tags($unit2) . "',
	unit3='" . strip_tags($unit3) . "', unit4='" . strip_tags($unit4) . "', unit5='" . strip_tags($unit5) . "', unit6='" . strip_tags($unit6) . "', unit7='" . strip_tags($unit7) . "',
	result='" . strip_tags($result) . "', amount1='" . strip_tags($amount1) . "', amount2='" . strip_tags($amount2) . "', amount3='" . strip_tags($amount3) . "',
	amount4='" . strip_tags($amount4) . "',amount5='" . strip_tags($amount5) . "',amount6='" . strip_tags($amount6) . "', amount7='" . strip_tags($amount7) . "', final_amount_recieved='" . strip_tags($final_amount_recieved) . "', 
	other_charges='" . strip_tags($other_charges) . "', other_charges_recieved='" . strip_tags($other_charges_recieved) . "', 
	fees_total='" . strip_tags($fees_total) . "', fees_scholarship='" . strip_tags($fees_scholarship) . "', collection_info='" . strip_tags($collection_info) . "', fees_balance='" . strip_tags($fees_balance) . "',
	cheque_number='" . strip_tags($cheque_number) . "', cheque_amount='" . strip_tags($cheque_amount) . "', cheque_date='" . strip_tags($cheque_date) . "',
	cheque_bank_name='" . strip_tags($cheque_bank_name) . "',cheque_ledger_name='" . strip_tags($cheque_ledger_name) . "',neft_number='" . strip_tags($neft_number) . "',neft_amount='" . strip_tags($neft_amount) . "',
	neft_date='" . strip_tags($neft_date) . "',neft_bank_name='" . strip_tags($neft_bank_name) . "',neft_ledger_name='" . strip_tags($neft_ledger_name) . "',
	fees_collected='" . strip_tags($fees_collected) . "', update_login_id='" . strip_tags($userid) . "',school_id ='" . strip_tags($school_id) . "', status = '0' WHERE pay_fees_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($eventUpdaet) or die("Error in in update Query!." . $mysqli->error);
	}

	//  Delete Trustee
	public function deletePayfeesCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$eventDelete = "UPDATE pay_fees set status='1', delete_login_id='" . strip_tags($userid) . "' WHERE pay_fees_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($eventDelete) or die("Error in delete query" . $mysqli->error);
	}

	public function updatePayConcessionfeesCreation($mysqli, $userid)
	{



		if (isset($_POST['student_id'])) {
			$student_idd = $_POST['student_id'];
		}

		if (isset($_POST['student_name1'])) {
			$student_id = $_POST['student_name1'];
		}
		if ($_POST['student_id'] == '') {
			$student_id = $_POST['student_name1'];
		} else {
			$student_id = $_POST['student_id'];
		}
		// print_r($student_id); die;
		if (isset($_POST['grp_fees_id'])) {
			$grp_fees_idstr = $_POST['grp_fees_id'];
			$grp_fees_id = implode(",", $grp_fees_idstr);
		}
		if (isset($_POST['extra_fees_id'])) {
			$extra_fees_idstr = $_POST['extra_fees_id'];
			$extra_fees_id = implode(",", $extra_fees_idstr);
		}
		if (isset($_POST['amenity_fees_id'])) {
			$amenity_fees_idstr = $_POST['amenity_fees_id'];
			$amenity_fees_id = implode(",", $amenity_fees_idstr);
		}
		if (isset($_SESSION['academic_year'])) {
			$academic_year = $_SESSION['academic_year'];
			$school_id = $_SESSION['school_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}
		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = implode(",", $grp_particularsstr);
		}
		if (isset($_POST['paid_fees1'])) {
			$paid_fees1str = $_POST['paid_fees1'];
			$amount_recieved = implode(",", $paid_fees1str);
		}
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$grp_amount = implode(",", $amount_balancestr);
		}
		if (isset($_POST['grp_concession_amount'])) {
			$grp_concession_amountstr = $_POST['grp_concession_amount'];
			// $grp_concession_amount = implode(",",$grp_concession_amountstr); 
		}

		if (isset($_POST['grp_concession_amount1'])) {
			$grp_concession_amount1str = $_POST['grp_concession_amount1'];
		}

		$grp_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $grp_concession_amountstr, $grp_concession_amount1str);
		$grp_concession_amount = ltrim(implode(",", $grp_concession_amount11), ',');


		if (isset($_POST['grp_balance_amount'])) {
			$grp_balance_amountstr = $_POST['grp_balance_amount'];
			$grp_balance_amount = implode(",", $grp_balance_amountstr);
		}
		if (isset($_POST['grp_remarks'])) {
			$grp_remarksstr = $_POST['grp_remarks'];
			$grp_remarks = implode(",", $grp_remarksstr);
		} else {
			$grp_remarks = "";
		}
		if (isset($_POST['extra_particulars'])) {
			$extra_particularsstr = $_POST['extra_particulars'];
			$extra_particulars = implode(",", $extra_particularsstr);
		}
		if (isset($_POST['paid_fees2'])) {
			$paid_fees2str = $_POST['paid_fees2'];
			$extra_amount_recieved = implode(",", $paid_fees2str);
		}
		if (isset($_POST['extra_amount'])) {
			$extra_amountstr = $_POST['extra_amount'];
			$extra_amount = implode(",", $extra_amountstr);
		}
		if (isset($_POST['extra_concession_amount'])) {
			$extra_concession_amountstr = $_POST['extra_concession_amount'];
			// $extra_concession_amount = implode(",",$extra_concession_amountstr); 
		}
		if (isset($_POST['extra_concession_amount1'])) {
			$extra_concession_amount1str = $_POST['extra_concession_amount1'];
		}

		$extra_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $extra_concession_amountstr, $extra_concession_amount1str);
		$extra_concession_amount = ltrim(implode(",", $extra_concession_amount11), ',');


		if (isset($_POST['extra_balance_amount'])) {
			$extra_balance_amountstr = $_POST['extra_balance_amount'];
			$extra_amount_balance = implode(",", $extra_balance_amountstr);
		}
		if (isset($_POST['extra_remarks'])) {
			$extra_remarksstr = $_POST['extra_remarks'];
			$extra_remarks = implode(",", $extra_remarksstr);
		}
		if (isset($_POST['amenity_particulars'])) {
			$amenity_particularsstr = $_POST['amenity_particulars'];
			$amenity_particulars = implode(",", $amenity_particularsstr);
		}
		if (isset($_POST['paid_fees3'])) {
			$paid_fees3str = $_POST['paid_fees3'];
			$amenity_amount_recieved = implode(",", $paid_fees3str);
		}
		if (isset($_POST['amenity_amount'])) {
			$amenity_amountstr = $_POST['amenity_amount'];
			$amenity_amount = implode(",", $amenity_amountstr);
		}
		if (isset($_POST['amenity_concession_amount'])) {
			$amenity_concession_amountstr = $_POST['amenity_concession_amount'];
			// $amenity_concession_amount = implode(",",$amenity_concession_amountstr); 
		}
		if (isset($_POST['amenity_concession_amount1'])) {
			$amenity_concession_amount1str = $_POST['amenity_concession_amount1'];
		}
		$amenity_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $amenity_concession_amountstr, $amenity_concession_amount1str);
		$amenity_concession_amount = ltrim(implode(",", $amenity_concession_amount11), ',');

		if (isset($_POST['amenity_balance_amount'])) {
			$amenity_balance_amountstr = $_POST['amenity_balance_amount'];
			$amenity_balance_amount = implode(",", $amenity_balance_amountstr);
		}
		if (isset($_POST['amenity_remarks'])) {
			$amenity_remarksstr = $_POST['amenity_remarks'];
			$amenity_remarks = implode(",", $amenity_remarksstr);
		}
		if (isset($_POST['payfeesid'])) {
			$payfeesid = $_POST['payfeesid'];

			if ($payfeesid == '0') {

				$mysqli->query("INSERT INTO pay_fees (student_id,grp_fees_id,extra_fees_id,amenity_fees_id,academic_year,standard,grp_particulars,amount_recieved,grp_amount,grp_concession_amount,amount_balance,grp_remarks,extra_particulars,extra_amount_recieved,extra_amount,extra_concession_amount,extra_amount_balance,extra_remarks,amenity_particulars,amenity_amount_recieved,amenity_amount,amenity_concession_amount,amenity_amount_balance,amenity_remarks,school_id,status,insert_login_id) VALUES ('$student_id','$grp_fees_id','$extra_fees_id','$amenity_fees_id','$academic_year','$standard','$grp_particulars','$amount_recieved','$grp_amount','$grp_concession_amount','$grp_balance_amount','$grp_remarks','$extra_particulars','$extra_amount_recieved','$extra_amount','$extra_concession_amount','$extra_amount_balance','$extra_remarks','$amenity_particulars','$amenity_amount_recieved','$amenity_amount','$amenity_concession_amount','$amenity_balance_amount','$amenity_remarks','$school_id','0','$userid')") or die("Error in in update Query!." . $mysqli->error);
			} else {


				$mysqli->query("UPDATE pay_fees SET grp_concession_amount = '$grp_concession_amount',amount_balance = '$grp_balance_amount',grp_remarks = '$grp_remarks',
				extra_concession_amount = '$extra_concession_amount',extra_amount_balance = '$extra_amount_balance',extra_remarks = '$extra_remarks',amenity_concession_amount = '$amenity_concession_amount',amenity_amount_balance = '$amenity_balance_amount',amenity_remarks = '$amenity_remarks',update_login_id = '$userid' WHERE student_id = '$student_id' AND academic_year = '$academic_year' AND standard = '$standard' AND school_id = '$school_id' AND pay_fees_id ='$payfeesid'") or die("Error in in update Query!." . $mysqli->error);
			}
		}
		if (isset($_POST['trans_fees_id'])) {
			$trans_fees_id = $_POST['trans_fees_id'];
		}
		if (isset($_POST['trans_particulars'])) {
			$trans_particularsstr = $_POST['trans_particulars'];
			$trans_particulars = implode(",", $trans_particularsstr);
		}
		if (isset($_POST['trans_concession_amount'])) {
			$trans_concession_amountstr = $_POST['trans_concession_amount'];
			// $trans_concession_amount = implode(",",$trans_concession_amountstr); 
		}
		if (isset($_POST['trans_concession_amount1'])) {
			$trans_concession_amount1str = $_POST['trans_concession_amount1'];
		}
		$trans_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $trans_concession_amountstr, $trans_concession_amount1str);
		$trans_concession_amount = ltrim(implode(",", $trans_concession_amount11), ',');

		if (isset($_POST['trans_amount'])) {
			$trans_amountstr = $_POST['trans_amount'];
			$trans_amount = implode(",", $trans_amountstr);
		}
		if (isset($_POST['trans_fees3'])) {
			$trans_fees3str = $_POST['trans_fees3'];
			$trans_fees3 = implode(",", $trans_fees3str);
		}
		if (isset($_POST['trans_balance_amount'])) {
			$trans_balance_amountstr = $_POST['trans_balance_amount'];
			$trans_balance_amount = implode(",", $trans_balance_amountstr);
		}
		if (isset($_POST['trans_remarks'])) {
			$trans_remarksstr = $_POST['trans_remarks'];
			$trans_remarks = implode(",", $trans_remarksstr);
		}
		if (isset($_POST['transport_fees_mas_id'])) {
			$transport_fees_mas_id = $_POST['transport_fees_mas_id'];
		}
		// print_r('pay_transport_fees_id'); die;
		if (isset($_POST['pay_transport_fees_id'])) {
			$pay_transport_fees_id = $_POST['pay_transport_fees_id'];

			if ($pay_transport_fees_id == '0') {
				$mysqli->query("INSERT INTO pay_transport_fees (student_id,transport_fees_master_id,academic_year,standard,grp_particulars,transport_concession_amount,grp_amount,amount_recieved,amount_balance,transport_remark,school_id,insert_login_id) VALUES ('$student_id','$trans_fees_id','$academic_year','$standard','$trans_particulars','$trans_concession_amount','$trans_amount','$trans_fees3','$trans_balance_amount','$trans_remarks','$school_id','$userid')") or die("Error in in update Query!." . $mysqli->error);
				// echo "INSERT INTO pay_transport_fees (student_id,transport_fees_master_id,academic_year,standard,grp_particulars,transport_concession_amount,grp_amount,amount_recieved,amount_balance,transport_remark,school_id,insert_login_id) VALUES ('$student_id','$trans_fees_id','$academic_year','$standard','$trans_particulars','$trans_concession_amount','$trans_amount','$trans_fees3','$trans_balance_amount','$trans_remarks','$school_id','$userid')"; die;
			} else {

				$mysqli->query("UPDATE pay_transport_fees SET transport_concession_amount = '$trans_concession_amount',amount_balance = '$trans_balance_amount',transport_remark = '$trans_remarks',update_login_id = '$userid' WHERE student_id = '$student_id' AND academic_year = '$academic_year' AND standard = '$standard' AND school_id = '$school_id' AND pay_transport_fees_id ='$pay_transport_fees_id' AND transport_fees_master_id='$transport_fees_mas_id'") or die("Error in in update Query!." . $mysqli->error);
			}
		}
	}

	//pay Transport fees
	public function addPayTransportfeesCreation($mysqli, $userid, $school_id)
	{

		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date = $_POST['receipt_date'];
		}
		if (isset($_POST['register_number'])) {
			$register_number = $_POST['register_number'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['student_id'])) {
			$student_id = $_POST['student_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}

		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = ltrim(implode(",", $grp_particularsstr), ',');
		}
		if (isset($_POST['grp_amount'])) {
			$grp_amountstr = $_POST['grp_amount'];
			$grp_amount = ltrim(implode(",", $grp_amountstr), ',');
		}

		// if(isset($_POST['transport_fees_master_id'])){ 
		// 	$transport_fees_master_idstr = $_POST['transport_fees_master_id'];
		// 	$transport_fees_master_id = ltrim(implode(",",$transport_fees_master_idstr),','); 
		// } 
		if (isset($_POST['transport_fees_master_id'])) {
			$transport_fees_master_id = $_POST['transport_fees_master_id'];

			// $transport_fees_master_id_array = explode(",", $transport_fees_master_idstr);
			// $transport_fees_master_id = implode(",", $transport_fees_master_id_array);
		}
		// if(isset($_POST['transport_fees_master_id'])){ 
		// 	$transport_fees_master_idstr = $_POST['transport_fees_master_id'];
		// 	$transport_fees_master_id = ltrim(implode(",",$transport_fees_master_idstr),','); 
		// } 
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$amount_balance = ltrim(implode(",", $amount_balancestr), ',');
		}

		if (isset($_POST['qty1'])) {
			$qty1 = $_POST["qty1"];
		}
		if (isset($_POST['qty2'])) {
			$qty2 = $_POST["qty2"];
		}
		if (isset($_POST['qty3'])) {
			$qty3 = $_POST["qty3"];
		}
		if (isset($_POST['qty4'])) {
			$qty4 = $_POST["qty4"];
		}
		if (isset($_POST['qty5'])) {
			$qty5 = $_POST["qty5"];
		}
		if (isset($_POST['qty6'])) {
			$qty6 = $_POST["qty6"];
		}
		if (isset($_POST['qty7'])) {
			$qty7 = $_POST["qty7"];
		}
		if (isset($_POST['unit1'])) {
			$unit1 = $_POST['unit1'];
		}
		if (isset($_POST['unit2'])) {
			$unit2 = $_POST['unit2'];
		}
		if (isset($_POST['unit3'])) {
			$unit3 = $_POST['unit3'];
		}
		if (isset($_POST['unit4'])) {
			$unit4 = $_POST['unit4'];
		}
		if (isset($_POST['unit5'])) {
			$unit5 = $_POST['unit5'];
		}
		if (isset($_POST['unit6'])) {
			$unit6 = $_POST['unit6'];
		}
		if (isset($_POST['unit7'])) {
			$unit7 = $_POST['unit7'];
		}
		if (isset($_POST['amount1'])) {
			$amount1 = $_POST['amount1'];
		}
		if (isset($_POST['amount2'])) {
			$amount2 = $_POST['amount2'];
		}
		if (isset($_POST['amount3'])) {
			$amount3 = $_POST['amount3'];
		}
		if (isset($_POST['amount4'])) {
			$amount4 = $_POST['amount4'];
		}
		if (isset($_POST['amount5'])) {
			$amount5 = $_POST['amount5'];
		}
		if (isset($_POST['amount6'])) {
			$amount6 = $_POST['amount6'];
		}
		if (isset($_POST['amount7'])) {
			$amount7 = $_POST['amount7'];
		}

		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}

		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		if (isset($_POST['collection_info'])) {
			$collection_info = $_POST['collection_info'];
		}
		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}
		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}

		if (isset($_POST['transport_fees_total'])) {
			$transport_fees_total = $_POST['transport_fees_total'];
		}
		if (isset($_POST['transport_concession_fees_total'])) {
			$transport_concession_fees_total = $_POST['transport_concession_fees_total'];
		}
		if (isset($_POST['transport_received_fees_total'])) {
			$transport_received_fees_total = $_POST['transport_received_fees_total'];
		}


		if (isset($_POST['transport_concession_amount12'])) {
			if ($_POST['transport_concession_amount12'] == '0') {
				$transport_concession_amount12str = ['0'];
			} else {

				$transport_concession_amount12str = $_POST['transport_concession_amount12'];
			}
		}
		if (isset($_POST['transport_concession_amount'])) {
			$transport_concession_amount13str = $_POST['transport_concession_amount'];
			$transport_concession_amountref = ltrim(implode(",", $transport_concession_amount13str), ',');
		}



		if (isset($_POST['amount_recieved12'])) {
			if ($_POST['amount_recieved12'] == '0') {
				$amount_recieved12str = ['0'];
			} else {

				$amount_recieved12str = $_POST['amount_recieved12'];
			}
		}
		if (isset($_POST['amount_recieved'])) {
			$amount_recieved13str = $_POST['amount_recieved'];
			$amount_recievedref = ltrim(implode(",", $amount_recieved13str), ',');
		}
		$amount_received11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $amount_recieved12str, $amount_recieved13str);
		$amount_recieved = ltrim(implode(",", $amount_received11), ',');

		$transport_concession_amount11 =  array_map(function ($a, $b) {
			return $a + $b;
		}, $transport_concession_amount12str, $transport_concession_amount13str);
		$transport_concession_amount = ltrim(implode(",", $transport_concession_amount11), ',');


		$selectClass = $mysqli->query("SELECT * FROM pay_transport_fees WHERE 1");

		$student_id1 = array();

		while ($row = $selectClass->fetch_assoc()) {

			$student_id1[]    = $row["student_id"];
		}

		if (isset($_POST['stud_id'])) {
			$stud_id = $_POST['stud_id'];

			if (in_array($stud_id, $student_id1)) {

				$eventUpdaet = "UPDATE pay_transport_fees SET transport_fees_master_id = '" . strip_tags($transport_fees_master_id) . "', receipt_number = '" . strip_tags($receipt_number) . "', receipt_date='" . strip_tags($receipt_date) . "', 
			register_number='" . strip_tags($register_number) . "', academic_year='" . strip_tags($academic_year) . "', 
			student_id='" . strip_tags($student_id) . "', standard='" . strip_tags($standard) . "', grp_particulars='" . strip_tags($grp_particulars) . "',
			grp_amount='" . strip_tags($grp_amount) . "',amount_recieved='" . strip_tags($amount_recieved) . "',amount_balance='" . strip_tags($amount_balance) . "',
			qty1='" . strip_tags($qty1) . "', qty2='" . strip_tags($qty2) . "',qty3='" . strip_tags($qty3) . "',
			qty4='" . strip_tags($qty4) . "',qty5='" . strip_tags($qty5) . "',qty6='" . strip_tags($qty6) . "', qty7='" . strip_tags($qty7) . "', unit1='" . strip_tags($unit1) . "', unit2='" . strip_tags($unit2) . "',
			unit3='" . strip_tags($unit3) . "', unit4='" . strip_tags($unit4) . "', unit5='" . strip_tags($unit5) . "', unit6='" . strip_tags($unit6) . "', unit7='" . strip_tags($unit7) . "',
			result='" . strip_tags($result) . "', amount1='" . strip_tags($amount1) . "', amount2='" . strip_tags($amount2) . "', amount3='" . strip_tags($amount3) . "',
			amount4='" . strip_tags($amount4) . "',amount5='" . strip_tags($amount5) . "',amount6='" . strip_tags($amount6) . "', amount7='" . strip_tags($amount7) . "', final_amount_recieved='" . strip_tags($final_amount_recieved) . "', 
			fees_total='" . strip_tags($fees_total) . "', collection_info='" . strip_tags($collection_info) . "', fees_balance='" . strip_tags($fees_balance) . "',
			cheque_number='" . strip_tags($cheque_number) . "', cheque_amount='" . strip_tags($cheque_amount) . "', cheque_date='" . strip_tags($cheque_date) . "',
			cheque_bank_name='" . strip_tags($cheque_bank_name) . "',cheque_ledger_name='" . strip_tags($cheque_ledger_name) . "',neft_number='" . strip_tags($neft_number) . "',neft_amount='" . strip_tags($neft_amount) . "',
			neft_date='" . strip_tags($neft_date) . "',neft_bank_name='" . strip_tags($neft_bank_name) . "',neft_ledger_name='" . strip_tags($neft_ledger_name) . "',
			fees_collected='" . strip_tags($fees_collected) . "', update_login_id='" . strip_tags($userid) . "', transport_concession_amount = '" . $transport_concession_amount . "',school_id ='" . strip_tags($school_id) . "', status = '0' WHERE student_id= '" . strip_tags($stud_id) . "' ";
				$updresult = $mysqli->query($eventUpdaet);
				$UpdateId = $mysqli->affected_rows;


				$eventreffInsert = "INSERT INTO transport_fees_ref(student_id, transport_fees_id, transport_fees_total, transport_concession_fees_total, transport_received_fees_total,insert_login_id,school_id) 
			VALUES('" . strip_tags($student_id) . "','" . $UpdateId . "', '" . strip_tags($transport_fees_total) . "',
			'" . strip_tags($transport_concession_fees_total) . "', '" . strip_tags($transport_received_fees_total) . "', '" . strip_tags($userid) . "' ,'" . strip_tags($school_id) . "')";
				$insresult = $mysqli->query($eventreffInsert);
			} else {

				$eventInsert = "INSERT INTO pay_transport_fees(receipt_number, receipt_date, register_number, academic_year, student_id, standard, grp_particulars, grp_amount,
			amount_recieved, amount_balance, qty1, qty2, qty3, qty4, qty5, qty6, qty7, unit1, unit2, unit3, unit4, unit5, unit6, unit7, amount1, amount2, amount3, amount4, amount5, amount6,
			amount7, fees_total, result, final_amount_recieved, fees_collected, fees_balance, collection_info, cheque_number,
			cheque_amount, cheque_date, cheque_bank_name, cheque_ledger_name, neft_number, neft_amount, neft_date,  neft_bank_name, neft_ledger_name, transport_fees_master_id,
			insert_login_id, transport_concession_amount,school_id) 
			VALUES('" . strip_tags($receipt_number) . "','" . strip_tags($receipt_date) . "', '" . strip_tags($register_number) . "', 
			'" . strip_tags($academic_year) . "', '" . strip_tags($student_id) . "','" . strip_tags($standard) . "', '" . strip_tags($grp_particulars) . "', '" . strip_tags($grp_amount) . "',
			'" . strip_tags($amount_recieved) . "', '" . strip_tags($amount_balance) . "', '" . strip_tags($qty1) . "', '" . strip_tags($qty2) . "','" . strip_tags($qty3) . "',	
			'" . strip_tags($qty4) . "','" . strip_tags($qty5) . "', '" . strip_tags($qty6) . "', '" . strip_tags($qty7) . "',
			'" . strip_tags($unit1) . "', '" . strip_tags($unit2) . "', '" . strip_tags($unit3) . "',
			'" . strip_tags($unit4) . "', '" . strip_tags($unit5) . "', '" . strip_tags($unit6) . "', '" . strip_tags($unit7) . "', '" . strip_tags($amount1) . "', '" . strip_tags($amount2) . "', 
			'" . strip_tags($amount3) . "', '" . strip_tags($amount4) . "', '" . strip_tags($amount5) . "','" . strip_tags($amount6) . "', '" . strip_tags($amount7) . "', '" . strip_tags($fees_total) . "',
			'" . strip_tags($result) . "', '" . strip_tags($final_amount_recieved) . "', '" . strip_tags($fees_collected) . "', '" . strip_tags($fees_balance) . "','" . strip_tags($collection_info) . "', '" . strip_tags($cheque_number) . "', '" . strip_tags($cheque_amount) . "', '" . strip_tags($cheque_date) . "', 
			'" . strip_tags($cheque_bank_name) . "', '" . strip_tags($cheque_ledger_name) . "', '" . strip_tags($neft_number) . "', '" . strip_tags($neft_amount) . "', '" . strip_tags($neft_date) . "',
			'" . strip_tags($neft_bank_name) . "', '" . strip_tags($neft_ledger_name) . "', '" . strip_tags($transport_fees_master_id) . "','" . strip_tags($userid) . "','" . strip_tags($transport_concession_amount) . "','" . strip_tags($school_id) . "')";
				$insresult = $mysqli->query($eventInsert);
				$InsertId = $mysqli->insert_id;

				$eventreffInsert = "INSERT INTO transport_fees_ref(student_id, transport_fees_id, transport_fees_total, transport_concession_fees_total, transport_received_fees_total,insert_login_id,school_id) 
			VALUES('" . strip_tags($student_id) . "','" . $InsertId . "', '" . strip_tags($transport_fees_total) . "',
			'" . strip_tags($transport_concession_fees_total) . "', '" . strip_tags($transport_received_fees_total) . "', '" . strip_tags($userid) . "','" . strip_tags($school_id) . "')";
				$insresult = $mysqli->query($eventreffInsert);
			}
		}
	}

	// Get Trustee
	public function getPayTransportfeesCreation($mysqli, $id)
	{

		$eventSelect = "SELECT * FROM pay_transport_fees WHERE pay_transport_fees_id='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($eventSelect) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['pay_transport_fees_id']      = $row->pay_transport_fees_id;
			$detailrecords['receipt_number']    = $row->receipt_number;
			$detailrecords['receipt_date']    = $row->receipt_date;
			$detailrecords['register_number']      = $row->register_number;
			$detailrecords['academic_year']       = $row->academic_year;
			$detailrecords['student_id']         = $row->student_id;
			$detailrecords['standard']       = $row->standard;
			$detailrecords['grp_particulars']       = $row->grp_particulars;
			$detailrecords['grp_amount']       = $row->grp_amount;
			$detailrecords['amount_recieved']       = $row->amount_recieved;
			$detailrecords['amount_balance']       = $row->amount_balance;
			$detailrecords['qty1']       = $row->qty1;
			$detailrecords['qty2']       = $row->qty2;
			$detailrecords['qty3']       = $row->qty3;
			$detailrecords['qty4']       = $row->qty4;
			$detailrecords['qty5']       = $row->qty5;
			$detailrecords['qty6']       = $row->qty6;
			$detailrecords['qty7']       = $row->qty7;
			$detailrecords['unit1']       = $row->unit1;
			$detailrecords['unit2']       = $row->unit2;
			$detailrecords['unit3']       = $row->unit3;
			$detailrecords['unit4']       = $row->unit4;
			$detailrecords['unit5']       = $row->unit5;
			$detailrecords['unit6']       = $row->unit6;
			$detailrecords['unit7']       = $row->unit7;
			$detailrecords['amount1']       = $row->amount1;
			$detailrecords['amount2']       = $row->amount2;
			$detailrecords['amount3']       = $row->amount3;
			$detailrecords['amount4']       = $row->amount4;
			$detailrecords['amount5']       = $row->amount5;
			$detailrecords['amount6']       = $row->amount6;
			$detailrecords['amount7']       = $row->amount7;
			$detailrecords['fees_total']       = $row->fees_total;
			$detailrecords['result']       = $row->result;
			$detailrecords['final_amount_recieved']       = $row->final_amount_recieved;
			$detailrecords['fees_collected']       = $row->fees_collected;
			$detailrecords['fees_balance']       = $row->fees_balance;
			$detailrecords['collection_info']       = $row->collection_info;
			$detailrecords['cheque_number']       = $row->cheque_number;
			$detailrecords['cheque_amount']       = $row->cheque_amount;
			$detailrecords['cheque_date']       = $row->cheque_date;
			$detailrecords['cheque_bank_name']       = $row->cheque_bank_name;
			$detailrecords['cheque_ledger_name']       = $row->cheque_ledger_name;
			$detailrecords['neft_number']       = $row->neft_number;
			$detailrecords['neft_amount']       = $row->neft_amount;
			$detailrecords['neft_date']       = $row->neft_date;
			$detailrecords['neft_bank_name']       = $row->neft_bank_name;
			$detailrecords['neft_ledger_name']       = $row->neft_ledger_name;
			$detailrecords['transport_fees_master_id']       = $row->transport_fees_master_id;
		}

		return $detailrecords;
	}

	// Update Trustee
	public function updatePayTransportfeesCreation($mysqli, $id, $userid)
	{

		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date = $_POST['receipt_date'];
		}
		if (isset($_POST['register_number'])) {
			$register_number = $_POST['register_number'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['student_id'])) {
			$student_id = $_POST['student_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}

		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = ltrim(implode(",", $grp_particularsstr), ',');
		}
		if (isset($_POST['grp_amount'])) {
			$grp_amountstr = $_POST['grp_amount'];
			$grp_amount = ltrim(implode(",", $grp_amountstr), ',');
		}
		if (isset($_POST['amount_recieved'])) {
			$amount_recievedstr = $_POST['amount_recieved'];
			$amount_recieved = ltrim(implode(",", $amount_recievedstr), ',');
			// $amount_recieved = explode(",",$amount_recieved_arr); 
		}
		if (isset($_POST['transport_fees_master_id'])) {
			$transport_fees_master_idstr = $_POST['transport_fees_master_id'];
			$transport_fees_master_id = ltrim(implode(",", $transport_fees_master_idstr), ',');
		}
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$amount_balance = ltrim(implode(",", $amount_balancestr), ',');
		}

		if (isset($_POST['qty1'])) {
			$qty1 = $_POST["qty1"];
		}
		if (isset($_POST['qty2'])) {
			$qty2 = $_POST["qty2"];
		}
		if (isset($_POST['qty3'])) {
			$qty3 = $_POST["qty3"];
		}
		if (isset($_POST['qty4'])) {
			$qty4 = $_POST["qty4"];
		}
		if (isset($_POST['qty5'])) {
			$qty5 = $_POST["qty5"];
		}
		if (isset($_POST['qty6'])) {
			$qty6 = $_POST["qty6"];
		}
		if (isset($_POST['qty7'])) {
			$qty7 = $_POST["qty7"];
		}
		if (isset($_POST['unit1'])) {
			$unit1 = $_POST['unit1'];
		}
		if (isset($_POST['unit2'])) {
			$unit2 = $_POST['unit2'];
		}
		if (isset($_POST['unit3'])) {
			$unit3 = $_POST['unit3'];
		}
		if (isset($_POST['unit4'])) {
			$unit4 = $_POST['unit4'];
		}
		if (isset($_POST['unit5'])) {
			$unit5 = $_POST['unit5'];
		}
		if (isset($_POST['unit6'])) {
			$unit6 = $_POST['unit6'];
		}
		if (isset($_POST['unit7'])) {
			$unit7 = $_POST['unit7'];
		}
		if (isset($_POST['amount1'])) {
			$amount1 = $_POST['amount1'];
		}
		if (isset($_POST['amount2'])) {
			$amount2 = $_POST['amount2'];
		}
		if (isset($_POST['amount3'])) {
			$amount3 = $_POST['amount3'];
		}
		if (isset($_POST['amount4'])) {
			$amount4 = $_POST['amount4'];
		}
		if (isset($_POST['amount5'])) {
			$amount5 = $_POST['amount5'];
		}
		if (isset($_POST['amount6'])) {
			$amount6 = $_POST['amount6'];
		}
		if (isset($_POST['amount7'])) {
			$amount7 = $_POST['amount7'];
		}

		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}

		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		if (isset($_POST['collection_info'])) {
			$collection_info = $_POST['collection_info'];
		}
		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}
		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}


		$eventUpdaet = "UPDATE pay_transport_fees SET transport_fees_master_id = '" . strip_tags($transport_fees_master_id) . "', receipt_number = '" . strip_tags($receipt_number) . "', receipt_date='" . strip_tags($receipt_date) . "', 
		register_number='" . strip_tags($register_number) . "', academic_year='" . strip_tags($academic_year) . "', 
		student_id='" . strip_tags($student_id) . "', standard='" . strip_tags($standard) . "', grp_particulars='" . strip_tags($grp_particulars) . "',
		grp_amount='" . strip_tags($amount_balance) . "',amount_recieved='" . strip_tags($amount_recieved) . "',amount_balance='" . strip_tags($amount_balance) . "',
		qty1='" . strip_tags($qty1) . "', qty2='" . strip_tags($qty2) . "',qty3='" . strip_tags($qty3) . "',
		qty4='" . strip_tags($qty4) . "',qty5='" . strip_tags($qty5) . "',qty6='" . strip_tags($qty6) . "', qty7='" . strip_tags($qty7) . "', unit1='" . strip_tags($unit1) . "', unit2='" . strip_tags($unit2) . "',
		unit3='" . strip_tags($unit3) . "', unit4='" . strip_tags($unit4) . "', unit5='" . strip_tags($unit5) . "', unit6='" . strip_tags($unit6) . "', unit7='" . strip_tags($unit7) . "',
		result='" . strip_tags($result) . "', amount1='" . strip_tags($amount1) . "', amount2='" . strip_tags($amount2) . "', amount3='" . strip_tags($amount3) . "',
		amount4='" . strip_tags($amount4) . "',amount5='" . strip_tags($amount5) . "',amount6='" . strip_tags($amount6) . "', amount7='" . strip_tags($amount7) . "', final_amount_recieved='" . strip_tags($final_amount_recieved) . "', 
		fees_total='" . strip_tags($fees_total) . "', collection_info='" . strip_tags($collection_info) . "', fees_balance='" . strip_tags($fees_balance) . "',
		cheque_number='" . strip_tags($cheque_number) . "', cheque_amount='" . strip_tags($cheque_amount) . "', cheque_date='" . strip_tags($cheque_date) . "',
		cheque_bank_name='" . strip_tags($cheque_bank_name) . "',cheque_ledger_name='" . strip_tags($cheque_ledger_name) . "',neft_number='" . strip_tags($neft_number) . "',neft_amount='" . strip_tags($neft_amount) . "',
		neft_date='" . strip_tags($neft_date) . "',neft_bank_name='" . strip_tags($neft_bank_name) . "',neft_ledger_name='" . strip_tags($neft_ledger_name) . "',
		fees_collected='" . strip_tags($fees_collected) . "', update_login_id='" . strip_tags($userid) . "', status = '0' WHERE pay_transport_fees_id= '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($eventUpdaet) or die("Error in in update Query!." . $mysqli->error);
	}

	//  Delete Trustee
	public function deletePayTransportfeesCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$eventDelete = "UPDATE pay_transport_fees set status='1', delete_login_id='" . strip_tags($userid) . "' WHERE pay_transport_fees_id = '" . strip_tags($id) . "' ";
		$runQry = $mysqli->query($eventDelete) or die("Error in delete query" . $mysqli->error);
	}

	function getbilltype($mysqli, $brachid)
	{
		$billmodel = '';
		$getqry = $mysqli->query("SELECT billmodel FROM billsettings WHERE 1 ");
		while ($row = $getqry->fetch_assoc()) {
			$billmodel = $row["billmodel"];
		}
		return $billmodel;
	}

	// Add Event Details
	public function addPayLastYearfeesCreation($mysqli, $userid)
	{

		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date = $_POST['receipt_date'];
		}
		if (isset($_POST['register_number'])) {
			$register_number = $_POST['register_number'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['student_id'])) {
			$student_id = $_POST['student_id'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}

		if (isset($_POST['grp_particulars'])) {
			$grp_particularsstr = $_POST['grp_particulars'];
			$grp_particulars = ltrim(implode(",", $grp_particularsstr), ',');
		}
		if (isset($_POST['grp_amount'])) {
			$grp_amountstr = $_POST['grp_amount'];
			$grp_amount = ltrim(implode(",", $grp_amountstr), ',');
		}
		if (isset($_POST['amount_recieved'])) {
			$amount_recievedstr = $_POST['amount_recieved'];
			$amount_recieved = ltrim(implode(",", $amount_recievedstr), ',');
			// $amount_recieved = explode(",",$amount_recieved_arr); 
		}
		if (isset($_POST['grp_fees_id'])) {
			$grp_fees_idstr = $_POST['grp_fees_id'];
			$grp_fees_id = ltrim(implode(",", $grp_fees_idstr), ',');
		}
		if (isset($_POST['amount_balance'])) {
			$amount_balancestr = $_POST['amount_balance'];
			$amount_balance = ltrim(implode(",", $amount_balancestr), ',');
		}

		if (isset($_POST['grp_concession_amount'])) {
			$grp_concession_amountstr = $_POST['grp_concession_amount'];
			$grp_concession_amount = ltrim(implode(",", $grp_concession_amountstr), ',');
		}

		if (isset($_POST['qty1'])) {
			$qty1 = $_POST["qty1"];
		}
		if (isset($_POST['qty2'])) {
			$qty2 = $_POST["qty2"];
		}
		if (isset($_POST['qty3'])) {
			$qty3 = $_POST["qty3"];
		}
		if (isset($_POST['qty4'])) {
			$qty4 = $_POST["qty4"];
		}
		if (isset($_POST['qty5'])) {
			$qty5 = $_POST["qty5"];
		}
		if (isset($_POST['qty6'])) {
			$qty6 = $_POST["qty6"];
		}
		if (isset($_POST['qty7'])) {
			$qty7 = $_POST["qty7"];
		}
		if (isset($_POST['unit1'])) {
			$unit1 = $_POST['unit1'];
		}
		if (isset($_POST['unit2'])) {
			$unit2 = $_POST['unit2'];
		}
		if (isset($_POST['unit3'])) {
			$unit3 = $_POST['unit3'];
		}
		if (isset($_POST['unit4'])) {
			$unit4 = $_POST['unit4'];
		}
		if (isset($_POST['unit5'])) {
			$unit5 = $_POST['unit5'];
		}
		if (isset($_POST['unit6'])) {
			$unit6 = $_POST['unit6'];
		}
		if (isset($_POST['unit7'])) {
			$unit7 = $_POST['unit7'];
		}
		if (isset($_POST['amount1'])) {
			$amount1 = $_POST['amount1'];
		}
		if (isset($_POST['amount2'])) {
			$amount2 = $_POST['amount2'];
		}
		if (isset($_POST['amount3'])) {
			$amount3 = $_POST['amount3'];
		}
		if (isset($_POST['amount4'])) {
			$amount4 = $_POST['amount4'];
		}
		if (isset($_POST['amount5'])) {
			$amount5 = $_POST['amount5'];
		}
		if (isset($_POST['amount6'])) {
			$amount6 = $_POST['amount6'];
		}
		if (isset($_POST['amount7'])) {
			$amount7 = $_POST['amount7'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['result'])) {
			$result = $_POST['result'];
		}

		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		if (isset($_POST['collection_info'])) {
			$collection_info = $_POST['collection_info'];
		}
		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}
		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		if (isset($_POST['final_fees_balance'])) {
			$final_fees_balance = $_POST['final_fees_balance'];
		}
		if (isset($_POST['final_fees_collected'])) {
			$final_fees_collected = $_POST['final_fees_collected'];
		}
		if (isset($_POST['final_received_fees_total'])) {
			$final_received_fees_total = $_POST['final_received_fees_total'];
		}
		if (isset($_POST['final_concession_fees_total'])) {
			$final_concession_fees_total = $_POST['final_concession_fees_total'];
		}
		if (isset($_POST['final_fees_total'])) {
			$final_fees_total = $_POST['final_fees_total'];
		}
		if (isset($_POST['grp_fees_total'])) {
			$grp_fees_total = $_POST['grp_fees_total'];
		}
		if (isset($_POST['extra_fees_total'])) {
			$extra_fees_total = $_POST['extra_fees_total'];
		}
		if (isset($_POST['amenity_fees_total'])) {
			$amenity_fees_total = $_POST['amenity_fees_total'];
		}
		if (isset($_POST['grp_fees_total_received'])) {
			$grp_fees_total_received = $_POST['grp_fees_total_received'];
		}
		if (isset($_POST['extra_fees_total_received'])) {
			$extra_fees_total_received = $_POST['extra_fees_total_received'];
		}
		if (isset($_POST['amenity_fees_total_received'])) {
			$amenity_fees_total_received = $_POST['amenity_fees_total_received'];
		}
		if (isset($_POST['grp_fees_balance'])) {
			$grp_fees_balance = $_POST['grp_fees_balance'];
		}
		if (isset($_POST['extra_fees_balance'])) {
			$extra_fees_balance = $_POST['extra_fees_balance'];
		}
		if (isset($_POST['amenity_fees_balance'])) {
			$amenity_fees_balance = $_POST['amenity_fees_balance'];
		}

		if (isset($_POST['grp_concession_fees'])) {
			$grp_concession_fees = $_POST['grp_concession_fees'];
		}
		if (isset($_POST['extra_concession_fees'])) {
			$extra_concession_fees = $_POST['extra_concession_fees'];
		}
		if (isset($_POST['amenity_concession_fees'])) {
			$amenity_concession_fees = $_POST['amenity_concession_fees'];
		}

		$selectClass = $mysqli->query("SELECT * FROM pay_last_year_fees WHERE 1");

		$student_id1 = array();

		while ($row = $selectClass->fetch_assoc()) {

			$student_id1[]    = $row["student_id"];
		}

		if (isset($_POST['stud_id'])) {
			$stud_id = $_POST['stud_id'];

			if (in_array($stud_id, $student_id1)) {

				$eventUpdaet = "UPDATE pay_last_year_fees SET grp_fees_id = '" . strip_tags($grp_fees_id) . "', receipt_number = '" . strip_tags($receipt_number) . "', receipt_date='" . strip_tags($receipt_date) . "', 
		register_number='" . strip_tags($register_number) . "', academic_year='" . strip_tags($academic_year) . "', 
		student_id='" . strip_tags($student_id) . "', standard='" . strip_tags($standard) . "', grp_particulars='" . strip_tags($grp_particulars) . "',
		grp_amount='" . strip_tags($amount_balance) . "',amount_recieved='" . strip_tags($amount_recieved) . "',amount_balance='" . strip_tags($amount_balance) . "',
	    qty1='" . strip_tags($qty1) . "', qty2='" . strip_tags($qty2) . "',qty3='" . strip_tags($qty3) . "',
		qty4='" . strip_tags($qty4) . "',qty5='" . strip_tags($qty5) . "',qty6='" . strip_tags($qty6) . "', qty7='" . strip_tags($qty7) . "', unit1='" . strip_tags($unit1) . "', unit2='" . strip_tags($unit2) . "',
		unit3='" . strip_tags($unit3) . "', unit4='" . strip_tags($unit4) . "', unit5='" . strip_tags($unit5) . "', unit6='" . strip_tags($unit6) . "', unit7='" . strip_tags($unit7) . "',
		result='" . strip_tags($result) . "', amount1='" . strip_tags($amount1) . "', amount2='" . strip_tags($amount2) . "', amount3='" . strip_tags($amount3) . "',
		amount4='" . strip_tags($amount4) . "',amount5='" . strip_tags($amount5) . "',amount6='" . strip_tags($amount6) . "', amount7='" . strip_tags($amount7) . "', final_amount_recieved='" . strip_tags($final_amount_recieved) . "', 
		other_charges='" . strip_tags($other_charges) . "', other_charges_recieved='" . strip_tags($other_charges_recieved) . "', 
		fees_total='" . strip_tags($fees_total) . "', collection_info='" . strip_tags($collection_info) . "', fees_balance='" . strip_tags($fees_balance) . "',
		cheque_number='" . strip_tags($cheque_number) . "', cheque_amount='" . strip_tags($cheque_amount) . "', cheque_date='" . strip_tags($cheque_date) . "',
		cheque_bank_name='" . strip_tags($cheque_bank_name) . "',cheque_ledger_name='" . strip_tags($cheque_ledger_name) . "',neft_number='" . strip_tags($neft_number) . "',neft_amount='" . strip_tags($neft_amount) . "',
		neft_date='" . strip_tags($neft_date) . "',neft_bank_name='" . strip_tags($neft_bank_name) . "',neft_ledger_name='" . strip_tags($neft_ledger_name) . "',
		fees_collected='" . strip_tags($fees_collected) . "', update_login_id='" . strip_tags($userid) . "', status = '0' WHERE student_id= '" . strip_tags($stud_id) . "' ";

				$updresult = $mysqli->query($eventUpdaet);
				$UpdateId = $mysqli->affected_rows;

				$eventreffInsert = "INSERT INTO pay_last_year_fees_ref(student_id, pay_last_year_fees_id, final_fees_total, final_received_fees_total, final_fees_collected,
		 final_fees_balance,insert_login_id, grp_fees_total, extra_fees_total, amenity_fees_total,grp_fees_total_received, extra_fees_total_received,
		  amenity_fees_total_received, grp_fees_balance, extra_fees_balance, amenity_fees_balance, amenity_concession_fees, extra_concession_fees, grp_concession_fees) 
		VALUES('" . strip_tags($student_id) . "','" . $UpdateId . "', '" . strip_tags($final_fees_total) . "', 
		'" . strip_tags($final_received_fees_total) . "', '" . strip_tags($final_fees_collected) . "','" . strip_tags($final_fees_balance) . "', '" . strip_tags($userid) . "', '" . strip_tags($grp_fees_total) . "',
		'" . strip_tags($extra_fees_total) . "','" . strip_tags($amenity_fees_total) . "', '" . strip_tags($grp_fees_total_received) . "' , '" . strip_tags($extra_fees_total_received) . "', 
		'" . strip_tags($amenity_fees_total_received) . "', '" . strip_tags($grp_fees_balance) . "', '" . strip_tags($extra_fees_balance) . "', '" . strip_tags($amenity_fees_balance) . "',
		'" . strip_tags($amenity_concession_fees) . "','" . strip_tags($extra_concession_fees) . "','" . strip_tags($grp_concession_fees) . "')";
				$insresult = $mysqli->query($eventreffInsert) or die("Error in Get All Records" . $mysqli->error);
			} else {
				$eventInsert = "INSERT INTO pay_last_year_fees(receipt_number, receipt_date, register_number, academic_year, student_id, standard, grp_particulars, grp_amount,
		amount_recieved, amount_balance, qty1, qty2, qty3, qty4, qty5, qty6, qty7, unit1, unit2, unit3, unit4, unit5, unit6, unit7, amount1, amount2, amount3, amount4, amount5, amount6,
		amount7, other_charges,	other_charges_recieved, fees_total, result, final_amount_recieved, fees_collected, fees_balance, collection_info, cheque_number,
		cheque_amount, cheque_date, cheque_bank_name, cheque_ledger_name, neft_number, neft_amount, neft_date,  neft_bank_name, neft_ledger_name, grp_fees_id,insert_login_id, grp_concession_amount) 
		VALUES('" . strip_tags($receipt_number) . "','" . strip_tags($receipt_date) . "', '" . strip_tags($register_number) . "', 
		'" . strip_tags($academic_year) . "', '" . strip_tags($student_id) . "','" . strip_tags($standard) . "', '" . strip_tags($grp_particulars) . "', '" . strip_tags($amount_balance) . "',
		'" . strip_tags($amount_recieved) . "', '" . strip_tags($amount_balance) . "', '" . strip_tags($qty1) . "', '" . strip_tags($qty2) . "','" . strip_tags($qty3) . "',	'" . strip_tags($qty4) . "','" . strip_tags($qty5) . "', '" . strip_tags($qty6) . "', '" . strip_tags($qty7) . "',
		'" . strip_tags($unit1) . "', '" . strip_tags($unit2) . "', '" . strip_tags($unit3) . "',
		'" . strip_tags($unit4) . "', '" . strip_tags($unit5) . "', '" . strip_tags($unit6) . "', '" . strip_tags($unit7) . "', '" . strip_tags($amount1) . "', '" . strip_tags($amount2) . "', 
		'" . strip_tags($amount3) . "', '" . strip_tags($amount4) . "', '" . strip_tags($amount5) . "',
		'" . strip_tags($amount6) . "', '" . strip_tags($amount7) . "', '" . strip_tags($other_charges) . "', '" . strip_tags($other_charges_recieved) . "', '" . strip_tags($fees_total) . "',
		'" . strip_tags($result) . "', '" . strip_tags($final_amount_recieved) . "', '" . strip_tags($fees_collected) . "', 
		'" . strip_tags($fees_balance) . "','" . strip_tags($collection_info) . "', '" . strip_tags($cheque_number) . "', '" . strip_tags($cheque_amount) . "', '" . strip_tags($cheque_date) . "', 
		'" . strip_tags($cheque_bank_name) . "', '" . strip_tags($cheque_ledger_name) . "', '" . strip_tags($neft_number) . "', '" . strip_tags($neft_amount) . "', '" . strip_tags($neft_date) . "',
		'" . strip_tags($neft_bank_name) . "', '" . strip_tags($neft_ledger_name) . "', '" . strip_tags($grp_fees_id) . "','" . strip_tags($userid) . "', '" . strip_tags($grp_concession_amount) . "')";

				$insresult = $mysqli->query($eventInsert);
				$InsertId = $mysqli->insert_id;

				$eventreffInsert = "INSERT INTO pay_last_year_fees_ref(student_id, pay_last_year_fees_id, final_fees_total, final_received_fees_total, final_fees_collected, final_fees_balance,insert_login_id,
		grp_fees_total, extra_fees_total, amenity_fees_total,grp_fees_total_received, extra_fees_total_received, amenity_fees_total_received, grp_fees_balance,
		amenity_concession_fees, extra_concession_fees, grp_concession_fees) 
		VALUES('" . strip_tags($student_id) . "','" . $InsertId . "', '" . strip_tags($final_fees_total) . "',
		'" . strip_tags($final_received_fees_total) . "', '" . strip_tags($final_fees_collected) . "','" . strip_tags($final_fees_balance) . "', '" . strip_tags($userid) . "',
		'" . strip_tags($grp_fees_total) . "','" . strip_tags($extra_fees_total) . "','" . strip_tags($amenity_fees_total) . "','" . strip_tags($grp_fees_total_received) . "' , '" . strip_tags($extra_fees_total_received) . "', 
		'" . strip_tags($amenity_fees_total_received) . "','" . strip_tags($grp_fees_balance) . "',
		'" . strip_tags($amenity_concession_fees) . "','" . strip_tags($extra_concession_fees) . "','" . strip_tags($grp_concession_fees) . "' )";

				$insresult = $mysqli->query($eventreffInsert) or die("Error in Get All Records" . $mysqli->error);
			}
		}
	}

	// Add Conduct Certificate creation
	public function addTransferCertificateCreation($mysqli, $userid, $school_id)
	{

		if (isset($_POST['serial_number'])) {
			$serial_number = $_POST['serial_number'];
		}
		if (isset($_POST['tmr_code'])) {
			$tmr_code = $_POST['tmr_code'];
		}
		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['certificate_number'])) {
			$certificate_number = $_POST['certificate_number'];
		}
		if (isset($_POST['transfer_date'])) {
			$transfer_date = $_POST['transfer_date'];
		}
		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['district_educational'])) {
			$district_educational = $_POST['district_educational'];
		}
		if (isset($_POST['revenue_district'])) {
			$revenue_district = $_POST['revenue_district'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['parents_name'])) {
			$parents_name = $_POST['parents_name'];
		}
		if (isset($_POST['nationality'])) {
			$nationality = $_POST['nationality'];
		}

		if (isset($_POST['caste'])) {
			$caste = $_POST['caste'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['admission_date'])) {
			$admission_date = $_POST['admission_date'];
		}
		if (isset($_POST['register_words'])) {
			$register_words = $_POST['register_words'];
		}
		if (isset($_POST['personal_identification'])) {
			$personal_identification = $_POST['personal_identification'];
		}
		if (isset($_POST['date_first_admission'])) {
			$date_first_admission = $_POST['date_first_admission'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}
		if (isset($_POST['promotion'])) {
			$promotion = $_POST['promotion'];
		}
		if (isset($_POST['scholarship'])) {
			$scholarship = $_POST['scholarship'];
		}
		if (isset($_POST['medical_inspection'])) {
			$medical_inspection = $_POST['medical_inspection'];
		}
		if (isset($_POST['date_school'])) {
			$date_school = $_POST['date_school'];
		}
		if (isset($_POST['conduct'])) {
			$conduct = $_POST['conduct'];
		}
		if (isset($_POST['date_parents'])) {
			$date_parents = $_POST['date_parents'];
		}
		if (isset($_POST['date_of_transfer_certificate'])) {
			$date_of_transfer_certificate = $_POST['date_of_transfer_certificate'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}


		$inserttrustQry = "INSERT INTO transfer_certificate(serial_number, certificate_number, transfer_date, tmr_code, admission_number, school_name, district_educational, revenue_district,
	student_name,parents_name,nationality,caste, gender, admission_date, register_words, personal_identification,date_first_admission, standard, 
	promotion,scholarship, medical_inspection, date_school, conduct, date_parents, date_of_transfer_certificate, school_id, insert_login_id) 
	VALUES('" . strip_tags($serial_number) . "', '" . strip_tags($certificate_number) . "', '" . strip_tags($transfer_date) . "', '" . strip_tags($tmr_code) . "', 
	'" . strip_tags($admission_number) . "', '" . strip_tags($school_name) . "','" . strip_tags($district_educational) . "','" . strip_tags($revenue_district) . "',
	'" . strip_tags($student_name) . "','" . strip_tags($parents_name) . "','" . strip_tags($nationality) . "','" . strip_tags($caste) . "', '" . strip_tags($gender) . "',
	'" . strip_tags($admission_date) . "', '" . strip_tags($register_words) . "', '" . strip_tags($personal_identification) . "', '" . strip_tags($date_first_admission) . "', '" . strip_tags($standard) . "',
	'" . strip_tags($promotion) . "', '" . strip_tags($scholarship) . "', '" . strip_tags($medical_inspection) . "', '" . strip_tags($date_school) . "',
	'" . strip_tags($conduct) . "', '" . strip_tags($date_parents) . "', '" . strip_tags($date_of_transfer_certificate) . "', '" . $school_id . "', '" . strip_tags($userid) . "')";
		$inserttrust = $mysqli->query($inserttrustQry);

		return true;
	}

	// get Transfer Certificate Creation
	public function getTransferCertificateCreation($mysqli, $id)
	{

		$selectCondutCertificateCreation = "SELECT * FROM transfer_certificate WHERE transfer_id ='" . mysqli_real_escape_string($mysqli, $id) . "' ";
		$res = $mysqli->query($selectCondutCertificateCreation) or die("Error in Get All Records" . $mysqli->error);
		$detailrecords = array();
		if ($mysqli->affected_rows > 0) {
			$row = $res->fetch_object();
			$detailrecords['transfer_id']      		= $row->transfer_id;
			$detailrecords['serial_number']   			 = $row->serial_number;
			$detailrecords['certificate_number']    = $row->certificate_number;
			$detailrecords['transfer_date']      = $row->transfer_date;
			$detailrecords['tmr_code']      = $row->tmr_code;
			$detailrecords['admission_number']       = $row->admission_number;
			$detailrecords['school_name']         = $row->school_name;
			$detailrecords['district_educational']         = $row->district_educational;
			$detailrecords['revenue_district']         = $row->revenue_district;
			$detailrecords['student_name']         = $row->student_name;
			$detailrecords['parents_name']         = $row->parents_name;
			$detailrecords['nationality']         = $row->nationality;
			$detailrecords['caste']         = $row->caste;
			$detailrecords['gender']         = $row->gender;
			$detailrecords['admission_date']         = $row->admission_date;
			$detailrecords['register_words']         = $row->register_words;
			$detailrecords['personal_identification']         = $row->personal_identification;
			$detailrecords['date_first_admission']         = $row->date_first_admission;
			$detailrecords['standard']         = $row->standard;
			$detailrecords['promotion']         = $row->promotion;
			$detailrecords['scholarship']         = $row->scholarship;
			$detailrecords['medical_inspection']         = $row->medical_inspection;
			$detailrecords['date_school']         = $row->date_school;
			$detailrecords['conduct']         = $row->conduct;
			$detailrecords['date_parents']         = $row->date_parents;
			$detailrecords['date_of_transfer_certificate']         = $row->date_of_transfer_certificate;
		}

		return $detailrecords;
	}

	// Update Area Creation
	public function updateTransferCertificateCreation($mysqli, $id, $userid, $school_id)
	{

		if (isset($_POST['serial_number'])) {
			$serial_number = $_POST['serial_number'];
		}
		if (isset($_POST['tmr_code'])) {
			$tmr_code = $_POST['tmr_code'];
		}
		if (isset($_POST['admission_number'])) {
			$admission_number = $_POST['admission_number'];
		}
		if (isset($_POST['certificate_number'])) {
			$certificate_number = $_POST['certificate_number'];
		}
		if (isset($_POST['transfer_date'])) {
			$transfer_date = $_POST['transfer_date'];
		}
		if (isset($_POST['school_name'])) {
			$school_name = $_POST['school_name'];
		}
		if (isset($_POST['district_educational'])) {
			$district_educational = $_POST['district_educational'];
		}
		if (isset($_POST['revenue_district'])) {
			$revenue_district = $_POST['revenue_district'];
		}
		if (isset($_POST['student_name'])) {
			$student_name = $_POST['student_name'];
		}
		if (isset($_POST['parents_name'])) {
			$parents_name = $_POST['parents_name'];
		}
		if (isset($_POST['nationality'])) {
			$nationality = $_POST['nationality'];
		}
		if (isset($_POST['caste'])) {
			$caste = $_POST['caste'];
		}
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_POST['admission_date'])) {
			$admission_date = $_POST['admission_date'];
		}
		if (isset($_POST['register_words'])) {
			$register_words = $_POST['register_words'];
		}
		if (isset($_POST['personal_identification'])) {
			$personal_identification = $_POST['personal_identification'];
		}
		if (isset($_POST['date_first_admission'])) {
			$date_first_admission = $_POST['date_first_admission'];
		}
		if (isset($_POST['standard'])) {
			$standard = $_POST['standard'];
		}
		if (isset($_POST['promotion'])) {
			$promotion = $_POST['promotion'];
		}
		if (isset($_POST['scholarship'])) {
			$scholarship = $_POST['scholarship'];
		}
		if (isset($_POST['medical_inspection'])) {
			$medical_inspection = $_POST['medical_inspection'];
		}
		if (isset($_POST['date_school'])) {
			$date_school = $_POST['date_school'];
		}
		if (isset($_POST['conduct'])) {
			$conduct = $_POST['conduct'];
		}
		if (isset($_POST['date_parents'])) {
			$date_parents = $_POST['date_parents'];
		}
		if (isset($_POST['date_of_transfer_certificate'])) {
			$date_of_transfer_certificate = $_POST['date_of_transfer_certificate'];
		}
		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		}

		$updateCondutCertificateCreation = "UPDATE transfer_certificate SET serial_number = '" . strip_tags($serial_number) . "', certificate_number='" . strip_tags($certificate_number) . "', transfer_date='" . strip_tags($transfer_date) . "', tmr_code='" . strip_tags($tmr_code) . "', 
	admission_number='" . strip_tags($admission_number) . "', school_name='" . strip_tags($school_name) . "',  student_name='" . strip_tags($student_name) . "', 
	parents_name='" . strip_tags($parents_name) . "', nationality='" . strip_tags($nationality) . "', district_educational='" . strip_tags($district_educational) . "', 
	revenue_district='" . strip_tags($revenue_district) . "', caste='" . strip_tags($caste) . "', gender='" . strip_tags($gender) . "',
	admission_date='" . strip_tags($admission_date) . "',register_words='" . strip_tags($register_words) . "',personal_identification='" . strip_tags($personal_identification) . "',
	date_first_admission='" . strip_tags($date_first_admission) . "',standard='" . strip_tags($standard) . "',promotion='" . strip_tags($promotion) . "',
	scholarship='" . strip_tags($scholarship) . "',medical_inspection='" . strip_tags($medical_inspection) . "',date_school='" . strip_tags($date_school) . "',
	conduct='" . strip_tags($conduct) . "',date_parents='" . strip_tags($date_parents) . "',date_of_transfer_certificate='" . strip_tags($date_of_transfer_certificate) . "',
	school_id = '" . $school_id . "', update_login_id='" . strip_tags($userid) . "', status = '0' WHERE transfer_id = '" . strip_tags($id) . "' ";
		$updresult = $mysqli->query($updateCondutCertificateCreation) or die("Error in in update Query!." . $mysqli->error);
	}


	//  Delete Area Creation
	public function deleteTransferCertificateCreation($mysqli, $id, $userid)
	{

		$date  = date('Y-m-d');
		$deleteCondutCertificateCreation = "UPDATE transfer_certificate set status='1', delete_login_id='" . strip_tags($userid) . "'  WHERE transfer_id  = '" . strip_tags($id) . "'  ";
		$runQry = $mysqli->query($deleteCondutCertificateCreation) or die("Error in delete query" . $mysqli->error);
	}

	public function addPurchaseOrder($mysqli)
	{

		if (isset($_POST["vendor_name"])) {
			$vendor_name = $_POST["vendor_name"];
		}
		if (isset($_POST["bill_number"])) {
			$bill_number = $_POST["bill_number"];
		}
		if (isset($_POST["bill_date"])) {
			$bill_date = $_POST["bill_date"];
		}
		// if(isset($_POST["item_code"])){
		// 	$item_code=$_POST["item_code"];
		// }
		if (isset($_POST["total_amount"])) {
			$total_amount = $_POST["total_amount"];
		}
		if (isset($_POST["description"])) {
			$description = $_POST["description"];
		}
		if (isset($_POST["sub_quantity"])) {
			$sub_quantity = $_POST["sub_quantity"];
		}
		if (isset($_POST["unit_amount"])) {
			$unit_amount = $_POST["unit_amount"];
		}

		if (isset($_POST["item_code"])) {
			$item_code1 = $_POST["item_code"];
			$item_code = implode(',', $item_code1);
		}

		if (isset($_POST["description"])) {
			$description1 = $_POST["description"];
			$description = implode(',', $description1);
		}

		if (isset($_POST["rate"])) {
			$rate1 = $_POST["rate"];
			$rate = implode(',', $rate1);
		}

		if (isset($_POST["qty"])) {
			$quantity1 = $_POST["qty"];
			$quantity = implode(',', $quantity1);
		}
		if (isset($_POST["totval"])) {
			$total_value1 = $_POST["totval"];
			$total_value = implode(',', $total_value1);
		}


		$insertorder = "INSERT INTO purchaseorder(vendor_name, bill_number, bill_date, sub_quantity,unit_amount,total_amount) 
		VALUES ('" . strip_tags($vendor_name) . "', '" . strip_tags($bill_number) . "', '" . strip_tags($bill_date) . "', '" . strip_tags($sub_quantity) . "',
		 '" . strip_tags($unit_amount) . "','" . strip_tags($total_amount) . "')";

		$insresult = $mysqli->query($insertorder);
		$pid = $mysqli->insert_id;

		for ($i = 0; $i <= sizeof($item_code1) - 1; $i++) {
			$qry = $mysqli->query("INSERT INTO purchaseorderref(item_id, description, quantity, rate, total,  purchase_id) 
			VALUES('" . strip_tags($item_code1[$i]) . "','" . strip_tags($description1[$i]) . "','" . strip_tags($quantity1[$i]) . "','" . strip_tags($rate1[$i]) . "','" . strip_tags($total_value1[$i]) . "',
			'" . strip_tags($pid) . "') ");
		}

		if ($insresult && $qry) {
			return 1;
		}
	}

	public function addStockIssuance($mysqli)
	{

		if (isset($_POST["stock_issue"])) {
			$stock_issue = $_POST["stock_issue"];
		}
		if (isset($_POST["si_number"])) {
			$si_number = $_POST["si_number"];
		}
		if (isset($_POST["si_date"])) {
			$si_date = $_POST["si_date"];
		}

		if (isset($_POST["total_amount"])) {
			$total_amount = $_POST["total_amount"];
		}
		if (isset($_POST["description"])) {
			$description = $_POST["description"];
		}
		if (isset($_POST["sub_quantity"])) {
			$sub_quantity = $_POST["sub_quantity"];
		}
		if (isset($_POST["unit_amount"])) {
			$unit_amount = $_POST["unit_amount"];
		}

		if (isset($_POST["item_code"])) {
			$item_code1 = $_POST["item_code"];
			$item_code = implode(',', $item_code1);
		}

		if (isset($_POST["description"])) {
			$description1 = $_POST["description"];
			$description = implode(',', $description1);
		}

		if (isset($_POST["rate"])) {
			$rate1 = $_POST["rate"];
			$rate = implode(',', $rate1);
		}



		$insertorder = "INSERT INTO stock_issuance(stock_issuance_to, si_number, si_date,unit_amount) 
			VALUES ('" . strip_tags($stock_issue) . "', '" . strip_tags($si_number) . "', '" . strip_tags($si_date) . "','" . strip_tags($unit_amount) . "')";

		$insresult = $mysqli->query($insertorder);
		$pid = $mysqli->insert_id;

		for ($i = 0; $i <= sizeof($item_code1) - 1; $i++) {
			$qry = $mysqli->query("INSERT INTO stock_issuance_ref(item_id, description, rate, stock_issuance_id) 
				VALUES('" . strip_tags($item_code1[$i]) . "','" . strip_tags($description1[$i]) . "','" . strip_tags($rate1[$i]) . "','" . strip_tags($pid) . "') ");
		}

		if ($insresult && $qry) {
			return 1;
		}
	}

	public function addTempPayFees($mysqli, $userid, $school_id)
	{

		//temp_admission_fees table//
		if (isset($_POST['temp_admission_form_id'])) {
			$temp_admission_form_id = $_POST['temp_admission_form_id'];
		}
		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date =  $_POST['receipt_date'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		//temp_admission_fees table END//

		// temp_admission_fees_denomination//
		if (isset($_POST['payment_mode'])) {
			$payment_mode = $_POST['payment_mode'];
		}
		if (isset($_POST['receive_five_hundred'])) {
			$receive_five_hundred = $_POST['receive_five_hundred'];
		}
		if (isset($_POST['receive_two_hundred'])) {
			$receive_two_hundred = $_POST['receive_two_hundred'];
		}
		if (isset($_POST['receive_hundred'])) {
			$receive_hundred = $_POST['receive_hundred'];
		}
		if (isset($_POST['receive_fifty'])) {
			$receive_fifty = $_POST['receive_fifty'];
		}
		if (isset($_POST['receive_twenty'])) {
			$receive_twenty = $_POST['receive_twenty'];
		}
		if (isset($_POST['receive_ten'])) {
			$receive_ten = $_POST['receive_ten'];
		}
		if (isset($_POST['receive_five'])) {
			$receive_five = $_POST['receive_five'];
		}
		if (isset($_POST['total_amount'])) {
			$total_amount = $_POST['total_amount'];
		}

		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}

		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		// temp_admission_fees_denomination END//

		//Group Table data//
		$feesMasterid = [];
		if (isset($_POST['feesMasterid'])) {
			$feesMasterid = $_POST['feesMasterid'];
		}
		if (isset($_POST['grpid'])) {
			$grptablename = 'grptable';
			$grpid = $_POST['grpid'];
		}
		if (isset($_POST['grpFeeReceived'])) {
			$grpFeeReceived = $_POST['grpFeeReceived'];
		}
		if (isset($_POST['grpFeeBalance'])) {
			$grpFeeBalance = $_POST['grpFeeBalance'];
		}
		if (isset($_POST['grpFeeScholarship'])) {
			$grpFeeScholarship = $_POST['grpFeeScholarship'];
		}
		//Group Table data END//

		//Extra Curricular Activity Table data//
		$extraFeesMasterid = [];
		if (isset($_POST['extraFeesMasterid'])) {
			$extraFeesMasterid = $_POST['extraFeesMasterid'];
		}
		if (isset($_POST['extraAmntid'])) {
			$extratablename = 'extratable';
			$extraAmntid = $_POST['extraAmntid'];
		}
		if (isset($_POST['extraAmntReceived'])) {
			$extraAmntReceived = $_POST['extraAmntReceived'];
		}
		if (isset($_POST['extraAmntBalance'])) {
			$extraAmntBalance = $_POST['extraAmntBalance'];
		}
		if (isset($_POST['extraAmntScholarship'])) {
			$extraAmntScholarship = $_POST['extraAmntScholarship'];
		}
		//Extra Curricular Activity Table data END//

		//Amenity Table data//
		$amenityFeesMasterid = [];
		if (isset($_POST['amenityFeesMasterid'])) {
			$amenityFeesMasterid = $_POST['amenityFeesMasterid'];
		}
		if (isset($_POST['amenityAmntid'])) {
			$amenitytablename = 'amenitytable';
			$amenityAmntid = $_POST['amenityAmntid'];
		}
		if (isset($_POST['amenityAmntReceived'])) {
			$amenityAmntReceived = $_POST['amenityAmntReceived'];
		}
		if (isset($_POST['amenityAmntBalance'])) {
			$amenityAmntBalance = $_POST['amenityAmntBalance'];
		}
		if (isset($_POST['amenityAmntScholarship'])) {
			$amenityAmntScholarship = $_POST['amenityAmntScholarship'];
		}
		//Amenity Table data END//

		if (isset($_SESSION['curdateFromIndexPage'])) {
			$curdate = $_SESSION['curdateFromIndexPage'];
		}

		if (count($feesMasterid) > 0 || count($extraFeesMasterid) > 0 || count($amenityFeesMasterid) > 0) {
			$insertTempFeesQry = $mysqli->query("INSERT INTO `temp_admission_fees`(`TempAdmissionId`, `ReceiptNo`, `ReceiptDate`, `AcademicYear`, `Othercharges`, `OtherChargesReceived`, `Scholarship`, `TotalFeestobeCollected`, `FinalAmounttobeCollect`, `FeesCollected`, `BalancetobePaid`, `school_id`, `insert_login_id`, `created_on`) VALUES ('$temp_admission_form_id','$receipt_number','$receipt_date','$academic_year','$other_charges','$other_charges_recieved','$fees_scholarship','$fees_total','$final_amount_recieved','$fees_collected','$fees_balance','$school_id','$userid','$curdate')");

			$tempFeesLastInsertId = $mysqli->insert_id;

			if ($payment_mode == 'cash_payment') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `temp_admission_fees_denomination`(`TempAdmFeeRefId`, `PaymentMode`, `LedgerRefId`, `No_Fivehundred`, `No_Twohundred`, `No_hundred`, `No_fifty`, `No_twenty`, `No_ten`, `No_five`, `totalamt`, `insert_login_id`, `created_on`) VALUES ('$tempFeesLastInsertId','$payment_mode','$academic_year','$receive_five_hundred','$receive_two_hundred','$receive_hundred','$receive_fifty','$receive_twenty','$receive_ten','$receive_five','$total_amount','$userid','$curdate')");
			} else if ($payment_mode == 'cheque') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `temp_admission_fees_denomination`(`TempAdmFeeRefId`, `PaymentMode`, `LedgerRefId`, `ChequeNumber`, `ChequeDate`, `ChequeAmt`, `ChequeBankName`, `insert_login_id`, `created_on`) VALUES ('$tempFeesLastInsertId','$payment_mode','$cheque_ledger_name','$cheque_number','$cheque_date','$cheque_amount','$cheque_bank_name','$userid','$curdate')");
			} else if ($payment_mode == 'neft') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `temp_admission_fees_denomination`(`TempAdmFeeRefId`, `PaymentMode`, `LedgerRefId`, `NeftRefNumber`, `NeftTranDate`, `NeftAmt`, `NeftBankName`, `insert_login_id`, `created_on`) VALUES ('$tempFeesLastInsertId','$payment_mode','$neft_ledger_name','$neft_number','$neft_date','$neft_amount','$neft_bank_name','$userid','$curdate')");
			}

			for ($a = 0; $a < count($feesMasterid); $a++) {
				// if($grpFeeReceived[$a] > 0 || $grpFeeScholarship[$a] > 0){
				$insertFeesDetailsQry = $mysqli->query("INSERT INTO `temp_admissionfees_details`( `TempAdmFeeRefId`, `FeesMasterId`, `FeesTableName`, `FeesId`, `FeeReceived`, `BalancetobePaid`, `Scholarship`) VALUES ('$tempFeesLastInsertId','$feesMasterid[$a]','$grptablename','$grpid[$a]','$grpFeeReceived[$a]','$grpFeeBalance[$a]','$grpFeeScholarship[$a]')");
				// }
			}

			for ($b = 0; $b < count($extraFeesMasterid); $b++) {
				// if($extraAmntReceived[$b] > 0 || $extraAmntScholarship[$b] > 0 ){
				$insertextraFeesDetailsQry = $mysqli->query("INSERT INTO `temp_admissionfees_details`( `TempAdmFeeRefId`, `FeesMasterId`, `FeesTableName`, `FeesId`, `FeeReceived`, `BalancetobePaid`, `Scholarship`) VALUES ('$tempFeesLastInsertId','$extraFeesMasterid[$b]','$extratablename','$extraAmntid[$b]','$extraAmntReceived[$b]','$extraAmntBalance[$b]','$extraAmntScholarship[$b]')");
				// }
			}

			for ($c = 0; $c < count($amenityFeesMasterid); $c++) {
				// if($amenityAmntReceived[$c] > 0 || $amenityAmntScholarship[$c] > 0 ){
				$insertamenityFeesDetailsQry = $mysqli->query("INSERT INTO `temp_admissionfees_details`( `TempAdmFeeRefId`, `FeesMasterId`, `FeesTableName`, `FeesId`, `FeeReceived`, `BalancetobePaid`, `Scholarship`) VALUES ('$tempFeesLastInsertId','$amenityFeesMasterid[$c]','$amenitytablename','$amenityAmntid[$c]','$amenityAmntReceived[$c]','$amenityAmntBalance[$c]','$amenityAmntScholarship[$c]')");
				// }
			}
			if ($insertTempFeesQry) {
				return $tempFeesLastInsertId;
			} else {
				return 2;
			}
		} else {
			return 2;
		}
	}


	public function addPayFees($mysqli, $userid, $school_id)
	{

		//admission_fees table//
		if (isset($_POST['admission_form_id'])) {
			$admission_form_id = $_POST['admission_form_id'];
		}
		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date =  $_POST['receipt_date'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		//admission_fees table END//

		//admission_fees_denomination//
		if (isset($_POST['payment_mode'])) {
			$payment_mode = $_POST['payment_mode'];
		}
		if (isset($_POST['receive_five_hundred'])) {
			$receive_five_hundred = $_POST['receive_five_hundred'];
		}
		if (isset($_POST['receive_two_hundred'])) {
			$receive_two_hundred = $_POST['receive_two_hundred'];
		}
		if (isset($_POST['receive_hundred'])) {
			$receive_hundred = $_POST['receive_hundred'];
		}
		if (isset($_POST['receive_fifty'])) {
			$receive_fifty = $_POST['receive_fifty'];
		}
		if (isset($_POST['receive_twenty'])) {
			$receive_twenty = $_POST['receive_twenty'];
		}
		if (isset($_POST['receive_ten'])) {
			$receive_ten = $_POST['receive_ten'];
		}
		if (isset($_POST['receive_five'])) {
			$receive_five = $_POST['receive_five'];
		}
		if (isset($_POST['total_amount'])) {
			$total_amount = $_POST['total_amount'];
		}

		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}

		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		// admission_fees_denomination END//

		//Group Table data//
		$feesMasterid = [];
		if (isset($_POST['feesMasterid'])) {
			$feesMasterid = $_POST['feesMasterid'];
		}
		if (isset($_POST['grpid'])) {
			$grptablename = 'grptable';
			$grpid = $_POST['grpid'];
		}
		if (isset($_POST['grpFeeReceived'])) {
			$grpFeeReceived = $_POST['grpFeeReceived'];
		}
		if (isset($_POST['grpFeeBalance'])) {
			$grpFeeBalance = $_POST['grpFeeBalance'];
		}
		if (isset($_POST['grpFeeScholarship'])) {
			$grpFeeScholarship = $_POST['grpFeeScholarship'];
		}
		//Group Table data END//

		//Extra Curricular Activity Table data//
		$extraFeesMasterid = [];
		if (isset($_POST['extraFeesMasterid'])) {
			$extraFeesMasterid = $_POST['extraFeesMasterid'];
		}
		if (isset($_POST['extraAmntid'])) {
			$extratablename = 'extratable';
			$extraAmntid = $_POST['extraAmntid'];
		}
		if (isset($_POST['extraAmntReceived'])) {
			$extraAmntReceived = $_POST['extraAmntReceived'];
		}
		if (isset($_POST['extraAmntBalance'])) {
			$extraAmntBalance = $_POST['extraAmntBalance'];
		}
		if (isset($_POST['extraAmntScholarship'])) {
			$extraAmntScholarship = $_POST['extraAmntScholarship'];
		}
		//Extra Curricular Activity Table data END//

		//Amenity Table data//
		$amenityFeesMasterid = [];
		if (isset($_POST['amenityFeesMasterid'])) {
			$amenityFeesMasterid = $_POST['amenityFeesMasterid'];
		}
		if (isset($_POST['amenityAmntid'])) {
			$amenitytablename = 'amenitytable';
			$amenityAmntid = $_POST['amenityAmntid'];
		}
		if (isset($_POST['amenityAmntReceived'])) {
			$amenityAmntReceived = $_POST['amenityAmntReceived'];
		}
		if (isset($_POST['amenityAmntBalance'])) {
			$amenityAmntBalance = $_POST['amenityAmntBalance'];
		}
		if (isset($_POST['amenityAmntScholarship'])) {
			$amenityAmntScholarship = $_POST['amenityAmntScholarship'];
		}
		//Amenity Table data END//
		$check_admission_fees = $mysqli->query("SELECT * FROM `admission_fees` WHERE admission_id ='$admission_form_id' && receipt_no ='$receipt_number' ");
		if ($check_admission_fees->num_rows > 0) {
			return -1;
		} else {

			if (count($feesMasterid) > 0 || count($extraFeesMasterid) > 0 || count($amenityFeesMasterid) > 0) {
				$insertPayFeesQry = $mysqli->query("INSERT INTO `admission_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `other_charges`, `other_charges_received`, `scholarship`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `created_on`) VALUES ('$admission_form_id','$receipt_number','$receipt_date','$academic_year','$other_charges','$other_charges_recieved','$fees_scholarship','$fees_total','$final_amount_recieved','$fees_collected','$fees_balance','$school_id','$userid',now())");

				$FeesLastInsertId = $mysqli->insert_id;

				if ($payment_mode == 'cash_payment') {
					$insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$academic_year','$receive_five_hundred','$receive_two_hundred','$receive_hundred','$receive_fifty','$receive_twenty','$receive_ten','$receive_five','$total_amount','$userid',now())");
				} else if ($payment_mode == 'cheque') {
					$insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$cheque_ledger_name','$cheque_number','$cheque_date','$cheque_amount','$cheque_bank_name','$userid',now())");
				} else if ($payment_mode == 'neft') {
					$insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$neft_ledger_name','$neft_number','$neft_date','$neft_amount','$neft_bank_name','$userid',now())");
				}

				for ($a = 0; $a < count($feesMasterid); $a++) {
					// if($grpFeeReceived[$a] > 0 || $grpFeeScholarship[$a] > 0){
					$insertFeesDetailsQry = $mysqli->query("INSERT INTO `admission_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$feesMasterid[$a]','$grptablename','$grpid[$a]','$grpFeeReceived[$a]','$grpFeeBalance[$a]','$grpFeeScholarship[$a]')");
					// }
				}

				for ($b = 0; $b < count($extraFeesMasterid); $b++) {
					// if($extraAmntReceived[$b] > 0 || $extraAmntScholarship[$b] > 0){
					$insertextraFeesDetailsQry = $mysqli->query("INSERT INTO `admission_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$extraFeesMasterid[$b]','$extratablename','$extraAmntid[$b]','$extraAmntReceived[$b]','$extraAmntBalance[$b]','$extraAmntScholarship[$b]')");
					// }
				}

				for ($c = 0; $c < count($amenityFeesMasterid); $c++) {
					// if($amenityAmntReceived[$c] > 0 || $amenityAmntScholarship[$c] > 0){
					$insertamenityFeesDetailsQry = $mysqli->query("INSERT INTO `admission_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$amenityFeesMasterid[$c]','$amenitytablename','$amenityAmntid[$c]','$amenityAmntReceived[$c]','$amenityAmntBalance[$c]','$amenityAmntScholarship[$c]')");
					// }
				}
				if ($insertPayFeesQry) {
					return $FeesLastInsertId;
				} else {
					return 2;
				}
			} else {
				return 2;
			}
		}
	}


	public function addLastYearFees($mysqli, $userid, $school_id)
	{

		//last_year_fees table//
		if (isset($_POST['admission_form_id'])) {
			$admission_form_id = $_POST['admission_form_id'];
		}
		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date =  $_POST['receipt_date'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['other_charges'])) {
			$other_charges = $_POST['other_charges'];
		}
		if (isset($_POST['other_charges_recieved'])) {
			$other_charges_recieved = $_POST['other_charges_recieved'];
		}
		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		//last_year_fees table END//

		// last_year_fees_denomination//
		if (isset($_POST['payment_mode'])) {
			$payment_mode = $_POST['payment_mode'];
		}
		if (isset($_POST['receive_five_hundred'])) {
			$receive_five_hundred = $_POST['receive_five_hundred'];
		}
		if (isset($_POST['receive_two_hundred'])) {
			$receive_two_hundred = $_POST['receive_two_hundred'];
		}
		if (isset($_POST['receive_hundred'])) {
			$receive_hundred = $_POST['receive_hundred'];
		}
		if (isset($_POST['receive_fifty'])) {
			$receive_fifty = $_POST['receive_fifty'];
		}
		if (isset($_POST['receive_twenty'])) {
			$receive_twenty = $_POST['receive_twenty'];
		}
		if (isset($_POST['receive_ten'])) {
			$receive_ten = $_POST['receive_ten'];
		}
		if (isset($_POST['receive_five'])) {
			$receive_five = $_POST['receive_five'];
		}
		if (isset($_POST['total_amount'])) {
			$total_amount = $_POST['total_amount'];
		}

		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}

		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		// last_year_fees_denomination END//

		//Group Table data//
		$feesMasterid = [];
		if (isset($_POST['feesMasterid'])) {
			$feesMasterid = $_POST['feesMasterid'];
		}
		if (isset($_POST['grpid'])) {
			$grptablename = 'grptable';
			$grpid = $_POST['grpid'];
		}
		if (isset($_POST['grpFeeReceived'])) {
			$grpFeeReceived = $_POST['grpFeeReceived'];
		}
		if (isset($_POST['grpFeeBalance'])) {
			$grpFeeBalance = $_POST['grpFeeBalance'];
		}
		if (isset($_POST['grpFeeScholarship'])) {
			$grpFeeScholarship = $_POST['grpFeeScholarship'];
		}
		//Group Table data END//

		//Extra Curricular Activity Table data//
		$extraFeesMasterid = [];
		if (isset($_POST['extraFeesMasterid'])) {
			$extraFeesMasterid = $_POST['extraFeesMasterid'];
		}
		if (isset($_POST['extraAmntid'])) {
			$extratablename = 'extratable';
			$extraAmntid = $_POST['extraAmntid'];
		}
		if (isset($_POST['extraAmntReceived'])) {
			$extraAmntReceived = $_POST['extraAmntReceived'];
		}
		if (isset($_POST['extraAmntBalance'])) {
			$extraAmntBalance = $_POST['extraAmntBalance'];
		}
		if (isset($_POST['extraAmntScholarship'])) {
			$extraAmntScholarship = $_POST['extraAmntScholarship'];
		}
		//Extra Curricular Activity Table data END//

		//Amenity Table data//
		$amenityFeesMasterid = [];
		if (isset($_POST['amenityFeesMasterid'])) {
			$amenityFeesMasterid = $_POST['amenityFeesMasterid'];
		}
		if (isset($_POST['amenityAmntid'])) {
			$amenitytablename = 'amenitytable';
			$amenityAmntid = $_POST['amenityAmntid'];
		}
		if (isset($_POST['amenityAmntReceived'])) {
			$amenityAmntReceived = $_POST['amenityAmntReceived'];
		}
		if (isset($_POST['amenityAmntBalance'])) {
			$amenityAmntBalance = $_POST['amenityAmntBalance'];
		}
		if (isset($_POST['amenityAmntScholarship'])) {
			$amenityAmntScholarship = $_POST['amenityAmntScholarship'];
		}
		//Amenity Table data END//
		//Transport Table data//
		$areaCreationId = [];
		if (isset($_POST['areaCreationId'])) {
			$areaCreationId = $_POST['areaCreationId'];
		}
		if (isset($_POST['particularId'])) {
			$transtablename = 'transport';
			$particularId = $_POST['particularId'];
		}
		if (isset($_POST['transportFeeReceived'])) {
			$transportFeeReceived = $_POST['transportFeeReceived'];
		}
		if (isset($_POST['transportFeeBalance'])) {
			$transportFeeBalance = $_POST['transportFeeBalance'];
		}
		if (isset($_POST['transportFeeScholarship'])) {
			$transportFeeScholarship = $_POST['transportFeeScholarship'];
		}
		//Transport Table data END//
		if (count($feesMasterid) > 0 || count($extraFeesMasterid) > 0 || count($amenityFeesMasterid) > 0) {
			$insertPayFeesQry = $mysqli->query("INSERT INTO `last_year_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `other_charges`, `other_charges_received`, `scholarship`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `created_on`) VALUES ('$admission_form_id','$receipt_number','$receipt_date','$academic_year','$other_charges','$other_charges_recieved','$fees_scholarship','$fees_total','$final_amount_recieved','$fees_collected','$fees_balance','$school_id','$userid',now())");

			$FeesLastInsertId = $mysqli->insert_id;

			if ($payment_mode == 'cash_payment') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `last_year_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$academic_year','$receive_five_hundred','$receive_two_hundred','$receive_hundred','$receive_fifty','$receive_twenty','$receive_ten','$receive_five','$total_amount','$userid',now())");
			} else if ($payment_mode == 'cheque') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `last_year_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$cheque_ledger_name','$cheque_number','$cheque_date','$cheque_amount','$cheque_bank_name','$userid',now())");
			} else if ($payment_mode == 'neft') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `last_year_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$neft_ledger_name','$neft_number','$neft_date','$neft_amount','$neft_bank_name','$userid',now())");
			}

			for ($a = 0; $a < count($feesMasterid); $a++) {
				// if($grpFeeReceived[$a] > 0 || $grpFeeScholarship[$a] > 0){
				$insertFeesDetailsQry = $mysqli->query("INSERT INTO `last_year_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$feesMasterid[$a]','$grptablename','$grpid[$a]','$grpFeeReceived[$a]','$grpFeeBalance[$a]','$grpFeeScholarship[$a]')");
				// }
			}

			for ($b = 0; $b < count($extraFeesMasterid); $b++) {
				// if($extraAmntReceived[$b] > 0 || $extraAmntScholarship[$b] > 0){
				$insertextraFeesDetailsQry = $mysqli->query("INSERT INTO `last_year_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$extraFeesMasterid[$b]','$extratablename','$extraAmntid[$b]','$extraAmntReceived[$b]','$extraAmntBalance[$b]','$extraAmntScholarship[$b]')");
				// }
			}

			for ($c = 0; $c < count($amenityFeesMasterid); $c++) {
				// if($amenityAmntReceived[$c] > 0 || $amenityAmntScholarship[$c] > 0 ){
				$insertamenityFeesDetailsQry = $mysqli->query("INSERT INTO `last_year_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$amenityFeesMasterid[$c]','$amenitytablename','$amenityAmntid[$c]','$amenityAmntReceived[$c]','$amenityAmntBalance[$c]','$amenityAmntScholarship[$c]')");
				// }
			}
			for ($d = 0; $d < count($areaCreationId); $d++) {
				// if($amenityAmntReceived[$c] > 0 || $amenityAmntScholarship[$c] > 0 ){
				$inserttransFeesDetailsQry = $mysqli->query("INSERT INTO `last_year_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$areaCreationId[$d]','$transtablename','$particularId[$d]','$transportFeeReceived[$d]','$transportFeeBalance[$d]','$transportFeeScholarship[$d]')");
				// }
			}
			if ($insertPayFeesQry) {
				return $FeesLastInsertId;
			} else {
				return 2;
			}
		} else {
			return 2;
		}
	}


	public function addTransportFees($mysqli, $userid, $school_id)
	{

		//transport_fees table//
		if (isset($_POST['admission_form_id'])) {
			$admission_form_id = $_POST['admission_form_id'];
		}
		if (isset($_POST['receipt_number'])) {
			$receipt_number = $_POST['receipt_number'];
		}
		if (isset($_POST['receipt_date'])) {
			$receipt_date =  $_POST['receipt_date'];
		}
		if (isset($_POST['academic_year'])) {
			$academic_year = $_POST['academic_year'];
		}
		if (isset($_POST['fees_scholarship'])) {
			$fees_scholarship = $_POST['fees_scholarship'];
		}
		if (isset($_POST['fees_total'])) {
			$fees_total = $_POST['fees_total'];
		}
		if (isset($_POST['final_amount_recieved'])) {
			$final_amount_recieved = $_POST['final_amount_recieved'];
		}
		if (isset($_POST['fees_collected'])) {
			$fees_collected = $_POST['fees_collected'];
		}
		if (isset($_POST['fees_balance'])) {
			$fees_balance = $_POST['fees_balance'];
		}
		//transport_fees table END//

		// 	transport_admission_fees_denomination//
		if (isset($_POST['payment_mode'])) {
			$payment_mode = $_POST['payment_mode'];
		}
		if (isset($_POST['receive_five_hundred'])) {
			$receive_five_hundred = $_POST['receive_five_hundred'];
		}
		if (isset($_POST['receive_two_hundred'])) {
			$receive_two_hundred = $_POST['receive_two_hundred'];
		}
		if (isset($_POST['receive_hundred'])) {
			$receive_hundred = $_POST['receive_hundred'];
		}
		if (isset($_POST['receive_fifty'])) {
			$receive_fifty = $_POST['receive_fifty'];
		}
		if (isset($_POST['receive_twenty'])) {
			$receive_twenty = $_POST['receive_twenty'];
		}
		if (isset($_POST['receive_ten'])) {
			$receive_ten = $_POST['receive_ten'];
		}
		if (isset($_POST['receive_five'])) {
			$receive_five = $_POST['receive_five'];
		}
		if (isset($_POST['total_amount'])) {
			$total_amount = $_POST['total_amount'];
		}

		if (isset($_POST['cheque_number'])) {
			$cheque_number = $_POST['cheque_number'];
		}
		if (isset($_POST['cheque_amount'])) {
			$cheque_amount = $_POST['cheque_amount'];
		}
		if (isset($_POST['cheque_date'])) {
			$cheque_date = $_POST['cheque_date'];
		}
		if (isset($_POST['cheque_bank_name'])) {
			$cheque_bank_name = $_POST['cheque_bank_name'];
		}
		if (isset($_POST['cheque_ledger_name'])) {
			$cheque_ledger_name = $_POST['cheque_ledger_name'];
		}

		if (isset($_POST['neft_number'])) {
			$neft_number = $_POST['neft_number'];
		}
		if (isset($_POST['neft_amount'])) {
			$neft_amount = $_POST['neft_amount'];
		}
		if (isset($_POST['neft_date'])) {
			$neft_date = $_POST['neft_date'];
		}
		if (isset($_POST['neft_bank_name'])) {
			$neft_bank_name = $_POST['neft_bank_name'];
		}
		if (isset($_POST['neft_ledger_name'])) {
			$neft_ledger_name = $_POST['neft_ledger_name'];
		}
		// 	transport_admission_fees_denomination END//

		//Area Table data//
		$areaCreationId = [];
		if (isset($_POST['areaCreationId'])) {
			$areaCreationId = $_POST['areaCreationId'];
		}
		if (isset($_POST['particularId'])) {
			$particularId = $_POST['particularId'];
		}
		if (isset($_POST['transportFeeReceived'])) {
			$transportFeeReceived = $_POST['transportFeeReceived'];
		}
		if (isset($_POST['transportFeeBalance'])) {
			$transportFeeBalance = $_POST['transportFeeBalance'];
		}
		if (isset($_POST['transportFeeScholarship'])) {
			$transportFeeScholarship = $_POST['transportFeeScholarship'];
		}
		//Area Table data END//

		if (count($areaCreationId) > 0) {
			$insertPayFeesQry = $mysqli->query("INSERT INTO `transport_admission_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `scholarship`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `created_on`) VALUES ('$admission_form_id','$receipt_number','$receipt_date','$academic_year','$fees_scholarship','$fees_total','$final_amount_recieved','$fees_collected','$fees_balance','$school_id','$userid',now())") or die("Error " . $mysqli->error);

			$FeesLastInsertId = $mysqli->insert_id;

			if ($payment_mode == 'cash_payment') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$academic_year','$receive_five_hundred','$receive_two_hundred','$receive_hundred','$receive_fifty','$receive_twenty','$receive_ten','$receive_five','$total_amount','$userid',now())");
			} else if ($payment_mode == 'cheque') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$cheque_ledger_name','$cheque_number','$cheque_date','$cheque_amount','$cheque_bank_name','$userid',now())");
			} else if ($payment_mode == 'neft') {
				$insertCashDenomination = $mysqli->query("INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$payment_mode','$neft_ledger_name','$neft_number','$neft_date','$neft_amount','$neft_bank_name','$userid',now())");
			}

			for ($a = 0; $a < count($areaCreationId); $a++) {
				$insertFeesDetailsQry = $mysqli->query("INSERT INTO `transport_admission_fees_details`(`admission_fees_ref_id`, `area_creation_id`, `area_creation_particulars_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$areaCreationId[$a]','$particularId[$a]','$transportFeeReceived[$a]','$transportFeeBalance[$a]','$transportFeeScholarship[$a]')");
			}

			if ($insertPayFeesQry) {
				return $FeesLastInsertId;
			} else {
				return 2;
			}
		} else {
			return 2;
		}
	}

	public function addFeesConcession($mysqli, $userid, $school_id, $year_id)
	{

		if (isset($_POST['studentID'])) {
			$studentID = $_POST['studentID'];
		}
		if (isset($_POST['concession_type'])) {
			$concession_type = $_POST['concession_type'];
		}

		//Group Table data//
		if (isset($_POST['grpStudentid'])) {
			$grpStudentid = $_POST['grpStudentid'];
		}
		$feesMasterid = [];
		if (isset($_POST['feesMasterid'])) {
			$feesMasterid = $_POST['feesMasterid'];
		}
		if (isset($_POST['grpid'])) {
			$grptablename = 'grptable';
			$grpid = $_POST['grpid'];
		}
		if (isset($_POST['grpFeeScholarship'])) {
			$grpFeeScholarship = $_POST['grpFeeScholarship'];
		}
		if (isset($_POST['grpscholarshipHeader'])) {
			$grpscholarshipHeader = $_POST['grpscholarshipHeader'];
		}
		if (isset($_POST['grpFeeRemark'])) {
			$grpFeeRemark = $_POST['grpFeeRemark'];
		}
		//Group Table data END//

		//Extra Curricular Activity Table data//
		if (isset($_POST['extraStudentid'])) {
			$extraStudentid = $_POST['extraStudentid'];
		}
		$extraFeesMasterid = [];
		if (isset($_POST['extraFeesMasterid'])) {
			$extraFeesMasterid = $_POST['extraFeesMasterid'];
		}
		if (isset($_POST['extraAmntid'])) {
			$extratablename = 'extratable';
			$extraAmntid = $_POST['extraAmntid'];
		}
		if (isset($_POST['extraAmntScholarship'])) {
			$extraAmntScholarship = $_POST['extraAmntScholarship'];
		}
		if (isset($_POST['extrascholarshipHeader'])) {
			$extrascholarshipHeader = $_POST['extrascholarshipHeader'];
		}
		if (isset($_POST['extraFeeRemark'])) {
			$extraFeeRemark = $_POST['extraFeeRemark'];
		}
		//Extra Curricular Activity Table data END//

		//Amenity Table data//
		if (isset($_POST['amenityStudentid'])) {
			$amenityStudentid = $_POST['amenityStudentid'];
		}
		$amenityFeesMasterid = [];
		if (isset($_POST['amenityFeesMasterid'])) {
			$amenityFeesMasterid = $_POST['amenityFeesMasterid'];
		}
		if (isset($_POST['amenityAmntid'])) {
			$amenitytablename = 'amenitytable';
			$amenityAmntid = $_POST['amenityAmntid'];
		}
		if (isset($_POST['amenityAmntScholarship'])) {
			$amenityAmntScholarship = $_POST['amenityAmntScholarship'];
		}
		if (isset($_POST['amenityscholarshipHeader'])) {
			$amenityscholarshipHeader = $_POST['amenityscholarshipHeader'];
		}
		if (isset($_POST['amenityFeeRemark'])) {
			$amenityFeeRemark = $_POST['amenityFeeRemark'];
		}
		//Amenity Table data END//

		//Area Table data//
		if (isset($_POST['areastudentid'])) {
			$areastudentid = $_POST['areastudentid'];
		}
		$areaCreationId = [];
		if (isset($_POST['areaCreationId'])) {
			$areaCreationId = $_POST['areaCreationId'];
		}
		if (isset($_POST['particularId'])) {
			$particulartablename = 'transport';
			$particularId = $_POST['particularId'];
		}
		if (isset($_POST['transportFeeScholarship'])) {
			$transportFeeScholarship = $_POST['transportFeeScholarship'];
		}
		if (isset($_POST['transportscholarshipHeader'])) {
			$transportscholarshipHeader = $_POST['transportscholarshipHeader'];
		}
		if (isset($_POST['transportFeeRemark'])) {
			$transportFeeRemark = $_POST['transportFeeRemark'];
		}
		//Area Table data END//

		if ($concession_type == 'GeneralConcession' || $concession_type == 'ReferalConcession') {
			//update the student_creation table
			$mysqli->query("UPDATE `student_creation` SET `approval`='Approved', `update_login_id`='$userid', `updated_date`= now() WHERE `student_id`='$studentID'");
		}

		if ($concession_type == 'ReferalConcession') {

			$mysqli->query("UPDATE `referral_details` SET `approved`='Approved' WHERE `student_id`='$studentID'");

			if (isset($_POST['refertype'])) {
				$refertype = $_POST['refertype'];
			}
			if (isset($_POST['other_amount'])) {
				$other_amount = $_POST['other_amount'];
			}
			if (isset($_POST['given_date'])) {
				$given_date = $_POST['given_date'];
			}
			if ($refertype  == 'Staff' || $refertype  == 'Agent' || $refertype  == 'Other') {
				$mysqli->query("UPDATE `referral_details` SET `approved`='Approved',`others_amount`='$other_amount',`others_receiving_date`='$given_date' WHERE `student_id`='$studentID'");
			}
			//update the student_creation table
			$mysqli->query("UPDATE `student_creation` SET `approval`='Approved', `update_login_id`='$userid', `updated_date`= now() WHERE `student_id`='$studentID'");
		}

		for ($a = 0; $a < count($feesMasterid); $a++) {
			if ($grpFeeScholarship[$a] > 0) {
				$insertFeesDetailsQry = $mysqli->query("INSERT INTO `fees_concession`( `student_id`, `scholarship_header`, `scholarship_amount`, `fees_master_id`, `fees_table_name`, `fees_id`, `remark`, `concession_type`, `academic_year`, `school_id`, `insert_login_id`) VALUES ('$grpStudentid[$a]','$grpscholarshipHeader','$grpFeeScholarship[$a]','$feesMasterid[$a]','$grptablename','$grpid[$a]','$grpFeeRemark[$a]','$concession_type','$year_id','$school_id','$userid')");
			}
		}

		for ($b = 0; $b < count($extraFeesMasterid); $b++) {
			if ($extraAmntScholarship[$b] > 0) {
				$insertextraFeesDetailsQry = $mysqli->query("INSERT INTO `fees_concession`( `student_id`, `scholarship_header`, `scholarship_amount`, `fees_master_id`, `fees_table_name`, `fees_id`, `remark`, `concession_type`, `academic_year`, `school_id`, `insert_login_id`) VALUES ('$extraStudentid[$b]','$extrascholarshipHeader','$extraAmntScholarship[$b]','$extraFeesMasterid[$b]','$extratablename','$extraAmntid[$b]','$extraFeeRemark[$b]','$concession_type','$year_id','$school_id','$userid')");
			}
		}

		for ($c = 0; $c < count($amenityFeesMasterid); $c++) {
			if ($amenityAmntScholarship[$c] > 0) {
				$insertamenityFeesDetailsQry = $mysqli->query("INSERT INTO `fees_concession`( `student_id`, `scholarship_header`, `scholarship_amount`, `fees_master_id`, `fees_table_name`, `fees_id`, `remark`, `concession_type`, `academic_year`, `school_id`, `insert_login_id`) VALUES ('$amenityStudentid[$c]','$amenityscholarshipHeader','$amenityAmntScholarship[$c]','$amenityFeesMasterid[$c]','$amenitytablename','$amenityAmntid[$c]','$amenityFeeRemark[$c]','$concession_type','$year_id','$school_id','$userid')");
			}
		}

		for ($d = 0; $d < count($areaCreationId); $d++) {
			if ($transportFeeScholarship[$d] > 0) {
				$inserttransportFeesDetailsQry = $mysqli->query("INSERT INTO `fees_concession`( `student_id`, `scholarship_header`, `scholarship_amount`, `fees_master_id`, `fees_table_name`, `fees_id`, `remark`, `concession_type`, `academic_year`, `school_id`, `insert_login_id`) VALUES ('$areastudentid[$d]','$transportscholarshipHeader','$transportFeeScholarship[$d]','$areaCreationId[$d]','$particulartablename','$particularId[$d]','$transportFeeRemark[$d]','$concession_type','$year_id','$school_id','$userid')");
			}
		}
	} //fees concession ends here ///////////


	///// edit birthday wishes START ////////
	public function addBirthdayWishes()
	{ //in Tamil language
		if (isset($_POST['student_mobile_no'])) {
			$recipients = urlencode($_POST['student_mobile_no']);
		}
		if (isset($_POST['birthday_comment'])) {
			$message = urlencode($_POST['birthday_comment']);
		}
		if (isset($_POST['birthday_templateid'])) {
			$templateid = $_POST['birthday_templateid'];
		}

		// Account details
		$apiKey = '21400|AA7XvnY94a2UUJ2JjRmK0slM0J95M2GYhG9jMyLk';
		// Message details
		$sender = 'VPHSSS';
		// Prepare data for POST request
		$data = 'access_token=' . $apiKey . '&to=' . $recipients . '&message=' . $message . '&service=T&sender=' . $sender . '&template_id=' . $templateid;
		// Send the GET request with cURL
		$url = 'https://sms.messagewall.in/api/v2/sms/send?' . $data;
		$response = file_get_contents($url);
		// Process your response here
		return $response;
	}
	///// edit birthday wishes END ////////

	///// edit General Message START ////////
	public function addGeneralMessage()
	{
		if (isset($_POST['selectedStudContanctNo'])) {
			$recipients = urlencode($_POST['selectedStudContanctNo']);
		}
		if (isset($_POST['general_comment'])) {
			$message = urlencode($_POST['general_comment']);
		}
		if (isset($_POST['templatetype'])) {
			$templateid = $_POST['templatetype'];
		}

		// Account details
		$apiKey = '21400|AA7XvnY94a2UUJ2JjRmK0slM0J95M2GYhG9jMyLk';
		// Message details
		$sender = 'VPHSSS';
		// Prepare data for POST request
		$data = 'access_token=' . $apiKey . '&to=' . $recipients . '&message=' . $message . '&service=T&sender=' . $sender . '&template_id=' . $templateid;
		// Send the GET request with cURL
		$url = 'https://sms.messagewall.in/api/v2/sms/send?' . $data;
		$response = file_get_contents($url);
		// Process your response here
		echo $response;
	}
	///// edit General Message END ////////

	///// edit staff General Message START ////////
	public function addStaffGeneralMessage()
	{
		if (isset($_POST['selectedContanctNo'])) {
			$recipients = urlencode($_POST['selectedContanctNo']);
		}
		if (isset($_POST['templatetype'])) {
			$templateid = urlencode($_POST['templatetype']);
		}
		if (isset($_POST['general_comment'])) {
			$general_comments = $_POST['general_comment'];
		}

		// Account details
		$apiKey = '21400|AA7XvnY94a2UUJ2JjRmK0slM0J95M2GYhG9jMyLk';
		// Message details
		$sender = 'VPHSSS';
		// Prepare data for POST request
		$data = 'access_token=' . $apiKey . '&to=' . $recipients . '&message=' . $general_comments . '&service=T&sender=' . $sender . '&template_id=' . $templateid;
		// Send the GET request with cURL
		$url = 'https://sms.messagewall.in/api/v2/sms/send?' . $data;
		$response = file_get_contents($url);
		// Process your response here
		echo $response;
	}
	///// edit staff General Message END ////////

	///// edit Home Work Message START ////////
	public function addHomeWork($mysqli, $user_id, $school_id, $academic_year)
	{

		if (isset($_POST['home_work_comments'])) {
			$home_work_comments = $_POST['home_work_comments'];
		}
		if (isset($_POST['hw_char_count'])) {
			$hw_char_count = $_POST['hw_char_count'];
		}

		$mysqli->query("INSERT INTO `home_work_message`(`message`, `char_count`, `status`, `userid`, `school_id`, `academic_year`) VALUES ('$home_work_comments','$hw_char_count','0','$user_id','$school_id','$academic_year')");
	}
	///// edit Home Work Message END ////////


} //admin  class ends here/////