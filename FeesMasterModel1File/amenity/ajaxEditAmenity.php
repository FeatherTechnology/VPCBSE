<?php
include '../../ajaxconfig.php';
if(isset($_POST["amenity_fee_id"])){
	$amenity_fee_id  = $_POST["amenity_fee_id"];
}

$feeDetails = array();
$getct = "SELECT * FROM amenity_fee WHERE amenity_fee_id = '".$amenity_fee_id."' AND status = 1"; //Status = 1 - true, 0 - false.
$result = $mysqli->query($getct);
$row=$result->fetch_assoc();
    $amenity_particulars = $row['amenity_particulars'];
    $amenity_amount = $row['amenity_amount'];
    $amenity_date= $row['amenity_date'];

$feeDetails['amenity_particulars'] = $amenity_particulars;
$feeDetails['amenity_amount'] = $amenity_amount;
$feeDetails['amenity_date'] = $amenity_date;

echo json_encode($feeDetails);
?>