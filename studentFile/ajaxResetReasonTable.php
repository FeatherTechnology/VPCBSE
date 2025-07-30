<?php
include '../ajaxconfig.php';
?>

<table class="table custom-table" id="departmentTable"> 
    <thead>
        <tr>
            <th>S. NO</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ctselect="SELECT * FROM Student_creation WHERE 1 AND status=0 ORDER BY student_id DESC";
        $ctresult=$mysqli->query($ctselect);
        if($ctresult->num_rows>0){
        $i=1;
        while($ct=$ctresult->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php if(isset($ct["reason"])){ echo $ct["reason"]; }?></td>
        <td>
            <a id="edit_department" value="<?php if(isset($ct["student_id"])){ echo $ct["student_id"];}?>"><span class="icon-border_color"></span></a> &nbsp
                <a id="delete_department" value="<?php if(isset($ct["student_id"])){ echo $ct["student_id"]; }?>"><span class='icon-trash-2'></span>
            </a>
            </td>
        </tr>
        <?php $i = $i+1; }} ?>
    </tbody>
</table>

<script type="text/javascript">
$(function(){
  $('#departmentTable').DataTable({
    'iDisplayLength': 5,
    "language": {
      "lengthMenu": "Display _MENU_ Records Per Page",
      "info": "Showing Page _PAGE_ of _PAGES_",
    }
  });
});
</script>