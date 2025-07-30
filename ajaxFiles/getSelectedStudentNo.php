<?php
include "../ajaxconfig.php";
if(isset($_POST['checkboxValues'])){
    $checkedValue = $_POST[ 'checkboxValues' ];  // get the value of checked checkbox.

    //11, 12 standard have the sub-group, so if select 11, 12 then have to get number of all groups.
    if(in_array(14, $checkedValue)) {     // check whether 14 is in the array or not. 
        $checkedValue[] = '15';
        $checkedValue[] = '16';
        $checkedValue[] = '17';
        $checkedValue[] = '18';
    }
    if(in_array(19, $checkedValue)) {     // check whether 19 is in the array or not.
        $checkedValue[] = '20';
        $checkedValue[] = '21';
        $checkedValue[] = '22';
        $checkedValue[] = '23';
    }

    $checkboxValue =implode( ',',$checkedValue );   // convert string to array.
}

$getStaffNoQry = $connect->query("SELECT sms_sent_no FROM `student_creation` WHERE FIND_IN_SET(standard, '$checkboxValue') ");
$contactNo = array();
$i=0;
while($getStaffNoinfo=$getStaffNoQry->fetch()){
    $contactNo[$i]['contactNO'] = $getStaffNoinfo['sms_sent_no'];
$i++;
}

echo json_encode($contactNo);
?>