<?php
include "../ajaxconfig.php";

// Start the session and get the current academic year
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$period_from = $_POST['period_from'];
$period_to = $_POST['period_to'];
$academic_period = $_POST['academic_period'];
$currentDateTime = date('Y-m-d H:i:s');

// Check if the academic period already exists
$check_qry = "SELECT academic_year FROM academic_year WHERE academic_year = '$academic_period'";
$check_result = $connect->query($check_qry);

if($check_result->rowCount() > 0){
    $result = 0; // Academic period already exists
} else {
    // Insert the new academic year
    $insert_qry = "INSERT INTO academic_year (period_from, period_to, academic_year, status, insert_login_id, created_date) 
                   VALUES ('$period_from', '$period_to', '$academic_period', '0', '$userid', '$currentDateTime')";
    $insert_result = $connect->query($insert_qry);

    if($insert_result){
        $result = 1; // Insertion successful
    } else {
        $result = 2; // Insertion failed
    }
}
echo json_encode($result);
?>
