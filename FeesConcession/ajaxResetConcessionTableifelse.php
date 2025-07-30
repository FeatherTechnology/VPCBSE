<?php
include '../ajaxconfig.php';

if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id']; 
} 

if(isset($_POST['standard'])){
    $standard = $_POST['standard']; 
}
if(isset($_POST['medium'])){
    $medium = $_POST['medium']; 
}
if(isset($_POST['student_name1'])){
    $student_name1 = $_POST['student_name1']; 
}

if(isset($student_id)){; ?>
<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
		<thead>
			<tr>
				<?php
			$ctselect="SELECT student_name FROM student_creation WHERE student_id='$student_id' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				?>
				<label style="background-color:#307ecc;color:#fff;width:100%;text-align:center" ><input style="background-color:#307ecc;color:#fff;width:100%;border:none;text-align:center" class="form-control" type="text" readonly id="student_name2" value="<?php if(isset($ct["student_name"])){ echo $ct["student_name"];}?> Fee Detail for"></label>
				<?php }} ?>
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
		<?php
			$ctselect="SELECT * FROM pay_fees WHERE standard='$standard' AND student_id='$student_id' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['grp_particulars']);
				$s_array1 = explode(",", $ct['amount_recieved']);
				$s_array2 = explode(",", $ct['amount_balance']);
				$s_array3 = explode(",", $ct['grp_fees_id']);

				if($ct["student_id"] == $student_id){ 
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="" onkeyup="getBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="remarks" name="remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ 
				$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['grp_particulars']);
				$s_array1 = explode(",", $ct['amount_recieved']);
				$s_array2 = explode(",", $ct['amount_balance']);
				$s_array3 = explode(",", $ct['grp_fees_id']);

				
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="" onkeyup="getBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="remarks" name="remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?>
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
			<?php
			$ctselect="SELECT * FROM pay_fees WHERE student_id='$student_id' AND standard='$standard' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){

				$s_array = explode(",", $ct['extra_particulars']);
					$s_array1 = explode(",", $ct['extra_amount_recieved']);
					$s_array2 = explode(",", $ct['extra_amount']);
					$s_array3 = explode(",", $ct['extra_fees_id']);

				if($ct["student_id"] == $student_id){ 
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="" onkeyup="getExtraBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ 
				$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['extra_particulars']);
					$s_array1 = explode(",", $ct['extra_amount_recieved']);
					$s_array2 = explode(",", $ct['extra_amount']);
					$s_array3 = explode(",", $ct['extra_fees_id']);

				
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="" onkeyup="getExtraBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?> 
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
			<?php
			$ctselect="SELECT * FROM pay_fees WHERE student_id='$student_id' AND standard='$standard' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){

				$s_array = explode(",", $ct['amenity_particulars']);
					$s_array1 = explode(",", $ct['amenity_amount_recieved']);
					$s_array2 = explode(",", $ct['amenity_amount']);
					$s_array3 = explode(",", $ct['amenity_fees_id']);

				if($ct["student_id"] == $student_id){ 
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="<?php if(isset($ct["amenity_concession_amount"])){ echo $amenity_concession_amount; }?>" onkeyup="getAmenityBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ 
				$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['amenity_particulars']);
					$s_array1 = explode(",", $ct['amenity_amount_recieved']);
					$s_array2 = explode(",", $ct['amenity_amount']);
					$s_array3 = explode(",", $ct['amenity_fees_id']);

				
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i];} else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="<?php if(isset($ct["amenity_concession_amount"])){ echo $amenity_concession_amount; }?>" onkeyup="getAmenityBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?>
			</tbody>
		</table>

<?php } 
	elseif(isset($student_name1)){ ?>
	<table id="general_concessionTable1" class="table custom-table" cellspacing="0" >
			<thead>
				<tr>
					<?php
				$ctselect="SELECT student_name, standard FROM student_creation WHERE student_id='$student_name1' AND status=0";
				$ctresult=$mysqli->query($ctselect);
				if($ctresult->num_rows>0){
				$i=1;
				while($ct=$ctresult->fetch_assoc()){
					$standard1=$ct["standard"]; 

					?>
					<label style="background-color:#307ecc;color:#fff;width:100%;text-align:center" ><input style="background-color:#307ecc;color:#fff;width:100%;border:none;text-align:center" class="form-control" type="text" readonly id="student_name2" value="<?php if(isset($ct["student_name"])){ echo $ct["student_name"];}?> Fee Detail for"></label>
					<?php }} ?>
					<!-- <th>S. No</th> -->
					<th>Fee Particulars</th>
					<th>Paid Fees</th>
					<th>Fee Amount</th>
					<th>Concession Amount</th>
					<th>Balance to be Paid</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$ctselect="SELECT * FROM pay_fees WHERE standard='$standard1' AND student_id='$student_name1' AND status=0";
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['grp_particulars']);
					$s_array1 = explode(",", $ct['amount_recieved']);
					$s_array2 = explode(",", $ct['amount_balance']);
					$s_array3 = explode(",", $ct['grp_fees_id']);

				if($ct["student_id"] == $student_name1){ echo "with id";
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="" onkeyup="getBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="grp_remarks" name="grp_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ echo "without id"; 
				$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard1' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['grp_particulars']);
					$s_array1 = explode(",", $ct['amount_recieved']);
					$s_array2 = explode(",", $ct['amount_balance']);
					// $s_array3 = explode(",", $ct['grp_fees_id']);

				
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount" value="" onkeyup="getBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="grp_balance_amount" name="grp_balance_amount[]" class="form-control grp_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="grp_remarks" name="grp_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?>
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
			<?php
			$ctselect="SELECT * FROM pay_fees WHERE standard='$standard1' AND student_id='$student_name1' AND status=0";
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){

				$s_array = explode(",", $ct['extra_particulars']);
					$s_array1 = explode(",", $ct['extra_amount_recieved']);
					$s_array2 = explode(",", $ct['extra_amount']);
					$s_array3 = explode(",", $ct['extra_fees_id']);

				if($ct["student_id"] == $student_name1){ 
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i];} else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="" onkeyup="getExtraBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ 
			$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard1' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
				$s_array = explode(",", $ct['extra_particulars']);
					$s_array1 = explode(",", $ct['extra_amount_recieved']);
					$s_array2 = explode(",", $ct['extra_amount']);
					$s_array3 = explode(",", $ct['extra_fees_id']);

				
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
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i];} else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount" value="" onkeyup="getExtraBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="extra_balance_amount" name="extra_balance_amount[]" class="form-control extra_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="extra_remarks" name="extra_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?>
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
			<?php
			$ctselect="SELECT * FROM pay_fees WHERE standard='$standard1' AND student_id='$student_name1' AND status=0";
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){

				    $s_array = explode(",", $ct['amenity_particulars']);
					$s_array1 = explode(",", $ct['amenity_amount_recieved']);
					$s_array2 = explode(",", $ct['amenity_amount']);
					$s_array3 = explode(",", $ct['amenity_fees_id']);

				if($ct["student_id"] == $student_name1){ 
				if (end($s_array) === '') {
					array_pop($s_array); // remove last element if it's empty
				}

				for($i=0; $i< count($s_array); $i++){
															?>
			<tr>
				<td hidden>
				<input type="text" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"></td>

				<td>
				<input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="" onkeyup="getAmenityBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
				else{
				echo "<p class='text-danger'>There is no record</p>";
			} 
			} }
			else{ 
				$ctselect="SELECT * FROM fees_master WHERE 1 AND standard='$standard1' AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
				
					$s_array = explode(",", $ct['amenity_particulars']);
					$s_array1 = explode(",", $ct['amenity_amount_recieved']);
					$s_array2 = explode(",", $ct['amenity_amount']);
					$s_array3 = explode(",", $ct['amenity_fees_id']);

				
				if (end($s_array) === '') {
					array_pop($s_array); // remove last element if it's empty
				}

				for($i=0; $i< count($s_array); $i++){
															?>
			<tr>
				<td hidden>
				<input type="text" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control" value = "<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>"></td>

				<td>
				<input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"><br></td> 
				
				<td>
				<input type="number" readonly id="paid_fees" name="paid_fees[]" class="form-control" value = "<?php if(isset($s_array1)){ echo $s_array1[$i]; } else{ echo "0";}?>"><br>
			</td>
				
				<td>
				
				<input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>"><br>
			</td>
				
				<td>
				<input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount" value="" onkeyup="getAmenityBalance(this)"><br></td>
				
				<td>
				<input type="number" readonly id="amenity_balance_amount" name="amenity_balance_amount[]" class="form-control amenity_balance_amount" value = ""><br></td>
				
				<td>
				<input type="text"  id="amenity_remarks" name="amenity_remarks[]" class="form-control" value =""><br></td>
					</tr>
			<?php } }
			
			}  else{
			echo "<p class='text-danger'>There is no record</p>";
		}  } ?>
				</tbody>
			</table>
		<?php }  ?>
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
	</script>