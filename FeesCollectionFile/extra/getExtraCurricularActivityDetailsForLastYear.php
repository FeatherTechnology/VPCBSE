<?php
include '../../ajaxconfig.php';

if(isset($_POST['admissionFormId'])){
    $admissionFormId = $_POST['admissionFormId'];
}
if(isset($_POST['academicYear'])){
    $academicYear = $_POST['academicYear'];
}
// Split the academic year string by the '-' character
$acdmcyear = explode('-', $academicYear);

// Increment the first and second part of the academic year for the new academic year
$nextAcademicYear = ($acdmcyear[0] + 1) . '-' . ($acdmcyear[1] + 1);
if(isset($_POST['medium'])){
    $medium = $_POST['medium'];
}
if(isset($_POST['studentType'])){
    $studentType = $_POST['studentType'];
}
if(isset($_POST['standard'])){
    $standardId = $_POST['standard'];
}
if(isset($_POST['student_extra_curricular'])){
    $studentExtraCurricular = $_POST['student_extra_curricular'];
}

if($studentType =="1" || $studentType =="2"){
    $student_type_cndtn = "(fm.student_type = '$studentType' || fm.student_type = '4')";
    
}else{
    $student_type_cndtn = "(fm.student_type = '$studentType')";

}

$CheckReceiptQry = $connect->query("SELECT af.id FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && af.academic_year = '$academicYear' && afd.fees_table_name = 'extratable' ORDER BY af.id DESC LIMIT 1");
if($CheckReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
    $feeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as extra_amount, afd.fees_master_id as fees_id, afd.fees_id as extra_fee_id, ecaf.extra_particulars ,extra_amount AS ovrlAllExtraAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id WHERE af.id = '$get_temp_fees_id' && af.academic_year = '$academicYear' && afd.fees_table_name = 'extratable' && ecaf.status ='1' ");

}else{
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, ecaf.* ,ecaf.extra_amount AS ovrlAllExtraAmnt FROM `fees_master` fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && FIND_IN_SET(ecaf.extra_fee_id, '$studentExtraCurricular') && ecaf.status ='1' ");
}
$CheckLastReceiptQry = $connect->query("SELECT lf.id FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lf.academic_year = '$nextAcademicYear' && lfd.fees_table_name = 'extratable' ORDER BY lf.id DESC LIMIT 1");
if($CheckLastReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckLastReceiptQry->fetch()['id'];
    $lastfeeDetailsQry = $connect->query("SELECT lfd.balance_tobe_paid as extra_amount, lfd.fees_master_id as fees_id, lfd.fees_id as extra_fee_id, ecaf.extra_particulars ,ecaf.extra_amount AS ovrlAllExtraAmnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON lfd.fees_id = ecaf.extra_fee_id WHERE lf.id = '$get_temp_fees_id' && lf.academic_year = '$nextAcademicYear' && lfd.fees_table_name = 'extratable' && ecaf.status ='1'  ");

}
$feeQueryToUse = ($CheckLastReceiptQry->rowCount() > 0) ? $lastfeeDetailsQry : $feeDetailsQry;
$i=0;
while($extraFeeDetailsInfo = $feeQueryToUse->fetch()){
    $extraConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as extraTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) + COALESCE(SUM(afd.scholarship),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'extratable' && afd.fees_id = '".$extraFeeDetailsInfo['extra_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='extratable' && `fees_id` = '".$extraFeeDetailsInfo['extra_fee_id']."' && academic_year ='$academicYear' ");

    $extraConcessionInfo = $extraConcessionQry->fetch();
    $extraTotalScholarshipAmnt = $extraConcessionInfo['extraTotalScholarshipAmnt'];
    $totalextraAmnt = $extraConcessionInfo['paid_amnt'];
    $grpLastConcessionQry = $connect->query("SELECT COALESCE(SUM(lfd.scholarship),0) + COALESCE(SUM(lfd.fee_received),0) AS grp_amnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lfd.fees_table_name = 'extratable' && lfd.fees_id = '".$extraFeeDetailsInfo['extra_fee_id']."' && lf.academic_year ='$nextAcademicYear' ");
    $grpLastConcessionInfo = $grpLastConcessionQry->fetch();
    $totallastExtraAmnt = $grpLastConcessionInfo['grp_amnt'];
    $extraAmount = ($extraFeeDetailsInfo['extra_amount'] != '0') ? $extraFeeDetailsInfo['ovrlAllExtraAmnt'] - $extraTotalScholarshipAmnt - $totalextraAmnt -$totallastExtraAmnt : $extraFeeDetailsInfo['extra_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="extraFeesMasterid[]" value="<?php echo $extraFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="extraAmntid[]" value="<?php echo $extraFeeDetailsInfo['extra_fee_id']; ?>">
        <?php echo $extraFeeDetailsInfo['extra_particulars']; ?> 
    </td>
    <td><input type="number" class="form-control extrafeesamnt" name="extraAmnt[]" value="<?php echo $extraAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control extrafeesreceived" name="extraAmntReceived[]" value="0"> </td>
    <td><input type="number" class="form-control extrafeesscholar" name="extraAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control extrafeesbalance" name="extraAmntBalance[]" value="<?php echo $extraAmount; ?>" readonly> </td>
</tr>
<?php } ?>