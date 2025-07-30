<?php
include '../ajaxconfig.php';

if(isset($_POST["student_id"])){
	$student_id  = $_POST["student_id"];
}

$getct = "SELECT * FROM student_creation WHERE student_id = '".$student_id."' AND status=0";
$result = $mysqli->query($getct);
while($row=$result->fetch_assoc())
{
    $reason = $row['reason'];
}

echo $reason;
?>































