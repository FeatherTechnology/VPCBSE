// Document is ready
$(document).ready(function () {	

  $("#stockinfotable").hide();

  $('.table_view').click(function () { 
    var academic_year=$("#academic_year").val();
    var medium=$("#medium").val();
    var student_type=$("#student_type").val();
    var standard=$("#standard").val();
    
    resetstockinfotable(academic_year,medium,student_type,standard);   

      $("#stockinfotable").show();
    
  });

  $("#grp_particularsCheck").hide();
  $("#grp_amountCheck").hide();
  $("#grp_dateCheck").hide();

  $(document).on("click", "#Submit_Group", function () { 
    var insert_login_id=$("#insert_login_id").val();
    var academic_year=$("#academic_year").val();
    var medium=$("#medium").val();
    var student_type=$("#student_type").val();
    var standard=$("#standard").val();
    
   if(this.id == "Submit_Group") {
        var particulars=$("#grp_particulars").val(); 
        var amount=$("#grp_amount").val(); 
        var last_year_fees_master_id=$("#last_year_fees_master_id").val();
        var date=$("#grp_date").val(); 
        var ajaxUrl = 'LastYearFeesMaster/grp/ajaxInsertGrp.php';
        var insertOk = '#fees_detailsInsertOk';
        var insertNotOk = '#fees_detailsInsertNotOk';
        var updateOk = '#fees_detailsUpdateOk';
    } 

    if(particulars!="" && amount!="" && date!="") {
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {"last_year_fees_master_id":last_year_fees_master_id,"particulars":particulars,"amount":amount,"date":date,"academic_year":academic_year,"insert_login_id":insert_login_id,"medium":medium, "student_type":student_type, "standard":standard},
            cache: false,
            success:function(response){
                var insresult = response.includes("Exists");
                var updresult = response.includes("Updated");
                if(insresult) {
                    $(insertNotOk).show(); 
                    setTimeout(function() {
                        $(insertNotOk).fadeOut('fast');
                    }, 2000);
                } else if(updresult) {
                    $(updateOk).show();  
                    setTimeout(function() {
                        $(updateOk).fadeOut('fast');
                    }, 2000);
                    $("#updatedSyllabusTable").remove();
                    resetstockinfotable();
                    $("#grp_particulars").val('');
                    $("#grp_amount").val(''); 
                    $("#grp_date").val('');
                } else {
                    $(insertOk).show();  
                    setTimeout(function() {
                        $(insertOk).fadeOut('fast');
                    }, 2000);
                    $("#updatedSyllabusTable").remove();
                    resetstockinfotable();
                    $("#grp_particulars").val('');
                    $("#grp_amount").val(''); 
                    $("#grp_date").val('');
                }
            }
        });
    }
});

      function resetstockinfotable(){
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var student_type=$("#student_type").val();
        var standard=$("#standard").val();
          $.ajax({
          url: 'LastYearFeesMaster/grp/ajaxResetGrpTable.php',
          type: 'POST',
          data: {"academic_year":academic_year,"medium":medium, "student_type":student_type, "standard":standard},
          cache: false,
          success:function(html){
              $("#updatedstockinfotable").empty();
              $("#updatedstockinfotable").html(html);
          }
      });
      }
     
       $("#grp_particulars").keyup(function(){
           var CTval = $("#grp_particulars").val(); 
           if(CTval.length == ''){
           $("#grp_particularsCheck").show();
           return false;
           }else{
           $("#grp_particularsCheck").hide();
           }
       });

       $("#grp_amount").keyup(function(){
        var CTval = $("#grp_amount").val(); 
        if(CTval.length == ''){
        $("#grp_amountCheck").show();
        return false;
        }else{
        $("#grp_amountCheck").hide();
        }
    });

    $("#grp_date").keyup(function(){
      var CTval = $("#grp_date").val();
      if(CTval.length == ''){
      $("#grp_dateCheck").show();
      return false;
      }else{
      $("#grp_dateCheck").hide();
      }
  });

       $("body").on("click","#edit_grp",function(){
           var last_year_fees_master_id=$(this).attr('value');
           $("#last_year_fees_master_id").val(last_year_fees_master_id); 
           $.ajax({
                   url: 'LastYearFeesMaster/grp/ajaxEditGrp.php',
                   type: 'POST',
                   data: {"last_year_fees_master_id":last_year_fees_master_id},
                   dataType: 'json',
                   cache: false,
                   success:function(response){
                    $("#grp_particulars").val(response['grp_particulars']);
                    $("#grp_amount").val(response['grp_amount']);
                    $("#grp_date").val(response['grp_date']);
               }
           });
       });
   
     $("body").on("click","#delete_grp", function(){ 
       var isok=confirm("Do you want delete Transport Fees?");
       if(isok==false){
         return false;
       }else{
           var last_year_fees_master_id=$(this).attr('value'); 
           var c_obj = $(this).parents("tr");
           $.ajax({
               url: 'LastYearFeesMaster/grp/ajaxDeleteGrp.php',
               type: 'POST',
               data: {"last_year_fees_master_id":last_year_fees_master_id},
               cache: false,
               success:function(response){ 
                   var delresult = response.includes("Rights");
                   if(delresult){
                   $('#fees_detailsDeleteNotOk').show(); 
                   setTimeout(function() {
                   $('#fees_detailsDeleteNotOk').fadeOut('fast');
                   }, 2000);
                   }
                   else{
                   c_obj.remove();
                   $('#fees_detailsDeleteOk').show();  
                   setTimeout(function() {
                   $('#fees_detailsDeleteOk').fadeOut('fast');
                   }, 2000);
                   }
               }
           });
       }
     });
    //  Grp Table End
  });

  $(function(){
    $('#updatedSyllabusTable').DataTable({
      'iDisplayLength': 5,
      "language": {
        "lengthMenu": "Display _MENU_ Records Per Page",
        "info": "Showing Page _PAGE_ of _PAGES_",
      }
      
    });
    
  });

	