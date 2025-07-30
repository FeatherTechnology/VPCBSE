<?php
include '../ajaxconfig.php'; 
?>

<table class="table custom-table" id="departmentTable"> 
    <thead>
		<tr>
			<th width="50">S. No</th>
			<th>Temporary Register Number</th>
			<th>Student Name</th>
			<th>Standard</th>
			<th>Medium</th>
			<th>Action</th>
		</tr>
    </thead>
    <tbody>
        <?php
		@session_start();
		
		if(isset($_SESSION["school_id"])){
			$school_id = $_SESSION["school_id"];
		 }
		 if(isset($_SESSION["year_id"])){
			$year_id = $_SESSION["academic_year"];
		 }
		
        $ctselect="SELECT * FROM `temp_admission_student` WHERE  school_id='$school_id' AND year_id='$year_id' AND status = 0 ORDER BY temp_admission_id DESC"; 
		
        $ctresult=$mysqli->query($ctselect);
        if($ctresult->num_rows>0){
        $i=1;
        while($ct=$ctresult->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php if(isset($ct["temp_no"])){ echo $ct["temp_no"]; }?></td>
        <td><?php if(isset($ct["temp_student_name"])){ echo $ct["temp_student_name"]; }?></td>
        <td><?php if(isset($ct["temp_standard"])){ echo $ct["temp_standard"]; }?></td>
		<td><?php if(isset($ct["temp_medium"])){ echo $ct["temp_medium"]; }?></td>
        <td>
            <a id="temp_admission_id" name="temp_admission_id" value="<?php if(isset($ct["temp_admission_id"])){ echo $ct["temp_admission_id"];}?>"><span class='icon-eye'></span></a> &nbsp;
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