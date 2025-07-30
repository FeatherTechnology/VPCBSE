<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$column = array(
    'item_id',
    'description',
    'item_code',
    'grp_classification',
    'uom',
    'rate',
    'status'
);

$query = "SELECT * FROM item_creation WHERE 1";

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
            
            OR description LIKE  '%".$_POST['search']."%'
            OR item_code LIKE '%".$_POST['search']."%'
            OR grp_classification LIKE '%".$_POST['search']."%'
            OR uom LIKE '%".$_POST['search']."%'
            OR rate LIKE '%".$_POST['search']."%'
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

     // fetch course category name
     $grp_classification_name='';
     $GrpClassificationName = $row['grp_classification'];   
     $getqry = "SELECT grp_classification_name FROM grp_classification WHERE grp_classification_id ='".strip_tags($GrpClassificationName)."' and status = 0";
     $res12 = $mysqli->query($getqry);
     while($row12 = $res12->fetch_assoc())
     {
        $grp_classification_name = $row12["grp_classification_name"];        
     }
    
    $sub_array[] = $row['item_code'];
    $sub_array[] = $row['description'];
    $sub_array[] = $row['uom'];
    $sub_array[] = $grp_classification_name;
    $sub_array[] = $row['rate'];
      
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}
	$id   = $row['item_id'];
	
	$action="<a href='item_creation&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
	<a href='item_creation&del=$id' title='Delete details' class='delete_holiday'><span class='icon-trash-2'></span></a>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM item_creation";
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