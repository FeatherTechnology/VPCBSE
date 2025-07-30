<?php
include '../ajaxconfig.php';

if(isset($_POST["standard"])){
	$standard  = $_POST["standard"]; 
} 
?>

<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
		<thead>
			<tr>
				<th>Group Fees</th>
				<th>Amount (In Rs)</th>
				<th>Fees Received</th>
				<th>Balance to be Paid</th>
			</tr>
		</thead>
		<tfoot>
			<th>Group Fees</th>
			<th>Amount (In Rs)</th>
			<th>Fees Received</th>
			<th>Balance to be Paid</th>
		</tfoot>
		<tbody>
		<?php
			$ctselect="SELECT * FROM fees_master WHERE standard='$standard' AND grp_status = 1 AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
			?>
			<tr>
			<td><input type="text" readonly id="grp_particulars" name="grp_particulars[]" class="form-control fee-input" value = "<?php if(isset($ct["grp_particulars"])){ echo $ct["grp_particulars"] . " ". "-". " ". $ct["standard"]; }?>"></td>
			<td><input type="number" readonly id="amount" name="amount[]" class="form-control fee-input" value="<?php if(isset($ct["grp_amount"])){ echo $ct["grp_amount"]; }?>"></td>
			<td><input type="number" id="amount_recieved" name="amount_recieved[]" class="form-control fee-input" value="0"></td>
			<td><input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control fee-input" value = "<?php if(isset($ct["grp_balance_amount"])){ echo $ct["grp_balance_amount"]; } else { echo $ct["grp_amount"]; } ?>" data-default-balance="<?php echo $ct["grp_amount"]; ?>"></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>

	<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
		<thead>
			<tr>
				<th>Extra Curricular</th>
				<th>Amount (In Rs)</th>
				<th>Fees Received</th>
				<th>Balance to be Paid</th>
			</tr>
		</thead>
		<tfoot>
			<th>Extra Curricular</th>
			<th>Amount (In Rs)</th>
			<th>Fees Received</th>
			<th>Balance to be Paid</th>
		</tfoot>
		<tbody>
		<?php
			$ctselect="SELECT * FROM fees_master WHERE standard='$standard' AND extra_status = 1 AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
			?>
			<tr>
			<td><input type="text" readonly id="extra_particulars" name="extra_particulars[]" class="form-control" value = "<?php if(isset($ct["extra_particulars"])){ echo $ct["extra_particulars"] . " ". "-". " ". $ct["standard"]; }?>"></td>
			<td><input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control" value="<?php if(isset($ct["extra_amount"])){ echo $ct["extra_amount"]; }?>"></td>
			<td><input type="number" id="extra_amount_recieved" name="extra_amount_recieved[]" class="form-control" value="0"></td>
			<td><input type="number" readonly id="extra_amount_balance" name="extra_amount_balance[]" class="form-control" value = "<?php if(isset($ct["extra_balance_amount"])){ echo $ct["extra_balance_amount"]; } else { echo $ct["extra_amount"]; } ?>" data-default-balance="<?php echo $ct["extra_amount"]; ?>"></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>
	<table id="general_concessionTable" class="table custom-table" cellspacing="0" >
		<thead>
			<tr>
				<th>Amenity Fees</th>
				<th>Amount (In Rs)</th>
				<th>Fees Received</th>
				<th>Balance to be Paid</th>
			</tr>
		</thead>
		<tfoot>
			<th>Amenity Fees</th>
			<th>Amount (In Rs)</th>
			<th>Fees Received</th>
			<th>Balance to be Paid</th>
		</tfoot>
		<tbody>
		<?php
			$ctselect="SELECT * FROM fees_master WHERE standard='$standard' AND amenity_status = 1 AND status=0"; 
			$ctresult=$mysqli->query($ctselect);
			if($ctresult->num_rows>0){
			$i=1;
			while($ct=$ctresult->fetch_assoc()){
			?>
			<tr>
			<td><input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($ct["amenity_particulars"])){ echo $ct["amenity_particulars"] . " ". "-". " ". $ct["standard"]; }?>"></td>
			<td><input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control" value="<?php if(isset($ct["amenity_amount"])){ echo $ct["amenity_amount"]; }?>"></td>
			<td><input type="number" id="amenity_amount_recieved" name="amenity_amount_recieved[]" class="form-control" value="<?php if(isset($ct["amenity_received_amount"])){ echo $ct["amenity_received_amount"]; }?>"></td>
			<td><input type="number" readonly id="ameniyt_amount_balance" name="ameniyt_amount_balance[]" class="form-control" value = "<?php if(isset($ct["amenity_balance_amount"])){ echo $ct["amenity_balance_amount"]; } else { echo $ct["amenity_amount"]; } ?>" data-default-balance="<?php echo $ct["amenity_amount"]; ?>"></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>