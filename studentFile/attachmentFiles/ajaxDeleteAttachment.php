<?php
include '../../ajaxconfig.php';
@session_start();

if(isset($_SESSION["userid"])){
	$userid = $_SESSION["userid"];
}

if(isset($_POST["attachment_id"])){
	$attachment_id  = $_POST["attachment_id"];
}
$isdel = '';

	$delct=$mysqli->query("UPDATE attachment SET status = 1, update_login_id = '$userid', updated_date = now() WHERE id = '".$attachment_id."' ");
	if($delct){
		$message="Attachment Inactivated Successfully";
	}

echo json_encode($message);
?>