<?php
include '../../ajaxconfig.php';

if(isset($_POST["extra_fee_id"])){
	$extra_fee_id  = $_POST["extra_fee_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT extra_id_used FROM extra_curricular_activities_fee WHERE extra_fee_id = '".$extra_fee_id."' ");
if(mysqli_num_rows($ctqry)>0){
	$isdel=$ctqry->fetch_assoc()['extra_id_used'];
}

if($isdel != '0'){ 
	$message="You Don't Have Rights To Delete This Fees";

}else{ 
	$delct=$mysqli->query("UPDATE extra_curricular_activities_fee SET status = 0 WHERE extra_fee_id = '".$extra_fee_id."' ");
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>