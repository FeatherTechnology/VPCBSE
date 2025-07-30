<?php
include "../ajaxConfig.php";
@session_start();
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
if(isset($_POST['StudentId'])){
    $StudentId = $_POST['StudentId'];
}
if(isset($_POST['rejectReason'])){
    $rejectReason = $_POST['rejectReason'];
}
if(isset($_POST['conCessionType'])){
    $conCessionType = $_POST['conCessionType'];
}

$rejectUpdQry = $connect->query("UPDATE student_creation SET concession_reject_reason = '$rejectReason', approval = 'Rejected',`update_login_id`='$userid',`updated_date`= now() WHERE student_id = '$StudentId' ");

if($conCessionType ==  'ReferalConcession'){
    $connect->query("UPDATE `referral_details` SET `approved`='Rejected' WHERE student_id = '$StudentId' ");
}


if($rejectUpdQry){
    $result = 1;
}else{
    $result = 0;
}

echo json_encode($result);
?>