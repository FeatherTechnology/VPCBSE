<?php
$URLPATH="http://".$_SERVER['HTTP_HOST']."/"; 

$HOSTPATH = $URLPATH;
$ROOTPATH = $_SERVER['DOCUMENT_ROOT']."/";

$companyImagePath = $URLPATH."uploads/companyphoto/";
$companyDocumentPath = $URLPATH."uploads/companydocument/";
$allowedUploadFileExtension = array("jpg", "bmp", "jpeg", "gif", "png");

define('HOSTPATH',$HOSTPATH);
define('ROOTPATH',$ROOTPATH); 
define('UPLOADCOMPANYIMAGEPATH',$companyImagePath); 
define('UPLOADACOMPANYDOCUMENTPATH',$companyDocumentPath); 
?>
