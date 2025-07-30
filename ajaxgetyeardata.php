<?php
include('ajaxconfig.php');

if(isset($_POST["school"])){
    $school = $_POST["school"];
}
$getyearfromschool = "SELECT year_id FROM school_creation WHERE status = '0' AND school_id='$school'";
$res1 = $mysqli->query($getyearfromschool) or die("Error in Get All Records".$mysqli->error);
$row1 = $res1->fetch_object();

     $year = $row1->year_id;
			// Split the string into individual years
		$yearsArray = explode(',', $year);
		
		// Iterate through the years and add single quotes
		$quotedYears = array();
		foreach ($yearsArray as $year) {
		$quotedYears[] = "'" . trim($year) . "'";
		}

		// Convert the array of quoted years back to a string
		$quotedYearsString = implode(', ', $quotedYears);

		
	 
$getyear = "SELECT year_id,academic_year FROM academic_year WHERE status='0' AND academic_year IN ($quotedYearsString)";
	// print_r($getyear);	
		$res = $mysqli->query($getyear) or die("Error in Get All Records".$mysqli->error);
		$getyear_list = array();
		$i=0;

		if ($mysqli->affected_rows>0)
		{
			while($row = $res->fetch_object()){
			
				$getyear_list[$i]['year_id']      = $row->year_id;
				$getyear_list[$i]['academic_year']      = $row->academic_year;
				$year_id = $row->year_id;
				$i++;
			}
		}


    
        $response = array(
            'year' => $getyear_list
          );
        
       
          echo json_encode($response);


?>