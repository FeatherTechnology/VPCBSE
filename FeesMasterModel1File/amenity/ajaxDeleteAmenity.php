<?php
include '../../ajaxconfig.php';

if(isset($_POST["amenity_fee_id"])){
	$amenity_fee_id  = $_POST["amenity_fee_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT amenity_id_used FROM amenity_fee WHERE amenity_fee_id = '".$amenity_fee_id."' ");
if(mysqli_num_rows($ctqry)>0){
	$isdel=$ctqry->fetch_assoc()["amenity_id_used"];
}	

if($isdel != '0'){ 
	$message="You Don't Have Rights To Delete This Fees";

}else{ 
	$delct=$mysqli->query("UPDATE amenity_fee SET status = 0 WHERE amenity_fee_id = '".$amenity_fee_id."' ");
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>