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

<table class="table table-bordered" id="show_monthwise_fees_summary">
    <thead>
        <tr><th colspan='7'>Fees Summary Report From <?php echo $feesFromDate->format('M-Y'); ?>  To  <?php echo $feesToDate->format('M-Y'); ?> </th></tr>
        <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>School Fee</th>
            <th>Book Fee</th>
            <th>Transport Fee</th>
            <th>Last year Fee</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i=1;
    $schoolfee_total = 0;
    $bookfee_total = 0;
    $transportfee_total = 0;
    $lastyear_total = 0;
    $total = 0;
    while($startdate <= $feesToDate){
    $from_date = $startdate->format('Y-m-d');

    //School fee
    $getCollectedFeesQry = $connect->query("SELECT COALESCE(SUM(afd.fee_received),0) AS collectedFees FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE (MONTH(af.receipt_date) = MONTH('$from_date') AND YEAR(af.receipt_date) = YEAR('$from_date') )  AND afd.fees_table_name ='grptable' AND af.school_id = '$school_id' ");
    $collectedFeesInfo = $getCollectedFeesQry->fetchObject();
    
    //Book feee
    $getBookFeesQry = $connect->query("SELECT COALESCE(SUM(afd.fee_received),0) AS bookFees FROM `admission_fees` af JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id WHERE (MONTH(af.receipt_date) = MONTH('$from_date') AND YEAR(af.receipt_date) = YEAR('$from_date') ) AND afd.fees_table_name ='amenitytable' AND af.school_id = '$school_id' ");
    $bookFeesInfo = $getBookFeesQry->fetchObject();
    
    //Transport fee
    $getTransportFeesQry = $connect->query("SELECT COALESCE(SUM(tafd.fee_received),0) AS transportFees FROM `transport_admission_fees` taf JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id WHERE (MONTH(taf.receipt_date) = MONTH('$from_date') AND YEAR(taf.receipt_date) = YEAR('$from_date') ) AND taf.school_id = '$school_id' ");
    $transportFeesInfo = $getTransportFeesQry->fetchObject();

    //Last Year Fee
    $getLastyearFeesQry = $connect->query("SELECT COALESCE(SUM(lyfd.fee_received),0) AS lastyearFees FROM `last_year_fees` lyf JOIN last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id WHERE (MONTH(lyf.receipt_date) = MONTH('$from_date') AND YEAR(lyf.receipt_date) = YEAR('$from_date') ) AND lyf.school_id = '$school_id' ");
    $lastyearFeesInfo = $getLastyearFeesQry->fetchObject();
    ?>

    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $startdate->format('M-Y');?></td>
        <td><?php echo $collectedFeesInfo->collectedFees;?></td>
        <td><?php echo $bookFeesInfo->bookFees;?></td>
        <td><?php echo $transportFeesInfo->transportFees;?></td>
        <td><?php echo $lastyearFeesInfo->lastyearFees;?></td>
        <td><?php echo $totalAmnt = $collectedFeesInfo->collectedFees + $bookFeesInfo->bookFees + $transportFeesInfo->transportFees + $lastyearFeesInfo->lastyearFees;?></td>
    </tr>

    <?php 
$schoolfee_total += $collectedFeesInfo->collectedFees;
$bookfee_total += $bookFeesInfo->bookFees;
$transportfee_total += $transportFeesInfo->transportFees;
$lastyear_total += $lastyearFeesInfo->lastyearFees;
$total += $totalAmnt;
$startdate->modify('+1 month');
} ?>
    <tr style="font-weight: bold;">
        <td><?php echo $i;?></td>
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
        $('#show_monthwise_fees_summary').DataTable({
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