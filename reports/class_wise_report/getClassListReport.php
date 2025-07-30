<?php
include "../../ajaxconfig.php";
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}

if(isset($_POST['academicyear'])){
    $academicyear = $_POST['academicyear'];
}
if(isset($_POST['stdMedium'])){
    $stdMedium = $_POST['stdMedium'];
}
if(isset($_POST['stdStandard'])){
    $stdStandard = $_POST['stdStandard'];
}
if(isset($_POST['stdSection'])){
    $stdSection = $_POST['stdSection'];
}
?>

<table class="table table-bordered" id="show_student_classwise_list">
    <thead>
        <th>Student Name</th>
        <th>Standard</th>
        <th>Section</th>
        <th>Father Name</th>
        <th>Mother Name</th>
        <th>Admission Number</th>
        <th>Gender</th>
        <th>Mobile No</th>
        <th>Address</th>
    </thead>
    <tbody>

<?php
$getStudentListQry = $connect->query("SELECT student_name, std.standard, sh.section, father_name, mother_name, admission_number, gender, flat_no, street, area_locatlity, district, pincode, sms_sent_no FROM `student_creation` sc JOIN student_history sh  ON sh.student_id = sc.student_id JOIN standard_creation std ON sh.standard = std.standard_id WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' && sh.standard = '$stdStandard' && sh.section = '$stdSection' && sc.status = '0' && sc.school_id = '$school_id' ");
while($studentList = $getStudentListQry->fetchObject()){
?>
    <tr>
        <td><?php echo $studentList->student_name; ?></td>
        <td><?php echo $studentList->standard; ?></td>
        <td><?php echo $studentList->section; ?></td>
        <td><?php echo $studentList->father_name; ?></td>
        <td><?php echo $studentList->mother_name; ?></td>
        <td><?php echo $studentList->admission_number; ?></td>
        <td><?php echo $studentList->gender; ?></td>
        <td><?php echo $studentList->sms_sent_no; ?></td>
        <td><?php echo $studentList->flat_no.', '.$studentList->street.', '.$studentList->area_locatlity.', '.$studentList->district.', '.$studentList->pincode; ?></td>
    </tr>
<?php } ?>
    </tbody>
    </table>

<script>
    $(document).ready(function(){
        $('#show_student_classwise_list').DataTable({
            order: [[0, "asc"]],
            columnDefs: [
                { type: 'natural', targets: 0 }
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>