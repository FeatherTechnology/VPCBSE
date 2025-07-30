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

<table class="table custom-table" id="Group_Fee_Table"> 
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
        $grpFeeQry="SELECT gcf.grp_course_id, gcf.grp_particulars, gcf.grp_amount, gcf.grp_date  FROM fees_master fm JOIN group_course_fee gcf ON fm.fees_id = gcf.fee_master_id WHERE fm.academic_year = '".$academic_year."' AND fm.medium = '".$medium."' AND fm.student_type = '".$student_type."' AND fm.standard = '".$standard."' AND gcf.status = 1 AND fm.school_id = '$school_id' "; 
        $grpFeeDetails=$mysqli->query($grpFeeQry);
        if($grpFeeDetails->num_rows>0){
        $i=1;
        while($grprow=$grpFeeDetails->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $grprow["grp_particulars"]; ?></td>
        <td><?php echo $grprow["grp_amount"]; ?></td>
        <td><?php echo date('d-m-Y',strtotime($grprow["grp_date"])); ?></td>
        <td>
            <a id="edit_grp" value="<?php echo $grprow["grp_course_id"]; ?>"><span class="icon-border_color"></span></a> &nbsp;
            <a id="delete_grp" value="<?php echo $grprow["grp_course_id"]; ?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; } } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(function() {
        $('#Group_Fee_Table').DataTable({
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