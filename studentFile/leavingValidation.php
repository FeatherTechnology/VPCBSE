<?php
include '../ajaxconfig.php';

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id']; 

    // Query to check for pending fees
    $query = "SELECT af.balance_tobe_paid 
              FROM `admission_fees` af 
              JOIN admission_fees_denomination afd ON af.id = afd.admission_fees_ref_id 
              JOIN admission_fees_details afds ON af.id = afds.admission_fees_ref_id 
              WHERE af.admission_id = '$student_id' 
              ORDER BY af.id DESC 
              LIMIT 1"; 

    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        if ($row->balance_tobe_paid > 0) {
            echo "Student fees are Pending for the academic year.";
        } else {
            echo "Student fees are paid for the academic year.";
        }
    } else {
        echo "No records found for this student.";
    }
} else {
    echo "Invalid student ID.";
}
?>
