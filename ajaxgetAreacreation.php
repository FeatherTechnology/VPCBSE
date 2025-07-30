<?php
include('ajaxconfig.php');
@session_start();

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
}



    $qry = "SELECT * FROM area_creation WHERE  school_id='$school_id' AND year_id='$year_id'";
    $res =$mysqli->query($qry)or die("Error in Get All Records".$mysqli->error);
    $detailrecords = array();
    $i=0;
    if ($mysqli->affected_rows>0)
    {
        while($row = $res->fetch_object())
        {
            $detailrecords[$i]['area_id']            = $row->area_id; 
            $detailrecords[$i]['area_name']       	= strip_tags($row->area_name);
            
            $i++;
        }
    }
    echo json_encode($detailrecords);

?>