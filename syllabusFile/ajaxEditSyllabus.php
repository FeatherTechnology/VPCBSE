<?php
include '../ajaxconfig.php';

if(isset($_POST["subject_id"])){
	$subject_id  = $_POST["subject_id"];
}

$subjectDetails=array();

$getct = "SELECT paper_name, max_mark FROM subject_details WHERE subject_id = '".$subject_id."' AND status=0";
$result = $mysqli->query($getct);
$row=$result->fetch_assoc();
$subjectDetails['paper_name'] = $row['paper_name'];
$subjectDetails['max_mark']= $row['max_mark'];


echo json_encode($subjectDetails);

?>