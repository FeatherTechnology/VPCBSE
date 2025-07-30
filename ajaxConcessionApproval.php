<?php
@session_start();
include('ajaxconfig.php');

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$column = array(
    'pay_fees_id ',
    'student_id',
    'receipt_number',
    'receipt_date',
    'grp_amount',
    'grp_amount_received',
    'grp_balance',
    'approvedstatus'
);

$query = "SELECT * FROM pay_fees WHERE 1 and approvedstatus = 0 ";

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
            and pay_fees_id  LIKE  '%".$_POST['search']."%'
            OR student_id LIKE '%".$_POST['search']."%'
            OR receipt_number LIKE '%".$_POST['search']."%'
            OR receipt_date LIKE '%".$_POST['search']."%'
            OR grp_amount LIKE '%".$_POST['search']."%'
            OR grp_amount_received LIKE '%".$_POST['search']."%' 
            OR grp_balance LIKE '%".$_POST['search']."%' ";
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
    $approvedstatus = $row["approvedstatus"];

    if($approvedstatus==0)
    {
        $sub_array[] = $row['pay_fees_id '];
        $student_id = '';
        $student_id = $row['student_id'];
        $gvq = $mysqli->query("SELECT * FROM student_creation WHERE student_id ='".$student_id."' ");
        while($row1=$gvq->fetch_assoc()){
            $student_name = $row1["student_name"];
            $studentrollno = $row1["studentrollno"];
            $student_name = $row1["student_name"];
            $student_name = $row1["student_name"];
        }
        $sub_array[] = $student_idname;

        $receipt_number="";
        $receipt_number1 = $row['receipt_number'];
            $sfqry = $mysqli->query("SELECT temple_name FROM temple_creation WHERE temple_id = '".$receipt_number1."' ");
            while ($row2=$sfqry->fetch_assoc()){
            $receipt_number = $row2["temple_name"];
            }
      
        // else if($receipt_number[0] == 'b'){
        //     $Sreceipt_number = ltrim($receipt_number, 'b');
        //     $sfqry = $mysqli->query("SELECT branchname FROM branch WHERE branchid = '".$Sreceipt_number."' ");
        //     while ($row2=$sfqry->fetch_assoc()){
        //     $receipt_number1 = $row2["branchname"];
        //     }
        // }

        $sub_array[] = $receipt_number; 
        
        $sub_array[] = $row['receipt_date'];
        $sub_array[] = $row['grp_amount'];
        $sub_array[] = $row['grp_amount_received'];
        $action ="<button type='button' class='btn btn-success approvepo' title='Edit details'><span class='icon-check-circle'></span>&nbsp;Approve</button> &nbsp; <button type='button' data-toggle='modal' data-target='#rejectModal' class='btn btn-danger rejectpo' title='Edit details'><span class='icon-x-circle'></span>&nbsp;Reject</a>";
        $sub_array[] = $action;
        $data[]      = $sub_array;
    }
    else if($approvedstatus == 1)
    {
        $sub_array[] = $row['pay_fees_id '];
        $student_idname = '';
        $student_id = $row['student_id'];
        $gvq = $mysqli->query("SELECT student_name FROM student_id WHERE student_id ='".$student_id."' ");
        while($row2=$gvq->fetch_assoc()){
            $student_idname = $row2["student_name"];
        }
        $sub_array[] = $student_idname;
        
            $receipt_number = $row['receipt_number'];
            $sfqry = $mysqli->query("SELECT temple_name FROM temple_creation WHERE temple_id = '".$receipt_number."' ");
            while ($row2=$sfqry->fetch_assoc()){
            $receipt_number = $row2["temple_name"];
            }
        
        // else if($receipt_number[0] == 'b'){
        //     $Sreceipt_number = ltrim($receipt_number, 'b');
        //     $sfqry = $mysqli->query("SELECT branchname FROM branch WHERE branchid = '".$Sreceipt_number."' ");
        //     while ($row2=$sfqry->fetch_assoc()){
        //     $receipt_number1 = $row2["branchname"];
        //     }
        // }
        $sub_array[] = $receipt_number;

        $sub_array[] = $row['receipt_date'];
        $sub_array[] = $row['grp_amount'];
        $sub_array[] = $row['grp_amount_received'];
        $action ="<button  class='btn btn-info printpo'><span class='icon-print'></span>&nbsp; Print</button>";
        
        // $action ="<button  class='btn btn-info printpo'><span class='icon-print'></span>&nbsp; Print</button>&nbsp;<a href='mailto:feather@gmail.com'> <button type='button' id='mailpo' class='btn btn-warning mailpo'><span class='icon-mail'></span>&nbsp; Mail</button></a>&nbsp; <button class='btn btn-success whatsapppo'><span class='icon-send1'></span>&nbsp; Whatsapp</button>&nbsp; <button class='btn btn-warning smspo'><span class='icon-typing'></span>&nbsp; SMS</button>&nbsp;";
        $sub_array[] = $action;
        $data[]      = $sub_array;
    }
    else{
        continue;
    }  
}

if($userid != 1){
    function count_all_data($connect)
    {
        $query     = "SELECT * FROM purchaseorder WHERE 1 AND status = 0 ";
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
}else{
    function count_all_data($connect)
    {
        $query     = "SELECT * FROM purchaseorder";
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
}

echo json_encode($output);

?>