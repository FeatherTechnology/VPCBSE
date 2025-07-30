<?php
include "../ajaxconfig.php";

// Start the session and get the current academic year
@session_start();
if (isset($_SESSION["academic_year"])) {
    $year_id = $_SESSION["academic_year"];
} else {
    echo json_encode(['status' => 'error', 'message' => 'Academic year not found in session.']);
    exit();
}
$userid = $_SESSION["userid"];
// Split the academic year string by the '-' character
$acdmcyear = explode('-', $year_id);

// Increment the first and second part of the academic year for the new academic year
$nextAcademicYear = ($acdmcyear[0] + 1) . '-' . ($acdmcyear[1] + 1);

// Check if records already exist for the new academic year in `area_creation`
$check_query = "SELECT * FROM area_creation WHERE year_id = '$nextAcademicYear'";
$check_result = $connect->query($check_query);

if ($check_result->rowCount() > 0) {
} else {
    // Insert new records into `area_creation` for the new academic year
    $insert_query = "
        INSERT INTO area_creation (area_name, item_details, due_amount, due_date, no_of_terms, transport_amount, status, school_id, year_id, insert_login_id, created_date)
        SELECT area_name, item_details, due_amount, due_date, no_of_terms, transport_amount, status, school_id, '$nextAcademicYear', insert_login_id, NOW()
        FROM area_creation
        WHERE year_id = '$year_id'
    ";

    $insert_result = $connect->query($insert_query);

    if (!$insert_result) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert new areas for the next academic year.']);
        exit();
    }

    // Retrieve mapping of old `area_id` to new `area_id` based on `area_name`
    $select_query = "
        SELECT old_area.area_id AS old_area_id, new_area.area_id AS new_area_id
        FROM area_creation AS old_area
        JOIN area_creation AS new_area
        ON old_area.area_name = new_area.area_name
        WHERE old_area.year_id = '$year_id' AND new_area.year_id = '$nextAcademicYear'
    ";
    
    $result = $connect->query($select_query);
    if ($result && $result->rowCount() > 0) {
        $area_mapping = [];

        // Create an array mapping old area_id to new area_id
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $area_mapping[$row['old_area_id']] = $row['new_area_id'];
        }

        // Insert records into `area_creation_particulars` for the new academic year based on the old ones
        foreach ($area_mapping as $old_area_id => $new_area_id) {
            $particulars_query = "
                INSERT INTO area_creation_particulars (area_creation_id, particulars, due_amount, due_date)
                SELECT '$new_area_id', particulars, due_amount, due_date
                FROM area_creation_particulars
                WHERE area_creation_id = '$old_area_id'
            ";
            $connect->query($particulars_query);
        }

        // Update the student_creation table with the new area_id based on the old area_id
        foreach ($area_mapping as $old_area_id => $new_area_id) {
            $update_query = "
                UPDATE student_creation
                SET transportarearefid = '$new_area_id'
                WHERE transportarearefid = '$old_area_id'
            ";
            $connect->query($update_query);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to map area ids for new academic year.']);
        exit();
    }
}

// Handle student roll back and standard promotion
if (isset($_POST['student_id']) && isset($_POST['standard_id'])) {
    $student_id = $_POST['student_id'];
    $standard_id = $_POST['standard_id'];

    if (is_array($student_id) && is_array($standard_id)) {
        $particular_std_id = array('14', '15', '16', '17', '18', '19', '20', '21', '22', '23');

        for ($i = 0; $i < count($student_id); $i++) {
            // Handle standard promotion
            if (!in_array($standard_id[$i], $particular_std_id)) {
                $next_std_id = intval($standard_id[$i]) + 1;
            } else {
                // Handle special case for certain standards
                switch ($standard_id[$i]) {
                    case '14': $next_std_id = '19'; break;
                    case '15': $next_std_id = '20'; break;
                    case '16': $next_std_id = '21'; break;
                    case '17': $next_std_id = '22'; break;
                    case '18': $next_std_id = '23'; break;
                    default: $next_std_id = $standard_id[$i]; break;
                }
            }

            // Insert into `student_history`
            $history_query = "
                INSERT INTO `student_history` (student_id, standard, section,studentstype, extra_curricular, transportarearefid, academic_year,insert_login_id, created_on)
                SELECT student_id, '$next_std_id', section,'2',extra_curricular, transportarearefid, '$nextAcademicYear','$userid', NOW()
                FROM student_creation
                WHERE student_id = '$student_id[$i]'
            ";
            $connect->query($history_query);

            // Update `student_creation` with the new standard and academic year
            $update_student_query = "
                UPDATE `student_creation`
                SET `standard` = '$next_std_id', `studentstype` = '2', `year_id` = '$nextAcademicYear' ,update_login_id = '$userid',updated_date=NOW()
                WHERE `student_id` = '$student_id[$i]'
            ";
            $connect->query($update_student_query);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid student or standard data.']);
        exit();
    }
}

echo json_encode(['status' => 'success']);
?>
