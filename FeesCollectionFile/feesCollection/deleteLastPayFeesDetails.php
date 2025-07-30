<?php
include "../../ajaxconfig.php";
if(isset($_POST['feesid'])){ 
    $feesid = $_POST['feesid'];
}

$deleteAdmissionFeesQry = $connect->query("DELETE FROM `last_year_fees` WHERE `id` ='$feesid' ");
$deleteAdmissionFeesDetailsQry = $connect->query("DELETE FROM `last_year_fees_details` WHERE `admission_fees_ref_id` ='$feesid' ");
$deleteAdmissionFeesDenominationQry = $connect->query("DELETE FROM `last_year_fees_denomination` WHERE `admission_fees_ref_id`='$feesid' ");

if($deleteAdmissionFeesQry && $deleteAdmissionFeesDetailsQry && $deleteAdmissionFeesDenominationQry){
    $result = 1;
}else{
    $result = 0;
}

echo json_encode($result);
?>