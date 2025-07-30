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
    
        $("#stockinfotableamenity").hide();
      $("#stockinfotableextra").hide();
      $("#stockinfotable").hide();

      $('.table_view').click(function () { 
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var student_type=$("#student_type").val();
        var standard=$("#standard").val();
        
        resetstockinfotable(academic_year,medium,student_type,standard);   
        resetstockinfotableextra(academic_year,medium,student_type,standard);   
        resetstockinfotableamenity(academic_year,medium,student_type,standard);   
      
          $("#stockinfotableamenity").show();
          $("#stockinfotableextra").show();
          $("#stockinfotable").show();
        
      });

      $("#grp_particularsCheck").hide();
      $("#grp_amountCheck").hide();
      $("#grp_ledger_nameCheck").hide();

      $(document).on("click", "#Submit_Group", function () { 
          var grp_particulars=$("#grp_particulars").val(); 
          var grp_amount=$("#grp_amount").val(); 
          var grp_ledger_name=$("#grp_ledger_name").val(); 
          var academic_year=$("#academic_year").val();
          var medium=$("#medium").val();
          var student_type=$("#student_type").val();
          var standard=$("#standard").val();
          var insert_login_id=$("#insert_login_id").val();
          if(grp_particulars!="" && grp_amount!="" && grp_ledger_name!=""){
              $.ajax({
                  url: 'FeesMasterModel2File/grp/ajaxInsertGrp.php',
                  type: 'POST',
                  data: {"grp_particulars":grp_particulars,"grp_amount":grp_amount,"grp_ledger_name":grp_ledger_name,"academic_year":academic_year,"insert_login_id":insert_login_id,
                  "medium":medium, "student_type":student_type, "standard":standard},
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
                         $("#grp_ledger_name").val('');
                          
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
                         $("#grp_ledger_name").val('');
                         
                      }
                  }
              });
          }
          else{
            $("#grp_particularsCheck").show();
            $("#grp_amountCheck").show();
            $("#grp_ledger_nameCheck").show();
          }
      });
   
  
      function resetstockinfotable(){
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var student_type=$("#student_type").val();
        var standard=$("#standard").val();
          $.ajax({
          url: 'FeesMasterModel2File/grp/ajaxResetGrpTable.php',
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

    $("#grp_ledger_name").keyup(function(){
      var CTval = $("#grp_ledger_name").val();
      if(CTval.length == ''){
      $("#grp_ledger_nameCheck").show();
      return false;
      }else{
      $("#grp_ledger_nameCheck").hide();
      }
  });

       $("body").on("click","#edit_grp",function(){
           var fees_id=$(this).attr('value');
           $("#fees_id").val(fees_id);
           $.ajax({
                   url: 'FeesMasterModel2File/grp/ajaxEditGrp.php',
                   type: 'POST',
                   data: {"fees_id":fees_id},
                   dataType: 'json',
                   cache: false,
                   success:function(response){
                    
                    $("#grp_particulars").val(response['grp_particulars']);
                    $("#grp_amount").val(response['grp_amount']);

                    $('#grp_ledger_name').empty();
                    $('#grp_ledger_name').prepend("<option value=''>" + 'Select GrpLedger Name' + "</option>");
                    var r = 0;
                    for (r = 0; r <= response.grp_ledger_name.length - 1; r++) {
                      $('#grp_ledger_name').append("<option value='" + response['grp_ledger_name'] + "'>" + response['grp_ledger_name'] + "</option>");
                          
                    }
         
               }
           });
       });
   
     $("body").on("click","#delete_grp", function(){ 
       var isok=confirm("Do you want delete Group/Course Fees?");
       if(isok==false){
         return false;
       }else{
           var fees_id=$(this).attr('value'); 
           var c_obj = $(this).parents("tr");
           $.ajax({
               url: 'FeesMasterModel2File/grp/ajaxDeleteGrp.php',
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

    $("#extra_particularsCheck").hide();
      $("#extra_amountCheck").hide();
      $("#extra_ledger_nameCheck").hide();

     //  Grp Table End
    
     $(document).on("click", "#Submit_Extra", function () { 
      var extra_particulars=$("#extra_particulars").val(); 
      var extra_amount=$("#extra_amount").val(); 
      var extra_ledger_name=$("#extra_ledger_name").val(); 
      var academic_year=$("#academic_year").val();
      var medium=$("#medium").val();
      var student_type=$("#student_type").val();
      var standard=$("#standard").val();
      var insert_login_id=$("#insert_login_id").val();
      if(extra_particulars!="" && extra_amount!="" && extra_ledger_name!=""){
          $.ajax({
              url: 'FeesMasterModel2File/extra/ajaxInsertExtra.php',
              type: 'POST',
              data: {"extra_particulars":extra_particulars,"extra_amount":extra_amount,"extra_ledger_name":extra_ledger_name,"academic_year":academic_year,"insert_login_id":insert_login_id,
              "medium":medium, "student_type":student_type, "standard":standard},
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
                     $("#extra_ledger_name").val('');
                      
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
                     $("#extra_ledger_name").val('');
                     
                  }
              }
          });
      }
      else{
        $("#extra_particularsCheck").show();
        $("#extra_amountCheck").show();
        $("#extra_ledger_nameCheck").show();
      }
  });


      function resetstockinfotableextra(){
        var academic_year=$("#academic_year").val();
        var medium=$("#medium").val();
        var student_type=$("#student_type").val();
        var standard=$("#standard").val();
          $.ajax({
          url: 'FeesMasterModel2File/extra/ajaxResetExtraTable.php',
          type: 'POST',
          data: {"academic_year":academic_year,"medium":medium, "student_type":student_type, "standard":standard},
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

    $("#extra_ledger_name").keyup(function(){
      var CTval = $("#extra_ledger_name").val();
      if(CTval.length == ''){
      $("#extra_ledger_nameCheck").show();
      return false;
      }else{
      $("#extra_ledger_nameCheck").hide();
      }
    });
      $("body").on("click","#edit_extra",function(){
        var fees_id=$(this).attr('value');
        $("#fees_id").val(fees_id);
        $.ajax({
                url: 'FeesMasterModel2File/extra/ajaxEditExtra.php',
                type: 'POST',
                data: {"fees_id":fees_id},
                cache: false,
                  success:function(response){
                    $("#extra_particulars").val(response);
                    $("#extra_amount").val(response);
                    $("#extra_ledger_name").val(response);
              }
          });
      });

    $("body").on("click","#delete_extra", function(){
      var isok=confirm("Do you want delete Fees?");
      if(isok==false){
        return false;
      }else{
            var fees_id=$(this).attr('value'); 
          var c_obj = $(this).parents("tr");
          $.ajax({
              url: 'FeesMasterModel2File/extra/ajaxDeleteExtra.php',
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

    // Boys Uniform Fees End

    $("#amenity_particularsCheck").hide();
    $("#amenity_amountCheck").hide();
    $("#amenity_ledger_nameCheck").hide();
  
    $(document).on("click", "#Submit_Amenity", function () { 
      var amenity_particulars=$("#amenity_particulars").val(); 
      var amenity_amount=$("#amenity_amount").val(); 
      var amenity_ledger_name=$("#amenity_ledger_name").val(); 
      var academic_year=$("#academic_year").val();
      var medium=$("#medium").val();
      var student_type=$("#student_type").val();
      var standard=$("#standard").val();
      var insert_login_id=$("#insert_login_id").val();
      if(amenity_particulars!="" && amenity_amount!="" && amenity_ledger_name!=""){
          $.ajax({
              url: 'FeesMasterModel2File/amenity/ajaxInsertAmenity.php',
              type: 'POST',
              data: {"amenity_particulars":amenity_particulars,"amenity_amount":amenity_amount,"amenity_ledger_name":amenity_ledger_name,"academic_year":academic_year,"insert_login_id":insert_login_id,
              "medium":medium, "student_type":student_type, "standard":standard},
              cache: false,
              success:function(response){
                  var insresult = response.includes("Exists");
                  var updresult = response.includes("Updated");
                  if(insresult){
                      $('#fees_detailsamenityInsertNotOk').show(); 
                      setTimeout(function() {
                          $('#fees_detailsamenityInsertNotOk').fadeOut('fast');
                      }, 2000);
                  }else if(updresult){
                      $('#fees_detailsamenityUpdateOk').show();  
                      setTimeout(function() {
                          $('#fees_detailsamenityUpdateOk').fadeOut('fast');
                      }, 2000);
                      $("#updatedSyllabusTableamenity").remove();
                      resetstockinfotableamenity();
                      $("#amenity_particulars").val(''); 
                     $("#amenity_amount").val(''); 
                     $("#amenity_ledger_name").val('');
                      
                  }
                  else{
                      $('#fees_detailsamenityInsertOk').show();  
                      setTimeout(function() {
                          $('#fees_detailsamenityInsertOk').fadeOut('fast');
                      }, 2000);
                      $("#updatedSyllabusTableamenity").remove();
                      resetstockinfotableamenity();
                      $("#amenity_particulars").val(''); 
                     $("#amenity_amount").val(''); 
                     $("#amenity_ledger_name").val('');
                     
                  }
              }
          });
      }
      else{
        
        $("#amenity_particularsCheck").show();
        $("#amenity_amountCheck").show();
        $("#amenity_ledger_nameCheck").show();

      }
  });


  function resetstockinfotableamenity(){
    var academic_year=$("#academic_year").val();
    var medium=$("#medium").val();
    var student_type=$("#student_type").val();
    var standard=$("#standard").val();
      $.ajax({
      url: 'FeesMasterModel2File/amenity/ajaxResetAmenityTable.php',
      type: 'POST',
      data: {"academic_year":academic_year,"medium":medium, "student_type":student_type, "standard":standard},
      cache: false,
      success:function(html){
          $("#updatedstockinfotableamenity").empty();
          $("#updatedstockinfotableamenity").html(html);
      }
  });
  }
 
  $("#amenity_particulars").keyup(function(){
    var CTval = $("#amenity_particulars").val(); 
    if(CTval.length == ''){
    $("#amenity_particularsCheck").show();
    return false;
    }else{
    $("#amenity_particularsCheck").hide();
    }
});

    $("#amenity_amount").keyup(function(){
    var CTval = $("#amenity_amount").val(); 
    if(CTval.length == ''){
    $("#amenity_amountCheck").show();
    return false;
    }else{
    $("#amenity_amountCheck").hide();
    }
});

$("#amenity_ledger_name").keyup(function(){
  var CTval = $("#amenity_ledger_name").val();
  if(CTval.length == ''){
  $("#amenity_ledger_nameCheck").show();
  return false;
  }else{
  $("#amenity_ledger_nameCheck").hide();
  }
});
  $("body").on("click","#edit_amenity",function(){
    var fees_id=$(this).attr('value');
    $("#fees_id").val(fees_id);
    $.ajax({
            url: 'FeesMasterModel2File/amenity/ajaxEditAmenity.php',
            type: 'POST',
            data: {"fees_id":fees_id},
            cache: false,
              success:function(response){
                $("#amenity_particulars").val(response);
                $("#amenity_amount").val(response);
                $("#amenity_ledger_name").val(response);
          }
      });
  });

 $("body").on("click","#delete_amenity", function(){
   var isok=confirm("Do you want delete Fees?");
   if(isok==false){
     return false;
   }else{
      var fees_id=$(this).attr('value'); 
       var c_obj = $(this).parents("tr");
       $.ajax({
           url: 'FeesMasterModel2File/amenity/ajaxDeleteAmenity.php',
           type: 'POST',
           data: {"fees_id":fees_id},
           cache: false,
           success:function(response){
               var delresult = response.includes("Rights");
               if(delresult){
               $('#fees_detailsamenityDeleteNotOk').show(); 
               setTimeout(function() {
               $('#fees_detailsamenityDeleteNotOk').fadeOut('fast');
               }, 2000);
               }
               else{
               c_obj.remove();
               $('#fees_detailsamenityDeleteOk').show();  
               setTimeout(function() {
               $('#fees_detailsamenityDeleteOk').fadeOut('fast');
               }, 2000);
               }
           }
       });
   }
 });
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

  $(function(){
    $('#updatedSyllabusTableamenity').DataTable({
      'iDisplayLength': 5,
      "language": {
        "lengthMenu": "Display _MENU_ Records Per Page",
        "info": "Showing Page _PAGE_ of _PAGES_",
      }
      
    });
    
  });
