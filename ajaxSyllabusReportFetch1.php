<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

if(isset($_POST["class_id"])){
    $class_id = $_POST["class_id"];
}
// $class_id =2;
$column = array(
    'subject_id',
    'paper_name',
    'class_id',
    'status'
);

$query = "SELECT * FROM subject_details WHERE class_id = '".$class_id."' "; 

if($_POST['search'] != '' ) 
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
            
            OR paper_name LIKE  '%".$_POST['search']."%' 
            OR class_id LIKE  '%".$_POST['search']."%' ";
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
// print_r($query);die;
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
    
    $sub_array[] = $row['paper_name'];
    // $sub_array[] = $class_id;
   
      
    // $status      = $row['status'];
    // if($status == 1)
	// {
	// $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	// }
	// else
	// {
    // $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	// }
	$id   = $row['subject_id'];
	
	$action="<a href='subject_details&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='subject_details&del=$id' title='Delete details' class='delete_holiday'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM subject_details";
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