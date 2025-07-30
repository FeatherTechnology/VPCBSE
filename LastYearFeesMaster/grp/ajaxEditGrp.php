<?php
include '../../ajaxconfig.php';
if(isset($_POST["last_year_fees_master_id"])){
	$last_year_fees_master_id  = $_POST["last_year_fees_master_id"];
}

$getct = "SELECT * FROM last_year_fees_master WHERE last_year_fees_master_id = '".$last_year_fees_master_id."' AND status=0 AND grp_status = 1";
$result = $mysqli->query($getct);
while($row=$result->fetch_assoc())
{
    $grp_particulars = $row['grp_particulars'];
    $grp_amount = $row['grp_amount'];
    $grp_date= $row['grp_date'];
}

$feeDetails['grp_particulars'] = $grp_particulars;
$feeDetails['grp_amount'] = $grp_amount;
$feeDetails['grp_date'] = $grp_date;

echo json_encode($feeDetails);
?>