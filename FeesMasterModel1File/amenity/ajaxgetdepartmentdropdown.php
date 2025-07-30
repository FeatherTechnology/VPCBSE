<?php 
include('../ajaxconfig.php');
$papernamearr = array();
$result=$mysqli->query("SELECT * FROM subject_details where 1 and status=0");
while( $row = $result->fetch_assoc()){
      $subject_id = $row['subject_id'];
      $paper_name = $row['paper_name'];
      $papernamearr[] = array("subject_id" => $subject_id, "paper_name" => $paper_name);
   }
echo json_encode($papernamearr);
?>