<?php
include "../ajaxconfig.php";
if(isset($_POST['checkedValue'])){
    $checkedValue = $_POST[ 'checkedValue' ];  // get the value of checked checkbox.
    $checkboxValue =implode( ',',$checkedValue );   // convert string to array.
}

$getStaffNoQry = $connect->query("SELECT contact_no FROM staff_creation WHERE FIND_IN_SET(designation, '$checkboxValue') ");
$contactNo = array();
$i=0;
while($getStaffNoinfo=$getStaffNoQry->fetch()){
    $contactNo[$i]['contactNO'] = $getStaffNoinfo['contact_no'];
$i++;
}

echo json_encode($contactNo);
?>