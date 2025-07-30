<?php
include '../ajaxconfig.php';

if(isset($_POST["subject_id"])){
	$subject_id  = $_POST["subject_id"];
}
$isdel = '';

$ctqry=$mysqli->query("SELECT * FROM subject_details WHERE subject_id = '".$subject_id."' ");
while($row=$ctqry->fetch_assoc()){
	$isdel=$row["paper_name"];
}

if($isdel != ''){ 
	$message="You Don't Have Rights To Delete This Subject";
}
else
{ 
	$delct=$mysqli->query("UPDATE subject_details SET status = 1 WHERE subject_id = '".$subject_id."' ");
	if($delct){
		$message="Subject Inactivated Successfully";
	}
}

echo json_encode($message);
?>