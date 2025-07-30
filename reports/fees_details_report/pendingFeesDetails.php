<?php
include "../../ajaxconfig.php";
@session_start();
if (isset($_SESSION['school_id'])) {
    $school_id = $_SESSION['school_id'];
}

if (isset($_POST['academicyear'])) {
    $academicyear = $_POST['academicyear'];
    $splityear = explode('-', $academicyear);
    $lastyear = intval($splityear[0] - 1) . '-' . intval($splityear[1] - 1);
}
if (isset($_POST['stdMedium'])) {
    $stdMedium = $_POST['stdMedium'];
}
if (isset($_POST['stdStandard'])) {
    $stdStandard = $_POST['stdStandard'];
}
if (isset($_POST['stdSection'])) {
    $stdSection = $_POST['stdSection'];
}
if (isset($_POST['feeType'])) {
    $feeType = $_POST['feeType']; //1=group, 2=extra, 5=book, 3=Lastyear, 4=Transportation
}


if ($feeType == '1') { //group
?>

    <table class="table table-bordered" id="show_student_pending_list">
        <thead>
            <tr>
                <th rowspan="2">S.No</th>
                <th rowspan="2">Admission Number</th>
                <th rowspan="2">Student Name</th>
                <th rowspan="2">Standard & Section</th>
                <th rowspan="2">Mobile No</th>
                <th rowspan="2">Total Fee</th>
                <th rowspan="2">Paid Fee</th>
                <th rowspan="2">Concession</th>
                <th colspan="3">Pending Fees</th>
                <th rowspan="2">Total Amount</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Term I</th>
                <th>Term II</th>
                <th>Term III</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no ,sc.leaving_term 
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sh.standard = std.standard_id
WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.leaving_term !='1' && sc.leaving_term !='5'  && sc.school_id = '$school_id' ORDER BY sc.student_name ASC");
            $i = 1;
            $grnd_total_fee = 0;
            $grnd_paid_fee = 0;
            $grnd_concession = 0;
            $grnd_pending1 = 0;
            $grnd_pending2 = 0;
            $grnd_pending3 = 0;
            $grnd_total_amount = 0;
            while ($studentList = $getStudentListQry->fetchObject()) {
                $studentsType = $studentList->studentstype;
            if ($studentsType == "1" || $studentsType == "2") {
                $student_type_cndtn = "(fm.student_type = '$studentsType' OR fm.student_type = '4')";
            } else {
                $student_type_cndtn = "(fm.student_type = '$studentsType')";
            }
                $total_fee = 0;
                $getTotalFeesQry = $connect->query("SELECT SUM(gcf.grp_amount) AS totalFee  FROM fees_master fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id WHERE fm.academic_year = '$academicyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$stdStandard' && fm.school_id = '$school_id'");
                if ($getTotalFeesQry->rowCount() > 0) {
                    $totalFeeInfo = $getTotalFeesQry->fetch();
                    $total_fee = $totalFeeInfo['totalFee'];
                }

                $getPaidFeesQry = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS paidFee, COALESCE(SUM(afd.scholarship),0) + COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='grptable' AND fees_master_id = afd.fees_master_id),0) AS concession FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_table_name = 'grptable' AND af.admission_id = '$studentList->student_id' AND af.academic_year = '$academicyear' ");
                if ($getPaidFeesQry->rowCount() > 0) {
                    $paidFeeInfo = $getPaidFeesQry->fetch();
                    $paid_fee = $paidFeeInfo['paidFee'];
                    $concession = $paidFeeInfo['concession'];
                }


                $getTermPendingQry = $connect->query("SELECT COALESCE( ( gcf.grp_amount - (SELECT (SUM(afd.fee_received) + SUM(afd.scholarship)) FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_id = gcf.grp_course_id AND afd.fees_table_name = 'grptable' AND af.admission_id = '$studentList->student_id') ), 0) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='grptable' AND fees_id = gcf.grp_course_id),0) AS termPending, COALESCE(gcf.grp_amount,0) AS schoolPending  FROM fees_master fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id WHERE fm.academic_year = '$academicyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$stdStandard' && fm.school_id = '$school_id' ORDER BY gcf.grp_date ASC");
                $term_pending = array();
                $school_pending = array();
                $total_amount = 0;
                while ($termPendingInfo = $getTermPendingQry->fetch()) {
                    $term_pending[] = $termPendingInfo['termPending'];
                    $school_pending[] = $termPendingInfo['schoolPending'];
                }
                if ($studentList->leaving_term != 0) {
                    // Only show pending fees for the term student left
                    if ($studentList->leaving_term == 2) {
                        $pending1 = ($term_pending) ? (($term_pending[0] == '0' && $paid_fee == '0') ? $school_pending[0] : $term_pending[0]) : 0;
                        $pending2 = 0;
                        $pending3 = 0;
                    } elseif ($studentList->leaving_term == 3) {
                        $pending1 = ($term_pending) ? (($term_pending[0] == '0' && $paid_fee == '0') ? $school_pending[0] : $term_pending[0]) : 0;
                        $pending2 = ($term_pending) ? (($term_pending[1] == '0' && $paid_fee == '0') ? $school_pending[1] : $term_pending[1]) : 0;
                        $pending3 = 0;
                    } else {
                        $pending1 = 0;
                        $pending2 = 0;
                        $pending3 = ($term_pending) ? (($term_pending[2] == '0' && $paid_fee == '0') ? $school_pending[2] : $term_pending[2]) : 0;
                    }
                } else {
                    // Student has not left the school, show all pending fees
                    $pending1 = ($term_pending) ? (($term_pending[0] == '0' && $paid_fee == '0') ? $school_pending[0] : $term_pending[0]) : 0;
                    $pending2 = ($term_pending) ? (($term_pending[1] == '0' && $paid_fee == '0') ? $school_pending[1] : $term_pending[1]) : 0;
                    $pending3 = ($term_pending) ? (($term_pending[2] == '0' && $paid_fee == '0') ? $school_pending[2] : $term_pending[2]) : 0;
                }
                $total_amount += $pending1 + $pending2 + $pending3;
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $total_fee; ?></td>
                    <td><?php echo $paid_fee; ?></td>
                    <td><?php echo $concession; ?></td>
                    <td><?php echo $pending1  ?></td>
                    <td><?php echo $pending2  ?></td>
                    <td><?php echo $pending3 ?></td>
                    <td><?php echo $pending1 + $pending2 + $pending3; ?></td>
                    <td></td>
                </tr>
            <?php
                $grnd_total_fee += $total_fee;
                $grnd_paid_fee += $paid_fee;
                $grnd_concession += $concession;
                $grnd_pending1 += ($term_pending) ? $pending1 : '0';
                $grnd_pending2 += ($term_pending) ? $pending2 : '0';
                $grnd_pending3 += ($term_pending) ? $pending3 : '0';
                $grnd_total_amount += $total_amount;  
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td><?php echo $grnd_paid_fee; ?></td>
                <td><?php echo $grnd_concession; ?></td>
                <td><?php echo $grnd_pending1; ?></td>
                <td><?php echo $grnd_pending2; ?></td>
                <td><?php echo $grnd_pending3; ?></td>
                <td><?php echo $grnd_total_amount; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>

<?php } else if ($feeType == '2') { //Extra 
?>
    <table class="table table-bordered" id="show_student_pending_list">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Total Fee</th>
                <th>Paid Fee</th>
                <th>Concession</th>
                <th>Pending Fees</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no ,sc.leaving_term
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sh.standard = std.standard_id
WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.leaving_term !='1' && sc.leaving_term !='5' && sc.school_id = '$school_id' && sh.extra_curricular !='' ORDER BY sc.student_name ASC");
            $i = 1;
            $grnd_total_fee = 0;
            $grnd_paid_fee = 0;
            $grnd_concession = 0;
            $grnd_book_pending = 0;
            $grnd_total_amount = 0;
            while ($studentList = $getStudentListQry->fetchObject()) {
                $studentsType = $studentList->studentstype;
                if ($studentsType == "1" || $studentsType == "2") {
                    $student_type_cndtn = "(fm.student_type = '$studentsType' OR fm.student_type = '4')";
                } else {
                    $student_type_cndtn = "(fm.student_type = '$studentsType')";
                }
                $extra_id = ($studentList->extra_curricular) ? $studentList->extra_curricular : '0';
                $leavingTerm = $studentList->leaving_term;
                $total_fee = 0;
     
                $getTotalFeesQry = $connect->query("SELECT COALESCE(SUM(ecaf.extra_amount), 0) AS totalFee FROM extra_curricular_activities_fee ecaf WHERE ecaf.extra_fee_id IN ($extra_id) ");
                if ($getTotalFeesQry->rowCount() > 0) {
                    $totalFeeInfo = $getTotalFeesQry->fetch();
                    $total_fee = $totalFeeInfo['totalFee'];
                }

                $getPaidFeesQry = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS paidFee, COALESCE(SUM(afd.scholarship),0) + COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='extratable' AND fees_master_id = afd.fees_master_id),0) AS concession FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_table_name = 'extratable' AND af.admission_id = '$studentList->student_id' AND af.academic_year = '$academicyear' ");
                if ($getPaidFeesQry->rowCount() > 0) {
                    $paidFeeInfo = $getPaidFeesQry->fetch();
                    $paid_fee = $paidFeeInfo['paidFee'];
                    $concession = $paidFeeInfo['concession'];
                }

                $getBookPendingQry = $connect->query("SELECT COALESCE(( ecaf.extra_amount - (SELECT (COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0)) FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_id = ecaf.extra_fee_id AND afd.fees_table_name = 'extratable' AND af.admission_id = '$studentList->student_id') ), 0) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='extratable' AND fees_master_id = fm.fees_id),0) AS bookPending, COALESCE(SUM(ecaf.extra_amount),0) AS extraPending FROM fees_master fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id WHERE FIND_IN_SET('$extra_id', ecaf.extra_fee_id) && fm.academic_year = '$academicyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$stdStandard' && fm.school_id = '$school_id' ORDER BY ecaf.extra_fee_id ASC");
                $bookpending = $getBookPendingQry->fetch();
                if ($leavingTerm == 2 || $leavingTerm == 3) {
                    $book_pending = 0;
                    $extra_pending = 0;
                } else {
                    $book_pending = $bookpending['bookPending'];
                    $extra_pending = $bookpending['extraPending'];
                }

            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $total_fee; ?></td>
                    <td><?php echo $paid_fee; ?></td>
                    <td><?php echo $concession; ?></td>
                    <td><?php echo $pending1 = ($book_pending == '0' && $paid_fee == '0') ? $extra_pending : $book_pending; ?></td>
                    <td><?php echo $pending1; ?></td>
                    <td></td>
                </tr>
            <?php
                $grnd_total_fee += $total_fee;
                $grnd_paid_fee += $paid_fee;
                $grnd_concession += $concession;
                $grnd_book_pending += $book_pending;
                $grnd_total_amount += $pending1;
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td><?php echo $grnd_paid_fee; ?></td>
                <td><?php echo $grnd_concession; ?></td>
                <td><?php echo $grnd_book_pending; ?></td>
                <td><?php echo $grnd_total_amount; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php } else if ($feeType == '5') { //Amenity 
?>
    <table class="table table-bordered" id="show_student_pending_list">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Total Fee</th>
                <th>Paid Fee</th>
                <th>Concession</th>
                <th>Pending Fees</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no 
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sh.standard = std.standard_id
WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.leaving_term !='1' && sc.leaving_term !='5'  && sc.school_id = '$school_id' ORDER BY sc.student_name ASC");
            $i = 1;
            $grnd_total_fee = 0;
            $grnd_paid_fee = 0;
            $grnd_concession = 0;
            $grnd_book_pending = 0;
            $grnd_total_amount = 0;
            while ($studentList = $getStudentListQry->fetchObject()) {
                $studentsType = $studentList->studentstype;
                if ($studentsType == "1" || $studentsType == "2") {
                    $student_type_cndtn = "(fm.student_type = '$studentsType' OR fm.student_type = '4')";
                } else {
                    $student_type_cndtn = "(fm.student_type = '$studentsType')";
                }
                $total_fee = 0;
                $getTotalFeesQry = $connect->query("SELECT SUM(af.amenity_amount) AS totalFee  FROM fees_master fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id WHERE fm.academic_year = '$academicyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$stdStandard' && fm.school_id = '$school_id'");
                if ($getTotalFeesQry->rowCount() > 0) {
                    $totalFeeInfo = $getTotalFeesQry->fetch();
                    $total_fee = $totalFeeInfo['totalFee'];
                }

                $getPaidFeesQry = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS paidFee, COALESCE(SUM(afd.scholarship),0) + COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='amenitytable' AND fees_master_id = afd.fees_master_id),0) AS concession FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_table_name = 'amenitytable' AND af.admission_id = '$studentList->student_id' AND af.academic_year = '$academicyear' ");
                if ($getPaidFeesQry->rowCount() > 0) {
                    $paidFeeInfo = $getPaidFeesQry->fetch();
                    $paid_fee = $paidFeeInfo['paidFee'];
                    $concession = $paidFeeInfo['concession'];
                }

                $getBookPendingQry = $connect->query("SELECT COALESCE(( aff.amenity_amount - (SELECT (COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0)) FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_id = aff.amenity_fee_id AND afd.fees_table_name = 'amenitytable' AND af.admission_id = '$studentList->student_id') ), 0) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='amenitytable' AND fees_master_id = fm.fees_id),0) AS bookPending, COALESCE(SUM(aff.amenity_amount),0) AS amenityPending FROM fees_master fm JOIN amenity_fee aff ON fm.fees_id = aff.fee_master_id WHERE fm.academic_year = '$academicyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$stdStandard' && fm.school_id = '$school_id' ORDER BY aff.amenity_fee_id ASC");
                $bookpending = $getBookPendingQry->fetch();
                $book_pending = $bookpending['bookPending'];
                $amenity_pending = $bookpending['amenityPending'];

            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $total_fee; ?></td>
                    <td><?php echo $paid_fee; ?></td>
                    <td><?php echo $concession; ?></td>
                    <td><?php echo $pending1 = ($book_pending == '0' && $paid_fee == '0') ? $amenity_pending : $book_pending; ?></td>
                    <td><?php echo $pending1; ?></td>
                    <td></td>
                </tr>
            <?php
                $grnd_total_fee += $total_fee;
                $grnd_paid_fee += $paid_fee;
                $grnd_concession += $concession;
                $grnd_book_pending += $book_pending;
                $grnd_total_amount += $pending1;
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td><?php echo $grnd_paid_fee; ?></td>
                <td><?php echo $grnd_concession; ?></td>
                <td><?php echo $grnd_book_pending; ?></td>
                <td><?php echo $grnd_total_amount; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php } else if ($feeType == '3') { //Last year 
?>
    <table class="table table-bordered" id="show_student_pending_list">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Total Fee</th>
                <th>Paid Fee</th>
                <th>Concession</th>
                <th>Pending Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no ,sc.standard as std
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sc.standard = std.standard_id
WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.leaving_term !='1' && sc.leaving_term !='5'  && sc.school_id = '$school_id' ORDER BY sc.student_name ASC ");
            $i = 1;
            $grnd_total_fee = 0;
            $grnd_paid_fee = 0;
            $grnd_concession = 0;
            $grnd_pending = 0;
            while ($studentList = $getStudentListQry->fetchObject()) {
                $standard = $studentList->std - 1;
                $studentsType = $studentList->studentstype;
                if ($studentsType == "1" || $studentsType == "2") {
                    $student_type_cndtn = "(fm.student_type = '$studentsType' OR fm.student_type = '4')";
                } else {
                    $student_type_cndtn = "(fm.student_type = '$studentsType')";
                }
                $getLastYearPending = $connect->query("SELECT COALESCE(SUM(pending),0) as total_balance_tobe_paid
    FROM (
        (SELECT ( ( (SELECT SUM(gcf.grp_amount) FROM group_course_fee gcf WHERE gcf.fee_master_id = afd.fees_master_id ) - (SUM(afd.fee_received) + SUM(afd.scholarship) ) ) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='grptable' AND fees_master_id = afd.fees_master_id),0) ) AS pending 
        FROM admission_fees af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
        WHERE af.admission_id = '$studentList->student_id' 
        AND af.academic_year = '$lastyear' 
        AND afd.fees_table_name = 'grptable' 
        AND afd.fee_received > 0
        ORDER BY af.id ASC)
    UNION 
        (SELECT ( ( (SELECT SUM(ecaf.extra_amount) FROM  extra_curricular_activities_fee ecaf WHERE ecaf.fee_master_id = afd.fees_master_id ) - (SUM(afd.fee_received) + SUM(afd.scholarship) ) ) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='extratable' AND fees_master_id = afd.fees_master_id ),0) ) AS pending
        FROM admission_fees af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
        WHERE af.admission_id = '$studentList->student_id' 
        AND af.academic_year = '$lastyear' 
        AND afd.fees_table_name = 'extratable' 
        AND afd.fee_received > 0
        ORDER BY af.id ASC)
    UNION 
        (SELECT ( ( (SELECT SUM(af.amenity_amount) FROM amenity_fee af WHERE af.fee_master_id = afd.fees_master_id ) - (SUM(afd.fee_received) + SUM(afd.scholarship) ) ) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='amenitytable' AND fees_master_id = afd.fees_master_id),0) ) AS pending
        FROM admission_fees afs 
        JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id 
        WHERE afs.admission_id = '$studentList->student_id' 
        AND afs.academic_year = '$lastyear' 
        AND afd.fees_table_name = 'amenitytable' 
        ORDER BY afs.id ASC)
    ) as total_balance ");
                $lastyearpending = $getLastYearPending->fetchObject();
                $lsPending = $lastyearpending->total_balance_tobe_paid;

                $total_fee = 0;
         
                $getTotalFeesQry = $connect->query("SELECT COALESCE(SUM(gcf.grp_amount),0) AS totalFee  FROM fees_master fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id WHERE fm.academic_year = '$lastyear' && fm.medium = '$stdMedium' && $student_type_cndtn && fm.standard = '$standard' && fm.school_id = '$school_id' ");
                if ($getTotalFeesQry->rowCount() > 0) {
                    $totalFeeInfo = $getTotalFeesQry->fetch();
                    $total_fee = $totalFeeInfo['totalFee'];
                }

                $getPaidFeesQry = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS paidFee, COALESCE(SUM(afd.scholarship),0) + COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND academic_year = '$lastyear'),0) AS concession FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_table_name = 'grptable' AND af.admission_id = '$studentList->student_id' AND af.academic_year = '$lastyear' ");
                if ($getPaidFeesQry->rowCount() > 0) {
                    $paidFeeInfo = $getPaidFeesQry->fetch();
                    $paid_fee = $paidFeeInfo['paidFee'];
                    $concession = $paidFeeInfo['concession'];
                }
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $total_fee; ?></td>
                    <td><?php echo $paid_fee; ?></td>
                    <td><?php echo $concession; ?></td>
                    <td><?php echo $lsPending; ?></td>
                    <td></td>
                </tr>
            <?php
                $grnd_total_fee += $total_fee;
                $grnd_paid_fee += $paid_fee;
                $grnd_concession += $concession;
                $grnd_pending += $lsPending;
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td><?php echo $grnd_paid_fee; ?></td>
                <td><?php echo $grnd_concession; ?></td>
                <td><?php echo $grnd_pending; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>

<?php } else if ($feeType == '4') { //transport 
?>

    <table class="table table-bordered" id="show_student_pending_list">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Total Fee</th>
                <th>Paid Fee</th>
                <th>Concession</th>
                <th>Pending Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no,sc.leaving_term
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sh.standard = std.standard_id
WHERE sh.academic_year  = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.leaving_term !='1' && sc.leaving_term !='5'  && sc.school_id = '$school_id' && sh.transportarearefid !='' ORDER BY sc.student_name ASC ");
            $i = 1;
            $grnd_total_fee = 0;
            $grnd_paid_fee = 0;
            $grnd_concession = 0;
            $grnd_pending = 0;
            while ($studentList = $getStudentListQry->fetchObject()) {

                $transport_id = ($studentList->transportarearefid) ? $studentList->transportarearefid : '0';
                $leavingTerm = $studentList->leaving_term;
                $total_fee = 0;
                $getTotalFeesQry = $connect->query("SELECT SUM(acp.due_amount) AS totalFee FROM area_creation ac JOIN area_creation_particulars acp ON ac.area_id = acp.area_creation_id WHERE ac.area_id = '$transport_id' ");
                if ($getTotalFeesQry->rowCount() > 0) {
                    $totalFeeInfo = $getTotalFeesQry->fetch();
                    $total_fee = $totalFeeInfo['totalFee'];
                }
                $getPaidFeesQry = $connect->query("SELECT COALESCE( (SUM(tafd.fee_received) + SUM(tafd.scholarship)),0) AS paidFee, COALESCE(SUM(tafd.scholarship),0) + COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='transport'),0) AS concession FROM transport_admission_fees_details tafd JOIN  transport_admission_fees taf ON tafd.admission_fees_ref_id = taf.id WHERE tafd.area_creation_id = '$transport_id' && taf.academic_year = '$academicyear' && taf.admission_id ='$studentList->student_id' ");
                if ($getPaidFeesQry->rowCount() > 0) {
                    $paidFeeInfo = $getPaidFeesQry->fetch();
                    $paid_fee = $paidFeeInfo['paidFee'];
                    $concession = $paidFeeInfo['concession'];
                }

                $getTransportPendingQry = $connect->query("SELECT 
    COALESCE(
        SUM(acp.due_amount) - (
            COALESCE(
                (
                    SELECT 
                        (SUM(tafd.fee_received) + SUM(tafd.scholarship))
                    FROM 
                        transport_admission_fees_details tafd
                    JOIN 
                        transport_admission_fees taf ON tafd.admission_fees_ref_id = taf.id
                    WHERE 
                        tafd.area_creation_particulars_id = acp.particulars_id 
                        AND taf.academic_year = '$academicyear'
                        AND taf.admission_id = '$studentList->student_id'
                ),
                0
            )
        ),
        0
    ) - COALESCE(
        (
            SELECT 
                SUM(scholarship_amount)
            FROM 
                fees_concession
            WHERE 
                student_id = '$studentList->student_id' 
                AND fees_table_name = 'transport' 
                AND fees_id = acp.particulars_id
        ),
        0
    ) AS transport_pending,
    COALESCE(SUM(acp.due_amount), 0) AS transportTotal
FROM 
    area_creation ac
JOIN 
    area_creation_particulars acp ON ac.area_id = acp.area_creation_id
WHERE 
    ac.area_id = '$transport_id'
GROUP BY 
    acp.particulars_id
ORDER BY 
    acp.particulars_id ASC;
 ");
                $transportPendingInfo = $getTransportPendingQry->fetch();

                $transport_pending = $transportPendingInfo['transport_pending'];
             //   echo $transport_pending,'-';
   
                $transportTotal = $transportPendingInfo['transportTotal'];
            ?>
      
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $total_fee; ?></td>
                    <td><?php echo $paid_fee; ?></td>
                    <td><?php echo $concession; ?></td>
                    <td>
                        <?php
                        if ($transport_pending == '0' && $paid_fee == '0' && ($leavingTerm == '2' || $leavingTerm == '3')) {
                            $transport_totals = 0;
                        } else {
                            $transport_totals = (is_null($transport_pending) && $paid_fee == '0') ? $transportTotal : $transport_pending;

                        }
                        echo $transport_totals;
                        ?>
                    </td>
                    <td></td>
                </tr>
            <?php
                $grnd_total_fee += $total_fee;
                $grnd_paid_fee += $paid_fee;
                $grnd_concession += $concession;
                $grnd_pending += $transport_totals;
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td><?php echo $grnd_paid_fee; ?></td>
                <td><?php echo $grnd_concession; ?></td>
                <td><?php echo $grnd_pending; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>

<?php } ?>

<script>
    $(document).ready(function() {
        $('#show_student_pending_list').DataTable({
            order: [
                [0, "asc"]
            ],
            // columnDefs: [
            //     { type: 'natural', targets: 0 }
            // ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            paging: false, // Disable paging
        });
    });
</script>