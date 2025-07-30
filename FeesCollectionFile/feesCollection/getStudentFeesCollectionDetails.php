<?php
include "../../ajaxconfig.php";
@session_start();
if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
}

if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
}

$getStudentDetailsQry = $connect->query("SELECT stdc.student_name, stdc.`admission_number`, stdc.studentrollno, stdc.medium, sh.studentstype, sh.standard, sc.standard as standard_name, stdc.section, stdc.year_id, stdc.school_id, stdc.facility ,sh.academic_year 
FROM `student_creation` stdc 
JOIN student_history sh ON stdc.student_id = sh.student_id
JOIN standard_creation sc ON sh.standard = sc.standard_id 
WHERE stdc.student_id = '$student_id' AND sh.academic_year ='$year_id'");
$studentInfo = $getStudentDetailsQry->fetch();

$student_name = $studentInfo['student_name'];
$admission_number = $studentInfo['admission_number'];
$studentrollno = $studentInfo['studentrollno'];
$medium = $studentInfo['medium'];
$studentstype = $studentInfo['studentstype'];
$standard = $studentInfo['standard'];
$standard_name = $studentInfo['standard_name'];
$section = $studentInfo['section'];
$academic_year = $studentInfo['academic_year'];
$school_id = $studentInfo['school_id'];
$transportFacility = $studentInfo['facility'];

if ($studentstype == "1" || $studentstype == "2") {
    $student_type_cndtn = "(fm.student_type = '$studentstype' || fm.student_type = '4')";
} else {
    $student_type_cndtn = "(fm.student_type = '$studentstype')";
}
//Fee Details /// Gross Payable/// Group / extracurricular / amenity / transport/
$getGrpFeesMasterDetailsQry = $connect->query("SELECT SUM(gcf.grp_amount) as OverallGrpAmount 
FROM fees_master fm 
JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id
JOIN student_history sh ON fm.standard = sh.standard 
WHERE fm.academic_year = '$academic_year' AND fm.medium = '$medium' AND $student_type_cndtn AND fm.standard = '$standard' AND gcf.status = 1 AND fm.school_id = '$school_id' AND sh.student_id = '$student_id' AND sh.academic_year = '$academic_year'");
if ($getGrpFeesMasterDetailsQry->rowCount() > 0) {
    $overallGrpAmount = $getGrpFeesMasterDetailsQry->fetch()['OverallGrpAmount'];
} else {
    $overallGrpAmount = '0';
}
//Close DB connection
$getGrpFeesMasterDetailsQry->closeCursor();
// echo "SELECT SUM(ecaf.extra_amount) as OverallExtraCurAmount 
// FROM fees_master fm 
// JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id 
// JOIN student_creation stdc ON fm.standard = stdc.standard
// WHERE fm.academic_year = '$academic_year' AND fm.medium = '$medium' AND $student_type_cndtn AND fm.standard = '$standard' AND ecaf.status = '1' AND fm.school_id ='$school_id' AND stdc.student_id = '$student_id' ";
$getExtraCurFeesMasterDetailsQry = $connect->query("SELECT SUM(ecaf.extra_amount) as OverallExtraCurAmount 
FROM extra_curricular_activities_fee ecaf 
JOIN student_history sh ON FIND_IN_SET(ecaf.extra_fee_id, sh.extra_curricular) 
WHERE ecaf.status = '1' AND sh.student_id ='$student_id' AND sh.academic_year = '$academic_year'");
if ($getExtraCurFeesMasterDetailsQry->rowCount() > 0) {
    $overallExtraCurAmount = $getExtraCurFeesMasterDetailsQry->fetch()['OverallExtraCurAmount'];
} else {
    $overallExtraCurAmount = '0';
}
//Close DB connection
$getExtraCurFeesMasterDetailsQry->closeCursor();

$getAmenityFeesMasterDetailsQry = $connect->query("SELECT SUM(af.amenity_amount) as OverallAmenityAmount 
FROM fees_master fm 
JOIN amenity_fee af ON fm.fees_id = af.fee_master_id 
JOIN student_history sh ON fm.standard = sh.standard 
WHERE fm.academic_year = '$academic_year' AND fm.medium = '$medium' AND $student_type_cndtn AND fm.standard = '$standard' AND af.status = '1' AND fm.school_id ='$school_id' AND sh.student_id = '$student_id' AND sh.academic_year = '$academic_year' ");
if ($getAmenityFeesMasterDetailsQry->rowCount() > 0) {
    $overallAmenityAmount = $getAmenityFeesMasterDetailsQry->fetch()['OverallAmenityAmount'];
} else {
    $overallAmenityAmount = '0';
}
//Close DB connection
$getAmenityFeesMasterDetailsQry->closeCursor();

$getAreaMasterDetailsQry = $connect->query("SELECT SUM(acp.due_amount) as OverallTransportAmount  
FROM student_history sh
JOIN area_creation ac ON sh.transportarearefid = ac.area_id
JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
WHERE sh.student_id = '$student_id' AND sh.academic_year = '$academic_year' ");
if ($getAreaMasterDetailsQry->rowCount() > 0) {
    $overallTransportAmount = $getAreaMasterDetailsQry->fetch()['OverallTransportAmount'];
} else {
    $overallTransportAmount = '0';
}
//Close DB connection
$getAreaMasterDetailsQry->closeCursor();
//Fee Details /// Gross Payable/// Group / extracurricular / amenity / transport/  ////////////END////////////////////////////////////////////////////////////

//Fee Details /// Gross Payable/// Last year fees//////////////////////
$split_academic_year = explode('-', $academic_year);
$last_year = (($split_academic_year[0] - 1) . '-' . ($split_academic_year[1] - 1));
$getOldStudCntQry = $connect->query(" SELECT standard as last_yr_std FROM `student_history` WHERE student_id = '$student_id' AND academic_year ='$last_year' ");
$final_std_id = null;
if ($getOldStudCntQry->rowCount() > 0) {
    $final_std_id = $getOldStudCntQry->fetchColumn(); // fetches last_yr_std
}
$particular_std_id = array('14', '15', '16', '17', '18', '19', '20', '21', '22', '23');
// if (!in_array($standard, $particular_std_id)) { //these under 9 std. so jst add 1 to the id and update.
//     $lastyr_std_id = intval($standard) - 1;
// } else { //these are 11th std so  no need to check next standard id.
//     $lastyr_std_id = '0';

//     if ($standard == '19') { //Maths_biology
//         $lastyr_std_id = '14';
//     } else if ($standard == '20') { //maths_computerscience
//         $lastyr_std_id = '15';
//     } else if ($standard == '21') { //biology_computerscience
//         $lastyr_std_id = '16';
//     } else if ($standard == '22') { //commerce_computerscience
//         $lastyr_std_id = '17';
//     } else if ($standard == '23') { //all
//         $lastyr_std_id = '18';
//     }
//     else if ($standard == '25') { //all
//         $lastyr_std_id = '24';
//     }
// }
// if ($last_yr_std !== null && $last_yr_std == $standard) {
//     // Use actual last year standard ID from DB if it matches the expected
//     $final_std_id = $last_yr_std;
// } else {
//     // Use computed one if not matching
//     $final_std_id = $lastyr_std_id;
// }


//Group fees
// $getOldStudCntQry = $connect->query(" SELECT * FROM `student_creation` WHERE studentstype ='2' AND YEAR(created_date) <= YEAR(CURDATE()) AND student_id = '$student_id' ");
// if ($getOldStudCntQry->rowCount() > 0) {

$getStudentLastDetailsQry = $connect->query("SELECT stdc.student_name, sh.studentstype
FROM `student_creation` stdc 
JOIN student_history sh ON stdc.student_id = sh.student_id
WHERE stdc.student_id = '$student_id' AND sh.academic_year ='$last_year'");
if ($getStudentLastDetailsQry->rowCount() > 0) {
    $studentLastInfo = $getStudentLastDetailsQry->fetch();
    $laststudentstype = $studentLastInfo['studentstype'];

    if ($laststudentstype == "1" || $laststudentstype == "2") {
        $studentlast_type_cndtn = "(fm.student_type = '$laststudentstype' || fm.student_type = '4')";
    } else {
        $studentlast_type_cndtn = "(fm.student_type = '$laststudentstype')";
    }

$getLastYearGrpFeesQry = $connect->query("SELECT SUM(gcf.grp_amount) as OverallGrpAmount 
    FROM fees_master fm 
    JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id 
    JOIN student_creation stdc ON fm.medium = stdc.medium
    JOIN student_history sh ON sh.student_id = stdc.student_id
    WHERE fm.academic_year = '$last_year' AND fm.medium = '$medium' AND $studentlast_type_cndtn AND fm.standard = '$final_std_id' AND gcf.status = 1 AND fm.school_id = '$school_id' AND stdc.student_id = '$student_id' AND sh.academic_year = '$last_year' ");
if ($getLastYearGrpFeesQry->rowCount() > 0) {
    $overallLastYearGrpAmount = $getLastYearGrpFeesQry->fetch()['OverallGrpAmount'];
} else {
    $overallLastYearGrpAmount = '0';
}

//Close DB connection
$getLastYearGrpFeesQry->closeCursor();

//Extra curricular activities
$getLastYearExtraCurFeesQry = $connect->query("SELECT SUM(ecaf.extra_amount) as OverallExtraCurAmount 
    FROM fees_master fm 
    JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id
JOIN student_history sh ON FIND_IN_SET(ecaf.extra_fee_id, sh.extra_curricular) AND sh.academic_year = '$last_year'
    WHERE fm.academic_year = '$last_year' AND fm.medium = '$medium' AND $studentlast_type_cndtn AND fm.standard = '$final_std_id' AND ecaf.status = '1' AND fm.school_id ='$school_id' AND sh.student_id = '$student_id' ");
if ($getLastYearExtraCurFeesQry->rowCount() > 0) {
    $overallLastYearExtraCurAmount = $getLastYearExtraCurFeesQry->fetch()['OverallExtraCurAmount'];
} else {
    $overallLastYearExtraCurAmount = '0';
}

//Close DB connection
$getLastYearExtraCurFeesQry->closeCursor();

//Amenity fees
$getLastYearAmenityFeesQry = $connect->query("SELECT SUM(af.amenity_amount) as OverallAmenityAmount 
    FROM fees_master fm 
    JOIN amenity_fee af ON fm.fees_id = af.fee_master_id 
    JOIN student_creation stdc ON fm.medium = stdc.medium
    JOIN student_history sh ON sh.student_id = stdc.student_id
    WHERE fm.academic_year = '$last_year' AND fm.medium = '$medium' AND $studentlast_type_cndtn AND fm.standard = '$final_std_id' AND af.status = '1' AND fm.school_id ='$school_id' AND stdc.student_id = '$student_id' AND sh.academic_year = '$last_year'");
if ($getLastYearAmenityFeesQry->rowCount() > 0) {
    $overallLastYearAmenityAmount = $getLastYearAmenityFeesQry->fetch()['OverallAmenityAmount'];
} else {
    $overallLastYearAmenityAmount = '0';
}

//Close DB connection
$getLastYearAmenityFeesQry->closeCursor();

$getAmenityFeesMasterDetailsQry->closeCursor();

$getLastAreaMasterDetailsQry = $connect->query("SELECT SUM(acp.due_amount) as OverallTransportAmount  
FROM student_history sh
JOIN area_creation ac ON sh.transportarearefid = ac.area_id
JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
WHERE sh.student_id = '$student_id' AND sh.academic_year = '$last_year' ");
if ($getLastAreaMasterDetailsQry->rowCount() > 0) {
    $overallLastTransportAmount = $getLastAreaMasterDetailsQry->fetch()['OverallTransportAmount'];
} else {
    $overallLastTransportAmount = '0';
}
//Close DB connection
$getLastAreaMasterDetailsQry->closeCursor();
// echo 'sdfs',$overallLastYearGrpAmount;
// echo 'sd'.$overallLastYearAmenityAmount;
$overallLastYearFees = intval($overallLastYearGrpAmount + $overallLastYearExtraCurAmount + $overallLastYearAmenityAmount + $overallLastTransportAmount);

} else {
    $overallLastYearFees = 0;
}

//Fee Details /// Gross Payable/// Last year fees/ ///////////////////////////////END /////////////////////////////////////////////////////////////////////


//Fee Details /// Amount Paid///  Group / extra cur/ amenity / transport/
// $CheckReceiptQry = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' order by id desc limit 1");
$overallpaid_grp_amount = 0;
$overallpaid_extra_cur_amount = 0;
$overallpaid_amenity_amount = 0;

$grpfeeDetailsQry = $connect->query("SELECT (SUM(afd.fee_received)) as paid_grp_amount 
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    JOIN group_course_fee gcf ON afd.fees_id = gcf.grp_course_id 
    WHERE af.admission_id = '$student_id' && af.academic_year = '$academic_year' && afd.fees_table_name = 'grptable' && afd.fee_received != 0 ");
if ($grpfeeDetailsQry->rowCount() > 0) {
    $overallpaid_grp_amount = $grpfeeDetailsQry->fetch()['paid_grp_amount'];
} else {
    $overallpaid_grp_amount = '0';
}
//Close DB connection
$grpfeeDetailsQry->closeCursor();

$extraFeeDetailsQry = $connect->query("SELECT (
      COALESCE(SUM(afd.fee_received), 0)
    ) AS paid_extra_cur_amount
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id 
    WHERE af.admission_id = '$student_id' && af.academic_year = '$academic_year' && afd.fees_table_name = 'extratable' && afd.fee_received != 0 ");
if ($extraFeeDetailsQry->rowCount() > 0) {
    $overallpaid_extra_cur_amount = $extraFeeDetailsQry->fetch()['paid_extra_cur_amount'];
} else {
    $overallpaid_extra_cur_amount = '0';
}
//Close DB connection
$extraFeeDetailsQry->closeCursor();

$amenityFeeDetailsQry = $connect->query("SELECT COALESCE(SUM(afd.fee_received), 0) AS paid_amenity_amount
    FROM `admission_fees` afs 
    JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id 
    JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id 
    WHERE afs.admission_id = '$student_id' && afs.academic_year = '$academic_year' && afd.fees_table_name = 'amenitytable' && afd.fee_received != 0 ");
if ($amenityFeeDetailsQry->rowCount() > 0) {
    $overallpaid_amenity_amount = $amenityFeeDetailsQry->fetch()['paid_amenity_amount'];
} else {
    $overallpaid_amenity_amount = '0';
}
//Close DB connection
$amenityFeeDetailsQry->closeCursor();


$CheckTransportReceiptQry = $connect->query("SELECT id FROM `transport_admission_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' order by id desc limit 1");
$overallpaid_transport_amount = '0';
if ($CheckTransportReceiptQry->rowCount() > 0) {
    $get_transportfees_id = $CheckTransportReceiptQry->fetch()['id'];
    $transportfeeDetailsQry = $connect->query("SELECT COALESCE(SUM(tafd.fee_received), 0) as paid_transport_amount
    FROM `transport_admission_fees` taf 
    JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
    JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
    JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
    WHERE taf.admission_id = '$student_id' && taf.academic_year = '$academic_year'");
    if ($transportfeeDetailsQry->rowCount() > 0) {
        $overallpaid_transport_amount = $transportfeeDetailsQry->fetch()['paid_transport_amount'];
    } else {
        $overallpaid_transport_amount = '0';
    }
    //Close DB connection
    $transportfeeDetailsQry->closeCursor();

    //Close DB connection
    $CheckTransportReceiptQry->closeCursor();
} //transport if END

//Fee Details /// Amount Paid/// Group / extra cur/ amenity / transport/ ////////////////////////////END//////////////////////////////////////////////


//Fee Details /// Amount Paid///  Last year ////////////////////////////////////////////////////////
$CheckLastyrReceiptQry = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$student_id' && academic_year = '$last_year' order by id desc limit 1");
$lastyr_overallpaid_amount = 0;
$lastyr_paid_amount = 0;
if ($CheckLastyrReceiptQry->rowCount() > 0) {
    $get_lastyr_fees_id = $CheckLastyrReceiptQry->fetch()['id'];
 
    $lastyr_grpfeeDetailsQry = $connect->query("SELECT (SUM(afd.fee_received)) as paid_grp_amount 
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    JOIN group_course_fee gcf ON afd.fees_id = gcf.grp_course_id 
    WHERE af.admission_id = '$student_id' && af.academic_year = '$last_year' && afd.fees_table_name = 'grptable' ");
    if ($lastyr_grpfeeDetailsQry->rowCount() > 0) {
        $lastyr_overallpaid_grp_amount = $lastyr_grpfeeDetailsQry->fetch()['paid_grp_amount'];
    } else {
        $lastyr_overallpaid_grp_amount = '0';
    }
    //Close DB connection
    $lastyr_grpfeeDetailsQry->closeCursor();

    $lastyr_extraFeeDetailsQry = $connect->query("SELECT (SUM(afd.fee_received)) as paid_extra_cur_amount 
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id 
    WHERE af.admission_id = '$student_id' && afd.fees_table_name = 'extratable' && af.academic_year = '$last_year' ");
    if ($lastyr_extraFeeDetailsQry->rowCount() > 0) {
        $lastyr_overallpaid_extra_cur_amount = $lastyr_extraFeeDetailsQry->fetch()['paid_extra_cur_amount'];
    } else {
        $lastyr_overallpaid_extra_cur_amount = '0';
    }
   
    //Close DB connection
    $lastyr_extraFeeDetailsQry->closeCursor();
    $lastyr_amenityFeeDetailsQry = $connect->query("SELECT (SUM(afd.fee_received)) as paid_amenity_amount 
    FROM `admission_fees` afs 
    JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id 
    JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id 
    WHERE afs.admission_id = '$student_id' && afd.fees_table_name = 'amenitytable' && afs.academic_year = '$last_year' ");
    if ($lastyr_amenityFeeDetailsQry->rowCount() > 0) {
        $lastyr_overallpaid_amenity_amount = $lastyr_amenityFeeDetailsQry->fetch()['paid_amenity_amount'];
    } else {
        $lastyr_overallpaid_amenity_amount = '0';
    }
    //Close DB connection
    $lastyr_amenityFeeDetailsQry->closeCursor();

    $lastyr_paid_amount = $lastyr_overallpaid_grp_amount + $lastyr_overallpaid_extra_cur_amount + $lastyr_overallpaid_amenity_amount;

    //Close DB connection
    $CheckLastyrReceiptQry->closeCursor();
} //Last year admission fee if END
//Fee Details /// Amount Paid///  Last year ////////////////////////////////////////////////////////
$CheckLastyrTransReceiptQry = $connect->query("SELECT id FROM `transport_admission_fees` WHERE admission_id = '$student_id' && academic_year = '$last_year' order by id desc limit 1");
$lastyr_transpaid_amount = 0;
if ($CheckLastyrTransReceiptQry->rowCount() > 0) {
    $get_lastyr_fees_id = $CheckLastyrTransReceiptQry->fetch()['id'];
    $lastyr_grpfeeDetailsQry = $connect->query("SELECT COALESCE(SUM(afd.fee_received), 0) as paid_grp_amount 
    FROM `transport_admission_fees` af 
    JOIN transport_admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
     JOIN area_creation ac ON afd.area_creation_id = ac.area_id
    JOIN area_creation_particulars acp ON afd.area_creation_particulars_id = acp.particulars_id 
    WHERE af.admission_id = '$student_id' && af.academic_year = '$last_year'");
    if ($lastyr_grpfeeDetailsQry->rowCount() > 0) {
        $lastyr_overallpaid_grp_amount = $lastyr_grpfeeDetailsQry->fetch()['paid_grp_amount'];
    } else {
        $lastyr_overallpaid_grp_amount = '0';
    }
    //Close DB connection
    $lastyr_grpfeeDetailsQry->closeCursor();

    $lastyr_transpaid_amount = $lastyr_overallpaid_grp_amount;

    //Close DB connection
    $CheckLastyrTransReceiptQry->closeCursor();
} //Last year admission fee if END
//Last Year Fees Tables - Last yr pay entry. 
$CheckLastyrQry = $connect->query("SELECT id FROM `last_year_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' order by id desc limit 1");
$lastyr_entrypaid_amount = 0;
if ($CheckLastyrQry->rowCount() > 0) {
    $lastyr_fees_id = $CheckLastyrQry->fetch()['id'];
    $lastyr_grpfeeQry = $connect->query("SELECT (SUM(lyfd.fee_received)) as paid_grp_amount 
    FROM `last_year_fees` lyf 
    JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
    JOIN group_course_fee gcf ON lyfd.fees_id = gcf.grp_course_id 
    WHERE lyf.admission_id = '$student_id' && lyfd.fees_table_name = 'grptable' && lyf.academic_year = '$academic_year' ");
    if ($lastyr_grpfeeQry->rowCount() > 0) {
        $lastyr_grp_amount = $lastyr_grpfeeQry->fetch()['paid_grp_amount'];
    } else {
        $lastyr_grp_amount = '0';
    }
    //Close DB connection
    $lastyr_grpfeeQry->closeCursor();

    $lastyr_extraFeeQry = $connect->query("SELECT (SUM(lyfd.fee_received)) as paid_extra_cur_amount 
    FROM `last_year_fees` lyf 
    JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
    JOIN extra_curricular_activities_fee ecaf ON lyfd.fees_id = ecaf.extra_fee_id 
    WHERE lyf.admission_id = '$student_id' && lyfd.fees_table_name = 'extratable' && lyf.academic_year = '$academic_year' ");
    if ($lastyr_extraFeeQry->rowCount() > 0) {
        $lastyr_extra_cur_amount = $lastyr_extraFeeQry->fetch()['paid_extra_cur_amount'];
    } else {
        $lastyr_extra_cur_amount = '0';
    }
    //Close DB connection
    $lastyr_extraFeeQry->closeCursor();

    $lastyr_amenityFeeQry = $connect->query("SELECT (SUM(lyfd.fee_received)) as paid_amenity_amount 
    FROM `last_year_fees` lyfs 
    JOIN last_year_fees_details lyfd ON lyfs.id = lyfd.admission_fees_ref_id 
    JOIN amenity_fee af ON lyfd.fees_id = af.amenity_fee_id 
    WHERE lyfs.admission_id = '$student_id'  && lyfd.fees_table_name = 'amenitytable' && lyfs.academic_year = '$academic_year' ");
    if ($lastyr_amenityFeeQry->rowCount() > 0) {
        $lastyr_amenity_amount = $lastyr_amenityFeeQry->fetch()['paid_amenity_amount'];
    } else {
        $lastyr_amenity_amount = '0';
    }

    //Close DB connection
    $lastyr_amenityFeeQry->closeCursor();
    $lastyr_transFeeQry = $connect->query("SELECT (SUM(lyfd.fee_received)) as paid_trans_amount 
    FROM `last_year_fees` lyfs 
    JOIN last_year_fees_details lyfd ON lyfs.id = lyfd.admission_fees_ref_id 
 JOIN area_creation_particulars acp ON lyfd.fees_id = acp.particulars_id
    WHERE lyfs.admission_id = '$student_id'  && lyfd.fees_table_name = 'transport' && lyfs.academic_year = '$academic_year'");
    if ($lastyr_transFeeQry->rowCount() > 0) {
        $lastyr_trans_amount = $lastyr_transFeeQry->fetch()['paid_trans_amount'];
    } else {
        $lastyr_trans_amount = '0';
    }

    //Close DB connection
    $lastyr_transFeeQry->closeCursor();
    $lastyr_entrypaid_amount = $lastyr_grp_amount + $lastyr_extra_cur_amount + $lastyr_amenity_amount + $lastyr_trans_amount;

    //Close DB connection
    $CheckLastyrQry->closeCursor();
} //Last year admission fee if END


// $CheckTransportReceiptQry = $connect->query("SELECT id FROM `transport_admission_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' order by id desc limit 1");
// $overallpaid_transport_amount = '0';
// if($CheckTransportReceiptQry->rowCount() > 0){
//     $get_transportfees_id = $CheckTransportReceiptQry->fetch()['id'];
//     $transportfeeDetailsQry = $connect->query("SELECT (SUM(acp.due_amount) - SUM(tafd.balance_tobe_paid)) as paid_transport_amount
//     FROM `transport_admission_fees` taf 
//     JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
//     JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
//     JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
//     WHERE taf.id = '$get_transportfees_id' ");
//     if($transportfeeDetailsQry->rowCount() > 0){
//         $overallpaid_transport_amount = $transportfeeDetailsQry->fetch()['paid_transport_amount'];
//     }else{
//         $overallpaid_transport_amount = '0';
//     }
//     //Close DB connection
//     $transportfeeDetailsQry->closeCursor(); 

//     //Close DB connection
//     $CheckTransportReceiptQry->closeCursor(); 
// }//transport if END

$lastyr_overallpaid_amount =   $lastyr_entrypaid_amount + $lastyr_paid_amount + $lastyr_transpaid_amount;

//Fee Details /// Amount Paid///  Last year////////////////////////////END/////////////////////////////////////////////////////////////////////////////////


//Fee Details /// Concession///  Group/ extra cur/ amenity/  transport/ Last year/
$CheckConcessionReceiptQry = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' order by id desc");
$OverallGrpConcessionAmount = 0;
$OverallExtraCurConcessionAmount = 0;
$OverallAmenityConcessionAmount = 0;
if ($CheckConcessionReceiptQry->rowCount() > 0) {
    while ($CheckConcessionInfo = $CheckConcessionReceiptQry->fetch()) {
        $get_concession_fees_ids[] = $CheckConcessionInfo['id'];
    }
    $get_concession_fees_id = implode(',', $get_concession_fees_ids);
    $grpfeeConcessionDetailsQry = $connect->query("SELECT SUM(afd.scholarship) as grp_concession_amount  
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    WHERE FIND_IN_SET(af.id ,'$get_concession_fees_id') && afd.fees_table_name = 'grptable' ");
    if ($grpfeeConcessionDetailsQry->rowCount() > 0) {
        $OverallGrpConcessionAmount = $grpfeeConcessionDetailsQry->fetch()['grp_concession_amount'];
    } else {
        $OverallGrpConcessionAmount = '0';
    }
    //Close DB connection
    $grpfeeConcessionDetailsQry->closeCursor();

    $extraFeeConcessionDetailsQry = $connect->query("SELECT SUM(afd.scholarship) as extra_cur_concession_amount 
    FROM `admission_fees` af 
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    WHERE FIND_IN_SET(af.id ,'$get_concession_fees_id') && afd.fees_table_name = 'extratable' ");
    if ($extraFeeConcessionDetailsQry->rowCount() > 0) {
        $OverallExtraCurConcessionAmount = $extraFeeConcessionDetailsQry->fetch()['extra_cur_concession_amount'];
    } else {
        $OverallExtraCurConcessionAmount = '0';
    }
    //Close DB connection
    $extraFeeConcessionDetailsQry->closeCursor();

    $amenityFeeConcessionDetailsQry = $connect->query("SELECT SUM(afd.scholarship) as amenity_concession_amount 
    FROM `admission_fees` afs 
    JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id 
    WHERE FIND_IN_SET(afs.id ,'$get_concession_fees_id') && afd.fees_table_name = 'amenitytable' ");
    if ($amenityFeeConcessionDetailsQry->rowCount() > 0) {
        $OverallAmenityConcessionAmount = $amenityFeeConcessionDetailsQry->fetch()['amenity_concession_amount'];
    } else {
        $OverallAmenityConcessionAmount = '0';
    }
    //Close DB connection
    $amenityFeeConcessionDetailsQry->closeCursor();

    //Close DB connection
    $CheckConcessionReceiptQry->closeCursor();
} //admission fee Concession if END//Fees Concession START
$feeConcessionGRPDetailsQry = $connect->query("SELECT SUM(scholarship_amount) AS grp_con_amnt FROM `fees_concession` WHERE student_id ='$student_id' && fees_table_name ='grptable' AND academic_year ='$academic_year'");
if ($feeConcessionGRPDetailsQry->rowCount() > 0) {
    $overall_concession_amount_grp = $feeConcessionGRPDetailsQry->fetch()['grp_con_amnt'];
} else {
    $overall_concession_amount_grp = '0';
}
$overall_grp_concession_amount = intval($overall_concession_amount_grp + $OverallGrpConcessionAmount);
//Close DB connection
$feeConcessionGRPDetailsQry->closeCursor();

$feeConcessionEXTRADetailsQry = $connect->query("SELECT SUM(scholarship_amount) AS extra_con_amnt FROM `fees_concession` WHERE student_id ='$student_id' && fees_table_name ='extratable' AND academic_year ='$academic_year'");
if ($feeConcessionEXTRADetailsQry->rowCount() > 0) {
    $overall_concession_amount_extra = $feeConcessionEXTRADetailsQry->fetch()['extra_con_amnt'];
} else {
    $overall_concession_amount_extra = '0';
}
$overall_extra_cur_concession_amount = intval($overall_concession_amount_extra + $OverallExtraCurConcessionAmount);
//Close DB connection
$feeConcessionEXTRADetailsQry->closeCursor();

$feeConcessionAMENITYDetailsQry = $connect->query("SELECT SUM(scholarship_amount) AS amenity_con_amnt FROM `fees_concession` WHERE student_id ='$student_id' && fees_table_name ='amenitytable' AND academic_year ='$academic_year' ");
if ($feeConcessionAMENITYDetailsQry->rowCount() > 0) {
    $overall_concession_amount_amenity = $feeConcessionAMENITYDetailsQry->fetch()['amenity_con_amnt'];
} else {
    $overall_concession_amount_amenity = '0';
}
$overall_amenity_concession_amount = intval($overall_concession_amount_amenity + $OverallAmenityConcessionAmount);
//Close DB connection
$feeConcessionAMENITYDetailsQry->closeCursor();

//////////////////////////////////Fees Concession END 
$CheckTransportConcessionReceiptQry = $connect->query("SELECT SUM(scholarship_amount) as overall_trans_concession FROM `fees_concession` WHERE student_id = '$student_id' && fees_table_name ='transport' AND academic_year ='$academic_year' ");
if ($CheckTransportConcessionReceiptQry->rowCount() > 0) {
    $overall_trans_concession_amount = $CheckTransportConcessionReceiptQry->fetch()['overall_trans_concession'];
} else {
    $overall_trans_concession_amount = '0';
}

$CheckTransportConcessionReceiptQry = $connect->query("SELECT SUM(scholarship) as overall_transport_concession FROM `transport_admission_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' ");
if ($CheckTransportConcessionReceiptQry->rowCount() > 0) {
    $overall_transp_concession_amount = $CheckTransportConcessionReceiptQry->fetch()['overall_transport_concession'];
} else {
    $overall_transp_concession_amount = '0';
}
       $overall_transport_concession_amount=intval($overall_trans_concession_amount + $overall_transp_concession_amount);
//Close DB connection
$CheckTransportConcessionReceiptQry->closeCursor();
$CheckLastyrConcessionQry = $connect->query("SELECT SUM(scholarship) as overall_lastyr_concession FROM `admission_fees` WHERE admission_id = '$student_id' && academic_year = '$last_year' ");
if ($CheckLastyrConcessionQry->rowCount() > 0) {
    $lastyr_concession_amount = $CheckLastyrConcessionQry->fetch()['overall_lastyr_concession'];
} else {
    $lastyr_concession_amount = '0';
}
$CheckLastyrConcessionQry = $connect->query("SELECT SUM(scholarship) as overall_lastyr_concession FROM `transport_admission_fees` WHERE admission_id = '$student_id' && academic_year = '$last_year' ");
if ($CheckLastyrConcessionQry->rowCount() > 0) {
    $lastyr_trnsconcession_amount = $CheckLastyrConcessionQry->fetch()['overall_lastyr_concession'];
} else {
    $lastyr_trnsconcession_amount = '0';
}

//Close DB connection
$CheckLastyrConcessionQry->closeCursor();
$CheckLastyrFeesConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as overall_last_concession FROM `fees_concession` WHERE student_id = '$student_id' && academic_year = '$last_year' ");
if ($CheckLastyrFeesConcessionQry->rowCount() > 0) {
    $lastyrfees_concession_amount = $CheckLastyrFeesConcessionQry->fetch()['overall_last_concession'];
} else {
    $lastyrfees_concession_amount = '0';
}

//Close DB connection
$CheckLastyrFeesConcessionQry->closeCursor();
$CheckLastyrEntryConcessionQry = $connect->query("SELECT SUM(scholarship) as overall_lastyr_concession FROM `last_year_fees` WHERE admission_id = '$student_id' && academic_year = '$academic_year' ");
if ($CheckLastyrEntryConcessionQry->rowCount() > 0) {
    $lastyr_entry_concession_amount = $CheckLastyrEntryConcessionQry->fetch()['overall_lastyr_concession'];
} else {
    $lastyr_entry_concession_amount = '0';
}
//Close DB connection
$CheckLastyrEntryConcessionQry->closeCursor();

$overall_lastyr_concession_amount = $lastyr_concession_amount + $lastyr_entry_concession_amount + $lastyrfees_concession_amount +$lastyr_trnsconcession_amount;

//Fee Details /// Concession///  Group/ extra cur/ amenity/ transport/ Last year/ ////////////////////////////END////////////////////////////////////////////////////////
$netPaySchoolFees = (($overallGrpAmount) - (($overallpaid_grp_amount) + ($overall_grp_concession_amount)));
$netPayExtraCurFees = (($overallExtraCurAmount) - (($overallpaid_extra_cur_amount) + ($overall_extra_cur_concession_amount)));
$netPayAmenityFees = (($overallAmenityAmount) - (($overallpaid_amenity_amount) + ($overall_amenity_concession_amount)));
$netPayTransportFees = (($overallTransportAmount) - (($overallpaid_transport_amount)+ ($overall_transport_concession_amount)));
$netPayLastYearFees = (($overallLastYearFees) - (($lastyr_overallpaid_amount) +($overall_lastyr_concession_amount)));

$studentFeesCollectionDetails = array();
$studentFeesCollectionDetails["student_name"] = ($student_name) ? $student_name : '-';
$studentFeesCollectionDetails["admission_number"] = ($admission_number) ? $admission_number : '-';
$studentFeesCollectionDetails["studentrollno"] = ($studentrollno) ? $studentrollno : '-';
$studentFeesCollectionDetails["medium"] = ($medium) ? $medium : '-';
$studentFeesCollectionDetails["studentstype"] = ($studentstype) ? $studentstype : '-';
$studentFeesCollectionDetails["standard_name"] = ($standard_name) ? $standard_name : '-';
$studentFeesCollectionDetails["section"] = ($section) ? $section : '-';
$studentFeesCollectionDetails["academic_year"] = ($academic_year) ? $academic_year : '-';
$studentFeesCollectionDetails["school_id"] = ($school_id) ? $school_id : '-';
$studentFeesCollectionDetails["transportFacility"] = ($transportFacility) ? $transportFacility : '-';

$studentFeesCollectionDetails["overallGrpAmount"] = ($overallGrpAmount) ? $overallGrpAmount : '0';
$studentFeesCollectionDetails["overallExtraCurAmount"] = ($overallExtraCurAmount) ? $overallExtraCurAmount : '0';
$studentFeesCollectionDetails["overallAmenityAmount"] =  ($overallAmenityAmount) ? $overallAmenityAmount : '0';
$studentFeesCollectionDetails["overallTransportAmount"] =  ($overallTransportAmount) ? $overallTransportAmount : '0';
$studentFeesCollectionDetails["overallLastYearFees"] = ($overallLastYearFees) ? $overallLastYearFees : '0';

$studentFeesCollectionDetails["overallpaid_grp_amount"] = ($overallpaid_grp_amount) ? $overallpaid_grp_amount : '0';
$studentFeesCollectionDetails["overallpaid_extra_cur_amount"] = ($overallpaid_extra_cur_amount) ? $overallpaid_extra_cur_amount : '0';
$studentFeesCollectionDetails["overallpaid_amenity_amount"] = ($overallpaid_amenity_amount) ? $overallpaid_amenity_amount : '0';
$studentFeesCollectionDetails["overallpaid_transport_amount"] = ($overallpaid_transport_amount) ? $overallpaid_transport_amount : '0';
$studentFeesCollectionDetails["lastyr_overallpaid_amount"] = ($lastyr_overallpaid_amount) ? $lastyr_overallpaid_amount : '0';

$studentFeesCollectionDetails["overall_grp_concession_amount"] = ($overall_grp_concession_amount) ? $overall_grp_concession_amount : '0';
$studentFeesCollectionDetails["overall_extra_cur_concession_amount"] = ($overall_extra_cur_concession_amount) ? $overall_extra_cur_concession_amount : '0';
$studentFeesCollectionDetails["overall_amenity_concession_amount"] = ($overall_amenity_concession_amount) ? $overall_amenity_concession_amount : '0';
$studentFeesCollectionDetails["overall_transport_concession_amount"] = ($overall_transport_concession_amount) ? $overall_transport_concession_amount : '0';
$studentFeesCollectionDetails["overall_lastyr_concession_amount"] = ($overall_lastyr_concession_amount) ? $overall_lastyr_concession_amount : '0';

$studentFeesCollectionDetails["netPaySchoolFees"] = ($netPaySchoolFees) ? $netPaySchoolFees : '0';
$studentFeesCollectionDetails["netPayExtraCurFees"] = ($netPayExtraCurFees) ? $netPayExtraCurFees : '0';
$studentFeesCollectionDetails["netPayAmenityFees"] = ($netPayAmenityFees) ? $netPayAmenityFees : '0';
$studentFeesCollectionDetails["netPayTransportFees"] = ($netPayTransportFees) ? $netPayTransportFees : '0';
$studentFeesCollectionDetails["netPayLastYearFees"] = ($netPayLastYearFees) ? $netPayLastYearFees : '0';


echo json_encode($studentFeesCollectionDetails);
