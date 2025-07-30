// Document is ready
$(document).ready(function () {

  $('.table_view').click(function () {
    var academic_year = $("#academic_year").val();
    var medium = $("#medium").val();
    var student_type = $("#student_type").val();
    var standard = $("#standard").val();

    if (academic_year != '' && medium != '' && student_type != '' && standard != '') {
      $('.freezeFieldAfterClick').attr('disabled',true)
      resetGrpFeesTable();
      resetExtraFeesTable();
      resetAmenityFeesTable();

      $("#grp_course_fee_Div").show();
      $("#extra_curricular_Div").show();
      $("#amenity_fee_Div").show();

    } else {
      alert('Kindly Select All the Fields!');
      $("#grp_course_fee_Div").hide();
      $("#extra_curricular_Div").hide();
      $("#amenity_fee_Div").hide();

    }

  });

  $('#table_refresh').click(function(){
    $('.freezeFieldAfterClick').attr('disabled',false);
    $('.grpTableField').val('');
    $('.extraCurField').val('');
    $('.amenityField').val('');
    $("#grp_course_fee_Div").hide();
    $("#extra_curricular_Div").hide();
    $("#amenity_fee_Div").hide();
  });

  $(document).on("click", "#Submit_Extra, #Submit_Group, #Submit_Amenity", function () {
    var academic_year = $("#academic_year").val();
    var medium = $("#medium").val();
    var student_type = $("#student_type").val();
    var standard = $("#standard").val();

    if (this.id == "Submit_Group") {
      var clrfield = ".grpTableField";
      var particulars = $("#grp_particulars").val();
      var amount = $("#grp_amount").val();
      var fees_id = $("#grp_course_id").val();
      var date = $("#grp_date").val();
      var type = '0';
      var ajaxUrl = 'FeesMasterModel1File/grp/ajaxInsertGrp.php';
      var insertOk = '#fees_detailsInsertOk';
      var insertNotOk = '#fees_detailsInsertNotOk';
      var updateOk = '#fees_detailsUpdateOk';
      var insertfail = '#fees_detailsInsertFailed';
      var alreadyInserted = '#fees_details_already_inserted';

    } else if (this.id == "Submit_Extra") {
      var clrfield = ".extraCurField";
      var particulars = $("#extra_particulars").val();
      var amount = $("#extra_amount").val();
      var fees_id = $("#extra_fee_id").val();
      var date = $("#extra_date").val();
      var type = $("#extra_type").val();
      var ajaxUrl = 'FeesMasterModel1File/extra/ajaxInsertExtra.php';
      var insertOk = '#fees_detailsextraInsertOk';
      var insertNotOk = '#fees_detailsextraInsertNotOk';
      var updateOk = '#fees_detailsextraUpdateOk';
      var insertfail = '#fees_detailsextraInsertFailed';
      var alreadyInserted = '#fees_details_already_inserted_extra';

    } else if (this.id == "Submit_Amenity") {
      var clrfield = ".amenityField";
      var particulars = $("#amenity_particulars").val();
      var amount = $("#amenity_amount").val();
      var fees_id = $("#amenity_fee_id").val();
      var date = $("#amenity_date").val();
      var type = '0';
      var ajaxUrl = 'FeesMasterModel1File/amenity/ajaxInsertAmenity.php';
      var insertOk = '#fees_detailsamenityInsertOk';
      var insertNotOk = '#fees_detailsamenityInsertNotOk';
      var updateOk = '#fees_detailsamenityUpdateOk';
      var insertfail = '#fees_detailsamenityInsertFailed';
      var alreadyInserted = '#fees_details_already_inserted_amenity';
    }

    if (particulars != "" && amount != "" && date != "") {
      $.ajax({
        url: ajaxUrl,
        type: 'POST',
        data: { "fees_id": fees_id, "particulars": particulars, "amount": amount, "date": date, "type": type, "academic_year": academic_year, "medium": medium, "student_type": student_type, "standard": standard },
        cache: false,
        success: function (response) {
          var insresult = response.includes("Exists");
          var updresult = response.includes("Updated");
          var failed = response.includes("Failed");
          var studentType = response.includes("StudentType");
          if (insresult) {
            $(insertNotOk).show();
            setTimeout(function () {
              $(insertNotOk).fadeOut('fast');
            }, 2000);
          } else if (updresult) {
            $(updateOk).show();
            setTimeout(function () {
              $(updateOk).fadeOut('fast');
            }, 2000);
            
          } else if(failed){
            $(insertfail).show();
            setTimeout(function () {
              $(insertfail).fadeOut('fast');
            }, 2000);

          } else if(studentType){
            $(alreadyInserted).show();
            setTimeout(function () {
              $(alreadyInserted).fadeOut('fast');
            }, 2000);

          } else {
            $(insertOk).show();
            setTimeout(function () {
              $(insertOk).fadeOut('fast');
            }, 2000);

          }

          resetGrpFeesTable();
          resetExtraFeesTable();
          resetAmenityFeesTable();
          $(clrfield).val('');
        }
      });
    }
  });

  $("#grp_particulars").keyup(function () {
    var CTval = $("#grp_particulars").val();
    if (CTval.length == '') {
      $("#grp_particularsCheck").show();
      return false;
    } else {
      $("#grp_particularsCheck").hide();
    }
  });

  $("#grp_amount").keyup(function () {
    var CTval = $("#grp_amount").val();
    if (CTval.length == '') {
      $("#grp_amountCheck").show();
      return false;
    } else {
      $("#grp_amountCheck").hide();
    }
  });

  $("#grp_date").keyup(function () {
    var CTval = $("#grp_date").val();
    if (CTval.length == '') {
      $("#grp_dateCheck").show();
      return false;
    } else {
      $("#grp_dateCheck").hide();
    }
  });

  $("body").on("click", "#edit_grp", function () {
    var grp_course_id_edit = $(this).attr('value');
    $("#grp_course_id").val(grp_course_id_edit);
    $.ajax({
      url: 'FeesMasterModel1File/grp/ajaxEditGrp.php',
      type: 'POST',
      data: { "grp_course_id": grp_course_id_edit },
      dataType: 'json',
      cache: false,
      success: function (response) {
        $("#grp_particulars").val(response['grp_particulars']);
        $("#grp_amount").val(response['grp_amount']);
        $("#grp_date").val(response['grp_date']);
      }
    });
  });

  $("body").on("click", "#delete_grp", function () {
    var isok = confirm("Do you want delete Group/Course Fees?");
    if (isok == false) {
      return false;
    } else {
      var grp_course_id_dlte = $(this).attr('value');
      $.ajax({
        url: 'FeesMasterModel1File/grp/ajaxDeleteGrp.php',
        type: 'POST',
        data: { "grp_course_id": grp_course_id_dlte },
        cache: false,
        success: function (response) {
          var delresult = response.includes("Rights");
          if (delresult) {
            $('#fees_detailsDeleteNotOk').show();
            setTimeout(function () {
              $('#fees_detailsDeleteNotOk').fadeOut('fast');
            }, 2000);
          }
          else {
            resetGrpFeesTable();
            $('#fees_detailsDeleteOk').show();
            setTimeout(function () {
              $('#fees_detailsDeleteOk').fadeOut('fast');
            }, 2000);
          }
        }
      });
    }
  });
  //  Grp Table End

  $("#extra_particulars").keyup(function () {
    var CTval = $("#extra_particulars").val();
    if (CTval.length == '') {
      $("#extra_particularsCheck").show();
      return false;
    } else {
      $("#extra_particularsCheck").hide();
    }
  });

  $("#extra_amount").keyup(function () {
    var CTval = $("#extra_amount").val();
    if (CTval.length == '') {
      $("#extra_amountCheck").show();
      return false;
    } else {
      $("#extra_amountCheck").hide();
    }
  });

  $("#extra_date").keyup(function () {
    var CTval = $("#extra_date").val();
    if (CTval.length == '') {
      $("#extra_dateCheck").show();
      return false;
    } else {
      $("#extra_dateCheck").hide();
    }
  });
  $("body").on("click", "#edit_extra", function () {
    var extra_fee_id_edit = $(this).attr('value');
    $("#extra_fee_id").val(extra_fee_id_edit);
    $.ajax({
      url: 'FeesMasterModel1File/extra/ajaxEditextra.php',
      type: 'POST',
      data: { "extra_fee_id": extra_fee_id_edit },
      dataType: 'json',
      cache: false,
      success: function (response) {
        $("#extra_particulars").val(response['extra_particulars']);
        $("#extra_amount").val(response['extra_amount']);
        $("#extra_date").val(response['extra_date']);
        $("#extra_type").val(response['extra_type']);
      }
    });
  });

  $("body").on("click", "#delete_extra", function () {
    var isok = confirm("Do you want delete Fees?");
    if (isok == false) {
      return false;
    } else {
      var extra_fee_id_dlt = $(this).attr('value');
      $.ajax({
        url: 'FeesMasterModel1File/extra/ajaxDeleteExtra.php',
        type: 'POST',
        data: { "extra_fee_id": extra_fee_id_dlt },
        cache: false,
        success: function (response) {
          var delresult = response.includes("Rights");
          if (delresult) {
            $('#fees_detailsextraDeleteNotOk').show();
            setTimeout(function () {
              $('#fees_detailsextraDeleteNotOk').fadeOut('fast');
            }, 2000);
          }
          else {
            resetExtraFeesTable();
            $('#fees_detailsextraDeleteOk').show();
            setTimeout(function () {
              $('#fees_detailsextraDeleteOk').fadeOut('fast');
            }, 2000);
          }
        }
      });
    }
  });
  //  Extra  Table End

  $("#amenity_particulars").keyup(function () {
    var CTval = $("#amenity_particulars").val();
    if (CTval.length == '') {
      $("#amenity_particularsCheck").show();
      return false;
    } else {
      $("#amenity_particularsCheck").hide();
    }
  });

  $("#amenity_amount").keyup(function () {
    var CTval = $("#amenity_amount").val();
    if (CTval.length == '') {
      $("#amenity_amountCheck").show();
      return false;
    } else {
      $("#amenity_amountCheck").hide();
    }
  });

  $("#amenity_date").keyup(function () {
    var CTval = $("#amenity_date").val();
    if (CTval.length == '') {
      $("#amenity_dateCheck").show();
      return false;
    } else {
      $("#amenity_dateCheck").hide();
    }
  });

  $("body").on("click", "#edit_amenity", function () {
    var amenity_fee_id_edit = $(this).attr('value');
    $("#amenity_fee_id").val(amenity_fee_id_edit);
    $.ajax({
      url: 'FeesMasterModel1File/amenity/ajaxEditAmenity.php',
      type: 'POST',
      data: { "amenity_fee_id": amenity_fee_id_edit },
      dataType: 'json',
      cache: false,
      success: function (response) {
        $("#amenity_particulars").val(response['amenity_particulars']);
        $("#amenity_amount").val(response['amenity_amount']);
        $("#amenity_date").val(response['amenity_date']);
      }
    });
  });

  $("body").on("click", "#delete_amenity", function () {
    var isok = confirm("Do you want delete Fees?");
    if (isok == false) {
      return false;
    } else {
      var amenity_fee_id_dlt = $(this).attr('value');
      $.ajax({
        url: 'FeesMasterModel1File/amenity/ajaxDeleteAmenity.php',
        type: 'POST',
        data: { "amenity_fee_id": amenity_fee_id_dlt },
        cache: false,
        success: function (response) {
          var delresult = response.includes("Rights");
          if (delresult) {
            $('#fees_detailsamenityDeleteNotOk').show();
            setTimeout(function () {
              $('#fees_detailsamenityDeleteNotOk').fadeOut('fast');
            }, 2000);
          }
          else {
            resetAmenityFeesTable();
            $('#fees_detailsamenityDeleteOk').show();
            setTimeout(function () {
              $('#fees_detailsamenityDeleteOk').fadeOut('fast');
            }, 2000);
          }
        }
      });
    }
  });

  //Bulk Upload START
  $("#fees_master_bulk_upload").click(function () {
    window.location.href = 'uploads/downloadfiles/feesMasterBulkUpload.xlsx'
  });

  //Student Bulk Import Excel upload
  $("#submitfeesMasterBulkUpload").click(function () {

  var feesType = $('#fees_type').val();
  var file_data = $('#feesMasterExcelfile').prop('files')[0];
  var feesData = new FormData();
  feesData.append('file', file_data);
  feesData.append('feesType', feesType);

  if (feesMasterExcelfile.files.length == 0 || feesType =='') {
      alert("Please Select All Fields");
      return false;
  }

  $.ajax({
    type: 'POST',
    url: 'ajaxFiles/ajaxFeesMasterBulkUpload.php',
    data: feesData,
    dataType: 'json',
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
    $('#feesMasterExcelfile').attr("disabled", true);
    $('#fees_type').attr("disabled", true);
    $('#submitfeesMasterBulkUpload').attr("disabled", true);
    },
    success: function (data) {
      if (data == 0) {
        $("#notinsertsuccess").hide();
        $("#insertsuccess").show();
        $("#fees_type").val('');
        $("#feesMasterExcelfile").val('');
      } else if (data == 1) {
        $("#insertsuccess").hide();
        $("#notinsertsuccess").show();
        $("#fees_type").val('');
        $("#feesMasterExcelfile").val('');
      }
    },
    complete: function () {
      $('#fees_type').attr("disabled", false);
      $('#feesMasterExcelfile').attr("disabled", false);
      $('#submitfeesMasterBulkUpload').attr("disabled", false);
    }
  });
  });
  //Bulk Upload END

}); //Document END.

$(function(){
  getStandardList(); //Get Standard List.
  getAcademicYearList(); //Get  Academic Year List.
})

function resetGrpFeesTable() {
  var academic_year = $("#academic_year").val();
  var medium = $("#medium").val();
  var student_type = $("#student_type").val();
  var standard = $("#standard").val();
  $.ajax({
    url: 'FeesMasterModel1File/grp/ajaxResetGrpTable.php',
    type: 'POST',
    data: { "academic_year": academic_year, "medium": medium, "student_type": student_type, "standard": standard },
    cache: false,
    success: function (html) {
      $("#updatedstockinfotable").empty();
      $("#updatedstockinfotable").html(html);
    }
  });
}

function resetExtraFeesTable() {
  var academic_year = $("#academic_year").val();
  var medium = $("#medium").val();
  var student_type = $("#student_type").val();
  var standard = $("#standard").val();
  $.ajax({
    url: 'FeesMasterModel1File/extra/ajaxResetExtraTable.php',
    type: 'POST',
    data: { "academic_year": academic_year, "medium": medium, "student_type": student_type, "standard": standard },
    cache: false,
    success: function (html) {
      $("#updatedstockinfotableextra").empty();
      $("#updatedstockinfotableextra").html(html);
    }
  });
}

function resetAmenityFeesTable() {
  var academic_year = $("#academic_year").val();
  var medium = $("#medium").val();
  var student_type = $("#student_type").val();
  var standard = $("#standard").val();
  $.ajax({
    url: 'FeesMasterModel1File/amenity/ajaxResetAmenityTable.php',
    type: 'POST',
    data: { "academic_year": academic_year, "medium": medium, "student_type": student_type, "standard": standard },
    cache: false,
    success: function (html) {
      $("#updatedstockinfotableamenity").empty();
      $("#updatedstockinfotableamenity").html(html);
    }
  });
}

function getStandardList(){ //Getting standard list from database.
  $.ajax({
      type: 'POST',
      data: {},
      url: 'ajaxFiles/getStandardList.php',
      dataType: 'json',
      success:function(response){
          $('#standard').empty();
          $('#standard').append("<option value=''>Select Standard</option>");
          for(var i=0; i <response.length; i++){
              
              $('#standard').append("<option value='" +response[i]['std_id']+ "'>" +response[i]['std']+ "</option>");
          }
      }
  })
}

function getAcademicYearList(){ //Getting academic_year list from database.
  $.ajax({
      type: 'POST',
      data: {},
      url: 'ajaxFiles/getAcademicYearList.php',
      dataType: 'json',
      success:function(response){
          $('#academic_year').empty();
          $('#academic_year').append("<option value=''>Select Academic Year</option>");
          for(var i=0; i <response.length; i++){
              
              $('#academic_year').append("<option value='" +response[i]['academicyear']+ "'>" +response[i]['academicyear']+ "</option>");
          }
      }
  })
}