<?php
include 'ajaxconfig.php';

$selectIC = $mysqli->query("SELECT receipt_number FROM pay_fees WHERE receipt_number != '' ");

if ($selectIC->num_rows > 0) {
    $codeAvailable = $mysqli->query("SELECT receipt_number FROM pay_fees WHERE receipt_number != '' ORDER BY pay_fees_id DESC LIMIT 1");
    
    if ($codeAvailable->num_rows > 0) {
        $row = $codeAvailable->fetch_assoc();
        $ac2 = $row["receipt_number"];
        $appno1 = preg_replace('/[^0-9]/', '', $ac2); // Extract numeric value from $ac2
        
        $numericValue = intval($appno1);
        if ($numericValue > 0) {
            $appno1 = $numericValue + 1;
        } else {
            $appno1 = 1002; // If no valid numeric value is found, start from 1002
        }
        
        $receipt_number = "GRP" . $appno1;
    } else {
        $initialgrno = 1001;
        $receipt_number = "GRP" . $initialgrno;
    }
} else {
    $initialgrno = 1001;
    $receipt_number = "GRP" . $initialgrno;
}

echo json_encode($receipt_number);
?>
