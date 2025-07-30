<?php
include '../../ajaxconfig.php';

if(isset($_POST['tempAdmissionFormId'])){
    $tempAdmissionFormId = $_POST['tempAdmissionFormId'];
}
if(isset($_POST['academicYear'])){
    $academicYear = $_POST['academicYear'];
}
if(isset($_POST['tempMedium'])){
    $tempMedium = $_POST['tempMedium'];
}
if(isset($_POST['tempStudentType'])){
    $tempStudentType = $_POST['tempStudentType'];
}
if(isset($_POST['tempStandard'])){
    $standardId = $_POST['tempStandard'];
}

$CheckReceiptQry = $connect->query("SELECT taf.id FROM `temp_admission_fees` taf JOIN temp_admissionfees_details tafd ON taf.id = tafd.TempAdmFeeRefId WHERE taf.TempAdmissionId = '$tempAdmissionFormId' && tafd.FeesTableName = 'grptable' ORDER BY taf.id DESC LIMIT 1");
if($CheckReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
    //(gcf.grp_amount - tafd.FeeReceived) as grp_amount
    $feeDetailsQry = $connect->query("SELECT tafd.BalancetobePaid as grp_amount, tafd.FeesMasterId as fees_id, tafd.FeesId as grp_course_id, gcf.grp_particulars FROM `temp_admission_fees` taf JOIN temp_admissionfees_details tafd ON taf.id = tafd.TempAdmFeeRefId JOIN group_course_fee gcf ON tafd.FeesId = gcf.grp_course_id WHERE taf.id = '$get_temp_fees_id' && tafd.FeesTableName = 'grptable' && gcf.status ='1' ");

}else{
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, gcf.*  FROM `fees_master` fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$tempMedium' && fm.student_type = '$tempStudentType' && fm.standard = '$standardId' && gcf.status ='1' ");

}

$i=0;
while($feeDetailsInfo = $feeDetailsQry->fetch()){
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="feesMasterid[]" value="<?php echo $feeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="grpid[]" value="<?php echo $feeDetailsInfo['grp_course_id']; ?>">
        <?php echo $feeDetailsInfo['grp_particulars']; ?> 
    </td>
    <td><input type="number" class="form-control grpfeesamnt" name="grpFeeAmnt[]" value="<?php echo $feeDetailsInfo['grp_amount']; ?>" readonly> </td>
    <td><input type="number" class="form-control grpfeesreceived" name="grpFeeReceived[]" value="0"> </td>
    <td><input type="number" class="form-control grpfeesscholarship" name="grpFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control grpfeesbalance" name="grpFeeBalance[]" value="<?php echo $feeDetailsInfo['grp_amount']; ?>" readonly> </td>
</tr>
<?php } ?>