<?php
include '../../ajaxconfig.php';


if(isset($_POST['extra_particulars'])){
	$extra_particulars = $_POST['extra_particulars'];
}
if(isset($_POST['extra_amount'])){
	$extra_amount = $_POST['extra_amount'];
}
if(isset($_POST['extra_date'])){
	$extra_date = $_POST['extra_date']; 
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

$extra_academic_year='';
$extra_medium='';
$extra_Status='';
$extra_standard = '';


$extrac_particulars = '';
$extrac_amount = '' ;
$extrac_date = '' ;

$selectClass=$mysqli->query("SELECT * FROM fees_master_model3 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."'
AND extra_particulars = '".$extra_particulars."' AND extra_amount = '".$extra_amount."' AND extra_date = '".$extra_date."' AND standard = '".$standard."' ");
while ($row=$selectClass->fetch_assoc()){

		$extra_academic_year    = $row["academic_year"];
		$extra_medium    = $row["medium"];
		$extra_standard    = $row["standard"];
		$extrac_particulars    = $row["extra_particulars"];
		$extrac_amount    = $row["extra_amount"];
		$extrac_date    = $row["extra_date"];
		$extra_Status  = $row["status"];
	}
if($extra_academic_year != '' && $extra_medium != '' && $extra_standard != '' && $extrac_particulars != '' && $extra_Status == 0){ ;
	$message="Fees Already Exists, Please Enter a Different Name!";
}

else if($extra_academic_year != '' && $extra_medium != '' && $extra_standard != '' && $extrac_particulars != ''  && $extrac_amount != '' && $extrac_date != '' && $extra_Status == 1){ ;
	$updateClass=$mysqli->query("UPDATE fees_master_model3 SET status=0 WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND standard = '".$standard."'
	AND extra_particulars = '".$extra_particulars."' AND extra_amount = '".$extra_amount."' AND extra_date = '".$extra_date."' ");
	$message="Fees Details Added Succesfully";
}

else{ 
	if($fees_id>0){
		$updateClass=$mysqli->query("UPDATE academic_year = '".$academic_year."' AND medium = '".$medium."' AND standard = '".$standard."'
		AND extra_particulars = '".$extra_particulars."' AND extra_amount = '".$extra_amount."' AND extra_date = '".$extra_date."' WHERE fees_id='".$fees_id."' ");
		if($updateClass == true){
		    $message="Fees Details Updated Succesfully";
	    }
    }
	else{ ;
	    $insertClass=$mysqli->query("INSERT INTO fees_master_model3(academic_year,medium,standard,extra_particulars,extra_amount,extra_date,insert_login_id,extra_status) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."',
		'".strip_tags($standard)."','".strip_tags($extra_particulars)."','".strip_tags($extra_amount)."','".strip_tags($extra_date)."','".strip_tags($insert_login_id)."',1)");
	    if($insertClass == true){
		    $message="Fees Insert Succesfully";
	    }
    }
}

echo json_encode($message);
?>