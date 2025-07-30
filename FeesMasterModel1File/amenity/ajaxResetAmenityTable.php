<?php
include '../../ajaxconfig.php';
@session_start();
if(isset($_SESSION["school_id"])){
    $school_id = $_SESSION["school_id"];
} 
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

<table class="table custom-table" id="amenity_Fee_Table"> 
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
        $amenityFeeQry="SELECT af.amenity_fee_id, af.amenity_particulars, af.amenity_amount, af.amenity_date FROM fees_master fm JOIN amenity_fee af ON fm.fees_id = af.fee_master_id WHERE fm.academic_year = '$academic_year' AND fm.medium = '$medium' AND fm.student_type = '$student_type' AND fm.standard = '$standard' AND af.status = '1' AND fm.school_id ='$school_id'";
        $amenityFeeDetails=$mysqli->query($amenityFeeQry);
        if($amenityFeeDetails->num_rows>0){
        $i=1;
        while($amenity_data=$amenityFeeDetails->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $amenity_data["amenity_particulars"]; ?></td>
        <td><?php echo $amenity_data["amenity_amount"]; ?></td>
        <td><?php echo date('d-m-Y',strtotime($amenity_data["amenity_date"])); ?></td>
        <td>
            <a id="edit_amenity" value="<?php echo $amenity_data["amenity_fee_id"]; ?>"><span class='icon-border_color'></span></a> &nbsp;
            <a id="delete_amenity" value="<?php echo $amenity_data["amenity_fee_id"]; ?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(function() {
        $('#amenity_Fee_Table').DataTable({
            'processing': true,
            'iDisplayLength': 20,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            // dom: 'lBfrtip',
            // buttons: [
            //     {
            //         extend: 'csv',
            //         exportOptions: {
            //             columns: [ 0, 1, 2 ,3, 4 ]
            //         }
            //     }
            // ],
            // "createdRow": function(row, data, dataIndex) {
            //     $(row).find('td:first').html(dataIndex + 1);
            // },
            // "drawCallback": function(settings) {
            //     this.api().column(0).nodes().each(function(cell, i) {
            //         cell.innerHTML = i + 1;
            //     });
            // },
        });
    });
</script>