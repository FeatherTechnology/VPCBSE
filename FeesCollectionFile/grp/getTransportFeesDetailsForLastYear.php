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

$CheckReceiptQry1 = $connect->query("SELECT sc.id FROM `student_history` sc WHERE sc.academic_year = '$academicYear' AND sc.student_id = '$admissionFormId' ");
if($CheckReceiptQry1->rowCount() > 0){
    $feeDetailsQry = $connect->query("SELECT ac.area_id as fees_id, acp.particulars_id as particulars_id, ac.area_name, acp.particulars, acp.due_amount, acp.due_amount AS ovrlAllAmnt  
    FROM student_creation sc  
    JOIN student_history sh ON sh.student_id = sc.student_id AND sh.academic_year = '$academicYear'
    JOIN area_creation ac ON sh.transportarearefid = ac.area_id
    JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
    WHERE sc.student_id = '$admissionFormId' AND ac.status = '0' AND ac.year_id ='$academicYear' ");

}else{
    echo ''; // no data to return
    exit;
}
$feeQueryToUse = $feeDetailsQry;
$i=0;
while($transportFeeDetailsInfo = $feeQueryToUse->fetch()){
    $transportConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as transportTotalScholarshipAmnt, (SELECT  COALESCE(SUM(tafd.scholarship),0) + COALESCE (SUM(tafd.fee_received),0) FROM `transport_admission_fees` taf JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id WHERE taf.admission_id = '$admissionFormId' && taf.academic_year = '$academicYear' AND tafd.area_creation_particulars_id = '".$transportFeeDetailsInfo['particulars_id']."') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='transport' && `fees_id` = '".$transportFeeDetailsInfo['particulars_id']."' && academic_year ='$academicYear' ");
        $transportConcessionInfo = $transportConcessionQry->fetch();
        $transportTotalScholarshipAmnt = $transportConcessionInfo['transportTotalScholarshipAmnt'];
        $totalPaidAmnt = $transportConcessionInfo['paid_amnt'];
        $grpLastConcessionQry = $connect->query("SELECT COALESCE(SUM(lfd.scholarship),0) + COALESCE(SUM(lfd.fee_received),0) AS grp_amnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lfd.fees_table_name = 'transport' && lfd.fees_id = '".$transportFeeDetailsInfo['particulars_id']."' && lf.academic_year ='$nextAcademicYear' ");
    $grpLastConcessionInfo = $grpLastConcessionQry->fetch();
    $totallastGrpAmnt = $grpLastConcessionInfo['grp_amnt'];
        $transportAmount =  $transportFeeDetailsInfo['ovrlAllAmnt'] - $transportTotalScholarshipAmnt - $totalPaidAmnt - $totallastGrpAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="areaCreationId[]" value="<?php echo $transportFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="particularId[]" value="<?php echo $transportFeeDetailsInfo['particulars_id']; ?>">
        <?php echo $transportFeeDetailsInfo['particulars']; ?> 
    </td>
    <td><input type="number" class="form-control transportfeeslastamnt" name="transportFeeAmnt[]" value="<?php echo $transportAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control transportfeeslastreceived" name="transportFeeReceived[]" value="0"> </td>
    <td><input type="number" class="form-control transportfeeslastscholarship" name="transportFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control transportfeeslastbalance" name="transportFeeBalance[]" value="<?php echo $transportAmount; ?>" readonly> </td>
</tr>
<?php } ?>