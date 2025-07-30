<?php
include '../../ajaxconfig.php';


if(isset($_POST['amenity_particulars'])){
	$amenity_particulars = $_POST['amenity_particulars'];
}
if(isset($_POST['amenity_amount'])){
	$amenity_amount = $_POST['amenity_amount'];
}
if(isset($_POST['amenity_date'])){
	$amenity_date = $_POST['amenity_date']; 
}
if(isset($_POST['academic_year'])){
	$academic_year = $_POST['academic_year']; 
}
if(isset($_POST['medium'])){
	$medium = $_POST['medium']; 
}
if(isset($_POST['standard'])){
	$standard = $_POST['standard']; 
}
if(isset($_POST['student_type'])){
	$student_type = $_POST['student_type']; 
}
if(isset($_POST['insert_login_id'])){
	$insert_login_id = $_POST['insert_login_id']; 
}
 
if(isset($_POST['fees_id'])){
	$fees_id = $_POST['fees_id']; 
} 

$grp_academic_year='';
$grp_medium='';
$grp_Status='';
$grp_standard = '';
$grp_student_type = '';

$grpc_particulars = '';
$grpc_amount = '' ;
$grpc_date = '' ;

$selectClass=$mysqli->query("SELECT * FROM fees_master WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."'
AND amenity_particulars = '".$amenity_particulars."' AND amenity_amount = '".$amenity_amount."' AND amenity_date = '".$amenity_date."' AND standard = '".$standard."' ");
while ($row=$selectClass->fetch_assoc()){

		$grp_academic_year    = $row["academic_year"];
		$grp_medium    = $row["medium"];
		$grp_student_type    = $row["student_type"];
		$grp_standard    = $row["standard"];
		$grpc_particulars    = $row["amenity_particulars"];
		$grpc_amount    = $row["amenity_amount"];
		$grpc_date    = $row["amenity_date"];
		$grp_Status  = $row["status"];
	}
if($grp_academic_year != '' && $grp_medium != '' && $grp_student_type != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 0){ echo "1";
	$message="Amenity Fees Already Exists, Please Enter a Different Name!";
}

else if($grp_academic_year != '' && $grp_medium != '' && $grp_student_type != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 1){ echo "2";
	$updateClass=$mysqli->query("UPDATE fees_master SET status=0 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND standard = '".$standard."'
	AND amenity_particulars = '".$amenity_particulars."' AND amenity_amount = '".$amenity_amount."' AND amenity_date = '".$amenity_date."' ");
	$message="Fees Details Added Succesfully";
}

else{ 
	if($fees_id>0){
		$updateClass=$mysqli->query("UPDATE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND standard = '".$standard."'
		AND amenity_particulars = '".$amenity_particulars."' AND amenity_amount = '".$amenity_amount."' AND amenity_date = '".$amenity_date."' WHERE fees_id='".$fees_id."' ");
		if($updateClass == true){
		    $message="Amenity Fees Details Updated Succesfully";
	    }
    }
	else{ 
	    $insertClass=$mysqli->query("INSERT INTO fees_master(academic_year,medium,student_type,standard,amenity_particulars,amenity_amount,amenity_date,insert_login_id, amenity_status) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."',
		'".strip_tags($student_type)."','".strip_tags($standard)."','".strip_tags($amenity_particulars)."','".strip_tags($amenity_amount)."','".strip_tags($amenity_date)."','".strip_tags($insert_login_id)."',1)");
	    if($insertClass == true){
		    $message="Amenity Fees Insert Succesfully";
	    }
    }
}

echo json_encode($message);
?>