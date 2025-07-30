$(document).ready(function () {

  // Select all checkboxes when the "select all" checkbox is checked
  $('#select-all').click(function () {
    $('.checkbox').prop('checked', this.checked);
    updateUnselectedTable();
    if (this.checked == true) {
      // hide the unselected table if select all student.
      $('#unselected_table').hide();
    }
  });
  const today = new Date();
  const currentYear = today.getFullYear();
  $('#period_from').attr('min', currentYear + '-01-01');
  $('#period_from').on('change', function () {
    // Get the selected Period From date
    var periodFrom = $(this).val();

    // Set the min attribute of Period To to the selected Period From date
    $('#period_to').attr('min', periodFrom);
  });


  // Add event listeners to the Period From and Period To inputs
  $('#period_from').on('change', updateAcademicPeriod);
  $('#period_to').on('change', updateAcademicPeriod);

  //////////////////////////////Academic Modal/////////////////////////////////
  $('#submit_academic').click(function (event) {
    event.preventDefault();
    $(this).attr('disabled', true);
    // Get values from input fields
    let period_from = $('#period_from').val();
    let period_to = $('#period_to').val();
    let academic_period = $('#academic_period').val();

    // Combined Validation
    if (period_from.trim() === "" || period_to.trim() === "" || academic_period.trim() === "") {
      alert("Please fill out all mandatory fields.");
      $('#submit_academic').attr('disabled', false);
      return;
    }

    // If all fields are valid, proceed with AJAX submission
    $.ajax({
      type: 'POST',
      data: { 'period_from': period_from, 'period_to': period_to, 'academic_period': academic_period },
      url: 'ajaxFiles/sumbitAcademicInfo.php',
      dataType: 'json',
      success: function (result) {
        $('#submit_academic').attr('disabled', false);
        if (result == '0') {
          $('#period_from').val('');
          $('#period_to').val('');
          $('#academic_period').val('');
          alert("Academic Period is Already Added");
        } else if (result == '1') {
          alert("Academic Info Added Successfully!");
          getAcademicTable();
        } else {
          alert("Academic Info Addition Failed!");
        }

      }
    });

  });

  /////////////////////////////////////////////////////////////////////////////
  $('#submitFailList').click(function () {
    if ($('.checkbox').length === $('.checkbox:checked').length) {
      alert('All students are pass');

    } else {
      updateUnselectedTable();

      // Show the unselected table
      $('#unselected_table').show();

    }
  });

  $('#standard').change(function () {
    var standard = $("#standard").val();
    if (standard.length != 0) {
      $.ajax({
        url: 'FeesCollectionFile/grp/ajaxgetStudentList.php',
        type: 'post',
        data: { "standard": standard },
        dataType: 'json',
        success: function (response) {
          // clear the section dropdown and add a default option
          $('#section').empty();
          $('#section').append("<option value=''>Select Section</option>");

          // loop through the section list in the response and add options to the section dropdown
          for (var i = 0; i < response.section.length; i++) {
            $('#section').append("<option value='" + response.section[i] + "'>" + response.section[i] + "</option>");
          }
        }
      });
    } else {
      $('#section').empty();
      // getStudentListForRollBack('','', 1); //1 =showing All students in initially.
    }
  });

  $('#section').change(function () {
    var standard = $("#standard").val();
    var section = $("#section").val();
    if (standard.length != 0 && section.length != 0) {
      getStudentListForRollBack(standard, section, 2); //2 =selecting standard and section to show particular std students.
    }
  });
  $(document).on('click', '.academicDeleteBtn', function () {
    var data = $(this).data('id').split('_');
    var year_id = data[0];
    var academic_year = data[1];
    getAcademicDelete(year_id,academic_year);
    return;
  });
  $('#submitschool_creation').click(function (e) {
    event.preventDefault();
    $(this).attr('disabled', true);
    var studentID = $('input[type="checkbox"]:checked').map(function () {
      return $(this).closest('tr').find('input[name="studentId[]"]').val();
    }).get();
    var standardID = $('input[type="checkbox"]:checked').map(function () {
      return $(this).closest('tr').find('input[name="stdId[]"]').val();
    }).get();
    let academic_yr = $('#academic_yr').val();
    // Combined Validation
    if (academic_yr.trim() === "") {
      alert("Please fill out New Academic year.");
      $('#submitschool_creation').attr('disabled', false);
      return;
    }
    $.ajax({
      type: 'POST',
      data: { 'student_id': studentID, 'standard_id': standardID },
      url: 'ajaxFiles/submitRollBackForm.php',
      dataType: 'json',
      success: function (result) {
        $('#submitschool_creation').attr('disabled', false);
        if (result.status == 'success') {
          alert("Successfully Roll Backed!");

        } else {
          alert("Roll Back Failed!");
        }

        var standard = $("#standard").val();
        if (standard != '') {
          var section = $("#section").val();
          getStudentListForRollBack(standard, section, 2)
        } else {
          // getStudentListForRollBack('', '', 1)
        }
        // window.location.href= "student_rollback.php";
      }
    });

  });//submit student rollback form 

});//Document END.

$(function () {
  getStandardList(); //Get standard list from database.
  // getStudentListForRollBack('','', 1); //1 =showing All students in initially.

})


function getStandardList() { //Getting standard list from database.
  var hrCls = ['13', '19', '20', '21', '22', '23'];
  $.ajax({
    type: 'POST',
    data: {},
    url: 'ajaxFiles/getStandardList.php',
    dataType: 'json',
    success: function (response) {
      $('#standard').empty();
      $('#standard').append("<option value=''>Select Standard</option>");
      for (var i = 0; i < response.length; i++) {
        var stdIdString = response[i]['std_id'].toString(); // Convert std_id to string
        if (hrCls.indexOf(stdIdString) === -1) {
          $('#standard').append("<option value='" + response[i]['std_id'] + "'>" + response[i]['std'] + "</option>");
        }
      }
    }
  });
}

// Function to update the unselected data table
function updateUnselectedTable() {
  // Clear the existing rows in the unselected table
  $('#unselected_tbody').empty();

  // Iterate over the data and check if each row's checkbox is checked or not
  $('#student_rollback_info tbody tr').each(function () {
    var checkbox = $(this).find('.checkbox'); // Find the checkbox element within the row

    // Check if the checkbox is not checked
    if (!checkbox.prop('checked')) {
      var rowData = $(this).find('td:not(:first-child):not(:last-child)').map(function () {
        return $(this).text();
      }).get(); // Get the data of the unselected row excluding the first and last columns

      var newRow = $('<tr></tr>'); // Create a new row for the unselected table
      // Iterate over the row data and build the HTML table cells
      rowData.forEach(function (cellData) {
        newRow.append('<td>' + cellData + '</td>'); // Append the cell to the row
      });

      $('#unselected_tbody').append(newRow); // Append the row to the unselected table body
    }
  });

}

function getStudentListForRollBack(standard, section, type) {
  $.ajax({
    url: 'ajaxStudentRollBackFetch.php',
    type: 'post',
    data: { "standard": standard, "section": section, "type": type },
    //  dataType: 'json',
    success: function (response) {
      $('#studentRollBackList').empty();
      $('#studentRollBackList').html(response);

      funcAfterAjaxCall();//initializing some function  after ajax call completes successfully.

      // hide the unselected table if select all student.
      $('#unselected_table').hide();
    }
  });
}

function funcAfterAjaxCall() {
  // Select the "select all" checkbox if all checkboxes are checked
  $('.checkbox').click(function () {
    if ($('.checkbox:checked').length === $('.checkbox').length) {
      $('#select-all').prop('checked', true);
      // hide the unselected table if select all student.
      $('#unselected_table').hide();
    } else {
      $('#select-all').prop('checked', false);
    }
    updateUnselectedTable();
  });
}
function updateAcademicPeriod() {
  // Get the values from the Period From and Period To fields
  const periodFrom = $('#period_from').val();
  const periodTo = $('#period_to').val();

  // Check if both dates are selected
  if (periodFrom && periodTo) {
    // Extract the years from both dates
    const fromYear = new Date(periodFrom).getFullYear();
    const toYear = new Date(periodTo).getFullYear();

    // Set the Academic Period as 'fromYear-toYear'
    $('#academic_period').val(`${fromYear}-${toYear}`);
  }
}

function getAcademicTable() {
  $.ajax({
    url: 'ajaxFiles/getAcademicTable.php', // Ensure this is the correct path to your PHP script
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      if (response.length > 0) {
        var tbody = $('#academic_creation_table tbody');
        tbody.empty(); // Clear existing rows

        // Iterate over the response array and append each row to the table
        $.each(response, function (index, item) {
          var serial = item.serial; // Serial number from PHP
          var period_from = item.period_from;
          var period_to = item.period_to;
          var academic_period = item.academic_year;
          var action = item.action;

          var row = '<tr>' +
            '<td>' + serial + '</td>' +
            '<td>' + period_from + '</td>' +
            '<td>' + period_to + '</td>' +
            '<td class="academic-period">' + academic_period + '</td>' +
            '<td>' + action + '</td>' +
            '</tr>';

          tbody.append(row);
        });

        // Clear the form fields after table load
        $('#period_from').val('');
        $('#period_to').val('');
        $('#academic_period').val('');

      } else {
        console.log("No data found.");
      }
    },
    error: function (xhr, status, error) {
      console.error('AJAX Error: ' + status + ' ' + error);
    }
  });
}
// Attach the click event handler using event delegation
$(document).on('click', '#academic_creation_table tbody tr', function () {
  var academicYear = $(this).find('.academic-period').text(); // Get the academic year from the clicked row
  $('#academic_yr').val(academicYear); // Set the academic year in the input field
});


function getAcademicDelete(year_id,academic_year) {
  $.post('ajaxFiles/deleteAcademic.php', { year_id,academic_year }, function (result) {
    if (result == '0') {
      alert('Academic Year already used');
    } else if (result == '1') {
      alert( 'Academic Info Deleted Successfully!');
      getAcademicTable();
    } else if (result == '2') {
      alert( 'Academic Year Not Deleted');
    } 
  }, 'json');
}
