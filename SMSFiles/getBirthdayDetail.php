<?php 
include "../ajaxconfig.php";
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $academic_year = $_SESSION["academic_year"];
}
$getBirthdayQry = $connect->query("SELECT
`student_id`,
`student_name`,
`date_of_birth`,
`sms_sent_no`
FROM
`student_creation`
WHERE
DATE_FORMAT(`date_of_birth`,'%m-%d') BETWEEN DATE_FORMAT(CURRENT_DATE(),'%m-%d') and DATE_FORMAT(CURRENT_DATE()+ INTERVAL 7 DAY,'%m-%d')
AND school_id ='$school_id' AND year_id ='$academic_year' ");

    while($getBirthdayDetails = $getBirthdayQry->fetchObject()){
?>
    <tr>
        <td><?php echo $getBirthdayDetails->student_name; ?></td>
        <td><?php echo date('d-m-Y', strtotime($getBirthdayDetails->date_of_birth)); ?></td>
        <td><?php echo $getBirthdayDetails->sms_sent_no; ?></td>
        <td id="smsTostudent"><span class="icon-mail"></span></td>
    </tr>
<?php } ?>