<?php
include('ajaxconfig.php');
if(isset($_POST["contact_no"])){
	$contact_no  = $_POST["contact_no"];
}
$select1 = $mysqli->query("SELECT contact_number FROM trustee_creation WHERE contact_number = '".$contact_no."' ");
while($row=$select1->fetch_assoc()){
	$contactexist = $row["contact_number"];
}
if(isset($contactexist)){
	$message = 1;
}else{
	$message = 0;
}
echo json_encode($message);
?>