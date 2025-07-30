<!--In group_course_fee table grp_id_used = 0 - the value is not used in anyother table. 1 -the value is used in another table. -->
<?php
include '../../ajaxconfig.php';

@session_start();
if(isset($_SESSION["userid"])){
    $user_id = $_SESSION["userid"];
	$school_id    = $_SESSION["school_id"]; 
	$curdate = $_SESSION['curdateFromIndexPage']; 
} 

if(isset($_POST['academic_year'])){
	$academic_year = $_POST['academic_year']; 
}
if(isset($_POST['medium'])){
	$medium = $_POST['medium']; 
}
if(isset($_POST['student_type'])){
	$student_type = $_POST['student_type']; 
}
if(isset($_POST['standard'])){
	$standard = $_POST['standard']; 
}
if(isset($_POST['particulars'])){
	$grp_particulars = $_POST['particulars']; 
} 
if(isset($_POST['amount'])){
	$grp_amount = $_POST['amount'];
}
if(isset($_POST['date'])){
	$grp_date = $_POST['date']; 
}
if(isset($_POST['fees_id'])){
	$grp_course_id = $_POST['fees_id']; 
}

$grp_academic_year='';
$grp_medium='';
$grp_student_type = '';
$grp_standard = '';
$grpc_particulars = '';
$grpc_amount = '' ;
$grpc_date = '' ;
$grp_Status='';

$selectClass=$mysqli->query("SELECT fm.academic_year, fm.medium, fm.student_type, fm.standard, gcf.grp_particulars, gcf.grp_amount, gcf.grp_date, gcf.status  FROM `fees_master` fm JOIN `group_course_fee` gcf ON fm.fees_id = gcf.fee_master_id WHERE fm.academic_year = '".$academic_year."' AND fm.medium = '".$medium."' AND fm.student_type = '".$student_type."' AND fm.standard = '".$standard."' AND fm.school_id = '".$school_id."' AND gcf.grp_particulars = '".$grp_particulars."' AND gcf.grp_amount = '".$grp_amount."' AND gcf.grp_date = '".$grp_date."' ");
if(mysqli_num_rows($selectClass)>0){
	$row=$selectClass->fetch_assoc();
		$grp_academic_year    = $row["academic_year"];
		$grp_medium    = $row["medium"];
		$grp_student_type    = $row["student_type"];
		$grp_standard    = $row["standard"];
		$grpc_particulars    = $row["grp_particulars"];
		$grpc_amount    = $row["grp_amount"];
		$grpc_date    = $row["grp_date"];
		$grp_Status  = $row["status"];
}

if($grp_academic_year == $academic_year && $grp_medium == $medium && $grp_student_type == $student_type && $grp_standard == $standard && $grpc_particulars == $grp_particulars  && $grpc_amount == $grp_amount && $grpc_date == $grp_date && $grp_Status == 1){ 
	$message="Fees Already Exists, Please Enter a Different Name!";

}else if($grp_academic_year != '' && $grp_medium != '' && $grp_student_type != '' && $grp_standard != '' && $grpc_particulars != ''  && $grpc_amount != '' && $grpc_date != '' && $grp_Status == 0){ 
	$updateClass=$mysqli->query("UPDATE `group_course_fee` SET `grp_particulars`='$grp_particulars',`grp_amount`='$grp_amount',`grp_date`='$grp_date',`status`='1' WHERE grp_particulars = '".$grp_particulars."' AND grp_amount = '".$grp_amount."' AND grp_date = '".$grp_date."' ");
	$message="Fees Details Added Succesfully";

}else{ 
	if($grp_course_id>0){
		$updateClass1=$mysqli->query("UPDATE `group_course_fee` SET `grp_particulars`='$grp_particulars',`grp_amount`='$grp_amount',`grp_date`='$grp_date',`status`='1' WHERE grp_course_id='".$grp_course_id."' "); 
		if($updateClass1 == true){ 
			$message="Fees Details Updated Succesfully";
		}
    
	}else{ 
		if($student_type =='1'){//new
			$student_type1 = "2"; //old
			$student_type2 = "4"; //both
		
		}else if($student_type =='2'){//old
			$student_type1 = "1"; //new
			$student_type2 = "4"; //both
			
		}else if($student_type =='3'){//vijayadhashami
			$student_type1 = ""; 
			$student_type2 = ""; 
		
		}else if($student_type =='4'){//All
			$student_type1 = "1"; //new
			$student_type2 = "2"; //old
		}

		// $getFeeMasterDetailsQry = $mysqli->query("SELECT * FROM `fees_master` fm WHERE fm.academic_year = '".$academic_year."' AND fm.medium = '".$medium."' AND (fm.student_type = '".$student_type1."' OR fm.student_type = '".$student_type2."') AND fm.standard = '".$standard."' AND fm.school_id = '".$school_id."' ");
		// if(mysqli_num_rows($getFeeMasterDetailsQry)>0){
		// 	$message ="StudentType Already saved!";
		// }else{
					
			$feeMasterrowcnt=$mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND standard = '".$standard."' AND school_id = '".$school_id."' order by fees_id desc ");

			if(mysqli_num_rows($feeMasterrowcnt) > 0){
				$fee_master_last_id = $feeMasterrowcnt->fetch_assoc()['fees_id'];

				$insertClass=$mysqli->query("UPDATE `fees_master` SET `grp_status`='1',`update_login_id`='$user_id',`updated_date`='$curdate' WHERE `fees_id`='$fee_master_last_id' ");
				
			}else{
				$insertClass=$mysqli->query("INSERT INTO fees_master(academic_year,medium,student_type,standard,grp_status,insert_login_id,school_id) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."', '".strip_tags($student_type)."','".strip_tags($standard)."','1','".strip_tags($user_id)."', '".strip_tags($school_id)."')");
				$fee_master_last_id = mysqli_insert_id($mysqli);

			}

			$insertGrpFees = $mysqli->query("INSERT INTO `group_course_fee`(`fee_master_id`, `grp_particulars`, `grp_amount`, `grp_date`) VALUES ('".strip_tags($fee_master_last_id)."','".strip_tags($grp_particulars)."','".strip_tags($grp_amount)."','".strip_tags($grp_date)."' )");

			if($insertClass && $insertGrpFees){
				$message="Fees Insert Succesfully";
			}else{
				$message="Fees Insert Failed";
			}
		// }
    }
}
echo json_encode($message);
?>