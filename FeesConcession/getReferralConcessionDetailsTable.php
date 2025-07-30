<?php
include '../ajaxconfig.php';
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}
?>

<table class="table custom-table referral_pending_for_approval">
    <thead>
        <tr>
            <th colspan="8"> Student Referral List Pending for Approval</th>
        </tr>
        <tr>
            <th>Reference code</th>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Standard</th>
            <th>Type</th>
            <th>Remark</th>
            <th>Referred By</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $generalConcessionQry = $connect->query("SELECT 
        sc.student_id, 
        sc.admission_number, 
        sc.student_name, 
        sc.flat_no, 
        sc.street, 
        sc.area_locatlity, 
        sc.district, 
        sc.pincode, 
        stdc.standard, 
        sc.referencecat,
        rd.referred_by,
        rd.ref_code,
        rd.ref_student_id
        FROM 
            student_creation sc 
        JOIN 
            standard_creation stdc ON sc.standard = stdc.standard_id
        LEFT JOIN 
            referral_details rd ON sc.student_id = rd.student_id
        WHERE 
        sc.referencecat != '' AND sc.status = '0' AND (sc.approval = '' || sc.approval IS NULL) && sc.school_id = '$school_id'");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->ref_code;?></td>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->referencecat;?></td>
            <td><?php echo $studentConcession->referred_by;?></td>
            <td> 
            <button type="button" class="btn-success btn-minier"  id="add_referral_concession" name="add_referral_concession" data-toggle="modal" data-target=".addGeneralConcession" title="Approval" data-id="<?php echo $studentConcession->ref_student_id; ?>" value="<?php echo $studentConcession->student_id; ?>"><i class="icon-check"></i></button>
            <button title="Reject" type="button" class="btn-danger btn-minier rejectConcession" value="<?php echo $studentConcession->student_id; ?>"><i class="icon-circle-with-cross"></i></button> </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</br></br></br>

<table class="table custom-table referral_approved_list">
    <thead>
        <tr>
            <th colspan="7"> List of Referral Approved Student</th>
        </tr>
        <tr>
            <th>Reference code</th>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Standard</th>
            <th>Type</th>
            <th>Remark</th>
            <th>Referred By</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $generalConcessionQry = $connect->query("SELECT 
        sc.student_id, 
        sc.admission_number, 
        sc.student_name, 
        sc.flat_no, 
        sc.street, 
        sc.area_locatlity, 
        sc.district, 
        sc.pincode, 
        stdc.standard, 
        sc.referencecat,
        rd.referred_by,
        rd.ref_code,
        rd.ref_student_id
        FROM 
            student_creation sc 
        JOIN 
            standard_creation stdc ON sc.standard = stdc.standard_id
        LEFT JOIN 
            referral_details rd ON sc.student_id = rd.student_id
        WHERE 
        sc.referencecat != '' AND sc.status = '0' AND sc.approval = 'Approved' && sc.school_id = '$school_id'");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->ref_code;?></td>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->referencecat;?></td>
            <td><?php echo $studentConcession->referred_by;?></td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.referral_pending_for_approval, .referral_approved_list').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>