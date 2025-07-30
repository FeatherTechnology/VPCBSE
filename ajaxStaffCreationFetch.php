<?php
include('ajaxconfig.php');
@session_start();
if(isset($_SESSION["school_id"])){
    $school_id = $_SESSION["school_id"];
}

$column = array(
    'id',
    'first_name',
    'last_name',
    'gender',
    'area',
    'status',
    'id'
);
$query = "SELECT * FROM staff_creation  WHERE  school_id='$school_id' AND status =0 ";
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
            AND first_name LIKE  '%".$_POST['search']."%'
            AND last_name LIKE '%".$_POST['search']."%'
            AND gender LIKE '%".$_POST['search']."%'
            AND area LIKE '%".$_POST['search']."%'
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
    
    $sub_array[] = $row['first_name'];
    $sub_array[] = $row['last_name'];
    $sub_array[] = $row['gender'];
    $sub_array[] = $row['area'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}

	$id   = $row['id'];
	
	$action="<div class='bd-example'>
    <div class='btn-group dropstart'>
    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'> </button>
        <ul class='dropdown-menu'>
        <li><a class='dropdown-item' href='staff_creation&upd=$id'><span class='icon-border_color'></span> Edit</a></li>
        <li><input type='hidden' name='student_id1' id='student_id1' value='$id'></li>
        <li><a class='dropdown-item' href='staff_creation&del=$id'><span class='icon-x-circle'></span>&nbsp;Delete </a> </li>
        </ul>
    </div>
    </div>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    if(isset($_SESSION["school_id"])){
        $school_id = $_SESSION["school_id"];
    }
    $query     = "SELECT * FROM staff_creation  WHERE  school_id='$school_id' ";
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