<?php
include('ajaxconfig.php');

$mail='';
if(isset($_POST["mail"])){
    $mail = $_POST["mail"];
}

    $getschool = "SELECT user_name FROM user WHERE user_name='$mail'";
    $res = $mysqli->query($getschool) or die("Error in Get All Records".$mysqli->error);
    if ($mysqli->affected_rows > 0) {
        $response = true;
    }else{
        $response = false;
    }

    echo json_encode($response);
$mysqli->close();
$connect = null;

?>