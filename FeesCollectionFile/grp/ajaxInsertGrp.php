<?php
include '../../ajaxconfig.php';


if(isset($_POST['grp_particulars'])){
	$grp_particulars = $_POST['grp_particulars'];
}
if(isset($_POST['grp_amount'])){
	$grp_amount = $_POST['grp_amount'];
}
if(isset($_POST['grp_date'])){
	$grp_date = $_POST['grp_date']; 
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


$grpc_particulars = '';
$grpc_amount = '' ;
$grpc_date = '' ;

$selectClass=$mysqli->query("SELECT * FROM fees_master_model3 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."'
AND grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' AND standard = '".$standard."' ");
while ($row=$selectClass->fetch_assoc()){

		$grp_academic_year    = $row["academic_year"];
		$grp_medium    = $row["medium"];
		$grp_standard    = $row["standard"];
		$grpc_particulars    = $row["grp_particulars"];
		$grpc_amount    = $row["grp_amount"];
		$grpc_date    = $row["grp_date"];
		$grp_Status  = $row["status"];
	}
if($grp_academic_year != '' && $grp_medium != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 0){
	$message="Fees Already Exists, Please Enter a Different Name!";
}

else if($grp_academic_year != '' && $grp_medium != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 1){ 
	$updateClass=$mysqli->query("UPDATE fees_master_model3 SET status=0 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND standard = '".$standard."'
	AND grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' ");
	$message="Fees Details Added Succesfully";
}

else{ 
	if($fees_id>0){
		$updateClass=$mysqli->query("UPDATE academic_year = '".$academic_year."' AND medium = '".$medium."' AND standard = '".$standard."'
		AND grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' WHERE fees_id='".$fees_id."' ");
		if($updateClass == true){
		    $message="Fees Details Updated Succesfully";
	    }
    }
	else{ 
	    $insertClass=$mysqli->query("INSERT INTO fees_master_model3(academic_year,medium,standard,grp_particulars,grp_amount,grp_date,insert_login_id,grp_status) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."',
		'".strip_tags($standard)."','".strip_tags($grp_particulars)."','".strip_tags($grp_amount)."','".strip_tags($grp_date)."','".strip_tags($insert_login_id)."', '1')");
	    if($insertClass == true){
		    $message="Fees Insert Succesfully";
	    }
    }
}

echo json_encode($message);
?>