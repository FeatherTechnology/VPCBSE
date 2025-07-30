<?php
include 'ajaxconfig.php';
@session_start();
if(isset($_SESSION["userid"])){
    $school_id = $_SESSION["school_id"];
} 

if(isset($_POST["class_id"])){
	$class_id  = $_POST["class_id"]; 
} 
if(isset($_POST["class_name"])){
	$class_name  = $_POST["class_name"]; 
} 
?>
<table class="table custom-table" id="updatedSyllabusTable"> 
	<label style="background-color:#5090c0;color:#fff;width:100%;padding:10px;">Course Name: <?php echo $class_name; ?> </label>
	<thead>
		<tr>
			<th>S.No</th>
			<th>Paper Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ctselect="SELECT * FROM subject_details WHERE class_id = '".$class_id."' AND status=0 AND school_id ='$school_id'"; 
        $ctresult=$mysqli->query($ctselect);
        if($ctresult->num_rows>0){
        $i=1;
        while($ct=$ctresult->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php if(isset($ct["paper_name"])){ echo $ct["paper_name"]; }?></td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
$(function(){
	$('#updatedSyllabusTable').DataTable({
		dom: 'lBfrtip', 
	buttons: [
		
		{
			extend:  'excel',
			exportOptions: {
				columns: [ 0, 1 ]
			}
		},
		{
			extend:  'print',
			exportOptions: {
				columns: [ 0, 1 ]
			}
		}

	],	
	"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"]
	]
	});
});
</script>