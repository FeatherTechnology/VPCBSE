// Document is ready
$(document).ready(function(){

  $('input[name="payment_mode"]').click(function(){
  var value = $(this).val();
  
  if(value == "cash_payment"){
    $("#cash_payment").show();
    $("#cheque_payment").hide();
    $("#neft_payment").hide();

  } else if(value == "cheque"){
    $("#cash_payment").hide();
    $("#cheque_payment").show();
    $("#neft_payment").hide();
  }
  else if(value == "neft"){
    $("#cash_payment").hide();
    $("#cheque_payment").hide();
    $("#neft_payment").show();
  }
});

$('#other_charges_recieved').keyup(function(){
  getTotalFeeToBeCollected();
  getScholarshipTotal();
  getCollectedFeesTotal();
});

$('.cashreceive').keyup(function(){
  var cash = ($(this).parent().parent().find('.cash').val()) * ($(this).val());
  $(this).parent().parent().find('.amount').val(cash);
  
  var totalAmount = getCollectedAmount();
  
  var feeCollected = $('#fees_collected').val();
  if(totalAmount > feeCollected){
    alert('Please Enter Less than Fees Collected.')
    $(this).parent().parent().find('.cashreceive').val('0');
    $(this).parent().parent().find('.amount').val('0');
    var calcTotalAmount = getCollectedAmount(); 
    $('#total_amount').val(calcTotalAmount);
  }else{
    $('#total_amount').val(totalAmount);
  }
});//Denomination cash Calc

$('#cheque_amount').keyup(function(){
  var cheque = $(this).val();

  var feeCollect = $('#fees_collected').val();
  if(cheque > feeCollect){
    alert('Please Enter Less than Fees Collected.')
    $(this).val('')
  }
});//Denomination Cheque Calc 

$('#neft_amount').keyup(function(){
  var neft = $(this).val();

  var fee_collect = $('#fees_collected').val();
  if(neft > fee_collect){
    alert('Please Enter Less than Fees Collected.')
    $(this).val('')
  }
});//Denomination NEFT Calc 
  
}); // Document END.

$(function(){
  getReceiptCode(); //Receipt Number;
  getFeesTableFunc();
  getAcademicYearList(); //Get  Academic Year List.
});

function getFeesTableFunc(){
  var admissionFormId = $('#admission_form_id').val();
  var academicYear = $('#student_year_id').val();
  var medium = $('#student_medium').val();
  var studentType = $('#students_type').val();
  var standard = $('#standard_id').val(); 
  var student_extra_curricular = $('#student_extra_curricular').val(); 

  getGroupFeesDetails(admissionFormId, academicYear, medium, studentType, standard, student_extra_curricular);
  // getExtraCurricularActivityDetails(admissionFormId, academicYear, medium, studentType, standard);
  // getAmenityFeesDetails(admissionFormId, academicYear, medium, studentType, standard);

  // setTimeout(() => { 
  //   functionAfterAjax();
  //   getTotalFeeToBeCollected();//Fees to be collected total.
  //   getScholarshipTotal(); //Scholarship amount.
    
  // }, 1500);
}

function getReceiptCode(){
  // get Pay Reciept Code
  $.ajax({
    url: "ajaxFiles/getReceiptNo.php",
    data: {},
    cache: false,
    type: "post",
    dataType: "json",
    success: function (data) { 
      $("#receipt_number").val(data);
    }
  });
}

function getGroupFeesDetails(admissionFormId, academicYear, medium, studentType, standard, student_extra_curricular){
  $.ajax({
    type : 'POST',
    url : 'FeesCollectionFile/grp/getGroupFeesDetailsForPayFees.php',
    data : {'admissionFormId': admissionFormId,'academicYear': academicYear,'medium': medium,'studentType': studentType,'standard': standard},
    success:(function(reponse){
      $('#temp_group_fees').empty();
      $('#temp_group_fees').html(reponse);
    })
  }).then(function(){
    getExtraCurricularActivityDetails(admissionFormId, academicYear, medium, studentType, standard, student_extra_curricular);
  })
}

function getExtraCurricularActivityDetails(admissionFormId, academicYear, medium, studentType, standard, student_extra_curricular){
  $.ajax({
    type : 'POST',
    url : 'FeesCollectionFile/extra/getExtraCurricularActivityDetailsForPayFees.php',
    data : {'admissionFormId': admissionFormId,'academicYear': academicYear,'medium': medium,'studentType': studentType,'standard': standard, 'student_extra_curricular': student_extra_curricular},
    success:(function(reponse){
      $('#temp_extra_curricular_fees').empty();
      $('#temp_extra_curricular_fees').html(reponse);
    })
  }).then(function(){
    getAmenityFeesDetails(admissionFormId, academicYear, medium, studentType, standard);
  })
}

function getAmenityFeesDetails(admissionFormId, academicYear, medium, studentType, standard){
  $.ajax({
    type : 'POST',
    url : 'FeesCollectionFile/amenity/getAmenityFeesDetailsForPayFees.php',
    data : {'admissionFormId': admissionFormId,'academicYear': academicYear,'medium': medium,'studentType': studentType,'standard': standard},
    success:(function(reponse){
      $('#temp_amenity_fees').empty();
      $('#temp_amenity_fees').html(reponse);
    })
    }).then(function(){
      functionAfterAjax();
      getTotalFeeToBeCollected();//Fees to be collected total.
      getScholarshipTotal(); //Scholarship amount.
    });
}

function functionAfterAjax(){

  //Check Amount, if 0 then set row as readonly
  $('.grpfeesamnt, .extrafeesamnt, .amenityfees').each(function(){

    var row = $(this).closest('tr');
    if (parseFloat($(this).val()) <= 0) {
        row.find('input').prop('readonly', true);
    }
  })

  $(document).on('keyup','.grpfeesreceived, .grpfeesscholarship',function(){
    var feeamnt = parseInt($(this).parent().parent().find('.grpfeesreceived').val());
    var scholaramnt = parseInt($(this).parent().parent().find('.grpfeesscholarship').val());
    var grpfeeamnt = parseInt($(this).parent().parent().find('.grpfeesamnt').val());
    var totalCollectgrpFees = feeamnt + scholaramnt;
    var balanceFees = grpfeeamnt - (feeamnt + scholaramnt);
    
    if(totalCollectgrpFees > grpfeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var feeamnt = parseInt($(this).parent().parent().find('.grpfeesreceived').val());
      var scholaramnt = parseInt($(this).parent().parent().find('.grpfeesscholarship').val());
      var grpfeeamnt = parseInt($(this).parent().parent().find('.grpfeesamnt').val());
      var balanceFees = grpfeeamnt - (feeamnt + scholaramnt);
      $(this).parent().parent().find('.grpfeesbalance').val(balanceFees);
      
    }else{
      $(this).parent().parent().find('.grpfeesbalance').val(balanceFees);
      
      getScholarshipTotal(); //Calc scholarship
      getCollectedFeesTotal(); //Calc Fees collect.
    }

  }); //Group fee calculation END.

  $(document).on('keyup','.extrafeesreceived, .extrafeesscholar',function(){
    var extrafeereceived = parseInt($(this).parent().parent().find('.extrafeesreceived').val());
    var extrascholaramnt = parseInt($(this).parent().parent().find('.extrafeesscholar').val());
    var extrafeeamnt = parseInt($(this).parent().parent().find('.extrafeesamnt').val());
    var totalCollectextraFees = extrafeereceived + extrascholaramnt;
    var extrabalanceFees = extrafeeamnt - (extrafeereceived + extrascholaramnt);
    
    if(totalCollectextraFees > extrafeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var extrafeereceived = parseInt($(this).parent().parent().find('.extrafeesreceived').val());
      var extrascholaramnt = parseInt($(this).parent().parent().find('.extrafeesscholar').val());
      var extrafeeamnt = parseInt($(this).parent().parent().find('.extrafeesamnt').val());
      var extrabalanceFees = extrafeeamnt - (extrafeereceived + extrascholaramnt);
      $(this).parent().parent().find('.extrafeesbalance').val(extrabalanceFees);

    }else{
      $(this).parent().parent().find('.extrafeesbalance').val(extrabalanceFees);

      getScholarshipTotal(); //Calc scholarship
      getCollectedFeesTotal(); //Calc Fees collect.
    }

  }); //Extra curricular fee calculation END.

  $(document).on('keyup','.amenityfeesreceived, .amenityfeesscholar',function(){
    var amenityfeereceived = parseInt($(this).parent().parent().find('.amenityfeesreceived').val());
    var amenityscholaramnt = parseInt($(this).parent().parent().find('.amenityfeesscholar').val());
    var amenityfeeamnt = parseInt($(this).parent().parent().find('.amenityfees').val());
    var totalCollectamenityFees = amenityfeereceived + amenityscholaramnt;
    var amenitybalanceFees = amenityfeeamnt - (amenityfeereceived + amenityscholaramnt);
    
    if(totalCollectamenityFees > amenityfeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var amenityfeereceived = parseInt($(this).parent().parent().find('.amenityfeesreceived').val());
      var extrascholaramnt = parseInt($(this).parent().parent().find('.amenityfeesscholar').val());
      var amenityfeeamnt = parseInt($(this).parent().parent().find('.amenityfees').val());
      var amenitybalanceFees = amenityfeeamnt - (amenityfeereceived + extrascholaramnt);
      $(this).parent().parent().find('.amenityfeesbalance').val(amenitybalanceFees);

    }else{
      $(this).parent().parent().find('.amenityfeesbalance').val(amenitybalanceFees);

      getScholarshipTotal(); //Calc scholarship
      getCollectedFeesTotal(); //Calc Fees collect.
    }

  }); //Amenity fee calculation END.

} //after ajax function END.

//Total fee to be collected calc.
function getTotalFeeToBeCollected(){
  var getGrpFeesTotal = 0 ;
  $(".grpfeesamnt").each(function(){
    getGrpFeesTotal += parseInt($(this).val()||0);
  }); //Group Fees Table

  var getExtraFeesTotal = 0 ;
  $(".extrafeesamnt").each(function(){
    getExtraFeesTotal += parseInt($(this).val()||0);
  }); //Extra curricular Activities Fees Table

  var getAmenityFeesTotal = 0 ;
  $(".amenityfees").each(function(){
    getAmenityFeesTotal += parseInt($(this).val()||0);
  }); //Amenity Fees Table

  var getFeesReceived = parseInt($('#other_charges_recieved').val());

  var totalFees = getGrpFeesTotal + getExtraFeesTotal + getAmenityFeesTotal + getFeesReceived;
  $('#fees_total').val(totalFees); //set value on Total fees to be collected.
}

//scholarship calc.
function getScholarshipTotal(){
  var getGrpScholarshipTotal = 0 ;
  $(".grpfeesscholarship").each(function(){
    getGrpScholarshipTotal += parseInt($(this).val()||0);
  }); //Group Fees Table
  
  var getExtraScholarshipTotal = 0 ;
  $(".extrafeesscholar").each(function(){
    getExtraScholarshipTotal += parseInt($(this).val()||0);
  }); //Extra curricular Activities Fees Table
  
  var getAmenityScholarshipTotal = 0 ;
  $(".amenityfeesscholar").each(function(){
    getAmenityScholarshipTotal += parseInt($(this).val()||0);
  }); //Amenity Fees Table
  
  var totalScholarship = getGrpScholarshipTotal + getExtraScholarshipTotal + getAmenityScholarshipTotal;
  $('#fees_scholarship').val(totalScholarship); //set value on scholarship.
  var ToBeCollect = parseInt($('#fees_total').val()) - totalScholarship;
  $('#final_amount_recieved').val(ToBeCollect); //set value on Final Amount to be collected.
  var balFees = parseInt($('#final_amount_recieved').val()) - parseInt($('#fees_collected').val());
  $('#fees_balance').val(balFees); //set value on Final Amount to be collected.
}

//Fees collected calc.
function getCollectedFeesTotal(){
  var getGrpCollectedFees = 0 ;
  $(".grpfeesreceived").each(function(){
    getGrpCollectedFees += parseInt($(this).val()||0);
  }); //Group Fees Table
  
  var getExtraCollectedFees = 0 ;
  $(".extrafeesreceived").each(function(){
    getExtraCollectedFees += parseInt($(this).val()||0);
  }); //Extra curricular Activities Fees Table
  
  var getAmenityCollectedFees = 0 ;
  $(".amenityfeesreceived").each(function(){
    getAmenityCollectedFees += parseInt($(this).val()||0);
  }); //Amenity Fees Table
  
  var getFeesReceivedToAddCollect = parseInt($('#other_charges_recieved').val());

  var totalCollectedFees = getGrpCollectedFees + getExtraCollectedFees + getAmenityCollectedFees + getFeesReceivedToAddCollect;
  $('#fees_collected').val(totalCollectedFees); //set value on Fees Collected.
  var balFees = parseInt($('#final_amount_recieved').val()) - totalCollectedFees;
  $('#fees_balance').val(balFees); //set value on Final Amount to be collected.
}

function getCollectedAmount(){
  var totalAmount = 0;
  $('.amount').each(function(){
    totalAmount += parseInt($(this).val()||0)
  });

  return totalAmount;
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
          var user_academic_year = $('#user_academic_year').val();
          for(var i=0; i <response.length; i++){
            var selected = '';
            if (user_academic_year  == response[i]['academicyear']) {
              selected  = 'selected';
            }
              
              $('#academic_year').append("<option value='" +response[i]['academicyear']+ "' "+selected+">" +response[i]['academicyear']+ "</option>");
          }
      }
  })
}