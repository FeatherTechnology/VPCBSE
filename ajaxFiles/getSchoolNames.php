<?php
include '../ajaxconfig.php';

$schoolArr = array();
$standardQry = $connect->query("SELECT school_id,school_name FROM  school_creation WHERE status = '0'  ");
$i=0;
while($standardInfo = $standardQry->fetch()){
    $schoolArr[$i]['school_id'] = $standardInfo['school_id'];
    $schoolArr[$i]['school_name'] = $standardInfo['school_name'];
$i++;
}

echo json_encode($schoolArr);
?>