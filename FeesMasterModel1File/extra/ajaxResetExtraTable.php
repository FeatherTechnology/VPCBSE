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
if(isset($_POST['student_type'])){
    $student_type = $_POST['student_type']; 
}
if(isset($_POST['standard'])){
	$standard = $_POST['standard']; 
}
?>

<table class="table custom-table" id="extra_Fee_table"> 
    <thead>
		<tr>
			<th  width="50">S.No</th>
			<th>Particulars</th>
			<th>Fee Amount</th>
			<th>Due Date</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
    </thead>
    <tbody>
        <?php
        $extraFeeQry="SELECT ecaf.extra_fee_id, ecaf.extra_particulars, ecaf.extra_amount, ecaf.extra_date, ecaf.type FROM fees_master fm JOIN extra_curricular_activities_fee ecaf ON fm.fees_id = ecaf.fee_master_id WHERE fm.academic_year = '$academic_year' AND ((fm.medium = '$medium' AND fm.student_type = '$student_type' AND fm.standard = '$standard') OR (ecaf.type ='common')) AND ecaf.status = '1' AND fm.school_id ='$school_id'";
        $extraFeeDetails=$mysqli->query($extraFeeQry);
        if($extraFeeDetails->num_rows>0){
        $i=1;
        while($extra_data=$extraFeeDetails->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $extra_data["extra_particulars"]; ?></td>
        <td><?php echo $extra_data["extra_amount"]; ?></td>
        <td><?php echo date('d-m-Y',strtotime($extra_data["extra_date"])); ?></td>
        <td><?php echo $extra_data["type"]; ?></td>
        <td>
            <a id="edit_extra" value="<?php echo $extra_data["extra_fee_id"]; ?>"><span class='icon-border_color'></span></a> &nbsp;
            <a id="delete_extra" value="<?php echo $extra_data["extra_fee_id"]; ?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(function() {
        $('#extra_Fee_table').DataTable({
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