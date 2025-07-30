<?php
include '../../ajaxconfig.php';

if(isset($_POST["grp_course_id"])){
	$grp_course_id  = $_POST["grp_course_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT grp_id_used FROM `group_course_fee` WHERE grp_course_id = '".$grp_course_id."' ");
if(mysqli_num_rows($ctqry)>0){
	$isdel = $ctqry->fetch_assoc()["grp_id_used"];
}

if($isdel != '0'){ 
	$message="You Don't Have Rights To Delete This Fees";

}else{ 
	$delct=$mysqli->query("UPDATE group_course_fee SET status = 0 WHERE grp_course_id = '".$grp_course_id."' "); //status = 0 - False - InActive
	if($delct){
		$message="Fees Inactivated Successfully";
	}
}

echo json_encode($message);
?>