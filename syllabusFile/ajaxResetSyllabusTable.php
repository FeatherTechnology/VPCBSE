<?php
include '../ajaxconfig.php';
@session_start();
if(isset($_SESSION["userid"])){
    $school_id = $_SESSION["school_id"];
} 

if(isset($_POST["class_id"])){
	$class_id  = $_POST["class_id"]; 
} 
?>

<table class="table custom-table" id="updatedSyllabusTable"> 
    <thead>
        <tr>
            <th>S.No</th>
            <th>Paper Name</th>
            <th>Max Mark</th>
            <th>Action</th>
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
        <td><?php if(isset($ct["max_mark"])){ echo $ct["max_mark"]; }?></td>
        <td>
            <a id="edit_subject" value="<?php if(isset($ct["subject_id"])){ echo $ct["subject_id"];}?>"><span class="icon-border_color"></span></a> &nbsp;
            <a id="delete_subject" value="<?php if(isset($ct["subject_id"])){ echo $ct["subject_id"]; }?>"><span class='icon-trash-2'></span></a>
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