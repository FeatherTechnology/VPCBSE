<?php
include 'ajaxconfig.php';
@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}
$academic_year = $_SESSION['academic_year'];
if(isset($_POST['type'])){
    $type = $_POST['type'];  
}
if(isset($_POST['standard'])){
    $standard = $_POST['standard'];  
}
if(isset($_POST['section'])){
    $section = $_POST['section']; 
}

if($type == '1'){
    $ctselect="SELECT sc.student_id, sc.admission_number, sc.student_name, sc.section, stdc.standard, sh.standard as std_id FROM student_creation sc JOIN student_history sh ON sc.student_id = sh.student_id JOIN standard_creation stdc ON sh.standard = stdc.standard_id WHERE sc.deleted_student = '0' AND sc.school_id = '$school_id' AND sh.standard NOT IN (13, 19, 20, 21, 22, 23) AND sh.academic_year = '$academic_year'"; 

}else{
    $ctselect="SELECT sc.student_id, sc.admission_number, sc.student_name, sc.section, stdc.standard, sh.standard as std_id FROM student_creation sc JOIN student_history sh ON sc.student_id = sh.student_id JOIN standard_creation stdc ON sh.standard = stdc.standard_id WHERE sh.standard ='".$standard."' AND sh.section ='".$section."' AND sc.deleted_student = '0' AND sc.school_id = '$school_id' AND sh.standard NOT IN (13, 19, 20, 21, 22, 23) AND sh.academic_year = '$academic_year'"; 

}
$ctresult=$mysqli->query($ctselect);
if($ctresult->num_rows>0){

while($ct=$ctresult->fetch_assoc()){
?>
<tr>
<td><input type="checkbox" class="checkbox" name="studentId[]" value="<?php echo $ct["student_id"];?>"></td>
<td><?php echo $ct["admission_number"]; ?></td>
<td><?php echo $ct["student_name"]; ?></td>
<td><input type="hidden" name="stdId[]" value="<?php echo $ct["std_id"];?>"><?php echo $ct["standard"]; ?></td>
<td><?php echo $ct["section"]; ?></td>
<td></td>
</tr>
<?php } } ?>