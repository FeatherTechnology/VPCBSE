<?php
include('ajaxconfig.php');

$mail='';
if(isset($_POST["mail"])){
    $mail = $_POST["mail"];
}
$pass='';
if(isset($_POST["pass"])){
    $pass = $_POST["pass"];
}
$school='';
if(isset($_POST["school"])){
    $school = $_POST["school"];
}
$academic_year='';
if(isset($_POST["academic_year"])){
    $academic_year = $_POST["academic_year"];
}

	$getyearfromschool = "SELECT year_id FROM school_creation WHERE status = '0' AND  FIND_IN_SET($school,school_id)";
	$res1 = $mysqli->query($getyearfromschool) or die("Error in Get All Records".$mysqli->error);
	$row1 = $res1->fetch_object();
	
		    $year = $row1->year_id;
			// print_r($year);
				// Split the string into individual years
			$yearsArray = explode(',', $year);
	
			// Iterate through the years and add single quotes
			$quotedYears = array();
			foreach ($yearsArray as $year) {
			$quotedYears[] = "'" . trim($year) . "'";
			}
			 
			// Convert the array of quoted years back to a string
			$quotedYearsString = implode(', ', $quotedYears);
			$len = strlen($quotedYearsString);
			if ($len > 11){
				$quotedYearsStrings = implode(', ', $quotedYears);
			}else{
				$quotedYearsString = implode(', ', $quotedYears);
				$quotedYearsStrings = trim($quotedYearsString,"'");
			}
			if($mail != ''){
				$validate = "AND u.user_name = '$mail'";	
			}else{
				$validate = "";
			}
			if($pass != ''){
				$validate = "AND u.user_password = '$pass'";
			}else{
				$validate = "";
			}
			if($school != ''){
				$validate = "AND u.school_id ='$school'";
			}else{
				$validate = "";
			}
			if($academic_year != ''){
				$validate = "AND a.academic_year='$academic_year' ";
			}else{
				$validate = "";
			}
			
			$getschool = "SELECT u.fullname,u.user_id,u.school_id,s.school_name,a.year_id,a.academic_year FROM user u LEFT JOIN school_creation s ON s.school_id=u.school_id LEFT JOIN academic_year a ON a.academic_year IN ($academic_year) = s.year_id IN ($quotedYearsStrings) WHERE  u.status=0 $validate";
			
	        //  echo "$getschool".$getschool;
			$res = $mysqli->query($getschool) or die("Error in Get All Records".$mysqli->error);
			$getschool_list = array();
			$i=0;
	
			if ($mysqli->affected_rows>0)
			{
				while($row = $res->fetch_object()){
				
					$getschool_list[$i]['fullname']      = $row->fullname;
					$getschool_list[$i]['user_id']      = $row->user_id;
					$getschool_list[$i]['school_id']      = $row->school_id;
					$getschool_list[$i]['school_name']      = $row->school_name;
					$getschool_list[$i]['year_id']      = $row->year_id;
					$getschool_list[$i]['academic_year']      = $row->academic_year;
					
					$i++;
				}
			}
	
	


    
        $response = array(
            'login' => $getschool_list
          );
        
       
          echo json_encode($response);


?>