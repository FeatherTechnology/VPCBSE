<?php
include '../ajaxconfig.php';

$selectIC = $mysqli->query("SELECT receipt_no FROM transport_admission_fees WHERE receipt_no != '' ORDER BY id DESC LIMIT 1");

if($selectIC->num_rows>0)
{
    $r_no = $selectIC->fetch_assoc()["receipt_no"];
    $splited = explode('-', $r_no);
    $rnosplit1 = $splited[1] + 1;
    $receipt_number = $splited[0]. '-' . $rnosplit1;

}else{
    $receipt_number = "TARC-1";
}

echo json_encode($receipt_number);

?>