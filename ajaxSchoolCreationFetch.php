<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id= $_SESSION["school_id"];
}

$column = array(
    'school_id',
    'school_name',
    'school_login_name',
    'contact_number',
    'address1',
    'district',
    'state', 
    'email_id', 
    'status'
);

$query = "SELECT sc.school_id,sc.school_name,sc.school_login_name,sc.district,sc.address1,sc.address2,sc.address3,st.state,sc.contact_number,sc.email_id,sc.web_url,sc.status  FROM school_creation sc LEFT JOIN state_creation st ON st.id = sc.state WHERE school_id='$school_id' ";

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
            
            AND( sc.school_name LIKE  '%".$_POST['search']."%'
            OR sc.school_login_name LIKE '%".$_POST['search']."%'
            OR sc.contact_number LIKE '%".$_POST['search']."%'
            OR sc.address1 LIKE '%".$_POST['search']."%'
            OR sc.district LIKE '%".$_POST['search']."%'
            OR st.state LIKE '%".$_POST['search']."%'
            OR sc.email_id LIKE '%".$_POST['search']."%'
            OR sc.status LIKE '%".$_POST['search']."%') ";
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
    
    $sub_array[] = $row['school_name'];
    $sub_array[] = $row['school_login_name'];
    $sub_array[] = $row['address1'];    
    $sub_array[] = $row['contact_number'];
    $sub_array[] = $row['email_id'];    
    $sub_array[] = $row['district'];
    $sub_array[] = $row['state'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id   = $row['school_id'];
	
	$action="<a href='school_creation&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='school_creation&del=$id' title='Delete details' class='delete_school'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT sc.school_id,sc.school_name,sc.school_login_name,sc.district,sc.address1,sc.address2,sc.address3,st.state,sc.contact_number,sc.email_id,sc.web_url,sc.status  FROM school_creation sc LEFT JOIN state_creation st ON st.id = sc.state";
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