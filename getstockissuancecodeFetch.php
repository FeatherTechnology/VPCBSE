<?php
include 'ajaxconfig.php';

$selectIC = $mysqli->query("SELECT si_number FROM stock_issuance WHERE si_number != '' ");

if($selectIC->num_rows>0)
{
    $codeAvailable = $mysqli->query("SELECT si_number FROM stock_issuance WHERE si_number != '' ORDER BY stock_issuance_id DESC LIMIT 1");
    while($row = $codeAvailable->fetch_assoc()){
        $ac2 = $row["si_number"];
    }
	$appno1 = ltrim(strstr($ac2, 'I'), 'I')+1;
	$si_number="SI".$appno1;

    // $appno2 = ltrim(strstr($ac2, '-'), '-');
    // $si_number = "Item-".$appno1;  
}
else
{
	$initialgrno=1001;
	$si_number="SI".$initialgrno;
} 

echo json_encode($si_number);

?>