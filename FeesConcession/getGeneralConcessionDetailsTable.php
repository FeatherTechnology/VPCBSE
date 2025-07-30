<?php
include '../ajaxconfig.php';

@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}
?>

<table class="table custom-table pending_for_approval">
    <thead>
        <tr>
            <th colspan="7"> Student Concession List Pending for Approval</th>
        </tr>
        <tr>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Address</th>
            <th>Standard</th>
            <th>Concession On</th>
            <th>Remark</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $generalConcessionQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, sc.flat_no, sc.street, sc.area_locatlity, sc.district, sc.pincode, stdc.standard, sc.concession_type FROM `student_creation` sc JOIN standard_creation stdc ON sc.standard = stdc.standard_id WHERE sc.concession_type !='' && sc.status = '0' && (sc.approval = '' || sc.approval IS NULL)  && sc.school_id = '$school_id' ");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->concession_type;?></td>
            <td></td>
            <td> 
            <button type="button" class="btn-success btn-minier"  id="add_general_concession" name="add_general_concession" data-toggle="modal" data-target=".addGeneralConcession" title="Approval" value="<?php echo $studentConcession->student_id; ?>"><i class="icon-check"></i></button>
            <button title="Reject" type="button" class="btn-danger btn-minier rejectConcession" value="<?php echo $studentConcession->student_id; ?>"><i class="icon-circle-with-cross"></i></button> </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
        </br></br></br>

<table class="table custom-table approved_list">
    <thead>
        <tr>
            <th colspan="8"> List of Concession Approved Student</th>
        </tr>
        <tr>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Address</th>
            <th>Standard</th>
            <th>Concession On</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $generalConcessionQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, sc.flat_no, sc.street, sc.area_locatlity, sc.district, sc.pincode, stdc.standard, sc.concession_type FROM `student_creation` sc JOIN standard_creation stdc ON sc.standard = stdc.standard_id WHERE sc.concession_type !='' && sc.status = '0' && sc.approval = 'Approved' && sc.school_id = '$school_id'");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->concession_type;?></td>
            <td>Approved</td>
            <td></td>
            <td></td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.pending_for_approval, .approved_list').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>