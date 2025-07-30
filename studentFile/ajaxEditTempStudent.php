<?php
include '../ajaxconfig.php';
if(isset($_POST["temp_admission_id"])){
	$temp_admission_id  = $_POST["temp_admission_id"]; 
} 
// $temp_admission_id = 1;
$getct = "SELECT * FROM temp_admission_student tas JOIN standard_creation sc ON tas.temp_standard = sc.standard_id WHERE tas.temp_admission_id = '".$temp_admission_id."' AND tas.status=0";
$result = $mysqli->query($getct);
while($row=$result->fetch_assoc())
{
    $temp_no = $row['temp_no'];
    $temp_student_name = $row['temp_student_name'];
    $temp_dob= $row['temp_dob'];
    $temp_gender= $row['temp_gender'];
    $temp_category= $row['temp_category'];
    $temp_standard= $row['temp_standard'];
    $temp_standard_name= $row['standard'];
    $temp_medium	= $row['temp_medium'];
    $temp_student_type	= $row['temp_student_type'];
    $temp_father_name= $row['temp_father_name'];
    $temp_mother_name= $row['temp_mother_name'];
    $temp_fathercontact_number= $row['temp_fathercontact_number'];
    $temp_mothercontact_number= $row['temp_mothercontact_number'];
    $temp_flat_no= $row['temp_flat_no'];
    $temp_street= $row['temp_street'];
    $temp_district= $row['temp_district'];
    $temp_area= $row['temp_area'];
    $temp_admission_id= $row['temp_admission_id'];
}

$feeDetails['temp_no'] = $temp_no;
$feeDetails['temp_student_name'] = $temp_student_name;
$feeDetails['temp_dob'] = $temp_dob;
$feeDetails['temp_gender'] = $temp_gender;
$feeDetails['temp_category'] = $temp_category;
$feeDetails['temp_standard'] = $temp_standard;
$feeDetails['temp_standard_name'] = $temp_standard_name;
$feeDetails['temp_medium'] = $temp_medium;
$feeDetails['temp_student_type'] = $temp_student_type;
$feeDetails['temp_father_name'] = $temp_father_name;
$feeDetails['temp_mother_name'] = $temp_mother_name;
$feeDetails['temp_fathercontact_number'] = $temp_fathercontact_number;
$feeDetails['temp_mothercontact_number'] = $temp_mothercontact_number;
$feeDetails['temp_flat_no'] = $temp_flat_no;
$feeDetails['temp_street'] = $temp_street;
$feeDetails['temp_district'] = $temp_district;
$feeDetails['temp_admission_id'] = $temp_admission_id;
$feeDetails['temp_area'] = $temp_area;

echo json_encode($feeDetails);
?>