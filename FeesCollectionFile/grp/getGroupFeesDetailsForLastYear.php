<?php
include '../../ajaxconfig.php';

if (isset($_POST['admissionFormId'])) {
    $admissionFormId = $_POST['admissionFormId'];
}
if (isset($_POST['academicYear'])) {
    $academicYear = $_POST['academicYear'];
}
// Split the academic year string by the '-' character
$acdmcyear = explode('-', $academicYear);

// Increment the first and second part of the academic year for the new academic year
$nextAcademicYear = ($acdmcyear[0] + 1) . '-' . ($acdmcyear[1] + 1);
if (isset($_POST['medium'])) {
    $medium = $_POST['medium'];
}
if (isset($_POST['studentType'])) {
    $studentType = $_POST['studentType'];
}

$CheckReceiptQry1 = $connect->query("SELECT sc.id, sc.studentstype ,sc.standard FROM `student_history` sc WHERE sc.academic_year = '$academicYear' AND sc.student_id = '$admissionFormId' ");
if ($CheckReceiptQry1->rowCount() > 0) {
    $studentData = $CheckReceiptQry1->fetch(PDO::FETCH_ASSOC);
    $studentstype = $studentData['studentstype'];
    $prevstandardId = $studentData['standard'];
    if ($studentstype == "1" || $studentstype == "2") {
        $student_type_cndtn = "(fm.student_type = '$studentstype' || fm.student_type = '4')";
    } else {
        $student_type_cndtn = "(fm.student_type = '$studentstype')";
    }
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, gcf.*,gcf.grp_amount AS ovrlAllGrpAmnt  FROM `fees_master` fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$prevstandardId' && gcf.status ='1' ");
} else {
    echo ''; // no data to return
    exit;
}
$feeQueryToUse =  $feeDetailsQry;
$i = 0;

while ($grpfeeDetailsInfo = $feeQueryToUse->fetch()) {
    $grpConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as grp_schlrshp_amnt, (SELECT COALESCE(SUM(afd.scholarship),0) + COALESCE(SUM(afd.fee_received),0)  FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'grptable' && afd.fees_id = '" . $grpfeeDetailsInfo['grp_course_id'] . "' && af.academic_year ='$academicYear') AS grp_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='grptable' && `fees_id` = '" . $grpfeeDetailsInfo['grp_course_id'] . "' && academic_year ='$academicYear' ");
    $grpConcessionInfo = $grpConcessionQry->fetch();
    $grpTotalScholarshipAmnt = $grpConcessionInfo['grp_schlrshp_amnt'];
    $totalGrpAmnt = $grpConcessionInfo['grp_amnt'];
    $grpLastConcessionQry = $connect->query("SELECT COALESCE(SUM(lfd.scholarship),0) + COALESCE(SUM(lfd.fee_received),0) AS grp_amnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lfd.fees_table_name = 'grptable' && lfd.fees_id = '" . $grpfeeDetailsInfo['grp_course_id'] . "' && lf.academic_year ='$nextAcademicYear' ");
    $grpLastConcessionInfo = $grpLastConcessionQry->fetch();
    $totallastGrpAmnt = $grpLastConcessionInfo['grp_amnt'];
    $grpAmount = $grpfeeDetailsInfo['ovrlAllGrpAmnt'] - $grpTotalScholarshipAmnt - $totalGrpAmnt - $totallastGrpAmnt;

?>
    <tr>
        <td>
            <input type="hidden" class="form-control" name="feesMasterid[]" value="<?php echo $grpfeeDetailsInfo['fees_id']; ?>">
            <input type="hidden" class="form-control" name="grpid[]" value="<?php echo $grpfeeDetailsInfo['grp_course_id']; ?>">
            <?php echo $grpfeeDetailsInfo['grp_particulars']; ?>
        </td>
        <td><input type="number" class="form-control grpfeesamnt" name="grpFeeAmnt[]" value="<?php echo $grpAmount; ?>" readonly> </td>
        <td><input type="number" class="form-control grpfeesreceived" name="grpFeeReceived[]" value="0"> </td>
        <td><input type="number" class="form-control grpfeesscholarship" name="grpFeeScholarship[]" value="0"> </td>
        <td><input type="number" class="form-control grpfeesbalance" name="grpFeeBalance[]" value="<?php echo $grpAmount; ?>" readonly> </td>
    </tr>
<?php } ?>