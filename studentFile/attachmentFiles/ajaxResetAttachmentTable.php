<?php
include '../../ajaxconfig.php';
if (isset($_POST['studID'])) {
    $studID = $_POST['studID'];   
}
?>

<table class="table custom-table" id="attachment_table"> 
    <thead>
        <tr>
            <th style="width: 15%">S.NO</th>
            <th style="width: 15%">Title</th>
            <th style="width: 15%">Attachment</th>
            <th style="width: 15%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $attachmentQry="SELECT * FROM attachment WHERE student_id = '".$studID."' and status = 0 ORDER BY id DESC";
        $attachmentDetails=$mysqli->query($attachmentQry);
        if($attachmentDetails->num_rows>0){
        $i=1;
        while($attachmentInfo=$attachmentDetails->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $attachmentInfo["title"]; ?></td>
        <td><a href="<?php echo $attachmentInfo["file_path"]; ?>" target="_blank" download> <?php echo $attachmentInfo["file_name"]; ?> </a></td>
        <td>
            <a id="edit_attachment" value="<?php  echo $attachmentInfo["id"];?>"><span class="icon-border_color"></span></a> &nbsp;
            <a id="delete_attachment" value="<?php  echo $attachmentInfo["id"];?>"><span class='icon-trash-2'></span></a>
        </td>
        </tr>
        <?php $i = $i+1; }} ?>
    </tbody>
</table>

<script type="text/javascript">
$(function(){
    $('#attachment_table').DataTable({
    'processing': true,
    'iDisplayLength': 10,
    "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    });
});
</script>