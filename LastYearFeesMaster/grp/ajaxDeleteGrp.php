<?php
include '../../ajaxconfig.php';

if(isset($_POST["last_year_fees_master_id"])){
	$last_year_fees_master_id  = $_POST["last_year_fees_master_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT * FROM last_year_fees_master WHERE grp_particulars = '".$last_year_fees_master_id."' ");
while($row=$ctqry->fetch_assoc()){

	$isdel=$row["grp_particulars"];
}

if($isdel != ''){ 
	$message="You Don't Have Rights To Delete This Fees";
}
else
{ 
	$delct=$mysqli->query("UPDATE last_year_fees_master SET status = 1 WHERE last_year_fees_master_id = '".$last_year_fees_master_id."' ");
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>