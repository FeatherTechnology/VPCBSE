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

<table class="table table-bordered" id="show_student_transport_list">
    <thead>
        <th>S.No</th>
        <th>Student Name</th>
        <th>Medium</th>
        <th>Standard & Section</th>
        <th>Mobile No</th>
        <th>Area Name</th>
        <th>Bus stopping</th>
        <th>Bus.No</th>
        <th>Amount</th>
    </thead>
    <tbody>

<?php
$getStudentListQry = $connect->query("SELECT sc.student_name, std.standard, sh.section, sc.sms_sent_no, ac.area_name, sc.transportstopping, sc.busno, ac.transport_amount 
FROM `student_creation` sc 
JOIN student_history sh  ON sh.student_id = sc.student_id
JOIN standard_creation std ON sh.standard = std.standard_id 
JOIN area_creation ac ON sh.transportarearefid = ac.area_id 
WHERE sh.academic_year = '$academicyear' && sc.medium = '$stdMedium' && ('$stdStandard' = '0' || sh.standard = '$stdStandard') && ('$stdSection' = '0' || sh.section = '$stdSection') && sc.status = '0' && sc.school_id = '$school_id' ");
$i=1;
while($studentList = $getStudentListQry->fetchObject()){
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $studentList->student_name; ?></td>
        <td><?php echo ($stdMedium == '1') ? 'Tamil' : 'English'; ?></td>
        <td><?php echo $studentList->standard.' - '.$studentList->section; ?></td>
        <td><?php echo $studentList->sms_sent_no; ?></td>
        <td><?php echo $studentList->area_name; ?></td>
        <td><?php echo $studentList->transportstopping; ?></td>
        <td><?php echo $studentList->busno; ?></td>
        <td><?php echo $studentList->transport_amount; ?></td>
    </tr>
<?php } ?>
    </tbody>
    </table>

<script>
    $(document).ready(function(){
        $('#show_student_transport_list').DataTable({
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