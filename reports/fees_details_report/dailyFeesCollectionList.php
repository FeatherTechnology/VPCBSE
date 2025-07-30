<?php
include "../../ajaxconfig.php";
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}

if(isset($_POST['feesFromDate'])){
    $feesFromDate = new DateTime($_POST['feesFromDate']);
    $startdate = clone $feesFromDate;
}
if(isset($_POST['feesToDate'])){
    $feesToDate = new DateTime($_POST['feesToDate']);
    $to_date = $feesToDate->format('Y-m-d');
}
?>

<table class="table table-bordered" id="show_student_fees_summary_list">
    <thead>
        <tr><th colspan='11'>Fees Summary Report From <?php echo $feesFromDate->format('d-m-Y'); ?>  To  <?php echo $feesToDate->format('d-m-Y'); ?> </th></tr>
        <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Receipt No</th>
            <th>Admission No</th>
            <th>Student Name</th>
            <th>Standard - Section</th>
            <th>School Fee</th>
            <th>Book Fee</th>
            <th>Transport Fee</th>
            <th>Last year Fee</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $schoolfee_total = 0;
    $bookfee_total = 0;
    $transportfee_total = 0;
    $lastyear_total = 0;
    $total = 0;

    $a=1;
    while($startdate <= $feesToDate){
    $from_date = $startdate->format('Y-m-d');

    // $getFeeCollectionQry = $connect->query("SELECT af.receipt_no, sc.admission_number, sc.student_name, std.standard, sc.section, 
    // SUM(CASE WHEN afd.fees_table_name = 'grptable' THEN afd.fee_received ELSE 0 END) AS grp_fee,
    // SUM(CASE WHEN afd.fees_table_name = 'amenitytable' THEN afd.fee_received ELSE 0 END) AS extra_fee,
    // 0 AS transportFees,
    // 0 AS lastyearFees
    // FROM `admission_fees` af 
    // JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
    // JOIN student_creation sc ON af.admission_id = sc.student_id 
    // JOIN standard_creation std ON sc.standard = std.standard_id 
    // WHERE af.receipt_date ='$from_date' AND afd.fee_received > 0 AND sc.school_id = '$school_id'
    // GROUP BY 
    //     af.receipt_no, 
    //     sc.admission_number, 
    //     sc.student_name, 
    //     std.standard, 
    //     sc.section
        
    // UNION 
    
    // SELECT taf.receipt_no, sc.admission_number, sc.student_name, std.standard, sc.section, 0 AS grp_fee, 0 AS extra_fee, tafd.fee_received AS transportFees, 0 AS lastyearFees 
    // FROM `transport_admission_fees` taf 
    // JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
    // JOIN student_creation sc ON taf.admission_id = sc.student_id 
    // JOIN standard_creation std ON sc.standard = std.standard_id 
    // WHERE taf.receipt_date ='$from_date' AND tafd.fee_received > 0 AND sc.school_id = '$school_id'
    
    // UNION
    
    // SELECT lyf.receipt_no, sc.admission_number, sc.student_name, std.standard, sc.section, 
    // 0 AS grp_fee,
    // 0 AS extra_fee,
    // 0 AS transportFees,
    // SUM(lyfd.fee_received) AS lastyearFees
    // FROM last_year_fees lyf 
    // JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
    // JOIN student_creation sc ON lyf.admission_id = sc.student_id 
    // JOIN standard_creation std ON sc.standard = std.standard_id 
    // WHERE lyf.receipt_date ='$from_date' AND lyfd.fee_received > 0  AND sc.school_id = '$school_id' HAVING lastyearFees > 0 ");

    $getFeeCollectionQry = $connect->query("SELECT
    *
FROM
    (
    SELECT
        af.receipt_no,
        sc.admission_number,
        sc.student_name,
        std.standard,
        sh.section,
        SUM(
            CASE WHEN afd.fees_table_name = 'grptable' THEN afd.fee_received ELSE 0
        END
) AS grp_fee,
SUM(
    CASE WHEN afd.fees_table_name = 'amenitytable' THEN afd.fee_received ELSE 0
END
) AS extra_fee,
0 AS transportFees,
0 AS lastyearFees
FROM
    `admission_fees` af
JOIN admission_fees_details afd ON
    af.id = afd.admission_fees_ref_id
JOIN student_creation sc ON
    af.admission_id = sc.student_id
JOIN student_history sh ON
    sh.student_id = sc.student_id AND af.academic_year = sh.academic_year
JOIN standard_creation STD ON
    sh.standard = std.standard_id
WHERE
    af.receipt_date = '$from_date' AND afd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0
GROUP BY
    afd.id,
    af.receipt_no,
    sc.admission_number,
    sc.student_name,
    std.standard,
    sh.section
UNION ALL
SELECT
    taf.receipt_no,
    sc.admission_number,
    sc.student_name,
    std.standard,
    sh.section,
    0 AS grp_fee,
    0 AS extra_fee,
    tafd.fee_received AS transportFees,
    0 AS lastyearFees
FROM
    `transport_admission_fees` taf
JOIN transport_admission_fees_details tafd ON
    taf.id = tafd.admission_fees_ref_id
JOIN student_creation sc ON
    taf.admission_id = sc.student_id
JOIN student_history sh ON
    sh.student_id = sc.student_id AND taf.academic_year = sh.academic_year
JOIN standard_creation STD ON
    sh.standard = std.standard_id
WHERE
    taf.receipt_date = '$from_date' AND tafd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0
GROUP BY
    tafd.id,
    taf.receipt_no,
    sc.admission_number,
    sc.student_name,
    std.standard
UNION ALL
SELECT
    lyf.receipt_no,
    sc.admission_number,
    sc.student_name,
    std.standard,
    sh.section,
    0 AS grp_fee,
    0 AS extra_fee,
    0 AS transportFees,
    SUM(lyfd.fee_received) AS lastyearFees
FROM
    last_year_fees lyf
JOIN last_year_fees_details lyfd ON
    lyf.id = lyfd.admission_fees_ref_id
JOIN student_creation sc ON
    lyf.admission_id = sc.student_id
JOIN student_history sh ON
    sh.student_id = sc.student_id AND lyf.academic_year = sh.academic_year
JOIN standard_creation STD ON
    sh.standard = std.standard_id
WHERE
    lyf.receipt_date = '$from_date' AND lyfd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0
GROUP BY
        lyfd.id,
    lyf.receipt_no,
    sc.admission_number,
    sc.student_name,
    std.standard,
    sh.section
) AS combined_result
ORDER BY
    CAST(
        SUBSTRING(
            receipt_no,
            LOCATE('-', receipt_no) + 1
        ) AS UNSIGNED
    ); ");
    
    while($feeCollection = $getFeeCollectionQry->fetchObject()){
?>

    <tr>
        <td><?php echo $a++;?></td>
        <td><?php echo date('d-m-Y',strtotime($from_date));?></td>
        <td><?php echo $feeCollection->receipt_no;?></td>
        <td><?php echo $feeCollection->admission_number;?></td>
        <td><?php echo $feeCollection->student_name;?></td>
        <td><?php echo $feeCollection->standard.'-'.$feeCollection->section;?></td>
        <td><?php echo $feeCollection->grp_fee;?></td>
        <td><?php echo $feeCollection->extra_fee;?></td>
        <td><?php echo $feeCollection->transportFees;?></td>
        <td><?php echo $feeCollection->lastyearFees;?></td>
        <td><?php echo $totalAmnt = $feeCollection->grp_fee + $feeCollection->extra_fee + $feeCollection->transportFees + $feeCollection->lastyearFees;?></td>
    </tr>

<?php 
$schoolfee_total += $feeCollection->grp_fee;
$bookfee_total += $feeCollection->extra_fee;
$transportfee_total += $feeCollection->transportFees;
$lastyear_total += $feeCollection->lastyearFees;
$total += $totalAmnt;
    }

$startdate->modify('+1 day');
}//End of While loop for getting dates from start to end date. ?>
    <tr style="font-weight: bold;">
        <td><?php echo $a;?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Grand Total</td>
        <td><?php echo $schoolfee_total;?></td>
        <td><?php echo $bookfee_total;?></td>
        <td><?php echo $transportfee_total;?></td>
        <td><?php echo $lastyear_total;?></td>
        <td><?php echo $total;?></td>
    </tr>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#show_student_fees_summary_list').DataTable({
            order: [[0, "asc"]],
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