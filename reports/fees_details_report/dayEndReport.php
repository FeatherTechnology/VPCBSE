<?php
include "../../ajaxconfig.php";
@session_start();
if (isset($_SESSION['school_id'])) {
    $school_id = $_SESSION['school_id'];
}

if (isset($_POST['feeType'])) {
    $feeType = $_POST['feeType'];
}
if (isset($_POST['dateSelect'])) {
    $dateSelect = $_POST['dateSelect'];
}
if (isset($_POST['singleDate'])) {
    $singleDate = $_POST['singleDate'];
}
if (isset($_POST['feesFromDate'])) {
    $feesFromDate = new DateTime($_POST['feesFromDate']);
    $startdate = clone $feesFromDate;
}
if (isset($_POST['feesToDate'])) {
    $feesToDate = new DateTime($_POST['feesToDate']);
    $to_date = $feesToDate->format('Y-m-d');
}

if ($dateSelect == 'singledate') {

    if ($feeType == 'grptable' || $feeType == 'extratable' || $feeType == 'amenitytable') { //school
        $Qry = "SELECT af.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, 
        SUM(CASE WHEN afd.fees_table_name = 'grptable' THEN afd.fee_received ELSE 0 END) AS grp_fee,
        SUM(CASE WHEN afd.fees_table_name = 'extratable' THEN afd.fee_received ELSE 0 END) AS extra_fee,
        SUM(CASE WHEN afd.fees_table_name = 'amenitytable' THEN afd.fee_received ELSE 0 END) AS amenity_fee
        FROM `admission_fees` af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
        JOIN student_creation sc ON af.admission_id = sc.student_id 
          JOIN student_history sh ON sh.student_id = sc.student_id AND af.academic_year = sh.academic_year
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE af.receipt_date ='$singleDate' AND afd.fee_received > 0 AND afd.fees_table_name = '$feeType' AND sc.school_id = '$school_id' AND sc.status = 0
        GROUP BY 
             afd.id,
            af.receipt_no, 
            sc.admission_number, 
            sc.student_name, 
            std.standard, 
            sh.section  ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
    } else if ($feeType == 'lastyear') { //Last Year
        $Qry = "SELECT lyf.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, lyfd.fee_received AS lastyearFees
        FROM last_year_fees lyf 
        JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
        JOIN student_creation sc ON lyf.admission_id = sc.student_id 
             JOIN student_history sh ON sh.student_id = sc.student_id AND lyf.academic_year = sh.academic_year
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE lyf.receipt_date ='$singleDate' AND lyfd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0 HAVING lastyearFees > 0 ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
    } else if ($feeType == 'transport') { //Transport
        $Qry = "SELECT taf.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, 0 AS grp_fee, 0 AS extra_fee, tafd.fee_received AS transportFees 
        FROM `transport_admission_fees` taf 
        JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
        JOIN student_creation sc ON taf.admission_id = sc.student_id 
              JOIN student_history sh ON sh.student_id = sc.student_id AND taf.academic_year = sh.academic_year 
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE taf.receipt_date ='$singleDate' AND tafd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0 GROUP BY 
        tafd.id,
             taf.receipt_no,
            sc.admission_number, 
            sc.student_name, 
            std.standard ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
    }
?>

    <table class="table table-bordered" id="show_dayend_report_list">
        <thead>
            <tr>
                <th colspan='7'>Day End Report At <?php echo date('d-m-Y', strtotime($singleDate)); ?> </th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Date</th>
                <th>Receipt No</th>
                <th>Admission No</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Collected Fee</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $single_total = 0;
            $a = 1;
            $getFeeCollectionQry = $connect->query("$Qry");
            while ($feeCollection = $getFeeCollectionQry->fetchObject()) {

                if ($feeType == 'grptable') {
                    $schoolfee_total = $feeCollection->grp_fee;
                } else if ($feeType == 'extratable') {
                    $schoolfee_total = $feeCollection->extra_fee;
                } else if ($feeType == 'amenitytable') {
                    $schoolfee_total = $feeCollection->amenity_fee;
                } else if ($feeType == 'lastyear') {
                    $schoolfee_total = $feeCollection->lastyearFees;
                } else if ($feeType == 'transport') {
                    $schoolfee_total = $feeCollection->transportFees;
                } else {
                    $schoolfee_total = '0';
                }
            ?>

                <tr>
                    <td><?php echo $a++; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($singleDate)); ?></td>
                    <td><?php echo $feeCollection->receipt_no; ?></td>
                    <td><?php echo $feeCollection->admission_number; ?></td>
                    <td><?php echo $feeCollection->student_name; ?></td>
                    <td><?php echo $feeCollection->standard . '-' . $feeCollection->section; ?></td>
                    <td><?php echo $schoolfee_total; ?></td>
                </tr>

            <?php
                $single_total += $schoolfee_total;
            } ?>
            <tr style="font-weight: bold;">
                <td><?php echo $a; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $single_total; ?></td>
            </tr>
        </tbody>
    </table>

<?php } else if ($dateSelect == 'multipledate') { ?>

    <table class="table table-bordered" id="show_dayend_report_list">
        <thead>
            <tr>
                <th colspan='7'>Day End Report From <?php echo $feesFromDate->format('d-m-Y'); ?> To <?php echo $feesToDate->format('d-m-Y'); ?> </th>
            </tr>
            <tr>
                <th>S.No</th>
                <th>Date</th>
                <th>Receipt No</th>
                <th>Admission No</th>
                <th>Student Name</th>
                <th>Standard & Section</th>
                <th>Collected Fee</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $multiple_total = 0;
            $a = 1;
            while ($startdate <= $feesToDate) {
                $from_date = $startdate->format('Y-m-d');

                if ($feeType == 'grptable' || $feeType == 'extratable' || $feeType == 'amenitytable') { //school
                    $Qry = "SELECT af.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, af.receipt_date,
        SUM(CASE WHEN afd.fees_table_name = 'grptable' THEN afd.fee_received ELSE 0 END) AS grp_fee,
        SUM(CASE WHEN afd.fees_table_name = 'extratable' THEN afd.fee_received ELSE 0 END) AS extra_fee,
        SUM(CASE WHEN afd.fees_table_name = 'amenitytable' THEN afd.fee_received ELSE 0 END) AS amenity_fee
        FROM `admission_fees` af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id 
        JOIN student_creation sc ON af.admission_id = sc.student_id 
        JOIN student_history sh ON sh.student_id = sc.student_id AND af.academic_year = sh.academic_year
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE af.receipt_date ='$from_date' AND afd.fee_received > 0 AND afd.fees_table_name = '$feeType' AND sc.school_id = '$school_id' AND sc.status = 0
        GROUP BY 
            afd.id,
            af.receipt_no, 
            sc.admission_number, 
            sc.student_name, 
            std.standard, 
            sh.section ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
                } else if ($feeType == 'lastyear') { //Last Year
                    $Qry = "SELECT lyf.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, lyfd.fee_received AS lastyearFees, lyf.receipt_date
        FROM last_year_fees lyf 
        JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
        JOIN student_creation sc ON lyf.admission_id = sc.student_id
        JOIN student_history sh ON sh.student_id = sc.student_id AND lyf.academic_year = sh.academic_year 
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE lyf.receipt_date ='$from_date' AND lyfd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0 HAVING lastyearFees > 0 ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
                } else if ($feeType == 'transport') { //Transport
                    $Qry = "SELECT taf.receipt_no, sc.admission_number, sc.student_name, std.standard, sh.section, 0 AS grp_fee, 0 AS extra_fee, tafd.fee_received AS transportFees, taf.receipt_date 
        FROM `transport_admission_fees` taf 
        JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
        JOIN student_creation sc ON taf.admission_id = sc.student_id 
        JOIN student_history sh ON sh.student_id = sc.student_id AND taf.academic_year = sh.academic_year 
        JOIN standard_creation std ON sh.standard = std.standard_id 
        WHERE taf.receipt_date ='$from_date' AND tafd.fee_received > 0 AND sc.school_id = '$school_id' AND sc.status = 0 GROUP BY 
        tafd.id,
             taf.receipt_no,
            sc.admission_number, 
            sc.student_name, 
            std.standard ORDER BY CAST(SUBSTRING(receipt_no, LOCATE('-', receipt_no) + 1) AS UNSIGNED)";
                }

                $getFeeCollectionQry = $connect->query("$Qry");
                while ($feeCollection = $getFeeCollectionQry->fetchObject()) {

                    if ($feeType == 'grptable') {
                        $grand_fee_total = $feeCollection->grp_fee;
                    } else if ($feeType == 'extratable') {
                        $grand_fee_total = $feeCollection->extra_fee;
                    } else if ($feeType == 'amenitytable') {
                        $grand_fee_total = $feeCollection->amenity_fee;
                    } else if ($feeType == 'lastyear') {
                        $grand_fee_total = $feeCollection->lastyearFees;
                    } else if ($feeType == 'transport') {
                        $grand_fee_total = $feeCollection->transportFees;
                    } else {
                        $grand_fee_total = '0';
                    }
            ?>

                    <tr>
                        <td><?php echo $a++; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($feeCollection->receipt_date)); ?></td>
                        <td><?php echo $feeCollection->receipt_no; ?></td>
                        <td><?php echo $feeCollection->admission_number; ?></td>
                        <td><?php echo $feeCollection->student_name; ?></td>
                        <td><?php echo $feeCollection->standard . '-' . $feeCollection->section; ?></td>
                        <td><?php echo $grand_fee_total; ?></td>
                    </tr>

            <?php
                    $multiple_total += $grand_fee_total;
                }

                $startdate->modify('+1 day');
            } //End of While loop for getting dates from start to end date. 
            ?>
            <tr style="font-weight: bold;">
                <td><?php echo $a; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td><?php echo $multiple_total; ?></td>
            </tr>
        </tbody>
    </table>

<?php
} ?>

<script>
    $(document).ready(function() {
        $('#show_dayend_report_list').DataTable({
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