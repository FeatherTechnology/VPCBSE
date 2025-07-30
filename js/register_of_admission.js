// Document is ready
$(document).ready(function () {

    $('#admission_table_view').click(function(){
        let stdMedium = $('#medium').val();
        let stdStandard = $('#standard').val();

        if(stdMedium !='0' && stdStandard !='0'){
            $.ajax({
                type: 'POST',
                data: {"stdMedium": stdMedium, "stdStandard": stdStandard},
                url: 'reports/register_of_admission/getAdmissionListTable.php',
                success: function(response){
                    $('#listCard').show();
                    $('#showAdmissionRegister').empty();
                    $('#showAdmissionRegister').html(response);
                }
            })
        }else{
            $('#showAdmissionRegister').empty();
            $('#listCard').hide();
            alert("Kindly select All Fields!");
        }
    });

}); //Document END//


$(function () {
  getStandardList(); //Getting standard list from database.
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
