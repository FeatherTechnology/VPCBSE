<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$column = array(
    'student_id',
    'student_name',
    'standard',
    'gender',
    'flat_no',
    'status'
);

$query = "SELECT * FROM student_creation WHERE 1";
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
            OR standard LIKE '%".$_POST['search']."%'
            OR gender LIKE '%".$_POST['search']."%'
            OR flat_no LIKE '%".$_POST['search']."%'
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
    $sub_array[] = $row['standard'];
    $sub_array[] = $row['gender'];
    $sub_array[] = $row['flat_no'];
    
    $status      = $row['status'];
    if($status == 1)
	{
	$sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
	}
	else
	{
    $sub_array[] = "<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
	}

    // dropdown list ui design
    // <ul class='dropdown-menu'>
    //     <li><a class='dropdown-item' href='student_creation&upd=$id'><span class='icon-border_color'></span></a></li>
    //     <li><a class='dropdown-item' href='student_creation&del=$id'><span class='icon-trash-2'></span></a></li>
    //     <li><a class='dropdown-item' href='#'>Attachments</a></li>
    //     <li><hr class='dropdown-divider'>Last Year Fees</li>
    //     <li><a class='dropdown-item' href='#'>Individual SMS</a></li>
    //   </ul>

	$id   = $row['student_id'];
	
	$action="<div class='bd-example'>
    <div class='btn-group dropstart'>
      <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
       
      </button>
      <ul class='dropdown-menu'><li><a class='dropdown-item' href='bonafide_certificate&upd=$id'></span>Bonafide DOB</a></li>
        <li><a class='dropdown-item' href='bonafide_community_certificate&upd=$id'></span> Bonafide Certificate</a></li>
       
      </ul>
    </div>
  </div>";

	$sub_array[] = $action;
    $data[]      = $sub_array;
    $sno = $sno + 1;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM student_creation";
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