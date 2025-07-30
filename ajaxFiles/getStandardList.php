<?php
include '../ajaxconfig.php';

$standardArr = array();
$standardQry = $connect->query("SELECT standard_id,standard FROM standard_creation ");
$i=0;
while($standardInfo = $standardQry->fetch()){
    $standardArr[$i]['std_id'] = $standardInfo['standard_id'];
    $standardArr[$i]['std'] = $standardInfo['standard'];
$i++;
}

echo json_encode($standardArr);
?>