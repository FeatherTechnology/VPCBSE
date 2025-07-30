<?php
include '../ajaxconfig.php';

if(isset($_POST['studentid'])){
    $studentid = $_POST['studentid'];
}
if(isset($_POST['concessionType'])){
    $concessionType = $_POST['concessionType'];
}

$getStudentDetailsQry = $connect->query("SELECT stdc.student_name, stdc.`admission_number`, stdc.studentrollno, stdc.medium, stdc.studentstype, stdc.standard, sc.standard as standard_name, stdc.section, stdc.year_id, stdc.school_id, stdc.facility, stdc.extra_curricular 
FROM `student_creation` stdc 
JOIN standard_creation sc ON stdc.standard = sc.standard_id 
WHERE stdc.student_id = '$studentid'");
$studentInfo = $getStudentDetailsQry ->fetch();

$academicYear = $studentInfo['year_id'];
$medium = $studentInfo['medium'];
$studentType = $studentInfo['studentstype'];
$standardId = $studentInfo['standard'];
$studentExtraCurricular  = $studentInfo['extra_curricular'];

if($studentType =="1" || $studentType =="2"){
    $student_type_cndtn = "(fm.student_type = '$studentType' || fm.student_type = '4')";
    
}else{
    $student_type_cndtn = "(fm.student_type = '$studentType')";

}
?>

<input type="hidden" name="studentID" value="<?php if(isset($studentid)) echo $studentid; ?>" >
<input type="hidden" name="concession_type" value="<?php if(isset($concessionType)) echo $concessionType; ?>" >

<table class="table table-bordered responsive-table">
    <thead>
        <tr>
            <th style="width: 30%;">Group Fees</th>
            <th>Paid Fees</th>
            <th>Amount (In Rs)</th>
            <th>Scholarship/Concession</th>
            <th>Balance to be Paid</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>

<?php
$checkAdmFeesForGrp = $connect->query("SELECT af.id FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$studentid' && afd.fees_table_name = 'grptable' && af.academic_year ='$academicYear' ORDER BY af.id DESC LIMIT 1 ");
if($checkAdmFeesForGrp->rowCount() > 0){
    $get_fees_id_grp = $checkAdmFeesForGrp->fetch()['id'];
    $grpFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as grp_amount, afd.fees_master_id as fees_id, afd.fees_id as grp_course_id, gcf.grp_particulars, gcf.grp_amount AS ovrlAllGrpAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN group_course_fee gcf ON afd.fees_id = gcf.grp_course_id WHERE af.id = '$get_fees_id_grp' && afd.fees_table_name = 'grptable' && gcf.status ='1' ");

}else{
    $grpFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, gcf.*, gcf.grp_amount AS ovrlAllGrpAmnt  FROM `fees_master` fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && gcf.status ='1' ");
    
}

while($grpfeeDetailsInfo = $grpFeeDetailsQry->fetch()){
    $grpConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as grp_schlrshp_amnt, (SELECT COALESCE(SUM(afd.fee_received),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$studentid' && afd.fees_table_name = 'grptable' && afd.fees_id = '".$grpfeeDetailsInfo['grp_course_id']."' && af.academic_year ='$academicYear') AS grp_amnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='grptable' && `fees_id` = '".$grpfeeDetailsInfo['grp_course_id']."' && academic_year ='$academicYear' ");
    $grpConcessionInfo = $grpConcessionQry->fetch();
    $grpTotalScholarshipAmnt = $grpConcessionInfo['grp_schlrshp_amnt'];
    $totalGrpAmnt = $grpConcessionInfo['grp_amnt'];
    $grpAmount = ($grpfeeDetailsInfo['grp_amount'] != '0') ? $grpfeeDetailsInfo['ovrlAllGrpAmnt'] - $grpTotalScholarshipAmnt - $totalGrpAmnt : $grpfeeDetailsInfo['grp_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="grpscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="grpStudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="feesMasterid[]" value="<?php echo $grpfeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="grpid[]" value="<?php echo $grpfeeDetailsInfo['grp_course_id']; ?>">
        <?php echo $grpfeeDetailsInfo['grp_particulars']; ?> 
    </td>
    <td> <?php echo $totalGrpAmnt + $grpTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control grpfeesamnt" name="grpFeeAmnt[]" value="<?php echo $grpAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control grpfeesscholarship" name="grpFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control grpfeesbalance" name="grpFeeBalance[]" value="<?php echo $grpAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="grpFeeRemark[]" > </td>
</tr>

<?php } ?>
</tbody>
</table>


<table class="table table-bordered responsive-table">
    <thead>
        <tr>
            <th style="width: 30%;">Extra Curricular</th>
            <th>Paid Fees</th>
            <th>Amount (In Rs)</th>
            <th>Scholarship/Concession</th>
            <th>Balance to be Paid</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
<?php
$CheckAdmFeesForExtra = $connect->query("
SELECT af.id FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$studentid' && afd.fees_table_name = 'extratable' && af.academic_year ='$academicYear' ORDER BY af.id DESC LIMIT 1");
if($CheckAdmFeesForExtra->rowCount() > 0){
    $get_fees_id_extra = $CheckAdmFeesForExtra->fetch()['id'];
    $extraFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as extra_amount, afd.fees_master_id as fees_id, afd.fees_id as extra_fee_id, ecaf.extra_particulars, ecaf.extra_amount AS ovrlAllExtraAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id WHERE af.id = '$get_fees_id_extra' && afd.fees_table_name = 'extratable' && ecaf.status ='1' ");

}else{
    $extraFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, ecaf.*, ecaf.extra_amount AS ovrlAllExtraAmnt  FROM `fees_master` fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && FIND_IN_SET(ecaf.extra_fee_id,'$studentExtraCurricular') && ecaf.status ='1' ");
}

while($extraFeeDetailsInfo = $extraFeeDetailsQry->fetch()){
    $extraConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as extraTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$studentid' && afd.fees_table_name = 'extratable' && afd.fees_id = '".$extraFeeDetailsInfo['extra_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='extratable' && `fees_id` = '".$extraFeeDetailsInfo['extra_fee_id']."' && academic_year ='$academicYear' ");

    $extraConcessionInfo = $extraConcessionQry->fetch();
    $extraTotalScholarshipAmnt = $extraConcessionInfo['extraTotalScholarshipAmnt'];
    $totalextraAmnt = $extraConcessionInfo['paid_amnt'];
    $extraAmount = ($extraFeeDetailsInfo['extra_amount'] != '0') ? $extraFeeDetailsInfo['ovrlAllExtraAmnt'] - $extraTotalScholarshipAmnt - $totalextraAmnt : $extraFeeDetailsInfo['extra_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="extrascholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="extraStudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="extraFeesMasterid[]" value="<?php echo $extraFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="extraAmntid[]" value="<?php echo $extraFeeDetailsInfo['extra_fee_id']; ?>">
        <?php echo $extraFeeDetailsInfo['extra_particulars']; ?> 
    </td>
    <td> <?php echo $totalextraAmnt + $extraTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control extrafeesamnt" name="extraAmnt[]" value="<?php echo $extraAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control extrafeesscholar" name="extraAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control extrafeesbalance" name="extraAmntBalance[]" value="<?php echo $extraAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="extraFeeRemark[]" > </td>
</tr>

<?php } ?>

</tbody>
</table>

<table class="table table-bordered responsive-table" >
    <thead>
        <tr>
            <th style="width: 30%;">Amenity Fees</th>
            <th>Paid Fees</th>
            <th>Amount (In Rs)</th>
            <th>Scholarship/Concession</th>
            <th>Balance to be Paid</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
<?php
$CheckAdmFeesForAmenity = $connect->query("SELECT afs.id FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id WHERE afs.admission_id = '$studentid' && afd.fees_table_name = 'amenitytable' && afs.academic_year ='$academicYear' ORDER BY afs.id DESC LIMIT 1");
if($CheckAdmFeesForAmenity->rowCount() > 0){
    $get_fees_id_amenity = $CheckAdmFeesForAmenity->fetch()['id'];
    $amenityFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as amenity_amount, afd.fees_master_id as fees_id, afd.fees_id as amenity_fee_id, af.amenity_particulars, af.amenity_amount AS ovrlAllAmenityAmnt FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id WHERE afs.id = '$get_fees_id_amenity' && afd.fees_table_name = 'amenitytable' && af.status ='1' ");

}else{
    $amenityFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.*, af.amenity_amount AS ovrlAllAmenityAmnt  FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && $student_type_cndtn && fm.standard = '$standardId' && af.status ='1' ");
}

while($amenityFeeDetailsInfo = $amenityFeeDetailsQry->fetch()){
    $amenityConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as amenityTotalScholarshipAmnt, (SELECT COALESCE(SUM(afd.fee_received),0) FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE af.admission_id = '$studentid' && afd.fees_table_name = 'amenitytable' && afd.fees_id = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && af.academic_year ='$academicYear') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='amenitytable' && `fees_id` = '".$amenityFeeDetailsInfo['amenity_fee_id']."' && academic_year ='$academicYear' ");
    
    $amenityConcessionInfo = $amenityConcessionQry->fetch();
    $amenityTotalScholarshipAmnt = $amenityConcessionInfo['amenityTotalScholarshipAmnt'];
    $totalAmenityAmnt = $amenityConcessionInfo['paid_amnt'];
    $amenityAmount = ($amenityFeeDetailsInfo['amenity_amount'] != '0') ? $amenityFeeDetailsInfo['ovrlAllAmenityAmnt'] - $amenityTotalScholarshipAmnt - $totalAmenityAmnt : $amenityFeeDetailsInfo['amenity_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="amenityscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="amenityStudentid[]" value="<?php echo $studentid; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityFeesMasterid[]" value="<?php echo $amenityFeeDetailsInfo['fees_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityAmntid[]" value="<?php echo $amenityFeeDetailsInfo['amenity_fee_id']; ?>" readonly>
        <?php echo $amenityFeeDetailsInfo['amenity_particulars']; ?> 
    </td>
    <td> <?php echo $totalAmenityAmnt + $amenityTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control amenityfees" name="amenityAmnt[]" value="<?php echo $amenityAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control amenityfeesscholar" name="amenityAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesbalance" name="amenityAmntBalance[]" value="<?php echo $amenityAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="amenityFeeRemark[]" > </td>
</tr>
<?php } ?>
</tbody>
</table>

<table class="table table-bordered responsive-table">
    <thead>
        <tr>
            <th style="width: 30%;">Transport Fees</th>
            <th>Paid Fees</th>
            <th>Amount (In Rs)</th>
            <th>Scholarship/Concession</th>
            <th>Balance to be Paid</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>

<?php
$CheckTransportFees = $connect->query("SELECT id FROM `transport_admission_fees` WHERE admission_id = '$studentid' && academic_year = '$academicYear' order by id desc limit 1");
if($CheckTransportFees->rowCount() > 0){
    $get_fees_id_transport = $CheckTransportFees->fetch()['id'];
    $transportFeeDetailsQry = $connect->query("SELECT tafd.balance_tobe_paid as due_amount, tafd.area_creation_id as fees_id, tafd.area_creation_particulars_id as particulars_id, ac.area_name, acp.particulars, acp.due_amount AS ovrlAllAmnt
    FROM `transport_admission_fees` taf 
    JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
    JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
    JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
    WHERE taf.id = '$get_fees_id_transport' && taf.academic_year = '$academicYear' AND ac.status = '0' ");

}else{
    $transportFeeDetailsQry = $connect->query("SELECT ac.area_id as fees_id, acp.particulars_id as particulars_id, ac.area_name, acp.particulars, acp.due_amount, acp.due_amount AS ovrlAllAmnt  
    FROM student_creation sc
    JOIN area_creation ac ON sc.transportarearefid = ac.area_id
    JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
    WHERE sc.student_id = '$studentid' AND ac.status = '0' ");

}

while($transportFeeDetailsInfo = $transportFeeDetailsQry->fetch()){
    $transportConcessionQry = $connect->query("SELECT COALESCE(SUM(scholarship_amount),0) as transportTotalScholarshipAmnt, (SELECT COALESCE(SUM(tafd.fee_received),0) FROM `transport_admission_fees` taf JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id WHERE taf.admission_id = '$studentid' && taf.academic_year = '$academicYear' AND tafd.area_creation_particulars_id = '".$transportFeeDetailsInfo['particulars_id']."') AS paid_amnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='transport' && `fees_id` = '".$transportFeeDetailsInfo['particulars_id']."' && academic_year ='$academicYear' ");
        $transportConcessionInfo = $transportConcessionQry->fetch();
        $transportTotalScholarshipAmnt = $transportConcessionInfo['transportTotalScholarshipAmnt'];
        $totalPaidAmnt = $transportConcessionInfo['paid_amnt'];
        $transportAmount = ($transportFeeDetailsInfo['due_amount'] != '0') ? $transportFeeDetailsInfo['ovrlAllAmnt'] - $transportTotalScholarshipAmnt - $totalPaidAmnt : $transportFeeDetailsInfo['due_amount'];
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="transportscholarshipHeader" value="TransportMaster">
        <input type="hidden" class="form-control" name="areastudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="areaCreationId[]" value="<?php echo $transportFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="particularId[]" value="<?php echo $transportFeeDetailsInfo['particulars_id']; ?>">
        <?php echo $transportFeeDetailsInfo['particulars']; ?> 
    </td>
    <td> <?php echo $totalPaidAmnt + $transportTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control transportfeesamnt" name="transportFeeAmnt[]" value="<?php echo $transportAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control transportfeesscholarship" name="transportFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control transportfeesbalance" name="transportFeeBalance[]" value="<?php echo $transportAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="transportFeeRemark[]" > </td>
</tr>
<?php } ?>

</tbody>
</table>

<?php if($grpFeeDetailsQry->rowCount() > 0 || $extraFeeDetailsQry->rowCount() > 0 || $amenityFeeDetailsQry->rowCount() > 0 || $transportFeeDetailsQry->rowCount() > 0 ){ ?>
    <center>
        <button type="submit" name="SubmitFeesConcession" id="SubmitFeesConcession" class="btn btn-success" value="Submit" tabindex="9" onclick="disableButton(this)">
            <span class="icon-keyboard_tab"></span>&nbsp;Approve This Concession
        </button>
    </center>
<?php } ?>

<script>
    function disableButton(button) {
        button.classList.add('disabled-button');
    }
</script>

<style>
    .disabled-button {
        pointer-events: none;
        opacity: 0.5;
    }
</style>