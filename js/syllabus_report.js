// Document is ready
$(document).ready(function () {	
    
  // $("#allocationReport").hide();
    $('#table_view').click(function () {
        resetstockinfotable();   
        $("#allocationReport").show();           
    });     

});

$(function(){
  getStandardList(); //Get Standard List.
})

function resetstockinfotable(){
  var class_id=$("#class_id").val();
  var class_name=$("#class_id :selected").text();
    $.ajax({
    url: 'ajaxSyllabusReportFetch.php',
    type: 'POST',
    data: {"class_id":class_id, "class_name": class_name},
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

function getStandardList(){ //Getting standard list from database.
  $.ajax({
      type: 'POST',
      data: {},
      url: 'ajaxFiles/getStandardList.php',
      dataType: 'json',
      success:function(response){
          $('#class_id').empty();
          $('#class_id').append("<option value=''>Select Standard</option>");
          for(var i=0; i <response.length; i++){
              
              $('#class_id').append("<option value='" +response[i]['std_id']+ "'>" +response[i]['std']+ "</option>");
          }
      }
  })
}