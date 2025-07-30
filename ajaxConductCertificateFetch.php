<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$column = array(
    'conduct_id',
    'student_name',
    'school_name',
    'school_address',
    'studied_from',
    'studied_to',
    'student_character',
    'phone_number',
    'status'
);

$query = "SELECT * FROM conduct_certificate WHERE 1";

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
            
            OR student_name LIKE  '%".$_POST['search']."%'
            OR school_name LIKE '%".$_POST['search']."%'
            OR school_address LIKE '%".$_POST['search']."%'
            OR studied_from LIKE '%".$_POST['search']."%'
            OR studied_to LIKE '%".$_POST['search']."%'
            OR student_character LIKE '%".$_POST['search']."%'
            OR phone_number LIKE '%".$_POST['search']."%'
            OR status LIKE '%".$_POST['search']."%' ";
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
    $sub_array[] = $row['school_name'];
    $sub_array[] = $row['school_address'];
    $sub_array[] = $row['studied_from'];
    $sub_array[] = $row['studied_to'];
    $sub_array[] = $row['student_character'];
    $sub_array[] = $row['phone_number'];
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id = $row['conduct_id'];
	
	$action="<a href='conduct_certificate&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp;";
	// <a href='conduct_certificate&del=$id' title='Delete details' class='delete_conduct'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM conduct_certificate";
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