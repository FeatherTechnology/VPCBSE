<?php
include '../../ajaxconfig.php';
if(isset($_POST["grp_course_id"])){
	$grp_course_id  = $_POST["grp_course_id"];
}

$feeDetails = array();
$getct = "SELECT * FROM group_course_fee WHERE grp_course_id = '".$grp_course_id."' AND status = 1 "; //Status = 1 - true;
$result = $mysqli->query($getct);
$row=$result->fetch_assoc();
    $grp_particulars = $row['grp_particulars'];
    $grp_amount = $row['grp_amount'];
    $grp_date= $row['grp_date'];

$feeDetails['grp_particulars'] = $grp_particulars;
$feeDetails['grp_amount'] = $grp_amount;
$feeDetails['grp_date'] = $grp_date;

echo json_encode($feeDetails);
?>