<?php
@session_start();
include('ajaxconfig.php');

$column = array(
    'bankid',
    'bankcode',
    'bankname',
    'accountno',
    'branchname',
    'shortform',
    'purpose',
    'mailid',
    'ifsccode',
    'contactperson',
    'contactno',
    'micrcode',
    'typeofaccount',
    'undersubgroup',
    'fgroup',
    'ledgername',
    'costcenter',
    'status'
);

$query = "SELECT * FROM bankmaster where 1  ";
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
 and bankcode LIKE  '%".$_POST['search']."%'
 OR bankname LIKE '%".$_POST['search']."%'
 OR accountno LIKE '%".$_POST['search']."%'
 OR branchname LIKE '%".$_POST['search']."%'
 OR shortform LIKE '%".$_POST['search']."%'
 OR purpose LIKE '%".$_POST['search']."%'
 OR mailid LIKE '%".$_POST['search']."%'
 OR ifsccode LIKE '%".$_POST['search']."%'
 OR contactperson LIKE '%".$_POST['search']."%'
 OR contactno LIKE '%".$_POST['search']."%'
 OR micrcode LIKE '%".$_POST['search']."%'
 OR typeofaccount LIKE '%".$_POST['search']."%'
 OR undersubgroup LIKE '%".$_POST['search']."%'
 OR fgroup LIKE '%".$_POST['search']."%'
 OR ledgername LIKE '%".$_POST['search']."%'
 OR costcenter LIKE '%".$_POST['search']."%' ";
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

foreach ($result as $row) {
    $sub_array   = array();
    $sub_array[] = $row['bankcode'];
    $sub_array[] = $row['bankname'];
    $sub_array[] = $row['accountno'];
    $sub_array[] = $row['branchname'];
    $sub_array[] = $row['shortform'];

    $purposeid = $row['purpose'];
    $purposename = '';
    $getqry="SELECT purposeid,purposename FROM purpose WHERE purposeid ='".strip_tags($purposeid)."' and status=0";

    $res11=$mysqli->query($getqry);
    while($row11=$res11->fetch_assoc())
    {
        $purposename           = $row11["purposename"];        
    }

    $sub_array[] = $purposename;  
    $sub_array[] = $row['mailid'];
    $sub_array[] = $row['ifsccode'];
    $sub_array[] = $row['contactperson'];
    $sub_array[] = $row['contactno'];
    $sub_array[] = $row['micrcode'];
    $sub_array[] = $row['typeofaccount'];
    $subgroup   =  $row['undersubgroup'];

    $getsubgroup = $mysqli->query("SELECT AccountsName FROM accountsgroup WHERE Id = '".$subgroup."' ");
    while($row1 = $getsubgroup->fetch_assoc()){
       $sub_array[] = $row1["AccountsName"];
    }

    $fgroup       = $row['fgroup'];
    $getsubgroup  = $mysqli->query("SELECT AccountsName FROM accountsgroup WHERE Id = '".$fgroup."' ");
    while($row1   = $getsubgroup->fetch_assoc()){
       $sub_array[] = $row1["AccountsName"];
    }

    $sub_array[] = $row['ledgername']; 
    $costcenter  = $row['costcenter']; 
    $status      = $row['status'];

    if($costcenter==0)
    {
    $sub_array[]="<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Yes</span></span>";
    }
    else
    {
    $sub_array[]="<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>No</span></span>";
    }

    if($status==1)
    {
    $sub_array[]="<span style='width: 144px;'><span class='kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill'>Inactive</span></span>";
    }
    else
    {
    $sub_array[]="<span style='width: 144px;'><span class='kt-badge  kt-badge--success kt-badge--inline kt-badge--pill'>Active</span></span>";
    }
    $id          = $row['bankid'];
    
    $action="<a href='bank_creation&upd=$id' title='Edit details'><span class='icon-border_color'></span></a>&nbsp;&nbsp; 
    <a href='bank_creation&del=$id' title='Edit details' class='delete_bank'><span class='icon-trash-2'></span></a>";

    $sub_array[] = $action;
    $data[]      = $sub_array;
}

function count_all_data($connect)
{
    $query     = "SELECT * FROM bankmaster";
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