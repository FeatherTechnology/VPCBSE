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

$CheckReceiptQry = $connect->query("SELECT taf.id FROM `temp_admission_fees` taf JOIN temp_admissionfees_details tafd ON taf.id = tafd.TempAdmFeeRefId WHERE taf.TempAdmissionId = '$tempAdmissionFormId' && tafd.FeesTableName = 'amenitytable' ORDER BY taf.id DESC LIMIT 1");
if($CheckReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
    $feeDetailsQry = $connect->query("SELECT tafd.BalancetobePaid as amenity_amount, tafd.FeesMasterId as fees_id, tafd.FeesId as amenity_fee_id, af.amenity_particulars FROM `temp_admission_fees` taf JOIN temp_admissionfees_details tafd ON taf.id = tafd.TempAdmFeeRefId JOIN amenity_fee af ON tafd.FeesId = af.amenity_fee_id WHERE taf.id = '$get_temp_fees_id' && tafd.FeesTableName = 'amenitytable' && af.status ='1' ");

}else{
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.*  FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$tempMedium' && fm.student_type = '$tempStudentType' && fm.standard = '$standardId' && af.status ='1' ");
}

$i=0;
while($feeDetailsInfo = $feeDetailsQry->fetch()){
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="amenityFeesMasterid[]" value="<?php echo $feeDetailsInfo['fees_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityAmntid[]" value="<?php echo $feeDetailsInfo['amenity_fee_id']; ?>" readonly>
        <?php echo $feeDetailsInfo['amenity_particulars']; ?> 
    </td>
    <td><input type="number" class="form-control amenityfees" name="amenityAmnt[]" value="<?php echo $feeDetailsInfo['amenity_amount']; ?>" readonly> </td>
    <td><input type="number" class="form-control amenityfeesreceived" name="amenityAmntReceived[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesscholar" name="amenityAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesbalance" name="amenityAmntBalance[]" value="<?php echo $feeDetailsInfo['amenity_amount']; ?>" readonly> </td>
</tr>
<?php } ?>