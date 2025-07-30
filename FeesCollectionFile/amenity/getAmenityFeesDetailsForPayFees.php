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

if($studentType =="1" || $studentType =="2"){
    $student_type_cndtn = "(fm.student_type = '$studentType' || fm.student_type = '4')";
    
}else{
    $student_type_cndtn = "(fm.student_type = '$studentType')";

}

$CheckReceiptQry = $connect->query("SELECT afs.id FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id WHERE afs.admission_id = '$admissionFormId' && afd.fees_table_name = 'amenitytable' && afd.fee_received > 0 && afs.academic_year ='$academicYear' ORDER BY afs.id DESC LIMIT 1");
if($CheckReceiptQry->rowCount() > 0){
    $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
    $feeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as amenity_amount, afd.fees_master_id as fees_id, afd.fees_id as amenity_fee_id, af.amenity_particulars, af.amenity_amount AS ovrlAllAmenityAmnt FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id WHERE afs.id = '$get_temp_fees_id' && afd.fees_table_name = 'amenitytable' && af.status ='1' ");

}else{
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.*, af.amenity_amount AS ovrlAllAmenityAmnt  FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && af.status ='1' ");
}

$i=0;
while($amenityFeeDetailsInfo = $feeDetailsQry->fetch()){
    $amenityConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as amenityTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) + COALESCE(SUM(afd.scholarship),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'amenitytable' && afd.fees_id = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='amenitytable' && `fees_id` = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && academic_year ='$academicYear' ");
    
    $amenityConcessionInfo = $amenityConcessionQry->fetch();
    $amenityTotalScholarshipAmnt = $amenityConcessionInfo['amenityTotalScholarshipAmnt'];
    $totalAmenityAmnt = $amenityConcessionInfo['paid_amnt'];
    $amenityAmount = ($amenityFeeDetailsInfo['amenity_amount'] != '0') ? $amenityFeeDetailsInfo['ovrlAllAmenityAmnt'] - $amenityTotalScholarshipAmnt - $totalAmenityAmnt : $amenityFeeDetailsInfo['amenity_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="amenityFeesMasterid[]" value="<?php echo $amenityFeeDetailsInfo['fees_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityAmntid[]" value="<?php echo $amenityFeeDetailsInfo['amenity_fee_id']; ?>" readonly>
        <?php echo $amenityFeeDetailsInfo['amenity_particulars']; ?> 
    </td>
    <td><input type="number" class="form-control amenityfees" name="amenityAmnt[]" value="<?php echo $amenityAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control amenityfeesreceived" name="amenityAmntReceived[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesscholar" name="amenityAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesbalance" name="amenityAmntBalance[]" value="<?php echo $amenityAmount; ?>" readonly> </td>
</tr>
<?php } ?>