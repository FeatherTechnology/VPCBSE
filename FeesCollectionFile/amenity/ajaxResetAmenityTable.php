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

<table class="table custom-table" id="updatedSyllabusTableamenity"> 
    <thead>
		<tr>
			<th width="50"> S.No</th>
			<th>Particulars</th>
			<th>Fee Amount</th>
			<th>Due Date</th>
			<th>Action</th>
		</tr>
    </thead>
    <tbody>
        <?php
        $ctselect="SELECT * FROM fees_master WHERE  academic_year = '".$academic_year."' AND medium = '".$medium."' AND student_type = '".$student_type."' AND standard = '".$standard."' AND status = 0 AND amenity_status=1 ";
        $ctresult=$mysqli->query($ctselect);
        if($ctresult->num_rows>0){
        $i=1;
        while($ct=$ctresult->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php if(isset($ct["amenity_particulars"])){ echo $ct["amenity_particulars"]; }?></td>
        <td><?php if(isset($ct["amenity_amount"])){ echo $ct["amenity_amount"]; }?></td>
        <td><?php if(isset($ct["amenity_date"])){ echo $ct["amenity_date"]; }?></td>
        <td>
            <a id="edit_amenity" value="<?php if(isset($ct["fees_id"])){ echo $ct["fees_id"];}?>"><span class='icon-border_color'></span></a> &nbsp;
            <a id="delete_amenity" value="<?php if(isset($ct["fees_id"])){ echo $ct["fees_id"]; }?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
$(function(){
  $('#updatedSyllabusTableamenity').DataTable({
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