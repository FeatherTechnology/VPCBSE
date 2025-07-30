<?php
include '../ajaxconfig.php';

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Update the student status to mark it as restored
    $updateQuery = "UPDATE student_creation SET status = 0, deleted_student = 0,leaving_term = 0 WHERE student_id = '$student_id' "; 
    $updateResult = $mysqli->query($updateQuery); 

    if ($updateResult) {
        echo 'success';
    } else {
        echo 'Error restoring student: ' . $mysqli->error;
    }
} else {
    echo 'Invalid request';
}
?>
