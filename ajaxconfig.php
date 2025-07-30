<?php
$timeZoneQry = "SET time_zone = '+5:30' ";

$mysqli =mysqli_connect("mysql5050.site4now.net", "a4650b_vpcbse", "School@123", "db_a4650b_vpcbse") or die("Error in database connection".mysqli_error($mysqli));
mysqli_set_charset($mysqli, "utf8");
$mysqli->query($timeZoneQry);

$host = "mysql5050.site4now.net";  
$db_user = "a4650b_vpcbse";  
$db_pass = "School@123";  
$dbname = "db_a4650b_vpcbse";  

$connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass); 
$connect->exec($timeZoneQry);
?>