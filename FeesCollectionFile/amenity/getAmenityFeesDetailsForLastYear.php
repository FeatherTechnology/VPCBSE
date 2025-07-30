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

if (isset($_POST['standard'])) {
    $standardId = (int)$_POST['standard']; // ensure it's an integer

    // Initialize next_std_id
    $prevstandardId = null;

    if ($standardId >= 14) {
        // Handle special case for certain standards
        switch ($standardId) {
            case 19: $prevstandardId = 14; break;
            case 20: $prevstandardId = 15; break;
            case 21: $prevstandardId = 16; break;
            case 22: $prevstandardId = 17; break;
            case 23: $prevstandardId = 18; break;
            case 25: $prevstandardId = 24; break;
            default: $prevstandardId = $standardId - 1; break; // fallback
        }
    } else {
        // Default next standard as current + 1 for lower classes
        $prevstandardId = $standardId - 1;
    }

    // You can now use $prevstandardId as needed
}



// $CheckReceiptQry = $connect->query("SELECT afs.id FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id WHERE afs.admission_id = '$admissionFormId' && afs.academic_year = '$academicYear' && afd.fees_table_name = 'amenitytable' ORDER BY afs.id DESC LIMIT 1");
// if($CheckReceiptQry->rowCount() > 0){
//     $get_temp_fees_id = $CheckReceiptQry->fetch()['id'];
//     $feeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as amenity_amount, afd.fees_master_id as fees_id, afd.fees_id as amenity_fee_id, af.amenity_particulars,af.amenity_amount AS ovrlAllAmenityAmnt FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id WHERE afs.id = '$get_temp_fees_id' && afs.academic_year = '$academicYear' && afd.fees_table_name = 'amenitytable' && af.status ='1' ");

// }else{
    $CheckReceiptQry1 = $connect->query("SELECT sc.id ,sc.studentstype FROM `student_history` sc WHERE sc.academic_year = '$academicYear' AND sc.student_id = '$admissionFormId' ");
if($CheckReceiptQry1->rowCount() > 0){
    $studentData = $CheckReceiptQry1->fetch(PDO::FETCH_ASSOC);
    $studentstype = $studentData['studentstype'];
    
if($studentstype =="1" || $studentstype =="2"){
$student_type_cndtn = "(fm.student_type = '$studentstype' || fm.student_type = '4')";

}else{
$student_type_cndtn = "(fm.student_type = '$studentstype')";

}
    $feeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.* ,af.amenity_amount AS ovrlAllAmenityAmnt FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$prevstandardId' && af.status ='1' ");
}else{
    echo ''; // no data to return
    exit;
}
// }
// $CheckLastReceiptQry = $connect->query("SELECT lf.id FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lf.academic_year = '$nextAcademicYear' && lfd.fees_table_name = 'amenitytable' ORDER BY lf.id DESC LIMIT 1");
// if($CheckLastReceiptQry->rowCount() > 0){
//     $get_temp_fees_id = $CheckLastReceiptQry->fetch()['id'];
//     $lastfeeDetailsQry = $connect->query("SELECT lfd.balance_tobe_paid as amenity_amount, lfd.fees_master_id as fees_id, lfd.fees_id as amenity_fee_id, af.amenity_particulars,af.amenity_amount AS ovrlAllAmenityAmnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id JOIN amenity_fee af ON lfd.fees_id = af.amenity_fee_id WHERE lf.id = '$get_temp_fees_id' && lf.academic_year = '$nextAcademicYear' && lfd.fees_table_name = 'amenitytable' && af.status ='1' ");

// }
$feeQueryToUse =  $feeDetailsQry;
$i=0;
while($amenityFeeDetailsInfo = $feeQueryToUse->fetch()){
    $amenityConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as amenityTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) + COALESCE(SUM(afd.scholarship),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$admissionFormId' && afd.fees_table_name = 'amenitytable' && afd.fees_id = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$admissionFormId' && `fees_table_name`='amenitytable' && `fees_id` = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && academic_year ='$academicYear' ");
    
    $amenityConcessionInfo = $amenityConcessionQry->fetch();
    $amenityTotalScholarshipAmnt = $amenityConcessionInfo['amenityTotalScholarshipAmnt'];
    $totalAmenityAmnt = $amenityConcessionInfo['paid_amnt'];

    $grpLastConcessionQry = $connect->query("SELECT COALESCE(SUM(lfd.scholarship),0) + COALESCE(SUM(lfd.fee_received),0) AS grp_amnt FROM `last_year_fees` lf JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id WHERE lf.admission_id = '$admissionFormId' && lfd.fees_table_name = 'amenitytable' && lfd.fees_id = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && lf.academic_year ='$nextAcademicYear' ");
    $grpLastConcessionInfo = $grpLastConcessionQry->fetch();
    $totallastAmeityAmnt = $grpLastConcessionInfo['grp_amnt'];
    $amenityAmount = $amenityFeeDetailsInfo['ovrlAllAmenityAmnt'] - $amenityTotalScholarshipAmnt - $totalAmenityAmnt -$totallastAmeityAmnt;
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