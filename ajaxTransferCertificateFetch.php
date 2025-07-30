<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION['school_id'];
}

$column = array(
    'transfer_id',
    'serial_number',
    'tmr_code',
    'admission_number',
    'certificate_number',
    'transfer_date',
    'school_name',
    'district_educational',
    'revenue_district',
    'status'
);

$query = "SELECT * FROM transfer_certificate WHERE school_id = '$school_id' ";

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
            
            AND (serial_number LIKE  '%".$_POST['search']."%'
            OR tmr_code LIKE '%".$_POST['search']."%'
            OR admission_number	LIKE '%".$_POST['search']."%'
            OR certificate_number LIKE '%".$_POST['search']."%'
            OR transfer_date LIKE '%".$_POST['search']."%'
            OR school_name LIKE '%".$_POST['search']."%'
            OR district_educational LIKE '%".$_POST['search']."%'
            OR revenue_district LIKE '%".$_POST['search']."%'
            OR status LIKE '%".$_POST['search']."%') ";
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
    
    $sub_array[] = $row['serial_number'];
    $sub_array[] = $row['tmr_code'];
    $sub_array[] = $row['admission_number'];
    $sub_array[] = $row['certificate_number'];
    $sub_array[] = $row['transfer_date'];
    $sub_array[] = $row['school_name'];
    $sub_array[] = $row['district_educational'];
    $sub_array[] = $row['revenue_district'];
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id = $row['transfer_id'];
	
	$action="<a href='transfer_certificate&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp;
    <a class='printpo' value='$id'><span class='icon-print'></span>&nbsp;</a> &nbsp;";

    // <a href='transfer_certificate&del=$id' title='Delete details' class='delete_transfer'><span class='icon-trash-2'></span></a>

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM transfer_certificate";
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