
<?php
include 'ajaxconfig.php';
@session_start();	
if(isset($_SESSION["school_id"])){
	$school_id = $_SESSION["school_id"];
}
if(isset($_SESSION["academic_year"])){
	$year_id = $_SESSION["academic_year"];
}
if (isset($_SESSION['curdateFromIndexPage'])) {
	$currentYear = date('Y',strtotime($_SESSION["curdateFromIndexPage"]));
}

if (isset($_POST['standard'])) {
	$standard = $_POST["standard"].'-';
}

$tempNoQry=$mysqli->query("SELECT temp_no FROM temp_admission_student WHERE school_id = '$school_id' AND year_id = '$year_id' AND temp_no LIKE '$standard%' ORDER BY temp_admission_id desc limit 1");
if($tempNoQry->num_rows>0){
	$temp_number=$tempNoQry->fetch_assoc()["temp_no"];
	$splited = explode('-', $temp_number);
    $appno2 = $splited[2] + 1;
    $temp_no = $splited[0]. '-' . $splited[1] . '-' . $appno2;
    
}else{
	$temp_no = $standard.$currentYear."-1";
}

echo json_encode($temp_no);
?>