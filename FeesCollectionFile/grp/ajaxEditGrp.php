<?php
include '../../ajaxconfig.php';

if(isset($_POST["fees_id"])){
	$fees_id  = $_POST["fees_id"];
}

$getct = "SELECT * FROM fees_master_model3 WHERE fees_id = '".$fees_id."' AND status=0 AND grp_status = 1";
$result = $mysqli->query($getct);
while($row=$result->fetch_assoc())
{
    $grp_particulars = $row['grp_particulars'];
    $grp_amount= $row['grp_amount'];
    $grp_date= $row['grp_date'];
}

echo $grp_particulars;
echo $grp_amount;
echo $grp_date;

?>