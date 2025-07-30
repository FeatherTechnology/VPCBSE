<?php
include '../ajaxconfig.php';
//The receipt no is in continues when insert admission_fees and temp_admission_fees so finding which receipt no is max and then increment the no.
$getPayFeesQry = $mysqli->query("SELECT receipt_no FROM admission_fees WHERE receipt_no != '' ORDER BY id DESC LIMIT 1 ");
if ($getPayFeesQry->num_rows > 0) {
    $row = $getPayFeesQry->fetch_assoc();
    $receipt_number = $row["receipt_no"];

} else {
    $receipt_number = 'GPR-1';
}

$getTempPayFeesQry = $mysqli->query("SELECT ReceiptNo FROM temp_admission_fees WHERE ReceiptNo != '' ORDER BY id DESC LIMIT 1  ");
if(mysqli_num_rows($getTempPayFeesQry) > 0){
    $getdata = $getTempPayFeesQry->fetch_assoc();
    $receiptno = $getdata['ReceiptNo'];

}else{
    $receiptno = 'GPR-1';
}


$maxReceiptNo = max($receipt_number, $receiptno);
$splited = explode('-', $maxReceiptNo);
$numadded = $splited[1] + 1;
$newReceiptNo = $splited[0]. '-' . $numadded;

echo json_encode($newReceiptNo);
?>
