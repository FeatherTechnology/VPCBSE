<!--In extra_curricular_activities_fee table extra_id_used = 0 - the value is not used in anyother table. 1 -the value is used in another table. -->
<?php
include '../../ajaxconfig.php';

@session_start();
if(isset($_SESSION["userid"])){
    $user_id = $_SESSION["userid"];
	$school_id = $_SESSION["school_id"];
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
	$amenity_particulars = $_POST['particulars']; 
} 
if(isset($_POST['amount'])){
	$amenity_amount = $_POST['amount'];
}
if(isset($_POST['date'])){
	$amenity_date = $_POST['date']; 
}
if(isset($_POST['fees_id'])){
	$amenity_fee_id = $_POST['fees_id']; 
}

$amenity_academic_year='';
$amenity_medium='';
$amenity_student_type = '';
$amenity_standard = '';
$amenity_fees_particulars = '';
$amenity_fees_amount = '' ;
$amenity_fees_date = '' ;
$amenity_fees_Status='';

$selectClass=$mysqli->query("SELECT fm.academic_year, fm.medium, fm.student_type, fm.standard, af.amenity_particulars, af.amenity_amount, af.amenity_date, af.status  FROM `fees_master` fm JOIN `amenity_fee` af ON fm.fees_id = af.fee_master_id WHERE fm.academic_year = '".$academic_year."' AND fm.medium = '".$medium."' AND fm.student_type = '".$student_type."' AND fm.standard = '".$standard."' AND fm.school_id = '".$school_id."' AND af.amenity_particulars = '".$amenity_particulars."' AND af.amenity_amount = '".$amenity_amount."' AND af.amenity_date = '".$amenity_date."' ");
if(mysqli_num_rows($selectClass)>0){
	$row=$selectClass->fetch_assoc();	
		$amenity_academic_year    = $row["academic_year"];
		$amenity_medium    = $row["medium"];
		$amenity_student_type    = $row["student_type"];
		$amenity_standard    = $row["standard"];
		$amenity_fees_particulars    = $row["amenity_particulars"];
		$amenity_fees_amount    = $row["amenity_amount"];
		$amenity_fees_date    = $row["amenity_date"];
		$amenity_fees_Status  = $row["status"];
}

if($amenity_academic_year == $academic_year && $amenity_medium == $medium && $amenity_student_type == $student_type && $amenity_standard == $standard && $amenity_fees_particulars == $amenity_particulars  && $amenity_fees_amount == $amenity_amount && $amenity_fees_date == $amenity_date && $amenity_fees_Status == 1){
	$message="Amenity Fees Already Exists, Please Enter a Different Name!";

}else if($amenity_academic_year != '' && $amenity_medium != '' && $amenity_student_type != '' && $amenity_standard != '' && $amenity_fees_particulars != ''  && $amenity_fees_amount != '' && $amenity_fees_date != '' && $amenity_fees_Status == 0){
	$updateClass=$mysqli->query("UPDATE amenity_fee SET amenity_particulars = '".$amenity_particulars."', amenity_amount = '".$amenity_amount."', amenity_date = '".$amenity_date."', `status`='1' WHERE amenity_particulars = '".$amenity_particulars."' AND amenity_amount = '".$amenity_amount."' AND amenity_date = '".$amenity_date."' ");
	$message="Fees Details Added Succesfully";

}else{ 
	if($amenity_fee_id>0){
		$updateAmenity=$mysqli->query("UPDATE amenity_fee SET amenity_particulars = '".$amenity_particulars."', amenity_amount = '".$amenity_amount."', amenity_date = '".$amenity_date."', `status`='1' WHERE amenity_fee_id='".$amenity_fee_id."' ");
		if($updateAmenity == true){
			$message="Amenity Fees Details Updated Succesfully";
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

				$insertClass=$mysqli->query("UPDATE `fees_master` SET `amenity_status`='1',`update_login_id`='$user_id',`updated_date`='$curdate' WHERE `fees_id`='$fee_master_last_id' ");

			}else{
			$insertClass=$mysqli->query("INSERT INTO fees_master(academic_year,medium,student_type,standard,amenity_status,insert_login_id,school_id) VALUES('".strip_tags($academic_year)."','".strip_tags($medium)."', '".strip_tags($student_type)."','".strip_tags($standard)."','1','".strip_tags($user_id)."','".strip_tags($school_id)."') ");
			$fee_master_last_id = mysqli_insert_id($mysqli);
			}

			$insertAmenityFees = $mysqli->query("INSERT INTO `amenity_fee`( `fee_master_id`, `amenity_particulars`, `amenity_amount`, `amenity_date`) VALUES ('".strip_tags($fee_master_last_id)."','".strip_tags($amenity_particulars)."','".strip_tags($amenity_amount)."','".strip_tags($amenity_date)."' )");

			if($insertClass && $insertAmenityFees){
				$message="Amenity Fees Insert Succesfully";
			}else{
				$message="Amenity Fees Insert Failed";
			}
		// }
    }
}

echo json_encode($message);
?>