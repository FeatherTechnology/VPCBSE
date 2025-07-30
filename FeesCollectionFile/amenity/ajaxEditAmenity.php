<?php
include '../ajaxconfig.php';

if(isset($_POST["subject_id"])){
	$subject_id  = $_POST["subject_id"];
}

$subjectDetails=array();
$paper_name = '';
$max_mark = '';


$getct = "SELECT * FROM subject_details WHERE subject_id = '".$subject_id."' AND status=0";
$result = $mysqli->query($getct);
while($row=$result->fetch_assoc())
{
    $paper_name = $row['paper_name'];
    $max_mark= $row['max_mark'];
}
$paper_name = $paper_name;
$max_mark = $max_mark;
// $subjectDetails['max_mark'] = $max_mark;

echo $paper_name , $max_mark;

?>