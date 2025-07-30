<!--In extra_curricular_activities_fee table extra_id_used = 0 - the value is not used in anyother table. 1 -the value is used in another table. -->
<?php
include '../../ajaxconfig.php';

@session_start();
if (isset($_SESSION["userid"])) {
	$user_id = $_SESSION["userid"];
	$school_id = $_SESSION["school_id"];
	$curdate = $_SESSION['curdateFromIndexPage'];
}

if (isset($_POST['academic_year'])) {
	$academic_year = $_POST['academic_year'];
}
if (isset($_POST['medium'])) {
	$medium = $_POST['medium'];
}
if (isset($_POST['student_type'])) {
	$student_type = $_POST['student_type'];
}
if (isset($_POST['standard'])) {
	$standard = $_POST['standard'];
}
if (isset($_POST['particulars'])) {
	$extra_particulars = $_POST['particulars'];
}
if (isset($_POST['amount'])) {
	$extra_amount = $_POST['amount'];
}
if (isset($_POST['date'])) {
	$extra_date = $_POST['date'];
}
if (isset($_POST['type'])) {
	$extra_type = $_POST['type'];
}
if (isset($_POST['fees_id'])) {
	$extra_fee_id = $_POST['fees_id'];
}

$extra_academic_year = '';
$extra_medium = '';
$extra_student_type = '';
$extra_standard = '';
$extrac_particulars = '';
$extrac_amount = '';
$extrac_date = '';
$extra_Status = '';

$selectClass = $mysqli->query("SELECT fm.academic_year, fm.medium, fm.student_type, fm.standard, ecaf.extra_particulars, ecaf.extra_amount, ecaf.extra_date, ecaf.status, ecaf.type  FROM `fees_master` fm JOIN `extra_curricular_activities_fee` ecaf ON fm.fees_id = ecaf.fee_master_id WHERE fm.academic_year = '" . $academic_year . "' AND fm.medium = '" . $medium . "' AND fm.student_type = '" . $student_type . "' AND fm.standard = '" . $standard . "' AND fm.school_id = '" . $school_id . "' AND ecaf.extra_particulars = '" . $extra_particulars . "' AND ecaf.extra_amount = '" . $extra_amount . "' AND ecaf.extra_date = '" . $extra_date . "' AND ecaf.type = '" . $extra_type . "' ");
if (mysqli_num_rows($selectClass) > 0) {
	$row = $selectClass->fetch_assoc();
	$extra_academic_year    = $row["academic_year"];
	$extra_medium    = $row["medium"];
	$extra_student_type    = $row["student_type"];
	$extra_standard    = $row["standard"];
	$extrac_particulars    = $row["extra_particulars"];
	$extrac_amount    = $row["extra_amount"];
	$extrac_date    = $row["extra_date"];
	$extrac_type  = $row["type"];
	$extra_Status  = $row["status"];
}

if ($extra_academic_year == $academic_year && $extra_medium == $medium && $extra_student_type == $student_type && $extra_standard == $standard && $extrac_particulars == $extra_particulars && $extrac_amount == $extra_amount && $extrac_date == $extra_date && $extrac_type == $extra_type && $extra_Status == 1) {;
	$message = "Fees Already Exists, Please Enter a Different Name!";
} else if ($extra_academic_year != '' && $extra_medium != '' && $extra_student_type != '' && $extra_standard != '' && $extrac_particulars != ''  && $extrac_amount != '' && $extrac_date != '' && $extra_Status == 0) {
	$updateClass = $mysqli->query("UPDATE extra_curricular_activities_fee SET extra_particulars = '" . $extra_particulars . "', extra_amount = '" . $extra_amount . "', extra_date = '" . $extra_date . "', `status`='1' WHERE extra_particulars = '" . $extra_particulars . "' AND extra_amount = '" . $extra_amount . "' AND extra_date = '" . $extra_date . "' AND type = '" . $extra_type . "' ");
	$message = "Fees Details Added Succesfully";
} else {
	if ($extra_fee_id > 0) {
		$updateextra = $mysqli->query("UPDATE extra_curricular_activities_fee SET extra_particulars = '" . $extra_particulars . "', extra_amount = '" . $extra_amount . "', extra_date = '" . $extra_date . "', type = '" . $extra_type . "', `status`='1' WHERE extra_fee_id='" . $extra_fee_id . "' ");
		if ($updateextra == true) {
			$message = "Fees Details Updated Succesfully";
		}
	} else {
		if ($student_type == '1') { //new
			$student_type1 = "2"; //old
			$student_type2 = "4"; //both

		} else if ($student_type == '2') { //old
			$student_type1 = "1"; //new
			$student_type2 = "4"; //both

		} else if ($student_type == '3') { //vijayadhashami
			$student_type1 = "";
			$student_type2 = "";
		} else if ($student_type == '4') { //All
			$student_type1 = "1"; //new
			$student_type2 = "2"; //old
		}

		// $getFeeMasterDetailsQry = $mysqli->query("SELECT * FROM `fees_master` fm WHERE fm.academic_year = '".$academic_year."' AND fm.medium = '".$medium."' AND (fm.student_type = '".$student_type1."' OR fm.student_type = '".$student_type2."') AND fm.standard = '".$standard."' AND fm.school_id = '".$school_id."' ");
		// if(mysqli_num_rows($getFeeMasterDetailsQry)>0){
		// 	$message ="StudentType Already saved!";
		// }else{

		$feeMasterrowcnt = $mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '" . $academic_year . "' AND medium = '" . $medium . "' AND student_type = '" . $student_type . "' AND standard = '" . $standard . "' AND school_id = '" . $school_id . "' order by fees_id desc ");

		if (mysqli_num_rows($feeMasterrowcnt) > 0) {
			$fee_master_last_id = $feeMasterrowcnt->fetch_assoc()['fees_id'];

			$insertClass = $mysqli->query("UPDATE `fees_master` SET `extra_status`='1',`update_login_id`='$user_id',`updated_date`='$curdate' WHERE `fees_id`='$fee_master_last_id' ");
		} else {
			$insertClass = $mysqli->query("INSERT INTO fees_master(academic_year,medium,student_type,standard,extra_status,insert_login_id,school_id) VALUES('" . strip_tags($academic_year) . "','" . strip_tags($medium) . "', '" . strip_tags($student_type) . "','" . strip_tags($standard) . "','1','" . strip_tags($user_id) . "','" . strip_tags($school_id) . "')");
			$fee_master_last_id = mysqli_insert_id($mysqli);
		}

		$insertExtraFees = $mysqli->query("INSERT INTO `extra_curricular_activities_fee`( `fee_master_id`, `extra_particulars`, `extra_amount`, `extra_date`, `type`) VALUES ('" . strip_tags($fee_master_last_id) . "','" . strip_tags($extra_particulars) . "','" . strip_tags($extra_amount) . "','" . strip_tags($extra_date) . "', '" . strip_tags($extra_type) . "' )");

		if ($insertClass && $insertExtraFees) {
			$message = "Fees Insert Succesfully";
		} else {
			$message = "Fees Insert Failed";
		}
		// }
	}
}

echo json_encode($message);
?>