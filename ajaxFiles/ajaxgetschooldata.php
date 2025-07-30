<?php
include '../ajaxconfig.php';

$mail='';
if(isset($_POST["mail"])){
	$mail = $_POST["mail"];
}
        
	$getschool = "SELECT s.school_id,s.school_name FROM school_creation s LEFT JOIN user u ON u.school_id = s.school_id WHERE s.status='0' AND u.user_name='$mail' ";
	$res = $mysqli->query($getschool) or die("Error in Get All Records".$mysqli->error);
	$getschool_list = array();
	$i=0;

	if ($mysqli->affected_rows>0)
	{
		while($row = $res->fetch_object()){
		
			$getschool_list[$i]['school_id']      = $row->school_id;
			$getschool_list[$i]['school_name']      = $row->school_name;
			$dept_id = $row->school_id;
			$i++;
		}
	}

echo json_encode($getschool_list);

$mysqli->close();
$connect = null;

?>