
<?php
require "../ajaxconfig.php";

$year_id = $_POST['year_id'];
$academic_year = $_POST['academic_year'];

try {
    // Check if there is any record in the admission_fees table for the given academic_year
    $qry = $connect->query("SELECT * FROM admission_fees WHERE academic_year = '$academic_year'");
    
    if ($qry->rowCount() > 0) { 
        $result = '0'; // Do not delete, admission fees record exists
    } else {
        // Prepare the deletion query
        $qry = $connect->prepare("DELETE FROM `academic_year` WHERE `year_id` = :year_id");
        $qry->bindParam(':year_id', $year_id, PDO::PARAM_INT);
        
        if ($qry->execute()) {
            $result = 1; // Successfully deleted
        } else {
            throw new Exception();
        }
    }
} catch (Exception $e) {
    $result = 2; // Handle general exceptions
}

echo json_encode($result);
?>
