<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id= $_SESSION["school_id"];
}

$column = array(
    'trust_id',
    'trust_name',
    'contact_person',
    'contact_number',
    'address1',
    'place',
    'pincode', 
    'email_id', 
    'website', 
    'pan_number', 
    'tan_number', 
    'status'
);
//WHERE school_id='$school_id'
$query = "SELECT * FROM trust_creation WHERE 1";

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
            
            AND trust_name LIKE  '%".$_POST['search']."%'
            AND contact_person LIKE '%".$_POST['search']."%'
            AND contact_number LIKE '%".$_POST['search']."%'
            AND address1 LIKE '%".$_POST['search']."%'
            AND place LIKE '%".$_POST['search']."%'
            AND pincode LIKE '%".$_POST['search']."%'
            AND email_id LIKE '%".$_POST['search']."%'
            AND website LIKE '%".$_POST['search']."%'
            AND pan_number LIKE '%".$_POST['search']."%'
            AND tan_number LIKE '%".$_POST['search']."%'
            AND status LIKE '%".$_POST['search']."%' ";
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
    
    $sub_array[] = $row['trust_name'];
    $sub_array[] = $row['contact_person'];
    $sub_array[] = $row['contact_number'];
    $sub_array[] = $row['address1'];
    $sub_array[] = $row['place'];
    $sub_array[] = $row['pincode'];
    $sub_array[] = $row['email_id'];
    $sub_array[] = $row['website'];
    $sub_array[] = $row['pan_number'];  
    $sub_array[] = $row['tan_number'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id   = $row['trust_id'];
	
	$action="<a href='trust_creation&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='trust_creation&del=$id' title='Delete details' class='delete_trust'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $school_id= $_SESSION["school_id"];
    }
     
    $query     = "SELECT * FROM trust_creation WHERE school_id='$school_id'";
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