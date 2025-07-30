<?php
include('../ajaxconfig.php');
@session_start();
if(isset($_SESSION["userid"])){

    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
    $curdate = date('Y',strtotime($_SESSION["curdateFromIndexPage"]));
}
$id  = $_POST['staffId'];

if($id !=''){
    $select = $mysqli->query("SELECT employee_no FROM staff_creation WHERE id = '$id' ");
    // SELECT employee_no FROM staff_creation WHERE id = '$id' AND school_id='$school_id' AND year_id='$year_id'
    $code = $select ->fetch_assoc();
    $employee_no = $code['employee_no'];

}else{
$myStr = "STF-".$curdate;
$selectIC = $mysqli->query("SELECT employee_no FROM staff_creation WHERE employee_no != '' AND school_id='$school_id' AND year_id='$year_id' ");
if($selectIC->num_rows>0)
{
    $codeAvailable = $mysqli->query("SELECT employee_no FROM staff_creation WHERE employee_no != '' AND school_id='$school_id' AND year_id='$year_id' ORDER BY id DESC LIMIT 1");
    while($row = $codeAvailable->fetch_assoc()){
        $ac2 = $row["employee_no"];
    }
    // $appno2 = ltrim(strstr($ac2, '-'), '-'); $appno2 = $appno2+1;
    // $employee_no = $myStr."-". "$appno2";
    $parts = explode('-', $ac2);
    $appno2 = $parts[2] + 1;
    $employee_no = $parts[0] . '-' . $parts[1] . '-' . $appno2;

}
else
{
    $initialapp = $myStr."-1001";
    $employee_no = $initialapp;
}
}
echo json_encode($employee_no);
?>