<?php
include '../../ajaxconfig.php';

if(isset($_POST['academic_year'])){
	$academic_year = $_POST['academic_year']; 
} 
if(isset($_POST['medium'])){
	$medium = $_POST['medium']; 
}
if(isset($_POST['standard'])){
	$standard = $_POST['standard']; 
}
if(isset($_POST['student_type'])){
	$student_type = $_POST['student_type']; 
}
 
?>

<table class="table custom-table" id="updatedSyllabusTable"> 
    <thead>
		<tr>
			<th width="50">S.No</th>
			<th>Particulars</th>
			<th>Fee Amount</th>
			<th>Due Date</th>
			<th>Action</th>
		</tr>
    </thead>
    <tbody>
        <?php
        $ctselect="SELECT * FROM last_year_fees_master WHERE  academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND 
		standard = '".$standard."' AND status = 0 AND grp_status= 1 "; 
        $ctresult=$mysqli->query($ctselect);
        if($ctresult->num_rows>0){
        $i=1;
        while($ct=$ctresult->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php if(isset($ct["grp_particulars"])){ echo $ct["grp_particulars"]; }?></td>
        <td><?php if(isset($ct["grp_amount"])){ echo $ct["grp_amount"]; }?></td>
        <td><?php if(isset($ct["grp_date"])){ echo $ct["grp_date"]; }?></td>
        <td>
            <a id="edit_grp" value="<?php if(isset($ct["last_year_fees_master_id"])){ echo $ct["last_year_fees_master_id"];}?>"><span class="icon-border_color"></span></a> &nbsp;
            <a id="delete_grp" value="<?php if(isset($ct["last_year_fees_master_id"])){ echo $ct["last_year_fees_master_id"]; }?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
$(function(){
  $('#updatedSyllabusTable').DataTable({
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