<?php
include '../../ajaxconfig.php';

if(isset($_POST["fees_id"])){
	$fees_id  = $_POST["fees_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT * FROM fees_master WHERE amenity_particulars = '".$fees_id."' ");
while($row=$ctqry->fetch_assoc()){

	$isdel=$row["amenity_particulars"];
}

if($isdel != ''){ 
	$message="You Don't Have Rights To Delete This Fees";
}
else
{ 
	$delct=$mysqli->query("UPDATE fees_master SET status = 1 WHERE fees_id = '".$fees_id."' ");
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>