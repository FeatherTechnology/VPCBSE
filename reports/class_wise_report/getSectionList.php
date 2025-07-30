<?php
//Also using in student_transport_list.js
include "../../ajaxconfig.php";
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}
if(isset($_POST['academicYear'])){
    $academic_year = $_POST['academicYear'];
}
if(isset($_POST['medium'])){
    $medium = $_POST['medium'];
}
if(isset($_POST['standardID'])){
    $standardID = $_POST['standardID'];
}

    $getSectionQry = $connect->query("SELECT sh.section FROM student_creation sc JOIN student_history sh ON sc.student_id = sc.student_id  WHERE sc.medium = '$medium' AND sh.standard = '$standardID' AND sc.school_id='$school_id' AND sh.academic_year = '$academic_year' AND sc.status = 0 GROUP BY sh.section");

    $sectionNameArr = array();
    if($getSectionQry->rowCount() > 0){
        while($sectionInfo = $getSectionQry->fetch()) {
            $sectionNameArr[] = $sectionInfo['section']; 
        }
    }


    echo json_encode($sectionNameArr);

?>