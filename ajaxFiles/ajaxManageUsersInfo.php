<?php
include('../ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION['school_id'];
}

$column = array(
    'user_id', 
    'fullname',
    'user_name',
    'role'
);

$query = "SELECT * FROM user WHERE school_id ='$school_id' ";
if($_POST['search']!="")
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
            AND (user_id LIKE  '%".$_POST['search']."%'
            OR fullname LIKE '%".$_POST['search']."%'
            OR user_name LIKE '%".$_POST['search']."%'
            OR role LIKE '%".$_POST['search']."%') ";
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
    
    $sub_array[] = $sno++;
    $sub_array[] = $row['fullname'];
    $sub_array[] = $row['user_name'];

    $role = $row['role'];
    if($role == '1'){
        $rolename = 'System Administrator';
    
    }elseif($role == '2'){
        $rolename = 'Teaching Staff';
    
    }elseif($role == '3'){
        $rolename = 'Office Staff';
    
    }else{
        $rolename = '';
    }

    $sub_array[] = $rolename;
    
    $status      = $row['status'];
    if($status==1)
	{
	$statusname="<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $statusname="<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}

    $sub_array[] = $statusname;

	$id = $row['user_id'];
	
	$action="<a href='manage_users&upd=$id' title='Edit user'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='manage_users&del=$id' title='Delete user' class='delete_user'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM user";
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