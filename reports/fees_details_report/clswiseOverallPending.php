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
// if(isset($_POST['studentType'])){
//     $studentType = $_POST['studentType'];
// }
?>

<table class="table table-bordered" id="show_student_allPending_list">
    <thead>
        <tr>
            <th rowspan="2">Class</th>
            <th colspan="3">Pending Fees</th>
            <th rowspan="2">Book</th>
            <th colspan="3">Transport Fees</th>
            <th rowspan="2">Grand Total</th>
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
        $getStandardListQry = $connect->query("SELECT std.standard_id, std.standard
FROM standard_creation std
WHERE std.status = '0' ");
        $i = 1;
        $grand_term1 = 0;
        $grand_term2 = 0;
        $grand_term3 = 0;
        $grand_book = 0;
        $grand_transport_term1 = 0;
        $grand_transport_term2 = 0;
        $grand_transport_term3 = 0;
        $grand_overall_total = 0;
        while ($standardList = $getStandardListQry->fetchObject()) {

            $getTermPendingQry = $connect->query(" SELECT
    (
        COALESCE(gcf.grp_amount, 0) * (
            SELECT
                COUNT(sh.student_id)
            FROM
                student_creation sc
            LEFT JOIN student_history sh ON sc.student_id = sh.student_id
            WHERE
                sh.standard = '$standardList->standard_id'
                AND sh.academic_year = '$academicyear'
                AND sc.leaving_term NOT IN (1, 5)
                AND sc.school_id = '$school_id'
                AND sc.status = 0
                AND sc.medium = '$stdMedium'
        )
    )
    - (
        SELECT
            COALESCE(
                SUM(afd.fee_received) + SUM(afd.scholarship),
                0
            )
        FROM
            admission_fees_details afd
        JOIN admission_fees af ON afd.admission_fees_ref_id = af.id
        JOIN student_creation sc ON sc.student_id = af.admission_id
        LEFT JOIN student_history sh ON sc.student_id = sh.student_id
        WHERE
            afd.fees_id = gcf.grp_course_id
            AND afd.fees_table_name = 'grptable'
            AND sh.standard = '$standardList->standard_id'
            AND sc.school_id = '$school_id'
            AND sc.status = 0
            AND sh.academic_year = '$academicyear'
    )
    - (
        COALESCE(
            (
                SELECT
                    SUM(fc.scholarship_amount)
                FROM
                    fees_concession fc
                JOIN student_creation sc ON sc.student_id = fc.student_id
                LEFT JOIN student_history sh ON sc.student_id = sh.student_id
                WHERE
                    sh.standard = '$standardList->standard_id'
                    AND sh.academic_year = '$academicyear'
                    AND fc.fees_table_name = 'grptable'
                    AND fc.fees_id = gcf.grp_course_id AND sc.status = 0
            ),
            0
        )
    ) AS termPending_for_standard
FROM
    fees_master fm
JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id
WHERE
    fm.academic_year = '$academicyear'
    AND fm.medium = '$stdMedium'
    AND fm.standard = '$standardList->standard_id'
    AND fm.school_id = '$school_id'
ORDER BY
    gcf.grp_course_id ASC; ");
            $term_pending = array();
            while ($termPendingInfo = $getTermPendingQry->fetch()) {
                $term_pending[] = $termPendingInfo['termPending_for_standard'];
            }


            $getBookPendingQry = $connect->query("
    SELECT ( 
        COALESCE(af.amenity_amount, 0) * (
            SELECT COUNT(sh.student_id)
            FROM student_creation sc
            LEFT JOIN student_history sh ON sc.student_id = sh.student_id
            WHERE 
                sh.standard = '$standardList->standard_id'
                AND sh.academic_year = '$academicyear'
                AND sc.leaving_term NOT IN (1, 5)
                AND sc.school_id = '$school_id'
                AND sc.status = 0
                AND sc.medium = '$stdMedium'
        )
    ) 
    - (
        SELECT 
            COALESCE(SUM(afd.fee_received), 0) + COALESCE(SUM(afd.scholarship), 0)
        FROM 
            admission_fees_details afd
        JOIN admission_fees af2 ON afd.admission_fees_ref_id = af2.id
        JOIN student_creation sc2 ON sc2.student_id = af2.admission_id
        JOIN student_history sh2 ON sc2.student_id = sh2.student_id
        WHERE 
            afd.fees_id = af.amenity_fee_id
            AND afd.fees_table_name = 'amenitytable'
            AND sh2.standard = '$standardList->standard_id'
            AND sh2.academic_year = '$academicyear'
            AND sc2.status = 0
    )
    - (
        SELECT COALESCE(SUM(fc.scholarship_amount), 0)
        FROM fees_concession fc
        JOIN student_creation sc3 ON sc3.student_id = fc.student_id
        LEFT JOIN student_history sh3 ON sc3.student_id = sh3.student_id
        WHERE 
            sh3.standard = '$standardList->standard_id'
            AND sh3.academic_year = '$academicyear'
            AND fc.fees_table_name = 'amenitytable'
            AND fc.fees_id = af.amenity_fee_id
            AND sc3.status = 0
    ) AS bookpending_for_standard
    FROM 
        fees_master fm
    JOIN amenity_fee af ON fm.fees_id = af.fee_master_id
    WHERE 
        fm.academic_year = '$academicyear'
        AND fm.medium = '$stdMedium'
        AND fm.standard = '$standardList->standard_id'
        AND fm.school_id = '$school_id'
");

            if ($getBookPendingQry->rowCount() > 0) {
                $book_pending = $getBookPendingQry->fetch()['bookpending_for_standard'];
            } else {
                $book_pending = '0';
            }

           $getTransportPendingQry = $connect->query("
    SELECT 
        SUM(CASE WHEN is_min = 1 THEN transport_pending ELSE 0 END) AS total_transport_min,
        SUM(CASE WHEN is_max = 1 THEN transport_pending ELSE 0 END) AS total_transport_max,
        SUM(CASE WHEN is_middle = 1 THEN transport_pending ELSE 0 END) AS total_transport_middle
    FROM (
        SELECT 
            acp.particulars_id,
            ac.area_id,
            acp.due_amount,
            (
                COALESCE(acp.due_amount, 0) * COALESCE(sc.student_count, 0)
                - COALESCE((
                    SELECT SUM(fc.scholarship_amount)
                    FROM fees_concession fc
                    JOIN student_creation sc3 ON sc3.student_id = fc.student_id
                    LEFT JOIN student_history sh3 ON sc3.student_id = sh3.student_id
                    WHERE sh3.standard = '$standardList->standard_id'
                        AND sh3.academic_year = '$academicyear'
                        AND fc.fees_table_name = 'transport'
                        AND fc.fees_id = acp.particulars_id AND sc3.status = 0
                ), 0)
                - COALESCE((
                    SELECT 
                        SUM(tafd.fee_received) + SUM(tafd.scholarship)
                    FROM transport_admission_fees taf
                    JOIN transport_admission_fees_details tafd 
                        ON taf.id = tafd.admission_fees_ref_id
                    JOIN student_creation sc ON sc.student_id = taf.admission_id
                    JOIN student_history sh ON sc.student_id = sh.student_id
                    WHERE tafd.area_creation_particulars_id = acp.particulars_id 
                        AND sh.standard = '$standardList->standard_id' 
                        AND sh.academic_year = '$academicyear'
                        AND sc.school_id = '$school_id'
                        AND sc.status = 0
                        AND sc.leaving_term NOT IN (1, 5)
                        AND sc.medium = '$stdMedium'
                ), 0)
            ) AS transport_pending,

            CASE 
                WHEN acp.particulars_id = (
                    SELECT MIN(acp1.particulars_id)
                    FROM area_creation_particulars acp1
                    WHERE acp1.area_creation_id = ac.area_id
                ) THEN 1 ELSE 0 
            END AS is_min,

            CASE 
                WHEN acp.particulars_id = (
                    SELECT MAX(acp1.particulars_id)
                    FROM area_creation_particulars acp1
                    WHERE acp1.area_creation_id = ac.area_id
                ) THEN 1 ELSE 0 
            END AS is_max,

            CASE 
                WHEN acp.particulars_id NOT IN (
                    SELECT MIN(acp1.particulars_id)
                    FROM area_creation_particulars acp1
                    WHERE acp1.area_creation_id = ac.area_id
                )
                AND acp.particulars_id NOT IN (
                    SELECT MAX(acp1.particulars_id)
                    FROM area_creation_particulars acp1
                    WHERE acp1.area_creation_id = ac.area_id
                )
                THEN 1 ELSE 0 
            END AS is_middle

        FROM area_creation ac
        JOIN area_creation_particulars acp 
            ON ac.area_id = acp.area_creation_id
        LEFT JOIN (
            SELECT 
                sh.transportarearefid AS area_id,
                COUNT(DISTINCT sh.student_id) AS student_count
            FROM student_creation sc
            JOIN student_history sh ON sc.student_id = sh.student_id
            WHERE sh.standard = '$standardList->standard_id'
                AND sh.academic_year = '$academicyear'
                AND sc.leaving_term NOT IN (1, 5)
                AND sc.school_id = '$school_id'
                AND sc.status = 0
                AND sc.medium = '$stdMedium'
            GROUP BY sh.transportarearefid
        ) sc ON ac.area_id = sc.area_id
        WHERE ac.year_id = '$academicyear'
    ) AS categorized_particulars;
");

            $transport_pending = array();
            $transportPendingInfo = $getTransportPendingQry->fetch(PDO::FETCH_ASSOC);
            // Assign values
            $transport_term1 = isset($transportPendingInfo['total_transport_min']) ? $transportPendingInfo['total_transport_min'] : 0;
            $transport_term2 = isset($transportPendingInfo['total_transport_middle']) ? $transportPendingInfo['total_transport_middle'] : 0;
            $transport_term3 = isset($transportPendingInfo['total_transport_max']) ? $transportPendingInfo['total_transport_max'] : 0;

            // Display results

            // Calculate totals
            $term1 = isset($term_pending[0]) ? $term_pending[0] : 0;
            $term2 = isset($term_pending[1]) ? $term_pending[1] : 0;
            $term3 = isset($term_pending[2]) ? $term_pending[2] : 0;

        ?>
            <tr>
                <td><?php echo $standardList->standard; ?></td>
                <td><?php echo $term1; ?></td>
                <td><?php echo $term2; ?></td>
                <td><?php echo $term3; ?></td>
                <td><?php echo $book_pending; ?></td>
                <td><?php echo $transport_term1; ?></td>
                <td><?php echo $transport_term2; ?></td>
                <td><?php echo $transport_term3; ?></td>
                <td style="font-weight: bold;"><?php echo $grand_total = $term1 + $term2 + $term3 + $book_pending + $transport_term1 + $transport_term2 + $transport_term3; ?></td>
            </tr>
        <?php
            $grand_term1 += $term1;
            $grand_term2 += $term2;
            $grand_term3 += $term3;
            $grand_book += $book_pending;
            $grand_transport_term1 += $transport_term1;
            $grand_transport_term2 += $transport_term2;
            $grand_transport_term3 += $transport_term3;
            $grand_overall_total += $grand_total;
        } ?>
        <tr style="font-weight: bold;">
            <td>Grand Total</td>
            <td><?php echo $grand_term1; ?></td>
            <td><?php echo $grand_term2; ?></td>
            <td><?php echo $grand_term3; ?></td>
            <td><?php echo $grand_book; ?></td>
            <td><?php echo $grand_transport_term1; ?></td>
            <td><?php echo $grand_transport_term2; ?></td>
            <td><?php echo $grand_transport_term3; ?></td>
            <td><?php echo $grand_overall_total; ?></td>
        </tr>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#show_student_allPending_list').DataTable({
            // order: [[0, "asc"]],
            // columnDefs: [
            //     { type: 'natural', targets: 0 }
            // ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            paging: false, // Disable paging
            sort: false,
        });
    });
</script>