<?php
include '../../ajaxconfig.php';
session_start();
if (isset($_SESSION["academic_year"])) {
    $currentAcademicYear = $_SESSION["academic_year"];
}

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
}
?>
<b>Click Here</b>
<button type="button" class="btn btn-primary" id="button1" onclick="paidtranFeesdetail()"><span class="icon-keyboard_tab"></span>&nbsp;Transport Paid Fees Details</button>
<button type="button" class="btn btn-primary" id="button2" onclick="paidFeesdetail()" style="display:none"><span class="icon-keyboard_tab"></span>&nbsp;Paid Fees Details</button>
<table class="table custom-table" id="paid_details_table">
    <thead>
        <tr>
            <th colspan="7"><span class="icon-list"></span> <span id="tabletitle">Pay Fees</span>  Paid Details</th>
        </tr>
        <tr>
            <th width="50">S.No</th>
            <th>Receipt Date</th>
            <th>Receipt Number</th>
            <th>Receipt Number In Detail</th>
            <th>Particulars</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $a = 1;
        //Admission fees paid details///////////////////////////////////
        $getAdmissionFees = $connect->query("SELECT af.id, af.receipt_date, af.receipt_no, af.academic_year, GROUP_CONCAT( CASE WHEN(afd.fees_table_name ='grptable') THEN gcf.grp_particulars ELSE CASE WHEN(afd.fees_table_name ='extratable') THEN ecaf.extra_particulars ELSE CASE WHEN(afd.fees_table_name ='amenitytable') THEN aff.amenity_particulars END END END ORDER BY afd.fees_table_name SEPARATOR ', ') as particulars, af.fees_collected  
        FROM admission_fees af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id
        LEFT JOIN group_course_fee gcf ON afd.fees_table_name = 'grptable' AND afd.fees_id = gcf.grp_course_id 
        LEFT JOIN extra_curricular_activities_fee ecaf ON afd.fees_table_name = 'extratable' AND afd.fees_id = ecaf.extra_fee_id 
        LEFT JOIN amenity_fee aff ON afd.fees_table_name = 'amenitytable' AND afd.fees_id = aff.amenity_fee_id 
        WHERE af.admission_id = '$student_id' && afd.fee_received != '0' && af.academic_year ='$currentAcademicYear' GROUP BY af.receipt_no ORDER BY af.id DESC ");
        if ($getAdmissionFees->rowCount() > 0) {         
            while($admissionFeesInfo = $getAdmissionFees->fetch()) {
        ?>
                        <tr id="pay_fee_table" class="pay_fee_table">
                            <input type="hidden" class="fees_id" value="<?php echo $admissionFeesInfo['id']; ?>" >
                            <input type="hidden" class="student_id" value="<?php echo $student_id; ?>" >
                            <input type="hidden" class="academicyear" value="<?php echo $admissionFeesInfo['academic_year']; ?>" >
                            <td><?php echo $a++; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($admissionFeesInfo['receipt_date'])); ?></td>
                            <td><?php echo $admissionFeesInfo['receipt_no']; ?></td>
                            <td><?php echo $admissionFeesInfo['receipt_no'] . ' (' . $admissionFeesInfo['academic_year'] . ')'; ?></td>
                            <td><?php echo $admissionFeesInfo['particulars'];  ?></td>
                            <td><?php echo $admissionFeesInfo['fees_collected']; ?></td>
                            <td>
                                <a class='printpo'><span class='icon-print'></span>&nbsp;</a> &nbsp;
                                <a class="delete_payfees"><span class='icon-trash-2'></span></a>
                            </td>
                        </tr>
            <?php
            }
        }

/////////////////Last Year Fees////////////////////////////////////

$getLastAdmissionFees = $connect->query("SELECT lyf.id, lyf.receipt_date, lyf.receipt_no, lyf.academic_year,    GROUP_CONCAT(
        CASE 
            WHEN lfd.fees_table_name = 'grptable' THEN gcf.grp_particulars
            WHEN lfd.fees_table_name = 'extratable' THEN ecaf.extra_particulars
            WHEN lfd.fees_table_name = 'amenitytable' THEN aff.amenity_particulars
            WHEN lfd.fees_table_name = 'transport' THEN acp.particulars
        END
        ORDER BY lfd.fees_table_name 
        SEPARATOR ', '
    ) AS particulars, 
    lyf.fees_collected  
FROM last_year_fees lyf 
JOIN last_year_fees_details lfd ON lyf.id = lfd.admission_fees_ref_id
LEFT JOIN group_course_fee gcf ON lfd.fees_table_name = 'grptable' AND lfd.fees_id = gcf.grp_course_id 
LEFT JOIN extra_curricular_activities_fee ecaf ON lfd.fees_table_name = 'extratable' AND lfd.fees_id = ecaf.extra_fee_id 
LEFT JOIN amenity_fee aff ON lfd.fees_table_name = 'amenitytable' AND lfd.fees_id = aff.amenity_fee_id 
LEFT JOIN area_creation_particulars acp ON 
    lfd.fees_table_name = 'transport' AND lfd.fees_id = acp.particulars_id
WHERE lyf.admission_id = '$student_id' && lfd.fee_received != '0' && lyf.academic_year ='$currentAcademicYear' GROUP BY lyf.receipt_no ORDER BY lyf.id DESC ");
if ($getLastAdmissionFees->rowCount() > 0) {
 
    while($lastadmissionFeesInfo = $getLastAdmissionFees->fetch()) {
?>
                <tr id="pay_fee_table" class="pay_fee_table">
                    <input type="hidden" class="fees_id" value="<?php echo $lastadmissionFeesInfo['id']; ?>" >
                    <input type="hidden" class="student_id" value="<?php echo $student_id; ?>" >
                    <input type="hidden" class="academicyear" value="<?php echo $lastadmissionFeesInfo['academic_year']; ?>" >
                    <td><?php echo $a++; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($lastadmissionFeesInfo['receipt_date'])); ?></td>
                    <td><?php echo $lastadmissionFeesInfo['receipt_no']; ?></td>
                    <td><?php echo $lastadmissionFeesInfo['receipt_no'] . ' (' . $lastadmissionFeesInfo['academic_year'] . ')'; ?></td>
                    <td><?php echo $lastadmissionFeesInfo['particulars'];  ?></td>
                    <td><?php echo $lastadmissionFeesInfo['fees_collected']; ?></td>
                    <td>
                        <a class='printpo'><span class='icon-print'></span>&nbsp;</a> &nbsp;
                        <a class="delete_lastpayfees"><span class='icon-trash-2'></span></a>
                    </td>
                </tr>
    <?php
    }
}

///////////////////////////////////////////////////////////////////
    ////Transport fees receipt details. ///////////////////////////////
   
        $getTransportPaidDetails = $connect->query("SELECT taf.id, taf.receipt_date, taf.receipt_no, taf.academic_year, acp.particulars, tafd.fee_received
        FROM `transport_admission_fees` taf 
        JOIN transport_admission_fees_details tafd ON taf.id = tafd.admission_fees_ref_id 
        JOIN area_creation ac ON tafd.area_creation_id = ac.area_id
        JOIN area_creation_particulars acp ON tafd.area_creation_particulars_id = acp.particulars_id 
        WHERE taf.admission_id = '$student_id' && taf.academic_year = '$currentAcademicYear' && tafd.fee_received != '0' order by taf.id DESC ");
        if ($getTransportPaidDetails->rowCount() > 0) {
            $b =1;
            while ($transportfeeInfo = $getTransportPaidDetails->fetch()) {
                ?>
                <tr id="pay_trans_fee_table" class="pay_trans_fee_table" style="display:none;">
                    <input type="hidden" class="fees_id" value="<?php echo $transportfeeInfo['id']; ?>" >
                    <input type="hidden" class="student_id" value="<?php echo $student_id; ?>" >
                    <input type="hidden" class="academicyear" value="<?php echo $transportfeeInfo['academic_year']; ?>" >
                    <td><?php echo $b++; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($transportfeeInfo['receipt_date'])); ?></td>
                    <td><?php echo $transportfeeInfo['receipt_no']; ?></td>
                    <td><?php echo $transportfeeInfo['receipt_no'] . ' (' . $transportfeeInfo['academic_year'] . ')'; ?></td>
                    <td><?php echo $transportfeeInfo['particulars'];  ?></td>
                    <td><?php echo $transportfeeInfo['fee_received']; ?></td>
                    <td>
                        <a class='print_transport_fees'><span class='icon-print'></span>&nbsp;</a> &nbsp;
                        <a class="delete_transportfees"><span class='icon-trash-2'></span></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#paid_details_table').DataTable({
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'colvis',
                    collectionLayout: 'fixed four-column',
                }
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });

    function paidtranFeesdetail() {
        $('#tabletitle').text('Transport Fees ')
        $('#button1').hide();
        $('#button2').show();
        $('.pay_trans_fee_table').show();
        $('.pay_fee_table').hide();
    }
    
    function paidFeesdetail() {
        $('#tabletitle').text('Pay Fees ')
        $('#button1').show();
        $('#button2').hide();
        $('.pay_trans_fee_table').hide();
        $('.pay_fee_table').show();
    }

</script>