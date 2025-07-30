<?php
include "../ajaxconfig.php";

$academicArr = array();
$standardQry = $connect->query("SELECT * FROM academic_year WHERE status = '0'");
$i = 0;

while ($academicInfo = $standardQry->fetch()) {
    $year_id = $academicInfo['year_id']; // Ensure you are fetching the correct id field
    $academic_year = $academicInfo['academic_year'];
    // Convert dates to 'dd-mm-yyyy' format
    $period_from = DateTime::createFromFormat('Y-m-d', $academicInfo['period_from'])->format('d-m-Y');
    $period_to = DateTime::createFromFormat('Y-m-d', $academicInfo['period_to'])->format('d-m-Y');
    
    $academicArr[$i]['serial'] = $i + 1; // Serial number
    $academicArr[$i]['period_from'] = $period_from;
    $academicArr[$i]['period_to'] = $period_to;
    $academicArr[$i]['academic_year'] = $academicInfo['academic_year'];
    $academicArr[$i]['action'] = "<span class='icon-trash-2 academicDeleteBtn' data-id='" . $year_id . "_" . $academic_year . "'></span>";
    $i++;
}

echo json_encode($academicArr);
?>
