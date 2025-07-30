<?php
include '../../ajaxconfig.php';
if(isset($_POST["extra_fee_id"])){
	$extra_fee_id  = $_POST["extra_fee_id"];
}

$feeDetails = array();
$getct = "SELECT * FROM extra_curricular_activities_fee WHERE extra_fee_id = '".$extra_fee_id."' AND status = 1"; //Status = 1 - true.
$result = $mysqli->query($getct);
$row=$result->fetch_assoc();
    $extra_particulars = $row['extra_particulars'];
    $extra_amount = $row['extra_amount'];
    $extra_date= $row['extra_date'];
    $extra_type= $row['type'];

$feeDetails['extra_particulars'] = $extra_particulars;
$feeDetails['extra_amount'] = $extra_amount;
$feeDetails['extra_date'] = $extra_date;
$feeDetails['extra_type'] = $extra_type;

echo json_encode($feeDetails);
?>