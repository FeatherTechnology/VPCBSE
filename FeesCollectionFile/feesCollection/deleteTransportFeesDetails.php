<?php
include "../../ajaxconfig.php";
if(isset($_POST['feesid'])){ 
    $feesid = $_POST['feesid'];
}

$deleteTransportFeesQry = $connect->query("DELETE FROM `transport_admission_fees` WHERE `id` = '$feesid' ");
$deleteTransportFeesDetailsQry = $connect->query("DELETE FROM `transport_admission_fees_details` WHERE `admission_fees_ref_id`= '$feesid' ");
$deleteTransportFeesDenominationQry = $connect->query("DELETE FROM `transport_admission_fees_denomination` WHERE `admission_fees_ref_id` = '$feesid' ");

if($deleteTransportFeesQry && $deleteTransportFeesDetailsQry && $deleteTransportFeesDenominationQry){
    $result = 1;
}else{
    $result = 0;
}

echo json_encode($result);
?>