<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $academic_year = $_SESSION["academic_year"];
}

$column = array(
    'area_id',
    'area_name',
    'transport_amount',
    'status'
);

$query = "SELECT * FROM area_creation WHERE  school_id='$school_id' AND year_id='$academic_year'";
// print_r($query);
if($_POST['search']!="");
{
    if (isset($_POST['search'])) {

        if($_POST['search']=="Active")
        {
            $query .="AND status=0 "; 
        }
        else if($_POST['search']=="Inactive")
        {
            $query .="AND status=1 ";
        }

        else{	
            $query .= "
            
            AND area_name LIKE  '%".$_POST['search']."%' 
            AND transport_amount LIKE '%".$_POST['search']."%'
           AND status LIKE '%".$_POST['search']."%'  ";
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
    
    $sub_array[] = $row['area_name'];
    $sub_array[] = $row['transport_amount'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id   = $row['area_id'];
	
	$action="<a href='area_creation&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='area_creation&del=$id' title='Delete details' class='delete_area'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $school_id = $_SESSION["school_id"];
        $academic_year = $_SESSION["academic_year"];
    }
    $query     = "SELECT * FROM area_creation WHERE  school_id='$school_id' AND year_id='$academic_year'";
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