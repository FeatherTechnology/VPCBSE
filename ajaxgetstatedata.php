<?php
include('ajaxconfig.php');


$getstate = "SELECT id,state FROM state_creation WHERE status='0'";
		
		$res = $mysqli->query($getstate) or die("Error in Get All Records".$mysqli->error);
		$getstate_list = array();
		$i=0;

		if ($mysqli->affected_rows>0)
		{
			while($row = $res->fetch_object()){
			
				$getstate_list[$i]['id']      = $row->id;
				$getstate_list[$i]['state']      = $row->state;
				$state_id = $row->id;
				$i++;
			}
		}


    
        $response = array(
            'state' => $getstate_list
          );
        
       
          echo json_encode($response);


?>