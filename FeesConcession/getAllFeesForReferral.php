<?php
include '../ajaxconfig.php';

if(isset($_POST['studentid'])){
    $studentid = $_POST['studentid'];
}
if(isset($_POST['concessionType'])){
    $concessionType = $_POST['concessionType'];
}
if(isset($_POST['refertype'])){
    $refertype = $_POST['refertype'];
}
if(isset($_POST['refername'])){
    $refername = $_POST['refername'];
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
?>

<input type="hidden" name="studentID" value="<?php if(isset($studentid)) echo $studentid; ?>" >
<input type="hidden" name="concession_type" value="<?php if(isset($concessionType)) echo $concessionType; ?>" >
<input type="hidden" name="refertype" value="<?php if(isset($refertype)) echo $refertype; ?>" >

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
$checkAdmFeesForGrp = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$studentid' order by id desc limit 1");
if($checkAdmFeesForGrp->rowCount() > 0){
    $get_fees_id_grp = $checkAdmFeesForGrp->fetch()['id'];
    $grpFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as grp_amount, afd.fees_master_id as fees_id, afd.fees_id as grp_course_id, gcf.grp_particulars, (gcf.grp_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN group_course_fee gcf ON afd.fees_id = gcf.grp_course_id WHERE af.id = '$get_fees_id_grp' && afd.fees_table_name = 'grptable' ");

}else{
    $grpFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, gcf.*, '0' as paidAmnt  FROM `fees_master` fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && fm.student_type = '$studentType' && fm.standard = '$standardId' ");
    
}

while($grpfeeDetailsInfo = $grpFeeDetailsQry->fetch()){
    $grpConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as grpTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='grptable' && `fees_id` = '".$grpfeeDetailsInfo['grp_course_id']."' ");
    $grpTotalScholarshipAmnt = '0';
    if($grpConcessionQry->rowCount() > 0){
        $grpTotalScholarshipAmnt = $grpConcessionQry->fetch()['grpTotalScholarshipAmnt'];
    }
    $grpAmount = $grpfeeDetailsInfo['grp_amount'] - $grpTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="grpscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="grpStudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="feesMasterid[]" value="<?php echo $grpfeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="grpid[]" value="<?php echo $grpfeeDetailsInfo['grp_course_id']; ?>">
        <?php echo $grpfeeDetailsInfo['grp_particulars']; ?> 
    </td>
    <td> <?php echo $grpfeeDetailsInfo['paidAmnt'] + $grpTotalScholarshipAmnt; ?> </td>
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
$CheckAdmFeesForExtra = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$studentid' order by id desc limit 1");
if($CheckAdmFeesForExtra->rowCount() > 0){
    $get_fees_id_extra = $CheckAdmFeesForExtra->fetch()['id'];
    $extraFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as extra_amount, afd.fees_master_id as fees_id, afd.fees_id as extra_fee_id, ecaf.extra_particulars, (ecaf.extra_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id WHERE af.id = '$get_fees_id_extra' && afd.fees_table_name = 'extratable' ");

}else{
    $extraFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, ecaf.*, '0' as paidAmnt FROM `fees_master` fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && fm.student_type = '$studentType' && fm.standard = '$standardId' && FIND_IN_SET(ecaf.extra_fee_id,'$studentExtraCurricular') ");
}

while($extraFeeDetailsInfo = $extraFeeDetailsQry->fetch()){
    $extraConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as extraTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='extratable' && `fees_id` = '".$extraFeeDetailsInfo['extra_fee_id']."' ");
    $extraTotalScholarshipAmnt = '0';
    if($extraConcessionQry->rowCount() > 0){
        $extraTotalScholarshipAmnt = $extraConcessionQry->fetch()['extraTotalScholarshipAmnt'];
    }
    $extraAmount = $extraFeeDetailsInfo['extra_amount'] - $extraTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="extrascholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="extraStudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="extraFeesMasterid[]" value="<?php echo $extraFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="extraAmntid[]" value="<?php echo $extraFeeDetailsInfo['extra_fee_id']; ?>">
        <?php echo $extraFeeDetailsInfo['extra_particulars']; ?> 
    </td>
    <td> <?php echo $extraFeeDetailsInfo['paidAmnt'] + $extraTotalScholarshipAmnt; ?> </td>
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
$CheckAdmFeesForAmenity = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$studentid' order by id desc limit 1");
if($CheckAdmFeesForAmenity->rowCount() > 0){
    $get_fees_id_amenity = $CheckAdmFeesForAmenity->fetch()['id'];
    $amenityFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as amenity_amount, afd.fees_master_id as fees_id, afd.fees_id as amenity_fee_id, af.amenity_particulars, (af.amenity_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id WHERE afs.id = '$get_fees_id_amenity' && afd.fees_table_name = 'amenitytable' ");

}else{
    $amenityFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.*, '0' as paidAmnt  FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$academicYear' && fm.medium = '$medium' && fm.student_type = '$studentType' && fm.standard = '$standardId' ");
}

while($amenityFeeDetailsInfo = $amenityFeeDetailsQry->fetch()){
    $amenityConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as amenityTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='amenitytable' && `fees_id` = '".$amenityFeeDetailsInfo['amenity_fee_id']."' ");
    $amenityTotalScholarshipAmnt = '0';
    if($amenityConcessionQry->rowCount() > 0){
        $amenityTotalScholarshipAmnt = $amenityConcessionQry->fetch()['amenityTotalScholarshipAmnt'];
    }
    $amenityAmount = $amenityFeeDetailsInfo['amenity_amount'] - $amenityTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="amenityscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="amenityStudentid[]" value="<?php echo $studentid; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityFeesMasterid[]" value="<?php echo $amenityFeeDetailsInfo['fees_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityAmntid[]" value="<?php echo $amenityFeeDetailsInfo['amenity_fee_id']; ?>" readonly>
        <?php echo $amenityFeeDetailsInfo['amenity_particulars']; ?> 
    </td>
    <td> <?php echo $amenityFeeDetailsInfo['paidAmnt'] + $amenityTotalScholarshipAmnt; ?> </td>
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
    $transportFeeDetailsQry = $connect->query("SELECT tafd.balance_tobe_paid as due_amount, tafd.area_creation_id as fees_id, tafd.area_creation_particulars_id as particulars_id, ac.area_name, acp.particulars, (acp.due_amount - tafd.balance_tobe_paid) as paidAmnt 
    FROM `transport_admission_fees` taf 
    JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
    JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
    JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
    WHERE taf.id = '$get_fees_id_transport' && taf.academic_year = '$academicYear' ");

}else{
    $transportFeeDetailsQry = $connect->query("SELECT ac.area_id as fees_id, acp.particulars_id as particulars_id, ac.area_name, acp.particulars, acp.due_amount, '0' as paidAmnt  
    FROM student_creation sc
    JOIN area_creation ac ON sc.transportarearefid = ac.area_id
    JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
    WHERE sc.student_id = '$studentid' ");

}

while($transportFeeDetailsInfo = $transportFeeDetailsQry->fetch()){
    $transportConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as transportTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$studentid' && `fees_table_name`='transport' && `fees_id` = '".$transportFeeDetailsInfo['particulars_id']."' ");
    $transportTotalScholarshipAmnt = '0';
    if($transportConcessionQry->rowCount() > 0){
        $transportTotalScholarshipAmnt = $transportConcessionQry->fetch()['transportTotalScholarshipAmnt'];
    }
    $transportAmount = $transportFeeDetailsInfo['due_amount'] - $transportTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="transportscholarshipHeader" value="TransportMaster">
        <input type="hidden" class="form-control" name="areastudentid[]" value="<?php echo $studentid; ?>">
        <input type="hidden" class="form-control" name="areaCreationId[]" value="<?php echo $transportFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="particularId[]" value="<?php echo $transportFeeDetailsInfo['particulars_id']; ?>">
        <?php echo $transportFeeDetailsInfo['particulars']; ?> 
    </td>
    <td> <?php echo $transportFeeDetailsInfo['paidAmnt'] + $transportTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control transportfeesamnt" name="transportFeeAmnt[]" value="<?php echo $transportAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control transportfeesscholarship" name="transportFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control transportfeesbalance" name="transportFeeBalance[]" value="<?php echo $transportAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="transportFeeRemark[]" > </td>
</tr>
<?php } ?>

</tbody>
</table>

<hr>

<?php 
if($refertype =='New Student'){
    $title_text = 'Fee Details For'.' '.$refername;
}else if($refertype =='Old Student'){
    $title_text = 'Fee Details For'.' '.$refername;
    
}else if($refertype =='Staff'){
    $title_text = 'Staff Name:'.' '.$refername;
    
}else if($refertype =='Agent'){
    $title_text = 'Agent Name:'.' '.$refername;
    
}else{
    $title_text = 'Other Name:'.' '.$refername;

} ?>

<h4> <?php echo $title_text; ?> </h4>
</br>

<?php if($refertype =='New Student' || $refertype =='Old Student' ){ 
    if(isset($_POST['refStudentId'])){
        $refStudentId = $_POST['refStudentId'];
    }
    
    $refgetStudentDetailsQry = $connect->query("SELECT stdc.student_name, stdc.`admission_number`, stdc.studentrollno, stdc.medium, stdc.studentstype, stdc.standard, sc.standard as standard_name, stdc.section, stdc.year_id, stdc.school_id, stdc.facility, stdc.extra_curricular 
    FROM `student_creation` stdc 
    JOIN standard_creation sc ON stdc.standard = sc.standard_id 
    WHERE stdc.student_id = '$refStudentId'");
    $refstudentInfo = $refgetStudentDetailsQry ->fetch();

    $refacademicYear = $refstudentInfo['year_id'];
    $refmedium = $refstudentInfo['medium'];
    $refstudentType = $refstudentInfo['studentstype'];
    $refstandardId = $refstudentInfo['standard'];
    $refstudentExtraCurricular  = $refstudentInfo['extra_curricular'];
?>


<input type="hidden" name="refStudentId" value="<?php if(isset($refStudentId)) echo $refStudentId; ?>" >

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
$refcheckAdmFeesForGrp = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$refStudentId' order by id desc limit 1");
if($refcheckAdmFeesForGrp->rowCount() > 0){
    $refget_fees_id_grp = $refcheckAdmFeesForGrp->fetch()['id'];
    $refgrpFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as grp_amount, afd.fees_master_id as fees_id, afd.fees_id as grp_course_id, gcf.grp_particulars, (gcf.grp_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN group_course_fee gcf ON afd.fees_id = gcf.grp_course_id WHERE af.id = '$refget_fees_id_grp' && afd.fees_table_name = 'grptable' ");

}else{
    $refgrpFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, gcf.*, '0' as paidAmnt  FROM `fees_master` fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id where fm.academic_year = '$refacademicYear' && fm.medium = '$refmedium' && fm.student_type = '$refstudentType' && fm.standard = '$refstandardId' ");
    
}

while($refgrpfeeDetailsInfo = $refgrpFeeDetailsQry->fetch()){
    $refgrpConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as grpTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$refStudentId' && `fees_table_name`='grptable' && `fees_id` = '".$refgrpfeeDetailsInfo['grp_course_id']."' ");
    $refgrpTotalScholarshipAmnt = '0';
    if($refgrpConcessionQry->rowCount() > 0){
        $refgrpTotalScholarshipAmnt = $refgrpConcessionQry->fetch()['grpTotalScholarshipAmnt'];
    }
    $refgrpAmount = $refgrpfeeDetailsInfo['grp_amount'] - $refgrpTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="grpscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="grpStudentid[]" value="<?php echo $refStudentId; ?>">
        <input type="hidden" class="form-control" name="feesMasterid[]" value="<?php echo $refgrpfeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="grpid[]" value="<?php echo $refgrpfeeDetailsInfo['grp_course_id']; ?>">
        <?php echo $refgrpfeeDetailsInfo['grp_particulars']; ?> 
    </td>
    <td> <?php echo $refgrpfeeDetailsInfo['paidAmnt'] + $refgrpTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control grpfeesamnt" name="grpFeeAmnt[]" value="<?php echo $refgrpAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control grpfeesscholarship" name="grpFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control grpfeesbalance" name="grpFeeBalance[]" value="<?php echo $refgrpAmount; ?>" readonly> </td>
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
$refCheckAdmFeesForExtra = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$refStudentId' order by id desc limit 1");
if($refCheckAdmFeesForExtra->rowCount() > 0){
    $refget_fees_id_extra = $refCheckAdmFeesForExtra->fetch()['id'];
    $refextraFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as extra_amount, afd.fees_master_id as fees_id, afd.fees_id as extra_fee_id, ecaf.extra_particulars, (ecaf.extra_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id JOIN extra_curricular_activities_fee ecaf ON afd.fees_id = ecaf.extra_fee_id WHERE af.id = '$refget_fees_id_extra' && afd.fees_table_name = 'extratable' ");

}else{
    $refextraFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, ecaf.*, '0' as paidAmnt FROM `fees_master` fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id where fm.academic_year = '$refacademicYear' && fm.medium = '$refmedium' && fm.student_type = '$refstudentType' && fm.standard = '$refstandardId' && FIND_IN_SET(ecaf.extra_fee_id,'$refstudentExtraCurricular') ");
}

while($refextraFeeDetailsInfo = $refextraFeeDetailsQry->fetch()){
    $refextraConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as extraTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$refStudentId' && `fees_table_name`='extratable' && `fees_id` = '".$refextraFeeDetailsInfo['extra_fee_id']."' ");
    $refextraTotalScholarshipAmnt = '0';
    if($refextraConcessionQry->rowCount() > 0){
        $refextraTotalScholarshipAmnt = $refextraConcessionQry->fetch()['extraTotalScholarshipAmnt'];
    }
    $refextraAmount = $refextraFeeDetailsInfo['extra_amount'] - $refextraTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="extrascholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="extraStudentid[]" value="<?php echo $refStudentId; ?>">
        <input type="hidden" class="form-control" name="extraFeesMasterid[]" value="<?php echo $refextraFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="extraAmntid[]" value="<?php echo $refextraFeeDetailsInfo['extra_fee_id']; ?>">
        <?php echo $refextraFeeDetailsInfo['extra_particulars']; ?> 
    </td>
    <td> <?php echo $refextraFeeDetailsInfo['paidAmnt'] + $refextraTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control extrafeesamnt" name="extraAmnt[]" value="<?php echo $refextraAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control extrafeesscholar" name="extraAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control extrafeesbalance" name="extraAmntBalance[]" value="<?php echo $refextraAmount; ?>" readonly> </td>
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
$refCheckAdmFeesForAmenity = $connect->query("SELECT id FROM `admission_fees` WHERE admission_id = '$refStudentId' order by id desc limit 1");
if($refCheckAdmFeesForAmenity->rowCount() > 0){
    $refget_fees_id_amenity = $refCheckAdmFeesForAmenity->fetch()['id'];
    $refamenityFeeDetailsQry = $connect->query("SELECT afd.balance_tobe_paid as amenity_amount, afd.fees_master_id as fees_id, afd.fees_id as amenity_fee_id, af.amenity_particulars, (af.amenity_amount - afd.balance_tobe_paid) as paidAmnt FROM `admission_fees` afs JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id JOIN amenity_fee af ON afd.fees_id = af.amenity_fee_id WHERE afs.id = '$refget_fees_id_amenity' && afd.fees_table_name = 'amenitytable' ");

}else{
    $refamenityFeeDetailsQry = $connect->query("SELECT fm.fees_id, fm.academic_year, af.*, '0' as paidAmnt  FROM `fees_master` fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id where fm.academic_year = '$refacademicYear' && fm.medium = '$refmedium' && fm.student_type = '$refstudentType' && fm.standard = '$refstandardId' ");
}

while($refamenityFeeDetailsInfo = $refamenityFeeDetailsQry->fetch()){
    $refamenityConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as amenityTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$refStudentId' && `fees_table_name`='amenitytable' && `fees_id` = '".$refamenityFeeDetailsInfo['amenity_fee_id']."' ");
    $refamenityTotalScholarshipAmnt = '0';
    if($refamenityConcessionQry->rowCount() > 0){
        $refamenityTotalScholarshipAmnt = $refamenityConcessionQry->fetch()['amenityTotalScholarshipAmnt'];
    }
    $refamenityAmount = $refamenityFeeDetailsInfo['amenity_amount'] - $refamenityTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="amenityscholarshipHeader" value="FeesMaster">
        <input type="hidden" class="form-control" name="amenityStudentid[]" value="<?php echo $refStudentId; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityFeesMasterid[]" value="<?php echo $refamenityFeeDetailsInfo['fees_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="amenityAmntid[]" value="<?php echo $refamenityFeeDetailsInfo['amenity_fee_id']; ?>" readonly>
        <?php echo $refamenityFeeDetailsInfo['amenity_particulars']; ?> 
    </td>
    <td> <?php echo $refamenityFeeDetailsInfo['paidAmnt'] + $refamenityTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control amenityfees" name="amenityAmnt[]" value="<?php echo $refamenityAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control amenityfeesscholar" name="amenityAmntScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control amenityfeesbalance" name="amenityAmntBalance[]" value="<?php echo $refamenityAmount; ?>" readonly> </td>
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
$refCheckTransportFees = $connect->query("SELECT id FROM `transport_admission_fees` WHERE admission_id = '$refStudentId' && academic_year = '$refacademicYear' order by id desc limit 1");
if($refCheckTransportFees->rowCount() > 0){
    $refget_fees_id_transport = $refCheckTransportFees->fetch()['id'];
    $reftransportFeeDetailsQry = $connect->query("SELECT tafd.balance_tobe_paid as due_amount, tafd.area_creation_id as fees_id, tafd.area_creation_particulars_id as particulars_id, ac.area_name, acp.particulars, (acp.due_amount - tafd.balance_tobe_paid) as paidAmnt 
    FROM `transport_admission_fees` taf 
    JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
    JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
    JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
    WHERE taf.id = '$refget_fees_id_transport' && taf.academic_year = '$refacademicYear' ");

}else{
    $reftransportFeeDetailsQry = $connect->query("SELECT ac.area_id as fees_id, acp.particulars_id as particulars_id, ac.area_name, acp.particulars, acp.due_amount, '0' as paidAmnt  
    FROM student_creation sc
    JOIN area_creation ac ON sc.transportarearefid = ac.area_id
    JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id
    WHERE sc.student_id = '$refStudentId' ");

}

while($reftransportFeeDetailsInfo = $reftransportFeeDetailsQry->fetch()){
    $reftransportConcessionQry = $connect->query("SELECT SUM(scholarship_amount) as transportTotalScholarshipAmnt FROM `fees_concession` WHERE `student_id`='$refStudentId' && `fees_table_name`='transport' && `fees_id` = '".$reftransportFeeDetailsInfo['particulars_id']."' ");
    $reftransportTotalScholarshipAmnt = '0';
    if($reftransportConcessionQry->rowCount() > 0){
        $reftransportTotalScholarshipAmnt = $reftransportConcessionQry->fetch()['transportTotalScholarshipAmnt'];
    }
    $reftransportAmount = $reftransportFeeDetailsInfo['due_amount'] - $reftransportTotalScholarshipAmnt;
?>
<tr>
    <td>
        <input type="hidden" class="form-control" name="transportscholarshipHeader" value="TransportMaster">
        <input type="hidden" class="form-control" name="areastudentid[]" value="<?php echo $refStudentId; ?>">
        <input type="hidden" class="form-control" name="areaCreationId[]" value="<?php echo $reftransportFeeDetailsInfo['fees_id']; ?>">
        <input type="hidden" class="form-control" name="particularId[]" value="<?php echo $reftransportFeeDetailsInfo['particulars_id']; ?>">
        <?php echo $reftransportFeeDetailsInfo['particulars']; ?> 
    </td>
    <td> <?php echo $reftransportFeeDetailsInfo['paidAmnt'] + $reftransportTotalScholarshipAmnt; ?> </td>
    <td><input type="number" class="form-control transportfeesamnt" name="transportFeeAmnt[]" value="<?php echo $reftransportAmount; ?>" readonly> </td>
    <td><input type="number" class="form-control transportfeesscholarship" name="transportFeeScholarship[]" value="0"> </td>
    <td><input type="number" class="form-control transportfeesbalance" name="transportFeeBalance[]" value="<?php echo $reftransportAmount; ?>" readonly> </td>
    <td><input type="text" class="form-control" name="transportFeeRemark[]" > </td>
</tr>
<?php } ?>

</tbody>
</table>

<?php }else{ ?>

    <div class="col-md-12 ">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" name="other_amount" id="other_amount">
                </div>
            </div>
    
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Given date</label>
                    <input type="date" class="form-control" name="given_date" id="given_date">
                </div>
            </div>
        </div>
    </div>

<?php } ?>

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