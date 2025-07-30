<?php
include '../ajaxconfig.php';

$academicYearArr = array();
$academicYearQry = $connect->query("SELECT year_id,academic_year FROM academic_year WHERE status=0 ORDER BY  year_id DESC");
$i=0;
while($academicYearInfo = $academicYearQry->fetch()){
    $academicYearArr[$i]['yearid'] = $academicYearInfo['year_id'];
    $academicYearArr[$i]['academicyear'] = $academicYearInfo['academic_year'];
$i++;
}

echo json_encode($academicYearArr);
$mysqli->close();
$connect = null;

?>