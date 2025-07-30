// Document is ready
$(document).ready(function () {

  $("#medium, #standard").change(function () {
    var medium = $("#medium").val();
    var standard = $("#standard").val();
    if(medium != '0' && standard != '0'){
    $.ajax({
      url: 'FeesCollectionFile/grp/ajaxgetStudentList.php',
      type: 'post',
      data: { "medium": medium, "standard": standard },
      dataType: 'json',
      success: function (response) {

        $('#section').empty();
        $('#section').append("<option value='0'>Select Section</option>");
        for (var i = 0; i < response.section.length; i++) {
          $('#section').append("<option value='" + response.section[i] + "'>" + response.section[i] + "</option>");
        }
      },
    });

    $('#student_id').empty();
    $('#student_id').append("<option value='0'>Select Student</option>");

    clrStudentNameDrpdwn(); //to clear student name dropdown.
    $("#feesCollectionDetailsDiv").hide(); //hide the collection details div.
    }//if END///
  });

  $("#section").change(function () {
    var section = $(this).val();
    if(section != '0'){
    var medium = $("#medium").val();
    var standard = $("#standard").val();
    $.ajax({
      url: 'FeesCollectionFile/grp/ajaxgetStudentList.php',
      type: 'post',
      data: { "medium": medium, "standard": standard, "section": section },
      dataType: 'json',
      success: function (response) {

        $('#student_id').empty();
        $('#student_id').append("<option value='0'>Select Students</option>");
        for (var i = 0; i < response.student_id.length; i++) {
          $('#student_id').append("<option value='" + response.student_id[i] + "'>" + response.student_name[i] + "</option>");
        }
      }
    });

    clrStudentNameDrpdwn(); //to clear student name dropdown.
    $("#feesCollectionDetailsDiv").hide(); //hide the collection details div.
  }//if END///
  });


  $('#student_id').change(function () {
    var studID = $(this).val();
    if(studID != '0'){
      $('#getStudID').val(studID);
      clrStudentNameDrpdwn(); //to clear student name dropdown.
      getstudentDetails(studID);
    }
  });

  $('#student_name1').change(function () {
    var studid = $(this).val();
    if(studid != '0'){
      $('#getStudID').val(studid);
      clrDrpdwns(); //to clear other dropdown///
      getstudentDetails(studid);
    }
  });

  // $("#paid_fees_details").on('click', '.printpo', function () {
  //   var currentRow = $(this).closest("tr");
  //   var fees_ids = currentRow.find('.fees_id').val();
  //   var student_id = currentRow.find('.student_id').val();
  //   var academic_year = currentRow.find('.academicyear').val();
  //   var receipt_date = currentRow.find("td:eq(1)").text();
  //   var receipt_number = currentRow.find("td:eq(3)").text();
  //   var mergedParticularsArray = currentRow.find("td:eq(4)").text();
  //   var mergedAmountArray = currentRow.find("td:eq(5)").text();
    
  //   $.ajax({
  //     url: "FeesCollectionFile/grp/printFeesDetails.php",
  //     data: {
  //       "fees_ids": fees_ids,
  //       "student_id": student_id,
  //       "receipt_date": receipt_date,
  //       "receipt_number": receipt_number,
  //       "academic_year": academic_year,
  //       "mergedParticularsArray": mergedParticularsArray,
  //       "mergedAmountArray": mergedAmountArray
  //     },
  //     cache: false,
  //     type: "post",
  //     success: function (html) {
  //       $("#poprintfield").html(html);
  //     }
  //   });
  // });

  $("#paid_fees_details").on('click', '.printpo', function () {
    var currentRow = $(this).closest("tr");
    var fees_ids = currentRow.find('.fees_id').val();
    var student_id = currentRow.find('.student_id').val();
    var academic_year = currentRow.find('.academicyear').val();
    var receipt_date = currentRow.find("td:eq(1)").text();
    var receipt_number = currentRow.find("td:eq(3)").text();
    var mergedParticularsArray = currentRow.find("td:eq(4)").text();
    var mergedAmountArray = currentRow.find("td:eq(5)").text();
    
    // Open a new window or tab
    var printWindow = window.open('', '_blank');
    
    // Make sure the popup window is not blocked
    if (printWindow) {
        // Load the content into the popup window
        $.ajax({
            url: "FeesCollectionFile/grp/printFeesDetails.php",
            data: {
                "fees_ids": fees_ids,
                "student_id": student_id,
                "receipt_date": receipt_date,
                "receipt_number": receipt_number,
                "academic_year": academic_year,
                "mergedParticularsArray": mergedParticularsArray,
                "mergedAmountArray": mergedAmountArray
            },
            cache: false,
            type: "post",
            success: function (html) {
                // Write the content to the new window
                printWindow.document.open();
                printWindow.document.write(html);
                printWindow.document.close();

                // Optionally, print the content
                printWindow.print();
            },
            error: function () {
                // Handle error
                printWindow.close();
                alert('Failed to load print content.');
            }
        });
    } else {
        alert('Popup blocked. Please allow popups for this website.');
    }
});

  $("#paid_fees_details").on('click', '.print_transport_fees', function () {
    var currentRow = $(this).closest("tr");
    var fees_ids = currentRow.find('.fees_id').val();
    
    // Open a new window or tab
    var printWindow = window.open('', '_blank');
    
    // Make sure the popup window is not blocked
    if (printWindow) {
        // Load the content into the popup window
        $.ajax({
            url: "ajaxFiles/transport_fees_print.php",
            data: {
                "transportFeesid": fees_ids
            },
            cache: false,
            type: "post",
            success: function (html) {
                // Write the content to the new window
                printWindow.document.open();
                printWindow.document.write(html);
                printWindow.document.close();

                // Optionally, print the content
                printWindow.print();
            },
            error: function () {
                // Handle error
                printWindow.close();
                alert('Failed to load print content.');
            }
        });
    } else {
        alert('Popup blocked. Please allow popups for this website.');
    }
});

  $("#paid_fees_details").on('click', '.delete_payfees', function () { //pay fees delete
    var isok=confirm("Do you want delete Fees?");
    if(isok==false){
      return false;
    }else{
    var feesid = $(this).closest('tr').find('.fees_id').val();
    var studentid = $(this).closest('tr').find('.student_id').val();
    $.ajax({
      type: "POST",
      data: { "feesid": feesid },
      url: "FeesCollectionFile/feesCollection/deletePayFeesDetails.php",
      success: function (response) {
        console.log(response);
        if(response == '1'){
          alert("Successfully fees deleted!")
          getPaidDetails(studentid);//call paid details function
          getstudentDetails(studentid);//call Fees details after action to show updated value.
        }else{
          alert("Unable to delete, please try again!")
        }
      }
    });
    }
  });
  $("#paid_fees_details").on('click', '.delete_lastpayfees', function () { //pay fees delete
    var isok=confirm("Do you want delete Fees?");
    if(isok==false){
      return false;
    }else{
    var feesid = $(this).closest('tr').find('.fees_id').val();
    var studentid = $(this).closest('tr').find('.student_id').val();
    $.ajax({
      type: "POST",
      data: { "feesid": feesid },
      url: "FeesCollectionFile/feesCollection/deleteLastPayFeesDetails.php",
      success: function (response) {
        console.log(response);
        if(response == '1'){
          alert("Successfully fees deleted!")
          getPaidDetails(studentid);//call paid details function
          getstudentDetails(studentid);//call Fees details after action to show updated value.
        }else{
          alert("Unable to delete, please try again!")
        }
      }
    });
    }
  });

  $("#paid_fees_details").on('click', '.delete_transportfees', function () { //Transport fees delete
    var isok=confirm("Do you want delete Fees?");
    if(isok==false){
      return false;
    }else{
    var feesid = $(this).closest('tr').find('.fees_id').val();
    var studentid = $(this).closest('tr').find('.student_id').val();
    $.ajax({
      type: "POST",
      data: { "feesid": feesid },
      url: "FeesCollectionFile/feesCollection/deleteTransportFeesDetails.php",
      success: function (response) {
        console.log(response);
        if(response == '1'){
          alert("Successfully fees deleted!")
          getPaidDetails(studentid);//call paid details function
          getstudentDetails(studentid);//call Fees details after action to show updated value.
        }else{
          alert("Unable to delete, please try again!")
        }
      }
    });
    }
  });

  $("#studentBulkDownload").click(function () {
    window.location.href = 'uploads/downloadfiles/bulkUpload_from_ASP.NET_template.xlsx'
  });

  //Student Bulk Import Excel upload
  $("#insertsuccess").hide();
  $("#notinsertsuccess").hide();
  $("#submitstudentBulkUpload").click(function () {

  var file_data = $('#stundentExcelfile').prop('files')[0];
  var withstudent_bulk = new FormData();
  withstudent_bulk.append('file', file_data);

  if (stundentExcelfile.files.length == 0) {
      alert("Please Select Excel File");
      return false;
  }

    $.ajax({
      type: 'POST',
      // url: 'studentFile/ajaxBulkUploadFromASPstudentCreation.php',
      url: 'studentFile/ajaxBulkUploadFromASP.NET.php',
      data: withstudent_bulk,
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
      $('#stundentExcelfile').attr("disabled", true);
      $('#submitstudentBulkUpload').attr("disabled", true);
      },
      success: function (data) {
      if (data == 0) {
          $("#notinsertsuccess").hide();
          $("#insertsuccess").show();
          $("#stundentExcelfile").val('');
      } else if (data == 1) {
          $("#insertsuccess").hide();
          $("#notinsertsuccess").show();
          $("#stundentExcelfile").val('');
      }
      },
      complete: function () {
      $('#stundentExcelfile').attr("disabled", false);
      $('#submitstudentBulkUpload').attr("disabled", false);
      }
    });
  });

}); //Document END//


$(function () {
  getStandardList(); //Getting standard list from database.
  setTimeout(() => {
    let admission_form_id = $('#admission_form_id').val();
    if(admission_form_id !=''){
      $('#student_name1').val(admission_form_id).trigger('change');//If return from fees screen the selected student has to show so return student id and calling the function.
    }
  }, 1000);

});

function getStandardList() { //Getting standard list from database.
  // var upd_std = $('#standardEdit').val();
  $.ajax({
    type: 'POST',
    data: {},
    url: 'ajaxFiles/getStandardList.php',
    dataType: 'json',
    success: function (response) {
      $('#standard').empty();
      $('#standard').append("<option value='0'>Select Standard</option>");
      for (var i = 0; i < response.length; i++) {
        var selected = '';
        // if (upd_std == response[i]['std_id']) {
        //   selected = 'selected';
        // }
        $('#standard').append("<option value='" + response[i]['std_id'] + "'" + selected + ">" + response[i]['std'] + "</option>");
      }
    }
  })
}

function getstudentDetails(student_id) {
    $.ajax({
      type: 'POST',
      data: { "student_id": student_id },
      url: 'FeesCollectionFile/feesCollection/getStudentFeesCollectionDetails.php',
      dataType: 'json',
      success: function (response) {
        // console.log(response);

        $("#admission_number").val(response['admission_number']);
        $("#roll_number").val(response['studentrollno']);
        $("#cls_section").val(response['standard_name']+ ' - ' +response['section']);
        $("#student_name").val(response['student_name']);

        $("#grp_amount").val(response['overallGrpAmount']);
        $("#extra_amount").val(response['overallExtraCurAmount']);
        $("#amenity_amount").val(response['overallAmenityAmount']);
        $("#tranport_grp_amount").val(response['overallTransportAmount']);
        $("#last_year_amount").val(response['overallLastYearFees']);

        $("#paid_grp_amount").val(response['overallpaid_grp_amount']);
        $("#paid_extra_amount").val(response['overallpaid_extra_cur_amount']);
        $("#paid_amenity_amount").val(response['overallpaid_amenity_amount']); 
        $("#paid_tranport_amount").val(response['overallpaid_transport_amount']);
        $("#paid_last_year_amount").val(response['lastyr_overallpaid_amount']);

        $("#grp_concession_amount").val(response['overall_grp_concession_amount']);
        $("#extra_concession_amount").val(response['overall_extra_cur_concession_amount']);
        $("#amenity_concession_amount").val(response['overall_amenity_concession_amount']);
        $("#tranport_concession_amount").val(response['overall_transport_concession_amount']);
        $("#last_year_concession_amount").val(response['overall_lastyr_concession_amount']);

        $('#gross_balance_amount').val(response['netPaySchoolFees']);
        $('#extra_balance_amount').val(response['netPayExtraCurFees']);
        $('#amenity_balance_amount').val(response['netPayAmenityFees']);
        $('#tranport_balance_amount').val(response['netPayTransportFees']);
        $('#last_year_balance_amount').val(response['netPayLastYearFees']);

        if (response['netPaySchoolFees'] == 0) {
          $("#gross_balance_amount").css("color", "green");
        } else {
          $("#gross_balance_amount").css("color", "red");
        }

        if (response['netPayExtraCurFees'] == 0) {
          $("#extra_balance_amount").css("color", "green");
        } else {
          $("#extra_balance_amount").css("color", "red");
        }

        if (response['netPayAmenityFees'] == 0) {
          $("#amenity_balance_amount").css("color", "green");
        } else {
          $("#amenity_balance_amount").css("color", "red");
        }

        if (response['netPayTransportFees'] == 0) {
          $("#tranport_balance_amount").css("color", "green");
        } else {
          $("#tranport_balance_amount").css("color", "red");
        }

        if (response['netPayLastYearFees'] == 0) {
          $("#last_year_balance_amount").css("color", "green");
        } else {
          $("#last_year_balance_amount").css("color", "red");
        }

        getPaidDetails(student_id);//call paid details function
      }//success END

    }); //Ajax END.

    $("#feesCollectionDetailsDiv").show();

} //get student Details function END///

function payFees() {
  var payfeestudentId = $('#getStudID').val();
  var url = "pay_fees&pagename=feescollection&upd=" + payfeestudentId;
  window.location.href = url;
}

function payTrasportFees() {
  var transportstudentId = $('#getStudID').val();
  var url = "transport_fees&pagename=feescollection&upd=" + transportstudentId;
  window.location.href = url;
}

function payLastYearFees() {
  var lastyrstudentId = $('#getStudID').val();
  var url = "last_year_fees_pay&pagename=feescollection&upd=" + lastyrstudentId;
  window.location.href = url;
}

function clrStudentNameDrpdwn(){
  $('#student_name1').val('0').trigger('change');
}

function clrDrpdwns(){
  $('#medium').val('0').trigger('change');
  $('#standard').val('0').trigger('change');
  $('#section').val('0').trigger('change');
  $('#student_id').val('0').trigger('change');
}

function getPaidDetails(student_id){
//Paid fees details table
$.ajax({
  url: 'FeesCollectionFile/feesCollection/getPaidDetails.php',
  type: 'post',
  data: { "student_id": student_id },
  success: function (html) {
    $("#paid_fees_details").empty();
    $("#paid_fees_details").html(html);
  }
});
$("table tbody tr td:first-child").css("background-color", "#1b6aaa6e");
$("table tbody tr td:first-child").css("color", "white");
}