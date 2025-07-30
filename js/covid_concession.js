// Document is ready
$(document).ready(function () {	
    
  $("#stockinfotable").hide();
    $('#table_view').click(function () {
        resetstockinfotable();   
        $("#stockinfotable").show();           
    });     

});

function resetstockinfotable(){
  var class_id=$("#class_id").val();
    $.ajax({
    url: 'ajaxSyllabusReportFetch.php',
    type: 'POST',
    data: {"class_id":class_id},
    cache: false,
    success:function(html){
        $("#updatedstockinfotable").empty();
        $("#updatedstockinfotable").html(html);
    }
});
}
// function SyllReport(class_id){
//   $('#syllabus_allocation').empty();
//   $('#syllabus_allocation').append(`<thead><tr><th width="250">Course Name:</th><th></th></tr><br><br><tr><th width="50">S.No.</th><th>Paper Name</th></tr></thead><tbody></tbody>`);
//   $('#syllabus_allocation').DataTable({
//       "order": [[ 0, "desc" ]],
//       'processing': true,
//       'serverSide': true,
//       'serverMethod': 'post',
//       'ajax': {
//           'url':'ajaxSyllabusReportFetch1.php',
//           'data': function(data){
//               var search = $('#search').val();
//               data.search      = search;
//               data.class_id      = class_id;
//           }
//       },
//       dom: 'lBfrtip',
//       buttons: [
//         {
//           extend:  'print',
//           exportOptions: {
//             columns: [ 0, 1]
//           }
//         },
//           {
//               extend: 'excel',
//               title: "Syllabus Report"
//           },
          
//       ],
//       "lengthMenu": [
//           [10, 25, 50, -1],
//           [10, 25, 50, "All"]
//       ]
//   });
// }