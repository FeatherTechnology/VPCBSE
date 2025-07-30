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
    $feeType = $_POST['feeType']; //1=school, 2=extra/book, 3=Lastyear, 4=Transportation
}

if ($feeType == '1') { //school
?>

    <table class="table table-bordered" id="show_student_scholarship_list">
        <thead>
            <tr>
                <th colspan='8'>School Scholarship Fee At <?php echo date('d-m-Y'); ?></th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Concession Fee Name</th>
                <th>Concession Fee</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // First Query
            $query1 = "
SELECT DISTINCT 
    sc.admission_number, 
    sc.student_name, 
    std.standard, 
    sh.section, 
    sc.sms_sent_no,
    gcf.grp_particulars AS concession_fee_name, 
  (COALESCE(fc.scholarship_amount, 0)) AS total_scholarship_amount,
    fc.remark 
FROM
    `student_creation` sc
JOIN student_history sh ON
    sc.student_id = sh.student_id AND sh.academic_year = '$academicyear'
JOIN standard_creation std ON
    sh.standard = std.standard_id
LEFT JOIN fees_concession fc ON
    sh.student_id = fc.student_id
LEFT JOIN group_course_fee gcf ON
    gcf.grp_course_id = fc.fees_id AND fc.fees_table_name = 'grptable'
WHERE 
    fc.academic_year  = '$academicyear'
    AND sc.medium = '$stdMedium' 
    AND sh.standard = '$stdStandard' 
    AND ('$stdSection' = '0' OR sh.section = '$stdSection') 
    AND sc.status = '0' 
    AND (fc.fees_table_name NOT IN ('transport', 'extratable', 'amenitytable'))
    AND sc.school_id = '$school_id'
    AND (COALESCE(fc.scholarship_amount, 0) > 0)
";

            // Second Query
            $query2 = "
SELECT DISTINCT 
    sc.admission_number, 
    sc.student_name, 
    std.standard, 
    sh.section, 
    sc.sms_sent_no,
    gcf.grp_particulars AS concession_fee_name, 
    (COALESCE(afd.scholarship, 0)) AS total_scholarship_amount,
    '' AS remark 
FROM
    `student_creation` sc
JOIN student_history sh ON
    sc.student_id = sh.student_id AND sh.academic_year = '$academicyear'
JOIN standard_creation std ON
    sh.standard = std.standard_id
LEFT JOIN admission_fees af ON
    sc.student_id = af.admission_id
LEFT JOIN admission_fees_details afd ON afd.admission_fees_ref_id = af.id
LEFT JOIN group_course_fee gcf ON
    gcf.grp_course_id = afd.fees_id AND afd.fees_table_name = 'grptable'
WHERE 
    af.academic_year = '$academicyear'  
    AND sc.medium = '$stdMedium' 
    AND sh.standard = '$stdStandard' 
    AND ('$stdSection' = '0' OR sh.section = '$stdSection') 
    AND sc.status = '0' 
    AND afd.fees_table_name NOT IN ('transport', 'extratable', 'amenitytable')
    AND sc.school_id = '$school_id'
    AND (COALESCE(afd.scholarship, 0) > 0)
";

            // Combine the two queries using UNION
            $combinedQuery = "$query1 UNION ALL $query2 ORDER BY admission_number ASC";

            // Execute the combined query
            $getStudentListQry = $connect->query($combinedQuery);

            // Initialize counter and total
            $i = 1;
            $schoolScholarshipTotal = 0;

            // Fetch and display the results
            while ($studentList = $getStudentListQry->fetchObject()) {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $studentList->concession_fee_name; ?></td>
                    <td><?php echo $studentList->total_scholarship_amount; ?></td>
                    <td><?php echo $studentList->remark; ?></td>
                </tr>
            <?php
                // Sum up the total scholarship amount
                $schoolScholarshipTotal += $studentList->total_scholarship_amount;
            } ?>
        </tbody>
        <tfoot>
            <tr style="font-weight: bold;">
                <td colspan="6" style="text-align:right">Grand Total:</td>
                <td><?php echo $schoolScholarshipTotal; ?></td>
                <td></td>
            </tr>
        </tfoot>

    </table>

<?php } else if ($feeType == '2') { //Extra 
?>
    <table class="table table-bordered" id="show_student_scholarship_list">
        <thead>
            <tr>
                <th colspan='8'>Extra/Book Scholarship Fee At <?php echo date('d-m-Y'); ?></th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Concession Fee Name</th>
                <th>Concession Fee</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // First query
            $query1 = "SELECT DISTINCT sc.admission_number, sc.student_name, std.standard, sh.section, sc.sms_sent_no,  (COALESCE(fc.scholarship_amount, 0)) AS total_scholarship_amount,
        CASE 
            WHEN(fc.fees_table_name='extratable') THEN ecaf.extra_particulars 
            WHEN(fc.fees_table_name='amenitytable') THEN af.amenity_particulars 
        ELSE ''
        END AS concession_fee_name, fc.remark
        FROM `student_creation` sc 
        JOIN student_history sh ON
            sc.student_id = sh.student_id AND sh.academic_year = '$academicyear'
        JOIN standard_creation std ON sh.standard = std.standard_id
        LEFT JOIN fees_concession fc ON sc.student_id = fc.student_id
        LEFT JOIN extra_curricular_activities_fee ecaf ON ecaf.extra_fee_id = fc.fees_id AND fc.fees_table_name = 'extratable'
        LEFT JOIN amenity_fee af ON af.amenity_fee_id = fc.fees_id AND fc.fees_table_name = 'amenitytable'
        WHERE fc.academic_year = '$academicyear' && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && ($stdSection = '0' OR sh.section = '$stdSection') && sc.status = '0' && fc.fees_table_name != 'transport' && fc.fees_table_name != 'grptable'  && sc.school_id = '$school_id' AND (COALESCE(fc.scholarship_amount, 0) > 0)";

            // Second query
            $query2 = "SELECT DISTINCT sc.admission_number, sc.student_name, std.standard, sh.section, sc.sms_sent_no,  
        (COALESCE(afd.scholarship, 0)) AS total_scholarship_amount,
        CASE 
            WHEN(afd.fees_table_name='extratable') THEN ecaf.extra_particulars 
            WHEN(afd.fees_table_name='amenitytable') THEN af.amenity_particulars 
        ELSE ''
        END AS concession_fee_name,
         '' AS remark 
        FROM `student_creation` sc 
        JOIN student_history sh ON
            sc.student_id = sh.student_id AND sh.academic_year = '$academicyear'
        JOIN standard_creation std ON sh.standard = std.standard_id
        LEFT JOIN admission_fees afs ON
            sc.student_id = afs.admission_id
        LEFT JOIN admission_fees_details afd ON afd.admission_fees_ref_id = afs.id
        LEFT JOIN extra_curricular_activities_fee ecaf ON ecaf.extra_fee_id = afd.fees_id AND afd.fees_table_name = 'extratable'
        LEFT JOIN amenity_fee af ON af.amenity_fee_id = afd.fees_id AND afd.fees_table_name = 'amenitytable'
        WHERE afs.academic_year = '$academicyear'  && sc.medium = '$stdMedium' &&  sh.standard = '$stdStandard' && ($stdSection = '0' OR sh.section = '$stdSection') && sc.status = '0' && afd.fees_table_name != 'transport' && afd.fees_table_name != 'grptable'  && sc.school_id = '$school_id' AND (COALESCE(afd.scholarship, 0) > 0)";

            $grnd_total_amount = 0;


            // Combine the two queries using UNION
            $combinedQuery = "$query1 UNION ALL $query2 ";

            // Execute the combined query
            $getStudentListQry = $connect->query($combinedQuery);

            // Initialize counter and total
            $i = 1;
            $schoolScholarshipTotal = 0;
            // Fetch and display data from the first query
            while ($studentList1 = $getStudentListQry->fetchObject()) {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList1->admission_number; ?></td>
                    <td><?php echo $studentList1->student_name; ?></td>
                    <td><?php echo $studentList1->standard . ' - ' . $studentList1->section; ?></td>
                    <td><?php echo $studentList1->sms_sent_no; ?></td>
                    <td><?php echo $studentList1->concession_fee_name; ?></td>
                    <td><?php echo $studentList1->total_scholarship_amount; ?></td>
                    <td><?php echo $studentList1->remark; ?></td>
                </tr>
            <?php
                $grnd_total_amount += $studentList1->total_scholarship_amount;
            }
            ?>
        </tbody>

        <tfoot>
            <tr style="font-weight: bold;">
                <td colspan="6" style="text-align:right">Grand Total:</td>
                <td><?php echo $grnd_total_amount; ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
<?php } else if ($feeType == '3') { //Last year 
?>
    <table class="table table-bordered" id="show_student_scholarship_list">
        <thead>
            <tr>
                <th colspan='8'>Lastyear Scholarship Fee At <?php echo date('d-m-Y'); ?></th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Concession Fee Name</th>
                <th>Concession Fee</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
    <?php
    // Query for the previous academic year
    // Ensure the columns and data types are consistent in both queries
$query1 = "SELECT DISTINCT sc.admission_number, sc.student_name, std.standard, sh.section, sc.sms_sent_no,  
(COALESCE(fc.scholarship_amount, 0)) AS total_scholarship_amount,
CASE 
    WHEN(fc.fees_table_name='grptable') THEN gcf.grp_particulars
    WHEN(fc.fees_table_name='extratable') THEN ecaf.extra_particulars 
    WHEN(fc.fees_table_name='amenitytable') THEN af.amenity_particulars 
    WHEN(fc.fees_table_name='transport') THEN acp.particulars
    ELSE ''
END AS concession_fee_name, fc.remark
FROM student_creation sc
JOIN student_history sh ON sc.student_id = sh.student_id AND sh.academic_year = '$lastyear'
JOIN standard_creation std ON sh.standard = std.standard_id
JOIN fees_concession fc ON sh.student_id = fc.student_id
LEFT JOIN group_course_fee gcf ON gcf.grp_course_id = fc.fees_id AND fc.fees_table_name='grptable'
LEFT JOIN extra_curricular_activities_fee ecaf ON ecaf.extra_fee_id = fc.fees_id AND fc.fees_table_name = 'extratable'
LEFT JOIN amenity_fee af ON af.amenity_fee_id = fc.fees_id AND fc.fees_table_name = 'amenitytable'
LEFT JOIN area_creation_particulars acp ON acp.particulars_id = fc.fees_id AND fc.fees_table_name = 'transport'
WHERE fc.academic_year = '$lastyear' 
AND sc.medium = '$stdMedium' 
AND sh.standard = '$stdStandard'
AND ($stdSection = '0' OR sc.section = '$stdSection') 
AND sc.status = '0' 
AND sc.school_id = '$school_id' 
AND COALESCE(fc.scholarship_amount, 0) > 0";

$query2 = "SELECT DISTINCT sc.admission_number, sc.student_name, std.standard, sh.section, sc.sms_sent_no,  
(COALESCE(afd.scholarship, 0)) AS total_scholarship_amount,
CASE 
    WHEN(afd.fees_table_name='grptable') THEN gcf.grp_particulars
    WHEN(afd.fees_table_name='extratable') THEN ecaf.extra_particulars 
    WHEN(afd.fees_table_name='amenitytable') THEN af.amenity_particulars 
    WHEN(afd.fees_table_name='transport') THEN acp.particulars
    ELSE ''
END AS concession_fee_name, '' AS remark 
FROM student_creation sc
JOIN student_history sh ON sc.student_id = sh.student_id AND sh.academic_year = '$lastyear'
JOIN standard_creation std ON sh.standard = std.standard_id
JOIN admission_fees afs ON sc.student_id = afs.admission_id
LEFT JOIN admission_fees_details afd ON afd.admission_fees_ref_id = afs.id
LEFT JOIN group_course_fee gcf ON gcf.grp_course_id = afd.fees_id AND afd.fees_table_name='grptable'
LEFT JOIN extra_curricular_activities_fee ecaf ON ecaf.extra_fee_id = afd.fees_id AND afd.fees_table_name = 'extratable'
LEFT JOIN amenity_fee af ON af.amenity_fee_id = afd.fees_id AND afd.fees_table_name = 'amenitytable'
LEFT JOIN area_creation_particulars acp ON acp.particulars_id = afd.fees_id AND afd.fees_table_name = 'transport'
WHERE afs.academic_year = '$lastyear' 
AND sc.medium = '$stdMedium' 
AND sh.standard = '$stdStandard'
AND ($stdSection = '0' OR sc.section = '$stdSection') 
AND sc.status = '0' 
AND sc.school_id = '$school_id' 
AND COALESCE(afd.scholarship, 0) > 0";

// Combine the two queries using UNION ALL
$combinedQuery = "$query1 UNION ALL $query2";
// Execute the combined query
$getStudentListLastYearQry = $connect->query($combinedQuery);
$grnd_lastyr_total_fee = 0;
            // Initialize counter and total
            $i = 1;
            $schoolScholarshipTotal = 0;

    // Fetch and display data for the previous academic year
    while ($studentListLastYear = $getStudentListLastYearQry->fetchObject()) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $studentListLastYear->admission_number; ?></td>
            <td><?php echo $studentListLastYear->student_name; ?></td>
            <td><?php echo $studentListLastYear->standard . ' - ' . $studentListLastYear->section; ?></td>
            <td><?php echo $studentListLastYear->sms_sent_no; ?></td>
            <td><?php echo $studentListLastYear->concession_fee_name . ' (' . $lastyear . ')'; ?></td>
            <td><?php echo $studentListLastYear->total_scholarship_amount; ?></td>
            <td><?php echo $studentListLastYear->remark; ?></td>
        </tr>
        <?php
        $grnd_lastyr_total_fee += $studentListLastYear->total_scholarship_amount;
    }
    ?>
</tbody>

        <tfoot>
            <tr style="font-weight: bold;">
                <td colspan="6" style="text-align:right">Grand Total:</td>
                <td><?php echo $grnd_lastyr_total_fee; ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

<?php } else if ($feeType == '4') { //transport 
?>

    <table class="table table-bordered" id="show_student_scholarship_list">
        <thead>
            <tr>
                <th colspan='8'>Transport Scholarship Fee At <?php echo date('d-m-Y'); ?></th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Mobile No</th>
                <th>Concession Fee Name</th>
                <th>Concession Fee</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Query 1
            $query1 = "
SELECT DISTINCT 
    sc.admission_number, 
    sc.student_name, 
    std.standard, 
    sh.section, 
    sc.sms_sent_no, 
    (COALESCE(fc.scholarship_amount, 0)) AS total_scholarship_amount, 
    acp.particulars AS concession_fee_name, 
    fc.remark
FROM 
    `student_creation` sc 
JOIN student_history sh ON
    sc.student_id = sh.student_id 
    AND sh.academic_year = '$academicyear'
JOIN standard_creation std ON 
    sh.standard = std.standard_id
JOIN fees_concession fc ON 
    sh.student_id = fc.student_id
LEFT JOIN area_creation_particulars acp ON 
    acp.particulars_id = fc.fees_id 
    AND fc.fees_table_name = 'transport'
WHERE 
    fc.academic_year = '$academicyear' 
    AND sc.medium = '$stdMedium' 
    AND sh.standard = '$stdStandard' 
    AND ('$stdSection' = '0' OR sc.section = '$stdSection') 
    AND sc.status = '0' 
    AND fc.fees_table_name = 'transport' 
    AND sc.school_id = '$school_id' 
    AND (COALESCE(fc.scholarship_amount, 0) > 0)
";

            // Query 2
            $query2 = "
SELECT DISTINCT 
    sc.admission_number, 
    sc.student_name, 
    std.standard, 
    sh.section, 
    sc.sms_sent_no, 
    (COALESCE(afd.scholarship, 0)) AS total_scholarship_amount, 
    acp.particulars AS concession_fee_name, 
    '' AS remark -- Placeholder for the missing remark in second query
FROM 
    `student_creation` sc 
JOIN student_history sh ON
    sc.student_id = sh.student_id 
    AND sh.academic_year = '$academicyear'
JOIN standard_creation std ON 
    sh.standard = std.standard_id
    LEFT JOIN transport_admission_fees taf ON
    sc.student_id = taf.admission_id
LEFT JOIN transport_admission_fees_details afd ON
    afd.admission_fees_ref_id = taf.id
LEFT JOIN area_creation_particulars acp ON 
    acp.particulars_id = afd.area_creation_particulars_id 

WHERE 
    taf.academic_year = '$academicyear' 
    AND sc.medium = '$stdMedium' 
    AND sh.standard = '$stdStandard' 
    AND ('$stdSection' = '0' OR sc.section = '$stdSection') 
    AND sc.status = '0' 
    AND sc.school_id = '$school_id' 
    AND (COALESCE(afd.scholarship, 0) > 0)
";

            // Combine both queries using UNION
            $combinedQuery = "$query1 UNION ALL $query2 ORDER BY admission_number ASC";

            // Execute the combined query
            $getStudentListQry = $connect->query($combinedQuery);

            $i = 1;
            $grnd_total_fee = 0;

            // Fetch and display the results
            while ($studentList = $getStudentListQry->fetchObject()) {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $studentList->admission_number; ?></td>
                    <td><?php echo $studentList->student_name; ?></td>
                    <td><?php echo $studentList->standard . ' - ' . $studentList->section; ?></td>
                    <td><?php echo $studentList->sms_sent_no; ?></td>
                    <td><?php echo $studentList->concession_fee_name; ?></td>
                    <td><?php echo $studentList->total_scholarship_amount; ?></td>
                    <td><?php echo $studentList->remark; ?></td>
                </tr>
            <?php
                // Sum up the total scholarship amount
                $grnd_total_fee += $studentList->total_scholarship_amount;
            } ?>
        </tbody>
        <tfoot>
            <tr style="font-weight: bold;">
                <td colspan="6" style="text-align:right">Grand Total:</td>
                <td><?php echo $grnd_total_fee; ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

<?php } ?>


<script>
    $(document).ready(function() {
        var table = $('#show_student_scholarship_list').DataTable({
            order: [
                [0, "asc"]
            ],
            columnDefs: [{
                    type: 'num',
                    targets: 0
                } // Treat first column as numeric
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();

                // Helper function to remove formatting and convert to integer/float
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Calculate the total for the current page (visible records)
                var pageTotal = api
                    .column(6, {
                        page: 'current'
                    }) // 6 is the index of "Concession Fee" column
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update the footer with the page total
                $(api.column(6).footer()).html(
                    '' + pageTotal
                );
            }
        });
    });
</script>