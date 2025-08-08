<?php
include '../ajaxconfig.php';
@session_start();

if (isset($_SESSION['academic_year'])) {
    $academicyear = $_SESSION['academic_year'];
}

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Update the student status to mark as restored
    $updateQuery1 = "UPDATE student_history SET status = 0, deleted_student = 0, leaving_term = 0 
                     WHERE student_id = '$student_id' AND academic_year = '$academicyear'";
    $updateResult1 = $mysqli->query($updateQuery1);

    $updateQuery2 = "UPDATE deleted_student_creation SET status = 1 
                     WHERE student_id = '$student_id' AND academic_year = '$academicyear'";
    $updateResult2 = $mysqli->query($updateQuery2);

    if ($updateResult1 && $updateResult2) {
        echo 'success';
    } else {
        echo 'Error restoring student: ' . $mysqli->error;
    }
} else {
    echo 'Invalid request';
}
