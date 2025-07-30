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
?>

<table class="table table-bordered" id="show_student_allPending_list">
    <thead>
        <tr>
            <th rowspan="2">S.No</th>
            <th rowspan="2">Admission Number</th>
            <th rowspan="2">Student Name</th>
            <th rowspan="2">Standard & Section</th>
            <th rowspan="2">Mobile No</th>
            <th rowspan="2">Last Year Pending</th>
            <th colspan="3">Pending Fees</th>
            <th rowspan="2">Book</th>
            <th rowspan="2">Extra</th>
            <th colspan="3">Transport Fees</th>
            <th rowspan="2">Action</th>
        </tr>
        <tr>
            <th>Term I</th>
            <th>Term II</th>
            <th>Term III</th>
            <th>Term I</th>
            <th>Term II</th>
            <th>Term III</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $getStudentListQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, std.standard, sh.section, sh.extra_curricular, sh.transportarearefid, sh.studentstype, sc.sms_sent_no,sc.leaving_term
FROM `student_creation` sc 
LEFT JOIN student_history sh ON sc.student_id = sh.student_id
JOIN standard_creation std ON sh.standard = std.standard_id
WHERE sh.academic_year  = '$academicyear' && sc.medium = '$stdMedium' && sh.standard = '$stdStandard' && sc.leaving_term !='1' && sc.leaving_term !='5' &&  sh.section = '$stdSection' && sc.school_id = '$school_id' ORDER BY sc.student_name ASC");
        $i = 1;
        $ls_pending = 0;
        $grnd_term1_pending = 0;
        $grnd_term2_pending = 0;
        $grnd_term3_pending = 0;
        $grnd_book_pending = 0;
        $grnd_extra_pending = 0;
        $grnd_trans1_pending = 0;
        $grnd_trans2_pending = 0;
        $grnd_trans3_pending = 0;

        while ($studentList = $getStudentListQry->fetchObject()) {
            $studentsType = $studentList->studentstype;
            if ($studentsType == "1" || $studentsType == "2") {
                $student_type_cndtn = "(fm.student_type = '$studentsType' OR fm.student_type = '4')";
            } else {
                $student_type_cndtn = "(fm.student_type = '$studentsType')";
            }
            $leavingTerm = $studentList->leaving_term;
    
                 $getLastYearPending = $connect->query("SELECT 
    SUM(pending) AS total_balance_tobe_paid
FROM (
    -- First subquery for 'grptable'
    (SELECT 
        (
            (
                SELECT SUM(gcf.grp_amount)
                FROM group_course_fee gcf
                WHERE gcf.fee_master_id = afd.fees_master_id
            ) - (SUM(afd.fee_received) + SUM(afd.scholarship))
        ) - COALESCE(
            (
                SELECT SUM(scholarship_amount)
                FROM fees_concession
                WHERE student_id = '$studentList->student_id'
                AND fees_table_name = 'grptable'
                AND fees_master_id = afd.fees_master_id
            ), 0
        ) AS pending
    FROM admission_fees af
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id
    WHERE af.admission_id = '$studentList->student_id'
    AND af.academic_year = '$lastyear'
    AND afd.fees_table_name = 'grptable')

    UNION 

    -- Second subquery for 'extratable'
    (SELECT 
        (
            (
                SELECT SUM(ecaf.extra_amount)
                FROM extra_curricular_activities_fee ecaf
                JOIN student_history sh ON sh.student_id = '$studentList->student_id'
                WHERE FIND_IN_SET(ecaf.extra_fee_id, sh.extra_curricular)
                AND sh.academic_year = '$lastyear'
            ) - (COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0))
        ) - COALESCE(
            (
                SELECT SUM(scholarship_amount)
                FROM fees_concession
                WHERE student_id = '$studentList->student_id'
                AND fees_table_name = 'extratable'
                AND fees_master_id = afd.fees_master_id
            ), 0
        ) AS pending
    FROM admission_fees af
    JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id
    WHERE af.admission_id = '$studentList->student_id'
    AND af.academic_year = '$lastyear'
    AND afd.fees_table_name = 'extratable')

    UNION 

    -- Third subquery for 'amenitytable'
    (SELECT 
        (
            (
                SELECT SUM(af.amenity_amount)
                FROM amenity_fee af
                WHERE af.fee_master_id = afd.fees_master_id
            ) - (SUM(afd.fee_received) + SUM(afd.scholarship))
        ) - COALESCE(
            (
                SELECT SUM(scholarship_amount)
                FROM fees_concession
                WHERE student_id = '$studentList->student_id'
                AND fees_table_name = 'amenitytable'
                AND fees_master_id = afd.fees_master_id
            ), 0
        ) AS pending
    FROM admission_fees afs
    JOIN admission_fees_details afd ON afs.id = afd.admission_fees_ref_id
    WHERE afs.admission_id = '$studentList->student_id'
    AND afs.academic_year = '$lastyear'
    AND afd.fees_table_name = 'amenitytable')

    UNION 

    -- Fourth subquery for 'transport'
    (SELECT 
        COALESCE(
            (
                (
                    SELECT SUM(acp.due_amount)
                    FROM area_creation_particulars acp
                    JOIN student_history sh ON sh.student_id = '$studentList->student_id'
                    WHERE acp.area_creation_id = sh.transportarearefid
                    AND sh.academic_year = '$lastyear'
                ) - (COALESCE(SUM(tafd.fee_received), 0) + COALESCE(SUM(tafd.scholarship), 0))
            ) - COALESCE(
                (
                    SELECT SUM(scholarship_amount)
                    FROM fees_concession
                    WHERE student_id = '$studentList->student_id'
                    AND fees_table_name = 'transport'
                ), 0
            ), 0
        ) AS pending
    FROM transport_admission_fees af
    JOIN transport_admission_fees_details tafd ON af.id = tafd.admission_fees_ref_id
    WHERE af.admission_id = '$studentList->student_id'
    AND af.academic_year = '$lastyear')
) AS total_balance;
");
            $lastyearpending = $getLastYearPending->fetchObject();
            $lastPending = $lastyearpending->total_balance_tobe_paid;
            $lastyr_grpfeeQry = $connect->query("SELECT (SUM(lyfd.fee_received)  + SUM(lyfd.scholarship)) as paid_grp_amount 
            FROM `last_year_fees` lyf 
            JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
            JOIN group_course_fee gcf ON lyfd.fees_id = gcf.grp_course_id 
            WHERE lyf.admission_id = '$studentList->student_id' AND lyf.academic_year = '$academicyear' ");
            if ($lastyr_grpfeeQry->rowCount() > 0) {
                $lastyr_grp_amount = $lastyr_grpfeeQry->fetch()['paid_grp_amount'];
            } else {
                $lastyr_grp_amount = '0';
            }
            $lsPending =  $lastPending  - $lastyr_grp_amount;

            $getTermPendingQry = $connect->query("SELECT 
    gcf.grp_particulars, 
    ABS(
        ABS(
            gcf.grp_amount - (
                SELECT 
                    COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0) 
                FROM 
                    admission_fees_details afd 
                JOIN 
                    admission_fees af 
                ON 
                    afd.admission_fees_ref_id = af.id 
                WHERE 
                    afd.fees_id = gcf.grp_course_id 
                    AND afd.fees_table_name = 'grptable' 
                    AND af.admission_id = '$studentList->student_id'
            )
        ) - 
        COALESCE(
            (SELECT SUM(scholarship_amount) 
             FROM fees_concession 
             WHERE student_id = '$studentList->student_id' 
             AND fees_table_name = 'grptable' 
             AND fees_id = gcf.grp_course_id), 
            0
        )
    ) AS termPending, 
    gcf.grp_amount AS termAmnt  
FROM 
    fees_master fm 
JOIN 
    group_course_fee gcf 
ON 
    fm.fees_id = gcf.fee_master_id 
WHERE 
    fm.academic_year = '$academicyear' 
    AND fm.medium = '$stdMedium' 
    AND $student_type_cndtn 
    AND fm.standard = '$stdStandard' 
    AND fm.school_id = '$school_id' 
ORDER BY 
    gcf.grp_date ASC;
");
            $term_pending = array();
            while ($termPendingInfo = $getTermPendingQry->fetch()) {
                $termPending = $termPendingInfo['termPending'];
                $termAmnt = $termPendingInfo['termAmnt'];

                // Check if termPending is null, then consider the full term amount
                $currentPending = is_null($termPending) ? $termAmnt : $termPending;

                // Logic to handle pending amounts based on leaving term
                if ($leavingTerm == 2) {
                    // If the student leaves after 1st term, only show 1st term pending amount
                    $term_pending[] = ($termPendingInfo['grp_particulars'] == 'I Term Fee') ? $currentPending : 0;
                } elseif ($leavingTerm == 3) {
                    // If the student leaves after 2nd term, show pending for the 1st and 2nd terms
                    $term_pending[] = ($termPendingInfo['grp_particulars'] <= 'II Term Fee') ? $currentPending : 0;
                } else {
                    // If student stays beyond the 2nd term, show all pending terms
                    $term_pending[] = $currentPending;
                }
            }

            $getBookPendingQry = $connect->query("SELECT 
    (af.amenity_amount - (
        SELECT 
            COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0)
        FROM 
            admission_fees_details afd 
        JOIN 
            admission_fees af2 
        ON 
            afd.admission_fees_ref_id = af2.id 
        WHERE 
            afd.fees_id = af.amenity_fee_id 
            AND afd.fees_table_name = 'amenitytable' 
            AND af2.admission_id = '$studentList->student_id'
    ) 
    ) - COALESCE(
        (SELECT SUM(scholarship_amount) 
         FROM fees_concession 
         WHERE student_id = '$studentList->student_id' 
         AND fees_table_name = 'amenitytable' 
         AND fees_id = af.amenity_fee_id), 0
    ) AS bookPending, 
    af.amenity_amount AS bookAmnt  
FROM 
    fees_master fm 
JOIN 
    amenity_fee af 
ON 
    fm.fees_id = af.fee_master_id 
WHERE 
    fm.academic_year = '$academicyear' 
    AND fm.medium = '$stdMedium' 
    AND $student_type_cndtn 
    AND fm.standard = '$stdStandard' 
    AND fm.school_id = '$school_id' 
ORDER BY 
    af.amenity_date ASC;
");
            if ($getBookPendingQry->rowCount() > 0) {
                $bookpendingInfo = $getBookPendingQry->fetch();
                $bookPending = $bookpendingInfo['bookPending'];
                $bookAmnt = $bookpendingInfo['bookAmnt'];
                $currentBookPending = is_null($bookPending) ? $bookAmnt : $bookPending;
                // Logic to handle pending amounts based on leaving term
                if ($leavingTerm == 2 && $leavingTerm == 3) {
                    // If the student leaves after 1st term, only show 1st term pending amount
                    $book_pending = 0;
                } else {
                    // If student stays beyond the 2nd term, show all pending terms
                    $book_pending = $currentBookPending;
                }
            } else {
                $book_pending = '0';
            }
            $extra_id = ($studentList->extra_curricular) ? $studentList->extra_curricular : '0';
            $getExtraPendingQry = $connect->query("SELECT COALESCE(( ecaf.extra_amount - (SELECT (COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0)) FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE afd.fees_id = ecaf.extra_fee_id AND afd.fees_table_name = 'extratable' AND af.admission_id = '$studentList->student_id') ), 0) - COALESCE((SELECT SUM(scholarship_amount) FROM fees_concession WHERE student_id ='$studentList->student_id' AND fees_table_name ='extratable' AND fees_id = ecaf.extra_fee_id),0) AS extraPending, ecaf.extra_amount AS extraAmnt FROM extra_curricular_activities_fee ecaf WHERE ecaf.extra_fee_id IN ($extra_id) ");
            $extra_pending =0;
            if ($getExtraPendingQry->rowCount() > 0) {
                while ($extrapendingInfo = $getExtraPendingQry->fetch()) {
                    $extraPending = $extrapendingInfo['extraPending'];
                    $extraAmnt = $extrapendingInfo['extraAmnt'];
                    $currentExtraPending = is_null($extraPending) ? $extraAmnt : $extraPending;
                    // Logic to handle pending amounts based on leaving term

                    if ($leavingTerm == 2 || $leavingTerm == 3) {
                        // If the student leaves after 1st term, only show 1st term pending amount
                        $extra_pending = 0;
                    } else {
                        // If student stays beyond the 2nd term, show all pending terms
                        $extra_pending += $currentExtraPending;
                    }
                }
            } else {
                $extra_pending = '0';
            }
            $transport_id = ($studentList->transportarearefid) ? $studentList->transportarearefid : '0';
            $getTransportPendingQry = $connect->query("SELECT
    acp.particulars,
    COALESCE(
        acp.due_amount - COALESCE((
            SELECT
                SUM(tafd.fee_received) + SUM(tafd.scholarship)
            FROM
                transport_admission_fees_details tafd
            JOIN
                transport_admission_fees taf ON tafd.admission_fees_ref_id = taf.id
            WHERE
                tafd.area_creation_particulars_id = acp.particulars_id
                AND taf.admission_id = '$studentList->student_id'
        ), 0), 0) 
    - COALESCE((
            SELECT
                SUM(scholarship_amount)
            FROM
                fees_concession
            WHERE
                student_id = '$studentList->student_id'
                AND fees_table_name = 'transport'
                AND fees_id = acp.particulars_id
        ), 0) AS transport_pending,
    acp.due_amount AS transAmnt
FROM 
    area_creation ac
JOIN 
    area_creation_particulars acp 
ON 
    ac.area_id = acp.area_creation_id
WHERE 
    ac.area_id = '$transport_id'
ORDER BY 
    acp.due_date ASC;
 ");
            $transport_pending = array();
            while ($transportPendingInfo = $getTransportPendingQry->fetch()) {
                $transportpending = $transportPendingInfo['transport_pending'];
                $transAmnt = $transportPendingInfo['transAmnt'];
                // Check if termPending is null, then consider the full term amount
                $currentTransPending = is_null($transportpending) ? $termAmnt : $transportpending;

                // Logic to handle pending amounts based on leaving term
                if ($leavingTerm == 2) {
                    // If the student leaves after 1st term, only show 1st term pending amount
                    $transport_pending[] = ($transportPendingInfo['particulars'] == 'Term I') ? $currentTransPending : 0;
                } elseif ($leavingTerm == 3) {
                    // If the student leaves after 2nd term, show pending for the 1st and 2nd terms
                    $transport_pending[] = ($transportPendingInfo['particulars'] <= 'Term II') ? $currentTransPending : 0;
                } else {
                    // If student stays beyond the 2nd term, show all pending terms
                    $transport_pending[] = $currentTransPending;
                }
            }

        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $studentList->admission_number; ?></td>
                <td><?php echo $studentList->student_name; ?></td>
                <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                <td><?php echo $studentList->sms_sent_no; ?></td>
                <td><?php echo ($lsPending > 0) ? $lsPending : '0'; ?></td>
                <td><?php echo ($term_pending) ? $term_pending[0] : '0'; ?></td>
                <td><?php echo ($term_pending) ? $term_pending[1] : '0'; ?></td>
                <td><?php echo ($term_pending) ? $term_pending[2] : '0'; ?></td>
                <td><?php echo $book_pending; ?></td>
                <td><?php echo $extra_pending; ?></td>
                <td><?php echo ($transport_pending) ? $transport_pending[0] : '0'; ?></td>
                <td><?php echo ($transport_pending) ? $transport_pending[1] : '0'; ?></td>
                <td><?php echo ($transport_pending) ? $transport_pending[2] : '0'; ?></td>
                <td></td>
            </tr>
        <?php
            $ls_pending += ($lsPending > 0) ? $lsPending : '0';
            $grnd_term1_pending += ($term_pending) ? $term_pending[0] : '0';
            $grnd_term2_pending += ($term_pending) ? $term_pending[1] : '0';
            $grnd_term3_pending += ($term_pending) ? $term_pending[2] : '0';
            $grnd_book_pending += $book_pending;
            $grnd_extra_pending += $extra_pending;
            $grnd_trans1_pending += ($transport_pending) ? $transport_pending[0] : '0';
            $grnd_trans2_pending += ($transport_pending) ? $transport_pending[1] : '0';
            $grnd_trans3_pending += ($transport_pending) ? $transport_pending[2] : '0';
        } ?>
        <tr style="font-weight: bold;">
            <td><?php echo $i; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Grand Total</td>
            <td><?php echo $ls_pending; ?></td>
            <td><?php echo $grnd_term1_pending; ?></td>
            <td><?php echo $grnd_term2_pending; ?></td>
            <td><?php echo $grnd_term3_pending; ?></td>
            <td><?php echo $grnd_book_pending; ?></td>
            <td><?php echo $grnd_extra_pending; ?></td>
            <td><?php echo $grnd_trans1_pending; ?></td>
            <td><?php echo $grnd_trans2_pending; ?></td>
            <td><?php echo $grnd_trans3_pending; ?></td>
            <td></td>
        </tr>
    </tbody>
    <!-- <tfoot>
        <tr>
            <td colspan="5"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tfoot> -->
</table>

<script>
    $(document).ready(function() {
        $('#show_student_allPending_list').DataTable({
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