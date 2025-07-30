<?php
$mysqli = mysqli_connect("mysql5050.site4now.net", "a4650b_vpcbse", "School@123", "db_a4650b_vpcbse") or die("Error in database connection".mysqli_error($mysqli));
mysqli_set_charset($mysqli,"utf8");
$timeZoneQry = "set time_zone = '+5:30' ";
$mysqli->query($timeZoneQry );
?>




