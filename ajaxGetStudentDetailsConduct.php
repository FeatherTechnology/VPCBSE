<?php
@session_start(); 
include 'ajaxconfig.php';

if(isset($_POST["admission_number"])){
    $admission_number = $_POST["admission_number"];
}

$student_details = array();

// get student name
$getInstName=$mysqli->query("SELECT * FROM `student_creation` WHERE student_id ='".$admission_number."' ");

	while($row2=$getInstName->fetch_assoc()){
    $student_id[]    = $row2["student_id"];
    $student_name[]    = $row2["student_name"];
    $telephone_number[]    = $row2["telephone_number"];
}


$student_details["student_id"] = $student_id;
$student_details["student_name"] = $student_name;
$student_details["telephone_number"] = $telephone_number;

 
echo json_encode($student_details);
?>