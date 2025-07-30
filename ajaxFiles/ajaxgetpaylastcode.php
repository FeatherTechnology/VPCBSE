<?php
include '../ajaxconfig.php';

$codeAvailable = $mysqli->query("SELECT receipt_no FROM last_year_fees WHERE receipt_no != '' ORDER BY id DESC LIMIT 1 ");

if($codeAvailable->num_rows>0)
{
    $row = $codeAvailable->fetch_assoc();
    $ac2 = $row["receipt_no"];
    // $appno1 = ltrim(strstr($ac2, 'T'), 'T')+1;
	// $receipt_no="LAST".$appno1;
    $splited = explode('-', $ac2);
    $rnosplit1 = $splited[1] + 1;
    $receipt_no = $splited[0]. '-' . $rnosplit1;

}else{
    $receipt_no = "LAST-1";
}

echo json_encode($receipt_no);
?>