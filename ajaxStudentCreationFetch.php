<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}
if(isset($_SESSION["school_id"])){
    $school_id = $_SESSION["school_id"];
}
if(isset($_SESSION["academic_year"])){
    $year_id = $_SESSION["academic_year"];
}
$column = array(
    'student_id',
    'student_name',
    'standard',
    'gender',
    'flat_no',
    'status'
);

$query = "SELECT stdc.*, sc.standard as std_name, stdc.admission_number, stdc.facility FROM student_creation stdc JOIN student_history sh ON stdc.student_id = sh.student_id JOIN standard_creation sc ON sh.standard = sc.standard_id WHERE  stdc.school_id='$school_id' AND stdc.status = '0'AND sh.academic_year = '$year_id'";

if($_POST['search']!="");
{
    if (isset($_POST['search'])) {

        if($_POST['search']=="Active")
        {
            $query .="and status=0 "; 
        }
        else if($_POST['search']=="Inactive")
        {
            $query .="and status=1 ";
        }

        else{	
            $query .= "
            AND (student_name LIKE  '%".$_POST['search']."%'
            OR stdc.standard LIKE '%".$_POST['search']."%'
            OR gender LIKE '%".$_POST['search']."%'
            OR flat_no LIKE '%".$_POST['search']."%'
            OR stdc.status LIKE '%".$_POST['search']."%') ";
        }
    }
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= ' ';
}

$query1 = '';

if ($_POST['length'] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $connect->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

$sno = 1;
foreach ($result as $row) {
    $sub_array   = array();
    
    if($sno!="")
    {
        $sub_array[] = $sno;
    }
    
    $sub_array[] = $row['student_name'];
    $sub_array[] = $row['std_name'];
    $sub_array[] = $row['gender'];
    $sub_array[] = $row['flat_no'];
    $facility = $row['facility'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}

	$id   = $row['student_id'];
	$admissionNo   = $row['admission_number'];
	
	$action="<div class='bd-example'>
    <div class='btn-group dropstart'>
        <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
        
        </button>
        <ul class='dropdown-menu'>
        <li><a id='editemai' class='dropdown-item' href='student_creation&upd=$id'><span class='icon-border_color'></span> Edit</a></li>
        <li><input type='hidden' name='student_id1' id='student_id1' value='$id'></li>
        <li><button type='button' data-id='$id' data-toggle='modal' data-target='#rejectModal' class='btn rejectpo' id='rejectStud' title='Delete student'><span class='icon-x-circle'></span>&nbsp;Delete</button></li>
        <li><button type='button' data-no='$admissionNo' data-id='$id' data-toggle='modal' data-target='.attachmentModal' class='btn attachmentFiles' title='student Attachment'><span class='icon-attachment1'></span>&nbsp;Attachments</button></li>
        <li><a class='dropdown-item' href='pay_fees&pagename=stdcreation&upd=$id'><span class='icon-dollar-sign'></span> Pay Fees</a></li>
        <li><a class='dropdown-item' href='last_year_fees_pay&pagename=stdcreation&upd=$id'><span class='icon-dollar-sign'></span> Last Year Fees</a></li>";
        
        if($facility == 'Transport'){
        $action .= "<li><a class='dropdown-item' href='transport_fees&pagename=stdcreation&upd=$id'><span class='icon-dollar-sign'></span> Pay Transport Fees</a></li>"; 
        }

        // <li><a class='dropdown-item' href='#'><span class='icon-message'></span> Individual SMS</a></li>
    $action .="</ul>
        </div>
        </div>";
        // <li><a class='dropdown-item' href='#'><span class='icon-attachment1'></span> Attachments</a></li>

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $school_id = $_SESSION["school_id"];
        $year_id = $_SESSION["year_id"];
    }
    $query     = "SELECT * FROM student_creation WHERE  school_id='$school_id' AND year_id='$year_id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data
);

echo json_encode($output);
?>