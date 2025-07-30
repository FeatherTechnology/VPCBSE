<?php
include 'ajaxconfig.php';

$selectIC = $mysqli->query("SELECT item_code FROM item_creation WHERE item_code != '' ");

if($selectIC->num_rows>0)
{
    $codeAvailable = $mysqli->query("SELECT item_code FROM item_creation WHERE item_code != '' ORDER BY item_id DESC LIMIT 1");
    while($row = $codeAvailable->fetch_assoc()){
        $ac2 = $row["item_code"];
    }
	$appno1 = ltrim(strstr($ac2, 'M'), 'M')+1;
	$item_code="ITEM".$appno1;

    // $appno2 = ltrim(strstr($ac2, '-'), '-');
    // $item_code = "Item-".$appno1;  
}
else
{
	$initialgrno=1001;
	$item_code="ITEM".$initialgrno;
} 

echo json_encode($item_code);

?>