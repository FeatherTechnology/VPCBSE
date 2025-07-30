<?php
include '../ajaxconfig.php';

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
}

if (isset($_POST['reason'])) {
    $reason = $_POST['reason'];
}
if (isset($_POST['leaving_term'])) {
    $leaving_term = $_POST['leaving_term'];
}else{
    $leaving_term=5;
}
// Update the student status to mark it as deleted
$updateQuery = "UPDATE student_creation SET reason = '$reason', status = 1, deleted_student = 1 ,leaving_term ='$leaving_term' WHERE student_id = '$student_id'";
$updateResult = $mysqli->query($updateQuery);

if ($updateResult) {
    $insertquery = "INSERT INTO deleted_student_creation (student_id, status) VALUES('" . strip_tags($student_id) . "', '0')";
    $insresult = $mysqli->query($insertquery);    
    if ($insresult) {
        echo trim("Student deleted successfully.");
    } else {
        echo trim("Error deleting student: " . $mysqli->error);
    }
} else {
    echo "Error deleting student: " . $mysqli->error;
}