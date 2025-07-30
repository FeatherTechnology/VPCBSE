<?php
include "../../ajaxconfig.php";
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}
if(isset($_SESSION['academic_year'])){
    $academic_year = $_SESSION['academic_year'];
}
if(isset($_POST['stdMedium'])){
    $stdMedium = $_POST['stdMedium'];
}
if(isset($_POST['stdStandard'])){
    $stdStandard = $_POST['stdStandard'];
}
?>

<style>
    .table thead th {
        vertical-align: top !important;
    }
</style>
<table class="table table-bordered table-responsive">
    <thead>
        <th>S.No</th>
        <th>Admission Number</th>
        <th>Name</th>
        <th>House of Village Name</th>
        <th>Name of Parent</th>
        <th>Name of Guardian</th>
        <th>Residence</th>
        <th>Occupation of Parent or Guardian</th>
        <th>School & Class from which pupil has come</th>
        <th>Whether on E. S. L. C issued by the Dept was produced on admission</th>
        <th>Whether T. C. from a S. S. was produced on admission</th>
        <th>Date of Admission</th>
        <th>Date of Birth</th>
        <th>Whether protected from small.pox or not</th>
        <th>Nationality & State to which the pupil belongs</th>
        <th>Religion</th>
        <th>Does the pupil belong the Scheduled Castes of Scheduled Tribes of socially & educationlly socially & educationlly backward class suspected in the Madras Educational Rules of is he a Convert from Scheduled Tribes? If So, Community Should be specified</th>
        <th>Mother tongue of the pupil</th>
        <th>Class of admission</th>
        <th>Number & Date of T. C. produced</th>
        <th>Class on leaving</th>
        <th>Date of leaving</th>
        <th>Number & Date of T.C. Issued</th>
        <th>Reasons for leaving</th>
        <th>School to Which the popil has gone</th>
        <th>Remarks</th>
    </thead>
    <tbody>

<?php

$getStudentListQry = $connect->query("SELECT * FROM `student_creation` sc JOIN student_history sh  ON sh.student_id = sc.student_id JOIN standard_creation std ON sh.standard = std.standard_id WHERE sc.medium = '$stdMedium' && sh.standard = '$stdStandard' && sc.status = '0' && sc.school_id = '$school_id' AND sh.academic_year='$academic_year' ");
$i=1;
while($studentList = $getStudentListQry->fetchObject()){
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $studentList->admission_number; ?></td>
        <td><?php echo $studentList->student_name; ?></td>
        <td><?php echo $studentList->area_locatlity; ?></td>
        <td><?php echo $studentList->father_name; ?></td>
        <td><?php echo $studentList->gaurdian_name; ?></td>
        <td><?php echo $studentList->flat_no.', '.$studentList->street.', '.$studentList->area_locatlity.', '.$studentList->district.', '.$studentList->pincode; ?></td>
        <td><?php echo $studentList->occupation; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo date('d-m-Y',strtotime($studentList->date_of_birth)); ?></td>
        <td></td>
        <td><?php echo $studentList->nationality; ?></td>
        <td><?php echo $studentList->religion; ?></td>
        <td></td>
        <td><?php echo $studentList->mother_tongue; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
<?php } ?>
    </tbody>
    </table>
