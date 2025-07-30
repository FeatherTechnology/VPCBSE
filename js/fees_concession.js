// Document is ready
$(document).ready(function () {

  $('input[name="concessiontype"]').click(function () {
    var concessionType = $(this).val();
    // clrDrpdwns(); //to all dropdown when change concession type.
    // clrStudentNameDrpdwn();
    
    if (concessionType == "GeneralConcession") {
      $("#generalconcessionDiv").show();
      $("#referralconcessionDiv").hide();
      $("#manualconcessionDiv").hide();
      getGeneralConcession();
      
    } else if (concessionType == "ReferalConcession") {
      $("#generalconcessionDiv").hide();
      $("#referralconcessionDiv").show();
      $("#manualconcessionDiv").hide();
      getReferralConcession();

    } else if (concessionType == "ManualConcession") {
      getStandardList(); //Getting standard list from database.
      $("#generalconcessionDiv").hide();
      $("#referralconcessionDiv").hide();
      $("#manualconcessionDiv").show();

    }
  });

  $("#medium, #standard").change(function () {
    var medium = $("#medium").val();
    var standard = $("#standard").val();
    if (medium != '0' && standard != '0') {
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

      // clrStudentNameDrpdwn(); //to clear student name dropdown.
    }//if END///
  });

  $("#section").change(function () {
    var section = $(this).val();
    if (section != '0') {
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

      // clrStudentNameDrpdwn(); //to clear student name dropdown.
    }//if END///
  });

  $("#student_id, #student_name1").change(function () {
    var studID = $(this).val();
    getStudentFeesDetails(studID,'showManualConcessionSTUDDetails');
    $("#showManualConcessionSTUDDetails").empty();
  });
  
  $(document).on('click','#add_general_concession',function () {
    let studentID = $(this).val();
    $('#divtitle').text('Fee Details For '+$(this).parent().parent().find('td:eq(1)').text());
    getStudentFeesDetails(studentID,'showGeneralConcessionDiv');
    $("#showGeneralConcessionDiv").empty();
  });

  $(document).on('click','.rejectConcession',function () {
    let rejectReason =  prompt("Are you sure to Reject this Concession?\nEnter reason here:");
    
    if(rejectReason){
      var conCessionType = $('#concession_type:checked').val();
      let StudentId = $(this).val();
      $.ajax({
        type: 'POST',
        data: { "StudentId": StudentId, "rejectReason": rejectReason, "conCessionType": conCessionType},
        url: 'FeesConcession/rejectConcession.php',
        dataType: 'json',
        success: function (result) {
        if(result == '1'){
          alert("Successfully  rejected the concession!");
          
        }else{
          alert("Reject Failed. Please try again later!");

        }
        window.location.href = "fees_concession";
        }
      });
    }else{
        alert("Reject cancelled!")
    }
    
  });
  
  $(document).on('click','#add_referral_concession',function () {
    let studentID = $(this).val();
    let refStudentId = $(this).data('id');
    $('#divtitle').text('Fee Details For '+$(this).parent().parent().find('td:eq(2)').text());
    let remark = $(this).parent().parent().find('td:eq(5)').text();
    let referredName = $(this).parent().parent().find('td:eq(6)').text();
    getReferralFeesDetails(studentID, remark, referredName, refStudentId);
  });

}); //Document END ///

$(function () {
  //When comes from the dashboard the type will trigger to show show table.
  let typeid = $('#typeid').val();
  if(typeid =='1'){
    $('.general').trigger('click');

  }else if(typeid =='2'){
    $('.referral').trigger('click');
  }

});

function getStandardList() { //Getting standard list from database.
  $.ajax({
    type: 'POST',
    data: {},
    url: 'ajaxFiles/getStandardList.php',
    dataType: 'json',
    success: function (response) {
      $('#standard').empty();
      $('#standard').append("<option value='0'>Select Standard</option>");
      for (var i = 0; i < response.length; i++) {
        $('#standard').append("<option value='" + response[i]['std_id'] + "'>" + response[i]['std'] + "</option>");
      }
    }
  })
}

function clrStudentNameDrpdwn() {
  $('#student_name1').val('0').trigger('change');
}

function clrDrpdwns() {
  $('#medium').val('0').trigger('change');
  $('#standard').val('0').trigger('change');
  $('#section').val('0').trigger('change');
  $('#student_id').val('0').trigger('change');
}

function getGeneralConcession() {
  $.ajax({
    url: 'FeesConcession/getGeneralConcessionDetailsTable.php',
    type: 'POST',
    data: { },
    cache: false,
    success: function (html) {
      $("#general_concession").empty();
      $("#general_concession").html(html);
    }
  });
}

function getReferralConcession() {
  $.ajax({
    url: 'FeesConcession/getReferralConcessionDetailsTable.php',
    type: 'POST',
    data: { },
    cache: false,
    success: function (html) {
      $("#referral_concession").empty();
      $("#referral_concession").html(html);
    }
  });
}

function getStudentFeesDetails(studentid, divid) {
  var concessionType = $('#concession_type:checked').val();
  $.ajax({
    url: 'FeesConcession/getAllFeesDetails.php',
    type: 'POST',
    data: { "studentid": studentid, "concessionType": concessionType },
    cache: false,
    success: function (html) {
      $("#"+divid).empty();
      $("#"+divid).html(html);

      functionAfterAjax();
    }
  });
}

function getReferralFeesDetails(studentid, refertype, refername, refStudentId) {
  var concessionType = $('#concession_type:checked').val();
  $.ajax({
    url: 'FeesConcession/getAllFeesForReferral.php',
    type: 'POST',
    data: { "studentid": studentid, "concessionType": concessionType, "refertype": refertype, "refername": refername, "refStudentId": refStudentId },
    cache: false,
    success: function (html) {
      $("#showGeneralConcessionDiv").empty();
      $("#showGeneralConcessionDiv").html(html);

      functionAfterAjax();
    }
  });
}

function functionAfterAjax(){

  //Check Amount, if 0 then set row as readonly
  $('.grpfeesamnt, .extrafeesamnt, .amenityfees, .transportfeesamnt').each(function(){
    var row = $(this).closest('tr');
    if (parseFloat($(this).val()) <= 0) {
        row.find('input').prop('readonly', true);
    }
  });

  $('.grpfeesscholarship').keyup(function(){
    var scholaramnt = parseInt($(this).parent().parent().find('.grpfeesscholarship').val());
    var grpfeeamnt = parseInt($(this).parent().parent().find('.grpfeesamnt').val());
    var balanceFees = grpfeeamnt - scholaramnt;
    
    if(scholaramnt > grpfeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var scholaramnt = parseInt($(this).parent().parent().find('.grpfeesscholarship').val());
      var grpfeeamnt = parseInt($(this).parent().parent().find('.grpfeesamnt').val());
      var balanceFees = grpfeeamnt - (scholaramnt);
      $(this).parent().parent().find('.grpfeesbalance').val(balanceFees);
      
    }else{
      $(this).parent().parent().find('.grpfeesbalance').val(balanceFees);
      
    }
  }); //Group fee calculation END.

  $('.extrafeesscholar').keyup(function(){
    var extrascholaramnt = parseInt($(this).parent().parent().find('.extrafeesscholar').val());
    var extrafeeamnt = parseInt($(this).parent().parent().find('.extrafeesamnt').val());
    var extrabalanceFees = extrafeeamnt - extrascholaramnt;
    
    if(extrascholaramnt > extrafeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var extrascholaramnt = parseInt($(this).parent().parent().find('.extrafeesscholar').val());
      var extrafeeamnt = parseInt($(this).parent().parent().find('.extrafeesamnt').val());
      var extrabalanceFees = extrafeeamnt - extrascholaramnt;
      $(this).parent().parent().find('.extrafeesbalance').val(extrabalanceFees);

    }else{
      $(this).parent().parent().find('.extrafeesbalance').val(extrabalanceFees);

    }
  }); //Extra curricular fee calculation END.

  $('.amenityfeesscholar').keyup(function(){
    var amenityscholaramnt = parseInt($(this).parent().parent().find('.amenityfeesscholar').val());
    var amenityfeeamnt = parseInt($(this).parent().parent().find('.amenityfees').val());
    var amenitybalanceFees = amenityfeeamnt - amenityscholaramnt;
    
    if(amenityscholaramnt > amenityfeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var amenityscholaramnt = parseInt($(this).parent().parent().find('.amenityfeesscholar').val());
      var amenityfeeamnt = parseInt($(this).parent().parent().find('.amenityfees').val());
      var amenitybalanceFees = amenityfeeamnt - amenityscholaramnt;
      $(this).parent().parent().find('.amenityfeesbalance').val(amenitybalanceFees);

    }else{
      $(this).parent().parent().find('.amenityfeesbalance').val(amenitybalanceFees);

    }
  }); //Amenity fee calculation END.
  
  $('.transportfeesscholarship').keyup(function(){
    var transportscholaramnt = parseInt($(this).parent().parent().find('.transportfeesscholarship').val());
    var transportfeeamnt = parseInt($(this).parent().parent().find('.transportfeesamnt').val());
    var transportbalanceFees = transportfeeamnt - transportscholaramnt;
    
    if(transportscholaramnt > transportfeeamnt){
      alert('Kindly Enter Less than or equal to Fees Amount');
      $(this).val("0");
      //To recalculate the balance to paid if amount entered greater value.
      var transportscholaramnt = parseInt($(this).parent().parent().find('.transportfeesscholarship').val());
      var transportfeeamnt = parseInt($(this).parent().parent().find('.transportfeesamnt').val());
      var transportbalanceFees = transportfeeamnt - transportscholaramnt;
      $(this).parent().parent().find('.transportfeesbalance').val(transportbalanceFees);
      
    }else{
      $(this).parent().parent().find('.transportfeesbalance').val(transportbalanceFees);
    }
  }); //Group fee calculation END.

} //after ajax function END.