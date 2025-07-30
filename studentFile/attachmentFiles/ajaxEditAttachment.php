<?php
include '../../ajaxconfig.php';

if(isset($_POST["attachment_id"])){
	$attachment_id  = $_POST["attachment_id"];
}

$attachArr = array();

$getct = "SELECT * FROM attachment WHERE id = '".$attachment_id."' AND status = 0";
$result = $mysqli->query($getct);
$row=$result->fetch_assoc();

    $attachArr = array("title" => $row['title'],"file_name" => $row['file_name'], "file_path" => $row['file_path']);

echo json_encode($attachArr);
?>