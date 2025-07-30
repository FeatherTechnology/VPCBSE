<?php
include '../../ajaxconfig.php';


if(isset($_POST['particulars'])){
	$grp_particulars = $_POST['particulars']; 
} 
if(isset($_POST['amount'])){
	$grp_amount = $_POST['amount'];
}
if(isset($_POST['date'])){
	$grp_date = $_POST['date']; 
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
 
if(isset($_POST['last_year_fees_master_id'])){
	$last_year_fees_master_id = $_POST['last_year_fees_master_id'];  
} 

$grp_academic_year='';
$grp_medium='';
$grp_Status='';
$grp_standard = '';
$grp_student_type = '';

$grpc_particulars = '';
$grpc_amount = '' ;
$grpc_date = '' ;

$selectClass=$mysqli->query("SELECT * FROM last_year_fees_master WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."'
AND grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' AND standard = '".$standard."' ");
while ($row=$selectClass->fetch_assoc()){

		$grp_academic_year    = $row["academic_year"];
		$grp_medium    = $row["medium"];
		$grp_student_type    = $row["student_type"];
		$grp_standard    = $row["standard"];
		$grpc_particulars    = $row["grp_particulars"];
		$grpc_amount    = $row["grp_amount"];
		$grpc_date    = $row["grp_date"];
		$grp_Status  = $row["status"];
	}
if($grp_academic_year != '' && $grp_medium != '' && $grp_student_type != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 0){ 
	$message="Fees Already Exists, Please Enter a Different Name!";
}

else if($grp_academic_year != '' && $grp_medium != '' && $grp_student_type != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 1){ 
	$updateClass=$mysqli->query("UPDATE last_year_fees_master SET status=0 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND standard = '".$standard."'
	AND grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' ");
	$message="Fees Details Added Succesfully";
}

else{ 
	if($last_year_fees_master_id>0){
		$updateClass1=$mysqli->query("UPDATE last_year_fees_master SET academic_year = '".$academic_year."', medium = '".$medium."', student_type = '".$student_type."', 
		standard = '".$standard."', grp_particulars = '".$grp_particulars."', grp_amount = '".$grp_amount."', grp_date = '".$grp_date."' WHERE last_year_fees_master_id='".$last_year_fees_master_id."' 
		"); 
		if($updateClass1 == true){ 
		    $message="Fees Details Updated Succesfully";
	    }
    }
	else{ 
	    $insertClass=$mysqli->query("INSERT INTO last_year_fees_master(academic_year,medium,student_type,standard,grp_particulars,grp_amount,grp_date,insert_login_id,grp_status) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."',
		'".strip_tags($student_type)."','".strip_tags($standard)."','".strip_tags($grp_particulars)."','".strip_tags($grp_amount)."','".strip_tags($grp_date)."','".strip_tags($insert_login_id)."', '1')");
		//  $lastInsertId = mysqli_insert_id($mysqli);
		if($insertClass == true){
		    $message="Fees Insert Succesfully";
			// $lastInsertId = mysqli_insert_id($mysqli);

	    }
    }
}
echo json_encode($message);
// echo json_encode(array('message' => $message, 'lastInsertId' => $lastInsertId));

?>