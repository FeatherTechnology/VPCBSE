<?php
include '../ajaxconfig.php';

    $getTemplateQry = $connect->query("SELECT `template_name`,`template_id`,`template` FROM sms_template WHERE status='0' ");
	$getTemplate_list = array();
	$i=0;
	if ($getTemplateQry->rowCount()>0)
	{
		while($row = $getTemplateQry->fetchObject()){
		
			$getTemplate_list[$i]['template_name']      = $row->template_name;
			$getTemplate_list[$i]['template_id']      = $row->template_id;
			$getTemplate_list[$i]['template']      = $row->template;
			$i++;
		}
	}

echo json_encode($getTemplate_list);
?>