<?php
include '../../ajaxconfig.php';

if(isset($_POST["transport_fees_master_id"])){
	$transport_fees_master_id  = $_POST["transport_fees_master_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT * FROM transport_fees_master WHERE grp_particulars = '".$transport_fees_master_id."' ");
while($row=$ctqry->fetch_assoc()){

	$isdel=$row["grp_particulars"];
}

if($isdel != ''){ 
	$message="You Don't Have Rights To Delete This Fees";
}
else
{ 
	$delct=$mysqli->query("UPDATE transport_fees_master SET status = 1 WHERE transport_fees_master_id = '".$transport_fees_master_id."' ");
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>