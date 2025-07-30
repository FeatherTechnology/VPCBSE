<?php 
if(isset($_GET['application_id']))
{
    $idupd=$_GET['application_id'];
}

//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($idupd)){
echo "Data Error";
exit;
 }

$sql="SELECT course_fees from initiate_application where application_id='$idupd'";
$row=$mysqli->query($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
   
    ?>