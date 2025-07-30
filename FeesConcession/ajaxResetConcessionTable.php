<?php
include '../ajaxconfig.php';
@session_start();
if(isset($_SESSION['currentAcademicYear'])){
	$currentAcademicYear = $_SESSION['currentAcademicYear']; 
}

if(isset($_POST['studentid'])){
    $student_id = $_POST['studentid']; 
} 

$ctselect="SELECT * FROM student_creation WHERE student_id='$student_id' AND status=0";
$ctresult=$mysqli->query($ctselect);
if($ctresult->num_rows>0){
	$i=1;
	while($ct=$ctresult->fetch_assoc()){
		$standard1 =$ct["standard"];
		$medium1 =$ct["medium"];
		$studentstype1 =$ct["studentstype"];
		?>
		<label style="background-color:#307ecc;color:#fff;width:100%;text-align:center" ><input style="background-color:#307ecc;color:#fff;width:100%;border:none;text-align:center" class="form-control" type="text" readonly id="student_name2" value="<?php if(isset($ct["student_name"])){ echo $ct["student_name"];}?> Fee Detail for" ></label> <input type="hidden" readonly name="standard" value="<?php if(isset($ct["standard"])){ echo $ct["standard"];}?>" >
		<?php
		$ctselect1="SELECT pay_fees_id FROM pay_fees WHERE student_id='$student_id' AND status=0";
		$ctresult1=$mysqli->query($ctselect1);
		if($ctresult1->num_rows>0){
			$i=1; 
			while($ct1=$ctresult1->fetch_assoc()){  $payfeesid =$ct1["pay_fees_id"]; ?>
				
					<input type='hidden' readonly id='pay_fees_id ' class='pay_fees_id ' name='payfeesid' value='<?php if(isset($ct1["pay_fees_id"])){ echo $ct1["pay_fees_id"];}else{ echo "0";} ?>'>

			<?php }
		}else{?>
			<input type='hidden' readonly id='pay_fees_id' class='pay_fees_id' name='payfeesid' value='0'>
		<?php }?>
	<?php }
} 
?>
																					
<style>
.tooltiptext {
visibility: hidden;
width: 120px;
background-color: #5090c0;
color: #fff;
text-align: center;
border-radius: 6px;
padding: 5px 0;

/* Position the tooltip */
position: absolute;
z-index: 1;
}
</style>	
															   
   <table id="general_concessionTable" class="table custom-table" cellspacing="0" >
			<thead>
				<tr>
				
					<!-- <th>S. No</th> -->
					<th>Fee Particularss</th>
					<th>Paid Fees</th>
					<th>Fee Amount</th>
					<th>Concession Amount</th>
					<th>Balance to be Paid</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
		
				<?php if (isset($payfeesid)) { 
				$currentAcademicYear = $_SESSION['academic_year']; 
				$school_id =$_SESSION['school_id']; 
				$ctselect="SELECT * FROM pay_fees WHERE student_id='$student_id' AND pay_fees_id='$payfeesid' AND academic_year='$currentAcademicYear' AND school_id = '$school_id' AND status=0";
				$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				// $s_array = explode(",", $ct['grp_particulars']);
				// $s_array1 = explode(",", $ct['grp_amount']);
				// $s_array6 = $ct['fees_id'];
				// if (end($s_array) === '') {
				// 	array_pop($s_array); // remove last element if it's empty
				// }
				$s_array = explode(",", $ct['grp_particulars']);
				$s_array2 = explode(",", $ct['grp_amount']);
			    $s_array3 = explode(",", $ct['amount_recieved']);
			    $s_array4 = explode(",", $ct['amount_balance']);
				$s_array5 = explode(",", $ct['grp_concession_amount']);
				
				if($ct['grp_remarks'] == NULL)
				{	$s_array6 = [];
					foreach($s_array as $val){
						array_push($s_array6,'');
					}
				}else{
					$s_array6 = explode(",", $ct['grp_remarks']);
				}
				
				// $s_array6 = end($s_array5); // Get the last element of the array
				if (end($s_array) === '') {
					array_pop($s_array); // remove last element if it's empty
				}
				for($i=0; $i< count($s_array); $i++){
				?>
					<tr>
				<td hidden>
				<input type="hidden" readonly id="grp_fees_id" name="grp_fees_id[]" class="form-control" value = ""><br></td>
				
				<td>
				<input type="text" readonly id="grp_particulars" name="grp_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees1[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br>
			</td>
				
				<td>
				
				<input type="hidden" readonly id="amount_balance" name="amount_balance1[]" class="form-control amount_balance" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>">
				<input type="number" readonly id="amount_balance1" name="amount_balance[]" class="form-control amount_balance1" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="0" onkeyup="getBalance(this)"><span class="tooltiptext"><?php if(isset($s_array5)){ echo $s_array5[$i]; }?></span><br>
				<input type="hidden" id="grp_concession_amount1" name="grp_concession_amount1[]" class="form-control grp_concession_amount1" value="<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>">
				

			    </td>
				
				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = "<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="remarks" name="remarks[]" class="form-control" value ="<?php if($s_array6[$i] != ''){ echo $s_array6[$i]; }else{  } ?>"><br></td>
					</tr>
				<?php } } } ?>
				
	  <?php }else{ 
						$currentAcademicYear = $_SESSION['academic_year']; 
						$school_id =$_SESSION['school_id']; 
							$ctselect="SELECT * FROM fees_master WHERE medium ='$medium1' AND standard='$standard1' AND student_type ='$studentstype1' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
							// print_r($ctselect);
								$ctresult=$mysqli->query($ctselect);
							if($ctresult->num_rows>0){
								$i=1;
							while($ct=$ctresult->fetch_assoc()){

								$s_array = explode(",", $ct['grp_particulars']);
								$s_array1 = explode(",", $ct['grp_amount']);
								$s_array3 = explode(",", $ct['fees_id']);
							if (end($s_array) === '') {
							array_pop($s_array); // remove last element if it's empty
							}

						for($i=0; $i< count($s_array); $i++){
					?>
				<tr>
				<td hidden>
				<input type="hidden" readonly id="grp_fees_id" name="grp_fees_id[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br></td>
				
				<td>
				<input type="text" readonly id="grp_particulars" name="grp_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees1[]" class="form-control" value = "0"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="0" onkeyup="getBalance(this)"><span class="tooltiptext">0</span><br>
				<input type="hidden" id="grp_concession_amount1" name="grp_concession_amount1[]" class="form-control grp_concession_amount1" value="0">
				</td>

				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="remarks" name="remarks[]" class="form-control" value =""><br></td>
					</tr>
				<?php } } } ?>
					<?php } ?>
			
			</tbody>
		</table> <br>
		<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
			<thead>
				<tr>
					<!-- <th>S. No</th> -->
					<th>Fee Particularss</th>
					<th>Paid Fees</th>
					<th>Fee Amount</th>
					<th>Concession Amount</th>
					<th>Balance to be Paid</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
			<?php if (isset($payfeesid)){ 


			$currentAcademicYear = $_SESSION['academic_year']; 
			$school_id =$_SESSION['school_id']; 
			$ctselect="SELECT * FROM pay_fees WHERE student_id='$student_id' AND pay_fees_id='$payfeesid' AND academic_year='$currentAcademicYear' AND school_id = '$school_id' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){

			$s_array = explode(",", $ct['extra_particulars']);
			$s_array2 = explode(",", $ct['extra_amount']);
			$s_array3 = explode(",", $ct['extra_amount_recieved']);
			$s_array4 = explode(",", $ct['extra_concession_amount']);
			$s_array5 = explode(",", $ct['extra_amount_balance']);
			if($ct['extra_remarks'] == NULL)
					{	$s_array6 = [];
						foreach($s_array as $val){
							array_push($s_array6,'');
						}
					}else{
						$s_array6 = explode(",", $ct['extra_remarks']);
					}
			

						if (end($s_array) === '') {
						array_pop($s_array); // remove last element if it's empty
						}

			for($i=0; $i< count($s_array); $i++){ 
			?>
				<tr>
				<td hidden>
				<input type="hidden" readonly id="extra_fees_id" name="extra_fees_id[]" class="form-control" value = ""><br></td>

				<td>
				<input type="text" readonly id="extra_particulars" name="extra_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 

				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees2[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }else{ echo "0"; } ?>"><br>
				</td>

				<td>

				<input type="hidden" readonly id="extra_amount" name="extra_amount1[]" class="form-control extra_amount" value="<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>">
				<input type="number" readonly id="extra_amount1" name="extra_amount[]" class="form-control extra_amount1" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
				</td>

				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="0" onkeyup="getExtraBalance(this)"><span class="tooltiptext"><?php if(isset($s_array4)){ echo $s_array4[$i]; }?></span><br>
				<input type="hidden" id="extra_concession_amount1" name="extra_concession_amount1[]" class="form-control extra_concession_amount1" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>">
				

			   </td>

				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = "<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>"><br></td>

				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value ="<?php if($s_array6[$i] != ''){ echo $s_array6[$i]; }else{  } ?>"><br></td>
				</tr>
			<?php } } } ?>
			<?php }else{

					$ctselect = "SELECT extra_curricular FROM student_creation WHERE student_id ='$student_id' AND standard='$standard1' AND status=0";
					// print_r($ctselect);

					$ctresult = $mysqli->query($ctselect);
							if ($ctresult->num_rows > 0) {
							$i = 1;
							while ($ct = $ctresult->fetch_assoc()) {
								$s_array = explode(",", $ct['extra_curricular']);
								
							}
							}

					// Construct the query with the exploded values
					$feesIdList = implode(",", $s_array);
					// print_r($feesIdList); die;

				$currentAcademicYear = $_SESSION['academic_year']; 
				$school_id =$_SESSION['school_id']; 
				$ctselect="SELECT * FROM fees_master WHERE fees_id IN ('$feesIdList') AND medium ='$medium1' AND student_type='$studentstype1' AND standard='$standard1' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
				$ctresult=$mysqli->query($ctselect);
				if($ctresult->num_rows>0){
				$i=1;
				while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['extra_particulars']);
				$s_array1 = explode(",", $ct['extra_amount']);
				$s_array3 = explode(",", $ct['fees_id']);
				if (end($s_array) === '') {
					array_pop($s_array); // remove last element if it's empty
				}

				for($i=0; $i< count($s_array); $i++){ 
					?>
				<tr>
				<td hidden>
				
				<input type="hidden" readonly id="extra_fees_id" name="extra_fees_id[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br></td>
				
				<td>
				<input type="text" readonly id="extra_particulars" name="extra_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees2[]" class="form-control" value = "0"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>">
			</td>
				
				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="0" onkeyup="getExtraBalance(this)"><span class="tooltiptext">0</span><br>
				<input type="hidden" id="extra_concession_amount1" name="extra_concession_amount1[]" class="form-control extra_concession_amount1" value="0">
				
				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value =""><br></td>
					</tr>
				<?php } } } ?>
				<?php }  ?>
			</tbody>
		</table> <br>
		<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
			<thead>
				<tr>
					<!-- <th>S. No</th> -->
					<th>Fee Particularss</th>
					<th>Paid Fees</th>
					<th>Fee Amount</th>
					<th>Concession Amount</th>
					<th>Balance to be Paid</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
			<?php if (isset($payfeesid)){  
				    
					
					$currentAcademicYear = $_SESSION['academic_year']; 
					$school_id =$_SESSION['school_id']; 
					$ctselect="SELECT * FROM pay_fees WHERE student_id='$student_id' AND pay_fees_id='$payfeesid' AND academic_year='$currentAcademicYear' AND school_id = '$school_id' AND status=0";
					$ctresult=$mysqli->query($ctselect);
				if($ctresult->num_rows>0){
				$i=1;
				while($ct=$ctresult->fetch_assoc()){
						$s_array = explode(",", $ct['amenity_particulars']);
						$s_array1 = explode(",", $ct['amenity_amount']);
						$s_array2 = explode(",", $ct['amenity_amount_recieved']);
						$s_array3 = explode(",", $ct['amenity_amount_balance']);
						$s_array4 = explode(",", $ct['amenity_concession_amount']);
						if($ct['amenity_remarks'] == NULL)
					{	$s_array5 = [];
						foreach($s_array as $val){
							array_push($s_array5,'');
						}
					}else{
						$s_array5 = explode(",", $ct['amenity_remarks']);
					}
					// $s_array6 = end($s_array5); // Get the last element of the array
					if (end($s_array) === '') {
						array_pop($s_array); // remove last element if it's empty
					}
					for($i=0; $i< count($s_array); $i++){
						
					?>
					<tr>
					<td hidden>
					<input type="text" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control" value = "0"></td>
	
					<td>
					<input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
					
					<td>
					<input type="number" readonly id="paid_fees" name="paid_fees3[]" class="form-control" value = "<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
				</td>
					
					<td>
					
					<input type="hidden" readonly id="amenity_amount" name="amenity_amount1[]" class="form-control amenity_amount" value="<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>">
					<input type="number" readonly id="amenity_amount1" name="amenity_amount[]" class="form-control amenity_amount1" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br>
				</td>
					
					<td>
					<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="0" onkeyup="getAmenityBalance(this)"><span class="tooltiptext"><?php if(isset($s_array4)){ echo $s_array4[$i]; }?></span><br>
				    <input type="hidden" id="amenity_concession_amount1" name="amenity_concession_amount1[]" class="form-control amenity_concession_amount1" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>">
				    </td>
					
					<td>
					<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br></td>
					
					<td>
					<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value ="<?php if($s_array5[$i] != ''){ echo $s_array5[$i]; }else{  } ?>"><br></td>
						</tr>
					<?php } } } ?>
			<?php }else{

					$currentAcademicYear = $_SESSION['academic_year']; 
					$school_id =$_SESSION['school_id']; 
					$ctselect="SELECT * FROM fees_master WHERE medium ='$medium1' AND standard='$standard1' AND student_type ='$studentstype1' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
					$ctresult=$mysqli->query($ctselect);
					if($ctresult->num_rows>0){
					$i=1;
					while($ct=$ctresult->fetch_assoc()){

					$s_array = explode(",", $ct['amenity_particulars']);
					$s_array1 = explode(",", $ct['amenity_amount']);
					$s_array3 = explode(",", $ct['fees_id']);
					if (end($s_array) === '') {
						array_pop($s_array); // remove last element if it's empty
					}

					for($i=0; $i< count($s_array); $i++){
				?>
				<tr>
				<td hidden>
				<input type="hidden" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br></td>
				
				<td>
				<input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees3[]" class="form-control" value = "0"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="0" onkeyup="getAmenityBalance(this)"><span class="tooltiptext">0</span><br>
				<input type="hidden" id="amenity_concession_amount1" name="amenity_concession_amount1[]" class="form-control amenity_concession_amount1" value="0">
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value =""><br></td>
					</tr>
				<?php } } } ?>
				<?php }  ?>

			</tbody>
		</table>

		<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
			<thead>
			
						<?php
						$ctselect1="SELECT * FROM pay_transport_fees WHERE student_id='$student_id' AND standard ='$standard1' AND academic_year='$currentAcademicYear' AND school_id = '$school_id' AND status=0";
						$ctresult1=$mysqli->query($ctselect1);
						if($ctresult1->num_rows>0){
							$i=1;
							$paytransportfeesid = '0';
							while($ct1=$ctresult1->fetch_assoc()){  $paytransportfeesid = $ct1["pay_transport_fees_id"]; ?>
								
									<input type='hidden' id='pay_transport_fees_id ' class='pay_transport_fees_id ' name='pay_transport_fees_id' value='<?php if(isset($ct1["pay_transport_fees_id"])){ echo $ct1["pay_transport_fees_id"];}else{ echo "0";} ?>'>
									<input type='hidden' id='transport_fees_mas_id ' class='transport_fees_mas_id ' name='transport_fees_mas_id' value='<?php if(isset($ct1["transport_fees_master_id"])){ echo $ct1["transport_fees_master_id"];}else{ echo "0";} ?>'>

							<?php }
						}else{?>
							<input type='hidden' id='pay_transport_fees_id' class='pay_transport_fees_id' name='pay_transport_fees_id' value='0'>
							<input type='hidden' id='transport_fees_mas_id ' class='transport_fees_mas_id ' name='pay_transport_fees_id' value='0'>
						<?php }?>
				
				<tr>
					<!-- <th>S. No</th> -->
					<th>Fee Particularss</th>
					<th>Paid Fees</th>
					<th>Fee Amount</th>
					<th>Concession Amount</th>
					<th>Balance to be Paid</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
			<?php if (isset($paytransportfeesid)){  
				    
				$currentAcademicYear = $_SESSION['academic_year']; 
				$school_id =$_SESSION['school_id']; 
				$ctselect="SELECT * FROM pay_transport_fees WHERE student_id='$student_id' AND standard ='$standard1' AND academic_year='$currentAcademicYear' AND school_id = '$school_id' AND status=0";
				$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				    $s_array = explode(",", $ct['grp_particulars']);
					$s_array1 = explode(",", $ct['grp_amount']);
					$s_array2 = explode(",", $ct['amount_recieved']);
					$s_array3 = explode(",", $ct['amount_balance']);
					$s_array4 = explode(",", $ct['transport_concession_amount']);
					if($ct['transport_remark'] == NULL)
					{	$s_array5 = [];
						foreach($s_array as $val){
							array_push($s_array5,'');
						}
					}else{
						$s_array5 = explode(",", $ct['transport_remark']);
					}
				// $s_array6 = end($s_array5); // Get the last element of the array
				if (end($s_array) === '') {
					array_pop($s_array); // remove last element if it's empty
				}
				// print_r($s_array5); die;
				for($i=0; $i< count($s_array); $i++){
					
				?>
				<tr>
				<td hidden>
				<input type="text" readonly id="amenity_fees_id" name="trans_fees_id[]" class="form-control" value = "0"></td>

				<td>
				<input type="text" readonly id="amenity_particulars" name="trans_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="trans_fees3[]" class="form-control" value = "<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				
				    <input type="hidden" readonly id="amenity_amount" name="trans_amount1[]" class="form-control amenity_amount" value="<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>">
					<input type="number" readonly id="amenity_amount1" name="trans_amount[]" class="form-control amenity_amount1" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br>
			   </td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="trans_concession_amount[]" class="form-control amenity_concession_amount" value="0" onkeyup="getAmenityBalance(this)"><span class="tooltiptext"><?php if(isset($s_array4)){ echo $s_array4[$i]; }?></span><br>
				<input type="hidden" id="amenity_concession_amount1" name="trans_concession_amount1[]" class="form-control amenity_concession_amount1" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>">
				
			   </td>
				
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="trans_balance_amount[]" class="form-control amenity_balance_amount" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="trans_remarks[]" class="form-control" value ="<?php if($s_array5[$i] != ''){ echo $s_array5[$i]; }else{  } ?>"><br></td>
					</tr>
					

				<?php } } } ?>
	<?php
               }else{
				
				
					$currentAcademicYear = $_SESSION['academic_year']; 
					$school_id =$_SESSION['school_id']; 
					$ctselect="SELECT item_details,due_amount,area_id  FROM area_creation ac LEFT JOIN student_creation sc ON sc.transportarearefid=ac.area_id WHERE sc.medium ='$medium1' AND sc.standard='$standard1' AND sc.studentstype ='$studentstype1' AND sc.year_id ='$currentAcademicYear' AND sc.status=0 AND sc.school_id='$school_id'AND student_id='$student_id'";
					//  SELECT * FROM fees_master WHERE medium ='$medium1' AND standard='$standard1' AND student_type ='$studentstype1' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'
					$ctresult=$mysqli->query($ctselect);
					if($ctresult->num_rows>0){
					$i=1;
					while($ct=$ctresult->fetch_assoc()){

					$s_array = explode(",", $ct['item_details']);
					$s_array1 = explode(",", $ct['due_amount']);
					$s_array5 =  $ct['area_id'];

					if (end($s_array) === '') {
						array_pop($s_array); // remove last element if it's empty
					}

					for($i=0; $i< count($s_array); $i++){
				?>
				<tr>
				<td hidden>
				<input type="text" readonly id="amenity_fees_id" name="trans_fees_id" class="form-control" value = "<?php if(isset($s_array5)){ echo $s_array5; }?>"></td>

				<td>
				<input type="text" readonly id="amenity_particulars" name="trans_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="trans_fees3[]" class="form-control" value = "0"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="trans_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="trans_concession_amount[]" class="form-control amenity_concession_amount" value="0" onkeyup="getAmenityBalance(this)"><span class="tooltiptext">0</span><br>
				<input type="hidden" id="amenity_concession_amount1" name="trans_concession_amount1[]" class="form-control amenity_concession_amount1" value="0">
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="trans_balance_amount[]" class="form-control amenity_balance_amount" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="trans_remarks[]" class="form-control" value =""><br></td>
				
					</tr>
				<?php } } } ?>
				<?php } ?>
			</tbody>
		</table>

<script type="text/javascript">
$(function(){
  $('#general_concessionTable').DataTable({
			//  dom: 'lBfrtip', 
			buttons: [
				{
					extend:  'copy',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},		
				{
					extend:  'pdf',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{
					extend:  'excel',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{
					extend:  'print',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}

			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
  });
  
});
$('input').on('click', function() {
    var tooltip = $(this).next('.tooltiptext');
    tooltip.css('visibility', 'visible');
    setTimeout(function() {
      tooltip.css('visibility', 'hidden');
    }, 2000);
  });
</script>