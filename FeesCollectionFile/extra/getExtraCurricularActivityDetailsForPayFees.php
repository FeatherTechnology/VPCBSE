<?php
include '../../ajaxconfig.php';

if(isset($_POST['admissionFormId'])){
    $admissionFormId = $_POST['admissionFormId'];
}
if(isset($_POST['academicYear'])){
    $academicYear = $_POST['academicYear'];
}
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

$CheckReceiptQry = $connect->query("SELECT af.id FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'extratable' && af.academic_year ='$academicYear' ORDER BY af.id DESC LIMIT 1");
if($CheckReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
    $feeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as extra_amount, afd.fees_master_id as fees_id, afd.fees_id as extra_fee_id, ecaf.extra_particulars, ecaf.extra_amount AS ovrlAllExtraAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id WHERE af.id = '$get_temp_fees_id' && afd.fees_table_name = 'extratable' && ecaf.status ='1' ");
}else{
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, ecaf.*, ecaf.extra_amount AS ovrlAllExtraAmnt  FROM `fees_master` fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && FIND_IN_SET(ecaf.extra_fee_id,'$studentExtraCurricular') && ecaf.status ='1' ");
}

$i=0;
while($extraFeeDetailsInfo = $feeDetailsQry->fetch()){
    $extraConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as extraTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) + COALESCE(SUM(afd.scholarship),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'extratable' && afd.fees_id = '".$extraFeeDetailsInfo['extra_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='extratable' && `fees_id` = '".$extraFeeDetailsInfo['extra_fee_id']."' && academic_year ='$academicYear' ");

    $extraConcessionInfo = $extraConcessionQry->fetch();
    $extraTotalScholarshipAmnt = $extraConcessionInfo['extraTotalScholarshipAmnt'];
    $totalextraAmnt = $extraConcessionInfo['paid_amnt'];
    $extraAmount = ($extraFeeDetailsInfo['extra_amount'] != '0') ? $extraFeeDetailsInfo['ovrlAllExtraAmnt'] - $extraTotalScholarshipAmnt - $totalextraAmnt : $extraFeeDetailsInfo['extra_amount'];
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