// Document is ready
$(document).ready(function () {	
    
         // Get the current year
  var currentYear = new Date().getFullYear();

  // Generate a list of academic years for the dropdown
  var dropdown = document.getElementById('academic_year');
  for (var i = currentYear; i >= currentYear - 4; i--) {
    var option = document.createElement('option');
    option.value = i + '-' + (i + 1);
    option.text = i + '-' + (i + 1);
    dropdown.appendChild(option);
  }
      $("#stockinfotableextra").hide();
      $("#stockinfotable").hide();
      $('#standard').change(function () { 
        var academic_year=$("#academic_year").val(); 
        var medium=$("#medium").val();
        var standard=$("#standard").val();
        
        resetstockinfotable(academic_year,medium,standard);   
        resetstockinfotableextra(academic_year,medium,standard);   
      
          $("#stockinfotableextra").show();
          $("#stockinfotable").show();
        
      });

      $("#grp_particularsCheck").hide();
      $("#grp_amountCheck").hide();
      $("#grp_dateCheck").hide();

      $(document).on("click", "#Submit_Group", function () { 
          var grp_particulars=$("#grp_particulars").val(); 
          var grp_amount=$("#grp_amount").val(); 
          var grp_date=$("#grp_date").val(); 
          var academic_year=$("#academic_year").val();
          var medium=$("#medium").val();
          var standard=$("#standard").val();
          var insert_login_id=$("#insert_login_id").val();
          if(grp_particulars!="" && grp_amount!="" && grp_date!=""){
              $.ajax({
                  url: 'FeesMasterModel3File/grp/ajaxInsertGrp.php',
                  type: 'POST',
                  data: {"grp_particulars":grp_particulars,"grp_amount":grp_amount,"grp_date":grp_date,"academic_year":academic_year,"insert_login_id":insert_login_id,
                  "medium":medium, "standard":standard},
                  cache: false,
                  success:function(response){
                      var insresult = response.includes("Exists");
                      var updresult = response.includes("Updated");
                      if(insresult){
                          $('#fees_detailsInsertNotOk').show(); 
                          setTimeout(function() {
                              $('#fees_detailsInsertNotOk').fadeOut('fast');
                          }, 2000);
                      }else if(updresult){
                          $('#fees_detailsUpdateOk').show();  
                          setTimeout(function() {
                              $('#fees_detailsUpdateOk').fadeOut('fast');
                          }, 2000);
                          $("#updatedSyllabusTable").remove();
                          resetstockinfotable();
                          $("#grp_particulars").val(''); 
                         $("#grp_amount").val(''); 
                         $("#grp_date").val('');
                          
                      }
                      else{
                          $('#fees_detailsInsertOk').show();  
                          setTimeout(function() {
                              $('#fees_detailsInsertOk').fadeOut('fast');
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
          else{
            $("#grp_particularsCheck").show();
            $("#grp_amountCheck").show();
            $("#grp_dateCheck").show();
          }
      });
   
  
      function resetstockinfotable(){ 
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var standard=$("#standard").val();
          $.ajax({
          url: 'FeesMasterModel3File/grp/ajaxResetGrpTable.php',
          type: 'POST',
          data: {"academic_year":academic_year,"medium":medium, "standard":standard},
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
    var fees_id=$(this).attr('value');
    $("#fees_id").val(fees_id); 
    $.ajax({
            url: 'FeesMasterModel3File/grp/ajaxEditGrp.php',
            type: 'POST',
            data: {"fees_id":fees_id},
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
  var isok=confirm("Do you want delete Term II Fees?");
  if(isok==false){
    return false;
  }else{
      var fees_id=$(this).attr('value'); 
      var c_obj = $(this).parents("tr");
      $.ajax({
          url: 'FeesMasterModel1File/grp/ajaxDeleteGrp.php',
          type: 'POST',
          data: {"fees_id":fees_id},
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
    
        $(document).on("click", "#Submit_Extra", function () { 
          var extra_particulars=$("#extra_particulars").val(); 
          var extra_amount=$("#extra_amount").val(); 
          var extra_date=$("#extra_date").val(); 
          var academic_year=$("#academic_year").val();
          var medium=$("#medium").val();
          var standard=$("#standard").val();
          var insert_login_id=$("#insert_login_id").val();
          if(extra_particulars!="" && extra_amount!="" && extra_date!=""){
              $.ajax({
                  url: 'FeesMasterModel3File/extra/ajaxInsertExtra.php',
                  type: 'POST',
                  data: {"extra_particulars":extra_particulars,"extra_amount":extra_amount,"extra_date":extra_date,"academic_year":academic_year,"insert_login_id":insert_login_id,
                  "medium":medium, "standard":standard},
                  cache: false,
                  success:function(response){
                      var insresult = response.includes("Exists");
                      var updresult = response.includes("Updated");
                      if(insresult){
                          $('#fees_detailsextraInsertNotOk').show(); 
                          setTimeout(function() {
                              $('#fees_detailsextraInsertNotOk').fadeOut('fast');
                          }, 2000);
                      }else if(updresult){
                          $('#fees_detailsextraUpdateOk').show();  
                          setTimeout(function() {
                              $('#fees_detailsextraUpdateOk').fadeOut('fast');
                          }, 2000);
                          $("#updatedSyllabusTableextra").remove();
                          resetstockinfotableextra();
                          $("#extra_particulars").val(''); 
                         $("#extra_amount").val(''); 
                         $("#extra_date").val('');
                          
                      }
                      else{
                          $('#fees_detailsextraInsertOk').show();  
                          setTimeout(function() {
                              $('#fees_detailsextraInsertOk').fadeOut('fast');
                          }, 2000);
                          $("#updatedSyllabusTableextra").remove();
                          resetstockinfotableextra();
                          $("#extra_particulars").val(''); 
                         $("#extra_amount").val(''); 
                         $("#extra_date").val('');
                         
                      }
                  }
              });
          }
          else{
            $("#papernameCheck").show();
            $("#max_markCheck").show();
          }
      });
   
  
      function resetstockinfotableextra(){
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var standard=$("#standard").val();
          $.ajax({
          url: 'FeesMasterModel3File/extra/ajaxResetExtraTable.php',
          type: 'POST',
          data: {"academic_year":academic_year,"medium":medium, "standard":standard},
          cache: false,
          success:function(html){
              $("#updatedstockinfotableextra").empty();
              $("#updatedstockinfotableextra").html(html);
          }
      });
      }
     
     
      $("#extra_particulars").keyup(function(){
        var CTval = $("#extra_particulars").val(); 
        if(CTval.length == ''){
        $("#extra_particularsCheck").show();
        return false;
        }else{
        $("#extra_particularsCheck").hide();
        }
    });

    $("#extra_amount").keyup(function(){
     var CTval = $("#extra_amount").val(); 
     if(CTval.length == ''){
     $("#extra_amountCheck").show();
     return false;
     }else{
     $("#extra_amountCheck").hide();
     }
 });

 $("#extra_date").keyup(function(){ alert("sdfdsdf")
   var CTval = $("#extra_date").val();
   if(CTval.length == ''){
   $("#extra_dateCheck").show();
   return false;
   }else{
   $("#extra_dateCheck").hide();
   }
});
      $("body").on("click","#edit_extra",function(){
        var fees_id=$(this).attr('value');
        $("#fees_id").val(fees_id);
        $.ajax({
                url: 'FeesMasterModel3File/extra/ajaxEditextra.php',
                type: 'POST',
                data: {"fees_id":fees_id},
                dataType: 'json',
                cache: false,
                success:function(response){
                $("#extra_particulars").val(response['extra_particulars']);
                $("#extra_amount").val(response['extra_amount']);
                $("#extra_date").val(response['extra_date']);
            }
        });
      });

      $("body").on("click","#delete_extra", function(){
        var isok=confirm("Do you want delete Term III Fees?");
        if(isok==false){
          return false;
        }else{
             var fees_id=$(this).attr('value'); 
            var c_obj = $(this).parents("tr");
            $.ajax({
                url: 'FeesMasterModel3File/extra/ajaxDeleteExtra.php',
                type: 'POST',
                data: {"fees_id":fees_id},
                cache: false,
                success:function(response){
                    var delresult = response.includes("Rights");
                    if(delresult){
                    $('#fees_detailsextraDeleteNotOk').show(); 
                    setTimeout(function() {
                    $('#fees_detailsextraDeleteNotOk').fadeOut('fast');
                    }, 2000);
                    }
                    else{
                    c_obj.remove();
                    $('#fees_detailsextraDeleteOk').show();  
                    setTimeout(function() {
                    $('#fees_detailsextraDeleteOk').fadeOut('fast');
                    }, 2000);
                    }
                }
            });
        }
      });
     //  Extra  Table End

  
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

  $(function(){
    $('#updatedSyllabusTableextra').DataTable({
      'iDisplayLength': 5,
      "language": {
        "lengthMenu": "Display _MENU_ Records Per Page",
        "info": "Showing Page _PAGE_ of _PAGES_",
      }
      
    });
    
  });

 